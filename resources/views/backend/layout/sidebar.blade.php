<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
    <img src="{{ asset('/logos/carbon-icon.png') }}" alt="logo" class="logo-image">
    <span class="text">Neurobase</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="{{ route('dashboard.show') }}">
                <i class='bx bxs-dashboard bx-sm'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('products.index') }}">
                <i class='bx bxs-shopping-bag-alt bx-sm'></i>
                <span class="text">Products</span>
            </a>
        </li>
        <li>
            <a href="{{ route('product_categories.index') }}">
                <i class='bx bxs-doughnut-chart bx-sm'></i>
                <span class="text">Product Category</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu bottom">
        <li>
            <a href="#">
                <i class='bx bxs-cog bx-sm bx-spin-hover'></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bx-power-off bx-sm bx-burst-hover'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->
