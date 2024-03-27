<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MassageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Front\LogoController;
use App\Http\Controllers\ImageProductController;
use App\Http\Controllers\ProductColorController;

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
const pagination_count = '5';

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('update/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'color', 'as' => 'color.'], function () {
        Route::get('/', [ProductColorController::class, 'index'])->name('index');
        Route::get('create', [ProductColorController::class, 'create'])->name('create');
        Route::post('store', [ProductColorController::class, 'store'])->name('store');
        Route::get('edit/{color}', [ProductColorController::class, 'edit'])->name('edit');
        Route::put('update/{color}', [ProductColorController::class, 'update'])->name('update');
        Route::delete('destroy/{color}', [ProductColorController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'massage', 'as' => 'massage.'], function () {
        Route::get('/', [MassageController::class, 'index'])->name('index');
        Route::post('store', [MassageController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'page', 'as' => 'page.'], function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('create', [PageController::class, 'create'])->name('create');
        Route::post('store', [PageController::class, 'store'])->name('store');
        Route::get('edit/{page}', [PageController::class, 'edit'])->name('edit');
        Route::put('update/{page}', [PageController::class, 'update'])->name('update');
        Route::delete('destroy/{page}', [PageController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::get('edit/{setting}', [SettingsController::class, 'edit'])->name('edit');
        Route::put('update/{setting}', [SettingsController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'logo', 'as' => 'logo.'], function () {
        Route::get('/', [LogoController::class, 'index'])->name('index');
        Route::get('edit/{logo}', [LogoController::class, 'edit'])->name('edit');
        Route::put('update/{logo}', [LogoController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'ImageProduct', 'as' => 'ImageProduct.'], function () {
        Route::get('/', [ImageProductController::class, 'index'])->name('index');
        Route::get('create', [ImageProductController::class, 'create'])->name('create');
        Route::post('store', [ImageProductController::class, 'store'])->name('store');
        Route::get('edit/{ImageProduct}', [ImageProductController::class, 'edit'])->name('edit');
        Route::get('details/{details}', [ImageProductController::class, 'details'])->name('details');
        Route::put('update/{ImageProduct}', [ImageProductController::class, 'update'])->name('update');
        Route::delete('destroy/{ImageProduct}', [ImageProductController::class, 'destroy'])->name('destroy');
    });
});


