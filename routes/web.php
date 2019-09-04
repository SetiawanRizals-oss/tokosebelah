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