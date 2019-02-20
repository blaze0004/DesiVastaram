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


Route::group(['as' => 'admin.' ,'prefix' => 'admin'], function() {
	Route::resource('/', 'Admin\AdminController');
	Route::get('/sellers', 'Seller\SellerController@index')->name('sellers');
	Route::get('/buyers', 'Buyer\BuyerController@index')->name('buyers');
	Route::get('/trainers', 'Trainer\TrainerController@index')->name('trainers');
	Route::resource('/products', 'Product\ProductController');
	Route::resource('/category', 'Category\CategoryController');
	/*
	Route::post('/categories/create', 'Category\CategoryController@store')->name('categories.create');
	Route::get('/categories', 'Category\CategoryController@index');
	Route::get('/categories/create', 'Category\CategoryController@create');*/
});	

/*
Route::group([], function() {
	Route::resource('/seller', "Seller\SellerController");
});*/

Route::group([], function() {
	Route::resource('/buyer', "BuyerController");
});

Route::resource('/product', 'Product\ProductController');