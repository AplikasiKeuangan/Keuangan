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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');

// jurusan
Route::get('/jurusan', 'JurusanController@index');
Route::post('/jurusan/tambah','JurusanController@store')->name('tambah');

Route::prefix('admin')->name('admin-')->group(function () {
    //siswa
    Route::prefix('siswa')->name('siswa-')->group(function () {
        Route::get('/', 'Admin\SiswaController@index')->name('index');
        Route::get('/get-data', 'Admin\SiswaController@data')->name('data');
        Route::get('/{nis}/{nama_lengkap}/detail', 'Admin\SiswaController@detail');
        Route::post('/store', 'Admin\SiswaController@store')->name('store');
    });
});