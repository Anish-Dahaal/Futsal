<?php

namespace App\Http\Controllers;

use App\Models\Futsal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //    $logged_user = Auth::guard('frontUser')->user()->name;
    //    dd($logged_user);
        return view('bookings');
     }
 

    // public function postAddFutsal(Request $request)
    // {
    // // Validate the form data
    // $request->validate([
    //     'futsal_name' => 'required|string|max:255',
    //     'location' => 'required|string',
    //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     'futsal_id' => 'required|string',
    //     'price_per_hour' => 'required|numeric|min:0'
    // ]);

    // try {
    //     // Handle file upload
    //     $photoPath = null;
    //     if ($request->hasFile('photo')) {
    //         $photoPath = $request->file('photo')->store('futsal_photos', 'public');
    //     }

    //     // Create new futsal record
    //     $futsal = Futsal::create([
    //         'futsal_name' => $request->futsal_name,
    //         'location' => $request->location,
    //         'photo' => $photoPath,
    //         'futsal_id' => $request->futsal_id,
    //         'price_per_hour' => $request->price_per_hour
    //     ]);

    //     return redirect()->back()->with('status', 'Futsal added successfully!');

    // } catch (Exception $e) {
    //     return redirect()->back()
    //         ->withInput()
    //         ->withErrors(['error' => 'Failed to add futsal. Please try again.']);
    // }
    // }
}