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
            font-size: 1.1rem;
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
            font-size: 1.3rem;
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
            font-size: 1.2rem;
            line-height: 2;
            margin-bottom: 30px;
        }

        .bio-section {
            margin-bottom: 30px;
        }

        .bio-section h3 {
            font-size: 1.5rem;
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
        }

        .session-item h4 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #ffd700;
        }

        .session-details {
            font-size: 1rem;
            margin-bottom: 8px;
            opacity: 0.9;
        }

        .session-role {
            font-size: 0.95rem;
            margin-bottom: 10px;
            color: #87CEEB;
        }

        .session-description {
            font-size: 1rem;
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
    </style>
    @include('components.shared-styles')
</head>
<body>
    @include('components.navbar')

    <div class="container">
        <a href="{{ route('mutafest.guests') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> {{ __('Back to Guests') }}
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
                <img src="{{ Storage::url($guest->image) }}" alt="{{ $guest->name }}" class="guest-image">
            @else
                <img src="{{ asset('images/book.png') }}" alt="{{ $guest->name }}" class="guest-image">
            @endif
            
            <div class="guest-bio">
                @if($guest->bio)
                    <div class="bio-text">
                        {!! $guest->bio !!}
                    </div>
                @endif
                
                @if($guest->sessions->count() > 0)
                    <div class="bio-section">
                        <h3><i class="fas fa-calendar"></i> Sessions at MutaFest</h3>
                        @foreach($guest->sessions as $session)
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
                                        <em>Role: {{ $session->pivot->role_in_session }}</em>
                                    </p>
                                @endif
                                @if($session->description)
                                    <p class="session-description">
                                        {!! Str::limit(strip_tags($session->description), 150) !!}
                                    </p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('components.footer')

    @include('components.shared-scripts')
</body>
</html>