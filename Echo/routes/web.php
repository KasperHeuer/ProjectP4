<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view('Home');
});

Route::get("/register", function () {
    return view('Register');
});

Route::get("/login", function () {
    return view('Login');
});

Route::get('/chat', function () {
    return view('Chat');
});