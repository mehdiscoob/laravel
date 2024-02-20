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

Route::post('/refresh-token', [\App\Http\Controllers\Auth\AuthController::class,"refreshToken"])->name('refresh.token');

Route::middleware('auth:api')->prefix('user')->group(function () {
    Route::get("profile/{id}",[\App\Http\Controllers\UserController::class,"findById"]);
});

Route::prefix('user')->group(function () {
Route::get("{id}",[\App\Http\Controllers\UserController::class,"findById"]);
Route::get("/",[\App\Http\Controllers\UserController::class,"getUserPaginate"])->middleware('auth:api');
});

Route::prefix('client')->group(function () {
    Route::get("/checked/",[\App\Http\Controllers\Client\ClientController::class,"findByMobile"])->middleware('auth:api');
    Route::get("/",[\App\Http\Controllers\Client\ClientController::class,"getClientPaginate"])->middleware('auth:api');
    Route::get("/{id}",[\App\Http\Controllers\Client\ClientController::class,"getClientById"])->middleware('auth:api');
});

Route::prefix('tenant')->group(function () {
    Route::get("/client/{id}",[\App\Http\Controllers\Tenant\TenantController::class,"getTenantByClient"])->middleware('auth:api');
});


Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class,"login"])->name('login');

Route::post('/register', [\App\Http\Controllers\UserController::class,"register"])->name('register');

