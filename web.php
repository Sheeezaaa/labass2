<?php


use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);
Route::get('/create', [UserController::class, 'create']);
Route::post('/store', [UserController::class, 'store']);
Route::get('/edit/{id}', [UserController::class, 'edit']);
Route::post('/update/{id}', [UserController::class, 'update']);
Route::get('/delete/{id}', [UserController::class, 'delete']);
Route::get('/search', [UserController::class, 'search']);
use Illuminate\Support\Facades\Route;