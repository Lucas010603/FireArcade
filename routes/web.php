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
//    Route::get('/user', [UserController::class, 'index'])->name("adminportal.user");
    Route::get('/new-user', [UserController::class, 'new'])->name("adminportal.user.new");
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name("adminportal.user.edit");
    //----------------------------------------------------------------------------------------------
    Route::get('/product', [ProductController::class, 'index'])->name("adminportal.product");
    Route::get('/new', [ProductController::class, 'new'])->name("adminportal.product.new");
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name("product.edit"); // TODO: Change route name to correct naming convention

    Route::prefix('api')->group(function () {
        Route::prefix('adminportal')->group(function () {
            Route::post('/store-user', [UserController::class, 'store'])->name("adminportal.api.user.store");
            Route::post('/update-user/{id}', [UserController::class, 'update'])->name("adminportal.api.user.update");
            Route::put('/delete-user/{id}', [UserController::class, 'delete'])->name("adminportal.api.user.delete");

            Route::post('/store', [ProductController::class, 'store'])->name("adminportal.api.product.store");
            Route::post('/update/{id}', [ProductController::class, 'update'])->name("adminportal.api.product.update");
            Route::put('/delete/{id}', [ProductController::class, 'delete'])->name("adminportal.api.product.delete");
        });
    });
});
