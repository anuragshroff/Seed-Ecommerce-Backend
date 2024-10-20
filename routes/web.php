<?php

use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\InventoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        //order
        Route::get('/order', [OrderController::class, 'order'])->name('order');

        //product
        Route::resource('product', ProductController::class);

        //Attribute
        Route::resource('attribute', AttributeController::class);
        Route::get('/create/attribute/option', [AttributeController::class, 'createAtributeOption'])->name('createAtributeOption');
        Route::get('/edit/attribute/option', [AttributeController::class, 'editAttribute'])->name('editAttributeOption');

        //Report 
        Route::get('/report', [ReportController::class, 'report'])->name('report');
        Route::get('/sale-report', [ReportController::class, 'saleReport'])->name('saleReport');

        //Inventory
        Route::get('/stock', [InventoryController::class, 'stock'])->name('stock');
        Route::get('/stock-out-product', [InventoryController::class, 'stockOutProduct'])->name('stockOutProducts');
        Route::get('/upcoming-stock-out-product', [InventoryController::class, 'upcomingStockOut'])->name('upcomingStockOutProducts');

    }
);
