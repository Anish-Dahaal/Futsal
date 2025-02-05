@extends('layouts.apps')

@section('content')
<div class="booking-container">
    <h1>Bookings</h1>
    <p>Manage your futsal bookings here.</p>

    <!-- Booking Form -->
    <div class="booking-form">
        <h2>Make a Booking</h2>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="futsal_name">Futsal Name:</label>
                <input type="text" id="futsal_name" name="futsal_name" required>
            </div>
            <div class="form-group">
                <label for="booking_date">Booking Date:</label>
                <input type="date" id="booking_date" name="booking_date" required>
            </div>
            <div class="form-group">
                <label for="booking_time">Booking Time:</label>
                <input type="time" id="booking_time" name="booking_time" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration (hours):</label>
                <input type="number" id="duration" name="duration" min="1" max="5" required>
            </div>
            <button type="submit" class="btn-book">Book Now</button>
        </form>
    </div>

    <!-- Booking List -->
    <div class="booking-list">
        <h2>Your Bookings</h2>
        <table>
            <thead>
                <tr>
                    <th>Futsal Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Booking Row -->
                <tr>
                    <td>Futsal A</td>
                    <td>2023-10-15</td>
                    <td>16:00</td>
                    <td>2 hours</td>
                    <td>
                        <button class="btn-cancel">Cancel</button>
                    </td>
                </tr>
                <!-- Add more rows dynamically from the database -->
            </tbody>
        </table>
    </div>
</div>
@endsection