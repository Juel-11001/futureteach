<?php

/** admin routes */

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildControllerCategory;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
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

/* Brand routes */
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('/brand', BrandController::class);

/** product routes */
Route::put('products/change-status', [ProductController::class, 'changeStatus'])->name('products.change-status');
Route::get('products/get-sub-categories', [ProductController::class, 'getSubCategories'])->name('product.get-sub-categories');
Route::get('products/get-child-categories', [ProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::resource('/products', ProductController::class);

/* Product Image Gallery routes */
Route::resource('products-image-gallery', ProductImageGalleryController::class);

/* Product Variant routes */
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', ProductVariantController::class);

/* Product Variant Item routes */
Route::controller(ProductVariantItemController::class)->group(function(){
    Route::get('products-variant-item/{productId}/{variantId}', 'index')->name('products-variant-item.index');
    Route::get('products-variant-item/create/{productId}/{variantId}', 'create')->name('products-variant-item.create');
    Route::post('products-variant-item', 'store')->name('products-variant-item.store');
    Route::get('products-variant-item-edit/{variantItemId}', 'edit')->name('products-variant-item.edit');
    // Route::get('products-variant-item/{variantItemId}/edit/{product}/{variant}', 'edit')->name('products-variant-item.edit');
    Route::put('products-variant-item-update/{variantItemId}', 'update')->name('products-variant-item.update');
    Route::delete('products-variant-item/{variantItemId}', 'destroy')->name('products-variant-item.destroy');
    Route::put('products-variant-item-status', 'changeStatus')->name('products-variant-item.change-status');
});
