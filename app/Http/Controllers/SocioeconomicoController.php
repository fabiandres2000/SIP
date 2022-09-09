<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use File;

class SocioeconomicoController extends Controller
{
    public function socioEconomicoPersonas()
    {
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');
            $consulta = request()->get('consulta');
            if($consulta == 1){
                $analfabetismo = \App\SocioeconomicoDashboard::tasaAnalfabetismo(Session::get('alias'), $tipo, $id);
            }else{
                $analfabetismo = \App\SocioeconomicoDashboard::tasaAnalfabetismoNinios(Session::get('alias'), $tipo, $id);
            }
            
            $respuesta = [
                'analfabetismo' => $analfabetismo,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarAnalfabetas() {
        if (Auth::check()) {
            
            $tipo = request()->get('tipo');
            $torta = request()->get('torta');
            $datos = request()->get('datos');
            $grafico1 = request()->get('grafico1');
            $filtro = request()->get('filtro');
            $hm = request()->get('hm');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'socioeconomico_analfabetas.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Analfabetas', [
                'grafico1' => $grafico1,  
                'filtro' => $filtro, 
                'torta' => $torta, 
                'datos' => $datos, 
                'hm' => $hm, 
                'tipo' => $tipo, 
                'ente' => $ente,
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

    public function desempleo(){
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');
           
            $tasaDesempleo = \App\SocioeconomicoDashboard::tasaDesempleo(Session::get('alias'), $tipo, $id);
            
            $respuesta = [
                'tasaDesempleo' => $tasaDesempleo,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarDesempleo() {
        if (Auth::check()) {
            
            $torta1 = request()->get('torta1');
            $torta2 = request()->get('torta2');
            $porcentajes = request()->get('porcentajes');
            $data = request()->get('data');
            $filtro = request()->get('filtro');
            $tipo = request()->get('tipo');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'desempleo.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/desempleo', [
                'ente' => $ente, 
                'torta1' => $torta1,  
                'torta2' => $torta2, 
                'porcentajes' => $porcentajes, 
                'data' => $data, 
                'filtro' => $filtro,
                'tipo' => $tipo,
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

    public function mercadoLaboral(){
        if (Auth::check()) {
           
            $tasaOcupacion = \App\SocioeconomicoDashboard::tasaOcupacion(Session::get('alias'));
            $PAE = \App\SocioeconomicoDashboard::poblacionEconomicamenteActiva(Session::get('alias'));
            $PET = \App\SocioeconomicoDashboard::personasEdadTrabajar(Session::get('alias'));
            
            $respuesta = [
                'tasaOcupacion' => $tasaOcupacion,
                'PAE' => $PAE,
                'PET' => $PET,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarMercadoLaboral() {
        if (Auth::check()) {
            
            $torta1 = request()->get('torta1');
            $torta2 = request()->get('torta2');
            $torta3 = request()->get('torta3');
            $torta4 = request()->get('torta4');
            $porcentajes = request()->get('porcentajes');
            $topc = request()->get('topc');
            $tasaOcupacion = request()->get('tasaOcupacion');
            $PAE = request()->get('PAE');
            $PET = request()->get('PET');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'mercado_laboral.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/MercadoLaboral', [
                'ente' => $ente, 
                'torta1' => $torta1,  
                'torta2' => $torta2, 
                'torta3' => $torta3, 
                'torta4' => $torta4, 
                'porcentajes' => $porcentajes, 
                'topc' => $topc, 
                'tasaOcupacion' => $tasaOcupacion, 
                'PAE' => $PAE, 
                'PET' => $PET, 
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
