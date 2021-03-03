<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TopController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::prefix('purchase')->name('purchase.')->group(function () {
        Route::get('/new', [PurchaseController::class, 'new'])->name('new');
        Route::post('/', [PurchaseController::class, 'create'])->name('create');
        Route::get('/thanks', [PurchaseController::class, 'thanks'])->name('thanks');
    });
});

Route::get('/', [TopController::class, 'index'])->name('top');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/', [CartController::class, 'create']);
    Route::delete('/', [CartController::class, 'delete'])->name('delete');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::get('/thanks', [CartController::class, 'thanks'])->name('thanks');
});

require __DIR__.'/auth.php';
