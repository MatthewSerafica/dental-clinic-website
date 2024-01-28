<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userType = auth()->user()->user_type;
        if ($userType === 'student' || $userType === 'employee') {
            return $next($request);
        }
        /* abort(403, 'Unauthorized'); */
        return redirect('/login');
    }
}
