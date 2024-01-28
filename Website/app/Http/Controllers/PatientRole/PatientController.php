<?php

namespace App\Http\Controllers\PatientRole;


use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('user_id', auth()->id())->with('dentist')->where('status', 'approved')
            ->whereDate('app_date', '>=', now())->latest()->get();
        return inertia('Patient/Index', [
            'appointments' => $appointments,
        ]);
    }
}
