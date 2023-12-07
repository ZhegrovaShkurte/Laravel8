<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\ReactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardPostController;
use App\Http\Controllers\ChangeLanguageController;


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

Route::get('change/{lang}', [ChangeLanguageController::class, 'changeLanguage'])->name('change.language');

Route::middleware('localizationmiddleware')->group(function () {

  Route::middleware(['guest'])->group(function () {
    
    Route::get('register', [RegisterController::class, 'index']);

    Route::post('register', [RegisterController::class, 'registerUser'])->name('register');

    Route::get('login', [LoginController::class, 'index']);

    Route::post('login', [LoginController::class, 'attemptLogin'])->name('login');
  });

  Route::middleware(['auth'])->group(function () {

    Route::any('reaction', [ReactionController::class, 'store'])->name('reaction.store');

    Route::match(['get', 'post'], 'logout', [LogoutController::class, 'userLogout'])->name('logout');

    Route::middleware('adminmiddleware')->group(function () {

      Route::get('dashboard/post', [DashboardPostController::class, 'index'])->name('dashboard.posts');

      Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

      Route::get('export/excel', [UserController::class, 'exportExcel'])->name('export.excel');

      Route::get('users/create', [UserController::class, 'create'])->name('create');

      Route::post('users/store', [UserController::class, 'store'])->name('store');

      Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');

      Route::put('update/user/{user}', [UserController::class, 'update'])->name('users.update');

      Route::get('update/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

      Route::get('users/datatable', [UserController::class, 'index'])->name('users.datatable');

    });
  });

  Route::middleware(['usermiddleware'])->group(function () {

   Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('edit', [ProfileController::class, 'edit'])->name('edit');

    Route::put('update/profile', [ProfileController::class, 'update'])->name('update.profile');

    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

    Route::post('posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

  });

});




