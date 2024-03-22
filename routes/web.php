<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\sales\CustomerController;
use \App\Http\Controllers\sales\TicketController;
use App\Http\Controllers\mechanic\mechanicController as MMechanicController;
use App\Http\Controllers\mechanic\productController as MProductController;
use App\Http\Controllers\Mechanic\ticketController as MTicketController;

use App\Http\Controllers\Customer\CustomerController as CCustomerController;
use App\Http\Controllers\Customer\TicketController as CTicketController;
use App\Http\Controllers\admin\UserController as AUserController;
use App\Http\Controllers\admin\ProductController as AProductController;
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

Route::prefix('customerportal')->group(function () {
    Route::get('/', [CCustomerController::class, 'index'])->name("customerportal");

    Route::prefix('api')->group(function () {
        Route::prefix('customerportal')->group(function () {
            Route::post('/store', [CTicketController::class, 'store'])->name("customerportal.api.ticket.store");
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:verkoop-medewerker'])->group(function () {
        Route::prefix('sales')->group(function () {

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

    Route::middleware(['role:monteur'])->group(function () {
        Route::prefix('mechanic')->group(function () {
            Route::get('/', [MTicketController::class, 'index'])->name("ticket");

            Route::get('/edit/{id}', [MMechanicController::class, 'edit'])->name("mechanic.edit");
            Route::get('/delete', [MMechanicController::class, 'delete'])->name("mechanic.delete");

            Route::prefix('ticket')->group(function () {
                Route::get('/', [MTicketController::class, 'index'])->name("mechanic.ticket");
                Route::get('/personal', [MTicketController::class, 'personal'])->name("mechanic.personal");
                Route::get('/edit/{id}', [MTicketController::class, 'edit'])->name("mechanic.ticket.edit");
            });



            Route::prefix('product')->group(function () {
                Route::get('/', [MProductController::class, 'index'])->name("mechanic.product");
                Route::get('/view/{id}', [MProductController::class, 'view'])->name("mechanic.product.view");
            });

            Route::prefix('api')->group(function () {
                Route::prefix('product')->group(function () {
                    Route::post('/store', [MProductController::class, 'store'])->name("mechanic.api.product.store");
                    Route::put('/delete/{id}', [MProductController::class, 'delete'])->name("mechanic.api.product.delete");
                    Route::post('/update/{id}', [MProductController::class, 'update'])->name("mechanic.api.product.update");
                });

                Route::prefix('ticket')->group(function () {

                    Route::put('/delete/{id}', [MTicketController::class, 'delete'])->name("mechanic.api.ticket.delete");
                    Route::post('/update/{id}', [MTicketController::class, 'update'])->name("mechanic.api.ticket.update");
                    Route::post('/accept/{id}', [MTicketController::class, 'accept'])->name("mechanic.api.ticket.accept");
                    Route::post('/finnish/{id}', [MTicketController::class, 'finnish'])->name("mechanic.api.ticket.finnish");
                });
            });
        });

    });

    Route::middleware(['role:beheerder'])->group(function () {
        Route::prefix('adminportal')->group(function () {
            Route::get('/', [AUserController::class, 'index'])->name("adminportal");
//    Route::get('/user', [UserController::class, 'index'])->name("adminportal.user");
            Route::get('/new-user', [AUserController::class, 'new'])->name("adminportal.user.new");
            Route::get('/edit-user/{id}', [AUserController::class, 'edit'])->name("adminportal.user.edit");
            //----------------------------------------------------------------------------------------------
            Route::get('/product', [AProductController::class, 'index'])->name("adminportal.product");
            Route::get('/new', [AProductController::class, 'new'])->name("adminportal.product.new");
            Route::get('/edit/{id}', [AProductController::class, 'edit'])->name("product.edit"); // TODO: Change route name to correct naming convention

            Route::prefix('api')->group(function () {
                Route::prefix('adminportal')->group(function () {
                    Route::post('/store-user', [AUserController::class, 'store'])->name("adminportal.api.user.store");
                    Route::post('/update-user/{id}', [AUserController::class, 'update'])->name("adminportal.api.user.update");
                    Route::put('/delete-user/{id}', [AUserController::class, 'delete'])->name("adminportal.api.user.delete");

                    Route::post('/store', [AProductController::class, 'store'])->name("adminportal.api.product.store");
                    Route::post('/update/{id}', [AProductController::class, 'update'])->name("adminportal.api.product.update");
                    Route::put('/delete/{id}', [AProductController::class, 'delete'])->name("adminportal.api.product.delete");
                });
            });
        });

    });

});

