<?php

/** admin routes */

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildControllerCategory;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** profile routes */
Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile', 'index')->name('profile');
    Route::post('/profile/update', 'updateProfile')->name('profile.update');
    Route::post('/profile/update/password', 'updatePassword')->name('update.password');
});

/** slider routes */
Route::put('/change-status', [SliderController::class, 'changeStatus'])->name('slider.change-status');
Route::resource('slider', SliderController::class);

/** categories route */
Route::put('/change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('/category', CategoryController::class);

/** sub categories route */
Route::put('subCategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('/sub-category', SubCategoryController::class);

/** child category route */
Route::put('child-category/change-status', [ChildControllerCategory::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories', [ChildControllerCategory::class, 'getSubCategories'])->name('get-subCategories');
Route::resource('/child-category', ChildControllerCategory::class);