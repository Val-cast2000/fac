<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FactoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');

// Protected routes for admin functions
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('factories', FactoryController::class);
    Route::apiResource('employees', EmployeeController::class);

    // Optional: Endpoint to test user info
    Route::get('/user', function () {
        return auth()->user();
    });
});
