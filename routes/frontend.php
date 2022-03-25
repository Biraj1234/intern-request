
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('/');
Route::get('{slug}', [HomeController::class, 'specific'])->name('category');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('post.detail');
