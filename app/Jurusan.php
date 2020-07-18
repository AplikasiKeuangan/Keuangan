<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table='jurusan';
    protected $primaryKey='id_jurusan';
    protected $fillable=['parent_id','name','nama_jurusan','deskripsi','status'];

}
