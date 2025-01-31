<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard'); // Assure-toi d'avoir une vue 'dashboard.blade.php'
})->middleware('auth')->name('dashboard');


/* Backend Dashboard Route */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('backend.layout.app'); // Charge le layout principal hey app.blade.php
    })->name('admin.dashboard');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class);


Route::middleware('auth:sanctum')->get('/admin/show-dashboard', [DashboardController::class, 'show'])->name('dashboard.show');



Route::middleware('auth:sanctum')->get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::middleware('auth:sanctum')->get('/admin/product', [ProductController::class, 'create'])->name('products.create');
Route::middleware('auth:sanctum')->post('/admin/product', [ProductController::class, 'store'])->name('products.store');
Route::middleware('auth:sanctum')->get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::middleware('auth:sanctum')->put('/admin/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::middleware('auth:sanctum')->delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::middleware('auth:sanctum')->get('/admin/products_categories', [ProductCategoryController::class, 'index'])->name('product_categories.index');
Route::middleware('auth:sanctum')->get('/admin/product_categories', [ProductCategoryController::class, 'create'])->name('product_categories.create');
Route::middleware('auth:sanctum')->post('/admin/product_categories', [ProductCategoryController::class, 'store'])->name('product_categories.store');
Route::middleware('auth:sanctum')->get('/admin/product_categories/{id}/edit', [ProductCategoryController::class, 'edit'])->name('product_categories.edit');
Route::middleware('auth:sanctum')->put('/admin/product_categories/{id}', [ProductCategoryController::class, 'update'])->name('product_categories.update');
Route::middleware('auth:sanctum')->delete('/admin/product_categories/{id}', [ProductCategoryController::class, 'destroy'])->name('product_categories.destroy');