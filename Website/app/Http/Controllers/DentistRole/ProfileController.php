<?php

namespace App\Http\Controllers\DentistRole;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the data');
        }

        return inertia('Dentist/Profile/Index', [
            'nuser' => $user
        ]);
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::user();
            $userRecord = User::where('id', $user->id)->first();

            $request->validate([
                'email' => 'email',
                'password' => 'nullable|string|min:8',
            ]);

            $userRecord->update([
                'email' => $request->email,
                'password' => $request->password,
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
