<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of all guests.
     */
    public function index()
    {
        $guests = Guest::with('sessions.day', 'sessions.hall')
            ->withCount('sessions')
            ->orderBy('order')
            ->get();

        return view('mutafest.guests', compact('guests'));
    }

    /**
     * Display the specified guest.
     */
    public function show(Guest $guest)
    {
        $guest->load(['sessions' => function ($query) {
            $query->with(['day', 'hall'])->orderBy('day_id');
        }]);

        return view('mutafest.guest-details', compact('guest'));
    }
}
