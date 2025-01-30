<div id="dashboard_sidebar" class="dashboard_sidebar">
    <div class="dashboard_sidebar__logo">
        <img src="{{ asset('/logos/carbon-icon.png') }}" alt="logo">
    </div>

    <ul class="dashboard_sidebar__menu">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

        <li class="menu-dropdown">
            <a href="#">Products</a>
            <ul>
                <li><a href="{{ route('products.index') }}">Index</a></li>
                <li><a href="{{ route('products.create') }}">Create</a></li>
                <li><a href="#">Edit</a></li>
            </ul>
        </li>

        <li class="menu-dropdown">
            <a href="#">Product Category</a>
            <ul>
                <li><a href="{{ route('categories.index') }}">Index</a></li>
                <li><a href="{{ route('categories.create') }}">Create</a></li>
                <li><a href="#">Edit</a></li>
            </ul>
        </li>
                    <ul class="dashboard_sidebar__menu">
                <!-- Existing links -->
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
    </ul>
</div>
