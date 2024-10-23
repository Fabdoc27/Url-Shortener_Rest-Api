<?php

use App\Http\Controllers\Api\Auth\LoginUserController;
use App\Http\Controllers\Api\Auth\LogoutUserController;
use App\Http\Controllers\Api\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginUserController::class);
Route::post('/register', RegisterUserController::class);
Route::post('/logout', LogoutUserController::class)->middleware('auth:sanctum');
