<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductcrudController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('', [ProductcrudController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::get('/crud', [ProductcrudController::class, 'index'])->name('index');
    Route::get('/create', [ProductcrudController::class, 'create'])->name('create');
    Route::post('/store', [ProductcrudController::class, 'store'])->name('store');
    Route::get('show/{product}', [ProductcrudController::class, 'show'])->name('show');
    Route::delete('/{product}', [ProductcrudController::class, 'destroy'])->name('destroy');
    Route::get('edit/{product}', [ProductcrudController::class, 'edit'])->name('edit');
    Route::put('edit/{product}', [ProductcrudController::class, 'update'])->name('update');




    Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/admin', [ProductsController::class, 'admin'])->name('admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


});





Route::get('/clearcart', [ProductsController::class, 'flushSession'])->name('clearcart');

Route::get('/index', [ProductsController::class, 'index']);
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
// Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');
Route::get('/order', [OrdersController::class, 'store'])->name('order');
Route::post('/storecart', [OrdersController::class, 'store'])->name('storecart');

Route::get('/order1', [OrderController::class, 'placeOrder'])->name('order1');


Route::get('/category', [ProductcrudController::class, 'category'])->name('category');


require __DIR__.'/auth.php';
