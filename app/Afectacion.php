<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Afectacion extends Model
{
    protected $table = 'afectacion';
    protected $fillable = [
        'id_hogar', 'id_jefe', 'presentado', 'prueba', 'afectado',
        'nivel', 'porcentaje', 'perdida', 'sobrelleva', 'percibe',
        'principal', 'tiempo', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID JEFE
        $jefe = \App\Caracterizacion::buscar($data['identificacion'], $alias);
        // BUSCAR ID JEFE
        $data['id_jefe'] = $jefe->id;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.afectacion')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'id_jefe' => $data['id_jefe'],
            'presentado' => $data['presentado'],
            'prueba' => $data['prueba'],
            'afectado' => $data['afectado'],
            'nivel' => $data['nivel'],
            'porcentaje' => $data['porcentaje'],
            'perdida' => $data['perdida'],
            'sobrelleva' => $data['sobrelleva'],
            'percibe' => $data['percibe'],
            'principal' => $data['principal'],
            'tiempo' => $data['tiempo'],
            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
    }
    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.afectacion')
            ->join($alias . '.hogar', 'hogar.id', 'afectacion.id_hogar')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'afectacion.id_jefe')
            ->where('afectacion.id_hogar', $id_hogar)
            ->where('afectacion.estado', 'Activo')
            ->select("afectacion.*"
                , "caracterizacion.identificacion AS id_jefe"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.identificacion AS identificacion"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.snom IS NULL THEN '' "
                . " WHEN caracterizacion.snom = '' THEN '' "
                . " ELSE caracterizacion.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN caracterizacion.sape IS NULL THEN '' "
                . " WHEN caracterizacion.sape = '' THEN '' "
                . " ELSE caracterizacion.sape "
                . " END sape"
                . " ")            
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.afectacion')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }
}
