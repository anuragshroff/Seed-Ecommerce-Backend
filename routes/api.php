<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ApiOrderController;
use App\Http\Controllers\api\ApiProductController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/product/{id}', [ApiProductController::class, 'specificProduct']);
Route::get('/products/all/', [ApiProductController::class, 'allProduct']);
Route::get('/products/setting/', [ApiProductController::class, 'setting']);


Route::post('/api-orders', [ApiOrderController::class, 'placeOrder']);
Route::get('/product/{slug}', [ApiProductController::class, 'specificProduct']);