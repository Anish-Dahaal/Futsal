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

</html>
