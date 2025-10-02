<!-- Mobile Drawer -->
<div class="drawer-overlay" onclick="closeDrawer()"></div>
<div class="mobile-drawer">
    <ul class="nav-menu">
        <li><a href="{{ route('mutafest.about') }}" class="nav-link" onclick="closeDrawer()">{{ __('mutafest.nav.about') }}</a></li>
        <li><a href="{{ route('mutafest.program') }}" class="nav-link" onclick="closeDrawer()">{{ __('mutafest.nav.program') }}</a></li>
        <li><a href="{{ route('mutafest.guests') }}" class="nav-link" onclick="closeDrawer()">{{ __('mutafest.nav.guests') }}</a></li>
    </ul>
</div>

<!-- Header -->
<header class="header">
    <div class="nav-container">
        <img src="{{ asset('images/mutafest logo.png') }}" alt="MutaFest" class="logo">

        <nav>
            <ul class="nav-menu">
                <li><a href="{{ route('mutafest.about') }}" class="nav-link">{{ __('mutafest.nav.about') }}</a></li>
                <li><a href="{{ route('mutafest.program') }}" class="nav-link">{{ __('mutafest.nav.program') }}</a></li>
                <li><a href="{{ route('mutafest.guests') }}" class="nav-link">{{ __('mutafest.nav.guests') }}</a></li>
            </ul>
            
            <!-- Hamburger Menu -->
            <div class="hamburger" onclick="toggleDrawer()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>
</header>