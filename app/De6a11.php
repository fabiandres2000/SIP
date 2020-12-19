<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De6a11 extends Model
{
    protected $table = 'de6a11';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'cyc', 'atencion', 'peso', 'talla',
        'imc', 'pb', 'pt', 'te', 'conducta', 'visuales',
        'auditivos', 'dientes_sanos', 'consultaodon', 'nofluor', 'nocepillado', 'maltrato',
        'sustanciaspsico', 'desparacitado', 'enfermedad', 'medicamento', 'padre', 'madre',
        'hermanos', 'conyuge', 'estado', 'id_compania', 'opci',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
        // dd($integrante);die;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.de6a11')->updateOrInsert([
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
            'edad' => $data['edad'],
            'cyc' => $data['cyc'],
            'atencion' => $data['atencion'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'pb' => $data['pb'],
            'pt' => $data['pt'],
            'te' => $data['te'],
            'conducta' => $data['conducta'],
            'visuales' => $data['visuales'],
            'auditivos' => $data['auditivos'],
            'dientes_sanos' => $data['dientes_sanos'],
            'consultaodon' => $data['consultaodon'],
            'nofluor' => $data['nofluor'],
            'nocepillado' => $data['nocepillado'],
            'maltrato' => $data['maltrato'],
            'sustanciaspsico' => $data['sustanciaspsico'],
            'desparacitado' => $data['desparacitado'],
            'enfermedad' => $data['enfermedad'],
            'medicamento' => $data['medicamento'],
            'padre' => $data['padre'],
            'madre' => $data['madre'],
            'hermanos' => $data['hermanos'],
            'conyuge' => $data['conyuge'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.de6a11')
            ->where('de6a11.id_hogar', $id_hogar)
            ->where('de6a11.estado', 'Activo')
            ->select("de6a11.*")
            ->selectRaw("CASE "
                . " WHEN de6a11.snom IS NULL THEN '' "
                . " WHEN de6a11.snom = '' THEN '' "
                . " ELSE de6a11.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN de6a11.sape IS NULL THEN '' "
                . " WHEN de6a11.sape = '' THEN '' "
                . " ELSE de6a11.sape "
                . " END sape"
                . " ")            
            ->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de6a11')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }    
}
