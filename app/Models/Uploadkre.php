<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadkre extends Model
{
    protected $table = "uploadkre";
    protected $primarykey = "id";
    protected $fillable = ['id','kantor_id','no_rekening','kode_obox','periode','namafile','file','created_at'];

    public function kantor(){
        return $this->belongsTo(kode_kantor::class,'kantor_id');
    }
}
