<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Siamo - MutaFest</title>
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
            padding: 20px 20px 120px;
        }


        .about-container {
            max-width: 800px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 60px;
            text-align: center;
            margin: 60px auto;
        }

        .about-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            letter-spacing: -1px;
        }

        .about-content {
            font-size: 1.25rem;
            line-height: 2;
            text-align: left;
        }

        .about-content p {
            margin-bottom: 25px;
        }

        .about-content p:last-child {
            margin-bottom: 0;
        }

        .back-link {
            display: inline-block;
            margin-top: 40px;
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

        @media (max-width: 768px) {

            .about-container {
                padding: 40px 30px;
            }

            .about-title {
                font-size: 2.9rem;
                margin-bottom: 30px;
            }

            .about-content {
                font-size: 1.4rem;
                line-height: 1.8;
            }

            .about-content p {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .about-container {
                padding: 30px 20px;
                border-radius: 15px;
            }

            .about-title {
                font-size: 2.4rem;
            }

            .about-content {
                font-size: 1.6rem;
            }
        }
    </style>
    @include('components.shared-styles')
</head>
<body>
    @include('components.navbar')

    <div class="about-container">
        <h1 class="about-title">{{ __('mutafest.about.title') }}</h1>
        
        <div class="about-content">
            <p>
                MutaFest è un festival culturale annuale che si svolge a Milano, dedicato alle culture, alle letterature e alle arti nate sulle sponde del Mar Mediterraneo.
            </p>
            
            <p>
                Nasce da un'esperienza decennale nel campo editoriale e culturale, fatta di traduzioni, pubblicazioni e incontri tra voci provenienti da Est e Ovest, da Sud e Nord, da piccole isole e grandi città: tutte affacciate sullo stesso mare, ma ognuna con il proprio colore.
            </p>
            
            <p>
                MutaFest guarda al Mediterraneo non solo come spazio geografico, ma come orizzonte culturale e spirituale: un archivio vivo di memorie, tragedie, suoni, domande, migrazioni e bellezza plurale che rifiuta ogni semplificazione.
            </p>
            
            <p>
                In un tempo in cui questo spazio viene ridotto a tragedia o trincea, attraversato dagli esiliati e chiuso dalle frontiere, dove le storie affondano prima ancora di essere raccontate, MutaFest nasce per restituirgli il suo significato originario: luogo d'incontro, di pluralità, di ascolto reciproco.
            </p>
        </div>
    </div>

    @include('components.footer')

    @include('components.shared-scripts')
</body>
</html>