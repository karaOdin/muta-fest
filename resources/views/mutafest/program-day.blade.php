<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day {{ $day }} - MutaFest</title>
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
            font-size: 1.1rem;
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
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .day-date {
            font-size: 1.3rem;
            opacity: 0.9;
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

        .sessions-list {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
        }

        .session {
            margin-bottom: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .session:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .session-time {
            font-size: 1.1rem;
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .session-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .session-description {
            font-size: 1.2rem;
            line-height: 1.8;
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
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 3px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 600;
            color: white;
            line-height: 1.3;
        }

        @media (max-width: 768px) {

            .day-title {
                font-size: 2.5rem;
            }

            .day-date {
                font-size: 1.2rem;
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
                font-size: 1.5rem;
            }

            .session-description {
                font-size: 1.1rem;
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
                font-size: 1.2rem;
                margin-bottom: 15px;
            }

            .info-item {
                padding: 12px;
                margin-bottom: 15px;
            }

            .info-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
                margin-right: 12px;
            }
        }

        @media (max-width: 480px) {
            .day-title {
                font-size: 2rem;
            }

            .session-title {
                font-size: 1.3rem;
            }

            .session-description {
                font-size: 1rem;
            }

            .day-info {
                padding: 15px;
            }

            .day-info h3 {
                font-size: 1.1rem;
            }

            .info-item {
                padding: 10px;
                margin-bottom: 12px;
            }

            .info-icon {
                width: 35px;
                height: 35px;
                font-size: 1rem;
                margin-right: 10px;
            }

            .info-value {
                font-size: 0.9rem;
            }
        }
    </style>
    @include('components.shared-styles')
</head>
<body>
    @include('components.navbar')

    <div class="container">
        <div class="day-header">
            <h1 class="day-title">Day {{ $day }}</h1>
            <p class="day-date">{{ $day == 1 ? '2 Maggio 2025' : ($day == 2 ? '3 Maggio 2025' : '4 Maggio 2025') }}</p>
        </div>

        <img src="{{ asset('images/mauja.png') }}" alt="Day {{ $day }}" class="header-image">
        
        <!-- Content with Sidebar -->
        <div class="content-wrapper">
            <!-- Sidebar Information -->
            <div class="day-info">
                <h3>Informazioni del Giorno</h3>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Data</div>
                        <div class="info-value">{{ $day == 1 ? '2 Maggio 2025' : ($day == 2 ? '3 Maggio 2025' : '4 Maggio 2025') }}</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Luogo</div>
                        <div class="info-value">Centro Culturale Milano<br><small>Via Mediterraneo 15</small></div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Durata</div>
                        <div class="info-value">{{ $day == 1 ? '5 ore' : ($day == 2 ? '10 ore' : '12 ore') }}</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Partecipanti</div>
                        <div class="info-value">Aperto al pubblico<br><small>Prenotazione consigliata</small></div>
                    </div>
                </div>
            </div>

            <div class="sessions-list">
            @if($day == 1)
                <div class="session">
                    <div class="session-time">18:00 - 19:00</div>
                    <h2 class="session-title">Opening Ceremony</h2>
                    <p class="session-description">
                        Welcome remarks and inaugural presentation by festival directors. Join us as we open the doors to three days of Mediterranean culture, literature, and arts.
                    </p>
                </div>
                
                <div class="session">
                    <div class="session-time">19:30 - 21:00</div>
                    <h2 class="session-title">Mediterranean Voices</h2>
                    <p class="session-description">
                        Reading session featuring contemporary Mediterranean writers. Experience the rich tapestry of stories from across the Mediterranean basin.
                    </p>
                </div>
                
                <div class="session">
                    <div class="session-time">21:30 - 23:00</div>
                    <h2 class="session-title">Musical Journey</h2>
                    <p class="session-description">
                        An evening concert featuring traditional and contemporary Mediterranean musicians, celebrating the diverse musical heritage of our shared sea.
                    </p>
                </div>
            @elseif($day == 2)
                <div class="session">
                    <div class="session-time">10:00 - 11:30</div>
                    <h2 class="session-title">Translation Workshop</h2>
                    <p class="session-description">
                        Interactive workshop on Mediterranean poetry translation. Learn the art of bridging languages while preserving cultural nuances.
                    </p>
                </div>
                
                <div class="session">
                    <div class="session-time">12:00 - 13:30</div>
                    <h2 class="session-title">Cultural Dialogue</h2>
                    <p class="session-description">
                        Panel discussion on Mediterranean identity in contemporary literature. Explore how writers navigate multiple cultures and languages.
                    </p>
                </div>
                
                <div class="session">
                    <div class="session-time">16:00 - 17:30</div>
                    <h2 class="session-title">Visual Stories</h2>
                    <p class="session-description">
                        Film screening and discussion exploring Mediterranean narratives through cinema. Discover stories that cross borders and cultures.
                    </p>
                </div>
                
                <div class="session">
                    <div class="session-time">20:00 - 22:00</div>
                    <h2 class="session-title">Mediterranean Feast</h2>
                    <p class="session-description">
                        Traditional dinner accompanied by music and storytelling. Share in the culinary traditions that unite the Mediterranean.
                    </p>
                </div>
            @else
                <div class="session">
                    <div class="session-time">11:00 - 12:30</div>
                    <h2 class="session-title">Collaborative Writing</h2>
                    <p class="session-description">
                        Multilingual poetry session with all guest writers. Create together across languages and cultures.
                    </p>
                </div>
                
                <div class="session">
                    <div class="session-time">14:00 - 15:30</div>
                    <h2 class="session-title">Photography Exhibition</h2>
                    <p class="session-description">
                        Opening of Mediterranean portrait exhibition. Visual stories that capture the essence of Mediterranean life.
                    </p>
                </div>
                
                <div class="session">
                    <div class="session-time">18:00 - 20:00</div>
                    <h2 class="session-title">Final Performance</h2>
                    <p class="session-description">
                        Collaborative performance featuring music, poetry, and visual arts. A celebration of all that unites us across the Mediterranean.
                    </p>
                </div>
                
                <div class="session">
                    <div class="session-time">20:30 - 23:00</div>
                    <h2 class="session-title">Closing Celebration</h2>
                    <p class="session-description">
                        Farewell party with live music and Mediterranean cuisine. Until we meet again next year!
                    </p>
                </div>
            @endif
            </div>
        </div>
    </div>

    @include('components.footer')

    @include('components.shared-scripts')
</body>
</html>