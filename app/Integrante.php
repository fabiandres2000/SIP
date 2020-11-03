<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table = 'integrantes';
    protected $fillable = [
        'id_hogar', 'tipo_id', 'identificacion', 'sexo', 'parentesco', 'pnom',
        'snon', 'pape', 'sape', 'estado_civil', 'fecha_nac', 'afi_entidad',
        'tipo_afiliacion', 'embarazo', 'embarazo_multiple', 'discapacidad', 'escolaridad', 'ocupacion',
        'colegio', 'grado', 'etnia', 'entiende', 'pyp', 'migrante',
        'id_compania', 'estado', 'clasificacion', 'puntaje_sisben', 'otra_eps',
        'jefe', 'orientacion', 'identidad_genero', 'telefono', 'perdida_peso', 'programa_icbf', 'identi_auxi',
    ];
    public static function guardar($data, $alias)
    {

        $identi = $data['identificacion'];
        if ($data['tipo_id'] == "MSI" || $data['tipo_id'] == "ASI") {
            $count = DB::connection('mysql')->table($alias . '.integrantes')
                ->count();
            if ($count <= 0) {
                $identi = str_pad(1, 7, "0", STR_PAD_LEFT);
            } else {
                $resp = DB::connection('mysql')->table($alias . '.integrantes')
                    ->orderBy('id', 'desc')->first();
                $identi = str_pad(1 + $resp->identificacion, 7, "0", STR_PAD_LEFT);
            }
        }

        $jefe = \App\Caracterizacion::buscar($data['jefe'], $alias);
        return DB::connection('mysql')->table($alias . '.integrantes')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $identi,
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
            'orientacion' => $data['orientacion'],
            'identidad_genero' => $data['identidad_genero'],
            'telefono' => $data['telefono'],
            'perdida_peso' => $data['perdida_peso'],
            'programa_icbf' => $data['programa_icbf'],
            'identi_auxi' => $data['identificacion'],
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
            ->where('integrantes.jefe', $id)
            ->select("sexo",
                "identificacion",
                "tipo_id",
                "parentescos.descripcion as PARENT",
                "integrantes.id"
            )
            ->selectRaw('CONCAT_WS(" ",pnom," ",snom," ",pape," ",sape) AS INTEGRANTE')
            ->selectRaw("YEAR(CURDATE())-YEAR(fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(fecha_nac,'%m-%d'),0,-1) AS edad")
            ->get();
        return $respuesta;
    }

    public static function buscar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->where('identi_auxi', $identificacion)
            ->orderBy('id', 'desc')
            ->first();
    }
}
