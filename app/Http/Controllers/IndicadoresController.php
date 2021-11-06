<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class IndicadoresController extends Controller
{
    public function calcular()
    {
        if (Auth::check()) {
            $data = request()->all();
            $nro_mujeres_embarazadas = \App\Indicadores::mujeres_embarazadas(Session::get('alias'));
            $nro_adolescentes_embarazadas = \App\Indicadores::adolescentes_embarazadas(Session::get('alias'));
            $nro_adolescentes_desescolarizadas = \App\Indicadores::adolescentes_desescolarizadas(Session::get('alias'));
            $nro_adolescentes_lactantes = \App\Indicadores::adolescentes_lactantes(Session::get('alias'));
            $embarazos_vih = \App\Indicadores::embarazos_vih(Session::get('alias'));
            $adolescentes_violencia = \App\Indicadores::adolescentes_violencia(Session::get('alias'));
            $ninos_violencia = \App\Indicadores::ninos_violencia(Session::get('alias'));
            $poblacion_sin_eps = \App\Indicadores::poblacion_sin_eps(Session::get('alias'));

            ////// % DE ATENCION PRENATAL

            $nro_atencion_prenatal = \App\Indicadores::atencion_prenatal(Session::get('alias'));
            $nro_gestantes = \App\Indicadores::total_gestantes(Session::get('alias'));
            $sin_atencion_prenatal = \App\Indicadores::sin_atencion_prenatal(Session::get('alias'));

            $porcentaje_atencion_prenatal = ($nro_atencion_prenatal / $nro_gestantes) * 100;
            $porcentaje_sin_atencion_prenatal = ($sin_atencion_prenatal * 100) / $nro_gestantes;
            $razon_gestantes_sin_atencion_prental = $sin_atencion_prenatal / $nro_atencion_prenatal;

            $respuesta = [
                'cantidades' => [
                    'nro_mujeres_embarazadas' => $nro_mujeres_embarazadas,
                    'nro_adolescentes_embarazadas' => $nro_adolescentes_embarazadas,
                    'nro_adolescentes_desescolarizadas' => $nro_adolescentes_desescolarizadas,
                    'nro_adolescentes_lactantes' => $nro_adolescentes_lactantes,
                    'embarazos_vih' => $embarazos_vih,
                    'adolescentes_violencia' => $adolescentes_violencia,
                    'ninos_violencia' => $ninos_violencia,
                    'poblacion_sin_eps' => $poblacion_sin_eps,
                    'porcentaje_atencion_prenatal' => $porcentaje_atencion_prenatal,
                    'porcentaje_sin_atencion_prenatal' => $porcentaje_sin_atencion_prenatal,
                    'razon_gestantes_sin_atencion_prental' => $razon_gestantes_sin_atencion_prental
                ],
            ];

            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function gestantes()
    {
        if (Auth::check()) {
            $data = request()->all();
            $nro_mujeres_embarazadas = \App\Indicadores::mujeres_embarazadas(Session::get('alias'));
            $nro_adolescentes_embarazadas = \App\Indicadores::adolescentes_embarazadas(Session::get('alias'));
            $nro_adolescentes_desescolarizadas = \App\Indicadores::adolescentes_desescolarizadas(Session::get('alias'));
            $nro_adolescentes_lactantes = \App\Indicadores::adolescentes_lactantes(Session::get('alias'));
            $embarazos_vih = \App\Indicadores::embarazos_vih(Session::get('alias'));

            ////// % DE ATENCION PRENATAL

            $nro_atencion_prenatal = \App\Indicadores::atencion_prenatal(Session::get('alias'));
            $nro_atencion_prenatal_jefes = \App\Indicadores::atencion_prenatal_jefe(Session::get('alias'));
            $nro_atencion_prenatal = $nro_atencion_prenatal + $nro_atencion_prenatal_jefes;
            $nro_gestantes = \App\Indicadores::total_gestantes(Session::get('alias'));
            $nro_gestantes_jefe = \App\Indicadores::total_gestantes_jefes(Session::get('alias'));
            $sin_atencion_prenatal = \App\Indicadores::sin_atencion_prenatal(Session::get('alias'));
            $nro_gestantes = $nro_gestantes + $nro_gestantes_jefe;

            $porcentaje_atencion_prenatal = ($nro_atencion_prenatal / $nro_gestantes) * 100;
            $grupo_510 = \App\Indicadores::grupo_510(Session::get('alias'));
            $grupo_1117 = \App\Indicadores::grupo_1117(Session::get('alias'));
            $grupo_1828 = \App\Indicadores::grupo_1828(Session::get('alias'));
            $grupo_2959 = \App\Indicadores::grupo_2959(Session::get('alias'));

            $gestantes_grupo_510 = \App\Indicadores::gestantes_grupo_510(Session::get('alias'));
            $gestantes_grupo_1117 = \App\Indicadores::gestantes_grupo_1117(Session::get('alias'));
            $gestantes_grupo_1828 = \App\Indicadores::gestantes_grupo_1828(Session::get('alias'));
            $gestantes_grupo_2959 = \App\Indicadores::gestantes_grupo_2959(Session::get('alias'));


            $razon_gestantes_sin_atencion_prental = $sin_atencion_prenatal / $nro_atencion_prenatal;

            $respuesta = [
                'cantidades' => [
                    'nro_mujeres_embarazadas' => $nro_mujeres_embarazadas,
                    'nro_adolescentes_embarazadas' => $nro_adolescentes_embarazadas,
                    'nro_adolescentes_desescolarizadas' => $nro_adolescentes_desescolarizadas,
                    'nro_adolescentes_lactantes' => $nro_adolescentes_lactantes,
                    'embarazos_vih' => $embarazos_vih,
                    'porcentaje_atencion_prenatal' => $porcentaje_atencion_prenatal,
                    'razon_gestantes_sin_atencion_prental' => $razon_gestantes_sin_atencion_prental,
                    'nro_gestantes' => $nro_gestantes,
                    'grupo_510' => $grupo_510,
                    'grupo_1117' => $grupo_1117,
                    'grupo_1828' => $grupo_1828,
                    'grupo_2959' => $grupo_2959,
                    'gestantes_grupo_510' => $gestantes_grupo_510,
                    'gestantes_grupo_1117' => $gestantes_grupo_1117,
                    'gestantes_grupo_1828' => $gestantes_grupo_1828,
                    'gestantes_grupo_2959' => $gestantes_grupo_2959,

                ],
            ];

            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function spa()
    {
        if (Auth::check()) {
            $data = request()->all();
            $total_consumidores = 0;
            $adolescentes_consumidores = 0;
            $ninos_consumidores = 0;
            $gestantes_consumidores = \App\Indicadores::gestantes_consumidores(Session::get('alias'));
            //$embarazos_vih = \App\Indicadores::embarazos_vih(Session::get('alias'));
            $grupo_611_hombre = \App\Indicadores::total_consumidores_integrantes_masculinos_6_11(Session::get('alias'));
            $grupo_611_mujeres = \App\Indicadores::total_consumidores_integrantes_femeninos_6_11(Session::get('alias'));

            $grupo_1217_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_12_17_integrantes(Session::get('alias')) + \App\Indicadores::total_consumidores_integrantes_masculinos_12_17_jefe(Session::get('alias'));
            $grupo_1217_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_12_17_integrantes(Session::get('alias')) + \App\Indicadores::total_consumidores_integrantes_femeninos_12_17_jefe(Session::get('alias'));

            $grupo_1828_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_18_28_integrantes(Session::get('alias')) + \App\Indicadores::total_consumidores_integrantes_masculinos_18_28_jefe(Session::get('alias'));
            $grupo_1828_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_18_28_integrantes(Session::get('alias')) + \App\Indicadores::total_consumidores_integrantes_femeninos_18_28_jefe(Session::get('alias'));

            $grupo_2959_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_29_59_integrantes(Session::get('alias')) + \App\Indicadores::total_consumidores_integrantes_masculinos_29_59_jefe(Session::get('alias'));
            $grupo_2959_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_29_59_integrantes(Session::get('alias')) + \App\Indicadores::total_consumidores_integrantes_femeninos_29_59_jefe(Session::get('alias'));

            $grupo_60_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_60_integrantes(Session::get('alias')) + \App\Indicadores::total_consumidores_integrantes_masculinos_60_jefe(Session::get('alias'));
            $grupo_60_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_60_integrantes(Session::get('alias')) + \App\Indicadores::total_consumidores_integrantes_femeninos_60_jefe(Session::get('alias'));
            ////// % DE ATENCION PRENATAL
            $total_consumidores = $grupo_611_hombre + $grupo_611_mujeres + $grupo_1217_hombres + $grupo_1217_femeninos + $grupo_1828_hombres + $grupo_1828_femeninos + $grupo_2959_femeninos + $grupo_2959_hombres + $grupo_60_femeninos + $grupo_60_hombres;
            $adolescentes_consumidores = $grupo_1217_hombres + $grupo_1217_femeninos;
            $ninos_consumidores = $grupo_611_hombre + $grupo_611_mujeres;

            $total_poblacion = 0;
            $total_integrantes = \App\Indicadores::total_integrantes(Session::get('alias'));
            $total_jefes = \App\Indicadores::total_jefes(Session::get('alias'));
            $total_poblacion = $total_integrantes + $total_jefes;

            //dd(\App\Indicadores::total_gestantes_spa_jefe(Session::get('alias')));die;

            $gestantes_consumidores = \App\Indicadores::total_gestantes_spa_integrantes(Session::get('alias')) + \App\Indicadores::total_gestantes_spa_jefe(Session::get('alias'));

            $respuesta = [
                'cantidades' => [
                    'total_consumidores' => $total_consumidores * 1,
                    'adolescentes_consumidores' => $adolescentes_consumidores,
                    'ninos_consumidores' => $ninos_consumidores,
                    'gestantes_consumidores' => $gestantes_consumidores,
                    'grupo_611_hombres' => round(($grupo_611_hombre * 100) / $total_poblacion, 2) * -1,
                    'grupo_611_mujeres' => round(($grupo_611_mujeres * 100) / $total_poblacion, 2),
                    'grupo_1217_hombres' => round(($grupo_1217_hombres * 100) / $total_poblacion, 2) * -1,
                    'grupo_1217_mujeres' => round(($grupo_1217_femeninos * 100) / $total_poblacion, 2),
                    'grupo_1828_hombres' => round(($grupo_1828_hombres * 100) / $total_poblacion, 2) * -1,
                    'grupo_1828_mujeres' => round(($grupo_1828_femeninos * 100) / $total_poblacion, 2),
                    'grupo_2959_hombres' => round(($grupo_2959_hombres * 100) / $total_poblacion, 2) * -1,
                    'grupo_2959_mujeres' => round(($grupo_2959_femeninos * 100) / $total_poblacion, 2),
                    'grupo_60m_hombres' => round(($grupo_60_hombres * 100) / $total_poblacion, 2) * -1,
                    'grupo_60m_mujeres' => round(($grupo_60_femeninos * 100) / $total_poblacion, 2) * -1,

                ],
                'poblacion' => [
                    'grupo_611_hombrest' => $grupo_611_hombre,
                    'grupo_611_mujerest' => $grupo_611_mujeres,
                    'grupo_1217_hombrest' => $grupo_1217_hombres,
                    'grupo_1217_mujerest' => $grupo_1217_femeninos,
                    'grupo_1828_hombrest' => $grupo_1828_hombres,
                    'grupo_1828_mujerest' => $grupo_1828_femeninos,
                    'grupo_2959_hombrest' => $grupo_2959_hombres,
                    'grupo_2959_mujerest' => $grupo_2959_femeninos,
                    'grupo_60m_hombrest' => $grupo_60_hombres,
                    'grupo_60m_mujerest' => $grupo_60_femeninos,
                ]
            ];

            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function filtrospa()
    {
        $data = request()->all();
        $tipo = request()->get("_tipo");
        $tipo_temp = request()->get("_tipo");
        if ($tipo == "fuma") {
            $tipo_temp = "cigarrillo";
        }

        $grupo_611_hombre = \App\Indicadores::total_consumidores_integrantes_masculinos_6_11_t(Session::get('alias'), $tipo_temp);
        $grupo_611_mujeres = \App\Indicadores::total_consumidores_integrantes_femeninos_6_11_t(Session::get('alias'), $tipo_temp);

        $grupo_1217_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_12_17(Session::get('alias'), $tipo) + \App\Indicadores::total_consumidores_jefe_masculinos_12_17(Session::get('alias'), $tipo);
        $grupo_1217_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_12_17(Session::get('alias'), $tipo) + \App\Indicadores::total_consumidores_jefe_femeninos_12_17(Session::get('alias'), $tipo);

        $grupo_1828_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_18_28(Session::get('alias'), $tipo) + \App\Indicadores::total_consumidores_jefe_masculinos_18_28(Session::get('alias'), $tipo);
        $grupo_1828_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_18_28(Session::get('alias'), $tipo) + \App\Indicadores::total_consumidores_jefe_femeninos_18_28(Session::get('alias'), $tipo);

        $grupo_2959_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_29_59(Session::get('alias'), $tipo) + \App\Indicadores::total_consumidores_jefe_masculinos_29_59(Session::get('alias'), $tipo);
        $grupo_2959_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_29_59(Session::get('alias'), $tipo) + \App\Indicadores::total_consumidores_jefe_femeninos_29_59(Session::get('alias'), $tipo);


        if ($tipo == "fuma") {
            $tipo = "cigarrillo";
        } else if ($tipo == "spa") {
            $tipo = "glicemia";
        }

        $grupo_60_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_60(Session::get('alias'), $tipo) + \App\Indicadores::total_consumidores_jefe_masculinos_60(Session::get('alias'), $tipo);
        $grupo_60_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_60(Session::get('alias'), $tipo) + \App\Indicadores::total_consumidores_jefe_femeninos_60(Session::get('alias'), $tipo);

        $respuesta = [
            'poblacion' => [
                'grupo_611_hombrest' => $grupo_611_hombre,
                'grupo_611_mujerest' => $grupo_611_mujeres,
                'grupo_1217_hombrest' => $grupo_1217_hombres,
                'grupo_1217_mujerest' => $grupo_1217_femeninos,
                'grupo_1828_hombrest' => $grupo_1828_hombres,
                'grupo_1828_mujerest' => $grupo_1828_femeninos,
                'grupo_2959_hombrest' => $grupo_2959_hombres,
                'grupo_2959_mujerest' => $grupo_2959_femeninos,
                'grupo_60m_hombrest' => $grupo_60_hombres,
                'grupo_60m_mujerest' => $grupo_60_femeninos,
            ],
        ];

        return response()->json($respuesta, 200);
    }
}
