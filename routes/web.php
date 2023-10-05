<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});
// routes for accessing form for creating a new book 
Route::get('/create', function () {
    return view('books.create');
});
// routes for getting all the books
Route::get('/books', [BookController::class, 'index'])->name('books.allbooks');
//editing the book with existing details
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
// routes for updating the book details
Route::put('/books/{book}/edit', [BookController::class, 'update'])->name('books.update');
// routes for deleting the book
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
// routes for storing the book details  
Route::post('/books/store', [BookController::class, 'store'])->name('store');
// routes for searching the book
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

