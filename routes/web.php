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


Auth::routes();


Route::group(['middleware' => 'auth'], function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::get('/prepaid/trash', 'PrepaidController@trash')->name('prepaid.trash');
    Route::get('/prepaid/{id}/restore', 'PrepaidController@restore')->name('prepaid.restore');
    Route::get('/prepaid/{id}/permanentdelete', 'PrepaidController@permanentDelete')->name('prepaid.permanentdelete');
    
    
    Route::get('/order/create','OrderController@create')->name('order.create');
    Route::post('/order/store', 'OrderController@store')->name('order.store');
    Route::post('/order/storeproduct', 'OrderController@storeproduct')->name('order.storeproduct');
    Route::get('/order/show/{id}', 'OrderController@show')->name('order.show');
    Route::get('/order/detail', 'OrderController@detail')->name('order.detail');
    Route::get('/order/payment', 'OrderController@payment')->name('order.payment');
    Route::post('/order/proses', 'OrderController@proses')->name('order.proses');
    Route::post('/order/success', 'OrderController@success')->name('order.success');
    Route::get('/order/paymentstore', 'OrderController@paymentstore')->name('order.paymentstore');
    Route::get('/order/unpaidorder', 'OrderController@unpaidorder')->name('order.unpaid');
    Route::get('/order/product', 'OrderController@productorder')->name('order.product');
    Route::get('/order/history', 'OrderController@orderhistory')->name('order.history');
    Route::post('/order/prosesshipping/{id}', 'OrderController@prosesshipping')->name('order.prosesshipping');
   
   


    Route::get('/product/trash', 'ProductController@trash')->name('product.trash');
    Route::get('/product/{id}/restore', 'ProductController@restore')->name('product.restore');
    Route::get('/product/{id}/permanentdelete', 'ProductController@permanentdelete')->name('product.permanentdelete');
    Route::get('/product/orderpage', 'ProductController@orderpage')->name('product.orderpage');

    

    Route::resource('prepaid','PrepaidController');
    Route::resource('product','ProductController');


});


