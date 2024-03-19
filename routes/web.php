<?php

use App\Http\Controllers\mechanic\contractController;
use App\Http\Controllers\mechanic\mechanicController;
use App\Http\Controllers\mechanic\productController;
use App\Http\Controllers\mechanic\ticketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('mechanic')->group(function () {
    //Route::get('/', [mechanicController::class, 'index'])->name("mechanic");
    Route::get('/', [ticketController::class, 'index'])->name("ticket");

    Route::get('/edit/{id}', [mechanicController::class, 'edit'])->name("mechanic.edit");
    Route::get('/mechanic/{status}', [mechanicController::class, 'status'])->name("mechanic.status");
    Route::get('/delete', [mechanicController::class, 'delete'])->name("mechanic.delete");
    Route::get('/filter', [mechanicController::class, 'filter'])->name('mechanic.filter');

    Route::prefix('ticket')->group(function () {
    Route::get('/', [ticketController::class, 'index'])->name("ticket");
});

    Route::prefix('contract')->group(function () {
        Route::get('/', [contractController::class, 'index'])->name("contract");
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [productController::class, 'index'])->name("product");
        Route::get('/new', [productController::class, 'new'])->name("product.new");
        Route::get('/edit/{id}', [productController::class, 'edit'])->name("product.edit");
    });

    Route::prefix('api')->group(function () {
        Route::prefix('product')->group(function () {
            Route::post('/store', [productController::class, 'store'])->name("api.product.store");
            Route::put('/delete/{id}', [productController::class, 'delete'])->name("api.product.delete");
            Route::post('/update/{id}', [productController::class, 'update'])->name("api.product.update");
        });
    });
});
