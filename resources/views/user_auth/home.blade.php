@extends('layouts.apps')

@section('content')
<div class="dashboard">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>You are now logged in!</p>
    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@endsection