<?php

namespace App\Http\Controllers\PatientRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientNotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = $request->user()->notifications()->get();
        return response()->json(['notifications' => $notifications]);
    }

    public function update()
    {
        $user = Auth::user();
        $user->notifications->markAsRead();
    }

}
