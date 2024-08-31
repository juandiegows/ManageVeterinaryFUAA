<?php

use App\Livewire\UserManagerComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users/manage',UserManagerComponent::class)->name('manage-users');

    Route::get('/pets/manage', function () {
        return view('manage-pets');
    })->name('manage-pets');

    Route::get('/vaccines/manage', function () {
        return view('manage-vaccines');
    })->name('manage-vaccines');

    Route::get('/pet-types/manage', function () {
        return view('manage-pet-types');
    })->name('manage-pet-types');

    Route::get('/pet-breeds/manage', function () {
        return view('manage-pet-breeds');
    })->name('manage-pet-breeds');
});
