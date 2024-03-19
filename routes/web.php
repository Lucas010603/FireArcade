<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\TicketController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;


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

    Route::prefix('api')->group(function () {
        Route::prefix('customerportal')->group(function () {
            Route::post('/store', [TicketController::class, 'store'])->name("customerportal.api.ticket.store");
        });
    });
});


Route::prefix('adminportal')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name("adminportal");
    Route::get('/product', [ProductController::class, 'index'])->name("product");
    Route::get('/new', [ProductController::class, 'new'])->name("product.new");
//    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name("Customer.edit");
//    Route::get('/Customer/{status}', [CustomerController::class, 'status'])->name("Customer.status");
//    Route::get('/delete', [CustomerController::class, 'delete'])->name("Customer.delete");
//    Route::get('/filter', [CustomerController::class, 'filter'])->name('Customer.filter');

    Route::prefix('api')->group(function () {
        Route::prefix('adminportal')->group(function () {
            Route::post('/store', [ProductController::class, 'store'])->name("adminportal.api.product.store");
//            Route::post('/update/{id}', [RoomController::class, 'update'])->name("api.room.update");
//            Route::put('/delete/{id}', [RoomController::class, 'delete'])->name("api.room.delete");
        });
    });
});
