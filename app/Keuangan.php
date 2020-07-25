<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table='keuangans';
    protected $primaryKey='id';
    protected $fillable = ['tanggal','keterangan','jenis','nominal']; 

    public function kategori()
    {
        return $this->hasOne('App\Kategori');
    }
}
