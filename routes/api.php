<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('api')->group(function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('logout', [AuthController::class, 'logout']);

        Route::post('lob', [LobController::class, 'store']);
    });
});
