<?php

use App\Http\Controllers\MutaFestController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

// MutaFest Routes
Route::get('/', [MutaFestController::class, 'index'])->name('mutafest.index');
Route::get('/home2', [MutaFestController::class, 'home2'])->name('mutafest.home');
Route::get('/main', [MutaFestController::class, 'main'])->name('mutafest.main');
Route::get('/about', [MutaFestController::class, 'about'])->name('mutafest.about');
Route::get('/booking', [MutaFestController::class, 'booking'])->name('mutafest.booking');
Route::get('/language/{locale}', [MutaFestController::class, 'changeLanguage'])->name('mutafest.language');

// Program Routes
Route::get('/program', [MutaFestController::class, 'program'])->name('mutafest.program');
Route::get('/program/day/{day}', [MutaFestController::class, 'programDay'])->name('mutafest.program.day');

// Session Routes
Route::get('/session/{session}', [MutaFestController::class, 'sessionDetail'])->name('mutafest.session.detail');

// Guest Routes
Route::get('/guests', [GuestController::class, 'index'])->name('mutafest.guests');
Route::get('/guest/{guest}', [GuestController::class, 'show'])->name('mutafest.guest.details');

// Download Routes
Route::get('/mutafest/download/program', [MutaFestController::class, 'downloadProgram'])->name('mutafest.download.program');
Route::get('/mutafest/download/press-kit', [MutaFestController::class, 'downloadPressKit'])->name('mutafest.download.press-kit');
Route::get('/mutafest/download/images', [MutaFestController::class, 'downloadImages'])->name('mutafest.download.images');

// AJAX Routes
Route::post('/mutafest/newsletter/subscribe', [MutaFestController::class, 'subscribeNewsletter'])->name('mutafest.newsletter.subscribe');
Route::post('/mutafest/contact/submit', [MutaFestController::class, 'submitContact'])->name('mutafest.contact.submit');
Route::post('/mutafest/press/accreditation', [MutaFestController::class, 'submitPressAccreditation'])->name('mutafest.press.accreditation');
