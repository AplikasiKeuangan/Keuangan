<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table='kategoris';
    protected $primaryKey='id';
    protected $fillable=['parent_id','nama_kategori'];

   public function keuangan()
   {
    return $this->belongsTo('App\Keuangan');
   }
}
