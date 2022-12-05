<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

// Route Beranda
Route::get('/', [BerandaController::class, 'utama']);

// Route Middleware Owner
Route::middleware(['auth', 'Owner'])->group(function () {
    // Route Data Pengguna
    Route::resource('user', UserController::class);
    Route::get('user/{user}', [UserController::class, 'destroy']);
});

// Route Middleware login
Route::middleware(['auth'])->group(function () {
    // Route Data Kategori
    Route::resource('category', CategoryController::class);
    Route::get('category/{category}', [CategoryController::class, 'destroy']);
    
    // Route Data Menu
    Route::resource('menu', MenuController::class);
    Route::get('menu/{menu}', [MenuController::class, 'destroy']);

    // Route Dashboard Admin
    Route::get('dashboard', [DashboardController::class, 'utama']);
    Route::post('hasil', [DashboardController::class, 'hasil']);
    
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
