<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('futsal_name');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('duration');
            $table->unsignedBigInteger('user_id'); // To store the logged-in user
            $table->string('status')->default('Pending'); // Status: Pending, Booked, Rejected
            $table->foreignId('futsal_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};