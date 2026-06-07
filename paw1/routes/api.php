<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LapanganController;
use App\Http\Controllers\Api\JadwalController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')
    ->group(function () {

        Route::post(
            '/logout',
            [AuthController::class, 'logout']
        );

        Route::apiResource(
            'lapangans',
            LapanganController::class
        );
        Route::apiResource(
            'jadwals',
            JadwalController::class
        );
    });
