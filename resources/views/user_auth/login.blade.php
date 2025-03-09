@extends('layouts.apps')

@section('content')
<div class="new-body">
<div class="login-container d-flex justify-content-center align-items-center">
    <div class="login-box">
        <div><h1 style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:200%; font-weight:bold; color:#1d0000;">Login</h1></div>

        @if(session('error'))
            <p class="login-error">{{ session('error') }}</p>
        @endif
<div class="form-login">
        <form action="{{ route('user.login') }}" method="POST">
            @csrf
            <div class="input-wrapper">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-wrapper">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
</div>
        <p class="register-link">Don't have an account? <a href="{{ route('user.register') }}">Register here</a>.</p>
    </div>
</div>
</div>
@endsection
