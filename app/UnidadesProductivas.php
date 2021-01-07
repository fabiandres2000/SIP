<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class UnidadesProductivas extends Model
{
    protected $table = 'unidades_productivas';
    protected $fillable = [
        'id_hogar', 'nom_productor', 'nivel_educativo', 'tipo_id', 'identificacion', 'nom_finca', 'hogares_finca',
        'linea_productiva', 'area_total_finca', 'distancia_finca', 'tenencia_propiedad', 'atiende_entrevista', 'credito_produccion', 'fuentes_prestamo',
        'cual_fuente', 'vias_acceso', 'tipos_vias_acceso', 'importancias_agricolas', 'area_produccion', 'unidad_area_produccion',
        'producto', 'variedad', 'semilla', 'pertenece', 'tipo_pertenece', 'nombre_organizacion', 'beneficios',
        'no_pertenece', 'trabaja_asociacion', 'frecuente_cosecha', 'area_cosecha', 'unidad_area_cosecha', 'costo_produccion', 'costo_establecimiento',
        'costo_sostenimiento', 'produccion_destinada', 'tipo_problema', 'compradores', 'precio_promedio_venta', 'metodo_pago', 'precio_promedio_venta_kg',
        'subproductos_produccion', 'programa_asistencia_tecnica', 'nombre_programa', 'entidad', 'cambios_produccion_anio', 'actividad_cambio', 'importancia_comercial',
        'raza', 'costo_total', 'costo_establecer', 'costo_pecuaria', 'problematica_productos', 'otra_problematica', 'produccion',
        'numero_animales', 'area_destinada_produccion', 'unidad_area_destinada', 'compradores_pecuaria', 'precio_promedio_venta_pecuaria', 'metodo_pago_pecuaria', 'subproductos_produccion_pecuaria',
        'pertenece_pecuaria', 'nombre_programa_pecuaria', 'entidad_pecuaria', 'pertenece_organizacion_pecuaria', 'tipo_organizacion_pecuaria', 'nombre_organizacion_pecuaria', 'beneficios_pecuaria',
        'no_pertenece_pecuaria', 'trabaja_asociacion_pecuaria', 'importancia_forestales', 'producto_forestales', 'variedad_forestales', 'edad_plantacion', 'tipo_edad',
        'area_sembrada_forestales', 'unidad_area_forestales', 'rendimiento_arbol', 'costo_total_forestales', 'costo_establecimiento_forestales', 'costo_sostenimiento_forestales', 'problematica_productos_forestales',
        'produccion_destinada_forestales', 'numero_arboles', 'compradores_forestales', 'metodo_pago_forestales', 'precio_promedio_venta_forestales', 'subproductos_produccion_forestales', 'pertenece_forestales',
        'nombre_programa_forestales', 'entidad_forestales', 'pertenece_organizacion_forestales', 'tipo_pertenece_forestales', 'nombre_organizacion_forestales', 'beneficios_forestales', 'no_pertenece_forestales',
        'trabaja_asociacion_forestales', 'fecha', 'usuario_crear', 'fecha_editar', 'usuario_editar', 'estado', 'id_compania',
        'id_dpto', 'id_mun', 'id_corre', 'id_vereda', 'id_barrio', 'direccion', 'unidad_area', 'unidad_distancia',
        'otro_tipo_problema', 'producto_comercial', 'produccion_destinada_pecuaria', 'otros_problematica_productos_forestales',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.unidades_productivas')->insertGetId([
            'id' => $data['id'],
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
            'importancias_agricolas' => $data['importancias_agricolas'],
            'area_produccion' => $data['area_produccion'],
            'unidad_area_produccion' => $data['unidad_area_produccion'],
            'producto' => $data['producto'],

            'variedad' => $data['variedad'],
            'semilla' => $data['semilla'],
            'pertenece' => $data['pertenece'],
            'tipo_pertenece' => $data['tipo_pertenece'],
            'nombre_organizacion' => $data['nombre_organizacion'],
            'beneficios' => $data['beneficios'],
            'no_pertenece' => $data['no_pertenece'],

            'trabaja_asociacion' => $data['trabaja_asociacion'],
            'frecuente_cosecha' => $data['frecuente_cosecha'],
            'area_cosecha' => $data['area_cosecha'],
            'unidad_area_cosecha' => $data['unidad_area_cosecha'],
            'costo_produccion' => $data['costo_produccion'],
            'costo_establecimiento' => $data['costo_establecimiento'],
            'costo_sostenimiento' => $data['costo_sostenimiento'],

            'produccion_destinada' => $data['produccion_destinada'],
            'tipo_problema' => $data['tipo_problema'],
            'compradores' => $data['compradores'],
            'precio_promedio_venta' => $data['precio_promedio_venta'],
            'metodo_pago' => $data['metodo_pago'],
            'precio_promedio_venta_kg' => $data['precio_promedio_venta_kg'],
            'subproductos_produccion' => $data['subproductos_produccion'],

            'programa_asistencia_tecnica' => $data['programa_asistencia_tecnica'],
            'nombre_programa' => $data['nombre_programa'],
            'entidad' => $data['entidad'],
            'cambios_produccion_anio' => $data['cambios_produccion_anio'],
            'actividad_cambio' => $data['actividad_cambio'],
            'importancia_comercial' => $data['importancia_comercial'],
            'raza' => $data['raza'],

            'costo_total' => $data['costo_total'],
            'costo_establecer' => $data['costo_establecer'],
            'costo_pecuaria' => $data['costo_pecuaria'],
            'problematica_productos' => $data['problematica_productos'],
            'otra_problematica' => $data['otra_problematica'],
            'produccion' => $data['produccion'],
            'numero_animales' => $data['numero_animales'],

            'area_destinada_produccion' => $data['area_destinada_produccion'],
            'unidad_area_destinada' => $data['unidad_area_destinada'],
            'compradores_pecuaria' => $data['compradores_pecuaria'],
            'precio_promedio_venta_pecuaria' => $data['precio_promedio_venta_pecuaria'],
            'metodo_pago_pecuaria' => $data['metodo_pago_pecuaria'],
            'subproductos_produccion_pecuaria' => $data['subproductos_produccion_pecuaria'],
            'pertenece_pecuaria' => $data['pertenece_pecuaria'],

            'nombre_programa_pecuaria' => $data['nombre_programa_pecuaria'],
            'entidad_pecuaria' => $data['entidad_pecuaria'],
            'pertenece_organizacion_pecuaria' => $data['pertenece_organizacion_pecuaria'],
            'tipo_organizacion_pecuaria' => $data['tipo_organizacion_pecuaria'],
            'nombre_organizacion_pecuaria' => $data['nombre_organizacion_pecuaria'],
            'beneficios_pecuaria' => $data['beneficios_pecuaria'],
            'no_pertenece_pecuaria' => $data['no_pertenece_pecuaria'],

            'trabaja_asociacion_pecuaria' => $data['trabaja_asociacion_pecuaria'],
            'importancia_forestales' => $data['importancia_forestales'],
            'producto_forestales' => $data['producto_forestales'],
            'variedad_forestales' => $data['variedad_forestales'],
            'edad_plantacion' => $data['edad_plantacion'],
            'tipo_edad' => $data['tipo_edad'],
            'area_sembrada_forestales' => $data['area_sembrada_forestales'],

            'unidad_area_forestales' => $data['unidad_area_forestales'],
            'rendimiento_arbol' => $data['rendimiento_arbol'],
            'costo_total_forestales' => $data['costo_total_forestales'],
            'costo_establecimiento_forestales' => $data['costo_establecimiento_forestales'],
            'costo_sostenimiento_forestales' => $data['costo_sostenimiento_forestales'],
            'problematica_productos_forestales' => $data['problematica_productos_forestales'],
            'produccion_destinada_forestales' => $data['produccion_destinada_forestales'],

            'numero_arboles' => $data['numero_arboles'],
            'compradores_forestales' => $data['compradores_forestales'],
            'metodo_pago_forestales' => $data['metodo_pago_forestales'],
            'precio_promedio_venta_forestales' => $data['precio_promedio_venta_forestales'],
            'subproductos_produccion_forestales' => $data['subproductos_produccion_forestales'],
            'pertenece_forestales' => $data['pertenece_forestales'],
            'nombre_programa_forestales' => $data['nombre_programa_forestales'],

            'entidad_forestales' => $data['entidad_forestales'],
            'pertenece_organizacion_forestales' => $data['pertenece_organizacion_forestales'],
            'tipo_pertenece_forestales' => $data['tipo_pertenece_forestales'],
            'nombre_organizacion_forestales' => $data['nombre_organizacion_forestales'],
            'beneficios_forestales' => $data['beneficios_forestales'],
            'no_pertenece_forestales' => $data['no_pertenece_forestales'],
            'trabaja_asociacion_forestales' => $data['trabaja_asociacion_forestales'],

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
            'otro_tipo_problema' => $data['otro_tipo_problema'],
            'producto_comercial' => $data['producto_comercial'],
            'produccion_destinada_pecuaria' => $data['produccion_destinada_pecuaria'],
            'otros_problematica_productos_forestales' => $data['otros_problematica_productos_forestales'],
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
            'importancias_agricolas' => $data['importancias_agricolas'],
            'area_produccion' => $data['area_produccion'],
            'unidad_area_produccion' => $data['unidad_area_produccion'],
            'producto' => $data['producto'],

            'variedad' => $data['variedad'],
            'semilla' => $data['semilla'],
            'pertenece' => $data['pertenece'],
            'tipo_pertenece' => $data['tipo_pertenece'],
            'nombre_organizacion' => $data['nombre_organizacion'],
            'beneficios' => $data['beneficios'],
            'no_pertenece' => $data['no_pertenece'],

            'trabaja_asociacion' => $data['trabaja_asociacion'],
            'frecuente_cosecha' => $data['frecuente_cosecha'],
            'area_cosecha' => $data['area_cosecha'],
            'unidad_area_cosecha' => $data['unidad_area_cosecha'],
            'costo_produccion' => $data['costo_produccion'],
            'costo_establecimiento' => $data['costo_establecimiento'],
            'costo_sostenimiento' => $data['costo_sostenimiento'],

            'produccion_destinada' => $data['produccion_destinada'],
            'tipo_problema' => $data['tipo_problema'],
            'compradores' => $data['compradores'],
            'precio_promedio_venta' => $data['precio_promedio_venta'],
            'metodo_pago' => $data['metodo_pago'],
            'precio_promedio_venta_kg' => $data['precio_promedio_venta_kg'],
            'subproductos_produccion' => $data['subproductos_produccion'],

            'programa_asistencia_tecnica' => $data['programa_asistencia_tecnica'],
            'nombre_programa' => $data['nombre_programa'],
            'entidad' => $data['entidad'],
            'cambios_produccion_anio' => $data['cambios_produccion_anio'],
            'actividad_cambio' => $data['actividad_cambio'],
            'importancia_comercial' => $data['importancia_comercial'],
            'raza' => $data['raza'],

            'costo_total' => $data['costo_total'],
            'costo_establecer' => $data['costo_establecer'],
            'costo_pecuaria' => $data['costo_pecuaria'],
            'problematica_productos' => $data['problematica_productos'],
            'otra_problematica' => $data['otra_problematica'],
            'produccion' => $data['produccion'],
            'numero_animales' => $data['numero_animales'],

            'area_destinada_produccion' => $data['area_destinada_produccion'],
            'unidad_area_destinada' => $data['unidad_area_destinada'],
            'compradores_pecuaria' => $data['compradores_pecuaria'],
            'precio_promedio_venta_pecuaria' => $data['precio_promedio_venta_pecuaria'],
            'metodo_pago_pecuaria' => $data['metodo_pago_pecuaria'],
            'subproductos_produccion_pecuaria' => $data['subproductos_produccion_pecuaria'],
            'pertenece_pecuaria' => $data['pertenece_pecuaria'],

            'nombre_programa_pecuaria' => $data['nombre_programa_pecuaria'],
            'entidad_pecuaria' => $data['entidad_pecuaria'],
            'pertenece_organizacion_pecuaria' => $data['pertenece_organizacion_pecuaria'],
            'tipo_organizacion_pecuaria' => $data['tipo_organizacion_pecuaria'],
            'nombre_organizacion_pecuaria' => $data['nombre_organizacion_pecuaria'],
            'beneficios_pecuaria' => $data['beneficios_pecuaria'],
            'no_pertenece_pecuaria' => $data['no_pertenece_pecuaria'],

            'trabaja_asociacion_pecuaria' => $data['trabaja_asociacion_pecuaria'],
            'importancia_forestales' => $data['importancia_forestales'],
            'producto_forestales' => $data['producto_forestales'],
            'variedad_forestales' => $data['variedad_forestales'],
            'edad_plantacion' => $data['edad_plantacion'],
            'tipo_edad' => $data['tipo_edad'],
            'area_sembrada_forestales' => $data['area_sembrada_forestales'],

            'unidad_area_forestales' => $data['unidad_area_forestales'],
            'rendimiento_arbol' => $data['rendimiento_arbol'],
            'costo_total_forestales' => $data['costo_total_forestales'],
            'costo_establecimiento_forestales' => $data['costo_establecimiento_forestales'],
            'costo_sostenimiento_forestales' => $data['costo_sostenimiento_forestales'],
            'problematica_productos_forestales' => $data['problematica_productos_forestales'],
            'produccion_destinada_forestales' => $data['produccion_destinada_forestales'],

            'numero_arboles' => $data['numero_arboles'],
            'compradores_forestales' => $data['compradores_forestales'],
            'metodo_pago_forestales' => $data['metodo_pago_forestales'],
            'precio_promedio_venta_forestales' => $data['precio_promedio_venta_forestales'],
            'subproductos_produccion_forestales' => $data['subproductos_produccion_forestales'],
            'pertenece_forestales' => $data['pertenece_forestales'],
            'nombre_programa_forestales' => $data['nombre_programa_forestales'],

            'entidad_forestales' => $data['entidad_forestales'],
            'pertenece_organizacion_forestales' => $data['pertenece_organizacion_forestales'],
            'tipo_pertenece_forestales' => $data['tipo_pertenece_forestales'],
            'nombre_organizacion_forestales' => $data['nombre_organizacion_forestales'],
            'beneficios_forestales' => $data['beneficios_forestales'],
            'no_pertenece_forestales' => $data['no_pertenece_forestales'],
            'trabaja_asociacion_forestales' => $data['trabaja_asociacion_forestales'],

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
            'otro_tipo_problema' => $data['otro_tipo_problema'],
            'producto_comercial' => $data['producto_comercial'],
            'produccion_destinada_pecuaria' => $data['produccion_destinada_pecuaria'],
            'otros_problematica_productos_forestales' => $data['otros_problematica_productos_forestales'],
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
