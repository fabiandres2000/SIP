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

    public function poblacion() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');

        if (Auth::check()) {

            $poblacion = \App\SocioeconomicoDashboard::poblacion(Session::get('alias'), $tipo, $id);
            
            $respuesta = [
                'poblacion' => $poblacion,
            ];

            return response()->json($respuesta, 200);
        }
    }

    public function exportarPoblacion() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $imagenes = request()->get('imagenes');
            $grafico1 = request()->get('grafico1');
            $grafico2 = request()->get('grafico2');
            $hmp = request()->get('hmp');
            $grafico3 = request()->get('grafico3');
            $grafico4 = request()->get('grafico4');
            $grafico5 = request()->get('grafico5');
            $grafico6 = request()->get('grafico6');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'poblacional.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Poblacion', [
                'filtro' => $filtro,
                'ente' => $ente, 
                'imagenes' => $imagenes,  
                'grafico1' => $grafico1, 
                'grafico2' => $grafico2, 
                'hmp' => $hmp, 
                'grafico3' => $grafico3, 
                'grafico4' => $grafico4, 
                'grafico5' => $grafico5, 
                'grafico6' => $grafico6, 
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

    public function vivienda() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        if (Auth::check()) {
            $inb = \App\SocioeconomicoDashboard::inb(Session::get('alias'), $tipo, $id);
            $nso = \App\SocioeconomicoDashboard::nivel_socioeconomico(Session::get('alias'), $tipo, $id);
            $haci = \App\SocioeconomicoDashboard::hacinamiento(Session::get('alias'), $tipo, $id);
            
            $respuesta = [
                'inb' => $inb,
                'nso' => $nso,
                'haci' => $haci,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
    
    public function exportarVivienda() {
        if (Auth::check()) {
            
            $torta1 = request()->get('torta1');
            $torta2 = request()->get('torta2');
            $porcentaje = request()->get('porcentaje');
            $torta3 = request()->get('torta3');
            $data = request()->get('data');
            $filtro = request()->get('filtro');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'vivienda.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Vivienda', [
                'filtro' => $filtro,
                'ente' => $ente, 
                'torta1' => $torta1,  
                'torta2' => $torta2, 
                'porcentaje' => $porcentaje, 
                'torta3' => $torta3, 
                'data' => $data, 
                'filtro' => $filtro, 
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

    public function hogares() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        if (Auth::check()) {
            $nso = \App\SocioeconomicoDashboard::nivel_socioeconomico_hogares(Session::get('alias'), $tipo, $id);
            $haci = \App\SocioeconomicoDashboard::hacinamiento_hogares(Session::get('alias'), $tipo, $id);
            $estra = \App\SocioeconomicoDashboard::estratificacion(Session::get('alias'), $tipo, $id);
            $servicios = \App\SocioeconomicoDashboard::servicios_hogares(Session::get('alias'), $tipo, $id);
            $jefes_menores_edad = \App\SocioeconomicoDashboard::jefes_menores_edad(Session::get('alias'), $tipo, $id);

            $respuesta = [
                'nso' => $nso,
                'haci' => $haci,
                'estra' => $estra,
                'servicios' => $servicios,
                'jefes_menores_edad' => $jefes_menores_edad
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarHogar() {
        if (Auth::check()) {
            
            $torta1 = request()->get('torta1');
            $torta2 = request()->get('torta2');
            $torta3 = request()->get('torta3');
            $torta4 = request()->get('torta4');
            $porcentajes = request()->get('porcentajes');
            $filtro = request()->get('filtro');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'hohares.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Hogares', [
                'ente' => $ente, 
                'torta1' => $torta1,  
                'torta2' => $torta2, 
                'torta3' => $torta3, 
                'torta4' => $torta4, 
                'porcentajes' => $porcentajes, 
                'filtro' => $filtro, 
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
