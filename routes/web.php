<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('about');
});

// Halaman publik
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('reservasi', [PageController::class, 'reservasi'])->name('reservasi');
Route::get('about2', [PageController::class, 'about2'])->name('about2');
Route::get('home', [PageController::class, 'home'])->name('home');
Route::get('login', [PageController::class, 'login'])->name('login');
Route::get('registration', [PageController::class, 'registration'])->name('registration');
Route::get('booking', [PageController::class, 'booking'])->name('booking');

// Admin Pages
Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/reservasi', 'admin.reservasi')->name('admin.reservasi');
    Route::view('/pengguna', 'admin.pengguna')->name('admin.pengguna');
    Route::view('/meja', 'admin.meja')->name('admin.meja');
    Route::view('/pembayaran', 'admin.pembayaran')->name('admin.pembayaran');
    Route::view('/makanan', 'admin.makanan')->name('admin.makanan');
});

// Manajemen Pengguna
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
