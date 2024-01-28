<?php

namespace App\Http\Controllers\PatientRole;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class ProfileController extends Controller
{

    public function index()
    {
        try {
            $user = Auth::user();
            $patient = Student::where('user_id', $user->id)->with('medicals')->get();

            if ($user->user_type === 'student') {
                $patient = Student::where('user_id', $user->id)->with('medicals')->get();
            } else {
                $patient = Employee::where('user_id', $user->id)->with('medicals')->get();
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the data');
        }

        return inertia('Patient/Profile/PatientRecord', [
            'patient' => $patient,
        ]);
    }

    public function user()
    {
        try {
            $user = Auth::user();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching the data');
        }

        return inertia('Patient/Profile/UserAccount', [
            'nuser' => $user
        ]);
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::user();
            $userRecord = User::where('id', $user->id)->first();

            $request->validate([
                'password' => 'nullable|string|min:8',
            ]);

            $userRecord->update([
                'password' => $request->password,
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }

        return redirect(route('patient.profile'))->with('success', 'User updated!');
    }
}
