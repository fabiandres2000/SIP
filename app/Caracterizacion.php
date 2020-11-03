<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Caracterizacion extends Model
{
    protected $table = 'caracterizacion';
    protected $fillable = [
        'telefono', 'puntaje_sisben', 'ips', 'tipo_id', 'identificacion', 'sexo',
        'parentesco', 'pnom', 'snom', 'pape', 'sape', 'salario', 'id_hogar',
        'id_compania', 'estado', 'estado_civil', 'fecha_nacimiento', 'afiliacion_entidad',
        'tipo_afiliacion', 'embarazo', 'embarazo_multiple', 'discapacidad', 'nivel_escolaridad',
        'ocupacion', 'colegio', 'grado', 'etnia', 'clasificacion', 'entiende', 'pyp', 'migrante', 'otra_eps',
        'orientacion', 'identidad_genero', 'perdida_peso', 'programa_icbf', 'identi_auxi',
    ];

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
                ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'hogar.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
                ->where(function ($query) use ($busqueda) {
                    $query->where('caracterizacion.identificacion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('corregimientos.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('caracterizacion.pnom', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('caracterizacion.snom', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('caracterizacion.pape', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('caracterizacion.sape', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('muni.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('dptos.descripcion', 'LIKE', '%' . $busqueda . '%');
                })
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "caracterizacion.estado AS ESTADO",
                    "caracterizacion.identificacion AS IDENTIFICACION",
                    "caracterizacion.id",
                    "caracterizacion.sexo",
                    // "caracterizacion.direccion",
                    "caracterizacion.telefono"
                )
                ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
                ->orderBy('caracterizacion.id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
                ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'hogar.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "caracterizacion.estado AS ESTADO",
                    "caracterizacion.identificacion AS IDENTIFICACION",
                    "caracterizacion.id",
                    "caracterizacion.sexo",
                    // "caracterizacion.direccion",
                    "caracterizacion.telefono"
                )
                ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
                ->orderBy('caracterizacion.id', 'DESC')
                ->paginate(10);
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {

        $identi = $data['identificacion'];
        if ($data['tipo_id'] == "MSI" || $data['tipo_id'] == "ASI") {
            $count = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->count();
            if ($count <= 0) {
                $identi = str_pad(1, 7, "0", STR_PAD_LEFT);
            } else {
                $resp = DB::connection('mysql')->table($alias . '.caracterizacion')
                    ->orderBy('id', 'desc')->first();
                $identi = str_pad(1 + $resp->identificacion, 7, "0", STR_PAD_LEFT);
            }

        }

        return DB::connection('mysql')->table($alias . '.caracterizacion')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'telefono' => $data['telefono'],
            'puntaje_sisben' => $data['puntaje_sisben'],
            'afiliacion_entidad' => $data['afiliacion_entidad'],
            'otra_eps' => $data['otra_eps'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $identi,
            'sexo' => $data['sexo'],
            'parentesco' => $data['parentesco'],
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'id_compania' => 1,
            'estado' => 'Activo',
            'salario' => $data['salario'],
            'estado_civil' => $data['estado_civil'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'tipo_afiliacion' => $data['tipo_afiliacion'],
            'embarazo' => $data['embarazo'],
            'embarazo_multiple' => $data['embarazo_multiple'],
            'discapacidad' => $data['discapacidad'],
            'nivel_escolaridad' => $data['nivel_escolaridad'],
            'ocupacion' => $data['ocupacion'],
            'colegio' => $data['colegio'],
            'grado' => $data['grado'],
            'etnia' => $data['etnia'],
            'clasificacion' => $data['clasificacion'],
            'entiende' => $data['entiende'],
            'pyp' => $data['pyp'],
            'migrante' => $data['migrante'],
            'orientacion' => $data['orientacion'],
            'identidad_genero' => $data['identidad_genero'],
            'perdida_peso' => $data['perdida_peso'],
            'programa_icbf' => $data['programa_icbf'],
            'identi_auxi' => $data['identificacion'],
        ]);
    }

    public static function verificar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('identificacion', $identificacion)
            ->where('estado', 'Activo')
            ->count();
    }

    public static function exportar($alias)
    {
        $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
            ->select("dptos.descripcion AS DPTO",
                "muni.descripcion AS MUNI",
                "corregimientos.descripcion AS CORREGIMIENTO",
                "caracterizacion.estado AS ESTADO",
                "caracterizacion.identificacion AS IDENTIFICACION",
                "caracterizacion.id"
            )
            ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
            ->where('caracterizacion.estado', 'Activo')
            ->orderBy('caracterizacion.id', 'DESC')
            ->get();
        return $respuesta;
    }

    public static function exportar2($id, $alias)
    {
        $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
            ->select("dptos.descripcion AS DPTO",
                "muni.descripcion AS MUNI",
                "corregimientos.descripcion AS CORREGIMIENTO",
                "caracterizacion.estado AS ESTADO",
                "caracterizacion.identificacion AS IDENTIFICACION",
                "hogar.direccion AS DIRECCION",
                "caracterizacion.id"
            )
            ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.id', $id)
            ->orderBy('caracterizacion.id', 'DESC')
            ->get();
        return $respuesta;
    }

    public static function buscar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('identi_auxi', $identificacion)
            ->orderBy('id', 'desc')
            ->first();
    }
    public static function buscarPorId($id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->findOrFail($id);
    }
}