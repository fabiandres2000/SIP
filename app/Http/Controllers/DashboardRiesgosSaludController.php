<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use File;

class DashboardRiesgosSaludController extends Controller
{
    public function poblacion() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        $rango = request()->get('rango');
        if (Auth::check()) {
           
            $poblacion = \App\DashboardRiesgosSalud::riesgos_poblacion(Session::get('alias'), $tipo, $id, $rango);

            $respuesta = [
                'poblacion' => $poblacion,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarPoblacion() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $grafico1 = request()->get('grafico1');
            $grafico2 = request()->get('grafico2');
            $riesgo = request()->get('riesgo');
            $data = request()->get('data');
          
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboard', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'grafico1' => $grafico1, 
                'grafico2' => $grafico2, 
                'riesgo' => $riesgo, 
                'data' => $data, 
            ])->setPaper('a5', 'portrait')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function hogares() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        if (Auth::check()) {
           
            $hogares = \App\DashboardRiesgosSalud::riesgos_hogares(Session::get('alias'), $tipo, $id);
            $riesgos_infantil_desnutricion = \App\DashboardRiesgosSalud::riesgos_desnutricion(Session::get('alias'), $tipo, $id, 1);
            $riesgos_adulto_desnutricion = \App\DashboardRiesgosSalud::riesgos_desnutricion(Session::get('alias'), $tipo, $id, 2);

            $respuesta = [
                'hogares' => $hogares,
                'riesgos_infantil_desnutricion' => $riesgos_infantil_desnutricion,
                'riesgos_adulto_desnutricion' => $riesgos_adulto_desnutricion
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
}


