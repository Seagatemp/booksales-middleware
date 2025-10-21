<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;

// Routes untuk Auth (Register dan Login dengan JWT)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public Routes (accessible tanpa auth)
Route::group(['prefix' => 'authors'], function () {
    Route::get('/', [AuthorController::class, 'index']); // Read All
    Route::get('/{id}', [AuthorController::class, 'show']); // Show
});

Route::group(['prefix' => 'genres'], function () {
    Route::get('/', [GenreController::class, 'index']); // Read All
    Route::get('/{id}', [GenreController::class, 'show']); // Show
});

// Protected Routes (hanya admin, dengan JWT)
Route::group(['middleware' => ['jwt.auth', 'admin']], function () {
    // Authors
    Route::post('/authors', [AuthorController::class, 'store']); // Create
    Route::put('/authors/{id}', [AuthorController::class, 'update']); // Update
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']); // Destroy
    
    // Genres
    Route::post('/genres', [GenreController::class, 'store']); // Create
    Route::put('/genres/{id}', [GenreController::class, 'update']); // Update
    Route::delete('/genres/{id}', [GenreController::class, 'destroy']); // Destroy
});