<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::match(['get', 'post'], '/register', function () {
    return redirect('/login');
});

Route::name('dashboard.')->prefix('dashboard')->middleware('auth:web')->group(function () {
    Route::middleware(['isAuth'])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');

        Route::get('log', [App\Http\Controllers\Admin\ActivityLogController::class, 'index'])->name('log.index');

        Route::get('klaim/lob', [App\Http\Controllers\Admin\LobController::class, 'lob'])->name('lob.klaim');
        Route::resource('klaim', App\Http\Controllers\Admin\LobController::class);
    });
});
