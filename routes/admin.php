<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ItemController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    // الاعدادات العامة
    Route::prefix('generalSetting')->controller(GeneralSettingController::class)->group(function(){
        Route::get('/', 'create')->name('generalSetting.create');
        Route::post('/activeManagement', 'activeManagement')->name('activeManagement.store');
        Route::post('/extra', 'extra')->name('extra.store');
        Route::post('/workHour', 'workHour')->name('workHour.store');
    });
    // قائمة المنتجات
    Route::prefix('items')->controller(ItemController::class)->group(function(){
        Route::get('/', 'create')->name('items.create');
    });
    // اضافة تصنيف
    Route::prefix('category')->controller(CategoryController::class)->group(function(){
        Route::post('/', 'store')->name('category.store');
        Route::get('/{id}', 'edit')->name('category.edit');
        Route::post('/{id}', 'update')->name('category.update');
    });
});
