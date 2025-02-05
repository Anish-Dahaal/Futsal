<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FutsalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\AuthController;

// Route::get('/home', function () {return view('temp');})->name('temp');
Route::get('/gethome', [App\Http\Controllers\FutsalController::class, 'gethome'])->name('gethome');
Route::get('/futsals', [App\Http\Controllers\FutsalController::class, 'futsals'])->name('futsals');
Route::get('/bookings', [App\Http\Controllers\FutsalController::class, 'bookings'])->name('bookings');
// Handle booking form submission
Route::post('/bookings', [App\Http\Controllers\FutsalController::class, 'store'])->name('bookings.store');

Route::get('/maps', [App\Http\Controllers\MapController::class, 'maps'])->name('maps');


Route::controller(AuthController::class)->group(function () {
    Route::get('user/login', 'showLoginForm')->name('user.login');
    Route::post('user/login', 'login');
    
    Route::get('user/register', 'showRegistrationForm')->name('user.register');
    Route::post('user/register', 'register');
    
    Route::post('user/logout', 'logout')->name('user.logout');
});

// Protected Route for Logged-in Users
Route::middleware('auth')->get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('home');

Route::get('/add/futsal',[App\Http\Controllers\HomeController::class, 'getAddFutsal'])->name('getAddFutsal');
Route::post('/add/futsal',[App\Http\Controllers\HomeController::class, 'postAddFutsal'])->name('postAddFutsal');