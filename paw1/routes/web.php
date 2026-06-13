<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'login');

Route::view('/login', 'login');
Route::view('/register', 'register');

Route::view('/dashboard', 'dashboard');
Route::view('/lapangan', 'lapangan');
