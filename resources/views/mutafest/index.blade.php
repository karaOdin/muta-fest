<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MutaFest - {{ __('mutafest.meta.title') }}</title>
    <meta name="description" content="{{ __('mutafest.meta.description') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #2E86AB;
            --deep-blue: #1B4F72;
            --coral: #F24236;
            --sand: #F6E3CE;
            --teal: #A23B72;
            --gold: #F18F01;
        }
        
        .wave-bg {
            background: linear-gradient(135deg, var(--primary-blue), var(--deep-blue));
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--deep-blue) 50%, var(--teal) 100%);
        }
        
        .section-gradient {
            background: linear-gradient(45deg, var(--sand), #ffffff);
        }
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .lang-btn.active {
            background: white;
            color: var(--primary-blue);
        }

        /* Main Navigation */
        .main-nav {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            position: fixed;
            top: 60px;
            width: 100%;
            z-index: 999;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 2em;
            font-weight: bold;
            background: linear-gradient(135deg, var(--primary-blue), var(--coral));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            position: relative;
            padding: 10px 0;
            transition: color 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary-blue);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, var(--primary-blue), var(--coral));
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-blue), var(--deep-blue));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-top: 120px;
        }

        .wave-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%23FFFFFF"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%23FFFFFF"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23FFFFFF"></path></svg>') repeat-x;
            animation: wave 20s linear infinite;
            opacity: 0.3;
        }

        @keyframes wave {
            0% { transform: translateX(0); }
            100% { transform: translateX(-1200px); }
        }

        .hero-content {
            text-align: center;
            color: white;
            z-index: 2;
            max-width: 800px;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 4em;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #FFFFFF, var(--sand));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero h2 {
            font-size: 2em;
            margin-bottom: 10px;
            color: var(--sand);
        }

        .hero .subtitle {
            font-size: 1.5em;
            margin-bottom: 30px;
            color: rgba(255,255,255,0.9);
        }

        .hero .dates {
            font-size: 1.3em;
            margin-bottom: 40px;
            color: var(--gold);
            font-weight: bold;
        }

        .hero .cta-btn {
            font-size: 1.2em;
            padding: 15px 40px;
            background: var(--coral);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(242, 66, 54, 0.3);
        }

        .hero .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(242, 66, 54, 0.4);
        }

        /* Color Banner */
        .color-banner {
            height: 100px;
            background: linear-gradient(45deg, 
                var(--primary-blue) 0%, 
                var(--teal) 20%, 
                var(--coral) 40%, 
                var(--gold) 60%, 
                var(--primary-blue) 80%, 
                var(--teal) 100%);
            background-size: 400% 400%;
            animation: colorShift 8s ease-in-out infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        @keyframes colorShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Page Content */
        .page-content {
            display: none;
            min-height: 70vh;
            padding: 50px 0;
        }

        .page-content.active {
            display: block;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-title {
            font-size: 2.5em;
            text-align: center;
            margin-bottom: 40px;
            background: linear-gradient(135deg, var(--primary-blue), var(--coral));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Program Section */
        .program-day {
            margin-bottom: 40px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .day-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--teal));
            color: white;
            padding: 20px;
            font-size: 1.5em;
            font-weight: bold;
        }

        .day-content {
            background: white;
            padding: 20px;
        }

        .session {
            padding: 15px;
            border-right: 4px solid var(--coral);
            margin-bottom: 15px;
            background: rgba(242, 66, 54, 0.05);
            border-radius: 8px;
        }

        [dir="rtl"] .session {
            border-right: none;
            border-left: 4px solid var(--coral);
        }

        .session-time {
            font-weight: bold;
            color: var(--coral);
            margin-bottom: 5px;
        }

        .session-title {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .session-participants {
            color: var(--primary-blue);
            font-style: italic;
        }

        /* Guests Section */
        .guests-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .guest-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .guest-card:hover {
            transform: translateY(-10px);
        }

        .guest-image {
            height: 250px;
            background: linear-gradient(135deg, var(--primary-blue), var(--coral));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4em;
        }

        .guest-info {
            padding: 20px;
        }

        .guest-name {
            font-size: 1.3em;
            font-weight: bold;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .guest-country {
            color: var(--coral);
            font-weight: 500;
            margin-bottom: 10px;
        }

        .guest-role {
            color: var(--primary-blue);
            font-style: italic;
            margin-bottom: 15px;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--dark), var(--primary-blue));
            color: white;
            padding: 50px 0 20px;
            margin-top: 50px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            color: var(--sand);
        }

        .footer-section a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--coral);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: var(--coral);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2em;
            transition: transform 0.3s ease;
        }

        .social-links a:hover {
            transform: scale(1.1);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.6);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2.5em;
            }

            .hero h2 {
                font-size: 1.5em;
            }

            .top-bar-content {
                flex-direction: column;
                gap: 10px;
            }

            .quick-actions {
                order: 2;
            }

            .guests-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Newsletter Signup */
        .newsletter {
            background: linear-gradient(135deg, var(--sand), rgba(241, 143, 1, 0.1));
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            margin: 40px 0;
        }

        .newsletter h3 {
            color: var(--dark);
            margin-bottom: 15px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            max-width: 400px;
            margin: 0 auto;
        }

        .newsletter input {
            flex: 1;
            padding: 12px;
            border: 1px solid var(--primary-blue);
            border-radius: 25px;
            outline: none;
        }

        .newsletter button {
            padding: 12px 20px;
            background: var(--coral);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter button:hover {
            background: var(--primary-blue);
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-group textarea {
            resize: vertical;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="quick-actions">
                <a href="#" class="btn btn-primary">{{ __('mutafest.nav.book_invitation') }}</a>
                <a href="#" class="btn btn-secondary" onclick="downloadProgram()">{{ __('mutafest.nav.download_program') }}</a>
            </div>
            <div class="language-switcher">
                <button class="lang-btn {{ app()->getLocale() === 'ar' ? 'active' : '' }}" onclick="switchLanguage('ar')">العربية</button>
                <button class="lang-btn {{ app()->getLocale() === 'it' ? 'active' : '' }}" onclick="switchLanguage('it')">Italiano</button>
                <button class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}" onclick="switchLanguage('en')">English</button>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main-nav">
        <div class="nav-content">
            <div class="logo">MutaFest</div>
            <ul class="nav-links">
                <li><a href="#home" class="nav-link active">{{ __('mutafest.nav.home') }}</a></li>
                <li><a href="#about" class="nav-link">{{ __('mutafest.nav.about') }}</a></li>
                <li><a href="#program" class="nav-link">{{ __('mutafest.nav.program') }}</a></li>
                <li><a href="#guests" class="nav-link">{{ __('mutafest.nav.guests') }}</a></li>
                <li><a href="#exhibitions" class="nav-link">{{ __('mutafest.nav.exhibitions') }}</a></li>
                <li><a href="#press" class="nav-link">{{ __('mutafest.nav.press') }}</a></li>
                <li><a href="#info" class="nav-link">{{ __('mutafest.nav.info') }}</a></li>
                <li><a href="#contact" class="nav-link">{{ __('mutafest.nav.contact') }}</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="wave-animation"></div>
        <div class="hero-content">
            <h1>MutaFest</h1>
            <h2>{{ __('mutafest.hero.first_edition') }}</h2>
            <p class="subtitle">{{ __('mutafest.hero.subtitle') }}</p>
            <p class="dates">{{ __('mutafest.hero.dates') }}</p>
            <button class="cta-btn" onclick="showPage('program')">{{ __('mutafest.hero.cta') }}</button>
        </div>
    </section>

    <!-- Color Banner -->
    <div class="color-banner">
        {{ __('mutafest.banner.text') }}
    </div>

    <!-- About Page -->
    <div class="page-content" id="about">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.about.title') }}</h2>
            <div class="card">
                <h3>{{ __('mutafest.about.festival_title') }}</h3>
                <p>{{ __('mutafest.about.description') }}</p>
                
                <h4>{{ __('mutafest.about.goal_title') }}</h4>
                <p>{{ __('mutafest.about.goal_description') }}</p>
                
                <h4>{{ __('mutafest.about.organizers_title') }}</h4>
                <ul>
                    <li><strong>{{ __('mutafest.about.organizer1_name') }}:</strong> {{ __('mutafest.about.organizer1_desc') }}</li>
                    <li><strong>{{ __('mutafest.about.organizer2_name') }}:</strong> {{ __('mutafest.about.organizer2_desc') }}</li>
                </ul>
                
                <h4>{{ __('mutafest.about.partners_title') }}</h4>
                <p>{{ __('mutafest.about.partners_description') }}</p>
                
                <h4>{{ __('mutafest.about.director_title') }}</h4>
                <p><strong>{{ __('mutafest.about.director_name') }}:</strong> {{ __('mutafest.about.director_description') }}</p>
            </div>
        </div>
    </div>

    <!-- Program Page -->
    <div class="page-content" id="program">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.program.title') }}</h2>
            
            @foreach($program as $dayKey => $day)
            <div class="program-day">
                <div class="day-header">
                    <i class="fas fa-calendar-day"></i> {{ $day['title'] }}
                </div>
                <div class="day-content">
                    @foreach($day['sessions'] as $session)
                    <div class="session">
                        <div class="session-time">{{ $session['time'] }}</div>
                        <div class="session-title">{{ $session['title'] }}</div>
                        <div class="session-participants">{{ $session['participants'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div class="newsletter">
                <h3>{{ __('mutafest.program.download_title') }}</h3>
                <p>{{ __('mutafest.program.download_description') }}</p>
                <button class="btn btn-primary" onclick="downloadProgram()">{{ __('mutafest.program.download_btn') }}</button>
            </div>
        </div>
    </div>

    <!-- Guests Page -->
    <div class="page-content" id="guests">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.guests.title') }}</h2>
            <div class="guests-grid">
                @foreach($guests as $guest)
                <div class="guest-card">
                    <div class="guest-image">
                        <i class="{{ $guest['icon'] }}"></i>
                    </div>
                    <div class="guest-info">
                        <div class="guest-name">{{ $guest['name'] }}</div>
                        <div class="guest-country">{{ $guest['country'] }}</div>
                        <div class="guest-role">{{ $guest['role'] }}</div>
                        <p>{{ $guest['bio'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Exhibitions Page -->
    <div class="page-content" id="exhibitions">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.exhibitions.title') }}</h2>
            
            <div class="card">
                <h3><i class="fas fa-camera"></i> {{ __('mutafest.exhibitions.photo.title') }}</h3>
                <p>{{ __('mutafest.exhibitions.photo.description') }}</p>
                <p><strong>{{ __('mutafest.exhibitions.photo.location_label') }}:</strong> {{ __('mutafest.exhibitions.photo.location') }}</p>
                <p><strong>{{ __('mutafest.exhibitions.photo.timing_label') }}:</strong> {{ __('mutafest.exhibitions.photo.timing') }}</p>
            </div>

            <div class="card">
                <h3><i class="fas fa-theater-masks"></i> {{ __('mutafest.exhibitions.show.title') }}</h3>
                <p>{{ __('mutafest.exhibitions.show.description') }}</p>
                <p><strong>{{ __('mutafest.exhibitions.show.direction_label') }}:</strong> {{ __('mutafest.exhibitions.show.direction') }}</p>
                <p><strong>{{ __('mutafest.exhibitions.show.duration_label') }}:</strong> {{ __('mutafest.exhibitions.show.duration') }}</p>
            </div>

            <div class="card">
                <h3><i class="fas fa-music"></i> {{ __('mutafest.exhibitions.music.title') }}</h3>
                <p>{{ __('mutafest.exhibitions.music.description') }}</p>
                <ul>
                    @foreach(__('mutafest.exhibitions.music.events') as $event)
                    <li>{{ $event }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="card">
                <h3><i class="fas fa-film"></i> {{ __('mutafest.exhibitions.cinema.title') }}</h3>
                <p>{{ __('mutafest.exhibitions.cinema.description') }}</p>
                <p><strong>{{ __('mutafest.exhibitions.cinema.schedule_label') }}:</strong> {{ __('mutafest.exhibitions.cinema.schedule') }}</p>
            </div>

            <div class="card">
                <h3><i class="fas fa-cocktail"></i> {{ __('mutafest.exhibitions.after_party.title') }}</h3>
                <p>{{ __('mutafest.exhibitions.after_party.description') }}</p>
                <p><strong>{{ __('mutafest.exhibitions.after_party.timing_label') }}:</strong> {{ __('mutafest.exhibitions.after_party.timing') }}</p>
                <p><strong>{{ __('mutafest.exhibitions.after_party.location_label') }}:</strong> {{ __('mutafest.exhibitions.after_party.location') }}</p>
            </div>
        </div>
    </div>

    <!-- Press Page -->
    <div class="page-content" id="press">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.press.title') }}</h2>
            
            <div class="card">
                <h3><i class="fas fa-newspaper"></i> {{ __('mutafest.press.materials.title') }}</h3>
                <p>{{ __('mutafest.press.materials.description') }}</p>
                <div style="margin-top: 20px;">
                    <button class="btn btn-primary" onclick="downloadPressKit()" style="margin-left: 10px;">{{ __('mutafest.press.materials.press_kit_btn') }}</button>
                    <button class="btn btn-secondary">{{ __('mutafest.press.materials.press_release_btn') }}</button>
                </div>
            </div>

            <div class="card">
                <h3><i class="fas fa-images"></i> {{ __('mutafest.press.images.title') }}</h3>
                <p>{{ __('mutafest.press.images.description') }}</p>
                <ul>
                    @foreach(__('mutafest.press.images.types') as $type)
                    <li>{{ $type }}</li>
                    @endforeach
                </ul>
                <button class="btn btn-primary" onclick="downloadImages()">{{ __('mutafest.press.images.download_btn') }}</button>
            </div>

            <div class="card">
                <h3><i class="fas fa-microphone"></i> {{ __('mutafest.press.accreditation.title') }}</h3>
                <p>{{ __('mutafest.press.accreditation.description') }}</p>
                <form style="margin-top: 20px;" onsubmit="submitPressAccreditation(event)">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="{{ __('mutafest.press.accreditation.name_placeholder') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="{{ __('mutafest.press.accreditation.email_placeholder') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="organization" placeholder="{{ __('mutafest.press.accreditation.organization_placeholder') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('mutafest.press.accreditation.submit_btn') }}</button>
                </form>
            </div>

            <div class="card">
                <h3><i class="fas fa-phone"></i> {{ __('mutafest.press.contact.title') }}</h3>
                <p><strong>{{ __('mutafest.press.contact.coordinator_label') }}:</strong> {{ __('mutafest.press.contact.coordinator_email') }}</p>
                <p><strong>{{ __('mutafest.press.contact.phone_label') }}:</strong> {{ __('mutafest.press.contact.phone') }}</p>
                <p><strong>{{ __('mutafest.press.contact.whatsapp_label') }}:</strong> {{ __('mutafest.press.contact.whatsapp') }}</p>
                <p>{{ __('mutafest.press.contact.availability') }}</p>
            </div>
        </div>
    </div>

    <!-- Info Page -->
    <div class="page-content" id="info">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.info.title') }}</h2>
            
            <div class="card">
                <h3><i class="fas fa-map-marker-alt"></i> {{ __('mutafest.info.venue.title') }}</h3>
                <p><strong>{{ __('mutafest.info.venue.address_label') }}:</strong> {{ __('mutafest.info.venue.address') }}</p>
                <p><strong>{{ __('mutafest.info.venue.metro_label') }}:</strong> {{ __('mutafest.info.venue.metro') }}</p>
                <p><strong>{{ __('mutafest.info.venue.bus_label') }}:</strong> {{ __('mutafest.info.venue.bus') }}</p>
                <p><strong>{{ __('mutafest.info.venue.car_label') }}:</strong> {{ __('mutafest.info.venue.car') }}</p>
                <p><strong>{{ __('mutafest.info.venue.airport_label') }}:</strong> {{ __('mutafest.info.venue.airport') }}</p>
            </div>

            <div class="card">
                <h3><i class="fas fa-bed"></i> {{ __('mutafest.info.accommodation.title') }}</h3>
                <ul>
                    @foreach(__('mutafest.info.accommodation.hotels') as $hotel)
                    <li><strong>{{ $hotel['name'] }}:</strong> {{ $hotel['description'] }} - {{ $hotel['price'] }}</li>
                    @endforeach
                </ul>
                <p>{{ __('mutafest.info.accommodation.discount_note') }}</p>
            </div>

            <div class="card">
                <h3><i class="fas fa-wheelchair"></i> {{ __('mutafest.info.accessibility.title') }}</h3>
                <p>{{ __('mutafest.info.accessibility.description') }}</p>
                <ul>
                    @foreach(__('mutafest.info.accessibility.features') as $feature)
                    <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="card">
                <h3><i class="fas fa-utensils"></i> {{ __('mutafest.info.restaurants.title') }}</h3>
                <p>{{ __('mutafest.info.restaurants.description') }}</p>
                <ul>
                    @foreach(__('mutafest.info.restaurants.list') as $restaurant)
                    <li><strong>{{ $restaurant['name'] }}:</strong> {{ $restaurant['description'] }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="card">
                <h3><i class="fas fa-info-circle"></i> {{ __('mutafest.info.important.title') }}</h3>
                <ul>
                    @foreach(__('mutafest.info.important.items') as $item)
                    <li><strong>{{ $item['label'] }}:</strong> {{ $item['value'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Contact Page -->
    <div class="page-content" id="contact">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.contact.title') }}</h2>
            
            <div class="card">
                <h3><i class="fas fa-envelope"></i> {{ __('mutafest.contact.form.title') }}</h3>
                <form style="margin-top: 20px;" onsubmit="submitContact(event)">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="{{ __('mutafest.contact.form.name_placeholder') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="{{ __('mutafest.contact.form.email_placeholder') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="{{ __('mutafest.contact.form.subject_placeholder') }}" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" rows="5" placeholder="{{ __('mutafest.contact.form.message_placeholder') }}" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('mutafest.contact.form.submit_btn') }}</button>
                </form>
            </div>

            <div class="card">
                <h3><i class="fas fa-info"></i> {{ __('mutafest.contact.info.title') }}</h3>
                <p><strong>{{ __('mutafest.contact.info.email_label') }}:</strong> {{ __('mutafest.contact.info.email') }}</p>
                <p><strong>{{ __('mutafest.contact.info.phone_label') }}:</strong> {{ __('mutafest.contact.info.phone') }}</p>
                <p><strong>{{ __('mutafest.contact.info.address_label') }}:</strong> {{ __('mutafest.contact.info.address') }}</p>
                <p><strong>{{ __('mutafest.contact.info.hours_label') }}:</strong> {{ __('mutafest.contact.info.hours') }}</p>
            </div>

            <div class="newsletter">
                <h3><i class="fas fa-paper-plane"></i> {{ __('mutafest.contact.newsletter.title') }}</h3>
                <p>{{ __('mutafest.contact.newsletter.description') }}</p>
                <div class="newsletter-form">
                    <input type="email" placeholder="{{ __('mutafest.contact.newsletter.email_placeholder') }}" id="newsletter-email">
                    <button type="button" onclick="subscribeNewsletter()">{{ __('mutafest.contact.newsletter.submit_btn') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>MutaFest 2025</h3>
                <p>{{ __('mutafest.hero.subtitle') }}</p>
                <p>{{ __('mutafest.hero.dates') }}</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>{{ __('mutafest.footer.quick_links') }}</h3>
                <a href="#program">{{ __('mutafest.nav.program') }}</a>
                <a href="#guests">{{ __('mutafest.nav.guests') }}</a>
                <a href="#exhibitions">{{ __('mutafest.nav.exhibitions') }}</a>
                <a href="#info">{{ __('mutafest.nav.info') }}</a>
            </div>
            
            <div class="footer-section">
                <h3>{{ __('mutafest.footer.partners') }}</h3>
                <a href="https://almutawassit.it">{{ __('mutafest.footer.partner1') }}</a>
                <a href="#">{{ __('mutafest.footer.partner2') }}</a>
                <a href="#">{{ __('mutafest.footer.partner3') }}</a>
                <a href="#">{{ __('mutafest.footer.partner4') }}</a>
            </div>
            
            <div class="footer-section">
                <h3>{{ __('mutafest.footer.contact_us') }}</h3>
                <a href="mailto:info@mutafest.it">{{ __('mutafest.contact.info.email') }}</a>
                <a href="tel:+390287654321">{{ __('mutafest.contact.info.phone') }}</a>
                <p>{{ __('mutafest.contact.info.address') }}</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 MutaFest. {{ __('mutafest.footer.rights') }}</p>
        </div>
    </footer>

    <script>
        // Navigation functionality
        function showPage(pageId) {
            // Hide all pages
            const pages = document.querySelectorAll('.page-content');
            pages.forEach(page => {
                page.classList.remove('active');
            });
            
            // Hide hero section
            const hero = document.getElementById('home');
            const colorBanner = document.querySelector('.color-banner');
            
            if (pageId === 'home') {
                hero.style.display = 'flex';
                colorBanner.style.display = 'flex';
            } else {
                hero.style.display = 'none';
                colorBanner.style.display = 'none';
                
                // Show selected page
                const selectedPage = document.getElementById(pageId);
                if (selectedPage) {
                    selectedPage.classList.add('active');
                }
            }
            
            // Update navigation active state
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            
            const activeLink = document.querySelector(`[href="#${pageId}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }

        // Language switching
        function switchLanguage(lang) {
            window.location.href = `/language/${lang}`;
        }

        // Download functions
        function downloadProgram() {
            fetch('/mutafest/download/program')
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch(error => console.error('Error:', error));
        }

        function downloadPressKit() {
            fetch('/mutafest/download/press-kit')
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch(error => console.error('Error:', error));
        }

        function downloadImages() {
            fetch('/mutafest/download/images')
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch(error => console.error('Error:', error));
        }

        // Newsletter subscription
        function subscribeNewsletter() {
            const email = document.getElementById('newsletter-email').value;
            if (!email) {
                alert('Please enter your email address');
                return;
            }

            fetch('/mutafest/newsletter/subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    document.getElementById('newsletter-email').value = '';
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Form submissions
        function submitContact(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);

            fetch('/mutafest/contact/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    event.target.reset();
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function submitPressAccreditation(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);

            fetch('/mutafest/press/accreditation', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    event.target.reset();
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pageId = this.getAttribute('href').substring(1);
                    showPage(pageId);
                });
            });
            
            // Initialize with home page
            showPage('home');
        });
    </script>
</body>
</html>