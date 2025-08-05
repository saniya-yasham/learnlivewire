<?php

use App\Livewire\MultiStepForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route::view('test', 'livewire.multi-step-form');
Route::get('test', MultiStepForm::class);

require __DIR__ . '/auth.php';
