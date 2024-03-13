<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;


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
});

Route::prefix('adminportal')->group(function () {
//    Route::get('/', [CustomerController::class, 'index'])->name("customerportal");
//    Route::get('/new', [CustomerController::class, 'new'])->name("Customer.new");
//    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name("Customer.edit");
//    Route::get('/Customer/{status}', [CustomerController::class, 'status'])->name("Customer.status");
//    Route::get('/delete', [CustomerController::class, 'delete'])->name("Customer.delete");
//    Route::get('/filter', [CustomerController::class, 'filter'])->name('Customer.filter');
});
