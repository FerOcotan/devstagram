<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class, 'index']) -> name('register'); 
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/autenticar', [RegisterController::class, 'autenticar']);


Route::get('/login', [LoginController::class, 'index']) -> name('login');
Route::post('/login', [LoginController::class, 'store']) -> name('login');
Route::post('/logout', [logoutcontroller::class, 'store']) -> name('logout');

//route model 
Route::get('/{user:username}', [PostController::class, 'index']) -> name('post.index');
Route::get('/posts/create', [PostController::class, 'create']) -> name('post.create');
Route::post('/posts', [PostController::class, 'store']) -> name('post.store');

Route::post('/imagenes', [ImagenController::class, 'store']) -> name('imagenes.store');