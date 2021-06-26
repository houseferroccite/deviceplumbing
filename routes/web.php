<?php

use App\Http\Controllers\Admin\OrderSearchController;
use App\Http\Controllers\PDFList;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Auth::routes(['reset' => true, 'confirm' => true, 'verify' => true,
]);
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
Route::middleware(['auth'])->group(function () {

    Route::resource('accounts','AccountController');
    Route::group(['prefix'=>'person', 'namespace'=>'Person', 'as'=>'person.',
    ],function (){
        Route::get('/order/{userID}', 'OrderController@index')->name('orders.index');
        Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
        Route::get('/order/info/deleted_orders/{userID}', 'OrderController@OrderTrashed')->name('orders.OrderTrashed');
        Route::get('/order/forceDelete/{OrderID}', 'OrderController@forceDelete')->name('orders.forceDelete');
        Route::get('/order/restore/{OrderID}', 'OrderController@restore')->name('orders.restore');
        Route::get('/pdf/{order}', [PDFList::class, 'downloadPDF'])->name('pdf.generate');
        Route::resource('orders','OrderController');
        Route::resource('comment','CommentController');
    });

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'
    ],
        function () {
            Route::group(['middleware' => 'is_Admin'], function () {
                Route::get('/admPanel', 'AdminHomeController@index')->name('admPanel');
                Route::get('/orders', 'OrderController@index')->name('home');
                Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
                Route::post('/order/update/{id}', 'OrdersStatusController@update')->name('statusUpdate');
                Route::get('/detail/{category}/product/{product}', 'ProductController@productTrashed')->name('productTrashed');
                Route::get('/orderSearch/', [OrderSearchController::class,'searchID'])->name('searchID');
                Route::get('/searchStatus/', [OrderSearchController::class,'searchStatus'])->name('searchStatus');
                Route::get('/pdf_list', [PDFList::class, 'productPDF'])->name('product.pdf');
            });
            Route::resource('categories','CategoryController');
            Route::resource('products','ProductController');
            Route::resource('ordersStatus','OrdersStatusController');
            Route::resource('news','NewsController');
        }
    );
});
Route::get('/', 'MainController@index')->name('index');
Route::get('/searchProducts', 'MainController@indexSearch')->name('indexSearch');

Route::get('/categories', 'CategoryController@categories')->name('categories');
/*Basket*/
Route::group([
    'prefix' => 'basket'
], function () {
    Route::post('/add/{product}', 'BasketController@basketAdd')->name('basket-add');
    Route::group([
        'middleware' => 'basket_not_empty'
    ], function () {
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
        Route::post('/remove/{product}', 'BasketController@basketRemove')->name('basket-remove');
        Route::post('/confirm', 'BasketController@basketConfirm')->name('basket-confirm');

    });
});
Route::get('/categories/{category}', 'CategoryController@category')->name('category');
Route::get('/products/{products?}', 'ProductController@products')->name('products');
Route::get('/category/{product?}', 'ProductController@product')->name('product');
Route::get('/about', 'AboutController@about')->name('about');
Route::post('/SearchController', 'SearchController@search')->name('search');


