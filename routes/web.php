<?php

use App\Http\Controllers\mechanic\contractController;
use App\Http\Controllers\mechanic\mechanicController;
use App\Http\Controllers\mechanic\productController;
use App\Http\Controllers\mechanic\ticketController;
use Illuminate\Support\Facades\Route;


Route::prefix('mechanic')->group(function () {
    Route::get('/', [ticketController::class, 'index'])->name("ticket");

    Route::get('/edit/{id}', [mechanicController::class, 'edit'])->name("mechanic.edit");
    Route::get('/delete', [mechanicController::class, 'delete'])->name("mechanic.delete");

    Route::prefix('ticket')->group(function () {
    Route::get('/', [ticketController::class, 'index'])->name("mechanic.ticket");
        Route::get('/personal', [ticketController::class, 'personal'])->name("mechanic.personal");
        Route::get('/edit/{id}', [ticketController::class, 'edit'])->name("mechanic.ticket.edit");
});



    Route::prefix('product')->group(function () {
        Route::get('/', [productController::class, 'index'])->name("mechanic.product");
        Route::get('/view/{id}', [productController::class, 'view'])->name("mechanic.product.view");
    });

    Route::prefix('api')->group(function () {
        Route::prefix('product')->group(function () {
            Route::post('/store', [productController::class, 'store'])->name("mechanic.api.product.store");
            Route::put('/delete/{id}', [productController::class, 'delete'])->name("mechanic.api.product.delete");
            Route::post('/update/{id}', [productController::class, 'update'])->name("mechanic.api.product.update");
        });

        Route::prefix('ticket')->group(function () {

            Route::put('/delete/{id}', [ticketController::class, 'delete'])->name("mechanic.api.ticket.delete");
            Route::post('/update/{id}', [ticketController::class, 'update'])->name("mechanic.api.ticket.update");
            Route::post('/accept/{id}', [ticketController::class, 'accept'])->name("mechanic.api.ticket.accept");
            Route::post('/finnish/{id}', [ticketController::class, 'finnish'])->name("mechanic.api.ticket.finnish");
        });
    });
});
