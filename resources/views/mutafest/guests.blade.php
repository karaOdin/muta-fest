<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guests - MutaFest</title>
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
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 60px;
            letter-spacing: -1px;
        }

        .guests-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .guest-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .guest-card:hover {
            transform: translateY(-10px);
        }

        .guest-card a {
            text-decoration: none;
            color: white;
            display: block;
        }

        .guest-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .guest-content {
            padding: 30px;
        }

        .guest-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .guest-role {
            font-size: 1.1rem;
            opacity: 0.9;
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

        @media (max-width: 768px) {

            .page-title {
                font-size: 2.5rem;
                margin-bottom: 40px;
            }

            .guests-grid {
                gap: 30px;
            }

            .guest-content {
                padding: 20px;
            }

            .guest-name {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 2rem;
            }

            .guest-name {
                font-size: 1.3rem;
            }

            .guest-role {
                font-size: 1rem;
            }
        }
    </style>
    @include('components.shared-styles')
</head>
<body>
    @include('components.navbar')

    <div class="container">
        <h1 class="page-title">{{ __('mutafest.nav.guests') }}</h1>
        
        <div class="guests-grid">
            @php
                $guests = [
                    ['id' => 1, 'name' => 'Amina Bouayach', 'role' => 'Writer & Activist', 'country' => 'Morocco'],
                    ['id' => 2, 'name' => 'Marco Bellardi', 'role' => 'Poet & Translator', 'country' => 'Italy'],
                    ['id' => 3, 'name' => 'Leila Othmani', 'role' => 'Filmmaker', 'country' => 'Tunisia'],
                    ['id' => 4, 'name' => 'Carlos Mendez', 'role' => 'Musician', 'country' => 'Spain'],
                    ['id' => 5, 'name' => 'Samir Kasemi', 'role' => 'Author', 'country' => 'Albania'],
                    ['id' => 6, 'name' => 'Ivo Saglietti', 'role' => 'Photographer', 'country' => 'Italy'],
                ];
            @endphp
            
            @foreach($guests as $guest)
            <div class="guest-card">
                <a href="{{ route('mutafest.guest.details', ['id' => $guest['id']]) }}">
                    <img src="{{ asset('images/book.png') }}" alt="{{ $guest['name'] }}" class="guest-image">
                    <div class="guest-content">
                        <h2 class="guest-name">{{ $guest['name'] }}</h2>
                        <p class="guest-role">{{ $guest['role'] }} - {{ $guest['country'] }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    @include('components.footer')

    @include('components.shared-scripts')
</body>
</html>