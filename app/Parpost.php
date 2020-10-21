<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Parpost extends Model
{
    protected $table = 'parpost';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'aceptacion', 'control_prenatal', 'atencion_parto', 'carnet',
        'fecha_ultima', 'fecha_probable', 'peso', 'talla', 'imc', 'semanas_ges',
        'num_controles', 'vih', 'toxoplasma', 'vdrl', 'odontologia', 'vacunaciontdit',
        'fecha_ultimo_parto', 'suplementacion', 'enfermedades_cronicas', 'sedentarismo', 'fuma',
        'consumo', 'bebidas', 'tipo_parto', 'atencion_institucional', 'cc18', 'morgestacion',
        'morparto', 'morposparto', 'estado', 'id_compania', 'opci',
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
        $data['id_integrante'] = $integrante->id;
        $data['estado'] = 'Activo';
        $data['id_compania'] = 1;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.parpost')->create($data);
    }
}
