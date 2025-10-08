<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('mutafest.meta.title') }}</title>
    <meta name="description" content="{{ __('mutafest.meta.description') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            overflow-x: hidden;
            cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><circle cx="16" cy="16" r="10" fill="%23ff8c42" opacity="0.8"/></svg>') 16 16, auto;
        }

        /* Header */
        .header {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 100;
            background: #f0925e;
            backdrop-filter: blur(20px);
            border-top: 3px dashed rgba(255, 255, 255, 0.3);
            transform: rotate(0deg);
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
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 20px;
        }

        .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            color: black;
            background: white;
            font-weight: 700;
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 8px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: white;
            margin: 3px 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }

        /* Mobile Drawer */
        .mobile-drawer {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100vh;
            background: #f0925e;
            backdrop-filter: blur(20px);
            z-index: 1000;
            transition: right 0.3s ease;
            padding: 80px 30px 30px;
            border-left: 3px solid rgba(255, 255, 255, 0.3);
        }

        .mobile-drawer.open {
            right: 0;
        }

        .mobile-drawer .nav-menu {
            display: flex !important;
            flex-direction: column;
            gap: 30px;
            margin-top: 50px;
            list-style: none;
        }

        .mobile-drawer .nav-menu li {
            width: 100%;
        }

        .mobile-drawer .nav-link {
            display: block;
            font-size: 1.6rem;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
        }

        .mobile-drawer .nav-link:hover {
            color: white;
            transform: translateX(10px);
        }

        .mobile-drawer .nav-link.active {
            color: black;
            font-weight: 700;
            border-bottom: 2px solid black;
            transform: translateX(10px);
        }

        .drawer-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .drawer-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        .cta-button {
            background: linear-gradient(45deg, #ff8c42, #ffb366);
            color: white;
            padding: 12px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            border: 3px solid white;
            box-shadow: 4px 4px 0 rgba(0,0,0,0.2);
            transform: rotate(2deg);
            display: inline-block;
        }

        .cta-button:hover {
            transform: rotate(-2deg) scale(1.1);
            box-shadow: 6px 6px 0 rgba(0,0,0,0.3);
            animation: wiggle 0.5s ease-in-out;
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(-2deg) scale(1.1); }
            25% { transform: rotate(3deg) scale(1.1); }
            75% { transform: rotate(-3deg) scale(1.1); }
        }

        /* Hero Section - Poster Style */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 80px 0;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        /* Fun Shapes & Doodles */
        .hero-shape {
            position: absolute;
            animation: floatShape 15s infinite ease-in-out;
        }

        .shape-1 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle at 30% 30%, #ff8c42, #ffb366);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            top: 10%;
            left: -50px;
            animation-delay: 0s;
            opacity: 0.7;
            transform: rotate(15deg);
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #ab4e9e, #c968b7);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            bottom: 20%;
            right: -30px;
            animation-delay: 3s;
            opacity: 0.6;
        }

        .shape-3 {
            width: 120px;
            height: 120px;
            background: #ffb366;
            border-radius: 50%;
            top: 50%;
            right: 15%;
            animation-delay: 6s;
            opacity: 0.5;
        }

        .shape-3::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            color: white;
        }

        /* Squiggly lines */
        .squiggle {
            position: absolute;
            width: 100px;
            height: 100px;
            opacity: 0.3;
        }

        .squiggle-1 {
            top: 20%;
            left: 40%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M10,50 Q30,10 50,50 T90,50" stroke="%23ff8c42" stroke-width="3" fill="none" stroke-linecap="round"/></svg>');
            animation: rotate 10s linear infinite;
        }

        .squiggle-2 {
            bottom: 30%;
            left: 20%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M20,20 Q50,80 80,20" stroke="%23ab4e9e" stroke-width="3" fill="none" stroke-dasharray="5,5"/></svg>');
            animation: rotate -15s linear infinite;
        }

        @keyframes rotate {
            to { transform: rotate(360deg); }
        }

        @keyframes floatShape {
            0%, 100% { transform: translate(0, 0) scale(1) rotate(0deg); }
            25% { transform: translate(30px, -30px) scale(1.1) rotate(90deg); }
            50% { transform: translate(-20px, 20px) scale(0.95) rotate(180deg); }
            75% { transform: translate(40px, 10px) scale(1.05) rotate(270deg); }
        }

        .hero-content {
            position: relative;
        }

        /* Social Media Section */
        .social-media-section {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
            animation: fadeInUp 1s ease-out 0.1s both;
        }

        .social-media-mobile {
            display: none;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            font-size: 1.6rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .social-icon:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-5px) scale(1.15);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        /* Individual social platform colors on hover */
        .social-icon:nth-child(1):hover { /* Facebook */
            background: rgba(24, 119, 242, 0.3);
            border-color: rgba(24, 119, 242, 0.6);
        }

        .social-icon:nth-child(2):hover { /* Instagram */
            background: linear-gradient(45deg, rgba(225, 48, 108, 0.3), rgba(253, 142, 68, 0.3));
            border-color: rgba(225, 48, 108, 0.6);
        }

        .social-icon:nth-child(3):hover { /* Twitter */
            background: rgba(29, 161, 242, 0.3);
            border-color: rgba(29, 161, 242, 0.6);
        }

        .social-icon:nth-child(4):hover { /* YouTube */
            background: rgba(255, 0, 0, 0.3);
            border-color: rgba(255, 0, 0, 0.6);
        }

        .social-icon:nth-child(5):hover { /* LinkedIn */
            background: rgba(0, 119, 181, 0.3);
            border-color: rgba(0, 119, 181, 0.6);
        }

        .social-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .social-icon:hover::before {
            left: 100%;
        }

        .social-icon i {
            z-index: 1;
        }

        .hero-logo {
            height: 124px;
            width: auto;
           /* margin-bottom: 32px;*/
            filter: drop-shadow(0 12px 40px rgba(0, 0, 0, 0.4));
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            line-height: 0.9;
           /* margin-bottom: 24px;*/
            color: white;
           /* text-shadow: 5px 5px 0 #ff8c42, 10px 10px 0 rgba(0,0,0,0.2);*/
            animation: fadeInUp 1s ease-out 0.2s both;
            transform: rotate(-2deg);
            display: inline-block;
        }

        .hero-subtitle {
            font-size: 1.9rem;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 48px;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .hero-date {
            display: inline-block;
            background: linear-gradient(45deg, #ff8c42, #ffb366);
            padding: 20px 40px;
            border-radius: 50px;
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
            border: 4px solid white;
            box-shadow: 6px 6px 0 rgba(0,0,0,0.2);
            animation: fadeInUp 1s ease-out 0.6s both, bounce 2s ease-in-out 2s infinite;
            transform: rotate(-3deg);
        }

        @keyframes bounce {
            0%, 100% { transform: rotate(-3deg) translateY(0); }
            50% { transform: rotate(-3deg) translateY(-10px); }
        }

        /* Hero Image Section */
        .hero-visual {
            position: relative;
            animation: fadeInRight 1.2s ease-out 0.5s both;
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .hero-image-wrapper {
            position: relative;
            display: inline-block;
        }

        .girl-text-overlay {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            line-height: 1.1;
            text-shadow: 0 4px 15px rgba(0,0,0,0.6), 0 2px 8px rgba(0,0,0,0.4);
            z-index: 6;
            backdrop-filter: blur(15px);
            pointer-events: none;
            animation: float 6s ease-in-out infinite;
            max-width: 120px;
            word-wrap: break-word;
        }

        .hero-girl {
            width: 250px;
            height: auto;
            filter: drop-shadow(0 15px 35px rgba(0,0,0,0.4)) brightness(1.1) contrast(1.1);
            animation: float 6s ease-in-out infinite;
            transition: all 0.4s ease;
        }

        .hero-girl:hover {
            filter: drop-shadow(0 20px 45px rgba(0,0,0,0.5)) brightness(1.2) contrast(1.2);
            transform: scale(1.02);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(-2deg); }
            33% { transform: translateY(-10px) rotate(1deg); }
            66% { transform: translateY(-5px) rotate(-1deg); }
        }

        /* Decorative Elements */
        .hero-decoration {
            position: absolute;
            font-weight: 900;
            user-select: none;
            pointer-events: none;
        }

        .deco-1 {
            top: -60px;
            left: -40px;
            transform: rotate(-15deg);
            font-size: 140px;
            background: linear-gradient(45deg, #ff8c42, #ffb366);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0.8;
            animation: pulse 3s ease-in-out infinite;
        }

        .deco-2 {
            bottom: -40px;
            right: -20px;
            font-size: 100px;
            transform: rotate(25deg);
            color: rgba(255, 255, 255, 0.2);
            animation: wiggle 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: rotate(-15deg) scale(1); }
            50% { transform: rotate(-15deg) scale(1.1); }
        }

        /* Content Cards - Poster Style */
        .content-section {
            padding: 100px 0;
            position: relative;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .section-title {
            font-size: 3.5rem;
            font-weight: 900;
            text-align: center;
            margin-bottom: 80px;
            color: white;
            position: relative;
            display: inline-block;
            width: 100%;
            transform: rotate(-1deg);
            text-shadow: 4px 4px 0 #ff8c42, 8px 8px 0 rgba(0,0,0,0.2);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
            color: #ffb366;
            letter-spacing: 20px;
            animation: twinkle 2s ease-in-out infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.5; transform: translateX(-50%) scale(1); }
            50% { opacity: 1; transform: translateX(-50%) scale(1.2); }
        }

        /* Mediterranean Floating Elements */
        .mediterranean-elements {
            position: fixed;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
            overflow: hidden;
        }

        .floating-element {
            position: absolute;
            opacity: 0.6;
            animation: floatAround 20s infinite ease-in-out;
        }

        .floating-bird {
            width: 80px;
            bottom: 20px;
            right: 20px;
            position: fixed;
            z-index: 100;
            animation: birdStand 3s infinite ease-in-out;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
        }

        @keyframes birdStand {
            0%, 100% { transform: translateY(0) rotate(-2deg); }
            50% { transform: translateY(-8px) rotate(2deg); }
        }

        .floating-olive {
            width: 70px;
            top: 20px;
            left: 20px;
            position: fixed;
            z-index: 99;
            animation: gentleFloat 12s infinite ease-in-out;
            transform: rotate(-15deg);
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
        }

        .floating-orange {
            width: 40px;
            top: 45%;
            right: 8%;
            animation: bounceFloat 8s infinite ease-in-out;
        }

        .floating-watermelon {
            width: 70px;
            bottom: 80px;
            left: -100px;
            animation: boatMove 20s infinite linear;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
            z-index: 5;
        }

        @keyframes gentleFloat {
            0%, 100% { transform: translateY(0) rotate(-15deg); }
            50% { transform: translateY(-30px) rotate(15deg); }
        }

        @keyframes bounceFloat {
            0%, 100% { transform: translateY(0) scale(1); }
            25% { transform: translateY(-20px) scale(1.1); }
            50% { transform: translateY(0) scale(0.9); }
            75% { transform: translateY(-15px) scale(1.05); }
        }

        @keyframes boatMove {
            0% { transform: translateX(0) translateY(0) rotate(0deg); }
            25% { transform: translateX(25vw) translateY(-10px) rotate(2deg); }
            50% { transform: translateX(50vw) translateY(0) rotate(-1deg); }
            75% { transform: translateX(75vw) translateY(-8px) rotate(3deg); }
            100% { transform: translateX(calc(100vw + 150px)) translateY(0) rotate(0deg); }
        }

        @keyframes floatAround {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(30px, -20px); }
            50% { transform: translate(-20px, 30px); }
            75% { transform: translate(40px, 10px); }
        }

        /* Ocean Life Animations */
        .ocean-life {
            position: fixed;
            bottom: 300px;
            left: 0;
            width: 100%;
            height: 350px;
            pointer-events: none;
            z-index: 3;
            overflow: hidden;
        }

        .swimming-fish {
            position: absolute;
            width: 60px;
            animation: swimLeft 25s infinite linear;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        }

        .swimming-fish.fish-1 {
            bottom: 150px;
            animation-delay: 0s;
        }

        .swimming-fish.fish-2 {
            bottom: 200px;
            animation-delay: -8s;
            width: 50px;
        }

        .fish-school {
            position: absolute;
            width: 120px;
            bottom: 100px;
            right: -120px;
            animation: swimRight 30s infinite linear;
            opacity: 0.8;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }

        @keyframes swimLeft {
            0% { transform: translateX(100vw) scaleX(-1); }
            100% { transform: translateX(-200px) scaleX(-1); }
        }

        @keyframes swimRight {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 200px)); }
        }

        /* Dancing Characters */
        .dance-floor {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            padding: 0 50px;
            z-index: 15;
            pointer-events: none;
        }

        .dancer {
            width: 120px;
            height: auto;
            animation: dance 3s infinite ease-in-out;
            filter: drop-shadow(0 12px 24px rgba(0,0,0,0.4));
            opacity: 0.9;
        }

        .dancer-boy {
            animation-delay: -1.5s;
        }

        .dancer-girl {
            animation-delay: 0s;
        }

        @keyframes dance {
            0%, 100% { transform: translateY(0) rotate(-5deg) scale(1); }
            25% { transform: translateY(-20px) rotate(5deg) scale(1.05); }
            50% { transform: translateY(0) rotate(-5deg) scale(0.95); }
            75% { transform: translateY(-10px) rotate(3deg) scale(1.02); }
        }

        /* Custom Icon Images */
        .card-icon img {
            width: 50px;
            height: 50px;
            filter: brightness(0) invert(1);
            transition: all 0.3s ease;
        }

        .card:hover .card-icon img {
            transform: scale(1.2) rotate(-10deg);
        }

        /* Mobile adjustments */
        @media (max-width: 768px) {
            .mediterranean-elements {
                display: block;
            }

            .ocean-life {
                display: block;
            }

            .floating-watermelon {
                width: 50px;
                bottom: 60px;
            }

            .swimming-fish {
                width: 40px;
            }

            .fish-school {
                width: 80px;
                bottom: 80px;
            }

            .floating-bird {
                width: 60px;
                bottom: 15px;
                right: 15px;
            }

            .floating-olive {
                width: 50px;
                top: 15px;
                left: 15px;
            }

            .dance-floor {
                bottom: 10px;
                padding: 0 20px;
            }

            .dancer {
                width: 80px;
            }
        }

        /* Poster-style Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-bottom: 64px;
        }

        .card {
            background: white;
            border-radius: 30px;
            padding: 0;
            color: #2c3e50;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            overflow: hidden;
            position: relative;
            transform: rotate(-1deg);
            border: 4px solid white;
        }

        .card:nth-child(even) {
            transform: rotate(1deg);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #ab4e9e, #c968b7, #ff8c42);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card-header {
            background: linear-gradient(135deg, #ab4e9e, #c968b7);
            padding: 40px;
            position: relative;
            overflow: hidden;
            border-bottom: 4px dashed white;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1); opacity: 1; }
        }

        .card:hover {
            transform: rotate(0deg) scale(1.05);
            box-shadow: 12px 12px 0 rgba(0, 0, 0, 0.3);
            z-index: 10;
        }

        .card-icon {
            width: 90px;
            height: 90px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab4e9e;
            font-size: 40px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            border: 4px solid white;
            box-shadow: 4px 4px 0 rgba(0,0,0,0.2);
            animation: iconBounce 3s ease-in-out infinite;
        }

        @keyframes iconBounce {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-5px) rotate(-5deg); }
            75% { transform: translateY(-5px) rotate(5deg); }
        }

        .card-body {
            padding: 40px;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 16px;
            color: #ab4e9e;
        }

        .card-description {
            font-size: 1.9rem;
            line-height: 1.4;
            color: #4a5568;
        }

        /* Program Section - Poster Style */
        #program {
            position: relative;
            overflow: hidden;
        }

        #program::before {
            content: 'PROGRAM';
            position: absolute;
            top: -50px;
            right: -100px;
            font-size: 200px;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.03);
            transform: rotate(-90deg);
            z-index: 0;
        }

        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 32px;
            position: relative;
            z-index: 1;
        }

        .program-day {
            background: white;
            padding: 0;
            border: 4px solid #ab4e9e;
            border-radius: 20px;
            box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            transform: rotate(-2deg);
        }

        .program-day:nth-child(even) {
            transform: rotate(2deg);
        }

        .program-day::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(171, 78, 158, 0.05) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .program-day:hover {
            transform: rotate(0deg) scale(1.05) translateY(-10px);
            box-shadow: 12px 12px 0 rgba(0, 0, 0, 0.3);
            z-index: 10;
        }

        .program-day:hover::before {
            opacity: 1;
        }

        .day-header {
            background: linear-gradient(135deg, #ab4e9e, #c968b7);
            padding: 32px;
            position: relative;
            overflow: hidden;
            border-bottom: 4px dashed white;
        }

        .day-header::after {
            content: attr(data-day);
            position: absolute;
            bottom: -20px;
            right: 20px;
            font-size: 100px;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.3);
            line-height: 1;
            transform: rotate(-10deg);
        }

        .day-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0;
            color: white;
            position: relative;
            z-index: 2;
        }

        .sessions-container {
            padding: 32px;
        }

        .session {
            margin-bottom: 24px;
            padding: 20px;
            background: linear-gradient(135deg, rgba(255, 140, 66, 0.1) 0%, rgba(171, 78, 158, 0.05) 100%);
            border-left: 6px dotted #ff8c42;
            border-radius: 15px;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform: translateX(0);
        }

        .session:hover {
            background: linear-gradient(135deg, rgba(255, 140, 66, 0.2) 0%, rgba(171, 78, 158, 0.1) 100%);
            transform: translateX(15px) rotate(1deg);
            border-left-color: #ab4e9e;
        }

        .session:last-child {
            margin-bottom: 0;
        }

        .session-time {
            font-size: 1.3rem;
            color: #ff8c42;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .session-title {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: #2c3e50;
        }

        .session-participants {
            font-size: 1.3rem;
            color: #4a5568;
            line-height: 1.5;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(171, 78, 158, 0.4) 100%);
            padding: 60px 0 120px;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            font-size: 30px;
            white-space: nowrap;
            animation: footerScroll 20s linear infinite;
            opacity: 0.3;
        }

        @keyframes footerScroll {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
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
            /* Header adjustments */
            .header {
                transform: rotate(0deg);
            }

            .nav-container {
                padding: 0 16px;
                height: 70px;
            }

            .logo {
                height: 40px;
            }

            .nav-menu {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .cta-button {
                padding: 8px 16px;
                font-size: 1.3rem;
                font-weight: 600;
            }

            /* Hero section mobile */
            .hero {
                min-height: 100vh;
                padding: 20px 0;
            }

            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
                padding: 0 16px;
            }

            .hero-content {
                order: 1;
            }

            .hero-visual {
                order: 2;
                margin-top: 0;
            }

            .social-media-section {
                display: none;
            }

            .social-media-mobile {
                display: flex;
                justify-content: center;
                gap: 15px;
                margin-bottom: 30px;
                animation: fadeInUp 1s ease-out 0.1s both;
            }

            .social-icon {
                width: 45px;
                height: 45px;
                font-size: 1.9rem;
            }

            .hero-logo {
                height: 80px;
                margin-bottom: 20px;
            }

            .hero-title {
                font-size: 2.8rem;
                margin-bottom: 16px;
                line-height: 0.95;
            }

            .hero-subtitle {
                font-size: 1.4rem;
                margin-bottom: 32px;
                padding: 0 20px;
            }

            .hero-date {
                font-size: 1.9rem;
                padding: 16px 28px;
                border-radius: 40px;
                transform: rotate(-2deg);
            }

            .hero-girl {
                max-width: 280px;
                width: 85vw;
            }

            /* Decorative elements mobile */
            .hero-decoration {
                display: none;
            }

            .hero-shape {
                transform: scale(0.6);
            }

            .shape-1 {
                width: 120px;
                height: 120px;
                top: 5%;
                left: -30px;
            }

            .shape-2 {
                width: 100px;
                height: 100px;
                bottom: 15%;
                right: -20px;
            }

            .shape-3 {
                width: 80px;
                height: 80px;
                top: 40%;
                right: 10%;
            }

            .shape-3::after {
                font-size: 40px;
                content: '';
            }

            /* Content sections mobile */
            .content-section {
                padding: 60px 0;
            }

            .container {
                padding: 0 16px;
            }

            .section-title {
                font-size: 2.5rem;
                margin-bottom: 40px;
                text-shadow: 3px 3px 0 #ff8c42, 6px 6px 0 rgba(0,0,0,0.2);
            }

            .section-title::after {
                font-size: 18px;
                letter-spacing: 12px;
                bottom: -20px;
            }

            /* Cards mobile */
            .cards-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .card {
                transform: rotate(0deg);
                border-radius: 20px;
                border-width: 3px;
            }

            .card:nth-child(even) {
                transform: rotate(0deg);
            }

            .card-header {
                padding: 28px 20px;
            }

            .card-icon {
                width: 70px;
                height: 70px;
                font-size: 32px;
                border-width: 3px;
            }

            .card-body {
                padding: 24px 20px;
            }

            .card-title {
                font-size: 1.9rem;
                margin-bottom: 12px;
            }

            .card-description {
                font-size: 1.4rem;
                line-height: 1.4;
            }

            /* Program section mobile */
            .program-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .program-day {
                border-radius: 16px;
                transform: rotate(0deg);
                border-width: 3px;
            }

            .program-day:nth-child(even) {
                transform: rotate(0deg);
            }

            .day-header {
                padding: 24px 20px;
            }

            .day-header::after {
                font-size: 60px;
                bottom: -10px;
                right: 15px;
            }

            .day-title {
                font-size: 1.6rem;
            }

            .sessions-container {
                padding: 20px;
            }

            .session {
                padding: 16px;
                margin-bottom: 16px;
                border-radius: 12px;
                border-left-width: 4px;
            }

            .session-time {
                font-size: 1.2rem;
                margin-bottom: 6px;
            }

            .session-title {
                font-size: 1.9rem;
                margin-bottom: 4px;
            }

            .session-participants {
                font-size: 1.3rem;
            }

            /* Footer mobile */
            .footer {
                padding: 40px 0 100px;
                margin-top: 60px;
            }

            .footer-logo {
                height: 50px;
                margin-bottom: 20px;
            }

            .footer-text {
                font-size: 1.3rem;
                margin-bottom: 24px;
            }

            .social-links {
                gap: 16px;
                margin-bottom: 24px;
            }

            .social-link {
                width: 44px;
                height: 44px;
                font-size: 18px;
            }
        }

        /* Extra small screens */
        @media (max-width: 480px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .hero-subtitle {
                font-size: 1.3rem;
                padding: 0 10px;
            }

            .hero-date {
                font-size: 1.4rem;
                padding: 14px 24px;
            }

            .hero-girl {
                max-width: 240px;
                width: 80vw;
            }

            .girl-text-overlay {
                font-size: 16px;
                top: 45%;
                max-width: 100px;
            }

            .section-title {
                font-size: 2rem;
            }

            .card-title {
                font-size: 1.7rem;
            }

            .card-description {
                font-size: 1.3rem;
            }

            .day-title {
                font-size: 1.8rem;
            }

            .session-title {
                font-size: 1.4rem;
            }

            .session-participants {
                font-size: 1.2rem;
            }

            .cta-button {
                padding: 8px 14px;
                font-size: 1.2rem;
            }
        }

        /* Landscape mobile orientation */
        @media (max-width: 768px) and (orientation: landscape) {
            .hero {
                min-height: 120vh;
            }

            .hero-container {
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                text-align: left;
            }

            .hero-content {
                order: 1;
            }

            .hero-visual {
                order: 2;
            }

            .hero-title {
                font-size: 2.2rem;
            }

            .hero-girl {
                max-width: 200px;
            }
        }
    </style>

    @include('components.shared-styles')
</head>
<body>

@include('components.navbar')
<!-- Mediterranean Floating Elements -->
<div class="mediterranean-elements">
    <!--<img src="{{ asset('images/orange.png') }}" alt="Orange" class="floating-element floating-orange">-->
    <img src="{{ asset('images/watermelon.png') }}" alt="Watermelon" class="floating-element floating-watermelon">
</div>

<!-- Fixed Elements
<img src="{{ asset('images/bird.png') }}" alt="Bird" class="floating-bird">
<img src="{{ asset('images/olive-branch.png') }}" alt="Olive Branch" class="floating-olive">-->

<!-- Ocean Life -->
<div class="ocean-life">
    <img src="{{ asset('images/fish.png') }}" alt="Fish" class="swimming-fish fish-1">
    <img src="{{ asset('images/fish.png') }}" alt="Fish" class="swimming-fish fish-2">
    <img src="{{ asset('images/fishs.png') }}" alt="Fish School" class="fish-school">
</div>

<!-- Hero Section -->
<section class="hero">
    <!-- Fun Shapes
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>
    <div class="hero-shape shape-3"></div>
    <div class="squiggle squiggle-1"></div>
    <div class="squiggle squiggle-2"></div>
    -->
    <!-- Dancing Characters
    <div class="dance-floor">
        <img src="{{ asset('images/dancer-boy.png') }}" alt="Dancer Boy" class="dancer dancer-boy">
        <img src="{{ asset('images/dancer-girl.png') }}" alt="Dancer Girl" class="dancer dancer-girl">
    </div>-->

    <div class="hero-container">
        <div class="hero-content">
            <!-- Social Media Icons -->
            <div class="social-media-section">
                <a href="https://facebook.com/mutafest" target="_blank" class="social-icon" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com/mutafest" target="_blank" class="social-icon" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://twitter.com/mutafest" target="_blank" class="social-icon" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://youtube.com/mutafest" target="_blank" class="social-icon" aria-label="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://linkedin.com/company/mutafest" target="_blank" class="social-icon" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>

            <img src="{{ asset('images/mutafest logo.png') }}" alt="MutaFest" class="hero-logo">
            <h1 class="hero-title">Festival del<br>Mediterraneo</h1>
           <!-- <p class="hero-subtitle">🌊 Un viaggio attraverso culture, letterature e arti del Mediterraneo 🎭</p>
            <div class="hero-date">🎉 2-4 Maggio 2025 • Milano 🎨</div>-->
            <h1 style="font-size: 42px; font-weight:100">Prima edizione 2025</h1>
            <h2 style="font-size: 32px; font-weight:100">Antologia dell'acque del Mediterraneo</h2>
            <h1></h1>
        </div>

        <!
        <div class="hero-visual">
            <!-- Social Media Icons for Mobile -->
            <div class="social-media-mobile">
                <a href="https://facebook.com/mutafest" target="_blank" class="social-icon" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com/mutafest" target="_blank" class="social-icon" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://twitter.com/mutafest" target="_blank" class="social-icon" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://youtube.com/mutafest" target="_blank" class="social-icon" aria-label="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://linkedin.com/company/mutafest" target="_blank" class="social-icon" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>

            <div class="hero-image-wrapper">
                <a href="/home2">
                    <img src="{{asset('images/girl.png')}}" alt="MutaFest Character" class="hero-girl">
                </a>
                <!-- <div class="girl-text-overlay">
                     Prima<br>edizione<br>2025
                 </div>
              !--<div class="hero-decoration deco-1">2025</div>
                 <div class="hero-decoration deco-2">FEST!</div>-->
            </div>
        </div>
    </div>
</section>


@include('components.footer')

@include('components.shared-scripts')

</body>
</html>
