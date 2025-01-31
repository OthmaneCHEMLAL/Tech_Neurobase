<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    {{-- Header --}}
    @include('backend.layout.header')

    <div class="dashboard-container">
        {{-- Sidebar --}}
        @include('backend.layout.sidebar')

        {{-- Main Content Area --}}
        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>

    {{-- Include the JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    
    {{-- Sidebar Toggle Script --}}
    <script>
        $(document).ready(function() {
            $('.menu-toggle').click(function() {
                $('.dashboard_sidebar').toggleClass('collapsed');
                $('.dashboard-content').toggleClass('expanded');
            });

            // Dropdown Menu Handling
            $("#dropdown-username").click(function() {
                $("#dropdown-menu-username").toggleClass("show");
            });

            $(document).click(function(event) {
                if (!$(event.target).closest("#dropdown-username, #dropdown-menu-username").length) {
                    $("#dropdown-menu-username").removeClass("show");
                }
            });
        });
    </script>

</body>
</html>
