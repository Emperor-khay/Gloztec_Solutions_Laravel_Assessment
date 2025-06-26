<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;



Route::prefix('v1')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
    });

    Route::middleware('auth:sanctum')->group(function() {

        Route::controller( TaskController::class)->group(function() {
            Route::get('tasks',  'index');
            Route::get('task/{id}',  'show');
            Route::post('task',  'create');
            Route::put('task/{id}',  'update');
            Route::patch('task/{id}',  'done');
            Route::delete('task/{id}',  'delete');
        });

        Route::controller( ProductController::class)->group(function() {
            Route::get('products', 'index');
            Route::get('product/{id}', 'show');
            Route::post('product', 'create');
            Route::put('product/{id}', 'update');
            Route::delete('product/{id}', 'delete');

        });

        Route::controller(UserController::class)->group(function () {
            Route::get('user', 'user');
            Route::post('logout', 'logout');
        });


    });
});
