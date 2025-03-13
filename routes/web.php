<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Dom\Comment;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/post/{id}', [CommentsController::class, 'show'])->name('posts.post');

Route::post('/post/{post}', [CommentsController::class, 'store'])->name('comments.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/posts', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts', [PostController::class, 'create'])->name('posts.create');
    Route::patch('/posts', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/update', [PostController::class, 'showUpdate'])->name('posts.showUpdate');
    Route::delete('/posts', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::delete('/post/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__ . '/auth.php';
