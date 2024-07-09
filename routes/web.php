<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/','/dashboard');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/dashboard', fn()=>Inertia::render('Dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('project', ProjectController::class);
    Route::get('/task/my-tasks', [TaskController::class, 'myTasks'])->name('task.myTasks');
    Route::resource('task', TaskController::class);
    Route::resource('user', UserController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::get('/project/create', [ProjectController::class, 'create'])->middleware('auth');


Route::resource('projects', ProjectController::class);


Route::get('/project', [ProjectController::class, 'index']);




require __DIR__.'/auth.php';
