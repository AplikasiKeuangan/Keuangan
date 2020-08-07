<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table ='tagihans';
    protected $primaryKey='id_tagihan';
    
    public function tahun_ajaran(){
        return $this->hasOne('App\Tahun_Ajaran','id','id_tahun_ajaran');
    }
    public function kelas_kelas(){
        return $this->belongsTo('App\Kelas','id_kelas','id');
    }
}
