<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TopController;
use \App\Http\Controllers\ProductController;

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
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

require __DIR__.'/auth.php';
