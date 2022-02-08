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
                "ocupaciones" => $ocupaciones
                
            ];
            return response()->json($respuesta, 200);
        }
    }
}
