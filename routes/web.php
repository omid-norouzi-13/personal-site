<?php

use App\Http\Controllers\PortfolioProjectController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/portfolio', [PortfolioProjectController::class, 'index'])
    ->name('portfolio.index');

Route::get('/portfolio/{slug}', [PortfolioProjectController::class, 'show'])
    ->name('portfolio.show');

Route::view('/blog', 'blog.index')->name('blog.index');
Route::view('/blog/{slug}', 'blog.show')->name('blog.show');
