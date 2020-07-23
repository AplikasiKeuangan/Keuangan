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

// Jurusan
Route::get('/admin/jurusan', 'JurusanController@index');
Route::post('/admin/jurusan/tambah','JurusanController@store')->name('tambah');
Route::get('/admin/jurusan/daftar_jurusan','JurusanController@daftar_jurusan')->name('daftar_jurusan');
Route::get('/admin/jurusan/daftar_jurusan/hapus/{id}','JurusanController@destroy')->name('hapus_jurusan');
Route::get('/admin/jurusan/daftar_jurusan/edit/{id}','JurusanController@edit')->name('edit');
Route::put('/admin/jurusan/daftar_jurusan/update/{id}','JurusanController@update')->name('update');

// Kelas
Route::get('/admin/kelas', 'KelasController@index');
Route::post('/admin/kelas/tambah','KelasController@store')->name('tambah_kelas');
Route::get('/admin/kelas/daftar_kelas','KelasController@daftar_kelas')->name('daftar_kelas');
Route::get('/admin/kelas/daftar_kelas/hapus/{id}','KelasController@destroy')->name('hapus_kelas');
Route::get('/admin/kelas/daftar_kelas/edit/{id}','KelasController@edit')->name('edit');
Route::put('/admin/kelas/daftar_kelas/update/{id}','KelasController@update')->name('update');


Route::get('/admin/penerimaan/SPP','SPP@index')->name('index_SPP');




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
            Route::post('/store', 'Admin\KasTunaiController@store')->name('store');
            Route::get('/{id_kas_tunai}/hapus', 'Admin\KasTunaiController@destroy')->name('hapus');
        });
    });
});