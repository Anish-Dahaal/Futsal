<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleAdminController extends Controller
{
    public function showLogin ()
    {
        return view('single_futsal.signIn');
    }

    public function showRegister ()
    {
        return view('single_futsal.registeration');
    }
}