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
})->name('welcome');

Auth::routes();
Route::get('/recovery-password', 'ChangePasswordController@index')->name('password-update');
Route::post('/password_update', 'ChangePasswordController@store');

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/admin/profile', 'HomeController@profile')->name('admin-profile');
Route::get('/admin/profile/edit', 'HomeController@profile_edit')->name('admin-profile-edit');
Route::post('/admin/profile/update', 'HomeController@profile_update')->name('admin-profile-update');
Route::get('/test', 'HomeController@test')->name('test');

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
            Route::get('/{id}/hapus', 'Admin\KategoriController@destroy')->name('hapus');
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
            Route::get('/{id}/hapus', 'Admin\KeuanganController@destroy')->name('hapus');
        });
    });

    Route::prefix('Data')->name('Data-')->group(function () {
        Route::prefix('users')->name('users-')->group(function () {
            Route::get('/menu', 'Admin\UserController@index1')->name('index1');
            Route::get('/', 'Admin\UserController@index')->name('index');
            Route::get('/get-data', 'Admin\UserController@data')->name('data');
            Route::post('/store', 'Admin\UserController@store')->name('store');
            Route::get('/{id}/edit', 'Admin\UserController@edit')->name('edit');
            Route::post('/{id}/update', 'Admin\UserController@update')->name('update');
            Route::get('/{id}/hapus', 'Admin\UserController@destroy')->name('hapus');
        });
    });
    Route::prefix('piutang')->name('piutang-')->group(function () {
        Route::prefix('transaksi')->name('transaksi-')->group(function () {
            Route::get('/', 'Admin\TransaksiController@index')->name('index');
            Route::get('/get-data', 'Admin\TransaksiController@data')->name('data');
            Route::post('/get-siswa', 'Admin\TransaksiController@siswa')->name('siswa');
            Route::post('/get-hutang', 'Admin\TransaksiController@hutang')->name('hutang');
            Route::post('/store', 'Admin\TransaksiController@store')->name('store');
            Route::get('/{id_transaksi}/hapus', 'Admin\TransaksiController@destroy')->name('hapus');
        });
        Route::prefix('tagihan')->name('tagihan-')->group(function () {
            Route::get('/', 'Admin\TagihanController@index')->name('index');
            Route::get('/get-data', 'Admin\TagihanController@data')->name('data');
            Route::post('/get-kelas', 'Admin\TagihanController@kelas')->name('kelas');
            Route::post('/store', 'Admin\TagihanController@store')->name('store');
            Route::get('/{id_tagihan}/hapus', 'Admin\TagihanController@destroy')->name('hapus');
        });
    });
    Route::prefix('tahun-ajaran')->name('tahun-ajaran-')->group(function(){
        Route::get('/', 'Admin\TahunAjaranController@index')->name('index');
        Route::get('/get-data', 'Admin\TahunAjaranController@data')->name('data');
        Route::post('/store', 'Admin\TahunAjaranController@store')->name('store');
        Route::prefix('{id_tahun_ajaran}')->group(function(){
            Route::get('/edit', 'Admin\TahunAjaranController@edit')->name('edit');
            Route::post('/update', 'Admin\TahunAjaranController@update')->name('update');
            Route::get('/delete', 'Admin\TahunAjaranController@destroy')->name('delete');
            Route::prefix('kelas')->name('kelas-')->group(function(){
                Route::get('/', 'Admin\KelasController@index')->name('index');
                Route::get('/get-data', 'Admin\KelasController@data')->name('data');
                Route::post('/store', 'Admin\KelasController@store')->name('store');
                Route::prefix('/{id_kelas}')->group(function(){
                    Route::get('/edit', 'Admin\KelasController@edit')->name('edit');
                    Route::post('/update', 'Admin\KelasController@update')->name('update');
                    Route::get('/delete', 'Admin\KelasController@destroy')->name('delete');
                    Route::prefix('nama-kelas')->name('nama-kelas-')->group(function(){
                        Route::get('/', 'Admin\NamaKelasController@index')->name('index');
                        Route::get('/get-data', 'Admin\NamaKelasController@data')->name('data');
                        Route::post('/store', 'Admin\NamaKelasController@store')->name('store');
                        Route::prefix('{id_nama_kelas}')->group(function(){
                            Route::get('/edit', 'Admin\NamaKelasController@edit')->name('edit');
                            Route::post('/update', 'Admin\NamaKelasController@update')->name('update');
                            Route::get('/delete', 'Admin\NamaKelasController@destroy')->name('delete');
                            Route::prefix('siswa')->name('siswa-')->group(function(){
                                Route::get('/', 'Admin\RelasiNamaKelasSiswaController@index')->name('index');
                                Route::get('/get-data', 'Admin\RelasiNamaKelasSiswaController@data')->name('data');
                                Route::post('/store', 'Admin\RelasiNamaKelasSiswaController@store')->name('store');
                                Route::prefix('{id_relasi}')->group(function(){
                                    Route::get('/delete', 'Admin\RelasiNamaKelasSiswaController@destroy')->name('delete');
                                });
                            });
                        });
                    });
                });
            });
        });
    });
});