<?php

use App\Http\Controllers\TestController;
use App\Livewire\Task;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
require __DIR__.'/api.php';


// Custom Routes
Route::get('tasks', Task::class)->middleware(['auth'])->name('tasks.index');

Route::get('test',[TestController::class, 'index'])->name('test');
