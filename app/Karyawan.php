<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $primaryKey ="id";
    protected $fillable=['id','nip','nama','gender','tanggal_lahir','tanggal_masuk','gaji_id'];
    
    public function gaji(){
    	return $this->belongsTo(Gaji::class, 'gaji_id');
    }
   
}

