<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Factores extends Model
{
    protected $table = 'factores';
    protected $fillable = [
        'id_jefe', 'id_hogar', 'dialogos', 'sancion', 'castigo_verbal', 'castigo_fisico', 'alcohol',
        'tabaco', 'sustancias_psico', 'apuestas', 'violencia_fisica', 'violencia_psico', 'violencia_economica',
        'abuso_sexual', 'actividad_fisica', 'consumo_frutas', 'religiosos', 'sociales', 'culturales', 'recreativos',
        'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID JEFE
        $jefe = \App\Caracterizacion::buscar($data['identificacion'], $alias);
        // BUSCAR ID JEFE
        $data['id_jefe'] = $jefe->id;
        // BUSCAR ID INTEGRANTE

        return DB::connection('mysql')->table($alias . '.factores')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'id_jefe' => $data['id_jefe'],
            'dialogos' => $data['dialogos'],
            'sancion' => $data['sancion'],
            'castigo_verbal' => $data['castigo_verbal'],
            'castigo_fisico' => $data['castigo_fisico'],
            'alcohol' => $data['alcohol'],
            'tabaco' => $data['tabaco'],
            'sustancias_psico' => $data['sustancias_psico'],
            'apuestas' => $data['apuestas'],
            'violencia_fisica' => $data['violencia_fisica'],
            'violencia_psico' => $data['violencia_psico'],
            'violencia_economica' => $data['violencia_economica'],
            'id_compania' => 1,
            'estado' => 'Activo',
            'abuso_sexual' => $data['abuso_sexual'],
            'actividad_fisica' => $data['actividad_fisica'],
            'consumo_frutas' => $data['consumo_frutas'],
            'religiosos' => $data['religiosos'],
            'sociales' => $data['sociales'],
            'culturales' => $data['culturales'],
            'recreativos' => $data['recreativos'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.factores')
            ->join($alias . '.hogar', 'hogar.id', 'factores.id_hogar')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'factores.id_jefe')
            ->where('factores.id_hogar', $id_hogar)
            ->select("factores.*"
            ,"caracterizacion.identificacion AS id_jefe"
            ,"caracterizacion.tipo_id AS tipo_id"
            ,"caracterizacion.identificacion AS identificacion"
            ,"caracterizacion.pnom AS pnom"
            ,"caracterizacion.snom AS snom"
            ,"caracterizacion.pape AS pape"
            ,"caracterizacion.sape AS sape"
            ,"caracterizacion.sexo AS sexo"
            )
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->get();
    }
}
