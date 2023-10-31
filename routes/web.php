<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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


Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('logout', [LogoutController::class, 'logout']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('adminmiddleware');


Route::middleware('loginmiddleware')->group(function () { 
    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
    Route::get('edit', [ProfileController::class, 'create'])->name('edit');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('update');
  //  Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});


Route::middleware('checkloginmiddleware')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/login', [LoginController::class, 'login']);
});

//  Route::group(['prefix' => 'users'], function() {