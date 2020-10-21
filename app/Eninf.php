<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Eninf extends Model
{
    protected $table = 'eninf';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'enfermedad', 'tiempo', 'tratamiento', 'complicaciones', 'estado', 'id_compania', 'opci',
    ];

    public static function guardar($data, $alias)
    {
        // dd($data);die;
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
        $data['id_integrante'] = $integrante->id;
        $data['estado'] = 'Activo';
        $data['id_compania'] = 1;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.eninf')->create($data);
    }
}
