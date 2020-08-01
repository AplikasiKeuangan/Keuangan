<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'nis';

    public function nama_kelas(){
        return $this->hasOne('App\Nama_Kelas','id','kelas_id');
    }
}
