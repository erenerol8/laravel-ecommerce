<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\MainController as AdminMainController;


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

Route::group(['prefix' => 'yonetim', 'namespace' => 'Admin'], function () {
    Route::redirect('/', '/yonetim/oturumac');

    Route::match(['get', 'post'], '/oturumac', [AdminUserController::class, 'login'])->name('admin.login');
    Route::get('/oturumukapat', [AdminUserController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'adminmiddleware'], function () {
        Route::get('/main', [AdminMainController::class, 'index'])->name('admin.main');

        Route::group(['prefix' => 'kullanici'], function () {
            Route::match(['get', 'post'], '/', [AdminUserController::class, 'index'])->name('admin.user');
            Route::get('/olustur', [AdminUserController::class, 'form'])->name('admin.user.new');
            Route::get('/duzenle/{id}', [AdminUserController::class, 'form'])->name('admin.user.edit');
            Route::post('/kaydet/{id?}', [AdminUserController::class, 'save'])->name('admin.user.save');
            Route::get('/sil/{id}', [AdminUserController::class, 'delete'])->name('admin.user.delete');
        });

    });

    Route::get('/anasayfa', [AdminMainController::class, 'index'])->name('admin.main');
});


Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/urun/{slug_urunadi}', [ProductController::class, 'index'])->name('product');
Route::get('/kategori/{slug_kategoriadi}', [CategoryController::class, 'index'])->name('category');

Route::group(['prefix' => 'sepet'], function () {
    Route::get('/', [BasketController::class, 'index'])->name('basket');
    Route::post('/ekle', [BasketController::class, 'add'])->name('basket.add');
    Route::delete('/kaldir/{rowId}', [BasketController::class, 'remove'])->name('basket.remove');
    Route::delete('/bosalt', [BasketController::class, 'clear'])->name('basket.clear');
    Route::patch('/guncelle/{rowId}', [BasketController::class, 'update'])->name('basket.update');

});
Route::get('/odeme', [PaymentController::class, 'index'])->name('payment');
Route::match(['get', 'post'], '/odemeyap', [PaymentController::class, 'payment_process'])->name('payment_process');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/siparisler', [OrderController::class, 'index'])->name('order');
    Route::get('/siparisler/{id}', [OrderController::class, 'detail'])->name('detail');
});

Route::any('/ara', [ProductController::class, 'search'])->name('product_search');
Route::group(['prefix' => 'kullanici'], function () {
    Route::get('/oturumac', [UserController::class, 'login_form'])->name('user.login');
    Route::post('/oturumac', [UserController::class, 'login'])->name('user.login');
    Route::get('/kaydol', [UserController::class, 'signup_form'])->name('user.signup');
    Route::post('/kaydol', [UserController::class, 'signup'])->name('user.signup');
    Route::post('/oturumkapat', [UserController::class, 'signout'])->name('user.signout');
});
