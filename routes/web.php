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


Route::get('/halamanutama', 'ProdukController@indexhu');
Route::post('/produk/add', 'ProdukController@add');
Route::get('/produk', 'ProdukController@index');
Route::get('/produk/{id}/edit', 'ProdukController@edit'); //method
Route::post('/produk/update', 'ProdukController@update'); //method
Route::get('/produk/detail/{id}', 'ProdukController@detail'); //method
Route::get('/produk/aktif/{id}', 'ProdukController@aktif'); //method
Route::get('/produk/destroy/{id}', 'ProdukController@destroy'); //method

Route::get('/', function () {
    return view('halamanutama');
});
Route::get('/index','KotaController@index');
Route::post('/kota/add','KotaController@add');
Route::get('/kota/edit/{id}','KotaController@edit');
Route::post('/kota/update','KotaController@update');
Route::get('/kota/detail/{id}','KotaController@detail');
Route::get('/kota/delete/{id}','KotaController@delete');
Route::get('/kota/aktif/{id_aktif}','kotaController@aktif');

Route::get('/toko','TokoController@index');
Route::post('toko/add','TokoController@add');
Route::get('toko/detail/{id}','TokoController@detail');
Route::get('toko/edit/{id}','TokoController@edit');
Route::get('toko/delete/{id}','TokoController@delete');
Route::post('toko/update','TokoController@update');
Route::get('toko/aktif/{id_aktif}','TokoController@aktif');


Route::get('/jenis_looks','JenisController@index');
Route::post('/jenis/add','JenisController@add');
Route::get('jenis/detail/{id}','JenisController@detail');
Route::get('jenis/edit/{id}','JenisController@edit');
Route::post('/jenis/update','JenisController@update');
Route::get('/jenis/destroy/{lets}','JenisController@destroy');
Route::get('/jenis/active/{is_darkness}','JenisController@dark');

