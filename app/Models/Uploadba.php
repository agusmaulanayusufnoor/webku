<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadba extends Model
{
    //protected $table = "uploadba";
    protected $primarykey = "id";
    protected $fillable = ['id','kantor_id','namafile','file','created_at'];

    public function kantor(){
        return $this->belongsTo(kode_kantor::class,'kantor_id');
    }
}
