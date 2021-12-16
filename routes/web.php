<?php

use App\Http\Controllers\setting\GenderController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /****************** below route is all for setting****************************/
    Route::prefix('settings')->group(function () {
        Route::resource('gender',GenderController::class);
    });
});
