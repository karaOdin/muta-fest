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
            ['name' => 'Teatro Principale', 'capacity' => 500, 'floor' => 1, 'description' => '<p><strong>Main theater</strong> with excellent acoustics and <em>professional lighting</em>.</p><ul><li>500-seat capacity</li><li>Professional sound system</li><li>Wheelchair accessible</li></ul>'],
            ['name' => 'Sala Workshop', 'capacity' => 50, 'floor' => 2, 'description' => '<p><strong>Intimate space</strong> perfect for workshops and discussions.</p><ul><li>Comfortable seating arrangement</li><li>Interactive whiteboard</li><li>Coffee corner</li></ul>'],
            ['name' => 'Auditorium', 'capacity' => 200, 'floor' => 1, 'description' => '<p><strong>Modern auditorium</strong> with state-of-the-art multimedia capabilities.</p><ul><li>HD projection system</li><li>Surround sound</li><li>Video conferencing ready</li></ul>'],
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
                'bio' => '<p><strong>Renowned author</strong> and human rights advocate focusing on <em>Mediterranean cultures</em> and social justice.</p><blockquote><p>"Art is the bridge that connects cultures across the Mediterranean."</p></blockquote><p>Key achievements:</p><ul><li>Published 5 award-winning novels</li><li>UNESCO Peace Ambassador</li><li>Founder of Mediterranean Writers Collective</li></ul>',
                'order' => 1,
            ],
            [
                'name' => 'Marco Venturi',
                'role' => 'Musician & Composer',
                'country' => 'Italy',
                'bio' => '<p><strong>Contemporary classical composer</strong> inspired by <em>Mediterranean folk traditions</em>.</p><p>Marco combines traditional instruments with modern orchestration, creating unique soundscapes that tell the stories of coastal communities.</p><ul><li>Grammy-nominated composer</li><li>Performed at La Scala</li><li>Cultural heritage advocate</li></ul>',
                'order' => 2,
            ],
            [
                'name' => 'Elena Rodriguez',
                'role' => 'Visual Artist',
                'country' => 'Spain',
                'bio' => '<p><strong>Mixed media artist</strong> exploring themes of <em>migration and cultural identity</em> through stunning visual narratives.</p><blockquote><p>"Every artwork tells the story of a journey across waters and borders."</p></blockquote><ul><li>Exhibited in 20+ countries</li><li>Venice Biennale participant</li><li>Migration rights advocate</li></ul>',
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
                'description' => '<p><strong>Welcome to MutaFest 2025</strong> - Celebrating <em>Mediterranean culture and arts</em></p><p>Join us for an unforgettable evening featuring:</p><ul><li>Keynote speeches by renowned cultural figures</li><li>Traditional Mediterranean musical performances</li><li>Cultural exchange presentations</li></ul><p>This ceremony marks the beginning of three days of cultural celebration and artistic expression.</p>',
                'day_id' => Day::where('name', 'Day One')->first()->id,
                'hall_id' => Hall::where('name', 'Teatro Principale')->first()->id,
                'start_time' => '18:00',
                'end_time' => '20:00',
                'order' => 1,
            ],
            [
                'title' => 'Mediterranean Stories Workshop',
                'description' => '<p><strong>Interactive workshop</strong> on <em>storytelling traditions</em> across the Mediterranean</p><p>Discover the rich narrative heritage of Mediterranean cultures through:</p><ul><li>Traditional storytelling techniques</li><li>Cultural mythology and folklore</li><li>Interactive group storytelling</li></ul><p>Perfect for writers, educators, and culture enthusiasts.</p>',
                'day_id' => Day::where('name', 'Day Two')->first()->id,
                'hall_id' => Hall::where('name', 'Sala Workshop')->first()->id,
                'start_time' => '14:00',
                'end_time' => '16:00',
                'order' => 1,
            ],
            [
                'title' => 'Art & Identity Panel',
                'description' => '<p><strong>Panel discussion</strong> on contemporary <em>Mediterranean art and cultural identity</em></p><p>Leading artists and cultural experts will discuss:</p><ul><li>Art as a vehicle for cultural expression</li><li>Migration and identity in contemporary art</li><li>Preserving heritage through modern mediums</li></ul><p>Q&A session with audience participation included.</p>',
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
