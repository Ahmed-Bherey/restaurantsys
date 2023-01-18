<?php

use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\ExpenseSectionController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\TeamController;
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
    // اضافة اقسام للمصروفات
    Route::prefix('expenseSections')->controller(ExpenseSectionController::class)->group(function () {
        Route::get('/', 'create')->name('expenseSection.create');
        Route::post('/', 'store')->name('expenseSection.store');
        Route::get('/{id}', 'edit')->name('expenseSection.edit');
        Route::post('/{id}', 'update')->name('expenseSection.update');
        Route::get('/destroy/{id}', 'destroy')->name('expenseSection.destroy');
    });
    // الموردين
    Route::prefix('suppliers')->controller(SupplierController::class)->group(function () {
        Route::get('/', 'create')->name('supplier.create');
        Route::post('/', 'store')->name('supplier.store');
        Route::get('/{id}', 'edit')->name('supplier.edit');
        Route::post('/{id}', 'update')->name('supplier.update');
        Route::get('/destroy/{id}', 'destroy')->name('supplier.destroy');
    });
    // اضافة مصروفات
    Route::prefix('expenses')->controller(ExpenseController::class)->group(function () {
        Route::get('/', 'create')->name('expense.create');
        Route::post('/', 'store')->name('expense.store');
        Route::get('/{id}', 'edit')->name('expense.edit');
        Route::post('/{id}', 'update')->name('expense.update');
        Route::get('/destroy/{id}', 'destroy')->name('expense.destroy');
    });
    // فريق العمل
    Route::prefix('teams')->controller(TeamController::class)->group(function () {
        Route::get('/', 'create')->name('team.create');
        Route::post('/', 'store')->name('team.store');
        Route::get('/{id}', 'edit')->name('team.edit');
        Route::post('/{id}', 'update')->name('team.update');
        Route::get('/destroy/{id}', 'destroy')->name('team.destroy');
    });
    // مناطق التوصيل
    Route::prefix('delivery')->controller(DeliveryController::class)->group(function () {
        Route::get('/', 'create')->name('delivery.create');
        Route::post('/', 'store')->name('delivery.store');
        Route::get('/{id}', 'edit')->name('delivery.edit');
        Route::post('/{id}', 'update')->name('delivery.update');
        Route::get('/destroy/{id}', 'destroy')->name('delivery.destroy');
    });
    // الطلبات
    Route::prefix('order')->controller(OrderController::class)->middleware('client')->group(function () {
        Route::post('order', 'store')->name('order.store');
        Route::get('/destroy/{id}', 'destroy')->name('order.destroy');
    });
});
