<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Front\ProductDetail;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\PaymentsController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\ContactUsController;
use App\Http\Controllers\Front\FrontPageController;
use App\Http\Controllers\Front\StripeWebhooksController;

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
Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

});
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
        Route::post('/update', [CartController::class, 'update'])->name('update');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    });

    Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post('/stripe', [CheckoutController::class, 'storeStripe'])->name('store.stripe');
        Route::get('/paypal', [CheckoutController::class, 'storePaypal'])->name('store.paypal');
        Route::get('/paypal/success', [CheckoutController::class, 'paypalSuccess'])->name('paypal.success');
        Route::get('/paypal/cancel', [CheckoutController::class, 'paypalCancel'])->name('paypal.cancel');
    });

    Route::get('orders/{order}/pay', [PaymentsController::class, 'create'])->name('orders.payemnts.create');
    Route::post('orders/{order}/stripe/payment-intent', [PaymentsController::class, 'createStripePaymentIntent'])
    ->name('stripe.paymentIntent.create');

    Route::get('orders/{order}/pay/stripe/callback', [PaymentsController::class, 'confirm'])->name('stripe.return');

    Route::any('stripe/webhook', [StripeWebhooksController::class, 'handle'])->name('handle.stripe.webhook');
});
