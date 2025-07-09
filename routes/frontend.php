<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SearchController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'f.'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail')->middleware('auth');
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    // search 
    Route::get('/search', [SearchController::class, 'search'])->name('products.search');
});
