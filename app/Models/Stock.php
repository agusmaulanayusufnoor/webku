<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function kantor(){
        return $this->belongsTo(kode_kantor_slik::class,'sandi_kantor');
    }
    public function jenisstok(){
        return $this->belongsTo(stock_jenis::class,'jenis');
    }
}
