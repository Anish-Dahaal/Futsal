<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Futsal;
use Illuminate\Support\Facades\Storage;

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

    public function postAddFutsal(Request $request)
    {
    // Validate the form data
    $request->validate([
        'futsal_name' => 'required|string|max:255',
        'location' => 'required|string',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'futsal_id' => 'required|string|unique:futsals',
        'price_per_hour' => 'required|numeric|min:0'
    ]);

    try {
        // Handle file upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('futsal_photos', 'public');
        }

        // Create new futsal record with user_id
        $futsal = Futsal::create([
            'futsal_name' => $request->futsal_name,
            'location' => $request->location,
            'photo' => $photoPath,
            'futsal_id' => $request->futsal_id,
            'price_per_hour' => $request->price_per_hour,
            'user_id' => auth()->id() // Add the authenticated user's ID
        ]);

        return redirect()->back()->with('status', 'Futsal added successfully!');

    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->withErrors(['error' => 'Failed to add futsal. Please try again.']);
    }
    }

    public function edit($id)
{
    // Fetch the futsal to edit
    $futsal = Futsal::findOrFail($id);

    // Ensure the authenticated user owns the futsal
    // if ($futsal->user_id !== auth()->id()) {
    //     return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
    // }

    return view('layouts.partials.edit', compact('futsal'));
}

public function getUpdateFutsal(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'futsal_name' => 'required|string|max:255',
        'location' => 'required|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'price_per_hour' => 'required|numeric|min:0',
    ]);
    

    // Fetch the futsal to update
    $futsal = Futsal::findOrFail($id);

    // // Ensure the authenticated user owns the futsal
    // if ($futsal->user_id !== auth()->id()) {
    //     return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
    // }

    // Handle file upload
    if ($request->hasFile('photo')) {
        // Delete the old photo if it exists
        if ($futsal->photo && Storage::disk('public')->exists($futsal->photo)) {
            Storage::disk('public')->delete($futsal->photo);
        }
        $photoPath = $request->file('photo')->store('futsal_photos', 'public');
    } else {
        $photoPath = $futsal->photo;
    }

    // Update the futsal record
    $futsal->update([
        'futsal_name' => $request->futsal_name,
        'location' => $request->location,
        'photo' => $photoPath,
        'price_per_hour' => $request->price_per_hour,
    ]);

    return redirect()->route('billing')->with('status', 'Futsal updated successfully!');
}

public function getDeleteFutsal($id)
{
    // Fetch the futsal to delete
    $futsal = Futsal::findOrFail($id);

    // Ensure the authenticated user owns the futsal
    // if ($futsal->user_id !== auth()->id()) {
    //     return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
    // }

    // Delete the photo if it exists
    // if ($futsal->photo && Storage::disk('public')->exists($futsal->photo)) {
    //     Storage::disk('public/futsal_photos')->delete($futsal->photo);
    // }

    // Delete the futsal record
    $futsal->delete();

    return redirect()->route('getShowFutsal')->with('status', 'Futsal deleted successfully!');
}


}