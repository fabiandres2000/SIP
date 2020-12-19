<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    protected $table = 'vivienda';
    protected $fillable = [
        'id_hogar', 'tipo_vivienda', 'tipo_estructura', 'otro_tipo_estructura', 'numero_cuartos', 'personas_por_cuartos',
        'material_predominante', 'tipo_cubierta', 'otro_tipo_cubierta', 'actividad_economica', 'cual_actividad_economica', 'evento_afecta_vivienda',
        'familias_accion', 'promedio_ingresos', 'otro_depositan_excretas', 'fuente_agua', 'cual_fuente', 'donde_almacena_agua',
        'otro_almacena_agua', 'ubicacion_tanque', 'tipo_tratamiento_agua', 'destino_final_basura', 'otro_destino_final_basura', 'porquerizas',
        'plagas', 'industrias', 'malos_olores', 'rellenos', 'contaminacion_a', 'contaminacion_v',
        'rio', 'otro_cerca', 'cual_cerca', 'estado', 'servicio_sanitario', 'donde_sanitario',
        'excretas', 'cocina', 'dormitorio_a', 'sala', 'dormitorio_n', 'sanitario',
        'lavadero', 'iluminacion_adecuada', 'techo_adecuado', 'ventilacion_adecuada', 'pisos_adecuado', 'paredes_adecuadas', 'gasolina',
        'plaguicidas', 'detergentes', 'plaguicidas_insectos', 'envases_vacios', 'otro_envases_vacios', 'elementos_protecion',
        'otro_elementos_protecion', 'metodos_coccion', 'otro_metodos_coccion', 'lugares_preparan_alimentos', 'lugares_almacenan_alimentos', 'otro_lugares_almacenan_alimentos',
        'lava_frutas', 'energia_electrica', 'gas_natural', 'acueducto', 'alcantarillado', 'telefono_fijo',
        'aseo', 'internet_subsidiado', 'internet_privado', 'aereopuertos', 'avenidas_transitadas', 'lotes_abandonados',
        'tipo_explotacion', 'otro_tipo_explotacion', 'flora_afectados', 'fauna_afectados', 'suelo_afectados', 'aire_afectados',
        'agua_afectados', 'residuos_solidos_genera', 'aguas_servidas_genera', 'desechos_cocina_genera', 'heces_animales_genera', 'quimicos_genera',
        'otros_genera', 'cual_genera', 'tipo_combustible', 'mantenimiento_red', 'zona_alto_riesgo', 'almacenamiento_residuos',
        'fuente_contaminacion', 'aguas_negras', 'zonas_verdes', 'desplazamientos', 'rotacion_cultivo', 'emplea_fertilizantes',
        'suministro_energia_ilegal', 'quema_cultivo', 'mantenimiento_preventivo', 'veces_inundaciones', 'promedio_gastos', 'id_compania',
        'fachada', 'cuantos_baños', 'estado_conservacion_baños', 'acabados_externos', 'estado_conservacion_estructuras',
        'mobiliario_cocina', 'andenes', 'residuos_aprovechables', 'residuos_organicos', 'residuos_no_aprovechables',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.vivienda')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'tipo_vivienda' => $data['tipo_vivienda'],
            'tipo_estructura' => $data['tipo_estructura'],
            'otro_tipo_estructura' => $data['otro_tipo_estructura'],
            'numero_cuartos' => $data['numero_cuartos'],
            'personas_por_cuartos' => $data['personas_por_cuartos'],
            'material_predominante' => $data['material_predominante'],
            'tipo_cubierta' => $data['tipo_cubierta'],
            'otro_tipo_cubierta' => $data['otro_tipo_cubierta'],
            'actividad_economica' => $data['actividad_economica'],
            'cual_actividad_economica' => $data['cual_actividad_economica'],
            'evento_afecta_vivienda' => $data['evento_afecta_vivienda'],
            'familias_accion' => $data['familias_accion'],
            'promedio_ingresos' => $data['promedio_ingresos'],
            'promedio_gastos' => $data['promedio_gastos'],
            'fuente_agua' => $data['fuente_agua'],
            'energia_electrica' => $data['energia_electrica'],
            'gas_natural' => $data['gas_natural'],
            'acueducto' => $data['acueducto'],
            'alcantarillado' => $data['alcantarillado'],
            'telefono_fijo' => $data['telefono_fijo'],
            'aseo' => $data['aseo'],
            'internet_subsidiado' => $data['internet_subsidiado'],
            'internet_privado' => $data['internet_privado'],
            'cual_fuente' => $data['cual_fuente'],
            'donde_almacena_agua' => $data['donde_almacena_agua'],
            'otro_almacena_agua' => $data['otro_almacena_agua'],
            'ubicacion_tanque' => $data['ubicacion_tanque'],
            'tipo_tratamiento_agua' => $data['tipo_tratamiento_agua'],
            'destino_final_basura' => $data['destino_final_basura'],
            'otro_destino_final_basura' => $data['otro_destino_final_basura'],
            'porquerizas' => $data['porquerizas'],
            'plagas' => $data['plagas'],
            'industrias' => $data['industrias'],
            'malos_olores' => $data['malos_olores'],
            'rellenos' => $data['rellenos'],
            'contaminacion_a' => $data['contaminacion_a'],
            'contaminacion_v' => $data['contaminacion_v'],
            'rio' => $data['rio'],
            'otro_cerca' => $data['otro_cerca'],
            'cual_cerca' => $data['cual_cerca'],
            'aereopuertos' => $data['aereopuertos'],
            'avenidas_transitadas' => $data['avenidas_transitadas'],
            'lotes_abandonados' => $data['lotes_abandonados'],
            'servicio_sanitario' => $data['servicio_sanitario'],
            'donde_sanitario' => $data['donde_sanitario'],
            'excretas' => $data['excretas'],
            'otro_depositan_excretas' => $data['otro_depositan_excretas'],
            'cocina' => $data['cocina'],
            'dormitorio_a' => $data['dormitorio_a'],
            'sala' => $data['sala'],
            'dormitorio_n' => $data['dormitorio_n'],
            'sanitario' => $data['sanitario'],
            'lavadero' => $data['lavadero'],
            'iluminacion_adecuada' => $data['iluminacion_adecuada'],
            'techo_adecuado' => $data['techo_adecuado'],
            'ventilacion_adecuada' => $data['ventilacion_adecuada'],
            'pisos_adecuado' => $data['pisos_adecuado'],
            'paredes_adecuadas' => $data['paredes_adecuadas'],
            'gasolina' => $data['gasolina'],
            'plaguicidas' => $data['plaguicidas'],
            'detergentes' => $data['detergentes'],
            'plaguicidas_insectos' => $data['plaguicidas_insectos'],
            'envases_vacios' => $data['envases_vacios'],
            'otro_envases_vacios' => $data['otro_envases_vacios'],
            'elementos_protecion' => $data['elementos_protecion'],
            'otro_elementos_protecion' => $data['otro_elementos_protecion'],
            'metodos_coccion' => $data['metodos_coccion'],
            'otro_metodos_coccion' => $data['otro_metodos_coccion'],
            'lugares_preparan_alimentos' => $data['lugares_preparan_alimentos'],
            'lugares_almacenan_alimentos' => $data['lugares_almacenan_alimentos'],
            'otro_lugares_almacenan_alimentos' => $data['otro_lugares_almacenan_alimentos'],
            'lava_frutas' => $data['lava_frutas'],
            'tipo_explotacion' => $data['tipo_explotacion'],
            'otro_tipo_explotacion' => $data['otro_tipo_explotacion'],
            'flora_afectados' => $data['flora_afectados'],
            'fauna_afectados' => $data['fauna_afectados'],
            'suelo_afectados' => $data['suelo_afectados'],
            'aire_afectados' => $data['aire_afectados'],
            'agua_afectados' => $data['agua_afectados'],
            'residuos_solidos_genera' => $data['residuos_solidos_genera'],
            'aguas_servidas_genera' => $data['aguas_servidas_genera'],
            'desechos_cocina_genera' => $data['desechos_cocina_genera'],
            'heces_animales_genera' => $data['heces_animales_genera'],
            'quimicos_genera' => $data['quimicos_genera'],
            'otros_genera' => $data['otros_genera'],
            'cual_genera' => $data['cual_genera'],
            'tipo_combustible' => $data['tipo_combustible'],
            'mantenimiento_red' => $data['mantenimiento_red'],
            'zona_alto_riesgo' => $data['zona_alto_riesgo'],
            'almacenamiento_residuos' => $data['almacenamiento_residuos'],
            'fuente_contaminacion' => $data['fuente_contaminacion'],
            'aguas_negras' => $data['aguas_negras'],
            'zonas_verdes' => $data['zonas_verdes'],
            'desplazamientos' => $data['desplazamientos'],
            'rotacion_cultivo' => $data['rotacion_cultivo'],
            'emplea_fertilizantes' => $data['emplea_fertilizantes'],
            'suministro_energia_ilegal' => $data['suministro_energia_ilegal'],
            'quema_cultivo' => $data['quema_cultivo'],
            'mantenimiento_preventivo' => $data['mantenimiento_preventivo'],
            'veces_inundaciones' => $data['veces_inundaciones'],
            'id_compania' => 1,
            'estado' => 'Activo',

            'fachada' => $data['fachada'],
            'cuantos_baños' => $data['cuantos_baños'],
            'estado_conservacion_baños' => $data['estado_conservacion_baños'],
            'acabados_externos' => $data['acabados_externos'],
            'estado_conservacion_estructuras' => $data['estado_conservacion_estructuras'],
            'mobiliario_cocina' => $data['mobiliario_cocina'],
            'andenes' => $data['andenes'],
            'residuos_aprovechables' => $data['residuos_aprovechables'],
            'residuos_organicos' => $data['residuos_organicos'],
            'residuos_no_aprovechables' => $data['residuos_no_aprovechables'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.vivienda')
            ->join($alias . '.hogar', 'hogar.id', 'vivienda.id_hogar')
            ->leftjoin($alias . '.actividades_economicas', 'actividades_economicas.id', 'vivienda.actividad_economica')
            ->where('vivienda.id_hogar', $id_hogar)
            ->where('vivienda.estado', 'Activo')
            ->select("vivienda.*", "actividades_economicas.descripcion AS actividadesAuxiliar")
            ->first();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.vivienda')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }
}
