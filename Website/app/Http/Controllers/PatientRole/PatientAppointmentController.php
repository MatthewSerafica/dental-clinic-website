<?php

namespace App\Http\Controllers\PatientRole;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Assistant;
use App\Models\Dentist;
use App\Models\DentistAvailability;
use App\Models\Service;
use App\Models\Times;
use App\Models\User;
use App\Notifications\AppointmentBooked;
use App\Notifications\AppointmentUpdatedStatus;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PatientAppointmentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = User::with(['student', 'employee'])->find(auth()->id());
            $appointments = Appointment::where('user_id', $user->id)
                ->whereNull('archived_at')
                ->with('user')
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
            $services = Service::all();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the data');
        }

        return Inertia::render('Patient/Appointment/Index', [
            'nuser' => $user,
            'dentists' => $dentists,
            'appointments' => $appointments,
            'services' => $services,
        ]);
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

            $assistants = Assistant::all();

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
                'status' => 'pending',
                'times_id' => $request->time_id,
            ];


            $appointment = Appointment::create($appointmentData);
            $user->update(['made_appointment' => 1]);

            $time = Times::where('times_id', $request->time_id)->firstOrFail();
            $time->isBooked = 1;
            $time->save();

            $appointment->dentist->user->notify(
                new AppointmentBooked($appointment)
            );

            foreach ($assistants as $assistant) {
                $assistant->user->notify(
                    new AppointmentBooked($appointment)
                );
            }
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
            return redirect()->back()->with('error', 'An unexpected error occured. ');
        } catch (InvalidFormatException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error during the booking of the appointment: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Appointment Placed')->with('message', 'Appointment with ' . $request->name . ' on ' . $formatDate . ' at ' . $formatTime . ' for ' . $request->app_type . ' has been placed.');
    }

    public function show($id)
    {
        try {
            $appointment = Appointment::with(['user.student', 'user.employee', 'dentist'])->where('app_id', $id)->first();$dentists = Dentist::all();
            $services = Service::all();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Appointment not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the appointment');
        }

        return inertia('Patient/Appointment/Show', [
            'appointment' => $appointment,
            'dentists' => $dentists,
            'services' => $services,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'status' => 'required',
                'made_appointment' => 'required',
                'reason' => 'nullable',
            ]);

            $assistants = Assistant::all();
            $appointment = Appointment::findOrFail($id);
            $appointment->status = $request->input('status');
            $appointment->dentist->user->notify(
                new AppointmentUpdatedStatus($appointment, $request->reason)
            );
            foreach ($assistants as $assistant) {
                $assistant->user->notify(
                    new AppointmentUpdatedStatus($appointment, $request->reason)
                );
            }

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
        } catch (QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'A database error occured while processing your request. Error: ' . $e->getMessage());
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'The requested appointment or user could not be found.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An unexpected error occured. Error: ' . $e->getMessage());
        }
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
        return redirect()->to('/patient/appointments')->with('success', 'Appointment successfully updated.');
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
