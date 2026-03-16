<?php

use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    $featuredTours = \App\Models\Tour::where('status', 'published')
        ->where('is_featured', true)
        ->take(6)
        ->get();
    return view('welcome', compact('featuredTours'));
});

// Tours routes
Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tours.show');

// Dashboard (authenticated users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';