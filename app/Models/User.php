<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function level(){
        return $this->belongsTo(level::class);

    }

    public function kantor(){
        return $this->belongsTo(kode_kantor::class);
    }

}
