<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


/* Dashboard Routes */
Route::group([
    'middleware' => 'auth',
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    ],function(){
    Route::get('/', [DashboardController::class,'index'])
        ->name('dashboard');

    Route::resource('/categories',CategoryController::class)
        ->parameters(['categories' => 'model']);
});


