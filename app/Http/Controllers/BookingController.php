<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Futsal;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Store a new booking
    public function index()
    {
      
        $futsals = Futsal::all();
        // $bookings = Booking::with('futsal')->where('user_id', auth()->id())->get();
        $bookings = Booking::where('user_id', Auth::guard('frontUser')->id())->latest()->get(); // Fetch bookings for the logged-in user
        return view('bookings', compact('bookings', 'futsals'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'futsal_id' => 'required', 
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'duration' => 'required|integer|min:1|max:5',
        ]);



        // $data = $request->all();

        // dd($data);

        $futsal_name = Futsal::where('futsal_id', $request->futsal_id)->select('futsal_name')->first();
        
       // dd($futsal_name->futsal_name);

        $booking = new Booking();
        $booking->futsal_name = $futsal_name->futsal_name;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->duration = $request->duration;
        $booking->futsal_id = $request->futsal_id;
        $booking->user_id = Auth::guard('frontUser')->id(); // Get the logged-in user's ID
        $booking->status = 'pending'; // Default status
        $booking->save();


        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    // Cancel a booking
    public function cancel($id)
    {
        $booking = Booking::where('user_id', Auth::guard('frontUser')->id())
            ->findOrFail($id);
            
        if ($booking->status == 'Booked') {
            $booking->status = 'Canceled';
            $booking->save();
            return redirect()->route('bookings.index')
                ->with('success', 'Booking canceled successfully.');
        } elseif ($booking->status == 'pending') {
            $booking->status = 'Canceled';
            $booking->save();
            return redirect()->route('bookings.index')
                ->with('success', 'Booking request withdrawn successfully.');
        }

        return redirect()->route('bookings.index')
            ->with('error', 'Unable to cancel this booking.');
    }
}