<?php

use App\Http\Controllers\Gold\GoldController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::middleware(['auth', 'status'])->group(function () {
    Route::get('/golds', [GoldController::class, 'index'])->name('golds.index');
    Route::get('/golds/create', [GoldController::class, 'create'])->name('golds.create');
    Route::post('/golds', [GoldController::class, 'store'])->name('golds.store');
    Route::get('/golds/{gold}', [GoldController::class, 'show'])->name('golds.show');
    Route::get('/golds/{gold}/edit', [GoldController::class, 'edit'])->name('golds.edit');
    Route::patch('/golds/{gold}', [GoldController::class, 'update'])->name('golds.update');
    Route::delete('/golds/{gold}', [GoldController::class, 'destroy'])->name('golds.destroy');

    Route::get('/users/{user}', [ProfileController::class, 'show'])->name('users.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.upload');
});

Auth::routes();
