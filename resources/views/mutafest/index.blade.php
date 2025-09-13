<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('mutafest.meta.title') }}</title>
    <meta name="description" content="{{ __('mutafest.meta.description') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Fonts -->
    <style>
        /* Diodrum Arabic Font for Titles */
        @font-face {
            font-family: 'DiodrumArabic';
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            src: url('https://alfont.com/wp-content/fonts/new-arabic-fonts//alfont_com_AlFont_com_DiodrumArabic-Regular-1.ttf') format('truetype');
        }

        /* Import Noto Sans Arabic as fallback */
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600;700&display=swap');

        /* Bahij TheSansArabic Font for Text */
        @font-face {
            font-family: 'Bahij';
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            src: url('https://alfont.com/wp-content/fonts/diwany-arabic-fonts//alfont_com_ArbFONTS-Bahij_TheSansArabic-Plain.ttf') format('truetype');
        }
    </style>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #2E86AB;
            --deep-blue: #1B4F72;
            --coral: #F24236;
            --sand: #F6E3CE;
            --teal: #A23B72;
            --gold: #F18F01;
            --white: #FFFFFF;
            --dark: #2C3E50;
        }

        body {
            font-family: 'Bahij', 'Noto Sans Arabic', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Font Family Classes */
        .font-title {
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-weight: bold;
        }

        .font-text {
            font-family: 'Bahij', 'Noto Sans Arabic', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* All headings use Diodrum Arabic Bold */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-weight: bold;
        }

        /* Ensure text elements use Bahij */
        p, span, div, li, a {
            font-family: 'Bahij', 'Noto Sans Arabic', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Navigation */
        .top-bar {
            background: linear-gradient(135deg, var(--primary-blue), var(--deep-blue));
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .top-bar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .quick-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9em;
            font-weight: 500;
        }

        .btn-primary {
            background: var(--coral);
            color: white;
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 1px solid white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .language-switcher {
            display: flex;
            gap: 10px;
        }

        .lang-btn {
            background: transparent;
            color: white;
            border: 1px solid rgba(255,255,255,0.3);
            padding: 5px 10px;
            border-radius: 15px;
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
            position: relative;
        }

        .logo {
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', sans-serif;
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
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', sans-serif;
            font-weight: 700;
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
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', sans-serif;
            font-size: 4em;
            font-weight: bold;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #FFFFFF, var(--sand));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero h2 {
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', sans-serif;
            font-size: 2em;
            font-weight: bold;
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
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', sans-serif;
            font-size: 2.5em;
            font-weight: bold;
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
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', sans-serif;
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
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', sans-serif;
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
            font-family: 'DiodrumArabic', 'Noto Sans Arabic', 'Inter', sans-serif;
            font-weight: bold;
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

        /* Mobile Navigation Toggle */
        .nav-toggle {
            display: none;
            background: linear-gradient(135deg, var(--primary-blue), var(--coral));
            border: none;
            font-size: 1.5em;
            color: white;
            cursor: pointer;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(46, 134, 171, 0.3);
            position: relative;
            z-index: 1001;
        }

        .nav-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46, 134, 171, 0.4);
        }

        .nav-toggle:active {
            transform: translateY(0);
        }

        /* Hamburger Animation */
        .nav-toggle i {
            transition: all 0.3s ease;
        }

        .nav-toggle.active {
            background: linear-gradient(135deg, var(--coral), var(--primary-blue));
        }

        /* Mobile Menu Overlay */
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .mobile-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Mobile Responsiveness */
        @media (max-width: 1024px) {
            .nav-links {
                gap: 20px;
            }

            .hero h1 {
                font-size: 3.5em;
            }

            .guests-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            /* Mobile Navigation */
            .nav-toggle {
                display: block !important;
                position: relative !important;
                z-index: 1001 !important;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 350px;
                height: 100vh;
                background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(46, 134, 171, 0.05));
                backdrop-filter: blur(30px);
                flex-direction: column;
                justify-content: flex-start;
                align-items: stretch;
                padding: 120px 0 40px 0;
                transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                z-index: 1000;
                box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
                border-left: 1px solid rgba(46, 134, 171, 0.1);
                display: none;
            }

            .nav-links.active {
                display: flex !important;
                right: 0;
                transform: translateX(0);
            }

            /* RTL Support for drawer */
            [dir="rtl"] .nav-links {
                right: auto;
                left: -100%;
                border-left: none;
                border-right: 1px solid rgba(46, 134, 171, 0.1);
                box-shadow: 10px 0 30px rgba(0, 0, 0, 0.1);
            }

            [dir="rtl"] .nav-links.active {
                left: 0;
                right: auto;
            }

            /* Ensure nav toggle is always visible on mobile */
            .nav-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .nav-links li {
                margin: 0;
                opacity: 0;
                transform: translateX(50px);
                animation: slideInNav 0.5s ease forwards;
            }

            .nav-links.active li {
                animation-delay: calc(0.1s * var(--i, 0));
            }

            .nav-links a {
                font-size: 1.1em;
                padding: 18px 30px;
                margin: 8px 20px;
                display: block;
                text-align: left;
                border-radius: 15px;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                background: transparent;
                border-left: 4px solid transparent;
            }

            .nav-links a::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 0;
                height: 100%;
                background: linear-gradient(135deg, rgba(46, 134, 171, 0.1), rgba(241, 143, 1, 0.1));
                transition: width 0.3s ease;
                z-index: -1;
            }

            .nav-links a:hover::before,
            .nav-links a.active::before {
                width: 100%;
            }

            .nav-links a:hover,
            .nav-links a.active {
                color: var(--coral);
                border-left-color: var(--coral);
                transform: translateX(10px);
            }

            /* RTL adjustments for menu items */
            [dir="rtl"] .nav-links a {
                text-align: right;
                border-left: none;
                border-right: 4px solid transparent;
            }

            [dir="rtl"] .nav-links a:hover,
            [dir="rtl"] .nav-links a.active {
                border-right-color: var(--coral);
                transform: translateX(-10px);
            }

            /* Animation for menu items */
            @keyframes slideInNav {
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            /* Mobile Top Bar */
            .top-bar-content {
                flex-direction: column;
                gap: 10px;
                padding: 8px 20px;
            }

            .quick-actions {
                order: 2;
                flex-wrap: wrap;
                justify-content: center;
            }

            .btn {
                font-size: 0.8em;
                padding: 6px 12px;
            }

            .language-switcher {
                gap: 8px;
            }

            .lang-btn {
                padding: 4px 8px;
                font-size: 0.9em;
            }

            /* Mobile Hero */
            .hero {
                margin-top: 140px;
                padding: 40px 20px;
                min-height: 80vh;
            }

            .hero h1 {
                font-size: 2.5em;
                margin-bottom: 15px;
            }

            .hero h2 {
                font-size: 1.5em;
                margin-bottom: 8px;
            }

            .hero .subtitle {
                font-size: 1.2em;
                margin-bottom: 20px;
            }

            .hero .dates {
                font-size: 1.1em;
                margin-bottom: 30px;
            }

            .hero .cta-btn {
                font-size: 1em;
                padding: 12px 30px;
            }

            /* Mobile Color Banner */
            .color-banner {
                height: 80px;
                font-size: 1.2em;
                padding: 0 20px;
                text-align: center;
            }

            /* Mobile Content */
            .section-title {
                font-size: 2em;
                margin-bottom: 30px;
            }

            .card {
                padding: 20px;
                margin-bottom: 20px;
            }

            .card h3 {
                font-size: 1.3em;
                margin-bottom: 15px;
            }

            .card h4 {
                font-size: 1.1em;
                margin: 15px 0 10px 0;
            }

            /* Mobile Program */
            .program-day {
                margin-bottom: 30px;
            }

            .day-header {
                padding: 15px;
                font-size: 1.2em;
            }

            .day-content {
                padding: 15px;
            }

            .session {
                padding: 12px;
                margin-bottom: 12px;
            }

            .session-time {
                font-size: 0.9em;
            }

            .session-title {
                font-size: 1.1em;
            }

            /* Mobile Guests */
            .guests-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .guest-image {
                height: 200px;
                font-size: 3em;
            }

            .guest-info {
                padding: 15px;
            }

            .guest-name {
                font-size: 1.2em;
            }

            /* Mobile Newsletter */
            .newsletter {
                padding: 25px 20px;
                margin: 30px 0;
            }

            .newsletter h3 {
                font-size: 1.3em;
                margin-bottom: 10px;
            }

            .newsletter-form {
                flex-direction: column;
                max-width: 100%;
                gap: 15px;
            }

            .newsletter input {
                padding: 10px;
                font-size: 16px;
            }

            .newsletter button {
                padding: 10px 15px;
                border-radius: 25px;
            }

            /* Mobile Footer */
            .footer {
                padding: 30px 0 15px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 25px;
                text-align: center;
            }

            .footer-section h3 {
                margin-bottom: 15px;
            }

            .social-links {
                justify-content: center;
                margin-top: 15px;
            }

            /* Mobile Forms */
            .card form div {
                margin-bottom: 12px !important;
            }

            .card form input,
            .card form textarea {
                padding: 10px !important;
                font-size: 16px !important;
                border-radius: 6px !important;
            }
        }

        @media (max-width: 480px) {
            /* Extra small mobile devices */
            .nav-toggle {
                display: block !important;
                font-size: 1.3em !important;
                padding: 10px !important;
            }

            .nav-links {
                width: 90% !important;
                max-width: 300px !important;
            }

            .hero h1 {
                font-size: 2em;
            }

            .hero h2 {
                font-size: 1.3em;
            }

            .hero .subtitle {
                font-size: 1.1em;
            }

            .hero .dates {
                font-size: 1em;
            }

            .section-title {
                font-size: 1.8em;
            }

            .card {
                padding: 15px;
            }

            .quick-actions {
                flex-direction: column;
                align-items: center;
                gap: 8px;
            }

            .language-switcher {
                flex-wrap: wrap;
                justify-content: center;
            }

            .color-banner {
                font-size: 1em;
                height: 70px;
            }
        }

        /* Ensure navigation toggle is always visible on any small screen */
        @media (max-width: 1024px) {
            .nav-toggle {
                display: block !important;
                opacity: 1 !important;
                visibility: visible !important;
                pointer-events: auto !important;
            }
            
            .nav-links:not(.active) {
                display: none !important;
            }

            .nav-content {
                flex-wrap: nowrap !important;
            }

            .logo {
                flex-shrink: 0;
            }
        }

        /* Force hamburger visibility on all mobile devices */
        @media screen and (max-width: 1024px) {
            .nav-toggle {
                display: block !important;
                background: linear-gradient(135deg, var(--coral), var(--primary-blue)) !important;
                color: white !important;
                border: none !important;
                min-width: 44px !important;
                min-height: 44px !important;
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

        /* Enhanced About Page Styles */
        .about-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            display: flex;
            align-items: flex-start;
            gap: 30px;
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(30px);
        }

        .about-card.fade-in {
            animation: fadeInUp 0.8s ease forwards;
        }

        .about-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .about-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-blue), var(--coral));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(46, 134, 171, 0.3);
        }

        .about-content {
            flex: 1;
        }

        .about-content h3 {
            margin-bottom: 15px;
            color: var(--primary-blue);
            font-size: 1.5em;
        }

        .about-content p {
            line-height: 1.8;
            color: var(--dark);
        }

        /* About Grid for Organizers */
        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .about-card-small {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(30px);
        }

        .about-card-small.fade-in {
            animation: fadeInUp 0.8s ease forwards;
        }

        .about-card-small:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .about-icon-small {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--teal), var(--gold));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5em;
            color: white;
            margin: 0 auto 20px auto;
        }

        /* Enhanced Contact Form Styles */
        .about-content form input:focus,
        .about-content form textarea:focus {
            border-color: var(--coral) !important;
            box-shadow: 0 0 0 3px rgba(241, 143, 1, 0.1) !important;
            transform: translateY(-2px);
        }

        .about-content form input:hover,
        .about-content form textarea:hover {
            border-color: var(--teal) !important;
            transform: translateY(-1px);
        }

        .about-content form button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(241, 143, 1, 0.4) !important;
        }

        /* Newsletter form responsiveness */
        @media (max-width: 768px) {
            .about-content div[style*="display: flex"] {
                flex-direction: column !important;
                gap: 15px !important;
            }
        }
            box-shadow: 0 6px 15px rgba(162, 59, 114, 0.3);
        }

        .about-card-small h4 {
            margin-bottom: 15px;
            color: var(--primary-blue);
        }

        .about-card-small p {
            color: var(--dark);
            line-height: 1.7;
        }

        /* Director Card Special Styling */
        .director-card {
            background: linear-gradient(135deg, rgba(46, 134, 171, 0.05), rgba(242, 66, 54, 0.05));
            border: 2px solid transparent;
            background-clip: padding-box;
        }

        .director-info h4 {
            color: var(--coral);
            font-size: 1.3em;
            margin-bottom: 10px;
        }

        /* Fade In Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile About Page Styles */
        @media (max-width: 768px) {
            .about-card {
                flex-direction: column;
                text-align: center;
                padding: 25px;
                gap: 20px;
            }

            .about-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5em;
                margin: 0 auto;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                margin: 30px 0;
            }

            .about-card-small {
                padding: 20px;
            }

            .about-icon-small {
                width: 50px;
                height: 50px;
                font-size: 1.2em;
            }
        }

        /* RTL Support */
        [dir="rtl"] .session {
            border-right: none;
            border-left: 4px solid var(--coral);
        }

        [dir="rtl"] .nav-links a::after {
            right: 0;
            left: auto;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="quick-actions">
                <a href="#" class="btn btn-primary" onclick="bookInvitation()">{{ __('mutafest.nav.book_invitation') }}</a>
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
    <!-- Mobile Navigation Overlay -->
    <div class="mobile-overlay" id="mobile-overlay" onclick="closeMobileNav()"></div>

    <nav class="main-nav">
        <div class="nav-content">
            <div class="logo">MutaFest</div>
            <button class="nav-toggle" id="nav-toggle" onclick="toggleNav()">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links" id="nav-links">
                <li style="--i: 1"><a href="#home" class="nav-link active">{{ __('mutafest.nav.home') }}</a></li>
                <li style="--i: 2"><a href="#about" class="nav-link">{{ __('mutafest.nav.about') }}</a></li>
                <li style="--i: 3"><a href="#program" class="nav-link">{{ __('mutafest.nav.program') }}</a></li>
                <li style="--i: 4"><a href="#guests" class="nav-link">{{ __('mutafest.nav.guests') }}</a></li>
                <li style="--i: 5"><a href="#exhibitions" class="nav-link">{{ __('mutafest.nav.exhibitions') }}</a></li>
                <li style="--i: 6"><a href="#press" class="nav-link">{{ __('mutafest.nav.press') }}</a></li>
                <li style="--i: 7"><a href="#info" class="nav-link">{{ __('mutafest.nav.info') }}</a></li>
                <li style="--i: 8"><a href="#contact" class="nav-link">{{ __('mutafest.nav.contact') }}</a></li>
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
            
            <!-- Festival Introduction Card -->
            <div class="about-card fade-in" data-delay="0">
                <div class="about-icon">
                    <i class="fas fa-water"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.about.festival_title') }}</h3>
                    <p>{{ __('mutafest.about.description') }}</p>
                </div>
            </div>

            <!-- Goal Card -->
            <div class="about-card fade-in" data-delay="200">
                <div class="about-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.about.goal_title') }}</h3>
                    <p>{{ __('mutafest.about.goal_description') }}</p>
                </div>
            </div>

            <!-- Organizers Cards -->
            <div class="about-grid">
                <div class="about-card-small fade-in" data-delay="400">
                    <div class="about-icon-small">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>{{ __('mutafest.about.organizer1_name') }}</h4>
                    <p>{{ __('mutafest.about.organizer1_desc') }}</p>
                </div>
                
                <div class="about-card-small fade-in" data-delay="600">
                    <div class="about-icon-small">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h4>{{ __('mutafest.about.organizer2_name') }}</h4>
                    <p>{{ __('mutafest.about.organizer2_desc') }}</p>
                </div>
            </div>

            <!-- Partners Card -->
            <div class="about-card fade-in" data-delay="800">
                <div class="about-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.about.partners_title') }}</h3>
                    <p>{{ __('mutafest.about.partners_description') }}</p>
                </div>
            </div>

            <!-- Director Card -->
            <div class="about-card director-card fade-in" data-delay="1000">
                <div class="about-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.about.director_title') }}</h3>
                    <div class="director-info">
                        <h4>{{ __('mutafest.about.director_name') }}</h4>
                        <p>{{ __('mutafest.about.director_description') }}</p>
                    </div>
                </div>
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
            
            <!-- Photo Exhibition Card -->
            <div class="about-card fade-in" data-delay="0">
                <div class="about-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.exhibitions.photo.title') }}</h3>
                    <p>{{ __('mutafest.exhibitions.photo.description') }}</p>
                    <p><strong>{{ __('mutafest.exhibitions.photo.location_label') }}:</strong> {{ __('mutafest.exhibitions.photo.location') }}</p>
                    <p><strong>{{ __('mutafest.exhibitions.photo.timing_label') }}:</strong> {{ __('mutafest.exhibitions.photo.timing') }}</p>
                </div>
            </div>

            <!-- Theater Show Card -->
            <div class="about-card fade-in" data-delay="200">
                <div class="about-icon">
                    <i class="fas fa-theater-masks"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.exhibitions.show.title') }}</h3>
                    <p>{{ __('mutafest.exhibitions.show.description') }}</p>
                    <p><strong>{{ __('mutafest.exhibitions.show.direction_label') }}:</strong> {{ __('mutafest.exhibitions.show.direction') }}</p>
                    <p><strong>{{ __('mutafest.exhibitions.show.duration_label') }}:</strong> {{ __('mutafest.exhibitions.show.duration') }}</p>
                </div>
            </div>

            <!-- Music Performances Card -->
            <div class="about-card fade-in" data-delay="400">
                <div class="about-icon">
                    <i class="fas fa-music"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.exhibitions.music.title') }}</h3>
                    <p>{{ __('mutafest.exhibitions.music.description') }}</p>
                    <ul style="margin-top: 15px; padding-left: 20px;">
                        @foreach(__('mutafest.exhibitions.music.events') as $event)
                        <li style="margin-bottom: 8px; color: var(--dark);">{{ $event }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Cinema Screenings Card -->
            <div class="about-card fade-in" data-delay="600">
                <div class="about-icon">
                    <i class="fas fa-film"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.exhibitions.cinema.title') }}</h3>
                    <p>{{ __('mutafest.exhibitions.cinema.description') }}</p>
                    <p><strong>{{ __('mutafest.exhibitions.cinema.schedule_label') }}:</strong> {{ __('mutafest.exhibitions.cinema.schedule') }}</p>
                </div>
            </div>

            <!-- After Party Card -->
            <div class="about-card fade-in" data-delay="800">
                <div class="about-icon">
                    <i class="fas fa-cocktail"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.exhibitions.after_party.title') }}</h3>
                    <p>{{ __('mutafest.exhibitions.after_party.description') }}</p>
                    <p><strong>{{ __('mutafest.exhibitions.after_party.timing_label') }}:</strong> {{ __('mutafest.exhibitions.after_party.timing') }}</p>
                    <p><strong>{{ __('mutafest.exhibitions.after_party.location_label') }}:</strong> {{ __('mutafest.exhibitions.after_party.location') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Press Page -->
    <div class="page-content" id="press">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.press.title') }}</h2>

            <!-- Press Materials Card -->
            <div class="about-card fade-in" data-delay="0">
                <div class="about-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.press.materials.title') }}</h3>
                    <p>{{ __('mutafest.press.materials.description') }}</p>
                    <div style="margin-top: 20px;">
                        <a href="#" class="btn btn-primary" style="margin-right: 10px;" onclick="downloadPressKit()">{{ __('mutafest.press.materials.press_kit_btn') }}</a>
                        <a href="#" class="btn btn-secondary">{{ __('mutafest.press.materials.press_release_btn') }}</a>
                    </div>
                </div>
            </div>

            <!-- Press Images Card -->
            <div class="about-card fade-in" data-delay="200">
                <div class="about-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.press.images.title') }}</h3>
                    <p>{{ __('mutafest.press.images.description') }}</p>
                    <ul style="margin-top: 15px; padding-left: 20px;">
                        @foreach(__('mutafest.press.images.types') as $type)
                        <li style="margin-bottom: 8px; color: var(--dark);">{{ $type }}</li>
                        @endforeach
                    </ul>
                    <button class="btn btn-primary" style="margin-top: 15px;" onclick="downloadImages()">{{ __('mutafest.press.images.download_btn') }}</button>
                </div>
            </div>

            <!-- Press Accreditation Card -->
            <div class="about-card fade-in" data-delay="400">
                <div class="about-icon">
                    <i class="fas fa-microphone"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.press.accreditation.title') }}</h3>
                    <p>{{ __('mutafest.press.accreditation.description') }}</p>
                    <form style="margin-top: 20px;" onsubmit="submitPressAccreditation(event)">
                        @csrf
                        <div style="margin-bottom: 15px;">
                            <input type="text" name="name" placeholder="{{ __('mutafest.press.accreditation.name_placeholder') }}" style="width: 100%; padding: 12px; border: 2px solid var(--primary-blue); border-radius: 8px; font-size: 14px;" required>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <input type="email" name="email" placeholder="{{ __('mutafest.press.accreditation.email_placeholder') }}" style="width: 100%; padding: 12px; border: 2px solid var(--primary-blue); border-radius: 8px; font-size: 14px;" required>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <input type="text" name="organization" placeholder="{{ __('mutafest.press.accreditation.organization_placeholder') }}" style="width: 100%; padding: 12px; border: 2px solid var(--primary-blue); border-radius: 8px; font-size: 14px;" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('mutafest.press.accreditation.submit_btn') }}</button>
                    </form>
                </div>
            </div>

            <!-- Press Contact Card -->
            <div class="about-card fade-in" data-delay="600">
                <div class="about-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.press.contact.title') }}</h3>
                    <p><strong>{{ __('mutafest.press.contact.coordinator_label') }}:</strong> <a href="mailto:{{ __('mutafest.press.contact.coordinator_email') }}" style="color: var(--coral);">{{ __('mutafest.press.contact.coordinator_email') }}</a></p>
                    <p><strong>{{ __('mutafest.press.contact.phone_label') }}:</strong> <a href="tel:{{ __('mutafest.press.contact.phone') }}" style="color: var(--coral);">{{ __('mutafest.press.contact.phone') }}</a></p>
                    <p><strong>{{ __('mutafest.press.contact.whatsapp_label') }}:</strong> <a href="https://wa.me/{{ str_replace(['+', ' '], '', __('mutafest.press.contact.whatsapp')) }}" style="color: var(--coral);" target="_blank">{{ __('mutafest.press.contact.whatsapp') }}</a></p>
                    <p style="margin-top: 15px; font-style: italic; color: var(--teal);">{{ __('mutafest.press.contact.availability') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Page -->
    <div class="page-content" id="info">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.info.title') }}</h2>

            <!-- Venue Information Card -->
            <div class="about-card fade-in" data-delay="0">
                <div class="about-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.info.venue.title') }}</h3>
                    <p><strong>{{ __('mutafest.info.venue.address_label') }}:</strong> {{ __('mutafest.info.venue.address') }}</p>
                    <p><strong>{{ __('mutafest.info.venue.metro_label') }}:</strong> {{ __('mutafest.info.venue.metro') }}</p>
                    <p><strong>{{ __('mutafest.info.venue.bus_label') }}:</strong> {{ __('mutafest.info.venue.bus') }}</p>
                    <p><strong>{{ __('mutafest.info.venue.car_label') }}:</strong> {{ __('mutafest.info.venue.car') }}</p>
                    <p><strong>{{ __('mutafest.info.venue.airport_label') }}:</strong> {{ __('mutafest.info.venue.airport') }}</p>
                </div>
            </div>

            <!-- Accommodation Card -->
            <div class="about-card fade-in" data-delay="200">
                <div class="about-icon">
                    <i class="fas fa-bed"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.info.accommodation.title') }}</h3>
                    <ul style="margin-top: 15px; padding-left: 20px;">
                        @foreach(__('mutafest.info.accommodation.hotels') as $hotel)
                        <li style="margin-bottom: 10px; color: var(--dark);"><strong>{{ $hotel['name'] }}:</strong> {{ $hotel['description'] }} - <span style="color: var(--coral);">{{ $hotel['price'] }}</span></li>
                        @endforeach
                    </ul>
                    <p style="margin-top: 20px; padding: 15px; background: linear-gradient(135deg, rgba(46, 134, 171, 0.1), rgba(241, 143, 1, 0.1)); border-radius: 10px; font-weight: bold; color: var(--primary-blue);">{{ __('mutafest.info.accommodation.discount_note') }}</p>
                </div>
            </div>

            <!-- Accessibility Card -->
            <div class="about-card fade-in" data-delay="400">
                <div class="about-icon">
                    <i class="fas fa-wheelchair"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.info.accessibility.title') }}</h3>
                    <p>{{ __('mutafest.info.accessibility.description') }}</p>
                    <ul style="margin-top: 15px; padding-left: 20px;">
                        @foreach(__('mutafest.info.accessibility.features') as $feature)
                        <li style="margin-bottom: 8px; color: var(--dark);">{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Restaurants Card -->
            <div class="about-card fade-in" data-delay="600">
                <div class="about-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.info.restaurants.title') }}</h3>
                    <p>{{ __('mutafest.info.restaurants.description') }}</p>
                    <ul style="margin-top: 15px; padding-left: 20px;">
                        @foreach(__('mutafest.info.restaurants.list') as $restaurant)
                        <li style="margin-bottom: 10px; color: var(--dark);"><strong style="color: var(--teal);">{{ $restaurant['name'] }}:</strong> {{ $restaurant['description'] }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Important Information Card -->
            <div class="about-card fade-in" data-delay="800">
                <div class="about-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.info.important.title') }}</h3>
                    <div style="margin-top: 15px;">
                        @foreach(__('mutafest.info.important.items') as $item)
                        <div style="margin-bottom: 15px; padding: 15px; background: linear-gradient(135deg, rgba(241, 143, 1, 0.05), rgba(46, 134, 171, 0.05)); border-radius: 10px; border-left: 4px solid var(--coral);">
                            <strong style="color: var(--primary-blue);">{{ $item['label'] }}:</strong> 
                            <span style="color: var(--dark); margin-left: 8px;">{{ $item['value'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Page -->
    <div class="page-content" id="contact">
        <div class="container">
            <h2 class="section-title">{{ __('mutafest.contact.title') }}</h2>

            <!-- Contact Form Card -->
            <div class="about-card fade-in" data-delay="0">
                <div class="about-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.contact.form.title') }}</h3>
                    <form style="margin-top: 25px;" onsubmit="submitContact(event)">
                        @csrf
                        <div style="margin-bottom: 20px;">
                            <input type="text" name="name" placeholder="{{ __('mutafest.contact.form.name_placeholder') }}" style="width: 100%; padding: 15px; border: 2px solid var(--primary-blue); border-radius: 12px; font-size: 16px; background: rgba(255,255,255,0.8); transition: all 0.3s ease; outline: none;" required>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <input type="email" name="email" placeholder="{{ __('mutafest.contact.form.email_placeholder') }}" style="width: 100%; padding: 15px; border: 2px solid var(--primary-blue); border-radius: 12px; font-size: 16px; background: rgba(255,255,255,0.8); transition: all 0.3s ease; outline: none;" required>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <input type="text" name="subject" placeholder="{{ __('mutafest.contact.form.subject_placeholder') }}" style="width: 100%; padding: 15px; border: 2px solid var(--primary-blue); border-radius: 12px; font-size: 16px; background: rgba(255,255,255,0.8); transition: all 0.3s ease; outline: none;" required>
                        </div>
                        <div style="margin-bottom: 25px;">
                            <textarea name="message" placeholder="{{ __('mutafest.contact.form.message_placeholder') }}" rows="6" style="width: 100%; padding: 15px; border: 2px solid var(--primary-blue); border-radius: 12px; font-size: 16px; background: rgba(255,255,255,0.8); transition: all 0.3s ease; outline: none; resize: vertical; min-height: 140px;" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, var(--coral), var(--primary-blue)); border: none; padding: 15px 30px; border-radius: 25px; font-size: 16px; font-weight: bold; color: white; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 8px 20px rgba(241, 143, 1, 0.3);">{{ __('mutafest.contact.form.submit_btn') }}</button>
                    </form>
                </div>
            </div>

            <!-- Contact Information Card -->
            <div class="about-card fade-in" data-delay="200">
                <div class="about-icon">
                    <i class="fas fa-info"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.contact.info.title') }}</h3>
                    <div style="margin-top: 20px;">
                        <div style="margin-bottom: 15px; padding: 15px; background: linear-gradient(135deg, rgba(46, 134, 171, 0.05), rgba(241, 143, 1, 0.05)); border-radius: 10px; border-left: 4px solid var(--coral);">
                            <strong style="color: var(--primary-blue);">{{ __('mutafest.contact.info.email_label') }}:</strong> 
                            <a href="mailto:{{ __('mutafest.contact.info.email') }}" style="color: var(--coral); text-decoration: none; margin-left: 8px;">{{ __('mutafest.contact.info.email') }}</a>
                        </div>
                        <div style="margin-bottom: 15px; padding: 15px; background: linear-gradient(135deg, rgba(46, 134, 171, 0.05), rgba(241, 143, 1, 0.05)); border-radius: 10px; border-left: 4px solid var(--teal);">
                            <strong style="color: var(--primary-blue);">{{ __('mutafest.contact.info.phone_label') }}:</strong> 
                            <a href="tel:{{ str_replace(' ', '', __('mutafest.contact.info.phone')) }}" style="color: var(--teal); text-decoration: none; margin-left: 8px;">{{ __('mutafest.contact.info.phone') }}</a>
                        </div>
                        <div style="margin-bottom: 15px; padding: 15px; background: linear-gradient(135deg, rgba(46, 134, 171, 0.05), rgba(241, 143, 1, 0.05)); border-radius: 10px; border-left: 4px solid var(--primary-blue);">
                            <strong style="color: var(--primary-blue);">{{ __('mutafest.contact.info.address_label') }}:</strong> 
                            <span style="color: var(--dark); margin-left: 8px;">{{ __('mutafest.contact.info.address') }}</span>
                        </div>
                        <div style="margin-bottom: 15px; padding: 15px; background: linear-gradient(135deg, rgba(46, 134, 171, 0.05), rgba(241, 143, 1, 0.05)); border-radius: 10px; border-left: 4px solid var(--gold);">
                            <strong style="color: var(--primary-blue);">{{ __('mutafest.contact.info.hours_label') }}:</strong> 
                            <span style="color: var(--dark); margin-left: 8px;">{{ __('mutafest.contact.info.hours') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter Subscription Card -->
            <div class="about-card fade-in" data-delay="400">
                <div class="about-icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <div class="about-content">
                    <h3>{{ __('mutafest.contact.newsletter.title') }}</h3>
                    <p style="margin-bottom: 25px;">{{ __('mutafest.contact.newsletter.description') }}</p>
                    <div style="display: flex; gap: 15px; max-width: 500px;">
                        <input type="email" placeholder="{{ __('mutafest.contact.newsletter.email_placeholder') }}" style="flex: 1; padding: 15px; border: 2px solid var(--primary-blue); border-radius: 25px; font-size: 16px; background: rgba(255,255,255,0.8); transition: all 0.3s ease; outline: none;">
                        <button type="submit" onclick="subscribeNewsletter()" style="padding: 15px 30px; background: linear-gradient(135deg, var(--teal), var(--coral)); color: white; border: none; border-radius: 25px; cursor: pointer; transition: all 0.3s ease; font-weight: bold; white-space: nowrap; box-shadow: 0 8px 20px rgba(60, 179, 113, 0.3);">{{ __('mutafest.contact.newsletter.submit_btn') }}</button>
                    </div>
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
                <a href="#">{{ __('mutafest.footer.partner1') }}</a>
                <a href="#">{{ __('mutafest.footer.partner2') }}</a>
                <a href="#">{{ __('mutafest.footer.partner3') }}</a>
                <a href="#">{{ __('mutafest.footer.partner4') }}</a>
            </div>

            <div class="footer-section">
                <h3>{{ __('mutafest.footer.contact_us') }}</h3>
                <a href="mailto:{{ __('mutafest.contact.info.email') }}">{{ __('mutafest.contact.info.email') }}</a>
                <a href="tel:{{ str_replace(' ', '', __('mutafest.contact.info.phone')) }}">{{ __('mutafest.contact.info.phone') }}</a>
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

            // Trigger animations for About page
            if (pageId === 'about') {
                triggerAboutAnimations();
            }
        }

        // About page animations
        function triggerAboutAnimations() {
            setTimeout(() => {
                const aboutElements = document.querySelectorAll('#about .fade-in');
                aboutElements.forEach((element, index) => {
                    const delay = element.getAttribute('data-delay') || 0;
                    setTimeout(() => {
                        element.style.animationDelay = '0s';
                        element.classList.add('fade-in');
                    }, parseInt(delay));
                });
            }, 100);
        }

        // Mobile navigation toggle
        function toggleNav() {
            const navLinks = document.getElementById('nav-links');
            const navToggle = document.querySelector('.nav-toggle');
            const navToggleIcon = document.querySelector('.nav-toggle i');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const body = document.body;

            navLinks.classList.toggle('active');
            navToggle.classList.toggle('active');
            mobileOverlay.classList.toggle('active');

            // Change hamburger to X and vice versa with smooth animation
            if (navLinks.classList.contains('active')) {
                navToggleIcon.classList.remove('fa-bars');
                navToggleIcon.classList.add('fa-times');
                body.style.overflow = 'hidden'; // Prevent body scroll when menu is open
            } else {
                navToggleIcon.classList.remove('fa-times');
                navToggleIcon.classList.add('fa-bars');
                body.style.overflow = ''; // Restore body scroll
            }
        }

        // Close mobile menu when clicking on a link
        function closeMobileNav() {
            const navLinks = document.getElementById('nav-links');
            const navToggle = document.querySelector('.nav-toggle');
            const navToggleIcon = document.querySelector('.nav-toggle i');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const body = document.body;

            if (navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                navToggle.classList.remove('active');
                mobileOverlay.classList.remove('active');
                navToggleIcon.classList.remove('fa-times');
                navToggleIcon.classList.add('fa-bars');
                body.style.overflow = ''; // Restore body scroll
            }
        }

        // Language switching
        function switchLanguage(lang) {
            window.location.href = '/language/' + lang;
        }

        // Book invitation
        function bookInvitation() {
            alert('{{ __("mutafest.messages.booking_coming_soon") }}');
        }

        // Download functions
        function downloadProgram() {
            fetch('{{ route("mutafest.download.program") }}')
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    // In a real implementation, trigger file download here
                })
                .catch(error => console.error('Error:', error));
        }

        function downloadPressKit() {
            fetch('{{ route("mutafest.download.press-kit") }}')
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch(error => console.error('Error:', error));
        }

        function downloadImages() {
            fetch('{{ route("mutafest.download.images") }}')
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch(error => console.error('Error:', error));
        }

        // Newsletter subscription
        function subscribeNewsletter() {
            const email = document.querySelector('.newsletter input').value;
            if (!email) {
                alert('{{ __("mutafest.contact.newsletter.email_placeholder") }}');
                return;
            }

            fetch('{{ route("mutafest.newsletter.subscribe") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    document.querySelector('.newsletter input').value = '';
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Form submissions
        function submitContact(event) {
            event.preventDefault();
            const formData = new FormData(event.target);

            fetch('{{ route("mutafest.contact.submit") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    event.target.reset();
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function submitPressAccreditation(event) {
            event.preventDefault();
            const formData = new FormData(event.target);

            fetch('{{ route("mutafest.press.accreditation") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    event.target.reset();
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Add click event listeners to navigation links
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pageId = this.getAttribute('href').substring(1);
                    showPage(pageId);
                    closeMobileNav(); // Close mobile menu when nav link is clicked
                });
            });

            // Close mobile menu when clicking outside or on overlay
            document.addEventListener('click', function(event) {
                const navLinks = document.getElementById('nav-links');
                const navToggle = document.querySelector('.nav-toggle');
                const mobileOverlay = document.getElementById('mobile-overlay');

                if (navLinks.classList.contains('active') &&
                    !navLinks.contains(event.target) &&
                    !navToggle.contains(event.target)) {
                    closeMobileNav();
                }
            });

            // Add swipe gesture support for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            document.addEventListener('touchstart', function(event) {
                touchStartX = event.changedTouches[0].screenX;
            });

            document.addEventListener('touchend', function(event) {
                touchEndX = event.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                const navLinks = document.getElementById('nav-links');
                const swipeThreshold = 100;
                
                // Swipe right to left to close menu (for LTR)
                if (touchStartX - touchEndX > swipeThreshold && navLinks.classList.contains('active')) {
                    if (document.dir !== 'rtl') {
                        closeMobileNav();
                    }
                }
                
                // Swipe left to right to close menu (for RTL)
                if (touchEndX - touchStartX > swipeThreshold && navLinks.classList.contains('active')) {
                    if (document.dir === 'rtl') {
                        closeMobileNav();
                    }
                }
            }

            // Initialize with home page
            showPage('home');
        });
    </script>
</body>
</html>
