<?php

use App\Livewire\BreedManagerComponent;
use App\Livewire\PetManagerComponent;
use App\Livewire\TypePetManagerComponent;
use App\Livewire\UserManagerComponent;
use App\Livewire\VaccineManagerComponent;
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

    Route::get('/pets/manage', PetManagerComponent::class)->name('manage-pets');

    Route::get('/vaccines/manage', VaccineManagerComponent::class)->name('manage-vaccines');

    Route::get('/pet-types/manage', TypePetManagerComponent::class)->name('manage-pet-types');

    Route::get('/pet-breeds/manage', BreedManagerComponent::class)->name('manage-pet-breeds');
});
