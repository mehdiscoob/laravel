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

Route::post('/refresh-token', 'AuthController@refreshToken')->name('refresh.token');

Route::middleware('auth:api')->prefix('user')->group(function () {
    Route::get("{id}",[\App\Http\Controllers\UserController::class,"findById"]);
});
Route::get("user/randomly",[\App\Http\Controllers\UserController::class,"findByRandomly"]);

Route::prefix('user')->group(function () {
Route::post("/",[\App\Http\Controllers\UserController::class,"register"]);
Route::post("verify/{id}",[\App\Http\Controllers\UserController::class,'verifyAccount'])->middleware('auth:api');
});

Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class,"login"])->name('login');

Route::post('/register', \App\Http\Controllers\Auth\RegisterAction::class)->name('register');

