<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\sales\CustomerController;
use \App\Http\Controllers\sales\TicketController;
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
