<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TopController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CartController;

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
});

Route::get('/', [TopController::class, 'index'])->name('top');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::post('/', [CartController::class, 'create']);
    Route::get('/thanks', [CartController::class, 'thanks'])->name('thanks');
});

require __DIR__.'/auth.php';
