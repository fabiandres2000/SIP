<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class De1a5 extends Model
{
    protected $table = 'de1a5';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'beneficiario', 'cyc', 'valoracion_1823', 'valoracion_3035',
        'valoracion_4', 'peso', 'talla', 'imc', 'pb', 'pt',
        'te', 'lenguaje', 'motora', 'conducta', 'visuales', 'auditivos',
        'caries', 'nocepillado', 'consultaodon', 'carnet', 'bcg', 'polio',
        'dpt', 'fiebrea', 'tripleviral', 'otras', 'desparacitado', 'maltrato',
        'enfermedad', 'medicamento', 'estado', 'id_compania', 'opci', 'pentavalente','pcefalico'
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
        // dd($integrante);die;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.de1a5')->updateOrInsert([
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
            'beneficiario' => $data['beneficiario'],
            'cyc' => $data['cyc'],
            'valoracion_1823' => $data['valoracion_1823'],
            'valoracion_3035' => $data['valoracion_3035'],
            'valoracion_4' => $data['valoracion_4'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'pb' => $data['pb'],
            'pt' => $data['pt'],
            'te' => $data['te'],
            'lenguaje' => $data['lenguaje'],
            'motora' => $data['motora'],
            'conducta' => $data['conducta'],
            'visuales' => $data['visuales'],
            'auditivos' => $data['auditivos'],
            'caries' => $data['caries'],
            'nocepillado' => $data['nocepillado'],
            'consultaodon' => $data['consultaodon'],
            'carnet' => $data['carnet'],
            'bcg' => $data['bcg'],
            'polio' => $data['polio'],
            'dpt' => $data['dpt'],
            'fiebrea' => $data['fiebrea'],
            'tripleviral' => $data['tripleviral'],
            'pentavalente' => $data['pentavalente'],
            'otras' => $data['otras'],
            'desparacitado' => $data['desparacitado'],
            'maltrato' => $data['maltrato'],
            'enfermedad' => $data['enfermedad'],
            'medicamento' => $data['medicamento'],
            'estado' => 'Activo',
            'id_compania' => 1,
            'opci' => $data['opci'],
            'pcefalico' => $data['pcefalico'],            
        ]);
    }
}
