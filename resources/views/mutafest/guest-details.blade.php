<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guest['name'] }} - MutaFest</title>
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
            width: 100%;
            height: 400px;
            object-fit: cover;
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
        <div class="guest-header">
            <h1 class="guest-name">{{ $guest['name'] }}</h1>
            <p class="guest-info">{{ $guest['role'] }} - {{ $guest['country'] }}</p>
        </div>

        <div class="guest-content">
            <img src="{{ asset('images/book.png') }}" alt="{{ $guest['name'] }}" class="guest-image">
            
            <div class="guest-bio">
                <p class="bio-text">
                    {{ $guest['bio'] }}
                </p>
                
                @if($guest['id'] == 1)
                    <div class="bio-section">
                        <h3>Works</h3>
                        <p>Author of several books on human rights and Mediterranean culture. Her writings explore themes of identity, migration, and social justice across the Mediterranean region.</p>
                    </div>
                    
                    <div class="bio-section">
                        <h3>At MutaFest</h3>
                        <p>Amina will participate in reading sessions and panel discussions on Day 1 and Day 2, sharing her insights on contemporary Mediterranean literature and human rights activism.</p>
                    </div>
                @elseif($guest['id'] == 2)
                    <div class="bio-section">
                        <h3>Works</h3>
                        <p>Published numerous poetry collections and translations. Specializes in contemporary Arabic poetry and Mediterranean literary exchanges.</p>
                    </div>
                    
                    <div class="bio-section">
                        <h3>At MutaFest</h3>
                        <p>Marco will lead the translation workshop on Day 2 and participate in collaborative writing sessions, demonstrating the art of literary translation.</p>
                    </div>
                @elseif($guest['id'] == 3)
                    <div class="bio-section">
                        <h3>Works</h3>
                        <p>Director of acclaimed documentaries exploring Mediterranean identities and cross-cultural narratives. Her films have been featured in major international festivals.</p>
                    </div>
                    
                    <div class="bio-section">
                        <h3>At MutaFest</h3>
                        <p>Leila will present her latest documentary on Day 2 and participate in discussions about visual storytelling in Mediterranean cultures.</p>
                    </div>
                @elseif($guest['id'] == 4)
                    <div class="bio-section">
                        <h3>Works</h3>
                        <p>Renowned for blending traditional Mediterranean music with contemporary compositions. Has performed in major venues across Europe and North Africa.</p>
                    </div>
                    
                    <div class="bio-section">
                        <h3>At MutaFest</h3>
                        <p>Carlos will perform in the opening night concert and lead musical sessions throughout the festival, showcasing Mediterranean musical traditions.</p>
                    </div>
                @elseif($guest['id'] == 5)
                    <div class="bio-section">
                        <h3>Works</h3>
                        <p>Author of novels and essays examining the intersection of Balkan and Mediterranean cultures. His works have been translated into multiple languages.</p>
                    </div>
                    
                    <div class="bio-section">
                        <h3>At MutaFest</h3>
                        <p>Samir will participate in cultural dialogue panels and reading sessions, discussing Mediterranean identity in contemporary literature.</p>
                    </div>
                @else
                    <div class="bio-section">
                        <h3>Works</h3>
                        <p>Photographic exhibitions documenting Mediterranean life and cultures. His portraits capture the diversity and unity of Mediterranean peoples.</p>
                    </div>
                    
                    <div class="bio-section">
                        <h3>At MutaFest</h3>
                        <p>Ivo will open his Mediterranean portrait exhibition on Day 3 and lead discussions on visual documentation of cultural exchanges.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('components.footer')

    @include('components.shared-scripts')
</body>
</html>