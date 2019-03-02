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

Route::get('/', 'HomeController@getProducts')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-to-cart/{id}', 'HomeController@addToCart')->name('addToCart');

Route::get('/getItemAddByOne/{id}', 'HomeController@getItemAddByOne')->name('getItemAddByOne');

Route::get('/getItemRemoveByOne/{id}', 'HomeController@getItemRemoveByOne')->name('getItemRemoveByOne');

Route::get('/getItemRemoveAll/{id}', 'HomeController@getItemRemoveAll')->name('getItemRemoveAll');

Route::get('/cart', 'HomeController@getCart')->name('cart');

Route::get('/checkout', [
    'uses'=>'HomeController@getCheckout', 
    'middleware'=>'auth'
])->name('checkout');

Route::post('/postCheckout', [
    'uses'=>'HomeController@postCheckout', 
    'middleware'=>'auth'
])->name('postCheckout');
