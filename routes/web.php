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
Route::get('api/product/{product}', [ProductController::class, 'api']);
Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {


        //product
        //Route::resource('product', ProductController::class);



        // Group the routes under a middleware if authentication is required


        Route::middleware(['auth:web'])->group(function () {

            //Dashboard

            Route::get('/dashboard', [DashboardController::class, 'dashboard'])
                ->name('dashboard')
                ->middleware('permission:Dashboard View');


            //order
            Route::get('/order', [OrderController::class, 'order'])->name('order')->middleware('permission:Order View');
            Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('order.updateStatus')->middleware('permission:Order View');
            Route::get('/order-filter', [OrderController::class, 'orderFilter'])->name('order.filter')->middleware('permission:Order View');
            Route::get('/order-view/{id}', [OrderController::class, 'orderView'])->name('order.view')->middleware('permission:Order View');
            Route::get('/order/print/{id}', [OrderController::class, 'print'])->name('order.print')->middleware('permission:Order View');
            Route::get('/order/{id}/download-pdf', [OrderController::class, 'downloadPDF'])->name('order.downloadPDF')->middleware('permission:Order View');
            Route::get('/order/{id}/delete', [OrderController::class, 'delete'])->name('order.delete')->middleware('permission:Order View');
            Route::post('/orders/bulk-delete', [OrderController::class, 'bulkDelete'])->name('order.bulkDelete')->middleware('permission:Order View');
            Route::get('/download-bulk-pdf', [OrderController::class, 'downloadBulkPdf'])->name('download.bulkpdf')->middleware('permission:Order View');


            //pos
            Route::resource('pos', PosController::class)->middleware('permission:Pos View');
            Route::get('/products/search', [PosController::class, 'search'])->name('products.search')->middleware('permission:Pos View');
            Route::post('/pos-order', [PosController::class, 'posOrder'])->name('posorders.store')->middleware('permission:Pos View');



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


            //Product status changed

            Route::post('/product/toggle-status', [ProductController::class, 'toggleStatus'])->name('product.toggleStatus')->middleware('permission:Product View');

            //create product template
            Route::get('create-product-template/{id}', [ProductController::class, 'createProductTemplate'])->name('createProductTemplate')->middleware('permission:Product Create');

            //Delete Review Image

            Route::delete('/product/{product}/review-image', [ProductController::class, 'deleteReviewImage'])->name('product.deleteReviewImage')->middleware('permission:Product Delete');


            //Template
            //Route::resource('template', TemplateController::class);

            //Product  Permission-based access control for ProductController actions
            Route::get('template', [TemplateController::class, 'index'])
                ->name('template.index')
                ->middleware('permission:Template View');

            Route::get('template/create', [TemplateController::class, 'create'])
                ->name('template.create')
                ->middleware('permission:Template Create');

            Route::post('template', [TemplateController::class, 'store'])
                ->name('template.store')
                ->middleware('permission:Template Create');

            Route::get('template/{template}', [TemplateController::class, 'show'])
                ->name('template.show')
                ->middleware('permission:Template View');

            Route::get('template/{template}/edit', [TemplateController::class, 'edit'])
                ->name('template.edit')
                ->middleware('permission:Template Edit');

            Route::put('template/{template}', [TemplateController::class, 'update'])
                ->name('template.update')
                ->middleware('permission:Template Update');

            Route::delete('template/{template}', [TemplateController::class, 'destroy'])
                ->name('template.destroy')
                ->middleware('permission:Template Delete');


            //Attribute

            Route::get('/attribute', [AttributeController::class, 'attribute'])->name('attribute')->middleware('permission:Attribute View');
            Route::get('/create-attribute', [AttributeController::class, 'createAttribute'])->name('createAttribute')->middleware('permission:Attribute Create');
            Route::post('/attribute-store', [AttributeController::class, 'attributeStore'])->name('attributeStore')->middleware('permission:Attribute Create');
            Route::get('/edit/attribute/{id}', [AttributeController::class, 'editAttribute'])->name('editAttribute')->middleware('permission:Attribute Edit');
            Route::post('/update/attribute', [AttributeController::class, 'updateAttribute'])->name('updateAttribute')->middleware('permission:Attribute Update');
            Route::get('/delete/attribute/{id}', [AttributeController::class, 'deleteAttribute'])->name('deleteAttribute')->middleware('permission:Attribute Delete');


            //Attribute Option

            Route::get('/create/attribute/option/{id}', [AttributeOptionController::class, 'createAtributeOption'])->name('createAtributeOption')->middleware('permission:Attribute Create');
            Route::post('/attribute/option/store', [AttributeOptionController::class, 'storeAtributeOption'])->name('storeAtributeOption')->middleware('permission:Attribute Create');
            Route::get('/attribute/option/edit/{id}', [AttributeOptionController::class, 'attributeOptionEdit'])->name('attributeOptionEdit')->middleware('permission:Attribute Edit');
            Route::post('/attribute/option/update', [AttributeOptionController::class, 'attributeOptionUpdate'])->name('attributeOptionUpdate')->middleware('permission:Attribute Update');
            Route::get('/attribute/option/delete/{id}', [AttributeOptionController::class, 'attributeOptionDelete'])->name('attributeOptionDelete')->middleware('permission:Attribute Delete');


            //Report
            Route::get('/report', [ReportController::class, 'report'])->name('report')->middleware('permission:Report Order Report');
            Route::get('/sale-report', [ReportController::class, 'saleReport'])->name('saleReport')->middleware('permission:Report Sale Report');
            Route::get('/order-report-pdf', [ReportController::class, 'orderReportPdf'])->name('orderReportPdf')->middleware('permission:Report Order Report');

            Route::get('report-filter', [ReportController::class, 'reportFilter'])->name('reportFilter');
            Route::get('sale-filter', [ReportController::class, 'saleFilter'])->name('saleFilter');


            //Stock Inventory
            Route::get('/stock', [InventoryController::class, 'stock'])->name('stock')->middleware('permission:Inventory Stock');
            Route::get('/stock-out-product', [InventoryController::class, 'stockOutProduct'])->name('stockOutProducts')->middleware('permission:Inventory Stock Out Products');
            Route::get('/upcoming-stock-out-product', [InventoryController::class, 'upcomingStockOut'])->name('upcomingStockOutProducts')->middleware('permission:Inventory Upcoming Stock Out Products');

            //Customer Info
            Route::get('/customer-info', [CustomerInfoController::class, 'customerInfo'])->name('customerInfo')->middleware('permission:Customer Customer');


            //Api Setting
            Route::get('/couriar-api', [Apicontroller::class, 'couriarApi'])->name('couriarApi');
            Route::get('/send-steadfast/{id}', [ApiController::class, 'sendSteadfast'])->name('sendSteadfast');
            Route::post('/api-store', [Apicontroller::class, 'apiStore'])->name('api.store');

            //Marketing  
            Route::get('/marketing', [GeneralController::class, 'marketing'])->name('marketing')->middleware('permission:Marketing Marketing');

            //General Setting
            Route::get('/general-setting', [GeneralController::class, 'generalSetting'])->name('generalSetting')->middleware('permission:Setting General Setting');
            Route::post('/general-setting/store', [GeneralController::class, 'store'])->name('generalSetting.store')->middleware('permission:Setting General Setting');
            Route::get('/media', [GeneralController::class, 'media'])->name('media')->middleware('permission:Setting General Media');
            Route::post('/upload-media', [GeneralController::class, 'uploadMedia'])->name('uploadMedia')->middleware('permission:Setting General Media');



            //Access Management for roles && Permission
            Route::resource('role-user', RollUserController::class)->middleware('permission:Administration');
            Route::resource('role-permission', RollPermissionController::class)->middleware('permission:Administration');
        });
























        //Profile Setting
        Route::get('/profile-setting', [ProfileController::class, 'profileSetting'])->name('profileSetting');
        Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');
        Route::post('/password-update', [ProfileController::class, 'passwordUpdate'])->name('passwordUpdate');
    }
);
