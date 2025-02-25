<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\FrontUser;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
// Show Login Form
    public function showLoginForm()
    {
        return view('user_auth.login');
    }

    // Handle Login Request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $front_users = FrontUser::where('email', $request->email)->first();

        if ($front_users && Hash::check($request->password, $front_users->password)) {
            // Session::put('user_id', $front_users->id);
            // Session::put('user_name', $front_users->name);
            Auth::guard('frontUser')->login($front_users);

            return redirect()->route('futsals');


            return redirect('/futsals');
        }

        return back()->with('error', 'Invalid credentials');
    }


    // Show Registration Form
    public function showRegistrationForm()
    {
        return view('user_auth.register');
    }

    // Handle User Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // dd($request->all());

        $front_users = new FrontUser();
        $front_users->name = $request->name;
        $front_users->email = $request->email;
        $front_users->password = Hash::make($request->password);
        $front_users->save();

        return redirect()->route('user.login')->with('success', 'Registration successful! Please login.');
    }

    // Handle Logout
    public function logout(Request $request)
    {
        // Auth::guard('web')->logout();
        // $request->session()->invalidate();
        Auth::guard('frontUser')->logout();

        return redirect()->route('user.login')->with('success', 'You have been logged out.');
    }
}