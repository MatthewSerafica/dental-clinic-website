<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssistantRole\AppointmentController as AssistantAppointmentController;
use App\Http\Controllers\AssistantRole\DashboardController as AssistantDashboardController;
use App\Http\Controllers\AssistantRole\StudentController as AssistantStudentController;
use App\Http\Controllers\AssistantRole\CourseController as AssistantCourseController;
use App\Http\Controllers\AssistantRole\EmployeeController as AssistantEmployeeController;
use App\Http\Controllers\AdminRole\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\AdminRole\DashboardController as AdminDashboardController;
use App\Http\Controllers\AdminRole\StudentController as AdminStudentController;
use App\Http\Controllers\AdminRole\CourseController as AdminCourseController;
use App\Http\Controllers\AdminRole\DentalChartController as AdminChartController;
use App\Http\Controllers\AdminRole\DentalExaminationController as AdminExaminationController;
use App\Http\Controllers\AdminRole\TreatmentRecordController as AdminTreatmentRecordController;
use App\Http\Controllers\AdminRole\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\AdminRole\ReportsController as AdminReportsController;
use App\Http\Controllers\AdminRole\UserRecordController as AdminUserController;
use App\Http\Controllers\AdminRole\ArchiveController as AdminArchiveController;
use App\Http\Controllers\AdminRole\DepartmentController;
use App\Http\Controllers\AdminRole\SchoolController;
use App\Http\Controllers\AdminRole\ServiceController;
use App\Http\Controllers\AssistantRole\NotificationController as AssistantNotificationController;
use App\Http\Controllers\DentistRole\CourseController;
use App\Http\Controllers\DentistRole\AppointmentController;
use App\Http\Controllers\DentistRole\DashboardController;
use App\Http\Controllers\DentistRole\DentalChartController;
use App\Http\Controllers\DentistRole\DentistAvailabilityController;
use App\Http\Controllers\DentistRole\DentalExaminationController;
use App\Http\Controllers\DentistRole\NotificationController;
use App\Http\Controllers\DentistRole\StudentController;
use App\Http\Controllers\DentistRole\EmployeeController;
use App\Http\Controllers\DentistRole\ProfileController as DentistProfileController;
use App\Http\Controllers\DentistRole\ReportsController;
use App\Http\Controllers\DentistRole\TreatmentRecordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PatientRole\PatientAppointmentController;
use App\Http\Controllers\PatientRole\PatientController;
use App\Http\Controllers\PatientRole\ProfileController;
use App\Http\Controllers\PatientRole\PatientNotificationController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.index');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/request-confirmed', [ForgotPasswordController::class, 'success'])->name('password.success');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin', [AdminDashboardController::class, 'dashboard'])->name('admin.index');

        Route::prefix('/admin/student')->name('admin.student.')->group(function () {
            Route::get('/', [AdminStudentController::class, 'index'])->name('index');
            Route::post('/store', [AdminStudentController::class, 'store'])->name('store');
            Route::put('/{id}/update', [AdminStudentController::class, 'update'])->name('update');
            Route::get('/{id}', [AdminStudentController::class, 'show'])->name('show');
            Route::delete('/{id}/delete', [AdminStudentController::class, 'destroy'])->name('delete');
            Route::get('/courses/{id}', [AdminCourseController::class, 'index'])->name('course.index');
            Route::post('/{id}/create', [AdminTreatmentRecordController::class, 'store'])->name('treatment.store');
            Route::put('/{record_id}/treatment/update', [AdminTreatmentRecordController::class, 'update'])->name('treatment.update');
            Route::put('/{id}/archive', [AdminStudentController::class, 'archive'])->name('archive');
            Route::get('/check-id/{id}', [AdminStudentController::class, 'check'])->name('check');
            Route::get('/service/annual', [ServiceController::class, 'getAnnualServices'])->name('getannualservices');
            Route::get('/service/regular', [ServiceController::class, 'getRegularServices'])->name('getregularservices');
            Route::post('/bulk', [AdminStudentController::class, 'bulkStore'])->name('bulk');
        });

        Route::prefix('/admin/employee')->name('admin.employee.')->group(function () {
            Route::get('/', [AdminEmployeeController::class, 'index'])->name('index');
            Route::post('/store', [AdminEmployeeController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminEmployeeController::class, 'edit'])->name('edit');
            Route::put('/{id}/update', [AdminEmployeeController::class, 'update'])->name('update');
            Route::get('/{id}', [AdminEmployeeController::class, 'show'])->name('show');
            Route::delete('/{id}/delete', [AdminEmployeeController::class, 'destroy'])->name('delete');
            Route::post('/{id}/create', [AdminTreatmentRecordController::class, 'store'])->name('treatment.store');
            Route::put('/{record_id}/treatment/update', [AdminTreatmentRecordController::class, 'update'])->name('treatment.update');
            Route::put('/{id}/archive', [AdminEmployeeController::class, 'archive'])->name('archive');
            Route::get('/check-id/{id}', [AdminEmployeeController::class, 'check'])->name('check');
            Route::get('/service/employee', [ServiceController::class, 'getEmployeeServices'])->name('getemployeeservice');
            Route::post('/bulk', [AdminEmployeeController::class, 'bulkStore'])->name('bulk');
        });

        Route::prefix('/admin/appointment')->name('admin.appointment.')->group(function () {
            Route::get('/', [AdminAppointmentController::class, 'index'])->name('index');
            Route::post('/store', [AdminAppointmentController::class, 'store'])->name('store');
            Route::get('/{id}', [AdminAppointmentController::class, 'show'])->name('show');
            Route::put('/{id}/edit', [AdminAppointmentController::class, 'edit'])->name('edit');
            Route::put('/{app_id}/status', [AdminAppointmentController::class, 'update'])->name('update');
            Route::get('/student/{id}', [AdminAppointmentController::class, 'showStudent']);
            Route::get('/employee/{id}', [AdminAppointmentController::class, 'showEmployee']);
            Route::get('/get-time/{id}/{date}', [AppointmentController::class, 'getAvailableTime'])->name('getAvailableTime');
            Route::post('/bulk', [AdminAppointmentController::class, 'bulkBook'])->name('bulk');
        });

        Route::prefix('/admin/archives')->name('admin.archive.')->group(function () {
            Route::get('/', [AdminArchiveController::class, 'index'])->name('index');
            Route::put('/{id}/student/unarchive', [AdminStudentController::class, 'unarchive'])->name('student.unarchive');
            Route::put('/{id}/employee/unarchive', [AdminEmployeeController::class, 'unarchive'])->name('employee.unarchive');
        });

        Route::get('/admin/report', [AdminReportsController::class, 'index'])->name('admin.reports');
        Route::get('/admin/report/monthly-report', [AdminReportsController::class, 'monthlyReport'])->name('admin.reports.monthly');
        Route::get('/admin/report/daily-report', [AdminReportsController::class, 'dailyReport'])->name('admin.reports.daily');

        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('/admin/dentist/create', [AdminUserController::class, 'create'])->name('admin.dentist.create');
        Route::post('/admin/dentist/store', [AdminUserController::class, 'store'])->name('admin.dentist.store');
        Route::get('/admin/assistant/create', [AdminUserController::class, 'createAssistant'])->name('admin.assistant.create');
        Route::post('/admin/assistant/store', [AdminUserController::class, 'storeAssistant'])->name('admin.assistant.store');
        Route::get('/admin/users/{id}', [AdminUserController::class, 'show'])->name('admin.user.show');
        Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/admin/users/{id}/update', [AdminUserController::class, 'update'])->name('admin.user.update');

        Route::prefix('/admin/departments')->name('admin.departments.')->group(function () {
            Route::get('/', [DepartmentController::class, 'index'])->name('index');
            Route::post('/store', [DepartmentController::class, 'store'])->name('store');
            Route::put('/update', [DepartmentController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [DepartmentController::class, 'destroy'])->name('delete');
        });

        Route::prefix('/admin/schools')->name('admin.schools.')->group(function () {
            Route::get('/', [SchoolController::class, 'index'])->name('index');
            Route::post('/store', [SchoolController::class, 'store'])->name('store');
            Route::put('/update', [SchoolController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [SchoolController::class, 'destroy'])->name('delete');
        });

        Route::prefix('/admin/courses')->name('admin.courses.')->group(function () {
            Route::get('/', [AdminCourseController::class, 'show'])->name('show');
            Route::post('/store', [AdminCourseController::class, 'store'])->name('store');
            Route::put('/update', [AdminCourseController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [AdminCourseController::class, 'destroy'])->name('delete');
        });

        Route::prefix('/admin/services')->name('admin.services.')->group(function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::post('/store', [ServiceController::class, 'store'])->name('store');
            Route::put('/update', [ServiceController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [ServiceController::class, 'destroy'])->name('delete');
            Route::get('/annual', [ServiceController::class, 'getAnnualServices'])->name('admin.getannualservices');
            Route::get('/regular', [ServiceController::class, 'getRegularServices'])->name('admin.getregularservices');
            Route::get('/employee', [ServiceController::class, 'getEmployeeServices'])->name('admin.getemployeeservice');
        });


        Route::put('/admin/ohc/{exam_id}/update', [AdminExaminationController::class, 'update'])->name('admin.ohc.update');
        Route::put('/admin/chart/update', [AdminChartController::class, 'update'])->name('admin.chart.update');
    });
    
    Route::middleware(['auth', 'dentist'])->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::prefix('student')->name('student.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::put('/{id}/update', [StudentController::class, 'update'])->name('update');
            Route::get('/{id}', [StudentController::class, 'show'])->name('show');
            Route::delete('/{id}/delete', [StudentController::class, 'destroy'])->name('delete');
            Route::post('/{id}/create', [TreatmentRecordController::class, 'store'])->name('treatment.store');
            Route::put('/{record_id}/treatment/update', [TreatmentRecordController::class, 'update'])->name('treatment.update');
            Route::get('/courses/{id}', [CourseController::class, 'index'])->name('course.index');
            Route::put('/{id}/archive', [StudentController::class, 'archive'])->name('archive');
            Route::get('/check-id/{id}', [StudentController::class, 'check'])->name('check');
            Route::get('/service/annual', [ServiceController::class, 'getAnnualServices'])->name('getannualservices');
            Route::get('/service/regular', [ServiceController::class, 'getRegularServices'])->name('getregularservices');
            Route::get('/print/record/{id}', [StudentController::class, 'printRecord'])->name('record');
            Route::get('/print/certificate/{id}', [StudentController::class, 'printCertificate'])->name('cert');
        });

        Route::prefix('employee')->name('employee.')->group(function () {
            Route::get('/', [EmployeeController::class, 'index'])->name('index');
            Route::post('/store', [EmployeeController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('edit');
            Route::put('/{id}/update', [EmployeeController::class, 'update'])->name('update');
            Route::get('/{id}', [EmployeeController::class, 'show'])->name('show');
            Route::delete('/{id}/delete', [EmployeeController::class, 'destroy'])->name('delete');
            Route::post('/{id}/create', [TreatmentRecordController::class, 'store'])->name('treatment.store');
            Route::put('/{record_id}/treatment/update', [TreatmentRecordController::class, 'update'])->name('treatment.update');
            Route::put('/{id}/archive', [EmployeeController::class, 'archive'])->name('archive');
            Route::get('/check-id/{id}', [EmployeeController::class, 'check'])->name('check');
            Route::get('/service/employee', [ServiceController::class, 'getEmployeeServices'])->name('getemployeeservice');
            Route::get('/print/record/{id}', [EmployeeController::class, 'printRecord'])->name('record');
            Route::get('/print/certificate/{id}', [EmployeeController::class, 'printCertificate'])->name('cert');
        });

        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::get('/', [AppointmentController::class, 'index'])->name('index');
            Route::post('/store', [AppointmentController::class, 'store'])->name('store');
            Route::get('/{id}', [AppointmentController::class, 'show'])->name('show');
            Route::put('/{id}/edit', [AppointmentController::class, 'edit'])->name('edit');
            Route::put('/{id}/status', [AppointmentController::class, 'update'])->name('update');
            Route::get('/student/{id}', [AppointmentController::class, 'showStudent'])->name('showStudent');
            Route::get('/employee/{id}', [AppointmentController::class, 'showEmployee'])->name('showEmployee');
            Route::get('/get-time/{id}/{date}', [AppointmentController::class, 'getAvailableTime'])->name('getAvailableTime');
        });

        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::post('/notifications/seen', [NotificationController::class, 'update'])->name('notifications.seen');

        Route::prefix('report')->name('reports.')->group(function () {
            Route::get('/', [ReportsController::class, 'index']);
            Route::get('/report/monthly-report', [ReportsController::class, 'monthlyReport'])->name('monthly');
            Route::get('/report/daily-report', [ReportsController::class, 'dailyReport'])->name('daily');
        });

        Route::put('/ohc/{exam_id}/update', [DentalExaminationController::class, 'update'])->name('ohc.update');
        Route::put('/chart/update', [DentalChartController::class, 'update'])->name('chart.update');

        Route::prefix('availability')->name('availability.')->group(function () {
            Route::get('/', [DentistAvailabilityController::class, 'index'])->name('index');
            Route::post('/store', [DentistAvailabilityController::class, 'store'])->name('store');
            Route::put('/{id}/', [DentistAvailabilityController::class, 'update'])->name('update');
        });

        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [DentistProfileController::class, 'index'])->name('index');
            Route::put('/update/{id}', [DentistProfileController::class, 'update'])->name('update');
        });
    });

    Route::middleware(['auth', 'assistant'])->group(function () {
        Route::get('/assistant', [AssistantDashboardController::class, 'index'])->name('index');

        Route::prefix('/assistant/student')->name('assistant.student.')->group(function () {
            Route::get('/', [AssistantStudentController::class, 'index'])->name('index');
            Route::post('/store', [AssistantStudentController::class, 'store'])->name('store');
            Route::put('/{id}/update', [AssistantStudentController::class, 'update'])->name('update');
            Route::get('/{id}', [AssistantStudentController::class, 'show'])->name('show');
            Route::get('/courses/{id}', [AssistantCourseController::class, 'index'])->name('course.index');
            Route::get('/check-id/{id}', [AssistantStudentController::class, 'check'])->name('check');
        });

        Route::prefix('/assistant/employee')->name('assistant.employee.')->group(function () {
            Route::get('/', [AssistantEmployeeController::class, 'index'])->name('index');
            Route::post('/store', [AssistantEmployeeController::class, 'store'])->name('store');
            Route::put('/{id}/update', [AssistantEmployeeController::class, 'update'])->name('update');
            Route::get('/{id}', [AssistantEmployeeController::class, 'show'])->name('show');
            Route::get('/check-id/{id}', [AssistantEmployeeController::class, 'check'])->name('check');
        });

        Route::prefix('/assistant/appointment')->name('assistant.appointment.')->group(function () {
            Route::get('/', [AssistantAppointmentController::class, 'index'])->name('index');
            Route::post('/store', [AssistantAppointmentController::class, 'store'])->name('store');
            Route::get('/{id}', [AssistantAppointmentController::class, 'show'])->name('show');
            Route::put('/{id}/edit', [AssistantAppointmentController::class, 'edit'])->name('edit');
            Route::put('/{app_id}/status', [AssistantAppointmentController::class, 'update'])->name('update');
            Route::get('/student/{id}', [AssistantAppointmentController::class, 'showStudent'])->name('showStudent');
            Route::get('/employee/{id}', [AssistantAppointmentController::class, 'showEmployee'])->name('showEmployee');
            Route::get('/get-time/{id}/{date}', [AssistantAppointmentController::class, 'getAvailableTime'])->name('getAvailableTime');
        });

        Route::get('/assistant/notifications', [AssistantNotificationController::class, 'index'])->name('assistant.notifications');
        Route::post('/assistant/notifications/seen', [AssistantNotificationController::class, 'update'])->name('assistant.notifications.seen');

        Route::get('/assistant/service/annual', [ServiceController::class, 'getAnnualServices'])->name('assistant.getannualservices');
        Route::get('/assistant/service/regular', [ServiceController::class, 'getRegularServices'])->name('assistant.getregularservices');
        Route::get('/assistant/service/employee', [ServiceController::class, 'getEmployeeServices'])->name('assistant.getemployeeservice');
    });

    Route::middleware(['auth', 'patient'])->group(function () {
        Route::get('/patient', [PatientController::class, 'index'])->name('patient.index');
        Route::get('/patient/appointments', [PatientAppointmentController::class, 'index'])->name('patient.appointments');
        Route::get('/patient/appointments/{id}', [PatientAppointmentController::class, 'show'])->name('patient.appointments.show');
        Route::put('/patient/appointments/{id}/edit', [PatientAppointmentController::class, 'edit'])->name('patient.appointments.edit');
        Route::post('/patient/appointments/store', [PatientAppointmentController::class, 'store'])->name('patient.appointments.store');
        Route::put('/patient/appointments/{app_id}/status', [PatientAppointmentController::class, 'update'])->name('patient.appointments.update');
        Route::get('/patient/appointments/get-time/{id}/{date}', [AppointmentController::class, 'getAvailableTime'])->name('patient.appointments.getAvailableTime');

        Route::get('/patient/profile', [ProfileController::class, 'index'])->name('patient.profile');
        Route::get('/patient/user', [ProfileController::class, 'user'])->name('patient.user');
        Route::put('/patient/user/update', [ProfileController::class, 'update'])->name('patient.user.update');

        Route::get('/patient/notifications', [PatientNotificationController::class, 'index'])->name('patient.notifications');
        Route::post('/patient/notifications/seen', [PatientNotificationController::class, 'update'])->name('patient.notifications.seen');

        Route::get('/patient/service/annual', [ServiceController::class, 'getAnnualServices'])->name('patient.getannualservices');
        Route::get('/patient/service/regular', [ServiceController::class, 'getRegularServices'])->name('patient.getregularservices');
        Route::get('/patient/service/employee', [ServiceController::class, 'getEmployeeServices'])->name('patient.getemployeeservice');
    });
});
