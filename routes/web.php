<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/admin/products', App\Http\Controllers\Admin\ProductController::class);

Route::get('/admin/products/{id}/images', [App\Http\Controllers\Admin\ProductImageController::class, 'index']);
Route::post('/admin/products/{id}/images', [App\Http\Controllers\Admin\ProductImageController::class, 'store']);
Route::delete('/admin/products/{id}/images', [App\Http\Controllers\Admin\ProductImageController::class, 'destroy']); 
Route::get('/admin/products/{id}/images/select/{image}', [App\Http\Controllers\Admin\ProductImageController::class, 'featured']); 

Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show']);

//Cart Detail
Route::post('/cart', [App\Http\Controllers\CartDetailController::class, 'store']);
Route::delete('/cart', [App\Http\Controllers\CartDetailController::class, 'destroy']);
//Cart - Order - Pedido
Route::post('/order', [App\Http\Controllers\CartController::class, 'update']);