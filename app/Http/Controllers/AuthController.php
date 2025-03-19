<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\FrontUser;
use Exception;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
// Show Login Form
    public function showLoginForm()
    {
        return view('user_auth.login');
    }

    // Handle Login Request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $front_users = FrontUser::where('email', $request->email)->first();

        if ($front_users && Hash::check($request->password, $front_users->password)) {
            // Session::put('user_id', $front_users->id);
            // Session::put('user_name', $front_users->name);
            Auth::guard('frontUser')->login($front_users);

            return redirect()->route('futsals');


            // 
        }

        return back()->with('error', 'Invalid credentials');
    }


    // Show Registration Form
    public function showRegistrationForm()
    {
        return view('user_auth.register');
    }

    // Handle User Registration
    public function register(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            //echo "<pre>"; print_r($data); die;


            $request->validate([
                'name' => 'required',
                'contact'=> 'required',
                'date_of_birth'=> 'required',
                'address'=> 'string|required',
                'user_photo'=> 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ]);
    
            
            $data = $request->all();
    
           //dd($data);
        try{
            if ($request->hasFile('user_photo')  && $request->file('user_photo')->isValid()) {
    
                //dd($data);
                // $photoNeed = $request->file('user_photo')->store('user_photos', 'public');
                $image = $request->file('user_photo');
    
                $imageEXtension = $image->getClientOriginalExtension();
    
                $imageName = time().'.'.$imageEXtension;
    
                //dd($imageName);
    
                $image->storeAs('user_photos', $imageName, 'public');
        }else
        {
            $imageName = '';
        }
            // dd($request->all());
            //echo "<pre>"; print_r($photoNeed); die;
    
            $front_users = new FrontUser();
            $front_users->name = $request->name;
            $front_users->contact = $request->contact;
            $front_users->date_of_birth = $request->date_of_birth;
            $front_users->user_photo = $imageName;
            $front_users->address = $request->address;
            $front_users->email = $request->email;
            $front_users->password = Hash::make($request->password);
            $front_users->save();
    
            return redirect()->route('user.login')->with('success', 'Registration successful! Please login.');
        }
        catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to register. Please try again.']);
        }

        }
        

       
    }

    // Handle Logout
    public function logout(Request $request)
    {
        // Auth::guard('web')->logout();
        // $request->session()->invalidate();
        Auth::guard('frontUser')->logout();

        return redirect()->route('user.login')->with('success', 'You have been logged out.');
    }
}