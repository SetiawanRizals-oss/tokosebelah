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
    return view('kota.index_kota');
});
Route::get('/index','KotaController@index');
Route::post('/kota/add','KotaController@add');
Route::get('/kota/edit/{id}','KotaController@edit');
Route::post('/kota/update','KotaController@update');
Route::get('/kota/detail/{id}','KotaController@detail');
Route::get('/kota/delete/{id}','KotaController@delete');
Route::get('/kota/aktif/{id_aktif}','kotaController@aktif');