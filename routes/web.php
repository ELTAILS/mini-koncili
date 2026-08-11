<?php

use App\Livewire\SalesTable;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/sales', SalesTable::class)
    ->middleware(['auth', 'verified'])
    ->name('sales');

require __DIR__.'/auth.php';
