<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De60 extends Model
{
    protected $table = 'de60';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'grupo_ayudas', 'peso', 'talla', 'imc', 'pa', 'glicemia',
        'cigarrillo', 'alcohol', 'actividad_fisica', 'sintomatico', 'examen_seno', 'citologia',
        'colposcopia', 'examen_prostata', 'biposia_prostata', 'agudeza_visual', 'subsidio', 'enfermedades_cronicas',
        'enfermedades_infecciosas', 'estado', 'id_compania', 'opci',
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
        return DB::connection('mysql')->table($alias . '.de60')->create($data);
    }
}
