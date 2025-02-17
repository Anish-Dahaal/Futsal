<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('futsal_name');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('duration');
            $table->unsignedBigInteger('user_id'); // To store the logged-in user
            $table->string('status')->default('Pending'); // Status: Pending, Booked, Rejected
            $table->timestamps();
    
            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};