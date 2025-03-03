@extends('layouts.apps')

@section('content')
<div class="new-body">
    <div class="registration-wrapper">
        
        
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div class="form-register">
            <h1 style="font-weight: 500; background-color:rgb(168, 166, 171); border-radius: 25px; color:rgb(46, 46, 44)" >Register</h1>
        <form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-block">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-block">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-block">
                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="contact" required>
            </div>
            <div class="input-block">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="input-block">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="input-block">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
            </div>
            <div class="input-block">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-block">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit">Register</button>
            <button type="reset">Reset</button>
        </form>
        </div>
        <p>Already have an account? <a href="{{ route('user.login') }}">Login here</a>.</p>
    </div>
</div>
@endsection
