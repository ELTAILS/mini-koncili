<?php

use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReconciliationController;
use Illuminate\Support\Facades\Route;

//Para apis que tem apenas uma rota.
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])
    ->name('api.login');

    Route::get('/reconciliation', [ReconciliationController::class, 'index'])
    ->name('reconciliation.index');
});

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transfer', [TransferController::class, 'index'])
        ->name('transfer.index');

    Route::get('/transfer/{id}', [TransferController::class, 'show'])
        ->name('transfer.show');

    Route::post('/transfer', [TransferController::class, 'store'])
        ->name('transfer.store');

    Route::delete('/transfer/{id}', [TransferController::class, 'destroy'])
        ->name('transfer.destroy');
});
