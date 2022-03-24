<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::prefix('backend/')->name('backend.')->group(function () {

    Route::resource('user', 'Backend\UserController');
    Route::resource('post', 'Backend\PostController');
    Route::resource('category', 'Backend\CategoryController');
});



//For frontend
require('frontend.php');
