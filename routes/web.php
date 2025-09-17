<?php

use App\Http\Controllers\MutaFestController;
use Illuminate\Support\Facades\Route;

// MutaFest Routes
Route::get('/', [MutaFestController::class, 'index'])->name('mutafest.home');
Route::get('/home2', [MutaFestController::class, 'home2'])->name('mutafest.home2');
Route::get('/main', [MutaFestController::class, 'main'])->name('mutafest.about');
Route::get('about', [MutaFestController::class, 'about'])->name('mutafest.about');
Route::get('/booking', [MutaFestController::class, 'booking'])->name('mutafest.booking');
Route::get('/language/{locale}', [MutaFestController::class, 'changeLanguage'])->name('mutafest.language');

// Download Routes
Route::get('/mutafest/download/program', [MutaFestController::class, 'downloadProgram'])->name('mutafest.download.program');
Route::get('/mutafest/download/press-kit', [MutaFestController::class, 'downloadPressKit'])->name('mutafest.download.press-kit');
Route::get('/mutafest/download/images', [MutaFestController::class, 'downloadImages'])->name('mutafest.download.images');

// AJAX Routes
Route::post('/mutafest/newsletter/subscribe', [MutaFestController::class, 'subscribeNewsletter'])->name('mutafest.newsletter.subscribe');
Route::post('/mutafest/contact/submit', [MutaFestController::class, 'submitContact'])->name('mutafest.contact.submit');
Route::post('/mutafest/press/accreditation', [MutaFestController::class, 'submitPressAccreditation'])->name('mutafest.press.accreditation');
