<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($credentials, true)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

        if (!auth()->user()->is_active) {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => ('Account is deactivated')
            ]);
        }

        $request->session()->regenerate();

        $userType = auth()->user()->user_type;
        $redirectRoute = '';

        switch ($userType) {
            case 'dentist':
                $redirectRoute = '/';
                break;
            case 'assistant':
                $redirectRoute = '/assistant';
                break;
            case 'admin':
                $redirectRoute = '/admin';
                break;
            case 'employee':
            case 'student':
                $redirectRoute = '/patient';
                break;
        }

        return redirect()->intended($redirectRoute);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
