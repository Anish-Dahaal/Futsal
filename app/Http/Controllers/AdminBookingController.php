<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    // Display all bookings for admin
    public function tables(){
        $bookings = Booking::with('user')->get();
        // $bookings = json_decode(json_encode($bookings), true);

        // echo "<pre>"; print_r($bookings); echo "</pre>";
        // Fetch bookings with user details
        return view('layouts.partials.tables', compact('bookings'));
    }

    // Update booking status (Accept or Reject)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Booked,Rejected', // Ensure status is either Booked or Rejected
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('layouts.partials.tables')->with('success', 'Booking status updated successfully.');
    }
}