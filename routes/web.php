<?php

use App\Http\Controllers\admin\Apicontroller;
use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\AttributeOptionController;
use App\Http\Controllers\admin\CustomerInfoController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GeneralController;
use App\Http\Controllers\admin\InventoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PosController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\RollPermissionController;
use App\Http\Controllers\admin\RollUserController;
use App\Http\Controllers\admin\TemplateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
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






        //pos
        Route::resource('pos', PosController::class);
        Route::get('/products/search', [PosController::class, 'search'])->name('products.search');
        Route::post('/pos-order', [PosController::class, 'posOrder'])->name('posorders.store');



        //product
        //Route::resource('product', ProductController::class);

        Route::delete('/product/{product}/review-image', [ProductController::class, 'deleteReviewImage'])->name('product.deleteReviewImage');




        // Group the routes under a middleware if authentication is required


        Route::middleware(['auth:web'])->group(function () {

            //Dashboard

            Route::get('/dashboard', [DashboardController::class, 'dashboard'])
                ->name('dashboard')
                ->middleware('permission:Dashboard View');


            //order
            Route::get('/order', [OrderController::class, 'order'])->name('order');
            Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
            Route::get('/order-filter', [OrderController::class, 'orderFilter'])->name('order.filter');
            Route::get('/order-view/{id}', [OrderController::class, 'orderView'])->name('order.view');
            Route::get('/order/print/{id}', [OrderController::class, 'print'])->name('order.print');
            Route::get('/order/{id}/download-pdf', [OrderController::class, 'downloadPDF'])->name('order.downloadPDF');
            Route::get('/order/{id}/delete', [OrderController::class, 'delete'])->name('order.delete');
            Route::post('/orders/bulk-delete', [OrderController::class, 'bulkDelete'])->name('order.bulkDelete');
            Route::get('/download-bulk-pdf', [OrderController::class, 'downloadBulkPdf'])->name('download.bulkpdf');



            //Product  Permission-based access control for ProductController actions
            Route::get('product', [ProductController::class, 'index'])
                ->name('product.index')
                ->middleware('permission:Product View');

            Route::get('product/create', [ProductController::class, 'create'])
                ->name('product.create')
                ->middleware('permission:Product Create');

            Route::post('product', [ProductController::class, 'store'])
                ->name('product.store')
                ->middleware('permission:Product Create');

            Route::get('product/{product}', [ProductController::class, 'show'])
                ->name('product.show')
                ->middleware('permission:Product View');

            Route::get('product/{product}/edit', [ProductController::class, 'edit'])
                ->name('product.edit')
                ->middleware('permission:Product Edit');

            Route::put('product/{product}', [ProductController::class, 'update'])
                ->name('product.update')
                ->middleware('permission:Product Update');

            Route::delete('product/{product}', [ProductController::class, 'destroy'])
                ->name('product.destroy')
                ->middleware('permission:Product Delete');

            //create product template
            Route::get('create-product-template/{id}', [ProductController::class, 'createProductTemplate'])->name('createProductTemplate');



            //Access Management for roles && Permission
            Route::resource('role-user', RollUserController::class)->middleware('permission:Administration');
            Route::resource('role-permission', RollPermissionController::class)->middleware('permission:Administration');
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

        Route::get('/order-report-pdf', [ReportController::class, 'orderReportPdf'])->name('orderReportPdf');


        Route::get('report-filter', [ReportController::class, 'reportFilter'])->name('reportFilter');
        Route::get('sale-filter', [ReportController::class, 'saleFilter'])->name('saleFilter');

        //Stock Inventory
        Route::get('/stock', [InventoryController::class, 'stock'])->name('stock');
        Route::get('/stock-out-product', [InventoryController::class, 'stockOutProduct'])->name('stockOutProducts');
        Route::get('/upcoming-stock-out-product', [InventoryController::class, 'upcomingStockOut'])->name('upcomingStockOutProducts');

        //Customer Info
        Route::get('/customer-info', [CustomerInfoController::class, 'customerInfo'])->name('customerInfo');

        //Api Setting
        Route::get('/couriar-api', [Apicontroller::class, 'couriarApi'])->name('couriarApi');
        Route::get('/send-steadfast/{id}', [ApiController::class, 'sendSteadfast'])->name('sendSteadfast');
        Route::post('/api-store', [Apicontroller::class, 'apiStore'])->name('api.store');

        //General Setting
        Route::get('/general-setting', [GeneralController::class, 'generalSetting'])->name('generalSetting');
        Route::post('/general-setting/store', [GeneralController::class, 'store'])->name('generalSetting.store');
        Route::get('/media', [GeneralController::class, 'media'])->name('media');
        Route::post('/upload-media', [GeneralController::class, 'uploadMedia'])->name('uploadMedia');
        Route::get('/marketing', [GeneralController::class, 'marketing'])->name('marketing');

        //Profile Setting
        Route::get('/profile-setting', [ProfileController::class, 'profileSetting'])->name('profileSetting');
        Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');
        Route::post('/password-update', [ProfileController::class, 'passwordUpdate'])->name('passwordUpdate');
    }
);
