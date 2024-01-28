<?php

namespace App\Http\Controllers\DentistRole;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use TypeError;

class DashboardController extends Controller
{
    public function dashboard()
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
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        } catch (TypeError $e) {
            return redirect()->back()->with('error', 'A type error occurred: ' . $e->getMessage());
        }

        return inertia(
            'Dentist/Dashboard/Dashboard',
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
    }

    private function getAppointmentsToday()
    {
        $userId = auth()->user()->id;

        $appointmentsToday = Appointment::whereDate('app_date', Carbon::today())
            ->with('user')
            ->whereIn('status', ['pending', 'approved', 'ongoing'])
            ->where('dentist_id', $userId)
            ->orderBy('app_time')
            ->get();

        return $appointmentsToday;
    }

    private function getCalendarAppointmentsToday()
    {
        $userId = auth()->user()->id;

        $appointmentsToday = Appointment::where('status', 'approved')
            ->with('user')
            ->whereDate('app_date', '>=', now())
            ->whereIn('status', ['approved'])
            ->where('dentist_id', $userId)
            ->orderBy('app_time')
            ->get();

        return $appointmentsToday;
    }

    private function getTotalStudents()
    {
        $totalStudents = Student::count();
        return $totalStudents;
    }

    private function getTotalEmployees()
    {
        $totalEmployees = Employee::count();
        return $totalEmployees;
    }

    private function getCompletedUsersToday($userType)
    {
        return Appointment::whereDate('app_date', Carbon::today())
            ->where('status', 'completed')
            ->join('users', 'appointments.user_id', '=', 'users.id')
            ->where('users.user_type', $userType)
            ->count();
    }

    private function getCompletedAppointmentsToday()
    {
        $appointmentsToday = Appointment::whereDate('app_date', Carbon::today())
            ->whereIn('status', ['pending', 'approved', 'ongoing'])
            ->count();

        return $appointmentsToday;
    }
}
