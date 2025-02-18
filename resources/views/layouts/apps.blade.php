<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Management System</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.gif') }}" alt="Logo">
            <span>Futsal System</span>
        </div>
        <nav>
            <a href="{{ route('gethome') }}">Home</a>
            <a href="{{ route('futsals') }}">Futsals</a>
            <a href="{{ route('bookings.index') }}">Bookings</a>
            <a href="{{ route('maps') }}">Maps</a>
            @if (Auth::guard('frontUser')->check())
                <a href="{{ route('user.logout') }}">Logout</a>
            @else
                <a href="{{ route('user.login') }}">Login/Register</a>
            @endif
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

</html>
