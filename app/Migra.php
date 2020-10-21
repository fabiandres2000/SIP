<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Migra extends Model
{
    protected $table = 'migra';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'pais', 'registrado', 'cuantollego', 'estado', 'id_compania',
        'futuro', 'recibido', 'necesidad', 'dependen', 'ingreso', 'opci',
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

        return DB::connection('mysql')->table($alias . '.migra')->updateOrInsert([
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
            'edad' => $data['edad'],
            'pais' => $data['pais'],
            'registrado' => $data['registrado'],
            'cuantollego' => $data['cuantollego'],
            'futuro' => $data['futuro'],
            'recibido' => $data['recibido'],
            'necesidad' => $data['necesidad'],
            'dependen' => $data['dependen'],
            'ingreso' => $data['ingreso'],
            'estado' => 'Activo',
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);        
    }
}
