<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/projects', [AdminProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [AdminProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}', [AdminProjectController::class, 'show'])->name('projects.show');
        Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [AdminProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [AdminProjectController::class, 'delete'])->name('projects.index');
    });