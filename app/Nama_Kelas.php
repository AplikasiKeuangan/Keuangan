<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nama_Kelas extends Model
{
    protected $table='nama__kelas';
    protected $primaryKey='id';
    protected $fillable=['nama_kelas','deskripsi','status','kelas_id'];

    public function kelas(){
        return $this->hasOne('App\Kelas','id','kelas_id');
    }
}
