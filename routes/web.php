<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('about');
});
// Auth Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Halaman publik
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('reservasi', [PageController::class, 'reservasi'])->name('reservasi');
Route::get('about2', [PageController::class, 'about2'])->name('about2');
Route::get('home', [PageController::class, 'home'])->name('home');
Route::get('booking', [PageController::class, 'booking'])->name('booking');

// Admin Pages with Controller
Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    // Semua route yang hanya boleh diakses oleh admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reservasi', [AdminController::class, 'reservasi'])->name('reservasi');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
    Route::get('/meja', [AdminController::class, 'meja'])->name('meja');
    Route::get('/pembayaran', [AdminController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/makanan', [AdminController::class, 'makanan'])->name('makanan');

 // Manajemen Pengguna dengan Controller
 Route::get('/users', [PenggunaController::class, 'index'])->name('users.index');
 Route::get('/users/create', [PenggunaController::class, 'create'])->name('users.create');
 Route::post('/users', [PenggunaController::class, 'store'])->name('users.store');
 Route::get('/users/{user}/edit', [PenggunaController::class, 'edit'])->name('users.edit');
 Route::put('/users/{user}', [PenggunaController::class, 'update'])->name('users.update');
 Route::delete('/users/{user}', [PenggunaController::class, 'destroy'])->name('users.destroy');
});
