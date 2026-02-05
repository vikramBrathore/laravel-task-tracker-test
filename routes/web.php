<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimerController;
use App\Http\Controllers\ReportController;

Route::prefix('api')->group(function () {
    
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::middleware('admin')->group(function () {
            Route::post('/projects', [ProjectController::class, 'store']);
            Route::post('/tasks', [TaskController::class, 'store']);
            Route::post('/reports/user-hours', [ReportController::class, 'generate']);
        });

        Route::post('/timers/start', [TimerController::class, 'start']);
        Route::post('/timers/stop', [TimerController::class, 'stop']);
        Route::get('/reports/user-hours/{id}', [ReportController::class, 'show']);
    });

});

Route::get('/', function () {
    return view('welcome');
});
