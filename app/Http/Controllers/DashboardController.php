<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('layouts.partials.dashboard');
    }

    public function billing(){
        return view('layouts.partials.billing');
    }

    public function profile(){
        return view('layouts.partials.profile');
    }

  
}