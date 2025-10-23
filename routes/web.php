<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/teams', function () {
    return view('team');
})->name('teams');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::middleware(['guest'])->group(function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::get('register', function () {
        return view('auth.register');
    })->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('user/config', [UserController::class,'index'])->name('user.config');

    // Admin Routes
    Route::get('admin/dashboard', [AdminController::class,'index'])->name('dashboard.admin');
    Route::get('client/dashboard', [ClientController::class,'index'])->name('dashboard.client');
    Route::get('candidate/dashboard', [CandidateController::class,'index'])->name('dashboard.candidate');

});

Route::get('/test-mail', function () {
    $data = ['title' => 'Bienvenue', 'content' => 'Ceci est un test'];
    Mail::to('jrmmianda@gmail.com')->send(new NewsletterMail($data));
    return "Mail envoyé avec succès !";
});


