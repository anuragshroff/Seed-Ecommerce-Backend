<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ApiOrderController;
use App\Http\Controllers\api\ApiProductController;
use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\ApiCartController;
use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiUserController;
use App\Http\Controllers\api\ApiWishlistController;
use App\Http\Controllers\api\ApiReviewController;

// Auth Routes
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [ApiAuthController::class, 'user'])->middleware('auth:sanctum');

// Product Routes
Route::get('/products', [ApiProductController::class, 'index']);
Route::get('/products/featured', [ApiProductController::class, 'featured']);
Route::get('/products/search', [ApiProductController::class, 'search']);
Route::get('/product/{id}', [ApiProductController::class, 'show'])->where('id', '[0-9]+');
Route::get('/product/{slug}', [ApiProductController::class, 'showBySlug']);
Route::get('/products/category/{id}', [ApiProductController::class, 'byCategory']);

// Category Routes
Route::get('/categories', [ApiCategoryController::class, 'index']);
Route::get('/category/{id}', [ApiCategoryController::class, 'show']);

// Cart Routes (Guest & Auth)
Route::post('/cart/add', [ApiCartController::class, 'add']);
Route::get('/cart', [ApiCartController::class, 'index']);
Route::put('/cart/{id}', [ApiCartController::class, 'update']);
Route::delete('/cart/{id}', [ApiCartController::class, 'remove']);
Route::delete('/cart', [ApiCartController::class, 'clear']);

// Order Routes
Route::post('/orders', [ApiOrderController::class, 'store']);
Route::get('/orders', [ApiOrderController::class, 'index'])->middleware('auth:sanctum');
Route::get('/orders/{id}', [ApiOrderController::class, 'show'])->middleware('auth:sanctum');
Route::put('/orders/{id}/cancel', [ApiOrderController::class, 'cancel'])->middleware('auth:sanctum');

// User Profile Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ApiUserController::class, 'profile']);
    Route::put('/profile', [ApiUserController::class, 'updateProfile']);
    Route::put('/profile/password', [ApiUserController::class, 'updatePassword']);
    
    // Wishlist Routes
    Route::get('/wishlist', [ApiWishlistController::class, 'index']);
    Route::post('/wishlist/{productId}', [ApiWishlistController::class, 'add']);
    Route::delete('/wishlist/{productId}', [ApiWishlistController::class, 'remove']);
    
    // Review Routes
    Route::post('/products/{id}/reviews', [ApiReviewController::class, 'store']);
    Route::get('/products/{id}/reviews', [ApiReviewController::class, 'index']);
});

// Settings & Config
Route::get('/settings', [ApiProductController::class, 'settings']);
Route::get('/shipping-methods', [ApiOrderController::class, 'shippingMethods']);
Route::get('/payment-methods', [ApiOrderController::class, 'paymentMethods']);