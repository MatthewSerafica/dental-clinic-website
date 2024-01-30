<?php

namespace App\Http\Controllers\DentistRole;

use App\Http\Controllers\Controller;
use App\Models\DentistAvailability;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DateInterval;
use DateTime;
use App\Models\Times;
use Illuminate\Support\Facades\Log;

class DentistAvailabilityController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dentist = Dentist::where('user_id', $user->id)->firstOrFail();
        $dentistsAvailability = DentistAvailability::where('dentist_id', $dentist->dentist_id)->paginate(10);


        $dentistsAvailability->transform(function ($availability) {
            $availability->start_time = convertTo12Hour($availability->start_time);
            $availability->end_time = convertTo12Hour($availability->end_time);
            return $availability;
        });

        return Inertia::render('Dentist/Availability/Index', [
            'dentist' => $dentist,
            'availability' => $dentistsAvailability
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dentist_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'time_slot' => 'required'
        ]);


        $timeSlots = createTimeSlots(
            new DateTime($request->input('start_time')),
            new DateTime($request->input('end_time')),
            new DateInterval("PT{$request->input('time_slot')}M"),
            new DateTime('12:00:00'),
            new DateTime('12:59:59')
        );

        $startTime = Carbon::parse($request->input('start_time'));
        $startTime->format('H:i:s');

        $endTime = Carbon::parse($request->input('end_time'));
        $endTime->format('H:i:s');


        $dentistAvailability = DentistAvailability::create([
            'dentist_id' => $request->input('dentist_id'),
            'day' => $request->input('day'),
            'start_time' => $startTime,
            'end_time' => $endTime,
            'time_slot' => $request->input('time_slot')

        ]);
        $dentistAvailability->save();


        $times = createAvailability($request->input('day'), $timeSlots);
        $id = $dentistAvailability->availability_id;
        foreach ($times as $time) {
            Times::create([
                'availability_id' => $id,
                'days' => $time['days'],
                'time' => $time['time']
            ]);
        }

        return redirect()->back()->with('success', 'Dentist Availability Added!');
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $dentist = Dentist::where('user_id', $user->id)->firstOrFail();
        $dentistAvailability = DentistAvailability::where('dentist_id', $dentist->dentist_id)
            ->where('availability_id', $request->availability_id)->first();

        $editedAvailability = $request->validate([
            'dentist_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'time_slot' => 'required'
        ]);

        $id = $dentistAvailability->availability_id;

        try {
            Appointment::where('dentist_id', $dentistAvailability->dentist_id)
                ->whereIn('status', ['completed', 'cancelled'])
                ->whereIn('times_id', function ($query) use ($dentistAvailability) {
                    $query->select('times_id')
                        ->from('times')
                        ->where('availability_id', $dentistAvailability->availability_id);
                })
                ->update(['times_id' => null]);

            $appointmentsToUpdate = Appointment::where('dentist_id', $dentistAvailability->dentist_id)
                ->whereIn('status', ['approved', 'pending'])
                ->whereIn('times_id', function ($query) use ($dentistAvailability) {
                    $query->select('times_id')
                        ->from('times')
                        ->where('availability_id', $dentistAvailability->availability_id);
                })
                ->get();

            foreach ($appointmentsToUpdate as $appointment) {
                User::where('id', $appointment->user_id)
                    ->update(['made_appointment' => 0]);
                Appointment::where('times_id', $appointment->times_id)
                    ->update(['times_id' => null]);
            }

            $temp = Appointment::where('dentist_id', $dentistAvailability->dentist_id)
                ->whereIn('status', ['approved', 'pending'])
                ->whereIn('times_id', function ($query) use ($dentistAvailability) {
                    $query->select('times_id')
                        ->from('times')
                        ->where('availability_id', $dentistAvailability->availability_id);
                })
                ->get();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while processing availabilities.']);
        }

        foreach ($temp as $t) {
            $t->delete();
        }
        Times::where('availability_id', $id)->delete();

        $dentistAvailability->update($editedAvailability);

        $timeSlots = createTimeSlots(
            new DateTime($request->input('start_time')),
            new DateTime($request->input('end_time')),
            new DateInterval("PT{$request->input('time_slot')}M"),
            new DateTime('12:00:00'),
            new DateTime('12:59:59')
        );

        $times = createAvailability($request->input('day'), $timeSlots);
        foreach ($times as $time) {
            Times::create([
                'availability_id' => $id,
                'days' => $time['days'],
                'time' => $time['time']
            ]);
        }

        $nearestAvailableTimes = Times::where('isBooked', 0)->first();

        $updateApp = Appointment::where('dentist_id', $dentistAvailability->dentist_id)
            ->whereIn('status', ['approved'])
            ->whereNull('times_id')
            ->get();

        foreach ($updateApp as $appointment) {
            User::where('id', $appointment->user_id)
                ->update(['made_appointment' => 1]);
            Appointment::where('user_id', $appointment->user_id)->where('status', 'approved')
                ->update([
                    'times_id' => $nearestAvailableTimes->times_id,
                    'app_time' => $nearestAvailableTimes->time
                ]);
            Times::where('times_id', $nearestAvailableTimes->times_id)
                ->update(['isBooked' => 1]);

        }

        return redirect()->back()->with('success', 'Dentist Availability Updated!');
    }


    public function update1(Request $request)
    {
        $user = Auth::user();
        $dentist = Dentist::where('user_id', $user->id)->firstOrFail();
        $dentistAvailability = DentistAvailability::where('dentist_id', $dentist->dentist_id)->first();

        $editedAvailability = $request->validate([
            'dentist_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'time_slot' => 'required'
        ]);

        $timeSlots = createTimeSlots(
            new DateTime($request->input('start_time')),
            new DateTime($request->input('end_time')),
            new DateInterval("PT{$request->input('time_slot')}M"),
            new DateTime('12:00:00'),
            new DateTime('12:59:59')
        );

        $startTime = Carbon::parse($request->input('start_time'));
        $startTime->format('H:i:s');

        $endTime = Carbon::parse($request->input('end_time'));
        $endTime->format('H:i:s');

        $id = $dentistAvailability->availability_id;
        try {
            Appointment::where('dentist_id', $dentistAvailability->dentist_id)
                ->whereIn('status', ['completed', 'cancelled'])
                ->whereIn('times_id', function ($query) use ($dentistAvailability) {
                    $query->select('times_id')
                        ->from('times')
                        ->where('availability_id', $dentistAvailability->availability_id);
                })
                ->update(['times_id' => null]);

            $appointmentsToUpdate = Appointment::where('dentist_id', $dentistAvailability->dentist_id)
                ->whereIn('status', ['approved', 'pending'])
                ->whereIn('times_id', function ($query) use ($dentistAvailability) {
                    $query->select('times_id')
                        ->from('times')
                        ->where('availability_id', $dentistAvailability->availability_id);
                })
                ->get();

            foreach ($appointmentsToUpdate as $appointment) {
                User::where('id', $appointment->user_id)
                    ->update(['made_appointment' => 0]);
            }

            Appointment::where('dentist_id', $dentistAvailability->dentist_id)
                ->whereIn('status', ['approved', 'pending'])
                ->whereIn('times_id', function ($query) use ($dentistAvailability) {
                    $query->select('times_id')
                        ->from('times')
                        ->where('availability_id', $dentistAvailability->availability_id);
                })
                ->delete();
        } catch (\Exception $e) {
            Log::error('Error during appointment deletion/update: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred while processing appointments.']);
        }



        Times::where('availability_id', $id)->delete();

        $dentistAvailability->update($editedAvailability);

        $times = createAvailability($request->input('day'), $timeSlots);
        foreach ($times as $time) {
            Times::create([
                'availability_id' => $id,
                'days' => $time['days'],
                'time' => $time['time']
            ]);
        }

        return redirect()->back()->with('success', 'Dentist Availability Updated!');
    }

    public function destroy($id)
    {
        $dentistAvailability = DentistAvailability::findOrFail($id);
        $dentistAvailability->delete();

        return redirect()->back()->with('success', 'Dentist Availability Deleted!');
    }
}

function convertTo12Hour($time)
{
    $hour = date('h', strtotime($time));
    $minute = date('i', strtotime($time));
    $amPm = date('A', strtotime($time));

    return $hour . ':' . $minute . ' ' . $amPm;
}

function createAvailability($day, array $timeSlots)
{
    $times = [];
    foreach ($timeSlots as $slot) {
        $times[] = ['days' => $day, 'time' => $slot];
    }
    return $times;
}

function createTimeSlots(DateTime $startTime, DateTime $endTime, DateInterval $interval, DateTime $excludeStart, DateTime $excludeEnd)
{
    $timeSlots = [];
    while ($startTime <= $endTime) {
        if ($startTime < $excludeStart || $startTime >= $excludeEnd) {
            $timeSlots[] = $startTime->format('H:i:s');
        }
        $startTime->add($interval);
    }
    return $timeSlots;
}
