<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Main Pages
Route::get('/', function () {
    return Inertia::render('Home', [
        'posts' => DB::table('posts')->latest()->get()
    ]);
})->name('home');

Route::inertia('/about', 'About')
    ->name('about');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// Show Post
Route::get('/post/{post}', [CommentsController::class, 'show'])
    ->name('posts.post');

// Create Comment
Route::post('/post/{post}', [CommentsController::class, 'store'])
    ->name('comments.store');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::post('/profile', [AuthenticatedSessionController::class, 'destroy'])->name('profile.logout');

    // Posts
    Route::get('/posts', [PostController::class, 'edit'])
        ->name('posts.edit');
    Route::post('/posts', [PostController::class, 'create'])
        ->name('posts.create');
    Route::patch('/posts', [PostController::class, 'update'])
        ->name('posts.update');
    Route::get('/posts/update', [PostController::class, 'showUpdate'])
        ->name('posts.showUpdate');
    Route::delete('/posts', [PostController::class, 'destroy'])
        ->name('posts.destroy');

    Route::delete('/post/{comment}/{post}', [CommentsController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__ . '/auth.php';
