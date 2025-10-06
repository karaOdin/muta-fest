<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('mutafest.meta.title') }}</title>
    <meta name="description" content="{{ __('mutafest.meta.description') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Source Serif 4', 'Source Serif Pro', Georgia, serif;
            background: linear-gradient(135deg, #2a5d7a 0%, #316995 50%, #3e7fb8 100%);
            color: white;
            line-height: 1.7;
            overflow-x: hidden;
            font-optical-sizing: auto;
            font-variation-settings: "wght" 400;
        }

        /* Header */
        .header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: linear-gradient(135deg, rgba(42, 93, 122, 0.95), rgba(49, 105, 149, 0.95));
            backdrop-filter: blur(25px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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
            font-weight: 400;
            font-style: italic;
            transition: color 0.3s ease;
            font-variation-settings: "wght" 400, "opsz" 14;
        }

        .nav-link:hover {
            color: white;
        }

        .cta-button {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
            color: white;
            padding: 14px 32px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-style: italic;
            transition: all 0.4s ease;
            border: 2px solid rgba(255, 255, 255, 0.3);
            display: inline-block;
            font-variation-settings: "wght" 500, "opsz" 14;
            letter-spacing: 0.5px;
        }

        .cta-button:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.25));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-color: rgba(255, 255, 255, 0.5);
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

        /* Organic Artistic Shapes */
        .hero-shape {
            position: absolute;
            animation: floatShape 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 180px;
            height: 180px;
            background: radial-gradient(ellipse at 40% 20%, rgba(255, 140, 66, 0.4), rgba(255, 179, 102, 0.2));
            border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
            top: 15%;
            left: -40px;
            animation-delay: 0s;
            opacity: 0.6;
        }

        .shape-2 {
            width: 140px;
            height: 140px;
            background: linear-gradient(135deg, rgba(74, 144, 164, 0.4), rgba(91, 168, 196, 0.3));
            border-radius: 48% 52% 68% 32% / 42% 28% 72% 58%;
            bottom: 25%;
            right: -20px;
            animation-delay: 7s;
            opacity: 0.5;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            background: radial-gradient(circle at 30% 70%, rgba(255, 179, 102, 0.5), rgba(255, 140, 66, 0.3));
            border-radius: 72% 28% 48% 52% / 64% 76% 24% 36%;
            top: 60%;
            right: 12%;
            animation-delay: 14s;
            opacity: 0.4;
        }

        /* Organic artistic elements */
        .organic-element {
            position: absolute;
            opacity: 0.2;
            animation: organicFloat 25s ease-in-out infinite;
        }

        .organic-1 {
            top: 25%;
            left: 35%;
            width: 80px;
            height: 60px;
            background: radial-gradient(ellipse at center, rgba(255, 140, 66, 0.3), transparent);
            border-radius: 85% 15% 80% 20% / 92% 18% 82% 8%;
            animation-delay: 5s;
        }

        .organic-2 {
            bottom: 35%;
            left: 15%;
            width: 60px;
            height: 80px;
            background: linear-gradient(45deg, rgba(74, 144, 164, 0.3), transparent);
            border-radius: 42% 58% 70% 30% / 45% 80% 20% 55%;
            animation-delay: 12s;
        }

        @keyframes organicFloat {
            0%, 100% {
                transform: translateY(0) scale(1);
                border-radius: 85% 15% 80% 20% / 92% 18% 82% 8%;
            }
            33% {
                transform: translateY(-15px) scale(1.1);
                border-radius: 42% 58% 70% 30% / 45% 80% 20% 55%;
            }
            66% {
                transform: translateY(10px) scale(0.9);
                border-radius: 68% 32% 45% 55% / 72% 28% 88% 12%;
            }
        }

        @keyframes floatShape {
            0%, 100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
                border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
            }
            25% {
                transform: translate(25px, -20px) scale(1.08) rotate(5deg);
                border-radius: 48% 52% 68% 32% / 42% 58% 72% 28%;
            }
            50% {
                transform: translate(-15px, 15px) scale(0.96) rotate(-3deg);
                border-radius: 72% 28% 48% 52% / 64% 36% 24% 76%;
            }
            75% {
                transform: translate(20px, 5px) scale(1.04) rotate(2deg);
                border-radius: 54% 46% 72% 28% / 68% 42% 58% 32%;
            }
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
            font-size: 5.5rem;
            font-weight: 300;
            font-style: italic;
            line-height: 1;
            margin-bottom: 32px;
            color: white;
            text-shadow: 0 6px 30px rgba(0, 0, 0, 0.4);
            animation: fadeInUp 1s ease-out 0.2s both;
            letter-spacing: -0.02em;
            font-variation-settings: "wght" 300, "opsz" 48;
        }

        .hero-subtitle {
            font-size: 1.4rem;
            font-weight: 400;
            font-style: normal;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 48px;
            animation: fadeInUp 1s ease-out 0.4s both;
            max-width: 600px;
            font-variation-settings: "wght" 400, "opsz" 14;
        }

        .hero-date {
            display: inline-block;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
            padding: 18px 36px;
            border-radius: 8px;
            font-size: 1.4rem;
            font-weight: 400;
            font-style: italic;
            color: white;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            animation: fadeInUp 1s ease-out 0.6s both;
            font-variation-settings: "wght" 400, "opsz" 12;
            letter-spacing: 0.3px;
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
            font-size: 120px;
            color: rgba(255, 255, 255, 0.05);
        }

        .deco-2 {
            bottom: -40px;
            right: -20px;
            font-size: 80px;
            transform: rotate(25deg);
            color: rgba(255, 255, 255, 0.05);
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
            font-size: 3.2rem;
            font-weight: 200;
            font-style: italic;
            text-align: center;
            margin-bottom: 80px;
            color: white;
            position: relative;
            display: inline-block;
            width: 100%;
            letter-spacing: -0.01em;
            font-variation-settings: "wght" 200, "opsz" 32;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
        }

        /* Brutalist Geometric Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
            gap: 40px;
            margin-bottom: 64px;
            padding: 20px 0;
        }

        .card {
            background: #ffffff;
            border: 4px solid #316995;
            border-radius: 0;
            padding: 0;
            color: #2c3e50;
            box-shadow:
                8px 8px 0 #ff8c42,
                16px 16px 0 rgba(49, 105, 149, 0.2);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            overflow: hidden;
            position: relative;
            transform: rotate(-1deg);
        }

        .card:nth-child(2n) {
            transform: rotate(1deg);
            border-color: #ff8c42;
            box-shadow:
                -8px 8px 0 #316995,
                -16px 16px 0 rgba(255, 140, 66, 0.2);
        }

        .card:nth-child(3n) {
            transform: rotate(0deg);
            border-color: #4a90a4;
            box-shadow:
                8px -8px 0 #ff8c42,
                16px -16px 0 rgba(74, 144, 164, 0.2);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(49, 105, 149, 0.02) 10px,
                rgba(49, 105, 149, 0.02) 20px
            );
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover::before {
            opacity: 1;
        }

        .card::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 140, 66, 0.1);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
            z-index: 0;
        }

        .card:hover::after {
            width: 200%;
            height: 200%;
        }

        .card:hover {
            transform: rotate(0deg) scale(1.02);
            box-shadow:
                12px 12px 0 #ff8c42,
                24px 24px 0 rgba(49, 105, 149, 0.15);
        }

        .card:nth-child(2n):hover {
            box-shadow:
                -12px 12px 0 #316995,
                -24px 24px 0 rgba(255, 140, 66, 0.15);
        }

        .card:nth-child(3n):hover {
            box-shadow:
                12px -12px 0 #ff8c42,
                24px -24px 0 rgba(74, 144, 164, 0.15);
        }

        .card-header {
            background: #316995;
            padding: 32px 24px;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);
        }

        .card:nth-child(2n) .card-header {
            background: #ff8c42;
            clip-path: polygon(10% 0, 100% 0, 100% 100%, 0 100%);
        }

        .card:nth-child(3n) .card-header {
            background: #4a90a4;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                90deg,
                transparent,
                transparent 5px,
                rgba(255, 255, 255, 0.1) 5px,
                rgba(255, 255, 255, 0.1) 10px
            );
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover .card-header::before {
            opacity: 1;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            clip-path: polygon(100% 0, 100% 100%, 0 100%);
            transition: all 0.3s ease;
        }

        .card:hover .card-header::after {
            width: 80px;
            height: 80px;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border: 3px solid rgba(255, 255, 255, 0.4);
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-bottom: 16px;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
            transform: rotate(45deg);
        }

        .card:hover .card-icon {
            transform: rotate(0deg) scale(1.1);
            background: rgba(255, 255, 255, 0.3);
            border-width: 4px;
        }

        .card-body {
            padding: 32px 24px;
            position: relative;
            z-index: 1;
            background: white;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            font-style: normal;
            margin-bottom: 16px;
            color: #316995;
            letter-spacing: -0.02em;
            font-variation-settings: "wght" 700, "opsz" 14;
            position: relative;
            text-transform: uppercase;
            line-height: 1.2;
        }

        .card:nth-child(2n) .card-title {
            color: #ff8c42;
        }

        .card:nth-child(3n) .card-title {
            color: #4a90a4;
        }

        .card-title::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            width: 20px;
            height: 20px;
            background: #316995;
            border-radius: 0;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .card:nth-child(2n) .card-title::before {
            background: #ff8c42;
        }

        .card:nth-child(3n) .card-title::before {
            background: #4a90a4;
        }

        .card:hover .card-title::before {
            opacity: 1;
            transform: translate(4px, 4px);
        }

        .card-title::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 3px;
            background: #316995;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .card:nth-child(2n) .card-title::after {
            background: #ff8c42;
        }

        .card:nth-child(3n) .card-title::after {
            background: #4a90a4;
        }

        .card:hover .card-title::after {
            transform: scaleX(1);
        }

        .card-description {
            font-size: 1.25rem;
            font-weight: 400;
            line-height: 1.6;
            color: #4a5568;
            font-variation-settings: "wght" 400, "opsz" 12;
            position: relative;
            border-left: 4px solid transparent;
            padding-left: 16px;
            transition: border-color 0.3s ease;
        }

        .card:hover .card-description {
            border-left-color: #316995;
        }

        .card:nth-child(2n):hover .card-description {
            border-left-color: #ff8c42;
        }

        .card:nth-child(3n):hover .card-description {
            border-left-color: #4a90a4;
        }

        /* Floating geometric shapes */
        .card-body::before {
            content: '';
            position: absolute;
            top: 20px;
            right: 20px;
            width: 12px;
            height: 12px;
            background: #316995;
            border-radius: 0;
            opacity: 0;
            transition: all 0.3s ease;
            transform: rotate(45deg);
        }

        .card:nth-child(2n) .card-body::before {
            background: #ff8c42;
            border-radius: 50%;
            transform: rotate(0deg);
        }

        .card:nth-child(3n) .card-body::before {
            background: #4a90a4;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            transform: rotate(0deg);
        }

        .card:hover .card-body::before {
            opacity: 0.6;
            transform: rotate(180deg) scale(1.2);
        }

        .card:nth-child(2n):hover .card-body::before {
            transform: rotate(360deg) scale(1.2);
        }

        .card:nth-child(3n):hover .card-body::before {
            transform: rotate(120deg) scale(1.2);
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
            background: #ffffff;
            padding: 0;
            border: 4px solid #316995;
            border-radius: 0;
            box-shadow:
                6px 6px 0 #ff8c42,
                12px 12px 0 rgba(49, 105, 149, 0.2);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            transform: rotate(-0.5deg);
        }

        .program-day:nth-child(2n) {
            transform: rotate(0.5deg);
            border-color: #ff8c42;
            box-shadow:
                -6px 6px 0 #316995,
                -12px 12px 0 rgba(255, 140, 66, 0.2);
        }

        .program-day:nth-child(3n) {
            transform: rotate(0deg);
            border-color: #4a90a4;
            box-shadow:
                6px -6px 0 #ff8c42,
                12px -12px 0 rgba(74, 144, 164, 0.2);
        }

        .program-day::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                -45deg,
                transparent,
                transparent 8px,
                rgba(49, 105, 149, 0.02) 8px,
                rgba(49, 105, 149, 0.02) 16px
            );
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .program-day:hover {
            transform: rotate(0deg) scale(1.01);
            box-shadow:
                10px 10px 0 #ff8c42,
                20px 20px 0 rgba(49, 105, 149, 0.15);
        }

        .program-day:nth-child(2n):hover {
            box-shadow:
                -10px 10px 0 #316995,
                -20px 20px 0 rgba(255, 140, 66, 0.15);
        }

        .program-day:nth-child(3n):hover {
            box-shadow:
                10px -10px 0 #ff8c42,
                20px -20px 0 rgba(74, 144, 164, 0.15);
        }

        .program-day:hover::before {
            opacity: 1;
        }

        .day-header {
            background: #316995;
            padding: 28px 24px 20px;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 85% 100%, 0 100%);
        }

        .program-day:nth-child(2n) .day-header {
            background: #ff8c42;
            clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%);
        }

        .program-day:nth-child(3n) .day-header {
            background: #4a90a4;
            clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);
        }

        .day-header::after {
            content: attr(data-day);
            position: absolute;
            bottom: -20px;
            right: 20px;
            font-size: 80px;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.1);
            line-height: 1;
        }

        .day-title {
            font-size: 2.1rem;
            font-weight: 500;
            font-style: italic;
            margin-bottom: 0;
            color: white;
            position: relative;
            z-index: 2;
            letter-spacing: -0.01em;
            font-variation-settings: "wght" 500, "opsz" 18;
        }

        .sessions-container {
            padding: 32px;
        }

        .session {
            margin-bottom: 20px;
            padding: 20px;
            background: rgba(49, 105, 149, 0.05);
            border-left: 4px solid #316995;
            transition: all 0.3s ease;
        }

        .session:hover {
            background: rgba(49, 105, 149, 0.08);
            transform: translateX(8px);
        }

        .session:last-child {
            margin-bottom: 0;
        }

        .session-time {
            font-size: 2.1rem;
            color: #ff8c42;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .session-title {
            font-size: 1.4rem;
            font-weight: 500;
            font-style: italic;
            margin-bottom: 6px;
            color: #2c3e50;
            font-variation-settings: "wght" 500, "opsz" 12;
        }

        .session-participants {
            font-size: 1.25rem;
            color: #4a5568;
            line-height: 1.5;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(49, 105, 149, 0.4) 100%);
            padding: 60px 0 40px;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
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
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .hero-visual {
                order: -1;
            }

            .hero-title {
                font-size: 4rem;
            }

            .cards-grid {
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 24px;
            }

            .program-grid {
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 24px;
            }
        }

        @media (max-width: 768px) {
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
                padding: 10px 20px;
                font-size: 14px;
            }

            .hero {
                padding: 60px 0 40px;
                min-height: auto;
            }

            .hero-container {
                padding: 0 16px;
                gap: 32px;
            }

            .hero-logo {
                height: 100px;
                margin-bottom: 24px;
            }

            .hero-title {
                font-size: 2.8rem;
                margin-bottom: 24px;
                line-height: 1.1;
            }

            .hero-subtitle {
                font-size: 1.4rem;
                margin-bottom: 32px;
            }

            .hero-date {
                padding: 14px 28px;
                font-size: 1.6rem;
            }

            .hero-girl {
                max-width: 280px;
            }

            .hero-decoration {
                display: none;
            }

            /* Hide organic shapes on mobile */
            .hero-shape,
            .organic-element {
                display: none;
            }

            .container {
                padding: 0 16px;
            }

            .content-section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2.4rem;
                margin-bottom: 48px;
            }

            .cards-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 0;
            }

            .card {
                border-width: 3px;
                box-shadow: 
                    6px 6px 0 #ff8c42,
                    12px 12px 0 rgba(49, 105, 149, 0.15);
                transform: rotate(0deg);
            }

            .card:nth-child(2n) {
                transform: rotate(0deg);
                box-shadow: 
                    -6px 6px 0 #316995,
                    -12px 12px 0 rgba(255, 140, 66, 0.15);
            }

            .card:nth-child(3n) {
                transform: rotate(0deg);
                box-shadow: 
                    6px -6px 0 #ff8c42,
                    12px -12px 0 rgba(74, 144, 164, 0.15);
            }

            .card:hover {
                transform: rotate(0deg) scale(1.01);
                box-shadow: 
                    8px 8px 0 #ff8c42,
                    16px 16px 0 rgba(49, 105, 149, 0.1);
            }

            .card:nth-child(2n):hover {
                box-shadow: 
                    -8px 8px 0 #316995,
                    -16px 16px 0 rgba(255, 140, 66, 0.1);
            }

            .card:nth-child(3n):hover {
                box-shadow: 
                    8px -8px 0 #ff8c42,
                    16px -16px 0 rgba(74, 144, 164, 0.1);
            }

            .card-header {
                padding: 24px 20px;
            }

            .card-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
                margin-bottom: 12px;
            }

            .card-body {
                padding: 24px 20px;
            }

            .card-title {
                font-size: 2.1rem;
                margin-bottom: 12px;
            }

            .card-description {
                font-size: 2.1rem;
                line-height: 1.5;
                padding-left: 12px;
            }

            .program-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .program-day {
                border-width: 3px;
                box-shadow: 
                    4px 4px 0 #ff8c42,
                    8px 8px 0 rgba(49, 105, 149, 0.15);
                transform: rotate(0deg);
            }

            .program-day:nth-child(2n) {
                transform: rotate(0deg);
                box-shadow: 
                    -4px 4px 0 #316995,
                    -8px 8px 0 rgba(255, 140, 66, 0.15);
            }

            .program-day:nth-child(3n) {
                transform: rotate(0deg);
                box-shadow: 
                    4px -4px 0 #ff8c42,
                    8px -8px 0 rgba(74, 144, 164, 0.15);
            }

            .program-day:hover {
                transform: rotate(0deg) scale(1.005);
                box-shadow: 
                    6px 6px 0 #ff8c42,
                    12px 12px 0 rgba(49, 105, 149, 0.1);
            }

            .program-day:nth-child(2n):hover {
                box-shadow: 
                    -6px 6px 0 #316995,
                    -12px 12px 0 rgba(255, 140, 66, 0.1);
            }

            .program-day:nth-child(3n):hover {
                box-shadow: 
                    6px -6px 0 #ff8c42,
                    12px -12px 0 rgba(74, 144, 164, 0.1);
            }

            .day-header {
                padding: 20px 16px 16px;
            }

            .day-title {
                font-size: 1.4rem;
            }

            .sessions-container {
                padding: 20px 16px;
            }

            .session {
                margin-bottom: 16px;
                padding: 16px;
            }

            .session-time {
                font-size: 1.15rem;
                margin-bottom: 6px;
            }

            .session-title {
                font-size: 1.6rem;
                margin-bottom: 4px;
            }

            .session-participants {
                font-size: 2.1rem;
            }

            .footer {
                padding: 40px 0 30px;
                margin-top: 60px;
            }

            .footer-logo {
                height: 50px;
                margin-bottom: 20px;
            }

            .footer-text {
                font-size: 14px;
                margin-bottom: 24px;
            }

            .social-links {
                margin-bottom: 24px;
                gap: 16px;
            }

            .social-link {
                width: 44px;
                height: 44px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 12px;
                height: 65px;
            }

            .logo {
                height: 35px;
            }

            .cta-button {
                padding: 8px 16px;
                font-size: 13px;
            }

            .hero {
                padding: 40px 0 30px;
            }

            .hero-container {
                padding: 0 12px;
                gap: 24px;
            }

            .hero-logo {
                height: 80px;
                margin-bottom: 16px;
            }

            .hero-title {
                font-size: 2.2rem;
                margin-bottom: 16px;
            }

            .hero-subtitle {
                font-size: 1.6rem;
                margin-bottom: 24px;
            }

            .hero-date {
                padding: 12px 24px;
                font-size: 2.1rem;
            }

            .hero-girl {
                max-width: 220px;
            }

            .container {
                padding: 0 12px;
            }

            .content-section {
                padding: 40px 0;
            }

            .section-title {
                font-size: 2.4rem;
                margin-bottom: 32px;
            }

            .cards-grid {
                gap: 16px;
            }

            .card {
                border-width: 2px;
                box-shadow: 
                    4px 4px 0 #ff8c42,
                    8px 8px 0 rgba(49, 105, 149, 0.1);
            }

            .card:nth-child(2n) {
                box-shadow: 
                    -4px 4px 0 #316995,
                    -8px 8px 0 rgba(255, 140, 66, 0.1);
            }

            .card:nth-child(3n) {
                box-shadow: 
                    4px -4px 0 #ff8c42,
                    8px -8px 0 rgba(74, 144, 164, 0.1);
            }

            .card:hover {
                box-shadow: 
                    6px 6px 0 #ff8c42,
                    12px 12px 0 rgba(49, 105, 149, 0.08);
            }

            .card:nth-child(2n):hover {
                box-shadow: 
                    -6px 6px 0 #316995,
                    -12px 12px 0 rgba(255, 140, 66, 0.08);
            }

            .card:nth-child(3n):hover {
                box-shadow: 
                    6px -6px 0 #ff8c42,
                    12px -12px 0 rgba(74, 144, 164, 0.08);
            }

            .card-header {
                padding: 20px 16px;
            }

            .card-icon {
                width: 44px;
                height: 44px;
                font-size: 18px;
                margin-bottom: 10px;
            }

            .card-body {
                padding: 20px 16px;
            }

            .card-title {
                font-size: 1.4rem;
                margin-bottom: 10px;
            }

            .card-description {
                font-size: 1.15rem;
                padding-left: 10px;
            }

            .program-grid {
                gap: 16px;
            }

            .program-day {
                border-width: 2px;
                box-shadow: 
                    3px 3px 0 #ff8c42,
                    6px 6px 0 rgba(49, 105, 149, 0.1);
            }

            .program-day:nth-child(2n) {
                box-shadow: 
                    -3px 3px 0 #316995,
                    -6px 6px 0 rgba(255, 140, 66, 0.1);
            }

            .program-day:nth-child(3n) {
                box-shadow: 
                    3px -3px 0 #ff8c42,
                    6px -6px 0 rgba(74, 144, 164, 0.1);
            }

            .program-day:hover {
                box-shadow: 
                    4px 4px 0 #ff8c42,
                    8px 8px 0 rgba(49, 105, 149, 0.08);
            }

            .program-day:nth-child(2n):hover {
                box-shadow: 
                    -4px 4px 0 #316995,
                    -8px 8px 0 rgba(255, 140, 66, 0.08);
            }

            .program-day:nth-child(3n):hover {
                box-shadow: 
                    4px -4px 0 #ff8c42,
                    8px -8px 0 rgba(74, 144, 164, 0.08);
            }

            .day-header {
                padding: 16px 12px 12px;
            }

            .day-title {
                font-size: 2.1rem;
            }

            .sessions-container {
                padding: 16px 12px;
            }

            .session {
                margin-bottom: 12px;
                padding: 12px;
            }

            .session-time {
                font-size: 1.4rem;
                margin-bottom: 4px;
            }

            .session-title {
                font-size: 1.25rem;
                margin-bottom: 3px;
            }

            .session-participants {
                font-size: 1.15rem;
            }

            .footer {
                padding: 30px 0 20px;
                margin-top: 40px;
            }

            .footer-logo {
                height: 40px;
                margin-bottom: 16px;
            }

            .footer-text {
                font-size: 13px;
                margin-bottom: 20px;
            }

            .social-links {
                margin-bottom: 20px;
                gap: 12px;
            }

            .social-link {
                width: 40px;
                height: 40px;
                font-size: 14px;
            }
        }

        /* Landscape phones and small tablets */
        @media (max-width: 768px) and (orientation: landscape) {
            .hero {
                padding: 30px 0;
                min-height: auto;
            }

            .hero-container {
                grid-template-columns: 1fr 1fr;
                gap: 24px;
                align-items: center;
            }

            .hero-visual {
                order: 1;
            }

            .hero-title {
                font-size: 2.2rem;
            }

            .hero-girl {
                max-width: 200px;
            }

            .content-section {
                padding: 50px 0;
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
        <!-- Organic Artistic Shapes -->
        <div class="hero-shape shape-1"></div>
        <div class="hero-shape shape-2"></div>
        <div class="hero-shape shape-3"></div>
        <div class="organic-element organic-1"></div>
        <div class="organic-element organic-2"></div>

        <div class="hero-container">
            <div class="hero-content">
                <img src="https://impro.usercontent.one/appid/oneComWsb/domain/mutafest.com/media/mutafest.com/onewebmedia/logo.png?etag=null&sourceContentType=image%2Fpng&ignoreAspectRatio&resize=518%2B180" alt="MutaFest" class="hero-logo">
                <h1 class="hero-title">Festival del<br>Mediterraneo</h1>
                <p class="hero-subtitle">Un viaggio attraverso culture, letterature e arti del Mediterraneo</p>
                <div class="hero-date">2-4 Maggio 2025 • Milano</div>
            </div>

            <div class="hero-visual">
                <div class="hero-image-wrapper">
                    <img src="{{asset('images/girl.png')}}" alt="MutaFest Character" class="hero-girl">
                    <div class="hero-decoration deco-1">2025</div>
                    <div class="hero-decoration deco-2">MUTA</div>
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
                            <i class="fas fa-globe-europe"></i>
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
                            <i class="fas fa-book-open"></i>
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
                            <i class="fas fa-music"></i>
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
