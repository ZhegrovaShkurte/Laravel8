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

Route::middleware(['guest'])->group(function () {
  Route::get('register', [RegisterController::class, 'create']);

  Route::post('register', [RegisterController::class, 'register'])->name('register');

  Route::get('/login', [LoginController::class, 'index']);

  Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware(['usermiddleware'])->group(function () {

  Route::get('/', [HomeController::class, 'dashboard'])->name('home');

  Route::get('edit', [ProfileController::class, 'edit'])->name('edit');

  Route::get('/home', [HomeController::class, 'dashboard'])->name('home');

  Route::match(['get', 'post'], 'logout', [LogoutController::class, 'logout'])->name('logout');

  Route::put('profile/update', [ProfileController::class, 'update'])->name('update');

  Route::middleware('adminmiddleware')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
  });

});



