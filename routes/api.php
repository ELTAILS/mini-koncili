<?php

use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/sales', [SaleController::class, 'index'])
        ->name('sales.index');

    Route::get('/sales/{id}', [SaleController::class, 'show'])
        ->name('sales.show');

    Route::post('/sales', [SaleController::class, 'store'])
        ->name('sales.store');

    Route::delete('/sales/{id}', [SaleController::class, 'destroy'])
        ->name('sales.destroy');

});
