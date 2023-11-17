<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


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

Route::middleware(['auth'])->group(function () {

  Route::match(['get', 'post'], 'logout', [LogoutController::class, 'logout'])->name('logout');

  Route::middleware('adminmiddleware')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('users/create', [UserController::class, 'create'])->name('create');

    Route::post('users/store', [UserController::class, 'store'])->name('store');

    Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');

    Route::put('update/user/{user}', [UserController::class, 'update'])->name('users.update');

    Route::get('update/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    Route::get('dashboard/post',[DashboardPostController::class, 'index'])->name('dashboard.posts');

  });
  });

  Route::middleware(['usermiddleware'])->group(function () {

    Route::get('/', [HomeController::class, 'dashboard'])->name('home');

    Route::get('edit', [ProfileController::class, 'edit'])->name('edit');

    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');

    Route::put('update/profile', [ProfileController::class, 'update'])->name('update.profile');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::post('/like/{postId}', [PostController::class, 'like']);

    Route::post('/dislike/{postId}', [PostController::class, 'dislike']);
    
});
