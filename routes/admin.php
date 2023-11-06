<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', [DashboardController::class,'index']);
Route::get('/account', [AccountController::class,'index']);
Route::post('/account', [AccountController::class,'update']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/{type?}', [UserController::class,'index'])->where('type','active|inactive');
    Route::post('/list', [UserController::class,'listProcess']);
    Route::get('/add', [UserController::class,'add']);
    Route::post('/store', [UserController::class,'store']);
    Route::get('/edit/{user}', [UserController::class,'edit']);
    Route::patch('/update/{user}',[UserController::class,'update']);
    Route::delete('/delete/{user}', [UserController::class,'delete']);
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/{type?}', [CategoryController::class,'index'])->where('type','active|inactive');
    Route::post('/list', [CategoryController::class,'listProcess']);
    Route::get('/add', [CategoryController::class,'add']);
    Route::post('/store', [CategoryController::class,'store']);
    Route::get('/edit/{category}', [CategoryController::class,'edit']);
    Route::patch('/update/{category}',[CategoryController::class,'update']);
    Route::delete('/delete/{category}', [CategoryController::class,'delete']);
});


