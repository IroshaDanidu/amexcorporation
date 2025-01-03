<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});


//program
Route::get('/programs', function () {
    return view('programs');
})->name('programs.index');


Route::get('program-details/{id}', [\App\Http\Controllers\ProgramController::class, 'show'])->name('program.details');

//about us
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');
