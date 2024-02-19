<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::middleware('auth:api')->prefix('order')->group(function () {
    Route::post("/", [\Modules\Order\App\Http\Controllers\Order\OrderController::class, "createOrder"]);
    Route::get("Order/{id}", [\Modules\Order\App\Http\Controllers\Order\OrderController::class, "finById"]);
});

Route::get("order/randomly", [\Modules\Order\App\Http\Controllers\Order\OrderController::class, "findRandomly"]);

