<?php

use App\Http\Controllers\Admin\Admin_panel_settingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Web\CartsController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'login');
Route::prefix('admin')->name('admin.')->middleware('auth', 'check_User')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    /* start Admin_panel_settings */
    Route::get('/admin_panel_settings/index', [Admin_panel_settingsController::class, 'index'])->name('admin_panel_settings.index');
    Route::get('/admin_panel_settings/edit', [Admin_panel_settingsController::class, 'edit'])->name('admin_panel_settings.edit');
    Route::post('/admin_panel_settings/update', [Admin_panel_settingsController::class, 'update'])->name('admin_panel_settings.update');

    /* end Admin_panel_settings */

    /* start users */

    Route::get('/users/index', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');

    /* end users */

    /* start product */

    Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    /* end product */

    /* start product */

    Route::get('/categories/index', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');

    /* end product */

});

Route::view('not-allowed', 'not_allowed');

Auth::routes();


/*                                      WEB                                       */



Route::get('/site', [HomeController::class, 'home'])->name('site.index');
Route::get('/shop/index', [HomeController::class, 'shop'])->name('site.shop');
Route::post('/shop/show', [HomeController::class, 'show'])->name('site.show');
Route::get('/shop/single_product/{id}', [HomeController::class, 'single_product'])->name('site.single_product');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('site.category');
Route::post('/add-to-cart', [CartsController::class, 'add_to_cart'])->name('site.add_to_cart');
Route::get('/cart', [CartsController::class, 'cart'])->name('site.cart')->middleware('auth');
Route::delete('/cart/{id}', [CartsController::class, 'delete_cart'])->name('site.delete_cart')->middleware('auth');
