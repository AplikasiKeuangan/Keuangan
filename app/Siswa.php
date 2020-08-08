<?php

namespace App;

use Illuminate\Foundation\Auth\User as Model;

class Siswa extends Model
{
    protected $table ='siswas';
    protected $primaryKey = 'nis';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
     return $this->password;
    }

    public function siswa(){
        return $this->hasMany('App\Nama_Kelas','nama_kode_id','id');
    }
    public function relasiNamaKelas(){
        return $this->hasMany('App\RelasiNamaKelasSiswa','nis','nis');
    }
}
