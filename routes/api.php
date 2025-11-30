<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\JemaatApiController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'API OK';
});

// Register & Login (tanpa auth)
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

// Protected routes (harus pakai token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthApiController::class, 'profile']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::apiResource('/jemaat', JemaatApiController::class);
    Route::apiResource('/keuangan', KeuanganApiController::class);
});
