<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MutaFest - Festival del Mediterraneo a Milano</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
            background: linear-gradient(135deg, #4a90a4 0%, #357892 100%);
            height: 100vh;
            position: relative;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            background:#316995;
        }

        /* Social Icons */
        .social-icons {
            position: absolute;
            top: 30px;
            left: 30px;
            display: flex;
            gap: 15px;
            z-index: 10;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #357892;
            text-decoration: none;
            transition: transform 0.3s ease;
            font-weight: bold;
        }

        .social-icon:hover {
            transform: scale(1.1);
        }

        /* Main Title */
        .main-title {
            position: absolute;
            top: 120px;
            left: 60px;
            color: white;
            z-index: 5;
        }

        .main-logo {
            height: 120px;
            width: auto;
            margin-bottom: 20px;
            filter: drop-shadow(3px 3px 6px rgba(0,0,0,0.3));
        }

        .subtitle {
            font-size: 48px;
            font-weight: 300;
            line-height: 1.1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            max-width: 600px;
        }

        /* Chi siamo text */
        .chi-siamo {
            position: absolute;
            bottom: 200px;
            left: 60px;
            color: #ff8c42;
            font-size: 36px;
            font-weight: 300;
            z-index: 5;
        }

        /* Character Image */
        .character {
            position: absolute;
            right: 120px;
            bottom: 190px;
            z-index: 5;
            animation: float 6s ease-in-out infinite;
        }

        .character-img {
            width: 200px;
            height: auto;
            filter: drop-shadow(0 8px 20px rgba(0,0,0,0.3));
        }

        .character-text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            line-height: 1.1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            z-index: 6;
        }

        /* Image-based Wave System with 3 Rows */
        .ocean {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            z-index: 1;
            overflow: hidden;
        }

        /* Wave row container */
        .wave-row {
            position: absolute;
            width: 200%;
            display: flex;
            align-items: center;
            gap: 30px; /* Space between images in same row */
        }

        /* First row - back layer */
        .wave-row:nth-child(1) {
            bottom: 120px; /* Position for top row */
            animation: waveMove1 25s linear infinite;
           /* opacity: 0.6;
            filter: brightness(0.8);*/
        }

        /* Second row - middle layer */
        .wave-row:nth-child(2) {
            bottom: 60px; /* Position for middle row */
            animation: waveMove2 20s linear infinite;
            animation-delay: -10s;
           /* opacity: 0.8;
            filter: brightness(0.9);*/
        }

        /* Third row - front layer */
        .wave-row:nth-child(3) {
            bottom: 0; /* Position for bottom row */
            animation: waveMove3 15s linear infinite;
            animation-delay: -5s;
            opacity: 1;
        }

        /* Individual wave image */
        .wave-img {
            height: 50px;
            width: auto;
            flex-shrink: 0;
        }

        /* Animation for continuous movement */
        @keyframes waveMove1 {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes waveMove2 {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes waveMove3 {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        /* Background water color behind waves */
        .ocean::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom,
                transparent 0%,
                rgba(30, 122, 184, 0.2) 50%,
                rgba(30, 122, 184, 0.4) 100%
            );
            z-index: -1;
        }

        /* Add surface sparkles */
        .ocean::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(2px 2px at 20% 30%, white, transparent),
                radial-gradient(2px 2px at 60% 70%, white, transparent),
                radial-gradient(1px 1px at 50% 50%, white, transparent),
                radial-gradient(1px 1px at 80% 20%, white, transparent);
            background-size: 300px 200px;
            background-repeat: repeat;
            opacity: 0.3;
            animation: sparkle 10s linear infinite;
            z-index: 11;
        }

        @keyframes sparkle {
            0% { transform: translateX(0); }
            100% { transform: translateX(300px); }
        }

        /* Floating animation for character */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(-2deg); }
            33% { transform: translateY(-10px) rotate(1deg); }
            66% { transform: translateY(-5px) rotate(-1deg); }
        }

        /* Adjust character to float with waves */
        .character {
            animation: float 6s ease-in-out infinite;
        }

        /* Logo placeholder if needed */
        .logo {
            position: absolute;
            top: 30px;
            right: 30px;
            z-index: 10;
            opacity: 0.8;
        }

        .logo-img {
            width: 80px;
            height: auto;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.2));
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .title-large { font-size: 80px; }
            .subtitle { font-size: 32px; }
            .character { right: 20px; }
            .character-img { width: 150px; }
            .main-title { left: 30px; }
            .chi-siamo { left: 30px; }
        }

        /* File upload styling for demonstration */
        .image-placeholder {
            background: rgba(255,255,255,0.1);
            border: 2px dashed rgba(255,255,255,0.3);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            color: rgba(255,255,255,0.7);
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Social Icons -->
    <div class="social-icons">
        <a href="#" class="social-icon">f</a>
        <a href="#" class="social-icon">𝕏</a>
        <a href="#" class="social-icon">@</a>
    </div>

    <!-- Logo (hidden since we're using it as main title) -->
    <!--<div class="logo">
        <img src="https://impro.usercontent.one/appid/oneComWsb/domain/mutafest.com/media/mutafest.com/onewebmedia/logo.png?etag=null&sourceContentType=image%2Fpng&ignoreAspectRatio&resize=518%2B180" alt="MutaFest Logo" class="logo-img">
    </div>-->

    <!-- Main Title -->
    <div class="main-title">
        <img src="https://impro.usercontent.one/appid/oneComWsb/domain/mutafest.com/media/mutafest.com/onewebmedia/logo.png?etag=null&sourceContentType=image%2Fpng&ignoreAspectRatio&resize=518%2B180"
             alt="MutaFest"
             class="main-logo">
        <div class="subtitle">Festival del<br>Mediterraneo<br>a Milano</div>
    </div>

    <!-- Chi siamo text -->
    <div class="chi-siamo">Chi siamo</div>

    <!-- Character Image with floating animation -->
    <div class="character">
        <!-- Replace this with your actual character image -->
        <img src="{{asset('images/girl.png')}}"
             alt="MutaFest Character"
             class="character-img">

        <!-- Text overlay on character -->
        <div class="character-text-overlay">
            Prima<br>edizione<br>2025
        </div>
    </div>

    <!-- Image-based Ocean Waves with 3 Rows -->
    <div class="ocean">
        <!-- First Row (Back) -->
        <div class="wave-row">
            @for($i = 0; $i < 20; $i++)
                <img src="{{ asset('images/mauja.png') }}" alt="Wave" class="wave-img">
            @endfor
        </div>

        <!-- Second Row (Middle) -->
        <div class="wave-row">
            @for($i = 0; $i < 20; $i++)
                <img src="{{ asset('images/mauja.png') }}" alt="Wave" class="wave-img">
            @endfor
        </div>

        <!-- Third Row (Front) -->
        <div class="wave-row">
            @for($i = 0; $i < 20; $i++)
                <img src="{{ asset('images/mauja.png') }}" alt="Wave" class="wave-img">
            @endfor
        </div>
    </div>

    <!-- Instructions for using your images
    <div style="position: fixed; top: 10px; right: 10px; background: rgba(0,0,0,0.7); color: white; padding: 10px; border-radius: 5px; font-size: 12px; max-width: 300px; z-index: 1000;">
        <strong>To use your images:</strong><br>
        1. Replace the character img src with your girl image<br>
        2. Replace wave background-image with your wave image<br>
        3. Add your logo image in the logo section
    </div>-->
</div>

<script>
    // JavaScript to help with image loading and animation
    document.addEventListener('DOMContentLoaded', function() {
        // You can add JavaScript here to dynamically load your images
        // and handle any additional animations

        // Example of how to replace images dynamically:
        /*
        const characterImg = document.querySelector('.character-img');
        const waveSegments = document.querySelectorAll('.wave-segment');

        // Replace with your actual image URLs
        characterImg.src = 'path/to/your/girl-image.png';

        waveSegments.forEach(segment => {
            segment.style.backgroundImage = 'url(path/to/your/wave-image.png)';
        });
        */
    });
</script>
</body>
</html>
