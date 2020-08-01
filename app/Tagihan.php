<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table ='tagihans';
    protected $primaryKey='id';
    protected $fillable=['nama','jumlah','wajib_semua','user_id'];
    
    public function tagihan(){
        return $this->belongsTo(Tagihan::class,'user_id','id');
    }
    
   
}
