<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('welcome');
});

*/



Route::get('/', [LoginController::class, 'index']);

Route:: get('register', [RegisterController::class, 'create']);

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'dashboard'])->name('home')->middleware('loggedmiddleware');

Route::middleware($loginmiddleware)->group(function () {
    Route::get('/edit', function () {
        return 'Edit';
    });
    Route::put('profile/update', function () {
        return 'Profile/update';
    });

});