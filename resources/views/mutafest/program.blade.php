<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programma - MutaFest</title>
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
            line-height: 1.4;
            min-height: 100vh;
            padding: 40px 20px 120px;
        }


        .container {
            max-width: 1200px;
            margin: 140px auto;
        }

        .page-title {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 60px;
            letter-spacing: -1px;
        }

        .days-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .day-card {
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .day-card:hover {
            transform: translateY(-10px);
        }

        .day-card a {
            text-decoration: none;
            color: white;
            display: block;
        }

        .day-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .day-content {
            padding: 30px;
        }

        .day-title {
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .day-subtitle {
            font-size: 1.8rem;
            opacity: 0.9;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 40px;
            color: white;
            text-decoration: none;
            font-size: 1.8rem;
            border-bottom: 2px solid white;
            padding-bottom: 2px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        @media (max-width: 768px) {

            .page-title {
                font-size: 2.5rem;
                margin-bottom: 40px;
            }

            .days-grid {
                gap: 30px;
            }

            .day-content {
                padding: 20px;
            }

            .day-title {
                font-size: 1.7rem;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 2rem;
            }

            .day-title {
                font-size: 1.9rem;
            }

            .day-subtitle {
                font-size: 1.4rem;
            }
        }
    </style>
    @include('components.shared-styles')
</head>
<body>
    @include('components.navbar')

    <div class="container">
       <!-- <h1 class="page-title">{{ __('mutafest.nav.program') }}</h1>-->

        <div class="days-grid">
            @forelse($days as $day)
                <div class="day-card">
                    <a href="{{ route('mutafest.program.day', ['day' => $day->id]) }}">
                        @if($day->image)
                            <img src="{{ Storage::url($day->image) }}" alt="{{ $day->name }}" class="day-image">
                        @else
                            <img src="{{ asset('images/mauja.png') }}" alt="{{ $day->name }}" class="day-image">
                        @endif
                        <!--<div class="day-content">
                            <h2 class="day-title">{{ $day->name }}</h2>
                            <p class="day-subtitle">{{ $day->date->format('j F Y') }}</p>
                            @if($day->sessions_count > 0)
                                <p style="margin-top: 10px; font-size: 1.3rem; opacity: 0.8;">
                                    <i class="fas fa-microphone"></i> {{ $day->sessions_count }} {{ __('sessions') }}
                                </p>
                            @endif
                        </div>-->
                    </a>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                    <p style="font-size: 1.6rem; opacity: 0.8;">{{ __('No program days available yet.') }}</p>
                </div>
            @endforelse
        </div>
    </div>

    @include('components.footer')

    @include('components.shared-scripts')
</body>
</html>
