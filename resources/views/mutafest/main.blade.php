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

        /* Pure CSS Animated Waves */
        .ocean {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 300px;
            z-index: 1;
            overflow: hidden;
        }

        /* Wave layers - each with different colors and animations */
        .wave {
            position: absolute;
            width: 200%;
            height: 100%;
            bottom: 0;
            left: 0;
        }

        /* First wave layer - lightest color, fastest */
        .wave:nth-child(1) {
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='%2382c4e5'/%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='%235facdb'/%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='%233c97d3'/%3E%3C/svg%3E") repeat-x;
            background-size: 1200px 120px;
            animation: wave1 7s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            bottom: 40px;
            height: 120px;
        }

        /* Second wave layer - medium color, medium speed */
        .wave:nth-child(2) {
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='%235facdb'/%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='%234a9dcf'/%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='%232a89c7'/%3E%3C/svg%3E") repeat-x;
            background-size: 1200px 140px;
            animation: wave2 10s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            animation-delay: -2s;
            bottom: 20px;
            height: 140px;
            opacity: 0.8;
        }

        /* Third wave layer - darkest color, slowest */
        .wave:nth-child(3) {
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='%234a9dcf'/%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='%23378fc3'/%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='%231e7ab8'/%3E%3C/svg%3E") repeat-x;
            background-size: 1200px 160px;
            animation: wave3 15s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            animation-delay: -4s;
            bottom: 0;
            height: 160px;
            opacity: 0.9;
        }

        /* Wave animations - smooth continuous movement */
        @keyframes wave1 {
            0% { transform: translateX(0) translateY(0); }
            50% { transform: translateX(-600px) translateY(-5px); }
            100% { transform: translateX(-1200px) translateY(0); }
        }

        @keyframes wave2 {
            0% { transform: translateX(0) translateY(0); }
            50% { transform: translateX(-600px) translateY(5px); }
            100% { transform: translateX(-1200px) translateY(0); }
        }

        @keyframes wave3 {
            0% { transform: translateX(0) translateY(0); }
            50% { transform: translateX(-600px) translateY(-3px); }
            100% { transform: translateX(-1200px) translateY(0); }
        }

        /* Floating animation for character */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        /* Add some foam/highlights on top of waves */
        .ocean::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, 
                transparent 0%, 
                transparent 70%, 
                rgba(255,255,255,0.1) 85%, 
                rgba(255,255,255,0.05) 100%
            );
            z-index: 10;
            pointer-events: none;
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

    <!-- Logo -->
    <div class="logo">
        <img src="https://impro.usercontent.one/appid/oneComWsb/domain/mutafest.com/media/mutafest.com/onewebmedia/logo.png?etag=null&sourceContentType=image%2Fpng&ignoreAspectRatio&resize=518%2B180" alt="MutaFest Logo" class="logo-img">
    </div>

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

    <!-- Pure CSS Animated Ocean Waves -->
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
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
