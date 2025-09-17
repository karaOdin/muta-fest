<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MutaFestController extends Controller
{
    public function index()
    {
        $guests = [
            [
                'name' => __('mutafest.guests.amina_bouayach.name'),
                'country' => __('mutafest.guests.amina_bouayach.country'),
                'role' => __('mutafest.guests.amina_bouayach.role'),
                'bio' => __('mutafest.guests.amina_bouayach.bio'),
                'icon' => 'fas fa-user',
            ],
            [
                'name' => __('mutafest.guests.marco_bellardi.name'),
                'country' => __('mutafest.guests.marco_bellardi.country'),
                'role' => __('mutafest.guests.marco_bellardi.role'),
                'bio' => __('mutafest.guests.marco_bellardi.bio'),
                'icon' => 'fas fa-user',
            ],
            [
                'name' => __('mutafest.guests.leila_othmani.name'),
                'country' => __('mutafest.guests.leila_othmani.country'),
                'role' => __('mutafest.guests.leila_othmani.role'),
                'bio' => __('mutafest.guests.leila_othmani.bio'),
                'icon' => 'fas fa-user',
            ],
            [
                'name' => __('mutafest.guests.carlos_mendez.name'),
                'country' => __('mutafest.guests.carlos_mendez.country'),
                'role' => __('mutafest.guests.carlos_mendez.role'),
                'bio' => __('mutafest.guests.carlos_mendez.bio'),
                'icon' => 'fas fa-user',
            ],
            [
                'name' => __('mutafest.guests.samir_kasemi.name'),
                'country' => __('mutafest.guests.samir_kasemi.country'),
                'role' => __('mutafest.guests.samir_kasemi.role'),
                'bio' => __('mutafest.guests.samir_kasemi.bio'),
                'icon' => 'fas fa-user',
            ],
            [
                'name' => __('mutafest.guests.ivo_saglietti.name'),
                'country' => __('mutafest.guests.ivo_saglietti.country'),
                'role' => __('mutafest.guests.ivo_saglietti.role'),
                'bio' => __('mutafest.guests.ivo_saglietti.bio'),
                'icon' => 'fas fa-user',
            ],
        ];

        $program = [
            'day1' => [
                'title' => __('mutafest.program.day1.title'),
                'sessions' => [
                    [
                        'time' => '18:00 - 19:00',
                        'title' => __('mutafest.program.day1.session1.title'),
                        'participants' => __('mutafest.program.day1.session1.participants'),
                    ],
                    [
                        'time' => '19:30 - 21:00',
                        'title' => __('mutafest.program.day1.session2.title'),
                        'participants' => __('mutafest.program.day1.session2.participants'),
                    ],
                    [
                        'time' => '21:30 - 23:00',
                        'title' => __('mutafest.program.day1.session3.title'),
                        'participants' => __('mutafest.program.day1.session3.participants'),
                    ],
                ],
            ],
            'day2' => [
                'title' => __('mutafest.program.day2.title'),
                'sessions' => [
                    [
                        'time' => '10:00 - 11:30',
                        'title' => __('mutafest.program.day2.session1.title'),
                        'participants' => __('mutafest.program.day2.session1.participants'),
                    ],
                    [
                        'time' => '12:00 - 13:30',
                        'title' => __('mutafest.program.day2.session2.title'),
                        'participants' => __('mutafest.program.day2.session2.participants'),
                    ],
                    [
                        'time' => '16:00 - 17:30',
                        'title' => __('mutafest.program.day2.session3.title'),
                        'participants' => __('mutafest.program.day2.session3.participants'),
                    ],
                    [
                        'time' => '20:00 - 22:00',
                        'title' => __('mutafest.program.day2.session4.title'),
                        'participants' => __('mutafest.program.day2.session4.participants'),
                    ],
                ],
            ],
            'day3' => [
                'title' => __('mutafest.program.day3.title'),
                'sessions' => [
                    [
                        'time' => '11:00 - 12:30',
                        'title' => __('mutafest.program.day3.session1.title'),
                        'participants' => __('mutafest.program.day3.session1.participants'),
                    ],
                    [
                        'time' => '14:00 - 15:30',
                        'title' => __('mutafest.program.day3.session2.title'),
                        'participants' => __('mutafest.program.day3.session2.participants'),
                    ],
                    [
                        'time' => '18:00 - 20:00',
                        'title' => __('mutafest.program.day3.session3.title'),
                        'participants' => __('mutafest.program.day3.session3.participants'),
                    ],
                    [
                        'time' => '20:30 - 23:00',
                        'title' => __('mutafest.program.day3.session4.title'),
                        'participants' => __('mutafest.program.day3.session4.participants'),
                    ],
                ],
            ],
        ];

        return view('mutafest.index', compact('guests', 'program'));
    }

    public function booking()
    {
        return view('mutafest.booking');
    }

    public function changeLanguage(Request $request, string $locale)
    {
        $availableLocales = ['en', 'it', 'ar'];

        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }

    public function downloadProgram()
    {
        // Generate or serve PDF file
        return response()->json([
            'message' => __('mutafest.messages.program_download'),
            'filename' => 'mutafest-program-2025.pdf',
        ]);
    }

    public function downloadPressKit()
    {
        return response()->json([
            'message' => __('mutafest.messages.press_kit_download'),
            'filename' => 'mutafest-press-kit-2025.zip',
        ]);
    }

    public function downloadImages()
    {
        return response()->json([
            'message' => __('mutafest.messages.images_download'),
            'filename' => 'mutafest-images-2025.zip',
        ]);
    }

    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // Save to database or send to email service
        logger('Newsletter subscription: '.$request->email);

        return response()->json([
            'success' => true,
            'message' => __('mutafest.messages.newsletter_success'),
        ]);
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Save to database or send email
        logger('Contact form submission: ', $request->only(['name', 'email', 'subject', 'message']));

        return response()->json([
            'success' => true,
            'message' => __('mutafest.messages.contact_success'),
        ]);
    }

    public function submitPressAccreditation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'organization' => 'required|string|max:255',
        ]);

        // Save to database
        logger('Press accreditation request: ', $request->only(['name', 'email', 'organization']));

        return response()->json([
            'success' => true,
            'message' => __('mutafest.messages.accreditation_success'),
        ]);
    }

    public function main()
    {
        return view('mutafest.main');
    }

    public function about()
    {
        return view('mutafest.about');
    }

    public function home2()
    {
        return view('mutafest.index2');
    }
}
