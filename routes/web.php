<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('task.index');
Route::post('/task/updateStatus', [TaskController::class, 'updateStatus'])->name('task.updateStatus');
Route::post('/task/{id}/complete', [TaskController::class, 'toggleComplete'])->name('task.toggleComplete');
Route::put('/tasks/{id}/priority', [TaskController::class, 'togglePriority'])->name('tasks.togglePriority');
Route::get('/tasks/priority', [TaskController::class, 'showPriority'])->name('tasks.showPriority');
Route::get('/tasks/priority', [TaskController::class, 'showPriority'])->name('tasks.showPriority');
Route::get('/tasks/completed', [TaskController::class, 'showCompleted'])->name('tasks.showCompleted');
