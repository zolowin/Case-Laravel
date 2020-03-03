<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

    Route::group(['prefix' => '/', 'middleware' => 'admin'], function (){
        Route::get('/',  'DashboardController@dashboard');
        Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

        Route::group(['prefix' => 'transactions', 'middleware' => 'admin'], function (){
            Route::get('/', function (){
                return view('admin.transactions');
            })->name('admin.transactions');
        });

        Route::get('/statistical', function (){
            return view('admin.statistical');
        })->name('admin.statistical');
    });

    //datatable
    Route::get('/tr-list','DatatableController@trData')->name('datatable.tr');
    Route::get('/cate-list', 'DatatableController@cateData')->name('datatable.cate');
    Route::get('/pro-list', 'DatatableController@proData')->name('datatable.pro');
    Route::get('/user-list', 'DatatableController@userData')->name('datatable.user');
    Route::get('/cateDel-list', 'DatatableController@getDeletedData')->name('datatable.cateDelData');

    //Category
    Route::group(['prefix' => 'category'], function (){
//        Route::get('/', 'CategoryController@index')->name('category.index');
//        Route::get('/create-category', 'CategoryController@create')->name('category.create');
        Route::post('/create-category', 'CategoryController@store')->name('category.store');
        Route::get('/edit-category/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/edit-category/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/destroy-category/{id}', 'CategoryController@destroy')->name('category.destroy');
        Route::get('/restore-category/{id}','CategoryController@restore')->name('category.restore');
    });

//Product
    Route::group(['prefix' => 'product', 'middleware' => 'admin' ], function (){
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/create-product', 'ProductController@create')->name('product.create');
        Route::post('/create-product', 'ProductController@store')->name('product.store');
        Route::get('/edit-product/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/edit-product/{id}', 'ProductController@update')->name('product.update');
        Route::get('/destroy-product/{id}', 'ProductController@destroy')->name('product.destroy');
    });
});

//Page
Route::get('/', 'PageController@index')->name('page.index');
//Route::get('/checkout','PageController@checkout')->name('checkout.shopping');
Route::get('/shop', 'PageController@shop')->name('page.shop');
Route::get('/product/{product_slug}', 'PageController@show_product')->name('page.show_product');
Route::post('cart','PageController@payment')->name('page.payment')->middleware('auth');
Route::get('/category/{category_alias}', 'PageController@category')->name('page.category');
Route::get('/find-product', 'PageController@find_product')->name('page.find_product');

//Cart
Route::group(['prefix' => 'shopping'],function (){
    Route::get('/ajaxadd/{id}/{qty}/{rowId}', 'ShoppingCartController@ajaxUpdateProduct')->name('ajaxUpdate.shopping.cart');
    Route::post('/add/{id}', 'ShoppingCartController@addProduct')->name('add.shopping.cart');
    Route::get('cart', 'ShoppingCartController@getListShoppingCart')->name('list.shopping.cart');
    Route::get('cart/delete/{rowId}','ShoppingCartController@remove')->name('remove.shopping.cart');
    Route::get('cart/destroy', 'ShoppingCartController@removeAll')->name('destroy.shopping.cart');
    Route::get('/checkout', 'ShoppingCartController@checkOut')->name('checkout.shopping');
    Route::post('/checkout', 'ShoppingCartController@payment')->name('payment.shopping');
    Route::get('/manage-transaction','ShoppingCartController@manageTransaction')->name('manageTransaction.shopping');
    //transaction
    Route::get('/edit-transaction/{id}', 'ShoppingCartController@editTransaction')->name('edit.transaction')    ;
    Route::post('/edit-transaction/{id}', 'ShoppingCartController@updateTransaction')->name('update.transaction');
});

//Auth

Auth::routes();
