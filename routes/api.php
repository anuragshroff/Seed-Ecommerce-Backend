<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/product/{id}', [ProductController::class, 'specificProduct']);
Route::get('/products/all/', [ProductController::class, 'allProduct']);