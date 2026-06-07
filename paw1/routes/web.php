<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminPembayaranController;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware([
    'auth',
    'admin'
])->group(function () {

    Route::get(
        '/admin/dashboard',
        [DashboardController::class, 'admin']
    );

    Route::resource(
        'lapangan',
        LapanganController::class
    );

    Route::resource(
        'jadwal',
        JadwalController::class
    );

    Route::get(
        '/admin/pembayaran',
        [AdminPembayaranController::class, 'index']
    );
});

Route::middleware([
    'auth',
    'pelanggan'
])->group(function () {

    Route::get(
        '/pelanggan/dashboard',
        [DashboardController::class, 'pelanggan']
    );

    Route::get(
        '/booking',
        [BookingController::class, 'index']
    );

    Route::post(
        '/booking',
        [BookingController::class, 'store']
    );

    Route::get(
        '/riwayat-booking',
        [BookingController::class, 'riwayat']
    );
});
