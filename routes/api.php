<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// ✅ API routes should NOT require authentication!
Route::get('/products', [ProductController::class, 'showproducts']);
Route::post('/product', [ProductController::class, 'storeproduct']);
Route::put('/product/{id}', [ProductController::class, 'updateproduct']);
Route::delete('/product/{id}', [ProductController::class, 'destroyproduct']);
