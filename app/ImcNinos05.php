<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ImcNinos05 extends Model
{
    protected $table = 'instalaciones';
    protected $fillable = [
        'id_unidad', 'instalacion', 'cuantos', 'estado', 'id_compania',
    ];
}
