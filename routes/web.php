<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    RegisterController,
    PageController,
    AdminController,
    PenggunaController,
    BookingController,
    ReservasiController,
    MejaController
};
use App\Http\Controllers\Admin\MejaApiController;

// ==================== PUBLIC ==================== //
Route::get('/', [MejaController::class, 'publicView'])->name('home');
Route::get('/landing', [MejaController::class, 'publicView'])->name('Public.landing_page');
Route::get('Public/lending_page', [PageController::class, 'lending_page'])->name('Public/lending_page');
Route::get('Public/riwayat', [PageController::class, 'riwayat'])->name('Public/riwayat');
Route::get('Public/reservasi', [MejaController::class, 'reservasi'])->name('Public/reservasi');
Route::get('/lending-page', [MejaController::class, 'publicView'])->name('Public.lending');
Route::get('/lending', [MejaController::class, 'publicView']);
// Route::get('/booking/{meja}', [BookingController::class, 'create'])->name('Public.booking');


// Contact Form
Route::post('/contact', fn() => back()->with('success', 'Pesan Anda telah terkirim!'))->name('contact.submit');

// ==================== AUTH ==================== //
// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

// Register
Route::get('/register', [PenggunaController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [PenggunaController::class, 'register'])->name('register.submit');

// ==================== ADMIN ==================== //
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reservasi', [AdminController::class, 'reservasi'])->name('reservasi');
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Halaman Manajemen
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
    Route::get('/meja', [AdminController::class, 'meja'])->name('meja');
    Route::get('/pembayaran', [AdminController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/makanan', [AdminController::class, 'makanan'])->name('makanan');

    // CRUD Meja
    Route::resource('admin/meja', MejaController::class)->names([
        'index' => 'admin.meja',
        'store' => 'admin.meja.store',
        'update' => 'admin.meja.update',
    ]);

    Route::post('/meja', [MejaController::class, 'store'])->name('meja.store');
    Route::put('/meja/{meja}', [MejaController::class, 'update'])->name('meja.update');
    Route::delete('/meja/{id}', [MejaController::class, 'destroy'])->name('meja.destroy');
    Route::delete('/meja/{meja}', [MejaController::class, 'destroy'])->name('admin.meja.destroy');
    Route::get('/meja/{id}', [MejaController::class, 'show'])->name('meja.show');
    Route::get('/admin/meja', [MejaController::class, 'index'])->name('admin.meja');

    // CRUD Pengguna
    Route::get('/users', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::put('/pengguna/{user}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{user}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
});

// ==================== USER ==================== //
Route::middleware(['auth'])->group(function () {
    Route::resource('meja', MejaController::class)->except(['create', 'edit']);
});

// ==================== BOOKING ==================== //
Route::get('booking', function () {
    return view('Public.booking');
})->name('Public.booking')->middleware('auth');
Route::get('/booking/{id}', [BookingController::class, 'showBookingForm']);
// routes/web.php
// routes/web.php
Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('Booking/riwayat', [BookingController::class, 'riwayat'])->name('Booking.riwayat');
// ==================== END ==================== //

