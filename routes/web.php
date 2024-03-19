<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\TicketController;


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

Route::prefix('customerportal')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name("customerportal");
//    Route::get('/new', [CustomerController::class, 'new'])->name("Customer.new");
//    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name("Customer.edit");
//    Route::get('/Customer/{status}', [CustomerController::class, 'status'])->name("Customer.status");
//    Route::get('/delete', [CustomerController::class, 'delete'])->name("Customer.delete");
//    Route::get('/filter', [CustomerController::class, 'filter'])->name('Customer.filter');

    Route::prefix('api')->group(function () {
        Route::prefix('customerportal')->group(function () {
            Route::post('/store', [TicketController::class, 'store'])->name("customerportal.api.ticket.store");
//            Route::post('/update/{id}', [RoomController::class, 'update'])->name("api.room.update");
//            Route::put('/delete/{id}', [RoomController::class, 'delete'])->name("api.room.delete");
        });
    });
});

Route::prefix('adminportal')->group(function () {
    //    Route::get('/', [CustomerController::class, 'index'])->name("customerportal");
    //    Route::get('/new', [CustomerController::class, 'new'])->name("Customer.new");
    //    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name("Customer.edit");
    //    Route::get('/Customer/{status}', [CustomerController::class, 'status'])->name("Customer.status");
    //    Route::get('/delete', [CustomerController::class, 'delete'])->name("Customer.delete");
    //    Route::get('/filter', [CustomerController::class, 'filter'])->name('Customer.filter');
});
