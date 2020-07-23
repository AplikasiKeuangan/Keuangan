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
Route::get('/jurusan/daftar_jurusan','JurusanController@daftar_jurusan')->name('daftar_jurusan');
Route::get('/jurusan/daftar_jurusan/hapus/{id}','JurusanController@destroy')->name('hapus_jurusan');
Route::get('/jurusan/daftar_jurusan/edit/{id}','JurusanController@edit')->name('edit');
Route::put('/jurusan/daftar_jurusan/update/{id}','JurusanController@update')->name('update');

Route::prefix('admin')->name('admin-')->middleware(['checkLoginStatus'])->group(function () {
    //siswa
    Route::prefix('siswa')->name('siswa-')->group(function () {
        Route::get('/', 'Admin\SiswaController@index')->name('index');
        Route::get('/get-data', 'Admin\SiswaController@data')->name('data');
        Route::post('/store', 'Admin\SiswaController@store')->name('store');
        Route::get('/{nis}/{nama_lengkap}/detail', 'Admin\SiswaController@detail');
        Route::get('/{nis}/{nama_lengkap}/edit', 'Admin\SiswaController@edit')->name('edit');
        Route::post('/{nis}/{nama_lengkap}/update', 'Admin\SiswaController@update')->name('update');
        Route::get('/{nis}/{nama_lengkap}/destroy', 'Admin\SiswaController@destroy')->name('destroy');
    });
    //kas
    Route::prefix('kas')->name('kas-')->group(function () {
        Route::get('/', 'Admin\KasController@index')->name('index');
        //tunai
        Route::prefix('tunai')->name('tunai-')->group(function () {
            Route::get('/', 'Admin\KasTunaiController@index')->name('index');
            Route::get('/get-data', 'Admin\KasTunaiController@data')->name('data');
        });
    });
});