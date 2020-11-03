<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animales';
    protected $fillable = [
        'id_hogar', 'animal', 'cuantos', 'vacunados', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.animales')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'animal' => $data['animal'],
            'cuantos' => $data['cuantos'],
            'vacunados' => $data['vacunados'],
            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
    }
}