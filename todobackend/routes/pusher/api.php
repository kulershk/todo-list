<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::post('/create', [TodoController::class, 'createTodo']);
Route::post('/delete', [TodoController::class, 'deleteTodo']);
Route::post('/list', [TodoController::class, 'getList']);
Route::post('/toggle', [TodoController::class, 'toggleTodo']);
Route::post('/update', [TodoController::class, 'textTodo']);
