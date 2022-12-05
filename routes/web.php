<?php

use AlphaDevTeam\Logger\Http\Controllers\LogsController;
use Illuminate\Support\Facades\Route;

Route::controller(LogsController::class)->group(function () {
    Route::get('logs', 'index')->name('log.index');
    Route::get('logs/{log}', 'show')->name('log.show');
    Route::put('logs/status/{log}', 'changeStatus')->name('log.status');
    Route::delete('logs/{log}', 'destroy')->name('log.destroy');
});

