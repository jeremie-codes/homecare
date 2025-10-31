<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'index'])->name('home');

Route::get('/teams', function () {
    return view('team');
})->name('teams');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

