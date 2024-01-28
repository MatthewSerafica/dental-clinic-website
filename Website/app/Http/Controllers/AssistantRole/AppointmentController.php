<?php

namespace App\Http\Controllers\AssistantRole;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Dentist;
use App\Models\DentistAvailability;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Student;
use App\Models\User;
use Exception;
use App\Notifications\AppointmentBooked;
use App\Notifications\AppointmentUpdated;
use App\Notifications\AppointmentUpdatedStatus;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {
        $appointments = Appointment::with(['user', 'dentist'])
            ->whereNull('archived_at')
            ->selectRaw('*, IF(app_date < CURDATE() OR (app_date = CURDATE() AND app_time < CURTIME()), "past", "upcoming") as appointment_status')
            ->when($request->filled('filterAppointments'), function ($query) use ($request) {
                $appointmentFilter = $request->input('filterAppointments');
                if ($appointmentFilter === 'upcoming') {
                    $query->whereRaw('(app_date > CURDATE() OR (app_date = CURDATE() AND app_time > CURTIME()))')
                        ->whereIn('status', ['approved', 'pending']);;
                } elseif ($appointmentFilter === 'past') {
                    $query->whereRaw('(app_date < CURDATE() OR (app_date = CURDATE() AND app_time < CURTIME()))')
                        ->whereIn('status', ['completed', 'cancelled']);
                }
            })
            ->latest()
            ->paginate(9);
        $dentists = Dentist::all();
        return Inertia::render('Assistant/Appointment/Index', [
            'appointments' => $appointments,
            'dentists' => $dentists,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dentist_id' => 'required',
            'app_date' => 'required',
            'app_time' => 'required',
            'app_type' => 'required',
            'pat_notes' => 'required',
            'time_id' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $user = User::where('name', $request->name)->firstOrFail();

            if ($user->made_appointment) {
                return redirect()->back()->with('error', 'You have already made an appointment for this patient. Please wait until the appointment is finished.');
            }

            $appointmentTime = $request->app_time;
            $appointmentDate = $request->app_date;

            $existingAppointment = Appointment::where('dentist_id', $request->dentist_id)
                ->where('app_time', $appointmentTime)
                ->where('app_date', $appointmentDate)
                ->whereIn('status', Appointment::STATUSES)
                ->first();

            if ($existingAppointment) {
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
                'availability_id' => $request->time_id,
            ];

            $appointment = Appointment::create($appointmentData);
            $user->update(['made_appointment' => 1]);

            $appointment->user->notify(
                new AppointmentBooked($appointment)
            );

            $time = DentistAvailability::where('availability_id', $request->time_id)->firstOrFail();
            $time->isBooked = 1;
            $time->save();

            $formatTime = Carbon::createFromFormat('H:i:s', $request->app_time)->format('h:i A');
            $formatDate = Carbon::createFromFormat('Y-m-d', $request->app_date)->format('F d, Y');
            DB::commit();
        } catch (QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'A database error occured while processing your request. Error: ' . $e->getMessage());
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'The requested user could not be found.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An unexpected error occured. Error: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Appointment Placed')->with('message', 'Appointment with ' . $request->name . ' on ' . $formatDate . ' at ' . $formatTime . ' for ' . $request->app_type . ' has been placed.');
    }

    public function show($id) 
    {
        $appointment = Appointment::with('user.student', 'user.employee', 'dentist')->where('app_id', $id)->first();
        $dentists = Dentist::all();
        $services = Service::all();

        return inertia('Assistant/Appointment/Show', [
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
                $time = DentistAvailability::where('availability_id', $appointment->availability_id)->firstOrFail();
                $time->isBooked = 0;
                $time->save();
            } else {
                $time = DentistAvailability::where('availability_id', $appointment->availability_id)->firstOrFail();
                $time->isBooked = 1;
                $time->save();
            }

            $user = User::findOrFail($appointment->user_id);
            $user->made_appointment = $request->input('made_appointment');
            if ($request->status == 'ongoing') {
                $user->time_in = now()->format('H:i');
            } else {
                $user->time_in = null;
            }
            $user->save();
            DB::commit();
        } catch (QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'A database error occured while processing your request. Error: ' . $e->getMessage());
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'The requested appointment or user could not be found.');
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
            $appointment->availability_id = $request->time_id;
            $appointment->user->notify(
                new AppointmentUpdated($appointment)
            );
            $appointment->save();

            $old_time = DentistAvailability::where('availability_id', $request->old_time_id)->firstOrFail();
            $old_time->isBooked = 0;
            $old_time->save();
            
            $time = DentistAvailability::where('availability_id', $appointment->availability_id)->firstOrFail();
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
        return redirect()->to('/assistant/appointment')->with('success', 'Appointment successfully updated.');
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

        $morningTime = DentistAvailability::where('dentist_id', $id)
            ->where('days', $weekday)
            ->whereTime('time', '<=', '11:00:00')
            ->get();

        $eveningTime = DentistAvailability::where('dentist_id', $id)
            ->where('days', $weekday)
            ->whereTime('time', '>=', '13:00:00')
            ->get();

        return response()->json([
            'morningTime' => $morningTime,
            'eveningTime' => $eveningTime,
        ]);
    }
}
