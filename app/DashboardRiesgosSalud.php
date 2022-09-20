<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class DashboardRiesgosSalud extends Model
{
    public static function riesgos_poblacion($alias, $tipo, $id, $rango)
    {
        if($tipo == "todos"){

            if($rango == "riesgos_salud_men1"  || $rango == "riesgos_salud_de1a5" || $rango == "riesgos_salud_de6a11" ){
                $riesgosSalud = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->select('*')
                ->where('integrantes.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->get();
            }else{
                $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->select('*')
                ->where('integrantes.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->where($alias.'.'.$rango.'.opci', 'INTE')
                ->get();;
    
                $riesgosSaludJefes = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->select('*')
                ->where('caracterizacion.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->where($alias.'.'.$rango.'.opci', 'JEFE')
                ->get();
    
                $riesgosSalud = array();
                
                foreach ($riesgosSaludIntegrantes as &$item) {
                    array_push($riesgosSalud, $item);
                }

                foreach ($riesgosSaludJefes as &$item) {
                    array_push($riesgosSalud, $item);
                }
            }
           
            $riesgosCantidad = self::cantidad_por_riesgo($riesgosSalud, $rango);

            $info = [
                "poblacion" =>  $riesgosSalud,
                "riesgosCantidad" =>  $riesgosCantidad
            ];

            return $info;
        }
    }

    public static function cantidad_por_riesgo($data, $rango){

        if ($rango == "riesgos_salud_men1") {

            $enfermedades_infecciosas_I = 0; $enfermedades_infecciosas_II = 0; $enfermedades_infecciosas_III = 0; $enfermedades_infecciosas_IIII = 0;
            $transtornos_asociados_spa_I = 0; $transtornos_asociados_spa_II = 0; $transtornos_asociados_spa_III = 0; $transtornos_asociados_spa_IIII = 0;
            $enfermedad_cardiovascular_I = 0; $enfermedad_cardiovascular_II = 0; $enfermedad_cardiovascular_III = 0; $enfermedad_cardiovascular_IIII = 0;
            $cancer_I = 0;$cancer_II = 0;$cancer_III = 0;$cancer_IIII = 0; 
            $alteraciones_transtornos_visuales_I = 0; $alteraciones_transtornos_visuales_II = 0; $alteraciones_transtornos_visuales_III = 0; $alteraciones_transtornos_visuales_IIII = 0;
            $alteraciones_transtornos_audicion_I = 0; $alteraciones_transtornos_audicion_II = 0; $alteraciones_transtornos_audicion_III = 0; $alteraciones_transtornos_audicion_IIII = 0;
            $salud_bucal_I = 0;  $salud_bucal_II = 0;  $salud_bucal_III = 0;  $salud_bucal_IIII = 0;
            $problemas_salud_mental_I = 0; $problemas_salud_mental_II = 0; $problemas_salud_mental_III = 0; $problemas_salud_mental_IIII = 0;
            $enfermedades_respiratorias_I = 0;  $enfermedades_respiratorias_II = 0;  $enfermedades_respiratorias_III = 0; $enfermedades_respiratorias_IIII = 0;
            $enfermedades_zoonoticas_I = 0; $enfermedades_zoonoticas_II = 0; $enfermedades_zoonoticas_III = 0; $enfermedades_zoonoticas_IIII = 0;
            $transtornos_degenartivos_I = 0; $transtornos_degenartivos_II = 0; $transtornos_degenartivos_III = 0; $transtornos_degenartivos_IIII = 0;
            $consumo_spa_I = 0; $consumo_spa_II = 0; $consumo_spa_III = 0; $consumo_spa_IIII = 0;
            $riesgos_desnutricion_aguda_I = 0; $riesgos_desnutricion_aguda_II = 0; $riesgos_desnutricion_aguda_III = 0; $riesgos_desnutricion_aguda_IIII = 0;
            $riesgos_desnutricion_global_I = 0; $riesgos_desnutricion_global_II = 0; $riesgos_desnutricion_global_III = 0; $riesgos_desnutricion_global_IIII = 0;
            $desnutricion_global_I = 0; $desnutricion_global_II = 0; $desnutricion_global_III = 0; $desnutricion_global_IIII = 0;
            $riesgo_talla_baja_I = 0; $riesgo_talla_baja_II = 0; $riesgo_talla_baja_III = 0; $riesgo_talla_baja_IIII = 0;
            $talla_baja_retraso_I = 0;  $talla_baja_retraso_II = 0;  $talla_baja_retraso_III = 0;  $talla_baja_retraso_IIII = 0;
            $desnutricion_aguda_moderada_I = 0;  $desnutricion_aguda_moderada_II = 0;  $desnutricion_aguda_moderada_III = 0;  $desnutricion_aguda_moderada_IIII = 0;
            $desnutricion_aguda_severa_I = 0; $desnutricion_aguda_severa_II = 0; $desnutricion_aguda_severa_III = 0;$desnutricion_aguda_severa_IIII = 0;
            $riesgo_muerte_I = 0; $riesgo_muerte_II = 0;$riesgo_muerte_III = 0;$riesgo_muerte_IIII = 0;
            $riesgo_sobrepeso_I = 0; $riesgo_sobrepeso_II = 0; $riesgo_sobrepeso_III = 0; $riesgo_sobrepeso_IIII = 0;
            $sobrepeso_I = 0; $sobrepeso_II = 0; $sobrepeso_III = 0; $sobrepeso_IIII = 0;
            $obesidad_I = 0; $obesidad_II = 0; $obesidad_III = 0; $obesidad_IIII = 0;
            $violencias_I = 0;  $violencias_II = 0;  $violencias_III = 0;  $violencias_IIII = 0;

            foreach ($data as $item) {
                if($item->enfermedades_infecciosas_R == 0 || $item->enfermedades_infecciosas_R == 1){
                    $enfermedades_infecciosas_I += 1;
                }else{
                    if($item->enfermedades_infecciosas_R == 2){
                        $enfermedades_infecciosas_II += 1;
                    }else{
                        if($item->enfermedades_infecciosas_R == 3){
                            $enfermedades_infecciosas_III += 1;
                        }else{
                            $enfermedades_infecciosas_IIII += 1;
                        }
                    }
                }
                
                if($item->transtornos_asociados_spa_R == 0 || $item->transtornos_asociados_spa_R == 1){
                    $transtornos_asociados_spa_I += 1;
                }else{
                    if($item->transtornos_asociados_spa_R == 2){
                        $transtornos_asociados_spa_II += 1;
                    }else{
                        if($item->transtornos_asociados_spa_R == 3){
                            $transtornos_asociados_spa_III += 1;
                        }else{
                            $transtornos_asociados_spa_IIII += 1;
                        }
                    }
                }

                if($item->enfermedad_cardiovascular_R == 0 || $item->enfermedad_cardiovascular_R == 1){
                    $enfermedad_cardiovascular_I += 1;
                }else{
                    if($item->enfermedad_cardiovascular_R == 2){
                        $enfermedad_cardiovascular_II += 1;
                    }else{
                        if($item->enfermedad_cardiovascular_R == 3){
                            $enfermedad_cardiovascular_III += 1;
                        }else{
                            $enfermedad_cardiovascular_IIII += 1;
                        }
                    }
                }

                if($item->cancer_R == 0 || $item->cancer_R == 1){
                    $cancer_I += 1;
                }else{
                    if($item->cancer_R == 2){
                        $cancer_II += 1;
                    }else{
                        if($item->cancer_R == 3){
                            $cancer_III += 1;
                        }else{
                            $cancer_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_visuales_R == 0 || $item->alteraciones_transtornos_visuales_R == 1){
                    $alteraciones_transtornos_visuales_I += 1;
                }else{
                    if($item->alteraciones_transtornos_visuales_R == 2){
                        $alteraciones_transtornos_visuales_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_visuales_R == 3){
                            $alteraciones_transtornos_visuales_III += 1;
                        }else{
                            $alteraciones_transtornos_visuales_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_audicion_R == 0 || $item->alteraciones_transtornos_audicion_R == 1){
                    $alteraciones_transtornos_audicion_I += 1;
                }else{
                    if($item->alteraciones_transtornos_audicion_R == 2){
                        $alteraciones_transtornos_audicion_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_audicion_R == 3){
                            $alteraciones_transtornos_audicion_III += 1;
                        }else{
                            $alteraciones_transtornos_audicion_IIII += 1;
                        }
                    }
                }

                if($item->salud_bucal_R == 0 || $item->salud_bucal_R == 1){
                    $salud_bucal_I += 1;
                }else{
                    if($item->salud_bucal_R == 2){
                        $salud_bucal_II += 1;
                    }else{
                        if($item->salud_bucal_R == 3){
                            $salud_bucal_III += 1;
                        }else{
                            $salud_bucal_IIII += 1;
                        }
                    }
                }

                if($item->problemas_salud_mental_R == 0 || $item->problemas_salud_mental_R == 1){
                    $problemas_salud_mental_I += 1;
                }else{
                    if($item->problemas_salud_mental_R == 2){
                        $problemas_salud_mental_II += 1;
                    }else{
                        if($item->problemas_salud_mental_R == 3){
                            $problemas_salud_mental_III += 1;
                        }else{
                            $problemas_salud_mental_IIII += 1;
                        }
                    }
                }

                if($item->violencias_R == 0 || $item->violencias_R == 1){
                    $violencias_I += 1;
                }else{
                    if($item->violencias_R == 2){
                        $violencias_II += 1;
                    }else{
                        if($item->violencias_R == 3){
                            $violencias_III += 1;
                        }else{
                            $violencias_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_respiratorias_R == 0 || $item->enfermedades_respiratorias_R == 1){
                    $enfermedades_respiratorias_I += 1;
                }else{
                    if($item->enfermedades_respiratorias_R == 2){
                        $enfermedades_respiratorias_II += 1;
                    }else{
                        if($item->enfermedades_respiratorias_R == 3){
                            $enfermedades_respiratorias_III += 1;
                        }else{
                            $enfermedades_respiratorias_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_zoonoticas_R == 0 || $item->enfermedades_zoonoticas_R == 1){
                    $enfermedades_zoonoticas_I += 1;
                }else{
                    if($item->enfermedades_zoonoticas_R == 2){
                        $enfermedades_zoonoticas_II += 1;
                    }else{
                        if($item->enfermedades_zoonoticas_R == 3){
                            $enfermedades_zoonoticas_III += 1;
                        }else{
                            $enfermedades_zoonoticas_IIII += 1;
                        }
                    }
                }

                if($item->transtornos_degenartivos_R == 0 || $item->transtornos_degenartivos_R == 1){
                    $transtornos_degenartivos_I += 1;
                }else{
                    if($item->transtornos_degenartivos_R == 2){
                        $transtornos_degenartivos_II += 1;
                    }else{
                        if($item->transtornos_degenartivos_R == 3){
                            $transtornos_degenartivos_III += 1;
                        }else{
                            $transtornos_degenartivos_IIII += 1;
                        }
                    }
                }

                if($item->consumo_spa_R == 0 || $item->consumo_spa_R == 1){
                    $consumo_spa_I += 1;
                }else{
                    if($item->consumo_spa_R == 2){
                        $consumo_spa_II += 1;
                    }else{
                        if($item->consumo_spa_R == 3){
                            $consumo_spa_III += 1;
                        }else{
                            $consumo_spa_IIII += 1;
                        }
                    }
                }

                if($item->riesgos_desnutricion_aguda_R == 0 || $item->riesgos_desnutricion_aguda_R == 1){
                    $riesgos_desnutricion_aguda_I += 1;
                }else{
                    if($item->riesgos_desnutricion_aguda_R == 2){
                        $riesgos_desnutricion_aguda_II += 1;
                    }else{
                        if($item->riesgos_desnutricion_aguda_R == 3){
                            $riesgos_desnutricion_aguda_III += 1;
                        }else{
                            $riesgos_desnutricion_aguda_IIII += 1;
                        }
                    }
                }

                if($item->riesgos_desnutricion_global_R == 0 || $item->riesgos_desnutricion_global_R == 1){
                    $riesgos_desnutricion_global_I += 1;
                }else{
                    if($item->riesgos_desnutricion_global_R == 2){
                        $riesgos_desnutricion_global_II += 1;
                    }else{
                        if($item->riesgos_desnutricion_global_R == 3){
                            $riesgos_desnutricion_global_III += 1;
                        }else{
                            $riesgos_desnutricion_global_IIII += 1;
                        }
                    }
                }

                if($item->desnutricion_global_R == 0 || $item->desnutricion_global_R == 1){
                    $desnutricion_global_I += 1;
                }else{
                    if($item->desnutricion_global_R == 2){
                        $desnutricion_global_II += 1;
                    }else{
                        if($item->desnutricion_global_R == 3){
                            $desnutricion_global_III += 1;
                        }else{
                            $desnutricion_global_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_talla_baja_R == 0 || $item->riesgo_talla_baja_R == 1){
                    $riesgo_talla_baja_I += 1;
                }else{
                    if($item->riesgo_talla_baja_R == 2){
                        $riesgo_talla_baja_II += 1;
                    }else{
                        if($item->riesgo_talla_baja_R == 3){
                            $riesgo_talla_baja_III += 1;
                        }else{
                            $riesgo_talla_baja_IIII += 1;
                        }
                    }
                }

                if($item->talla_baja_retraso_R == 0 || $item->talla_baja_retraso_R == 1){
                    $talla_baja_retraso_I += 1;
                }else{
                    if($item->talla_baja_retraso_R == 2){
                        $talla_baja_retraso_II += 1;
                    }else{
                        if($item->talla_baja_retraso_R == 3){
                            $talla_baja_retraso_III += 1;
                        }else{
                            $talla_baja_retraso_IIII += 1;
                        }
                    }
                }

                if($item->desnutricion_aguda_moderada_R == 0 || $item->desnutricion_aguda_moderada_R == 1){
                    $desnutricion_aguda_moderada_I += 1;
                }else{
                    if($item->desnutricion_aguda_moderada_R == 2){
                        $desnutricion_aguda_moderada_II += 1;
                    }else{
                        if($item->desnutricion_aguda_moderada_R == 3){
                            $desnutricion_aguda_moderada_III += 1;
                        }else{
                            $desnutricion_aguda_moderada_IIII += 1;
                        }
                    }
                }

                if($item->desnutricion_aguda_severa_R == 0 || $item->desnutricion_aguda_severa_R == 1){
                    $desnutricion_aguda_severa_I += 1;
                }else{
                    if($item->desnutricion_aguda_severa_R == 2){
                        $desnutricion_aguda_severa_II += 1;
                    }else{
                        if($item->desnutricion_aguda_severa_R == 3){
                            $desnutricion_aguda_severa_III += 1;
                        }else{
                            $desnutricion_aguda_severa_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_muerte_R == 0 || $item->riesgo_muerte_R == 1){
                    $riesgo_muerte_I += 1;
                }else{
                    if($item->riesgo_muerte_R == 2){
                        $riesgo_muerte_II += 1;
                    }else{
                        if($item->riesgo_muerte_R == 3){
                            $riesgo_muerte_III += 1;
                        }else{
                            $riesgo_muerte_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_sobrepeso_R == 0 || $item->riesgo_sobrepeso_R == 1){
                    $riesgo_sobrepeso_I += 1;
                }else{
                    if($item->riesgo_sobrepeso_R == 2){
                        $riesgo_sobrepeso_II += 1;
                    }else{
                        if($item->riesgo_sobrepeso_R == 3){
                            $riesgo_sobrepeso_III += 1;
                        }else{
                            $riesgo_sobrepeso_IIII += 1;
                        }
                    }
                }

                if($item->sobrepeso_R == 0 || $item->sobrepeso_R == 1){
                    $sobrepeso_I += 1;
                }else{
                    if($item->sobrepeso_R == 2){
                        $sobrepeso_II += 1;
                    }else{
                        if($item->sobrepeso_R == 3){
                            $sobrepeso_III += 1;
                        }else{
                            $sobrepeso_IIII += 1;
                        }
                    }
                }

                if($item->obesidad_R == 0 || $item->obesidad_R == 1){
                    $obesidad_I += 1;
                }else{
                    if($item->obesidad_R == 2){
                        $obesidad_II += 1;
                    }else{
                        if($item->obesidad_R == 3){
                            $obesidad_III += 1;
                        }else{
                            $obesidad_IIII += 1;
                        }
                    }
                }
            }

            $info = [
                "enfermedades_infecciosas" =>  [
                    "Inexistente" => $enfermedades_infecciosas_I,
                    "Bajo" => $enfermedades_infecciosas_II,
                    "Moderado" => $enfermedades_infecciosas_III,
                    "Alto" => $enfermedades_infecciosas_IIII,
                ],
                "transtornos_asociados_spa" =>  [
                    "Inexistente" => $transtornos_asociados_spa_I,
                    "Bajo" => $transtornos_asociados_spa_II,
                    "Moderado" => $transtornos_asociados_spa_III,
                    "Alto" => $transtornos_asociados_spa_IIII,
                ],
                "enfermedad_cardiovascular" =>  [
                    "Inexistente" => $enfermedad_cardiovascular_I,
                    "Bajo" => $enfermedad_cardiovascular_II,
                    "Moderado" => $enfermedad_cardiovascular_III,
                    "Alto" => $enfermedad_cardiovascular_IIII,
                ],
                "cancer" =>  [
                    "Inexistente" => $cancer_I,
                    "Bajo" => $cancer_II,
                    "Moderado" => $cancer_III,
                    "Alto" => $cancer_IIII,
                ],
                "alteraciones_transtornos_visuales" =>  [
                    "Inexistente" => $alteraciones_transtornos_visuales_I,
                    "Bajo" => $alteraciones_transtornos_visuales_II,
                    "Moderado" => $alteraciones_transtornos_visuales_III,
                    "Alto" => $alteraciones_transtornos_visuales_IIII,
                ],
                "alteraciones_transtornos_audicion" =>  [
                    "Inexistente" => $alteraciones_transtornos_audicion_I,
                    "Bajo" => $alteraciones_transtornos_audicion_II,
                    "Moderado" => $alteraciones_transtornos_audicion_III,
                    "Alto" => $alteraciones_transtornos_audicion_IIII,
                ],
                "salud_bucal" =>  [
                    "Inexistente" => $salud_bucal_I,
                    "Bajo" => $salud_bucal_II,
                    "Moderado" => $salud_bucal_III,
                    "Alto" => $salud_bucal_IIII,
                ],
                "problemas_salud_mental" =>  [
                    "Inexistente" => $problemas_salud_mental_I,
                    "Bajo" => $problemas_salud_mental_II,
                    "Moderado" => $problemas_salud_mental_III,
                    "Alto" => $problemas_salud_mental_IIII,
                ],
                "enfermedades_respiratorias" =>  [
                    "Inexistente" => $enfermedades_respiratorias_I,
                    "Bajo" => $enfermedades_respiratorias_II,
                    "Moderado" => $enfermedades_respiratorias_III,
                    "Alto" => $enfermedades_respiratorias_IIII,
                ],
                "enfermedades_zoonoticas" =>  [
                    "Inexistente" => $enfermedades_zoonoticas_I,
                    "Bajo" => $enfermedades_zoonoticas_II,
                    "Moderado" => $enfermedades_zoonoticas_III,
                    "Alto" => $enfermedades_zoonoticas_IIII,
                ],
                "transtornos_degenartivos" =>  [
                    "Inexistente" => $transtornos_degenartivos_I,
                    "Bajo" => $transtornos_degenartivos_II,
                    "Moderado" => $transtornos_degenartivos_III,
                    "Alto" => $transtornos_degenartivos_IIII,
                ],
                "consumo_spa" =>  [
                    "Inexistente" => $consumo_spa_I,
                    "Bajo" => $consumo_spa_II,
                    "Moderado" => $consumo_spa_III,
                    "Alto" => $consumo_spa_IIII,
                ],
                "riesgos_desnutricion_aguda" =>  [
                    "Inexistente" => $riesgos_desnutricion_aguda_I,
                    "Bajo" => $riesgos_desnutricion_aguda_II,
                    "Moderado" => $riesgos_desnutricion_aguda_III,
                    "Alto" => $riesgos_desnutricion_aguda_IIII,
                ],
                "riesgos_desnutricion_global" =>  [
                    "Inexistente" => $riesgos_desnutricion_global_I,
                    "Bajo" => $riesgos_desnutricion_global_II,
                    "Moderado" => $riesgos_desnutricion_global_III,
                    "Alto" => $riesgos_desnutricion_global_IIII,
                ],
                "desnutricion_global" =>  [
                    "Inexistente" => $desnutricion_global_I,
                    "Bajo" => $desnutricion_global_II,
                    "Moderado" => $desnutricion_global_III,
                    "Alto" => $desnutricion_global_IIII,
                ],
                "riesgo_talla_baja" =>  [
                    "Inexistente" => $riesgo_talla_baja_I,
                    "Bajo" => $riesgo_talla_baja_II,
                    "Moderado" => $riesgo_talla_baja_III,
                    "Alto" => $riesgo_talla_baja_IIII,
                ],
                "talla_baja_retraso" =>  [
                    "Inexistente" => $talla_baja_retraso_I,
                    "Bajo" => $talla_baja_retraso_II,
                    "Moderado" => $talla_baja_retraso_III,
                    "Alto" => $talla_baja_retraso_IIII,
                ],
                "desnutricion_aguda_moderada" =>  [
                    "Inexistente" => $desnutricion_aguda_moderada_I,
                    "Bajo" => $desnutricion_aguda_moderada_II,
                    "Moderado" => $desnutricion_aguda_moderada_III,
                    "Alto" => $desnutricion_aguda_moderada_IIII,
                ],
                "desnutricion_aguda_severa" =>  [
                    "Inexistente" => $desnutricion_aguda_severa_I,
                    "Bajo" => $desnutricion_aguda_severa_II,
                    "Moderado" => $desnutricion_aguda_severa_III,
                    "Alto" => $desnutricion_aguda_severa_IIII,
                ],
                "riesgo_muerte" =>  [
                    "Inexistente" => $riesgo_muerte_I,
                    "Bajo" => $riesgo_muerte_II,
                    "Moderado" => $riesgo_muerte_III,
                    "Alto" => $riesgo_muerte_IIII,
                ],
                "riesgo_sobrepeso" =>  [
                    "Inexistente" => $riesgo_sobrepeso_I,
                    "Bajo" => $riesgo_sobrepeso_II,
                    "Moderado" => $riesgo_sobrepeso_III,
                    "Alto" => $riesgo_sobrepeso_IIII,
                ],
                "sobrepeso" =>  [
                    "Inexistente" => $sobrepeso_I,
                    "Bajo" => $sobrepeso_II,
                    "Moderado" => $sobrepeso_III,
                    "Alto" => $sobrepeso_IIII,
                ],
                "obesidad" =>  [
                    "Inexistente" => $obesidad_I,
                    "Bajo" => $obesidad_II,
                    "Moderado" => $obesidad_III,
                    "Alto" => $obesidad_IIII,
                ],
                "violencias" =>  [
                    "Inexistente" => $violencias_I,
                    "Bajo" => $violencias_II,
                    "Moderado" => $violencias_III,
                    "Alto" => $violencias_IIII,
                ]
            ];

            return $info;
        }

        // de 1 a 5 años
        if ($rango == "riesgos_salud_de1a5") {

            $enfermedades_infecciosas_I = 0; $enfermedades_infecciosas_II = 0; $enfermedades_infecciosas_III = 0; $enfermedades_infecciosas_IIII = 0;
            $enfermedades_infecciosas_I = 0; $enfermedades_infecciosas_II = 0; $enfermedades_infecciosas_III = 0; $enfermedades_infecciosas_IIII = 0;
            $transtornos_asociados_spa_I = 0; $transtornos_asociados_spa_II = 0; $transtornos_asociados_spa_III = 0; $transtornos_asociados_spa_IIII = 0;
            $enfermedad_cardiovascular_I = 0; $enfermedad_cardiovascular_II = 0; $enfermedad_cardiovascular_III = 0; $enfermedad_cardiovascular_IIII = 0;
            $cancer_I = 0;$cancer_II = 0;$cancer_III = 0;$cancer_IIII = 0; 
            $alteraciones_transtornos_visuales_I = 0; $alteraciones_transtornos_visuales_II = 0; $alteraciones_transtornos_visuales_III = 0; $alteraciones_transtornos_visuales_IIII = 0;
            $alteraciones_transtornos_audicion_I = 0; $alteraciones_transtornos_audicion_II = 0; $alteraciones_transtornos_audicion_III = 0; $alteraciones_transtornos_audicion_IIII = 0;
            $salud_bucal_I = 0;  $salud_bucal_II = 0;  $salud_bucal_III = 0;  $salud_bucal_IIII = 0;
            $problemas_salud_mental_I = 0; $problemas_salud_mental_II = 0; $problemas_salud_mental_III = 0; $problemas_salud_mental_IIII = 0;
            $enfermedades_respiratorias_I = 0;  $enfermedades_respiratorias_II = 0;  $enfermedades_respiratorias_III = 0; $enfermedades_respiratorias_IIII = 0;
            $enfermedades_zoonoticas_I = 0; $enfermedades_zoonoticas_II = 0; $enfermedades_zoonoticas_III = 0; $enfermedades_zoonoticas_IIII = 0;
            $transtornos_degenartivos_I = 0; $transtornos_degenartivos_II = 0; $transtornos_degenartivos_III = 0; $transtornos_degenartivos_IIII = 0;
            $consumo_spa_I = 0; $consumo_spa_II = 0; $consumo_spa_III = 0; $consumo_spa_IIII = 0;
            $riesgos_desnutricion_aguda_I = 0; $riesgos_desnutricion_aguda_II = 0; $riesgos_desnutricion_aguda_III = 0; $riesgos_desnutricion_aguda_IIII = 0;
            $riesgos_desnutricion_global_I = 0; $riesgos_desnutricion_global_II = 0; $riesgos_desnutricion_global_III = 0; $riesgos_desnutricion_global_IIII = 0;
            $desnutricion_global_I = 0; $desnutricion_global_II = 0; $desnutricion_global_III = 0; $desnutricion_global_IIII = 0;
            $riesgo_talla_baja_I = 0; $riesgo_talla_baja_II = 0; $riesgo_talla_baja_III = 0; $riesgo_talla_baja_IIII = 0;
            $talla_baja_retraso_I = 0;  $talla_baja_retraso_II = 0;  $talla_baja_retraso_III = 0;  $talla_baja_retraso_IIII = 0;
            $desnutricion_aguda_moderada_I = 0;  $desnutricion_aguda_moderada_II = 0;  $desnutricion_aguda_moderada_III = 0;  $desnutricion_aguda_moderada_IIII = 0;
            $desnutricion_aguda_severa_I = 0; $desnutricion_aguda_severa_II = 0; $desnutricion_aguda_severa_III = 0;$desnutricion_aguda_severa_IIII = 0;
            $riesgo_muerte_I = 0; $riesgo_muerte_II = 0;$riesgo_muerte_III = 0;$riesgo_muerte_IIII = 0;
            $riesgo_sobrepeso_I = 0; $riesgo_sobrepeso_II = 0; $riesgo_sobrepeso_III = 0; $riesgo_sobrepeso_IIII = 0;
            $sobrepeso_I = 0; $sobrepeso_II = 0; $sobrepeso_III = 0; $sobrepeso_IIII = 0;
            $obesidad_I = 0; $obesidad_II = 0; $obesidad_III = 0; $obesidad_IIII = 0;
            $violencias_I = 0;  $violencias_II = 0;  $violencias_III = 0;  $violencias_IIII = 0;

            foreach ($data as $item) {
                if($item->enfermedades_infecciosas_R == 0 || $item->enfermedades_infecciosas_R == 1){
                    $enfermedades_infecciosas_I += 1;
                }else{
                    if($item->enfermedades_infecciosas_R == 2){
                        $enfermedades_infecciosas_II += 1;
                    }else{
                        if($item->enfermedades_infecciosas_R == 3){
                            $enfermedades_infecciosas_III += 1;
                        }else{
                            $enfermedades_infecciosas_IIII += 1;
                        }
                    }
                }
                
                if($item->transtornos_asociados_spa_R == 0 || $item->transtornos_asociados_spa_R == 1){
                    $transtornos_asociados_spa_I += 1;
                }else{
                    if($item->transtornos_asociados_spa_R == 2){
                        $transtornos_asociados_spa_II += 1;
                    }else{
                        if($item->transtornos_asociados_spa_R == 3){
                            $transtornos_asociados_spa_III += 1;
                        }else{
                            $transtornos_asociados_spa_IIII += 1;
                        }
                    }
                }

                if($item->enfermedad_cardiovascular_R == 0 || $item->enfermedad_cardiovascular_R == 1){
                    $enfermedad_cardiovascular_I += 1;
                }else{
                    if($item->enfermedad_cardiovascular_R == 2){
                        $enfermedad_cardiovascular_II += 1;
                    }else{
                        if($item->enfermedad_cardiovascular_R == 3){
                            $enfermedad_cardiovascular_III += 1;
                        }else{
                            $enfermedad_cardiovascular_IIII += 1;
                        }
                    }
                }

                if($item->cancer_R == 0 || $item->cancer_R == 1){
                    $cancer_I += 1;
                }else{
                    if($item->cancer_R == 2){
                        $cancer_II += 1;
                    }else{
                        if($item->cancer_R == 3){
                            $cancer_III += 1;
                        }else{
                            $cancer_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_visuales_R == 0 || $item->alteraciones_transtornos_visuales_R == 1){
                    $alteraciones_transtornos_visuales_I += 1;
                }else{
                    if($item->alteraciones_transtornos_visuales_R == 2){
                        $alteraciones_transtornos_visuales_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_visuales_R == 3){
                            $alteraciones_transtornos_visuales_III += 1;
                        }else{
                            $alteraciones_transtornos_visuales_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_audicion_R == 0 || $item->alteraciones_transtornos_audicion_R == 1){
                    $alteraciones_transtornos_audicion_I += 1;
                }else{
                    if($item->alteraciones_transtornos_audicion_R == 2){
                        $alteraciones_transtornos_audicion_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_audicion_R == 3){
                            $alteraciones_transtornos_audicion_III += 1;
                        }else{
                            $alteraciones_transtornos_audicion_IIII += 1;
                        }
                    }
                }

                if($item->salud_bucal_R == 0 || $item->salud_bucal_R == 1){
                    $salud_bucal_I += 1;
                }else{
                    if($item->salud_bucal_R == 2){
                        $salud_bucal_II += 1;
                    }else{
                        if($item->salud_bucal_R == 3){
                            $salud_bucal_III += 1;
                        }else{
                            $salud_bucal_IIII += 1;
                        }
                    }
                }

                if($item->problemas_salud_mental_R == 0 || $item->problemas_salud_mental_R == 1){
                    $problemas_salud_mental_I += 1;
                }else{
                    if($item->problemas_salud_mental_R == 2){
                        $problemas_salud_mental_II += 1;
                    }else{
                        if($item->problemas_salud_mental_R == 3){
                            $problemas_salud_mental_III += 1;
                        }else{
                            $problemas_salud_mental_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_respiratorias_R == 0 || $item->enfermedades_respiratorias_R == 1){
                    $enfermedades_respiratorias_I += 1;
                }else{
                    if($item->enfermedades_respiratorias_R == 2){
                        $enfermedades_respiratorias_II += 1;
                    }else{
                        if($item->enfermedades_respiratorias_R == 3){
                            $enfermedades_respiratorias_III += 1;
                        }else{
                            $enfermedades_respiratorias_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_zoonoticas_R == 0 || $item->enfermedades_zoonoticas_R == 1){
                    $enfermedades_zoonoticas_I += 1;
                }else{
                    if($item->enfermedades_zoonoticas_R == 2){
                        $enfermedades_zoonoticas_II += 1;
                    }else{
                        if($item->enfermedades_zoonoticas_R == 3){
                            $enfermedades_zoonoticas_III += 1;
                        }else{
                            $enfermedades_zoonoticas_IIII += 1;
                        }
                    }
                }

                if($item->transtornos_degenartivos_R == 0 || $item->transtornos_degenartivos_R == 1){
                    $transtornos_degenartivos_I += 1;
                }else{
                    if($item->transtornos_degenartivos_R == 2){
                        $transtornos_degenartivos_II += 1;
                    }else{
                        if($item->transtornos_degenartivos_R == 3){
                            $transtornos_degenartivos_III += 1;
                        }else{
                            $transtornos_degenartivos_IIII += 1;
                        }
                    }
                }

                if($item->consumo_spa_R == 0 || $item->consumo_spa_R == 1){
                    $consumo_spa_I += 1;
                }else{
                    if($item->consumo_spa_R == 2){
                        $consumo_spa_II += 1;
                    }else{
                        if($item->consumo_spa_R == 3){
                            $consumo_spa_III += 1;
                        }else{
                            $consumo_spa_IIII += 1;
                        }
                    }
                }

                if($item->riesgos_desnutricion_aguda_R == 0 || $item->riesgos_desnutricion_aguda_R == 1){
                    $riesgos_desnutricion_aguda_I += 1;
                }else{
                    if($item->riesgos_desnutricion_aguda_R == 2){
                        $riesgos_desnutricion_aguda_II += 1;
                    }else{
                        if($item->riesgos_desnutricion_aguda_R == 3){
                            $riesgos_desnutricion_aguda_III += 1;
                        }else{
                            $riesgos_desnutricion_aguda_IIII += 1;
                        }
                    }
                }

                if($item->riesgos_desnutricion_global_R == 0 || $item->riesgos_desnutricion_global_R == 1){
                    $riesgos_desnutricion_global_I += 1;
                }else{
                    if($item->riesgos_desnutricion_global_R == 2){
                        $riesgos_desnutricion_global_II += 1;
                    }else{
                        if($item->riesgos_desnutricion_global_R == 3){
                            $riesgos_desnutricion_global_III += 1;
                        }else{
                            $riesgos_desnutricion_global_IIII += 1;
                        }
                    }
                }

                if($item->desnutricion_global_R == 0 || $item->desnutricion_global_R == 1){
                    $desnutricion_global_I += 1;
                }else{
                    if($item->desnutricion_global_R == 2){
                        $desnutricion_global_II += 1;
                    }else{
                        if($item->desnutricion_global_R == 3){
                            $desnutricion_global_III += 1;
                        }else{
                            $desnutricion_global_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_talla_baja_R == 0 || $item->riesgo_talla_baja_R == 1){
                    $riesgo_talla_baja_I += 1;
                }else{
                    if($item->riesgo_talla_baja_R == 2){
                        $riesgo_talla_baja_II += 1;
                    }else{
                        if($item->riesgo_talla_baja_R == 3){
                            $riesgo_talla_baja_III += 1;
                        }else{
                            $riesgo_talla_baja_IIII += 1;
                        }
                    }
                }

                if($item->talla_baja_retraso_R == 0 || $item->talla_baja_retraso_R == 1){
                    $talla_baja_retraso_I += 1;
                }else{
                    if($item->talla_baja_retraso_R == 2){
                        $talla_baja_retraso_II += 1;
                    }else{
                        if($item->talla_baja_retraso_R == 3){
                            $talla_baja_retraso_III += 1;
                        }else{
                            $talla_baja_retraso_IIII += 1;
                        }
                    }
                }

                if($item->desnutricion_aguda_moderada_R == 0 || $item->desnutricion_aguda_moderada_R == 1){
                    $desnutricion_aguda_moderada_I += 1;
                }else{
                    if($item->desnutricion_aguda_moderada_R == 2){
                        $desnutricion_aguda_moderada_II += 1;
                    }else{
                        if($item->desnutricion_aguda_moderada_R == 3){
                            $desnutricion_aguda_moderada_III += 1;
                        }else{
                            $desnutricion_aguda_moderada_IIII += 1;
                        }
                    }
                }

                if($item->desnutricion_aguda_severa_R == 0 || $item->desnutricion_aguda_severa_R == 1){
                    $desnutricion_aguda_severa_I += 1;
                }else{
                    if($item->desnutricion_aguda_severa_R == 2){
                        $desnutricion_aguda_severa_II += 1;
                    }else{
                        if($item->desnutricion_aguda_severa_R == 3){
                            $desnutricion_aguda_severa_III += 1;
                        }else{
                            $desnutricion_aguda_severa_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_muerte_R == 0 || $item->riesgo_muerte_R == 1){
                    $riesgo_muerte_I += 1;
                }else{
                    if($item->riesgo_muerte_R == 2){
                        $riesgo_muerte_II += 1;
                    }else{
                        if($item->riesgo_muerte_R == 3){
                            $riesgo_muerte_III += 1;
                        }else{
                            $riesgo_muerte_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_sobrepeso_R == 0 || $item->riesgo_sobrepeso_R == 1){
                    $riesgo_sobrepeso_I += 1;
                }else{
                    if($item->riesgo_sobrepeso_R == 2){
                        $riesgo_sobrepeso_II += 1;
                    }else{
                        if($item->riesgo_sobrepeso_R == 3){
                            $riesgo_sobrepeso_III += 1;
                        }else{
                            $riesgo_sobrepeso_IIII += 1;
                        }
                    }
                }

                if($item->sobrepeso_R == 0 || $item->sobrepeso_R == 1){
                    $sobrepeso_I += 1;
                }else{
                    if($item->sobrepeso_R == 2){
                        $sobrepeso_II += 1;
                    }else{
                        if($item->sobrepeso_R == 3){
                            $sobrepeso_III += 1;
                        }else{
                            $sobrepeso_IIII += 1;
                        }
                    }
                }

                if($item->obesidad_R == 0 || $item->obesidad_R == 1){
                    $obesidad_I += 1;
                }else{
                    if($item->obesidad_R == 2){
                        $obesidad_II += 1;
                    }else{
                        if($item->obesidad_R == 3){
                            $obesidad_III += 1;
                        }else{
                            $obesidad_IIII += 1;
                        }
                    }
                }

                if($item->violencias_R == 0 || $item->violencias_R == 1){
                    $violencias_I += 1;
                }else{
                    if($item->violencias_R == 2){
                        $violencias_II += 1;
                    }else{
                        if($item->violencias_R == 3){
                            $violencias_III += 1;
                        }else{
                            $violencias_IIII += 1;
                        }
                    }
                }
            }

            $info = [
                "enfermedades_infecciosas" =>  [
                    "Inexistente" => $enfermedades_infecciosas_I,
                    "Bajo" => $enfermedades_infecciosas_II,
                    "Moderado" => $enfermedades_infecciosas_III,
                    "Alto" => $enfermedades_infecciosas_IIII,
                ],
                "transtornos_asociados_spa" =>  [
                    "Inexistente" => $transtornos_asociados_spa_I,
                    "Bajo" => $transtornos_asociados_spa_II,
                    "Moderado" => $transtornos_asociados_spa_III,
                    "Alto" => $transtornos_asociados_spa_IIII,
                ],
                "enfermedad_cardiovascular" =>  [
                    "Inexistente" => $enfermedad_cardiovascular_I,
                    "Bajo" => $enfermedad_cardiovascular_II,
                    "Moderado" => $enfermedad_cardiovascular_III,
                    "Alto" => $enfermedad_cardiovascular_IIII,
                ],
                "cancer" =>  [
                    "Inexistente" => $cancer_I,
                    "Bajo" => $cancer_II,
                    "Moderado" => $cancer_III,
                    "Alto" => $cancer_IIII,
                ],
                "alteraciones_transtornos_visuales" =>  [
                    "Inexistente" => $alteraciones_transtornos_visuales_I,
                    "Bajo" => $alteraciones_transtornos_visuales_II,
                    "Moderado" => $alteraciones_transtornos_visuales_III,
                    "Alto" => $alteraciones_transtornos_visuales_IIII,
                ],
                "alteraciones_transtornos_audicion" =>  [
                    "Inexistente" => $alteraciones_transtornos_audicion_I,
                    "Bajo" => $alteraciones_transtornos_audicion_II,
                    "Moderado" => $alteraciones_transtornos_audicion_III,
                    "Alto" => $alteraciones_transtornos_audicion_IIII,
                ],
                "salud_bucal" =>  [
                    "Inexistente" => $salud_bucal_I,
                    "Bajo" => $salud_bucal_II,
                    "Moderado" => $salud_bucal_III,
                    "Alto" => $salud_bucal_IIII,
                ],
                "problemas_salud_mental" =>  [
                    "Inexistente" => $problemas_salud_mental_I,
                    "Bajo" => $problemas_salud_mental_II,
                    "Moderado" => $problemas_salud_mental_III,
                    "Alto" => $problemas_salud_mental_IIII,
                ],
                "enfermedades_respiratorias" =>  [
                    "Inexistente" => $enfermedades_respiratorias_I,
                    "Bajo" => $enfermedades_respiratorias_II,
                    "Moderado" => $enfermedades_respiratorias_III,
                    "Alto" => $enfermedades_respiratorias_IIII,
                ],
                "enfermedades_zoonoticas" =>  [
                    "Inexistente" => $enfermedades_zoonoticas_I,
                    "Bajo" => $enfermedades_zoonoticas_II,
                    "Moderado" => $enfermedades_zoonoticas_III,
                    "Alto" => $enfermedades_zoonoticas_IIII,
                ],
                "transtornos_degenartivos" =>  [
                    "Inexistente" => $transtornos_degenartivos_I,
                    "Bajo" => $transtornos_degenartivos_II,
                    "Moderado" => $transtornos_degenartivos_III,
                    "Alto" => $transtornos_degenartivos_IIII,
                ],
                "consumo_spa" =>  [
                    "Inexistente" => $consumo_spa_I,
                    "Bajo" => $consumo_spa_II,
                    "Moderado" => $consumo_spa_III,
                    "Alto" => $consumo_spa_IIII,
                ],
                "riesgos_desnutricion_aguda" =>  [
                    "Inexistente" => $riesgos_desnutricion_aguda_I,
                    "Bajo" => $riesgos_desnutricion_aguda_II,
                    "Moderado" => $riesgos_desnutricion_aguda_III,
                    "Alto" => $riesgos_desnutricion_aguda_IIII,
                ],
                "riesgos_desnutricion_global" =>  [
                    "Inexistente" => $riesgos_desnutricion_global_I,
                    "Bajo" => $riesgos_desnutricion_global_II,
                    "Moderado" => $riesgos_desnutricion_global_III,
                    "Alto" => $riesgos_desnutricion_global_IIII,
                ],
                "desnutricion_global" =>  [
                    "Inexistente" => $desnutricion_global_I,
                    "Bajo" => $desnutricion_global_II,
                    "Moderado" => $desnutricion_global_III,
                    "Alto" => $desnutricion_global_IIII,
                ],
                "riesgo_talla_baja" =>  [
                    "Inexistente" => $riesgo_talla_baja_I,
                    "Bajo" => $riesgo_talla_baja_II,
                    "Moderado" => $riesgo_talla_baja_III,
                    "Alto" => $riesgo_talla_baja_IIII,
                ],
                "talla_baja_retraso" =>  [
                    "Inexistente" => $talla_baja_retraso_I,
                    "Bajo" => $talla_baja_retraso_II,
                    "Moderado" => $talla_baja_retraso_III,
                    "Alto" => $talla_baja_retraso_IIII,
                ],
                "desnutricion_aguda_moderada" =>  [
                    "Inexistente" => $desnutricion_aguda_moderada_I,
                    "Bajo" => $desnutricion_aguda_moderada_II,
                    "Moderado" => $desnutricion_aguda_moderada_III,
                    "Alto" => $desnutricion_aguda_moderada_IIII,
                ],
                "desnutricion_aguda_severa" =>  [
                    "Inexistente" => $desnutricion_aguda_severa_I,
                    "Bajo" => $desnutricion_aguda_severa_II,
                    "Moderado" => $desnutricion_aguda_severa_III,
                    "Alto" => $desnutricion_aguda_severa_IIII,
                ],
                "riesgo_muerte" =>  [
                    "Inexistente" => $riesgo_muerte_I,
                    "Bajo" => $riesgo_muerte_II,
                    "Moderado" => $riesgo_muerte_III,
                    "Alto" => $riesgo_muerte_IIII,
                ],
                "riesgo_sobrepeso" =>  [
                    "Inexistente" => $riesgo_sobrepeso_I,
                    "Bajo" => $riesgo_sobrepeso_II,
                    "Moderado" => $riesgo_sobrepeso_III,
                    "Alto" => $riesgo_sobrepeso_IIII,
                ],
                "sobrepeso" =>  [
                    "Inexistente" => $sobrepeso_I,
                    "Bajo" => $sobrepeso_II,
                    "Moderado" => $sobrepeso_III,
                    "Alto" => $sobrepeso_IIII,
                ],
                "obesidad" =>  [
                    "Inexistente" => $obesidad_I,
                    "Bajo" => $obesidad_II,
                    "Moderado" => $obesidad_III,
                    "Alto" => $obesidad_IIII,
                ],
                "violencias" =>  [
                    "Inexistente" => $violencias_I,
                    "Bajo" => $violencias_II,
                    "Moderado" => $violencias_III,
                    "Alto" => $violencias_IIII,
                ],
            ];

            return $info;
        }

        //de 6 a 11 años
        if ($rango == "riesgos_salud_de6a11") {
            foreach ($data as $item) {
                $enfermedades_infecciosas_I = 0;
                $transtornos_asociados_spa_I = 0;
                $enfermedad_cardiovascular_I = 0;
                $cancer_I = 0;
                $alteraciones_transtornos_visuales_I = 0;
                $alteraciones_transtornos_audicion_I = 0;
                $salud_bucal_I = 0;
                $problemas_salud_mental_I = 0;
                $violencias_I = 0;
                $enfermedades_respiratorias_I = 0;
                $enfermedades_zoonoticas_I = 0;
                $transtornos_degenartivos_I = 0;
                $consumo_spa_I = 0;
                $riesgo_talla_baja_I = 0;
                $riesgo_delgadez_I = 0;

            }
        }

        // de 12 a 18 años
        if ($rango == "riesgos_salud_de12a17") {
            foreach ($data as $item) {
                $enfermedades_infecciosas_I = 0;
                $transtornos_asociados_spa_I = 0;
                $enfermedad_cardiovascular_I = 0;
                $cancer_I = 0;
                $alteraciones_transtornos_visuales_I = 0;
                $alteraciones_transtornos_audicion_I = 0;
                $salud_bucal_I = 0;
                $problemas_salud_mental_I = 0;
                $violencias_I = 0;
                $enfermedades_respiratorias_I = 0;
                $enfermedades_zoonoticas_I = 0;
                $transtornos_degenartivos_I = 0;
                $consumo_spa_I = 0;
                $riesgo_talla_baja_I = 0;
                $riesgo_delgadez_I = 0;
            }
        }

        // de 18 a 28 años
        if ($rango == "riesgos_salud_de18a28") {
            foreach ($data as $item) {
                $enfermedades_infecciosas_I = 0;
                $transtornos_asociados_spa_I = 0;
                $enfermedad_cardiovascular_I = 0;
                $cancer_I = 0;
                $alteraciones_transtornos_visuales_I = 0;
                $alteraciones_transtornos_audicion_I = 0;
                $salud_bucal_I = 0;
                $problemas_salud_mental_I = 0;
                $violencias_I = 0;
                $enfermedades_respiratorias_I = 0;
                $enfermedades_zoonoticas_I = 0;
                $transtornos_degenartivos_I = 0;
                $consumo_spa_I = 0;
                $riesgo_delgadez_I = 0;
            }
        }

        // de 29 a 59 años
        if ($rango == "riesgos_salud_de29a59") {
            foreach ($data as $item) {
                $enfermedades_infecciosas_I = 0;
                $transtornos_asociados_spa_I = 0;
                $enfermedad_cardiovascular_I = 0;
                $cancer_I = 0;
                $alteraciones_transtornos_visuales_I = 0;
                $alteraciones_transtornos_audicion_I = 0;
                $salud_bucal_I = 0;
                $problemas_salud_mental_I = 0;
                $violencias_I = 0;
                $enfermedades_respiratorias_I = 0;
                $enfermedades_zoonoticas_I = 0;
                $transtornos_degenartivos_I = 0;
                $consumo_spa_I = 0;
                $riesgo_delgadez_I = 0;
            }
        }

        // de 60 años o mas
        if ($rango == "riesgos_salud_de60") {
            foreach ($data as $item) {
                $enfermedades_infecciosas_I = 0;
                $transtornos_asociados_spa_I = 0;
                $enfermedad_cardiovascular_I = 0;
                $cancer_I = 0;
                $alteraciones_transtornos_visuales_I = 0;
                $alteraciones_transtornos_audicion_I = 0;
                $salud_bucal_I = 0;
                $problemas_salud_mental_I = 0;
                $violencias_I = 0;
                $enfermedades_respiratorias_I = 0;
                $enfermedades_zoonoticas_I = 0;
                $transtornos_degenartivos_I = 0;
                $consumo_spa_I = 0;
            }
        }
    }
    
}
