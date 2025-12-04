<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', ['title' => 'home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'blog']);
});

// Resource routes for posts and categories (CRUD)


//route untuk memanggil method di PostController
Route::resource('posts', PostController::class);

//route untuk memanggil method di CategoryController
Route::resource('categories', CategoryController::class);

// Protect posts dan categories dengan auth middleware
// Route dari laraveltest-main
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route Model Binding dengan slug
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

// Route untuk register – middleware guest (hanya untuk yang belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest');

// Route untuk login – middleware guest (hanya untuk yang belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

// Route logout – hanya untuk yang sudah login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

