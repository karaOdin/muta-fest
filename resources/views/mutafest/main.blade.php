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
            background: #316995;
            height: 100vh;
            position: relative;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            background: #316995;
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
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.8));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #316995;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            font-weight: bold;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .social-icon:hover {
            transform: scale(1.15) translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            background: linear-gradient(145deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.95));
            border-color: rgba(255, 255, 255, 0.6);
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
            filter: drop-shadow(0 8px 25px rgba(0,0,0,0.4)) brightness(1.1);
            transition: all 0.4s ease;
        }
        
        .main-logo:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 12px 35px rgba(0,0,0,0.5)) brightness(1.2);
        }

        .subtitle {
            font-size: 48px;
            font-weight: 300;
            line-height: 1.1;
            text-shadow: 0 4px 15px rgba(0,0,0,0.4), 0 2px 8px rgba(0,0,0,0.2);
            max-width: 600px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.9));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        /* Chi siamo text */
        .chi-siamo {
            position: absolute;
            bottom: 200px;
            left: 60px;
            color: #ff8c42;
            font-size: 36px;
            font-weight: 400;
            z-index: 5;
            text-shadow: 0 4px 15px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #ff8c42, #ffb366);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            padding: 10px 20px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 140, 66, 0.3);
            background-color: rgba(255, 255, 255, 0.1);
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
            filter: drop-shadow(0 15px 35px rgba(0,0,0,0.4)) brightness(1.1) contrast(1.1);
            transition: all 0.4s ease;
        }
        
        .character-img:hover {
            filter: drop-shadow(0 20px 45px rgba(0,0,0,0.5)) brightness(1.2) contrast(1.2);
            transform: scale(1.02);
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
            text-shadow: 0 4px 15px rgba(0,0,0,0.6), 0 2px 8px rgba(0,0,0,0.4);
            z-index: 6;
            background: rgba(49, 105, 149, 0.8);
            padding: 15px 20px;
            border-radius: 15px;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
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
                rgba(49, 105, 149, 0.15) 40%,
                rgba(49, 105, 149, 0.25) 70%,
                rgba(49, 105, 149, 0.35) 100%
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
                radial-gradient(3px 3px at 20% 30%, rgba(255, 255, 255, 0.8), transparent),
                radial-gradient(2px 2px at 60% 70%, rgba(255, 255, 255, 0.6), transparent),
                radial-gradient(2px 2px at 50% 50%, rgba(255, 255, 255, 0.7), transparent),
                radial-gradient(1px 1px at 80% 20%, rgba(255, 255, 255, 0.9), transparent),
                radial-gradient(1px 1px at 15% 80%, rgba(255, 255, 255, 0.5), transparent);
            background-size: 350px 250px;
            background-repeat: repeat;
            opacity: 0.4;
            animation: sparkle 12s linear infinite;
            z-index: 11;
        }

        @keyframes sparkle {
            0% { transform: translateX(0) translateY(0); opacity: 0.4; }
            50% { opacity: 0.8; }
            100% { transform: translateX(350px) translateY(-10px); opacity: 0.4; }
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

        /* Mobile-first Proportional Design */
        @media (max-width: 1200px) {
            .main-title {
                top: 10vh;
                left: 5vw;
            }

            .main-logo {
                height: 9vh;
                margin-bottom: 1vh;
            }

            .subtitle {
                font-size: 7vw;
                line-height: 1.2;
            }

            .character {
                right: 8vw;
                bottom: 25vh;
            }

            .character-img {
                width: 25vw;
                min-width: 150px;
                max-width: 250px;
            }

            .character-text-overlay {
                font-size: 4.2vw;
                min-font-size: 16px;
                max-font-size: 24px;
            }

            .chi-siamo {
                bottom: 32vh;
                left: 5vw;
                font-size: 4vw;
            }

            .social-icons {
                top: 3vh;
                left: 3vw;
                gap: 2vw;
            }

            .social-icon {
                width: 6vw;
                height: 6vw;
                min-width: 35px;
                min-height: 35px;
                max-width: 50px;
                max-height: 50px;
                font-size: 3vw;
            }

            .ocean {
                height: 20vh;
            }

            .wave-row:nth-child(1) {
                bottom: 12vh;
            }

            .wave-row:nth-child(2) {
                bottom: 6vh;
            }

            .wave-img {
                height: 6vh;
                min-height: 30px;
                max-height: 50px;
            }

            .wave-row {
                gap: 3vw;
            }
        }

        /* Prevent scrolling */
        html, body {
            overflow: hidden;
            height: 100%;
            position: fixed;
            width: 100%;
        }

        /* Chi Siamo Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(15px);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: #316995;
            border-radius: 24px;
            max-width: 90vw;
            max-height: 85vh;
            width: 100%;
            max-width: 600px;
            position: relative;
            overflow: hidden;
            transform: scale(0.9) translateY(30px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .modal-overlay.active .modal-content {
            transform: scale(1) translateY(0);
        }

        /* Modal decorative elements */
        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
            animation: shimmer 2s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { opacity: 0; transform: translateX(-100%); }
            50% { opacity: 1; }
            100% { opacity: 0; transform: translateX(100%); }
        }

        .modal-header {
            position: relative;
            z-index: 10;
            padding: 32px 32px 24px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-title {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 8px;
            letter-spacing: -0.025em;
            line-height: 1.2;
        }

        .modal-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
            font-weight: 400;
            letter-spacing: 0.025em;
        }

        .modal-body {
            padding: 32px;
            position: relative;
            z-index: 10;
            max-height: 60vh;
            overflow-y: auto;
        }

        .modal-body::-webkit-scrollbar {
            width: 6px;
        }

        .modal-body::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .modal-body::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .modal-body::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .modal-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .modal-text:first-child {
            font-weight: 500;
            color: white;
            margin-bottom: 1.5rem;
        }

        .modal-text:last-child {
            margin-bottom: 0;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.2s ease;
            z-index: 15;
            backdrop-filter: blur(10px);
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }

        /* Responsive modal */
        @media (max-width: 768px) {
            .modal-content {
                max-width: 95vw;
                margin: 20px;
                border-radius: 20px;
            }

            .modal-header {
                padding: 24px 24px 20px;
            }

            .modal-title {
                font-size: 2rem;
            }

            .modal-subtitle {
                font-size: 1rem;
            }

            .modal-body {
                padding: 24px;
                max-height: 50vh;
            }

            .modal-text {
                font-size: 0.95rem;
                line-height: 1.5;
            }
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
    <div class="chi-siamo" onclick="openModal()">Chi siamo</div>

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

    <!-- Chi Siamo Modal -->
    <div class="modal-overlay" id="modalOverlay" onclick="closeModal()">
        <div class="modal-content" onclick="event.stopPropagation()">
            <button class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="modal-header">
                <h2 class="modal-title">Chi Siamo</h2>
                <p class="modal-subtitle">MutaFest - Festival del Mediterraneo</p>
            </div>
            
            <div class="modal-body">
                <p class="modal-text">
                    MutaFest è un festival culturale annuale che si svolge a Milano, dedicato alle culture, alle letterature e alle arti nate sulle sponde del Mar Mediterraneo.
                </p>
                
                <p class="modal-text">
                    Nasce da un'esperienza decennale nel campo editoriale e culturale, fatta di traduzioni, pubblicazioni e incontri tra voci provenienti da Est e Ovest, da Sud e Nord, da piccole isole e grandi città: tutte affacciate sullo stesso mare, ma ognuna con il proprio colore.
                </p>
                
                <p class="modal-text">
                    MutaFest guarda al Mediterraneo non solo come spazio geografico, ma come orizzonte culturale e spirituale: un archivio vivo di memorie, tragedie, suoni, domande, migrazioni e bellezza plurale che rifiuta ogni semplificazione. In un tempo in cui questo spazio viene ridotto a tragedia o trincea, attraversato dagli esiliati e chiuso dalle frontiere, dove le storie affondano prima ancora di essere raccontate, MutaFest nasce per restituirgli il suo significato originario: luogo d'incontro, di pluralità, di ascolto reciproco.
                </p>
                
                <p class="modal-text">
                    Per tre giorni, il festival trasforma la città di Milano in un crocevia di lingue, cibi, musiche, immagini e visioni. Ospita scrittori, poeti, musicisti, registi, chef e artisti visivi da tutti i Paesi del Mediterraneo, dando vita a un programma corale fatto di letture, concerti, proiezioni, dibattiti, performance e momenti conviviali. Non per appiattire le differenze, ma per renderle visibili, vive, fertili.
                </p>
                
                <p class="modal-text">
                    Dietro MutaFest c'è Almutawassit, casa editrice e laboratorio culturale guidato da Khaled Soliman Al Nassiry, che dal 2015 porta avanti un progetto che vede nelle lingue del Mediterraneo delle case provvisorie, su una costa condivisa.
                </p>
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
    // Modal functions
    function openModal() {
        const modal = document.getElementById('modalOverlay');
        modal.classList.add('active');
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
        
        // Add entrance animation delay
        setTimeout(() => {
            const modalContent = modal.querySelector('.modal-content');
            modalContent.style.animation = 'none';
        }, 500);
    }
    
    function closeModal() {
        const modal = document.getElementById('modalOverlay');
        modal.classList.remove('active');
        
        // Restore body scroll
        document.body.style.overflow = 'hidden'; // Keep hidden as per original design
    }
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
    
    // JavaScript to help with image loading and animation
    document.addEventListener('DOMContentLoaded', function() {
        // Add cursor pointer to Chi siamo text
        const chiSiamo = document.querySelector('.chi-siamo');
        if (chiSiamo) {
            chiSiamo.style.cursor = 'pointer';
            chiSiamo.style.transition = 'transform 0.3s ease, color 0.3s ease';
            
            chiSiamo.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                this.style.color = '#4a90a4';
            });
            
            chiSiamo.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.color = '#ff8c42';
            });
        }
    });
</script>
</body>
</html>
