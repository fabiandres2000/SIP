<?php

namespace App\Http\Controllers;

use Auth;
use Session;

class EtniaController extends Controller
{

    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $etnias = \App\Etnia::listar($busqueda,Session::get('alias'));
            if ($etnias) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $etnias->total(),
                        'pagina_actual' => $etnias->currentPage(),
                        'por_pagina' => $etnias->perPage(),
                        'ultima_pagina' => $etnias->lastPage(),
                        'desde' => $etnias->firstItem(),
                        'hasta' => $etnias->lastItem(),
                    ],
                    'etnias' => $etnias,
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
            $etnias = \App\Etnia::guardar($data,Session::get('alias'));
            if ($etnias) {
                $respuesta = [
                    'OPC' => 'SI',
                    'etnias' => $etnias,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Etnia No Guardada...",
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
            $respuesta = \App\Etnia::editarestado($estado, $id,Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function guardarClasificacion()
    {
        if (Auth::check()) {
            $data = request()->get("clasificacion");
            $id_etnia = request()->get("id_etnia");
            foreach ($data as $item) {
                $dato['clasificacion'] = $item["clasificacion"];
                $dato['id'] = $item["id"];
                $dato['estado'] = $item["estado"];
                $dato['id_etnia'] = $id_etnia;
                $clasificacion = \App\ClasificacionEtnia::guardar($dato,Session::get('alias'));
            }
            if ($clasificacion) {
                $respuesta = [
                    'OPC' => 'SI',
                    'clasificacion' => $clasificacion,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Clasificación(es) No Guardada(s)...",
                ];
                return response()->json($respuesta, 200);

            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function listarClasificacion()
    {
        if (Auth::check()) {
            $id_etnia = request()->get('id_etnia');
            $clasificacion = \App\ClasificacionEtnia::listar($id_etnia,Session::get('alias'));
            if ($clasificacion) {
                $respuesta = [
                    'clasificacion' => $clasificacion,
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
}
