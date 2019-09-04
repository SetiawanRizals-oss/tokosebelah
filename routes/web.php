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
    return view('welcome');
});

Route::post('/produk/add', 'ProdukController@add');
Route::get('/produk', 'ProdukController@index');
Route::get('/produk/{id}/edit', 'ProdukController@edit'); //method
Route::post('/produk/update', 'ProdukController@update'); //method