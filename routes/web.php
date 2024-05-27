<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('wiki/{slug}', 'wiki/show')
    ->name('wiki');

Route::view('wiki/{slug}/history', 'wiki/history')
    ->name('wiki.history');

Route::get('wiki/{slug}/data', function ($slug) {
    return Article::where('slug', $slug)->first()->content;
})->name('wiki.data');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')
        ->name('profile');

    Route::view('/profile', 'profile')
        ->name('profile');

    Route::view('wiki/{slug}/edit', 'wiki/edit')
        ->name('wiki.edit');
});

require __DIR__.'/auth.php';
