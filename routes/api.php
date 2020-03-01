<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('recent-product', 'ApiController@renderProductView');
Route::get('find-product', 'ApiController@renderProductSearch');


Route::get('admin/transactions', 'TransactionController@index');
Route::get('admin/transactions/{id}', 'Home\HomeController@show');
Route::post('admin/transactions', 'Home\HomeController@store');
Route::put('admin/transactions/{id}', 'Home\HomeController@update');
Route::delete('admin/transactions/{id}', 'Home\HomeController@destroy');

