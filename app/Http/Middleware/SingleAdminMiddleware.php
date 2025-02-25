<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SingleAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('singleAdmins')->check()) { // Assuming you have an `is_admin` column in the users table
            return $next($request);
        }

        // Redirect non-admin users with an error message
        return redirect('/admins/login')->with('error', 'You do not have permission to access this page.');
    }
}