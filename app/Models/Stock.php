<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
   
    protected $dates = ['tanggal'];


    public function kantor(){
        return $this->belongsTo(kode_kantor_slik::class,'sandi_kantor');
    }
    public function jenisstok(){
        return $this->belongsTo(stock_jenis::class,'jenis');
    }

    public function getTanggalAttribute(){
       // return $this->attributes['tanggal'] = ($value);
        return date('d/m/Y', strtotime($this->attributes['tanggal']));
    }
    // public function getJmlStokAwalAttribute($value)
    // { 
    //   return ($value * 10);
    // }

}
