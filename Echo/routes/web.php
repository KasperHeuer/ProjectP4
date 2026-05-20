<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;






Route::middleware('auth')->group(function () {

    Route::get("/", function () {
        return view('Home');
    });

    Route::get('/chat', function () {
        return view('Chat');
    });

    Route::get('/logout', [UserController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::post('/register', [UserController::class, 'save']);


    Route::get('/login', [UserController::class, 'login']);
    Route::post('/login', [UserController::class, 'authenticate']);
});
