<?php

namespace App\Http\Controllers;

use Auth;
use Session;

class CaracterizacionController extends Controller
{

    public function gestion()
    {
        if (Auth::check()) {

            $busqueda = request()->get('txtbusqueda');
            $caracterizacion = \App\Caracterizacion::listar($busqueda, Session::get('alias'));
            if ($caracterizacion) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $caracterizacion->total(),
                        'pagina_actual' => $caracterizacion->currentPage(),
                        'por_pagina' => $caracterizacion->perPage(),
                        'ultima_pagina' => $caracterizacion->lastPage(),
                        'desde' => $caracterizacion->firstItem(),
                        'hasta' => $caracterizacion->lastItem(),
                    ],
                    'caracterizacion' => $caracterizacion,
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

            $arrayParentesco = [];
            $consparentesco = \App\Parentesco::buscar(Session::get('alias'));
            foreach ($consparentesco as $item) {
                $arrayParentesco[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayEstado = [];
            $consestado = \App\EstadoCivil::buscar(Session::get('alias'));
            foreach ($consestado as $item) {
                $arrayEstado[] = [
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

            $arrayOcupacion = [];
            $consocupacion = \App\Ocupacion::buscar(Session::get('alias'));
            foreach ($consocupacion as $item) {
                $arrayOcupacion[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayEtnia = [];
            $consetnia = \App\Etnia::buscar(Session::get('alias'));
            foreach ($consetnia as $item) {
                $arrayEtnia[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayAdmini = [];
            $consadmini = \App\Administradora::buscarAdministradoras(Session::get('alias'));
            foreach ($consadmini as $item) {
                $arrayAdmini[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->adm_nombre),
                ];
            }

            $arrayCLasifi = [];
            $consclasifi = \App\ClasificacionEtnia::buscarClasificacion(Session::get('alias'));
            foreach ($consclasifi as $item) {
                $arrayCLasifi[$item->id_etnia][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->clasificacion),
                ];
            }

            $arrayGrados = [];
            $arrayGrados[3][] = [
                'value' => 'Primero',
                'texto' => 'Primero',
            ];
            $arrayGrados[3][] = [
                'value' => 'Segundo',
                'texto' => 'Segundo',
            ];
            $arrayGrados[3][] = [
                'value' => 'Tercero',
                'texto' => 'Tercero',
            ];
            $arrayGrados[3][] = [
                'value' => 'Cuarto',
                'texto' => 'Cuarto',
            ];
            $arrayGrados[3][] = [
                'value' => 'Quinto',
                'texto' => 'Quinto',
            ];
            $arrayGrados[14][] = [
                'value' => 'Sexto',
                'texto' => 'Sexto',
            ];
            $arrayGrados[14][] = [
                'value' => 'Septimo',
                'texto' => 'Septimo',
            ];
            $arrayGrados[14][] = [
                'value' => 'Octavo',
                'texto' => 'Octavo',
            ];
            $arrayGrados[14][] = [
                'value' => 'Noveno',
                'texto' => 'Noveno',
            ];
            $arrayGrados[14][] = [
                'value' => 'Decimo',
                'texto' => 'Decimo',
            ];
            $arrayGrados[14][] = [
                'value' => 'Undecimo',
                'texto' => 'Undecimo',
            ];
            $arrayGrados[15][] = [
                'value' => 'Transicion',
                'texto' => 'Transición',
            ];
            $arrayGrados[15][] = [
                'value' => 'Parbulo',
                'texto' => 'Parbulo',
            ];
            $arrayGrados[15][] = [
                'value' => 'Prekinder',
                'texto' => 'Prekinder',
            ];
            $arrayGrados[15][] = [
                'value' => 'Kinder',
                'texto' => 'Kinder',
            ];
            $arrayMorbilidadNacer = [];
            $consmorbinacer = \App\MorbilidadNacer::buscar(Session::get('alias'));
            foreach ($consmorbinacer as $item) {
                $arrayMorbilidadNacer[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }
            $arrayMorbilidad = [];
            $consmorbi = \App\Morbilidad::buscar(Session::get('alias'));
            foreach ($consmorbi as $item) {
                $arrayMorbilidad[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayMetodos = [];
            $consmetodos = \App\Metodos::buscar(Session::get('alias'));
            foreach ($consmetodos as $item) {
                $arrayMetodos[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayMotivos = [];
            $consmotivos = \App\Motivos::buscar(Session::get('alias'));
            foreach ($consmotivos as $item) {
                $arrayMotivos[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayGrupos = [];
            $consgrupos = \App\Grupo::buscar(Session::get('alias'));
            foreach ($consgrupos as $item) {
                $arrayGrupos[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayEnfCro = [];
            $consenfcro = \App\EnfermedadesCro::buscar(Session::get('alias'));
            foreach ($consenfcro as $item) {
                $arrayEnfCro[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayEnfInf = [];
            $consenfinf = \App\EnfermedadesInf::buscar(Session::get('alias'));
            foreach ($consenfinf as $item) {
                $arrayEnfInf[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayReligion = [];
            $consreli = \App\Religion::buscar(Session::get('alias'));
            foreach ($consreli as $item) {
                $arrayReligion[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $codigo = \App\Codigo::guardar(Session::get('alias'), Session::get('sigla'));
            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayParentesco' => $arrayParentesco,
                'arrayEstado' => $arrayEstado,
                'arrayEscolaridad' => $arrayEscolaridad,
                'arrayOcupacion' => $arrayOcupacion,
                'arrayEtnia' => $arrayEtnia,
                'arrayAdmini' => $arrayAdmini,
                'arrayCLasifi' => $arrayCLasifi,
                'arrayVeredas' => $arrayVeredas,
                'arrayGrados' => $arrayGrados,
                'arrayMorbilidadNacer' => $arrayMorbilidadNacer,
                'arrayMorbilidad' => $arrayMorbilidad,
                'arrayMetodos' => $arrayMetodos,
                'arrayMotivos' => $arrayMotivos,
                'arrayGrupos' => $arrayGrupos,
                'arrayEnfCro' => $arrayEnfCro,
                'arrayEnfInf' => $arrayEnfInf,
                'arrayReligion' => $arrayReligion,
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
            if (request()->get("opcion") == "GUARDAR") {
                if (request()->get("opc") == "GUAINDEN") {
                    $datahogar = request()->get("hogar");
                    $datacaracterizacion = request()->get("caracterizacion");
                    $dataintegrantes = request()->get("integrantes");
                    $datafactores = request()->get("factores");
                    // GUARDAR DATOS DEL HOGAR
                    $hogarrespuesta = \App\Hogar::guardar($datahogar, Session::get('alias'));
                    // GUARDAR DATOS DEL HOGAR

                    // GUARDAR DATOS DEL JEFE HOGAR
                    if ($hogarrespuesta) {
                        for ($i = 0; $i < count($datacaracterizacion); $i++) {
                            $datacaracterizacion[$i]['id_hogar'] = $hogarrespuesta;
                            $caracterizacionrespuesta = \App\Caracterizacion::guardar($datacaracterizacion[$i], Session::get('alias'));
                        }

                        for ($i = 0; $i < count($dataintegrantes); $i++) {
                            $dataintegrantes[$i]['id_hogar'] = $hogarrespuesta;
                            $integranterespuesta = \App\Integrante::guardar($dataintegrantes[$i], Session::get('alias'));
                        }

                        for ($i = 0; $i < count($datafactores); $i++) {
                            $datafactores[$i]['id_hogar'] = $hogarrespuesta;
                            $factoresrespuesta = \App\Factores::guardar($datafactores[$i], Session::get('alias'));
                        }
                        $respuesta = [
                            'OPC' => 'SI',
                            'IDHOGAR' => $hogarrespuesta,
                        ];
                        return response()->json($respuesta, 200);
                    } else {
                        $respuesta = [
                            'OPC' => 'NO',
                            'MENSAJE' => "Caracterización(s) No Guardado(s)...",
                        ];
                        return response()->json($respuesta, 500);
                    }
                    // GUARDAR DATOS DEL JEFE HOGAR
                }
                if (request()->get("opc") == "GUAVIVI") {
                    $datavivienda = request()->get("vivienda");
                    $dataEstratificacion = request()->get("estratificacion");
                    $dataAnimales = request()->get("Animales");
                    $IDHOGAR = request()->get("IDHOGAR");

                    // GUARDAR DATOS DE LA VIVIENDA
                    $datavivienda['id_hogar'] = $IDHOGAR;
                    $viviendarespuesta = \App\Vivienda::guardar($datavivienda, Session::get('alias'));
                    // GUARDAR DATOS DE LA VIVIENDA

                    if ($viviendarespuesta) {
                        // GUARDAR ESTRATIFICACION
                        $dato = [];
                        for ($i = 0; $i < count($dataEstratificacion); $i++) {
                            $dataEstratificacion[$i]['id_hogar'] = $IDHOGAR;
                            $Estratificacionrespuesta = \App\Estratificacion::guardar($dataEstratificacion[$i], Session::get('alias'));
                        }
                        // GUARDAR DE ESTRATIFICACION

                        // GUARDAR DE ANIMALES
                        for ($i = 0; $i < count($dataAnimales); $i++) {
                            $dataAnimales[$i]['id_hogar'] = $IDHOGAR;
                            $Animalesrespuesta = \App\Animal::guardar($dataAnimales[$i], Session::get('alias'));
                        }
                        // GUARDAR DE ANIMALES

                        $respuesta = [
                            'OPC' => 'SI',
                        ];
                        return response()->json($respuesta, 200);
                    } else {
                        $respuesta = [
                            'OPC' => 'NO',
                            'MENSAJE' => "Caracterización De La Vivienda No Guardada...",
                        ];
                        return response()->json($respuesta, 500);
                    }
                }
                if (request()->get("opc") == "GUACARCI") {
                    $dataMen1A = request()->get("Men1A");
                    $dataDe1A5 = request()->get("De1A5");
                    $dataDe6A11 = request()->get("De6A11");
                    $dataDe10A59 = request()->get("De10A59");
                    $dataParPost = request()->get("ParPost");
                    $IDHOGAR = request()->get("IDHOGAR");

                    // GUARDAR MENORES DE 1 AÑO
                    for ($i = 0; $i < count($dataMen1A); $i++) {
                        $dataMen1A[$i]['id_hogar'] = $IDHOGAR;
                        $Men1Arespuesta = \App\Men1a::guardar($dataMen1A[$i], Session::get('alias'));
                    }
                    // GUARDAR MENORES DE 1 AÑO

                    // GUARDAR DE 1 A 5
                    for ($i = 0; $i < count($dataDe1A5); $i++) {
                        $dataDe1A5[$i]['id_hogar'] = $IDHOGAR;
                        $De1a5respuesta = \App\De1a5::guardar($dataDe1A5[$i], Session::get('alias'));
                    }
                    // GUARDAR DE 1 A 5

                    // GUARDAR DE 6 A 11
                    for ($i = 0; $i < count($dataDe6A11); $i++) {
                        $dataDe6A11[$i]['id_hogar'] = $IDHOGAR;
                        $De6a11respuesta = \App\De6a11::guardar($dataDe6A11[$i], Session::get('alias'));
                    }
                    // GUARDAR DE 6 A 11

                    // GUARDAR DE 10 A 59
                    for ($i = 0; $i < count($dataDe10A59); $i++) {
                        $dataDe10A59[$i]['id_hogar'] = $IDHOGAR;
                        $De10a59respuesta = \App\De10a59::guardar($dataDe10A59[$i], Session::get('alias'));
                    }
                    // GUARDAR DE 10 A 59

                    // GUARDAR DE PARPOST
                    for ($i = 0; $i < count($dataParPost); $i++) {
                        $dataParPost[$i]['id_hogar'] = $IDHOGAR;
                        $ParPostrespuesta = \App\Parpost::guardar($dataParPost[$i], Session::get('alias'));
                    }
                    // GUARDAR DE PARPOST
                    $respuesta = [
                        'OPC' => 'SI',
                    ];
                    return response()->json($respuesta, 200);
                }
                if (request()->get("opc") == "GUADOLE") {
                    $dataDe12A17 = request()->get("De12A17");
                    $dataDe18A28 = request()->get("De18A28");
                    $dataDe29A59 = request()->get("De29A59");
                    $IDHOGAR = request()->get("IDHOGAR");

                    // GUARDAR DE 12 A 17
                    for ($i = 0; $i < count($dataDe12A17); $i++) {
                        $dataDe12A17[$i]['id_hogar'] = $IDHOGAR;
                        $De12A17respuesta = \App\De12a17::guardar($dataDe12A17[$i], Session::get('alias'));
                    }
                    // GUARDAR DE 12 A 17

                    // GUARDAR DE 18 A 28
                    for ($i = 0; $i < count($dataDe18A28); $i++) {
                        $dataDe18A28[$i]['id_hogar'] = $IDHOGAR;
                        $De18A28respuesta = \App\De18a28::guardar($dataDe18A28[$i], Session::get('alias'));
                    }
                    // GUARDAR DE 18 A 28

                    // GUARDAR DE 29 A 59
                    for ($i = 0; $i < count($dataDe29A59); $i++) {
                        $dataDe29A59[$i]['id_hogar'] = $IDHOGAR;
                        $De29A59respuesta = \App\De29a59::guardar($dataDe29A59[$i], Session::get('alias'));
                    }
                    // GUARDAR DE 29 A 59

                    $respuesta = [
                        'OPC' => 'SI',
                    ];
                    return response()->json($respuesta, 200);
                }
                if (request()->get("opc") == "GUADULT") {
                    $dataDe60 = request()->get("De60");
                    $dataEnCro = request()->get("EnCro");
                    $dataEnInf = request()->get("EnInf");
                    $IDHOGAR = request()->get("IDHOGAR");
                    // GUARDAR DE 60
                    for ($i = 0; $i < count($dataDe60); $i++) {
                        $dataDe60[$i]['id_hogar'] = $IDHOGAR;
                        $De60respuesta = \App\De60::guardar($dataDe60[$i], Session::get('alias'));
                    }
                    // GUARDAR DE 60

                    // GUARDAR DE ENCRO
                    for ($i = 0; $i < count($dataEnCro); $i++) {
                        $dataEnCro[$i]['id_hogar'] = $IDHOGAR;
                        $EnCrorespuesta = \App\Encro::guardar($dataEnCro[$i], Session::get('alias'));
                    }
                    // GUARDAR DE ENCRO
                    // GUARDAR DE ENINF
                    for ($i = 0; $i < count($dataEnInf); $i++) {
                        $dataEnInf[$i]['id_hogar'] = $IDHOGAR;
                        $EnInfrespuesta = \App\Eninf::guardar($dataEnInf[$i], Session::get('alias'));
                    }
                    // GUARDAR DE ENINF

                    $respuesta = [
                        'OPC' => 'SI',
                    ];
                    return response()->json($respuesta, 200);
                }
                if (request()->get("opc") == "GUAMIGRA") {
                    $dataMigra = request()->get("Migra");
                    $IDHOGAR = request()->get("IDHOGAR");

                    // GUARDAR DE MIGRA
                    for ($i = 0; $i < count($dataMigra); $i++) {
                        $dataMigra[$i]['id_hogar'] = $IDHOGAR;
                        $Migrarespuesta = \App\Migra::guardar($dataMigra[$i], Session::get('alias'));
                    }
                    // GUARDAR DE MIGRA

                    // CALCULOS FINALES
                    $resultado = self::calcular($IDHOGAR);

                    // CALCULOS FINALES
                    $respuesta = [
                        'OPC' => 'SI',
                    ];
                    return response()->json($respuesta, 200);
                }
            }
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function verificar($identificacion, $opcion)
    {
        if ($opcion == "Caracterizacion") {
            return \App\Caracterizacion::verificar($identificacion, Session::get('alias'));
        }
        if ($opcion == "Integrante") {
            return \App\Integrante::verificar($identificacion, Session::get('alias'));
        }
    }

    public function validar()
    {
        if (Auth::check()) {
            $identificacion = request()->get("identificacion");
            // VERIFICAR SI YA EXISTE EL USUARIO
            $resultado = self::verificar($identificacion, "Integrante");
            if ($resultado >= 1) {
                $respuesta = [
                    'OPC' => 'EXISTE',
                    'identificacion' => $identificacion,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NOEXISTE',
                    'identificacion' => $identificacion,
                ];
                return response()->json($respuesta, 200);
            }
            // VERIFICAR SI YA EXISTE EL USUARIO
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportar()
    {
        if (Auth::check()) {

            $caracterizacion = \App\Caracterizacion::exportar(Session::get('alias'));
            if ($caracterizacion) {
                $respuesta = [
                    'caracterizacion' => $caracterizacion,
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

    public function exportar2()
    {
        if (Auth::check()) {

            $caracterizacion = \App\Caracterizacion::exportar2(request()->get('id'), Session::get('alias'));
            if ($caracterizacion) {
                $integrantes = \App\Integrante::exportar(request()->get('id'), Session::get('alias'));
                if (!$integrantes) {
                    $integrantes = [];
                }
                $respuesta = [
                    'caracterizacion' => $caracterizacion,
                    'integrantes' => $integrantes,
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

    public function validarJefe()
    {
        if (Auth::check()) {
            $identificacion = request()->get("identificacion");
            // VERIFICAR SI YA EXISTE EL USUARIO
            $resultado = self::verificar($identificacion, "Caracterizacion");
            if ($resultado >= 1) {
                $respuesta = [
                    'OPC' => 'EXISTE',
                    'identificacion' => $identificacion,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NOEXISTE',
                    'identificacion' => $identificacion,
                ];
                return response()->json($respuesta, 200);
            }
            // VERIFICAR SI YA EXISTE EL USUARIO
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function actualizar()
    {
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

        $arrayParentesco = [];
        $consparentesco = \App\Parentesco::buscar(Session::get('alias'));
        foreach ($consparentesco as $item) {
            $arrayParentesco[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayEstado = [];
        $consestado = \App\EstadoCivil::buscar(Session::get('alias'));
        foreach ($consestado as $item) {
            $arrayEstado[] = [
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

        $arrayOcupacion = [];
        $consocupacion = \App\Ocupacion::buscar(Session::get('alias'));
        foreach ($consocupacion as $item) {
            $arrayOcupacion[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayEtnia = [];
        $consetnia = \App\Etnia::buscar(Session::get('alias'));
        foreach ($consetnia as $item) {
            $arrayEtnia[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayAdmini = [];
        $consadmini = \App\Administradora::buscarAdministradoras(Session::get('alias'));
        foreach ($consadmini as $item) {
            $arrayAdmini[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->adm_nombre),
            ];
        }

        $arrayCLasifi = [];
        $consclasifi = \App\ClasificacionEtnia::buscarClasificacion(Session::get('alias'));
        foreach ($consclasifi as $item) {
            $arrayCLasifi[$item->id_etnia][] = [
                'value' => $item->id,
                'texto' => strtoupper($item->clasificacion),
            ];
        }

        $arrayMorbilidadNacer = [];
        $consmorbinacer = \App\MorbilidadNacer::buscar(Session::get('alias'));
        foreach ($consmorbinacer as $item) {
            $arrayMorbilidadNacer[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }
        $arrayMorbilidad = [];
        $consmorbi = \App\Morbilidad::buscar(Session::get('alias'));
        foreach ($consmorbi as $item) {
            $arrayMorbilidad[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayMetodos = [];
        $consmetodos = \App\Metodos::buscar(Session::get('alias'));
        foreach ($consmetodos as $item) {
            $arrayMetodos[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayMotivos = [];
        $consmotivos = \App\Motivos::buscar(Session::get('alias'));
        foreach ($consmotivos as $item) {
            $arrayMotivos[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayGrupos = [];
        $consgrupos = \App\Grupo::buscar(Session::get('alias'));
        foreach ($consgrupos as $item) {
            $arrayGrupos[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayEnfCro = [];
        $consenfcro = \App\EnfermedadesCro::buscar(Session::get('alias'));
        foreach ($consenfcro as $item) {
            $arrayEnfCro[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayEnfInf = [];
        $consenfinf = \App\EnfermedadesInf::buscar(Session::get('alias'));
        foreach ($consenfinf as $item) {
            $arrayEnfInf[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $arrayReligion = [];
        $consreli = \App\Religion::buscar(Session::get('alias'));
        foreach ($consreli as $item) {
            $arrayReligion[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }

        $id = request()->get('id');
        $opcion = request()->get('opcion');
        if ($opcion == "MUN") {
            $conscolegios = \App\Colegio::colegiosMuni($id, Session::get('alias'));
            $consbarrios = \App\Barrio::barriosMuni($id, Session::get('alias'));
        } else {
            $conscolegios = \App\Colegio::colegiosCorre($id, Session::get('alias'));
            $consbarrios = \App\Barrio::barriosCorre($id, Session::get('alias'));
        }
        $arrayColegios = [];
        $arrayColegios[] = [
            'value' => 0,
            'texto' => "Ninguno",
        ];
        foreach ($conscolegios as $item) {
            $arrayColegios[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->descripcion),
            ];
        }
        $arrayBarrios[] = [
            'value' => 0,
            'texto' => "Ninguno",
        ];
        $arrayBarrios = [];
        foreach ($consbarrios as $item) {
            $arrayBarrios[] = [
                'value' => $item->id,
                'texto' => strtoupper($item->barrio),
            ];
        }
        $respuesta = [
            'arrayCorregi' => $arrayCorregi,
            'arrayParentesco' => $arrayParentesco,
            'arrayEstado' => $arrayEstado,
            'arrayEscolaridad' => $arrayEscolaridad,
            'arrayOcupacion' => $arrayOcupacion,
            'arrayEtnia' => $arrayEtnia,
            'arrayAdmini' => $arrayAdmini,
            'arrayCLasifi' => $arrayCLasifi,
            'arrayVeredas' => $arrayVeredas,
            'arrayMorbilidadNacer' => $arrayMorbilidadNacer,
            'arrayMorbilidad' => $arrayMorbilidad,
            'arrayMetodos' => $arrayMetodos,
            'arrayMotivos' => $arrayMotivos,
            'arrayGrupos' => $arrayGrupos,
            'arrayEnfCro' => $arrayEnfCro,
            'arrayEnfInf' => $arrayEnfInf,
            'arrayReligion' => $arrayReligion,
            'arrayColegios' => $arrayColegios,
            'arrayBarrios' => $arrayBarrios,
        ];
        return response()->json($respuesta, 200);
    }

    public function calcular($id_hogar)
    {
        
    }
}
