@extends('layouts.apps')

@section('content')
<div class="new-body">
    <div class="registration-wrapper">
        
        
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

     
        <div class="form-register">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
            <h1 style="font-weight: 500; background-color:rgb(168, 166, 171); border-radius: 25px; color:rgb(46, 46, 44)" >Register</h1>
        <form action="{{ route('user.postRegister') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-block">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name">
            </div>
            
            <div class="input-block">
                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="contact">
            </div>
            <div class="input-block">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="date_of_birth">
            </div>
            <div class="input-block">
                <label for="address">Address</label>
                <input type="text" id="address" name="address">
            </div>
            <div class="input-block">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" id="profile_picture" name="user_photo">
            </div>
            <div class="input-block">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="input-block">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            {{-- <div class="input-block">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div> --}}
            <button type="submit">Register</button>
            <button type="reset">Reset</button>
        </form>
        </div>
        <p>Already have an account? <a href="{{ route('user.login') }}">Login here</a>.</p>
    </div>
</div>
@endsection
