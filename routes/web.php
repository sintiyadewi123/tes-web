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

Route::get('/', 'KaryawanController@index');
Route::get('/karyawan/input', 'KaryawanController@input');
Route::post('/karyawan/create', 'KaryawanController@store');


Route::get('/karyawan/{id}/edit', 'KaryawanController@edit');
Route::post('/karyawan/{id}/update', 'KaryawanController@update');
Route::get('/karyawan/{id}/delete', 'KaryawanController@delete');


Route::get('/karyawan/search','KaryawanController@search');
Route::get('/karyawan/periode','KaryawanController@periode');