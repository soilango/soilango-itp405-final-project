<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login'); // intentionally named "login" per "auth" middleware
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts/add', [PostController::class, 'addPost'])->name('post.add');
    Route::post('/posts/add', [PostController::class, 'createPost'])->name('post.create');
    
    Route::get('/posts/{id}/comment', [CommentController::class, 'addComment'])->name('comment.add');
    Route::post('/posts/comment', [CommentController::class, 'createComment'])->name('comment.create');
    Route::get('/posts/comment/edit/{id}', [CommentController::class, 'editComment'])->name('comment.edit');
    Route::post('/posts/comment/edit', [CommentController::class, 'submitEdit'])->name('comment.submitEdit');
    Route::post('/posts/comment/delete', [CommentController::class, 'deleteComment'])->name('comment.delete');

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});