<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;


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
    Route::get('/posts/add', [PostController::class, 'addPost'])->name('post.add');
    Route::post('/posts/add', [PostController::class, 'createPost'])->name('post.create');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});