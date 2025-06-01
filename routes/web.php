<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookingController;
use PharIo\Manifest\Author;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('Public.lending_page');
});
// Auth Routes
// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Logout (jika belum ada)
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::post('/logout', [AuthController::class, 'destroy'])
    ->name('logout');

Route::post('/contact', function () {
    // Process contact form submission
    return back()->with('success', 'Pesan Anda telah terkirim!');
})->name('contact.submit');

// Halaman publik
Route::get('Public/lending_page', [PageController::class, 'lending_page'])->name('Public/lending_page');
Route::get('Public/booking', [PageController::class, 'booking1'])->name('Public/booking');
Route::get('Public/lending_page', [PageController::class, 'lending_page'])->name('Public/lending_page');
// Route untuk halaman riwayat (Blade)
Route::get('Public/riwayat', [PageController::class, 'riwayat'])->name('Public/riwayat');
Route::get('Public/reservasi', [PageController::class, 'reservasi'])->name('Public/reservasi');

// Route untuk data JSON riwayat pemesanan (dipanggil via fetch di JS)
Route::get('/api/riwayat-pemesanan', [BookingController::class, 'history'])->name('booking.history');



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
