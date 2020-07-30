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

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');

// Nama Kelas
Route::get('/admin/nama_kelas', 'Nama_KelasController@index');
Route::post('/admin/nama_kelas/tambah','Nama_KelasController@store')->name('tambah');
Route::get('/admin/nama_kelas/daftar_nama_kelas','Nama_KelasController@daftar_nama_kelas')->name('daftar_nama_kelas');
Route::get('/admin/nama_kelas/daftar_nama_kelas/hapus/{id}','Nama_KelasController@destroy')->name('hapus_jurusan');
Route::get('/admin/nama_kelas/daftar_nama_kelas/edit/{id}','Nama_KelasController@edit')->name('edit');
Route::put('/admin/nama_kelas/daftar_nama_kelas/update/{id}','Nama_KelasController@update')->name('update');

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
        //bank
        Route::prefix('bank')->name('bank-')->group(function () {
            Route::get('/', 'Admin\KasBankController@index')->name('index');
            Route::get('/get-data', 'Admin\KasBankController@data')->name('data');
            Route::post('/store', 'Admin\KasBankController@store')->name('store');
            Route::get('/{id_kas_bank}/hapus', 'Admin\KasBankController@destroy')->name('hapus');
        });
    });

    Route::prefix('Data')->name('Data-')->group(function () {
        Route::prefix('kategori')->name('kategori-')->group(function () {
            Route::get('/', 'Admin\KategoriController@index')->name('index');
            Route::get('/get-data', 'Admin\KategoriController@data')->name('data');
            Route::post('/store', 'Admin\KategoriController@store')->name('store');
            Route::get('/{id}/edit', 'Admin\KategoriController@edit')->name('edit');
            Route::post('/{id}/update', 'Admin\KategoriController@update')->name('update');
            Route::get('/{id_kas_tunai}/hapus', 'Admin\KategoriController@destroy')->name('hapus');
        });
    });
    Route::prefix('Data')->name('Data-')->group(function () {
        Route::prefix('keuangan')->name('keuangan-')->group(function () {
            Route::get('/menu', 'Admin\KeuanganController@index1')->name('index1');
            Route::get('/', 'Admin\KeuanganController@index')->name('index');
            Route::get('/get-data', 'Admin\KeuanganController@data')->name('data');
            Route::post('/store', 'Admin\KeuanganController@store')->name('store');
            Route::get('/{id}/edit', 'Admin\KeuanganController@edit')->name('edit');
            Route::post('/{id}/update', 'Admin\KeuanganController@update')->name('update');
            Route::get('/{id_kas_tunai}/hapus', 'Admin\KeuanganController@destroy')->name('hapus');
        });
    });
    Route::prefix('Data')->name('Data-')->group(function () {
        Route::prefix('tahun_ajaran')->name('tahun_ajaran-')->group(function () {
            Route::get('/menu', 'Admin\KeuanganController@index1')->name('index1');
            Route::get('/', 'Admin\KeuanganController@index')->name('index');
            Route::get('/get-data', 'Admin\KeuanganController@data')->name('data');
            Route::post('/store', 'Admin\KeuanganController@store')->name('store');
            Route::get('/{id}/edit', 'Admin\KeuanganController@edit')->name('edit');
            Route::post('/{id}/update', 'Admin\KeuanganController@update')->name('update');
            Route::get('/{id_kas_tunai}/hapus', 'Admin\KeuanganController@destroy')->name('hapus');
        });
    });

});