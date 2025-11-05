<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'index'])->name('home');

Route::get('/teams', [RouteController::class, 'team'])->name('teams');
Route::post('/contact', [RouteController::class, 'contact'])->name('contact');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

