<?php

use App\Http\Controllers\api\AddressDropdownController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('address', [AddressDropdownController::class, 'province'])->name('api.address');
