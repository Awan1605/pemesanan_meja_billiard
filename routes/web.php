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
Route::get('about2', [PageController::class, 'about2'])->name('about2');
Route::get('home', [PageController::class, 'home'])->name('home');
Route::get('login', [PageController::class, 'login'])->name('login');
Route::get('registration', [PageController::class, 'registration'])->name('registration');
