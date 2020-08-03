<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $timestamps = false;
    protected $table ='siswas';
    protected $primaryKey = 'nis';

    public function siswa(){
        return $this->hasMany('App\Nama_Kelas','nama_kode_id','id');
    }
    public function relasiNamaKelas(){
        return $this->hasMany('App\RelasiNamaKelasSiswa','nis','nis');
    }
}
