<?php

/** admin routes */

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** profile routes */
Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile', 'index')->name('profile');
    Route::post('/profile/update', 'updateProfile')->name('profile.update');
    Route::post('/profile/update/password', 'updatePassword')->name('update.password');
});
