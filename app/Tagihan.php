<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table ='tagihans';
    protected $primaryKey='id';
    protected $fillable=['nama','jumlah','wajib_semua','user_id'];
    
    
    
   
}
