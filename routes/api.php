<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\RapportController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TaskController;

// ---------------- AUTH ----------------
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});


// ---------------- SERVICES ----------------
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);

// -------- Agents --------
Route::prefix('agents')->group(function () {
    Route::get('/service/{service_id}', [AgentController::class, 'getByService']);
    Route::get('/{id}', [AgentController::class, 'show']);
    Route::get('/recommended/{id}', [TaskController::class, 'getAgentRecommendedByClient']);
});

// =================== ROUTES PROTÉGÉES ===================
Route::middleware('auth:sanctum')->group(function () {

    // -------- Logout --------
    Route::post('/auth/logout', [AuthController::class, 'logout']);


    // -------- Compte utilisateur --------
    Route::prefix('account')->group(function () {
        Route::post('/update', [AccountController::class, 'updateAccount']);
        Route::post('/newpassword', [AccountController::class, 'updatePassword']);
        Route::delete('/delete', [AccountController::class, 'deleteAccount']);
    });

    // -------- Réservations --------
    Route::prefix('reservations')->group(function () {
        Route::post('/', [ReservationController::class, 'store']);
        Route::get('/{client_id}/client', [ReservationController::class, 'getByClient']);
        Route::get('/{id}', [ReservationController::class, 'show']);
        Route::post('cancel/{id}', [ReservationController::class, 'cancel']);
        Route::post('delete/{id}', [ReservationController::class, 'delete']);
    });


    // -------- Messages / Chat --------
    Route::prefix('messages')->group(function () {
        Route::get('/{user_id}', [MessageController::class, 'getByUser']);
        Route::post('/send/{sender_id}', [MessageController::class, 'send']);
        Route::get('/conversation/{sender_id}/{receiver_id}', [MessageController::class, 'getConversation']);
    });


    // -------- Tâches (Agent) --------
    Route::prefix('taches')->group(function () {
        Route::post('/agent/{clientId}', [TaskController::class, 'addTask']);
        Route::delete('/agent/{taskId}', [TaskController::class, 'deleteTask']);
        Route::get('/{agentId}/agent/{clientId}', [TaskController::class, 'getTaskByAgentId']);
        Route::get('/toggle/{id}', [TaskController::class, 'toggleDone']);
    });

    Route::post('/rating/{agentId}', [TaskController::class, 'ratingAgent']);


    // -------- Rapports (Aide / Plainte) --------
    Route::prefix('rapports')->group(function () {
        Route::post('/', [RapportController::class, 'store']);
        Route::get('/', [RapportController::class, 'index']);
        Route::get('/user/{user_id}', [RapportController::class, 'getByUser']);
    });
});
