<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminItemController;
use App\Http\Controllers\Admin\AdminInventoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/{inventory}', [InventoryController::class, 'show'])->name('inventory.show');

    Route::get('/trades', [TradeController::class, 'index'])->name('trades.index');
    Route::get('/trades/create', [TradeController::class, 'create'])->name('trades.create');
    Route::post('/trades', [TradeController::class, 'store'])->name('trades.store');
    Route::patch('/trades/{trade}/accept', [TradeController::class, 'accept'])->name('trades.accept');
    Route::patch('/trades/{trade}/decline', [TradeController::class, 'decline'])->name('trades.decline');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
});

Route::middleware(['auth', 'verified', 'role:beheerder'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::get('/items', [AdminItemController::class, 'index'])->name('items.index');
        Route::get('/items/create', [AdminItemController::class, 'create'])->name('items.create');
        Route::post('/items', [AdminItemController::class, 'store'])->name('items.store');
        Route::get('/items/{item}/edit', [AdminItemController::class, 'edit'])->name('items.edit');
        Route::patch('/items/{item}', [AdminItemController::class, 'update'])->name('items.update');
        Route::delete('/items/{item}', [AdminItemController::class, 'destroy'])->name('items.destroy');

        Route::get('/inventory/assign', [AdminInventoryController::class, 'create'])->name('inventory.assign.create');
        Route::post('/inventory/assign', [AdminInventoryController::class, 'store'])->name('inventory.assign.store');
    });

require __DIR__.'/auth.php';
