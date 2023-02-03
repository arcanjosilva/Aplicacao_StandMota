<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    public function motas(){
        return $this->hasMany('App\Models\Mota', 'marca_id', 'id');
    }

}
