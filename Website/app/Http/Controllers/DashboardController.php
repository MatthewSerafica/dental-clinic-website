<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return inertia(
            'Dashboard/Dashboard',
            [
                'message' => 'Hello from Coderunners!'
            ]
        );
    }

    public function show()
    {
        return inertia('Dashboard/Show');
    }
}
