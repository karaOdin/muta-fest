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

        .title-large {
            font-size: 120px;
            font-weight: bold;
            line-height: 0.9;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.3);
            margin-bottom: 20px;
            font-family: 'Impact', 'Arial Black', sans-serif;
            letter-spacing: -2px;
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
            bottom: 180px;
            z-index: 5;
            animation: float 3s ease-in-out infinite;
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

        /* Animated Waves using the wave image */
        .waves {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 120px;
            z-index: 1;
            overflow: hidden;
        }

        .wave-layer {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 120px;
            width: 200%;
        }

        .wave-layer:nth-child(1) {
            animation: waveMove1 8s linear infinite;
            opacity: 0.9;
        }

        .wave-layer:nth-child(2) {
            animation: waveMove2 6s linear infinite reverse;
            opacity: 0.7;
            bottom: 10px;
        }

        .wave-layer:nth-child(3) {
            animation: waveMove3 10s linear infinite;
            opacity: 0.5;
            bottom: 20px;
        }

        .wave-img {
            height: 120px;
            width: auto;
            display: block;
            object-fit: cover;
            filter: hue-rotate(0deg) brightness(1.1);
        }

        .wave-pattern {
            display: flex;
            height: 120px;
        }

        /* Wave animations */
        @keyframes waveMove1 {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @keyframes waveMove2 {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @keyframes waveMove3 {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Floating animation for character */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        /* Create repeating wave pattern */
        .wave-repeat {
            display: flex;
            height: 120px;
            width: 100%;
        }

        .wave-segment {
            flex: none;
            width: 400px;
            height: 120px;
            background-image: url('{{ asset('images/mauja.png') }}'); /* Replace with your wave image path */
            background-repeat: repeat-x;
            background-size: 100px 120px;
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

    <!-- Logo (if you have a logo image) -->
    <!--<div class="logo">
        <img src="logo.png" alt="MutaFest Logo" class="logo-img">
    </div>-->

    <!-- Main Title -->
    <div class="main-title">
        <div class="title-large">MutaFest</div>
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

    <!-- Animated Waves using your wave image -->
    <div class="waves">
        <!-- Wave Layer 1 -->
        <div class="wave-layer">
            <div class="wave-repeat">
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
            </div>
        </div>

        <!-- Wave Layer 2 -->
        <div class="wave-layer">
            <div class="wave-repeat">
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
            </div>
        </div>

        <!-- Wave Layer 3 -->
        <div class="wave-layer">
            <div class="wave-repeat">
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
                <div class="wave-segment"></div>
            </div>
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
