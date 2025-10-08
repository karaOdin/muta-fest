<!-- Mobile Drawer -->
<div class="drawer-overlay" onclick="closeDrawer()"></div>
<div class="mobile-drawer">
    <ul class="nav-menu">
        <li><a href="{{ route('mutafest.about') }}" class="nav-link {{ request()->routeIs('mutafest.about') ? 'active' : '' }}" onclick="closeDrawer()">{{ __('mutafest.nav.about') }}</a></li>
        <li><a href="{{ route('mutafest.program') }}" class="nav-link {{ request()->routeIs('mutafest.program*') ? 'active' : '' }}" onclick="closeDrawer()">{{ __('mutafest.nav.program') }}</a></li>
        <li><a href="{{ route('mutafest.guests') }}" class="nav-link {{ request()->routeIs('mutafest.guest*') ? 'active' : '' }}" onclick="closeDrawer()">{{ __('mutafest.nav.guests') }}</a></li>
    </ul>
</div>

<!-- Header -->
<header class="header">
    <div class="nav-container">
        <a href="/"><img src="{{ asset('images/mutafest logo.png') }}" alt="MutaFest" class="logo"></a>

        <nav>
            <ul class="nav-menu">
                <li><a href="{{ route('mutafest.home') }}" class="nav-link {{ request()->routeIs('mutafest.home') ? 'active' : '' }}">{{ __('mutafest.nav.home') }}</a></li>
                <li><a href="{{ route('mutafest.about') }}" class="nav-link {{ request()->routeIs('mutafest.about') ? 'active' : '' }}">{{ __('mutafest.nav.about') }}</a></li>
                <li><a href="{{ route('mutafest.program') }}" class="nav-link {{ request()->routeIs('mutafest.program*') ? 'active' : '' }}">{{ __('mutafest.nav.program') }}</a></li>
                <li><a href="{{ route('mutafest.guests') }}" class="nav-link {{ request()->routeIs('mutafest.guest*') ? 'active' : '' }}">{{ __('mutafest.nav.guests') }}</a></li>
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
