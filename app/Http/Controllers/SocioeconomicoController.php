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
            $analfabetismo = \App\SocioeconomicoDashboard::tasaAnalfabetismo(Session::get('alias'), $tipo, $id);
            $respuesta = [
                'analfabetismo' => $analfabetismo,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
}
