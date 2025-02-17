<?php

namespace App\Http\Controllers;

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
 
    
}