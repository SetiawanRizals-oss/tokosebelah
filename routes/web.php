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
    return view('Jenis.index_jenis');
});
Route::get('/jenis','JenisController@index');
Route::post('/jenis/add','JenisController@add');
Route::get('jenis/detail/{id}','JenisController@detail');
Route::get('jenis/edit/{id}','JenisController@edit');
Route::post('/jenis/update','JenisController@update');
Route::get('/jenis/destroy/{lets}','JenisController@destroy');
Route::get('/jenis/active/{is_darkness}','JenisController@dark');