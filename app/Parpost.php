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
        // BUSCAR ID INTEGRANTE

        return DB::connection('mysql')->table($alias . '.parpost')->updateOrInsert([
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
            'aceptacion' => $data['aceptacion'],
            'control_prenatal' => $data['control_prenatal'],
            'atencion_parto' => $data['atencion_parto'],
            'carnet' => $data['carnet'],
            'fecha_ultima' => $data['fecha_ultima'],
            'fecha_probable' => $data['fecha_probable'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'semanas_ges' => $data['semanas_ges'],
            'num_controles' => $data['num_controles'],
            'vih' => $data['vih'],
            'toxoplasma' => $data['toxoplasma'],
            'vdrl' => $data['vdrl'],
            'odontologia' => $data['odontologia'],
            'vacunaciontdit' => $data['vacunaciontdit'],
            'fecha_ultimo_parto' => $data['fecha_ultimo_parto'],
            'suplementacion' => $data['suplementacion'],
            'enfermedades_cronicas' => $data['enfermedades_cronicas'],
            'sedentarismo' => $data['sedentarismo'],
            'fuma' => $data['fuma'],
            'consumo' => $data['consumo'],
            'bebidas' => $data['bebidas'],
            'tipo_parto' => $data['tipo_parto'],
            'atencion_institucional' => $data['atencion_institucional'],
            'cc18' => $data['cc18'],
            'morgestacion' => $data['morgestacion'],
            'morparto' => $data['morparto'],
            'morposparto' => $data['morposparto'],
            'estado' => 'Activo',
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);        
    }
}
