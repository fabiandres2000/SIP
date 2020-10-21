<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Encro extends Model
{
    protected $table = 'encro';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'enfermedad', 'tiempo', 'tratamiento', 'complicaciones', 'estado', 'id_compania', 'opci',
    ];

    public static function guardar($data, $alias)
    {

        // BUSCAR ID INTEGRANTE
        if ($data['opci'] == "JEFE") {
            // BUSCAR ID JEFE
            $integrante = \App\Caracterizacion::buscar($data['identificacion'], $alias);
            // BUSCAR ID JEFE
        } else {
            // BUSCAR ID INTEGRANTE
            $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
            // BUSCAR ID INTEGRANTE
        }
        // BUSCAR ID INTEGRANTE

        return DB::connection('mysql')->table($alias . '.encro')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_integrante' => $integrante->id,
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $data['identificacion'],
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'sexo' => $data['sexo'],
            'enfermedad' => $data['enfermedad'],
            'tiempo' => $data['tiempo'],
            'tratamiento' => $data['tratamiento'],
            'complicaciones' => $data['complicaciones'],
            'estado' => 'Activo',
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);        
    }
}
