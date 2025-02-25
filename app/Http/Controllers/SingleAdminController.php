<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use App\Models\Booking;
use App\Models\Futsal;


class SingleAdminController extends Controller
{
    public function showLogin ()
    {
        return view('single_futsal.signIn');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // if($request->isMethod('post'))
        // {
        //     dd($request->all());
        // }

        $single_admins = Admin::where('email', $request->email)->first();

        if ($single_admins && Hash::check($request->password, $single_admins->password)) {


            Auth::guard('singleAdmins')->login($single_admins);

            // dd("success");

            return redirect()->route('books');
        }

        // dd("error");

        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function showRegister ()
    {
        return view('single_futsal.registeration');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6'
        ]);

    //    if($request->isMethod('post'))
    //    {
    //     dd($request->all());
    //    }

        $single_admins = new Admin();
        $single_admins->owner_name = $request->name;
        $single_admins->owner_location = $request->location;
        $single_admins->phone_number = $request->phone;
        $single_admins->email = $request->email;
        $single_admins->password = Hash::make($request->password);
        $single_admins->save();

        return redirect()->route('showLogin')->with('success', 'Admin registered successfully.');
    }


    public function books(){
        // $books = Booking::with('user')->latest()->get();
        $futsal_id = Futsal::where('admin_id', Auth::guard('singleAdmins')->user()->id);
    
        $books = Booking::where('futsal_id', $futsal_id)->latest()->get();
        // $books = Booking::all();
        
        return view('single_futsal.books', compact('books'));
    }

    // Update booking status (Accept or Reject)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Booked,Rejected', // Ensure status is either Booked or Rejected
        ]);

        $book = Booking::findOrFail($id);
        $book->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
    public function cancel($id)
    {
        $book = Booking::findOrFail($id);
        $book->status = 'Rejected';
        $book->save();

        return redirect()->back()->with('success', 'Booking rejected successfully.');
    }
}