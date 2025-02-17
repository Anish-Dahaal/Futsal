@extends('layouts.apps')

@section('content')
<div class="auth-container">
    <h1>Register</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('user.register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="{{ route('user.login') }}">Login here</a>.</p>
</div>
@endsection