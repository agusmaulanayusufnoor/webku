<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploaddep extends Model
{
  public function kantor(){
      return $this->belongsTo(kode_kantor::class,'kantor_id');
  }
}
