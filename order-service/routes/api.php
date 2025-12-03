<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::post('/checkout', [OrderController::class, 'checkout']);
Route::post('/calculate-shipping', [OrderController::class, 'calculateShipping']);

// Route::options('/{any}', fn() => response()->json())->where('any', '.*');