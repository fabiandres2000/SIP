<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Dpto extends Model
{
    protected $table = 'dptos';
    protected $fillable = [
        'codigo',
        'descripcion',
        'id',
        'actual',
    ];

    public static function buscarDepartamentos($alias)
    {
        return DB::connection('mysql')->table($alias.'.dptos')->orderBy('descripcion', 'asc')->get();
    }
}
