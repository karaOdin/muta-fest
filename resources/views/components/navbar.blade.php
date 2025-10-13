<!-- Mobile Drawer -->
<div class="drawer-overlay" onclick="closeDrawer()"></div>
<div class="mobile-drawer">
    <ul class="nav-menu">
        <li><a href="{{ route('mutafest.about') }}" class="nav-link {{ request()->routeIs('mutafest.about') ? 'active' : '' }}" onclick="closeDrawer()">{{ __('mutafest.nav.about') }}</a></li>
        <li><a href="{{ route('mutafest.program') }}" class="nav-link {{ request()->routeIs('mutafest.program*') ? 'active' : '' }}" onclick="closeDrawer()">{{ __('mutafest.nav.program') }}</a></li>
        <li><a href="{{ route('mutafest.guests') }}" class="nav-link {{ request()->routeIs('mutafest.guest*') ? 'active' : '' }}" onclick="closeDrawer()">{{ __('mutafest.nav.guests') }}</a></li>
        <li><a href="javascript:void(0)" class="nav-link" onclick="openLocationModal(); closeDrawer();">Luogo</a></li>
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
                <li><a href="javascript:void(0)" class="nav-link" onclick="openLocationModal()">Luogo</a></li>
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

<!-- Location Modal -->
<div class="location-modal-overlay" id="locationModal" onclick="closeLocationModal()">
    <div class="location-modal-content" onclick="event.stopPropagation()">
        <button class="location-modal-close" onclick="closeLocationModal()">
            <i class="fas fa-times"></i>
        </button>

        <div class="location-modal-header">
            <i class="fas fa-map-marker-alt"></i>
            <h2 class="location-modal-title">Parco Center</h2>
        </div>

        <div class="location-modal-body">
            <!--<h3 class="location-name">Parco Center</h3>-->
            <!--<p class="location-description">
                Centro per la ricerca e l'innovazione sociale con sede a Milano, che ospita parte delle attività del festival.
            </p>-->

            <div class="location-details">
                <div class="location-detail-item">
                    <i class="fas fa-map-pin"></i>
                    <div>
                        <strong>Indirizzo:</strong><br>
                        Via Ambrogio Binda, 30<br>
                        20143 Milano MI
                    </div>
                </div>

                <!--
                <div class="location-detail-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <strong>Telefono:</strong><br>
                        <a href="tel:+390255239614">+39 02 5523 9614</a>
                    </div>
                </div>-->

                <div class="location-detail-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email:</strong><br>
                        <a href="mailto:Info@mutafest.com">Info@mutafest.com</a>
                    </div>
                </div>
            </div>

            <a href="https://google.com/maps/place/PARCO+Center/@45.4416547,9.154777,490m/data=!3m2!1e3!4b1!4m6!3m5!1s0x4786c3002fe63b77:0x711c4ef477b464b6!8m2!3d45.4416547!4d9.154777!16s%2Fg%2F11vzfb_cm7?entry=tts&g_ep=EgoyMDI1MTAwNC4wIPu8ASoASAFQAw%3D%3D&skid=b2412b0d-b684-4204-88a0-d584bda19169" target="_blank" class="location-map-btn">
                <i class="fas fa-external-link-alt"></i>
                Apri in Google Maps
            </a>
        </div>
    </div>
</div>
