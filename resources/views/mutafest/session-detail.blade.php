<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $session->title }} - MutaFest</title>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'EB Garamond', serif;
            background: #ab4e9e;
            color: white;
            line-height: 1.4;
            min-height: 100vh;
            padding: 40px 20px 120px;
        }


        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 40px;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            border-bottom: 2px solid white;
            padding-bottom: 2px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        .session-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .session-title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .session-meta-header {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            font-size: 1.3rem;
            opacity: 0.9;
        }

        .session-meta-header span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-image {
            width: 100%;
            max-width: 800px;
            height: 300px;
            object-fit: cover;
            border-radius: 20px;
            margin: 0 auto 60px;
            display: block;
        }

        .content-wrapper {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 40px;
            align-items: start;
        }

        .session-info {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            position: sticky;
            top: 20px;
            height: fit-content;
        }

        .session-info h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            color: white;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            border-left: 4px solid rgba(255, 255, 255, 0.3);
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 3px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
        }

        .info-value {
            font-size: 1.3rem;
            font-weight: 600;
            color: white;
            line-height: 1.3;
        }

        .session-content {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
        }

        .session-description {
            font-size: 1.3rem;
            line-height: 1.5;
            margin-bottom: 40px;
        }

        .speakers-section {
            margin-top: 40px;
            padding-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .speakers-section h3 {
            font-size: 1.3rem;
            margin-bottom: 30px;
        }

        .speakers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .speaker-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
            display: block;
        }

        .speaker-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
        }

        .speaker-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 15px;
            object-fit: cover;
        }

        .speaker-name {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .speaker-role {
            font-size: 1.3rem;
            opacity: 0.8;
        }

        /* Navigazione Giorni Fissa */
        .days-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #ab4e9e;
            backdrop-filter: blur(20px);
            z-index: 999;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .days-nav-container {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 0 20px;
            flex-wrap: wrap;
        }

        .day-nav-item {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            padding: 8px 20px;
            color: white;
            text-decoration: none;
            font-size: 1.3rem;
            font-weight: 600;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .day-nav-item:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .day-nav-item.active {
            background: white;
            color: black;
            border-color: white;
        }

        .container {
            padding-top: 80px;
        }

        @media (max-width: 768px) {
            .days-nav {
                padding: 10px 0;
            }

            .days-nav-container {
                gap: 8px;
            }

            .day-nav-item {
                padding: 6px 15px;
                font-size: 1.2rem;
            }

            .session-title {
                font-size: 2.3rem;
                margin-bottom: 15px;
            }

            .session-meta-header {
                font-size: 1.2rem;
                gap: 20px;
            }

            .header-image {
                height: 200px;
                margin-bottom: 40px;
            }

            .content-wrapper {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .session-info {
                padding: 20px;
                position: static;
                margin-bottom: 30px;
                order: -1;
            }

            .session-content {
                padding: 30px 20px;
            }

            .session-description {
                font-size: 1.2rem;
            }

            .speakers-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 15px;
            }
        }

        @media (max-width: 480px) {
            .session-title {
                font-size: 1.9rem;
            }

            .session-meta-header {
                font-size: 1.3rem;
            }

            .session-description {
                font-size: 1.3rem;
            }

            .session-info h3 {
                font-size: 1.3rem;
            }
        }

        /* Altri Incontri Section */
        .other-sessions-section {
            margin-top: 80px;
            padding-top: 60px;
            border-top: 2px dashed rgba(255, 255, 255, 0.3);
        }

        .other-sessions-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
        }

        /* Filtro Sale */
        .halls-filter-section {
            margin-bottom: 40px;
        }

        .filter-label {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .halls-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
            justify-content: center;
        }

        .hall-filter-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 12px 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.3rem;
            position: relative;
            overflow: hidden;
        }

        .hall-filter-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
        }

        .hall-filter-btn.active {
            background: rgba(255, 255, 255, 0.2);
            border-color: white;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .hall-filter-btn.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .hall-filter-icon {
            width: 25px;
            height: 25px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .hall-filter-btn.active .hall-filter-icon {
            background: white;
            color: #ab4e9e;
        }

        .hall-filter-name {
            font-weight: 600;
        }

        .hall-filter-count {
            font-size: 1.3rem;
            opacity: 0.7;
            margin-left: 5px;
        }

        /* Sessions Container */
        .sessions-container {
            display: none;
        }

        .sessions-container.active {
            display: block;
        }

        .sessions-list {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
        }

        .other-session-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
            display: block;
        }

        .other-session-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .other-session-card:last-child {
            margin-bottom: 0;
        }

        .other-session-time {
            font-size: 1.3rem;
            opacity: 0.8;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .other-session-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .other-session-meta {
            display: flex;
            gap: 20px;
            font-size: 1.3rem;
            opacity: 0.8;
            flex-wrap: wrap;
        }

        .other-session-meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .no-sessions {
            text-align: center;
            padding: 40px;
            font-size: 1.3rem;
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .halls-filter {
                gap: 10px;
            }

            .hall-filter-btn {
                padding: 10px 20px;
                font-size: 1.3rem;
            }

            .hall-filter-icon {
                width: 20px;
                height: 20px;
                font-size: 1.0rem;
            }

            .other-sessions-title {
                font-size: 2rem;
            }

            .sessions-list {
                padding: 25px;
            }
        }
    </style>
    @include('components.shared-styles')
</head>
<body>
    @include('components.navbar')

    <!-- Navigazione Giorni Fissa -->
    <div class="days-nav">
        <div class="days-nav-container">
            @foreach($days as $dayItem)
                <a href="{{ route('mutafest.program.day', $dayItem->id) }}"
                   class="day-nav-item {{ $dayItem->id === $session->day_id ? 'active' : '' }}">
                    {{ $dayItem->name }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="container">


        <div class="session-header">
            <h1 class="session-title">{{ $session->title }}</h1>
            <!--<div class="session-meta-header">
                <span>
                    <i class="far fa-calendar"></i>
                    {{ $session->day->date->format('j F Y') }}
                </span>
                <span>
                    <i class="far fa-clock"></i>
                    {{ $session->time_range }}
                </span>
                <span>
                    <i class="fas fa-building"></i>
                    {{ $session->hall->name }}
                </span>
            </div>-->
        </div>

        @if($session->image)
            <img src="{{ Storage::url($session->image) }}" alt="{{ $session->title }}" class="header-image">

        @endif

        <!-- Contenuto con Barra Laterale -->
        <div class="content-wrapper">
            <!-- Informazioni Laterali -->
            <div class="session-info">
                <h3>Dettagli dell'Incontro</h3>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Giorno</div>
                        <div class="info-value">{{ $session->day->name }}</div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Orario</div>
                        <div class="info-value">{{ $session->time_range }}</div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Durata</div>
                        <div class="info-label">Durata</div>
                        <div class="info-value">{{ $session->duration }}</div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Sala</div>
                        <div class="info-value">{{ $session->hall->name }}<br>
                            @if($session->hall->floor)
                                <small>{{ $session->hall->floor }}</small>
                            @endif
                        </div>
                    </div>
                </div>

                @if($session->hall->capacity)
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Capienza</div>
                        <div class="info-value">{{ $session->hall->capacity }} posti</div>
                    </div>
                </div>
                @endif
            </div>

            <div class="session-content">
                @if($session->description)
                    <div class="session-description">
                        {!! $session->description !!}
                    </div>
                @endif

                @if($session->guests->count() > 0)
                    <div class="speakers-section">
                        <h3>Relatori</h3>
                        <div class="speakers-grid">
                            @foreach($session->guests as $guest)
                                <a href="{{ route('mutafest.guest.details', $guest) }}" class="speaker-card">
                                    @if($guest->image)
                                        <img src="{{ Storage::url($guest->image) }}" alt="{{ $guest->name }}" class="speaker-image">
                                    @else
                                        <img src="{{ asset('images/book.png') }}" alt="{{ $guest->name }}" class="speaker-image">
                                    @endif
                                    <h4 class="speaker-name">{{ $guest->name }}</h4>
                                    @if($guest->pivot && $guest->pivot->role_in_session)
                                        <p class="speaker-role">{{ $guest->pivot->role_in_session }}</p>
                                    @elseif($guest->role)
                                        <p class="speaker-role">{{ $guest->role }}</p>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>


    </div>

    @include('components.footer')

    @include('components.shared-scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.hall-filter-btn');
            const sessionContainers = document.querySelectorAll('.sessions-container');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const hallId = this.getAttribute('data-hall-id');

                    // Rimuovi la classe active da tutti i pulsanti e contenitori
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    sessionContainers.forEach(container => container.classList.remove('active'));

                    // Aggiungi la classe active al pulsante cliccato e agli incontri corrispondenti
                    this.classList.add('active');
                    const targetContainer = document.getElementById(`hall-${hallId}-sessions`);
                    if (targetContainer) {
                        targetContainer.classList.add('active');
                    }

                    // Scroll smooth alla sezione incontri
                    targetContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                });
            });
        });
    </script>
</body>
</html>
