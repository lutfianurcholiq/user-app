<?php

use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('page-admin.dashboard.index');
});

// Login
Route::get('/login', function () {
    return view('authenticate.login-index');
});

// Register
Route::get('/register', [RegistrasiController::class, 'index']);