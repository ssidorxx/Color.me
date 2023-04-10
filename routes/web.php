<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('main');
});


// контроллер главной страницы
Route::controller(\App\Http\Controllers\MainController::class)->group(function () {
    Route::get('/', 'index')->name('main.index');
    Route::get('/about', 'about')->name('about');
});

//маршрут для юзера
Route::controller(UserController::class)->group(function () {
    Route::get('/reg', 'create')->name('users.create');
    Route::post('/store', 'store')->name('users.store');
    Route::post('/login', 'loginCheck')->name('login.check');
    Route::get('/login', 'login')->name('login');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/filter', 'productsFilter')->name('products.filter');
    Route::get('/products/category/{category}', 'thisCategory')->name('products.thisCategory');
    Route::get('/products/{product}', 'show')->name('products.show');


    Route::get('/products/filter', 'productsFilter')->name('products.filter');
});

Route::middleware('auth')->group(function () {
    //контроллер для юзеров авторизированных
    Route::controller(UserController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/users/profile', 'show')->name('users.profile');
    });

    //контроллер корзины
    Route::controller(\App\Http\Controllers\BasketController::class)->group(function () {
//        Route::post('/basket/add/new', 'add')->name('basket.add.new');
        Route::prefix('basket')->name('basket.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/add', 'add')->name('add');
            Route::post('/decrease', 'decrease')->name('decrease');

            Route::delete('/delete/all', 'delete')->name('delete');
            Route::delete('/delete/{id}', 'destroy')->name('destroy');


        });
    });

    //контроллер для вопросов юзера
    Route::controller(\App\Http\Controllers\QuestionController::class)->group(function () {
        Route::post('/question/store', 'store')->name('question.store');
    });

    //контроллер для заказов юзеров
    Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{order}/update', 'confirmation')->name('confirmation');
            Route::get('/filter', 'ordersFilter')->name('filter');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{order}', 'show')->name('show');
            Route::get('/cancellation/{order}', 'cancelOrder')->name('cancelOrder');
        });
    });
});

