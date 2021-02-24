<?php

use App\Events\DeleteTodo;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;

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

Route::middleware('guest')->group(function () {
    Route::post('register', [AuthController::class,'register'])->name('register');
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::post('refresh-token', [AuthController::class,'refreshToken'])->name('refreshToken');
});

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
});
