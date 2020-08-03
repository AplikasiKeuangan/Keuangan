<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelasiNamaKelasSiswa extends Model
{
    protected $table='relasi_nama_kelas_siswas';
    protected $primaryKey='id';
    protected $fillable=['nis','id_nama_kelas'];
    public function siswa(){
        return $this->belongsTo('App\Siswa','nis','nis');
    }
    public function namaKelas(){
        return $this->belongsTo('App\Nama_Kelas','id_nama_kelas','id');
    }
}
