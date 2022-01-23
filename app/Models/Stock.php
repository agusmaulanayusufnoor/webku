<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stocks";
    protected $fillable = [
        'jenis',
        'sandi_kantor',
        'tanggal',
        'jml_stok_awal',
        'tambahan_stok',
        'jml_digunakan',
        'jml_rusak',
        'jml_hilang',
        'jml_stok_akhir'
    ];
    protected $guarded = [];
    protected $dates = ['tanggal'];


    public function kantor(){
        return $this->belongsTo(kode_kantor::class,'sandi_kantor');
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
