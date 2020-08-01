<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table='kelas';
    protected $primaryKey='id';
    protected $fillable=['nama_kelas','status','tahun_ajaran_id'];

    public function tahun_ajaran(){
        return $this->hasOne('App\Tahun_Ajaran','id','tahun_ajaran_id');
    }
    public function nama_kelas(){
        return $this->hasMany('App\Nama_Kelas','kelas_id','id');
    }
    public function nama_combine(){
        return $this->hasOne('App\Siswa','id','nama_kelas_id');
    }
   
    
}
