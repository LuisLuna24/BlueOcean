<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

