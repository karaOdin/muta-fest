<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guest->name }} - MutaFest</title>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
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
            line-height: 1.8;
            min-height: 100vh;
            padding: 40px 20px 120px;
        }


        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 40px;
            color: white;
            text-decoration: none;
            font-size: 1.4rem;
            border-bottom: 2px solid white;
            padding-bottom: 2px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        .guest-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .guest-name {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .guest-info {
            font-size: 1.6rem;
            opacity: 0.9;
        }

        .guest-content {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 60px;
            align-items: start;
        }

        .guest-image {
            width: auto;
            height: auto;
            max-width: 100%;
            border-radius: 20px;
        }

        .guest-bio {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
        }

        .bio-text {
            font-size: 1.5rem;
            line-height: 2;
            margin-bottom: 30px;
        }

        .bio-text * {
            background-color: transparent !important;
            background: none !important;
        }

        .bio-text p,
        .bio-text div,
        .bio-text span {
            color: inherit;
        }

        .bio-section {
            margin-bottom: 30px;
        }

        .bio-section h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .bio-section h3 i {
            margin-right: 10px;
            color: #ffd700;
        }

        .session-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .session-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(10px);
        }

        .session-item h4 {
            font-size: 1.6rem;
            margin-bottom: 10px;
            color: #ffd700;
        }

        .session-details {
            font-size: 1.3rem;
            margin-bottom: 8px;
            opacity: 0.9;
        }

        .session-role {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #87CEEB;
        }

        .session-description {
            font-size: 1.3rem;
            line-height: 1.6;
            opacity: 0.8;
        }

        @media (max-width: 768px) {

            .guest-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .guest-name {
                font-size: 2.5rem;
            }

            .guest-info {
                font-size: 1.2rem;
            }

            .guest-bio {
                padding: 30px 20px;
            }

            .bio-text {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .guest-name {
                font-size: 2rem;
            }

            .bio-text {
                font-size: 1rem;
            }

            .bio-section h3 {
                font-size: 1.3rem;
            }
        }

        /* Stili Modale Immagine */
        .image-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .image-modal.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            animation: zoomIn 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0.3) rotate(-10deg);
                opacity: 0;
            }
            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        .modal-image {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .modal-caption {
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: 600;
            margin-top: 20px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 2px solid white;
            color: white;
            font-size: 2.5rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10000;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg) scale(1.1);
        }

        .guest-image {
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .guest-image:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
    </style>
    @include('components.shared-styles')
</head>
<body>
    @include('components.navbar')

    <div class="container">
        <a href="{{ route('mutafest.guests') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Torna agli Ospiti
        </a>

        <div class="guest-header">
            <h1 class="guest-name">{{ $guest->name }}</h1>
            <p class="guest-info">
                @if($guest->role)
                    {{ $guest->role }}
                @endif
                @if($guest->role && $guest->country) - @endif
                @if($guest->country)
                    {{ $guest->country_flag }} {{ $guest->country }}
                @endif
            </p>
        </div>

        <div class="guest-content">
            @if($guest->image)
                <img src="{{ Storage::url($guest->image) }}" alt="{{ $guest->name }}" class="guest-image" onclick="openImageModal(this, '{{ $guest->name }}')">
            @else
                <img src="{{ asset('images/book.png') }}" alt="{{ $guest->name }}" class="guest-image" onclick="openImageModal(this, '{{ $guest->name }}')">
            @endif
            
            <div class="guest-bio">
                @if($guest->bio)
                    <div class="bio-text">
                        {!! $guest->bio !!}
                    </div>
                @endif
                
                @if($guest->sessions->count() > 0)
                    <div class="bio-section">
                        <h3><i class="fas fa-calendar"></i> Incontri a MutaFest</h3>
                        @foreach($guest->sessions as $session)
                            <a href="{{ route('mutafest.session.detail', $session) }}" style="text-decoration: none; color: inherit;">
                                <div class="session-item">
                                    <h4>{{ $session->title }}</h4>
                                    <p class="session-details">
                                        <strong>{{ $session->day->name }}</strong>
                                        ({{ $session->day->date->format('F j, Y') }})
                                        {{ $session->time_range }}
                                        @if($session->hall)
                                            - {{ $session->hall->name }}
                                        @endif
                                    </p>
                                    @if($session->pivot && $session->pivot->role_in_session)
                                        <p class="session-role">
                                            <em>Ruolo: {{ $session->pivot->role_in_session }}</em>
                                        </p>
                                    @endif
                                    @if($session->description)
                                        <p class="session-description">
                                            {!! Str::limit(strip_tags($session->description), 150) !!}
                                        </p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('components.footer')

    <!-- Modale Immagine -->
    <div class="image-modal" id="imageModal" onclick="closeImageModal()">
        <button class="modal-close" onclick="closeImageModal()">&times;</button>
        <div class="modal-content" onclick="event.stopPropagation()">
            <img src="" alt="" class="modal-image" id="modalImage">
            <div class="modal-caption" id="modalCaption"></div>
        </div>
    </div>

    @include('components.shared-scripts')

    <script>
        function openImageModal(imgElement, guestName) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const modalCaption = document.getElementById('modalCaption');

            modal.classList.add('active');
            modalImg.src = imgElement.src;
            modalImg.alt = imgElement.alt;
            modalCaption.textContent = guestName;

            // Previene lo scroll del body quando la modale è aperta
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');

            // Riabilita lo scroll del body
            document.body.style.overflow = 'auto';
        }

        // Chiudi la modale con il tasto Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
</body>
</html>