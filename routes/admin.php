<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


//маршрут для админа логин
Route::controller(\App\Http\Controllers\Admin\AdminController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginCheck')->name('login.check');

});

//Route::get('/main',[\App\Http\Controllers\Admin\AdminController::class, 'main'])->name('main');

// контроллер админа
Route::middleware('auth:admin')->group(function () {
    //контроллер для юзеров авторизированных
    Route::controller(\App\Http\Controllers\Admin\AdminController::class)->group(function () {
        Route::get('/main', 'main')->name('main');
        Route::get('/index', 'index')->name('index');
        Route::get('/reg', 'create')->name('create');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
        Route::post('/store', 'store')->name('store');
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::controller(\App\Http\Controllers\Admin\QuestionController::class)->group(function () {
        Route::get('/question', 'index')->name('question.index');
        Route::get('/question/filter', 'filter')->name('question.filter');

        Route::delete('/question/delete/{id}', 'destroy')->name('question.destroy');
        Route::get('/question/reject/{question}', 'rejectSatus')->name('question.reject');
        Route::patch('/question/{question}/update', 'update')->name('question.update');
        Route::get('/question/{question}/edit', 'edit')->name('question.edit');
    });

    Route::controller(\App\Http\Controllers\admin\CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories/store', 'store')->name('categories.store');
        Route::delete('/categories/delete/{category}', 'destroy')->name('categories.destroy');
        Route::patch('/categories/{category}/update', 'update')->name('categories.update');
        Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
        Route::get('/categories/{category}', 'thisCategory')->name('categories.thisCategory');
    });

    Route::controller(\App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::prefix('brand')->name('brand.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::delete('/delete/{brand}', 'destroy')->name('destroy');
            Route::patch('/{brand}/update', 'update')->name('update');
            Route::get('/{brand}/edit', 'edit')->name('edit');
            Route::get('/{brand}', 'thisBrand')->name('thisBrand');
        });
    });

    Route::controller(\App\Http\Controllers\admin\ProductController::class)->group(function () {
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::delete('/delete/{product}', 'destroy')->name('destroy');
            Route::patch('/{product}/update', 'update')->name('update');
            Route::get('/{product}/edit', 'edit')->name('edit');
        });
    });

    Route::controller(\App\Http\Controllers\admin\OrderController::class)->group(function () {
//        Route::get('/orders', 'index')->name('orders.index');
        Route::get('/orders/{order}/update', 'confirmation')->name('orders.confirmation');
        Route::get('/orders/filter', 'ordersFilter')->name('orders.filter');
        Route::get('/orders/show/{order}', 'show')->name('orders.show');
        Route::get('/orders/messageDelete/{order}', 'messageDelete')->name('orders.messageDelete');
        Route::post('/orders/commentDelOrder/{order}', 'commentDelOrder')->name('orders.delete');
    });
});
