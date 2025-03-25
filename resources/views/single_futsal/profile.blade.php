<!--
=========================================================
* Soft UI Dashboard 3 - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>
        Futsal Management
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" {{ route('books') }} " target="_blank">
                <img src="{{ asset('img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Futsal Dashboard</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Booking</span>
                    </a>
                </li>


                <?php
                    use App\Models\Futsal;

                    $has_futsal = Futsal::where('admin_id', Auth::guard('singleAdmins')->user()->id)->first();
                ?>

                @if(empty($has_futsal))


                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('getAdd') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Add Futsal</span>
                    </a>
                </li>

                @endif

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link  active" href="{{ route('adminProfile') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">{{ $futsal_name->futsal_name }}</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        {{-- <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div> --}}
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="dropdown-item" style="color:rgb(1, 1, 14)" href="{{ route('adminLogout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('adminLogout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- End Navbar -->
        <div class="user-card" style="max-width: 700px; margin: auto; padding: 30px; background: #f8f9fa; border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); text-align: center;">
            <div class="user-photos" style="display: flex; justify-content: center; gap: 15px; marg in-bottom: 20px;">
                <div class="photo-circle" style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 4px solid #007bff;">
                    <img src="{{ Storage::url($futsal_name->photo) }}" alt="photo1" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="photo-circle" style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 4px solid #007bff;">
                    <img src="img2.jpg" alt="photo2" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="photo-circle" style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 4px solid #007bff;">
                    <img src="img3.jpg" alt="photo3" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
            <h3 class="user-name" style="color: #333; font-weight: bold; margin-bottom: 10px; font-size: 22px;">Alec Thompson</h3>
            <p class="user-role" style="color: #777; margin-bottom: 15px; font-size: 16px;">CEO / Co-Founder</p>
            <div class="user-info" style="text-align: left; font-size: 16px; color: #444; line-height: 1.8;">
                <p><strong>Address:</strong> 123 Main Street, Cityville</p>
                <p><strong>Location:</strong> New York, USA</p>
                <p><strong>Phone:</strong> +1 234 567 890</p>
                <p><strong>Email:</strong> alec@example.com</p>
            </div>
        </div>
          {{-- <div class="container-fluid">
            <div class="page-header min-height-250 border-radius-lg mt-4 d-flex flex-column justify-content-end">
                <span class="mask bg-primary opacity-9"></span>
                <div class="w-100 position-relative p-3">
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl position-relative me-3">
                                <img src="{{ asset('img/bruce-mars.jpg') }}" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                            <div>
                                <h5 class="mb-1 text-white font-weight-bolder">
                                    Alec Thompson
                                </h5>
                                <p class="mb-0 text-white text-sm">
                                    CEO / Co-Founder
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="javascript:;" class="btn btn-outline-white mb-0 me-1 btn-sm">
                                Billing
                            </a>
                            <a href="javascript:;" class="btn btn-outline-white mb-0 btn-sm">
                                Payments
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Platform Settings</h6>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
                            <ul class="list-group">
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault">Email me when someone follows me</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault1">
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault1">Email me when someone answers on my
                                            post</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault2" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                                    </div>
                                </li>
                            </ul>
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6>
                            <ul class="list-group">
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault3">
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault3">New launches and projects</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault4" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault4">Monthly product updates</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0 pb-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault5">
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally
                                difficult paths, choose the one more painful in the short term (pain avoidance is
                                creating an illusion of equality).
                            </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                        Name:</strong> &nbsp; Alec M. Thompson</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Location:</strong> &nbsp; USA</li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-facebook fa-lg"></i>
                                    </a>
                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-instagram fa-lg"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Conversations</h6>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="{{ asset('img/kal-visuals-square.jpg') }}" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Sophie B.</h6>
                                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="{{ asset('img/marie.jpg') }}" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Anne Marie</h6>
                                        <p class="mb-0 text-xs">Awesome work, can you..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="{{ asset('img/ivana-square.jpg') }}" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Ivanna</h6>
                                        <p class="mb-0 text-xs">About files I can..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                    <div class="avatar me-3">
                                        <img src="{{ asset('img/team-4.jpg') }}" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Peterson</h6>
                                        <p class="mb-0 text-xs">Have a great afternoon..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0">
                                    <div class="avatar me-3">
                                        <img src="{{ asset('img/team-3.jpg') }}" alt="kal"
                                            class="border-radius-lg shadow">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                                    </div>
                                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">

                            <div class="col-lg-6">
                                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        Futsal Team
                                    </li>
                                    <li class="nav-item">

                                    </li>
                                    <li class="nav-item">

                                    </li>
                                    <li class="nav-item">

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </footer>
        </div> --}}
    </div>
    
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.1.0') }}"></script>
</body>

</html>
