<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Futsal extends Model
{
    protected $fillable = [
        'futsal_name',
        'location',
        'photo',
        'futsal_id',
        'price_per_hour',
        'user_id'
    ];
}