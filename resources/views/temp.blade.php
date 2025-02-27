@extends('layouts.apps')

@section('content')
    <!-- Slider Section -->
    <div id="futsalSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slider1.jpg') }}" class="d-block w-100" alt="Slider Image" style="opacity: 85%;">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.3);"></div>
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h1 class="text-white fw-bold" style="font-size: 63px">Game on!
                        <br> Secure your futsal
                        match in seconds.
                    </h1>
                    <a href="{{ route('bookings.index') }}" class="btn btn-lg shadow book-btn"
                        style="color:white;background-color:red;width:22%; border-radius:20px">Book Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Heading -->
    <div class="text-center my-4">
        <h1 style="font-size: 4.3rem; font-family: 'Times New Roman', Times, serif;font-weight:bold">Futsals</h1>
    </div>

    <!-- Futsal Photos -->
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <img src="{{ asset('images/futsal3.jpg') }}" class="card-img-top" alt="Futsal 1">
                    <div class="card-body">
                        <p class="card-text"
                            style="font-size: 1.6rem; font-family: 'Times New Roman', Times, serif; font-weight:bold">Futsal
                            Court 1</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <img src="{{ asset('images/futsal1.jpg') }}" class="card-img-top" alt="Futsal 2">
                    <div class="card-body">
                        <p class="card-text"
                            style="font-size: 1.6rem; font-family: 'Times New Roman', Times, serif;font-weight:bold">Futsal
                            Court 2</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <img src="{{ asset('images/futsal3.jpg') }}" class="card-img-top" alt="Futsal 3">
                    <div class="card-body">
                        <p class="card-text"
                            style="font-size: 1.6rem; font-family: 'Times New Roman', Times, serif;font-weight:bold">Futsal
                            Court 3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- About Us --}}

    <div class="text-center my-4">
        <h1 style="font-size: 4.3rem; font-family: 'Times New Roman', Times, serif;font-weight:bold"> Our Story</h1>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <p style="text-align: justify !important;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit.
                    Mauris
                    consequat consequat enim, non auctormassa ultrices non. Morbi sed odio massa. Quisque at vehicula
                    tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                    ridiculus mus. Maecenas varius
                    egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et
                    netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis.
                    <br>
                    <br>Nullam
                    eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae
                    nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis
                    diam faucibus et. Morbi a tempor elit.
                    <br>
                    <br>
                    Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam
                    aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut
                    gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis.
                    <br>
                    <br>
                    Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut
                    sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac
                    ligula.
                    Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut
                    sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac
                    ligula.
                </p>
            </div>
            <div class="col-md-5">
                <div class="abt-img-container position-relative"> <!-- Added position-relative class -->
                    <img src="{{ asset('images/story1.jpg') }}" class="h-10"
                        style=" padding-bottom: 20px; padding-left: 20px;">

                    <div class="bor position-absolute bottom-0 start-0 end-0" style="padding-top: 20px;"></div>
                    <!-- Added position-absolute and utility classes -->
                </div>
            </div>
        </div>
    </div>
    </section>
    <section class="abt-body">
        <div class="container">
            <div class="row">
                <div class="col-md-7 order-2 order-lg-2 order-md-2 order-sm-1">
                    <p style="text-align: justify !important;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit.
                        Mauris
                        consequat consequat enim, non auctormassa ultrices non. Morbi sed odio massa. Quisque at vehicula
                        tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. Maecenas varius
                        egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et
                        netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis.
                        <br>
                        <br>Nullam
                        eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae
                        nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis
                        diam faucibus et. Morbi a tempor elit.
                        <br>
                        <br>
                        Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam
                        aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut
                        gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis.
                        <br>
                        <br>
                        Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut
                        sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac
                        ligula.
                        Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut
                        sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac
                        ligula.
                    </p>
                </div>
                <div class="col-md-5 order-1 order-lg-1 order-md-1 order-sm-2 ">
                    <div class="abt-img-container position-relative"> <!-- Added position-relative class -->
                        <img src="{{ asset('images/story2.jpg') }}" class=" "
                            style="vertical-align: middle; padding-bottom: 20px; padding-left: 20px;">
                        <div class="bor position-absolute bottom-0 start-0 end-0" style="padding-top: 20px;"></div>
                        <!-- Added position-absolute and utility classes -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
