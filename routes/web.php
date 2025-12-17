<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/login', [MainController::class, 'loginForm']);
Route::post('/login', [MainController::class, 'login']);

Route::get('/register', [MainController::class, 'registerForm']);
Route::post('/register', [MainController::class, 'register']);

Route::get('/logout', [MainController::class, 'logout']);

Route::get('/', [MainController::class, 'home']);

Route::post('/submit', [MainController::class, 'submit']);
Route::get('/view', [MainController::class, 'viewData']);
