<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class ParentescoController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $parentescos = \App\Parentesco::listar($busqueda, Session::get('alias'));
            if ($parentescos) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $parentescos->total(),
                        'pagina_actual' => $parentescos->currentPage(),
                        'por_pagina' => $parentescos->perPage(),
                        'ultima_pagina' => $parentescos->lastPage(),
                        'desde' => $parentescos->firstItem(),
                        'hasta' => $parentescos->lastItem(),
                    ],
                    'parentescos' => $parentescos,
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
            $parentescos = \App\Parentesco::guardar($data, Session::get('alias'));
            if ($parentescos) {
                $respuesta = [
                    'OPC' => 'SI',
                    'parentescos' => $parentescos,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Parentesco No Guardado...",
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
            $respuesta = \App\Parentesco::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}