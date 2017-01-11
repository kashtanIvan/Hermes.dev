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


Route::get('/', ['as' => 'home', 'uses' => 'ShopController@index']);
Route::get('about', ['as' => 'about', 'uses' => 'ShopController@about']);

Route::group(['prefix' => 'categories'], function () {
    Route::get('man', ['as' => 'man', 'uses' => 'CategoryController@man']);
    Route::get('woman', ['as' => 'woman', 'uses' => 'CategoryController@woman']);
    Route::get('accessories', ['as' => 'accessories', 'uses' => 'CategoryController@accessories']);

});

Route::resource('product', 'ProductController');


