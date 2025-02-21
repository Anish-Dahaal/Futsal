<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FutsalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\DashboardController;


Route::get('/gethome', [App\Http\Controllers\FutsalController::class, 'gethome'])->name('gethome');
Route::get('/futsals', [App\Http\Controllers\FutsalController::class, 'futsals'])->name('futsals');


Route::middleware(['frontUser'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
   
    // Route::get('/bookings', [BookingController::class, 'showBookingForm'])->name('bookings.futsal');
   
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/bookings/{id}', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::get('/maps', [MapController::class, 'maps'])->name('maps');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('user/login', 'showLoginForm')->name('user.login');
    Route::post('user/login', 'login');
    Route::get('user/register', 'showRegistrationForm')->name('user.register');
    Route::post('user/register', 'register');
    Route::get('user/logout', 'logout')->name('user.logout');
});


// Protected Route for Logged-in Users
Route::middleware('auth')->get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('home');

Route::middleware(['auth'])->group(function () {
// Admin Booking Routes
    Route::get('/tables', [AdminBookingController::class, 'tables'])->name('tables');
    Route::post('/bookings/{id}/update-status', [AdminBookingController::class, 'updateStatus'])->name('layouts.partials.tables.update-status');
    Route::delete('/bookings/{id}', [AdminBookingController::class, 'cancel'])->name('bookings.cancel');

    
    // Route::get('/add/futsal',[App\Http\Controllers\HomeController::class, 'getAddFutsal'])->name('getAddFutsal');
    Route::get('/billing' ,[DashboardController::class, 'billing'])->name('billing');
    Route::post('/add/futsal',[App\Http\Controllers\HomeController::class, 'postAddFutsal'])->name('postAddFutsal');
    Route::get('/show/futsal',[App\Http\Controllers\DashboardController::class, 'getShowFutsal'])->name('getShowFutsal');
    
    // Edit Futsal
    Route::get('/edit/futsal/{id?}',[App\Http\Controllers\DashboardController::class, 'getEditFutsal'])->name('getEdit');
    Route::get('/edit/futsal/{id}', [App\Http\Controllers\HomeController::class, 'getEditFutsal'])->name('getEditFutsal');

    // Update Futsal
    Route::put('update//futsal/{id}', [App\Http\Controllers\HomeController::class, 'getUpdateFutsal'])->name('getUpdateFutsal');

    // Delete Futsal
    Route::delete('delete/futsal/{id}', [App\Http\Controllers\HomeController::class, 'getDeleteFutsal'])->name('getDeleteFutsal');

    Route::get('/dashboard' ,[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile' ,[DashboardController::class, 'profile'])->name('profile');
    
});