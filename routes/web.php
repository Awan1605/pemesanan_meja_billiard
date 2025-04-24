<?php

use App\Http\Controllers\PageController;
use Illuminate\Routing\Router;
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
    return view('about');
});
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('lreservasi', [PageController::class, 'lreservasi'])->name('lreservasi');
Route::get('about2', [PageController::class, 'about2'])->name('about2');
Route::get('home', [PageController::class, 'home'])->name('home');
Route::get('login', [PageController::class, 'login'])->name('login');
Route::get('registration', [PageController::class, 'registration'])->name('registration');
Route::get('booking', [PageController::class, 'booking'])->name('booking');
Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');
Route::get('/admin/reservasi', function () {return view('admin.reservasi');})->name('admin.reservasi');
Route::get('/admin/pengguna', function () {return view('admin.pengguna');})->name('admin.pengguna');
Route::get('/admin/meja', function () {return view('admin.meja');})->name('admin.meja');
Route::get('/admin/pembayaran', function () {return view('admin.pembayaran');})->name('admin.pembayaran');
Route::get('/admin/makanan', function () {return view('admin.makanan');})->name('admin.makanan');   

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
