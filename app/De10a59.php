<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De10a59 extends Model
{
    protected $table = 'de10a59';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'primera_mes', 'flujo_vaginal', 'flujo_uretral', 'relaciones_sexuales',
        'compa_sexuales', 'usa_condon', 'abortos_seis', 'metodo', 'tiempo_metodo', 'controles',
        'motivo', 'citologia', 'colposcopia', 'examen_seno', 'violencia', 'tdit',
        'tripleviral', 'nacidos_vivos', 'abortos', 'examen_prostata', 'biposia_prostata',
        'estado', 'id_compania', 'opci',
    ];

    public static function guardar($data, $alias)
    {
        if ($data['opci'] == "JEFE") {
            // BUSCAR ID JEFE
            $integrante = \App\Caracterizacion::buscar($data['identificacion'], $alias);
            // BUSCAR ID JEFE

        } else {
            // BUSCAR ID INTEGRANTE
            $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
            // BUSCAR ID INTEGRANTE
        }
        return DB::connection('mysql')->table($alias . '.de10a59')->updateOrInsert([
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
            'primera_mes' => $data['primera_mes'],
            'flujo_vaginal' => $data['flujo_vaginal'],
            'flujo_uretral' => $data['flujo_uretral'],
            'relaciones_sexuales' => $data['relaciones_sexuales'],
            'compa_sexuales' => $data['compa_sexuales'],
            'usa_condon' => $data['usa_condon'],
            'abortos_seis' => $data['abortos_seis'],
            'metodo' => $data['metodo'],
            'tiempo_metodo' => $data['tiempo_metodo'],
            'controles' => $data['controles'],
            'motivo' => $data['motivo'],
            'citologia' => $data['citologia'],
            'colposcopia' => $data['colposcopia'],
            'examen_seno' => $data['examen_seno'],
            'violencia' => $data['violencia'],
            'tdit' => $data['tdit'],
            'tripleviral' => $data['tripleviral'],
            'nacidos_vivos' => $data['nacidos_vivos'],
            'abortos' => $data['abortos'],
            'examen_prostata' => $data['examen_prostata'],
            'biposia_prostata' => $data['biposia_prostata'],
            'estado' => 'Activo',
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        $jefes = DB::connection('mysql')->table($alias . '.de10a59')
            ->join($alias . '.hogar', 'hogar.id', 'de10a59.id_hogar')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'de10a59.id_integrante')
            ->where('de10a59.id_hogar', $id_hogar)
            ->select("de10a59.*"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.identificacion AS identificacion"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.snom AS snom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sape AS sape"
                , "caracterizacion.sexo AS sexo"
            )
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad");

        $integrantes = DB::connection('mysql')->table($alias . '.de10a59')
            ->join($alias . '.hogar', 'hogar.id', 'de10a59.id_hogar')
            ->join($alias . '.integrantes', 'integrantes.id', 'de10a59.id_integrante')
            ->where('de10a59.id_hogar', $id_hogar)
            ->select("de10a59.*"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.identificacion AS identificacion"
                , "integrantes.pnom AS pnom"
                , "integrantes.snom AS snom"
                , "integrantes.pape AS pape"
                , "integrantes.sape AS sape"
                , "integrantes.sexo AS sexo"
            )
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->union($jefes)->get();         

        return $integrantes;
    }
}
