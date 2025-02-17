@extends('layouts.apps')

@section('content')
<div class="auth-container">
    <h1>Login</h1>
    @if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif
    <form action="{{ route('user.login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('user.register') }}">Register here</a>.</p>
</div>
@endsection