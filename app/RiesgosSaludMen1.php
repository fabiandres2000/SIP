<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class RiesgosSaludMen1 extends Model
{
    protected $table = 'riesgos_salud_men1';
    protected $fillable = [
        'id_hogar', 'enfermedades_infecciosas_I', 'transtornos_asociados_spa_I', 'enfermedad_cardiovascular_I', 'cancer_I',
        'alteraciones_transtornos_visuales_I', 'alteraciones_transtornos_audicion_I', 'salud_bucal_I', 'problemas_salud_mental_I', 'violencias_I',
        'enfermedades_respiratorias_I', 'enfermedades_zoonoticas_I', 'transtornos_degenartivos_I', 'consumo_spa_I', 'riesgos_desnutricion_aguda_I',
        'riesgos_desnutricion_global_I', 'desnutricion_global_I', 'riesgo_talla_baja_I', 'talla_baja_retraso_I', 'desnutricion_aguda_moderada_I',
        'desnutricion_aguda_severa_I', 'riesgo_muerte_I', 'riesgo_sobrepeso_I', 'sobrepeso_I', 'obesidad_I',

        'enfermedades_infecciosas_R', 'transtornos_asociados_spa_R', 'enfermedad_cardiovascular_R', 'cancer_R',
        'alteraciones_transtornos_visuales_R', 'alteraciones_transtornos_audicion_R', 'salud_bucal_R', 'problemas_salud_mental_R', 'violencias_R',
        'enfermedades_respiratorias_R', 'enfermedades_zoonoticas_R', 'transtornos_degenartivos_R', 'consumo_spa_R', 'riesgos_desnutricion_aguda_R',
        'riesgos_desnutricion_global_R', 'desnutricion_global_R', 'riesgo_talla_baja_R', 'talla_baja_retraso_R', 'desnutricion_aguda_moderada_R',
        'desnutricion_aguda_severa_R', 'riesgo_muerte_R', 'riesgo_sobrepeso_R', 'sobrepeso_R', 'obesidad_R',

        'estado', 'id_compania', 'id_inte',
    ];
    public static function guardar($data, $alias)
    {

        return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')->updateOrInsert([
            'id_inte' => $data['id_inte'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'enfermedades_infecciosas_I' => $data['enfermedades_infecciosas_I'],
            'transtornos_asociados_spa_I' => $data['transtornos_asociados_spa_I'],
            'enfermedad_cardiovascular_I' => $data['enfermedad_cardiovascular_I'],
            'cancer_I' => $data['cancer_I'],
            'alteraciones_transtornos_visuales_I' => $data['alteraciones_transtornos_visuales_I'],
            'alteraciones_transtornos_audicion_I' => $data['alteraciones_transtornos_audicion_I'],
            'salud_bucal_I' => $data['salud_bucal_I'],
            'problemas_salud_mental_I' => $data['problemas_salud_mental_I'],

            'violencias_I' => $data['violencias_I'],
            'enfermedades_respiratorias_I' => $data['enfermedades_respiratorias_I'],
            'enfermedades_zoonoticas_I' => $data['enfermedades_zoonoticas_I'],
            'transtornos_degenartivos_I' => $data['transtornos_degenartivos_I'],
            'consumo_spa_I' => $data['consumo_spa_I'],
            'riesgos_desnutricion_aguda_I' => $data['riesgos_desnutricion_aguda_I'],
            'riesgos_desnutricion_global_I' => $data['riesgos_desnutricion_global_I'],
            'desnutricion_global_I' => $data['desnutricion_global_I'],

            'riesgo_talla_baja_I' => $data['riesgo_talla_baja_I'],
            'talla_baja_retraso_I' => $data['talla_baja_retraso_I'],
            'desnutricion_aguda_moderada_I' => $data['desnutricion_aguda_moderada_I'],
            'desnutricion_aguda_severa_I' => $data['desnutricion_aguda_severa_I'],
            'riesgo_muerte_I' => $data['riesgo_muerte_I'],
            'riesgo_sobrepeso_I' => $data['riesgo_sobrepeso_I'],
            'sobrepeso_I' => $data['sobrepeso_I'],
            'obesidad_I' => $data['obesidad_I'],

            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
            ->join($alias . '.integrantes', 'integrantes.id', 'riesgos_salud_men1.id_inte')
            ->where('riesgos_salud_men1.id_hogar', $id_hogar)
            ->where('riesgos_salud_men1.estado', 'Activo')
            ->select('riesgos_salud_men1.*'
                , "integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape")
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->orderBy()
            ->get();
    }

}
