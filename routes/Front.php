<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProductDetail;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\ContactUsController;
use App\Http\Controllers\Front\FrontPageController;
use App\Http\Controllers\Front\FrontSettingController;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Auth::routes();
Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::group(['prefix' => 'front'], function () {

    Route::group(['prefix' => 'register', 'as' => 'register.'], function () {
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::post('store', [RegisterController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'page', 'as' => 'page.'], function () {
        Route::get('/', [FrontPageController::class, 'index'])->name('index');
        Route::get('show/{page}', [FrontPageController::class, 'show'])->name('show-front');
    });

    Route::group(['prefix' => 'ContactUs', 'as' => 'ContactUs.'], function () {
        Route::get('/', [ContactUsController::class, 'index'])->name('index');
        Route::post('store', [ContactUsController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'ProductDetail', 'as' => 'ProductDetail.'], function () {
        Route::get('/{id}', [ProductDetail::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/store', [CartController::class, 'store'])->name('store');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    });
});
