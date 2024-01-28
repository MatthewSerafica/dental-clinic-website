<?php

namespace App\Http\Controllers\DentistRole;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\School;
use App\Models\Service;
use Carbon\Carbon;
use Exception;

class ReportsController extends Controller
{
    public function index()
    {
        try {
            $dailyData = $this->getDailyData();
            $monthlyData = $this->getMonthlyData();
            $departmentData = $this->getDepartmentData();
            $dailyDepartmentData = $this->getDailyDepartmentData();
            $samcisMonthlyData = $this->getSchoolData('SAMCIS');
            $seaMonthlyData = $this->getSchoolData('SEA');
            $somMonthlyData = $this->getSchoolData('SOM');
            $sasMonthlyData = $this->getSchoolData('SAS');
            $solMonthlyData = $this->getSchoolData('SOL');
            $stelaMonthlyData = $this->getSchoolData('STELA');
            $sonahbsMonthlyData = $this->getSchoolData('SONAHBS');
            $samcisDailyData = $this->getSchoolDailyData('SAMCIS');
            $seaDailyData = $this->getSchoolDailyData('SEA');
            $somDailyData = $this->getSchoolDailyData('SOM');
            $sasDailyData = $this->getSchoolDailyData('SAS');
            $solDailyData = $this->getSchoolDailyData('SOL');
            $stelaDailyData = $this->getSchoolDailyData('STELA');
            $sonahbsDailyData = $this->getSchoolDailyData('SONAHBS');
            $school = School::all();
            $department = Department::all();

            return inertia('Dentist/Report/Index', [
                'schools' => $school,
                'departments' => $department,
                'monthlyData' => $monthlyData,
                'dailyData' => $dailyData,
                'departmentData' => $departmentData,
                'dailyDepartmentData' => $dailyDepartmentData,
                'samcisMonthlyData' => $samcisMonthlyData,
                'seaMonthlyData' => $seaMonthlyData,
                'somMonthlyData' => $somMonthlyData,
                'sasMonthlyData' => $sasMonthlyData,
                'solMonthlyData' => $solMonthlyData,
                'stelaMonthlyData' => $stelaMonthlyData,
                'sonahbsMonthlyData' => $sonahbsMonthlyData,
                'samcisDailyData' => $samcisDailyData,
                'seaDailyData' => $seaDailyData,
                'somDailyData' => $somDailyData,
                'sasDailyData' => $sasDailyData,
                'solDailyData' => $solDailyData,
                'stelaDailyData' => $stelaDailyData,
                'sonahbsDailyData' => $sonahbsDailyData,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function monthlyReport()
    {
        try {
            $monthlySummary = $this->getMonthlySummary();
            $annualStudentSummary = $this->getAnnualStudentData();
            $employeeSummary = $this->getEmployeeSummary();
            return inertia('Dentist/Report/MonthlyReportPrint', [
                'monthlySummary' => $monthlySummary,
                'annualStudentSummary' => $annualStudentSummary,
                'employeeSummary' => $employeeSummary,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function dailyReport()
    {
        try {
            $dailySummary = $this->getDailySummary();
            $dailyAnnual = $this->getDailyAnnualStudent();
            $dailyEmployee = $this->getDailyEmployeeSummary();
            return inertia('Dentist/Report/DailyReportPrint', [
                'dailySummary' => $dailySummary,
                'dailyAnnual' => $dailyAnnual,
                'dailyEmployee' => $dailyEmployee,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getDailySummary()
    {
        try {
            $appTypes = Service::where('regular', 1)->orderBy('id')->get()->pluck('services')->toArray();
            $schools = School::all()->pluck('school')->toArray();

            $summaryData = Appointment::whereDate('app_date', Carbon::now()->toDateString())
                ->where('status', 'completed')
                ->whereNotIn('app_type', ['Annual Check-up'])
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->select('appointments.app_type', 'students.school')
                ->groupBy('appointments.app_type', 'students.school')
                ->get()
                ->groupBy('app_type')
                ->map(function ($groupedAppointments) use ($schools) {
                    $counts = $groupedAppointments->countBy('school')->toArray();
                    $counts = array_merge(array_fill_keys($schools, 0), $counts);
                    return $counts;
                });

            foreach ($appTypes as $appType) {
                if (!$summaryData->has($appType)) {
                    $summaryData[$appType] = array_fill_keys($schools, 0);
                }
            }

            $orderedSummaryData = [];
            foreach ($appTypes as $appType) {
                $orderedSummaryData[$appType] = $summaryData[$appType];
            }

            return $orderedSummaryData;
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getMonthlySummary()
    {
        try {
            $appTypes = Service::where('regular', 1)->get()->pluck('services')->toArray();
            $schools = School::all()->pluck('school')->toArray();

            $summaryData = Appointment::whereMonth('app_date', now()->month)
                ->where('status', 'completed')
                ->whereNotIn('app_type', ['Annual Check-up'])
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->select('appointments.app_type', 'students.school')
                ->groupBy('appointments.app_type', 'students.school')
                ->get()
                ->groupBy('app_type')
                ->map(function ($groupedAppointments) use ($schools) {
                    $counts = $groupedAppointments->countBy('school')->toArray();
                    $counts = array_merge(array_fill_keys($schools, 0), $counts);
                    return $counts;
                });

            foreach ($appTypes as $appType) {
                if (!$summaryData->has($appType)) {
                    $summaryData[$appType] = array_fill_keys($schools, 0);
                }
            }

            $orderedSummaryData = [];
            foreach ($appTypes as $appType) {
                $orderedSummaryData[$appType] = $summaryData[$appType];
            }

            return $orderedSummaryData;
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getDailyAnnualStudent()
    {
        try {
            $courses = ['Doctor of Medicine' => 'Medicine', 'BSN' => 'Nursing'];
            $year = ['1st Year', '2nd Year', '3rd Year', '4th Year'];

            $summaryData = Appointment::whereDate('app_date', Carbon::now()->toDateString())
                ->where('status', 'completed')
                ->whereIn('app_type', ['Annual Check-up'])
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->select('students.course', 'students.year')
                ->get()
                ->groupBy('course')
                ->map(function ($groupedAppointments) use ($year) {
                    $counts = $groupedAppointments->countBy('year')->toArray();
                    $counts = array_merge(array_fill_keys($year, 0), $counts);
                    return $counts;
                });

            $orderedSummaryData = [];
            foreach ($courses as $originalCourse => $newCourse) {
                if ($summaryData->has($originalCourse)) {
                    $orderedSummaryData[$newCourse] = $summaryData[$originalCourse];
                } else {
                    $orderedSummaryData[$newCourse] = array_fill_keys($year, 0);
                }
            }

            return $orderedSummaryData;
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getAnnualStudentData()
    {
        try {
            $courses = ['Doctor of Medicine' => 'Medicine', 'BSN' => 'Nursing'];
            $year = ['1st Year', '2nd Year', '3rd Year', '4th Year'];

            $summaryData = Appointment::whereMonth('app_date', now()->month)
                ->where('status', 'completed')
                ->whereIn('app_type', ['Annual Check-up'])
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->select('students.course', 'students.year')
                ->get()
                ->groupBy('course')
                ->map(function ($groupedAppointments) use ($year) {
                    $counts = $groupedAppointments->countBy('year')->toArray();
                    $counts = array_merge(array_fill_keys($year, 0), $counts);
                    return $counts;
                });

            $orderedSummaryData = [];
            foreach ($courses as $originalCourse => $newCourse) {
                if ($summaryData->has($originalCourse)) {
                    $orderedSummaryData[$newCourse] = $summaryData[$originalCourse];
                } else {
                    $orderedSummaryData[$newCourse] = array_fill_keys($year, 0);
                }
            }

            return $orderedSummaryData;
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getDailyEmployeeSummary()
    {
        try {
            $appTypes = Service::where('employee', 1)->get()->pluck('services')->toArray();
            $summaryData = Appointment::whereDate('app_date', Carbon::now()->toDateString())
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('employees', 'users.id', '=', 'employees.user_id')
                ->select('employees.department', 'appointments.app_type')
                ->get()
                ->groupBy('app_type')
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });

            foreach ($appTypes as $appType) {
                if (!$summaryData->has($appType)) {
                    $summaryData[$appType] = 0;
                }
            }

            $orderedSummaryData = [];
            foreach ($appTypes as $appType) {
                $orderedSummaryData[$appType] = $summaryData[$appType];
            }

            return $orderedSummaryData;
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    private function getEmployeeSummary()
    {
        try {
            $appTypes = Service::where('employee', 1)->get()->pluck('services')->toArray();
            $summaryData = Appointment::whereMonth('app_date', Carbon::now()->month)
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('employees', 'users.id', '=', 'employees.user_id')
                ->select('employees.department', 'appointments.app_type')
                ->get()
                ->groupBy('app_type')
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });

            foreach ($appTypes as $appType) {
                if (!$summaryData->has($appType)) {
                    $summaryData[$appType] = 0;
                }
            }

            $orderedSummaryData = [];
            foreach ($appTypes as $appType) {
                $orderedSummaryData[$appType] = $summaryData[$appType];
            }

            return $orderedSummaryData;
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getMonthlyData()
    {
        try {
            return Appointment::whereMonth('app_date', Carbon::now()->month)
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->select('students.school', 'appointments.app_type')
                ->get()
                ->groupBy('school')
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getSchoolData($school)
    {
        try {
            return Appointment::whereMonth('app_date', Carbon::now()->month)
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->where('students.school', $school)
                ->select('appointments.app_type')
                ->get()
                ->groupBy('app_type')
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getDepartmentData()
    {
        try {
            return Appointment::whereMonth('app_date', Carbon::now()->month)
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('employees', 'users.id', '=', 'employees.user_id')
                ->select('employees.department', 'appointments.app_type')
                ->get()
                ->groupBy('department')
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getDailyDepartmentData()
    {
        try {
            return Appointment::whereDate('app_date', Carbon::now()->toDateString())
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('employees', 'users.id', '=', 'employees.user_id')
                ->select('employees.department', 'appointments.app_type')
                ->get()
                ->groupBy('department')
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getDailyData()
    {
        try {
            return Appointment::whereDate('app_date', Carbon::now()->toDateString())
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->select('students.school', 'appointments.app_type')
                ->get()
                ->groupBy('school')
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getSchoolDailyData($school)
    {
        try {
            return Appointment::whereDate('app_date', Carbon::now()->toDateString())
                ->where('status', 'completed')
                ->join('users', 'appointments.user_id', '=', 'users.id')
                ->join('students', 'users.id', '=', 'students.user_id')
                ->where('students.school', $school)
                ->select('appointments.app_type')
                ->get()
                ->groupBy('app_type')
                ->map(function ($groupedAppointments) {
                    return $groupedAppointments->count();
                });
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
