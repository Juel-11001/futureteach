<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

/** user dashboard */
Route::group(['middleware'=>['auth', 'verified','role:user'], 'prefix'=>'user', 'as'=>'user.' ], function(){
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    /** user profile route */
    Route::controller(UserProfileController::class)->group(function(){
        Route::get('/profile', 'index')->name('profile');
        Route::put('/profile', 'updateProfile')->name('profile.update');
        Route::post('/update/password', 'updatePassword')->name('profile.update.password');
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

