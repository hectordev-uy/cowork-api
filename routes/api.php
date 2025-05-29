<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', [RegisterController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        // Define your routes here
    });
});
