<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LapanganController;
use App\Http\Controllers\Api\BookingController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource(
        'lapangan',
        LapanganController::class
    );

    Route::post(
        '/booking',
        [BookingController::class,'store']
    );

    Route::get(
        '/riwayat-booking',
        [BookingController::class,'riwayat']
    );

    Route::post(
        '/upload-pembayaran/{id}',
        [BookingController::class,'upload']
    );

});