<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table='keuangans';
    protected $primaryKey='id';
    protected $fillable = ['tanggal','keterangan','jenis','nominal','kategori_id']; 

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
}
