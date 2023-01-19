<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Web\ClientController;

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

// login & logout Admin
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'loginForm')->name('login.form');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});
// login & logout Client
Route::controller(ClientController::class)->prefix('web')->group(function () {
    Route::get('login', 'loginForm')->name('client.login.form');
    Route::post('login', 'login')->name('client.login');
    Route::get('register', 'registerForm')->name('client.register.form');
    Route::post('register', 'register')->name('client.register');
    Route::get('logout', 'logout')->name('client.logout');
});

Route::controller(HomeController::class)->group(function () {
    // الرئيسية
    Route::get('/', 'index')->name('web.index');
    // تأكيد الطلب
    Route::get('/order', 'order')->name('web.order')->middleware('checkOrder');
});









// Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
