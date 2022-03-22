<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/home');

Route::group(['namespace' => 'Backend'], function () {
    Route::resource('user', 'UserController');
    Route::resource('post', 'PostController')->middleware('auth');
});


//For frontend
require('frontend.php');
