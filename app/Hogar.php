<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Hogar extends Model
{
    protected $table = 'hogar';
    protected $fillable = [
        'id_dpto', 'id_mun', 'id_corre', 'id_vereda', 'id_barrio', 'id_zona',
        'tenencia_vivienda', 'numero_hogares', 'poblacion_especial', 'vias_acceso',
        'servicios_publicos', 'direccion', 'id_compania', 'estado',
    ];

    public static function guardar($data,$alias)
    {
        return DB::connection('mysql')->table($alias . '.hogar')->insertGetId([
            'id' => $data['id'],
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'id_zona' => $data['id_zona'],
            'tenencia_vivienda' => $data['tenencia_vivienda'],
            'numero_hogares' => $data['numero_hogares'],
            'poblacion_especial' => $data['poblacion_especial'],
            'vias_acceso' => $data['vias_acceso'],
            'servicios_publicos' => $data['servicios_publicos'],
            'direccion' => $data['direccion'],
            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
    }
}