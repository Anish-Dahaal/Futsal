@extends('layouts.apps')

@section('content')
<div class="futsals-container">
    <h1>Futsals</h1>
    <div class="futsal-list">
        <div class="futsal-card">
            <img src="{{ asset('images/futsal1.jpg') }}" alt="Futsal 1">
            <h3>Futsal A</h3>
            <p>Location: Kathmandu</p>
            <p>Price: $10/hour</p>
            <button>Book Now</button>
        </div>
        <div class="futsal-card">
            <img src="{{ asset('images/futsal2.jpg') }}" alt="Futsal 2">
            <h3>Futsal B</h3>
            <p>Location: Pokhara</p>
            <p>Price: $12/hour</p>
            <a href="{{route('bookings')}}"><button>Book Now</button></a>
        </div>
        <!-- Add more futsal cards as needed -->
    </div>
</div>
@endsection