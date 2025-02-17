<?php

// app/Models/Booking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    protected $fillable = [
        'futsal_name', 
        'booking_date', 
        'booking_time', 
        'duration', 
        'user_id', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}