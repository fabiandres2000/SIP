<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class EnfermedadesCroController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $enfermedadescro = \App\EnfermedadesCro::listar($busqueda, Session::get('alias'));
            if ($enfermedadescro) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $enfermedadescro->total(),
                        'pagina_actual' => $enfermedadescro->currentPage(),
                        'por_pagina' => $enfermedadescro->perPage(),
                        'ultima_pagina' => $enfermedadescro->lastPage(),
                        'desde' => $enfermedadescro->firstItem(),
                        'hasta' => $enfermedadescro->lastItem(),
                    ],
                    'enfermedadescro' => $enfermedadescro,
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
            $enfermedadescro = \App\EnfermedadesCro::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar la enfermedad cronica  = ".$data['descripcion'], Session::get('alias'));
            if ($enfermedadescro) {
                $respuesta = [
                    'OPC' => 'SI',
                    'enfermedadescro' => $enfermedadescro,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Enfermedades Cronicas No Guardadas...",
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
                $gua = \App\Log::guardar("Eliminar la enfermedad cronica con id = ".$id, Session::get('alias'));
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar la enfermedad cronica con id = ".$id, Session::get('alias'));
            }
            $respuesta = \App\EnfermedadesCro::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
