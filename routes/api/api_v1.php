<?php

use App\Http\Controllers\Api\V1\RedirectUrlController;
use App\Http\Controllers\Api\V1\UrlController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/urls', UrlController::class, [
        'only' => ['index', 'store', 'destroy'],
    ]);
});

Route::get('/{url}', RedirectUrlController::class);
