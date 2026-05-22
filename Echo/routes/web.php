<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', [ChatController::class, 'index']);
    Route::post('/', [ChatController::class, 'startChat'])->name('home');

    Route::get('/chat/{user_id}', [ChatController::class, 'chat'])->name('chat');
    Route::post('/chat/{user_id}', [ChatController::class, 'send'])->name('send');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'save'])->name('save');


    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate');
});
