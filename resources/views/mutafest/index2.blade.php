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
            background: #ab4e9e;
            color: white;
            line-height: 1.6;
            overflow-x: hidden;
            cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><circle cx="16" cy="16" r="10" fill="%23ff8c42" opacity="0.8"/></svg>') 16 16, auto;
        }

        /* Header */
        .header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(171, 78, 158, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 3px dashed rgba(255, 255, 255, 0.3);
            transform: rotate(-0.5deg);
            margin-bottom: -2px;
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
            content: '♪';
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

        .hero-logo {
            height: 140px;
            width: auto;
            margin-bottom: 32px;
            filter: drop-shadow(0 12px 40px rgba(0, 0, 0, 0.4));
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-title {
            font-size: 5rem;
            font-weight: 900;
            line-height: 0.9;
            margin-bottom: 24px;
            color: white;
            text-shadow: 5px 5px 0 #ff8c42, 10px 10px 0 rgba(0,0,0,0.2);
            animation: fadeInUp 1s ease-out 0.2s both;
            transform: rotate(-2deg);
            display: inline-block;
        }

        .hero-subtitle {
            font-size: 1.5rem;
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
            font-size: 1.4rem;
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

        .hero-girl {
            width: 100%;
            max-width: 400px;
            height: auto;
            filter: drop-shadow(0 20px 60px rgba(0, 0, 0, 0.4)) hue-rotate(10deg) brightness(1.1);
            animation: float 4s ease-in-out infinite;
            transform: rotate(5deg);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(5deg) scale(1); }
            25% { transform: translateY(-30px) rotate(8deg) scale(1.05); }
            50% { transform: translateY(-20px) rotate(3deg) scale(1.02); }
            75% { transform: translateY(-10px) rotate(7deg) scale(1.01); }
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
            content: '✦ ✦ ✦';
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
            width: 60px;
            top: 10%;
            left: 85%;
            animation: birdFly 15s infinite linear;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }

        @keyframes birdFly {
            0% { transform: translateX(0) translateY(0) rotate(-5deg); }
            25% { transform: translateX(-200px) translateY(50px) rotate(5deg); }
            50% { transform: translateX(-400px) translateY(-20px) rotate(-3deg); }
            75% { transform: translateX(-600px) translateY(30px) rotate(3deg); }
            100% { transform: translateX(-800px) translateY(0) rotate(-5deg); }
        }

        .floating-olive {
            width: 50px;
            top: 70%;
            left: 10%;
            animation: gentleFloat 12s infinite ease-in-out;
            transform: rotate(-15deg);
        }

        .floating-orange {
            width: 40px;
            top: 45%;
            right: 8%;
            animation: bounceFloat 8s infinite ease-in-out;
        }

        .floating-watermelon {
            width: 55px;
            bottom: 20%;
            left: 30%;
            animation: spinFloat 14s infinite linear;
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

        @keyframes spinFloat {
            0% { transform: rotate(0deg) translateX(0); }
            100% { transform: rotate(360deg) translateX(40px); }
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
            bottom: 0;
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

        /* Hide animations on mobile for better performance */
        @media (max-width: 768px) {
            .mediterranean-elements,
            .ocean-life {
                display: none;
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
            font-size: 1.1rem;
            line-height: 1.7;
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
            font-size: 0.9rem;
            color: #ff8c42;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .session-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: #2c3e50;
        }

        .session-participants {
            font-size: 0.95rem;
            color: #4a5568;
            line-height: 1.5;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(171, 78, 158, 0.4) 100%);
            padding: 60px 0 40px;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '🌊 🎨 🎭 🎵 🌊 🎨 🎭 🎵';
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
                margin-bottom: 0;
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
            
            .cta-button {
                padding: 8px 16px;
                font-size: 0.9rem;
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

            .hero-logo {
                height: 80px;
                margin-bottom: 20px;
            }

            .hero-title {
                font-size: 2.8rem;
                text-shadow: 3px 3px 0 #ff8c42, 6px 6px 0 rgba(0,0,0,0.2);
                margin-bottom: 16px;
                line-height: 0.95;
            }

            .hero-subtitle {
                font-size: 1rem;
                margin-bottom: 32px;
                padding: 0 20px;
            }
            
            .hero-date {
                font-size: 1.1rem;
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
                font-size: 1.5rem;
                margin-bottom: 12px;
            }
            
            .card-description {
                font-size: 1rem;
                line-height: 1.6;
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
                font-size: 0.85rem;
                margin-bottom: 6px;
            }
            
            .session-title {
                font-size: 1.1rem;
                margin-bottom: 4px;
            }
            
            .session-participants {
                font-size: 0.9rem;
            }

            /* Footer mobile */
            .footer {
                padding: 40px 0 30px;
                margin-top: 60px;
            }
            
            .footer-logo {
                height: 50px;
                margin-bottom: 20px;
            }
            
            .footer-text {
                font-size: 0.9rem;
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
                font-size: 0.95rem;
                padding: 0 10px;
            }
            
            .hero-date {
                font-size: 1rem;
                padding: 14px 24px;
            }
            
            .hero-girl {
                max-width: 240px;
                width: 80vw;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .card-title {
                font-size: 1.3rem;
            }
            
            .card-description {
                font-size: 0.95rem;
            }
            
            .day-title {
                font-size: 1.4rem;
            }
            
            .session-title {
                font-size: 1rem;
            }
            
            .session-participants {
                font-size: 0.85rem;
            }
            
            .cta-button {
                padding: 8px 14px;
                font-size: 0.85rem;
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
</head>
<body>
<!-- Mediterranean Floating Elements -->
<div class="mediterranean-elements">
    <img src="{{ asset('images/bird.png') }}" alt="Bird" class="floating-element floating-bird">
    <img src="{{ asset('images/olive-branch.png') }}" alt="Olive Branch" class="floating-element floating-olive">
    <img src="{{ asset('images/orange.png') }}" alt="Orange" class="floating-element floating-orange">
    <img src="{{ asset('images/watermelon.png') }}" alt="Watermelon" class="floating-element floating-watermelon">
</div>

<!-- Ocean Life -->
<div class="ocean-life">
    <img src="{{ asset('images/fish.png') }}" alt="Fish" class="swimming-fish fish-1">
    <img src="{{ asset('images/fish.png') }}" alt="Fish" class="swimming-fish fish-2">
    <img src="{{ asset('images/fishs.png') }}" alt="Fish School" class="fish-school">
</div>

<!-- Header -->
<header class="header">
    <div class="nav-container">
        <img src="{{ asset('images/mutafest logo.png') }}" alt="MutaFest" class="logo">

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
    <!-- Fun Shapes -->
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>
    <div class="hero-shape shape-3"></div>
    <div class="squiggle squiggle-1"></div>
    <div class="squiggle squiggle-2"></div>

    <!-- Dancing Characters -->
    <div class="dance-floor">
        <img src="{{ asset('images/dancer-boy.png') }}" alt="Dancer Boy" class="dancer dancer-boy">
        <img src="{{ asset('images/dancer-girl.png') }}" alt="Dancer Girl" class="dancer dancer-girl">
    </div>

    <div class="hero-container">
        <div class="hero-content">
            <img src="{{ asset('images/mutafest logo.png') }}" alt="MutaFest" class="hero-logo">
            <h1 class="hero-title">Festival del<br>Mediterraneo</h1>
            <p class="hero-subtitle">🌊 Un viaggio attraverso culture, letterature e arti del Mediterraneo 🎭</p>
            <div class="hero-date">🎉 2-4 Maggio 2025 • Milano 🎨</div>
        </div>

        <div class="hero-visual">
            <div class="hero-image-wrapper">
                <img src="{{asset('images/girl.png')}}" alt="MutaFest Character" class="hero-girl">
                <div class="hero-decoration deco-1">2025</div>
                <div class="hero-decoration deco-2">FEST!</div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="content-section">
    <div class="container">
        <h2 class="section-title">{{ __('mutafest.about.title') }}</h2>
        <div class="cards-grid">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <img src="{{ asset('images/olive-branch.png') }}" alt="Culture">
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Culture Mediterranee</h3>
                    <p class="card-description">Un festival dedicato alle culture, alle letterature e alle arti nate sulle sponde del Mar Mediterraneo.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <img src="{{ asset('images/book.png') }}" alt="Literature">
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Letteratura & Poesia</h3>
                    <p class="card-description">Incontri con scrittori, poeti e traduttori da tutti i Paesi del Mediterraneo.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <img src="{{ asset('images/guitar.png') }}" alt="Music">
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Arti & Musica</h3>
                    <p class="card-description">Concerti, performance e momenti conviviali che celebrano la diversità culturale.</p>
                </div>
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
                    <div class="day-header" data-day="{{ substr($dayKey, -1) }}">
                        <h3 class="day-title">{{ $day['title'] }}</h3>
                    </div>
                    <div class="sessions-container">
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
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="{{ $guest['icon'] }}"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $guest['name'] }}</h3>
                        <p class="card-description">
                            <strong style="color: #ff8c42;">{{ $guest['country'] }}</strong><br>
                            <em style="color: #316995;">{{ $guest['role'] }}</em><br><br>
                            {{ $guest['bio'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <img src="{{ asset('images/mutafest logo.png') }}" alt="MutaFest" class="footer-logo">
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
            header.style.background = 'rgba(171, 78, 158, 0.98)';
        } else {
            header.style.background = 'rgba(171, 78, 158, 0.95)';
        }
    });
</script>
</body>
</html>
