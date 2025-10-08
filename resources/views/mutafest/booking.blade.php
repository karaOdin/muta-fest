<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('mutafest.nav.book_invitation') }} | {{ __('mutafest.meta.title') }}</title>
    <meta name="description" content="{{ __('mutafest.meta.description') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
            font-family: 'DiodrumArabic';
            src: url('https://alfont.com/wp-content/fonts/new-arabic-fonts//alfont_com_AlFont_com_DiodrumArabic-Regular-1.ttf') format('truetype');
            font-weight: bold;
        }
        @font-face {
            font-family: 'Bahij';
            src: url('https://alfont.com/wp-content/fonts/diwany-arabic-fonts//alfont_com_ArbFONTS-Bahij_TheSansArabic-Plain.ttf') format('truetype');
            font-weight: normal;
        }

        :root {
            --primary-blue: #2E86AB;
            --coral: #F18F01;
            --mint: #A4C3A2;
            --lavender: #6A4C93;
            --cream: #F9F7F4;
        }

        body {
            font-family: {{ app()->getLocale() === 'ar' ? "'Bahij', 'Inter'" : "'Inter'" }}, sans-serif;
            background: linear-gradient(135deg, var(--cream) 0%, #E8F4F8 50%, var(--cream) 100%);
            min-height: 100vh;
        }

        .title-font {
            font-family: {{ app()->getLocale() === 'ar' ? "'DiodrumArabic', 'Inter'" : "'Inter'" }}, sans-serif;
            font-weight: 700;
        }

        .booking-container {
            background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(46, 134, 171, 0.03));
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(46, 134, 171, 0.1);
            animation: fadeInUp 1s ease-out;
        }

        .form-group {
            position: relative;
            margin-bottom: 2rem;
        }

        .form-input {
            width: 100%;
            padding: 18px 20px;
            border: 2px solid rgba(46, 134, 171, 0.2);
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.8);
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            outline: none;
        }

        .form-input:focus {
            border-color: var(--primary-blue);
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(46, 134, 171, 0.15);
        }

        .form-label {
            position: absolute;
            top: 18px;
            {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 20px;
            color: #666;
            transition: all 0.3s ease;
            pointer-events: none;
            font-size: 16px;
        }

        .form-input:focus + .form-label,
        .form-input:not(:placeholder-shown) + .form-label {
            top: -10px;
            {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 15px;
            font-size: 12px;
            color: var(--primary-blue);
            background: white;
            padding: 0 8px;
            border-radius: 8px;
        }

        .submit-btn {
            background: linear-gradient(135deg, var(--primary-blue), var(--coral));
            color: white;
            padding: 18px 40px;
            border: none;
            border-radius: 15px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(46, 134, 171, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .back-btn {
            background: rgba(46, 134, 171, 0.1);
            color: var(--primary-blue);
            padding: 12px 24px;
            border: 2px solid rgba(46, 134, 171, 0.2);
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(46, 134, 171, 0.3);
        }

        .wave {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary-blue), var(--coral), var(--mint));
            opacity: 0.05;
            z-index: -1;
        }

        .wave::before,
        .wave::after {
            content: '';
            position: absolute;
            width: 300%;
            height: 300%;
            background: radial-gradient(circle, var(--lavender) 0%, transparent 70%);
            animation: wave 20s infinite linear;
        }

        .wave::after {
            animation-delay: -10s;
            animation-direction: reverse;
        }

        @keyframes wave {
            0% { transform: rotate(0deg) translate(-50%, -50%); }
            100% { transform: rotate(360deg) translate(-50%, -50%); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(46, 134, 171, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-blue), var(--coral));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin: 0 auto 1rem;
        }

        .success-message {
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 2rem;
            animation: fadeInUp 0.5s ease-out;
        }

        @media (max-width: 768px) {
            .booking-container {
                margin: 1.4rem;
                border-radius: 20px;
            }
            
            .form-input {
                padding: 16px 18px;
            }
            
            .submit-btn {
                padding: 16px 32px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="wave"></div>
    
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="booking-container w-full max-w-4xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <a href="{{ route('mutafest.home') }}" class="back-btn mb-6">
                    <i class="fas fa-arrow-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}"></i>
                    {{ __('mutafest.nav.home') }}
                </a>
                
                <!-- Logo -->
                <div class="mb-6">
                    <img src="https://impro.usercontent.one/appid/oneComWsb/domain/mutafest.com/media/mutafest.com/onewebmedia/logo.png?etag=null&sourceContentType=image%2Fpng&ignoreAspectRatio&resize=518%2B180" alt="MutaFest" class="mx-auto" style="height: 80px; width: auto;">
                </div>
                
                <h1 class="title-font text-4xl md:text-5xl text-gray-800 mb-4">
                    {{ __('mutafest.nav.book_invitation') }}
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    {{ __('mutafest.booking.subtitle') }}
                </p>
            </div>

            <!-- Features -->
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">{{ __('mutafest.booking.feature1_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('mutafest.booking.feature1_desc') }}</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">{{ __('mutafest.booking.feature2_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('mutafest.booking.feature2_desc') }}</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">{{ __('mutafest.booking.feature3_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('mutafest.booking.feature3_desc') }}</p>
                </div>
            </div>

            <!-- Success Message (initially hidden) -->
            <div id="successMessage" class="success-message" style="display: none;">
                <i class="fas fa-check-circle text-2xl mb-2"></i>
                <p class="text-lg font-semibold">{{ __('mutafest.booking.success_title') }}</p>
                <p>{{ __('mutafest.booking.success_message') }}</p>
            </div>

            <!-- Booking Form -->
            <form id="bookingForm" class="grid md:grid-cols-2 gap-6">
                @csrf
                
                <!-- Personal Information -->
                <div class="md:col-span-2">
                    <h2 class="title-font text-2xl text-gray-800 mb-6">{{ __('mutafest.booking.personal_info') }}</h2>
                </div>
                
                <div class="form-group">
                    <input type="text" id="firstName" name="first_name" class="form-input" placeholder=" " required>
                    <label for="firstName" class="form-label">{{ __('mutafest.booking.first_name') }}</label>
                </div>
                
                <div class="form-group">
                    <input type="text" id="lastName" name="last_name" class="form-input" placeholder=" " required>
                    <label for="lastName" class="form-label">{{ __('mutafest.booking.last_name') }}</label>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-input" placeholder=" " required>
                    <label for="email" class="form-label">{{ __('mutafest.booking.email') }}</label>
                </div>
                
                <div class="form-group">
                    <input type="tel" id="phone" name="phone" class="form-input" placeholder=" ">
                    <label for="phone" class="form-label">{{ __('mutafest.booking.phone') }}</label>
                </div>
                
                <!-- Event Preferences -->
                <div class="md:col-span-2 mt-6">
                    <h2 class="title-font text-2xl text-gray-800 mb-6">{{ __('mutafest.booking.preferences') }}</h2>
                </div>
                
                <div class="form-group md:col-span-2">
                    <select id="eventDay" name="event_day" class="form-input" required>
                        <option value="">{{ __('mutafest.booking.select_day') }}</option>
                        <option value="day1">{{ __('mutafest.program.day1.title') }}</option>
                        <option value="day2">{{ __('mutafest.program.day2.title') }}</option>
                        <option value="day3">{{ __('mutafest.program.day3.title') }}</option>
                        <option value="all">{{ __('mutafest.booking.all_days') }}</option>
                    </select>
                </div>
                
                <div class="form-group md:col-span-2">
                    <select id="interests" name="interests" class="form-input">
                        <option value="">{{ __('mutafest.booking.select_interest') }}</option>
                        <option value="literature">{{ __('mutafest.booking.literature') }}</option>
                        <option value="music">{{ __('mutafest.booking.music') }}</option>
                        <option value="photography">{{ __('mutafest.booking.photography') }}</option>
                        <option value="theater">{{ __('mutafest.booking.theater') }}</option>
                        <option value="cinema">{{ __('mutafest.booking.cinema') }}</option>
                        <option value="all">{{ __('mutafest.booking.all_interests') }}</option>
                    </select>
                </div>
                
                <!-- Additional Information -->
                <div class="form-group md:col-span-2">
                    <textarea id="notes" name="notes" rows="4" class="form-input resize-none" placeholder=" "></textarea>
                    <label for="notes" class="form-label">{{ __('mutafest.booking.notes') }}</label>
                </div>
                
                <!-- Submit Button -->
                <div class="md:col-span-2">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-calendar-plus {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                        {{ __('mutafest.booking.submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulate form submission
            const submitBtn = e.target.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>{{ __('mutafest.booking.processing') }}';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Hide form and show success message
                document.getElementById('bookingForm').style.display = 'none';
                document.getElementById('successMessage').style.display = 'block';
                
                // Scroll to success message
                document.getElementById('successMessage').scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 2000);
        });

        // Enhanced form interactions
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>
</html>