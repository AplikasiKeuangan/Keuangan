<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table='jurusans';
    protected $primaryKey='id';
    protected $fillable=['parent_id','nama_jurusan','deskripsi','status'];

}
