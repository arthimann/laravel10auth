<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', \App\Http\Controllers\Auth\LoginController::class);
    Route::post('/register', \App\Http\Controllers\Auth\RegisterController::class);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/logout', \App\Http\Controllers\Auth\LogoutController::class);
        Route::get('/me', \App\Http\Controllers\Auth\MeController::class);
    });
});

