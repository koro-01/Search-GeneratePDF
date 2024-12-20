<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');


Route::get('/posts/pdf', [PostController::class, 'generatePDF'])->name('posts.pdf');