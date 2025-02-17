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
                    <label for="futsal_name" style="font-size: 20px;">Futsal Name:</label>
                    <select id="futsal_name" name="futsal_name" required>
                        <option value="">Select a Futsal</option>
                        <option value="pokhara_futsal_arena">Pokhara Futsal Arena</option>
                        <option value="abc_futsal">ABC Futsal Pvt Ltd</option>
                        <option value="forest_sports_arena">Forest Sports Arena</option>
                        <option value="sports_castle_pokhara">Sports Castle Pokhara</option>
                        <option value="sabin_memorial_fc">Sabin Memorial FC</option>
                        <option value="ammarsingh_sports_center">Ammarsingh Sports Center Pvt. Ltd.</option>
                        <option value="barahi_futsal_arena">Barahi Futsal Arena</option>
                        <option value="mustang_chowk_futsal">Mustang Chowk Futsal</option>
                        <option value="hemja_sports_center">Hemja Sports Center Pvt. Ltd.</option>
                        <option value="ranipauwa_sports_center">Ranipauwa Sports Center</option>
                        <option value="khelkunj_arena">Khelkunj Arena Swimming Pool and Futsal</option>
                    </select>
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

        <!-- Booking Details -->
        <div class="booking-details">
            <h2>Your Bookings</h2>
            <table>
                <thead>
                    <tr>
                        <th>Futsal Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->futsal_name }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->booking_time }}</td>
                            <td>{{ $booking->duration }} hours</td>
                            <td>{{ $booking->status }}</td>
                            <td>
                                <span
                                    class="badge {{ $booking->status == 'pending'
                                        ? 'bg-warning'
                                        : ($booking->status == 'Booked'
                                            ? 'bg-success'
                                            : ($booking->status == 'Rejected'
                                                ? 'bg-danger'
                                                : ($booking->status == 'Canceled'
                                                    ? 'bg-secondary'
                                                    : 'bg-info'))) }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td>
                                @if ($booking->status == 'pending' || $booking->status == 'Booked')
                                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to cancel this booking?')">
                                            Cancel
                                        </button>
                                    </form>
                                @endif
                            </td>

                            {{-- <td>
                                @if ($booking->status == 'pending' || $booking->status == 'booked')
                                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            style="color: black !important;">Cancel</button>
                                    </form>
                                @endif
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
