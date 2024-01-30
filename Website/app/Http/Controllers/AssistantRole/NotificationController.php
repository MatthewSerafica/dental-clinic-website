<?php

namespace App\Http\Controllers\AssistantRole;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = $request->user()->notifications()->get();
        $notificationsWithUser = [];

        foreach ($notifications as $notification) {
            $data = $notification->data;

            $user = User::find($data['user_id']);

            $notificationsWithUser[] = [
                'notification' => $notification,
                'user_name' => $user->name,
            ];
        }
        return response()->json([
            'notifications' => $notificationsWithUser,
        ]);
    }

    public function update()
    {
        $user = Auth::user();
        $user->notifications->markAsRead();
    }
}