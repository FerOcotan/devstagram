<?php

use App\Http\Controllers\LoginController;
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


Route::get('/muro', [PostController::class, 'index']) -> name('post.index');
