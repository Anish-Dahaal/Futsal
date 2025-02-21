<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Futsal; 

class DashboardController extends Controller
{
    public function dashboard(){
        return view('layouts.partials.dashboard');
    }

    public function billing(){
        $futsals = Futsal::all();
        return view('layouts.partials.billing', compact('futsals'));
    
    }

    public function profile(){
        return view('layouts.partials.profile');
    }

    public function getEditFutsal($id){
        $futsal = Futsal::find($id);

        return view('layouts.partials.edit', compact('futsal'));
    }    
    
    public function getShowFutsal(){
        $futsals = Futsal::all();
        return view('layouts.partials.show', compact('futsals'));
    
    }
}