<?php

namespace App\Http\Controllers\AdminRole;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Dentist;
use App\Models\DentistAvailability;
use App\Models\Service;
use App\Models\Times;
use App\Models\User;
use App\Notifications\AppointmentBooked;
use App\Notifications\AppointmentUpdated;
use App\Notifications\AppointmentUpdatedStatus;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Exception;
use Illuminate\Validation\ValidationException;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $appointments = Appointment::with(['user', 'dentist'])
                ->whereNull('archived_at')
                ->selectRaw('*, IF(app_date < CURDATE() OR (app_date = CURDATE() AND app_time < CURTIME()), "past", "upcoming") as appointment_status')
                ->when($request->filled('filterAppointments'), function ($query) use ($request) {
                    $appointmentFilter = $request->input('filterAppointments');
                    if ($appointmentFilter === 'upcoming') {
                        $query->whereRaw('(app_date > CURDATE() OR (app_date = CURDATE() AND app_time > CURTIME()))')
                            ->whereIn('status', ['approved', 'pending']);
                    } elseif ($appointmentFilter === 'past') {
                        $query->whereRaw('(app_date < CURDATE() OR (app_date = CURDATE() AND app_time < CURTIME()))')
                            ->whereIn('status', ['completed', 'cancelled']);
                    }
                })
                ->latest()
                ->paginate(9);

            $dentists = Dentist::all();
            $services = Service::all();

            return Inertia::render('Admin/Appointment/Index', [
                'appointments' => $appointments,
                'dentists' => $dentists,
                'services' => $services,
            ]);
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'An error occurred while retrieving appointments.');
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
                'app_time' => 'required',
                'app_date' => 'required',
                'dentist_id' => 'required',
                'app_type' => 'required',
                'pat_notes' => 'nullable',
                'time_id' => 'required',
            ]);

            $user = User::where('name', $request->name)->firstOrFail();

            if ($user->made_appointment) {
                return redirect()->back()->with('error', 'You have already made an appointment. Please wait until your current appointment is completed or cancelled.');
            }

            $appointmentTime = $request->app_time;
            $appointmentDate = $request->app_date;

            $existingAppointment = Appointment::where('dentist_id', $request->dentist_id)
                ->where('app_time', $appointmentTime)
                ->where('app_date', $appointmentDate)
                ->whereIn('status', Appointment::STATUSES)
                ->first();

            if ($existingAppointment && in_array($existingAppointment->status, ['approved', 'pending', 'ongoing'])) {
                return redirect()->back()->with('error', 'The selected time is already booked. Please choose another time.');
            }

            $appointmentData = [
                'user_id' => $user->id,
                'dentist_id' => $request->dentist_id,
                'app_date' => $appointmentDate,
                'app_time' => $appointmentTime,
                'app_type' => $request->app_type,
                'pat_notes' => $request->pat_notes,
                'status' => 'approved',
                'times_id' => $request->time_id,
            ];

            $appointment = Appointment::create($appointmentData);
            $user->update(['made_appointment' => 1]);

            $time = Times::where('times_id', $request->time_id)->firstOrFail();
            $time->isBooked = 1;
            $time->save();

            $appointment->user->notify(
                new AppointmentBooked($appointment)
            );

            $formatTime = Carbon::createFromFormat('H:i:s', $request->app_time)->format('h:i A');
            $formatDate = Carbon::createFromFormat('Y-m-d', $request->app_date)->format('F d, Y');

            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'User not found');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while booking the appointment: ' . $e->getMessage());
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (InvalidFormatException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error during the booking of the appointment: ' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An unexpected error occured. Error: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Appointment Placed')->with('message', 'Appointment with ' . $request->name . ' on ' . $formatDate . ' at ' . $formatTime . ' for ' . $request->app_type . ' has been placed.');
    }

    public function bulkBook(Request $request)
{
    $request->validate([
        'file' => ['required', 'file', 'mimes:csv,txt'],
    ]);

    $path = $request->file('file')->getRealPath();
    $file = fopen($path, 'r');


    fgetcsv($file);

    DB::beginTransaction();
    try {
        while (($line = fgetcsv($file)) !== false) {
         
            $appDate = Carbon::createFromFormat('m/d/Y', $line[2])->toDateString();
            $weekday = Carbon::createFromFormat('m/d/Y', $line[2])->format('l');
            $time = $line[3];
            $id = $line[1];

            $user = User::where('name', $line[0])->firstOrFail();

            $availability = Times::where('time', $time)
                ->whereIn('availability_id', function ($query) use ($id, $weekday) {
                    $query->select('availability_id')
                        ->from('dentist_availabilities')
                        ->where('dentist_id', $id)
                        ->where('day', $weekday);
                })
                ->first();

            if ($availability) {

                $existingAppointment = Appointment::where([
                    'user_id' => $user->id,
                    'dentist_id' => $line[1],
                    'app_date' => $appDate,
                    'app_time' => $line[3],
                    'status' => 'approved'
                ])->first();

                if (!$existingAppointment) {
                    $appointmentData = [
                        'user_id' => $user->id,
                        'dentist_id' => $line[1],
                        'app_date' => $appDate,
                        'app_time' => $line[3],
                        'app_type' => $line[4],
                        'pat_notes' => $line[5],
                        'status' => 'approved',
                        'times_id' => $availability->times_id,
                    ];

                    $appointment = Appointment::create($appointmentData);
                    $user->update(['made_appointment' => 1]);

                    $time = Times::find($availability->times_id);
                    $time->isBooked = 1;
                    $time->save();

                    $appointment->user->notify(
                        new AppointmentBooked($appointment)
                    );

                }
            }
        }

        DB::commit();
    } catch (ModelNotFoundException $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'User not found');
    } catch (QueryException $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'An error occurred while booking the appointment: ' . $e->getMessage());
    } catch (ValidationException $e) {
        DB::rollback();
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (InvalidFormatException $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'There was an error during the booking of the appointment: ' . $e->getMessage());
    } catch (Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'An unexpected error occurred. Error: ' . $e->getMessage());
    }

    return redirect()->back()->with('success', 'Appointments Placed')->with('message', 'Appointments have been placed successfully.');
}

    public function show($id)
    {
        $appointment = Appointment::with('user.student', 'user.employee', 'dentist')->where('app_id', $id)->first();
        $dentists = Dentist::all();
        $services = Service::all();

        return inertia('Admin/Appointment/Show', [
            'appointment' => $appointment,
            'dentists' => $dentists,
            'services' => $services
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'made_appointment' => 'required',
            'reason' => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $appointment = Appointment::findOrFail($id);
            $appointment->status = $request->status;
            $appointment->user->notify(
                new AppointmentUpdatedStatus($appointment, $request->reason)
            );
            $appointment->save();

            if ($request->status == 'completed' || $request->status == 'cancelled') {
                $time = Times::where('times_id', $appointment->times_id)->firstOrFail();
                $time->isBooked = 0;
                $time->save();
            } else {
                $time = Times::where('times_id', $appointment->times_id)->firstOrFail();
                $time->isBooked = 1;
                $time->save();
            }

            $user = User::findOrFail($appointment->user_id);
            $user->made_appointment = $request->input('made_appointment');
            $user->save();
            DB::commit();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Appointment not found.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the appointment');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An unexpected error occured. Error: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
                'app_time' => '',
                'app_date' => '',
                'dentist_id' => 'required',
                'app_type' => '',
                'pat_notes' => 'nullable',
                'time_id' => '',
                'old_time_id' => '',
            ]);

            $user = User::where('name', $request->name)->firstOrFail();
            $appointment = Appointment::where('app_id', $id)->firstOrFail();
            $appointment->user_id = $user->id;
            $appointment->dentist_id = $request->dentist_id;
            $appointment->app_date = $request->app_date;
            $appointment->app_time = $request->app_time;
            $appointment->app_type = $request->app_type;
            $appointment->pat_notes = $request->pat_notes;
            $appointment->times_id = $request->time_id;
            $appointment->user->notify(
                new AppointmentUpdated($appointment)
            );
            $appointment->save();

            $old_time = Times::where('times_id', $request->old_time_id)->firstOrFail();
            $old_time->isBooked = 0;
            $old_time->save();

            $time = Times::where('times_id', $appointment->times_id)->firstOrFail();
            $time->isBooked = 1;
            $time->save();

            DB::commit();
        } catch (QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'A database error occured while processing your request. Error: ' . $e->getMessage());
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'The requested appointment or user could not be found. Error:' . $e->getMessage());
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An unexpected error occured. Error: ' . $e->getMessage());
        }
        return redirect()->to('/admin/appointment')->with('success', 'Appointment successfully updated.');
    }

    public function showStudent($id)
    {
        return $this->showUser(Student::class, $id);
    }

    public function showEmployee($id)
    {
        return $this->showUser(Employee::class, $id);
    }

    private function showUser($class, $id)
    {
        try {
            $user = $class::findOrFail($id);

            return response()->json([
                'last_name' => $user->last_name,
                'first_name' => $user->first_name,
                'middle_name' => $user->middle_name,
                'course' => $user->course ?? null,
                'year' => $user->year ?? null,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'An error occurred while fetching user data.'], 500);
        }
    }

    public function getAvailableTime($id, $date)
    {
        $weekday = date('l', strtotime($date));

        $dentistAvailabilities = DentistAvailability::where('dentist_id', $id)
            ->where(function ($query) use ($weekday) {
                $query->where('day', $weekday)
                    ->orWhereNull('day');
            })
            ->get();


        if (!$dentistAvailabilities->count()) {
            return response()->json(['message' => 'No availability found for this dentist'], 404);
        }

        $groupedTimes = $dentistAvailabilities->flatMap(function ($dentistAvailability) {
            return $dentistAvailability->times->filter(function ($time) {
                return !$time->isBooked;
            })->groupBy(function ($time) {
                return strtotime($time->time) >= strtotime('13:00:00') ? 'afternoon' : 'morning';
            });
        });

        return response()->json([
            'morning' => $groupedTimes->get('morning', collect()),
            'afternoon' => $groupedTimes->get('afternoon', collect())
        ]);
    }
}
