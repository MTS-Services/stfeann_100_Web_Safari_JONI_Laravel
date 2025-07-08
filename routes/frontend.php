<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SearchController;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;

Route::group(['as' => 'f.'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail');
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/products', [HomeController::class, 'product'])->name('products');
    // Search 
    Route::get('/search', [SearchController::class, 'search'])->name('products.search');

});