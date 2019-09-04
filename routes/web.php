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
/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('toko/toko_index');
});*/
Route::get('/index','TokoController@index');
Route::post('toko/add','TokoController@add');
Route::get('toko/detail/{id}','TokoController@detail');
Route::get('toko/edit/{id}','TokoController@edit');
Route::get('toko/delete/{id}','TokoController@delete');
Route::post('toko/update','TokoController@update');
Route::get('toko/aktif/{id_aktif}','TokoController@aktif');


Route::get('/jenis','JenisController@index');
Route::post('/jenis/add','JenisController@add');
Route::get('jenis/detail/{id}','JenisController@detail');
Route::get('jenis/edit/{id}','JenisController@edit');
Route::post('/jenis/update','JenisController@update');
Route::get('/jenis/destroy/{lets}','JenisController@destroy');
Route::get('/jenis/active/{is_darkness}','JenisController@dark');

