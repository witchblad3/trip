<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cars/available', [CarController::class, 'getAvailableCars']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


