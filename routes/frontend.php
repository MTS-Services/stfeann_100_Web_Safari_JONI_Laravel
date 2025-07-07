<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'f.'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail');
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/products', [HomeController::class, 'product'])->name('products');

});