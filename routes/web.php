<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;


Route::get('/', [GenreController::class, 'index']);

Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');

Route::get('/author', [AuthorController::class, 'index'])->name('author.index');

Route::get('/books', [BookController::class, 'index']);