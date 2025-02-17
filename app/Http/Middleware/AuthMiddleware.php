<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // if (!Session::has('user_id')) {
        //     return redirect('/user_auth/login')->with('error', 'You must log in first.');
        // }
        if(Auth::guard('frontUser')->check())
        {
            return $next($request);
        }
        return redirect()->route('user.login')->with('error', 'You must log in first.');
    }
}