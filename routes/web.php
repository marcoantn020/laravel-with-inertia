<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])
    ->name('login.index')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::delete('/users/delete', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/upload', [UploadController::class, 'index'])->name('upload.index');
Route::post('/upload', [UploadController::class, 'upload'])->name('upload.upload');

Route::fallback(fn () => inertia('Errors/404'));
