<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uploadak extends Model
{
     //protected $table = "uploadba";
     protected $primarykey = "id";
     protected $fillable = ['id','kantor_id','namafile','periode','file','created_at'];

     public function kantor(){
         return $this->belongsTo(kode_kantor::class,'kantor_id');
     }
}
