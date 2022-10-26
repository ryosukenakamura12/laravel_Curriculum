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

Route::get('/',  'HomeController@shop_all')->name('shop_all');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// shop

Route::get('/shop_reg', 'HomeController@shop_reg')->name('shop_reg');

Route::get('/shop_alt/{id}', 'HomeController@shop_alt')->name('shop_alt');

Route::post('/shops', 'HomeController@shops')->name('shops');

Route::get('/shop_all', 'HomeController@shop_all')->name('shop_all');

Route::post('/shop_update', 'HomeController@shop_update')->name('shop_update');

Route::post('/shop_delete', 'HomeController@shop_delete')->name('shop_delete');

Route::post('/shop_delete', 'HomeController@shop_delete')->name('shop_delete');

Route::get('/shop_owner', 'HomeController@shop_owner')->name('shop_owner');




// product

Route::get('/product_all/{id}', 'HomeController@product_all')->name('product_all');

Route::get('/product_alt/{id}', 'HomeController@product_alt')->name('product_alt');

Route::get('/product_reg/{id}', 'HomeController@product_reg')->name('product_reg');

Route::post('/products', 'HomeController@products')->name('products');

Route::post('/product_update', 'HomeController@product_update')->name('product_update');

Route::post('/product_buy', 'HomeController@product_buy')->name('product_buy');

Route::post('/product_delete', 'HomeController@product_delete')->name('product_delete');

Route::get('/product_detail/{id}', 'HomeController@product_detail')->name('product_detail');

Route::get('/product_csv/{id}', 'HomeController@product_csv')->name('product_csv');
