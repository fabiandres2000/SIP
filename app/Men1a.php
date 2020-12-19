<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Men1a extends Model
{
    protected $table = 'men1a';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'lugar_nacimiento', 'hemoclasificacion', 'compli_parto', 'via_parto',
        'cyc', 'valoracion_23', 'valoracion_68', 'valoracion_911', 'lactancia', 'peso_nacer',
        'peso_actual', 'longitud_nacer', 'longitud_actual', 'peso_long', 'cinta', 'edemas',
        'lenguaje', 'motora', 'conducta', 'visuales', 'auditivos', 'carnet',
        'bcg', 'hepb', 'polio', 'pentavalente', 'maltrato', 'morbilidad',
        'tsh', 'estado', 'id_compania', 'opci', 'pb',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.men1a')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_integrante' => $integrante->id,
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $integrante->identificacion,
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'sexo' => $data['sexo'],
            'lugar_nacimiento' => $data['lugar_nacimiento'],
            'hemoclasificacion' => $data['hemoclasificacion'],
            'compli_parto' => $data['compli_parto'],
            'via_parto' => $data['via_parto'],
            'cyc' => $data['cyc'],
            'valoracion_23' => $data['valoracion_23'],
            'valoracion_68' => $data['valoracion_68'],
            'valoracion_911' => $data['valoracion_911'],
            'lactancia' => $data['lactancia'],
            'peso_nacer' => $data['peso_nacer'],
            'peso_actual' => $data['peso_actual'],
            'longitud_nacer' => $data['longitud_nacer'],
            'longitud_actual' => $data['longitud_actual'],
            'peso_long' => $data['peso_long'],
            'cinta' => $data['cinta'],
            'edemas' => $data['edemas'],
            'lenguaje' => $data['lenguaje'],
            'motora' => $data['motora'],
            'conducta' => $data['conducta'],
            'visuales' => $data['visuales'],
            'auditivos' => $data['auditivos'],
            'carnet' => $data['carnet'],
            'bcg' => $data['bcg'],
            'hepb' => $data['hepb'],
            'polio' => $data['polio'],
            'pentavalente' => $data['pentavalente'],
            'maltrato' => $data['maltrato'],
            'morbilidad' => $data['morbilidad'],
            'tsh' => $data['tsh'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
            'pb' => $data['pb'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.men1a')
            ->where('men1a.id_hogar', $id_hogar)
            ->where('men1a.estado', 'Activo')
            ->select("men1a.*")
            ->selectRaw("CASE "
                . " WHEN men1a.snom IS NULL THEN '' "
                . " WHEN men1a.snom = '' THEN '' "
                . " ELSE men1a.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN men1a.sape IS NULL THEN '' "
                . " WHEN men1a.sape = '' THEN '' "
                . " ELSE men1a.sape "
                . " END sape"
                . " ")
            ->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.men1a')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }    
}
