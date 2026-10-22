<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\PortfolioProjectController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/portfolio', [PortfolioProjectController::class, 'index'])
    ->name('portfolio.index');

Route::get('/portfolio/{slug}', [PortfolioProjectController::class, 'show'])
    ->name('portfolio.show');

Route::get('/blog', [BlogPostController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{slug}', [BlogPostController::class, 'show'])
    ->name('blog.show');
