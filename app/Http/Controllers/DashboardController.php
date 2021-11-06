<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class DashboardController extends Controller
{
    public function datos_dashboard()
    {
        if (Auth::check()) {
            $data = request()->all();
            $total_caracterizadas = 0;
            $nro_personas_jefe = 0;
            $nro_personas_intergantes = 0;
            $nro_hogares = 0;
            $nro_global_personas = 0;
            $nro_personas_jefe = \App\Dashboard::total_jefes(Auth::user()->permisos->where('actual', 1)->first()->ente->alias);
            $nro_personas_intergantes = \App\Dashboard::total_jefes(Auth::user()->permisos->where('actual', 1)->first()->ente->alias);
            $total_caracterizadas = $nro_personas_intergantes + $nro_personas_jefe;
            $nro_hogares  = \App\Dashboard::total_hogares(Auth::user()->permisos->where('actual', 1)->first()->ente->alias);
            $nro_global_personas  = \App\Dashboard::global_personas();
            $hacinamientos = \App\Dashboard::hacinamiento(Auth::user()->permisos->where('actual', 1)->first()->ente->alias);

            $respuesta = [
                'cantidades' => [
                    'numero_personas' => $total_caracterizadas,
                    'numero_hogares' => $nro_hogares,
                    'personas_desempleadas' => $total_caracterizadas,
                    'indice_hacinamiento' => $nro_hogares,
                    'personas_globales' => $nro_global_personas,
                    'hacinamientos' => $hacinamientos
                ],
            ];

            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function coordenadas()
    {
        if (Auth::check()) {
            $data = request()->all();
            $latitud="";
            $longitud="";
            $consulta = \App\User::consultarEnte(Auth::user()->id);
            $respuesta = [
                    'latitud' => $consulta->lat,
                    'longitud' => $consulta->lng,
            ];

            return response()->json(
                $respuesta,
                200
            );
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
}
