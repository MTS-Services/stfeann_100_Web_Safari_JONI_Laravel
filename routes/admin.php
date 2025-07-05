<?php

use App\Http\Controllers\Backend\Admin\AdminManagement\AdminController;
use App\Http\Controllers\Backend\Admin\DashboardController as AdminDashboardController;
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
});
