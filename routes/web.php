<?php

use App\Http\Controllers\Gold\CreateController;
use App\Http\Controllers\Gold\DestroyController;
use App\Http\Controllers\Gold\EditController;
use App\Http\Controllers\Gold\IndexController;
use App\Http\Controllers\Gold\ShowController;
use App\Http\Controllers\Gold\StoreController;
use App\Http\Controllers\Gold\UpdateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::middleware(['auth'])->group(function () {
    Route::get('/golds', IndexController::class)->name('golds.index');
    Route::get('/golds/create', CreateController::class)->name('golds.create');
    Route::post('/golds', StoreController::class)->name('golds.store');
    Route::get('/golds/{gold}', ShowController::class)->name('golds.show');
    Route::get('/golds/{gold}/edit', EditController::class)->name('golds.edit');
    Route::patch('/golds/{gold}', UpdateController::class)->name('golds.update');
    Route::delete('golds/{gold}', DestroyController::class)->name('golds.destroy');
});

Auth::routes();
