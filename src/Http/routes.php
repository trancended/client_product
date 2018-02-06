<?php

Route::get('/', function () {
     return view('trancended-clientproduct::main');
});

Route::get('/products', 'ProductController@getAllProducts');

Route::get('/product', 'ProductController@getInputProduct');
Route::post('/product', 'ProductController@postOneProduct');

Route::get('/product/create', 'ProductController@getCreateProduct');
Route::post('/product/create', 'ProductController@postCreateProduct');

Route::get('/product/update', 'ProductController@getUpdateProduct');
Route::post('/product/update', 'ProductController@postUpdateProduct');
Route::put('/product/update', 'ProductController@putUpdateProduct');

Route::get('/product/remove', 'ProductController@getRemoveProduct');
Route::post('/product/remove', 'ProductController@postRemoveProduct');
Route::delete('/product/remove', 'ProductController@deleteRemoveProduct');
