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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/trainers', 'Admin\AdminTrainerController');

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {
	Route::resource('/', 'Admin\AdminController');
	Route::get('/sellers', 'Seller\SellerController@index')->name('sellers');
	Route::get('/buyers', 'Buyer\BuyerController@index')->name('buyers');
	Route::get('/trainers', 'Trainer\TrainerController@index')->name('trainers');
	Route::get('/products', 'Product\ProductController@index')->name('products');
	Route::get('/categories', 'Category\CategoryController@index')->name('categories');
});	

Route::resource('/seller/products', 'Seller\SellerProductController');
Route::resource('/seller/orders', 'Seller\SellerOrderController');
Route::resource('/seller/payments', 'Seller\SellerPaymentController');

/*
Route::group([], function() {
	Route::resource('/seller', "Seller\SellerController");
});*/

Route::group([], function() {
	Route::resource('/buyer', "BuyerController");
});

Route::group([], function() {
	Route::resource('/trainer', "TrainerController");
});

Route::resource('/product', 'Product\ProductController');