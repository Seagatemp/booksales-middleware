<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;


Route::get('/', [GenreController::class, 'index']);

Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');

Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
