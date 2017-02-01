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

Route::group(['prefix' => 'categories'], function () {
    Route::get('man', ['as' => 'man', 'uses' => 'CategoryController@man']);
    Route::get('woman', ['as' => 'woman', 'uses' => 'CategoryController@woman']);
    Route::get('accessories', ['as' => 'accessories', 'uses' => 'CategoryController@accessories']);
    Route::get('about', ['as' => 'about', 'uses' => 'ShopController@about']);
});

Route::group(['middleware' => 'login'], function () {
    Route::resource('product', 'ProductController');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);

});
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegisterForm']);
Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@createUser']);

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@loginUser']);

Route::get('password/reset', ['as' => 'password/reset', 'uses' => 'Auth\ForgotPasswordController@index']);
Route::post('password/email', ['as' => 'password/email', 'uses' => 'Auth\ForgotPasswordController@sendPasswordEmail']);

Route::get('/add', ['as' => 'addsImage', 'uses' => 'ShopController@showFormImg']);
Route::post('/add', ['as' => 'addsImage', 'uses' => 'ShopController@postAddImg']);

Route::resource('checkout', 'CheckoutController');

