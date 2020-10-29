<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
  protected $table = "gaji";
  protected $primaryKey ="id";
  protected $fillable= ['id','gaji','besar_gaji'];

  public function karyawan(){
    	return $this->hasMany(Karyawan::class);
    }
}
