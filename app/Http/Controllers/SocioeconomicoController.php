<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;


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

    public function mercadoLaboral(){
        if (Auth::check()) {
           
            $tasaOcupacion = \App\SocioeconomicoDashboard::tasaOcupacion(Session::get('alias'));
            
            $respuesta = [
                'tasaOcupacion' => $tasaOcupacion,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
}
