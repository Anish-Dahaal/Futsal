<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Futsal;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function userDashboard()
    {
           
        $futsals = Futsal::all();
        // $bookings = Booking::with('futsal')->where('user_id', auth()->id())->get();
        $bookings = Booking::with('futsal')->where('user_id', Auth::guard('frontUser')->id())->latest()->get(); // Fetch bookings for the logged-in user
        $bookings = json_decode(json_encode($bookings), true);

        // echo "<pre>"; print_r($bookings); die;

        // dd($futsals);
        return view('dashboard', compact('bookings', 'futsals'));
       
    }

    public function userProfile()
    {
        $futsals = Futsal::all();
        // $bookings = Booking::with('futsal')->where('user_id', auth()->id())->get();
        $bookings = Booking::with('futsal')->where('user_id', Auth::guard('frontUser')->id())->latest()->get(); // Fetch bookings for the logged-in user
        $bookings = json_decode(json_encode($bookings), true);

        return view('userProfile',compact('bookings','futsals'));
    }
}