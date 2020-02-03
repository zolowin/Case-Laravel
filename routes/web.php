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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Category
Route::group(['prefix' => 'category', 'middleware' => 'auth'], function (){
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::get('/create-category', 'CategoryController@create')->name('category.create');
    Route::post('/create-category', 'CategoryController@store')->name('category.store');
    Route::get('/edit-category/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/edit-category/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/destroy-category/{id}', 'CategoryController@destroy')->name('category.destroy');
});

//Product
Route::group(['prefix' => 'product', 'middleware' => 'auth'], function (){
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('/create-product', 'ProductController@create')->name('product.create');
    Route::post('/create-product', 'ProductController@store')->name('product.store');
    Route::get('/edit-product/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('/edit-product/{id}', 'ProductController@update')->name('product.update');
    Route::get('/destroy-product/{id}', 'ProductController@destroy')->name('product.destroy');
});

//Auth

Auth::routes();

