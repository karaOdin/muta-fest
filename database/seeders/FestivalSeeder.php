<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Guest;
use App\Models\Hall;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FestivalSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate([
            'email' => 'admin@mutafest.com',
        ], [
            'name' => 'Festival Admin',
            'password' => Hash::make('password'),
        ]);

        // Create halls
        $halls = [
            ['name' => 'Teatro Principale', 'capacity' => 500, 'floor' => 1, 'description' => 'Main theater with excellent acoustics'],
            ['name' => 'Sala Workshop', 'capacity' => 50, 'floor' => 2, 'description' => 'Intimate space for workshops and discussions'],
            ['name' => 'Auditorium', 'capacity' => 200, 'floor' => 1, 'description' => 'Modern auditorium with multimedia capabilities'],
        ];

        foreach ($halls as $hall) {
            Hall::firstOrCreate(['name' => $hall['name']], $hall);
        }

        // Create festival days
        $days = [
            ['name' => 'Day One', 'date' => '2025-06-15', 'order' => 1],
            ['name' => 'Day Two', 'date' => '2025-06-16', 'order' => 2],
            ['name' => 'Day Three', 'date' => '2025-06-17', 'order' => 3],
        ];

        foreach ($days as $day) {
            Day::firstOrCreate(['name' => $day['name']], $day);
        }

        // Create guests
        $guests = [
            [
                'name' => 'Amina Bouayach',
                'role' => 'Writer & Human Rights Activist',
                'country' => 'Morocco',
                'bio' => 'Renowned author and human rights advocate focusing on Mediterranean cultures and social justice.',
                'order' => 1,
            ],
            [
                'name' => 'Marco Venturi',
                'role' => 'Musician & Composer',
                'country' => 'Italy',
                'bio' => 'Contemporary classical composer inspired by Mediterranean folk traditions.',
                'order' => 2,
            ],
            [
                'name' => 'Elena Rodriguez',
                'role' => 'Visual Artist',
                'country' => 'Spain',
                'bio' => 'Mixed media artist exploring themes of migration and cultural identity.',
                'order' => 3,
            ],
        ];

        foreach ($guests as $guest) {
            Guest::firstOrCreate(['name' => $guest['name']], $guest);
        }

        // Create sessions
        $sessions = [
            [
                'title' => 'Opening Ceremony',
                'description' => 'Welcome to MutaFest 2025 - Celebrating Mediterranean culture and arts',
                'day_id' => Day::where('name', 'Day One')->first()->id,
                'hall_id' => Hall::where('name', 'Teatro Principale')->first()->id,
                'start_time' => '18:00',
                'end_time' => '20:00',
                'order' => 1,
            ],
            [
                'title' => 'Mediterranean Stories Workshop',
                'description' => 'Interactive workshop on storytelling traditions across the Mediterranean',
                'day_id' => Day::where('name', 'Day Two')->first()->id,
                'hall_id' => Hall::where('name', 'Sala Workshop')->first()->id,
                'start_time' => '14:00',
                'end_time' => '16:00',
                'order' => 1,
            ],
            [
                'title' => 'Art & Identity Panel',
                'description' => 'Discussion on contemporary Mediterranean art and cultural identity',
                'day_id' => Day::where('name', 'Day Three')->first()->id,
                'hall_id' => Hall::where('name', 'Auditorium')->first()->id,
                'start_time' => '16:00',
                'end_time' => '18:00',
                'order' => 1,
            ],
        ];

        foreach ($sessions as $sessionData) {
            $session = Session::firstOrCreate([
                'title' => $sessionData['title'],
            ], $sessionData);

            // Attach guests to sessions with roles
            if ($session->title === 'Opening Ceremony') {
                $session->guests()->sync([
                    Guest::where('name', 'Amina Bouayach')->first()->id => ['role_in_session' => 'Keynote Speaker'],
                    Guest::where('name', 'Marco Venturi')->first()->id => ['role_in_session' => 'Musical Performance'],
                ]);
            } elseif ($session->title === 'Mediterranean Stories Workshop') {
                $session->guests()->sync([
                    Guest::where('name', 'Amina Bouayach')->first()->id => ['role_in_session' => 'Workshop Leader'],
                ]);
            } elseif ($session->title === 'Art & Identity Panel') {
                $session->guests()->sync([
                    Guest::where('name', 'Elena Rodriguez')->first()->id => ['role_in_session' => 'Panelist'],
                    Guest::where('name', 'Marco Venturi')->first()->id => ['role_in_session' => 'Moderator'],
                ]);
            }
        }
    }
}
