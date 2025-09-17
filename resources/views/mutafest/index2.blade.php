<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('mutafest.meta.title') }}</title>
    <meta name="description" content="{{ __('mutafest.meta.description') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Inter', sans-serif;
            background: #316995;
            color: white;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(49, 105, 149, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            height: 80px;
        }

        .logo {
            height: 50px;
            width: auto;
            filter: brightness(1.1);
        }

        .nav-menu {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: white;
        }

        .cta-button {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            padding: 12px 24px;
            border-radius: 24px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .cta-button:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            padding: 120px 0 80px;
            text-align: center;
        }

        .hero-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .hero-logo {
            height: 120px;
            width: auto;
            margin-bottom: 32px;
            filter: drop-shadow(0 8px 25px rgba(0, 0, 0, 0.3));
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 300;
            line-height: 1.2;
            margin-bottom: 24px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 48px;
        }

        /* Content Cards */
        .content-section {
            padding: 80px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 64px;
            color: white;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 32px;
            margin-bottom: 64px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            padding: 40px;
            color: #2c3e50;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #316995, #4a90a4);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-bottom: 24px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 16px;
            color: #316995;
        }

        .card-description {
            font-size: 1rem;
            line-height: 1.6;
            color: #4a5568;
        }

        /* Program Section */
        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .program-day {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .day-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 24px;
            color: white;
        }

        .session {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .session:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .session-time {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 8px;
        }

        .session-title {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .session-participants {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Footer */
        .footer {
            background: rgba(0, 0, 0, 0.2);
            padding: 60px 0 40px;
            margin-top: 80px;
        }

        .footer-content {
            text-align: center;
        }

        .footer-logo {
            height: 60px;
            width: auto;
            margin-bottom: 24px;
            opacity: 0.8;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 32px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 32px;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 32px 24px;
            }

            .program-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<!-- Header -->
<header class="header">
    <div class="nav-container">
        <img src="https://impro.usercontent.one/appid/oneComWsb/domain/mutafest.com/media/mutafest.com/onewebmedia/logo.png?etag=null&sourceContentType=image%2Fpng&ignoreAspectRatio&resize=518%2B180" alt="MutaFest" class="logo">

        <nav>
            <ul class="nav-menu">
                <li><a href="#about" class="nav-link">{{ __('mutafest.nav.about') }}</a></li>
                <li><a href="#program" class="nav-link">{{ __('mutafest.nav.program') }}</a></li>
                <li><a href="#guests" class="nav-link">{{ __('mutafest.nav.guests') }}</a></li>
            </ul>
        </nav>

        <a href="{{ route('mutafest.booking') }}" class="cta-button">{{ __('mutafest.nav.book_invitation') }}</a>
    </div>
</header>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <img src="https://impro.usercontent.one/appid/oneComWsb/domain/mutafest.com/media/mutafest.com/onewebmedia/logo.png?etag=null&sourceContentType=image%2Fpng&ignoreAspectRatio&resize=518%2B180" alt="MutaFest" class="hero-logo">
        <h1 class="hero-title">Festival del Mediterraneo<br>a Milano</h1>
        <p class="hero-subtitle">Un viaggio attraverso culture, letterature e arti del Mediterraneo</p>
    </div>
</section>

<!-- About Section -->
<section id="about" class="content-section">
    <div class="container">
        <h2 class="section-title">{{ __('mutafest.about.title') }}</h2>
        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-globe-europe"></i>
                </div>
                <h3 class="card-title">Culture Mediterranee</h3>
                <p class="card-description">Un festival dedicato alle culture, alle letterature e alle arti nate sulle sponde del Mar Mediterraneo.</p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3 class="card-title">Letteratura & Poesia</h3>
                <p class="card-description">Incontri con scrittori, poeti e traduttori da tutti i Paesi del Mediterraneo.</p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-music"></i>
                </div>
                <h3 class="card-title">Arti & Musica</h3>
                <p class="card-description">Concerti, performance e momenti conviviali che celebrano la diversità culturale.</p>
            </div>
        </div>
    </div>
</section>

<!-- Program Section -->
<section id="program" class="content-section">
    <div class="container">
        <h2 class="section-title">{{ __('mutafest.nav.program') }}</h2>
        <div class="program-grid">
            @foreach($program as $dayKey => $day)
                <div class="program-day">
                    <h3 class="day-title">{{ $day['title'] }}</h3>
                    @foreach($day['sessions'] as $session)
                        <div class="session">
                            <div class="session-time">{{ $session['time'] }}</div>
                            <div class="session-title">{{ $session['title'] }}</div>
                            <div class="session-participants">{{ $session['participants'] }}</div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Guests Section -->
<section id="guests" class="content-section">
    <div class="container">
        <h2 class="section-title">{{ __('mutafest.nav.guests') }}</h2>
        <div class="cards-grid">
            @foreach($guests as $guest)
                <div class="card">
                    <div class="card-icon">
                        <i class="{{ $guest['icon'] }}"></i>
                    </div>
                    <h3 class="card-title">{{ $guest['name'] }}</h3>
                    <p class="card-description">
                        <strong>{{ $guest['country'] }}</strong><br>
                        {{ $guest['role'] }}<br>
                        {{ $guest['bio'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <img src="https://impro.usercontent.one/appid/oneComWsb/domain/mutafest.com/media/mutafest.com/onewebmedia/logo.png?etag=null&sourceContentType=image%2Fpng&ignoreAspectRatio&resize=518%2B180" alt="MutaFest" class="footer-logo">
            <p class="footer-text">MutaFest - Festival del Mediterraneo a Milano</p>

            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
            </div>

            <p class="footer-text">&copy; 2025 MutaFest. Tutti i diritti riservati.</p>
        </div>
    </div>
</footer>

<script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Header background on scroll
    window.addEventListener('scroll', () => {
        const header = document.querySelector('.header');
        if (window.scrollY > 50) {
            header.style.background = 'rgba(49, 105, 149, 0.98)';
        } else {
            header.style.background = 'rgba(49, 105, 149, 0.95)';
        }
    });
</script>
</body>
</html>
