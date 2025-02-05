<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FutsalController extends Controller
{
    public function futsals(){

        return view('futsals');
        
    }
    public function gethome(){

        return view('temp');
    }

    public function bookings()
     {
        return view('bookings');
     }
 
     public function store(Request $request)
     {
         // Validate the form data
         $request->validate([
             'futsal' => 'required|string',
             'date' => 'required|date',
             'time' => 'required',
             'duration' => 'required|numeric|min:1|max:5',
         ]);
 
         // For now, just return a success message
         return redirect()->route('bookings')->with('success', 'Booking successful!');
     }
}