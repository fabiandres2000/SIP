<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class InformesController extends Controller
{
    public function migrantes()
    {
        if (Auth::check()) {
            $datos = request()->all();
            
            $ocupaciones = \App\Informes::ocupacionesMigrantes(Session::get('alias'));
            $total_migrantes = \App\Informes::poblacionMigrante(Session::get('alias'));
            $total_poblacion = \App\Informes::poblacionTotal(Session::get('alias'));
            $total_regulado = \App\Informes::reguladoMigrante(Session::get('alias'));
            $total_no_regulado = \App\Informes::noReguladoMigrante(Session::get('alias'));

            $migrantes0 = \App\Informes::migrantes0(Session::get('alias'));
            $migrantes115 = \App\Informes::migrantes115(Session::get('alias'));
            $migrantes611 = \App\Informes::migrantes611(Session::get('alias'));
            $migrantes1217 = \App\Informes::migrantes1217(Session::get('alias'));
            $migrantes1828 = \App\Informes::migrantes1828(Session::get('alias'));
            $migrantes2959 = \App\Informes::migrantes2959(Session::get('alias'));
            $migrantes60 = \App\Informes::migrantes60(Session::get('alias'));

            $paises = \App\Informes::principalespaises(Session::get('alias'));

            /////////////MIGRANTES POR SEXO Y GRUPO DE EDAD//////////////////////
            $migrantesM0 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",0,0);
            $migrantesM15 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",1,5);
            $migrantesM611 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",6,11);
            $migrantesM1217 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",12,17);
            $migrantesM1828 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",18,28);
            $migrantesM2959 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",29,59);
            $migrantesM60 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",60,120);

            $migrantesF0 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",0,0);
            $migrantesF15 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",1,5);
            $migrantesF611 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",6,11);
            $migrantesF1217 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",12,17);
            $migrantesF1828 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",18,28);
            $migrantesF2959 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",29,59);
            $migrantesF60 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",60,120);


            //////////////////////ENFERMEDADES MIGRANTES//////////////////////////

            $enfermedades = \App\Informes::enfermedadesMigrantes(Session::get('alias'));

            ///////MIGRENTEAS AFILIADOS

            $migrantes_afiliados = \App\Informes::migrantesafiliacion(Session::get('alias'),"TODOS");
            $migrantes_sin_afiliacion = \App\Informes::migrantesafiliacion(Session::get('alias'),"NINGUNA");

            //dd($enfermedades);die;

           // dd($paises);die;

            $respuesta = [
                "total_migrantes" => $total_migrantes,
                "total_poblacion" => $total_poblacion,
                "total_regulado" => $total_regulado,
                "total_no_regulado" => $total_no_regulado,
                "edades" => [
                    "migrantes0" => $migrantes0,
                    "migrantes115" => $migrantes115,
                    "migrantes611" => $migrantes611,
                    "migrantes1217" => $migrantes1217,
                    "migrantes1828" => $migrantes1828,
                    "migrantes2959" => $migrantes2959,
                    "migrantes60" => $migrantes60,
                ],
                "ocupaciones" => $ocupaciones,
                "paises" => $paises,
                "enfermedades" => $enfermedades,
                "sexo"  => [
                    "m_0" => $migrantesM0*-1,
                    "m_15" => $migrantesM15*-1,
                    "m_611" => $migrantesM611*-1,
                    "m_1217" => $migrantesM1217*-1,
                    "m_1828" => $migrantesM1828*-1,
                    "m_2959" => $migrantesM2959*-1,
                    "m_60" => $migrantesM60*-1,
                    "f_0" => $migrantesF0,
                    "f_15" => $migrantesF15,
                    "f_611" => $migrantesF611,
                    "f_1217" => $migrantesF1217,
                    "f_1828" => $migrantesF1828,
                    "f_2959" => $migrantesF2959,
                    "f_60" => $migrantesF60,
                ],
                "afiliaciones" => [
                    "afiliados" => $migrantes_afiliados,
                    "no_afiliados" => $migrantes_sin_afiliacion
                ]
                
            ];
            return response()->json($respuesta, 200);
        }
    }
}
