<div id="dashboard_sidebar" class="dashboard_sidebar">
    <div class="dashboard_sidebar__logo">
        <img src="{{ asset('/logos/carbon-icon.png') }}" alt="logo">
    </div>

    <ul class="dashboard_sidebar__menu">
        <li><a href="{{ route('dashboard.show') }}">Dashboard</a></li>
        <li class="menu-dropdown">
            <a href="#">Products</a>
            <ul>
                <li><a href="{{ route('products.index') }}">Index</a></li>
                <li><a href="{{ route('products.create') }}">Create</a></li>
                
            </ul>
        </li>

        <li class="menu-dropdown">
            <a href="#">Product Category</a>
            <ul>
                <li><a href="{{ route('product_categories.index') }}">Index</a></li>
                <li><a href="{{ route('product_categories.create') }}">Create</a></li>
                
            </ul>
        </li>
    </ul>
</div>
