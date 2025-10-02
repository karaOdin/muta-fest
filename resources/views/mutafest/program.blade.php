<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program - MutaFest</title>
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

        .days-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .day-card {
            background: rgba(255, 255, 255, 0.1);
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
            height: 200px;
            object-fit: cover;
        }

        .day-content {
            padding: 30px;
        }

        .day-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .day-subtitle {
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
                font-size: 1.5rem;
            }

            .day-subtitle {
                font-size: 1rem;
            }
        }
    </style>
    @include('components.shared-styles')
</head>
<body>
    @include('components.navbar')

    <div class="container">
        <h1 class="page-title">{{ __('mutafest.nav.program') }}</h1>
        
        <div class="days-grid">
            <div class="day-card">
                <a href="{{ route('mutafest.program.day', ['day' => 1]) }}">
                    <img src="{{ asset('images/mauja.png') }}" alt="Day 1" class="day-image">
                    <div class="day-content">
                        <h2 class="day-title">Day 1</h2>
                        <p class="day-subtitle">2 Maggio 2025</p>
                    </div>
                </a>
            </div>

            <div class="day-card">
                <a href="{{ route('mutafest.program.day', ['day' => 2]) }}">
                    <img src="{{ asset('images/mauja.png') }}" alt="Day 2" class="day-image">
                    <div class="day-content">
                        <h2 class="day-title">Day 2</h2>
                        <p class="day-subtitle">3 Maggio 2025</p>
                    </div>
                </a>
            </div>

            <div class="day-card">
                <a href="{{ route('mutafest.program.day', ['day' => 3]) }}">
                    <img src="{{ asset('images/mauja.png') }}" alt="Day 3" class="day-image">
                    <div class="day-content">
                        <h2 class="day-title">Day 3</h2>
                        <p class="day-subtitle">4 Maggio 2025</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @include('components.footer')

    @include('components.shared-scripts')
</body>
</html>