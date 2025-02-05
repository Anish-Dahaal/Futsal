@extends('layouts.apps')

@section('content')
<div class="slider">
    <img src="{{ asset('images/slider.jpg') }}" alt="Slider Image">
</div>
<br>
<div style="text-align: center;">
    <h1>Futsals</h1>
</div>

<div class="futsal-photos">
    <div class="photo-container">
        <img src="{{ asset('images/futsal1.jpg') }}" alt="Futsal 1">
        <p class="photo-caption">Futsal Court 1</p>
    </div>
    <div class="photo-container">
        <img src="{{ asset('images/futsal2.jpg') }}" alt="Futsal 2">
        <p class="photo-caption">Futsal Court 2</p>
    </div>
    <div class="photo-container">
        <img src="{{ asset('images/futsal3.jpg') }}" alt="Futsal 3">
        <p class="photo-caption">Futsal Court 3</p>
    </div>
</div>

@endsection