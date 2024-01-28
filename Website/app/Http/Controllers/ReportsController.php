<?php

namespace App\Http\Controllers;

use App\Models\report;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReportsController extends Controller
{
    public function index()
    {
        return Inertia(
            'Report/Index'
        );
    }
}
