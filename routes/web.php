<?php

use App\Http\Controllers\Api\V1\RedirectUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/{url}', RedirectUrlController::class);
