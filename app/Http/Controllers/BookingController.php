<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Store a new booking
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->get(); // Fetch bookings for the logged-in user
        return view('bookings', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'futsal_name' => 'required|string',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'duration' => 'required|integer|min:1|max:5',
        ]);

        $booking = new Booking();
        $booking->futsal_name = $request->futsal_name;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->duration = $request->duration;
        $booking->user_id = Auth::id(); // Get the logged-in user's ID
        $booking->status = 'Pending'; // Default status
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    // Cancel a booking
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Canceled';
        $booking->save();
    
        return redirect()->route('bookings.index')->with('success', 'Booking canceled successfully.');
    }
}