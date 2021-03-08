<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Establecimientos extends Model
{
    protected $table = 'establecimientos';
    protected $fillable = [
        'id_hogar', 'registrado', 'num_matricula', 'naturaleza',
        'otra_naturaleza', 'tipo', 'actividad_economica', 'capital_extranjero', 'permiso', 'otro_permiso', 'anio',
        'num_empleados', 'tiempo_sin_operacion', 'fecha_retorno', 'promedio_ingresos_anterior', 'promedio_ingresos_durante',
        'promedio_ingresos_posterior', 'carga_economica', 'protocolo_bioseguridad', 'tipo_afectacion', 'ayuda',
        'tiempo_recuperacion', 'principal_problema', 'internet', 'estado', 'id_compania',
        'fecha', 'usuario_crear', 'fecha_editar', 'usuario_editar', 'otro_tipo_afectacion',
        'otro_principal_problema', 'nit', 'representante',
        'id_dpto', 'id_mun', 'id_corre', 'id_vereda', 'id_barrio', 'direccion', 'razon', 'tipo_tiempo',
    ];

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.establecimientos')
                ->join($alias . '.dptos', 'dptos.codigo', 'establecimientos.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'establecimientos.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'establecimientos.id_corre')
                ->where(function ($query) use ($busqueda) {
                    $query->where('establecimientos.nit', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('establecimientos.razon', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('establecimientos.representante', 'LIKE', '%' . $busqueda . '%');
                })
                ->where("establecimientos.estado", "Activo")
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "establecimientos.estado AS ESTADO",
                    "establecimientos.nit",
                    "establecimientos.id",
                    "establecimientos.representante",
                    "establecimientos.razon",
                    "establecimientos.id_hogar AS IDHOGAR"
                )
                ->orderBy('establecimientos.id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.establecimientos')
                ->join($alias . '.dptos', 'dptos.codigo', 'establecimientos.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'establecimientos.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'establecimientos.id_corre')
                ->where("establecimientos.estado", "Activo")
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "establecimientos.estado AS ESTADO",
                    "establecimientos.nit",
                    "establecimientos.id",
                    "establecimientos.representante",
                    "establecimientos.razon",
                    "establecimientos.id_hogar AS IDHOGAR"
                )
                ->orderBy('establecimientos.id', 'DESC')
                ->paginate(10);
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {
        
        return DB::connection('mysql')->table($alias . '.establecimientos')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'registrado' => $data['registrado'],
            'num_matricula' => $data['num_matricula'],
            'naturaleza' => $data['naturaleza'],
            'otra_naturaleza' => $data['otra_naturaleza'],
            'tipo' => $data['tipo'],
            'actividad_economica' => $data['actividad_economica'],
            'capital_extranjero' => $data['capital_extranjero'],
            'permiso' => $data['permiso'],
            'otro_permiso' => $data['otro_permiso'],
            'anio' => $data['anio'],
            'num_empleados' => $data['num_empleados'],
            'tiempo_sin_operacion' => $data['tiempo_sin_operacion'],
            'fecha_retorno' => $data['fecha_retorno'],
            'promedio_ingresos_anterior' => $data['promedio_ingresos_anterior'],
            'promedio_ingresos_durante' => $data['promedio_ingresos_durante'],
            'promedio_ingresos_posterior' => $data['promedio_ingresos_posterior'],
            'carga_economica' => $data['carga_economica'],
            'protocolo_bioseguridad' => $data['protocolo_bioseguridad'],
            'tipo_afectacion' => $data['tipo_afectacion'],
            'ayuda' => $data['ayuda'],
            'tiempo_recuperacion' => $data['tiempo_recuperacion'],
            'principal_problema' => $data['principal_problema'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'internet' => $data['internet'],
            'fecha' => date('Y-m-d'),
            'usuario_crear' => Auth::user()->id,
            'fecha_editar' => '',
            'usuario_editar' => '',
            'otro_tipo_afectacion' => $data['otro_tipo_afectacion'],
            'otro_principal_problema' => $data['otro_principal_problema'],
            'nit' => $data['nit'],
            'representante' => $data['representante'],
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'direccion' => $data['direccion'],
            'razon' => $data['razon'],
            'tipo_tiempo' => $data['tipo_tiempo'],
        ]);
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.establecimientos')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscar($alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.establecimientos')
            ->leftjoin($alias . '.actividades_economicas', 'actividades_economicas.id', 'establecimientos.actividad_economica')
            ->select("actividades_economicas.descripcion AS actividadesAuxiliar")
            ->selectRaw("IFNULL(establecimientos.id_hogar,'') AS id_hogar")
            ->selectRaw("IFNULL(establecimientos.registrado,'') AS registrado")
            ->selectRaw("IFNULL(establecimientos.num_matricula,'') AS num_matricula")
            ->selectRaw("IFNULL(establecimientos.naturaleza,'') AS naturaleza")
            ->selectRaw("IFNULL(establecimientos.otra_naturaleza,'') AS otra_naturaleza")
            ->selectRaw("IFNULL(establecimientos.tipo,'') AS tipo")
            ->selectRaw("IFNULL(establecimientos.actividad_economica,'') AS actividad_economica")
            ->selectRaw("IFNULL(establecimientos.capital_extranjero,'') AS capital_extranjero")
            ->selectRaw("IFNULL(establecimientos.permiso,'') AS permiso")
            ->selectRaw("IFNULL(establecimientos.otro_permiso,'') AS otro_permiso")
            ->selectRaw("IFNULL(establecimientos.anio,'') AS anio")
            ->selectRaw("IFNULL(establecimientos.num_empleados,'') AS num_empleados")
            ->selectRaw("IFNULL(establecimientos.tiempo_sin_operacion,'') AS tiempo_sin_operacion")
            ->selectRaw("IFNULL(establecimientos.fecha_retorno,'') AS fecha_retorno")
            ->selectRaw("IFNULL(establecimientos.promedio_ingresos_anterior,'') AS promedio_ingresos_anterior")
            ->selectRaw("IFNULL(establecimientos.promedio_ingresos_durante,'') AS promedio_ingresos_durante")
            ->selectRaw("IFNULL(establecimientos.promedio_ingresos_posterior,'') AS promedio_ingresos_posterior")
            ->selectRaw("IFNULL(establecimientos.carga_economica,'') AS carga_economica")
            ->selectRaw("IFNULL(establecimientos.protocolo_bioseguridad,'') AS protocolo_bioseguridad")
            ->selectRaw("IFNULL(establecimientos.tipo_afectacion,'') AS tipo_afectacion")
            ->selectRaw("IFNULL(establecimientos.ayuda,'') AS ayuda")
            ->selectRaw("IFNULL(establecimientos.tiempo_recuperacion,'') AS tiempo_recuperacion")
            ->selectRaw("IFNULL(establecimientos.principal_problema,'') AS principal_problema")
            ->selectRaw("IFNULL(establecimientos.internet,'') AS internet")
            ->selectRaw("IFNULL(establecimientos.estado,'') AS estado")
            ->selectRaw("IFNULL(establecimientos.id_compania,'') AS id_compania")
            ->selectRaw("IFNULL(establecimientos.fecha,'') AS fecha")
            ->selectRaw("IFNULL(establecimientos.usuario_crear,'') AS usuario_crear")
            ->selectRaw("IFNULL(establecimientos.fecha_editar,'') AS fecha_editar")
            ->selectRaw("IFNULL(establecimientos.usuario_editar,'') AS usuario_editar")
            ->selectRaw("IFNULL(establecimientos.otro_tipo_afectacion,'') AS otro_tipo_afectacion")
            ->selectRaw("IFNULL(establecimientos.otro_principal_problema,'') AS otro_principal_problema")
            ->selectRaw("IFNULL(establecimientos.nit,'') AS nit")
            ->selectRaw("IFNULL(establecimientos.representante,'') AS representante")
            ->selectRaw("IFNULL(establecimientos.id_dpto,'') AS id_dpto")
            ->selectRaw("IFNULL(establecimientos.id_mun,'') AS id_mun")
            ->selectRaw("IFNULL(establecimientos.id_corre,'') AS id_corre")
            ->selectRaw("IFNULL(establecimientos.id_vereda,'') AS id_vereda")
            ->selectRaw("IFNULL(establecimientos.id_barrio,'') AS id_barrio")
            ->selectRaw("IFNULL(establecimientos.direccion,'') AS direccion")
            ->selectRaw("IFNULL(establecimientos.razon,'') AS razon")
            ->selectRaw("IFNULL(establecimientos.tipo_tiempo,'') AS tipo_tiempo")                                                       
            ->where('establecimientos.id', $id)
            ->where('establecimientos.estado', 'Activo')
            ->first();
    }

    public static function modificar($data, $alias, $id)
    {
        // dd($data);die;
        return DB::connection('mysql')->table($alias . '.establecimientos')->where('id', $id)->update([
            'id_hogar' => $data['id_hogar'],
            'registrado' => $data['registrado'],
            'num_matricula' => $data['num_matricula'],
            'naturaleza' => $data['naturaleza'],
            'otra_naturaleza' => $data['otra_naturaleza'],
            'tipo' => $data['tipo'],
            'actividad_economica' => $data['actividad_economica'],
            'capital_extranjero' => $data['capital_extranjero'],
            'permiso' => $data['permiso'],
            'otro_permiso' => $data['otro_permiso'],
            'anio' => $data['anio'],
            'num_empleados' => $data['num_empleados'],
            'tiempo_sin_operacion' => $data['tiempo_sin_operacion'],
            'fecha_retorno' => $data['fecha_retorno'],
            'promedio_ingresos_anterior' => $data['promedio_ingresos_anterior'],
            'promedio_ingresos_durante' => $data['promedio_ingresos_durante'],
            'promedio_ingresos_posterior' => $data['promedio_ingresos_posterior'],
            'carga_economica' => $data['carga_economica'],
            'protocolo_bioseguridad' => $data['protocolo_bioseguridad'],
            'tipo_afectacion' => $data['tipo_afectacion'],
            'ayuda' => $data['ayuda'],
            'tiempo_recuperacion' => $data['tiempo_recuperacion'],
            'principal_problema' => $data['principal_problema'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'internet' => $data['internet'],
            'fecha_editar' => date('Y-m-d'),
            'usuario_editar' => Auth::user()->id,
            'otro_tipo_afectacion' => $data['otro_tipo_afectacion'],
            'otro_principal_problema' => $data['otro_principal_problema'],
            'nit' => $data['nit'],
            'representante' => $data['representante'],
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'direccion' => $data['direccion'],
            'razon' => $data['razon'],
            'tipo_tiempo' => $data['tipo_tiempo'],

        ]);
    }
}
