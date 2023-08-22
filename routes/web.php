<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/urun/{slug_urunadi}', [ProductController::class, 'index'])->name('product');
Route::get('/sepet', [BasketController::class, 'index'])->name('basket');
Route::get('/kategori/{slug_kategoriadi}', [CategoryController::class, 'index'])->name('category');
Route::get('/odeme', [PaymentController::class, 'index'])->name('payment');
Route::get('/siparisler', [OrderController::class, 'index'])->name('order');
Route::get('/siparisler/{id}', [OrderController::class, 'detail'])->name('detail');
Route::any('/ara', [ProductController::class, 'search'])->name('product_search');
Route::group(['prefix' => 'kullanici'], function () {
    Route::get('/oturumac', [UserController::class, 'login_form'])->name('user.login');
    Route::get('/kaydol', [UserController::class, 'signup_form'])->name('user.signup');
});
