<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Management System</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/logins.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('css')

</head>

<body >
    
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('gethome') }}">
                        <img src="{{ asset('images/logo.gif') }}" alt="Logo" width="40" height="40"
                            class="me-2">
                        <span>Futsal System</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('gethome') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('futsals') }}">Futsals</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('bookings.index') }}">Bookings</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('maps') }}">Maps</a></li>
                            @if (Auth::guard('frontUser')->check())
                                <li class="nav-item"><a class="nav-link btn btn-danger text-white"
                                        href="{{ route('user.logout') }}">Logout</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link btn  text-white"
                                        href="{{ route('user.login') }}">Login/Register</a></li>
                            @endif

                            @if(Auth::guard('frontUser')->check())

                            <div class="nav-link"> 
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ Storage::url('/user_photos/'.Auth::guard('frontUser')->user()->user_photo) }}" alt="Profile" class="profile-img me-2">
                                        <span>{{ Auth::guard('frontUser')->user()->name }}
                                            
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                        {{-- <li><a class="dropdown-item"  href="{{ route('user.dashboard') }} " >Dashboard</a></li> --}}
                                        <li><a class="dropdown-item" href="{{ route('user.profile') }}" >Profiles</a></li>
                                        <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Bookings</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="{{ route('user.logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                            </a>
                        </li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    <main>
        @yield('content')
        <!-- This is where the content of individual pages will be injected -->
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Futsal Management System</p>
    </footer>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dateInput = document.getElementById("booking_date");
        const timeInput = document.getElementById("booking_time");

        // Set the minimum date to today
        dateInput.setAttribute("min", new Date().toISOString().split("T")[0]);

        dateInput.addEventListener("change", function() {
            let today = new Date().toISOString().split("T")[0]; // Get today's date in YYYY-MM-DD format
            let now = new Date();
            let currentHour = now.getHours();
            let currentMinutes = now.getMinutes();
            let minTime = currentHour.toString().padStart(2, "0") + ":" + currentMinutes.toString()
                .padStart(2, "0");

            // If the selected date is today, restrict past times
            if (dateInput.value === today) {
                timeInput.min = minTime;
            } else {
                timeInput.removeAttribute("min");
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</html>
