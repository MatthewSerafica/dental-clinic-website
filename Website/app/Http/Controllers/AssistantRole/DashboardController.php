<?php

namespace App\Http\Controllers\AssistantRole;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use TypeError;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $calendarAppointments = $this->getCalendarAppointmentsToday();
            $yearlyData = $this->getYearlyData();
            $appointmentsToday = $this->getAppointmentsToday();
            $totalStudents = $this->getTotalStudents();
            $totalEmployees = $this->getTotalEmployees();
            $completedStudents = $this->getCompletedUsersToday('student');
            $completedEmployees = $this->getCompletedUsersToday('employee');
            $completedAppointments = $this->getCompletedAppointmentsToday();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'A database error occured: ' . $e->getMessage());
        } catch (TypeError $e) {
            return redirect()->back()->with('error', 'A type error occured: ' . $e->getMessage());
        }

        return inertia(
            'Assistant/Dashboard/Dashboard',
            [
                'calendarAppointments' => $calendarAppointments,
                'yearlyData' => $yearlyData,
                'appointments' => $appointmentsToday,
                'totalStudents' => $totalStudents,
                'totalEmployees' => $totalEmployees,
                'totalPatients' =>  $totalStudents + $totalEmployees,
                'completedStudents' => $completedStudents,
                'completedEmployees' => $completedEmployees,
                'completedPatients' => $completedStudents + $completedEmployees,
                'completedAppointments' => $completedAppointments,
            ]
        );
    }

    private function getYearlyData()
    {
        return Cache::remember('yearlyData', 60, function () {
            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            $yearlyData = Appointment::whereYear('app_date', Carbon::now()->year)
                ->where('status', 'completed')
                ->get()
                ->groupBy(function ($appointment) {
                    return Carbon::parse($appointment->app_date)->format('M');
                })
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });

            $orderedData = collect([]);
            foreach ($months as $month) {
                $orderedData[$month] = $yearlyData->get($month, 0);
            }
            return $orderedData;
        });
    }

    private function getAppointmentsToday()
    {
        return Cache::remember('appointmentsToday', 60, function () {
            return Appointment::whereDate('app_date', Carbon::today())
                ->with('user')
                ->whereIn('status', ['pending', 'approved', 'ongoing'])
                ->orderBy('app_time')
                ->get();
        });
    }
    private function getCalendarAppointmentsToday()
    {
        $appointmentsToday = Appointment::where('status', 'approved')
            ->with('user', 'dentist')
            ->whereDate('app_date', '>=', now())
            ->whereIn('status', ['approved'])
            ->orderBy('app_time')
            ->get();

        return $appointmentsToday;
    }
    private function getTotalStudents()
    {
        return Cache::remember('totalStudents', 60, function () {
            return Student::count();
        });
    }

    private function getTotalEmployees()
    {
        return Cache::remember('totalEmployees', 60, function () {
            return Employee::count();
        });
    }

    private function getCompletedUsersToday($userType)
    {
        return Cache::remember('completed' . ucfirst($userType) . 'Today', 60, function () use ($userType) {
            return Appointment::whereDate('app_date', Carbon::today())
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->where('users.user_type', $userType)
                ->count();
        });
    }

    private function getCompletedAppointmentsToday()
    {
        return Cache::remember('completedAppointmentsToday', 60, function () {
            return Appointment::whereDate('app_date', Carbon::today())
                ->whereIn('status', ['pending', 'approved', 'ongoing'])
                ->count();
        });
    }
}
