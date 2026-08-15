<?php

use App\Livewire\Dashboard;
use App\Livewire\ReconciliationPainel;
use App\Livewire\SalesTable;
use App\Livewire\TransfersTable;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/sales', SalesTable::class)
    ->middleware(['auth', 'verified'])
    ->name('sales');

Route::get('/transfers', TransfersTable::class)
    ->middleware(['auth', 'verified'])
    ->name('transfers');

Route::get('/reconciliation', ReconciliationPainel::class)
    ->middleware(['auth', 'verified'])
    ->name('reconciliation');

require __DIR__.'/auth.php';
