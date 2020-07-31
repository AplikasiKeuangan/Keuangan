<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahun_Ajaran extends Model
{
    protected $table ='tahun__ajarans';
    protected $primaryKey='id';
    protected $fillable=['nama','tgl_mulai','tgl_selesai','is_active'];

    public function kelas(){
        return $this->hasMany('App\Kelas','tahun_ajaran_id','id');
    }
}
