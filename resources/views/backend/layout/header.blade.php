@php
    $user = auth()->user();
@endphp

<div class="dashboard_header">
    <div class="dashboard_header-buttons">
        <a href="{{ env('APP_URL') }}" target="_blank" class="dashboard-icon-button">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M9.99996 18.3334C14.6023 18.3334 18.3333 14.6025 18.3333 10.0001C18.3333 5.39771 14.6023 1.66675 9.99996 1.66675C5.39759 1.66675 1.66663 5.39771 1.66663 10.0001C1.66663 14.6025 5.39759 18.3334 9.99996 18.3334Z"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>

        {{-- User Dropdown --}}
        <button id="dropdown-username" class="dashboard-icon-dropdown">
            <span>{{ $user->name }}</span>
            <svg id="dropdown-username-arrow" width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path d="M3.5 5.25L7 8.75L10.5 5.25" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>

        <div id="dropdown-menu-username" class="dashboard-dropdown-menu hide">
            <ul>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Preferences</a></li>
                <li><a href="{{ route('logout') }}">Log Out</a></li>
            </ul>
        </div>
    </div>
</div>
