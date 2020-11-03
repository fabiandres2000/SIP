<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class EstadoCivilController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $estadocivil = \App\EstadoCivil::listar($busqueda, Session::get('alias'));
            if ($estadocivil) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $estadocivil->total(),
                        'pagina_actual' => $estadocivil->currentPage(),
                        'por_pagina' => $estadocivil->perPage(),
                        'ultima_pagina' => $estadocivil->lastPage(),
                        'desde' => $estadocivil->firstItem(),
                        'hasta' => $estadocivil->lastItem(),
                    ],
                    'estadocivil' => $estadocivil,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 500);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }

    }

    public function guardar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $estadocivil = \App\EstadoCivil::guardar($data, Session::get('alias'));
            if ($estadocivil) {
                $respuesta = [
                    'OPC' => 'SI',
                    'estadocivil' => $estadocivil,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Estado civil No Guardado...",
                ];
                return response()->json($respuesta, 200);

            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function eliminar()
    {
        if (Auth::check()) {
            $mensaje = "";
            $id = request()->get('id');
            $estado = request()->get('estado');
            if ($estado == "Activo") {
                $estado = "Inactivo";
            } else {
                $estado = "Activo";
            }
            $respuesta = \App\EstadoCivil::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}