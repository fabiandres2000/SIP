<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table = 'integrantes';
    protected $fillable = [
        'id_hogar',
        'tipo_id',
        'identificacion',
        'sexo',
        'parentesco',
        'pnom',
        'snon',
        'pape',
        'sape',
        'estado_civil',
        'fecha_nac',
        'afi_entidad',
        'tipo_afiliacion',
        'embarazo',
        'embarazo_multiple',
        'discapacidad',
        'escolaridad',
        'ocupacion',
        'colegio',
        'grado',
        'etnia',
        'entiende',
        'pyp',
        'migrante',
        'id_compania',
        'estado',
        'clasificacion',
        'puntaje_sisben',
        'otra_eps',
        'jefe',
    ];
    public static function guardar($data, $alias)
    {
        $jefe = \App\Caracterizacion::buscar($data['jefe'], $alias);
        return DB::connection('mysql')->table($alias . '.integrantes')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $data['identificacion'],
            'sexo' => $data['sexo'],
            'parentesco' => $data['parentesco'],
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'estado_civil' => $data['estado_civil'],
            'fecha_nac' => $data['fecha_nac'],
            'afi_entidad' => $data['afi_entidad'],
            'otra_eps' => $data['otra_eps'],
            'tipo_afiliacion' => $data['tipo_afiliacion'],
            'embarazo' => $data['embarazo'],
            'embarazo_multiple' => $data['embarazo_multiple'],
            'discapacidad' => $data['discapacidad'],
            'escolaridad' => $data['escolaridad'],
            'ocupacion' => $data['ocupacion'],
            'colegio' => $data['colegio'],
            'grado' => $data['grado'],
            'etnia' => $data['etnia'],
            'entiende' => $data['entiende'],
            'pyp' => $data['pyp'],
            'migrante' => $data['migrante'],
            'id_compania' => 1,
            'estado' => 'Activo',
            'clasificacion' => $data['clasificacion'],
            'puntaje_sisben' => $data['puntaje_sisben'],
            'jefe' => $jefe->id,
        ]);
    }

    public static function verificar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->where('identificacion', $identificacion)
            ->where('estado', 'Activo')
            ->count();
    }

    public static function exportar($id, $alias)
    {
        $respuesta = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.parentescos', 'parentescos.id', 'integrantes.parentesco')
            ->where('integrantes.id', $id)
            ->select("sexo",
                "identificacion",
                "tipo_id",
                "parentescos.descripcion as PARENT",
                "integrantes.id"
            )
            ->selectRaw('CONCAT_WS(" ",pnom," ",snom," ",pape," ",sape) AS INTEGRANTE')
            ->selectRaw("YEAR(CURDATE())-YEAR(fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->get();
        return $respuesta;
    }

    public static function buscar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->where('identificacion', $identificacion)->first();
    }
}
