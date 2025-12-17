<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'set.lang:es',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/review', function () {
        return view('Modules.reviews.index');
    })->name('reviews.index');
});

Route::prefix('en')
    ->as('en.')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'set.lang:en',
    ])->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/review', function () {
            return view('Modules.reviews.index');
        })->name('reviews.index');
    });
