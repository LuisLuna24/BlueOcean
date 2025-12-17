<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['set.lang:es'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/reviews', function () {
        return view('reviews');
    })->name('reviews');

    Route::get('/services', function () {
        return view('services');
    })->name('services');

    Route::get('/team', function () {
        return view('team');
    })->name('team');

    Route::get('/values', function () {
        return view('values');
    })->name('values');

    Route::get('/tips', function () {
        return view('tips');
    })->name('tips');

    Route::get('/policy', function () {
        return view('policy');
    })->name('policy');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});


Route::prefix('en')->middleware(['set.lang:en'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('en.home');

    Route::get('/reviews', function () {
        return view('reviews');
    })->name('en.reviews');

    Route::get('/services', function () {
        return view('services');
    })->name('en.services');

    Route::get('/team', function () {
        return view('team');
    })->name('en.team');

    Route::get('/values', function () {
        return view('values');
    })->name('en.values');

    Route::get('/tips', function () {
        return view('tips');
    })->name('en.tips');

    Route::get('/policy', function () {
        return view('policy');
    })->name('en.policy');

    Route::get('/contact', function () {
        return view('contact');
    })->name('en.contact');
});
