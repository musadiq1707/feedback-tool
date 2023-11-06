<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Auth::routes([
    'register' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('logout', [LoginController::class,'logout']);

Route::get('/feedback-form', [HomeController::class,'index']);
