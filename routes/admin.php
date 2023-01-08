<?php

use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TableController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    // الاعدادات العامة
    Route::prefix('generalSetting')->controller(GeneralSettingController::class)->group(function () {
        Route::get('/', 'create')->name('generalSetting.create');
        Route::post('/activeManagement', 'activeManagement')->name('activeManagement.store');
        Route::post('/extra', 'extra')->name('extra.store');
        Route::post('/workHour', 'workHour')->name('workHour.store');
    });
    // اضافة تصنيف
    Route::prefix('category')->controller(CategoryController::class)->group(function () {
        Route::post('/', 'store')->name('category.store');
        Route::get('/{id}', 'edit')->name('category.edit');
        Route::post('/{id}', 'update')->name('category.update');
        Route::get('/destroy/{id}', 'destroy')->name('category.destroy');
    });
    // قائمة المنتجات
    Route::prefix('items')->controller(ItemController::class)->group(function () {
        Route::get('/', 'show')->name('items.show');
        // اضافة منتج
        Route::get('/create', 'create')->name('items.create');
        Route::post('/', 'store')->name('items.store');
        Route::get('/{id}', 'edit')->name('items.edit');
        Route::post('/{id}', 'update')->name('items.update');
        Route::get('/destroy/{id}', 'destroy')->name('items.destroy');
    });
    // اضافة مناطق
    Route::prefix('areas')->controller(AreaController::class)->group(function () {
        Route::get('/', 'create')->name('area.create');
        Route::post('/', 'store')->name('area.store');
        Route::get('/{id}', 'edit')->name('area.edit');
        Route::post('/{id}', 'update')->name('area.update');
        Route::get('/destroy/{id}', 'destroy')->name('area.destroy');
    });
    // اضافة طاولات
    Route::prefix('tables')->controller(TableController::class)->group(function () {
        Route::get('/', 'create')->name('table.create');
        Route::post('/', 'store')->name('table.store');
        Route::get('/{id}', 'edit')->name('table.edit');
        Route::post('/{id}', 'update')->name('table.update');
        Route::get('/destroy/{id}', 'destroy')->name('table.destroy');
    });
});
