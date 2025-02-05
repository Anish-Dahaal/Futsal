<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Futsal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    

    public function getAddFutsal(){
        return view('admin.futsal.add');
    }

    public function postAddFutsal(Request $request){

        $request->validate([
            'futsal_name' => 'required|string|max:255',
            'futsal_id' => 'required|integer|unique:futsals,futsal_id',
            'location' => 'required|string',
            'price_per_hour' => 'required|numeric|min:0',
            'status' => 'required|in:open,closed',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        
        //photo lai variable maa store gareko
        $photo = $request->file('photo');
       
            //photo ko extension name taaneko
            $extension = $photo->getClientOriginalExtension();
            
            //unique time ra photo extension milaayera photo ko name banaako
            $photoname = time(). '.' . $extension;
            
            //photo lai tei name maa server maaa move gareko
            $photo->move('uploads/futsals/', $photoname);
            
        $futsal = New Futsal;
        $futsal->futsal_name = $request->input('futsal_name');
        $futsal->futsal_id = $request->futsal_id;
        $futsal->location = $request->input('location');
        $futsal->price_per_hour = $request->price_per_hour;
        $futsal->status = $request->input('status');
        
            $futsal->photo = $photoname;
        
        $futsal->save();
        return redirect()->back()->with('status', 'Futsal added successfully');
    }
}