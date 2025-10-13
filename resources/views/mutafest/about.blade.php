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
            line-height: 1.4;
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
            font-size: 1.6rem;
            line-height: 1.5;
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
            font-size: 1.8rem;
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
                font-size: 1.8rem;
                line-height: 1.4;
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

        /* Partners Section */
        .partners-section {
            margin-top: 80px;
            padding-top: 60px;
            border-top: 2px dashed rgba(255, 255, 255, 0.3);
        }

        .partners-title {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            letter-spacing: -0.5px;
        }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .partner-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 35px;
            transition: all 0.4s ease;
            border: 2px solid rgba(255, 255, 255, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .partner-card:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-8px);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .partner-logo-container {
            width: 100%;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            border-radius: 15px;
            padding: 20px;
        }

        .partner-logo {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .partner-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: white;
        }

        .partner-description {
            font-size: 1.4rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.85);
        }

        @media (max-width: 768px) {
            .partners-section {
                margin-top: 60px;
                padding-top: 40px;
            }

            .partners-title {
                font-size: 2.5rem;
                margin-bottom: 35px;
            }

            .partners-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .partner-card {
                padding: 25px;
            }

            .partner-logo-container {
                height: 100px;
                padding: 15px;
            }

            .partner-name {
                font-size: 1.6rem;
            }

            .partner-description {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 480px) {
            .partners-title {
                font-size: 2rem;
            }

            .partner-card {
                padding: 20px;
            }

            .partner-logo-container {
                height: 80px;
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
            <p style="font-size: 2.4rem; font-weight: 600; margin-bottom: 30px;">
                Prima edizione di Mutafest
            </p>

            <p style="font-size: 1.8 rem; font-weight: 600; margin-bottom: 30px;">
                “Antologia dell’acqua del Mediterraneo”
            </p>
            <p>
                Milano 2025
            </p>
            <p>
                Questa è la prima edizione di MutaFest, un festival letterario e culturale che celebra le lingue e le identità che attraversano le sponde del Mediterraneo.
            </p>

            <p>
                Un festival che non si limita a proporre eventi o incontri, ma che ambisce a creare uno spazio condiviso, temporaneo e vivo, dove storie, lingue, suoni, sapori e memorie si intrecciano come le correnti di questo antico mare.
            </p>

            <p>
                MutaFest è un’esperienza aperta e polifonica, dove la traduzione incontra la poesia, la letteratura dialoga con il cinema, la musica si fonde con le arti visive e culinarie, e la memoria si confronta con il corpo e l’esilio. È un invito a ripensare il “Mediterraneo” non come mera geografia o incrocio di civiltà, ma come orizzonte vivo, che si reinventa ogni volta che accade un incontro.

            </p>

            <p>
                Questa prima edizione si apre sotto il titolo “Antologia dell’acqua del Mediterraneo”, un titolo che è già una dichiarazione poetica e politica.

            </p>

            <p>
                Un’antologia, sì, perché desideriamo raccogliere voci diverse, timbri discordanti, esperienze irriducibili — non per fonderli, ma per metterli fianco a fianco e lasciare che si raccontino. Dell’acqua, perché l’acqua è l’elemento più libero e meno stabile: non ha colore, ma riflette tutti i colori; non ha forma, ma accoglie ogni forma.
            </p>

            <p>
                E l’acqua di questo mare, anche se sembra un’unica distesa, è diversa a ogni latitudine, su ogni riva, in ogni storia e controstoria.

            </p>
            <p>
                MutaFest si propone dunque come uno spazio liquido, poetico, plurilingue — un festival che, nei suoi tre giorni, speriamo diventi un’antologia vivente, che parli con la voce dell’acqua, attraverso l’acqua, e per tutto ciò che galleggia ancora, senza nome, senza porto.

            </p>
            <p>
                Il festival MutaFest è nato grazie a una rete di partner che condividono una stessa visione: quella del Mediterraneo come spazio culturale vivo, da riscoprire, ascoltare e trasformare.

            </p>
        </div>

        <!-- Partners Section -->
        <div class="partners-section">
            <h2 class="partners-title">Partner</h2>

            <div class="partners-grid">
                <!-- Almutawassit -->
                <div class="partner-card">
                    <div class="partner-logo-container">
                        <img src="{{ asset('images/partners/almutawassit.png') }}" alt="Almutawassit" class="partner-logo">
                    </div>
                    <h3 class="partner-name">Almutawassit</h3>
                    <p class="partner-description">
                        Questa prima edizione è organizzata da Almutawassit – Edizioni del Mediterraneo, che ha promosso il lancio del festival in occasione del decimo anniversario della sua fondazione a Milano, come nuova tappa di un percorso editoriale e culturale aperto alle lingue e alle geografie del Mediterraneo.
                    </p>
                </div>

                <!-- Parco -->
                <div class="partner-card">
                    <div class="partner-logo-container">
                        <img src="{{ asset('images/partners/parco.png') }}" alt="Parco Center" class="partner-logo">
                    </div>
                    <h3 class="partner-name">Parco</h3>
                    <p class="partner-description">
                        Parco center, centro per la ricerca e l'innovazione sociale con sede a Milano, che ospita parte delle attività del festival.
                    </p>
                </div>

                <!-- Emuse -->
                <div class="partner-card">
                    <div class="partner-logo-container">
                        <img src="{{ asset('images/partners/emuse.png') }}" alt="Emuse" class="partner-logo">
                    </div>
                    <h3 class="partner-name">Emuse</h3>
                    <p class="partner-description">
                        Emuse, casa editrice indipendente italiana impegnata nella diffusione della letteratura e delle arti visive. Dal 2022 si concentra in particolare sulla valorizzazione delle culture letterarie del Mediterraneo.
                    </p>
                </div>

                <!-- Ilà -->
                <div class="partner-card">
                    <div class="partner-logo-container">
                        <img src="{{ asset('images/partners/Ila.png') }}" alt="Ilà" class="partner-logo">
                    </div>
                    <h3 class="partner-name">Ilà</h3>
                    <p class="partner-description">
                        Ilà, ente dedicato alla diffusione e all'insegnamento della lingua araba come lingua viva e plurale, attraverso programmi formativi e certificazioni riconosciute in Italia.
                    </p>
                </div>

                <!-- Ilà -->
                <div class="partner-card">
                    <div class="partner-logo-container">
                        <img src="{{ asset('images/partners/unponteper.png') }}" alt="Ilà" class="partner-logo">
                    </div>
                    <h3 class="partner-name">Un Pontu per</h3>
                    <p class="partner-description">
                        Un Pontu per, Un Pontu per è un ponte tra sponde diverse del Mediterraneo, dove parole, memorie e culture migranti si incontrano e si raccontano.
                    </p>
                </div>
            </div>

            <img src="{{asset('images/partners/eu.png')}}" alt="Unione Europea" style="margin-top: 50px; max-width: 200px;">
        </div>
    </div>

    @include('components.footer')

    @include('components.shared-scripts')
</body>
</html>
