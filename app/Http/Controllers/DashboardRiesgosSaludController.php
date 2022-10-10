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
            $consumo_spa = \App\DashboardRiesgosSalud::spa_violencia(Session::get('alias'), $tipo, $id, 1);
            $violencias = \App\DashboardRiesgosSalud::spa_violencia(Session::get('alias'), $tipo, $id, 2);
            $obesidad_ninios = \App\DashboardRiesgosSalud::obesidad_sobrepeso(Session::get('alias'), $tipo, $id, 1);
            $obesidad_adultos = \App\DashboardRiesgosSalud::obesidad_sobrepeso(Session::get('alias'), $tipo, $id, 2);

            $respuesta = [
                'hogares' => $hogares,
                'riesgos_infantil_desnutricion' => $riesgos_infantil_desnutricion,
                'riesgos_adulto_desnutricion' => $riesgos_adulto_desnutricion,
                'consumo_spa' => $consumo_spa,
                'violencias' => $violencias,
                'obesidad_ninios' => $obesidad_ninios,
                'obesidad_adultos' => $obesidad_adultos
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarHogares() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $grafica = request()->get('grafica');
            $data = request()->get('data');
            $tipo_data = request()->get('tipo_data');
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud-Hogares.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboardHogar', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'grafica' => $grafica, 
                'data' => $data, 
                'tipo_data' => $tipo_data, 
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function enfermedades() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        $rango = request()->get('rango');
        $tipo_enfer = request()->get('tipo_enfer');

        if (Auth::check()) {
           
            $enfermedades_por_edad = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, $rango, $tipo_enfer);
            

            $men1a = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'men1a', $tipo_enfer);
            $de1a5 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de1a5', $tipo_enfer);
            $de6a11 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de6a11', $tipo_enfer);
            $de12a17 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de12a17', $tipo_enfer);
            $de18a28 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de18a28', $tipo_enfer);
            $de29a59 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de29a59', $tipo_enfer);
            $de60 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de60', $tipo_enfer);


            $respuesta = [
                'enfermedades_por_edad' => $enfermedades_por_edad,
                'comparativa' => [
                    'men1a' => $men1a,
                    'de6a11' => $de6a11,
                    'de1a5' => $de1a5,
                    'de12a17' => $de12a17,
                    'de18a28' => $de18a28,
                    'de29a59' => $de29a59,
                    'de60' => $de60
                ]
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarEnfermedades() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $filtro2 = request()->get('filtro2');
            $imagenes = request()->get('imagenes');
            $grafico1 = request()->get('grafico1');
            $grafico2 = request()->get('grafico2');
            $data = request()->get('data');
            $hmp = request()->get('hmp');
            $tipo_enfermedad = request()->get('tipo_enfermedad');
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud-Enfermedades.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboardEnfermedad', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'filtro2' => $filtro2, 
                'imagenes' => $imagenes,  
                'grafico1' => $grafico1, 
                'grafico2' => $grafico2, 
                'data' => $data, 
                'hmp' => $hmp,
                'tipo_enfermedad' => $tipo_enfermedad
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function spa() {

        $tipo = request()->get('tipo');
        $id = request()->get('id');

        if (Auth::check()) {
            $de6a11 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de6a11');
            $de12a17 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de12a17');
            $de18a28 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de18a28');
            $de29a59 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de29a59');
            $de60 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de60');
            $gestantes_consumidores = \App\Indicadores::total_gestantes_spa_integrantes_f(Session::get('alias'), $tipo, $id)+\App\Indicadores::total_gestantes_spa_jefe_f(Session::get('alias'), $tipo, $id);
            $gestantes = \App\Indicadores::mujeres_embarazadas(Session::get('alias'));;

            $respuesta = [
                'data_por_tipo' => [  
                    'de6a11' => $de6a11,
                    'de12a17' => $de12a17,
                    'de18a28' => $de18a28,
                    'de29a59' => $de29a59,
                    'de60' => $de60,
                    'gestantes_consumidores' => [
                        'porcen' => ($gestantes_consumidores / $gestantes) * 100,
                        'mujeres_spa' => $gestantes_consumidores,
                        'gestantes' => $gestantes
                    ],
                ],
            ];
            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarSpa() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $grafico1 = request()->get('grafico1');
            $grafico2 = request()->get('grafico2');
            $grafico3 = request()->get('grafico3');
            $imagen1 = request()->get('imagen1');
            $data = request()->get('data');
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud-SPA.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboardSpa', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'grafico1' => $grafico1, 
                'grafico2' => $grafico2, 
                'grafico3' => $grafico3, 
                'imagen1' => $imagen1,
                'data' => $data
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
}


