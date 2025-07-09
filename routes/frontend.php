<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SearchController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'f.'], function () {
    Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail')->middleware('auth');
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/shop', 'shop')->name('shop');
        Route::get('/about', 'about')->name('about');
        Route::get('/category/{slug}', 'categoryProduct')->name('categoryProduct');
    });

    // search 
    Route::get('/search', [SearchController::class, 'search'])->name('products.search');
});
