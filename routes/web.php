<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\sales\CustomerController;
use \App\Http\Controllers\sales\TicketController;
use App\Http\Controllers\mechanic\contractController;
use App\Http\Controllers\mechanic\mechanicController;
use App\Http\Controllers\mechanic\productController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name("login");
Route::post('/sign-out', [AuthController::class, 'signOut'])->name("sign-out");

Route::prefix('api')->group(function () {
    Route::post('/login', [AuthController::class, 'attemptLogin'])->name("attemptLogin");
});

Route::prefix('sales')->group(function () {
    Route::middleware(['auth'])->group(function () {

        // auth routes
        Route::prefix('customer')->group(function () {
            Route::get('/', [CustomerController::class, 'index'])->name("sales.customer.index");
            Route::get('/new', [CustomerController::class, 'new'])->name("sales.customer.new");
            Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name("sales.customer.edit");

        });

        Route::prefix('ticket')->group(function () {
            Route::get('/', [TicketController::class, 'index'])->name("sales.ticket.index");
            Route::get('/new', [TicketController::class, 'new'])->name("sales.ticket.new");
            Route::get('/show/{id}', [TicketController::class, 'show'])->name("sales.ticket.show");
        });

        // auth api routes
        Route::prefix('api')->group(function () {
            Route::prefix('customer')->group(function () {
                Route::post('/store', [CustomerController::class, 'store'])->name("sales.api.customer.store");
                Route::put('/delete/{id}', [CustomerController::class, 'delete'])->name("sales.api.customer.delete");
                Route::post('/edit/{id}', [CustomerController::class, 'update'])->name("sales.api.customer.update");
            });
            Route::prefix('ticket')->group(function () {
                Route::post('/store', [TicketController::class, 'store'])->name("sales.api.ticket.store");
                Route::put('/cancel/{id}', [TicketController::class, 'cancel'])->name("sales.api.ticket.cancel");
            });
        });
    });

});


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
