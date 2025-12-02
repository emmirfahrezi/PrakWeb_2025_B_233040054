<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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