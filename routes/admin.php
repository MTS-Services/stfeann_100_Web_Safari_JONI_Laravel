<?php

use App\Http\Controllers\Backend\Admin\About\AboutController;
use App\Http\Controllers\Backend\Admin\AdminManagement\AdminController;
use App\Http\Controllers\Backend\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backend\Admin\ProductManagement\CategoryController;
use App\Http\Controllers\Backend\Admin\ProductManagement\ProductController;
use App\Http\Controllers\Backend\Admin\UserManagement\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {
  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

  // Admin Management
  Route::group(['as' => 'am.', 'prefix' => 'admin-management'], function () {
    // Admin Routes
    Route::resource('admin', AdminController::class);
    Route::controller(AdminController::class)->name('admin.')->prefix('admin')->group(function () {
      Route::post('/show/{admin}', 'show')->name('show');
      Route::get('/status/{admin}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{admin}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{admin}', 'permanentDelete')->name('permanent-delete');
    });
  });

  // User Management
  Route::group(['as' => 'um.', 'prefix' => 'user-management'], function () {
    Route::resource('user', UserController::class);
    Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
      Route::post('/show/{user}', 'show')->name('show');
      Route::get('/status/{user}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{user}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{user}', 'permanentDelete')->name('permanent-delete');
    });
  });

  // Product Management
  Route::group(['as' => 'pm.', 'prefix' => 'product-management'], function () {
    // Categories
    Route::resource('category', CategoryController::class);
    Route::controller(CategoryController::class)->name('category.')->prefix('category')->group(function () {
      Route::post('/show/{category}', 'show')->name('show');
      Route::get('/status/{category}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{category}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{category}', 'permanentDelete')->name('permanent-delete');
    });

    // Products
    Route::resource('product', ProductController::class);
    Route::controller(ProductController::class)->name('product.')->prefix('product')->group(function () {
      Route::post('/show/{product}', 'show')->name('show');
      Route::get('/status/{product}', 'status')->name('status');
      Route::get('/is-featured/{product}', 'isFeatured')->name('is-featured');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{product}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{product}', 'permanentDelete')->name('permanent-delete');
    });
  });
  // About Us
  Route::get('about', [AboutController::class, 'index'])->name('about.index');
 Route::match(['POST', 'PUT'], 'admin/about/store-or-update/{id?}', [AboutController::class, 'storeOrUpdate'])->name('about.storeOrUpdate');

});
