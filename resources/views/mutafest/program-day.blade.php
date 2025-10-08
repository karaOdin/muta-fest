<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $day->name }} - MutaFest</title>
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
            line-height: 1.8;
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
            font-size: 0.85rem;
            border-bottom: 2px solid white;
            padding-bottom: 2px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        .day-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .day-title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .day-date {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .header-image {
            width: 100%;
            max-width: 800px;
            /*height: 300px;*/
            object-fit: cover;
            border-radius: 20px;
            margin: 0 auto 60px;
            display: block;
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
            font-size: 0.95rem;
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

        /* Filtro Sale */
        .halls-filter-section {
            margin-bottom: 40px;
        }

        .filter-label {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .halls-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
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
            font-size: 0.95rem;
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
            font-size: 0.85rem;
        }

        .hall-filter-btn.active .hall-filter-icon {
            background: white;
            color: #ab4e9e;
        }

        .hall-filter-name {
            font-weight: 600;
        }

        .hall-filter-count {
            font-size: 0.9rem;
            opacity: 0.7;
            margin-left: 5px;
        }

        /* Lista Incontri */
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

        .session-card {
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

        .session-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .session-card:last-child {
            margin-bottom: 0;
        }

        .session-time {
            font-size: 0.95rem;
            opacity: 0.8;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .session-time i {
            font-size: 0.95rem;
        }

        .session-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .session-meta {
            display: flex;
            gap: 20px;
            font-size: 0.95rem;
            opacity: 0.8;
        }

        .session-meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .no-sessions {
            text-align: center;
            padding: 40px;
            font-size: 0.85rem;
            opacity: 0.8;
        }

        .content-wrapper {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 40px;
            align-items: start;
        }

        .day-info {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            position: sticky;
            top: 20px;
            height: fit-content;
        }

        .day-info h3 {
            font-size: 0.95rem;
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
            font-size: 0.95rem;
            flex-shrink: 0;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 3px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
        }

        .info-value {
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
          /*  line-height: 1.3;*/
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
                font-size: 0.85rem;
            }

            .day-title {
                font-size: 2.3rem;
            }

            .halls-filter {
                gap: 10px;
            }

            .hall-filter-btn {
                padding: 10px 20px;
                font-size: 0.95rem;
            }

            .hall-filter-icon {
                width: 20px;
                height: 20px;
                font-size: 1.0rem;
            }

            .day-date {
                font-size: 0.95rem;
            }

            .header-image {
                height: 200px;
                margin-bottom: 40px;
            }

            .sessions-list {
                padding: 30px 20px;
            }

            .session {
                margin-bottom: 30px;
                padding-bottom: 30px;
            }

            .session-title {
                font-size: 1.2rem;
            }

            .session-description {
                font-size: 0.85rem;
            }

            .content-wrapper {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .day-info {
                padding: 20px;
                position: static;
                margin-bottom: 30px;
                order: -1;
            }

            .day-info h3 {
                font-size: 0.95rem;
                margin-bottom: 15px;
            }

            .info-item {
                padding: 12px;
                margin-bottom: 15px;
            }

            .info-icon {
                width: 40px;
                height: 40px;
                font-size: 0.85rem;
                margin-right: 12px;
            }
        }

        @media (max-width: 480px) {
            .day-title {
                font-size: 1.9rem;
            }

            .session-title {
                font-size: 1.4rem;
            }

            .session-description {
                font-size: 0.95rem;
            }

            .day-info {
                padding: 15px;
            }

            .day-info h3 {
                font-size: 0.85rem;
            }

            .info-item {
                padding: 10px;
                margin-bottom: 12px;
            }

            .info-icon {
                width: 35px;
                height: 35px;
                font-size: 0.95rem;
                margin-right: 10px;
            }

            .info-value {
                font-size: 0.95rem;
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
                   class="day-nav-item {{ $dayItem->id === $day->id ? 'active' : '' }}">
                    {{ $dayItem->name }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="container">
       <!-- <a href="{{ route('mutafest.program') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Torna al Programma
        </a>-->

        <div class="day-header">
            <h1 class="day-title">{{ $day->name }}</h1>
            <p class="day-date">{{ $day->date->format('j F Y') }}</p>
        </div>

        @if($day->image)
            <img src="{{ Storage::url($day->image) }}" alt="{{ $day->name }}" class="header-image">
        @else
            <img src="{{ asset('images/mauja.png') }}" alt="{{ $day->name }}" class="header-image">
        @endif

        <!-- Contenuto con Barra Laterale -->
        <div class="content-wrapper">
            <!-- Informazioni Laterali -->
            <div class="day-info">
                <h3>Informazioni del Giorno</h3>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Data</div>
                        <div class="info-value">{{ $day->date->format('j F Y') }}</div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">spazi</div>
                        <div class="info-value">{{ $halls->count() }} </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-microphone"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">eventi</div>
                        <div class="info-value">{{ $day->sessions->count() }} </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Ospiti</div>
                        <div class="info-value">{{ $day->sessions->pluck('guests')->flatten()->unique('id')->count() }} </div>
                    </div>
                </div>
            </div>

            <div>
                <!-- Filtro Sale -->
                <div class="halls-filter-section">
                    <p class="filter-label">Filtra per Sala:</p>
                    <div class="halls-filter">
                        <div class="hall-filter-btn" data-hall-id="all">
                            <div class="hall-filter-icon">
                                <i class="fas fa-th"></i>
                            </div>
                            <span class="hall-filter-name">Tutti</span>
                            <span class="hall-filter-count">({{ $day->sessions->count() }})</span>
                        </div>
                        @foreach($halls as $hall)
                            @if($hall->sessions_count !== 0)
                                <div class="hall-filter-btn" data-hall-id="{{ $hall->id }}">
                                    <div class="hall-filter-icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <span class="hall-filter-name">{{ $hall->name }}</span>
                                    <span class="hall-filter-count">({{ $hall->sessions_count }})</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Tutti gli Incontri -->
                <div class="sessions-container" id="hall-all-sessions">
                    <div class="sessions-list">
                        <h2 style="font-size: 1.2rem; margin-bottom: 30px;">Tutti gli Incontri</h2>
                        @php
                            $allSessions = $day->sessions->sortBy('start_time');
                        @endphp

                        @forelse($allSessions as $session)
                            <a href="{{ route('mutafest.session.detail', $session) }}" class="session-card">
                                <div class="session-time">
                                    <i class="far fa-clock"></i>
                                    {{ $session->time_range }}
                                </div>
                                <h3 class="session-title">{{ $session->title }}</h3>

                                <div class="session-meta">
                                    <div class="session-meta-item">
                                        <i class="fas fa-building"></i>
                                        <span>{{ $session->hall->name }}</span>
                                    </div>
                                    @if($session->guests->count() > 0)
                                        <div class="session-meta-item">
                                            <i class="fas fa-users"></i>
                                            <span>{{ $session->guests->count() }} relatori</span>
                                        </div>
                                    @endif
                                    <div class="session-meta-item">
                                        <i class="fas fa-hourglass-half"></i>
                                        <span>{{ $session->duration }}</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="no-sessions">
                                <p>Nessun incontro programmato per questa giornata.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Incontri per Sala -->
                @foreach($halls as $hall)
                    <div class="sessions-container" id="hall-{{ $hall->id }}-sessions">
                        <div class="sessions-list">
                            <h2 style="font-size: 0.95rem; margin-bottom: 30px;">{{ $hall->name }}</h2>
                            @php
                                $hallSessions = $day->sessions->where('hall_id', $hall->id)->sortBy('start_time');
                            @endphp

                            @forelse($hallSessions as $session)
                                <a href="{{ route('mutafest.session.detail', $session) }}" class="session-card">
                                    <div class="session-time">
                                        <i class="far fa-clock"></i>
                                        {{ $session->time_range }}
                                    </div>
                                    <h3 class="session-title">{{ $session->title }}</h3>

                                    <div class="session-meta">
                                        @if($session->guests->count() > 0)
                                            <div class="session-meta-item">
                                                <i class="fas fa-users"></i>
                                                <span>{{ $session->guests->count() }} relatori</span>
                                            </div>
                                        @endif
                                        <div class="session-meta-item">
                                            <i class="fas fa-hourglass-half"></i>
                                            <span>{{ $session->duration }}</span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="no-sessions">
                                    <p>Nessun incontro programmato in questa sala.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
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

                        // Scroll fluido agli incontri con un piccolo ritardo per l'animazione
                        setTimeout(() => {
                            targetContainer.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest' });
                        }, 200);
                    }
                });
            });

            // Mostra la prima sala di default se esiste
            if (filterButtons.length > 0) {
                filterButtons[0].click();
            }
        });
    </script>
</body>
</html>
