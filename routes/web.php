<?php

use App\Http\Controllers\admin\Apicontroller;
use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\AttributeOptionController;
use App\Http\Controllers\admin\CustomerInfoController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GeneralController;
use App\Http\Controllers\admin\InventoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\RollPermissionController;
use App\Http\Controllers\admin\RollUserController;
use App\Http\Controllers\admin\TemplateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */

require __DIR__ . '/auth.php';

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        //order
        Route::get('/order', [OrderController::class, 'order'])->name('order');
        Route::get('/order-filter', [OrderController::class, 'orderFilter'])->name('orders.filter');


        //product
        //Route::resource('product', ProductController::class);

        Route::middleware(['auth:web'])->group(function () {

            Route::middleware('permission:allProducts')->group(function () {
                Route::get('product', [ProductController::class, 'index'])->name('product.index');
                Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit'); // Add edit route

            });


            Route::middleware('permission:createProducts')->group(function () {
                Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
                Route::post('product', [ProductController::class, 'store'])->name('product.store');
            });


        });



        Route::post('/product/toggle-status', [ProductController::class, 'toggleStatus'])->name('product.toggleStatus');


        //Template
        Route::resource('template', TemplateController::class);


        //Attribute

        Route::get('/attribute', [AttributeController::class, 'attribute'])->name('attribute');
        Route::get('/create-attribute', [AttributeController::class, 'createAttribute'])->name('createAttribute');
        Route::post('/attribute-store', [AttributeController::class, 'attributeStore'])->name('attributeStore');
        Route::get('/edit/attribute/{id}', [AttributeController::class, 'editAttribute'])->name('editAttribute');
        Route::post('/update/attribute', [AttributeController::class, 'updateAttribute'])->name('updateAttribute');
        Route::get('/delete/attribute/{id}', [AttributeController::class, 'deleteAttribute'])->name('deleteAttribute');




        Route::get('/create/attribute/option/{id}', [AttributeOptionController::class, 'createAtributeOption'])->name('createAtributeOption');
        Route::post('/attribute/option/store', [AttributeOptionController::class, 'storeAtributeOption'])->name('storeAtributeOption');
        Route::get('/attribute/option/edit/{id}', [AttributeOptionController::class, 'attributeOptionEdit'])->name('attributeOptionEdit');
        Route::post('/attribute/option/update', [AttributeOptionController::class, 'attributeOptionUpdate'])->name('attributeOptionUpdate');
        Route::get('/attribute/option/delete/{id}', [AttributeOptionController::class, 'attributeOptionDelete'])->name('attributeOptionDelete');


        //Report
        Route::get('/report', [ReportController::class, 'report'])->name('report');
        Route::get('/sale-report', [ReportController::class, 'saleReport'])->name('saleReport');
        Route::get('report-filter', [ReportController::class, 'reportFilter'])->name('reportFilter');

        //Inventory
        Route::get('/stock', [InventoryController::class, 'stock'])->name('stock');
        Route::get('/stock-out-product', [InventoryController::class, 'stockOutProduct'])->name('stockOutProducts');
        Route::get('/upcoming-stock-out-product', [InventoryController::class, 'upcomingStockOut'])->name('upcomingStockOutProducts');

        //Customer Info
        Route::get('/customer-info', [CustomerInfoController::class, 'customerInfo'])->name('customerInfo');

        //Api manage
        Route::get('/couriar-api', [Apicontroller::class, 'couriarApi'])->name('couriarApi');

        //General Setting
        Route::get('/general-setting', [GeneralController::class, 'generalSetting'])->name('generalSetting');
        Route::get('/media', [GeneralController::class, 'media'])->name('media');

        //Profile Setting
        Route::get('/profile-setting', [ProfileController::class, 'profileSetting'])->name('profileSetting');
        Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');
        Route::post('/password-update', [ProfileController::class, 'passwordUpdate'])->name('passwordUpdate');

        //Access Management for roles && Permission
        Route::resource('role-user', RollUserController::class);
        Route::resource('role-permission', RollPermissionController::class);
    }
);
