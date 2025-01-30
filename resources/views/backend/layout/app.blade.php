<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    {{-- Include the Header --}}
    @include('backend.layout.header')

    <div class="dashboard-container">
        {{-- Include the Sidebar --}}
        @include('backend.layout.sidebar')

        {{-- Main Content Area --}}
        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>

    {{-- Include the JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
