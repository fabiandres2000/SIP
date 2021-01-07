<?php

namespace App\Http\Controllers;

use Auth;
use Session;

class UnidadesProductivasController extends Controller
{

    public function gestion()
    {
        if (Auth::check()) {

            $busqueda = request()->get('txtbusqueda');
            $unidades = \App\UnidadesProductivas::listar($busqueda, Session::get('alias'));
            if ($unidades) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $unidades->total(),
                        'pagina_actual' => $unidades->currentPage(),
                        'por_pagina' => $unidades->perPage(),
                        'ultima_pagina' => $unidades->lastPage(),
                        'desde' => $unidades->firstItem(),
                        'hasta' => $unidades->lastItem(),
                    ],
                    'unidades' => $unidades,
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
    public function nuevo()
    {
        if (Auth::check()) {
            $consdptos = \App\Dpto::buscarDepartamentos(Session::get('alias'));
            foreach ($consdptos as $item) {
                $arrayDpto[] = [
                    'value' => $item->codigo,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayMuni = [];
            $consmuni = \App\Muni::buscarMunicipios(Session::get('alias'));
            foreach ($consmuni as $item) {
                $arrayMuni[$item->codigo][] = [
                    'value' => $item->codmun,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $conscorregi = \App\Corregimiento::buscarCorregimientos(Session::get('alias'));
            $arrayCorregi = [];
            foreach ($conscorregi as $item) {
                $arrayCorregi[$item->codmun][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayVeredas = [];
            $consveredas = \App\Vereda::buscarVeredas(Session::get('alias'));
            foreach ($consveredas as $item) {
                $arrayVeredas[$item->IDCORRE][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayEscolaridad = [];
            $consescolaridad = \App\Escolaridad::buscar(Session::get('alias'));
            foreach ($consescolaridad as $item) {
                $arrayEscolaridad[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }
            $codigo = \App\Codigo::guardar(Session::get('alias'), Session::get('sigla'));
            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayVeredas' => $arrayVeredas,
                'arrayEscolaridad' => $arrayEscolaridad,
                'codigo' => $codigo,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function guardar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $opcion = request()->get("opcion");
            $data = request()->get("datos");

            $herramientas = request()->get("herramientas");
            $utensilios = request()->get("utensilios");
            $maquinas = request()->get("maquinas");
            $instalaciones = request()->get("instalaciones");
            $medios = request()->get("medios");
            // dd($medios);die;
            if ($opcion == "guardar") {
                // dd($data);die;
                $unidades = \App\UnidadesProductivas::guardar($data, Session::get('alias'));
                if ($unidades) {
                    for ($i = 0; $i < count($herramientas); $i++) {
                        $herramientas[$i]['id_unidad'] = $unidades;
                        $res = \App\Herramienta::guardar($herramientas[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($utensilios); $i++) {
                        $utensilios[$i]['id_unidad'] = $unidades;
                        $res = \App\Utensilio::guardar($utensilios[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($maquinas); $i++) {
                        $maquinas[$i]['id_unidad'] = $unidades;
                        $res = \App\Maquinaria::guardar($maquinas[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($instalaciones); $i++) {
                        $instalaciones[$i]['id_unidad'] = $unidades;
                        $res = \App\Instalacion::guardar($instalaciones[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($medios); $i++) {
                        $medios[$i]['id_unidad'] = $unidades;
                        $res = \App\MedioTransporte::guardar($medios[$i], Session::get('alias'));
                    }

                    $codigo = \App\Codigo::editar2(Session::get('alias'), request()->get("CODIGOGENE"), $unidades, Session::get('sigla'));
                    $respuesta = [
                        'OPC' => 'SI',
                        'IDHOGAR' => $unidades,
                    ];
                    return response()->json($respuesta, 200);
                } else {
                    $respuesta = [
                        'OPC' => 'NO',
                        'MENSAJE' => "Unidades Productivas No Guardadas...",
                    ];
                    return response()->json($respuesta, 500);
                }
            } else {
                $id = request()->get("id");
                $unidades = \App\UnidadesProductivas::modificar($data, Session::get('alias'), $id);
                for ($i = 0; $i < count($herramientas); $i++) {
                    $herramientas[$i]['id_unidad'] = $id;
                    $res = \App\Herramienta::guardar($herramientas[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($utensilios); $i++) {
                    $utensilios[$i]['id_unidad'] = $id;
                    $res = \App\Utensilio::guardar($utensilios[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($maquinas); $i++) {
                    $maquinas[$i]['id_unidad'] = $id;
                    $res = \App\Maquinaria::guardar($maquinas[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($instalaciones); $i++) {
                    $instalaciones[$i]['id_unidad'] = $id;
                    $res = \App\Instalacion::guardar($instalaciones[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($medios); $i++) {
                    $medios[$i]['id_unidad'] = $id;
                    $res = \App\MedioTransporte::guardar($medios[$i], Session::get('alias'));
                }                
            }
            $respuesta = [
                'OPC' => 'SI',
                'unidades' => $unidades,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function editar()
    {
        if (Auth::check()) {
            $consdptos = \App\Dpto::buscarDepartamentos(Session::get('alias'));
            foreach ($consdptos as $item) {
                $arrayDpto[] = [
                    'value' => $item->codigo,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayMuni = [];
            $consmuni = \App\Muni::buscarMunicipios(Session::get('alias'));
            foreach ($consmuni as $item) {
                $arrayMuni[$item->codigo][] = [
                    'value' => $item->codmun,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $conscorregi = \App\Corregimiento::buscarCorregimientos(Session::get('alias'));
            $arrayCorregi = [];
            foreach ($conscorregi as $item) {
                $arrayCorregi[$item->codmun][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayVeredas = [];
            $consveredas = \App\Vereda::buscarVeredas(Session::get('alias'));
            foreach ($consveredas as $item) {
                $arrayVeredas[$item->IDCORRE][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayEscolaridad = [];
            $consescolaridad = \App\Escolaridad::buscar(Session::get('alias'));
            foreach ($consescolaridad as $item) {
                $arrayEscolaridad[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }
            $id = request()->get("id");
            $id_hogar = request()->get("id_hogar");
            $unidades = \App\UnidadesProductivas::buscar(Session::get('alias'), $id);
            $codigo = \App\Codigo::buscar2(Session::get('alias'), Session::get('sigla'), $id);
            $herramientas = \App\Herramienta::buscar(Session::get('alias'), $id);
            $utensilios = \App\Utensilio::buscar(Session::get('alias'), $id);
            $maquinas = \App\Maquinaria::buscar(Session::get('alias'), $id);
            $instalaciones = \App\Instalacion::buscar(Session::get('alias'), $id);
            $medios = \App\MedioTransporte::buscar(Session::get('alias'), $id);

            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayVeredas' => $arrayVeredas,
                'arrayEscolaridad' => $arrayEscolaridad,
                'codigo' => $codigo,
                'unidades' => $unidades,
                'herramientas' => $herramientas,
                'utensilios' => $utensilios,
                'maquinas' => $maquinas,
                'instalaciones' => $instalaciones,
                'medios' => $medios,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function eliminar()
    {
        if (Auth::check()) {
            $id = request()->get("id");
            $ParPost = \App\UnidadesProductivas::editarestado("Inactivo", $id, Session::get('alias'));
            $OPC = "SI";
            $respuesta = [
                'OPC' => $OPC,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }
}
