<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/create', [TaskController::class, 'store'])->name('tasks.store');

    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/{task}/edit', [TaskController::class, 'update'])->name('tasks.update');

    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::patch('/{task}', [TaskController::class, 'status'])->name('tasks.status');
});

require __DIR__ . '/auth.php';
