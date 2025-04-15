<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:writer'])->get('/writer/dashboard', fn() => view('writer.dashboard'))->name('writer.dashboard');
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('comments', CommentController::class);
    Route::resource('posts', PostController::class);
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
});
