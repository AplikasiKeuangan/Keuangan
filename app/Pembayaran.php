<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table ='pembayarans';
    protected $primaryKey='id_pembayaran';
    public function tagihan(){
        return $this->hasOne('App\Tagihan','id_tagihan','id_tagihan');
    }
    public function siswa(){
        return $this->hasOne('App\Siswa','nis','id_siswa');
    }
}
