<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class UnidadesProductivas extends Model
{
    protected $table = 'unidades_productivas';
    protected $fillable = [
        'id_hogar', 'nom_productor', 'nivel_educativo', 'tipo_id', 'identificacion', 
        'nom_finca', 'hogares_finca','linea_productiva', 'area_total_finca', 'distancia_finca', 
        'tenencia_propiedad', 'atiende_entrevista', 'credito_produccion', 'fuentes_prestamo','cual_fuente', 
        'vias_acceso', 'tipos_vias_acceso', 'fecha', 'usuario_crear', 'fecha_editar', 
        'usuario_editar', 'estado', 'id_compania','id_dpto', 'id_mun', 
        'id_corre', 'id_vereda', 'id_barrio', 'direccion', 'unidad_area', 
        'unidad_distancia',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.unidades_productivas')->insertGetId([

            'id_hogar' => $data['id_hogar'],
            'nom_productor' => $data['nom_productor'],
            'nivel_educativo' => $data['nivel_educativo'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $data['identificacion'],
            'nom_finca' => $data['nom_finca'],
            'hogares_finca' => $data['hogares_finca'],
            'linea_productiva' => $data['linea_productiva'],
            'area_total_finca' => $data['area_total_finca'],
            'distancia_finca' => $data['distancia_finca'],

            'tenencia_propiedad' => $data['tenencia_propiedad'],
            'atiende_entrevista' => $data['atiende_entrevista'],
            'credito_produccion' => $data['credito_produccion'],
            'fuentes_prestamo' => $data['fuentes_prestamo'],
            'cual_fuente' => $data['cual_fuente'],
            'vias_acceso' => $data['vias_acceso'],
            'tipos_vias_acceso' => $data['tipos_vias_acceso'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'fecha' => date('Y-m-d'),

            'usuario_crear' => Auth::user()->id,
            'fecha_editar' => '',
            'usuario_editar' => '',
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'direccion' => $data['direccion'],
            'unidad_area' => $data['unidad_area'],

            'unidad_distancia' => $data['unidad_distancia'],
        ]);
    }

    public static function modificar($data, $alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.unidades_productivas')->where('id', $id)->update([

            'id_hogar' => $data['id_hogar'],
            'nom_productor' => $data['nom_productor'],
            'nivel_educativo' => $data['nivel_educativo'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $data['identificacion'],
            'nom_finca' => $data['nom_finca'],
            'hogares_finca' => $data['hogares_finca'],
            'linea_productiva' => $data['linea_productiva'],
            'area_total_finca' => $data['area_total_finca'],

            'distancia_finca' => $data['distancia_finca'],
            'tenencia_propiedad' => $data['tenencia_propiedad'],
            'atiende_entrevista' => $data['atiende_entrevista'],
            'credito_produccion' => $data['credito_produccion'],
            'fuentes_prestamo' => $data['fuentes_prestamo'],
            'cual_fuente' => $data['cual_fuente'],
            'vias_acceso' => $data['vias_acceso'],
            'tipos_vias_acceso' => $data['tipos_vias_acceso'],
            'id_compania' => 1,
            'estado' => $data['estado'],

            'fecha_editar' => date('Y-m-d'),
            'usuario_editar' => Auth::user()->id,
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'direccion' => $data['direccion'],
            'unidad_area' => $data['unidad_area'],
            'unidad_distancia' => $data['unidad_distancia'],
        ]);
    }

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.unidades_productivas')
                ->join($alias . '.dptos', 'dptos.codigo', 'unidades_productivas.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'unidades_productivas.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'unidades_productivas.id_corre')
                ->where(function ($query) use ($busqueda) {
                    $query->where('unidades_productivas.nom_productor', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('unidades_productivas.identificacion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('unidades_productivas.nom_finca', 'LIKE', '%' . $busqueda . '%');
                })
                ->where("unidades_productivas.estado", "Activo")
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "unidades_productivas.estado AS ESTADO",
                    "unidades_productivas.nom_finca",
                    "unidades_productivas.id",
                    "unidades_productivas.identificacion",
                    "unidades_productivas.nom_productor",
                    "unidades_productivas.id_hogar AS IDHOGAR"
                )
                ->orderBy('unidades_productivas.id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.unidades_productivas')
                ->join($alias . '.dptos', 'dptos.codigo', 'unidades_productivas.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'unidades_productivas.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'unidades_productivas.id_corre')
                ->where("unidades_productivas.estado", "Activo")
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "unidades_productivas.estado AS ESTADO",
                    "unidades_productivas.nom_finca",
                    "unidades_productivas.id",
                    "unidades_productivas.identificacion",
                    "unidades_productivas.nom_productor",
                    "unidades_productivas.id_hogar AS IDHOGAR"
                )
                ->orderBy('unidades_productivas.id', 'DESC')
                ->paginate(10);
        }

        return $respuesta;
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.unidades_productivas')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscar($alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.unidades_productivas')
            ->select("unidades_productivas.*")
            ->where('unidades_productivas.id', $id)
            ->where('unidades_productivas.estado', 'Activo')
            ->first();
    }
}
