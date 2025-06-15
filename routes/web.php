<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('Public.lending_page');
});
// Halaman setelah login untuk pengguna biasa
Route::get('/landing', function () {
    return view('Public.lending_page');
})->name('Public.landing_page');


// ==================== AUTENTIKASI ==================== //
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

// Register
Route::get('/register', [PenggunaController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [PenggunaController::class, 'register'])->name('register.submit');

// ==================== HALAMAN PUBLIK ==================== //
Route::get('Public/lending_page', [PageController::class, 'lending_page'])->name('Public/lending_page');
Route::get('Public/booking', [PageController::class, 'booking1'])->name('Public/booking');
Route::get('Public/riwayat', [PageController::class, 'riwayat'])->name('Public/riwayat');
Route::get('Public/reservasi', [PageController::class, 'reservasi'])->name('Public/reservasi');
Route::post('/contact', function () {
    return back()->with('success', 'Pesan Anda telah terkirim!');
})->name('contact.submit');
Route::get('register', [PenggunaController::class, 'showRegistrationForm']);


// API
Route::get('/api/riwayat-pemesanan', [BookingController::class, 'history'])->name('booking.history');

// ==================== ADMIN ==================== //
Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reservasi', [AdminController::class, 'reservasi'])->name('reservasi');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
    Route::get('/meja', [AdminController::class, 'meja'])->name('meja');
    Route::get('/pembayaran', [AdminController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/makanan', [AdminController::class, 'makanan'])->name('makanan');

    // CRUD Pengguna
    Route::get('/users', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::put('/pengguna/{user}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{user}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
});
