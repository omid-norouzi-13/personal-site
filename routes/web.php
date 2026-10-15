<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site routes (Phase 1 - static views)
|--------------------------------------------------------------------------
| In the next phases the {slug} routes will be connected to the
| Projects and Blog Posts tables.
*/

Route::view('/', 'home')->name('home');

Route::view('/portfolio', 'portfolio.index')->name('portfolio.index');
Route::view('/portfolio/{slug}', 'portfolio.show')->name('portfolio.show');

Route::view('/blog', 'blog.index')->name('blog.index');
Route::view('/blog/{slug}', 'blog.show')->name('blog.show');
