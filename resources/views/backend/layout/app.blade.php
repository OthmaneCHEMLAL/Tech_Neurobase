<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>AdminHub</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- SIDEBAR -->
    @include('backend.layout.sidebar')

    <!-- CONTENT -->
    <section id="content">
        <!-- HEADER -->
        @include('backend.layout.header')

        <!-- MAIN CONTENT -->
        @yield('content')
    </section>

    <!-- Optional: Include additional scripts if needed -->
    <!-- <script src="{{ asset('path/to/your/script.js') }}"></script> -->
</body>
</html>
