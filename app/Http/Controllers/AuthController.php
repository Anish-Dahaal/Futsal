<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
'password' => 'required|min:6',
]);

$credentials = $request->only('email', 'password');

if (Auth::guard('web')->attempt($credentials)) {
return redirect()->intended(route('user.home'))->with('success', 'Welcome back!');
}

return back()->withErrors(['email' => 'Invalid login credentials.']);
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
'name' => 'required|string|max:255',
'email' => 'required|string|email|max:255|unique:users',
'password' => 'required|string|min:8|confirmed',
]);

$user = User::create([
'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
]);

return redirect()->route('user.login')->with('success', 'Registration successful! Please log in.');
}

// Handle Logout
public function logout(Request $request)
{
Auth::guard('web')->logout();
$request->session()->invalidate();
return redirect()->route('user.login')->with('success', 'You have been logged out.');
}
}