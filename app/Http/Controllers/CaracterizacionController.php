<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
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
            // $codigo = 1;

            $conspaises = \App\Paises::buscar(Session::get('alias'));
            foreach ($conspaises as $item) {
                $arrayPaises[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->nombre),
                ];
            }

            $arrayAnte = [];
            $consante = \App\Antecedentes::buscar(Session::get('alias'));
            foreach ($consante as $item) {
                $arrayAnte[] = [
                    'value' => $item->id,
                    'texto' => $item->descripcion,
                ];
            }
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
                'arrayPaises' => $arrayPaises,
                'arrayAnte' => $arrayAnte,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function editar()
    {
        if (Auth::check()) {

            //DATOS BASICOS
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

            $arrayGrados[1][] = [
                'value' => 'Primero',
                'texto' => 'Primero',
            ];
            $arrayGrados[1][] = [
                'value' => 'Segundo',
                'texto' => 'Segundo',
            ];
            $arrayGrados[1][] = [
                'value' => 'Tercero',
                'texto' => 'Tercero',
            ];
            $arrayGrados[1][] = [
                'value' => 'Cuarto',
                'texto' => 'Cuarto',
            ];
            $arrayGrados[1][] = [
                'value' => 'Quinto',
                'texto' => 'Quinto',
            ];
            $arrayGrados[4][] = [
                'value' => 'Sexto',
                'texto' => 'Sexto',
            ];
            $arrayGrados[4][] = [
                'value' => 'Septimo',
                'texto' => 'Septimo',
            ];
            $arrayGrados[4][] = [
                'value' => 'Octavo',
                'texto' => 'Octavo',
            ];
            $arrayGrados[4][] = [
                'value' => 'Noveno',
                'texto' => 'Noveno',
            ];
            $arrayGrados[4][] = [
                'value' => 'Decimo',
                'texto' => 'Decimo',
            ];
            $arrayGrados[4][] = [
                'value' => 'Undecimo',
                'texto' => 'Undecimo',
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

            $id_hogar = request()->get("id_hogar");
            $codigo = \App\Codigo::buscar(Session::get('alias'), Session::get('sigla'), $id_hogar);

            //DATOS BASICOS

            //DATOS GUARDADOS

            //TABLA HOGAR
            $hogar = \App\Hogar::buscar(Session::get('alias'), $id_hogar);
            //TABLA HOGAR

            //TABLA JEFES DE HOGAR
            $jefes = \App\Caracterizacion::buscarJefes(Session::get('alias'), $id_hogar);
            foreach ($jefes as $jef) {
                $enfer = \App\EnfermedadesJefes::buscar(Session::get('alias'), $jef->id);
                if ($enfer) {
                    $jef->enfermedades = $enfer;
                }
            }
            foreach ($jefes as $jef) {
                $ante = \App\AntecedentesJefes::buscar(Session::get('alias'), $jef->id);
                if ($ante) {
                    $jef->antecedentes = $ante;
                }
            }
            //TABLA JEFES DE HOGAR

            //TABLA INTEGRANTES
            $integrantes = \App\Integrante::buscarIntegrantes(Session::get('alias'), $id_hogar);
            foreach ($integrantes as $int) {
                $integra = \App\EnfermedadesIntegrantes::buscar(Session::get('alias'), $int->id);
                if ($integra) {
                    $int->enfermedades = $integra;
                }
            }
            foreach ($integrantes as $int) {
                $ante = \App\AntecedentesIntegrantes::buscar(Session::get('alias'), $int->id);
                if ($ante) {
                    $int->antecedentes = $ante;
                }
            }
            //TABLA INTEGRANTES

            //DATOS GUARDADOS

            //TABLA FACTORES
            $factores = \App\Factores::buscar(Session::get('alias'), $id_hogar);
            //TABLA FACTORES

            //TABLA AFECTACION
            $afectacion = \App\Afectacion::buscar(Session::get('alias'), $id_hogar);
            //TABLA AFECTACION

            //TABLA VIVIENDA
            $respuvivi = \App\Vivienda::buscar(Session::get('alias'), $id_hogar);
            $vivienda = [];
            $animales = [];
            $estratificacion = [];
            $actividad_viviendas = [];

            $viviVacia = 0;
            if ($respuvivi) {
                $vivienda = [
                    'id' => $respuvivi->id,
                    'id_hogar' => $respuvivi->id_hogar,
                    'tipo_vivienda' => $respuvivi->tipo_vivienda,
                    'tipo_estructura' => $respuvivi->tipo_estructura,
                    'otro_tipo_estructura' => $respuvivi->otro_tipo_estructura,
                    'numero_cuartos' => $respuvivi->numero_cuartos,
                    'personas_por_cuartos' => $respuvivi->personas_por_cuartos,
                    'material_predominante' => $respuvivi->material_predominante,
                    'tipo_cubierta' => $respuvivi->tipo_cubierta,
                    'otro_tipo_cubierta' => $respuvivi->otro_tipo_cubierta,

                    'cual_actividad_economica' => $respuvivi->cual_actividad_economica,
                    'evento_afecta_vivienda' => $respuvivi->evento_afecta_vivienda,
                    'familias_accion' => $respuvivi->familias_accion,
                    'promedio_ingresos' => $respuvivi->promedio_ingresos,
                    'promedio_gastos' => $respuvivi->promedio_gastos,
                    'fuente_agua' => $respuvivi->fuente_agua,
                    'energia_electrica' => $respuvivi->energia_electrica,
                    'gas_natural' => $respuvivi->gas_natural,
                    'acueducto' => $respuvivi->acueducto,

                    'alcantarillado' => $respuvivi->alcantarillado,
                    'telefono_fijo' => $respuvivi->telefono_fijo,
                    'aseo' => $respuvivi->aseo,
                    'internet_subsidiado' => $respuvivi->internet_subsidiado,
                    'internet_privado' => $respuvivi->internet_privado,
                    'cual_fuente' => $respuvivi->cual_fuente,
                    'donde_almacena_agua' => $respuvivi->donde_almacena_agua,
                    'otro_almacena_agua' => $respuvivi->otro_almacena_agua,
                    'ubicacion_tanque' => $respuvivi->ubicacion_tanque,
                    'tipo_tratamiento_agua' => $respuvivi->tipo_tratamiento_agua,

                    'destino_final_basura' => $respuvivi->destino_final_basura,
                    'otro_destino_final_basura' => $respuvivi->otro_destino_final_basura,
                    'porquerizas' => $respuvivi->porquerizas,
                    'plagas' => $respuvivi->plagas,
                    'industrias' => $respuvivi->industrias,
                    'malos_olores' => $respuvivi->malos_olores,
                    'rellenos' => $respuvivi->rellenos,
                    'contaminacion_a' => $respuvivi->contaminacion_a,
                    'contaminacion_v' => $respuvivi->contaminacion_v,
                    'rio' => $respuvivi->rio,

                    'otro_cerca' => $respuvivi->otro_cerca,
                    'cual_cerca' => $respuvivi->cual_cerca,
                    'aereopuertos' => $respuvivi->aereopuertos,
                    'avenidas_transitadas' => $respuvivi->avenidas_transitadas,
                    'lotes_abandonados' => $respuvivi->lotes_abandonados,
                    'servicio_sanitario' => $respuvivi->servicio_sanitario,
                    'donde_sanitario' => $respuvivi->donde_sanitario,
                    'excretas' => $respuvivi->excretas,
                    'otro_depositan_excretas' => $respuvivi->otro_depositan_excretas,
                    'cocina' => $respuvivi->cocina,

                    'dormitorio_a' => $respuvivi->dormitorio_a,
                    'sala' => $respuvivi->sala,
                    'dormitorio_n' => $respuvivi->dormitorio_n,
                    'sanitario' => $respuvivi->sanitario,
                    'lavadero' => $respuvivi->lavadero,
                    'iluminacion_adecuada' => $respuvivi->iluminacion_adecuada,
                    'techo_adecuado' => $respuvivi->techo_adecuado,
                    'ventilacion_adecuada' => $respuvivi->ventilacion_adecuada,
                    'pisos_adecuado' => $respuvivi->pisos_adecuado,
                    'paredes_adecuadas' => $respuvivi->paredes_adecuadas,

                    'gasolina' => $respuvivi->gasolina,
                    'plaguicidas' => $respuvivi->plaguicidas,
                    'detergentes' => $respuvivi->detergentes,
                    'plaguicidas_insectos' => $respuvivi->plaguicidas_insectos,
                    'envases_vacios' => $respuvivi->envases_vacios,
                    'otro_envases_vacios' => $respuvivi->otro_envases_vacios,
                    'elementos_protecion' => $respuvivi->elementos_protecion,
                    'otro_elementos_protecion' => $respuvivi->otro_elementos_protecion,
                    'metodos_coccion' => $respuvivi->metodos_coccion,
                    'otro_metodos_coccion' => $respuvivi->otro_metodos_coccion,

                    'lugares_preparan_alimentos' => $respuvivi->lugares_preparan_alimentos,
                    'lugares_almacenan_alimentos' => $respuvivi->lugares_almacenan_alimentos,
                    'otro_lugares_almacenan_alimentos' => $respuvivi->otro_lugares_almacenan_alimentos,
                    'lava_frutas' => $respuvivi->lava_frutas,
                    'tipo_explotacion' => $respuvivi->tipo_explotacion,
                    'otro_tipo_explotacion' => $respuvivi->otro_tipo_explotacion,
                    'flora_afectados' => $respuvivi->flora_afectados,
                    'fauna_afectados' => $respuvivi->fauna_afectados,
                    'suelo_afectados' => $respuvivi->suelo_afectados,
                    'aire_afectados' => $respuvivi->aire_afectados,

                    'agua_afectados' => $respuvivi->agua_afectados,
                    'residuos_solidos_genera' => $respuvivi->residuos_solidos_genera,
                    'aguas_servidas_genera' => $respuvivi->aguas_servidas_genera,
                    'desechos_cocina_genera' => $respuvivi->desechos_cocina_genera,
                    'heces_animales_genera' => $respuvivi->heces_animales_genera,
                    'quimicos_genera' => $respuvivi->quimicos_genera,
                    'otros_genera' => $respuvivi->otros_genera,
                    'cual_genera' => $respuvivi->cual_genera,
                    'tipo_combustible' => $respuvivi->tipo_combustible,
                    'mantenimiento_red' => $respuvivi->mantenimiento_red,

                    'zona_alto_riesgo' => $respuvivi->zona_alto_riesgo,
                    'almacenamiento_residuos' => $respuvivi->almacenamiento_residuos,
                    'fuente_contaminacion' => $respuvivi->fuente_contaminacion,
                    'aguas_negras' => $respuvivi->aguas_negras,
                    'zonas_verdes' => $respuvivi->zonas_verdes,
                    'desplazamientos' => $respuvivi->desplazamientos,
                    'rotacion_cultivo' => $respuvivi->rotacion_cultivo,
                    'emplea_fertilizantes' => $respuvivi->emplea_fertilizantes,
                    'suministro_energia_ilegal' => $respuvivi->suministro_energia_ilegal,
                    'quema_cultivo' => $respuvivi->quema_cultivo,

                    'mantenimiento_preventivo' => $respuvivi->mantenimiento_preventivo,
                    'veces_inundaciones' => $respuvivi->veces_inundaciones,
                    'fachada' => $respuvivi->fachada,
                    'cuantos_baños' => $respuvivi->cuantos_baños,
                    'estado_conservacion_baños' => $respuvivi->estado_conservacion_baños,
                    'acabados_externos' => $respuvivi->acabados_externos,
                    'estado_conservacion_estructuras' => $respuvivi->estado_conservacion_estructuras,
                    'mobiliario_cocina' => $respuvivi->mobiliario_cocina,
                    'andenes' => $respuvivi->andenes,

                    'residuos_aprovechables' => $respuvivi->residuos_aprovechables,
                    'residuos_organicos' => $respuvivi->residuos_organicos,
                    'residuos_no_aprovechables' => $respuvivi->residuos_no_aprovechables,
                ];
                $animales = \App\Animal::buscar(Session::get('alias'), $id_hogar);
                $estratificacion = \App\Estratificacion::buscar(Session::get('alias'), $id_hogar);
                $actividad_viviendas = \App\ActividadVivienda::buscar(Session::get('alias'), $id_hogar);
                $viviVacia = 1;
            }

            //TABLA VIVIENDA

            //TABLA MENORES DE 1 AÑO
            $Men1A = \App\Men1a::buscar(Session::get('alias'), $id_hogar);
            //TABLA MENORES DE 1 AÑO

            //TABLA DE 1 A 5
            $De1A5 = \App\De1a5::buscar(Session::get('alias'), $id_hogar);
            //TABLA DE 1 A 5

            //TABLA DE 6 A 11
            $De6A11 = \App\De6a11::buscar(Session::get('alias'), $id_hogar);
            //TABLA DE 6 A 11

            //TABLA DE 10 A 59 AÑOS
            $De10A59 = \App\De10a59::buscar(Session::get('alias'), $id_hogar);
            //TABLA DE 10 A 59 AÑOS

            //TABLA PARPOST
            $ParPost = \App\Parpost::buscar(Session::get('alias'), $id_hogar);
            //TABLA PARPOST

            //TABLA DE 12 A 17
            $De12A17 = \App\De12a17::buscar(Session::get('alias'), $id_hogar);
            //TABLA DE 12 A 17

            //TABLA DE 18 A 28
            $De18A28 = \App\De18a28::buscar(Session::get('alias'), $id_hogar);
            //TABLA DE 18 A 28

            //TABLA DE 29 A 59
            $De29A59 = \App\De29a59::buscar(Session::get('alias'), $id_hogar);
            //TABLA DE 29 A 59

            //TABLA DE 60
            $De60 = \App\De60::buscar(Session::get('alias'), $id_hogar);
            //TABLA DE 60

            //TABLA ENCRO
            $EnCro = \App\Encro::buscar(Session::get('alias'), $id_hogar);
            //TABLA ENCRO

            //TABLA ENINF
            $EnInf = \App\Eninf::buscar(Session::get('alias'), $id_hogar);
            //TABLA ENINF

            //TABLA Migra
            $Migra = \App\Migra::buscar(Session::get('alias'), $id_hogar);
            //TABLA Migra

            $conspaises = \App\Paises::buscar(Session::get('alias'));
            foreach ($conspaises as $item) {
                $arrayPaises[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->nombre),
                ];
            }
            $arrayAnte = [];
            $consante = \App\Antecedentes::buscar(Session::get('alias'));
            foreach ($consante as $item) {
                $arrayAnte[] = [
                    'value' => $item->id,
                    'texto' => $item->descripcion,
                ];
            }
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

                'hogar' => $hogar,
                'jefes' => $jefes,
                'integrantes' => $integrantes,
                'factores' => $factores,
                'afectacion' => $afectacion,
                'vivienda' => $vivienda,
                'viviVacia' => $viviVacia,
                'animales' => $animales,
                'estratificacion' => $estratificacion,
                'actividad_viviendas' => $actividad_viviendas,
                'De10A59' => $De10A59,
                'Men1A' => $Men1A,
                'De1A5' => $De1A5,
                'De6A11' => $De6A11,
                'ParPost' => $ParPost,
                'De12A17' => $De12A17,
                'De18A28' => $De18A28,
                'De29A59' => $De29A59,
                'De60' => $De60,
                'EnCro' => $EnCro,
                'EnInf' => $EnInf,
                'Migra' => $Migra,
                'arrayPaises' => $arrayPaises,
                'arrayAnte' => $arrayAnte,
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
                    $dataafectacion = request()->get("afectacion");
                    // GUARDAR DATOS DEL HOGAR
                    $hogarrespuesta = \App\Hogar::guardar($datahogar, Session::get('alias'));
                    // GUARDAR DATOS DEL HOGAR

                    // GUARDAR DATOS DEL JEFE HOGAR
                    if ($hogarrespuesta) {
                        for ($i = 0; $i < count($datacaracterizacion); $i++) {
                            $datacaracterizacion[$i]['id_hogar'] = $hogarrespuesta;
                            $caracterizacionrespuesta = \App\Caracterizacion::guardar($datacaracterizacion[$i], Session::get('alias'));
                            $enfjef = $datacaracterizacion[$i]['enfermedades'];
                            for ($j = 0; $j < count($enfjef); $j++) {
                                $enfjef[$j]["id_jefe"] = $caracterizacionrespuesta;
                                $enfjef[$j]["id_hogar"] = $hogarrespuesta;
                                $enfermedadesjefes = \App\EnfermedadesJefes::guardar($enfjef[$j], Session::get('alias'));
                            }

                            $antec = $datacaracterizacion[$i]['antecedentes'];
                            for ($j = 0; $j < count($antec); $j++) {
                                $antec[$j]["id_jefe"] = $caracterizacionrespuesta;
                                $antec[$j]["id_hogar"] = $hogarrespuesta;
                                $antecedentesjefes = \App\AntecedentesJefes::guardar($antec[$j], Session::get('alias'));
                            }
                        }

                        for ($i = 0; $i < count($dataintegrantes); $i++) {
                            $dataintegrantes[$i]['id_hogar'] = $hogarrespuesta;
                            $integranterespuesta = \App\Integrante::guardar($dataintegrantes[$i], Session::get('alias'));

                            $enfint = $dataintegrantes[$i]['enfermedades'];
                            for ($j = 0; $j < count($enfint); $j++) {
                                $enfint[$j]["id_inte"] = $integranterespuesta;
                                $enfint[$j]["id_hogar"] = $hogarrespuesta;
                                $enfermedadesinte = \App\EnfermedadesIntegrantes::guardar($enfint[$j], Session::get('alias'));
                            }
                            $antec = $dataintegrantes[$i]['antecedentes'];
                            for ($j = 0; $j < count($antec); $j++) {
                                $antec[$j]["id_inte"] = $integranterespuesta;
                                $antec[$j]["id_hogar"] = $hogarrespuesta;
                                $antecedentesinte = \App\AntecedentesIntegrantes::guardar($antec[$j], Session::get('alias'));
                            }
                        }

                        for ($i = 0; $i < count($datafactores); $i++) {
                            $datafactores[$i]['id_hogar'] = $hogarrespuesta;
                            $factoresrespuesta = \App\Factores::guardar($datafactores[$i], Session::get('alias'));
                        }

                        for ($i = 0; $i < count($dataafectacion); $i++) {
                            $dataafectacion[$i]['id_hogar'] = $hogarrespuesta;
                            $afectacionrespuesta = \App\Afectacion::guardar($dataafectacion[$i], Session::get('alias'));
                        }

                        $codigo = \App\Codigo::editar(Session::get('alias'), request()->get("CODIGOGENE"), $hogarrespuesta, Session::get('sigla'));

                        //TABLA HOGAR
                        $hogar = \App\Hogar::buscar(Session::get('alias'), $hogarrespuesta);
                        //TABLA HOGAR

                        //TABLA JEFES DE HOGAR
                        $jefes = \App\Caracterizacion::buscarJefes(Session::get('alias'), $hogarrespuesta);
                        foreach ($jefes as $jef) {
                            //TABLA ENFERMEDADES JEFES
                            $enfermedades = \App\EnfermedadesJefes::buscar(Session::get('alias'), $jef->id);
                            //TABLA ENFERMEDADES JEFES
                            if ($enfermedades) {
                                $jef->enfermedades = $enfermedades;
                            } else {
                                $jef->enfermedades = [];
                            }
                        }
                        foreach ($jefes as $jef) {
                            //TABLA ENFERMEDADES JEFES
                            $antecedentes = \App\AntecedentesJefes::buscar(Session::get('alias'), $jef->id);
                            //TABLA ENFERMEDADES JEFES
                            if ($antecedentes) {
                                $jef->antecedentes = $antecedentes;
                            } else {
                                $jef->antecedentes = [];
                            }
                        }
                        //TABLA JEFES DE HOGAR

                        //TABLA INTEGRANTES
                        $integrantes = \App\Integrante::buscarIntegrantes(Session::get('alias'), $hogarrespuesta);
                        foreach ($integrantes as $int) {
                            //TABLA ENFERMEDADES JEFES
                            $enfermedades = \App\EnfermedadesIntegrantes::buscar(Session::get('alias'), $int->id);
                            //TABLA ENFERMEDADES JEFES
                            if ($enfermedades) {
                                $int->enfermedades = $enfermedades;
                            } else {
                                $int->enfermedades = [];
                            }
                        }
                        foreach ($integrantes as $int) {
                            //TABLA ENFERMEDADES JEFES
                            $antecedentes = \App\AntecedentesIntegrantes::buscar(Session::get('alias'), $int->id);
                            //TABLA ENFERMEDADES JEFES
                            if ($antecedentes) {
                                $int->antecedentes = $antecedentes;
                            } else {
                                $int->antecedentes = [];
                            }
                        }
                        //TABLA INTEGRANTES

                        //TABLA FACTORES
                        $factores = \App\Factores::buscar(Session::get('alias'), $hogarrespuesta);
                        //TABLA FACTORES

                        //TABLA AFECTACION
                        $afectacion = \App\Afectacion::buscar(Session::get('alias'), $hogarrespuesta);
                        //TABLA AFECTACION

                        // $codigo = \App\Codigo::buscar(Session::get('alias'), Session::get('sigla'), $hogarrespuesta);

                        $respuesta = [
                            'OPC' => 'G',
                            'IDHOGAR' => $hogarrespuesta,
                            'hogar' => $hogar,
                            'jefes' => $jefes,
                            'integrantes' => $integrantes,
                            'factores' => $factores,
                            'afectacion' => $afectacion,
                        ];
                        $gua = \App\Log::guardar("Guardar la pestaña identificación con id_hogar  = " . $hogarrespuesta, Session::get('alias'), 'CARACTERIZACION');
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
                    $actividad_viviendas = request()->get("actividad_viviendas");

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

                        // GUARDAR ACTIVIDADES
                        for ($i = 0; $i < count($actividad_viviendas); $i++) {
                            $actividad_viviendas[$i]['id_hogar'] = $IDHOGAR;
                            $res = \App\ActividadVivienda::guardar($actividad_viviendas[$i], Session::get('alias'));
                        }
                        // GUARDAR ACTIVIDADES

                        //TABLA VIVIENDA
                        $respuvivi = \App\Vivienda::buscar(Session::get('alias'), $IDHOGAR);
                        $vivienda = [];
                        $animales = [];
                        $estratificacion = [];
                        $actividad_viviendas = [];
                        if ($respuvivi) {
                            $vivienda = [
                                'id' => $respuvivi->id,
                            ];
                            $animales = \App\Animal::buscar(Session::get('alias'), $IDHOGAR);
                            $estratificacion = \App\Estratificacion::buscar(Session::get('alias'), $IDHOGAR);
                            $actividad_viviendas = \App\ActividadVivienda::buscar(Session::get('alias'), $IDHOGAR);
                        }
                        //TABLA VIVIENDA

                        //CALCULAR RIESGOS//
                        $guardarInicial = \App\ValoresRiesgosAmbientales::guardarInicial($IDHOGAR, Session::get('alias'));
                        $ValoresRiesgosAmbientales = \App\ValoresRiesgosAmbientales::buscar(Session::get('alias'), $IDHOGAR);
                        $resultado = self::calcular($IDHOGAR);
                        $riesgos_ambientales = \App\RiesgosAmbientales::buscar(Session::get('alias'), $IDHOGAR);
                        if ($riesgos_ambientales) {
                            $riesgos_ambientales->va_riesgos_derrumbes = self::valorizacion($riesgos_ambientales->riesgos_derrumbes, 1);
                            $riesgos_ambientales->color_riesgos_derrumbes = self::color($riesgos_ambientales->va_riesgos_derrumbes);
                            if ($riesgos_ambientales->control_riesgos_derrumbes != "0") {
                                $riesgos_ambientales->val_residual_riesgos_derrumbes = self::valRieRes($riesgos_ambientales->control_riesgos_derrumbes);
                                $riesgos_ambientales->color_residual_riesgos_derrumbes = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_derrumbes);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_derrumbes = "";
                                $riesgos_ambientales->color_residual_riesgos_derrumbes = "";
                            }

                            $riesgos_ambientales->va_riesgos_inundacion = self::valorizacion($riesgos_ambientales->riesgos_inundacion, 1);
                            $riesgos_ambientales->color_riesgos_inundacion = self::color($riesgos_ambientales->va_riesgos_inundacion);
                            if ($riesgos_ambientales->control_riesgos_inundacion != "0") {
                                $riesgos_ambientales->val_residual_riesgos_inundacion = self::valRieRes($riesgos_ambientales->control_riesgos_inundacion);
                                $riesgos_ambientales->color_residual_riesgos_inundacion = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_inundacion);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_inundacion = "";
                                $riesgos_ambientales->color_residual_riesgos_inundacion = "";
                            }

                            $riesgos_ambientales->va_riesgos_insalubridad = self::valorizacion($riesgos_ambientales->riesgos_insalubridad, 2);
                            $riesgos_ambientales->color_riesgos_insalubridad = self::color($riesgos_ambientales->va_riesgos_insalubridad);
                            if ($riesgos_ambientales->control_riesgos_insalubridad != "0") {
                                $riesgos_ambientales->val_residual_riesgos_insalubridad = self::valRieRes($riesgos_ambientales->control_riesgos_insalubridad);
                                $riesgos_ambientales->color_residual_riesgos_insalubridad = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_insalubridad);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_insalubridad = "";
                                $riesgos_ambientales->color_residual_riesgos_insalubridad = "";
                            }

                            $riesgos_ambientales->va_riesgos_atmosferico = self::valorizacion($riesgos_ambientales->riesgos_atmosferico, 1);
                            $riesgos_ambientales->color_riesgos_atmosferico = self::color($riesgos_ambientales->va_riesgos_atmosferico);
                            if ($riesgos_ambientales->control_riesgos_atmosferico != "0") {
                                $riesgos_ambientales->val_residual_riesgos_atmosferico = self::valRieRes($riesgos_ambientales->control_riesgos_atmosferico);
                                $riesgos_ambientales->color_residual_riesgos_atmosferico = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_atmosferico);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_atmosferico = "";
                                $riesgos_ambientales->color_residual_riesgos_atmosferico = "";
                            }

                            $riesgos_ambientales->va_riesgos_recurso_suelo = self::valorizacion($riesgos_ambientales->riesgos_recurso_suelo, 1);
                            $riesgos_ambientales->color_riesgos_recurso_suelo = self::color($riesgos_ambientales->va_riesgos_recurso_suelo);
                            if ($riesgos_ambientales->control_riesgos_recurso_suelo != "0") {
                                $riesgos_ambientales->val_residual_riesgos_recurso_suelo = self::valRieRes($riesgos_ambientales->control_riesgos_recurso_suelo);
                                $riesgos_ambientales->color_residual_riesgos_recurso_suelo = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_recurso_suelo);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_recurso_suelo = "";
                                $riesgos_ambientales->color_residual_riesgos_recurso_suelo = "";
                            }

                            $riesgos_ambientales->va_riesgos_quema = self::valorizacion($riesgos_ambientales->riesgos_quema, 1);
                            $riesgos_ambientales->color_riesgos_quema = self::color($riesgos_ambientales->va_riesgos_quema);
                            if ($riesgos_ambientales->control_riesgos_quema != "0") {
                                $riesgos_ambientales->val_residual_riesgos_quema = self::valRieRes($riesgos_ambientales->control_riesgos_quema);
                                $riesgos_ambientales->color_residual_riesgos_quema = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_quema);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_quema = "";
                                $riesgos_ambientales->color_residual_riesgos_quema = "";
                            }

                            $riesgos_ambientales->va_riesgos_auditivo = self::valorizacion($riesgos_ambientales->riesgos_auditivo, 1);
                            $riesgos_ambientales->color_riesgos_auditivo = self::color($riesgos_ambientales->va_riesgos_auditivo);
                            if ($riesgos_ambientales->control_riesgos_auditivo != "0") {
                                $riesgos_ambientales->val_residual_riesgos_auditivo = self::valRieRes($riesgos_ambientales->control_riesgos_auditivo);
                                $riesgos_ambientales->color_residual_riesgos_auditivo = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_auditivo);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_auditivo = "";
                                $riesgos_ambientales->color_residual_riesgos_auditivo = "";
                            }

                            $riesgos_ambientales->va_riesgos_recurso_hidrico = self::valorizacion($riesgos_ambientales->riesgos_recurso_hidrico, 1);
                            $riesgos_ambientales->color_riesgos_recurso_hidrico = self::color($riesgos_ambientales->va_riesgos_recurso_hidrico);
                            if ($riesgos_ambientales->control_riesgos_recurso_hidrico != "0") {
                                $riesgos_ambientales->val_residual_riesgos_recurso_hidrico = self::valRieRes($riesgos_ambientales->control_riesgos_recurso_hidrico);
                                $riesgos_ambientales->color_residual_riesgos_recurso_hidrico = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_recurso_hidrico);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_recurso_hidrico = "";
                                $riesgos_ambientales->color_residual_riesgos_recurso_hidrico = "";
                            }

                            $riesgos_ambientales->va_riesgos_acceso_agua = self::valorizacion($riesgos_ambientales->riesgos_acceso_agua, 1);
                            $riesgos_ambientales->color_riesgos_acceso_agua = self::color($riesgos_ambientales->va_riesgos_acceso_agua);
                            if ($riesgos_ambientales->control_riesgos_acceso_agua != "0") {
                                $riesgos_ambientales->val_residual_riesgos_acceso_agua = self::valRieRes($riesgos_ambientales->control_riesgos_acceso_agua);
                                $riesgos_ambientales->color_residual_riesgos_acceso_agua = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_acceso_agua);
                            } else {
                                $riesgos_ambientales->val_residual_riesgos_acceso_agua = "";
                                $riesgos_ambientales->color_residual_riesgos_acceso_agua = "";
                            }
                        }
                        //CALCULAR RIESGOS//

                        $respuesta = [
                            'OPC' => 'SI',
                            'vivienda' => $vivienda,
                            'animales' => $animales,
                            'estratificacion' => $estratificacion,
                            'actividad_viviendas' => $actividad_viviendas,
                            'riesgos_ambientales' => $riesgos_ambientales,
                            'ValoresRiesgosAmbientales' => $ValoresRiesgosAmbientales,
                        ];

                        $gua = \App\Log::guardar("Guardar la pestaña viviendas con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');
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

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "Men1A", $dataMen1A[$i]['identificacion']);
                        //RIESGOS DE SALUD                        
                    }
                    // GUARDAR MENORES DE 1 AÑO

                    // GUARDAR DE 1 A 5
                    for ($i = 0; $i < count($dataDe1A5); $i++) {
                        $dataDe1A5[$i]['id_hogar'] = $IDHOGAR;
                        $De1a5respuesta = \App\De1a5::guardar($dataDe1A5[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De1A5", $dataDe1A5[$i]['identificacion']);
                        //RIESGOS DE SALUD                        
                    }
                    // GUARDAR DE 1 A 5

                    // GUARDAR DE 6 A 11
                    for ($i = 0; $i < count($dataDe6A11); $i++) {
                        $dataDe6A11[$i]['id_hogar'] = $IDHOGAR;
                        $De6a11respuesta = \App\De6a11::guardar($dataDe6A11[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De6A11", $dataDe6A11[$i]['identificacion']);
                        //RIESGOS DE SALUD                        
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

                    //TABLA MENORES DE 1 AÑO
                    $Men1A = \App\Men1a::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA MENORES DE 1 AÑO

                    //TABLA DE 1 A 5
                    $De1A5 = \App\De1a5::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 1 A 5

                    //TABLA DE 6 A 11
                    $De6A11 = \App\De6a11::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 6 A 11

                    //TABLA DE 10 A 59 AÑOS
                    $De10A59 = \App\De10a59::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 10 A 59 AÑOS

                    //TABLA PARPOST
                    $ParPost = \App\Parpost::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA PARPOST

                    // RIESGOS SALUD MEN1A
                    // $guardarInicial = \App\ValoresRiesgosSaludMEN1A::guardarInicial($IDHOGAR, Session::get('alias'));
                    $riesgos_salud_men1a = \App\RiesgosSaludMen1::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_men1a) {
                        foreach ($riesgos_salud_men1a as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);

                            $item->v_riesgos_desnutricion_aguda_I = $item->riesgos_desnutricion_aguda_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_I);
                            $item->v_riesgos_desnutricion_global_I = $item->riesgos_desnutricion_global_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_I);
                            $item->v_desnutricion_global_I = $item->desnutricion_global_I == 0 ? "" : self::valRieResSa($item->desnutricion_global_I);
                            $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                            $item->v_talla_baja_retraso_I = $item->talla_baja_retraso_I == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_I);
                            $item->v_desnutricion_aguda_moderada_I = $item->desnutricion_aguda_moderada_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_I);
                            $item->v_desnutricion_aguda_severa_I = $item->desnutricion_aguda_severa_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_I);
                            $item->v_riesgo_muerte_I = $item->riesgo_muerte_I == 0 ? "" : self::valRieResSa($item->riesgo_muerte_I);
                            $item->v_riesgo_sobrepeso_I = $item->riesgo_sobrepeso_I == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_I);
                            $item->v_sobrepeso_I = $item->sobrepeso_I == 0 ? "" : self::valRieResSa($item->sobrepeso_I);
                            $item->v_obesidad_I = $item->obesidad_I == 0 ? "" : self::valRieResSa($item->obesidad_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);

                            $item->c_riesgos_desnutricion_aguda_I = $item->v_riesgos_desnutricion_aguda_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_I);
                            $item->c_riesgos_desnutricion_global_I = $item->v_riesgos_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_I);
                            $item->c_desnutricion_global_I = $item->v_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_I);
                            $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                            $item->c_talla_baja_retraso_I = $item->v_talla_baja_retraso_I == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_I);
                            $item->c_desnutricion_aguda_moderada_I = $item->v_desnutricion_aguda_moderada_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_I);
                            $item->c_desnutricion_aguda_severa_I = $item->v_desnutricion_aguda_severa_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_I);
                            $item->c_riesgo_muerte_I = $item->v_riesgo_muerte_I == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_I);
                            $item->c_riesgo_sobrepeso_I = $item->v_riesgo_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_I);
                            $item->c_sobrepeso_I = $item->v_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_sobrepeso_I);
                            $item->c_obesidad_I = $item->v_obesidad_I == "" ? "" : self::colorRieResSa($item->v_obesidad_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgos_desnutricion_aguda_R = $item->riesgos_desnutricion_aguda_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_R);
                            $item->v_riesgos_desnutricion_global_R = $item->riesgos_desnutricion_global_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_R);
                            $item->v_desnutricion_global_R = $item->desnutricion_global_R == 0 ? "" : self::valRieResSa($item->desnutricion_global_R);
                            $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                            $item->v_talla_baja_retraso_R = $item->talla_baja_retraso_R == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_R);
                            $item->v_desnutricion_aguda_moderada_R = $item->desnutricion_aguda_moderada_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_R);
                            $item->v_desnutricion_aguda_severa_R = $item->desnutricion_aguda_severa_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_R);
                            $item->v_riesgo_muerte_R = $item->riesgo_muerte_R == 0 ? "" : self::valRieResSa($item->riesgo_muerte_R);
                            $item->v_riesgo_sobrepeso_R = $item->riesgo_sobrepeso_R == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_R);
                            $item->v_sobrepeso_R = $item->sobrepeso_R == 0 ? "" : self::valRieResSa($item->sobrepeso_R);
                            $item->v_obesidad_R = $item->obesidad_R == 0 ? "" : self::valRieResSa($item->obesidad_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgos_desnutricion_aguda_R = $item->v_riesgos_desnutricion_aguda_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_R);
                            $item->c_riesgos_desnutricion_global_R = $item->v_riesgos_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_R);
                            $item->c_desnutricion_global_R = $item->v_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_R);
                            $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                            $item->c_talla_baja_retraso_R = $item->v_talla_baja_retraso_R == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_R);
                            $item->c_desnutricion_aguda_moderada_R = $item->v_desnutricion_aguda_moderada_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_R);
                            $item->c_desnutricion_aguda_severa_R = $item->v_desnutricion_aguda_severa_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_R);
                            $item->c_riesgo_muerte_R = $item->v_riesgo_muerte_R == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_R);
                            $item->c_riesgo_sobrepeso_R = $item->v_riesgo_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_R);
                            $item->c_sobrepeso_R = $item->v_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_sobrepeso_R);
                            $item->c_obesidad_R = $item->v_obesidad_R == "" ? "" : self::colorRieResSa($item->v_obesidad_R);
                        }
                    }
                    $ValoresRiesgosSaludMen1a = \App\ValoresRiesgosSaludMEN1A::buscar(Session::get('alias'), $IDHOGAR);
                    // RIESGOS SALUD MEN1A

                    // RIESGOS SALUD DE1A5
                    // $guardarInicial = \App\ValoresRiesgosSaludDE1A5::guardarInicial($IDHOGAR, Session::get('alias'));
                    $riesgos_salud_de1a5 = \App\RiesgosSaludDe1a5::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de1a5) {
                        foreach ($riesgos_salud_de1a5 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);

                            $item->v_riesgos_desnutricion_aguda_I = $item->riesgos_desnutricion_aguda_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_I);
                            $item->v_riesgos_desnutricion_global_I = $item->riesgos_desnutricion_global_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_I);
                            $item->v_desnutricion_global_I = $item->desnutricion_global_I == 0 ? "" : self::valRieResSa($item->desnutricion_global_I);
                            $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                            $item->v_talla_baja_retraso_I = $item->talla_baja_retraso_I == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_I);
                            $item->v_desnutricion_aguda_moderada_I = $item->desnutricion_aguda_moderada_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_I);
                            $item->v_desnutricion_aguda_severa_I = $item->desnutricion_aguda_severa_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_I);
                            $item->v_riesgo_muerte_I = $item->riesgo_muerte_I == 0 ? "" : self::valRieResSa($item->riesgo_muerte_I);
                            $item->v_riesgo_sobrepeso_I = $item->riesgo_sobrepeso_I == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_I);
                            $item->v_sobrepeso_I = $item->sobrepeso_I == 0 ? "" : self::valRieResSa($item->sobrepeso_I);
                            $item->v_obesidad_I = $item->obesidad_I == 0 ? "" : self::valRieResSa($item->obesidad_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);

                            $item->c_riesgos_desnutricion_aguda_I = $item->v_riesgos_desnutricion_aguda_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_I);
                            $item->c_riesgos_desnutricion_global_I = $item->v_riesgos_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_I);
                            $item->c_desnutricion_global_I = $item->v_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_I);
                            $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                            $item->c_talla_baja_retraso_I = $item->v_talla_baja_retraso_I == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_I);
                            $item->c_desnutricion_aguda_moderada_I = $item->v_desnutricion_aguda_moderada_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_I);
                            $item->c_desnutricion_aguda_severa_I = $item->v_desnutricion_aguda_severa_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_I);
                            $item->c_riesgo_muerte_I = $item->v_riesgo_muerte_I == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_I);
                            $item->c_riesgo_sobrepeso_I = $item->v_riesgo_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_I);
                            $item->c_sobrepeso_I = $item->v_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_sobrepeso_I);
                            $item->c_obesidad_I = $item->v_obesidad_I == "" ? "" : self::colorRieResSa($item->v_obesidad_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgos_desnutricion_aguda_R = $item->riesgos_desnutricion_aguda_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_R);
                            $item->v_riesgos_desnutricion_global_R = $item->riesgos_desnutricion_global_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_R);
                            $item->v_desnutricion_global_R = $item->desnutricion_global_R == 0 ? "" : self::valRieResSa($item->desnutricion_global_R);
                            $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                            $item->v_talla_baja_retraso_R = $item->talla_baja_retraso_R == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_R);
                            $item->v_desnutricion_aguda_moderada_R = $item->desnutricion_aguda_moderada_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_R);
                            $item->v_desnutricion_aguda_severa_R = $item->desnutricion_aguda_severa_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_R);
                            $item->v_riesgo_muerte_R = $item->riesgo_muerte_R == 0 ? "" : self::valRieResSa($item->riesgo_muerte_R);
                            $item->v_riesgo_sobrepeso_R = $item->riesgo_sobrepeso_R == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_R);
                            $item->v_sobrepeso_R = $item->sobrepeso_R == 0 ? "" : self::valRieResSa($item->sobrepeso_R);
                            $item->v_obesidad_R = $item->obesidad_R == 0 ? "" : self::valRieResSa($item->obesidad_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgos_desnutricion_aguda_R = $item->v_riesgos_desnutricion_aguda_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_R);
                            $item->c_riesgos_desnutricion_global_R = $item->v_riesgos_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_R);
                            $item->c_desnutricion_global_R = $item->v_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_R);
                            $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                            $item->c_talla_baja_retraso_R = $item->v_talla_baja_retraso_R == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_R);
                            $item->c_desnutricion_aguda_moderada_R = $item->v_desnutricion_aguda_moderada_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_R);
                            $item->c_desnutricion_aguda_severa_R = $item->v_desnutricion_aguda_severa_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_R);
                            $item->c_riesgo_muerte_R = $item->v_riesgo_muerte_R == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_R);
                            $item->c_riesgo_sobrepeso_R = $item->v_riesgo_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_R);
                            $item->c_sobrepeso_R = $item->v_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_sobrepeso_R);
                            $item->c_obesidad_R = $item->v_obesidad_R == "" ? "" : self::colorRieResSa($item->v_obesidad_R);
                        }
                    }
                    $ValoresRiesgosSaludDe1a5 = \App\ValoresRiesgosSaludDE1A5::buscar(Session::get('alias'), $IDHOGAR);
                    // RIESGOS SALUD DE1A5

                    // RIESGOS SALUD DE6A11
                    $riesgos_salud_de6a11 = \App\RiesgosSaludDe6a11::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de6a11) {
                        foreach ($riesgos_salud_de6a11 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE6A11                    
                    $respuesta = [
                        'OPC' => 'SI',
                        'De10A59' => $De10A59,
                        'Men1A' => $Men1A,
                        'De1A5' => $De1A5,
                        'De6A11' => $De6A11,
                        'ParPost' => $ParPost,
                        'riesgos_salud_men1a' => $riesgos_salud_men1a,
                        'riesgos_salud_de1a5' => $riesgos_salud_de1a5,
                        'riesgos_salud_de6a11' => $riesgos_salud_de6a11,
                        'ValoresRiesgosSaludMen1a' => $ValoresRiesgosSaludMen1a,
                        'ValoresRiesgosSaludDe1a5' => $ValoresRiesgosSaludDe1a5,                        
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña cart.X.ciclo con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');
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

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De12A17", $dataDe12A17[$i]['identificacion']);
                        //RIESGOS DE SALUD                        
                    }
                    // GUARDAR DE 12 A 17

                    // GUARDAR DE 18 A 28
                    for ($i = 0; $i < count($dataDe18A28); $i++) {
                        $dataDe18A28[$i]['id_hogar'] = $IDHOGAR;
                        $De18A28respuesta = \App\De18a28::guardar($dataDe18A28[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De18A28", $dataDe18A28[$i]['identificacion']);
                        //RIESGOS DE SALUD                        
                    }
                    // GUARDAR DE 18 A 28

                    // GUARDAR DE 29 A 59
                    for ($i = 0; $i < count($dataDe29A59); $i++) {
                        $dataDe29A59[$i]['id_hogar'] = $IDHOGAR;
                        $De29A59respuesta = \App\De29a59::guardar($dataDe29A59[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De29A59", $dataDe29A59[$i]['identificacion']);
                        //RIESGOS DE SALUD                        
                    }
                    // GUARDAR DE 29 A 59

                    //TABLA DE 12 A 17
                    $De12A17 = \App\De12a17::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 12 A 17

                    //TABLA DE 18 A 28
                    $De18A28 = \App\De18a28::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 18 A 28

                    //TABLA DE 29 A 59
                    $De29A59 = \App\De29a59::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 29 A 59

                    // RIESGOS SALUD DE12A17
                    $riesgos_salud_de12a17 = \App\RiesgosSaludDe12a17::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de12a17) {
                        foreach ($riesgos_salud_de12a17 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE12A17

                    // RIESGOS SALUD DE18A28
                    $riesgos_salud_de18a28 = \App\RiesgosSaludDe18a28::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de18a28) {
                        foreach ($riesgos_salud_de18a28 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE18A28

                    // RIESGOS SALUD DE29A59
                    $riesgos_salud_de29a59 = \App\RiesgosSaludDe29a59::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de29a59) {
                        foreach ($riesgos_salud_de29a59 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE29A59                    

                    $respuesta = [
                        'OPC' => 'SI',
                        'De12A17' => $De12A17,
                        'De18A28' => $De18A28,
                        'De29A59' => $De29A59,
                        'riesgos_salud_de12a17' => $riesgos_salud_de12a17,
                        'riesgos_salud_de18a28' => $riesgos_salud_de18a28,
                        'riesgos_salud_de29a59' => $riesgos_salud_de29a59,                        
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Adolescentes/Jovenes con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');
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

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De60", $dataDe60[$i]['identificacion']);
                        //RIESGOS DE SALUD                        
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
                    //TABLA DE 60
                    $De60 = \App\De60::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 60

                    //TABLA ENCRO
                    $EnCro = \App\Encro::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA ENCRO

                    //TABLA ENINF
                    $EnInf = \App\Eninf::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA ENINF

                    // RIESGOS SALUD DE60
                    $riesgos_salud_de60 = \App\RiesgosSaludDe60::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de60) {
                        foreach ($riesgos_salud_de60 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE60                    
                    $respuesta = [
                        'OPC' => 'SI',
                        'De60' => $De60,
                        'EnCro' => $EnCro,
                        'EnInf' => $EnInf,
                        'riesgos_salud_de60' => $riesgos_salud_de60,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Adulto mayor con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');
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

                    //TABLA Migra
                    $Migra = \App\Migra::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA Migra
                    $respuesta = [
                        'OPC' => 'SI',
                        'Migra' => $Migra,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Migrante con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');
                    return response()->json($respuesta, 200);
                }
            }
            if (request()->get("opcion") == "MODIFICAR") {
                if (request()->get("opc") == "GUAINDEN") {
                    $datahogar = request()->get("hogar");
                    $datacaracterizacion = request()->get("caracterizacion");
                    $dataintegrantes = request()->get("integrantes");
                    $datafactores = request()->get("factores");
                    $dataafectacion = request()->get("afectacion");
                    $id_hogar = request()->get("id_hogar");
                    // GUARDAR DATOS DEL HOGAR
                    $hogarrespuesta = \App\Hogar::modificar($datahogar, Session::get('alias'), $id_hogar);
                    // GUARDAR DATOS DEL HOGAR

                    // GUARDAR DATOS DEL JEFE HOGAR
                    if ($hogarrespuesta >= 0) {
                        for ($i = 0; $i < count($datacaracterizacion); $i++) {

                            $datacaracterizacion[$i]['id_hogar'] = $id_hogar;
                            if ($datacaracterizacion[$i]['id'] == "0") {
                                $caracterizacionrespuesta = \App\Caracterizacion::guardar($datacaracterizacion[$i], Session::get('alias'));
                                $datacaracterizacion[$i]['id'] = $caracterizacionrespuesta;
                            } else {
                                $caracterizacionrespuesta = \App\Caracterizacion::modificar($datacaracterizacion[$i], Session::get('alias'), $datacaracterizacion[$i]['id']);
                            }
                            $enfjef = $datacaracterizacion[$i]['enfermedades'];
                            for ($j = 0; $j < count($enfjef); $j++) {
                                $enfjef[$j]["id_jefe"] = $datacaracterizacion[$i]['id'];
                                $enfjef[$j]["id_hogar"] = $id_hogar;
                                $enfermedadesjefes = \App\EnfermedadesJefes::guardar($enfjef[$j], Session::get('alias'));
                            }
                            $antec = $datacaracterizacion[$i]['antecedentes'];
                            for ($j = 0; $j < count($antec); $j++) {
                                $antec[$j]["id_jefe"] = $datacaracterizacion[$i]['id'];
                                $antec[$j]["id_hogar"] = $id_hogar;
                                $antecedentesjefes = \App\AntecedentesJefes::guardar($antec[$j], Session::get('alias'));
                            }
                        }

                        for ($i = 0; $i < count($dataintegrantes); $i++) {

                            $dataintegrantes[$i]['id_hogar'] = $id_hogar;
                            if ($dataintegrantes[$i]['id'] == "0") {
                                $integranterespuesta = \App\Integrante::guardar($dataintegrantes[$i], Session::get('alias'));
                                $dataintegrantes[$i]['id'] = $integranterespuesta;
                            } else {
                                $integranterespuesta = \App\Integrante::modificar($dataintegrantes[$i], Session::get('alias'), $dataintegrantes[$i]['id']);
                            }
                            $enfint = $dataintegrantes[$i]['enfermedades'];
                            for ($j = 0; $j < count($enfint); $j++) {
                                $enfint[$j]["id_inte"] = $dataintegrantes[$i]['id'];
                                $enfint[$j]["id_hogar"] = $id_hogar;
                                $enfermedadesinte = \App\EnfermedadesIntegrantes::guardar($enfint[$j], Session::get('alias'));
                            }

                            $antec = $dataintegrantes[$i]['antecedentes'];
                            for ($j = 0; $j < count($antec); $j++) {
                                $antec[$j]["id_inte"] = $dataintegrantes[$i]['id'];
                                $antec[$j]["id_hogar"] = $id_hogar;
                                $antecedentesinte = \App\AntecedentesIntegrantes::guardar($antec[$j], Session::get('alias'));
                            }
                        }

                        for ($i = 0; $i < count($datafactores); $i++) {
                            $datafactores[$i]['id_hogar'] = $id_hogar;
                            $factoresrespuesta = \App\Factores::guardar($datafactores[$i], Session::get('alias'));
                        }

                        for ($i = 0; $i < count($dataafectacion); $i++) {
                            $dataafectacion[$i]['id_hogar'] = $id_hogar;
                            $afectacionrespuesta = \App\Afectacion::guardar($dataafectacion[$i], Session::get('alias'));
                        }
                        // $codigo = \App\Codigo::editar(Session::get('alias'), request()->get("CODIGOGENE"), $hogarrespuesta, Session::get('sigla'));

                        //TABLA HOGAR
                        $hogar = \App\Hogar::buscar(Session::get('alias'), $id_hogar);
                        //TABLA HOGAR

                        //TABLA JEFES DE HOGAR
                        $jefes = \App\Caracterizacion::buscarJefes(Session::get('alias'), $id_hogar);
                        foreach ($jefes as $jef) {
                            //TABLA ENFERMEDADES JEFES
                            $enfermedades = \App\EnfermedadesJefes::buscar(Session::get('alias'), $jef->id);
                            //TABLA ENFERMEDADES JEFES
                            if ($enfermedades) {
                                $jef->enfermedades = $enfermedades;
                            } else {
                                $jef->enfermedades = [];
                            }
                        }
                        foreach ($jefes as $jef) {
                            //TABLA ENFERMEDADES JEFES
                            $antecedentes = \App\AntecedentesJefes::buscar(Session::get('alias'), $jef->id);
                            //TABLA ENFERMEDADES JEFES
                            if ($antecedentes) {
                                $jef->antecedentes = $antecedentes;
                            } else {
                                $jef->antecedentes = [];
                            }
                        }
                        //TABLA JEFES DE HOGAR

                        //TABLA INTEGRANTES
                        $integrantes = \App\Integrante::buscarIntegrantes(Session::get('alias'), $id_hogar);
                        foreach ($integrantes as $int) {
                            //TABLA ENFERMEDADES JEFES
                            $enfermedades = \App\EnfermedadesIntegrantes::buscar(Session::get('alias'), $int->id);
                            //TABLA ENFERMEDADES JEFES
                            if ($enfermedades) {
                                $int->enfermedades = $enfermedades;
                            } else {
                                $int->enfermedades = [];
                            }
                        }
                        foreach ($integrantes as $int) {
                            //TABLA ENFERMEDADES JEFES
                            $antecedentes = \App\AntecedentesIntegrantes::buscar(Session::get('alias'), $int->id);
                            //TABLA ENFERMEDADES JEFES
                            if ($antecedentes) {
                                $int->antecedentes = $antecedentes;
                            } else {
                                $int->antecedentes = [];
                            }
                        }
                        //TABLA INTEGRANTES

                        //TABLA FACTORES
                        $factores = \App\Factores::buscar(Session::get('alias'), $id_hogar);
                        //TABLA FACTORES

                        //TABLA AFECTACION
                        $afectacion = \App\Afectacion::buscar(Session::get('alias'), $id_hogar);
                        //TABLA AFECTACION
                        $respuesta = [
                            'OPC' => 'E',
                            'IDHOGAR' => $id_hogar,
                            'hogar' => $hogar,
                            'jefes' => $jefes,
                            'integrantes' => $integrantes,
                            'factores' => $factores,
                            'afectacion' => $afectacion,
                        ];
                        $gua = \App\Log::guardar("Guardar la pestaña identificación con id_hogar  = " . $id_hogar, Session::get('alias'), 'CARACTERIZACION');
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
                    $actividad_viviendas = request()->get("actividad_viviendas");
                    // GUARDAR DATOS DE LA VIVIENDA
                    $datavivienda['id_hogar'] = $IDHOGAR;
                    $viviendarespuesta = \App\Vivienda::guardar($datavivienda, Session::get('alias'));
                    // GUARDAR DATOS DE LA VIVIENDA

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

                    // GUARDAR ACTIVIDADES
                    for ($i = 0; $i < count($actividad_viviendas); $i++) {
                        $actividad_viviendas[$i]['id_hogar'] = $IDHOGAR;
                        $res = \App\ActividadVivienda::guardar($actividad_viviendas[$i], Session::get('alias'));
                    }
                    // GUARDAR ACTIVIDADES

                    //TABLA VIVIENDA
                    $respuvivi = \App\Vivienda::buscar(Session::get('alias'), $IDHOGAR);
                    $vivienda = [];
                    $animales = [];
                    $estratificacion = [];
                    $actividad_viviendas = [];
                    if ($respuvivi) {
                        $vivienda = [
                            'id' => $respuvivi->id,
                        ];
                        $animales = \App\Animal::buscar(Session::get('alias'), $IDHOGAR);
                        $estratificacion = \App\Estratificacion::buscar(Session::get('alias'), $IDHOGAR);
                        $actividad_viviendas = \App\ActividadVivienda::buscar(Session::get('alias'), $IDHOGAR);
                    }
                    //TABLA VIVIENDA

                    //CALCULAR RIESGOS//
                    $ValoresRiesgosAmbientales = \App\ValoresRiesgosAmbientales::buscar(Session::get('alias'), $IDHOGAR);

                    $resultado = self::calcular($IDHOGAR);
                    $riesgos_ambientales = \App\RiesgosAmbientales::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_ambientales) {
                        $riesgos_ambientales->va_riesgos_derrumbes = self::valorizacion($riesgos_ambientales->riesgos_derrumbes, 1);
                        $riesgos_ambientales->color_riesgos_derrumbes = self::color($riesgos_ambientales->va_riesgos_derrumbes);
                        if ($riesgos_ambientales->control_riesgos_derrumbes != "0") {
                            $riesgos_ambientales->val_residual_riesgos_derrumbes = self::valRieRes($riesgos_ambientales->control_riesgos_derrumbes);
                            $riesgos_ambientales->color_residual_riesgos_derrumbes = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_derrumbes);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_derrumbes = "";
                            $riesgos_ambientales->color_residual_riesgos_derrumbes = "";
                        }

                        $riesgos_ambientales->va_riesgos_inundacion = self::valorizacion($riesgos_ambientales->riesgos_inundacion, 1);
                        $riesgos_ambientales->color_riesgos_inundacion = self::color($riesgos_ambientales->va_riesgos_inundacion);
                        if ($riesgos_ambientales->control_riesgos_inundacion != "0") {
                            $riesgos_ambientales->val_residual_riesgos_inundacion = self::valRieRes($riesgos_ambientales->control_riesgos_inundacion);
                            $riesgos_ambientales->color_residual_riesgos_inundacion = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_inundacion);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_inundacion = "";
                            $riesgos_ambientales->color_residual_riesgos_inundacion = "";
                        }

                        $riesgos_ambientales->va_riesgos_insalubridad = self::valorizacion($riesgos_ambientales->riesgos_insalubridad, 2);
                        $riesgos_ambientales->color_riesgos_insalubridad = self::color($riesgos_ambientales->va_riesgos_insalubridad);
                        if ($riesgos_ambientales->control_riesgos_insalubridad != "0") {
                            $riesgos_ambientales->val_residual_riesgos_insalubridad = self::valRieRes($riesgos_ambientales->control_riesgos_insalubridad);
                            $riesgos_ambientales->color_residual_riesgos_insalubridad = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_insalubridad);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_insalubridad = "";
                            $riesgos_ambientales->color_residual_riesgos_insalubridad = "";
                        }

                        $riesgos_ambientales->va_riesgos_atmosferico = self::valorizacion($riesgos_ambientales->riesgos_atmosferico, 1);
                        $riesgos_ambientales->color_riesgos_atmosferico = self::color($riesgos_ambientales->va_riesgos_atmosferico);
                        if ($riesgos_ambientales->control_riesgos_atmosferico != "0") {
                            $riesgos_ambientales->val_residual_riesgos_atmosferico = self::valRieRes($riesgos_ambientales->control_riesgos_atmosferico);
                            $riesgos_ambientales->color_residual_riesgos_atmosferico = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_atmosferico);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_atmosferico = "";
                            $riesgos_ambientales->color_residual_riesgos_atmosferico = "";
                        }

                        $riesgos_ambientales->va_riesgos_recurso_suelo = self::valorizacion($riesgos_ambientales->riesgos_recurso_suelo, 1);
                        $riesgos_ambientales->color_riesgos_recurso_suelo = self::color($riesgos_ambientales->va_riesgos_recurso_suelo);
                        if ($riesgos_ambientales->control_riesgos_recurso_suelo != "0") {
                            $riesgos_ambientales->val_residual_riesgos_recurso_suelo = self::valRieRes($riesgos_ambientales->control_riesgos_recurso_suelo);
                            $riesgos_ambientales->color_residual_riesgos_recurso_suelo = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_recurso_suelo);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_recurso_suelo = "";
                            $riesgos_ambientales->color_residual_riesgos_recurso_suelo = "";
                        }

                        $riesgos_ambientales->va_riesgos_quema = self::valorizacion($riesgos_ambientales->riesgos_quema, 1);
                        $riesgos_ambientales->color_riesgos_quema = self::color($riesgos_ambientales->va_riesgos_quema);
                        if ($riesgos_ambientales->control_riesgos_quema != "0") {
                            $riesgos_ambientales->val_residual_riesgos_quema = self::valRieRes($riesgos_ambientales->control_riesgos_quema);
                            $riesgos_ambientales->color_residual_riesgos_quema = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_quema);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_quema = "";
                            $riesgos_ambientales->color_residual_riesgos_quema = "";
                        }

                        $riesgos_ambientales->va_riesgos_auditivo = self::valorizacion($riesgos_ambientales->riesgos_auditivo, 3);
                        $riesgos_ambientales->color_riesgos_auditivo = self::color($riesgos_ambientales->va_riesgos_auditivo);
                        if ($riesgos_ambientales->control_riesgos_auditivo != "0") {
                            $riesgos_ambientales->val_residual_riesgos_auditivo = self::valRieRes($riesgos_ambientales->control_riesgos_auditivo);
                            $riesgos_ambientales->color_residual_riesgos_auditivo = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_auditivo);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_auditivo = "";
                            $riesgos_ambientales->color_residual_riesgos_auditivo = "";
                        }

                        $riesgos_ambientales->va_riesgos_recurso_hidrico = self::valorizacion($riesgos_ambientales->riesgos_recurso_hidrico, 1);
                        $riesgos_ambientales->color_riesgos_recurso_hidrico = self::color($riesgos_ambientales->va_riesgos_recurso_hidrico);
                        if ($riesgos_ambientales->control_riesgos_recurso_hidrico != "0") {
                            $riesgos_ambientales->val_residual_riesgos_recurso_hidrico = self::valRieRes($riesgos_ambientales->control_riesgos_recurso_hidrico);
                            $riesgos_ambientales->color_residual_riesgos_recurso_hidrico = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_recurso_hidrico);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_recurso_hidrico = "";
                            $riesgos_ambientales->color_residual_riesgos_recurso_hidrico = "";
                        }

                        $riesgos_ambientales->va_riesgos_acceso_agua = self::valorizacion($riesgos_ambientales->riesgos_acceso_agua, 1);
                        $riesgos_ambientales->color_riesgos_acceso_agua = self::color($riesgos_ambientales->va_riesgos_acceso_agua);
                        if ($riesgos_ambientales->control_riesgos_acceso_agua != "0") {
                            $riesgos_ambientales->val_residual_riesgos_acceso_agua = self::valRieRes($riesgos_ambientales->control_riesgos_acceso_agua);
                            $riesgos_ambientales->color_residual_riesgos_acceso_agua = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_acceso_agua);
                        } else {
                            $riesgos_ambientales->val_residual_riesgos_acceso_agua = "";
                            $riesgos_ambientales->color_residual_riesgos_acceso_agua = "";
                        }
                    }

                    // RIESGOS SOCIECONOMICOS
                    $riesgosSocieconomicos = $this->riesgosSocioeconomicos($IDHOGAR);

                    //CALCULAR RIESGOS//
                    $respuesta = [
                        'OPC' => 'SI',
                        'vivienda' => $vivienda,
                        'animales' => $animales,
                        'estratificacion' => $estratificacion,
                        'actividad_viviendas' => $actividad_viviendas,
                        'riesgos_ambientales' => $riesgos_ambientales,
                        'ValoresRiesgosAmbientales' => $ValoresRiesgosAmbientales,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña viviendas con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');

                    return response()->json($respuesta, 200);
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
                        $integrante = \App\Integrante::buscar($dataMen1A[$i]['identificacion'], Session::get('alias'));
                        $Men1Arespuesta = \App\Men1a::guardar($dataMen1A[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "Men1A", $dataMen1A[$i]['identificacion']);
                        //RIESGOS DE SALUD
                    }
                    // GUARDAR MENORES DE 1 AÑO

                    // GUARDAR DE 1 A 5
                    for ($i = 0; $i < count($dataDe1A5); $i++) {
                        $dataDe1A5[$i]['id_hogar'] = $IDHOGAR;
                        $De1a5respuesta = \App\De1a5::guardar($dataDe1A5[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De1A5", $dataDe1A5[$i]['identificacion']);
                        //RIESGOS DE SALUD
                    }
                    // GUARDAR DE 1 A 5

                    // GUARDAR DE 6 A 11
                    for ($i = 0; $i < count($dataDe6A11); $i++) {
                        $dataDe6A11[$i]['id_hogar'] = $IDHOGAR;
                        $De6a11respuesta = \App\De6a11::guardar($dataDe6A11[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De6A11", $dataDe6A11[$i]['identificacion']);
                        //RIESGOS DE SALUD
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

                    //TABLA MENORES DE 1 AÑO
                    $Men1A = \App\Men1a::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA MENORES DE 1 AÑO

                    //TABLA DE 1 A 5
                    $De1A5 = \App\De1a5::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 1 A 5

                    //TABLA DE 6 A 11
                    $De6A11 = \App\De6a11::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 6 A 11

                    //TABLA DE 10 A 59 AÑOS
                    $De10A59 = \App\De10a59::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 10 A 59 AÑOS

                    //TABLA PARPOST
                    $ParPost = \App\Parpost::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA PARPOST

                    // RIESGOS SALUD MEN1A
                    // $guardarInicial = \App\ValoresRiesgosSaludMEN1A::guardarInicial($IDHOGAR, Session::get('alias'));
                    $riesgos_salud_men1a = \App\RiesgosSaludMen1::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_men1a) {
                        foreach ($riesgos_salud_men1a as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);

                            $item->v_riesgos_desnutricion_aguda_I = $item->riesgos_desnutricion_aguda_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_I);
                            $item->v_riesgos_desnutricion_global_I = $item->riesgos_desnutricion_global_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_I);
                            $item->v_desnutricion_global_I = $item->desnutricion_global_I == 0 ? "" : self::valRieResSa($item->desnutricion_global_I);
                            $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                            $item->v_talla_baja_retraso_I = $item->talla_baja_retraso_I == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_I);
                            $item->v_desnutricion_aguda_moderada_I = $item->desnutricion_aguda_moderada_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_I);
                            $item->v_desnutricion_aguda_severa_I = $item->desnutricion_aguda_severa_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_I);
                            $item->v_riesgo_muerte_I = $item->riesgo_muerte_I == 0 ? "" : self::valRieResSa($item->riesgo_muerte_I);
                            $item->v_riesgo_sobrepeso_I = $item->riesgo_sobrepeso_I == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_I);
                            $item->v_sobrepeso_I = $item->sobrepeso_I == 0 ? "" : self::valRieResSa($item->sobrepeso_I);
                            $item->v_obesidad_I = $item->obesidad_I == 0 ? "" : self::valRieResSa($item->obesidad_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);

                            $item->c_riesgos_desnutricion_aguda_I = $item->v_riesgos_desnutricion_aguda_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_I);
                            $item->c_riesgos_desnutricion_global_I = $item->v_riesgos_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_I);
                            $item->c_desnutricion_global_I = $item->v_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_I);
                            $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                            $item->c_talla_baja_retraso_I = $item->v_talla_baja_retraso_I == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_I);
                            $item->c_desnutricion_aguda_moderada_I = $item->v_desnutricion_aguda_moderada_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_I);
                            $item->c_desnutricion_aguda_severa_I = $item->v_desnutricion_aguda_severa_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_I);
                            $item->c_riesgo_muerte_I = $item->v_riesgo_muerte_I == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_I);
                            $item->c_riesgo_sobrepeso_I = $item->v_riesgo_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_I);
                            $item->c_sobrepeso_I = $item->v_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_sobrepeso_I);
                            $item->c_obesidad_I = $item->v_obesidad_I == "" ? "" : self::colorRieResSa($item->v_obesidad_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgos_desnutricion_aguda_R = $item->riesgos_desnutricion_aguda_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_R);
                            $item->v_riesgos_desnutricion_global_R = $item->riesgos_desnutricion_global_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_R);
                            $item->v_desnutricion_global_R = $item->desnutricion_global_R == 0 ? "" : self::valRieResSa($item->desnutricion_global_R);
                            $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                            $item->v_talla_baja_retraso_R = $item->talla_baja_retraso_R == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_R);
                            $item->v_desnutricion_aguda_moderada_R = $item->desnutricion_aguda_moderada_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_R);
                            $item->v_desnutricion_aguda_severa_R = $item->desnutricion_aguda_severa_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_R);
                            $item->v_riesgo_muerte_R = $item->riesgo_muerte_R == 0 ? "" : self::valRieResSa($item->riesgo_muerte_R);
                            $item->v_riesgo_sobrepeso_R = $item->riesgo_sobrepeso_R == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_R);
                            $item->v_sobrepeso_R = $item->sobrepeso_R == 0 ? "" : self::valRieResSa($item->sobrepeso_R);
                            $item->v_obesidad_R = $item->obesidad_R == 0 ? "" : self::valRieResSa($item->obesidad_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgos_desnutricion_aguda_R = $item->v_riesgos_desnutricion_aguda_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_R);
                            $item->c_riesgos_desnutricion_global_R = $item->v_riesgos_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_R);
                            $item->c_desnutricion_global_R = $item->v_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_R);
                            $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                            $item->c_talla_baja_retraso_R = $item->v_talla_baja_retraso_R == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_R);
                            $item->c_desnutricion_aguda_moderada_R = $item->v_desnutricion_aguda_moderada_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_R);
                            $item->c_desnutricion_aguda_severa_R = $item->v_desnutricion_aguda_severa_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_R);
                            $item->c_riesgo_muerte_R = $item->v_riesgo_muerte_R == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_R);
                            $item->c_riesgo_sobrepeso_R = $item->v_riesgo_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_R);
                            $item->c_sobrepeso_R = $item->v_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_sobrepeso_R);
                            $item->c_obesidad_R = $item->v_obesidad_R == "" ? "" : self::colorRieResSa($item->v_obesidad_R);
                        }
                    }
                    $ValoresRiesgosSaludMen1a = \App\ValoresRiesgosSaludMEN1A::buscar(Session::get('alias'), $IDHOGAR);
                    // RIESGOS SALUD MEN1A

                    // RIESGOS SALUD DE1A5
                    // $guardarInicial = \App\ValoresRiesgosSaludDE1A5::guardarInicial($IDHOGAR, Session::get('alias'));
                    $riesgos_salud_de1a5 = \App\RiesgosSaludDe1a5::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de1a5) {
                        foreach ($riesgos_salud_de1a5 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);

                            $item->v_riesgos_desnutricion_aguda_I = $item->riesgos_desnutricion_aguda_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_I);
                            $item->v_riesgos_desnutricion_global_I = $item->riesgos_desnutricion_global_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_I);
                            $item->v_desnutricion_global_I = $item->desnutricion_global_I == 0 ? "" : self::valRieResSa($item->desnutricion_global_I);
                            $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                            $item->v_talla_baja_retraso_I = $item->talla_baja_retraso_I == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_I);
                            $item->v_desnutricion_aguda_moderada_I = $item->desnutricion_aguda_moderada_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_I);
                            $item->v_desnutricion_aguda_severa_I = $item->desnutricion_aguda_severa_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_I);
                            $item->v_riesgo_muerte_I = $item->riesgo_muerte_I == 0 ? "" : self::valRieResSa($item->riesgo_muerte_I);
                            $item->v_riesgo_sobrepeso_I = $item->riesgo_sobrepeso_I == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_I);
                            $item->v_sobrepeso_I = $item->sobrepeso_I == 0 ? "" : self::valRieResSa($item->sobrepeso_I);
                            $item->v_obesidad_I = $item->obesidad_I == 0 ? "" : self::valRieResSa($item->obesidad_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);

                            $item->c_riesgos_desnutricion_aguda_I = $item->v_riesgos_desnutricion_aguda_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_I);
                            $item->c_riesgos_desnutricion_global_I = $item->v_riesgos_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_I);
                            $item->c_desnutricion_global_I = $item->v_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_I);
                            $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                            $item->c_talla_baja_retraso_I = $item->v_talla_baja_retraso_I == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_I);
                            $item->c_desnutricion_aguda_moderada_I = $item->v_desnutricion_aguda_moderada_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_I);
                            $item->c_desnutricion_aguda_severa_I = $item->v_desnutricion_aguda_severa_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_I);
                            $item->c_riesgo_muerte_I = $item->v_riesgo_muerte_I == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_I);
                            $item->c_riesgo_sobrepeso_I = $item->v_riesgo_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_I);
                            $item->c_sobrepeso_I = $item->v_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_sobrepeso_I);
                            $item->c_obesidad_I = $item->v_obesidad_I == "" ? "" : self::colorRieResSa($item->v_obesidad_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgos_desnutricion_aguda_R = $item->riesgos_desnutricion_aguda_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_R);
                            $item->v_riesgos_desnutricion_global_R = $item->riesgos_desnutricion_global_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_R);
                            $item->v_desnutricion_global_R = $item->desnutricion_global_R == 0 ? "" : self::valRieResSa($item->desnutricion_global_R);
                            $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                            $item->v_talla_baja_retraso_R = $item->talla_baja_retraso_R == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_R);
                            $item->v_desnutricion_aguda_moderada_R = $item->desnutricion_aguda_moderada_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_R);
                            $item->v_desnutricion_aguda_severa_R = $item->desnutricion_aguda_severa_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_R);
                            $item->v_riesgo_muerte_R = $item->riesgo_muerte_R == 0 ? "" : self::valRieResSa($item->riesgo_muerte_R);
                            $item->v_riesgo_sobrepeso_R = $item->riesgo_sobrepeso_R == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_R);
                            $item->v_sobrepeso_R = $item->sobrepeso_R == 0 ? "" : self::valRieResSa($item->sobrepeso_R);
                            $item->v_obesidad_R = $item->obesidad_R == 0 ? "" : self::valRieResSa($item->obesidad_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgos_desnutricion_aguda_R = $item->v_riesgos_desnutricion_aguda_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_R);
                            $item->c_riesgos_desnutricion_global_R = $item->v_riesgos_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_R);
                            $item->c_desnutricion_global_R = $item->v_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_R);
                            $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                            $item->c_talla_baja_retraso_R = $item->v_talla_baja_retraso_R == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_R);
                            $item->c_desnutricion_aguda_moderada_R = $item->v_desnutricion_aguda_moderada_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_R);
                            $item->c_desnutricion_aguda_severa_R = $item->v_desnutricion_aguda_severa_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_R);
                            $item->c_riesgo_muerte_R = $item->v_riesgo_muerte_R == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_R);
                            $item->c_riesgo_sobrepeso_R = $item->v_riesgo_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_R);
                            $item->c_sobrepeso_R = $item->v_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_sobrepeso_R);
                            $item->c_obesidad_R = $item->v_obesidad_R == "" ? "" : self::colorRieResSa($item->v_obesidad_R);
                        }
                    }
                    $ValoresRiesgosSaludDe1a5 = \App\ValoresRiesgosSaludDE1A5::buscar(Session::get('alias'), $IDHOGAR);
                    // RIESGOS SALUD DE1A5

                    // RIESGOS SALUD DE6A11
                    $riesgos_salud_de6a11 = \App\RiesgosSaludDe6a11::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de6a11) {
                        foreach ($riesgos_salud_de6a11 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE6A11

                    $respuesta = [
                        'OPC' => 'SI',
                        'De10A59' => $De10A59,
                        'Men1A' => $Men1A,
                        'De1A5' => $De1A5,
                        'De6A11' => $De6A11,
                        'ParPost' => $ParPost,
                        'riesgos_salud_men1a' => $riesgos_salud_men1a,
                        'riesgos_salud_de1a5' => $riesgos_salud_de1a5,
                        'riesgos_salud_de6a11' => $riesgos_salud_de6a11,
                        'ValoresRiesgosSaludMen1a' => $ValoresRiesgosSaludMen1a,
                        'ValoresRiesgosSaludDe1a5' => $ValoresRiesgosSaludDe1a5,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña cart.X.ciclo con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');
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

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De12A17", $dataDe12A17[$i]['identificacion']);
                        //RIESGOS DE SALUD
                    }
                    // GUARDAR DE 12 A 17

                    // GUARDAR DE 18 A 28
                    for ($i = 0; $i < count($dataDe18A28); $i++) {
                        $dataDe18A28[$i]['id_hogar'] = $IDHOGAR;
                        $De18A28respuesta = \App\De18a28::guardar($dataDe18A28[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De18A28", $dataDe18A28[$i]['identificacion']);
                        //RIESGOS DE SALUD
                    }
                    // GUARDAR DE 18 A 28

                    // GUARDAR DE 29 A 59
                    for ($i = 0; $i < count($dataDe29A59); $i++) {
                        $dataDe29A59[$i]['id_hogar'] = $IDHOGAR;
                        $De29A59respuesta = \App\De29a59::guardar($dataDe29A59[$i], Session::get('alias'));

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De29A59", $dataDe29A59[$i]['identificacion']);
                        //RIESGOS DE SALUD
                    }
                    // GUARDAR DE 29 A 59
                    //TABLA DE 12 A 17
                    $De12A17 = \App\De12a17::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 12 A 17

                    //TABLA DE 18 A 28
                    $De18A28 = \App\De18a28::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 18 A 28

                    //TABLA DE 29 A 59
                    $De29A59 = \App\De29a59::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 29 A 59

                    // RIESGOS SALUD DE12A17
                    $riesgos_salud_de12a17 = \App\RiesgosSaludDe12a17::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de12a17) {
                        foreach ($riesgos_salud_de12a17 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE12A17

                    // RIESGOS SALUD DE18A28
                    $riesgos_salud_de18a28 = \App\RiesgosSaludDe18a28::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de18a28) {
                        foreach ($riesgos_salud_de18a28 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE18A28

                    // RIESGOS SALUD DE29A59
                    $riesgos_salud_de29a59 = \App\RiesgosSaludDe29a59::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de29a59) {
                        foreach ($riesgos_salud_de29a59 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE29A59
                    $respuesta = [
                        'OPC' => 'SI',
                        'De12A17' => $De12A17,
                        'De18A28' => $De18A28,
                        'De29A59' => $De29A59,
                        'riesgos_salud_de12a17' => $riesgos_salud_de12a17,
                        'riesgos_salud_de18a28' => $riesgos_salud_de18a28,
                        'riesgos_salud_de29a59' => $riesgos_salud_de29a59,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Adolescentes/Jovenes con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');
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

                        //RIESGOS DE SALUD
                        $resultado = self::riesgoSalud($IDHOGAR, "De60", $dataDe60[$i]['identificacion']);
                        //RIESGOS DE SALUD
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
                    //TABLA DE 60
                    $De60 = \App\De60::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 60

                    //TABLA ENCRO
                    $EnCro = \App\Encro::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA ENCRO

                    //TABLA ENINF
                    $EnInf = \App\Eninf::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA ENINF

                    // RIESGOS SALUD DE60
                    $riesgos_salud_de60 = \App\RiesgosSaludDe60::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_salud_de60) {
                        foreach ($riesgos_salud_de60 as $item) {
                            $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                            $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                            $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                            $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                            $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                            $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                            $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                            $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                            $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                            $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                            $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                            $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                            $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                            $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                            $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                            $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                            $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                            $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                            $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                            $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                            $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                            $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                            $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                            $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                            $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                            $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                            $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                            $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                            $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                            $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                            $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                            $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                            $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                            $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                            $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                            $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                            $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                            $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                            $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                            $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                            $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                            $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                            $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                            $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                            $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                            $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                            $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                            $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                            $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                            $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                            $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                            $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                            $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                            $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                            $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                            $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
                        }
                    }
                    // RIESGOS SALUD DE60
                    $respuesta = [
                        'OPC' => 'SI',
                        'De60' => $De60,
                        'EnCro' => $EnCro,
                        'EnInf' => $EnInf,
                        'riesgos_salud_de60' => $riesgos_salud_de60,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Adulto mayor con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');
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
                    //TABLA Migra
                    $Migra = \App\Migra::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA Migra
                    $respuesta = [
                        'OPC' => 'SI',
                        'Migra' => $Migra,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Migrante con id_hogar  = " . $IDHOGAR, Session::get('alias'), 'CARACTERIZACION');

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
        // RIEZGOS AMBIENTALES
        $resultado = self::riesgosAmbientales($id_hogar);
        // RIEZGOS AMBIENTALES
        return $resultado;
    }

    public function riesgosAmbientales($id_hogar)
    {
        $respuvivi = \App\Vivienda::buscar(Session::get('alias'), $id_hogar);
        $respuhogar = \App\Hogar::buscar(Session::get('alias'), $id_hogar);

        // Riesgos de  Derrumbes
        // Estructura de la vivienda y condiciones del entorno que facilitan el riesgos de derrumbes

        $rTRD = 0;
        // PREGUNTA 1
        $rP1 = 0;
        $pI1 = "";
        switch ($respuvivi->tipo_vivienda) {
            case "1":
                // OPCION NO APLICA
                $rP1 = 0;
                $pI1 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION CASA
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION CASA
                break;
            case "3":
                // OPCION APARTAMENTO
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION APARTAMENTO
                break;
            case "4":
                // OPCION FINCA
                $impacto = 2;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION FINCA
                break;
            case "5":
                // OPCION VIVIENDA INDIGENA
                $impacto = 2;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION VIVIENDA INDIGENA
                break;
            case "6":
                // OPCION IMPROVISADA
                $impacto = 3;
                $rP1 = 3;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION IMPROVISADA
                break;
            case "7":
                // OPCION IMPROVISADA
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION IMPROVISADA
                break;

        }
        // PREGUNTA 1

        // PREGUNTA 2
        $rP2 = 0;
        $pI2 = "";
        switch ($respuvivi->tipo_estructura) {
            case "1":
                // OPCION NO APLICA
                $rP2 = 0;
                $pI2 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION CONCRETO
                $impacto = 1;
                $rP2 = 1;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 2) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION CONCRETO
                break;
            case "3":
                // OPCION LADRILLO Ó BLOQUE
                $impacto = 1;
                $rP2 = 2;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 2) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION LADRILLO Ó BLOQUE
                break;
            case "4":
                // OPCION MADERA
                $impacto = 1;
                $rP2 = 2;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 2) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION MADERA
                break;
            case "5":
                // OPCION OTRO
                $impacto = 3;
                $rP2 = 3;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 2) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION OTRO
                break;
        }
        // PREGUNTA 2

        // PREGUNTA 5
        $rP3 = 0;
        $pI3 = "";
        switch ($respuvivi->evento_afecta_vivienda) {
            case "1":
                // OPCION NO APLICA
                $rP3 = 0;
                $pI3 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION INUNDACION
                $impacto = 2;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION INUNDACION
                break;
            case "3":
                // OPCION ARROYO
                $impacto = 1;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION ARROYO
                break;
            case "4":
                // OPCION OLEAJE FUERTE
                $impacto = 2;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION OLEAJE FUERTE
                break;
            case "5":
                // OPCION DESLIZAMIENTO
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION DESLIZAMIENTO
                break;
            case "6":
                // OPCION NINGUNO
                $impacto = 0;
                $rP3 = 0;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION NINGUNO
                break;
        }
        // PREGUNTA 5

        // PREGUNTA 36
        $rP4 = 0;
        $pI4 = "";
        switch ($respuvivi->zona_alto_riesgo) {
            case "0":
                // OPCION NO APLICA
                $rP4 = 0;
                $pI4 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION LADERA
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 2) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION LADERA
                break;
            case "2":
                // OPCION CUERPOS DE AGUA
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 2) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION CUERPOS DE AGUA
                break;
            case "3":
                // OPCION SUELO
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 2) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION SUELO
                break;
            case "4":
                // OPCION NINGUNA
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 2) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION NINGUNA
                break;
        }
        // PREGUNTA 36

        // PREGUNTA 51
        $rP5 = 0;
        $pI5 = "";
        switch ($respuvivi->desplazamientos) {
            case "NA":
                // OPCION NO APLICA
                $rP5 = 0;
                $pI5 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION MAS DE 2 VECES AL AÑO
                $impacto = 3;
                $rP5 = 3;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 2) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION MAS DE 2 VECES AL AÑO
                break;
            case "2":
                // OPCION AL MENOS UNA VEZ AL AÑO
                $impacto = 2;
                $rP5 = 2;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 2) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION AL MENOS UNA VEZ AL AÑO
                break;
            case "3":
                // OPCION UNA VEZ CADA DOS AÑOS
                $impacto = 1;
                $rP5 = 1;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 2) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION UNA VEZ CADA DOS AÑOS
                break;
            case "4":
                // OPCION NUNCA
                $impacto = 0;
                $rP5 = 0;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 2) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION NUNCA
                break;
        }
        // PREGUNTA 51

        // TOTAL RIESGO
        $rTRD = $rP1 + $rP2 + $rP3 + $rP4 + $rP5;
        // TOTAL RIESGO

        // Estructura de la vivienda y condiciones del entorno que facilitan el riesgos de derrumbes
        // Riesgos de  Derrumbes

        // Riesgos de inundación
        // Ubicación de la vivienda en zona de inundacion o pasos de arroyos

        $rTRI = 0;
        // PREGUNTA 5
        $rP1 = 0;
        $pI1 = "";
        switch ($respuvivi->evento_afecta_vivienda) {
            case "1":
                // OPCION NO APLICA
                $rP1 = 0;
                $pI1 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION Inundación
                $impacto = 3;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Inundación
                break;
            case "3":
                // OPCION Cuerpos de agua
                $impacto = 3;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Cuerpos de agua
                break;
            case "4":
                // OPCION Oleaje Fuerte
                $impacto = 0;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Oleaje Fuerte
                break;
            case "5":
                // OPCION Deslizamiento
                $impacto = 0;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Deslizamiento
                break;
            case "6":
                // OPCION Ninguno
                $impacto = 0;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 2.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Ninguno
                break;

        }
        // PREGUNTA 5

        // PREGUNTA 18
        $rP2 = 0;
        $pI2 = "";
        switch ($respuvivi->rio) {
            case "NA":
                // OPCION NO APLICA
                $rP2 = 0;
                $pI2 = "";
                // OPCION NO APLICA
                break;
            case "SI":
                // OPCION SI
                $rP2 = 0;
                $impacto = 3;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 2.5) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION SI
                break;
            case "NO":
                // OPCION NO
                $rP2 = 0;
                $pI2 = "";
                // OPCION NO
                break;
        }
        // PREGUNTA 18

        // PREGUNTA 36
        $rP3 = 0;
        $pI3 = "";
        switch ($respuvivi->zona_alto_riesgo) {
            case "0":
                // OPCION NO APLICA
                $rP3 = 0;
                $pI3 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Ladera
                $rP3 = 0;
                $impacto = 0;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2.5) / 9;
                $rP3 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION Ladera
                break;
            case "2":
                // OPCION Cuerpos de agua
                $rP3 = 3;
                $impacto = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2.5) / 9;
                $rP3 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION Cuerpos de agua
                break;
            case "3":
                // OPCION suelo inestable
                $rP3 = 0;
                $impacto = 0;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2.5) / 9;
                $rP3 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION suelo inestable
                break;
            case "4":
                // OPCION Ninguno
                $rP3 = 0;
                $impacto = 0;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2.5) / 9;
                $rP3 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION Ninguno
                break;
        }
        // PREGUNTA 36

        // PREGUNTA 57
        $rP4 = 0;
        $pI4 = "";
        switch ($respuvivi->veces_inundaciones) {
            case "NA":
                // OPCION NO APLICA
                $rP4 = 0;
                $pI4 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION MAS DE 2 VECES AL AÑO
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 2.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION MAS DE 2 VECES AL AÑO
                break;
            case "2":
                // OPCION AL MENOS UNA VEZ AL AÑO
                $impacto = 2;
                $rP4 = 2;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 2.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION AL MENOS UNA VEZ AL AÑO
                break;
            case "3":
                // OPCION UNA VEZ CADA DOS AÑOS
                $impacto = 1;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 2.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION UNA VEZ CADA DOS AÑOS
                break;
            case "4":
                // OPCION NUNCA
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 2.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION NUNCA
                break;
        }
        // PREGUNTA 57

        // TOTAL RIESGO
        $rTRI = $rP1 + $rP2 + $rP3 + $rP4;
        // TOTAL RIESGO

        // Ubicación de la vivienda en zona de inundacion o pasos de arroyos
        // Riesgos de inundación

        // Riesgos de insalubridad
        // Viviendas que presentas condicones que generan riesgos de insalubridad para el hogar y para la comunidad

        $rTRINSA = 0;
        // PREGUNTA 1
        $rP1 = 0;
        $pI1 = "";
        switch ($respuvivi->tipo_vivienda) {
            case "1":
                // OPCION NO APLICA
                $rP1 = 0;
                $pI1 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION CASA
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.65) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION CASA
                break;
            case "3":
                // OPCION APARTAMENTO
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.65) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION APARTAMENTO
                break;
            case "4":
                // OPCION FINCA
                $impacto = 2;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.65) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION FINCA
                break;
            case "5":
                // OPCION VIVIENDA INDIGENA
                $impacto = 2;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.65) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION VIVIENDA INDIGENA
                break;
            case "6":
                // OPCION IMPROVISADA
                $impacto = 3;
                $rP1 = 3;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.65) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION IMPROVISADA
                break;
            case "7":
                // OPCION LOTE
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.65) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION LOTE
                break;

        }
        // PREGUNTA 1

        // PREGUNTA 2
        $rP2 = 0;
        $pI2 = "";
        switch ($respuvivi->tipo_estructura) {
            case "1":
                // OPCION NO APLICA
                $rP2 = 0;
                $pI2 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION CONCRETO
                $impacto = 1;
                $rP2 = 1;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 1.65) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION CONCRETO
                break;
            case "3":
                // OPCION LADRILLO Ó BLOQUE
                $impacto = 2;
                $rP2 = 2;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 1.65) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION LADRILLO Ó BLOQUE
                break;
            case "4":
                // OPCION MADERA
                $impacto = 2;
                $rP2 = 2;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 1.65) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION MADERA
                break;
            case "5":
                // OPCION OTRO
                $impacto = 3;
                $rP2 = 3;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 1.65) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION OTRO
                break;
        }
        // PREGUNTA 2

        // PREGUNTA 3
        $rP3 = 0;
        $pI3 = "";
        switch ($respuvivi->material_predominante) {
            case "NA":
                // OPCION NO APLICA
                $rP3 = 0;
                $pI3 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION marmol
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.65) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION marmol
                break;
            case "2":
                // OPCION Cerámica
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.65) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Cerámica
                break;
            case "3":
                // OPCION Cemento
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.65) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Cemento
                break;
            case "4":
                // OPCION Madera
                $impacto = 2;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.65) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Madera
                break;
            case "5":
                // OPCION Tierra
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.65) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Tierra
                break;
            case "6":
                // OPCION Bolsa
                $impacto = 1;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.65) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Bolsa
                break;
            case "7":
                // OPCION Otro
                $impacto = 0;
                $rP3 = 0;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.65) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 3

        // PREGUNTA 4
        $rP4 = 0;
        $pI4 = "";
        switch ($respuvivi->tipo_cubierta) {
            case "1":
                // OPCION NO APLICA
                $rP4 = 0;
                $pI4 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION Material de Desecho Plastico
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.65) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Material de Desecho Plastico
                break;
            case "3":
                // OPCION Zinc
                $impacto = 1;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.65) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Zinc
                break;
            case "4":
                // OPCION Eternit
                $impacto = 1;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.65) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Eternit
                break;
            case "5":
                // OPCION Entre Piso
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.65) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Entre Piso
                break;
            case "6":
                // OPCION Teja de Barro
                $impacto = 1;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.65) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Teja de Barro
                break;
            case "7":
                // OPCION Placa Definitiva
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.65) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Placa Definitiva
                break;
            case "8":
                // OPCION Paja ó Palma
                $impacto = 2;
                $rP4 = 2;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.65) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Paja ó Palma
                break;
            case "9":
                // OPCION Otro
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.65) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 4

        // PREGUNTA 12
        $rP5 = 0;
        $pI5 = "";
        if ($respuvivi->energia_electrica == "SI") {
            $rP5 = $rP5 + 0.1;
        }
        if ($respuvivi->gas_natural == "SI") {
            $rP5 = $rP5 + 0;
        }
        if ($respuvivi->acueducto == "SI") {
            $rP5 = $rP5 + 0.6;
        }
        if ($respuvivi->alcantarillado == "SI") {
            $rP5 = $rP5 + 0.6;
        }
        if ($respuvivi->telefono_fijo == "SI") {
            $rP5 = $rP5 + 0;
        }
        if ($respuvivi->aseo == "SI") {
            $rP5 = $rP5 + 0.5;
        }
        if ($respuvivi->internet_subsidiado == "SI") {
            $rP5 = $rP5 + 0;
        }
        if ($respuvivi->internet_privado == "SI") {
            $rP5 = $rP5 + 0;
        }

        if ($rP5 < 0.6) {
            $rP5 = 1;
        } else {
            if ($rP5 >= 0.6 && $rP5 < 1.2) {
                $rP5 = 2;
            } else {
                $rP5 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP5;
        $rP5 = ($operacion * 1.8) / 9;
        $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 12

        // PREGUNTA 13
        $rP6 = 0;
        $pI6 = "";
        switch ($respuvivi->fuente_agua) {
            case "NA":
                // OPCION NO APLICA
                $rP6 = 0;
                $pI6 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Acueducto
                $impacto = 1;
                $rP6 = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.65) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Acueducto
                break;
            case "2":
                // OPCION Pozo con bomba
                $impacto = 1;
                $rP6 = 2;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.65) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Pozo con bomba
                break;
            case "3":
                // OPCION Laguna o jaguey
                $impacto = 3;
                $rP6 = 3;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.65) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Laguna o jaguey
                break;
            case "4":
                // OPCION Rio quebrada ó manantial
                $impacto = 1;
                $rP6 = 2;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.65) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Rio quebrada ó manantial
                break;
            case "5":
                // OPCION Aguas lluvias
                $impacto = 2;
                $rP6 = 2;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.65) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Aguas lluvias
                break;
            case "6":
                // OPCION Carro tanque
                $impacto = 1;
                $rP6 = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.65) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Carro tanque
                break;
            case "7":
                // OPCION Agua tratada envasada
                $impacto = 1;
                $rP6 = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.65) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Agua tratada envasada
                break;
            case "9":
                // OPCION Agua tratada envasada
                $impacto = 0;
                $rP6 = 0;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.65) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Agua tratada envasada
                break;
        }
        // PREGUNTA 13

        // PREGUNTA 16
        $rP7 = 0;
        $pI7 = "";
        switch ($respuvivi->tipo_tratamiento_agua) {
            case "NA":
                // OPCION NO APLICA
                $rP7 = 0;
                $pI7 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Clorada
                $impacto = 1;
                $rP7 = 1;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.65) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Clorada
                break;
            case "2":
                // OPCION Filtrada
                $impacto = 1;
                $rP7 = 1;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.65) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Filtrada
                break;
            case "3":
                // OPCION Hervida
                $impacto = 2;
                $rP7 = 2;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.65) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Hervida
                break;
            case "4":
                // OPCION Consume sin tratamiento
                $impacto = 3;
                $rP7 = 3;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.65) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Consume sin tratamiento
                break;
        }
        // PREGUNTA 16

        // PREGUNTA 17
        $rP8 = 0;
        $pI8 = "";
        switch ($respuvivi->destino_final_basura) {
            case "NA":
                // OPCION NO APLICA
                $rP8 = 0;
                $pI8 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Recolección y dispocisión en el aseo municipal
                $impacto = 1;
                $rP8 = 1;
                $operacion = $impacto * $rP8;
                if ($operacion < 3) {
                    $pI8 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI8 = "MEDIO";
                } else {
                    $pI8 = "ALTO";
                }

                $rP8 = ($operacion * 1.65) / 9;
                $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Recolección y dispocisión en el aseo municipal
                break;
            case "2":
                // OPCION Quemada
                $impacto = 2;
                $rP8 = 2;
                $operacion = $impacto * $rP8;
                if ($operacion < 3) {
                    $pI8 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI8 = "MEDIO";
                } else {
                    $pI8 = "ALTO";
                }

                $rP8 = ($operacion * 1.65) / 9;
                $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Quemada
                break;
            case "3":
                // OPCION Cielo Abierto
                $impacto = 2;
                $rP8 = 2;
                $operacion = $impacto * $rP8;
                if ($operacion < 3) {
                    $pI8 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI8 = "MEDIO";
                } else {
                    $pI8 = "ALTO";
                }

                $rP8 = ($operacion * 1.65) / 9;
                $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Cielo Abierto
                break;
            case "4":
                // OPCION Enterrada
                $impacto = 3;
                $rP8 = 3;
                $operacion = $impacto * $rP8;
                if ($operacion < 3) {
                    $pI8 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI8 = "MEDIO";
                } else {
                    $pI8 = "ALTO";
                }

                $rP8 = ($operacion * 1.65) / 9;
                $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Enterrada
                break;
            case "5":
                // OPCION Otro
                $impacto = 0;
                $rP8 = 0;
                $operacion = $impacto * $rP8;
                if ($operacion < 3) {
                    $pI8 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI8 = "MEDIO";
                } else {
                    $pI8 = "ALTO";
                }

                $rP8 = ($operacion * 1.65) / 9;
                $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 17

        // PREGUNTA 18
        $rP9 = 0;
        $pI9 = "";
        if ($respuvivi->porquerizas == "SI") {
            $rP9 = $rP9 + 0.2;
        }
        if ($respuvivi->plagas == "SI") {
            $rP9 = $rP9 + 0.4;
        }
        if ($respuvivi->industrias == "SI") {
            $rP9 = $rP9 + 0.1;
        }
        if ($respuvivi->malos_olores == "SI") {
            $rP9 = $rP9 + 0.3;
        }
        if ($respuvivi->rellenos == "SI") {
            $rP9 = $rP9 + 0.4;
        }
        if ($respuvivi->contaminacion_a == "SI") {
            $rP9 = $rP9 + 0;
        }
        if ($respuvivi->rio == "SI") {
            $rP9 = $rP9 + 0.1;
        }
        if ($respuvivi->avenidas_transitadas == "SI") {
            $rP9 = $rP9 + 0;
        }
        if ($respuvivi->lotes_abandonados == "SI") {
            $rP9 = $rP9 + 0.25;
        }

        if ($rP9 < 0.6) {
            $rP9 = 1;
        } else {
            if ($rP9 >= 0.6 && $rP9 < 1.2) {
                $rP9 = 2;
            } else {
                $rP9 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP9;
        $rP9 = ($operacion * 1.75) / 9;
        $rP9 = round($rP9, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 18

        // PREGUNTA 20
        $rP10 = 0;
        $pI10 = "";
        switch ($respuvivi->servicio_sanitario) {
            case "NA":
                // OPCION NO APLICA
                $rP10 = 0;
                $pI10 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION De Uso Exclusivo de las Personas de la Familia
                $impacto = 1;
                $rP10 = 1;
                $operacion = $impacto * $rP10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $rP10 = ($operacion * 1.65) / 9;
                $rP10 = round($rP10, 2, PHP_ROUND_HALF_UP);
                // OPCION De Uso Exclusivo de las Personas de la Familia
                break;
            case "2":
                // OPCION Compartida con Personas de Otras Familias
                $impacto = 3;
                $rP10 = 3;
                $operacion = $impacto * $rP10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $rP10 = ($operacion * 1.65) / 9;
                $rP10 = round($rP10, 2, PHP_ROUND_HALF_UP);
                // OPCION Compartida con Personas de Otras Familias
                break;
            case "3":
                // OPCION Sin servicio sanitario
                $impacto = 0;
                $rP10 = 0;
                $operacion = $impacto * $rP10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $rP10 = ($operacion * 1.65) / 9;
                $rP10 = round($rP10, 2, PHP_ROUND_HALF_UP);
                // OPCION Sin servicio sanitario
                break;
        }
        // PREGUNTA 20

        // PREGUNTA 22
        $rP11 = 0;
        $pI11 = "";
        switch ($respuvivi->excretas) {
            case "NA":
                // OPCION NO APLICA
                $rP11 = 0;
                $pI11 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Letrina
                $impacto = 3;
                $rP11 = 2;
                $operacion = $impacto * $rP11;
                if ($operacion < 3) {
                    $pI11 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI11 = "MEDIO";
                } else {
                    $pI11 = "ALTO";
                }

                $rP11 = ($operacion * 1.65) / 9;
                $rP11 = round($rP11, 2, PHP_ROUND_HALF_UP);
                // OPCION Letrina
                break;
            case "3":
                // OPCION Inodoro conectado a red de alcantarillado
                $impacto = 1;
                $rP11 = 1;
                $operacion = $impacto * $rP11;
                if ($operacion < 3) {
                    $pI11 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI11 = "MEDIO";
                } else {
                    $pI11 = "ALTO";
                }

                $rP11 = ($operacion * 1.65) / 9;
                $rP11 = round($rP11, 2, PHP_ROUND_HALF_UP);
                // OPCION Inodoro conectado a red de alcantarillado
                break;
            case "4":
                // OPCION Cuerpos de aguas
                $impacto = 3;
                $rP11 = 3;
                $operacion = $impacto * $rP11;
                if ($operacion < 3) {
                    $pI11 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI11 = "MEDIO";
                } else {
                    $pI11 = "ALTO";
                }

                $rP11 = ($operacion * 1.65) / 9;
                $rP11 = round($rP11, 2, PHP_ROUND_HALF_UP);
                // OPCION Cuerpos de aguas
                break;
            case "5":
                // OPCION Inododoro conectado a pozo séptico
                $impacto = 1;
                $rP11 = 1;
                $operacion = $impacto * $rP11;
                if ($operacion < 3) {
                    $pI11 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI11 = "MEDIO";
                } else {
                    $pI11 = "ALTO";
                }

                $rP11 = ($operacion * 1.65) / 9;
                $rP11 = round($rP11, 2, PHP_ROUND_HALF_UP);
                // OPCION Inododoro conectado a pozo séptico
                break;
            case "6":
                // OPCION Campo abierto
                $impacto = 3;
                $rP11 = 3;
                $operacion = $impacto * $rP11;
                if ($operacion < 3) {
                    $pI11 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI11 = "MEDIO";
                } else {
                    $pI11 = "ALTO";
                }

                $rP11 = ($operacion * 1.65) / 9;
                $rP11 = round($rP11, 2, PHP_ROUND_HALF_UP);
                // OPCION Campo abierto
                break;
            case "7":
                // OPCION otro
                $impacto = 0;
                $rP11 = 0;
                $operacion = $impacto * $rP11;
                if ($operacion < 3) {
                    $pI11 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI11 = "MEDIO";
                } else {
                    $pI11 = "ALTO";
                }

                $rP11 = ($operacion * 1.65) / 9;
                $rP11 = round($rP11, 2, PHP_ROUND_HALF_UP);
                // OPCION otro
                break;
        }
        // PREGUNTA 22

        // PREGUNTA 23
        $rP12 = 0;
        $pI12 = "";
        if ($respuvivi->cocina == "NO") {
            $rP12 = 3;
        }
        if ($respuvivi->dormitorio_a == "NO") {
            $rP12 = 3;
        }
        if ($respuvivi->sala == "NO") {
            $rP12 = 3;
        }
        if ($respuvivi->sanitario == "NO") {
            $rP12 = 3;
        }
        if ($respuvivi->lavadero == "NO") {
            $rP12 = 3;
        }
        $impacto = 2;
        $operacion = $impacto * $rP12;
        if ($operacion < 3) {
            $pI11 = "BAJO";
        } else if ($operacion >= 3 && $operacion < 7) {
            $pI11 = "MEDIO";
        } else {
            $pI11 = "ALTO";
        }

        $rP12 = ($operacion * 1.65) / 9;
        $rP12 = round($rP12, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 23

        // PREGUNTA 28
        $rP13 = 0;
        $pI13 = "";
        if ($respuvivi->residuos_aprovechables == "SI") {
            $rP13 = $rP13 + 0.55;
        }
        if ($respuvivi->residuos_organicos == "SI") {
            $rP13 = $rP13 + 0.55;
        }
        if ($respuvivi->residuos_no_aprovechables == "SI") {
            $rP13 = $rP13 + 0.55;
        }

        if ($rP13 < 0.55) {
            $rP13 = 1;
        } else {
            if ($rP13 >= 0.55 && $rP13 < 1.1) {
                $rP13 = 2;
            } else {
                $rP13 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP13;
        $rP13 = ($operacion * 1.65) / 9;
        $rP13 = round($rP13, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 28

        // PREGUNTA 37
        $rP14 = 0;
        $pI14 = "";
        $impacto = 0;
        if ($respuvivi->almacenamiento_residuos == "SI") {
            $rP14 = 1;
            $impacto = 1;
        } else {
            if ($respuvivi->almacenamiento_residuos == "NO") {
                $rP14 = 3;
                $impacto = 2;
            } else {
                $rP14 = 0;
                $impacto = 0;
            }
        }
        $operacion = $impacto * $rP14;
        $rP14 = ($operacion * 1.65) / 9;
        $rP14 = round($rP14, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 37

        // PREGUNTA 39
        $rP15 = 0;
        $pI15 = "";
        switch ($respuvivi->aguas_negras) {
            case "NUNCA":
                // OPCION NUNCA
                $impacto = 2;
                $pI15 = 1;
                $operacion = $impacto * $pI15;
                if ($operacion < 3) {
                    $pI15 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI15 = "MEDIO";
                } else {
                    $pI15 = "ALTO";
                }

                $pI15 = ($operacion * 1.65) / 9;
                $pI15 = round($pI15, 2, PHP_ROUND_HALF_UP);
                // OPCION NUNCA
                break;
            case "FRECUENTE":
                // OPCION FRECUENTE
                $impacto = 3;
                $pI15 = 3;
                $operacion = $impacto * $pI15;
                if ($operacion < 3) {
                    $pI15 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI15 = "MEDIO";
                } else {
                    $pI15 = "ALTO";
                }

                $pI15 = ($operacion * 1.65) / 9;
                $pI15 = round($pI15, 2, PHP_ROUND_HALF_UP);
                // OPCION FRECUENTE
                break;
            case "OCASIONAL":
                // OPCION OCASIONAL
                $impacto = 2;
                $pI15 = 2;
                $operacion = $impacto * $pI15;
                if ($operacion < 3) {
                    $pI15 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI15 = "MEDIO";
                } else {
                    $pI15 = "ALTO";
                }

                $pI15 = ($operacion * 1.65) / 9;
                $pI15 = round($pI15, 2, PHP_ROUND_HALF_UP);
                // OPCION OCASIONAL
                break;
        }
        // PREGUNTA 39

        // TOTAL RIESGO
        $rTRINSA = $rP1 + $rP2 + $rP3 + $rP4 + $rP5 + $rP6 + $rP7 + $rP8 + $rP9 + $rP10 + $rP11 + $rP12 + $rP13 + $rP14 + $rP15;
        // TOTAL RIESGO

        // Viviendas que presentas condicones que generan riesgos de insalubridad para el hogar y para la comunidad
        // Riesgos de insalubridad

        // Riesgo atmosferico
        // Condiciones ambientales brinda una mala calidad de aire

        $rTRATMO = 0;

        // PREGUNTA 1
        $rP1 = 0;
        $pI1 = "";
        switch ($respuvivi->material_predominante) {
            case "NA":
                // OPCION NO APLICA
                $rP1 = 0;
                $pI1 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION marmol
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION marmol
                break;
            case "2":
                // OPCION Cerámica
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Cerámica
                break;
            case "3":
                // OPCION Cemento
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Cemento
                break;
            case "4":
                // OPCION Madera
                $impacto = 1;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Madera
                break;
            case "5":
                // OPCION Tierra
                $impacto = 3;
                $rP1 = 3;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Tierra
                break;
            case "6":
                // OPCION Bolsa
                $impacto = 1;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Bolsa
                break;
            case "7":
                // OPCION Otro
                $impacto = 0;
                $rP1 = 0;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 1

        // PREGUNTA 2
        $rP2 = 0;
        $pI2 = "";
        if ($respuvivi->energia_electrica == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->gas_natural == "SI") {
            $rP2 = $rP2 + 0.2;
        }
        if ($respuvivi->acueducto == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->alcantarillado == "SI") {
            $rP2 = $rP2 + 0.4;
        }
        if ($respuvivi->telefono_fijo == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->aseo == "SI") {
            $rP2 = $rP2 + 0.4;
        }
        if ($respuvivi->internet_subsidiado == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->internet_privado == "SI") {
            $rP2 = $rP2 + 0;
        }

        if ($rP2 < 0.33) {
            $rP2 = 1;
        } else {
            if ($rP2 >= 0.33 && $rP2 < 0.66) {
                $rP2 = 2;
            } else {
                $rP2 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP2;
        $rP2 = ($operacion * 1) / 9;
        $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 2

        // PREGUNTA 3
        $rP3 = 0;
        $pI3 = "";
        switch ($respuvivi->destino_final_basura) {
            case "NA":
                // OPCION NO APLICA
                $rP3 = 0;
                $pI3 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Recolección y dispocisión en el aseo municipal
                $impacto = 3;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Recolección y dispocisión en el aseo municipal
                break;
            case "2":
                // OPCION Quemada
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Quemada
                break;
            case "3":
                // OPCION Cielo Abierto
                $impacto = 2;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Cielo Abierto
                break;
            case "4":
                // OPCION Enterrada
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Enterrada
                break;
            case "5":
                // OPCION Otro
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 3

        // PREGUNTA 18
        $rP4 = 0;
        $pI4 = "";
        if ($respuvivi->porquerizas == "SI") {
            $rP4 = $rP4 + 0.2;
        }
        if ($respuvivi->plagas == "SI") {
            $rP4 = $rP4 + 0;
        }
        if ($respuvivi->industrias == "SI") {
            $rP4 = $rP4 + 0.5;
        }
        if ($respuvivi->malos_olores == "SI") {
            $rP4 = $rP4 + 0;
        }
        if ($respuvivi->rellenos == "SI") {
            $rP4 = $rP4 + 0.2;
        }
        if ($respuvivi->contaminacion_a == "SI") {
            $rP4 = $rP4 + 0;
        }
        if ($respuvivi->rio == "SI") {
            $rP4 = $rP4 + 0;
        }
        if ($respuvivi->avenidas_transitadas == "SI") {
            $rP4 = $rP4 + 0;
        }
        if ($respuvivi->lotes_abandonados == "SI") {
            $rP4 = $rP4 + 0.1;
        }

        if ($rP4 < 0.33) {
            $rP4 = 1;
        } else {
            if ($rP4 >= 0.33 && $rP4 < 0.66) {
                $rP4 = 2;
            } else {
                $rP4 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP4;
        $rP4 = ($operacion * 1) / 9;
        $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 18

        // PREGUNTA 22
        $rP5 = 0;
        $pI5 = "";
        switch ($respuvivi->excretas) {
            case "NA":
                // OPCION NO APLICA
                $rP5 = 0;
                $pI5 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Letrina
                $impacto = 2;
                $rP5 = 2;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 1) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION Letrina
                break;
            case "3":
                // OPCION Inodoro conectado a red de alcantarillado
                $impacto = 1;
                $rP5 = 1;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 1) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION Inodoro conectado a red de alcantarillado
                break;
            case "4":
                // OPCION Cuerpos de aguas
                $impacto = 2;
                $rP5 = 2;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 1) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION Cuerpos de aguas
                break;
            case "5":
                // OPCION Inododoro conectado a pozo séptico
                $impacto = 1;
                $rP5 = 1;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 1) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION Inododoro conectado a pozo séptico
                break;
            case "6":
                // OPCION Campo abierto
                $impacto = 3;
                $rP5 = 3;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 1) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION Campo abierto
                break;
            case "7":
                // OPCION otro
                $impacto = 1;
                $rP5 = 1;
                $operacion = $impacto * $rP5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $rP5 = ($operacion * 1) / 9;
                $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
                // OPCION otro
                break;
        }
        // PREGUNTA 22

        // PREGUNTA 26
        $rP6 = 0;
        $pI6 = "";
        switch ($respuvivi->tipo_explotacion) {
            case "NA":
                // OPCION NO APLICA
                $rP6 = 0;
                $pI6 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Forestal
                $impacto = 2;
                $rP6 = 3;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Forestal
                break;
            case "2":
                // OPCION Ganadería
                $impacto = 2;
                $rP6 = 2;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Ganadería
                break;
            case "3":
                // OPCION Agricultura
                $impacto = 2;
                $rP6 = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Agricultura
                break;
            case "4":
                // OPCION Urbanístico
                $impacto = 2;
                $rP6 = 0;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Urbanístico
                break;
            case "5":
                // OPCION Otro
                $impacto = 2;
                $rP6 = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;

        }
        // PREGUNTA 26

        // PREGUNTA 28
        $rP7 = 0;
        $pI7 = "";
        if ($respuvivi->residuos_aprovechables == "SI") {
            $rP7 = $rP7 + 0.33;
        }
        if ($respuvivi->residuos_organicos == "SI") {
            $rP7 = $rP7 + 0.33;
        }
        if ($respuvivi->residuos_no_aprovechables == "SI") {
            $rP7 = $rP7 + 0.33;
        }

        if ($rP7 < 0.33) {
            $rP7 = 1;
        } else {
            if ($rP7 >= 0.33 && $rP7 < 0.66) {
                $rP7 = 2;
            } else {
                $rP7 = 3;
            }
        }
        $impacto = 2;
        $operacion = $impacto * $rP7;
        $rP7 = ($operacion * 1) / 9;
        $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 28

        // PREGUNTA 29
        $rP8 = 0;
        $pI8 = "";
        switch ($respuhogar->vias_acceso) {
            case "0":
                // OPCION NO APLICA
                $rP8 = 0;
                $pI8 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Pavimentadas
                $impacto = 1;
                $rP8 = 1;
                $operacion = $impacto * $rP8;
                if ($operacion < 3) {
                    $pI8 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI8 = "MEDIO";
                } else {
                    $pI8 = "ALTO";
                }

                $rP8 = ($operacion * 1) / 9;
                $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Pavimentadas
                break;
            case "2":
                // OPCION Placa huella
                $impacto = 1;
                $rP8 = 1;
                $operacion = $impacto * $rP8;
                if ($operacion < 3) {
                    $pI8 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI8 = "MEDIO";
                } else {
                    $pI8 = "ALTO";
                }

                $rP8 = ($operacion * 1) / 9;
                $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Placa huella
                break;
            case "3":
                // OPCION Sin pavimentar
                $impacto = 3;
                $rP8 = 3;
                $operacion = $impacto * $rP8;
                if ($operacion < 3) {
                    $pI8 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI8 = "MEDIO";
                } else {
                    $pI8 = "ALTO";
                }

                $rP8 = ($operacion * 1) / 9;
                $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Sin pavimentar
                break;
        }
        // PREGUNTA 29

        // PREGUNTA 33
        $rP9 = 0;
        $pI9 = "";
        switch ($respuvivi->tipo_combustible) {
            case "NA":
                // OPCION NO APLICA
                $rP9 = 0;
                $pI9 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Luz eléctrica
                $impacto = 1;
                $rP9 = 1;
                $operacion = $impacto * $rP9;
                if ($operacion < 3) {
                    $pI9 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI9 = "MEDIO";
                } else {
                    $pI9 = "ALTO";
                }

                $rP9 = ($operacion * 1) / 9;
                $rP9 = round($rP9, 2, PHP_ROUND_HALF_UP);
                // OPCION Luz eléctrica
                break;
            case "2":
                // OPCION Gasolina
                $impacto = 2;
                $rP9 = 2;
                $operacion = $impacto * $rP9;
                if ($operacion < 3) {
                    $pI9 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI9 = "MEDIO";
                } else {
                    $pI9 = "ALTO";
                }

                $rP9 = ($operacion * 1) / 9;
                $rP9 = round($rP9, 2, PHP_ROUND_HALF_UP);
                // OPCION Gasolina
                break;
            case "3":
                // OPCION Leña
                $impacto = 3;
                $rP9 = 3;
                $operacion = $impacto * $rP9;
                if ($operacion < 3) {
                    $pI9 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI9 = "MEDIO";
                } else {
                    $pI9 = "ALTO";
                }

                $rP9 = ($operacion * 1) / 9;
                $rP9 = round($rP9, 2, PHP_ROUND_HALF_UP);
                // OPCION Leña
                break;
            case "4":
                // OPCION Carbón
                $impacto = 3;
                $rP9 = 3;
                $operacion = $impacto * $rP9;
                if ($operacion < 3) {
                    $pI9 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI9 = "MEDIO";
                } else {
                    $pI9 = "ALTO";
                }

                $rP9 = ($operacion * 1) / 9;
                $rP9 = round($rP9, 2, PHP_ROUND_HALF_UP);
                // OPCION Carbón
                break;
            case "5":
                // OPCION Gas natural
                $impacto = 0;
                $rP9 = 0;
                $operacion = $impacto * $rP9;
                if ($operacion < 3) {
                    $pI9 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI9 = "MEDIO";
                } else {
                    $pI9 = "ALTO";
                }

                $rP9 = ($operacion * 1) / 9;
                $rP9 = round($rP9, 2, PHP_ROUND_HALF_UP);
                // OPCION Gas natural
                break;
        }
        // PREGUNTA 33

        // PREGUNTA 39
        $rP10 = 0;
        $pI10 = "";
        switch ($respuvivi->aguas_negras) {
            case "NUNCA":
                // OPCION NUNCA
                $impacto = 1;
                $pI10 = 1;
                $operacion = $impacto * $pI10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $pI10 = ($operacion * 1) / 9;
                $pI10 = round($pI10, 2, PHP_ROUND_HALF_UP);
                // OPCION NUNCA
                break;
            case "FRECUENTE":
                // OPCION FRECUENTE
                $impacto = 3;
                $pI10 = 3;
                $operacion = $impacto * $pI10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $pI10 = ($operacion * 1) / 9;
                $pI10 = round($pI10, 2, PHP_ROUND_HALF_UP);
                // OPCION FRECUENTE
                break;
            case "OCASIONAL":
                // OPCION OCASIONAL
                $impacto = 2;
                $pI10 = 1;
                $operacion = $impacto * $pI10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $pI10 = ($operacion * 1) / 9;
                $pI10 = round($pI10, 2, PHP_ROUND_HALF_UP);
                // OPCION OCASIONAL
                break;
        }
        // PREGUNTA 39

        // TOTAL RIESGO
        $rTRATMO = $rP1 + $rP2 + $rP3 + $rP4 + $rP5 + $rP6 + $rP7 + $rP8 + $rP9 + $rP10;
        // TOTAL RIESGO
        // Condiciones ambientales brinda una mala calidad de aire
        // Riesgo atmosferico

        // Riesgos Recurso suelo
        // Actividades que generan la presencia de sustancias en el suelo que ocasionan  contaminación o alteracion y erosión del mismo

        $rTRrs = 0;

        // PREGUNTA 17
        $rP1 = 0;
        $pI1 = "";
        switch ($respuvivi->destino_final_basura) {
            case "NA":
                // OPCION NO APLICA
                $rP1 = 0;
                $pI1 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Recolección y dispocisión en el aseo municipal
                $impacto = 3;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Recolección y dispocisión en el aseo municipal
                break;
            case "2":
                // OPCION Quemada
                $impacto = 3;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Quemada
                break;
            case "3":
                // OPCION Cielo Abierto
                $impacto = 3;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Cielo Abierto
                break;
            case "4":
                // OPCION Enterrada
                $impacto = 3;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.5) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Enterrada
                break;
            case "5":
                // OPCION Otro
                $impacto = 3;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.5) / 9;
                $rP1 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 17

        // PREGUNTA 18
        $rP2 = 0;
        $pI2 = "";
        if ($respuvivi->porquerizas == "SI") {
            $rP2 = $rP2 + 0.2;
        }
        if ($respuvivi->plagas == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->industrias == "SI") {
            $rP2 = $rP2 + 0.4;
        }
        if ($respuvivi->malos_olores == "SI") {
            $rP2 = $rP2 + 0.2;
        }
        if ($respuvivi->rellenos == "SI") {
            $rP2 = $rP2 + 0.3;
        }
        if ($respuvivi->contaminacion_a == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->rio == "SI") {
            $rP2 = $rP2 + 0.15;
        }
        if ($respuvivi->avenidas_transitadas == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->lotes_abandonados == "SI") {
            $rP2 = $rP2 + 0.15;
        }

        if ($rP2 < 0.46) {
            $rP2 = 1;
        } else {
            if ($rP2 >= 0.46 && $rP2 < 0.9) {
                $rP2 = 2;
            } else {
                $rP2 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP2;
        $rP2 = ($operacion * 1.4) / 9;
        $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 18

        // PREGUNTA 22
        $rP3 = 0;
        $pI3 = "";
        switch ($respuvivi->excretas) {
            case "NA":
                // OPCION NO APLICA
                $rP3 = 0;
                $pI3 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Letrina
                $impacto = 2;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.4) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Letrina
                break;
            case "3":
                // OPCION Inodoro conectado a red de alcantarillado
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.4) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Inodoro conectado a red de alcantarillado
                break;
            case "4":
                // OPCION Cuerpos de aguas
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.4) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Cuerpos de aguas
                break;
            case "5":
                // OPCION Inododoro conectado a pozo séptico
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.4) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Inododoro conectado a pozo séptico
                break;
            case "6":
                // OPCION Campo abierto
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.4) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Campo abierto
                break;
            case "7":
                // OPCION otro
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.4) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION otro
                break;
        }
        // PREGUNTA 22

        // PREGUNTA 26
        $rP4 = 0;
        $pI4 = "";
        switch ($respuvivi->tipo_explotacion) {
            case "NA":
                // OPCION NO APLICA
                $rP4 = 0;
                $pI4 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Forestal
                $impacto = 1;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Forestal
                break;
            case "2":
                // OPCION Ganadería
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Ganadería
                break;
            case "3":
                // OPCION Agricultura
                $impacto = 2;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Agricultura
                break;
            case "4":
                // OPCION Urbanístico
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Urbanístico
                break;
            case "5":
                // OPCION Otro
                $impacto = 1;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.5) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;

        }
        // PREGUNTA 26

        // PREGUNTA 28
        $rP5 = 0;
        $pI5 = "";
        if ($respuvivi->residuos_aprovechables == "SI") {
            $rP5 = $rP5 + 0.35;
        }
        if ($respuvivi->residuos_organicos == "SI") {
            $rP5 = $rP5 + 0.35;
        }
        if ($respuvivi->residuos_no_aprovechables == "SI") {
            $rP5 = $rP5 + 0.35;
        }

        if ($rP5 < 0.35) {
            $rP5 = 1;
        } else {
            if ($rP5 >= 0.35 && $rP5 < 0.7) {
                $rP5 = 2;
            } else {
                $rP5 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP5;
        $rP5 = ($operacion * 1.4) / 9;
        $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 28

        // PREGUNTA 53
        $rP6 = 0;
        $pI6 = "";
        if ($respuvivi->emplea_fertilizantes == "SI") {
            $rP6 = 3;
        }
        $impacto = 3;
        $operacion = $impacto * $rP6;
        $rP6 = ($operacion * 1.4) / 9;
        $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 53

        // PREGUNTA 52
        $rP7 = 0;
        $pI7 = "";
        switch ($respuvivi->rotacion_cultivo) {
            case "NA":
                // OPCION NO APLICA
                $rP7 = 0;
                $pI7 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Permanentemente
                $impacto = 1;
                $rP7 = 1;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.4) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Permanentemente
                break;
            case "2":
                // OPCION Nunca
                $impacto = 3;
                $rP7 = 3;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.4) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Nunca
                break;
            case "3":
                // OPCION Ocasional
                $impacto = 2;
                $rP7 = 2;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.4) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Ocasional
                break;
            case "4":
                // OPCION Periódicamente
                $impacto = 1;
                $rP7 = 1;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.4) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Periódicamente
                break;
        }
        // PREGUNTA 52

        // TOTAL RIESGO
        $rTRrs = $rP1 + $rP2 + $rP3 + $rP4 + $rP5 + $rP6 + $rP7;
        // TOTAL RIESGO

        // Actividades que generan la presencia de sustancias en el suelo que ocasionan  contaminación o alteracion y erosión del mismo
        // Riesgos Recurso suelo

        // Riesgo por quemas o incendio
        // Actividadades que generan Riesgos de incendios en las viviendas

        $rTqi = 0;

        // PREGUNTA 1
        $rP1 = 0;
        $pI1 = "";
        switch ($respuvivi->tipo_vivienda) {
            case "1":
                // OPCION NO APLICA
                $rP1 = 0;
                $pI1 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION CASA
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 0.9) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION CASA
                break;
            case "3":
                // OPCION APARTAMENTO
                $impacto = 1;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 0.9) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION APARTAMENTO
                break;
            case "4":
                // OPCION FINCA
                $impacto = 2;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 0.9) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION FINCA
                break;
            case "5":
                // OPCION VIVIENDA INDIGENA
                $impacto = 2;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 0.9) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION VIVIENDA INDIGENA
                break;
            case "6":
                // OPCION IMPROVISADA
                $impacto = 3;
                $rP1 = 3;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 0.9) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION IMPROVISADA
                break;
            case "7":
                // OPCION LOTE
                $impacto = 3;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 0.9) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION LOTE
                break;

        }
        // PREGUNTA 1

        // PREGUNTA 2
        $rP2 = 0;
        $pI2 = "";
        switch ($respuvivi->tipo_estructura) {
            case "1":
                // OPCION NO APLICA
                $rP2 = 0;
                $pI2 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION CONCRETO
                $impacto = 1;
                $rP2 = 1;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 0.9) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION CONCRETO
                break;
            case "3":
                // OPCION LADRILLO Ó BLOQUE
                $impacto = 1;
                $rP2 = 1;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 0.9) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION LADRILLO Ó BLOQUE
                break;
            case "4":
                // OPCION MADERA
                $impacto = 3;
                $rP2 = 3;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 0.9) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION MADERA
                break;
            case "5":
                // OPCION OTRO
                $impacto = 1;
                $rP2 = 1;
                $operacion = $impacto * $rP2;
                if ($operacion < 3) {
                    $pI2 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI2 = "MEDIO";
                } else {
                    $pI2 = "ALTO";
                }

                $rP2 = ($operacion * 0.9) / 9;
                $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
                // OPCION OTRO
                break;
        }
        // PREGUNTA 2

        // PREGUNTA 3
        $rP3 = 0;
        $pI3 = "";
        switch ($respuvivi->material_predominante) {
            case "NA":
                // OPCION NO APLICA
                $rP3 = 0;
                $pI3 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION marmol
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 0.9) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION marmol
                break;
            case "2":
                // OPCION Cerámica
                $impacto = 2;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 0.9) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Cerámica
                break;
            case "3":
                // OPCION Cemento
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 0.9) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Cemento
                break;
            case "4":
                // OPCION Madera
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 0.9) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Madera
                break;
            case "5":
                // OPCION Tierra
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 0.9) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Tierra
                break;
            case "6":
                // OPCION Bolsa
                $impacto = 2;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 0.9) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Bolsa
                break;
            case "7":
                // OPCION Otro
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 0.9) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 3

        // PREGUNTA 4
        $rP4 = 0;
        $pI4 = "";
        switch ($respuvivi->tipo_cubierta) {
            case "1":
                // OPCION NO APLICA
                $rP4 = 0;
                $pI4 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION Material de Desecho Plastico
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Material de Desecho Plastico
                break;
            case "3":
                // OPCION Zinc
                $impacto = 2;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Zinc
                break;
            case "4":
                // OPCION Eternit
                $impacto = 2;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Eternit
                break;
            case "5":
                // OPCION Entre Piso
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Entre Piso
                break;
            case "6":
                // OPCION Teja de Barro
                $impacto = 2;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Teja de Barro
                break;
            case "7":
                // OPCION Placa Definitiva
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Placa Definitiva
                break;
            case "8":
                // OPCION Paja ó Palma
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Paja ó Palma
                break;
            case "9":
                // OPCION Otro
                $impacto = 0;
                $rP4 = 0;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 4

        // PREGUNTA 12
        $rP5 = 0;
        $pI5 = "";
        if ($respuvivi->energia_electrica == "SI") {
            $rP5 = $rP5 + 0.3;
        }
        if ($respuvivi->gas_natural == "SI") {
            $rP5 = $rP5 + 0.3;
        }
        if ($respuvivi->acueducto == "SI") {
            $rP5 = $rP5 + 0;
        }
        if ($respuvivi->alcantarillado == "SI") {
            $rP5 = $rP5 + 0;
        }
        if ($respuvivi->telefono_fijo == "SI") {
            $rP5 = $rP5 + 0;
        }
        if ($respuvivi->aseo == "SI") {
            $rP5 = $rP5 + 0.3;
        }
        if ($respuvivi->internet_subsidiado == "SI") {
            $rP5 = $rP5 + 0;
        }
        if ($respuvivi->internet_privado == "SI") {
            $rP5 = $rP5 + 0;
        }

        if ($rP5 < 0.3) {
            $rP5 = 1;
        } else {
            if ($rP5 >= 0.3 && $rP5 < 0.6) {
                $rP5 = 2;
            } else {
                $rP5 = 3;
            }
        }
        $impacto = 2;
        $operacion = $impacto * $rP5;
        $rP5 = ($operacion * 0.9) / 9;
        $rP5 = round($rP5, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 12

        // PREGUNTA 17
        $rP6 = 0;
        $pI6 = "";
        switch ($respuvivi->destino_final_basura) {
            case "NA":
                // OPCION NO APLICA
                $rP6 = 0;
                $pI6 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Recolección y dispocisión en el aseo municipal
                $impacto = 2;
                $rP6 = 2;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 0.9) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Recolección y dispocisión en el aseo municipal
                break;
            case "2":
                // OPCION Quemada
                $impacto = 3;
                $rP6 = 3;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 0.9) / 9;
                $rP6 = round($rP8, 2, PHP_ROUND_HALF_UP);
                // OPCION Quemada
                break;
            case "3":
                // OPCION Cielo Abierto
                $impacto = 2;
                $rP6 = 2;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 0.9) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Cielo Abierto
                break;
            case "4":
                // OPCION Enterrada
                $impacto = 1;
                $rP6 = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 0.9) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Enterrada
                break;
            case "5":
                // OPCION Otro
                $impacto = 1;
                $rP6 = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 0.9) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 17

        // PREGUNTA 23
        $rP7 = 0;
        $pI7 = "";
        if ($respuvivi->cocina == "NO") {
            $rP7 = $rP7 + 0.5;
        }
        if ($respuvivi->dormitorio_a == "NO") {
            $rP7 = $rP7 + 0.2;
        }
        if ($respuvivi->sala == "NO") {
            $rP7 = $rP7 + 0.2;
        }
        if ($respuvivi->sanitario == "NO") {
            $rP7 = $rP7 + 0;
        }
        if ($respuvivi->lavadero == "NO") {
            $rP7 = $rP7 + 0;
        }

        if ($rP7 < 0.2) {
            $rP7 = 1;
        } else {
            if ($rP7 >= 0.2 && $rP7 < 0.4) {
                $rP7 = 2;
            } else {
                $rP7 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP7;
        if ($operacion < 3) {
            $pI7 = "BAJO";
        } else if ($operacion >= 3 && $operacion < 7) {
            $pI7 = "MEDIO";
        } else {
            $pI7 = "ALTO";
        }

        $rP7 = ($operacion * 0.9) / 9;
        $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 23

        // PREGUNTA 25
        $rP8 = 0;
        $pI8 = "";
        if ($respuvivi->gasolina == "SI") {
            $rP8 = $rP8 + 0.4;
        }
        if ($respuvivi->plaguicidas == "SI") {
            $rP8 = $rP8 + 0.2;
        }
        if ($respuvivi->detergentes == "SI") {
            $rP8 = $rP8 + 0.1;
        }
        if ($respuvivi->plaguicidas_insectos == "SI") {
            $rP8 = $rP8 + 0.2;
        }

        if ($rP8 < 0.1) {
            $rP8 = 1;
        } else {
            if ($rP8 >= 0.1 && $rP8 < 0.3) {
                $rP8 = 2;
            } else {
                $rP8 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP8;
        if ($operacion < 3) {
            $pI8 = "BAJO";
        } else if ($operacion >= 3 && $operacion < 7) {
            $pI8 = "MEDIO";
        } else {
            $pI8 = "ALTO";
        }

        $rP8 = ($operacion * 0.9) / 9;
        $rP8 = round($rP8, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 25

        // PREGUNTA 28
        $rP9 = 0;
        $pI9 = "";
        if ($respuvivi->residuos_aprovechables == "SI") {
            $rP9 = $rP9 + 0.2;
        }
        if ($respuvivi->residuos_organicos == "SI") {
            $rP9 = $rP9 + 0.2;
        }
        if ($respuvivi->residuos_no_aprovechables == "SI") {
            $rP9 = $rP9 + 0.2;
        }

        if ($rP9 >= 0.2 && $rP9 < 0.4) {
            $rP9 = 1;
        } else {
            if ($rP9 >= 0.4 && $rP9 < 0.6) {
                $rP9 = 2;
            } else {
                $rP9 = 3;
            }
        }
        $impacto = 2;
        $operacion = $impacto * $rP9;
        $rP9 = ($operacion * 0.9) / 9;
        $rP9 = round($rP9, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 28

        // PREGUNTA 33
        $rP10 = 0;
        $pI10 = "";
        switch ($respuvivi->tipo_combustible) {
            case "NA":
                // OPCION NO APLICA
                $rP10 = 0;
                $pI10 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Luz eléctrica
                $impacto = 2;
                $rP10 = 2;
                $operacion = $impacto * $rP10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $rP10 = ($operacion * 0.9) / 9;
                $rP10 = round($rP10, 2, PHP_ROUND_HALF_UP);
                // OPCION Luz eléctrica
                break;
            case "2":
                // OPCION Gasolina
                $impacto = 3;
                $rP10 = 3;
                $operacion = $impacto * $rP10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $rP10 = ($operacion * 0.9) / 9;
                $rP10 = round($rP10, 2, PHP_ROUND_HALF_UP);
                // OPCION Gasolina
                break;
            case "3":
                // OPCION Leña
                $impacto = 3;
                $rP10 = 3;
                $operacion = $impacto * $rP10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $rP10 = ($operacion * 0.9) / 9;
                $rP10 = round($rP10, 2, PHP_ROUND_HALF_UP);
                // OPCION Leña
                break;
            case "4":
                // OPCION Carbón
                $impacto = 3;
                $rP10 = 3;
                $operacion = $impacto * $rP10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $rP10 = ($operacion * 0.9) / 9;
                $rP10 = round($rP10, 2, PHP_ROUND_HALF_UP);
                // OPCION Carbón
                break;
            case "5":
                // OPCION Gas natural
                $impacto = 2;
                $rP10 = 2;
                $operacion = $impacto * $rP10;
                if ($operacion < 3) {
                    $pI10 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI10 = "MEDIO";
                } else {
                    $pI10 = "ALTO";
                }

                $rP10 = ($operacion * 0.9) / 9;
                $rP10 = round($rP10, 2, PHP_ROUND_HALF_UP);
                // OPCION Gas natural
                break;
        }
        // PREGUNTA 33

        // PREGUNTA 55
        $rP11 = 0;
        $pI11 = "";
        $impacto = 0;
        if ($respuvivi->quema_cultivo == "SI") {
            $rP11 = 3;
            $impacto = 3;
        } else {
            $rP11 = 1;
            $impacto = 1;
        }

        $operacion = $impacto * $rP11;
        if ($operacion < 3) {
            $pI11 = "BAJO";
        } else if ($operacion >= 3 && $operacion < 7) {
            $pI11 = "MEDIO";
        } else {
            $pI11 = "ALTO";
        }

        $rP11 = ($operacion * 0.9) / 9;
        $rP11 = round($rP11, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 55

        // TOTAL RIESGO
        $rTqi = $rP1 + $rP2 + $rP3 + $rP4 + $rP5 + $rP6 + $rP7 + $rP8 + $rP9 + $rP10 + $rP11;
        // TOTAL RIESGO
        // Actividadades que generan Riesgos de incendios en las viviendas
        // Riesgo por quemas o incendio

        // Riesgo Auditivo
        $rTa = 0;
        // PREGUNTA 13
        $rP1 = 0;
        $pI1 = "";
        $impacto = 0;

        switch ($respuvivi->fuente_agua) {
            case "NA":
                // OPCION NO APLICA
                $rP1 = 0;
                $pI1 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Acueducto
                $impacto = 3;
                $rP1 = 0;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Acueducto
                break;
            case "2":
                // OPCION Pozo con bomba.
                $impacto = 3;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Pozo con bomba.
                break;
            case "3":
                // OPCION Laguna o jagüey.
                $impacto = 1;
                $rP1 = 0;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Laguna o jagüey.
                break;
            case "4":
                // OPCION Rio, quebrada o manantial.
                $impacto = 1;
                $rP1 = 0;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Rio, quebrada o manantial.
                break;
            case "5":
                // OPCION  Agua lluvias.
                $impacto = 1;
                $rP1 = 0;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION  Agua lluvias.
                break;
            case "6":
                // OPCION Carro Tanque.
                $impacto = 2;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Carro Tanque.
                break;
            case "7":
                // OPCION Agua Embotellada.
                $impacto = 0;
                $rP1 = 0;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION Agua Embotellada.
                break;
            case "9":
                // OPCION otro
                $impacto = 1;
                $rP1 = 0;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION otro
                break;
        }
        // PREGUNTA 13

        // PREGUNTA 18
        $rP2 = 0;
        $pI2 = "";
        if ($respuvivi->porquerizas == "SI") {
            $rP2 = $rP2 + 0.4;
        }
        if ($respuvivi->plagas == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->industrias == "SI") {
            $rP2 = $rP2 + 0.5;
        }
        if ($respuvivi->malos_olores == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->rellenos == "SI") {
            $rP2 = $rP2 + 0.5;
        }
        if ($respuvivi->contaminacion_a == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->rio == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->avenidas_transitadas == "SI") {
            $rP2 = $rP2 + 0.5;
        }
        if ($respuvivi->lotes_abandonados == "SI") {
            $rP2 = $rP2 + 0;
        }

        if ($rP2 < 0.6) {
            $rP2 = 1;
        } else {
            if ($rP2 >= 0.68 && $rP2 < 1.34) {
                $rP2 = 2;
            } else {
                $rP2 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP2;
        $rP2 = ($operacion * 3.4) / 9;
        $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 18

        // TOTAL RIESGO
        $rTa = $rP1 + $rP2;
        // TOTAL RIESGO
        // Riesgo Auditivo

        // Riesgo recurso Hidrico
        // Vertimiento o derrame de agua residuales
        $rTrh = 0;

        // PREGUNTA 12
        $rP1 = 0;
        $pI1 = "";
        if ($respuvivi->energia_electrica == "SI") {
            $rP1 = $rP1 + 0;
        }
        if ($respuvivi->gas_natural == "SI") {
            $rP1 = $rP1 + 0;
        }
        if ($respuvivi->acueducto == "SI") {
            $rP1 = $rP1 + 0.6;
        }
        if ($respuvivi->alcantarillado == "SI") {
            $rP1 = $rP1 + 0.6;
        }
        if ($respuvivi->telefono_fijo == "SI") {
            $rP1 = $rP1 + 0;
        }
        if ($respuvivi->aseo == "SI") {
            $rP1 = $rP1 + 0.4;
        }
        if ($respuvivi->internet_subsidiado == "SI") {
            $rP1 = $rP1 + 0;
        }
        if ($respuvivi->internet_privado == "SI") {
            $rP1 = $rP1 + 0;
        }

        if ($rP1 < 0.53) {
            $rP1 = 1;
        } else {
            if ($rP1 >= 0.53 && $rP1 < 1) {
                $rP1 = 2;
            } else {
                $rP1 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP1;
        $rP1 = ($operacion * 1.6) / 9;
        $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 12

        // PREGUNTA 18
        $rP2 = 0;
        $pI2 = "";
        if ($respuvivi->porquerizas == "SI") {
            $rP2 = $rP2 + 0.2;
        }
        if ($respuvivi->plagas == "SI") {
            $rP2 = $rP2 + 0.1;
        }
        if ($respuvivi->industrias == "SI") {
            $rP2 = $rP2 + 0.4;
        }
        if ($respuvivi->malos_olores == "SI") {
            $rP2 = $rP2 + 0.2;
        }
        if ($respuvivi->rellenos == "SI") {
            $rP2 = $rP2 + 0.2;
        }
        if ($respuvivi->contaminacion_a == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->rio == "SI") {
            $rP2 = $rP2 + 0.4;
        }
        if ($respuvivi->avenidas_transitadas == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->lotes_abandonados == "SI") {
            $rP2 = $rP2 + 0;
        }

        if ($rP2 < 0.53) {
            $rP2 = 1;
        } else {
            if ($rP2 >= 0.53 && $rP2 < 1) {
                $rP2 = 2;
            } else {
                $rP2 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP2;
        $rP2 = ($operacion * 1.6) / 9;
        $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 18

        // PREGUNTA 22
        $rP3 = 0;
        $pI3 = "";
        switch ($respuvivi->excretas) {
            case "NA":
                // OPCION NO APLICA
                $rP3 = 0;
                $pI3 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Letrina
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Letrina
                break;
            case "3":
                // OPCION Inodoro conectado a red de alcantarillado
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Inodoro conectado a red de alcantarillado
                break;
            case "4":
                // OPCION Cuerpos de aguas
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Cuerpos de aguas
                break;
            case "5":
                // OPCION Inododoro conectado a pozo séptico
                $impacto = 1;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Inododoro conectado a pozo séptico
                break;
            case "6":
                // OPCION Campo abierto
                $impacto = 3;
                $rP3 = 3;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Campo abierto
                break;
            case "7":
                // OPCION otro
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 2) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION otro
                break;
        }
        // PREGUNTA 22

        // PREGUNTA 28
        $rP4 = 0;
        $pI4 = "";
        if ($respuvivi->residuos_aprovechables == "SI") {
            $rP4 = $rP4 + 0.2;
        }
        if ($respuvivi->residuos_organicos == "SI") {
            $rP4 = $rP4 + 0.2;
        }
        if ($respuvivi->residuos_no_aprovechables == "SI") {
            $rP4 = $rP4 + 0.2;
        }

        if ($rP4 < 0.2) {
            $rP4 = 1;
        } else {
            if ($rP4 >= 0.2 && $rP4 < 0.4) {
                $rP4 = 2;
            } else {
                $rP4 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP4;
        $rP4 = ($operacion * 1.6) / 9;
        $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 28

        // PREGUNTA 39
        $rP5 = 0;
        $pI5 = "";
        switch ($respuvivi->aguas_negras) {
            case "NUNCA":
                // OPCION NUNCA
                $impacto = 1;
                $pI5 = 1;
                $operacion = $impacto * $pI5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $pI5 = ($operacion * 1.6) / 9;
                $pI5 = round($pI5, 2, PHP_ROUND_HALF_UP);
                // OPCION NUNCA
                break;
            case "FRECUENTE":
                // OPCION FRECUENTE
                $impacto = 3;
                $pI5 = 3;
                $operacion = $impacto * $pI5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $pI5 = ($operacion * 1.6) / 9;
                $pI5 = round($pI5, 2, PHP_ROUND_HALF_UP);
                // OPCION FRECUENTE
                break;
            case "OCASIONAL":
                // OPCION OCASIONAL
                $impacto = 2;
                $pI5 = 2;
                $operacion = $impacto * $pI5;
                if ($operacion < 3) {
                    $pI5 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI5 = "MEDIO";
                } else {
                    $pI5 = "ALTO";
                }

                $pI5 = ($operacion * 1.6) / 9;
                $pI5 = round($pI5, 2, PHP_ROUND_HALF_UP);
                // OPCION OCASIONAL
                break;
        }
        // PREGUNTA 39

        // PREGUNTA 56
        $rP6 = 0;
        $pI6 = "";
        switch ($respuvivi->mantenimiento_preventivo) {
            case "NA":
                // OPCION NO APLICA
                $rP6 = 0;
                $pI6 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Permanentemente
                $impacto = 3;
                $pI6 = 2;
                $operacion = $impacto * $pI6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $pI6 = ($operacion * 1.6) / 9;
                $pI6 = round($pI6, 2, PHP_ROUND_HALF_UP);
                // OPCION Permanentemente
                break;
            case "2":
                // OPCION Nunca
                $impacto = 1;
                $pI6 = 1;
                $operacion = $impacto * $pI6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $pI6 = ($operacion * 1.6) / 9;
                $pI6 = round($pI6, 2, PHP_ROUND_HALF_UP);
                // OPCION Nunca
                break;
            case "3":
                // OPCION Ocasional
                $impacto = 2;
                $pI6 = 2;
                $operacion = $impacto * $pI6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $pI6 = ($operacion * 1.6) / 9;
                $pI6 = round($pI6, 2, PHP_ROUND_HALF_UP);
                // OPCION Ocasional
                break;
            case "4":
                // OPCION Periódicamente
                $impacto = 1;
                $pI6 = 1;
                $operacion = $impacto * $pI6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $pI6 = ($operacion * 1.6) / 9;
                $pI6 = round($pI6, 2, PHP_ROUND_HALF_UP);
                // OPCION Periódicamente
                break;
        }
        // PREGUNTA 56
        // TOTAL RIESGO
        $rTrh = $rP1 + $rP2 + $rP3 + $rP4 + $rP5 + $rP6;
        // TOTAL RIESGO
        // Vertimiento o derrame de agua residuales k
        // Riesgo recurso Hidrico

        // Acceso a Agua Segura
        $rTAas = 0;
        // PREGUNTA 1
        $rP1 = 0;
        $pI1 = "";
        switch ($respuvivi->tipo_vivienda) {
            case "1":
                // OPCION NO APLICA
                $rP1 = 0;
                $pI1 = "";
                // OPCION NO APLICA
                break;
            case "2":
                // OPCION CASA
                $impacto = 3;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION CASA
                break;
            case "3":
                // OPCION APARTAMENTO
                $impacto = 3;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION APARTAMENTO
                break;
            case "4":
                // OPCION FINCA
                $impacto = 3;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION FINCA
                break;
            case "5":
                // OPCION VIVIENDA INDIGENA
                $impacto = 3;
                $rP1 = 2;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION VIVIENDA INDIGENA
                break;
            case "6":
                // OPCION IMPROVISADA
                $impacto = 3;
                $rP1 = 3;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION IMPROVISADA
                break;
            case "7":
                // OPCION lote
                $impacto = 3;
                $rP1 = 1;
                $operacion = $impacto * $rP1;
                if ($operacion < 3) {
                    $pI1 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI1 = "MEDIO";
                } else {
                    $pI1 = "ALTO";
                }

                $rP1 = ($operacion * 1.6) / 9;
                $rP1 = round($rP1, 2, PHP_ROUND_HALF_UP);
                // OPCION lote
                break;

        }
        // PREGUNTA 1

        // PREGUNTA 12
        $rP2 = 0;
        $pI2 = "";
        if ($respuvivi->energia_electrica == "SI") {
            $rP2 = $rP2 + 0.1;
        }
        if ($respuvivi->gas_natural == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->acueducto == "SI") {
            $rP2 = $rP2 + 1.2;
        }
        if ($respuvivi->alcantarillado == "SI") {
            $rP2 = $rP2 + 0.4;
        }
        if ($respuvivi->telefono_fijo == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->aseo == "SI") {
            $rP2 = $rP2 + 0.3;
        }
        if ($respuvivi->internet_subsidiado == "SI") {
            $rP2 = $rP2 + 0;
        }
        if ($respuvivi->internet_privado == "SI") {
            $rP2 = $rP2 + 0;
        }

        if ($rP2 < 0.53) {
            $rP2 = 1;
        } else {
            if ($rP2 >= 0.53 && $rP2 < 1) {
                $rP2 = 2;
            } else {
                $rP2 = 3;
            }
        }
        $impacto = 3;
        $operacion = $impacto * $rP2;
        $rP2 = ($operacion * 2) / 9;
        $rP2 = round($rP2, 2, PHP_ROUND_HALF_UP);
        // PREGUNTA 12

        // PREGUNTA 13
        $rP3 = 0;
        $pI3 = "";
        switch ($respuvivi->fuente_agua) {
            case "NA":
                // OPCION NO APLICA
                $rP3 = 0;
                $pI3 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Acueducto
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.6) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Acueducto
                break;
            case "2":
                // OPCION Pozo con bomba
                $impacto = 2;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.6) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Pozo con bomba
                break;
            case "3":
                // OPCION Laguna o jaguey
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.6) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Laguna o jaguey
                break;
            case "4":
                // OPCION Rio quebrada ó manantial
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.6) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Rio quebrada ó manantial
                break;
            case "5":
                // OPCION Aguas lluvias
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.6) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Aguas lluvias
                break;
            case "6":
                // OPCION Carro tanque
                $impacto = 2;
                $rP3 = 2;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.6) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Carro tanque
                break;
            case "7":
                // OPCION Agua tratada envasada
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.6) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Agua tratada envasada
                break;
            case "9":
                // OPCION Agua tratada envasada
                $impacto = 1;
                $rP3 = 1;
                $operacion = $impacto * $rP3;
                if ($operacion < 3) {
                    $pI3 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI3 = "MEDIO";
                } else {
                    $pI3 = "ALTO";
                }

                $rP3 = ($operacion * 1.6) / 9;
                $rP3 = round($rP3, 2, PHP_ROUND_HALF_UP);
                // OPCION Agua tratada envasada
                break;
        }
        // PREGUNTA 13

        // PREGUNTA 14
        $rP4 = 0;
        $pI4 = "";
        switch ($respuvivi->donde_almacena_agua) {
            case "NA":
                // OPCION NO APLICA
                $rP4 = 0;
                $pI4 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION No almacenan
                $impacto = 1;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.6) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION No almacenan
                break;
            case "2":
                // OPCION Tanque
                $impacto = 1;
                $rP4 = 2;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.6) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Tanque
                break;
            case "3":
                // OPCION Alberca
                $impacto = 3;
                $rP4 = 3;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.6) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Alberca
                break;
            case "4":
                // OPCION Planta acuatica
                $impacto = 1;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.6) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Planta acuatica
                break;
            case "5":
                // OPCION Otro
                $impacto = 1;
                $rP4 = 1;
                $operacion = $impacto * $rP4;
                if ($operacion < 3) {
                    $pI4 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI4 = "MEDIO";
                } else {
                    $pI4 = "ALTO";
                }

                $rP4 = ($operacion * 1.6) / 9;
                $rP4 = round($rP4, 2, PHP_ROUND_HALF_UP);
                // OPCION Otro
                break;
        }
        // PREGUNTA 14

        // PREGUNTA 15
        $rP6 = 0;
        $pI6 = "";
        switch ($respuvivi->ubicacion_tanque) {
            case "1":
                // OPCION Interior de la vivienda
                $impacto = 1;
                $rP6 = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.6) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Interior de la vivienda
                break;
            case "2":
                // OPCION Exterior de la vivienda bajo techo
                $impacto = 2;
                $rP6 = 2;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.6) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Exterior de la vivienda bajo techo
                break;
            case "3":
                // OPCION Exterior de la vivienda sin techo
                $impacto = 3;
                $rP6 = 3;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.6) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Exterior de la vivienda sin techo
                break;
            case "4":
                // OPCION Sobre el techo
                $impacto = 3;
                $rP6 = 2;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.6) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION Sobre el techo
                break;
            case "5":
                // OPCION NO APLICA
                $rP6 = 1;
                $pI6 = "";
                $impacto = 1;
                $operacion = $impacto * $rP6;
                if ($operacion < 3) {
                    $pI6 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI6 = "MEDIO";
                } else {
                    $pI6 = "ALTO";
                }

                $rP6 = ($operacion * 1.6) / 9;
                $rP6 = round($rP6, 2, PHP_ROUND_HALF_UP);
                // OPCION NO APLICA
                break;
        }
        // PREGUNTA 15

        // PREGUNTA 16
        $rP7 = 0;
        $pI7 = "";
        switch ($respuvivi->tipo_tratamiento_agua) {
            case "NA":
                // OPCION NO APLICA
                $rP7 = 0;
                $pI7 = "";
                // OPCION NO APLICA
                break;
            case "1":
                // OPCION Clorada
                $impacto = 1;
                $rP7 = 1;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.6) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Clorada
                break;
            case "2":
                // OPCION Filtrada
                $impacto = 1;
                $rP7 = 1;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.6) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Filtrada
                break;
            case "3":
                // OPCION Hervida
                $impacto = 2;
                $rP7 = 2;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.6) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Hervida
                break;
            case "4":
                // OPCION Consume sin tratamiento
                $impacto = 3;
                $rP7 = 3;
                $operacion = $impacto * $rP7;
                if ($operacion < 3) {
                    $pI7 = "BAJO";
                } else if ($operacion >= 3 && $operacion < 7) {
                    $pI7 = "MEDIO";
                } else {
                    $pI7 = "ALTO";
                }

                $rP7 = ($operacion * 1.6) / 9;
                $rP7 = round($rP7, 2, PHP_ROUND_HALF_UP);
                // OPCION Consume sin tratamiento
                break;
        }
        // PREGUNTA 16
        // TOTAL RIESGO
        $rTAas = $rP1 + $rP2 + $rP3 + $rP4 + $rP6 + $rP7;
        // TOTAL RIESGO

        // Acceso a Agua Segura

        // GUARDAR DATOS
        $datos["riesgos_derrumbes"] = $rTRD;
        $datos["riesgos_inundacion"] = $rTRI;
        $datos["riesgos_insalubridad"] = $rTRINSA;
        $datos["riesgos_atmosferico"] = $rTRATMO;
        $datos["riesgos_recurso_suelo"] = $rTRrs;
        $datos["riesgos_quema"] = $rTqi;
        $datos["riesgos_auditivo"] = $rTa;
        $datos["riesgos_recurso_hidrico"] = $rTrh;
        $datos["riesgos_acceso_agua"] = $rTAas;
        $datos["id_hogar"] = $id_hogar;
        $datos["estado"] = 'Activo';
        $guardar = \App\RiesgosAmbientales::guardar($datos, Session::get('alias'));
        // GUARDAR DATOS

        if ($guardar) {
            return 1;
        } else {
            return 1;
        }

    }

    public function eliminar()
    {
        if (Auth::check()) {
            $opcion = request()->get("opcion");

            $OPC = "";
            if ($opcion == "CARACTERIZACION") {
                $id = request()->get("id");
                $id_hogar = request()->get("id_hogar");
                $respuesta = \App\Hogar::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Caracterizacion::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Integrante::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Factores::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Afectacion::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Vivienda::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Men1a::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\De1a5::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\De6a11::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\De10a59::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Parpost::editarestado2("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\De12a17::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\De18a28::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\De29a59::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\De60::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Encro::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Eninf::editarestado("Inactivo", $id_hogar, Session::get('alias'));
                $respuesta = \App\Migra::editarestado("Inactivo", $id_hogar, Session::get('alias'));

                $gua = \App\Log::guardar("Eliminar la caracterizacion con id_hogar  = " . $id_hogar, Session::get('alias'), 'CARACTERIZACION');
                $OPC = "SI";
            }
            if ($opcion == "PARPOST") {
                $id_hogar = request()->get("id_hogar");
                //TABLA PARPOST
                $identificacion = request()->get("identificacion");
                $tabla = request()->get("tabla");
                $ParPost = \App\Parpost::editarestado("Inactivo", $identificacion, $tabla, Session::get('alias'));
                if ($ParPost) {
                    $OPC = "SI";
                } else {
                    $OPC = "NO";
                }
                //TABLA PARPOST
            }
            $respuesta = [
                'OPC' => $OPC,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function valorizacion($valor, $opc)
    {
        $valorizacion = "";
        if ($opc == 1) {
            if ($valor < 3) {
                $valorizacion = "Bajo";
            } else if ($valor >= 3 && $valor < 7) {
                $valorizacion = "Medio";
            } else {
                $valorizacion = "Alto";
            }
        } else {
            if ($opc == 2) {
                if ($valor < 5) {
                    $valorizacion = "Bajo";
                } else if ($valor >= 5 && $valor < 15) {
                    $valorizacion = "Medio";
                } else {
                    $valorizacion = "Alto";
                }
            } else {
                if ($valor < 1.6) {
                    $valorizacion = "Bajo";
                } else if ($valor >= 1.6 && $valor < 3.2) {
                    $valorizacion = "Medio";
                } else {
                    $valorizacion = "Alto";
                }
            }
        }
        return $valorizacion;
    }

    public function color($valor)
    {
        $color = "";
        if ($valor == "Bajo") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Medio") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }

    public function controlesRA()
    {
        if (Auth::check()) {
            $opcion = request()->get("opcion");
            $datosRA = request()->get("datosRA");
            $IDHOGAR = request()->get("IDHOGAR");
            $RieAmbInh = request()->get("RieAmbInh");

            $suma = 0;
            $media = 0;
            $inexistente = 1;
            $correctivo = 2;
            $preventivo = 3;

            // Riesgos de  Derrumbes
            if ($opcion == "RD") {
                $totalDivicion = 4;
                $control_entes_RD = self::valores($datosRA["control_entes_RD"]);
                if ($control_entes_RD != 0) {
                    $tipo_RD = self::valores2($datosRA["tipo_RD"]);
                } else {
                    $tipo_RD = 0;
                }
                $obras_ingenieria_RD = self::valores($datosRA["obras_ingenieria_RD"]);
                $proteccion_RD = self::valores($datosRA["proteccion_RD"]);
                $zona_vivienda_RD = self::valores($datosRA["zona_vivienda_RD"]);

                $suma = $suma + ($control_entes_RD * $tipo_RD);
                $suma = $suma + ($obras_ingenieria_RD * $preventivo);
                $suma = $suma + ($proteccion_RD * $preventivo);
                $suma = $suma + ($zona_vivienda_RD * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_derrumbes = self::valorizacion($RieAmbInh["riesgos_derrumbes"], 1);
                $va_riesgos_derrumbes = self::eficaciaControlRAVA(strtoupper($va_riesgos_derrumbes));

                $residual_riesgos_derrumbes = $va_riesgos_derrumbes / $media;
                $residual_riesgos_derrumbes = round($residual_riesgos_derrumbes, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_derrumbes = self::valRieRes($residual_riesgos_derrumbes);
                $color_residual_riesgos_derrumbes = self::colorRieRes($val_residual_riesgos_derrumbes);

                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_derrumbes", $residual_riesgos_derrumbes);
                $respuesta = [
                    'residual_riesgos_derrumbes' => $residual_riesgos_derrumbes,
                    'val_residual_riesgos_derrumbes' => $val_residual_riesgos_derrumbes,
                    'color_residual_riesgos_derrumbes' => $color_residual_riesgos_derrumbes,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RD", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Riesgos de  Derrumbes

            // Riesgos de inundación
            if ($opcion == "RI") {
                $totalDivicion = 5;
                $control_entes_RI = self::valores($datosRA["control_entes_RI"]);
                if ($control_entes_RI != 0) {
                    $tipo_RI = self::valores2($datosRA["tipo_RI"]);
                } else {
                    $tipo_RI = 0;
                }
                $gaviones_RI = self::valores($datosRA["gaviones_RI"]);
                $dragado_RI = self::valores($datosRA["dragado_RI"]);
                $barreras_RI = self::valores($datosRA["barreras_RI"]);
                $zona_vivienda_RI = self::valores($datosRA["zona_vivienda_RI"]);

                $suma = $suma + ($control_entes_RI * $tipo_RI);
                $suma = $suma + ($gaviones_RI * $preventivo);
                $suma = $suma + ($dragado_RI * $correctivo);
                $suma = $suma + ($barreras_RI * $preventivo);
                $suma = $suma + ($zona_vivienda_RI * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_inundacion = self::valorizacion($RieAmbInh["riesgos_inundacion"], 1);
                $va_riesgos_inundacion = self::eficaciaControlRAVA(strtoupper($va_riesgos_inundacion));

                $residual_riesgos_inundacion = $va_riesgos_inundacion / $media;
                $residual_riesgos_inundacion = round($residual_riesgos_inundacion, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_inundacion = self::valRieRes($residual_riesgos_inundacion);
                $color_residual_riesgos_inundacion = self::colorRieRes($val_residual_riesgos_inundacion);

                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_inundacion", $residual_riesgos_inundacion);
                $respuesta = [
                    'residual_riesgos_inundacion' => $residual_riesgos_inundacion,
                    'val_residual_riesgos_inundacion' => $val_residual_riesgos_inundacion,
                    'color_residual_riesgos_inundacion' => $color_residual_riesgos_inundacion,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RI", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Riesgos de inundación

            // Riesgos de insalubridad
            if ($opcion == "RIN") {
                $totalDivicion = 6;
                $sistema_recoleccion_RIN = self::valores($datosRA["sistema_recoleccion_RIN"]);
                $control_entes_RIN = self::valores($datosRA["control_entes_RIN"]);
                if ($control_entes_RIN != 0) {
                    $tipo_RIN = self::valores2($datosRA["tipo_RIN"]);
                } else {
                    $tipo_RIN = 0;
                }
                $control_plagas_RIN = self::valores($datosRA["control_plagas_RIN"]);
                $limpieza_RIN = self::valores($datosRA["limpieza_RIN"]);
                $tipo_tratamiento_RIN = self::valores($datosRA["tipo_tratamiento_RIN"]);
                $clasificacion_residuos_RIN = self::valores($datosRA["clasificacion_residuos_RIN"]);
                $suma = $suma + ($sistema_recoleccion_RIN * $preventivo);
                $suma = $suma + ($control_entes_RIN * $tipo_RIN);
                $suma = $suma + ($control_plagas_RIN * $preventivo);
                $suma = $suma + ($limpieza_RIN * $correctivo);
                $suma = $suma + ($tipo_tratamiento_RIN * $preventivo);
                $suma = $suma + ($clasificacion_residuos_RIN * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_insalubridad = self::valorizacion($RieAmbInh["riesgos_insalubridad"], 2);
                $va_riesgos_insalubridad = self::eficaciaControlRAVA(strtoupper($va_riesgos_insalubridad));

                $residual_riesgos_insalubridad = $va_riesgos_insalubridad / $media;
                $residual_riesgos_insalubridad = round($residual_riesgos_insalubridad, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_insalubridad = self::valRieRes($residual_riesgos_insalubridad);
                $color_residual_riesgos_insalubridad = self::colorRieRes($val_residual_riesgos_insalubridad);
                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_insalubridad", $residual_riesgos_insalubridad);
                $respuesta = [
                    'residual_riesgos_insalubridad' => $residual_riesgos_insalubridad,
                    'val_residual_riesgos_insalubridad' => $val_residual_riesgos_insalubridad,
                    'color_residual_riesgos_insalubridad' => $color_residual_riesgos_insalubridad,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RIN", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Riesgos de insalubridad

            // Riesgo atmosferico
            if ($opcion == "RA") {
                $totalDivicion = 4;
                $control_entes_RA = self::valores($datosRA["control_entes_RA"]);
                if ($control_entes_RA != 0) {
                    $tipo_RA = self::valores2($datosRA["tipo_RA"]);
                } else {
                    $tipo_RA = 0;
                }
                $humectacion_RA = self::valores($datosRA["humectacion_RA"]);
                $sistema_RA = self::valores($datosRA["sistema_RA"]);
                $concientizacion_RA = self::valores($datosRA["concientizacion_RA"]);

                $suma = $suma + ($control_entes_RA * $tipo_RA);
                $suma = $suma + ($humectacion_RA * $correctivo);
                $suma = $suma + ($sistema_RA * $correctivo);
                $suma = $suma + ($concientizacion_RA * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_atmosferico = self::valorizacion($RieAmbInh["riesgos_atmosferico"], 1);
                $va_riesgos_atmosferico = self::eficaciaControlRAVA(strtoupper($va_riesgos_atmosferico));

                $residual_riesgos_atmosferico = $va_riesgos_atmosferico / $media;
                $residual_riesgos_atmosferico = round($residual_riesgos_atmosferico, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_atmosferico = self::valRieRes($residual_riesgos_atmosferico);
                $color_residual_riesgos_atmosferico = self::colorRieRes($val_residual_riesgos_atmosferico);

                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_atmosferico", $residual_riesgos_atmosferico);
                $respuesta = [
                    'residual_riesgos_atmosferico' => $residual_riesgos_atmosferico,
                    'val_residual_riesgos_atmosferico' => $val_residual_riesgos_atmosferico,
                    'color_residual_riesgos_atmosferico' => $color_residual_riesgos_atmosferico,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RA", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Riesgo atmosferico

            // Riesgos Recurso suelo
            if ($opcion == "RRS") {
                $totalDivicion = 6;
                $control_entes_RRS = self::valores($datosRA["control_entes_RRS"]);
                if ($control_entes_RRS != 0) {
                    $tipo_RRS = self::valores2($datosRA["tipo_RRS"]);
                } else {
                    $tipo_RRS = 0;
                }
                $concientizacion_RRS = self::valores($datosRA["concientizacion_RRS"]);
                $mantenimiento_RRS = self::valores($datosRA["mantenimiento_RRS"]);
                $mantenimiento_solicitado_RRS = self::valores($datosRA["mantenimiento_solicitado_RRS"]);
                $fertilizantes_RRS = self::valores($datosRA["fertilizantes_RRS"]);
                $clasificacion_RRS = self::valores($datosRA["clasificacion_RRS"]);

                $suma = $suma + ($control_entes_RRS * $tipo_RRS);
                $suma = $suma + ($concientizacion_RRS * $preventivo);
                $suma = $suma + ($mantenimiento_RRS * $preventivo);
                $suma = $suma + ($mantenimiento_solicitado_RRS * $correctivo);
                $suma = $suma + ($fertilizantes_RRS * $correctivo);
                $suma = $suma + ($clasificacion_RRS * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_recurso_suelo = self::valorizacion($RieAmbInh["riesgos_recurso_suelo"], 1);
                $va_riesgos_recurso_suelo = self::eficaciaControlRAVA(strtoupper($va_riesgos_recurso_suelo));

                $residual_riesgos_recurso_suelo = $va_riesgos_recurso_suelo / $media;
                $residual_riesgos_recurso_suelo = round($residual_riesgos_recurso_suelo, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_recurso_suelo = self::valRieRes($residual_riesgos_recurso_suelo);
                $color_residual_riesgos_recurso_suelo = self::colorRieRes($val_residual_riesgos_recurso_suelo);

                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_recurso_suelo", $residual_riesgos_recurso_suelo);
                $respuesta = [
                    'residual_riesgos_recurso_suelo' => $residual_riesgos_recurso_suelo,
                    'val_residual_riesgos_recurso_suelo' => $val_residual_riesgos_recurso_suelo,
                    'color_residual_riesgos_recurso_suelo' => $color_residual_riesgos_recurso_suelo,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RRS", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Riesgos Recurso suelo

            // Riesgo por quemas o incendio
            if ($opcion == "RQ") {
                $totalDivicion = 6;
                $control_entes_RQ = self::valores($datosRA["control_entes_RQ"]);
                if ($control_entes_RQ != 0) {
                    $tipo_RQ = self::valores2($datosRA["tipo_RQ"]);
                } else {
                    $tipo_RQ = 0;
                }
                $concientizacion_RQ = self::valores($datosRA["concientizacion_RQ"]);
                $bomberos_RQ = self::valores($datosRA["bomberos_RQ"]);
                $servicio_programado_RQ = self::valores($datosRA["servicio_programado_RQ"]);
                $servicio_solicitud_RQ = self::valores($datosRA["servicio_solicitud_RQ"]);
                $aprovechamiento_RQ = self::valores($datosRA["aprovechamiento_RQ"]);

                $suma = $suma + ($control_entes_RQ * $tipo_RQ);
                $suma = $suma + ($concientizacion_RQ * $preventivo);
                $suma = $suma + ($bomberos_RQ * $correctivo);
                $suma = $suma + ($servicio_programado_RQ * $preventivo);
                $suma = $suma + ($servicio_solicitud_RQ * $preventivo);
                $suma = $suma + ($aprovechamiento_RQ * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_quema = self::valorizacion($RieAmbInh["riesgos_quema"], 1);
                $va_riesgos_quema = self::eficaciaControlRAVA(strtoupper($va_riesgos_quema));

                $residual_riesgos_quema = $va_riesgos_quema / $media;
                $residual_riesgos_quema = round($residual_riesgos_quema, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_quema = self::valRieRes($residual_riesgos_quema);
                $color_residual_riesgos_quema = self::colorRieRes($val_residual_riesgos_quema);
                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_quema", $residual_riesgos_quema);
                $respuesta = [
                    'residual_riesgos_quema' => $residual_riesgos_quema,
                    'val_residual_riesgos_quema' => $val_residual_riesgos_quema,
                    'color_residual_riesgos_quema' => $color_residual_riesgos_quema,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RQ", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Riesgo por quemas o incendio

            // Riesgo Auditivo
            if ($opcion == "RAU") {
                $totalDivicion = 5;
                $control_entes_RAU = self::valores($datosRA["control_entes_RAU"]);
                if ($control_entes_RAU != 0) {
                    $tipo_RAU = self::valores2($datosRA["tipo_RAU"]);
                } else {
                    $tipo_RAU = 0;
                }
                $regulacion_RAU = self::valores($datosRA["regulacion_RAU"]);
                $mediciones_RAU = self::valores($datosRA["mediciones_RAU"]);
                $zona_RAU = self::valores($datosRA["zona_RAU"]);
                $decibeles_RAU = self::valores($datosRA["decibeles_RAU"]);

                $suma = $suma + ($control_entes_RAU * $tipo_RAU);
                $suma = $suma + ($regulacion_RAU * $preventivo);
                $suma = $suma + ($mediciones_RAU * $correctivo);
                $suma = $suma + ($zona_RAU * $preventivo);
                $suma = $suma + ($decibeles_RAU * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_auditivo = self::valorizacion($RieAmbInh["riesgos_auditivo"], 1);
                $va_riesgos_auditivo = self::eficaciaControlRAVA(strtoupper($va_riesgos_auditivo));

                $residual_riesgos_auditivo = $va_riesgos_auditivo / $media;
                $residual_riesgos_auditivo = round($residual_riesgos_auditivo, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_auditivo = self::valRieRes($residual_riesgos_auditivo);
                $color_residual_riesgos_auditivo = self::colorRieRes($val_residual_riesgos_auditivo);

                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_auditivo", $residual_riesgos_auditivo);
                $respuesta = [
                    'residual_riesgos_auditivo' => $residual_riesgos_auditivo,
                    'val_residual_riesgos_auditivo' => $val_residual_riesgos_auditivo,
                    'color_residual_riesgos_auditivo' => $color_residual_riesgos_auditivo,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RAU", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Riesgo Auditivo

            // Riesgo recurso Hidrico
            if ($opcion == "RRH") {
                $totalDivicion = 7;
                $control_entes_RRH = self::valores($datosRA["control_entes_RRH"]);
                if ($control_entes_RRH != 0) {
                    $tipo_RRH = self::valores2($datosRA["tipo_RRH"]);
                } else {
                    $tipo_RRH = 0;
                }
                $concientizacion_RRH = self::valores($datosRA["concientizacion_RRH"]);
                $manejo_aguas_RRH = self::valores($datosRA["manejo_aguas_RRH"]);
                $programa_RRH = self::valores($datosRA["programa_RRH"]);
                $control_industrias_RRH = self::valores($datosRA["control_industrias_RRH"]);
                $mantenimiento_RRH = self::valores($datosRA["mantenimiento_RRH"]);
                $mantenimiento_captacion_RRH = self::valores($datosRA["mantenimiento_captacion_RRH"]);

                $suma = $suma + ($control_entes_RRH * $tipo_RRH);
                $suma = $suma + ($concientizacion_RRH * $preventivo);
                $suma = $suma + ($manejo_aguas_RRH * $preventivo);
                $suma = $suma + ($programa_RRH * $preventivo);
                $suma = $suma + ($control_industrias_RRH * $correctivo);
                $suma = $suma + ($mantenimiento_RRH * $preventivo);
                $suma = $suma + ($mantenimiento_captacion_RRH * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_recurso_hidrico = self::valorizacion($RieAmbInh["riesgos_recurso_hidrico"], 1);
                $va_riesgos_recurso_hidrico = self::eficaciaControlRAVA(strtoupper($va_riesgos_recurso_hidrico));

                $residual_riesgos_recurso_hidrico = $va_riesgos_recurso_hidrico / $media;
                $residual_riesgos_recurso_hidrico = round($residual_riesgos_recurso_hidrico, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_recurso_hidrico = self::valRieRes($residual_riesgos_recurso_hidrico);
                $color_residual_riesgos_recurso_hidrico = self::colorRieRes($val_residual_riesgos_recurso_hidrico);

                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_recurso_hidrico", $residual_riesgos_recurso_hidrico);
                $respuesta = [
                    'residual_riesgos_recurso_hidrico' => $residual_riesgos_recurso_hidrico,
                    'val_residual_riesgos_recurso_hidrico' => $val_residual_riesgos_recurso_hidrico,
                    'color_residual_riesgos_recurso_hidrico' => $color_residual_riesgos_recurso_hidrico,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RRH", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Riesgo recurso Hidrico
            if ($opcion == "RAA") {
                $totalDivicion = 5;
                $control_entes_RAA = self::valores($datosRA["control_entes_RAA"]);
                if ($control_entes_RAA != 0) {
                    $tipo_RRA = self::valores2($datosRA["tipo_RRA"]);
                } else {
                    $tipo_RRA = 0;
                }
                $tratamiento_RAA = self::valores($datosRA["tratamiento_RAA"]);
                $concientizacion_RAA = self::valores($datosRA["concientizacion_RAA"]);
                $sistema_RAA = self::valores($datosRA["sistema_RAA"]);
                $programa_RAA = self::valores($datosRA["programa_RAA"]);

                $suma = $suma + ($control_entes_RAA * $tipo_RRA);
                $suma = $suma + ($tratamiento_RAA * $correctivo);
                $suma = $suma + ($concientizacion_RAA * $preventivo);
                $suma = $suma + ($sistema_RAA * $preventivo);
                $suma = $suma + ($programa_RAA * $preventivo);

                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRA($media);

                $va_riesgos_acceso_agua = self::valorizacion($RieAmbInh["riesgos_acceso_agua"], 1);
                $va_riesgos_acceso_agua = self::eficaciaControlRAVA(strtoupper($va_riesgos_acceso_agua));

                $residual_riesgos_acceso_agua = $va_riesgos_acceso_agua / $media;
                $residual_riesgos_acceso_agua = round($residual_riesgos_acceso_agua, 2, PHP_ROUND_HALF_UP);
                $val_residual_riesgos_acceso_agua = self::valRieRes($residual_riesgos_acceso_agua);
                $color_residual_riesgos_acceso_agua = self::colorRieRes($val_residual_riesgos_acceso_agua);

                $riesgo = \App\RiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "control_riesgos_acceso_agua", $residual_riesgos_acceso_agua);
                $respuesta = [
                    'residual_riesgos_acceso_agua' => $residual_riesgos_acceso_agua,
                    'val_residual_riesgos_acceso_agua' => $val_residual_riesgos_acceso_agua,
                    'color_residual_riesgos_acceso_agua' => $color_residual_riesgos_acceso_agua,
                ];
                $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RAA", $datosRA);
                return response()->json($respuesta, 200);
            }
            // Acceso a Agua Segura

        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function valores($opcion)
    {
        $total = 0;
        switch ($opcion) {
            case "OCASIONAL":
                $total = 1;
                break;
            case "PERIODICO":
                $total = 2;
                break;
            case "PERMANENTE":
                $total = 3;
                break;
            case "NO":
                $total = 0;
                break;
        }
        return $total;
    }
    public function valores2($opcion)
    {
        $total = 0;
        switch ($opcion) {
            case "INEXISTENTE":
                $total = 1;
                break;
            case "CORRECTIVO":
                $total = 2;
                break;
            case "PREVENTIVO":
                $total = 3;
                break;
        }
        return $total;
    }

    public function eficaciaControlRA($valor)
    {
        $eficacia = "";
        $valoracion = 0;
        if ($valor >= 0 && $valor < 1) {
            $eficacia = "INEXISTENTE";
        } else {
            if ($valor >= 1 && $valor < 4) {
                $eficacia = "BAJO";
            } else {
                if ($valor >= 4 && $valor < 9) {
                    $eficacia = "MEDIO";
                } else {
                    $eficacia = "ALTO";
                }
            }
        }

        switch ($eficacia) {
            case "INEXISTENTE":
                $valoracion = 1;
                break;
            case "BAJO":
                $valoracion = 1;
                break;
            case "MEDIO":
                $valoracion = 2;
                break;
            case "ALTO":
                $valoracion = 3;
                break;
        }
        return $valoracion;
    }
    public function eficaciaControlRAVA($eficacia)
    {
        $valoracion = 0;
        switch ($eficacia) {
            case "INEXISTENTE":
                $valoracion = 1;
                break;
            case "BAJO":
                $valoracion = 1;
                break;
            case "MEDIO":
                $valoracion = 2;
                break;
            case "ALTO":
                $valoracion = 3;
                break;
        }
        return $valoracion;
    }
    public function valRieRes($valor)
    {
        $eficacia = "";
        if ($valor == 1) {
            $eficacia = "Bajo";
        } else {
            if ($valor == 2) {
                $eficacia = "Moderado";
            } else {
                $eficacia = "Alto";
            }
        }
        return $eficacia;
    }

    public function colorRieRes($valor)
    {
        $color = "";
        if ($valor == "Bajo") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Moderado") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }

    public function efectividad_control($valor)
    {
        $valorizacion = "";
    }

    public function buscarTablas()
    {
        if (Auth::check()) {
            $datos = request()->get("datos");
            $opcion = request()->get("opcion");
            switch ($opcion) {
                case "MENA1_PL":
                    $peso = $datos["peso"];
                    $talla = $datos["talla"];
                    $sexo = $datos["sexo"];

                    $peso_gramos = $peso * 1000;
                    $talla = round($talla, 1);
                    $array = [];
                    $resul = [];
                    $pes_lon = "";
                    $peso_longitud = false;
                    if ($sexo == "MASCULINO") {
                        $peso_longitud = \App\PesoLongNinos::buscar(Session::get('alias'), $talla);
                    } else {
                        $peso_longitud = \App\PesoLongNinas::buscar(Session::get('alias'), $talla);
                    }
                    if ($peso_longitud) {
                        // CREAR ARRAY DE DATOS
                        array_push($array, $peso_longitud->SD4neg);
                        array_push($array, $peso_longitud->SD3neg);
                        array_push($array, $peso_longitud->SD2neg);
                        array_push($array, $peso_longitud->SD1neg);
                        array_push($array, $peso_longitud->SD0);
                        array_push($array, $peso_longitud->SD1);
                        array_push($array, $peso_longitud->SD2);
                        array_push($array, $peso_longitud->SD3);
                        array_push($array, $peso_longitud->SD4);

                        $resul = [-4, -3, -2, -1, 0, 1, 2, 3, 4];
                        // CREAR ARRAY DE DATOS

                        // METODO DE BUSQUEDA
                        $pl = self::buscarDistancias($peso, $array);
                        $pes_lon = $resul[$pl];
                        // METODO DE BUSQUEDA
                    }
                    $respuesta = [
                        'OPC' => 'EXISTE',
                        'pes_lon' => $pes_lon,
                        // 'identificacion' => $identificacion,
                    ];
                    return response()->json($respuesta, 200);
                    break;
                case "1A5ANI":
                    $peso = $datos["peso"];
                    $talla = $datos["talla"];
                    $sexo = $datos["sexo"];
                    $array = [];
                    $resul = [];
                    $array2 = [];
                    // $dias = Carbon::parse($datos["fecha_nac"])->diff(Carbon::now())->format("%d");

                    ////CALCULO TE
                    $dias = self::diasPorAnios($datos["fecha_nac"]);
                    $talla_edad = false;
                    $tal_eda = "";
                    $resul = [-4, -3, -2, -1, 0, 1, 2, 3, 4];
                    if ($sexo == "MASCULINO") {
                        $talla_edad = \App\TallaEdadNinos::buscar(Session::get('alias'), $dias);
                    } else {
                        $talla_edad = \App\TallaEdadNinas::buscar(Session::get('alias'), $dias);
                    }
                    if ($talla_edad) {
                        // CREAR ARRAY DE DATOS
                        array_push($array, $talla_edad->SD4neg);
                        array_push($array, $talla_edad->SD3neg);
                        array_push($array, $talla_edad->SD2neg);
                        array_push($array, $talla_edad->SD1neg);
                        array_push($array, $talla_edad->SD0);
                        array_push($array, $talla_edad->SD1);
                        array_push($array, $talla_edad->SD2);
                        array_push($array, $talla_edad->SD3);
                        array_push($array, $talla_edad->SD4);
                        // CREAR ARRAY DE DATOS

                        // METODO DE BUSQUEDA
                        $te = self::buscarDistancias($talla, $array);
                        $tal_eda = $resul[$te];
                        // METODO DE BUSQUEDA
                    }
                    ////CALCULO TE

                    ////CALCULO PT
                    $talla = round($talla, 1);
                    $peso_talla = false;
                    $pes_tal = "NA";
                    if ($sexo == "MASCULINO") {
                        $peso_talla = \App\PesoTallaNinos::buscar(Session::get('alias'), $talla);
                    } else {
                        $peso_talla = \App\PesoTallaNinas::buscar(Session::get('alias'), $talla);
                    }
                    if ($peso_talla) {
                        // CREAR ARRAY DE DATOS
                        array_push($array2, $peso_talla->SD4neg);
                        array_push($array2, $peso_talla->SD3neg);
                        array_push($array2, $peso_talla->SD2neg);
                        array_push($array2, $peso_talla->SD1neg);
                        array_push($array2, $peso_talla->SD0);
                        array_push($array2, $peso_talla->SD1);
                        array_push($array2, $peso_talla->SD2);
                        array_push($array2, $peso_talla->SD3);
                        array_push($array2, $peso_talla->SD4);

                        // CREAR ARRAY DE DATOS

                        // METODO DE BUSQUEDA
                        $pt = self::buscarDistancias($peso, $array2);
                        $pes_tal = $resul[$pt];
                        // METODO DE BUSQUEDA
                    }
                    ////CALCULO PT
                    $respuesta = [
                        'OPC' => 'EXISTE',
                        'tal_eda' => $tal_eda,
                        'pes_tal' => $pes_tal,
                    ];
                    return response()->json($respuesta, 200);

                    break;

                case "6A11ANI":
                    $peso = $datos["peso"];
                    $talla = $datos["talla"];
                    $sexo = $datos["sexo"];
                    $array = [];
                    $resul = [];
                    $array2 = [];
                    // $dias = Carbon::parse($datos["fecha_nac"])->diff(Carbon::now())->format("%d");

                    ////CALCULO TE
                    $dias = self::mesesPorAnios($datos["fecha_nac"]);
                    $talla_edad = false;
                    $tal_eda = "";
                    $resul = [-2, -1, 0, 1, 2];
                    if ($sexo == "MASCULINO") {
                        $talla_edad = \App\TallaEdadNinos519::buscar(Session::get('alias'), $dias);
                    } else {
                        $talla_edad = \App\TallaEdadNinas519::buscar(Session::get('alias'), $dias);
                    }
                    if ($talla_edad) {
                        // CREAR ARRAY DE DATOS
                        array_push($array, $talla_edad->SD2neg);
                        array_push($array, $talla_edad->SD1neg);
                        array_push($array, $talla_edad->SD0);
                        array_push($array, $talla_edad->SD1);
                        array_push($array, $talla_edad->SD2);
                        // CREAR ARRAY DE DATOS

                        // METODO DE BUSQUEDA
                        $te = self::buscarDistancias($talla, $array);
                        $tal_eda = $resul[$te];
                        // METODO DE BUSQUEDA
                    }
                    ////CALCULO TE

                    $respuesta = [
                        'OPC' => 'EXISTE',
                        'tal_eda' => $tal_eda,
                    ];
                    return response()->json($respuesta, 200);

                    break;
            }
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function buscarDistancias($valor, $array)
    {
        $menorDistanciaActual = abs($valor - str_replace(",", ".", $array[0]));
        $posicionNumeroMasCercano = 0;

        // Empezas en 1, porque ya sabes que el 0 es el mas cercano hasta ahora.
        for ($i = 1; $i < count($array); $i++) {
            $distanciaEntreNumeros = abs($valor - str_replace(",", ".", $array[$i]));
            if ($distanciaEntreNumeros < $menorDistanciaActual) {
                $menorDistanciaActual = $distanciaEntreNumeros;
                $posicionNumeroMasCercano = $i;
            }
        }
        return $posicionNumeroMasCercano;
    }

    public function diasPorAnios($fecha)
    {
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $fechaEmision = Carbon::parse($fecha);
        $fechaExpiracion = Carbon::parse($date);

        $dias = $fechaExpiracion->diffInDays($fechaEmision);
        return $dias;
    }

    public function mesesPorAnios($fecha)
    {
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $fechaEmision = Carbon::parse($fecha);
        $fechaExpiracion = Carbon::parse($date);

        $meses = $fechaExpiracion->diffInMonths($fechaEmision);
        return $meses;
    }

    public function riesgoSalud($id_hogar, $opcion, $identificacion)
    {
        $respuvivi = \App\Vivienda::buscar(Session::get('alias'), $id_hogar);
        $respuhogar = \App\Hogar::buscar(Session::get('alias'), $id_hogar);

        // // // // // // // // // // Men1A // // // // // // // // // //
        if ($opcion == "Men1A") {
            $respuinte = \App\Integrante::buscar($identificacion, Session::get('alias'));
            $respumen1a = \App\Men1a::buscarPorIdentificacion(Session::get('alias'), $identificacion);

            // // // // // // // // // // RIESGO DESNUTRICIÓN Aguda
            $rTRDA = 0;
            // No lactancia exclusiva 6 meses
            if ($respumen1a->lactancia != "Exclusiva") {
                $rTRDA = $rTRDA + 0.3;
            }
            // No lactancia exclusiva 6 meses

            // Clasificación antropométrica entre las líneas de P/T  -2 a < -1

            // Clasificación antropométrica entre las líneas de P/T  -2 a < -1

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRDA = $rTRDA + 0.3;
            }
            // NO agua potable

            // Bajo peso al nacer
            if ($respumen1a->peso_nacer <= "2.5") {
                $rTRDA = $rTRDA + 0.3;
            }
            // Bajo peso al nacer

            // Presencia de Edemas
            if ($respumen1a->edemas == "SI") {
                $rTRDA = $rTRDA + 0.3;
            }
            // Presencia de Edemas

            // perdida de peso en ultimos 3 meses
            if ($respuinte->perdida_peso == "SI") {
                $rTRDA = $rTRDA + 0.3;
            }
            // perdida de peso en ultimos 3 meses

            // Bajo nivel educativo jefe del hogar
            $niveleducativojefe = \App\Caracterizacion::NivelEducativoJefes(Session::get('alias'), $id_hogar);
            if ($niveleducativojefe > 0) {
                $rTRDA = $rTRDA + 0.3;
            }
            // Bajo nivel educativo jefe del hogar

            // Enfermedades infecciosas
            $respuenferinte = \App\EnfermedadesIntegrantes::buscarInfecciosas(Session::get('alias'), $respuinte->id);
            if (count($respuenferinte) > 0) {
                $rTRDA = $rTRDA + 0.3;
            }
            // Enfermedades infecciosas

            // Perimetro del brazo  -1 a -2
            if ($respumen1a->pb >= -1 && $respumen1a->pb <= -2) {
                $rTRDA = $rTRDA + 1;
            }
            // Perimetro del brazo  -1 a -2
            // // // // // // // // // // RIESGO DESNUTRICIÓN Aguda

            // // // // // // // // // // RIESGO DESNUTRICIÓN GLOBAL
            $rTRDG = 0;
            // Enfermedades infecciosas
            if (count($respuenferinte) > 0) {
                $rTRDG = $rTRDG + 0.6;
            }
            // Enfermedades infecciosas

            // Insalubridad en la vivienda
            $contambien = \App\RiesgosAmbientales::buscar(Session::get('alias'), $id_hogar);
            dd($contambien);die;
            if ($contambien->riesgos_insalubridad > 1) {
                $rTRDG = $rTRDG + 0.6;
            }
            // Insalubridad en la vivienda

            // NBI
            $NBI = self::calcularNBI($id_hogar);
            if ($NBI == "SI") {
                $rTRDG = $rTRDG + 1;
            }
            // NBI

            // Bajo peso al nacer
            if ($respumen1a->peso_nacer <= "2.5") {
                $rTRDG = $rTRDG + 0.6;
            }
            // Bajo peso al nacer

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRDG = $rTRDG + 0.6;
            }
            // NO agua potable

            // presencia de edemas
            if ($respumen1a->edemas == "SI") {
                $rTRDG = $rTRDG + 0.3;
            }
            // presencia de edemas

            // P / E -2 a < -1
            $peso_edad = self::CalculosPerimetros("PESOEDAD", $respuinte->fecha_nac, $respuinte->sexo, $respumen1a);
            if ($peso_edad < -2 || $peso_edad > 2) {
                $rTRDG = $rTRDG + 3;
            }
            // P / E -2 a < -1
            // // // // // // // // // // RIESGO DESNUTRICIÓN GLOBAL

            // // // // // // // // // // DESNUTRICIÓN GLOBAL
            $rTDG = 0;

            // P / E  < -2
            if ($peso_edad < -2) {
                $rTDG = 1;
            }
            // P / E  < -2
            // // // // // // // // // // DESNUTRICIÓN GLOBAL

            // // // // // // // // // // RIESGO DE TALLA BAJA
            $rTRTB = 0;
            // Talla / E -2 a < -1

            // Talla / E -2 a < -1

            // No lactancia exclusiva 6 meses
            if ($respumen1a->lactancia != "Exclusiva") {
                $rTRTB = $rTRTB + 0.8;
            }
            // No lactancia exclusiva 6 meses

            // Insalubridad
            if ($contambien->riesgos_insalubridad > 1) {
                $rTRTB = $rTRTB + 0.8;
            }
            // Insalubridad

            // Enfermedades infecciosas.
            if (count($respuenferinte) > 0) {
                $rTRTB = $rTRTB + 0.8;
            }
            // Enfermedades infecciosas.

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRTB = $rTRTB + 0.8;
            }
            // NO agua potable

            // NBI
            if ($NBI == "SI") {
                $rTRTB = $rTRTB + 0.8;
            }
            // NBI
            // // // // // // // // // // RIESGO DE TALLA BAJA

            // // // // // // // // // // TALLA BAJA o retraso de la edad
            $rTTB = 0;
            // T / E < -2

            // T / E < -2
            // // // // // // // // // // TALLA BAJA o retraso de la edad

            // // // // // // // // // // DESNUTRICIÓN AGUDA MODERADA
            $rTRDAM = 0;
            // Desnutrición Aguda P/T <-2 a - 3

            // Desnutrición Aguda P/T <-2 a - 3

            // Presencia de Edemas
            if ($respumen1a->edemas == "SI") {

            }
            // Presencia de Edemas
            // // // // // // // // // // DESNUTRICIÓN AGUDA MODERADA

            // // // // // // // // // // DESNUTRICIÓN AGUDA SEVERA.
            $rTRDAS = 0;
            // Desnutrición Aguda P/T < - 3

            // Desnutrición Aguda P/T < - 3

            // Presencia de Edemas
            if ($respumen1a->edemas == "SI") {

            }
            // Presencia de Edemas
            // // // // // // // // // // DESNUTRICIÓN AGUDA SEVERA.

            // // // // // // // // // // RIESGO DE MUERTE POR  DESNUTRICIÓN
            $rTRMPD = 0;
            // Edemas
            if ($respumen1a->edemas == "SI") {
                $rTRMPD = $rTRMPD + 1.5;
            }
            // Edemas

            // Cualquier tipo de desnutrición

            // Cualquier tipo de desnutrición

            // Perimetro B   menor a 11,5 cm ( RESOLUCIÓN 5006 - 15)
            if ($respumen1a->pb < 11.5) {
                $rTRMPD = $rTRMPD + 3;
            }
            // Perimetro B   menor a 11,5 cm ( RESOLUCIÓN 5006 - 15)
            // // // // // // // // // // RIESGO DE MUERTE POR  DESNUTRICIÓN

            // // // // // // // // // // RIESGO SOBREPESO
            $rTRS = 0;
            // P/ T  >+1  a +2
            if ($respumen1a->peso_long >= 1 && $respumen1a->peso_long <= 2) {
                $rTRS = $rTRS + 5;
            }
            // P/ T  >+1  a +2

            // IMC >+1 a +2
            // IMC >+1 a +2

            // Sedentarismo
            if ($respuinte->actividad_fisica == "NO") {
                $rTRS = $rTRS + 1;
            }
            // Sedentarismo
            // // // // // // // // // // RIESGO SOBREPESO

            // // // // // // // // // // SOBREPESO
            $rTS = 0;
            // P/ T > +2  a +3
            if ($respumen1a->peso_long >= 2 && $respumen1a->peso_long <= 3) {
                $rTS = 1;
            }
            // P/ T > +2  a +3

            // Sedentarismo
            if ($respuinte->actividad_fisica == "NO") {
                // $rTS = 1;
            }
            // Sedentarismo

            // IMC >+2 a +3

            // IMC >+2 a +3

            // // // // // // // // // // SOBREPESO

            // // // // // // // // // // OBESIDAD
            $rTO = 0;
            // P/ T > +3
            if ($respumen1a->peso_long >= 3) {
                $rTO = 1;
            }
            // P/ T > +3

            // IMC  > +3

            // IMC  > +3
            // // // // // // // // // // OBESIDAD

            // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //

            // // // // // // // // // // Enfermedades Infeccisosas.
            $rTEI = 0;
            // Desnutricion Global
            if ($rTDG == 1) {
                $rTEI = $rTEI + 0.65;
            }
            // Desnutricion Global

            // Desnutrición Aguda

            // Desnutrición Aguda

            // Riesgos de desnutricion

            // Riesgos de desnutricion

            // No vacunación o atrasada.
            if ($respumen1a->bcg == "NO" || $respumen1a->hepb == "NO" || $respumen1a->polio == "NO" || $respumen1a->pentavalente == "NO") {
                $rTEI = $rTEI + 0.55;
            }
            // No vacunación o atrasada.

            // Plagas en la vivienda
            if ($respuvivi->plagas == "SI") {
                $rTEI = $rTEI + 0.55;
            }
            // Plagas en la vivienda

            // insalubridad
            if ($contambien->riesgos_insalubridad > 1) {
                $rTEI = $rTEI + 0.7;
            }
            // insalubridad

            // Baño compartido
            if ($respuvivi->cuantos_baños <= 1) {
                $rTEI = $rTEI + 0.55;
            }
            // Baño compartido

            // relleno sanitario cerda de la vivienda
            if ($respuvivi->rellenos == "SI") {
                $rTEI = $rTEI + 0.55;
            }
            // relleno sanitario cerda de la vivienda

            // no lavar la verduras y frutas antes de comer

            // no lavar la verduras y frutas antes de comer

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Manejo inadecuado  de residuos

            // Manejo inadecuado  de residuos

            // Malas condiciones de la vivienda

            // Malas condiciones de la vivienda

            // No desparacitado

            // No desparacitado

            // Enfermedades inmunosupresoras

            // Enfermedades inmunosupresoras

            // Lotes enmontados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEI = $rTEI + 0.55;
            }
            // Lotes enmontados

            // Ningun tratamiento para el consumo de agua
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEI = $rTEI + 0.55;
            }
            // Ningun tratamiento para el consumo de agua

            // Lactancia exclusiva 6 meses
            if ($respumen1a->lactancia != "Exclusiva") {
                $rTEI = $rTEI + 0.55;
            }
            // Lactancia exclusiva 6 meses

            // Hacinamiento
            $hacinamiento = self::hacinamiento($id_hogar);
            if ($hacinamiento == "SI") {
                $rTEI = $rTEI + 0.25;
            }
            // Hacinamiento

            // No acceso agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTEI = $rTEI + 0.55;
            }
            // No acceso agua potable
            // // // // // // // // // // Enfermedades Infeccisosas.

            // // // // // // // // // // TRASTORNOS ASOCIADOS AL USO DE SPA
            $rTTAUS = 0;

            // Consumo de SPA

            // Consumo de SPA

            // Consumo pasivo de SPA
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTTAUS = $rTTAUS + 1.8;
            }
            // Consumo pasivo de SPA
            // // // // // // // // // // TRASTORNOS ASOCIADOS AL USO DE SPA

            // // // // // // // // // // ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA
            $rTECA = 0;

            // Sobrepeso
            if ($rTS == 1) {
                $rTECA = $rTECA + 0.5;
            }
            // Sobrepeso

            // FAMILIARES CON ATENCEDENTES

            // FAMILIARES CON ATENCEDENTES

            // Consumo de alcohol

            // Consumo de alcohol

            // Consumo de SPA

            // Consumo de SPA

            // OBESIDAD
            if ($rTO == 1) {
                $rTECA = $rTECA + 1.4;
            }
            // OBESIDAD

            // Hipertension arterial
            $antehipertension = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "HIPERTENSION");
            if ($antehipertension > 0) {
                $rTECA = $rTECA + 1.5;
            }
            // Hipertension arterial

            // Diabetes
            $antediabetes = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "DIABETES");
            if ($antediabetes > 0) {
                $rTECA = $rTECA + 1;
            }
            // Diabetes

            // Hiperlipemias

            // Hiperlipemias
            // // // // // // // // // // ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA

            // // // // // // // // // // Cancer
            $rTC = 0;
            // Antecedentes en familiares
            $antecancer = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "CANCER");
            if ($antecancer > 0) {
                $rTC = $rTC + 2;
            }
            // Antecedentes en familiares

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTC = $rTC + 0.5;
            }
            // Contaminación ambiental

            // consumo de tabaco o spa pasivo
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTC = $rTC + 1;
            }
            // consumo de tabaco o spa pasivo

            // Obesidad
            if ($rTO == 1) {
                $rTC = $rTC + 1;
            }
            // Obesidad

            // consumos de tabaco. Alcoholismos, spa

            // consumos de tabaco. Alcoholismos, spa

            // VIH
            $vih = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "VIH");
            if ($vih > 0) {
                $rTC = $rTC + 1;
            }
            // VIH
            // // // // // // // // // // Cancer

            // // // // // // // // // // Alteraciones y transtornos visuales
            $rTATV = 0;
            // Antecedentes familiares
            $antealteraciones = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONES");
            if ($antealteraciones > 0) {
                $rTATV = $rTATV + 2;
            }
            // Antecedentes familiares

            // Hipertension arterial
            if ($antehipertension > 0) {
                $rTATV = $rTATV + 1;
            }
            // Hipertension arterial

            // DESnutricion
            if ($rTDG == 1) {
                $rTATV = $rTATV + 1;
            }
            // DESnutricion

            // Deabetes
            if ($antediabetes > 0) {
                $rTATV = $rTATV + 1;
            }
            // Deabetes

            // Consumo de alcohol

            // Consumo de alcohol
            // // // // // // // // // // Alteraciones y transtornos visuales

            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $rTATAC = 0;
            // antecedente familiar
            $antealteracionesaud = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONESAUD");
            if ($antealteracionesaud > 0) {
                $rTATAC = $rTATAC + 1.75;
            }
            // antecedente familiar

            // Exposicion a contaminación auditiva
            if ($contambien->riesgos_auditivo > 1) {
                $rTATAC = $rTATAC + 1.75;
            }
            // Exposicion a contaminación auditiva

            // Infecciones crónicas de oidos
            $enferoidos = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "OIDOS");
            if ($enferoidos > 0) {
                $rTATAC = $rTATAC + 1.75;
            }
            // Infecciones crónicas de oidos

            // Desnutrición global
            if ($rTDG == 1) {
                $rTATAC = $rTATAC + 1.75;
            }
            // Desnutrición global
            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // // // // // // // // // // Salud Bucal
            $rTSB = 0;
            // Pobreza

            // Pobreza

            // Sin acceso a servicios odontologicos

            // Sin acceso a servicios odontologicos

            // Malos hábitos de higiene oral

            // Malos hábitos de higiene oral

            // no aplicación de barniz de fluor

            // no aplicación de barniz de fluor

            // Consumo de tabaco

            // Consumo de tabaco
            // // // // // // // // // // Salud Bucal

            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL
            $rTSM = 0;
            // Antecedente familiar
            $antesaludmental = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "SALUDMENTAL");
            if ($antesaludmental > 0) {
                $rTSM = $rTSM + 1.4;
            }
            // Antecedente familiar

            // Mala relación con los familiares

            // Mala relación con los familiares

            // Problemas de conducta
            if ($respumen1a->conducta != "SI") {
                $rTSM = $rTSM + 1.4;
            }
            // Problemas de conducta

            // consumo de alcoho, spa, tabaco

            // consumo de alcoho, spa, tabaco

            // Violencia intrafamiliar

            // Violencia intrafamiliar
            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL

            // // // // // // // // // // VIOLENCIAS
            $rTV = 0;
            // Violencia intrafamiliar  ( materializado)

            // Violencia intrafamiliar  ( materializado)

            // Transtornos mentales
            $anteconducta = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "CONDUCTA");
            if ($anteconducta > 0) {
                $rTV = $rTV + 1.4;
            }
            // Transtornos mentales

            // Problemas de conducta
            if ($respumen1a->conducta != "SI") {
                $rTV = $rTV + 1.4;
            }
            // Problemas de conducta

            // Señales de violencia

            // Señales de violencia

            // padres con consumo de SPA y o  Alcohol
            if ($consufact->alcohol == "SI" || $consufact->sustancias_psico == "SI") {
                $rTV = $rTV + 1.8;
            }
            // padres con consumo de SPA y o  Alcohol

            // Mala relacion con familiares

            // Mala relacion con familiares
            // // // // // // // // // // VIOLENCIAS

            // // // // // // // // // // Enfermedades Respiratorias  crónicas
            $rTERC = 0;
            // ViVienda Cocina con leña o carbón
            if ($respuvivi->tipo_combustible == "3" || $respuvivi->tipo_combustible == "4") {
                $rTERC = $rTERC + 2.2;
            }
            // ViVienda Cocina con leña o carbón

            // Antecedentes familiares de enfermedades respiratorias cronicas
            $anteenferrespi = \App\AntecedentesIntegrantes::buscarAntePorId(Session::get('alias'), $id_hogar, "ENFERRESPI", $respuinte->id);
            if ($anteenferrespi > 0) {
                $rTERC = $rTERC + 1;
            }
            // Antecedentes familiares de enfermedades respiratorias cronicas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTERC = $rTERC + 1;
            }
            // Contaminación ambiental

            // consumo de tabaco y SPA

            // consumo de tabaco y SPA

            // Consumo pasivo de humo de tabaco o SPA
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTERC = $rTERC + 1.4;
            }
            // Consumo pasivo de humo de tabaco o SPA
            // // // // // // // // // // Enfermedades Respiratorias  crónicas

            // // // // // // // // // // ENFERMEDADES ZOONOTICAS
            $rTEZ = 0;
            // Cria de animales (mas de 2  domesticos)
            $anidomes = \App\Animal::buscar(Session::get('alias'), $id_hogar);
            if (count($anidomes) > 2) {
                $rTEZ = $rTEZ + 1.8;
            }
            // Cria de animales (mas de 2  domesticos)

            // No vacunación de animales
            $anidomesvacuna = \App\Animal::buscarVacunados(Session::get('alias'), $id_hogar);
            if (count($anidomesvacuna) > 2) {
                $rTEZ = $rTEZ + 1.2;
            }
            // No vacunación de animales

            // Consumo de agua no potable.
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEZ = $rTEZ + 1.2;
            }
            // Consumo de agua no potable.

            // Manejo de residuos
            if ($respuvivi->destino_final_basura != "1" || $respuvivi->almacenamiento_residuos != "SI") {
                $rTEZ = $rTEZ + 0.9;
            }
            // Manejo de residuos

            // No inmunizado
            if ($respumen1a->bcg == "NO" || $respumen1a->hepb == "NO" || $respumen1a->polio == "NO" || $respumen1a->pentavalente == "NO") {
                $rTEZ = $rTEZ + 0.9;
            }
            // No inmunizado

            // NBI
            if ($NBI == "SI") {
                $rTEZ = $rTEZ + 0.9;
            }
            // NBI

            // Lotes abandonados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEZ = $rTEZ + 0.9;
            }
            // Lotes abandonados

            // no Desparacitación

            // no Desparacitación

            // Mal estado de la vivienda
            if ($respuvivi->material_predominante == "5" || $respuvivi->material_predominante == "7"
                || $respuvivi->tipo_estructura == "5" || $respuvivi->tipo_cubierta == "2"
                || $respuvivi->tipo_cubierta == "6" || $respuvivi->tipo_cubierta == "8" || $respuvivi->tipo_cubierta == "9") {
                $rTEZ = $rTEZ + 0.9;
            }
            // Mal estado de la vivienda
            // // // // // // // // // // ENFERMEDADES ZOONOTICAS

            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $rTTDNEA = 0;
            // Antecedente familiar
            $antetranstornos = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "TRANSTORNOS");
            if ($antetranstornos > 0) {
                $rTTDNEA = $rTTDNEA + 1.35;
            }
            // Antecedente familiar

            // Problemas de lenguaje
            if ($respumen1a->lenguaje == "SI") {
                $rTTDNEA = $rTTDNEA + 1.1;
            }
            // Problemas de lenguaje

            // contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTTDNEA = $rTTDNEA + 1.1;
            }
            // contaminación ambiental

            // Problemas de motricidad
            if ($respumen1a->motora == "SI") {
                $rTTDNEA = $rTTDNEA + 1.35;
            }
            // Problemas de motricidad

            // perimetro cefalico > +2 o <- 2
            $per_cef = self::CalculosPerimetros("PERIMETROCEFALICO", $respuinte->fecha_nac, $respuinte->sexo, $respumen1a);
            if ($per_cef < -2 || $per_cef > 2) {
                $rTTDNEA = $rTTDNEA + 2.1;
            }
            // perimetro cefalico > +2 o <- 2
            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            // // // // // // // // // // CONSUMO DE SPA
            $rTCDS = 0;
            // Problemas de conducta
            if ($respumen1a->conducta == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Problemas de conducta

            // consumos de SPA en la vivienda.
            if ($consufact->sustancias_psico == "SI") {
                $rTCDS = $rTCDS + 3;
            }
            // consumos de SPA en la vivienda.

            // Violencia intrafamiliar
            if ($respumen1a->maltrato == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Violencia intrafamiliar

            // Enfermedad mental
            if ($anteconducta > 0) {
                $rTCDS = $rTCDS + 2;
            }
            // Enfermedad mental
            // // // // // // // // // // CONSUMO DE SPA

            $datos["enfermedades_infecciosas_I"] = $rTEI;
            $datos["transtornos_asociados_spa_I"] = $rTTAUS;
            $datos["enfermedad_cardiovascular_I"] = $rTECA;
            $datos["cancer_I"] = $rTC;
            $datos["alteraciones_transtornos_visuales_I"] = $rTATV;
            $datos["alteraciones_transtornos_audicion_I"] = $rTATAC;
            $datos["salud_bucal_I"] = $rTSB;
            $datos["problemas_salud_mental_I"] = $rTSM;
            $datos["violencias_I"] = $rTV;
            $datos["enfermedades_respiratorias_I"] = $rTERC;
            $datos["enfermedades_zoonoticas_I"] = $rTEZ;
            $datos["transtornos_degenartivos_I"] = $rTTDNEA;
            $datos["consumo_spa_I"] = $rTCDS;

            $datos["riesgos_desnutricion_aguda_I"] = $rTRDA;
            $datos["riesgos_desnutricion_global_I"] = $rTRDG;
            $datos["desnutricion_global_I"] = $rTDG;
            $datos["riesgo_talla_baja_I"] = $rTRTB;
            $datos["talla_baja_retraso_I"] = $rTTB;
            $datos["desnutricion_aguda_moderada_I"] = $rTRDAM;
            $datos["desnutricion_aguda_severa_I"] = $rTRDAS;
            $datos["riesgo_muerte_I"] = $rTRMPD;
            $datos["riesgo_sobrepeso_I"] = $rTRS;
            $datos["sobrepeso_I"] = $rTS;
            $datos["obesidad_I"] = $rTO;
            $resultado = self::calculosSaludInherente($datos, "MEN1", $id_hogar, $respumen1a->id_integrante);
            // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //

        }
        // // // // // // // // // // Men1A // // // // // // // // // //

        // // // // // // // // // // De1A5 // // // // // // // // // //
        if ($opcion == "De1A5") {
            $respuinte = \App\Integrante::buscar($identificacion, Session::get('alias'));
            $respude1a5 = \App\De1a5::buscarPorIdentificacion(Session::get('alias'), $identificacion);

            // // // // // // // // // // RIESGO DESNUTRICIÓN Aguda
            $rTRDA = 0;
            // No lactancia exclusiva 6 meses

            // No lactancia exclusiva 6 meses

            // Clasificación antropométrica entre las líneas de P/T  -2 a < -1
            if ($respude1a5->pt >= -2 && $respude1a5->pt <= -1) {
                $rTRDA = $rTRDA + 3;
            }
            // Clasificación antropométrica entre las líneas de P/T  -2 a < -1

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRDA = $rTRDA + 0.3;
            }
            // NO agua potable

            // Bajo peso al nacer

            // Bajo peso al nacer

            // Presencia de Edemas

            // Presencia de Edemas

            // perdida de peso en ultimos 3 meses
            if ($respuinte->perdida_peso == "SI") {
                $rTRDA = $rTRDA + 0.3;
            }
            // perdida de peso en ultimos 3 meses

            // Bajo nivel educativo jefe del hogar
            $niveleducativojefe = \App\Caracterizacion::NivelEducativoJefes(Session::get('alias'), $id_hogar);
            if ($niveleducativojefe > 0) {
                $rTRDA = $rTRDA + 0.3;
            }
            // Bajo nivel educativo jefe del hogar

            // Enfermedades infecciosas
            $respuenferinte = \App\EnfermedadesIntegrantes::buscarInfecciosas(Session::get('alias'), $respuinte->id);
            if (count($respuenferinte) > 0) {
                $rTRDA = $rTRDA + 0.3;
            }
            // Enfermedades infecciosas

            // Perimetro del brazo  -1 a -2
            if ($respude1a5->pb >= -1 && $respude1a5->pb <= -2) {
                $rTRDA = $rTRDA + 1;
            }
            // Perimetro del brazo  -1 a -2
            // // // // // // // // // // RIESGO DESNUTRICIÓN Aguda

            // // // // // // // // // // RIESGO DESNUTRICIÓN GLOBAL
            $rTRDG = 0;
            // Enfermedades infecciosas
            if (count($respuenferinte) > 0) {
                $rTRDG = $rTRDG + 0.6;
            }
            // Enfermedades infecciosas

            // Insalubridad en la vivienda
            $contambien = \App\RiesgosAmbientales::buscar(Session::get('alias'), $id_hogar);
            if ($contambien->riesgos_insalubridad > 1) {
                $rTRDG = $rTRDG + 0.6;
            }
            // Insalubridad en la vivienda

            // NBI
            $NBI = self::calcularNBI($id_hogar);
            if ($NBI == "SI") {
                $rTRDG = $rTRDG + 1;
            }
            // NBI

            // Bajo peso al nacer
            if ($respude1a5->peso <= "2.5") {
                $rTRDG = $rTRDG + 0.6;
            }
            // Bajo peso al nacer

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRDG = $rTRDG + 0.6;
            }
            // NO agua potable

            // presencia de edemas

            // presencia de edemas

            // P / E -2 a < -1
            $peso_edad = self::CalculosPerimetros("PESOEDAD2", $respuinte->fecha_nac, $respuinte->sexo, $respude1a5);
            if ($peso_edad < -2 || $peso_edad > 2) {
                $rTRDG = $rTRDG + 3;
            }
            // P / E -2 a < -1
            // // // // // // // // // // RIESGO DESNUTRICIÓN GLOBAL

            // // // // // // // // // // DESNUTRICIÓN GLOBAL
            $rTDG = 0;

            // P / E  < -2
            if ($peso_edad < -2) {
                $rTDG = 1;
            }
            // P / E  < -2
            // // // // // // // // // // DESNUTRICIÓN GLOBAL

            // // // // // // // // // // RIESGO DE TALLA BAJA
            $rTRTB = 0;
            // Talla / E -2 a < -1
            if ($respude1a5->te >= -1 && $respude1a5->te <= -2) {
                $rTRTB = $rTRTB + 3;
            }
            // Talla / E -2 a < -1

            // No lactancia exclusiva 6 meses

            // No lactancia exclusiva 6 meses

            // Insalubridad
            if ($contambien->riesgos_insalubridad > 1) {
                $rTRTB = $rTRTB + 0.8;
            }
            // Insalubridad

            // Enfermedades infecciosas.
            if (count($respuenferinte) > 0) {
                $rTRTB = $rTRTB + 0.8;
            }
            // Enfermedades infecciosas.

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRTB = $rTRTB + 0.8;
            }
            // NO agua potable

            // NBI
            if ($NBI == "SI") {
                $rTRTB = $rTRTB + 0.8;
            }
            // NBI
            // // // // // // // // // // RIESGO DE TALLA BAJA

            // // // // // // // // // // TALLA BAJA o retraso de la edad
            $rTTB = 0;
            // T / E < -2
            if ($respude1a5->te <= -2) {
                $rTTB = 1;
            }
            // T / E < -2
            // // // // // // // // // // TALLA BAJA o retraso de la edad

            // // // // // // // // // // DESNUTRICIÓN AGUDA MODERADA
            $rTRDAM = 0;
            // Desnutrición Aguda P/T <-2 a - 3
            if ($respude1a5->pt >= -3 && $respude1a5->pt <= -2) {
                $rTRDAM = 1;
            }
            // Desnutrición Aguda P/T <-2 a - 3

            // Presencia de Edemas

            // Presencia de Edemas
            // // // // // // // // // // DESNUTRICIÓN AGUDA MODERADA

            // // // // // // // // // // DESNUTRICIÓN AGUDA SEVERA.
            $rTRDAS = 0;
            // Desnutrición Aguda P/T < - 3
            if ($respude1a5->pt <= -3) {
                $rTRDAS = 1;
            }
            // Desnutrición Aguda P/T < - 3

            // Presencia de Edemas

            // Presencia de Edemas
            // // // // // // // // // // DESNUTRICIÓN AGUDA SEVERA.

            // // // // // // // // // // RIESGO DE MUERTE POR  DESNUTRICIÓN
            $rTRMPD = 0;
            // Edemas

            // Edemas

            // Cualquier tipo de desnutrición

            // Cualquier tipo de desnutrición

            // Perimetro B   menor a 11,5 cm ( RESOLUCIÓN 5006 - 15)
            if ($respude1a5->pb < 11.5) {
                $rTRMPD = $rTRMPD + 3;
            }
            // Perimetro B   menor a 11,5 cm ( RESOLUCIÓN 5006 - 15)
            // // // // // // // // // // RIESGO DE MUERTE POR  DESNUTRICIÓN

            // // // // // // // // // // RIESGO SOBREPESO
            $rTRS = 0;
            // P/ T  >+1  a +2
            if ($respude1a5->pt >= 1 && $respude1a5->pt <= 2) {
                $rTRS = $rTRS + 5;
            }
            // P/ T  >+1  a +2

            // IMC >+1 a +2
            // IMC >+1 a +2

            // Sedentarismo
            if ($respuinte->actividad_fisica == "NO") {
                $rTRS = $rTRS + 1;
            }
            // Sedentarismo
            // // // // // // // // // // RIESGO SOBREPESO

            // // // // // // // // // // SOBREPESO
            $rTS = 0;
            // P/ T > +2  a +3
            if ($respude1a5->pt >= 2 && $respude1a5->pt <= 3) {
                $rTS = 1;
            }
            // P/ T > +2  a +3

            // Sedentarismo
            if ($respuinte->actividad_fisica == "NO") {
                // $rTS = 1;
            }
            // Sedentarismo

            // IMC >+2 a +3

            // IMC >+2 a +3

            // // // // // // // // // // SOBREPESO

            // // // // // // // // // // OBESIDAD
            $rTO = 0;
            // P/ T > +3
            if ($respude1a5->pt >= 3) {
                $rTO = 1;
            }
            // P/ T > +3

            // IMC  > +3

            // IMC  > +3
            // // // // // // // // // // OBESIDAD

            // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //

            // // // // // // // // // // Enfermedades Infeccisosas.
            $rTEI = 0;
            // Desnutricion Global
            if ($rTDG == 1) {
                $rTEI = $rTEI + 0.65;
            }
            // Desnutricion Global

            // Desnutrición Aguda

            // Desnutrición Aguda

            // Riesgos de desnutricion

            // Riesgos de desnutricion

            // No vacunación o atrasada.
            if ($respude1a5->bcg == "NO" || $respude1a5->dpt == "NO" || $respude1a5->polio == "NO" || $respude1a5->fiebrea == "NO" || $respude1a5->tripleviral == "NO" || $respude1a5->pentavalente == "NO") {
                $rTEI = $rTEI + 0.55;
            }
            // No vacunación o atrasada.

            // Plagas en la vivienda
            if ($respuvivi->plagas == "SI") {
                $rTEI = $rTEI + 0.55;
            }
            // Plagas en la vivienda

            // insalubridad
            if ($contambien->riesgos_insalubridad > 1) {
                $rTEI = $rTEI + 0.7;
            }
            // insalubridad

            // Baño compartido
            if ($respuvivi->cuantos_baños <= 1) {
                $rTEI = $rTEI + 0.55;
            }
            // Baño compartido

            // relleno sanitario cerda de la vivienda
            if ($respuvivi->rellenos == "SI") {
                $rTEI = $rTEI + 0.55;
            }
            // relleno sanitario cerda de la vivienda

            // no lavar la verduras y frutas antes de comer

            // no lavar la verduras y frutas antes de comer

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Manejo inadecuado  de residuos

            // Manejo inadecuado  de residuos

            // Malas condiciones de la vivienda

            // Malas condiciones de la vivienda

            // No desparacitado

            // No desparacitado

            // Enfermedades inmunosupresoras

            // Enfermedades inmunosupresoras

            // Lotes enmontados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEI = $rTEI + 0.55;
            }
            // Lotes enmontados

            // Ningun tratamiento para el consumo de agua
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEI = $rTEI + 0.55;
            }
            // Ningun tratamiento para el consumo de agua

            // Lactancia exclusiva 6 meses

            // Lactancia exclusiva 6 meses

            // Hacinamiento
            $hacinamiento = self::hacinamiento($id_hogar);
            if ($hacinamiento == "SI") {
                $rTEI = $rTEI + 0.25;
            }
            // Hacinamiento

            // No acceso agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTEI = $rTEI + 0.55;
            }
            // No acceso agua potable
            // // // // // // // // // // Enfermedades Infeccisosas.

            // // // // // // // // // // TRASTORNOS ASOCIADOS AL USO DE SPA
            $rTTAUS = 0;

            // Consumo de SPA

            // Consumo de SPA

            // Consumo pasivo de SPA
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTTAUS = $rTTAUS + 1.8;
            }
            // Consumo pasivo de SPA
            // // // // // // // // // // TRASTORNOS ASOCIADOS AL USO DE SPA

            // // // // // // // // // // ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA
            $rTECA = 0;

            // Sobrepeso
            if ($rTS == 1) {
                $rTECA = $rTECA + 0.5;
            }
            // Sobrepeso

            // FAMILIARES CON ATENCEDENTES

            // FAMILIARES CON ATENCEDENTES

            // Consumo de alcohol

            // Consumo de alcohol

            // Consumo de SPA

            // Consumo de SPA

            // OBESIDAD
            if ($rTO == 1) {
                $rTECA = $rTECA + 1.4;
            }
            // OBESIDAD

            // Hipertension arterial
            $antehipertension = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "HIPERTENSION");
            if ($antehipertension > 0) {
                $rTECA = $rTECA + 1.5;
            }
            // Hipertension arterial

            // Diabetes
            $antediabetes = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "DIABETES");
            if ($antediabetes > 0) {
                $rTECA = $rTECA + 1;
            }
            // Diabetes

            // Hiperlipemias

            // Hiperlipemias
            // // // // // // // // // // ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA

            // // // // // // // // // // Cancer
            $rTC = 0;
            // Antecedentes en familiares
            $antecancer = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "CANCER");
            if ($antecancer > 0) {
                $rTC = $rTC + 2;
            }
            // Antecedentes en familiares

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTC = $rTC + 0.5;
            }
            // Contaminación ambiental

            // consumo de tabaco o spa pasivo
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTC = $rTC + 1;
            }
            // consumo de tabaco o spa pasivo

            // Obesidad
            if ($rTO == 1) {
                $rTC = $rTC + 1;
            }
            // Obesidad

            // consumos de tabaco. Alcoholismos, spa

            // consumos de tabaco. Alcoholismos, spa

            // VIH
            $vih = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "VIH");
            if ($vih > 0) {
                $rTC = $rTC + 1;
            }
            // VIH
            // // // // // // // // // // Cancer

            // // // // // // // // // // Alteraciones y transtornos visuales
            $rTATV = 0;
            // Antecedentes familiares
            $antealteraciones = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONES");
            if ($antealteraciones > 0) {
                $rTATV = $rTATV + 2;
            }
            // Antecedentes familiares

            // Hipertension arterial
            if ($antehipertension > 0) {
                $rTATV = $rTATV + 1;
            }
            // Hipertension arterial

            // DESnutricion
            if ($rTDG == 1) {
                $rTATV = $rTATV + 1;
            }
            // DESnutricion

            // Deabetes
            if ($antediabetes > 0) {
                $rTATV = $rTATV + 1;
            }
            // Deabetes

            // Consumo de alcohol

            // Consumo de alcohol
            // // // // // // // // // // Alteraciones y transtornos visuales

            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $rTATAC = 0;
            // antecedente familiar
            $antealteracionesaud = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONESAUD");
            if ($antealteracionesaud > 0) {
                $rTATAC = $rTATAC + 1.75;
            }
            // antecedente familiar

            // Exposicion a contaminación auditiva
            if ($contambien->riesgos_auditivo > 1) {
                $rTATAC = $rTATAC + 1.75;
            }
            // Exposicion a contaminación auditiva

            // Infecciones crónicas de oidos
            $enferoidos = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "OIDOS");
            if ($enferoidos > 0) {
                $rTATAC = $rTATAC + 1.75;
            }
            // Infecciones crónicas de oidos

            // Desnutrición global
            if ($rTDG == 1) {
                $rTATAC = $rTATAC + 1.75;
            }
            // Desnutrición global

            // // // // // // // // // // Salud Bucal
            $rTSB = 0;
            // Presencia de caries
            if ($respude1a5->caries == "SI") {
                $rTSB = $rTSB + 7;
            } else {
                // Presencia de caries
                // Pobreza

                // Pobreza

                // Sin acceso a servicios odontologicos
                if ($respude1a5->consultaodon == "NO") {
                    $rTSB = $rTSB + 1.6;
                }
                // Sin acceso a servicios odontologicos

                // Malos hábitos de higiene oral
                if ($respude1a5->nocepillado < 3) {
                    $rTSB = $rTSB + 1.8;
                }
                // Malos hábitos de higiene oral

                // no aplicación de barniz de fluor

                // no aplicación de barniz de fluor

                // Consumo de tabaco

                // Consumo de tabaco
            }
            // // // // // // // // // // Salud Bucal
            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL
            $rTSM = 0;
            // Antecedente familiar
            $antesaludmental = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "SALUDMENTAL");
            if ($antesaludmental > 0) {
                $rTSM = $rTSM + 1.4;
            }
            // Antecedente familiar

            // Mala relación con los familiares

            // Mala relación con los familiares

            // Problemas de conducta
            if ($respude1a5->conducta == "SI") {
                $rTSM = $rTSM + 1.4;
            }
            // Problemas de conducta

            // consumo de alcoho, spa, tabaco

            // consumo de alcoho, spa, tabaco

            // Violencia intrafamiliar

            // Violencia intrafamiliar
            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL

            // // // // // // // // // // VIOLENCIAS
            $rTV = 0;
            // Violencia intrafamiliar  ( materializado)

            // Violencia intrafamiliar  ( materializado)

            // Transtornos mentales
            $anteconducta = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "CONDUCTA");
            if ($anteconducta > 0) {
                $rTV = $rTV + 1.4;
            }
            // Transtornos mentales

            // Problemas de conducta
            if ($respude1a5->conducta == "SI") {
                $rTV = $rTV + 1.4;
            }
            // Problemas de conducta

            // Señales de violencia
            if ($respude1a5->maltrato == "SI") {
                $rTV = $rTV + 2;
            }
            // Señales de violencia

            // padres con consumo de SPA y o  Alcohol
            if ($consufact->alcohol == "SI" || $consufact->sustancias_psico == "SI") {
                $rTV = $rTV + 1.8;
            }
            // padres con consumo de SPA y o  Alcohol

            // Mala relacion con familiares

            // Mala relacion con familiares
            // // // // // // // // // // VIOLENCIAS

            // // // // // // // // // // Enfermedades Respiratorias  crónicas
            $rTERC = 0;
            // ViVienda Cocina con leña o carbón
            if ($respuvivi->tipo_combustible == "3" || $respuvivi->tipo_combustible == "4") {
                $rTERC = $rTERC + 2.2;
            }
            // ViVienda Cocina con leña o carbón

            // Antecedentes familiares de enfermedades respiratorias cronicas
            $anteenferrespi = \App\AntecedentesIntegrantes::buscarAntePorId(Session::get('alias'), $id_hogar, "ENFERRESPI", $respuinte->id);
            if ($anteenferrespi > 0) {
                $rTERC = $rTERC + 1;
            }
            // Antecedentes familiares de enfermedades respiratorias cronicas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTERC = $rTERC + 1;
            }
            // Contaminación ambiental

            // consumo de tabaco y SPA

            // consumo de tabaco y SPA

            // Consumo pasivo de humo de tabaco o SPA
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTERC = $rTERC + 1.4;
            }
            // Consumo pasivo de humo de tabaco o SPA
            // // // // // // // // // // Enfermedades Respiratorias  crónicas

            // // // // // // // // // // ENFERMEDADES ZOONOTICAS
            $rTEZ = 0;
            // Cria de animales (mas de 2  domesticos)
            $anidomes = \App\Animal::buscar(Session::get('alias'), $id_hogar);
            if (count($anidomes) > 2) {
                $rTEZ = $rTEZ + 1.8;
            }
            // Cria de animales (mas de 2  domesticos)

            // No vacunación de animales
            $anidomesvacuna = \App\Animal::buscarVacunados(Session::get('alias'), $id_hogar);
            if (count($anidomesvacuna) > 2) {
                $rTEZ = $rTEZ + 1.2;
            }
            // No vacunación de animales

            // Consumo de agua no potable.
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEZ = $rTEZ + 1.2;
            }
            // Consumo de agua no potable.

            // Manejo de residuos
            if ($respuvivi->destino_final_basura != "1" || $respuvivi->almacenamiento_residuos != "SI") {
                $rTEZ = $rTEZ + 0.9;
            }
            // Manejo de residuos

            // No inmunizado
            if ($respude1a5->bcg == "NO" || $respude1a5->dpt == "NO" || $respude1a5->polio == "NO" || $respude1a5->fiebrea == "NO" || $respude1a5->tripleviral == "NO" || $respude1a5->pentavalente == "NO") {
                $rTEZ = $rTEZ + 0.9;
            }
            // No inmunizado

            // NBI
            if ($NBI == "SI") {
                $rTEZ = $rTEZ + 0.9;
            }
            // NBI

            // Lotes abandonados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEZ = $rTEZ + 0.9;
            }
            // Lotes abandonados

            // no Desparacitación

            // no Desparacitación

            // Mal estado de la vivienda
            if ($respuvivi->material_predominante == "5" || $respuvivi->material_predominante == "7"
                || $respuvivi->tipo_estructura == "5" || $respuvivi->tipo_cubierta == "2"
                || $respuvivi->tipo_cubierta == "6" || $respuvivi->tipo_cubierta == "8" || $respuvivi->tipo_cubierta == "9") {
                $rTEZ = $rTEZ + 0.9;
            }
            // Mal estado de la vivienda
            // // // // // // // // // // ENFERMEDADES ZOONOTICAS

            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $rTTDNEA = 0;
            // Antecedente familiar
            $antetranstornos = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "TRANSTORNOS");
            if ($antetranstornos > 0) {
                $rTTDNEA = $rTTDNEA + 1.35;
            }
            // Antecedente familiar

            // Problemas de lenguaje
            if ($respude1a5->lenguaje == "SI") {
                $rTTDNEA = $rTTDNEA + 1.1;
            }
            // Problemas de lenguaje

            // contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTTDNEA = $rTTDNEA + 1.1;
            }
            // contaminación ambiental

            // Problemas de motricidad
            if ($respude1a5->motora == "SI") {
                $rTTDNEA = $rTTDNEA + 1.35;
            }
            // Problemas de motricidad

            // perimetro cefalico > +2 o <- 2
            $per_cef = self::CalculosPerimetros("PERIMETROCEFALICO2", $respuinte->fecha_nac, $respuinte->sexo, $respude1a5);
            if ($per_cef < -2 || $per_cef > 2) {
                $rTTDNEA = $rTTDNEA + 2.1;
            }
            // perimetro cefalico > +2 o <- 2
            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            // // // // // // // // // // CONSUMO DE SPA
            $rTCDS = 0;
            // Problemas de conducta
            if ($respude1a5->conducta == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Problemas de conducta

            // consumos de SPA en la vivienda.
            if ($consufact->sustancias_psico == "SI") {
                $rTCDS = $rTCDS + 3;
            }
            // consumos de SPA en la vivienda.

            // Violencia intrafamiliar
            if ($respude1a5->maltrato == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Violencia intrafamiliar

            // Enfermedad mental
            if ($anteconducta > 0) {
                $rTCDS = $rTCDS + 2;
            }
            // Enfermedad mental
            // // // // // // // // // // CONSUMO DE SPA

            $datos["enfermedades_infecciosas_I"] = $rTEI;
            $datos["transtornos_asociados_spa_I"] = $rTTAUS;
            $datos["enfermedad_cardiovascular_I"] = $rTECA;
            $datos["cancer_I"] = $rTC;
            $datos["alteraciones_transtornos_visuales_I"] = $rTATV;
            $datos["alteraciones_transtornos_audicion_I"] = $rTATAC;
            $datos["salud_bucal_I"] = $rTSB;
            $datos["problemas_salud_mental_I"] = $rTSM;
            $datos["violencias_I"] = $rTV;
            $datos["enfermedades_respiratorias_I"] = $rTERC;
            $datos["enfermedades_zoonoticas_I"] = $rTEZ;
            $datos["transtornos_degenartivos_I"] = $rTTDNEA;
            $datos["consumo_spa_I"] = $rTCDS;

            $datos["riesgos_desnutricion_aguda_I"] = $rTRDA;
            $datos["riesgos_desnutricion_global_I"] = $rTRDG;
            $datos["desnutricion_global_I"] = $rTDG;
            $datos["riesgo_talla_baja_I"] = $rTRTB;
            $datos["talla_baja_retraso_I"] = $rTTB;
            $datos["desnutricion_aguda_moderada_I"] = $rTRDAM;
            $datos["desnutricion_aguda_severa_I"] = $rTRDAS;
            $datos["riesgo_muerte_I"] = $rTRMPD;
            $datos["riesgo_sobrepeso_I"] = $rTRS;
            $datos["sobrepeso_I"] = $rTS;
            $datos["obesidad_I"] = $rTO;
            $resultado = self::calculosSaludInherente($datos, "DE1A5", $id_hogar, $respude1a5->id_integrante);
        }
        // // // // // // // // // // De1A5 // // // // // // // // // //

        // // // // // // // // // // De6A11 // // // // // // // // // //
        if ($opcion == "De6A11") {
            $respuinte = \App\Integrante::buscar($identificacion, Session::get('alias'));
            $respude6a11 = \App\De6a11::buscarPorIdentificacion(Session::get('alias'), $identificacion);

            // // // // // // // // // //  Riesgo de delgadez
            $rTRD = 0;
            // Enfermedades infecciosas
            $respuenferinte = \App\EnfermedadesIntegrantes::buscarInfecciosas(Session::get('alias'), $respuinte->id);
            if (count($respuenferinte) > 0) {
                $rTRD = $rTRD + 0.6;
            }
            // Enfermedades infecciosas

            // No acceso a servicio de salud
            if ($respuinte->afi_entidad == "NINGUNA") {
                $rTRD = $rTRD + 0.5;
            }
            // No acceso a servicio de salud

            // Consumo SPA
            if ($respude6a11->sustanciaspsico == "Spa") {
                $rTRD = $rTRD + 0.5;
            }
            // Consumo SPA

            // NBI
            $NBI = self::calcularNBI($id_hogar);
            if ($NBI == "SI") {
                $rTRD = $rTRD + 0.9;
            }
            // NBI

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRD = $rTRD + 0.5;
            }
            // NO agua potable

            // IMC  -2 a < -1
            $imc = self::CalculosPerimetros("IMC1", $respuinte->fecha_nac, $respuinte->sexo, $respude6a11);
            if ($imc >= -2 && $imc <= -1) {
                $rTRD = $rTRD + 4;
            }
            // IMC  -2 a < -1
            // // // // // // // // // //  Riesgo de delgadez

            // // // // // // // // // //  RIESGO DE RETRASO  EN TALLA
            $rTRRT = 0;
            // Talla para edad  -2 Y -1
            if ($respude6a11->te >= -2 && $respude6a11->te <= -1) {
                $rTRRT = $rTRRT + 3;
            }
            // Talla para edad  -2 Y -1

            // Enfermedades infecciosas
            if (count($respuenferinte) > 0) {
                $rTRRT = $rTRRT + 1;
            }
            // Enfermedades infecciosas

            // No acceso a servicio de salud
            if ($respuinte->afi_entidad == "NINGUNA") {
                $rTRRT = $rTRRT + 0.5;
            }
            // No acceso a servicio de salud

            // Consumo SPA
            if ($respude6a11->sustanciaspsico == "Spa") {
                $rTRRT = $rTRRT + 0.5;
            }
            // Consumo SPA

            // NBI
            if ($NBI == "SI") {
                $rTRRT = $rTRRT + 1;
            }
            // NBI

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRRT = $rTRRT + 1;
            }
            // NO agua potable
            // // // // // // // // // //  RIESGO DE RETRASO  EN TALLA

            // // // // // // // // // //  Enfermedades Infecciosas
            $rTEI = 0;
            // Talla baja para la edad
            if ($respude6a11->te < -2) {
                $rTEI = $rTEI + 0.5;
            }
            // Talla baja para la edad

            // Delgadez
            if ($imc < -2) {
                $rTEI = $rTEI + 0.6;
            }
            // Delgadez

            // Riesgos de delgadez
            $proba = 0;
            if ($rTRD == 0) {
                $proba = 1;
            } else {
                if ($proba >= 0.1 && $proba < 1) {
                    $proba = 2;
                } else {
                    if ($proba >= 1 && $proba < 3.5) {
                        $proba = 3;
                    } else {
                        if ($proba >= 3.5 && $proba < 6) {
                            $proba = 4;
                        } else {
                            $proba = 5;
                        }
                    }
                }
            }
            $res = $proba * 4;

            if ($res > 8) {
                $rTEI = $rTEI + 0.5;
            }
            // Riesgos de delgadez

            // No Vacunación

            // No Vacunación

            // plagas
            if ($respuvivi->plagas == "SI") {
                $rTEI = $rTEI + 0.6;
            }
            // plagas

            // Manejo inadecuado  de residuos

            // Manejo inadecuado  de residuos

            // Malas condiciones de la vivienda

            // Malas condiciones de la vivienda

            // Enfermedades inmunosupresoras

            // Enfermedades inmunosupresoras

            // No desparacitado

            // No desparacitado

            // Baño compartido
            if ($respuvivi->cuantos_baños <= 1) {
                $rTEI = $rTEI + 0.6;
            }
            // Baño compartido

            // Lotes enmontados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEI = $rTEI + 0.6;
            }
            // Lotes enmontados

            // relleno sanitario cerda de la vivienda
            if ($respuvivi->rellenos == "SI") {
                $rTEI = $rTEI + 0.62;
            }
            // relleno sanitario cerda de la vivienda

            // no lavar la verduras y frutas antes de comer

            // no lavar la verduras y frutas antes de comer

            // Ningun tratamiento para el consumo de agua
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEI = $rTEI + 0.65;
            }
            // Ningun tratamiento para el consumo de agua

            // Hacinamiento
            $hacinamiento = self::hacinamiento($id_hogar);
            if ($hacinamiento == "SI") {
                $rTEI = $rTEI + 0.54;
            }
            // Hacinamiento

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // No acceso agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTEI = $rTEI + 0.7;
            }
            // No acceso agua potable

            // // // // // // // // // //  Enfermedades Infecciosas

            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA
            $rTTAUS = 0;
            // Consumo SPA
            if ($respude6a11->sustanciaspsico == "Spa") {
                $rTTAUS = $rTTAUS + 5;
            }
            // Consumo SPA

            // Consumo pasivo de SPA
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTTAUS = $rTTAUS + 2;
            }
            // Consumo pasivo de SPA
            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA

            // // // // // // // // // //  CONSUMO DE  SPA
            $rTCDS = 0;
            // Violencia intrafamiliar
            if ($respude6a11->maltrato == "SI") {
                $rTCDS = $rTCDS + 0.8;
            }
            // Violencia intrafamiliar

            // Mala relaciones con familiares
            if ($respude6a11->padre == "4" || $respude6a11->madre == "4" || $respude6a11->hermanos == "4" || $respude6a11->conyuge == "4") {
                $rTCDS = $rTCDS + 1;
            }
            // Mala relaciones con familiares

            // Pobreza

            // Pobreza

            // Madre cabeza de Hogar

            // Madre cabeza de Hogar

            // Enfermedades mentales

            // Enfermedades mentales

            // Consumo de Spa en la vivienda
            if ($consufact->sustancias_psico == "SI") {
                $rTCDS = $rTCDS + 1.2;
            }
            // Consumo de Spa en la vivienda

            // Consumo de alcohol
            if ($respude6a11->sustanciaspsico == "Alcohol") {
                $rTCDS = $rTCDS + 0.8;
            }
            // Consumo de alcohol

            // Problemas de conducta
            if ($respude6a11->conducta == "SI") {
                $rTCDS = $rTCDS + 0.8;
            }
            // Problemas de conducta
            // // // // // // // // // //  CONSUMO DE  SPA

            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA
            $rTECA = 0;

            // Hiperlipemia

            // Hiperlipemia

            // Antecedentes familiares

            // Antecedentes familiares

            // Sedentario

            // Sedentario

            // obesidad
            if ($imc > 2) {
                $rTECA = $rTECA + 1.5;
            }
            // obesidad

            // Diabetes
            $antediabetes = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "DIABETES");
            if ($antediabetes > 0) {
                $rTECA = $rTECA + 1;
            }
            // Diabetes

            // Sobrepeso
            if ($imc >= 1 && $imc <= 2) {
                $rTECA = $rTECA + 0.5;
            }
            // Sobrepeso

            // Cosumos de SPA
            if ($respude6a11->sustanciaspsico == "Spa") {
                $rTECA = $rTECA + 0.5;
            }
            // Cosumos de SPA

            // Hipertension arterial
            $antehipertension = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "HIPERTENSION");
            if ($antehipertension > 0) {
                $rTECA = $rTECA + 1.5;
            }
            // Hipertension arterial
            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA

            // // // // // // // // // // Cancer
            $rTC = 0;
            // Antecedentes en familiares
            $antecancer = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "CANCER");
            if ($antecancer > 0) {
                $rTC = $rTC + 1.2;
            }
            // Antecedentes en familiares

            // Contaminación ambiental
            $contambien = \App\RiesgosAmbientales::buscar(Session::get('alias'), $id_hogar);
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTC = $rTC + 0.8;
            }
            // Contaminación ambiental

            // consumo de tabaco o spa pasivo
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTC = $rTC + 0.8;
            }
            // consumo de tabaco o spa pasivo

            // Consumo de Alcohol
            if ($respude6a11->sustanciaspsico == "Alcohol") {
                $rTC = $rTC + 1.2;
            }
            // Consumo de Alcohol

            // sobrepeso / Obesidad
            if ($imc > 1) {
                $rTC = $rTC + 1;
            }
            // sobrepeso / Obesidad

            // consumo tabaco, SPA
            if ($respude6a11->sustanciaspsico == "Tabaco" || $respude6a11->sustanciaspsico == "Spa") {
                $rTC = $rTC + 3;
            }
            // consumo tabaco, SPA
            // // // // // // // // // // Cancer

            // // // // // // // // // // Alteraciones y transtornos visuales
            $rTATV = 0;
            // Antecedentes familiares
            $antealteraciones = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONES");
            if ($antealteraciones > 0) {
                $rTATV = $rTATV + 1.9;
            }
            // Antecedentes familiares

            // Hipertension arterial
            if ($antehipertension > 0) {
                $rTATV = $rTATV + 1.7;
            }
            // Hipertension arterial

            // consumo de alcohol
            if ($respude6a11->sustanciaspsico == "Alcohol") {
                $rTATV = $rTATV + 1.7;
            }
            // consumo de alcohol

            // Diabetes
            if ($antediabetes > 0) {
                $rTATV = $rTATV + 1.7;
            }
            // Diabetes
            // // // // // // // // // // Alteraciones y transtornos visuales

            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $rTATAC = 0;
            // antecedente familiar
            $antealteracionesaud = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONESAUD");
            if ($antealteracionesaud > 0) {
                $rTATAC = $rTATAC + 2;
            }
            // antecedente familiar

            // Exposicion a contaminación auditiva
            if ($contambien->riesgos_auditivo > 1) {
                $rTATAC = $rTATAC + 2;
            }
            // Exposicion a contaminación auditiva

            // Infecciones crónicas de oidos
            $enferoidos = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "OIDOS");
            if ($enferoidos > 0) {
                $rTATAC = $rTATAC + 3;
            }
            // Infecciones crónicas de oidos
            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // // // // // // // // // // Salud Bucal
            $rTSB = 0;

            // Presencia de caries
            if ($respude6a11->dientes_sanos == "SI") {
                $rTSB = $rTSB + 7;
                // Presencia de caries
            } else {
                // NBI
                if ($NBI == "SI") {
                    $rTSB = $rTSB + 1;
                }
                // NBI

                // Sin acceso a servicios odontologicos
                if ($respude6a11->consultaodon == "NO") {
                    $rTSB = $rTSB + 1;
                }
                // Sin acceso a servicios odontologicos

                // Malos hábitos de higiene oral
                if ($respude6a11->nocepillado < 3) {
                    $rTSB = $rTSB + 2;
                }
                // Malos hábitos de higiene oral

                // tabaco
                if ($respude6a11->sustanciaspsico == "Tabaco") {
                    $rTSB = $rTSB + 2;
                }
                // tabaco

                // consumo d alcohol
                if ($respude6a11->sustanciaspsico == "Alcohol") {
                    $rTSB = $rTSB + 1;
                }
                // consumo d alcohol
            }

            // // // // // // // // // // Salud Bucal

            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL
            $rTSM = 0;
            // Antecedente familiar
            $antesaludmental = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "SALUDMENTAL");
            if ($antesaludmental > 0) {
                $rTSM = $rTSM + 1.4;
            }
            // Antecedente familiar

            // Mala relaciones con familiares
            if ($respude6a11->padre == "4" || $respude6a11->madre == "4" || $respude6a11->hermanos == "4" || $respude6a11->conyuge == "4") {
                $rTSM = $rTSM + 1.2;
            }
            // Mala relaciones con familiares

            // Problemas de conducta
            if ($respude6a11->conducta == "SI") {
                $rTSM = $rTSM + 1.4;
            }
            // Problemas de conducta

            // consumo de SPA
            if ($respude6a11->sustanciaspsico == "Spa") {
                $rTSM = $rTSM + 2;
            }
            // consumo de SPA

            // Violencia intrafamiliar
            if ($respude6a11->maltrato == "SI") {
                $rTSM = $rTSM + 1;
            }
            // Violencia intrafamiliar
            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL

            // // // // // // // // // // VIOLENCIAS
            $rTV = 0;
            // Antecedentes de Violencia  intrafamiliar
            if ($consufact->violencia_fisica == "SI") {
                $rTV = $rTV + 1;
            }
            // Antecedentes de Violencia  intrafamiliar

            // Transtornos mentales
            $anteconducta = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id, "CONDUCTA");
            if ($anteconducta > 0) {
                $rTV = $rTV + 0.5;
            }
            // Transtornos mentales

            // Consumo de SPA en la vivienda
            if ($consufact->sustancias_psico == "SI") {
                $rTV = $rTV + 1;
            }
            // Consumo de SPA en la vivienda

            // Problemas de conducta
            if ($respude6a11->conducta == "SI") {
                $rTV = $rTV + 1;
            }
            // Problemas de conducta

            // Conusmo de SPA EN LA FAMILIA
            $consufactfami = \App\Factores::buscarFactFami(Session::get('alias'), $id_hogar, $respuinte->jefe);
            if ($consufactfami->sustancias_psico == "SI") {
                $rTV = $rTV + 1;
            }
            // Conusmo de SPA EN LA FAMILIA

            // Señales de violencia
            if ($respude6a11->maltrato == "SI") {
                $rTV = $rTV + 2;
            }
            // Señales de violencia

            // Mala relación con familiares
            if ($respude6a11->padre == "4" || $respude6a11->madre == "4" || $respude6a11->hermanos == "4" || $respude6a11->conyuge == "4") {
                $rTV = $rTV + 0.5;
            }
            // Mala relación con familiares
            // // // // // // // // // // VIOLENCIAS

            // // // // // // // // // // Enfermedades Respiratorias
            $rTERC = 0;
            // ViVienda Cocina con leña o carbón
            if ($respuvivi->tipo_combustible == "3" || $respuvivi->tipo_combustible == "4") {
                $rTERC = $rTERC + 2;
            }
            // ViVienda Cocina con leña o carbón

            // Antecedentes familiares de enfermedades respiratorias cronicas
            $anteenferrespi = \App\AntecedentesIntegrantes::buscarAntePorId(Session::get('alias'), $id_hogar, "ENFERRESPI", $respuinte->id);
            if ($anteenferrespi > 0) {
                $rTERC = $rTERC + 0.5;
            }
            // Antecedentes familiares de enfermedades respiratorias cronicas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTERC = $rTERC + 0.5;
            }
            // Contaminación ambiental

            // consumo de tabaco y SPA
            if ($respude6a11->sustanciaspsico == "Spa" || $respude6a11->sustanciaspsico == "Tabaco") {
                $rTERC = $rTERC + 3;
            }
            // consumo de tabaco y SPA

            // Consumo pasivo de humo de tabaco o SPA
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTERC = $rTERC + 2;
            }
            // Consumo pasivo de humo de tabaco o SPA
            // // // // // // // // // // Enfermedades Respiratorias

            // // // // // // // // // // ENFERMEDADES ZOONOTICAS
            $rTEZ = 0;
            // Cria de animales (mas de 2  domesticos)
            $anidomes = \App\Animal::buscar(Session::get('alias'), $id_hogar);
            if (count($anidomes) > 2) {
                $rTEZ = $rTEZ + 2;
            }
            // Cria de animales (mas de 2  domesticos)

            // No vacunación de animales
            $anidomesvacuna = \App\Animal::buscarVacunados(Session::get('alias'), $id_hogar);
            if (count($anidomesvacuna) > 2) {
                $rTEZ = $rTEZ + 2;
            }
            // No vacunación de animales

            // Consumo de agua no potable.
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEZ = $rTEZ + 1;
            }
            // Consumo de agua no potable.

            // Manejo de residuos
            if ($respuvivi->destino_final_basura != "1" || $respuvivi->almacenamiento_residuos != "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // Manejo de residuos

            // No inmunizado

            // No inmunizado

            // Lotes abandonados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // Lotes abandonados

            // NBI
            if ($NBI == "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // NBI

            // Mal estado de la vivienda
            if ($respuvivi->material_predominante == "5" || $respuvivi->material_predominante == "7"
                || $respuvivi->tipo_estructura == "5" || $respuvivi->tipo_cubierta == "2"
                || $respuvivi->tipo_cubierta == "6" || $respuvivi->tipo_cubierta == "8" || $respuvivi->tipo_cubierta == "9") {
                $rTEZ = $rTEZ + 1;
            }
            // Mal estado de la vivienda
            // // // // // // // // // // ENFERMEDADES ZOONOTICAS

            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $rTTDNEA = 0;
            // Antecedente familiar
            $antetranstornos = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "TRANSTORNOS");
            if ($antetranstornos > 0) {
                $rTTDNEA = $rTTDNEA + 2;
            }
            // Antecedente familiar

            // Consumo de SPA
            if ($respude6a11->sustanciaspsico == "Spa" || $respude6a11->sustanciaspsico == "Tabaco") {
                $rTTDNEA = $rTTDNEA + 2;
            }
            // Consumo de SPA

            // Enfermedades infecciosas
            if (count($respuenferinte) > 0) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Enfermedades infecciosas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Contaminación ambiental

            // Desnutrición

            // Desnutrición
            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["enfermedades_infecciosas_I"] = $rTEI;
            $datos["transtornos_asociados_spa_I"] = $rTTAUS;
            $datos["enfermedad_cardiovascular_I"] = $rTECA;
            $datos["cancer_I"] = $rTC;
            $datos["alteraciones_transtornos_visuales_I"] = $rTATV;
            $datos["alteraciones_transtornos_audicion_I"] = $rTATAC;
            $datos["salud_bucal_I"] = $rTSB;
            $datos["problemas_salud_mental_I"] = $rTSM;
            $datos["violencias_I"] = $rTV;
            $datos["enfermedades_respiratorias_I"] = $rTERC;
            $datos["enfermedades_zoonoticas_I"] = $rTEZ;
            $datos["transtornos_degenartivos_I"] = $rTTDNEA;
            $datos["consumo_spa_I"] = $rTCDS;
            $datos["riesgo_talla_baja_I"] = $rTRRT;
            $datos["riesgo_delgadez_I"] = $rTRD;
            $resultado = self::calculosSaludInherente($datos, "DE6A11", $id_hogar, $respude6a11->id_integrante);
        }
        // // // // // // // // // // De6A11 // // // // // // // // // //

        // // // // // // // // // // De12A17 // // // // // // // // // //
        if ($opcion == "De12A17") {
            $respuinte = \App\Integrante::buscar($identificacion, Session::get('alias'));
            $respujefe = \App\Caracterizacion::buscar($identificacion, Session::get('alias'));
            $respude12a17 = \App\De12a17::buscarPorIdentificacion(Session::get('alias'), $identificacion);

            // // // // // // // // // //  Riesgo de delgadez
            $rTRD = 0;
            // Enfermedades infecciosas
            $respuenferinte = \App\EnfermedadesIntegrantes::buscarInfecciosas(Session::get('alias'), $respuinte->id ?? 0);
            $respuenferjefe = \App\EnfermedadesJefes::buscarInfecciosas(Session::get('alias'), $respujefe->id ?? 0);

            if ((count($respuenferinte) + count($respuenferjefe)) > 0) {
                $rTRD = $rTRD + 0.6;
            }
            // Enfermedades infecciosas

            // No acceso a servicio de salud
            if ($respuinte->afi_entidad ?? '' == "NINGUNA" || $respujefe->afiliacion_entidad ?? '' == "NINGUNA") {
                $rTRD = $rTRD + 0.5;
            }
            // No acceso a servicio de salud

            // Consumo SPA
            if ($respude12a17->spa == "SI") {
                $rTRD = $rTRD + 0.5;
            }
            // Consumo SPA

            // NBI
            $NBI = self::calcularNBI($id_hogar);
            if ($NBI == "SI") {
                $rTRD = $rTRD + 0.9;
            }
            // NBI

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRD = $rTRD + 0.5;
            }
            // NO agua potable

            // IMC  -2 a < -1
            $imc = self::CalculosPerimetros("IMC1", $respuinte->fecha_nac ?? $respujefe->fecha_nacimiento, $respuinte->sexo ?? $respujefe->sexo, $respude12a17);
            if ($imc >= -2 && $imc <= -1) {
                $rTRD = $rTRD + 4;
            }
            // IMC  -2 a < -1
            // // // // // // // // // //  Riesgo de delgadez

            // // // // // // // // // //  RIESGO DE RETRASO  EN TALLA
            $rTRRT = 0;
            // Talla para edad  -2 Y -1
            if ($respude12a17->te >= -2 && $respude12a17->te <= -1) {
                $rTRRT = $rTRRT + 3;
            }
            // Talla para edad  -2 Y -1

            // Enfermedades infecciosas
            if ((count($respuenferinte) + count($respuenferjefe)) > 0) {
                $rTRRT = $rTRRT + 1;
            }
            // Enfermedades infecciosas

            // No acceso a servicio de salud
            if ($respuinte->afi_entidad ?? '' == "NINGUNA" || $respujefe->afiliacion_entidad ?? '' == "NINGUNA") {
                $rTRRT = $rTRRT + 0.5;
            }
            // No acceso a servicio de salud

            // Consumo SPA
            if ($respude12a17->spa == "SI") {
                $rTRRT = $rTRRT + 0.5;
            }
            // Consumo SPA

            // NBI
            if ($NBI == "SI") {
                $rTRRT = $rTRRT + 1;
            }
            // NBI

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRRT = $rTRRT + 1;
            }
            // NO agua potable
            // // // // // // // // // //  RIESGO DE RETRASO  EN TALLA

            // // // // // // // // // //  Enfermedades Infecciosas
            $rTEI = 0;
            // Talla baja para la edad
            if ($respude12a17->te < -2) {
                $rTEI = $rTEI + 0.5;
            }
            // Talla baja para la edad

            // Delgadez
            if ($imc < -2) {
                $rTEI = $rTEI + 0.62;
            }
            // Delgadez

            // No Vacunación

            // No Vacunación

            // plagas
            if ($respuvivi->plagas == "SI") {
                $rTEI = $rTEI + 0.62;
            }
            // plagas

            // Manejo inadecuado  de residuos

            // Manejo inadecuado  de residuos

            // Malas condiciones de la vivienda

            // Malas condiciones de la vivienda

            // Hacinamiento
            $hacinamiento = self::hacinamiento($id_hogar);
            if ($hacinamiento == "SI") {
                $rTEI = $rTEI + 0.52;
            }
            // Hacinamiento

            // Riesgos de delgadez
            $proba = 0;
            if ($rTRD == 0) {
                $proba = 1;
            } else {
                if ($proba >= 0.1 && $proba < 1) {
                    $proba = 2;
                } else {
                    if ($proba >= 1 && $proba < 3.5) {
                        $proba = 3;
                    } else {
                        if ($proba >= 3.5 && $proba < 6) {
                            $proba = 4;
                        } else {
                            $proba = 5;
                        }
                    }
                }
            }
            $res = $proba * 4;

            if ($res > 8) {
                $rTEI = $rTEI + 0.4;
            }
            // Riesgos de delgadez

            // Enfermedades inmunosupresoras

            // Enfermedades inmunosupresoras

            // No desparacitado

            // No desparacitado

            // Baño compartido
            if ($respuvivi->cuantos_baños <= 1) {
                $rTEI = $rTEI + 0.6;
            }
            // Baño compartido

            // Lotes enmontados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEI = $rTEI + 0.6;
            }
            // Lotes enmontados

            // no lavar la verduras y frutas antes de comer

            // no lavar la verduras y frutas antes de comer

            // relleno sanitario cerda de la vivienda
            if ($respuvivi->rellenos == "SI") {
                $rTEI = $rTEI + 0.62;
            }
            // relleno sanitario cerda de la vivienda

            // Ningun tratamiento para el consumo de agua
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEI = $rTEI + 0.65;
            }
            // Ningun tratamiento para el consumo de agua

            // No acceso agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTEI = $rTEI + 0.7;
            }
            // No acceso agua potable

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // // // // // // // // // //  Enfermedades Infecciosas

            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA
            $rTTAUS = 0;
            // Consumo SPA
            if ($respude12a17->spa == "SI") {
                $rTTAUS = $rTTAUS + 5;
            }
            // Consumo SPA

            // Consumo pasivo de SPA
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTTAUS = $rTTAUS + 2;
            }
            // Consumo pasivo de SPA
            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA

            // // // // // // // // // //  CONSUMO DE  SPA
            $rTCDS = 0;
            // Violencia intrafamiliar
            if ($respude12a17->maltrato == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Violencia intrafamiliar

            // Mala relaciones con familiares
            if ($respude12a17->padre == "4" || $respude12a17->madre == "4" || $respude12a17->hermanos == "4" || $respude12a17->conyuge == "4") {
                $rTCDS = $rTCDS + 1;
            }
            // Mala relaciones con familiares

            // Pobreza

            // Pobreza

            // Madre cabeza de Hogar

            // Madre cabeza de Hogar

            // Enfermedades mentales

            // Enfermedades mentales

            // Problemas de conducta
            if ($respude12a17->conducta == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Problemas de conducta

            // Consumo de Spa en la vivienda
            if ($consufact->sustancias_psico == "SI") {
                $rTCDS = $rTCDS + 2;
            }
            // Consumo de Spa en la vivienda

            // Consumo de alcohol
            if ($respude12a17->alcohol == "SI") {
                $rTCDS = $rTCDS + 0.5;
            }
            // Consumo de alcohol
            // // // // // // // // // //  CONSUMO DE  SPA

            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA
            $rTECA = 0;

            // Sedentario

            // Sedentario

            // Cosumos de SPA
            if ($respude12a17->spa == "SI") {
                $rTECA = $rTECA + 0.5;
            }
            // Cosumos de SPA

            // Sobrepeso
            if ($imc >= 1 && $imc <= 2) {
                $rTECA = $rTECA + 0.5;
            }
            // Sobrepeso

            // Hipertension arterial
            $antehipertension = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "HIPERTENSION");
            $antehipertension2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "HIPERTENSION");
            if (($antehipertension + $antehipertension2) > 0) {
                $rTECA = $rTECA + 1.5;
            }
            // Hipertension arterial

            // Hiperlipemia

            // Hiperlipemia

            // obesidad
            if ($imc > 2) {
                $rTECA = $rTECA + 1.5;
            }
            // obesidad

            // Antecedentes familiares

            // Antecedentes familiares

            // Diabetes
            $antediabetes = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "DIABETES");
            $antediabetes2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "DIABETES");
            if (($antediabetes + $antediabetes2) > 0) {
                $rTECA = $rTECA + 1;
            }
            // Diabetes
            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA

            // // // // // // // // // // Cancer
            $rTC = 0;
            // Antecedentes en familiares
            $antecancer = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "CANCER");
            if ($antecancer > 0) {
                $rTC = $rTC + 2;
            }
            // Antecedentes en familiares

            // Contaminación ambiental
            $contambien = \App\RiesgosAmbientales::buscar(Session::get('alias'), $id_hogar);
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTC = $rTC + 0.5;
            }
            // Contaminación ambiental

            // sobrepeso / Obesidad
            if ($imc > 1) {
                $rTC = $rTC + 0.5;
            }
            // sobrepeso / Obesidad

            // consumo SPA
            if ($respude12a17->spa == "SI") {
                $rTC = $rTC + 1.5;
            }
            // consumo SPA

            // consumo tabaco
            if ($respude12a17->fuma == "SI") {
                $rTC = $rTC + 1.5;
            }
            // consumo tabaco

            // consumo de tabaco pasivo
            if ($consufact->tabaco == "SI") {
                $rTC = $rTC + 1;
            }
            // consumo de tabaco pasivo

            // consumo tabaco
            if ($respude12a17->alcohol == "SI") {
                $rTC = $rTC + 1;
            }
            // consumo tabaco

            // Examen de mama anormal

            // Examen de mama anormal

            // citología anormal /examen de prostota anormal

            // citología anormal /examen de prostota anormal
            // // // // // // // // // // Cancer

            // // // // // // // // // // Alteraciones y transtornos visuales
            $rTATV = 0;
            // Antecedentes familiares
            $antealteraciones = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONES");
            if ($antealteraciones > 0) {
                $rTATV = $rTATV + 1.9;
            }
            // Antecedentes familiares

            // consumo de alcohol
            if ($respude12a17->alcohol == "SI" || $respude12a17->fuma == "SI") {
                $rTATV = $rTATV + 1.7;
            }
            // consumo de alcohol

            // Diabetes
            if ($antediabetes > 0) {
                $rTATV = $rTATV + 1.7;
            }
            // Diabetes

            // Hipertension arterial
            if ($antehipertension > 0) {
                $rTATV = $rTATV + 1.7;
            }
            // Hipertension arterial
            // // // // // // // // // // Alteraciones y transtornos visuales

            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $rTATAC = 0;
            // antecedente familiar
            $antealteracionesaud = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONESAUD");
            if ($antealteracionesaud > 0) {
                $rTATAC = $rTATAC + 2;
            }
            // antecedente familiar

            // Exposicion a contaminación auditiva
            if ($contambien->riesgos_auditivo > 1) {
                $rTATAC = $rTATAC + 2;
            }
            // Exposicion a contaminación auditiva

            // Infecciones crónicas de oidos
            $enferoidos = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "OIDOS");
            $enferoidos2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "OIDOS");
            if (($enferoidos + $enferoidos2) > 0) {
                $rTATAC = $rTATAC + 3;
            }
            // Infecciones crónicas de oidos
            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // // // // // // // // // // Salud Bucal
            $rTSB = 0;

            // Presencia de caries
            if ($respude12a17->dientes_sanos == "SI") {
                $rTSB = $rTSB + 7;
                // Presencia de caries
            } else {
                // NBI
                if ($NBI == "SI") {
                    $rTSB = $rTSB + 1;
                }
                // NBI

                // Sin acceso a servicios odontologicos
                if ($respude12a17->consultaodon == "NO") {
                    $rTSB = $rTSB + 1;
                }
                // Sin acceso a servicios odontologicos

                // Malos hábitos de higiene oral
                if ($respude12a17->nocepillado < 3) {
                    $rTSB = $rTSB + 2;
                }
                // Malos hábitos de higiene oral

                // tabaco
                if ($respude12a17->fuma == "SI") {
                    $rTSB = $rTSB + 2;
                }
                // tabaco

                // consumo d alcohol
                if ($respude12a17->alcohol == "SI") {
                    $rTSB = $rTSB + 1;
                }
                // consumo d alcohol
            }

            // // // // // // // // // // Salud Bucal

            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL
            $rTSM = 0;
            // Antecedente familiar
            $antesaludmental = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "SALUDMENTAL");
            if ($antesaludmental > 0) {
                $rTSM = $rTSM + 1.4;
            }
            // Antecedente familiar

            // Mala relaciones con familiares
            if ($respude12a17->padre == "4" || $respude12a17->madre == "4" || $respude12a17->hermanos == "4" || $respude12a17->conyuge == "4") {
                $rTSM = $rTSM + 1.2;
            }
            // Mala relaciones con familiares

            // Problemas de conducta
            if ($respude12a17->conducta == "SI") {
                $rTSM = $rTSM + 1.4;
            }
            // Problemas de conducta

            // consumo de SPA
            if ($respude12a17->spa == "SI") {
                $rTSM = $rTSM + 2;
            }
            // consumo de SPA

            // Violencia intrafamiliar
            if ($respude12a17->maltrato == "SI") {
                $rTSM = $rTSM + 1;
            }
            // Violencia intrafamiliar
            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL

            // // // // // // // // // // VIOLENCIAS
            $rTV = 0;
            // Antecedentes de Violencia  intrafamiliar
            if ($consufact->violencia_fisica == "SI") {
                $rTV = $rTV + 1;
            }
            // Antecedentes de Violencia  intrafamiliar

            // Transtornos mentales
            $anteconducta = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "CONDUCTA");
            $anteconducta2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "CONDUCTA");
            if (($anteconducta + $anteconducta2) > 0) {
                $rTV = $rTV + 0.5;
            }
            // Transtornos mentales

            // Consumo de SPA en la vivienda
            if ($consufact->sustancias_psico == "SI") {
                $rTV = $rTV + 1;
            }
            // Consumo de SPA en la vivienda

            // Problemas de conducta
            if ($respude12a17->conducta == "SI") {
                $rTV = $rTV + 1;
            }
            // Problemas de conducta

            // NBI
            if ($NBI == "SI") {
                $rTV = $rTV + 1;
            }
            // NBI

            // Señales de violencia
            if ($respude12a17->maltrato == "SI") {
                $rTV = $rTV + 2;
            }
            // Señales de violencia

            // Mala relación con familiares
            if ($respude12a17->padre == "4" || $respude12a17->madre == "4" || $respude12a17->hermanos == "4" || $respude12a17->conyuge == "4") {
                $rTV = $rTV + 0.5;
            }
            // Mala relación con familiares
            // // // // // // // // // // VIOLENCIAS

            // // // // // // // // // // Enfermedades Respiratorias
            $rTERC = 0;

            // consumo de tabaco
            if ($respude12a17->fuma == "SI") {
                $rTERC = $rTERC + 2.5;
            }
            // consumo de tabaco

            // consumo de SPA
            if ($respude12a17->spa == "SI") {
                $rTERC = $rTERC + 2;
            }
            // consumo de SPA

            // ViVienda Cocina con leña o carbón
            if ($respuvivi->tipo_combustible == "3" || $respuvivi->tipo_combustible == "4") {
                $rTERC = $rTERC + 1.5;
            }
            // ViVienda Cocina con leña o carbón

            // Antecedentes familiares de enfermedades respiratorias cronicas
            $anteenferrespi = \App\AntecedentesIntegrantes::buscarAntePorId(Session::get('alias'), $id_hogar, "ENFERRESPI", $respuinte->id ?? $respujefe->id);
            if ($anteenferrespi > 0) {
                $rTERC = $rTERC + 0.5;
            }
            // Antecedentes familiares de enfermedades respiratorias cronicas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTERC = $rTERC + 0.5;
            }
            // Contaminación ambiental

            // Consumo pasivo de humo de tabaco o SPA
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTERC = $rTERC + 1;
            }
            // Consumo pasivo de humo de tabaco o SPA
            // // // // // // // // // // Enfermedades Respiratorias

            // // // // // // // // // // ENFERMEDADES ZOONOTICAS
            $rTEZ = 0;
            // Cria de animales (mas de 2  domesticos)
            $anidomes = \App\Animal::buscar(Session::get('alias'), $id_hogar);
            if (count($anidomes) > 2) {
                $rTEZ = $rTEZ + 2.25;
            }
            // Cria de animales (mas de 2  domesticos)

            // No vacunación de animales
            $anidomesvacuna = \App\Animal::buscarVacunados(Session::get('alias'), $id_hogar);
            if (count($anidomesvacuna) > 2) {
                $rTEZ = $rTEZ + 2;
            }
            // No vacunación de animales

            // Consumo de agua no potable.
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEZ = $rTEZ + 1.25;
            }
            // Consumo de agua no potable.

            // Manejo de residuos
            if ($respuvivi->destino_final_basura != "1" || $respuvivi->almacenamiento_residuos != "SI") {
                $rTEZ = $rTEZ + 1.25;
            }
            // Manejo de residuos

            // Lotes abandonados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // Lotes abandonados

            // NBI
            if ($NBI == "SI") {
                $rTEZ = $rTEZ + 1.25;
            }
            // NBI

            // Mal estado de la vivienda
            if ($respuvivi->material_predominante == "5" || $respuvivi->material_predominante == "7"
                || $respuvivi->tipo_estructura == "5" || $respuvivi->tipo_cubierta == "2"
                || $respuvivi->tipo_cubierta == "6" || $respuvivi->tipo_cubierta == "8" || $respuvivi->tipo_cubierta == "9") {
                $rTEZ = $rTEZ + 1;
            }
            // Mal estado de la vivienda
            // // // // // // // // // // ENFERMEDADES ZOONOTICAS

            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $rTTDNEA = 0;
            // Antecedente familiar
            $antetranstornos = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "TRANSTORNOS");
            if ($antetranstornos > 0) {
                $rTTDNEA = $rTTDNEA + 2;
            }
            // Antecedente familiar

            // Consumo de SPA
            if ($respude12a17->spa == "SI") {
                $rTTDNEA = $rTTDNEA + 2;
            }
            // Consumo de SPA

            // Enfermedades infecciosas
            if ((count($respuenferinte) + count($respuenferjefe)) > 0) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Enfermedades infecciosas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Contaminación ambiental

            // Desnutrición

            // Desnutrición
            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["enfermedades_infecciosas_I"] = $rTEI;
            $datos["transtornos_asociados_spa_I"] = $rTTAUS;
            $datos["enfermedad_cardiovascular_I"] = $rTECA;
            $datos["cancer_I"] = $rTC;
            $datos["alteraciones_transtornos_visuales_I"] = $rTATV;
            $datos["alteraciones_transtornos_audicion_I"] = $rTATAC;
            $datos["salud_bucal_I"] = $rTSB;
            $datos["problemas_salud_mental_I"] = $rTSM;
            $datos["violencias_I"] = $rTV;
            $datos["enfermedades_respiratorias_I"] = $rTERC;
            $datos["enfermedades_zoonoticas_I"] = $rTEZ;
            $datos["transtornos_degenartivos_I"] = $rTTDNEA;
            $datos["consumo_spa_I"] = $rTCDS;
            $datos["riesgo_talla_baja_I"] = $rTRRT;
            $datos["riesgo_delgadez_I"] = $rTRD;
            $resultado = self::calculosSaludInherente($datos, "DE12A17", $id_hogar, $respude12a17->id_integrante);

        }
        // // // // // // // // // // De12A17 // // // // // // // // // //

        // // // // // // // // // // De18A28 // // // // // // // // // //
        if ($opcion == "De18A28") {
            $respuinte = \App\Integrante::buscar($identificacion, Session::get('alias'));
            $respujefe = \App\Caracterizacion::buscar($identificacion, Session::get('alias'));
            $respude18a28 = \App\De18a28::buscarPorIdentificacion(Session::get('alias'), $identificacion);

            // // // // // // // // // //  Riesgo de delgadez
            $rTRD = 0;
            // Enfermedades infecciosas
            $respuenferinte = \App\EnfermedadesIntegrantes::buscarInfecciosas(Session::get('alias'), $respuinte->id ?? 0);
            $respuenferjefe = \App\EnfermedadesJefes::buscarInfecciosas(Session::get('alias'), $respujefe->id ?? 0);

            if ((count($respuenferinte) + count($respuenferjefe)) > 0) {
                $rTRD = $rTRD + 0.8;
            }
            // Enfermedades infecciosas

            // Consumo SPA
            if ($respude18a28->spa == "SI") {
                $rTRD = $rTRD + 0.8;
            }
            // Consumo SPA

            // NBI
            $NBI = self::calcularNBI($id_hogar);
            if ($NBI == "SI") {
                $rTRD = $rTRD + 1.2;
            }
            // NBI

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRD = $rTRD + 0.8;
            }
            // NO agua potable

            // IMC  -2 a < -1
            if ($respude18a28->imc >= "18.5" && $respude18a28->imc <= "19.5") {
                $rTRD = $rTRD + 3.4;
            }
            // IMC  -2 a < -1
            // // // // // // // // // //  Riesgo de delgadez

            // // // // // // // // // //  Enfermedades Infecciosas
            $rTEI = 0;

            // Delgadez
            if ($respude18a28->imc < "18.5") {
                $rTEI = $rTEI + 0.6;
            }
            // Delgadez

            // plagas
            if ($respuvivi->plagas == "SI") {
                $rTEI = $rTEI + 0.7;
            }
            // plagas

            // Manejo inadecuado  de residuos

            // Manejo inadecuado  de residuos

            // Malas condiciones de la vivienda

            // Malas condiciones de la vivienda

            // Hacinamiento
            $hacinamiento = self::hacinamiento($id_hogar);
            if ($hacinamiento == "SI") {
                $rTEI = $rTEI + 0.62;
            }
            // Hacinamiento

            // Enfermedades inmunosupresoras

            // Enfermedades inmunosupresoras

            // No desparacitado

            // No desparacitado

            // No Vacunación

            // No Vacunación

            // Riesgos de delgadez
            $proba = 0;
            if ($rTRD == 0) {
                $proba = 1;
            } else {
                if ($proba >= 0.1 && $proba < 0.5) {
                    $proba = 2;
                } else {
                    if ($proba >= 0.5 && $proba < 3.4) {
                        $proba = 3;
                    } else {
                        if ($proba >= 3.4 && $proba < 6.1) {
                            $proba = 4;
                        } else {
                            $proba = 5;
                        }
                    }
                }
            }
            $res = $proba * 4;

            if ($res > 8) {
                $rTEI = $rTEI + 0.4;
            }
            // Riesgos de delgadez

            // Baño compartido
            if ($respuvivi->cuantos_baños <= 1) {
                $rTEI = $rTEI + 0.6;
            }
            // Baño compartido

            // Lotes enmontados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEI = $rTEI + 0.64;
            }
            // Lotes enmontados

            // no lavar la verduras y frutas antes de comer

            // no lavar la verduras y frutas antes de comer

            // relleno sanitario cerda de la vivienda
            if ($respuvivi->rellenos == "SI") {
                $rTEI = $rTEI + 0.8;
            }
            // relleno sanitario cerda de la vivienda

            // Ningun tratamiento para el consumo de agua
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEI = $rTEI + 0.8;
            }
            // Ningun tratamiento para el consumo de agua

            // No acceso agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTEI = $rTEI + 0.8;
            }
            // No acceso agua potable

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // // // // // // // // // //  Enfermedades Infecciosas

            // // // // // // // // // //  CONSUMO DE  SPA
            $rTCDS = 0;

            // Mala relaciones con familiares

            // Mala relaciones con familiares

            // NBI
            if ($NBI == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // NBI

            // Enfermedades mentales

            // Enfermedades mentales

            // Problemas de conducta
            if ($respude18a28->conducta == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Problemas de conducta

            // Consumo de Spa en la vivienda
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Consumo de Spa en la vivienda

            // Consumo de alcohol
            if ($respude18a28->alcohol == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Consumo de alcohol

            // Consumo de alcohol
            if ($respude18a28->empleo == "NO") {
                $rTCDS = $rTCDS + 1;
            }
            // Consumo de alcohol
            // // // // // // // // // //  CONSUMO DE  SPA

            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA
            $rTTAUS = 0;
            // Consumo SPA
            if ($respude18a28->spa == "SI") {
                $rTTAUS = $rTTAUS + 5;
            }
            // Consumo SPA

            // Consumo pasivo de SPA
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTTAUS = $rTTAUS + 2;
            }
            // Consumo pasivo de SPA
            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA

            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA
            $rTECA = 0;

            // Sedentario

            // Sedentario

            // Cosumos de SPA
            if ($respude18a28->spa == "SI") {
                $rTECA = $rTECA + 0.5;
            }
            // Cosumos de SPA

            // Sobrepeso
            if ($respude18a28->imc >= "25" && $respude18a28->imc <= "30") {
                $rTECA = $rTECA + 0.5;
            }
            // Sobrepeso

            // Hipertension arterial
            $antehipertension = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "HIPERTENSION");
            $antehipertension2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "HIPERTENSION");
            if (($antehipertension + $antehipertension2) > 0) {
                $rTECA = $rTECA + 1;
            }
            // Hipertension arterial

            // P.C Hombre 102 a 115 / Mujeres 88 a 100 cm
            if ($respuinte->sexo ?? '' == "MASCULINO" || $respujefe->sexo ?? '' == "MASCULINO") {
                if ($respude18a28->pcintura >= "102" && $respude18a28->pcintura >= "115") {
                    $rTECA = $rTECA + 0.6;
                }
            } else {
                if ($respuinte->sexo ?? '' == "FEMENINO" || $respujefe->sexo ?? '' == "FEMENINO") {
                    if ($respude18a28->pcintura >= "88" && $respude18a28->pcintura >= "100") {
                        $rTECA = $rTECA + 0.6;
                    }
                }
            }
            // P.C Hombre 102 a 115 / Mujeres 88 a 100 cm

            // P.C Hombre mayor a 115 / Mujeres Mayor  a 100 cm
            if ($respuinte->sexo ?? '' == "MASCULINO" || $respujefe->sexo ?? '' == "MASCULINO") {
                if ($respude18a28->pcintura > "115") {
                    $rTECA = $rTECA + 1;
                }
            } else {
                if ($respuinte->sexo ?? '' == "FEMENINO" || $respujefe->sexo ?? '' == "FEMENINO") {
                    if ($respude18a28->pcintura >= "100") {
                        $rTECA = $rTECA + 1;
                    }
                }
            }
            // P.C Hombre mayor a 115 / Mujeres Mayor  a 100 cm

            // Hiperlipemia

            // Hiperlipemia

            // obesidad
            if ($respude18a28->imc >= "25" && $respude18a28->imc <= "30") {
                $rTECA = $rTECA + 1.5;
            }
            // obesidad

            // Antecedentes familiares

            // Antecedentes familiares

            // Diabetes
            $antediabetes = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "DIABETES");
            $antediabetes2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "DIABETES");
            if (($antediabetes + $antediabetes2) > 0) {
                $rTECA = $rTECA + 1;
            }
            // Diabetes
            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA

            // // // // // // // // // // Cancer
            $rTC = 0;
            // Antecedentes en familiares
            $antecancer = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "CANCER");
            if ($antecancer > 0) {
                $rTC = $rTC + 1;
            }
            // Antecedentes en familiares

            // Contaminación ambiental
            $contambien = \App\RiesgosAmbientales::buscar(Session::get('alias'), $id_hogar);
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTC = $rTC + 0.5;
            }
            // Contaminación ambiental

            // Obesidad
            if ($respude18a28->imc >= "25" && $respude18a28->imc <= "30") {
                $rTC = $rTC + 1.5;
            }
            // Obesidad

            // consumo SPA
            if ($respude18a28->spa == "SI") {
                $rTC = $rTC + 1.2;
            }
            // consumo SPA

            // consumo tabaco
            if ($respude18a28->fuma == "SI") {
                $rTC = $rTC + 1.5;
            }
            // consumo tabaco

            // consumo de tabaco pasivo
            if ($consufact->tabaco == "SI") {
                $rTC = $rTC + 1;
            }
            // consumo de tabaco pasivo

            // consumo alcohol
            if ($respude18a28->alcohol == "SI") {
                $rTC = $rTC + 1.3;
            }
            // consumo alcohol

            // // // // // // // // // // Cancer

            // // // // // // // // // // Alteraciones y transtornos visuales
            $rTATV = 0;
            // Antecedentes familiares
            $antealteraciones = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONES");
            if ($antealteraciones > 0) {
                $rTATV = $rTATV + 1.9;
            }
            // Antecedentes familiares

            // consumo de alcohol
            if ($respude18a28->alcohol == "SI" || $respude18a28->fuma == "SI") {
                $rTATV = $rTATV + 1.7;
            }
            // consumo de alcohol

            // Diabetes
            if ($antediabetes > 0) {
                $rTATV = $rTATV + 1.7;
            }
            // Diabetes

            // Hipertension arterial
            if ($antehipertension > 0) {
                $rTATV = $rTATV + 1.7;
            }
            // Hipertension arterial
            // // // // // // // // // // Alteraciones y transtornos visuales

            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $rTATAC = 0;
            // antecedente familiar
            $antealteracionesaud = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONESAUD");
            if ($antealteracionesaud > 0) {
                $rTATAC = $rTATAC + 2;
            }
            // antecedente familiar

            // Exposicion a contaminación auditiva
            if ($contambien->riesgos_auditivo > 1) {
                $rTATAC = $rTATAC + 2;
            }
            // Exposicion a contaminación auditiva

            // Infecciones crónicas de oidos
            $enferoidos = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "OIDOS");
            $enferoidos2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "OIDOS");
            if (($enferoidos + $enferoidos2) > 0) {
                $rTATAC = $rTATAC + 3;
            }
            // Infecciones crónicas de oidos
            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // // // // // // // // // // Salud Bucal
            $rTSB = 0;

            // Presencia de caries
            if ($respude18a28->dientes_sanos == "SI") {
                $rTSB = $rTSB + 7;
                // Presencia de caries
            } else {
                // NBI
                if ($NBI == "SI") {
                    $rTSB = $rTSB + 1;
                }
                // NBI

                // Sin acceso a servicios odontologicos
                if ($respude18a28->consultaodon == "NO") {
                    $rTSB = $rTSB + 1;
                }
                // Sin acceso a servicios odontologicos

                // Malos hábitos de higiene oral
                if ($respude18a28->nocepillado < 3) {
                    $rTSB = $rTSB + 2;
                }
                // Malos hábitos de higiene oral

                // tabaco
                if ($respude18a28->fuma == "SI") {
                    $rTSB = $rTSB + 2;
                }
                // tabaco

                // consumo d alcohol
                if ($respude18a28->alcohol == "SI") {
                    $rTSB = $rTSB + 1;
                }
                // consumo d alcohol
            }

            // // // // // // // // // // Salud Bucal

            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL
            $rTSM = 0;
            // Antecedente familiar
            $antesaludmental = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "SALUDMENTAL");
            if ($antesaludmental > 0) {
                $rTSM = $rTSM + 1.4;
            }
            // Antecedente familiar

            // Mala relaciones con familiares

            // Mala relaciones con familiares

            // Problemas de conducta
            if ($respude18a28->conducta == "SI") {
                $rTSM = $rTSM + 1.4;
            }
            // Problemas de conducta

            // consumo de SPA
            if ($respude18a28->spa == "SI") {
                $rTSM = $rTSM + 2;
            }
            // consumo de SPA

            // Violencia intrafamiliar
            if ($respude18a28->maltrato == "SI") {
                $rTSM = $rTSM + 1;
            }
            // Violencia intrafamiliar
            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL

            // // // // // // // // // // VIOLENCIAS
            $rTV = 0;
            // Antecedentes de Violencia  intrafamiliar
            if ($consufact->violencia_fisica == "SI") {
                $rTV = $rTV + 1;
            }
            // Antecedentes de Violencia  intrafamiliar

            // Transtornos mentales
            $anteconducta = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "CONDUCTA");
            $anteconducta2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "CONDUCTA");
            if (($anteconducta + $anteconducta2) > 0) {
                $rTV = $rTV + 0.5;
            }
            // Transtornos mentales

            // Consumo de SPA en la vivienda
            if ($consufact->sustancias_psico == "SI") {
                $rTV = $rTV + 1;
            }
            // Consumo de SPA en la vivienda

            // Problemas de conducta
            if ($respude18a28->conducta == "SI") {
                $rTV = $rTV + 1;
            }
            // Problemas de conducta

            // NBI
            if ($NBI == "SI") {
                $rTV = $rTV + 1;
            }
            // NBI

            // Señales de violencia
            if ($respude18a28->maltrato == "SI") {
                $rTV = $rTV + 2;
            }
            // Señales de violencia

            // Mala relación con familiares

            // Mala relación con familiares
            // // // // // // // // // // VIOLENCIAS

            // // // // // // // // // // Enfermedades Respiratorias
            $rTERC = 0;

            // consumo de tabaco
            if ($respude18a28->fuma == "SI") {
                $rTERC = $rTERC + 2.5;
            }
            // consumo de tabaco

            // consumo de SPA
            if ($respude18a28->spa == "SI") {
                $rTERC = $rTERC + 1.5;
            }
            // consumo de SPA

            // ViVienda Cocina con leña o carbón
            if ($respuvivi->tipo_combustible == "3" || $respuvivi->tipo_combustible == "4") {
                $rTERC = $rTERC + 1.5;
            }
            // ViVienda Cocina con leña o carbón

            // Antecedentes familiares de enfermedades respiratorias cronicas
            $anteenferrespi = \App\AntecedentesIntegrantes::buscarAntePorId(Session::get('alias'), $id_hogar, "ENFERRESPI", $respuinte->id ?? $respujefe->id);
            if ($anteenferrespi > 0) {
                $rTERC = $rTERC + 0.5;
            }
            // Antecedentes familiares de enfermedades respiratorias cronicas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTERC = $rTERC + 1;
            }
            // Contaminación ambiental

            // Consumo pasivo de humo de tabaco o SPA
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTERC = $rTERC + 1;
            }
            // Consumo pasivo de humo de tabaco o SPA
            // // // // // // // // // // Enfermedades Respiratorias

            // // // // // // // // // // ENFERMEDADES ZOONOTICAS
            $rTEZ = 0;
            // Cria de animales (mas de 2  domesticos)
            $anidomes = \App\Animal::buscar(Session::get('alias'), $id_hogar);
            if (count($anidomes) > 2) {
                $rTEZ = $rTEZ + 1.6;
            }
            // Cria de animales (mas de 2  domesticos)

            // No vacunación de animales
            $anidomesvacuna = \App\Animal::buscarVacunados(Session::get('alias'), $id_hogar);
            if (count($anidomesvacuna) > 2) {
                $rTEZ = $rTEZ + 1.5;
            }
            // No vacunación de animales

            // Consumo de agua no potable.
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEZ = $rTEZ + 2;
            }
            // Consumo de agua no potable.

            // Manejo de residuos
            if ($respuvivi->destino_final_basura != "1" || $respuvivi->almacenamiento_residuos != "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // Manejo de residuos

            // Lotes abandonados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // Lotes abandonados

            // NBI
            if ($NBI == "SI") {
                $rTEZ = $rTEZ + 1.25;
            }
            // NBI

            // no Desparasitado

            // no Desparasitado

            // Mal estado de la vivienda
            if ($respuvivi->material_predominante == "5" || $respuvivi->material_predominante == "7"
                || $respuvivi->tipo_estructura == "5" || $respuvivi->tipo_cubierta == "2"
                || $respuvivi->tipo_cubierta == "6" || $respuvivi->tipo_cubierta == "8" || $respuvivi->tipo_cubierta == "9") {
                $rTEZ = $rTEZ + 0.6;
            }
            // Mal estado de la vivienda
            // // // // // // // // // // ENFERMEDADES ZOONOTICAS

            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $rTTDNEA = 0;
            // Antecedente familiar
            $antetranstornos = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "TRANSTORNOS");
            if ($antetranstornos > 0) {
                $rTTDNEA = $rTTDNEA + 2;
            }
            // Antecedente familiar

            // Consumo de SPA
            if ($respude18a28->spa == "SI") {
                $rTTDNEA = $rTTDNEA + 2;
            }
            // Consumo de SPA

            // Enfermedades infecciosas
            if ((count($respuenferinte) + count($respuenferjefe)) > 0) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Enfermedades infecciosas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Contaminación ambiental

            // Desnutrición

            // Desnutrición
            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["enfermedades_infecciosas_I"] = $rTEI;
            $datos["transtornos_asociados_spa_I"] = $rTTAUS;
            $datos["enfermedad_cardiovascular_I"] = $rTECA;
            $datos["cancer_I"] = $rTC;
            $datos["alteraciones_transtornos_visuales_I"] = $rTATV;
            $datos["alteraciones_transtornos_audicion_I"] = $rTATAC;
            $datos["salud_bucal_I"] = $rTSB;
            $datos["problemas_salud_mental_I"] = $rTSM;
            $datos["violencias_I"] = $rTV;
            $datos["enfermedades_respiratorias_I"] = $rTERC;
            $datos["enfermedades_zoonoticas_I"] = $rTEZ;
            $datos["transtornos_degenartivos_I"] = $rTTDNEA;
            $datos["consumo_spa_I"] = $rTCDS;
            $datos["riesgo_delgadez_I"] = $rTRD;
            $resultado = self::calculosSaludInherente($datos, "DE18A28", $id_hogar, $respude18a28->id_integrante);
        }
        // // // // // // // // // // De18A28 // // // // // // // // // //

        // // // // // // // // // // De29A59 // // // // // // // // // //
        if ($opcion == "De29A59") {
            $respuinte = \App\Integrante::buscar($identificacion, Session::get('alias'));
            $respujefe = \App\Caracterizacion::buscar($identificacion, Session::get('alias'));
            $respude29a59 = \App\De29a59::buscarPorIdentificacion(Session::get('alias'), $identificacion);

            // // // // // // // // // //  Riesgo de delgadez
            $rTRD = 0;
            // Enfermedades infecciosas
            $respuenferinte = \App\EnfermedadesIntegrantes::buscarInfecciosas(Session::get('alias'), $respuinte->id ?? 0);
            $respuenferjefe = \App\EnfermedadesJefes::buscarInfecciosas(Session::get('alias'), $respujefe->id ?? 0);

            if ((count($respuenferinte) + count($respuenferjefe)) > 0) {
                $rTRD = $rTRD + 0.8;
            }
            // Enfermedades infecciosas

            // Consumo SPA
            if ($respude29a59->spa == "SI") {
                $rTRD = $rTRD + 0.8;
            }
            // Consumo SPA

            // NBI
            $NBI = self::calcularNBI($id_hogar);
            if ($NBI == "SI") {
                $rTRD = $rTRD + 1.2;
            }
            // NBI

            // NO agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTRD = $rTRD + 0.8;
            }
            // NO agua potable

            // IMC  -2 a < -1
            if ($respude29a59->imc >= "18.5" && $respude29a59->imc <= "19.5") {
                $rTRD = $rTRD + 3.4;
            }
            // IMC  -2 a < -1
            // // // // // // // // // //  Riesgo de delgadez

            // // // // // // // // // //  Enfermedades Infecciosas
            $rTEI = 0;

            // Delgadez
            if ($respude29a59->imc < "18.5") {
                $rTEI = $rTEI + 0.6;
            }
            // Delgadez

            // plagas
            if ($respuvivi->plagas == "SI") {
                $rTEI = $rTEI + 0.7;
            }
            // plagas

            // Manejo inadecuado  de residuos

            // Manejo inadecuado  de residuos

            // Malas condiciones de la vivienda

            // Malas condiciones de la vivienda

            // Hacinamiento
            $hacinamiento = self::hacinamiento($id_hogar);
            if ($hacinamiento == "SI") {
                $rTEI = $rTEI + 0.62;
            }
            // Hacinamiento

            // Enfermedades inmunosupresoras

            // Enfermedades inmunosupresoras

            // No desparacitado

            // No desparacitado

            // No Vacunación

            // No Vacunación

            // Riesgos de delgadez
            $proba = 0;
            if ($rTRD == 0) {
                $proba = 1;
            } else {
                if ($proba >= 0.1 && $proba < 0.5) {
                    $proba = 2;
                } else {
                    if ($proba >= 0.5 && $proba < 3.4) {
                        $proba = 3;
                    } else {
                        if ($proba >= 3.4 && $proba < 6.1) {
                            $proba = 4;
                        } else {
                            $proba = 5;
                        }
                    }
                }
            }
            $res = $proba * 4;

            if ($res > 8) {
                $rTEI = $rTEI + 0.4;
            }
            // Riesgos de delgadez

            // Baño compartido
            if ($respuvivi->cuantos_baños <= 1) {
                $rTEI = $rTEI + 0.6;
            }
            // Baño compartido

            // Lotes enmontados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEI = $rTEI + 0.64;
            }
            // Lotes enmontados

            // no lavar la verduras y frutas antes de comer

            // no lavar la verduras y frutas antes de comer

            // relleno sanitario cerda de la vivienda
            if ($respuvivi->rellenos == "SI") {
                $rTEI = $rTEI + 0.8;
            }
            // relleno sanitario cerda de la vivienda

            // Ningun tratamiento para el consumo de agua
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEI = $rTEI + 0.8;
            }
            // Ningun tratamiento para el consumo de agua

            // No acceso agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTEI = $rTEI + 0.8;
            }
            // No acceso agua potable

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // // // // // // // // // //  Enfermedades Infecciosas

            // // // // // // // // // //  CONSUMO DE  SPA
            $rTCDS = 0;

            // Mala relaciones con familiares

            // Mala relaciones con familiares

            // NBI
            if ($NBI == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // NBI

            // Enfermedades mentales

            // Enfermedades mentales

            // Problemas de conducta
            if ($respude29a59->conducta == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Problemas de conducta

            // Consumo de Spa en la vivienda
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Consumo de Spa en la vivienda

            // Consumo de alcohol
            if ($respude29a59->alcohol == "SI") {
                $rTCDS = $rTCDS + 1;
            }
            // Consumo de alcohol

            // Consumo de alcohol
            if ($respude29a59->empleo == "NO") {
                $rTCDS = $rTCDS + 1;
            }
            // Consumo de alcohol
            // // // // // // // // // //  CONSUMO DE  SPA

            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA
            $rTTAUS = 0;
            // Consumo SPA
            if ($respude29a59->spa == "SI") {
                $rTTAUS = $rTTAUS + 5;
            }
            // Consumo SPA

            // Consumo pasivo de SPA
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTTAUS = $rTTAUS + 2;
            }
            // Consumo pasivo de SPA
            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA

            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA
            $rTECA = 0;

            // Sedentario

            // Sedentario

            // Cosumos de SPA
            if ($respude29a59->spa == "SI") {
                $rTECA = $rTECA + 0.5;
            }
            // Cosumos de SPA

            // Sobrepeso
            if ($respude29a59->imc >= "25" && $respude29a59->imc <= "30") {
                $rTECA = $rTECA + 0.5;
            }
            // Sobrepeso

            // Hipertension arterial
            $antehipertension = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "HIPERTENSION");
            $antehipertension2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "HIPERTENSION");
            if (($antehipertension + $antehipertension2) > 0) {
                $rTECA = $rTECA + 1;
            }
            // Hipertension arterial

            // P.C Hombre 102 a 115 / Mujeres 88 a 100 cm
            if ($respuinte->sexo ?? '' == "MASCULINO" || $respujefe->sexo ?? '' == "MASCULINO") {
                if ($respude29a59->pcintura >= "102" && $respude29a59->pcintura >= "115") {
                    $rTECA = $rTECA + 0.6;
                }
            } else {
                if ($respuinte->sexo ?? '' == "FEMENINO" || $respujefe->sexo ?? '' == "FEMENINO") {
                    if ($respude29a59->pcintura >= "88" && $respude29a59->pcintura >= "100") {
                        $rTECA = $rTECA + 0.6;
                    }
                }
            }
            // P.C Hombre 102 a 115 / Mujeres 88 a 100 cm

            // P.C Hombre mayor a 115 / Mujeres Mayor  a 100 cm
            if ($respuinte->sexo ?? '' == "MASCULINO" || $respujefe->sexo ?? '' == "MASCULINO") {
                if ($respude29a59->pcintura > "115") {
                    $rTECA = $rTECA + 1;
                }
            } else {
                if ($respuinte->sexo ?? '' == "FEMENINO" || $respujefe->sexo ?? '' == "FEMENINO") {
                    if ($respude29a59->pcintura >= "100") {
                        $rTECA = $rTECA + 1;
                    }
                }
            }
            // P.C Hombre mayor a 115 / Mujeres Mayor  a 100 cm

            // Hiperlipemia

            // Hiperlipemia

            // obesidad
            if ($respude29a59->imc >= "30") {
                $rTECA = $rTECA + 1;
            }
            // obesidad

            // Antecedentes familiares

            // Antecedentes familiares

            // Diabetes
            $antediabetes = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "DIABETES");
            $antediabetes2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "DIABETES");
            if (($antediabetes + $antediabetes2) > 0) {
                $rTECA = $rTECA + 0.8;
            }
            // Diabetes
            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA

            // // // // // // // // // // Cancer
            $rTC = 0;
            // Antecedentes en familiares
            $antecancer = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "CANCER");
            if ($antecancer > 0) {
                $rTC = $rTC + 0.6;
            }
            // Antecedentes en familiares

            // Contaminación ambiental
            $contambien = \App\RiesgosAmbientales::buscar(Session::get('alias'), $id_hogar);
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTC = $rTC + 0.5;
            }
            // Contaminación ambiental

            // Obesidad
            if ($respude29a59->imc >= "30") {
                $rTC = $rTC + 0.8;
            }
            // Obesidad

            // consumo SPA
            if ($respude29a59->spa == "SI") {
                $rTC = $rTC + 0.8;
            }
            // consumo SPA

            // consumo tabaco
            if ($respude29a59->fuma == "SI") {
                $rTC = $rTC + 2;
            }
            // consumo tabaco

            // consumo de tabaco pasivo
            if ($consufact->tabaco == "SI") {
                $rTC = $rTC + 0.5;
            }
            // consumo de tabaco pasivo

            // consumo alcohol
            if ($respude29a59->alcohol == "SI") {
                $rTC = $rTC + 2;
            }
            // consumo alcohol

            // // // // // // // // // // Cancer

            // // // // // // // // // // Alteraciones y transtornos visuales
            $rTATV = 0;
            // Antecedentes familiares
            $antealteraciones = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONES");
            if ($antealteraciones > 0) {
                $rTATV = $rTATV + 2;
            }
            // Antecedentes familiares

            // consumo de alcohol
            if ($respude29a59->alcohol == "SI" || $respude29a59->fuma == "SI") {
                $rTATV = $rTATV + 1;
            }
            // consumo de alcohol

            // Diabetes
            if ($antediabetes > 0) {
                $rTATV = $rTATV + 1;
            }
            // Diabetes

            // Hipertension arterial
            if ($antehipertension > 0) {
                $rTATV = $rTATV + 1;
            }
            // Hipertension arterial
            // // // // // // // // // // Alteraciones y transtornos visuales

            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $rTATAC = 0;
            // antecedente familiar
            $antealteracionesaud = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONESAUD");
            if ($antealteracionesaud > 0) {
                $rTATAC = $rTATAC + 2;
            }
            // antecedente familiar

            // Exposicion a contaminación auditiva
            if ($contambien->riesgos_auditivo > 1) {
                $rTATAC = $rTATAC + 2;
            }
            // Exposicion a contaminación auditiva

            // Infecciones crónicas de oidos
            $enferoidos = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "OIDOS");
            $enferoidos2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "OIDOS");
            if (($enferoidos + $enferoidos2) > 0) {
                $rTATAC = $rTATAC + 3;
            }
            // Infecciones crónicas de oidos
            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // // // // // // // // // // Salud Bucal
            $rTSB = 0;

            // Presencia de caries
            if ($respude29a59->dientes_sanos == "SI") {
                $rTSB = $rTSB + 7;
                // Presencia de caries
            } else {
                // NBI
                if ($NBI == "SI") {
                    $rTSB = $rTSB + 1;
                }
                // NBI

                // Sin acceso a servicios odontologicos
                if ($respude29a59->consultaodon == "NO") {
                    $rTSB = $rTSB + 1;
                }
                // Sin acceso a servicios odontologicos

                // Malos hábitos de higiene oral
                if ($respude29a59->nocepillado < 3) {
                    $rTSB = $rTSB + 2;
                }
                // Malos hábitos de higiene oral

                // tabaco
                if ($respude29a59->fuma == "SI") {
                    $rTSB = $rTSB + 2;
                }
                // tabaco

                // consumo d alcohol
                if ($respude29a59->alcohol == "SI") {
                    $rTSB = $rTSB + 1;
                }
                // consumo d alcohol
            }

            // // // // // // // // // // Salud Bucal

            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL
            $rTSM = 0;
            // Antecedente familiar
            $antesaludmental = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "SALUDMENTAL");
            if ($antesaludmental > 0) {
                $rTSM = $rTSM + 1.4;
            }
            // Antecedente familiar

            // Mala relaciones con familiares

            // Mala relaciones con familiares

            // Problemas de conducta
            if ($respude29a59->conducta == "SI") {
                $rTSM = $rTSM + 1.4;
            }
            // Problemas de conducta

            // consumo de SPA
            if ($respude29a59->spa == "SI") {
                $rTSM = $rTSM + 2;
            }
            // consumo de SPA

            // Violencia intrafamiliar
            if ($respude29a59->maltrato == "SI") {
                $rTSM = $rTSM + 1;
            }
            // Violencia intrafamiliar
            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL

            // // // // // // // // // // VIOLENCIAS
            $rTV = 0;
            // Antecedentes de Violencia  intrafamiliar
            if ($consufact->violencia_fisica == "SI") {
                $rTV = $rTV + 1.5;
            }
            // Antecedentes de Violencia  intrafamiliar

            // Transtornos mentales
            $anteconducta = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "CONDUCTA");
            $anteconducta2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "CONDUCTA");
            if (($anteconducta + $anteconducta2) > 0) {
                $rTV = $rTV + 1;
            }
            // Transtornos mentales

            // Consumo de SPA en la vivienda
            if ($consufact->sustancias_psico == "SI") {
                $rTV = $rTV + 1.5;
            }
            // Consumo de SPA en la vivienda

            // Problemas de conducta
            if ($respude29a59->conducta == "SI") {
                $rTV = $rTV + 1;
            }
            // Problemas de conducta

            // NBI
            if ($NBI == "SI") {
                $rTV = $rTV + 1;
            }
            // NBI

            // Mala relación con familiares

            // Mala relación con familiares
            // // // // // // // // // // VIOLENCIAS

            // // // // // // // // // // Enfermedades Respiratorias
            $rTERC = 0;

            // consumo de tabaco
            if ($respude29a59->fuma == "SI") {
                $rTERC = $rTERC + 2.5;
            }
            // consumo de tabaco

            // consumo de SPA
            if ($respude29a59->spa == "SI") {
                $rTERC = $rTERC + 1.5;
            }
            // consumo de SPA

            // ViVienda Cocina con leña o carbón
            if ($respuvivi->tipo_combustible == "3" || $respuvivi->tipo_combustible == "4") {
                $rTERC = $rTERC + 1.5;
            }
            // ViVienda Cocina con leña o carbón

            // Antecedentes familiares de enfermedades respiratorias cronicas
            $anteenferrespi = \App\AntecedentesIntegrantes::buscarAntePorId(Session::get('alias'), $id_hogar, "ENFERRESPI", $respuinte->id ?? $respujefe->id);
            if ($anteenferrespi > 0) {
                $rTERC = $rTERC + 0.5;
            }
            // Antecedentes familiares de enfermedades respiratorias cronicas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTERC = $rTERC + 0.5;
            }
            // Contaminación ambiental

            // Consumo pasivo de humo de tabaco o SPA
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTERC = $rTERC + 1.5;
            }
            // Consumo pasivo de humo de tabaco o SPA
            // // // // // // // // // // Enfermedades Respiratorias

            // // // // // // // // // // ENFERMEDADES ZOONOTICAS
            $rTEZ = 0;
            // Cria de animales (mas de 2  domesticos)
            $anidomes = \App\Animal::buscar(Session::get('alias'), $id_hogar);
            if (count($anidomes) > 2) {
                $rTEZ = $rTEZ + 2.5;
            }
            // Cria de animales (mas de 2  domesticos)

            // No vacunación de animales
            $anidomesvacuna = \App\Animal::buscarVacunados(Session::get('alias'), $id_hogar);
            if (count($anidomesvacuna) > 2) {
                $rTEZ = $rTEZ + 2;
            }
            // No vacunación de animales

            // Consumo de agua no potable.
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEZ = $rTEZ + 2;
            }
            // Consumo de agua no potable.

            // Manejo de residuos
            if ($respuvivi->destino_final_basura != "1" || $respuvivi->almacenamiento_residuos != "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // Manejo de residuos

            // Lotes abandonados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEZ = $rTEZ + 0.8;
            }
            // Lotes abandonados

            // NBI
            if ($NBI == "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // NBI

            // no Desparasitado

            // no Desparasitado

            // Mal estado de la vivienda
            if ($respuvivi->material_predominante == "5" || $respuvivi->material_predominante == "7"
                || $respuvivi->tipo_estructura == "5" || $respuvivi->tipo_cubierta == "2"
                || $respuvivi->tipo_cubierta == "6" || $respuvivi->tipo_cubierta == "8" || $respuvivi->tipo_cubierta == "9") {
                $rTEZ = $rTEZ + 0.7;
            }
            // Mal estado de la vivienda
            // // // // // // // // // // ENFERMEDADES ZOONOTICAS

            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $rTTDNEA = 0;
            // Antecedente familiar
            $antetranstornos = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "TRANSTORNOS");
            if ($antetranstornos > 0) {
                $rTTDNEA = $rTTDNEA + 2;
            }
            // Antecedente familiar

            // Consumo de SPA
            if ($respude29a59->spa == "SI") {
                $rTTDNEA = $rTTDNEA + 2;
            }
            // Consumo de SPA

            // Enfermedades infecciosas
            if ((count($respuenferinte) + count($respuenferjefe)) > 0) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Enfermedades infecciosas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Contaminación ambiental

            // Desnutrición

            // Desnutrición
            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["enfermedades_infecciosas_I"] = $rTEI;
            $datos["transtornos_asociados_spa_I"] = $rTTAUS;
            $datos["enfermedad_cardiovascular_I"] = $rTECA;
            $datos["cancer_I"] = $rTC;
            $datos["alteraciones_transtornos_visuales_I"] = $rTATV;
            $datos["alteraciones_transtornos_audicion_I"] = $rTATAC;
            $datos["salud_bucal_I"] = $rTSB;
            $datos["problemas_salud_mental_I"] = $rTSM;
            $datos["violencias_I"] = $rTV;
            $datos["enfermedades_respiratorias_I"] = $rTERC;
            $datos["enfermedades_zoonoticas_I"] = $rTEZ;
            $datos["transtornos_degenartivos_I"] = $rTTDNEA;
            $datos["consumo_spa_I"] = $rTCDS;
            $datos["riesgo_delgadez_I"] = $rTRD;
            $resultado = self::calculosSaludInherente($datos, "DE29A59", $id_hogar, $respude29a59->id_integrante);
        }
        // // // // // // // // // // De29A59 // // // // // // // // // //

        // // // // // // // // // // De60 // // // // // // // // // //
        if ($opcion == "De60") {
            $respuinte = \App\Integrante::buscar($identificacion, Session::get('alias'));
            $respujefe = \App\Caracterizacion::buscar($identificacion, Session::get('alias'));
            $respude60 = \App\De60::buscarPorIdentificacion(Session::get('alias'), $identificacion);

            // // // // // // // // // //  Enfermedades Infecciosas
            $rTEI = 0;

            // Delgadez
            if ($respude60->imc < "18.5") {
                $rTEI = $rTEI + 0.7;
            }
            // Delgadez

            // plagas
            if ($respuvivi->plagas == "SI") {
                $rTEI = $rTEI + 0.7;
            }
            // plagas

            // Manejo inadecuado  de residuos

            // Manejo inadecuado  de residuos

            // Malas condiciones de la vivienda

            // Malas condiciones de la vivienda

            // Hacinamiento
            $hacinamiento = self::hacinamiento($id_hogar);
            if ($hacinamiento == "SI") {
                $rTEI = $rTEI + 0.6;
            }
            // Hacinamiento

            // Enfermedades inmunosupresoras

            // Enfermedades inmunosupresoras

            // No desparacitado

            // No desparacitado

            // No Vacunación

            // No Vacunación

            // Baño compartido
            if ($respuvivi->cuantos_baños <= 1) {
                $rTEI = $rTEI + 0.5;
            }
            // Baño compartido

            // Lotes enmontados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEI = $rTEI + 0.8;
            }
            // Lotes enmontados

            // no lavar la verduras y frutas antes de comer

            // no lavar la verduras y frutas antes de comer

            // relleno sanitario cerda de la vivienda
            if ($respuvivi->rellenos == "SI") {
                $rTEI = $rTEI + 0.6;
            }
            // relleno sanitario cerda de la vivienda

            // Ningun tratamiento para el consumo de agua
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEI = $rTEI + 1;
            }
            // Ningun tratamiento para el consumo de agua

            // No acceso agua potable
            if ($respuvivi->acueducto == "NO") {
                $rTEI = $rTEI + 0.8;
            }
            // No acceso agua potable

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // Habitante de la vivienda con enfermedad infectocontagiosa

            // // // // // // // // // //  Enfermedades Infecciosas

            // // // // // // // // // //  CONSUMO DE  SPA
            $rTCDS = 0;

            // Mala relaciones con familiares

            // Mala relaciones con familiares

            // NBI
            $NBI = self::calcularNBI($id_hogar);
            if ($NBI == "SI") {
                $rTCDS = $rTCDS + 0.8;
            }
            // NBI

            // Enfermedades mentales

            // Enfermedades mentales

            // Problemas de conducta

            // Problemas de conducta

            // Consumo de Spa en la vivienda
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTCDS = $rTCDS + 0.8;
            }
            // Consumo de Spa en la vivienda

            // Consumo de alcohol
            if ($respude60->alcohol == "SI") {
                $rTCDS = $rTCDS + 31;
            }
            // Consumo de alcohol

            // // // // // // // // // //  CONSUMO DE  SPA

            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA
            $rTTAUS = 0;
            // Consumo SPA

            // Consumo SPA

            // Consumo pasivo de SPA
            $consufact = \App\Factores::buscarFact(Session::get('alias'), $id_hogar);
            if ($consufact->sustancias_psico == "SI") {
                $rTTAUS = $rTTAUS + 2;
            }
            // Consumo pasivo de SPA
            // // // // // // // // // //  TRASTORNO ASOCIADOS AL CONSUMO DE SPA

            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA
            $rTECA = 0;

            // Sedentario

            // Sedentario

            // Cosumos de SPA

            // Cosumos de SPA

            // Sobrepeso
            if ($respude60->imc >= "25" && $respude60->imc <= "30") {
                $rTECA = $rTECA + 0.5;
            }
            // Sobrepeso

            // Hipertension arterial
            $antehipertension = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "HIPERTENSION");
            $antehipertension2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "HIPERTENSION");
            if (($antehipertension + $antehipertension2) > 0) {
                $rTECA = $rTECA + 1;
            }
            // Hipertension arterial

            // P.C Hombre 102 a 115 / Mujeres 88 a 100 cm
            if ($respuinte->sexo ?? '' == "MASCULINO" || $respujefe->sexo ?? '' == "MASCULINO") {
                if ($respude60->pa >= "102" && $respude60->pa >= "115") {
                    $rTECA = $rTECA + 0.6;
                }
            } else {
                if ($respuinte->sexo ?? '' == "FEMENINO" || $respujefe->sexo ?? '' == "FEMENINO") {
                    if ($respude60->pa >= "88" && $respude60->pa >= "100") {
                        $rTECA = $rTECA + 0.6;
                    }
                }
            }
            // P.C Hombre 102 a 115 / Mujeres 88 a 100 cm

            // P.C Hombre mayor a 115 / Mujeres Mayor  a 100 cm
            if ($respuinte->sexo ?? '' == "MASCULINO" || $respujefe->sexo ?? '' == "MASCULINO") {
                if ($respude60->pa > "115") {
                    $rTECA = $rTECA + 1;
                }
            } else {
                if ($respuinte->sexo ?? '' == "FEMENINO" || $respujefe->sexo ?? '' == "FEMENINO") {
                    if ($respude60->pa >= "100") {
                        $rTECA = $rTECA + 1;
                    }
                }
            }
            // P.C Hombre mayor a 115 / Mujeres Mayor  a 100 cm

            // Hiperlipemia

            // Hiperlipemia

            // obesidad
            if ($respude60->imc >= "30") {
                $rTECA = $rTECA + 1;
            }
            // obesidad

            // Antecedentes familiares

            // Antecedentes familiares

            // Diabetes
            $antediabetes = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "DIABETES");
            $antediabetes2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "DIABETES");
            if (($antediabetes + $antediabetes2) > 0) {
                $rTECA = $rTECA + 0.8;
            }
            // Diabetes
            // // // // // // // // // //  ENFERMERDAD CARDIOVASCULAR ATEROGÉNICA

            // // // // // // // // // // Cancer
            $rTC = 0;

            // Citologia anormal, Examen de prostata Anormal,Examen de mama Anormal
            if ($respude60->examen_seno == "SIA" || $respude60->citologia == "SIA" || $respude60->examen_prostata == "SIA") {
                $rTC = $rTC + 8;
            } else {
                // Antecedentes en familiares
                $antecancer = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "CANCER");
                if ($antecancer > 0) {
                    $rTC = $rTC + 0.8;
                }
                // Antecedentes en familiares

                // Contaminación ambiental
                $contambien = \App\RiesgosAmbientales::buscar(Session::get('alias'), $id_hogar);
                if ($contambien->control_riesgos_atmosferico > 1) {
                    $rTC = $rTC + 0.5;
                }
                // Contaminación ambiental

                // Obesidad
                if ($respude60->imc >= "30") {
                    $rTC = $rTC + 0.8;
                }
                // Obesidad

                // consumo SPA

                // consumo SPA

                // consumo tabaco
                if ($respude60->cigarrillo == "SI") {
                    $rTC = $rTC + 1.5;
                }
                // consumo tabaco

                // consumo de tabaco pasivo
                if ($consufact->tabaco == "SI") {
                    $rTC = $rTC + 0.7;
                }
                // consumo de tabaco pasivo

                // consumo alcohol
                if ($respude60->alcohol == "SI") {
                    $rTC = $rTC + 1;
                }
                // consumo alcohol
            }
            // Citologia anormal, Examen de prostata Anormal,Examen de mama Anormal

            // // // // // // // // // // Cancer

            // // // // // // // // // // Alteraciones y transtornos visuales
            $rTATV = 0;

            // consumo de alcohol
            if ($respude60->alcohol == "SI") {
                $rTATV = $rTATV + 2;
            }
            // consumo de alcohol

            // Diabetes
            if ($antediabetes > 0) {
                $rTATV = $rTATV + 2;
            }
            // Diabetes

            // Hipertension arterial
            if ($antehipertension > 0) {
                $rTATV = $rTATV + 1;
            }
            // Hipertension arterial
            // // // // // // // // // // Alteraciones y transtornos visuales

            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $rTATAC = 0;
            // antecedente familiar
            $antealteracionesaud = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "ALTERACIONESAUD");
            if ($antealteracionesaud > 0) {
                $rTATAC = $rTATAC + 2;
            }
            // antecedente familiar

            // Exposicion a contaminación auditiva
            $contambien = \App\RiesgosAmbientales::buscar(Session::get('alias'), $id_hogar);
            if ($contambien->riesgos_auditivo > 1) {
                $rTATAC = $rTATAC + 2;
            }
            // Exposicion a contaminación auditiva

            // Infecciones crónicas de oidos
            $enferoidos = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "OIDOS");
            $enferoidos2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "OIDOS");
            if (($enferoidos + $enferoidos2) > 0) {
                $rTATAC = $rTATAC + 3;
            }
            // Infecciones crónicas de oidos
            // // // // // // // // // // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // // // // // // // // // // Salud Bucal
            $rTSB = 0;

            // NBI
            if ($NBI == "SI") {
                $rTSB = $rTSB + 1;
            }
            // NBI

            // Sin acceso a servicios odontologicos

            // Sin acceso a servicios odontologicos

            // Malos hábitos de higiene oral

            // Malos hábitos de higiene oral

            // tabaco
            if ($respude60->cigarrillo == "SI") {
                $rTSB = $rTSB + 2;
            }
            // tabaco

            // consumo d alcohol
            if ($respude60->alcohol == "SI") {
                $rTSB = $rTSB + 1;
            }
            // consumo d alcohol

            // // // // // // // // // // Salud Bucal

            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL
            $rTSM = 0;
            // Antecedente familiar
            $antesaludmental = \App\AntecedentesIntegrantes::buscarAnte(Session::get('alias'), $id_hogar, "SALUDMENTAL");
            if ($antesaludmental > 0) {
                $rTSM = $rTSM + 1;
            }
            // Antecedente familiar

            // Mala relaciones con familiares

            // Mala relaciones con familiares

            // Problemas de conducta

            // Problemas de conducta

            // consumo de SPA

            // consumo de SPA

            // Violencia intrafamiliar

            // Violencia intrafamiliar
            // // // // // // // // // // PROBLEMAS EN SALUD MENTAL

            // // // // // // // // // // VIOLENCIAS
            $rTV = 0;
            // Antecedentes de Violencia  intrafamiliar
            if ($consufact->violencia_fisica == "SI") {
                $rTV = $rTV + 1.5;
            }
            // Antecedentes de Violencia  intrafamiliar

            // Transtornos mentales
            $anteconducta = \App\EnfermedadesIntegrantes::buscarEnfer(Session::get('alias'), $respuinte->id ?? 0, "CONDUCTA");
            $anteconducta2 = \App\EnfermedadesJefes::buscarEnfer(Session::get('alias'), $respujefe->id ?? 0, "CONDUCTA");
            if (($anteconducta + $anteconducta2) > 0) {
                $rTV = $rTV + 1;
            }
            // Transtornos mentales

            // Consumo de SPA en la vivienda
            if ($consufact->sustancias_psico == "SI") {
                $rTV = $rTV + 1.5;
            }
            // Consumo de SPA en la vivienda

            // Problemas de conducta

            // Problemas de conducta

            // NBI
            if ($NBI == "SI") {
                $rTV = $rTV + 1;
            }
            // NBI

            // Mala relación con familiares

            // Mala relación con familiares
            // // // // // // // // // // VIOLENCIAS

            // // // // // // // // // // Enfermedades Respiratorias
            $rTERC = 0;

            // consumo de tabaco
            if ($respude60->cigarrillo == "SI") {
                $rTERC = $rTERC + 2.3;
            }
            // consumo de tabaco

            // consumo de SPA

            // consumo de SPA

            // ViVienda Cocina con leña o carbón
            if ($respuvivi->tipo_combustible == "3" || $respuvivi->tipo_combustible == "4") {
                $rTERC = $rTERC + 2.3;
            }
            // ViVienda Cocina con leña o carbón

            // Antecedentes familiares de enfermedades respiratorias cronicas
            $anteenferrespi = \App\AntecedentesIntegrantes::buscarAntePorId(Session::get('alias'), $id_hogar, "ENFERRESPI", $respuinte->id ?? $respujefe->id);
            if ($anteenferrespi > 0) {
                $rTERC = $rTERC + 0.9;
            }
            // Antecedentes familiares de enfermedades respiratorias cronicas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTERC = $rTERC + 0.5;
            }
            // Contaminación ambiental

            // Consumo pasivo de humo de tabaco o SPA
            if ($consufact->tabaco == "SI" || $consufact->sustancias_psico == "SI") {
                $rTERC = $rTERC + 0.5;
            }
            // Consumo pasivo de humo de tabaco o SPA

            // Sintomas respiratorios
            if ($respude60->sintomatico == "SI") {
                $rTERC = $rTERC + 0.5;
            }
            // Sintomas respiratorios
            // // // // // // // // // // Enfermedades Respiratorias

            // // // // // // // // // // ENFERMEDADES ZOONOTICAS
            $rTEZ = 0;
            // Cria de animales (mas de 2  domesticos)
            $anidomes = \App\Animal::buscar(Session::get('alias'), $id_hogar);
            if (count($anidomes) > 2) {
                $rTEZ = $rTEZ + 2.5;
            }
            // Cria de animales (mas de 2  domesticos)

            // No vacunación de animales
            $anidomesvacuna = \App\Animal::buscarVacunados(Session::get('alias'), $id_hogar);
            if (count($anidomesvacuna) > 2) {
                $rTEZ = $rTEZ + 2;
            }
            // No vacunación de animales

            // Consumo de agua no potable.
            if ($respuvivi->tipo_tratamiento_agua == "NA" || $respuvivi->tipo_tratamiento_agua == "4") {
                $rTEZ = $rTEZ + 2;
            }
            // Consumo de agua no potable.

            // Manejo de residuos
            if ($respuvivi->destino_final_basura != "1" || $respuvivi->almacenamiento_residuos != "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // Manejo de residuos

            // Lotes abandonados
            if ($respuvivi->lotes_abandonados == "SI") {
                $rTEZ = $rTEZ + 0.8;
            }
            // Lotes abandonados

            // NBI
            if ($NBI == "SI") {
                $rTEZ = $rTEZ + 1;
            }
            // NBI

            // no Desparasitado

            // no Desparasitado

            // Mal estado de la vivienda
            if ($respuvivi->material_predominante == "5" || $respuvivi->material_predominante == "7"
                || $respuvivi->tipo_estructura == "5" || $respuvivi->tipo_cubierta == "2"
                || $respuvivi->tipo_cubierta == "6" || $respuvivi->tipo_cubierta == "8" || $respuvivi->tipo_cubierta == "9") {
                $rTEZ = $rTEZ + 0.7;
            }
            // Mal estado de la vivienda
            // // // // // // // // // // ENFERMEDADES ZOONOTICAS

            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $rTTDNEA = 0;

            // Consumo de SPA

            // Consumo de SPA

            // Enfermedades infecciosas
            $respuenferinte = \App\EnfermedadesIntegrantes::buscarInfecciosas(Session::get('alias'), $respuinte->id ?? 0);
            $respuenferjefe = \App\EnfermedadesJefes::buscarInfecciosas(Session::get('alias'), $respujefe->id ?? 0);
            if ((count($respuenferinte) + count($respuenferjefe)) > 0) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Enfermedades infecciosas

            // Contaminación ambiental
            if ($contambien->control_riesgos_atmosferico > 1) {
                $rTTDNEA = $rTTDNEA + 1;
            }
            // Contaminación ambiental

            // Desnutrición

            // Desnutrición
            // // // // // // // // // // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["enfermedades_infecciosas_I"] = $rTEI;
            $datos["transtornos_asociados_spa_I"] = $rTTAUS;
            $datos["enfermedad_cardiovascular_I"] = $rTECA;
            $datos["cancer_I"] = $rTC;
            $datos["alteraciones_transtornos_visuales_I"] = $rTATV;
            $datos["alteraciones_transtornos_audicion_I"] = $rTATAC;
            $datos["salud_bucal_I"] = $rTSB;
            $datos["problemas_salud_mental_I"] = $rTSM;
            $datos["violencias_I"] = $rTV;
            $datos["enfermedades_respiratorias_I"] = $rTERC;
            $datos["enfermedades_zoonoticas_I"] = $rTEZ;
            $datos["transtornos_degenartivos_I"] = $rTTDNEA;
            $datos["consumo_spa_I"] = $rTCDS;
            $resultado = self::calculosSaludInherente($datos, "DE60", $id_hogar, $respude60->id_integrante);
        }
        // // // // // // // // // // De60 // // // // // // // // // //

    }

    public function calcularNBI($id_hogar)
    {
        $NBI = "NO";
        $VI = "NO";
        $V3IH = "NO";
        $VSI = "NO";
        $VADE = "NO";
        $VND = "NO";
        $respuvivi = \App\Vivienda::buscar(Session::get('alias'), $id_hogar);
        if ($respuvivi) {
            $respuhogar = \App\Hogar::buscar(Session::get('alias'), $id_hogar);
            // VIVIENDA INADECUADA
            if ($respuvivi->tipo_vivienda == "6") {
                $VI = "SI";
            }
            if ($respuhogar->id_zona == "1") {
                if ($respuvivi->tipo_estructura == "5") {
                    $VI = "SI";
                }
                if ($respuvivi->material_predominante == "5") {
                    $VI = "SI";
                }
            } else {
                if ($respuvivi->tipo_estructura == "4" && $respuvivi->material_predominante == "5") {
                    $VI = "SI";
                }
            }
            // VIVIENDA INADECUADA

            // INDICE DE HACINAMIENTO
            $numpersonas = 0;
            $numerohabitaciones = 1;
            $totalinte = \App\Integrante::totalIntegrantes(Session::get('alias'), $id_hogar);
            $totaljefe = \App\Caracterizacion::totalJefes(Session::get('alias'), $id_hogar);
            $numpersonas = $numpersonas + $totalinte + $totaljefe;
            $numerohabitaciones = $respuvivi->numero_cuartos;
            if ($numerohabitaciones <= 0) {
                $numerohabitaciones = 1;
            }
            $indiceHacinamiento = $numpersonas / $numerohabitaciones;
            if ($indiceHacinamiento > 3) {
                $V3IH = "SI";
            }
            // INDICE DE HACINAMIENTO

            // VIVIENDAS CON SERVICIOS INADECUADOS
            if ($respuvivi->sanitario == "NO" || $respuvivi->sanitario == "NA") {
                $VSI = "SI";
            }
            if ($respuvivi->acueducto == "NO" || $respuvivi->acueducto == "NA") {
                $VSI = "SI";
            }
            if ($respuhogar->id_zona == "1") {
                if ($respuvivi->fuente_agua == "4" || $respuvivi->fuente_agua == "5" || $respuvivi->fuente_agua == "6") {
                    $VSI = "SI";
                }
            } else {
                if ($respuvivi->fuente_agua == "4" || $respuvivi->fuente_agua == "5") {
                    $VSI = "SI";
                }
            }
            // VIVIENDAS CON SERVICIOS INADECUADOS

            // VIVIENDAS CON ALTA DEPENDENCIA ECONOMICA
            $totaljefetrabajando = \App\Caracterizacion::totalJefesTrabajando(Session::get('alias'), $id_hogar);
            foreach ($totaljefetrabajando as $item) {
                if ($item->nivel_escolaridad == 1) {
                    if ($item->grado == "Ninguno" || $item->grado == "Primero" || $item->grado == "Segundo") {
                        if ($item->percargo > 3) {
                            $VADE = "SI";
                        }
                    }
                }
            }
            // VIVIENDAS CON ALTA DEPENDENCIA ECONOMICA

            // VIVIENDAS NIÑOS DESCOLARIZADOS
            $totalintedescolarizados = \App\Integrante::totalIntegrantesDescolarizados(Session::get('alias'), $id_hogar);
            foreach ($totalintedescolarizados as $item) {
                if ($item->edad >= 6 && $item->edad <= 12) {
                    $VND = "NO";
                }
            }
            // VIVIENDAS NIÑOS DESCOLARIZADOS

            // RESULTADO NBI
            if ($VI == "SI" || $V3IH == "SI" || $VSI == "SI" || $VADE = "SI" || $VND = "SI") {
                $NBI = "SI";
            }
            // RESULTADO NBI
        }
        return $NBI;
    }

    public function hacinamiento($id_hogar)
    {
        // INDICE DE HACINAMIENTO
        $numpersonas = 0;
        $numerohabitaciones = 1;
        $totalinte = \App\Integrante::totalIntegrantes(Session::get('alias'), $id_hogar);
        $totaljefe = \App\Caracterizacion::totalJefes(Session::get('alias'), $id_hogar);
        $numpersonas = $numpersonas + $totalinte + $totaljefe;
        $respuvivi = \App\Vivienda::buscar(Session::get('alias'), $id_hogar);
        $numerohabitaciones = $respuvivi->numero_cuartos;
        if ($numerohabitaciones <= 0) {
            $numerohabitaciones = 1;
        }
        $indiceHacinamiento = $numpersonas / $numerohabitaciones;
        $V3IH = "NO";
        if ($indiceHacinamiento > 3) {
            $V3IH = "SI";
        }
        return $V3IH;
        // INDICE DE HACINAMIENTO
    }

    public function CalculosPerimetros($opc, $fecha, $sexo, $vector)
    {
        switch ($opc) {
            case "PERIMETROCEFALICO":
                ////CALCULO PERIMETRO_CEFALICO
                $resul = [];
                $array = [];

                $dias = self::diasPorAnios($fecha);
                $PERICEFA = false;
                $per_cef = "";
                $resul = [-4, -3, -2, -1, 0, 1, 2, 3, 4];
                if ($sexo == "MASCULINO") {
                    $PERICEFA = \App\PerimetroCefalicoNinos05::buscar(Session::get('alias'), $dias);
                } else {
                    $PERICEFA = \App\PerimetroCefalicoNinas05::buscar(Session::get('alias'), $dias);
                }
                if ($PERICEFA) {
                    // CREAR ARRAY DE DATOS
                    array_push($array, $PERICEFA->SD4neg);
                    array_push($array, $PERICEFA->SD3neg);
                    array_push($array, $PERICEFA->SD2neg);
                    array_push($array, $PERICEFA->SD1neg);
                    array_push($array, $PERICEFA->SD0);
                    array_push($array, $PERICEFA->SD1);
                    array_push($array, $PERICEFA->SD2);
                    array_push($array, $PERICEFA->SD3);
                    array_push($array, $PERICEFA->SD4);
                    // CREAR ARRAY DE DATOS

                    // METODO DE BUSQUEDA
                    $te = self::buscarDistancias($vector->cinta, $array);
                    $per_cef = $resul[$te];
                    // METODO DE BUSQUEDA
                }
                return $per_cef;
                ////CALCULO PERIMETRO_CEFALICO
                break;
            case "PESOEDAD":
                $resul = [];
                $array = [];

                $meses = self::mesesPorAnios($fecha);
                $PESEDA = false;
                $pes_eda = "";
                $resul = [-3, -2, -1, 0, 1, 2, 3];
                if ($sexo == "MASCULINO") {
                    $PESEDA = \App\PesoEdadNinos05::buscar(Session::get('alias'), $meses);
                } else {
                    $PESEDA = \App\PesoEdadNinas05::buscar(Session::get('alias'), $meses);
                }
                if ($PESEDA) {
                    // CREAR ARRAY DE DATOS
                    array_push($array, $PESEDA->SD3neg);
                    array_push($array, $PESEDA->SD2neg);
                    array_push($array, $PESEDA->SD1neg);
                    array_push($array, $PESEDA->SD0);
                    array_push($array, $PESEDA->SD1);
                    array_push($array, $PESEDA->SD2);
                    array_push($array, $PESEDA->SD3);
                    // CREAR ARRAY DE DATOS

                    // METODO DE BUSQUEDA
                    $pe = self::buscarDistancias($vector->peso_actual, $array);
                    $pes_eda = $resul[$pe];
                    // METODO DE BUSQUEDA
                }
                return $pes_eda;
                break;
            case "PESOEDAD2":
                $resul = [];
                $array = [];

                $meses = self::mesesPorAnios($fecha);
                $PESEDA = false;
                $pes_eda = "";
                $resul = [-3, -2, -1, 0, 1, 2, 3];
                if ($sexo == "MASCULINO") {
                    $PESEDA = \App\PesoEdadNinos05::buscar(Session::get('alias'), $meses);
                } else {
                    $PESEDA = \App\PesoEdadNinas05::buscar(Session::get('alias'), $meses);
                }
                if ($PESEDA) {
                    // CREAR ARRAY DE DATOS
                    array_push($array, $PESEDA->SD3neg);
                    array_push($array, $PESEDA->SD2neg);
                    array_push($array, $PESEDA->SD1neg);
                    array_push($array, $PESEDA->SD0);
                    array_push($array, $PESEDA->SD1);
                    array_push($array, $PESEDA->SD2);
                    array_push($array, $PESEDA->SD3);
                    // CREAR ARRAY DE DATOS

                    // METODO DE BUSQUEDA
                    $pe = self::buscarDistancias($vector->peso, $array);
                    $pes_eda = $resul[$pe];
                    // METODO DE BUSQUEDA
                }
                return $pes_eda;
                break;
            case "PERIMETROCEFALICO2":
                ////CALCULO PERIMETRO_CEFALICO
                $resul = [];
                $array = [];

                $dias = self::diasPorAnios($fecha);
                $PERICEFA = false;
                $per_cef = "";
                $resul = [-4, -3, -2, -1, 0, 1, 2, 3, 4];
                if ($sexo == "MASCULINO") {
                    $PERICEFA = \App\PerimetroCefalicoNinos05::buscar(Session::get('alias'), $dias);
                } else {
                    $PERICEFA = \App\PerimetroCefalicoNinas05::buscar(Session::get('alias'), $dias);
                }
                if ($PERICEFA) {
                    // CREAR ARRAY DE DATOS
                    array_push($array, $PERICEFA->SD4neg);
                    array_push($array, $PERICEFA->SD3neg);
                    array_push($array, $PERICEFA->SD2neg);
                    array_push($array, $PERICEFA->SD1neg);
                    array_push($array, $PERICEFA->SD0);
                    array_push($array, $PERICEFA->SD1);
                    array_push($array, $PERICEFA->SD2);
                    array_push($array, $PERICEFA->SD3);
                    array_push($array, $PERICEFA->SD4);
                    // CREAR ARRAY DE DATOS

                    // METODO DE BUSQUEDA
                    $te = self::buscarDistancias($vector->pcefalico, $array);
                    $per_cef = $resul[$te];
                    // METODO DE BUSQUEDA
                }
                return $per_cef;
                ////CALCULO PERIMETRO_CEFALICO
                break;

            case "IMC1":
                $resul = [];
                $array = [];

                $meses = self::mesesPorAnios($fecha);
                $IMCEDA = false;
                $imc_eda = "";
                $resul = [-2, -1, 0, 1, 2, 3];
                if ($sexo == "MASCULINO") {
                    $IMCEDA = \App\ImcEdadNinos517::buscar(Session::get('alias'), $meses);
                } else {
                    $IMCEDA = \App\ImcEdadNinas517::buscar(Session::get('alias'), $meses);
                }
                if ($IMCEDA) {
                    // CREAR ARRAY DE DATOS
                    array_push($array, $IMCEDA->SD2neg);
                    array_push($array, $IMCEDA->SD1neg);
                    array_push($array, $IMCEDA->SD0);
                    array_push($array, $IMCEDA->SD1);
                    array_push($array, $IMCEDA->SD2);
                    array_push($array, $IMCEDA->SD3);
                    // CREAR ARRAY DE DATOS

                    // METODO DE BUSQUEDA
                    $pe = self::buscarDistancias($vector->imc, $array);
                    $imc_eda = $resul[$pe];
                    // METODO DE BUSQUEDA
                }
                return $imc_eda;
                break;
        }
    }

    public function calculosSaludInherente($datos, $opcion, $id_hogar, $id)
    {
        if ($opcion == "MEN1") {
            // Enfermedades Infecciosas
            $valor = 0;
            if ($datos["enfermedades_infecciosas_I"] <= 0.4) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 0.5 && $datos["enfermedades_infecciosas_I"] < 1.5) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_infecciosas_I"] >= 1.6 && $datos["enfermedades_infecciosas_I"] < 5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_infecciosas_I"] >= 5 && $datos["enfermedades_infecciosas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_infecciosas_I"] = $valor * 4;
            if ($datos["enfermedades_infecciosas_I"] <= 8) {
                $datos["enfermedades_infecciosas_I"] = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 9 && $datos["enfermedades_infecciosas_I"] < 16) {
                    $datos["enfermedades_infecciosas_I"] = 2;
                } else {
                    $datos["enfermedades_infecciosas_I"] = 3;
                }
            }
            // Enfermedades Infecciosas

            // Transtornos asociados al consumo de SPA.
            $valor = 0;
            if ($datos["transtornos_asociados_spa_I"] < 3) {
                $valor = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 3 && $datos["transtornos_asociados_spa_I"] < 6) {
                    $valor = 2;
                } else {
                    $valor = 3;
                }
            }
            $datos["transtornos_asociados_spa_I"] = $valor * 4;
            if ($datos["transtornos_asociados_spa_I"] <= 4) {
                $datos["transtornos_asociados_spa_I"] = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 5 && $datos["transtornos_asociados_spa_I"] < 9) {
                    $datos["transtornos_asociados_spa_I"] = 2;
                } else {
                    $datos["transtornos_asociados_spa_I"] = 3;
                }
            }
            // Transtornos asociados al consumo de SPA.

            // Enf Cardiovasculares aterogénica
            if ($datos["enfermedad_cardiovascular_I"] < 1) {
                $valor = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 1 && $datos["enfermedad_cardiovascular_I"] <= 2) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedad_cardiovascular_I"] >= 2.1 && $datos["enfermedad_cardiovascular_I"] <= 5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedad_cardiovascular_I"] >= 5.1 && $datos["enfermedad_cardiovascular_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedad_cardiovascular_I"] = $valor * 4;
            if ($datos["enfermedad_cardiovascular_I"] <= 8) {
                $datos["enfermedad_cardiovascular_I"] = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 9 && $datos["enfermedad_cardiovascular_I"] < 16) {
                    $datos["enfermedad_cardiovascular_I"] = 2;
                } else {
                    $datos["enfermedad_cardiovascular_I"] = 3;
                }
            }
            // Enf Cardiovasculares aterogénica

            // Cancer
            if ($datos["cancer_I"] < 1) {
                $valor = 1;
            } else {
                if ($datos["cancer_I"] >= 1 && $datos["cancer_I"] <= 3) {
                    $valor = 2;
                } else {
                    if ($datos["cancer_I"] >= 3.1 && $datos["cancer_I"] <= 6) {
                        $valor = 3;
                    } else {
                        if ($datos["cancer_I"] >= 6.1 && $datos["cancer_I"] <= 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["cancer_I"] = $valor * 5;
            if ($datos["cancer_I"] <= 8) {
                $datos["cancer_I"] = 1;
            } else {
                if ($datos["cancer_I"] >= 9 && $datos["cancer_I"] < 16) {
                    $datos["cancer_I"] = 2;
                } else {
                    $datos["cancer_I"] = 3;
                }
            }
            // Cancer

            // Alteraciones y transtornos visuales
            if ($datos["alteraciones_transtornos_visuales_I"] < 1) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 1 && $datos["alteraciones_transtornos_visuales_I"] <= 3) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_visuales_I"] >= 3.1 && $datos["alteraciones_transtornos_visuales_I"] <= 5) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_visuales_I"] >= 5.1 && $datos["alteraciones_transtornos_visuales_I"] <= 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_visuales_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 8) {
                $datos["alteraciones_transtornos_visuales_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 9 && $datos["alteraciones_transtornos_visuales_I"] < 16) {
                    $datos["alteraciones_transtornos_visuales_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_visuales_I"] = 3;
                }
            }
            // Alteraciones y transtornos visuales

            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            if ($datos["alteraciones_transtornos_audicion_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] > 0 && $datos["alteraciones_transtornos_audicion_I"] <= 1.75) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_audicion_I"] >= 1.76 && $datos["alteraciones_transtornos_audicion_I"] <= 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_audicion_I"] >= 3.6 && $datos["alteraciones_transtornos_audicion_I"] <= 5.25) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_audicion_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 8) {
                $datos["alteraciones_transtornos_audicion_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 9 && $datos["alteraciones_transtornos_audicion_I"] < 16) {
                    $datos["alteraciones_transtornos_audicion_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_audicion_I"] = 3;
                }
            }
            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // Salud Bucal
            if ($datos["salud_bucal_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["salud_bucal_I"] > 0 && $datos["salud_bucal_I"] <= 2.0) {
                    $valor = 2;
                } else {
                    if ($datos["salud_bucal_I"] >= 2.1 && $datos["salud_bucal_I"] <= 3.4) {
                        $valor = 3;
                    } else {
                        if ($datos["salud_bucal_I"] >= 3.5 && $datos["salud_bucal_I"] <= 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["salud_bucal_I"] = $valor * 3;
            if ($datos["salud_bucal_I"] <= 5) {
                $datos["salud_bucal_I"] = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 6 && $datos["salud_bucal_I"] < 11) {
                    $datos["salud_bucal_I"] = 2;
                } else {
                    $datos["salud_bucal_I"] = 3;
                }
            }
            // Salud Bucal

            // PROBLEMAS EN SALUD MENTAL
            if ($datos["problemas_salud_mental_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] > 0 && $datos["problemas_salud_mental_I"] <= 1.4) {
                    $valor = 2;
                } else {
                    if ($datos["problemas_salud_mental_I"] >= 1.5 && $datos["problemas_salud_mental_I"] <= 2.8) {
                        $valor = 3;
                    } else {
                        if ($datos["problemas_salud_mental_I"] >= 2.9 && $datos["problemas_salud_mental_I"] <= 5.6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["problemas_salud_mental_I"] = $valor * 4;
            if ($datos["problemas_salud_mental_I"] <= 8) {
                $datos["problemas_salud_mental_I"] = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 9 && $datos["problemas_salud_mental_I"] < 16) {
                    $datos["problemas_salud_mental_I"] = 2;
                } else {
                    $datos["problemas_salud_mental_I"] = 3;
                }
            }
            // PROBLEMAS EN SALUD MENTAL

            // VIOLENCIAS
            if ($datos["violencias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["violencias_I"] > 0 && $datos["violencias_I"] <= 1.4) {
                    $valor = 2;
                } else {
                    if ($datos["violencias_I"] >= 1.5 && $datos["violencias_I"] <= 2.8) {
                        $valor = 3;
                    } else {
                        if ($datos["violencias_I"] >= 2.9 && $datos["violencias_I"] <= 5.6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["violencias_I"] = $valor * 4;
            if ($datos["violencias_I"] <= 8) {
                $datos["violencias_I"] = 1;
            } else {
                if ($datos["violencias_I"] >= 9 && $datos["violencias_I"] < 16) {
                    $datos["violencias_I"] = 2;
                } else {
                    $datos["violencias_I"] = 3;
                }
            }
            // VIOLENCIAS

            // Enfermedades Respiratorias Crónicas
            if ($datos["enfermedades_respiratorias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] > 0 && $datos["enfermedades_respiratorias_I"] <= 1) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_respiratorias_I"] >= 1.1 && $datos["enfermedades_respiratorias_I"] <= 3.9) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_respiratorias_I"] >= 4 && $datos["enfermedades_respiratorias_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_respiratorias_I"] = $valor * 4;
            if ($datos["enfermedades_respiratorias_I"] <= 8) {
                $datos["enfermedades_respiratorias_I"] = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 9 && $datos["enfermedades_respiratorias_I"] < 16) {
                    $datos["enfermedades_respiratorias_I"] = 2;
                } else {
                    $datos["enfermedades_respiratorias_I"] = 3;
                }
            }
            // Enfermedades Respiratorias Crónicas

            // Enfermedades zoonoticas
            if ($datos["enfermedades_zoonoticas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] > 0 && $datos["enfermedades_zoonoticas_I"] <= 0.9) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_zoonoticas_I"] >= 1 && $datos["enfermedades_zoonoticas_I"] < 4.5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_zoonoticas_I"] >= 4.5 && $datos["enfermedades_zoonoticas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_zoonoticas_I"] = $valor * 4;
            if ($datos["enfermedades_zoonoticas_I"] <= 8) {
                $datos["enfermedades_zoonoticas_I"] = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 9 && $datos["enfermedades_zoonoticas_I"] < 16) {
                    $datos["enfermedades_zoonoticas_I"] = 2;
                } else {
                    $datos["enfermedades_zoonoticas_I"] = 3;
                }
            }
            // Enfermedades zoonoticas

            // Transtornos degenerativos, neuropatias y enf autoinmune
            if ($datos["transtornos_degenartivos_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] > 0 && $datos["transtornos_degenartivos_I"] < 1.1) {
                    $valor = 2;
                } else {
                    if ($datos["transtornos_degenartivos_I"] >= 1.1 && $datos["transtornos_degenartivos_I"] < 4.4) {
                        $valor = 3;
                    } else {
                        if ($datos["transtornos_degenartivos_I"] >= 4.4 && $datos["transtornos_degenartivos_I"] < 5.5) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["transtornos_degenartivos_I"] = $valor * 5;
            if ($datos["transtornos_degenartivos_I"] <= 8) {
                $datos["transtornos_degenartivos_I"] = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 9 && $datos["transtornos_degenartivos_I"] < 16) {
                    $datos["transtornos_degenartivos_I"] = 2;
                } else {
                    $datos["transtornos_degenartivos_I"] = 3;
                }
            }
            // Transtornos degenerativos, neuropatias y enf autoinmune

            // Consumo de SPA
            if ($datos["consumo_spa_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["consumo_spa_I"] > 0 && $datos["consumo_spa_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["consumo_spa_I"] >= 1 && $datos["consumo_spa_I"] <= 3) {
                        $valor = 3;
                    } else {
                        if ($datos["consumo_spa_I"] >= 3.1 && $datos["consumo_spa_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["consumo_spa_I"] = $valor * 4;
            if ($datos["consumo_spa_I"] <= 8) {
                $datos["consumo_spa_I"] = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 9 && $datos["consumo_spa_I"] < 16) {
                    $datos["consumo_spa_I"] = 2;
                } else {
                    $datos["consumo_spa_I"] = 3;
                }
            }
            // Consumo de SPA

            // RIESGO DESNUTRICIÓN Aguda
            if ($datos["riesgos_desnutricion_aguda_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgos_desnutricion_aguda_I"] > 0 && $datos["riesgos_desnutricion_aguda_I"] < 0.9) {
                    $valor = 2;
                } else {
                    if ($datos["riesgos_desnutricion_aguda_I"] >= 0.9 && $datos["riesgos_desnutricion_aguda_I"] < 2.8) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgos_desnutricion_aguda_I"] >= 2.8 && $datos["riesgos_desnutricion_aguda_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgos_desnutricion_aguda_I"] = $valor * 4;
            if ($datos["riesgos_desnutricion_aguda_I"] <= 8) {
                $datos["riesgos_desnutricion_aguda_I"] = 1;
            } else {
                if ($datos["riesgos_desnutricion_aguda_I"] >= 9 && $datos["riesgos_desnutricion_aguda_I"] < 16) {
                    $datos["riesgos_desnutricion_aguda_I"] = 2;
                } else {
                    $datos["riesgos_desnutricion_aguda_I"] = 3;
                }
            }
            // RIESGO DESNUTRICIÓN Aguda

            // RIESGO DESNUTRICIÓN GLOBAL
            if ($datos["riesgos_desnutricion_global_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgos_desnutricion_global_I"] > 0 && $datos["riesgos_desnutricion_global_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["riesgos_desnutricion_global_I"] >= 1 && $datos["riesgos_desnutricion_global_I"] < 2.8) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgos_desnutricion_global_I"] >= 2.8 && $datos["riesgos_desnutricion_global_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgos_desnutricion_global_I"] = $valor * 5;
            if ($datos["riesgos_desnutricion_global_I"] <= 8) {
                $datos["riesgos_desnutricion_global_I"] = 1;
            } else {
                if ($datos["riesgos_desnutricion_global_I"] >= 9 && $datos["riesgos_desnutricion_global_I"] < 16) {
                    $datos["riesgos_desnutricion_global_I"] = 2;
                } else {
                    $datos["riesgos_desnutricion_global_I"] = 3;
                }
            }

            // RIESGO DESNUTRICIÓN GLOBAL

            // RIESGO DE TALLA BAJA
            if ($datos["riesgo_talla_baja_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_talla_baja_I"] > 0 && $datos["riesgo_talla_baja_I"] < 1.6) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_talla_baja_I"] >= 1.6 && $datos["riesgo_talla_baja_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_talla_baja_I"] >= 3 && $datos["riesgo_talla_baja_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_talla_baja_I"] = $valor * 4;
            if ($datos["riesgo_talla_baja_I"] <= 8) {
                $datos["riesgo_talla_baja_I"] = 1;
            } else {
                if ($datos["riesgo_talla_baja_I"] >= 9 && $datos["riesgo_talla_baja_I"] < 16) {
                    $datos["riesgo_talla_baja_I"] = 2;
                } else {
                    $datos["riesgo_talla_baja_I"] = 3;
                }
            }
            // RIESGO DE TALLA BAJA

            // RIESGO DE MUERTE POR  DESNUTRICIÓN
            if ($datos["riesgo_muerte_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_muerte_I"] > 0 && $datos["riesgo_muerte_I"] < 1.5) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_muerte_I"] >= 1.5 && $datos["riesgo_muerte_I"] < 2.9) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_muerte_I"] >= 3 && $datos["riesgo_muerte_I"] < 5.5) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_muerte_I"] = $valor * 5;
            if ($datos["riesgo_muerte_I"] <= 8) {
                $datos["riesgo_muerte_I"] = 1;
            } else {
                if ($datos["riesgo_muerte_I"] >= 9 && $datos["riesgo_muerte_I"] < 16) {
                    $datos["riesgo_muerte_I"] = 2;
                } else {
                    $datos["riesgo_muerte_I"] = 3;
                }
            }
            // RIESGO DE MUERTE POR  DESNUTRICIÓN

            // RIESGO SOBREPESO
            if ($datos["riesgo_sobrepeso_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_sobrepeso_I"] > 0 && $datos["riesgo_sobrepeso_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_sobrepeso_I"] >= 1.1 && $datos["riesgo_sobrepeso_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_sobrepeso_I"] >= 4.1 && $datos["riesgo_sobrepeso_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_sobrepeso_I"] = $valor * 4;
            if ($datos["riesgo_sobrepeso_I"] <= 8) {
                $datos["riesgo_sobrepeso_I"] = 1;
            } else {
                if ($datos["riesgo_sobrepeso_I"] >= 9 && $datos["riesgo_sobrepeso_I"] < 16) {
                    $datos["riesgo_sobrepeso_I"] = 2;
                } else {
                    $datos["riesgo_sobrepeso_I"] = 3;
                }
            }
            // RIESGO SOBREPESO
            $datos["id_inte"] = $id;
            $datos["id_hogar"] = $id_hogar;
            $datos["estado"] = "Activo";
            $guardar = \App\RiesgosSaludMen1::guardar($datos, Session::get('alias'));
            // GUARDAR DATOS

            if ($guardar) {
                return 1;
            } else {
                return 1;
            }
        }
        if ($opcion == "DE1A5") {
            // Enfermedades Infecciosas
            $valor = 0;
            if ($datos["enfermedades_infecciosas_I"] <= 0.4) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 0.5 && $datos["enfermedades_infecciosas_I"] < 1.5) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_infecciosas_I"] >= 1.6 && $datos["enfermedades_infecciosas_I"] < 5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_infecciosas_I"] >= 5 && $datos["enfermedades_infecciosas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_infecciosas_I"] = $valor * 4;
            if ($datos["enfermedades_infecciosas_I"] <= 8) {
                $datos["enfermedades_infecciosas_I"] = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 9 && $datos["enfermedades_infecciosas_I"] < 16) {
                    $datos["enfermedades_infecciosas_I"] = 2;
                } else {
                    $datos["enfermedades_infecciosas_I"] = 3;
                }
            }
            // Enfermedades Infecciosas

            // Transtornos asociados al consumo de SPA.
            $valor = 0;
            if ($datos["transtornos_asociados_spa_I"] < 3) {
                $valor = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 3 && $datos["transtornos_asociados_spa_I"] < 6) {
                    $valor = 2;
                } else {
                    $valor = 3;
                }
            }
            $datos["transtornos_asociados_spa_I"] = $valor * 4;
            if ($datos["transtornos_asociados_spa_I"] <= 4) {
                $datos["transtornos_asociados_spa_I"] = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 5 && $datos["transtornos_asociados_spa_I"] < 9) {
                    $datos["transtornos_asociados_spa_I"] = 2;
                } else {
                    $datos["transtornos_asociados_spa_I"] = 3;
                }
            }
            // Transtornos asociados al consumo de SPA.

            // Enf Cardiovasculares aterogénica
            if ($datos["enfermedad_cardiovascular_I"] < 1) {
                $valor = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 1 && $datos["enfermedad_cardiovascular_I"] <= 2) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedad_cardiovascular_I"] >= 2.1 && $datos["enfermedad_cardiovascular_I"] <= 5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedad_cardiovascular_I"] >= 5.1 && $datos["enfermedad_cardiovascular_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedad_cardiovascular_I"] = $valor * 4;
            if ($datos["enfermedad_cardiovascular_I"] <= 8) {
                $datos["enfermedad_cardiovascular_I"] = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 9 && $datos["enfermedad_cardiovascular_I"] < 16) {
                    $datos["enfermedad_cardiovascular_I"] = 2;
                } else {
                    $datos["enfermedad_cardiovascular_I"] = 3;
                }
            }
            // Enf Cardiovasculares aterogénica

            // Cancer
            if ($datos["cancer_I"] < 1) {
                $valor = 1;
            } else {
                if ($datos["cancer_I"] >= 1 && $datos["cancer_I"] <= 3) {
                    $valor = 2;
                } else {
                    if ($datos["cancer_I"] >= 3.1 && $datos["cancer_I"] <= 6) {
                        $valor = 3;
                    } else {
                        if ($datos["cancer_I"] >= 6.1 && $datos["cancer_I"] <= 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["cancer_I"] = $valor * 5;
            if ($datos["cancer_I"] <= 8) {
                $datos["cancer_I"] = 1;
            } else {
                if ($datos["cancer_I"] >= 9 && $datos["cancer_I"] < 16) {
                    $datos["cancer_I"] = 2;
                } else {
                    $datos["cancer_I"] = 3;
                }
            }
            // Cancer

            // Alteraciones y transtornos visuales
            if ($datos["alteraciones_transtornos_visuales_I"] < 1) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 1 && $datos["alteraciones_transtornos_visuales_I"] <= 3) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_visuales_I"] >= 3.1 && $datos["alteraciones_transtornos_visuales_I"] <= 5) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_visuales_I"] >= 5.1 && $datos["alteraciones_transtornos_visuales_I"] <= 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_visuales_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 8) {
                $datos["alteraciones_transtornos_visuales_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 9 && $datos["alteraciones_transtornos_visuales_I"] < 16) {
                    $datos["alteraciones_transtornos_visuales_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_visuales_I"] = 3;
                }
            }
            // Alteraciones y transtornos visuales

            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            if ($datos["alteraciones_transtornos_audicion_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] > 0 && $datos["alteraciones_transtornos_audicion_I"] <= 1.75) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_audicion_I"] >= 1.76 && $datos["alteraciones_transtornos_audicion_I"] <= 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_audicion_I"] >= 3.6 && $datos["alteraciones_transtornos_audicion_I"] <= 5.25) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_audicion_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 8) {
                $datos["alteraciones_transtornos_audicion_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 9 && $datos["alteraciones_transtornos_audicion_I"] < 16) {
                    $datos["alteraciones_transtornos_audicion_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_audicion_I"] = 3;
                }
            }
            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // Salud Bucal
            if ($datos["salud_bucal_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["salud_bucal_I"] > 0 && $datos["salud_bucal_I"] <= 2.0) {
                    $valor = 2;
                } else {
                    if ($datos["salud_bucal_I"] >= 2.1 && $datos["salud_bucal_I"] <= 3.4) {
                        $valor = 3;
                    } else {
                        if ($datos["salud_bucal_I"] >= 3.5 && $datos["salud_bucal_I"] <= 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["salud_bucal_I"] = $valor * 3;
            if ($datos["salud_bucal_I"] <= 5) {
                $datos["salud_bucal_I"] = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 6 && $datos["salud_bucal_I"] < 11) {
                    $datos["salud_bucal_I"] = 2;
                } else {
                    $datos["salud_bucal_I"] = 3;
                }
            }
            // Salud Bucal

            // PROBLEMAS EN SALUD MENTAL
            if ($datos["problemas_salud_mental_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] > 0 && $datos["problemas_salud_mental_I"] <= 1.4) {
                    $valor = 2;
                } else {
                    if ($datos["problemas_salud_mental_I"] >= 1.5 && $datos["problemas_salud_mental_I"] <= 2.8) {
                        $valor = 3;
                    } else {
                        if ($datos["problemas_salud_mental_I"] >= 2.9 && $datos["problemas_salud_mental_I"] <= 5.6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["problemas_salud_mental_I"] = $valor * 4;
            if ($datos["problemas_salud_mental_I"] <= 8) {
                $datos["problemas_salud_mental_I"] = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 9 && $datos["problemas_salud_mental_I"] < 16) {
                    $datos["problemas_salud_mental_I"] = 2;
                } else {
                    $datos["problemas_salud_mental_I"] = 3;
                }
            }
            // PROBLEMAS EN SALUD MENTAL

            // VIOLENCIAS
            if ($datos["violencias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["violencias_I"] > 0 && $datos["violencias_I"] <= 1.4) {
                    $valor = 2;
                } else {
                    if ($datos["violencias_I"] >= 1.5 && $datos["violencias_I"] <= 2.8) {
                        $valor = 3;
                    } else {
                        if ($datos["violencias_I"] >= 2.9 && $datos["violencias_I"] <= 5.6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["violencias_I"] = $valor * 4;
            if ($datos["violencias_I"] <= 8) {
                $datos["violencias_I"] = 1;
            } else {
                if ($datos["violencias_I"] >= 9 && $datos["violencias_I"] < 16) {
                    $datos["violencias_I"] = 2;
                } else {
                    $datos["violencias_I"] = 3;
                }
            }
            // VIOLENCIAS

            // Enfermedades Respiratorias Crónicas
            if ($datos["enfermedades_respiratorias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] > 0 && $datos["enfermedades_respiratorias_I"] <= 1) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_respiratorias_I"] >= 1.1 && $datos["enfermedades_respiratorias_I"] <= 3.9) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_respiratorias_I"] >= 4 && $datos["enfermedades_respiratorias_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_respiratorias_I"] = $valor * 4;
            if ($datos["enfermedades_respiratorias_I"] <= 8) {
                $datos["enfermedades_respiratorias_I"] = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 9 && $datos["enfermedades_respiratorias_I"] < 16) {
                    $datos["enfermedades_respiratorias_I"] = 2;
                } else {
                    $datos["enfermedades_respiratorias_I"] = 3;
                }
            }
            // Enfermedades Respiratorias Crónicas

            // Enfermedades zoonoticas
            if ($datos["enfermedades_zoonoticas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] > 0 && $datos["enfermedades_zoonoticas_I"] <= 0.9) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_zoonoticas_I"] >= 1 && $datos["enfermedades_zoonoticas_I"] < 4.5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_zoonoticas_I"] >= 4.5 && $datos["enfermedades_zoonoticas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_zoonoticas_I"] = $valor * 4;
            if ($datos["enfermedades_zoonoticas_I"] <= 8) {
                $datos["enfermedades_zoonoticas_I"] = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 9 && $datos["enfermedades_zoonoticas_I"] < 16) {
                    $datos["enfermedades_zoonoticas_I"] = 2;
                } else {
                    $datos["enfermedades_zoonoticas_I"] = 3;
                }
            }
            // Enfermedades zoonoticas

            // Transtornos degenerativos, neuropatias y enf autoinmune
            if ($datos["transtornos_degenartivos_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] > 0 && $datos["transtornos_degenartivos_I"] < 1.1) {
                    $valor = 2;
                } else {
                    if ($datos["transtornos_degenartivos_I"] >= 1.1 && $datos["transtornos_degenartivos_I"] < 4.4) {
                        $valor = 3;
                    } else {
                        if ($datos["transtornos_degenartivos_I"] >= 4.4 && $datos["transtornos_degenartivos_I"] < 5.5) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["transtornos_degenartivos_I"] = $valor * 5;
            if ($datos["transtornos_degenartivos_I"] <= 8) {
                $datos["transtornos_degenartivos_I"] = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 9 && $datos["transtornos_degenartivos_I"] < 16) {
                    $datos["transtornos_degenartivos_I"] = 2;
                } else {
                    $datos["transtornos_degenartivos_I"] = 3;
                }
            }
            // Transtornos degenerativos, neuropatias y enf autoinmune

            // Consumo de SPA
            if ($datos["consumo_spa_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["consumo_spa_I"] > 0 && $datos["consumo_spa_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["consumo_spa_I"] >= 1 && $datos["consumo_spa_I"] <= 3) {
                        $valor = 3;
                    } else {
                        if ($datos["consumo_spa_I"] >= 3.1 && $datos["consumo_spa_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["consumo_spa_I"] = $valor * 4;
            if ($datos["consumo_spa_I"] <= 8) {
                $datos["consumo_spa_I"] = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 9 && $datos["consumo_spa_I"] < 16) {
                    $datos["consumo_spa_I"] = 2;
                } else {
                    $datos["consumo_spa_I"] = 3;
                }
            }
            // Consumo de SPA

            // RIESGO DESNUTRICIÓN Aguda
            if ($datos["riesgos_desnutricion_aguda_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgos_desnutricion_aguda_I"] > 0 && $datos["riesgos_desnutricion_aguda_I"] < 0.9) {
                    $valor = 2;
                } else {
                    if ($datos["riesgos_desnutricion_aguda_I"] >= 0.9 && $datos["riesgos_desnutricion_aguda_I"] < 2.8) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgos_desnutricion_aguda_I"] >= 2.8 && $datos["riesgos_desnutricion_aguda_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgos_desnutricion_aguda_I"] = $valor * 4;
            if ($datos["riesgos_desnutricion_aguda_I"] <= 8) {
                $datos["riesgos_desnutricion_aguda_I"] = 1;
            } else {
                if ($datos["riesgos_desnutricion_aguda_I"] >= 9 && $datos["riesgos_desnutricion_aguda_I"] < 16) {
                    $datos["riesgos_desnutricion_aguda_I"] = 2;
                } else {
                    $datos["riesgos_desnutricion_aguda_I"] = 3;
                }
            }
            // RIESGO DESNUTRICIÓN Aguda

            // RIESGO DESNUTRICIÓN GLOBAL
            if ($datos["riesgos_desnutricion_global_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgos_desnutricion_global_I"] > 0 && $datos["riesgos_desnutricion_global_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["riesgos_desnutricion_global_I"] >= 1 && $datos["riesgos_desnutricion_global_I"] < 2.8) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgos_desnutricion_global_I"] >= 2.8 && $datos["riesgos_desnutricion_global_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgos_desnutricion_global_I"] = $valor * 5;
            if ($datos["riesgos_desnutricion_global_I"] <= 8) {
                $datos["riesgos_desnutricion_global_I"] = 1;
            } else {
                if ($datos["riesgos_desnutricion_global_I"] >= 9 && $datos["riesgos_desnutricion_global_I"] < 16) {
                    $datos["riesgos_desnutricion_global_I"] = 2;
                } else {
                    $datos["riesgos_desnutricion_global_I"] = 3;
                }
            }

            // RIESGO DESNUTRICIÓN GLOBAL

            // RIESGO DE TALLA BAJA
            if ($datos["riesgo_talla_baja_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_talla_baja_I"] > 0 && $datos["riesgo_talla_baja_I"] < 1.6) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_talla_baja_I"] >= 1.6 && $datos["riesgo_talla_baja_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_talla_baja_I"] >= 3 && $datos["riesgo_talla_baja_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_talla_baja_I"] = $valor * 4;
            if ($datos["riesgo_talla_baja_I"] <= 8) {
                $datos["riesgo_talla_baja_I"] = 1;
            } else {
                if ($datos["riesgo_talla_baja_I"] >= 9 && $datos["riesgo_talla_baja_I"] < 16) {
                    $datos["riesgo_talla_baja_I"] = 2;
                } else {
                    $datos["riesgo_talla_baja_I"] = 3;
                }
            }
            // RIESGO DE TALLA BAJA

            // RIESGO DE MUERTE POR  DESNUTRICIÓN
            if ($datos["riesgo_muerte_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_muerte_I"] > 0 && $datos["riesgo_muerte_I"] < 1.5) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_muerte_I"] >= 1.5 && $datos["riesgo_muerte_I"] < 2.9) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_muerte_I"] >= 3 && $datos["riesgo_muerte_I"] < 5.5) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_muerte_I"] = $valor * 5;
            if ($datos["riesgo_muerte_I"] <= 8) {
                $datos["riesgo_muerte_I"] = 1;
            } else {
                if ($datos["riesgo_muerte_I"] >= 9 && $datos["riesgo_muerte_I"] < 16) {
                    $datos["riesgo_muerte_I"] = 2;
                } else {
                    $datos["riesgo_muerte_I"] = 3;
                }
            }
            // RIESGO DE MUERTE POR  DESNUTRICIÓN

            // RIESGO SOBREPESO
            if ($datos["riesgo_sobrepeso_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_sobrepeso_I"] > 0 && $datos["riesgo_sobrepeso_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_sobrepeso_I"] >= 1.1 && $datos["riesgo_sobrepeso_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_sobrepeso_I"] >= 4.1 && $datos["riesgo_sobrepeso_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_sobrepeso_I"] = $valor * 4;
            if ($datos["riesgo_sobrepeso_I"] <= 8) {
                $datos["riesgo_sobrepeso_I"] = 1;
            } else {
                if ($datos["riesgo_sobrepeso_I"] >= 9 && $datos["riesgo_sobrepeso_I"] < 16) {
                    $datos["riesgo_sobrepeso_I"] = 2;
                } else {
                    $datos["riesgo_sobrepeso_I"] = 3;
                }
            }
            // RIESGO SOBREPESO
            $datos["id_inte"] = $id;
            $datos["id_hogar"] = $id_hogar;
            $datos["estado"] = "Activo";
            $guardar = \App\RiesgosSaludDe1a5::guardar($datos, Session::get('alias'));
            // GUARDAR DATOS

            if ($guardar) {
                return 1;
            } else {
                return 1;
            }
        }
        if ($opcion == "DE6A11") {
            // RIESGO DE RETRASO  EN TALLA
            $valor = 0;
            if ($datos["riesgo_talla_baja_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_talla_baja_I"] >= 0.1 && $datos["riesgo_talla_baja_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_talla_baja_I"] >= 0.5 && $datos["riesgo_talla_baja_I"] < 2.9) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_talla_baja_I"] >= 2.9 && $datos["riesgo_talla_baja_I"] <= 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_talla_baja_I"] = $valor * 4;
            if ($datos["riesgo_talla_baja_I"] <= 8) {
                $datos["riesgo_talla_baja_I"] = 1;
            } else {
                if ($datos["riesgo_talla_baja_I"] >= 9 && $datos["riesgo_talla_baja_I"] < 16) {
                    $datos["riesgo_talla_baja_I"] = 2;
                } else {
                    $datos["riesgo_talla_baja_I"] = 3;
                }
            }
            // RIESGO DE RETRASO  EN TALLA

            // Riesgo de delgadez
            $valor = 0;
            if ($datos["riesgo_delgadez_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_delgadez_I"] >= 0.1 && $datos["riesgo_delgadez_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_delgadez_I"] >= 1 && $datos["riesgo_delgadez_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_delgadez_I"] >= 3.5 && $datos["riesgo_delgadez_I"] <= 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_delgadez_I"] = $valor * 4;
            if ($datos["riesgo_delgadez_I"] <= 8) {
                $datos["riesgo_delgadez_I"] = 1;
            } else {
                if ($datos["riesgo_delgadez_I"] >= 9 && $datos["riesgo_delgadez_I"] < 16) {
                    $datos["riesgo_delgadez_I"] = 2;
                } else {
                    $datos["riesgo_delgadez_I"] = 3;
                }
            }
            // Riesgo de delgadez

            // Enfermedades Infecciosas
            $valor = 0;
            if ($datos["enfermedades_infecciosas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 0.6 && $datos["enfermedades_infecciosas_I"] < 1.2) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_infecciosas_I"] >= 1.2 && $datos["enfermedades_infecciosas_I"] < 4.3) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_infecciosas_I"] >= 4.3 && $datos["enfermedades_infecciosas_I"] <= 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_infecciosas_I"] = $valor * 4;
            if ($datos["enfermedades_infecciosas_I"] <= 8) {
                $datos["enfermedades_infecciosas_I"] = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 9 && $datos["enfermedades_infecciosas_I"] < 16) {
                    $datos["enfermedades_infecciosas_I"] = 2;
                } else {
                    $datos["enfermedades_infecciosas_I"] = 3;
                }
            }
            // Enfermedades Infecciosas

            // Transtornos asociados al consumo de SPA.
            $valor = 0;
            if ($datos["transtornos_asociados_spa_I"] < 3) {
                $valor = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 3 && $datos["transtornos_asociados_spa_I"] < 5) {
                    $valor = 2;
                } else {
                    $valor = 3;
                }
            }
            $datos["transtornos_asociados_spa_I"] = $valor * 4;
            if ($datos["transtornos_asociados_spa_I"] < 5) {
                $datos["transtornos_asociados_spa_I"] = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 5 && $datos["transtornos_asociados_spa_I"] < 9) {
                    $datos["transtornos_asociados_spa_I"] = 2;
                } else {
                    $datos["transtornos_asociados_spa_I"] = 3;
                }
            }
            // Transtornos asociados al consumo de SPA.

            // Consumo de SPA.
            $valor = 0;
            if ($datos["consumo_spa_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 0.1 && $datos["consumo_spa_I"] < 0.8) {
                    $valor = 2;
                } else {
                    if ($datos["consumo_spa_I"] >= 0.8 && $datos["consumo_spa_I"] < 4.8) {
                        $valor = 3;
                    } else {
                        if ($datos["consumo_spa_I"] >= 4.8 && $datos["consumo_spa_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["consumo_spa_I"] = $valor * 4;
            if ($datos["consumo_spa_I"] <= 8) {
                $datos["consumo_spa_I"] = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 9 && $datos["consumo_spa_I"] < 16) {
                    $datos["consumo_spa_I"] = 2;
                } else {
                    $datos["consumo_spa_I"] = 3;
                }
            }
            // Consumo de SPA.

            // Enf Cardiovasculares aterogénica
            $valor = 0;
            if ($datos["enfermedad_cardiovascular_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 0.1 && $datos["enfermedad_cardiovascular_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedad_cardiovascular_I"] >= 1 && $datos["enfermedad_cardiovascular_I"] < 2.6) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedad_cardiovascular_I"] >= 2.6 && $datos["enfermedad_cardiovascular_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedad_cardiovascular_I"] = $valor * 4;
            if ($datos["enfermedad_cardiovascular_I"] <= 8) {
                $datos["enfermedad_cardiovascular_I"] = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 9 && $datos["enfermedad_cardiovascular_I"] < 16) {
                    $datos["enfermedad_cardiovascular_I"] = 2;
                } else {
                    $datos["enfermedad_cardiovascular_I"] = 3;
                }
            }
            // Enf Cardiovasculares aterogénica

            // Cancer
            $valor = 0;
            if ($datos["cancer_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["cancer_I"] >= 0.1 && $datos["cancer_I"] < 0.8) {
                    $valor = 2;
                } else {
                    if ($datos["cancer_I"] >= 0.8 && $datos["cancer_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["cancer_I"] >= 3 && $datos["cancer_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["cancer_I"] = $valor * 5;
            if ($datos["cancer_I"] <= 8) {
                $datos["cancer_I"] = 1;
            } else {
                if ($datos["cancer_I"] >= 9 && $datos["cancer_I"] < 16) {
                    $datos["cancer_I"] = 2;
                } else {
                    $datos["cancer_I"] = 3;
                }
            }
            // Cancer

            // Alteraciones y transtornos visuales
            $valor = 0;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 0.1 && $datos["alteraciones_transtornos_visuales_I"] < 1.8) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_visuales_I"] >= 1.8 && $datos["alteraciones_transtornos_visuales_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_visuales_I"] >= 3.5 && $datos["alteraciones_transtornos_visuales_I"] < 5.2) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_visuales_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 8) {
                $datos["alteraciones_transtornos_visuales_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 9 && $datos["alteraciones_transtornos_visuales_I"] < 16) {
                    $datos["alteraciones_transtornos_visuales_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_visuales_I"] = 3;
                }
            }
            // Alteraciones y transtornos visuales

            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $valor = 0;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 0.1 && $datos["alteraciones_transtornos_audicion_I"] < 2) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_audicion_I"] >= 2 && $datos["alteraciones_transtornos_audicion_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_audicion_I"] >= 4 && $datos["alteraciones_transtornos_audicion_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_audicion_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 8) {
                $datos["alteraciones_transtornos_audicion_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 9 && $datos["alteraciones_transtornos_audicion_I"] < 16) {
                    $datos["alteraciones_transtornos_audicion_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_audicion_I"] = 3;
                }
            }
            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // Salud Bucal
            $valor = 0;
            if ($datos["salud_bucal_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 0.1 && $datos["salud_bucal_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["salud_bucal_I"] >= 0.5 && $datos["salud_bucal_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["salud_bucal_I"] >= 3 && $datos["salud_bucal_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["salud_bucal_I"] = $valor * 4;
            if ($datos["salud_bucal_I"] <= 8) {
                $datos["salud_bucal_I"] = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 9 && $datos["salud_bucal_I"] < 16) {
                    $datos["salud_bucal_I"] = 2;
                } else {
                    $datos["salud_bucal_I"] = 3;
                }
            }
            // Salud Bucal

            // Violencia
            $valor = 0;
            if ($datos["violencias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["violencias_I"] >= 0.1 && $datos["violencias_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["violencias_I"] >= 0.5 && $datos["violencias_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["violencias_I"] >= 3.5 && $datos["violencias_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["violencias_I"] = $valor * 5;
            if ($datos["violencias_I"] <= 8) {
                $datos["violencias_I"] = 1;
            } else {
                if ($datos["violencias_I"] >= 9 && $datos["violencias_I"] < 16) {
                    $datos["violencias_I"] = 2;
                } else {
                    $datos["violencias_I"] = 3;
                }
            }
            // Violencia

            // PROBLEMAS EN SALUD MENTAL
            $valor = 0;
            if ($datos["problemas_salud_mental_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 0.1 && $datos["problemas_salud_mental_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["problemas_salud_mental_I"] >= 1 && $datos["problemas_salud_mental_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["problemas_salud_mental_I"] >= 4 && $datos["problemas_salud_mental_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["problemas_salud_mental_I"] = $valor * 4;
            if ($datos["problemas_salud_mental_I"] <= 8) {
                $datos["problemas_salud_mental_I"] = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 9 && $datos["problemas_salud_mental_I"] < 16) {
                    $datos["problemas_salud_mental_I"] = 2;
                } else {
                    $datos["problemas_salud_mental_I"] = 3;
                }
            }
            // PROBLEMAS EN SALUD MENTAL

            // Enfermedades Respiratorias cronicas
            $valor = 0;
            if ($datos["enfermedades_respiratorias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 0.1 && $datos["enfermedades_respiratorias_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_respiratorias_I"] >= 1 && $datos["enfermedades_respiratorias_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_respiratorias_I"] >= 3.5 && $datos["enfermedades_respiratorias_I"] < 6.5) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_respiratorias_I"] = $valor * 4;
            if ($datos["enfermedades_respiratorias_I"] <= 8) {
                $datos["enfermedades_respiratorias_I"] = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 9 && $datos["enfermedades_respiratorias_I"] < 16) {
                    $datos["enfermedades_respiratorias_I"] = 2;
                } else {
                    $datos["enfermedades_respiratorias_I"] = 3;
                }
            }
            // Enfermedades Respiratorias cronicas

            // Enfermedades Zoonóticas
            $valor = 0;
            if ($datos["enfermedades_zoonoticas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 0.1 && $datos["enfermedades_zoonoticas_I"] < 1.1) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_zoonoticas_I"] >= 1.1 && $datos["enfermedades_zoonoticas_I"] < 3.6) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_zoonoticas_I"] >= 3.6 && $datos["enfermedades_zoonoticas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_zoonoticas_I"] = $valor * 4;
            if ($datos["enfermedades_zoonoticas_I"] <= 8) {
                $datos["enfermedades_zoonoticas_I"] = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 9 && $datos["enfermedades_zoonoticas_I"] < 16) {
                    $datos["enfermedades_zoonoticas_I"] = 2;
                } else {
                    $datos["enfermedades_zoonoticas_I"] = 3;
                }
            }
            // Enfermedades Zoonóticas

            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $valor = 0;
            if ($datos["transtornos_degenartivos_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 0.1 && $datos["transtornos_degenartivos_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["transtornos_degenartivos_I"] >= 1 && $datos["transtornos_degenartivos_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["transtornos_degenartivos_I"] >= 4 && $datos["transtornos_degenartivos_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["transtornos_degenartivos_I"] = $valor * 5;
            if ($datos["transtornos_degenartivos_I"] <= 8) {
                $datos["transtornos_degenartivos_I"] = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 9 && $datos["transtornos_degenartivos_I"] < 16) {
                    $datos["transtornos_degenartivos_I"] = 2;
                } else {
                    $datos["transtornos_degenartivos_I"] = 3;
                }
            }
            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["id_inte"] = $id;
            $datos["id_hogar"] = $id_hogar;
            $datos["estado"] = "Activo";
            $guardar = \App\RiesgosSaludDe6a11::guardar($datos, Session::get('alias'));
            // GUARDAR DATOS

            if ($guardar) {
                return 1;
            } else {
                return 1;
            }
        }
        if ($opcion == "DE12A17") {
            // RIESGO DE RETRASO  EN TALLA
            $valor = 0;
            if ($datos["riesgo_talla_baja_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_talla_baja_I"] >= 0.1 && $datos["riesgo_talla_baja_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_talla_baja_I"] >= 0.5 && $datos["riesgo_talla_baja_I"] < 2.9) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_talla_baja_I"] >= 2.9 && $datos["riesgo_talla_baja_I"] <= 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_talla_baja_I"] = $valor * 4;
            if ($datos["riesgo_talla_baja_I"] <= 8) {
                $datos["riesgo_talla_baja_I"] = 1;
            } else {
                if ($datos["riesgo_talla_baja_I"] >= 9 && $datos["riesgo_talla_baja_I"] < 16) {
                    $datos["riesgo_talla_baja_I"] = 2;
                } else {
                    $datos["riesgo_talla_baja_I"] = 3;
                }
            }
            // RIESGO DE RETRASO  EN TALLA

            // Riesgo de delgadez
            $valor = 0;
            if ($datos["riesgo_delgadez_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_delgadez_I"] >= 0.1 && $datos["riesgo_delgadez_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_delgadez_I"] >= 1 && $datos["riesgo_delgadez_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_delgadez_I"] >= 3.5 && $datos["riesgo_delgadez_I"] <= 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_delgadez_I"] = $valor * 4;
            if ($datos["riesgo_delgadez_I"] <= 8) {
                $datos["riesgo_delgadez_I"] = 1;
            } else {
                if ($datos["riesgo_delgadez_I"] >= 9 && $datos["riesgo_delgadez_I"] < 16) {
                    $datos["riesgo_delgadez_I"] = 2;
                } else {
                    $datos["riesgo_delgadez_I"] = 3;
                }
            }
            // Riesgo de delgadez

            // Enfermedades Infecciosas
            $valor = 0;
            if ($datos["enfermedades_infecciosas_I"] < 0.6) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 0.6 && $datos["enfermedades_infecciosas_I"] < 1.2) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_infecciosas_I"] >= 1.2 && $datos["enfermedades_infecciosas_I"] < 4.3) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_infecciosas_I"] >= 4.3 && $datos["enfermedades_infecciosas_I"] <= 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_infecciosas_I"] = $valor * 4;
            if ($datos["enfermedades_infecciosas_I"] <= 8) {
                $datos["enfermedades_infecciosas_I"] = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 9 && $datos["enfermedades_infecciosas_I"] < 16) {
                    $datos["enfermedades_infecciosas_I"] = 2;
                } else {
                    $datos["enfermedades_infecciosas_I"] = 3;
                }
            }
            // Enfermedades Infecciosas

            // Transtornos asociados al consumo de SPA.
            $valor = 0;
            if ($datos["transtornos_asociados_spa_I"] < 3) {
                $valor = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 3 && $datos["transtornos_asociados_spa_I"] < 5) {
                    $valor = 2;
                } else {
                    $valor = 3;
                }
            }
            $datos["transtornos_asociados_spa_I"] = $valor * 4;
            if ($datos["transtornos_asociados_spa_I"] < 5) {
                $datos["transtornos_asociados_spa_I"] = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 5 && $datos["transtornos_asociados_spa_I"] < 9) {
                    $datos["transtornos_asociados_spa_I"] = 2;
                } else {
                    $datos["transtornos_asociados_spa_I"] = 3;
                }
            }
            // Transtornos asociados al consumo de SPA.

            // Consumo de SPA.
            $valor = 0;
            if ($datos["consumo_spa_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 0.1 && $datos["consumo_spa_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["consumo_spa_I"] >= 1 && $datos["consumo_spa_I"] < 2.5) {
                        $valor = 3;
                    } else {
                        if ($datos["consumo_spa_I"] >= 2.5 && $datos["consumo_spa_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["consumo_spa_I"] = $valor * 4;
            if ($datos["consumo_spa_I"] <= 8) {
                $datos["consumo_spa_I"] = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 9 && $datos["consumo_spa_I"] < 16) {
                    $datos["consumo_spa_I"] = 2;
                } else {
                    $datos["consumo_spa_I"] = 3;
                }
            }
            // Consumo de SPA.

            // Enf Cardiovasculares aterogénica
            $valor = 0;
            if ($datos["enfermedad_cardiovascular_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 0.1 && $datos["enfermedad_cardiovascular_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedad_cardiovascular_I"] >= 1 && $datos["enfermedad_cardiovascular_I"] < 2.6) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedad_cardiovascular_I"] >= 2.6 && $datos["enfermedad_cardiovascular_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedad_cardiovascular_I"] = $valor * 4;
            if ($datos["enfermedad_cardiovascular_I"] <= 8) {
                $datos["enfermedad_cardiovascular_I"] = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 9 && $datos["enfermedad_cardiovascular_I"] < 16) {
                    $datos["enfermedad_cardiovascular_I"] = 2;
                } else {
                    $datos["enfermedad_cardiovascular_I"] = 3;
                }
            }
            // Enf Cardiovasculares aterogénica

            // Cancer
            $valor = 0;
            if ($datos["cancer_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["cancer_I"] >= 0.1 && $datos["cancer_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["cancer_I"] >= 0.5 && $datos["cancer_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["cancer_I"] >= 4 && $datos["cancer_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["cancer_I"] = $valor * 5;
            if ($datos["cancer_I"] <= 8) {
                $datos["cancer_I"] = 1;
            } else {
                if ($datos["cancer_I"] >= 9 && $datos["cancer_I"] < 16) {
                    $datos["cancer_I"] = 2;
                } else {
                    $datos["cancer_I"] = 3;
                }
            }
            // Cancer

            // Alteraciones y transtornos visuales
            $valor = 0;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 0.1 && $datos["alteraciones_transtornos_visuales_I"] < 1.7) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_visuales_I"] >= 1.7 && $datos["alteraciones_transtornos_visuales_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_visuales_I"] >= 3.5 && $datos["alteraciones_transtornos_visuales_I"] < 5.2) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_visuales_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 8) {
                $datos["alteraciones_transtornos_visuales_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 9 && $datos["alteraciones_transtornos_visuales_I"] < 16) {
                    $datos["alteraciones_transtornos_visuales_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_visuales_I"] = 3;
                }
            }
            // Alteraciones y transtornos visuales

            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $valor = 0;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 0.1 && $datos["alteraciones_transtornos_audicion_I"] < 2) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_audicion_I"] >= 2 && $datos["alteraciones_transtornos_audicion_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_audicion_I"] >= 4 && $datos["alteraciones_transtornos_audicion_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_audicion_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 8) {
                $datos["alteraciones_transtornos_audicion_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 9 && $datos["alteraciones_transtornos_audicion_I"] < 16) {
                    $datos["alteraciones_transtornos_audicion_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_audicion_I"] = 3;
                }
            }
            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // Salud Bucal
            $valor = 0;
            if ($datos["salud_bucal_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 0.1 && $datos["salud_bucal_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["salud_bucal_I"] >= 0.5 && $datos["salud_bucal_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["salud_bucal_I"] >= 3 && $datos["salud_bucal_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["salud_bucal_I"] = $valor * 4;
            if ($datos["salud_bucal_I"] <= 8) {
                $datos["salud_bucal_I"] = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 9 && $datos["salud_bucal_I"] < 16) {
                    $datos["salud_bucal_I"] = 2;
                } else {
                    $datos["salud_bucal_I"] = 3;
                }
            }
            // Salud Bucal

            // Violencia
            $valor = 0;
            if ($datos["violencias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["violencias_I"] >= 0.1 && $datos["violencias_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["violencias_I"] >= 0.5 && $datos["violencias_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["violencias_I"] >= 3.5 && $datos["violencias_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["violencias_I"] = $valor * 5;
            if ($datos["violencias_I"] <= 8) {
                $datos["violencias_I"] = 1;
            } else {
                if ($datos["violencias_I"] >= 9 && $datos["violencias_I"] < 16) {
                    $datos["violencias_I"] = 2;
                } else {
                    $datos["violencias_I"] = 3;
                }
            }
            // Violencia

            // PROBLEMAS EN SALUD MENTAL
            $valor = 0;
            if ($datos["problemas_salud_mental_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 0.1 && $datos["problemas_salud_mental_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["problemas_salud_mental_I"] >= 1 && $datos["problemas_salud_mental_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["problemas_salud_mental_I"] >= 4 && $datos["problemas_salud_mental_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["problemas_salud_mental_I"] = $valor * 4;
            if ($datos["problemas_salud_mental_I"] <= 8) {
                $datos["problemas_salud_mental_I"] = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 9 && $datos["problemas_salud_mental_I"] < 16) {
                    $datos["problemas_salud_mental_I"] = 2;
                } else {
                    $datos["problemas_salud_mental_I"] = 3;
                }
            }
            // PROBLEMAS EN SALUD MENTAL

            // Enfermedades Respiratorias cronicas
            $valor = 0;
            if ($datos["enfermedades_respiratorias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 0.1 && $datos["enfermedades_respiratorias_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_respiratorias_I"] >= 0.5 && $datos["enfermedades_respiratorias_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_respiratorias_I"] >= 3.5 && $datos["enfermedades_respiratorias_I"] < 7.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_respiratorias_I"] = $valor * 4;
            if ($datos["enfermedades_respiratorias_I"] <= 8) {
                $datos["enfermedades_respiratorias_I"] = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 9 && $datos["enfermedades_respiratorias_I"] < 16) {
                    $datos["enfermedades_respiratorias_I"] = 2;
                } else {
                    $datos["enfermedades_respiratorias_I"] = 3;
                }
            }
            // Enfermedades Respiratorias cronicas

            // Enfermedades Zoonóticas
            $valor = 0;
            if ($datos["enfermedades_zoonoticas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 0.1 && $datos["enfermedades_zoonoticas_I"] < 1.1) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_zoonoticas_I"] >= 1.1 && $datos["enfermedades_zoonoticas_I"] < 4.1) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_zoonoticas_I"] >= 4.1 && $datos["enfermedades_zoonoticas_I"] < 8.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_zoonoticas_I"] = $valor * 4;
            if ($datos["enfermedades_zoonoticas_I"] <= 8) {
                $datos["enfermedades_zoonoticas_I"] = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 9 && $datos["enfermedades_zoonoticas_I"] < 16) {
                    $datos["enfermedades_zoonoticas_I"] = 2;
                } else {
                    $datos["enfermedades_zoonoticas_I"] = 3;
                }
            }
            // Enfermedades Zoonóticas

            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $valor = 0;
            if ($datos["transtornos_degenartivos_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 0.1 && $datos["transtornos_degenartivos_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["transtornos_degenartivos_I"] >= 1 && $datos["transtornos_degenartivos_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["transtornos_degenartivos_I"] >= 4 && $datos["transtornos_degenartivos_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["transtornos_degenartivos_I"] = $valor * 5;
            if ($datos["transtornos_degenartivos_I"] <= 8) {
                $datos["transtornos_degenartivos_I"] = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 9 && $datos["transtornos_degenartivos_I"] < 16) {
                    $datos["transtornos_degenartivos_I"] = 2;
                } else {
                    $datos["transtornos_degenartivos_I"] = 3;
                }
            }
            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["id_inte"] = $id;
            $datos["id_hogar"] = $id_hogar;
            $datos["estado"] = "Activo";
            $guardar = \App\RiesgosSaludDe12a17::guardar($datos, Session::get('alias'));
            // GUARDAR DATOS

            if ($guardar) {
                return 1;
            } else {
                return 1;
            }
        }
        if ($opcion == "DE18A28") {
            // Riesgo de delgadez
            $valor = 0;
            if ($datos["riesgo_delgadez_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_delgadez_I"] >= 0.1 && $datos["riesgo_delgadez_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_delgadez_I"] >= 0.5 && $datos["riesgo_delgadez_I"] < 3.4) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_delgadez_I"] >= 3.4 && $datos["riesgo_delgadez_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_delgadez_I"] = $valor * 4;
            if ($datos["riesgo_delgadez_I"] <= 8) {
                $datos["riesgo_delgadez_I"] = 1;
            } else {
                if ($datos["riesgo_delgadez_I"] >= 9 && $datos["riesgo_delgadez_I"] < 16) {
                    $datos["riesgo_delgadez_I"] = 2;
                } else {
                    $datos["riesgo_delgadez_I"] = 3;
                }
            }
            // Riesgo de delgadez

            // Enfermedades Infecciosas
            $valor = 0;
            if ($datos["enfermedades_infecciosas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 0.1 && $datos["enfermedades_infecciosas_I"] < 0.9) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_infecciosas_I"] >= 0.9 && $datos["enfermedades_infecciosas_I"] < 5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_infecciosas_I"] >= 5 && $datos["enfermedades_infecciosas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_infecciosas_I"] = $valor * 4;
            if ($datos["enfermedades_infecciosas_I"] <= 8) {
                $datos["enfermedades_infecciosas_I"] = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 9 && $datos["enfermedades_infecciosas_I"] < 16) {
                    $datos["enfermedades_infecciosas_I"] = 2;
                } else {
                    $datos["enfermedades_infecciosas_I"] = 3;
                }
            }
            // Enfermedades Infecciosas

            // Consumo de SPA.
            $valor = 0;
            if ($datos["consumo_spa_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 0.1 && $datos["consumo_spa_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["consumo_spa_I"] >= 1 && $datos["consumo_spa_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["consumo_spa_I"] >= 4 && $datos["consumo_spa_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["consumo_spa_I"] = $valor * 4;
            if ($datos["consumo_spa_I"] <= 8) {
                $datos["consumo_spa_I"] = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 9 && $datos["consumo_spa_I"] < 16) {
                    $datos["consumo_spa_I"] = 2;
                } else {
                    $datos["consumo_spa_I"] = 3;
                }
            }
            // Consumo de SPA.

            // Transtornos asociados al consumo de SPA.
            $valor = 0;
            if ($datos["transtornos_asociados_spa_I"] < 3) {
                $valor = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 3 && $datos["transtornos_asociados_spa_I"] < 5) {
                    $valor = 2;
                } else {
                    $valor = 3;
                }
            }
            $datos["transtornos_asociados_spa_I"] = $valor * 4;
            if ($datos["transtornos_asociados_spa_I"] < 5) {
                $datos["transtornos_asociados_spa_I"] = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 5 && $datos["transtornos_asociados_spa_I"] < 9) {
                    $datos["transtornos_asociados_spa_I"] = 2;
                } else {
                    $datos["transtornos_asociados_spa_I"] = 3;
                }
            }
            // Transtornos asociados al consumo de SPA.

            // Enf Cardiovasculares aterogénica
            $valor = 0;
            if ($datos["enfermedad_cardiovascular_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 0.1 && $datos["enfermedad_cardiovascular_I"] < 0.8) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedad_cardiovascular_I"] >= 0.8 && $datos["enfermedad_cardiovascular_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedad_cardiovascular_I"] >= 3 && $datos["enfermedad_cardiovascular_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedad_cardiovascular_I"] = $valor * 5;
            if ($datos["enfermedad_cardiovascular_I"] <= 8) {
                $datos["enfermedad_cardiovascular_I"] = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 9 && $datos["enfermedad_cardiovascular_I"] < 16) {
                    $datos["enfermedad_cardiovascular_I"] = 2;
                } else {
                    $datos["enfermedad_cardiovascular_I"] = 3;
                }
            }
            // Enf Cardiovasculares aterogénica

            // Cancer
            $valor = 0;
            if ($datos["cancer_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["cancer_I"] >= 0.1 && $datos["cancer_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["cancer_I"] >= 0.5 && $datos["cancer_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["cancer_I"] >= 4 && $datos["cancer_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["cancer_I"] = $valor * 5;
            if ($datos["cancer_I"] <= 8) {
                $datos["cancer_I"] = 1;
            } else {
                if ($datos["cancer_I"] >= 9 && $datos["cancer_I"] < 16) {
                    $datos["cancer_I"] = 2;
                } else {
                    $datos["cancer_I"] = 3;
                }
            }
            // Cancer

            // Alteraciones y transtornos visuales
            $valor = 0;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 0.1 && $datos["alteraciones_transtornos_visuales_I"] < 1.7) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_visuales_I"] >= 1.7 && $datos["alteraciones_transtornos_visuales_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_visuales_I"] >= 3.5 && $datos["alteraciones_transtornos_visuales_I"] < 5.2) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_visuales_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 8) {
                $datos["alteraciones_transtornos_visuales_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 9 && $datos["alteraciones_transtornos_visuales_I"] < 16) {
                    $datos["alteraciones_transtornos_visuales_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_visuales_I"] = 3;
                }
            }
            // Alteraciones y transtornos visuales

            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $valor = 0;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 0.1 && $datos["alteraciones_transtornos_audicion_I"] < 2) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_audicion_I"] >= 2 && $datos["alteraciones_transtornos_audicion_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_audicion_I"] >= 4 && $datos["alteraciones_transtornos_audicion_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_audicion_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 8) {
                $datos["alteraciones_transtornos_audicion_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 9 && $datos["alteraciones_transtornos_audicion_I"] < 16) {
                    $datos["alteraciones_transtornos_audicion_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_audicion_I"] = 3;
                }
            }
            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // Salud Bucal
            $valor = 0;
            if ($datos["salud_bucal_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 0.1 && $datos["salud_bucal_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["salud_bucal_I"] >= 0.5 && $datos["salud_bucal_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["salud_bucal_I"] >= 3 && $datos["salud_bucal_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["salud_bucal_I"] = $valor * 4;
            if ($datos["salud_bucal_I"] <= 8) {
                $datos["salud_bucal_I"] = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 9 && $datos["salud_bucal_I"] < 16) {
                    $datos["salud_bucal_I"] = 2;
                } else {
                    $datos["salud_bucal_I"] = 3;
                }
            }
            // Salud Bucal

            // Violencia
            $valor = 0;
            if ($datos["violencias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["violencias_I"] >= 0.1 && $datos["violencias_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["violencias_I"] >= 0.5 && $datos["violencias_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["violencias_I"] >= 3.5 && $datos["violencias_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["violencias_I"] = $valor * 5;
            if ($datos["violencias_I"] <= 8) {
                $datos["violencias_I"] = 1;
            } else {
                if ($datos["violencias_I"] >= 9 && $datos["violencias_I"] < 16) {
                    $datos["violencias_I"] = 2;
                } else {
                    $datos["violencias_I"] = 3;
                }
            }
            // Violencia

            // PROBLEMAS EN SALUD MENTAL
            $valor = 0;
            if ($datos["problemas_salud_mental_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 0.1 && $datos["problemas_salud_mental_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["problemas_salud_mental_I"] >= 1 && $datos["problemas_salud_mental_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["problemas_salud_mental_I"] >= 4 && $datos["problemas_salud_mental_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["problemas_salud_mental_I"] = $valor * 4;
            if ($datos["problemas_salud_mental_I"] <= 8) {
                $datos["problemas_salud_mental_I"] = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 9 && $datos["problemas_salud_mental_I"] < 16) {
                    $datos["problemas_salud_mental_I"] = 2;
                } else {
                    $datos["problemas_salud_mental_I"] = 3;
                }
            }
            // PROBLEMAS EN SALUD MENTAL

            // Enfermedades Respiratorias cronicas
            $valor = 0;
            if ($datos["enfermedades_respiratorias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 0.1 && $datos["enfermedades_respiratorias_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_respiratorias_I"] >= 0.5 && $datos["enfermedades_respiratorias_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_respiratorias_I"] >= 3.5 && $datos["enfermedades_respiratorias_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_respiratorias_I"] = $valor * 4;
            if ($datos["enfermedades_respiratorias_I"] <= 8) {
                $datos["enfermedades_respiratorias_I"] = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 9 && $datos["enfermedades_respiratorias_I"] < 16) {
                    $datos["enfermedades_respiratorias_I"] = 2;
                } else {
                    $datos["enfermedades_respiratorias_I"] = 3;
                }
            }
            // Enfermedades Respiratorias cronicas

            // Enfermedades Zoonóticas
            $valor = 0;
            if ($datos["enfermedades_zoonoticas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 0.1 && $datos["enfermedades_zoonoticas_I"] < 0.6) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_zoonoticas_I"] >= 0.6 && $datos["enfermedades_zoonoticas_I"] < 4.1) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_zoonoticas_I"] >= 4.1 && $datos["enfermedades_zoonoticas_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_zoonoticas_I"] = $valor * 4;
            if ($datos["enfermedades_zoonoticas_I"] <= 8) {
                $datos["enfermedades_zoonoticas_I"] = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 9 && $datos["enfermedades_zoonoticas_I"] < 16) {
                    $datos["enfermedades_zoonoticas_I"] = 2;
                } else {
                    $datos["enfermedades_zoonoticas_I"] = 3;
                }
            }
            // Enfermedades Zoonóticas

            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $valor = 0;
            if ($datos["transtornos_degenartivos_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 0.1 && $datos["transtornos_degenartivos_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["transtornos_degenartivos_I"] >= 1 && $datos["transtornos_degenartivos_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["transtornos_degenartivos_I"] >= 4 && $datos["transtornos_degenartivos_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["transtornos_degenartivos_I"] = $valor * 5;
            if ($datos["transtornos_degenartivos_I"] <= 8) {
                $datos["transtornos_degenartivos_I"] = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 9 && $datos["transtornos_degenartivos_I"] < 16) {
                    $datos["transtornos_degenartivos_I"] = 2;
                } else {
                    $datos["transtornos_degenartivos_I"] = 3;
                }
            }
            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["id_inte"] = $id;
            $datos["id_hogar"] = $id_hogar;
            $datos["estado"] = "Activo";
            $guardar = \App\RiesgosSaludDe18a28::guardar($datos, Session::get('alias'));
            // GUARDAR DATOS

            if ($guardar) {
                return 1;
            } else {
                return 1;
            }
        }
        if ($opcion == "DE29A59") {
            // Riesgo de delgadez
            $valor = 0;
            if ($datos["riesgo_delgadez_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["riesgo_delgadez_I"] >= 0.1 && $datos["riesgo_delgadez_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["riesgo_delgadez_I"] >= 0.5 && $datos["riesgo_delgadez_I"] < 3.4) {
                        $valor = 3;
                    } else {
                        if ($datos["riesgo_delgadez_I"] >= 3.4 && $datos["riesgo_delgadez_I"] < 6.1) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["riesgo_delgadez_I"] = $valor * 4;
            if ($datos["riesgo_delgadez_I"] <= 8) {
                $datos["riesgo_delgadez_I"] = 1;
            } else {
                if ($datos["riesgo_delgadez_I"] >= 9 && $datos["riesgo_delgadez_I"] < 16) {
                    $datos["riesgo_delgadez_I"] = 2;
                } else {
                    $datos["riesgo_delgadez_I"] = 3;
                }
            }
            // Riesgo de delgadez

            // Enfermedades Infecciosas
            $valor = 0;
            if ($datos["enfermedades_infecciosas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 0.1 && $datos["enfermedades_infecciosas_I"] < 1.1) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_infecciosas_I"] >= 1.1 && $datos["enfermedades_infecciosas_I"] < 5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_infecciosas_I"] >= 5 && $datos["enfermedades_infecciosas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_infecciosas_I"] = $valor * 4;
            if ($datos["enfermedades_infecciosas_I"] <= 8) {
                $datos["enfermedades_infecciosas_I"] = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 9 && $datos["enfermedades_infecciosas_I"] < 16) {
                    $datos["enfermedades_infecciosas_I"] = 2;
                } else {
                    $datos["enfermedades_infecciosas_I"] = 3;
                }
            }
            // Enfermedades Infecciosas

            // Consumo de SPA.
            $valor = 0;
            if ($datos["consumo_spa_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 0.1 && $datos["consumo_spa_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["consumo_spa_I"] >= 1 && $datos["consumo_spa_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["consumo_spa_I"] >= 4 && $datos["consumo_spa_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["consumo_spa_I"] = $valor * 4;
            if ($datos["consumo_spa_I"] <= 8) {
                $datos["consumo_spa_I"] = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 9 && $datos["consumo_spa_I"] < 16) {
                    $datos["consumo_spa_I"] = 2;
                } else {
                    $datos["consumo_spa_I"] = 3;
                }
            }
            // Consumo de SPA.

            // Transtornos asociados al consumo de SPA.
            $valor = 0;
            if ($datos["transtornos_asociados_spa_I"] < 3) {
                $valor = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 3 && $datos["transtornos_asociados_spa_I"] < 5) {
                    $valor = 2;
                } else {
                    $valor = 3;
                }
            }
            $datos["transtornos_asociados_spa_I"] = $valor * 4;
            if ($datos["transtornos_asociados_spa_I"] < 5) {
                $datos["transtornos_asociados_spa_I"] = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 5 && $datos["transtornos_asociados_spa_I"] < 9) {
                    $datos["transtornos_asociados_spa_I"] = 2;
                } else {
                    $datos["transtornos_asociados_spa_I"] = 3;
                }
            }
            // Transtornos asociados al consumo de SPA.

            // Enf Cardiovasculares aterogénica
            $valor = 0;
            if ($datos["enfermedad_cardiovascular_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 0.1 && $datos["enfermedad_cardiovascular_I"] < 0.8) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedad_cardiovascular_I"] >= 0.8 && $datos["enfermedad_cardiovascular_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedad_cardiovascular_I"] >= 3 && $datos["enfermedad_cardiovascular_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedad_cardiovascular_I"] = $valor * 5;
            if ($datos["enfermedad_cardiovascular_I"] <= 8) {
                $datos["enfermedad_cardiovascular_I"] = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 9 && $datos["enfermedad_cardiovascular_I"] < 16) {
                    $datos["enfermedad_cardiovascular_I"] = 2;
                } else {
                    $datos["enfermedad_cardiovascular_I"] = 3;
                }
            }
            // Enf Cardiovasculares aterogénica

            // Cancer
            $valor = 0;
            if ($datos["cancer_I"] < 0.5) {
                $valor = 1;
            } else {
                if ($datos["cancer_I"] >= 0.5 && $datos["cancer_I"] < 0.8) {
                    $valor = 2;
                } else {
                    if ($datos["cancer_I"] >= 0.8 && $datos["cancer_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["cancer_I"] >= 4 && $datos["cancer_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["cancer_I"] = $valor * 5;
            if ($datos["cancer_I"] <= 8) {
                $datos["cancer_I"] = 1;
            } else {
                if ($datos["cancer_I"] >= 9 && $datos["cancer_I"] < 16) {
                    $datos["cancer_I"] = 2;
                } else {
                    $datos["cancer_I"] = 3;
                }
            }
            // Cancer

            // Alteraciones y transtornos visuales
            $valor = 0;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 0.1 && $datos["alteraciones_transtornos_visuales_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_visuales_I"] >= 1 && $datos["alteraciones_transtornos_visuales_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_visuales_I"] >= 4 && $datos["alteraciones_transtornos_visuales_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_visuales_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 8) {
                $datos["alteraciones_transtornos_visuales_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 9 && $datos["alteraciones_transtornos_visuales_I"] < 16) {
                    $datos["alteraciones_transtornos_visuales_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_visuales_I"] = 3;
                }
            }
            // Alteraciones y transtornos visuales

            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $valor = 0;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 0.1 && $datos["alteraciones_transtornos_audicion_I"] < 2) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_audicion_I"] >= 2 && $datos["alteraciones_transtornos_audicion_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_audicion_I"] >= 4 && $datos["alteraciones_transtornos_audicion_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_audicion_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 8) {
                $datos["alteraciones_transtornos_audicion_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 9 && $datos["alteraciones_transtornos_audicion_I"] < 16) {
                    $datos["alteraciones_transtornos_audicion_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_audicion_I"] = 3;
                }
            }
            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // Salud Bucal
            $valor = 0;
            if ($datos["salud_bucal_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 0.1 && $datos["salud_bucal_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["salud_bucal_I"] >= 0.5 && $datos["salud_bucal_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["salud_bucal_I"] >= 3 && $datos["salud_bucal_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["salud_bucal_I"] = $valor * 4;
            if ($datos["salud_bucal_I"] <= 8) {
                $datos["salud_bucal_I"] = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 9 && $datos["salud_bucal_I"] < 16) {
                    $datos["salud_bucal_I"] = 2;
                } else {
                    $datos["salud_bucal_I"] = 3;
                }
            }
            // Salud Bucal

            // Violencia
            $valor = 0;
            if ($datos["violencias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["violencias_I"] >= 0.1 && $datos["violencias_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["violencias_I"] >= 1 && $datos["violencias_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["violencias_I"] >= 4 && $datos["violencias_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["violencias_I"] = $valor * 5;
            if ($datos["violencias_I"] <= 8) {
                $datos["violencias_I"] = 1;
            } else {
                if ($datos["violencias_I"] >= 9 && $datos["violencias_I"] < 16) {
                    $datos["violencias_I"] = 2;
                } else {
                    $datos["violencias_I"] = 3;
                }
            }
            // Violencia

            // PROBLEMAS EN SALUD MENTAL
            $valor = 0;
            if ($datos["problemas_salud_mental_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 0.1 && $datos["problemas_salud_mental_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["problemas_salud_mental_I"] >= 1 && $datos["problemas_salud_mental_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["problemas_salud_mental_I"] >= 4 && $datos["problemas_salud_mental_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["problemas_salud_mental_I"] = $valor * 4;
            if ($datos["problemas_salud_mental_I"] <= 8) {
                $datos["problemas_salud_mental_I"] = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 9 && $datos["problemas_salud_mental_I"] < 16) {
                    $datos["problemas_salud_mental_I"] = 2;
                } else {
                    $datos["problemas_salud_mental_I"] = 3;
                }
            }
            // PROBLEMAS EN SALUD MENTAL

            // Enfermedades Respiratorias cronicas
            $valor = 0;
            if ($datos["enfermedades_respiratorias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 0.1 && $datos["enfermedades_respiratorias_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_respiratorias_I"] >= 0.5 && $datos["enfermedades_respiratorias_I"] < 3.5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_respiratorias_I"] >= 3.5 && $datos["enfermedades_respiratorias_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_respiratorias_I"] = $valor * 4;
            if ($datos["enfermedades_respiratorias_I"] <= 8) {
                $datos["enfermedades_respiratorias_I"] = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 9 && $datos["enfermedades_respiratorias_I"] < 16) {
                    $datos["enfermedades_respiratorias_I"] = 2;
                } else {
                    $datos["enfermedades_respiratorias_I"] = 3;
                }
            }
            // Enfermedades Respiratorias cronicas

            // Enfermedades Zoonóticas
            $valor = 0;
            if ($datos["enfermedades_zoonoticas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 0.1 && $datos["enfermedades_zoonoticas_I"] < 0.8) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_zoonoticas_I"] >= 0.8 && $datos["enfermedades_zoonoticas_I"] < 5.1) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_zoonoticas_I"] >= 5.1 && $datos["enfermedades_zoonoticas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_zoonoticas_I"] = $valor * 4;
            if ($datos["enfermedades_zoonoticas_I"] <= 8) {
                $datos["enfermedades_zoonoticas_I"] = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 9 && $datos["enfermedades_zoonoticas_I"] < 16) {
                    $datos["enfermedades_zoonoticas_I"] = 2;
                } else {
                    $datos["enfermedades_zoonoticas_I"] = 3;
                }
            }
            // Enfermedades Zoonóticas

            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $valor = 0;
            if ($datos["transtornos_degenartivos_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 0.1 && $datos["transtornos_degenartivos_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["transtornos_degenartivos_I"] >= 1 && $datos["transtornos_degenartivos_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["transtornos_degenartivos_I"] >= 4 && $datos["transtornos_degenartivos_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["transtornos_degenartivos_I"] = $valor * 5;
            if ($datos["transtornos_degenartivos_I"] <= 8) {
                $datos["transtornos_degenartivos_I"] = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 9 && $datos["transtornos_degenartivos_I"] < 16) {
                    $datos["transtornos_degenartivos_I"] = 2;
                } else {
                    $datos["transtornos_degenartivos_I"] = 3;
                }
            }
            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["id_inte"] = $id;
            $datos["id_hogar"] = $id_hogar;
            $datos["estado"] = "Activo";
            $guardar = \App\RiesgosSaludDe29a59::guardar($datos, Session::get('alias'));
            // GUARDAR DATOS

            if ($guardar) {
                return 1;
            } else {
                return 1;
            }
        }
        if ($opcion == "DE60") {
            // Enfermedades Infecciosas
            $valor = 0;
            if ($datos["enfermedades_infecciosas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 0.1 && $datos["enfermedades_infecciosas_I"] < 0.6) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_infecciosas_I"] >= 0.6 && $datos["enfermedades_infecciosas_I"] < 5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_infecciosas_I"] >= 5 && $datos["enfermedades_infecciosas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_infecciosas_I"] = $valor * 5;
            if ($datos["enfermedades_infecciosas_I"] <= 8) {
                $datos["enfermedades_infecciosas_I"] = 1;
            } else {
                if ($datos["enfermedades_infecciosas_I"] >= 9 && $datos["enfermedades_infecciosas_I"] < 16) {
                    $datos["enfermedades_infecciosas_I"] = 2;
                } else {
                    $datos["enfermedades_infecciosas_I"] = 3;
                }
            }
            // Enfermedades Infecciosas

            // Consumo de SPA.
            $valor = 0;
            if ($datos["consumo_spa_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 0.1 && $datos["consumo_spa_I"] < 2.4) {
                    $valor = 2;
                } else {
                    if ($datos["consumo_spa_I"] >= 2.4 && $datos["consumo_spa_I"] < 5) {
                        $valor = 3;
                    } else {
                        if ($datos["consumo_spa_I"] >= 5 && $datos["consumo_spa_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["consumo_spa_I"] = $valor * 5;
            if ($datos["consumo_spa_I"] <= 8) {
                $datos["consumo_spa_I"] = 1;
            } else {
                if ($datos["consumo_spa_I"] >= 9 && $datos["consumo_spa_I"] < 16) {
                    $datos["consumo_spa_I"] = 2;
                } else {
                    $datos["consumo_spa_I"] = 3;
                }
            }
            // Consumo de SPA.

            // Transtornos asociados al consumo de SPA.
            $valor = 0;
            if ($datos["transtornos_asociados_spa_I"] < 3) {
                $valor = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 3 && $datos["transtornos_asociados_spa_I"] < 5) {
                    $valor = 2;
                } else {
                    $valor = 3;
                }
            }
            $datos["transtornos_asociados_spa_I"] = $valor * 5;
            if ($datos["transtornos_asociados_spa_I"] < 5) {
                $datos["transtornos_asociados_spa_I"] = 1;
            } else {
                if ($datos["transtornos_asociados_spa_I"] >= 5 && $datos["transtornos_asociados_spa_I"] < 9) {
                    $datos["transtornos_asociados_spa_I"] = 2;
                } else {
                    $datos["transtornos_asociados_spa_I"] = 3;
                }
            }
            // Transtornos asociados al consumo de SPA.

            // Enf Cardiovasculares aterogénica
            $valor = 0;
            if ($datos["enfermedad_cardiovascular_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 0.1 && $datos["enfermedad_cardiovascular_I"] < 0.8) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedad_cardiovascular_I"] >= 0.8 && $datos["enfermedad_cardiovascular_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedad_cardiovascular_I"] >= 3 && $datos["enfermedad_cardiovascular_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedad_cardiovascular_I"] = $valor * 5;
            if ($datos["enfermedad_cardiovascular_I"] <= 8) {
                $datos["enfermedad_cardiovascular_I"] = 1;
            } else {
                if ($datos["enfermedad_cardiovascular_I"] >= 9 && $datos["enfermedad_cardiovascular_I"] < 16) {
                    $datos["enfermedad_cardiovascular_I"] = 2;
                } else {
                    $datos["enfermedad_cardiovascular_I"] = 3;
                }
            }
            // Enf Cardiovasculares aterogénica

            // Cancer
            $valor = 0;
            if ($datos["cancer_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["cancer_I"] >= 0.1 && $datos["cancer_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["cancer_I"] >= 0.5 && $datos["cancer_I"] < 4.5) {
                        $valor = 3;
                    } else {
                        if ($datos["cancer_I"] >= 4.5 && $datos["cancer_I"] < 6.5) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["cancer_I"] = $valor * 5;
            if ($datos["cancer_I"] <= 8) {
                $datos["cancer_I"] = 1;
            } else {
                if ($datos["cancer_I"] >= 9 && $datos["cancer_I"] < 16) {
                    $datos["cancer_I"] = 2;
                } else {
                    $datos["cancer_I"] = 3;
                }
            }
            // Cancer

            // Alteraciones y transtornos visuales
            $valor = 0;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 0.1 && $datos["alteraciones_transtornos_visuales_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_visuales_I"] >= 1 && $datos["alteraciones_transtornos_visuales_I"] < 5) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_visuales_I"] >= 5 && $datos["alteraciones_transtornos_visuales_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_visuales_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_visuales_I"] <= 8) {
                $datos["alteraciones_transtornos_visuales_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_visuales_I"] >= 9 && $datos["alteraciones_transtornos_visuales_I"] < 16) {
                    $datos["alteraciones_transtornos_visuales_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_visuales_I"] = 3;
                }
            }
            // Alteraciones y transtornos visuales

            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN
            $valor = 0;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 0.1 && $datos["alteraciones_transtornos_audicion_I"] < 2) {
                    $valor = 2;
                } else {
                    if ($datos["alteraciones_transtornos_audicion_I"] >= 2 && $datos["alteraciones_transtornos_audicion_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["alteraciones_transtornos_audicion_I"] >= 4 && $datos["alteraciones_transtornos_audicion_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["alteraciones_transtornos_audicion_I"] = $valor * 4;
            if ($datos["alteraciones_transtornos_audicion_I"] <= 8) {
                $datos["alteraciones_transtornos_audicion_I"] = 1;
            } else {
                if ($datos["alteraciones_transtornos_audicion_I"] >= 9 && $datos["alteraciones_transtornos_audicion_I"] < 16) {
                    $datos["alteraciones_transtornos_audicion_I"] = 2;
                } else {
                    $datos["alteraciones_transtornos_audicion_I"] = 3;
                }
            }
            // ALTERACIONES Y TRASTORNOS DE LA AUDICIÓN Y COMUNICACIÓN

            // Salud Bucal
            $valor = 0;
            if ($datos["salud_bucal_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 0.1 && $datos["salud_bucal_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["salud_bucal_I"] >= 0.5 && $datos["salud_bucal_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["salud_bucal_I"] >= 3 && $datos["salud_bucal_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["salud_bucal_I"] = $valor * 4;
            if ($datos["salud_bucal_I"] <= 8) {
                $datos["salud_bucal_I"] = 1;
            } else {
                if ($datos["salud_bucal_I"] >= 9 && $datos["salud_bucal_I"] < 16) {
                    $datos["salud_bucal_I"] = 2;
                } else {
                    $datos["salud_bucal_I"] = 3;
                }
            }
            // Salud Bucal

            // Violencia
            $valor = 0;
            if ($datos["violencias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["violencias_I"] >= 0.1 && $datos["violencias_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["violencias_I"] >= 1 && $datos["violencias_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["violencias_I"] >= 4 && $datos["violencias_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["violencias_I"] = $valor * 5;
            if ($datos["violencias_I"] <= 8) {
                $datos["violencias_I"] = 1;
            } else {
                if ($datos["violencias_I"] >= 9 && $datos["violencias_I"] < 16) {
                    $datos["violencias_I"] = 2;
                } else {
                    $datos["violencias_I"] = 3;
                }
            }
            // Violencia

            // PROBLEMAS EN SALUD MENTAL
            $valor = 0;
            if ($datos["problemas_salud_mental_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 0.1 && $datos["problemas_salud_mental_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["problemas_salud_mental_I"] >= 1 && $datos["problemas_salud_mental_I"] < 4) {
                        $valor = 3;
                    } else {
                        if ($datos["problemas_salud_mental_I"] >= 4 && $datos["problemas_salud_mental_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["problemas_salud_mental_I"] = $valor * 5;
            if ($datos["problemas_salud_mental_I"] <= 8) {
                $datos["problemas_salud_mental_I"] = 1;
            } else {
                if ($datos["problemas_salud_mental_I"] >= 9 && $datos["problemas_salud_mental_I"] < 16) {
                    $datos["problemas_salud_mental_I"] = 2;
                } else {
                    $datos["problemas_salud_mental_I"] = 3;
                }
            }
            // PROBLEMAS EN SALUD MENTAL

            // Enfermedades Respiratorias cronicas
            $valor = 0;
            if ($datos["enfermedades_respiratorias_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 0.1 && $datos["enfermedades_respiratorias_I"] < 0.5) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_respiratorias_I"] >= 0.5 && $datos["enfermedades_respiratorias_I"] < 4.5) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_respiratorias_I"] >= 4.5 && $datos["enfermedades_respiratorias_I"] < 7) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_respiratorias_I"] = $valor * 4;
            if ($datos["enfermedades_respiratorias_I"] <= 8) {
                $datos["enfermedades_respiratorias_I"] = 1;
            } else {
                if ($datos["enfermedades_respiratorias_I"] >= 9 && $datos["enfermedades_respiratorias_I"] < 16) {
                    $datos["enfermedades_respiratorias_I"] = 2;
                } else {
                    $datos["enfermedades_respiratorias_I"] = 3;
                }
            }
            // Enfermedades Respiratorias cronicas

            // Enfermedades Zoonóticas
            $valor = 0;
            if ($datos["enfermedades_zoonoticas_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 0.1 && $datos["enfermedades_zoonoticas_I"] < 0.8) {
                    $valor = 2;
                } else {
                    if ($datos["enfermedades_zoonoticas_I"] >= 0.8 && $datos["enfermedades_zoonoticas_I"] < 5.1) {
                        $valor = 3;
                    } else {
                        if ($datos["enfermedades_zoonoticas_I"] >= 5.1 && $datos["enfermedades_zoonoticas_I"] < 8) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["enfermedades_zoonoticas_I"] = $valor * 4;
            if ($datos["enfermedades_zoonoticas_I"] <= 8) {
                $datos["enfermedades_zoonoticas_I"] = 1;
            } else {
                if ($datos["enfermedades_zoonoticas_I"] >= 9 && $datos["enfermedades_zoonoticas_I"] < 16) {
                    $datos["enfermedades_zoonoticas_I"] = 2;
                } else {
                    $datos["enfermedades_zoonoticas_I"] = 3;
                }
            }
            // Enfermedades Zoonóticas

            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE
            $valor = 0;
            if ($datos["transtornos_degenartivos_I"] <= 0) {
                $valor = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 0.1 && $datos["transtornos_degenartivos_I"] < 1) {
                    $valor = 2;
                } else {
                    if ($datos["transtornos_degenartivos_I"] >= 1 && $datos["transtornos_degenartivos_I"] < 3) {
                        $valor = 3;
                    } else {
                        if ($datos["transtornos_degenartivos_I"] >= 3 && $datos["transtornos_degenartivos_I"] < 6) {
                            $valor = 4;
                        } else {
                            $valor = 5;
                        }
                    }
                }
            }
            $datos["transtornos_degenartivos_I"] = $valor * 5;
            if ($datos["transtornos_degenartivos_I"] <= 8) {
                $datos["transtornos_degenartivos_I"] = 1;
            } else {
                if ($datos["transtornos_degenartivos_I"] >= 9 && $datos["transtornos_degenartivos_I"] < 16) {
                    $datos["transtornos_degenartivos_I"] = 2;
                } else {
                    $datos["transtornos_degenartivos_I"] = 3;
                }
            }
            // TRASTORNOS DEGENERATIVOS, NEUROPATÍAS Y ENF AUTOINMUNE

            $datos["id_inte"] = $id;
            $datos["id_hogar"] = $id_hogar;
            $datos["estado"] = "Activo";
            $guardar = \App\RiesgosSaludDe60::guardar($datos, Session::get('alias'));
            // GUARDAR DATOS

            if ($guardar) {
                return 1;
            } else {
                return 1;
            }
        }
        return 1;
    }

    public function ControlRS()
    {
        if (Auth::check()) {
            $opcion = request()->get("opcion");
            $datos = request()->get("datos");
            $IDHOGAR = request()->get("IDHOGAR");
            $vector = request()->get("vector");
            $tipo = request()->get("tipo");
            $id_inte = request()->get("id_inte");

            $suma = 0;
            $media = 0;
            $inexistente = 1;
            $detectivo = 2;
            $correctivo = 3;
            $preventivo = 4;

            if ($tipo == "MEN1A") {
                $riesgo_r = 0;
                $valor_r = "";
                $color_r = "";
                $indice = 0;
                $suma = 0;
                $totalDivicion = 1;
                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 9;
                    $alimentacion_saludable_EnIn = self::valores($datos["alimentacion_saludable_EnIn"]);
                    $asistencia_crecimiento_EnIn = self::valores($datos["asistencia_crecimiento_EnIn"]);
                    $fumigacion_EnIn = self::valores($datos["fumigacion_EnIn"]);
                    $sistema_recoleccion_EnIn = self::valores($datos["sistema_recoleccion_EnIn"]);
                    $desparacitacion_EnIn = self::valores($datos["desparacitacion_EnIn"]);
                    $inmunizacion_EnIn = self::valores($datos["inmunizacion_EnIn"]);
                    $educacion_EnIn = self::valores($datos["educacion_EnIn"]);
                    $mantenimiento_EnIn = self::valores($datos["mantenimiento_EnIn"]);
                    $citas_EnIn = self::valores($datos["citas_EnIn"]);

                    $suma = $suma + ($alimentacion_saludable_EnIn * $preventivo);
                    $suma = $suma + ($asistencia_crecimiento_EnIn * $preventivo);
                    $suma = $suma + ($fumigacion_EnIn * $preventivo);
                    $suma = $suma + ($sistema_recoleccion_EnIn * $preventivo);
                    $suma = $suma + ($desparacitacion_EnIn * $correctivo);
                    $suma = $suma + ($inmunizacion_EnIn * $preventivo);
                    $suma = $suma + ($educacion_EnIn * $preventivo);
                    $suma = $suma + ($mantenimiento_EnIn * $preventivo);
                    $suma = $suma + ($citas_EnIn * $detectivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Asociados al uso de SPA
                if ($opcion == "TrAsSPA") {
                    $totalDivicion = 2;
                    $educacion_TrAsSPA = self::valores($datos["educacion_TrAsSPA"]);
                    $acompaniamiento_TrAsSPA = self::valores($datos["acompaniamiento_TrAsSPA"]);

                    $suma = $suma + ($educacion_TrAsSPA * $preventivo);
                    $suma = $suma + ($acompaniamiento_TrAsSPA * $preventivo);
                }
                // Trastornos Asociados al uso de SPA

                // Enfermedad Cardiovascular Aterogénica
                if ($opcion == "EnCaAt") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_EnCaAt = self::valores($datos["asistencia_crecimiento_EnCaAt"]);
                    $educacion_EnCaAt = self::valores($datos["educacion_EnCaAt"]);
                    $actividad_EnCaAt = self::valores($datos["actividad_EnCaAt"]);

                    $suma = $suma + ($asistencia_crecimiento_EnCaAt * $preventivo);
                    $suma = $suma + ($educacion_EnCaAt * $preventivo);
                    $suma = $suma + ($actividad_EnCaAt * $preventivo);
                }
                // Enfermedad Cardiovascular Aterogénica

                // Cancer
                if ($opcion == "Ca") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_Ca = self::valores($datos["asistencia_crecimiento_Ca"]);
                    $educacion_Ca = self::valores($datos["educacion_Ca"]);
                    $valoracion_Ca = self::valores($datos["valoracion_Ca"]);

                    $suma = $suma + ($asistencia_crecimiento_Ca * $preventivo);
                    $suma = $suma + ($educacion_Ca * $detectivo);
                    $suma = $suma + ($valoracion_Ca * $preventivo);
                }
                // Cancer

                // Alteraciones y Transtornos Visuales
                if ($opcion == "AlTrVi") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrVi = self::valores($datos["asistencia_crecimiento_AlTrVi"]);
                    $valoracion_AlTrVi = self::valores($datos["valoracion_AlTrVi"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrVi * $preventivo);
                    $suma = $suma + ($valoracion_AlTrVi * $detectivo);
                }
                // Alteraciones y Transtornos Visuales

                // Alteraciones y Transtornos de la Audición y Comunicación
                if ($opcion == "AlTrAuCo") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrAuCo = self::valores($datos["asistencia_crecimiento_AlTrAuCo"]);
                    $valoracion_AlTrAuCo = self::valores($datos["valoracion_AlTrAuCo"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrAuCo * $preventivo);
                    $suma = $suma + ($valoracion_AlTrAuCo * $detectivo);
                }
                // Alteraciones y Transtornos de la Audición y Comunicación

                // Salud Bucal
                if ($opcion == "SaBu") {
                    $totalDivicion = 4;
                    $control_odontologia_SaBu = self::valores($datos["control_odontologia_SaBu"]);
                    $aplicacion_fluor_SaBu = self::valores($datos["aplicacion_fluor_SaBu"]);
                    $educacion_SaBu = self::valores($datos["educacion_SaBu"]);
                    $habitos_higiene_SaBu = self::valores($datos["habitos_higiene_SaBu"]);

                    $suma = $suma + ($control_odontologia_SaBu * $preventivo);
                    $suma = $suma + ($aplicacion_fluor_SaBu * $preventivo);
                    $suma = $suma + ($educacion_SaBu * $preventivo);
                    $suma = $suma + ($habitos_higiene_SaBu * $preventivo);
                }
                // Salud Bucal

                // Problemas en salud mental
                if ($opcion == "PrSaMe") {
                    $totalDivicion = 4;
                    $concientizacion_PrSaMe = self::valores($datos["concientizacion_PrSaMe"]);
                    $acompaniamiento_PrSaMe = self::valores($datos["acompaniamiento_PrSaMe"]);
                    $crecimiento_PrSaMe = self::valores($datos["crecimiento_PrSaMe"]);
                    $grupos_PrSaMe = self::valores($datos["grupos_PrSaMe"]);

                    $suma = $suma + ($concientizacion_PrSaMe * $preventivo);
                    $suma = $suma + ($acompaniamiento_PrSaMe * $preventivo);
                    $suma = $suma + ($crecimiento_PrSaMe * $preventivo);
                    $suma = $suma + ($grupos_PrSaMe * $correctivo);
                }
                // Problemas en salud mental

                // Violencias
                if ($opcion == "Vi") {
                    $totalDivicion = 5;
                    $concientizacion_Vi = self::valores($datos["concientizacion_Vi"]);
                    $acompaniamiento_Vi = self::valores($datos["acompaniamiento_Vi"]);
                    $crecimiento_Vi = self::valores($datos["crecimiento_Vi"]);
                    $grupos_Vi = self::valores($datos["grupos_Vi"]);
                    $icbf_Vi = self::valores($datos["icbf_Vi"]);

                    $suma = $suma + ($concientizacion_Vi * $preventivo);
                    $suma = $suma + ($acompaniamiento_Vi * $preventivo);
                    $suma = $suma + ($crecimiento_Vi * $detectivo);
                    $suma = $suma + ($grupos_Vi * $preventivo);
                    $suma = $suma + ($icbf_Vi * $correctivo);
                }
                // Violencias

                // Enfermedades Respiratorias crónicas
                if ($opcion == "EnReCr") {
                    $totalDivicion = 3;
                    $crecimiento_EnReCr = self::valores($datos["crecimiento_EnReCr"]);
                    $educacion_EnReCr = self::valores($datos["educacion_EnReCr"]);
                    $valoracion_EnReCr = self::valores($datos["valoracion_EnReCr"]);

                    $suma = $suma + ($crecimiento_EnReCr * $detectivo);
                    $suma = $suma + ($educacion_EnReCr * $preventivo);
                    $suma = $suma + ($valoracion_EnReCr * $detectivo);
                }
                // Enfermedades Respiratorias crónicas

                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 8;
                    $crecimiento_EnZo = self::valores($datos["crecimiento_EnZo"]);
                    $potabilizacion_EnZo = self::valores($datos["potabilizacion_EnZo"]);
                    $mantenimiento_EnZo = self::valores($datos["mantenimiento_EnZo"]);
                    $fumigacion_EnZo = self::valores($datos["fumigacion_EnZo"]);
                    $vacunacion_EnZo = self::valores($datos["vacunacion_EnZo"]);
                    $inmunizacion_EnZo = self::valores($datos["inmunizacion_EnZo"]);
                    $valorizacion_EnZo = self::valores($datos["valorizacion_EnZo"]);
                    $desparatizacion_EnZo = self::valores($datos["desparatizacion_EnZo"]);

                    $suma = $suma + ($crecimiento_EnZo * $detectivo);
                    $suma = $suma + ($potabilizacion_EnZo * $preventivo);
                    $suma = $suma + ($mantenimiento_EnZo * $preventivo);
                    $suma = $suma + ($fumigacion_EnZo * $preventivo);
                    $suma = $suma + ($vacunacion_EnZo * $correctivo);
                    $suma = $suma + ($inmunizacion_EnZo * $preventivo);
                    $suma = $suma + ($valorizacion_EnZo * $detectivo);
                    $suma = $suma + ($desparatizacion_EnZo * $correctivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
                if ($opcion == "TrDeNeEnAu") {
                    $totalDivicion = 3;
                    $crecimiento_TrDeNeEnAu = self::valores($datos["crecimiento_TrDeNeEnAu"]);
                    $acceso_TrDeNeEnAu = self::valores($datos["acceso_TrDeNeEnAu"]);
                    $valoracion_TrDeNeEnAu = self::valores($datos["valoracion_TrDeNeEnAu"]);

                    $suma = $suma + ($crecimiento_TrDeNeEnAu * $detectivo);
                    $suma = $suma + ($acceso_TrDeNeEnAu * $correctivo);
                    $suma = $suma + ($valoracion_TrDeNeEnAu * $detectivo);
                }
                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes

                // Consumo de SPA
                if ($opcion == "CoSp") {
                    $totalDivicion = 5;
                    $atencion_CoSp = self::valores($datos["atencion_CoSp"]);
                    $relaciones_CoSp = self::valores($datos["relaciones_CoSp"]);
                    $grupos_CoSp = self::valores($datos["grupos_CoSp"]);
                    $educacion_CoSp = self::valores($datos["educacion_CoSp"]);
                    $valoracion_CoSp = self::valores($datos["valoracion_CoSp"]);

                    $suma = $suma + ($atencion_CoSp * $preventivo);
                    $suma = $suma + ($relaciones_CoSp * $preventivo);
                    $suma = $suma + ($grupos_CoSp * $preventivo);
                    $suma = $suma + ($educacion_CoSp * $preventivo);
                    $suma = $suma + ($valoracion_CoSp * $preventivo);
                }
                // Consumo de SPA

                // Riesgo Desnutrición Aguda
                if ($opcion == "RiDeAg") {
                    $totalDivicion = 3;
                    $asistencia_RiDeAg = self::valores($datos["asistencia_RiDeAg"]);
                    $programas_RiDeAg = self::valores($datos["programas_RiDeAg"]);
                    $suplementacion_RiDeAg = self::valores($datos["suplementacion_RiDeAg"]);

                    $suma = $suma + ($asistencia_RiDeAg * $detectivo);
                    $suma = $suma + ($programas_RiDeAg * $detectivo);
                    $suma = $suma + ($suplementacion_RiDeAg * $preventivo);
                }
                // Riesgo Desnutrición Aguda

                // Riesgo Desnutrición Global
                if ($opcion == "RiDeGl") {
                    $totalDivicion = 3;
                    $asistencia_RiDeGl = self::valores($datos["asistencia_RiDeGl"]);
                    $programas_RiDeGl = self::valores($datos["programas_RiDeGl"]);
                    $suplementacion_RiDeGl = self::valores($datos["suplementacion_RiDeGl"]);

                    $suma = $suma + ($asistencia_RiDeGl * $detectivo);
                    $suma = $suma + ($programas_RiDeGl * $preventivo);
                    $suma = $suma + ($suplementacion_RiDeGl * $preventivo);
                }
                // Riesgo Desnutrición Global

                // Riesgo de Talla Baja
                if ($opcion == "RiTaBa") {
                    $totalDivicion = 3;
                    $asistencia_RiTaBa = self::valores($datos["asistencia_RiTaBa"]);
                    $programas_RiTaBa = self::valores($datos["programas_RiTaBa"]);
                    $suplementacion_RiTaBa = self::valores($datos["suplementacion_RiTaBa"]);

                    $suma = $suma + ($asistencia_RiTaBa * $detectivo);
                    $suma = $suma + ($programas_RiTaBa * $preventivo);
                    $suma = $suma + ($suplementacion_RiTaBa * $preventivo);
                }
                // Riesgo de Talla Baja

                // Riesgo Sobrepeso
                if ($opcion == "RiSo") {
                    $totalDivicion = 2;
                    $asistencia_RiSo = self::valores($datos["asistencia_RiSo"]);
                    $actividad_RiSo = self::valores($datos["actividad_RiSo"]);

                    $suma = $suma + ($asistencia_RiSo * $detectivo);
                    $suma = $suma + ($actividad_RiSo * $preventivo);
                }
                // Riesgo Sobrepeso

                $indice = array_search($opcion, array_column($vector, 'boton'), false);
                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRS($media);

                $valor = $vector[$indice]["valor"];
                $valor = self::eficaciaControlRSVA(strtoupper($valor));

                $riesgo_r = $valor / $media;
                $riesgo_r = round($riesgo_r);

                $valor_r = self::valRieResSa($riesgo_r);
                $color_r = self::colorRieResSa($valor_r);
                $riesgo = \App\RiesgosSaludMen1::modificar(Session::get('alias'), $IDHOGAR, $opcion, $riesgo_r, $id_inte);
                $respuesta = [
                    'riesgo_r' => $riesgo_r,
                    'valor_r' => $valor_r,
                    'color_r' => $color_r,
                ];
                $valores_riesgo = \App\ValoresRiesgosSaludMEN1A::modificar(Session::get('alias'), $IDHOGAR, $opcion, $datos);
                return response()->json($respuesta, 200);

            }

            if ($tipo == "DE1A5") {
                $riesgo_r = 0;
                $valor_r = "";
                $color_r = "";
                $indice = 0;
                $suma = 0;
                $totalDivicion = 1;
                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 9;
                    $alimentacion_saludable_EnIn = self::valores($datos["alimentacion_saludable_EnIn"]);
                    $asistencia_crecimiento_EnIn = self::valores($datos["asistencia_crecimiento_EnIn"]);
                    $fumigacion_EnIn = self::valores($datos["fumigacion_EnIn"]);
                    $sistema_recoleccion_EnIn = self::valores($datos["sistema_recoleccion_EnIn"]);
                    $desparacitacion_EnIn = self::valores($datos["desparacitacion_EnIn"]);
                    $inmunizacion_EnIn = self::valores($datos["inmunizacion_EnIn"]);
                    $educacion_EnIn = self::valores($datos["educacion_EnIn"]);
                    $mantenimiento_EnIn = self::valores($datos["mantenimiento_EnIn"]);
                    $citas_EnIn = self::valores($datos["citas_EnIn"]);

                    $suma = $suma + ($alimentacion_saludable_EnIn * $preventivo);
                    $suma = $suma + ($asistencia_crecimiento_EnIn * $preventivo);
                    $suma = $suma + ($fumigacion_EnIn * $preventivo);
                    $suma = $suma + ($sistema_recoleccion_EnIn * $preventivo);
                    $suma = $suma + ($desparacitacion_EnIn * $correctivo);
                    $suma = $suma + ($inmunizacion_EnIn * $preventivo);
                    $suma = $suma + ($educacion_EnIn * $preventivo);
                    $suma = $suma + ($mantenimiento_EnIn * $preventivo);
                    $suma = $suma + ($citas_EnIn * $detectivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Asociados al uso de SPA
                if ($opcion == "TrAsSPA") {
                    $totalDivicion = 2;
                    $educacion_TrAsSPA = self::valores($datos["educacion_TrAsSPA"]);
                    $acompaniamiento_TrAsSPA = self::valores($datos["acompaniamiento_TrAsSPA"]);

                    $suma = $suma + ($educacion_TrAsSPA * $preventivo);
                    $suma = $suma + ($acompaniamiento_TrAsSPA * $preventivo);
                }
                // Trastornos Asociados al uso de SPA

                // Enfermedad Cardiovascular Aterogénica
                if ($opcion == "EnCaAt") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_EnCaAt = self::valores($datos["asistencia_crecimiento_EnCaAt"]);
                    $educacion_EnCaAt = self::valores($datos["educacion_EnCaAt"]);
                    $actividad_EnCaAt = self::valores($datos["actividad_EnCaAt"]);

                    $suma = $suma + ($asistencia_crecimiento_EnCaAt * $preventivo);
                    $suma = $suma + ($educacion_EnCaAt * $preventivo);
                    $suma = $suma + ($actividad_EnCaAt * $preventivo);
                }
                // Enfermedad Cardiovascular Aterogénica

                // Cancer
                if ($opcion == "Ca") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_Ca = self::valores($datos["asistencia_crecimiento_Ca"]);
                    $educacion_Ca = self::valores($datos["educacion_Ca"]);
                    $valoracion_Ca = self::valores($datos["valoracion_Ca"]);

                    $suma = $suma + ($asistencia_crecimiento_Ca * $preventivo);
                    $suma = $suma + ($educacion_Ca * $detectivo);
                    $suma = $suma + ($valoracion_Ca * $preventivo);
                }
                // Cancer

                // Alteraciones y Transtornos Visuales
                if ($opcion == "AlTrVi") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrVi = self::valores($datos["asistencia_crecimiento_AlTrVi"]);
                    $valoracion_AlTrVi = self::valores($datos["valoracion_AlTrVi"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrVi * $preventivo);
                    $suma = $suma + ($valoracion_AlTrVi * $detectivo);
                }
                // Alteraciones y Transtornos Visuales

                // Alteraciones y Transtornos de la Audición y Comunicación
                if ($opcion == "AlTrAuCo") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrAuCo = self::valores($datos["asistencia_crecimiento_AlTrAuCo"]);
                    $valoracion_AlTrAuCo = self::valores($datos["valoracion_AlTrAuCo"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrAuCo * $preventivo);
                    $suma = $suma + ($valoracion_AlTrAuCo * $detectivo);
                }
                // Alteraciones y Transtornos de la Audición y Comunicación

                // Salud Bucal
                if ($opcion == "SaBu") {
                    $totalDivicion = 4;
                    $control_odontologia_SaBu = self::valores($datos["control_odontologia_SaBu"]);
                    $aplicacion_fluor_SaBu = self::valores($datos["aplicacion_fluor_SaBu"]);
                    $educacion_SaBu = self::valores($datos["educacion_SaBu"]);
                    $habitos_higiene_SaBu = self::valores($datos["habitos_higiene_SaBu"]);

                    $suma = $suma + ($control_odontologia_SaBu * $preventivo);
                    $suma = $suma + ($aplicacion_fluor_SaBu * $preventivo);
                    $suma = $suma + ($educacion_SaBu * $preventivo);
                    $suma = $suma + ($habitos_higiene_SaBu * $preventivo);
                }
                // Salud Bucal

                // Problemas en salud mental
                if ($opcion == "PrSaMe") {
                    $totalDivicion = 4;
                    $concientizacion_PrSaMe = self::valores($datos["concientizacion_PrSaMe"]);
                    $acompaniamiento_PrSaMe = self::valores($datos["acompaniamiento_PrSaMe"]);
                    $crecimiento_PrSaMe = self::valores($datos["crecimiento_PrSaMe"]);
                    $grupos_PrSaMe = self::valores($datos["grupos_PrSaMe"]);

                    $suma = $suma + ($concientizacion_PrSaMe * $preventivo);
                    $suma = $suma + ($acompaniamiento_PrSaMe * $preventivo);
                    $suma = $suma + ($crecimiento_PrSaMe * $preventivo);
                    $suma = $suma + ($grupos_PrSaMe * $correctivo);
                }
                // Problemas en salud mental

                // Violencias
                if ($opcion == "Vi") {
                    $totalDivicion = 5;
                    $concientizacion_Vi = self::valores($datos["concientizacion_Vi"]);
                    $acompaniamiento_Vi = self::valores($datos["acompaniamiento_Vi"]);
                    $crecimiento_Vi = self::valores($datos["crecimiento_Vi"]);
                    $grupos_Vi = self::valores($datos["grupos_Vi"]);
                    $icbf_Vi = self::valores($datos["icbf_Vi"]);

                    $suma = $suma + ($concientizacion_Vi * $preventivo);
                    $suma = $suma + ($acompaniamiento_Vi * $preventivo);
                    $suma = $suma + ($crecimiento_Vi * $detectivo);
                    $suma = $suma + ($grupos_Vi * $preventivo);
                    $suma = $suma + ($icbf_Vi * $correctivo);
                }
                // Violencias

                // Enfermedades Respiratorias crónicas
                if ($opcion == "EnReCr") {
                    $totalDivicion = 3;
                    $crecimiento_EnReCr = self::valores($datos["crecimiento_EnReCr"]);
                    $educacion_EnReCr = self::valores($datos["educacion_EnReCr"]);
                    $valoracion_EnReCr = self::valores($datos["valoracion_EnReCr"]);

                    $suma = $suma + ($crecimiento_EnReCr * $detectivo);
                    $suma = $suma + ($educacion_EnReCr * $preventivo);
                    $suma = $suma + ($valoracion_EnReCr * $detectivo);
                }
                // Enfermedades Respiratorias crónicas

                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 8;
                    $crecimiento_EnZo = self::valores($datos["crecimiento_EnZo"]);
                    $potabilizacion_EnZo = self::valores($datos["potabilizacion_EnZo"]);
                    $mantenimiento_EnZo = self::valores($datos["mantenimiento_EnZo"]);
                    $fumigacion_EnZo = self::valores($datos["fumigacion_EnZo"]);
                    $vacunacion_EnZo = self::valores($datos["vacunacion_EnZo"]);
                    $inmunizacion_EnZo = self::valores($datos["inmunizacion_EnZo"]);
                    $valorizacion_EnZo = self::valores($datos["valorizacion_EnZo"]);
                    $desparatizacion_EnZo = self::valores($datos["desparatizacion_EnZo"]);

                    $suma = $suma + ($crecimiento_EnZo * $detectivo);
                    $suma = $suma + ($potabilizacion_EnZo * $preventivo);
                    $suma = $suma + ($mantenimiento_EnZo * $preventivo);
                    $suma = $suma + ($fumigacion_EnZo * $preventivo);
                    $suma = $suma + ($vacunacion_EnZo * $correctivo);
                    $suma = $suma + ($inmunizacion_EnZo * $preventivo);
                    $suma = $suma + ($valorizacion_EnZo * $detectivo);
                    $suma = $suma + ($desparatizacion_EnZo * $correctivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
                if ($opcion == "TrDeNeEnAu") {
                    $totalDivicion = 3;
                    $crecimiento_TrDeNeEnAu = self::valores($datos["crecimiento_TrDeNeEnAu"]);
                    $acceso_TrDeNeEnAu = self::valores($datos["acceso_TrDeNeEnAu"]);
                    $valoracion_TrDeNeEnAu = self::valores($datos["valoracion_TrDeNeEnAu"]);

                    $suma = $suma + ($crecimiento_TrDeNeEnAu * $detectivo);
                    $suma = $suma + ($acceso_TrDeNeEnAu * $correctivo);
                    $suma = $suma + ($valoracion_TrDeNeEnAu * $detectivo);
                }
                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes

                // Consumo de SPA
                if ($opcion == "CoSp") {
                    $totalDivicion = 5;
                    $atencion_CoSp = self::valores($datos["atencion_CoSp"]);
                    $relaciones_CoSp = self::valores($datos["relaciones_CoSp"]);
                    $grupos_CoSp = self::valores($datos["grupos_CoSp"]);
                    $educacion_CoSp = self::valores($datos["educacion_CoSp"]);
                    $valoracion_CoSp = self::valores($datos["valoracion_CoSp"]);

                    $suma = $suma + ($atencion_CoSp * $preventivo);
                    $suma = $suma + ($relaciones_CoSp * $preventivo);
                    $suma = $suma + ($grupos_CoSp * $preventivo);
                    $suma = $suma + ($educacion_CoSp * $preventivo);
                    $suma = $suma + ($valoracion_CoSp * $preventivo);
                }
                // Consumo de SPA

                // Riesgo Desnutrición Aguda
                if ($opcion == "RiDeAg") {
                    $totalDivicion = 3;
                    $asistencia_RiDeAg = self::valores($datos["asistencia_RiDeAg"]);
                    $programas_RiDeAg = self::valores($datos["programas_RiDeAg"]);
                    $suplementacion_RiDeAg = self::valores($datos["suplementacion_RiDeAg"]);

                    $suma = $suma + ($asistencia_RiDeAg * $detectivo);
                    $suma = $suma + ($programas_RiDeAg * $detectivo);
                    $suma = $suma + ($suplementacion_RiDeAg * $preventivo);
                }
                // Riesgo Desnutrición Aguda

                // Riesgo Desnutrición Global
                if ($opcion == "RiDeGl") {
                    $totalDivicion = 3;
                    $asistencia_RiDeGl = self::valores($datos["asistencia_RiDeGl"]);
                    $programas_RiDeGl = self::valores($datos["programas_RiDeGl"]);
                    $suplementacion_RiDeGl = self::valores($datos["suplementacion_RiDeGl"]);

                    $suma = $suma + ($asistencia_RiDeGl * $detectivo);
                    $suma = $suma + ($programas_RiDeGl * $preventivo);
                    $suma = $suma + ($suplementacion_RiDeGl * $preventivo);
                }
                // Riesgo Desnutrición Global

                // Riesgo de Talla Baja
                if ($opcion == "RiTaBa") {
                    $totalDivicion = 3;
                    $asistencia_RiTaBa = self::valores($datos["asistencia_RiTaBa"]);
                    $programas_RiTaBa = self::valores($datos["programas_RiTaBa"]);
                    $suplementacion_RiTaBa = self::valores($datos["suplementacion_RiTaBa"]);

                    $suma = $suma + ($asistencia_RiTaBa * $detectivo);
                    $suma = $suma + ($programas_RiTaBa * $preventivo);
                    $suma = $suma + ($suplementacion_RiTaBa * $preventivo);
                }
                // Riesgo de Talla Baja

                // Riesgo Sobrepeso
                if ($opcion == "RiSo") {
                    $totalDivicion = 2;
                    $asistencia_RiSo = self::valores($datos["asistencia_RiSo"]);
                    $actividad_RiSo = self::valores($datos["actividad_RiSo"]);

                    $suma = $suma + ($asistencia_RiSo * $detectivo);
                    $suma = $suma + ($actividad_RiSo * $preventivo);
                }
                // Riesgo Sobrepeso

                $indice = array_search($opcion, array_column($vector, 'boton'), false);
                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRS($media);

                $valor = $vector[$indice]["valor"];
                $valor = self::eficaciaControlRSVA(strtoupper($valor));

                $riesgo_r = $valor / $media;
                $riesgo_r = round($riesgo_r);

                $valor_r = self::valRieResSa($riesgo_r);
                $color_r = self::colorRieResSa($valor_r);
                $riesgo = \App\RiesgosSaludDe1a5::modificar(Session::get('alias'), $IDHOGAR, $opcion, $riesgo_r, $id_inte);
                $respuesta = [
                    'riesgo_r' => $riesgo_r,
                    'valor_r' => $valor_r,
                    'color_r' => $color_r,
                ];
                $valores_riesgo = \App\ValoresRiesgosSaludDE1A5::modificar(Session::get('alias'), $IDHOGAR, $opcion, $datos);
                return response()->json($respuesta, 200);

            }

            if ($tipo == "DE6A11") {
                $riesgo_r = 0;
                $valor_r = "";
                $color_r = "";
                $indice = 0;
                $suma = 0;
                $totalDivicion = 1;
                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 9;
                    $alimentacion_saludable_EnIn = self::valores($datos["alimentacion_saludable_EnIn"]);
                    $asistencia_crecimiento_EnIn = self::valores($datos["asistencia_crecimiento_EnIn"]);
                    $fumigacion_EnIn = self::valores($datos["fumigacion_EnIn"]);
                    $sistema_recoleccion_EnIn = self::valores($datos["sistema_recoleccion_EnIn"]);
                    $desparacitacion_EnIn = self::valores($datos["desparacitacion_EnIn"]);
                    $inmunizacion_EnIn = self::valores($datos["inmunizacion_EnIn"]);
                    $educacion_EnIn = self::valores($datos["educacion_EnIn"]);
                    $mantenimiento_EnIn = self::valores($datos["mantenimiento_EnIn"]);
                    $citas_EnIn = self::valores($datos["citas_EnIn"]);

                    $suma = $suma + ($alimentacion_saludable_EnIn * $preventivo);
                    $suma = $suma + ($asistencia_crecimiento_EnIn * $preventivo);
                    $suma = $suma + ($fumigacion_EnIn * $preventivo);
                    $suma = $suma + ($sistema_recoleccion_EnIn * $preventivo);
                    $suma = $suma + ($desparacitacion_EnIn * $correctivo);
                    $suma = $suma + ($inmunizacion_EnIn * $preventivo);
                    $suma = $suma + ($educacion_EnIn * $preventivo);
                    $suma = $suma + ($mantenimiento_EnIn * $preventivo);
                    $suma = $suma + ($citas_EnIn * $detectivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Asociados al uso de SPA
                if ($opcion == "TrAsSPA") {
                    $totalDivicion = 2;
                    $educacion_TrAsSPA = self::valores($datos["educacion_TrAsSPA"]);
                    $acompaniamiento_TrAsSPA = self::valores($datos["acompaniamiento_TrAsSPA"]);

                    $suma = $suma + ($educacion_TrAsSPA * $preventivo);
                    $suma = $suma + ($acompaniamiento_TrAsSPA * $preventivo);
                }
                // Trastornos Asociados al uso de SPA

                // Enfermedad Cardiovascular Aterogénica
                if ($opcion == "EnCaAt") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_EnCaAt = self::valores($datos["asistencia_crecimiento_EnCaAt"]);
                    $educacion_EnCaAt = self::valores($datos["educacion_EnCaAt"]);
                    $actividad_EnCaAt = self::valores($datos["actividad_EnCaAt"]);

                    $suma = $suma + ($asistencia_crecimiento_EnCaAt * $preventivo);
                    $suma = $suma + ($educacion_EnCaAt * $preventivo);
                    $suma = $suma + ($actividad_EnCaAt * $preventivo);
                }
                // Enfermedad Cardiovascular Aterogénica

                // Cancer
                if ($opcion == "Ca") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_Ca = self::valores($datos["asistencia_crecimiento_Ca"]);
                    $educacion_Ca = self::valores($datos["educacion_Ca"]);
                    $valoracion_Ca = self::valores($datos["valoracion_Ca"]);

                    $suma = $suma + ($asistencia_crecimiento_Ca * $preventivo);
                    $suma = $suma + ($educacion_Ca * $detectivo);
                    $suma = $suma + ($valoracion_Ca * $preventivo);
                }
                // Cancer

                // Alteraciones y Transtornos Visuales
                if ($opcion == "AlTrVi") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrVi = self::valores($datos["asistencia_crecimiento_AlTrVi"]);
                    $valoracion_AlTrVi = self::valores($datos["valoracion_AlTrVi"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrVi * $preventivo);
                    $suma = $suma + ($valoracion_AlTrVi * $detectivo);
                }
                // Alteraciones y Transtornos Visuales

                // Alteraciones y Transtornos de la Audición y Comunicación
                if ($opcion == "AlTrAuCo") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrAuCo = self::valores($datos["asistencia_crecimiento_AlTrAuCo"]);
                    $valoracion_AlTrAuCo = self::valores($datos["valoracion_AlTrAuCo"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrAuCo * $preventivo);
                    $suma = $suma + ($valoracion_AlTrAuCo * $detectivo);
                }
                // Alteraciones y Transtornos de la Audición y Comunicación

                // Salud Bucal
                if ($opcion == "SaBu") {
                    $totalDivicion = 4;
                    $control_odontologia_SaBu = self::valores($datos["control_odontologia_SaBu"]);
                    $aplicacion_fluor_SaBu = self::valores($datos["aplicacion_fluor_SaBu"]);
                    $educacion_SaBu = self::valores($datos["educacion_SaBu"]);
                    $habitos_higiene_SaBu = self::valores($datos["habitos_higiene_SaBu"]);

                    $suma = $suma + ($control_odontologia_SaBu * $preventivo);
                    $suma = $suma + ($aplicacion_fluor_SaBu * $preventivo);
                    $suma = $suma + ($educacion_SaBu * $preventivo);
                    $suma = $suma + ($habitos_higiene_SaBu * $preventivo);
                }
                // Salud Bucal

                // Problemas en salud mental
                if ($opcion == "PrSaMe") {
                    $totalDivicion = 4;
                    $concientizacion_PrSaMe = self::valores($datos["concientizacion_PrSaMe"]);
                    $acompaniamiento_PrSaMe = self::valores($datos["acompaniamiento_PrSaMe"]);
                    $crecimiento_PrSaMe = self::valores($datos["crecimiento_PrSaMe"]);
                    $grupos_PrSaMe = self::valores($datos["grupos_PrSaMe"]);

                    $suma = $suma + ($concientizacion_PrSaMe * $preventivo);
                    $suma = $suma + ($acompaniamiento_PrSaMe * $preventivo);
                    $suma = $suma + ($crecimiento_PrSaMe * $preventivo);
                    $suma = $suma + ($grupos_PrSaMe * $correctivo);
                }
                // Problemas en salud mental

                // Violencias
                if ($opcion == "Vi") {
                    $totalDivicion = 5;
                    $concientizacion_Vi = self::valores($datos["concientizacion_Vi"]);
                    $acompaniamiento_Vi = self::valores($datos["acompaniamiento_Vi"]);
                    $crecimiento_Vi = self::valores($datos["crecimiento_Vi"]);
                    $grupos_Vi = self::valores($datos["grupos_Vi"]);
                    $icbf_Vi = self::valores($datos["icbf_Vi"]);

                    $suma = $suma + ($concientizacion_Vi * $preventivo);
                    $suma = $suma + ($acompaniamiento_Vi * $preventivo);
                    $suma = $suma + ($crecimiento_Vi * $detectivo);
                    $suma = $suma + ($grupos_Vi * $preventivo);
                    $suma = $suma + ($icbf_Vi * $correctivo);
                }
                // Violencias

                // Enfermedades Respiratorias crónicas
                if ($opcion == "EnReCr") {
                    $totalDivicion = 3;
                    $crecimiento_EnReCr = self::valores($datos["crecimiento_EnReCr"]);
                    $educacion_EnReCr = self::valores($datos["educacion_EnReCr"]);
                    $valoracion_EnReCr = self::valores($datos["valoracion_EnReCr"]);

                    $suma = $suma + ($crecimiento_EnReCr * $detectivo);
                    $suma = $suma + ($educacion_EnReCr * $preventivo);
                    $suma = $suma + ($valoracion_EnReCr * $detectivo);
                }
                // Enfermedades Respiratorias crónicas

                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 8;
                    $crecimiento_EnZo = self::valores($datos["crecimiento_EnZo"]);
                    $potabilizacion_EnZo = self::valores($datos["potabilizacion_EnZo"]);
                    $mantenimiento_EnZo = self::valores($datos["mantenimiento_EnZo"]);
                    $fumigacion_EnZo = self::valores($datos["fumigacion_EnZo"]);
                    $vacunacion_EnZo = self::valores($datos["vacunacion_EnZo"]);
                    $inmunizacion_EnZo = self::valores($datos["inmunizacion_EnZo"]);
                    $valorizacion_EnZo = self::valores($datos["valorizacion_EnZo"]);
                    $desparatizacion_EnZo = self::valores($datos["desparatizacion_EnZo"]);

                    $suma = $suma + ($crecimiento_EnZo * $detectivo);
                    $suma = $suma + ($potabilizacion_EnZo * $preventivo);
                    $suma = $suma + ($mantenimiento_EnZo * $preventivo);
                    $suma = $suma + ($fumigacion_EnZo * $preventivo);
                    $suma = $suma + ($vacunacion_EnZo * $correctivo);
                    $suma = $suma + ($inmunizacion_EnZo * $preventivo);
                    $suma = $suma + ($valorizacion_EnZo * $detectivo);
                    $suma = $suma + ($desparatizacion_EnZo * $correctivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
                if ($opcion == "TrDeNeEnAu") {
                    $totalDivicion = 3;
                    $crecimiento_TrDeNeEnAu = self::valores($datos["crecimiento_TrDeNeEnAu"]);
                    $acceso_TrDeNeEnAu = self::valores($datos["acceso_TrDeNeEnAu"]);
                    $valoracion_TrDeNeEnAu = self::valores($datos["valoracion_TrDeNeEnAu"]);

                    $suma = $suma + ($crecimiento_TrDeNeEnAu * $detectivo);
                    $suma = $suma + ($acceso_TrDeNeEnAu * $correctivo);
                    $suma = $suma + ($valoracion_TrDeNeEnAu * $detectivo);
                }
                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes

                // Consumo de SPA
                if ($opcion == "CoSp") {
                    $totalDivicion = 5;
                    $atencion_CoSp = self::valores($datos["atencion_CoSp"]);
                    $relaciones_CoSp = self::valores($datos["relaciones_CoSp"]);
                    $grupos_CoSp = self::valores($datos["grupos_CoSp"]);
                    $educacion_CoSp = self::valores($datos["educacion_CoSp"]);
                    $valoracion_CoSp = self::valores($datos["valoracion_CoSp"]);

                    $suma = $suma + ($atencion_CoSp * $preventivo);
                    $suma = $suma + ($relaciones_CoSp * $preventivo);
                    $suma = $suma + ($grupos_CoSp * $preventivo);
                    $suma = $suma + ($educacion_CoSp * $preventivo);
                    $suma = $suma + ($valoracion_CoSp * $preventivo);
                }
                // Consumo de SPA

                // Riesgo Delgadez
                if ($opcion == "RiDel") {
                    $totalDivicion = 3;
                    $asistencia_RiDeGl = self::valores($datos["asistencia_RiDel"]);
                    $programas_RiDeGl = self::valores($datos["programas_RiDel"]);
                    $suplementacion_RiDeGl = self::valores($datos["suplementacion_RiDel"]);

                    $suma = $suma + ($asistencia_RiDel * $detectivo);
                    $suma = $suma + ($programas_RiDel * $preventivo);
                    $suma = $suma + ($suplementacion_RiDel * $preventivo);
                }
                // Riesgo Delgadez

                // Riesgo de Talla Baja
                if ($opcion == "RiTaBa") {
                    $totalDivicion = 3;
                    $asistencia_RiTaBa = self::valores($datos["asistencia_RiTaBa"]);
                    $programas_RiTaBa = self::valores($datos["programas_RiTaBa"]);
                    $suplementacion_RiTaBa = self::valores($datos["suplementacion_RiTaBa"]);

                    $suma = $suma + ($asistencia_RiTaBa * $detectivo);
                    $suma = $suma + ($programas_RiTaBa * $preventivo);
                    $suma = $suma + ($suplementacion_RiTaBa * $preventivo);
                }
                // Riesgo de Talla Baja

                $indice = array_search($opcion, array_column($vector, 'boton'), false);
                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRS($media);

                $valor = $vector[$indice]["valor"];
                $valor = self::eficaciaControlRSVA(strtoupper($valor));

                $riesgo_r = $valor / $media;
                $riesgo_r = round($riesgo_r);

                $valor_r = self::valRieResSa($riesgo_r);
                $color_r = self::colorRieResSa($valor_r);
                $riesgo = \App\RiesgosSaludDe6a11::modificar(Session::get('alias'), $IDHOGAR, $opcion, $riesgo_r, $id_inte);
                $respuesta = [
                    'riesgo_r' => $riesgo_r,
                    'valor_r' => $valor_r,
                    'color_r' => $color_r,
                ];
                // $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RD", $datosRA);
                return response()->json($respuesta, 200);

            }

            if ($tipo == "DE12A17") {
                $riesgo_r = 0;
                $valor_r = "";
                $color_r = "";
                $indice = 0;
                $suma = 0;
                $totalDivicion = 1;
                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 9;
                    $alimentacion_saludable_EnIn = self::valores($datos["alimentacion_saludable_EnIn"]);
                    $asistencia_crecimiento_EnIn = self::valores($datos["asistencia_crecimiento_EnIn"]);
                    $fumigacion_EnIn = self::valores($datos["fumigacion_EnIn"]);
                    $sistema_recoleccion_EnIn = self::valores($datos["sistema_recoleccion_EnIn"]);
                    $desparacitacion_EnIn = self::valores($datos["desparacitacion_EnIn"]);
                    $inmunizacion_EnIn = self::valores($datos["inmunizacion_EnIn"]);
                    $educacion_EnIn = self::valores($datos["educacion_EnIn"]);
                    $mantenimiento_EnIn = self::valores($datos["mantenimiento_EnIn"]);
                    $citas_EnIn = self::valores($datos["citas_EnIn"]);

                    $suma = $suma + ($alimentacion_saludable_EnIn * $preventivo);
                    $suma = $suma + ($asistencia_crecimiento_EnIn * $preventivo);
                    $suma = $suma + ($fumigacion_EnIn * $preventivo);
                    $suma = $suma + ($sistema_recoleccion_EnIn * $preventivo);
                    $suma = $suma + ($desparacitacion_EnIn * $correctivo);
                    $suma = $suma + ($inmunizacion_EnIn * $preventivo);
                    $suma = $suma + ($educacion_EnIn * $preventivo);
                    $suma = $suma + ($mantenimiento_EnIn * $preventivo);
                    $suma = $suma + ($citas_EnIn * $detectivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Asociados al uso de SPA
                if ($opcion == "TrAsSPA") {
                    $totalDivicion = 2;
                    $educacion_TrAsSPA = self::valores($datos["educacion_TrAsSPA"]);
                    $acompaniamiento_TrAsSPA = self::valores($datos["acompaniamiento_TrAsSPA"]);

                    $suma = $suma + ($educacion_TrAsSPA * $preventivo);
                    $suma = $suma + ($acompaniamiento_TrAsSPA * $preventivo);
                }
                // Trastornos Asociados al uso de SPA

                // Enfermedad Cardiovascular Aterogénica
                if ($opcion == "EnCaAt") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_EnCaAt = self::valores($datos["asistencia_crecimiento_EnCaAt"]);
                    $educacion_EnCaAt = self::valores($datos["educacion_EnCaAt"]);
                    $actividad_EnCaAt = self::valores($datos["actividad_EnCaAt"]);

                    $suma = $suma + ($asistencia_crecimiento_EnCaAt * $preventivo);
                    $suma = $suma + ($educacion_EnCaAt * $preventivo);
                    $suma = $suma + ($actividad_EnCaAt * $preventivo);
                }
                // Enfermedad Cardiovascular Aterogénica

                // Cancer
                if ($opcion == "Ca") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_Ca = self::valores($datos["asistencia_crecimiento_Ca"]);
                    $educacion_Ca = self::valores($datos["educacion_Ca"]);
                    $valoracion_Ca = self::valores($datos["valoracion_Ca"]);

                    $suma = $suma + ($asistencia_crecimiento_Ca * $preventivo);
                    $suma = $suma + ($educacion_Ca * $detectivo);
                    $suma = $suma + ($valoracion_Ca * $preventivo);
                }
                // Cancer

                // Alteraciones y Transtornos Visuales
                if ($opcion == "AlTrVi") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrVi = self::valores($datos["asistencia_crecimiento_AlTrVi"]);
                    $valoracion_AlTrVi = self::valores($datos["valoracion_AlTrVi"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrVi * $preventivo);
                    $suma = $suma + ($valoracion_AlTrVi * $detectivo);
                }
                // Alteraciones y Transtornos Visuales

                // Alteraciones y Transtornos de la Audición y Comunicación
                if ($opcion == "AlTrAuCo") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrAuCo = self::valores($datos["asistencia_crecimiento_AlTrAuCo"]);
                    $valoracion_AlTrAuCo = self::valores($datos["valoracion_AlTrAuCo"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrAuCo * $preventivo);
                    $suma = $suma + ($valoracion_AlTrAuCo * $detectivo);
                }
                // Alteraciones y Transtornos de la Audición y Comunicación

                // Salud Bucal
                if ($opcion == "SaBu") {
                    $totalDivicion = 4;
                    $control_odontologia_SaBu = self::valores($datos["control_odontologia_SaBu"]);
                    $aplicacion_fluor_SaBu = self::valores($datos["aplicacion_fluor_SaBu"]);
                    $educacion_SaBu = self::valores($datos["educacion_SaBu"]);
                    $habitos_higiene_SaBu = self::valores($datos["habitos_higiene_SaBu"]);

                    $suma = $suma + ($control_odontologia_SaBu * $preventivo);
                    $suma = $suma + ($aplicacion_fluor_SaBu * $preventivo);
                    $suma = $suma + ($educacion_SaBu * $preventivo);
                    $suma = $suma + ($habitos_higiene_SaBu * $preventivo);
                }
                // Salud Bucal

                // Problemas en salud mental
                if ($opcion == "PrSaMe") {
                    $totalDivicion = 4;
                    $concientizacion_PrSaMe = self::valores($datos["concientizacion_PrSaMe"]);
                    $acompaniamiento_PrSaMe = self::valores($datos["acompaniamiento_PrSaMe"]);
                    $crecimiento_PrSaMe = self::valores($datos["crecimiento_PrSaMe"]);
                    $grupos_PrSaMe = self::valores($datos["grupos_PrSaMe"]);

                    $suma = $suma + ($concientizacion_PrSaMe * $preventivo);
                    $suma = $suma + ($acompaniamiento_PrSaMe * $preventivo);
                    $suma = $suma + ($crecimiento_PrSaMe * $preventivo);
                    $suma = $suma + ($grupos_PrSaMe * $correctivo);
                }
                // Problemas en salud mental

                // Violencias
                if ($opcion == "Vi") {
                    $totalDivicion = 5;
                    $concientizacion_Vi = self::valores($datos["concientizacion_Vi"]);
                    $acompaniamiento_Vi = self::valores($datos["acompaniamiento_Vi"]);
                    $crecimiento_Vi = self::valores($datos["crecimiento_Vi"]);
                    $grupos_Vi = self::valores($datos["grupos_Vi"]);
                    $icbf_Vi = self::valores($datos["icbf_Vi"]);

                    $suma = $suma + ($concientizacion_Vi * $preventivo);
                    $suma = $suma + ($acompaniamiento_Vi * $preventivo);
                    $suma = $suma + ($crecimiento_Vi * $detectivo);
                    $suma = $suma + ($grupos_Vi * $preventivo);
                    $suma = $suma + ($icbf_Vi * $correctivo);
                }
                // Violencias

                // Enfermedades Respiratorias crónicas
                if ($opcion == "EnReCr") {
                    $totalDivicion = 3;
                    $crecimiento_EnReCr = self::valores($datos["crecimiento_EnReCr"]);
                    $educacion_EnReCr = self::valores($datos["educacion_EnReCr"]);
                    $valoracion_EnReCr = self::valores($datos["valoracion_EnReCr"]);

                    $suma = $suma + ($crecimiento_EnReCr * $detectivo);
                    $suma = $suma + ($educacion_EnReCr * $preventivo);
                    $suma = $suma + ($valoracion_EnReCr * $detectivo);
                }
                // Enfermedades Respiratorias crónicas

                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 8;
                    $crecimiento_EnZo = self::valores($datos["crecimiento_EnZo"]);
                    $potabilizacion_EnZo = self::valores($datos["potabilizacion_EnZo"]);
                    $mantenimiento_EnZo = self::valores($datos["mantenimiento_EnZo"]);
                    $fumigacion_EnZo = self::valores($datos["fumigacion_EnZo"]);
                    $vacunacion_EnZo = self::valores($datos["vacunacion_EnZo"]);
                    $inmunizacion_EnZo = self::valores($datos["inmunizacion_EnZo"]);
                    $valorizacion_EnZo = self::valores($datos["valorizacion_EnZo"]);
                    $desparatizacion_EnZo = self::valores($datos["desparatizacion_EnZo"]);

                    $suma = $suma + ($crecimiento_EnZo * $detectivo);
                    $suma = $suma + ($potabilizacion_EnZo * $preventivo);
                    $suma = $suma + ($mantenimiento_EnZo * $preventivo);
                    $suma = $suma + ($fumigacion_EnZo * $preventivo);
                    $suma = $suma + ($vacunacion_EnZo * $correctivo);
                    $suma = $suma + ($inmunizacion_EnZo * $preventivo);
                    $suma = $suma + ($valorizacion_EnZo * $detectivo);
                    $suma = $suma + ($desparatizacion_EnZo * $correctivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
                if ($opcion == "TrDeNeEnAu") {
                    $totalDivicion = 3;
                    $crecimiento_TrDeNeEnAu = self::valores($datos["crecimiento_TrDeNeEnAu"]);
                    $acceso_TrDeNeEnAu = self::valores($datos["acceso_TrDeNeEnAu"]);
                    $valoracion_TrDeNeEnAu = self::valores($datos["valoracion_TrDeNeEnAu"]);

                    $suma = $suma + ($crecimiento_TrDeNeEnAu * $detectivo);
                    $suma = $suma + ($acceso_TrDeNeEnAu * $correctivo);
                    $suma = $suma + ($valoracion_TrDeNeEnAu * $detectivo);
                }
                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes

                // Consumo de SPA
                if ($opcion == "CoSp") {
                    $totalDivicion = 5;
                    $atencion_CoSp = self::valores($datos["atencion_CoSp"]);
                    $relaciones_CoSp = self::valores($datos["relaciones_CoSp"]);
                    $grupos_CoSp = self::valores($datos["grupos_CoSp"]);
                    $educacion_CoSp = self::valores($datos["educacion_CoSp"]);
                    $valoracion_CoSp = self::valores($datos["valoracion_CoSp"]);

                    $suma = $suma + ($atencion_CoSp * $preventivo);
                    $suma = $suma + ($relaciones_CoSp * $preventivo);
                    $suma = $suma + ($grupos_CoSp * $preventivo);
                    $suma = $suma + ($educacion_CoSp * $preventivo);
                    $suma = $suma + ($valoracion_CoSp * $preventivo);
                }
                // Consumo de SPA

                // Riesgo Delgadez
                if ($opcion == "RiDel") {
                    $totalDivicion = 3;
                    $asistencia_RiDeGl = self::valores($datos["asistencia_RiDel"]);
                    $programas_RiDeGl = self::valores($datos["programas_RiDel"]);
                    $suplementacion_RiDeGl = self::valores($datos["suplementacion_RiDel"]);

                    $suma = $suma + ($asistencia_RiDel * $detectivo);
                    $suma = $suma + ($programas_RiDel * $preventivo);
                    $suma = $suma + ($suplementacion_RiDel * $preventivo);
                }
                // Riesgo Delgadez

                // Riesgo de Talla Baja
                if ($opcion == "RiTaBa") {
                    $totalDivicion = 3;
                    $asistencia_RiTaBa = self::valores($datos["asistencia_RiTaBa"]);
                    $programas_RiTaBa = self::valores($datos["programas_RiTaBa"]);
                    $suplementacion_RiTaBa = self::valores($datos["suplementacion_RiTaBa"]);

                    $suma = $suma + ($asistencia_RiTaBa * $detectivo);
                    $suma = $suma + ($programas_RiTaBa * $preventivo);
                    $suma = $suma + ($suplementacion_RiTaBa * $preventivo);
                }
                // Riesgo de Talla Baja

                $indice = array_search($opcion, array_column($vector, 'boton'), false);
                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRS($media);

                $valor = $vector[$indice]["valor"];
                $valor = self::eficaciaControlRSVA(strtoupper($valor));

                $riesgo_r = $valor / $media;
                $riesgo_r = round($riesgo_r);

                $valor_r = self::valRieResSa($riesgo_r);
                $color_r = self::colorRieResSa($valor_r);
                $riesgo = \App\RiesgosSaludDe12a17::modificar(Session::get('alias'), $IDHOGAR, $opcion, $riesgo_r, $id_inte);
                $respuesta = [
                    'riesgo_r' => $riesgo_r,
                    'valor_r' => $valor_r,
                    'color_r' => $color_r,
                ];
                // $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RD", $datosRA);
                return response()->json($respuesta, 200);

            }

            if ($tipo == "DE18A28") {
                $riesgo_r = 0;
                $valor_r = "";
                $color_r = "";
                $indice = 0;
                $suma = 0;
                $totalDivicion = 1;
                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 9;
                    $alimentacion_saludable_EnIn = self::valores($datos["alimentacion_saludable_EnIn"]);
                    $asistencia_crecimiento_EnIn = self::valores($datos["asistencia_crecimiento_EnIn"]);
                    $fumigacion_EnIn = self::valores($datos["fumigacion_EnIn"]);
                    $sistema_recoleccion_EnIn = self::valores($datos["sistema_recoleccion_EnIn"]);
                    $desparacitacion_EnIn = self::valores($datos["desparacitacion_EnIn"]);
                    $inmunizacion_EnIn = self::valores($datos["inmunizacion_EnIn"]);
                    $educacion_EnIn = self::valores($datos["educacion_EnIn"]);
                    $mantenimiento_EnIn = self::valores($datos["mantenimiento_EnIn"]);
                    $citas_EnIn = self::valores($datos["citas_EnIn"]);

                    $suma = $suma + ($alimentacion_saludable_EnIn * $preventivo);
                    $suma = $suma + ($asistencia_crecimiento_EnIn * $preventivo);
                    $suma = $suma + ($fumigacion_EnIn * $preventivo);
                    $suma = $suma + ($sistema_recoleccion_EnIn * $preventivo);
                    $suma = $suma + ($desparacitacion_EnIn * $correctivo);
                    $suma = $suma + ($inmunizacion_EnIn * $preventivo);
                    $suma = $suma + ($educacion_EnIn * $preventivo);
                    $suma = $suma + ($mantenimiento_EnIn * $preventivo);
                    $suma = $suma + ($citas_EnIn * $detectivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Asociados al uso de SPA
                if ($opcion == "TrAsSPA") {
                    $totalDivicion = 2;
                    $educacion_TrAsSPA = self::valores($datos["educacion_TrAsSPA"]);
                    $acompaniamiento_TrAsSPA = self::valores($datos["acompaniamiento_TrAsSPA"]);

                    $suma = $suma + ($educacion_TrAsSPA * $preventivo);
                    $suma = $suma + ($acompaniamiento_TrAsSPA * $preventivo);
                }
                // Trastornos Asociados al uso de SPA

                // Enfermedad Cardiovascular Aterogénica
                if ($opcion == "EnCaAt") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_EnCaAt = self::valores($datos["asistencia_crecimiento_EnCaAt"]);
                    $educacion_EnCaAt = self::valores($datos["educacion_EnCaAt"]);
                    $actividad_EnCaAt = self::valores($datos["actividad_EnCaAt"]);

                    $suma = $suma + ($asistencia_crecimiento_EnCaAt * $preventivo);
                    $suma = $suma + ($educacion_EnCaAt * $preventivo);
                    $suma = $suma + ($actividad_EnCaAt * $preventivo);
                }
                // Enfermedad Cardiovascular Aterogénica

                // Cancer
                if ($opcion == "Ca") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_Ca = self::valores($datos["asistencia_crecimiento_Ca"]);
                    $educacion_Ca = self::valores($datos["educacion_Ca"]);
                    $valoracion_Ca = self::valores($datos["valoracion_Ca"]);

                    $suma = $suma + ($asistencia_crecimiento_Ca * $preventivo);
                    $suma = $suma + ($educacion_Ca * $detectivo);
                    $suma = $suma + ($valoracion_Ca * $preventivo);
                }
                // Cancer

                // Alteraciones y Transtornos Visuales
                if ($opcion == "AlTrVi") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrVi = self::valores($datos["asistencia_crecimiento_AlTrVi"]);
                    $valoracion_AlTrVi = self::valores($datos["valoracion_AlTrVi"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrVi * $preventivo);
                    $suma = $suma + ($valoracion_AlTrVi * $detectivo);
                }
                // Alteraciones y Transtornos Visuales

                // Alteraciones y Transtornos de la Audición y Comunicación
                if ($opcion == "AlTrAuCo") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrAuCo = self::valores($datos["asistencia_crecimiento_AlTrAuCo"]);
                    $valoracion_AlTrAuCo = self::valores($datos["valoracion_AlTrAuCo"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrAuCo * $preventivo);
                    $suma = $suma + ($valoracion_AlTrAuCo * $detectivo);
                }
                // Alteraciones y Transtornos de la Audición y Comunicación

                // Salud Bucal
                if ($opcion == "SaBu") {
                    $totalDivicion = 4;
                    $control_odontologia_SaBu = self::valores($datos["control_odontologia_SaBu"]);
                    $aplicacion_fluor_SaBu = self::valores($datos["aplicacion_fluor_SaBu"]);
                    $educacion_SaBu = self::valores($datos["educacion_SaBu"]);
                    $habitos_higiene_SaBu = self::valores($datos["habitos_higiene_SaBu"]);

                    $suma = $suma + ($control_odontologia_SaBu * $preventivo);
                    $suma = $suma + ($aplicacion_fluor_SaBu * $preventivo);
                    $suma = $suma + ($educacion_SaBu * $preventivo);
                    $suma = $suma + ($habitos_higiene_SaBu * $preventivo);
                }
                // Salud Bucal

                // Problemas en salud mental
                if ($opcion == "PrSaMe") {
                    $totalDivicion = 4;
                    $concientizacion_PrSaMe = self::valores($datos["concientizacion_PrSaMe"]);
                    $acompaniamiento_PrSaMe = self::valores($datos["acompaniamiento_PrSaMe"]);
                    $crecimiento_PrSaMe = self::valores($datos["crecimiento_PrSaMe"]);
                    $grupos_PrSaMe = self::valores($datos["grupos_PrSaMe"]);

                    $suma = $suma + ($concientizacion_PrSaMe * $preventivo);
                    $suma = $suma + ($acompaniamiento_PrSaMe * $preventivo);
                    $suma = $suma + ($crecimiento_PrSaMe * $preventivo);
                    $suma = $suma + ($grupos_PrSaMe * $correctivo);
                }
                // Problemas en salud mental

                // Violencias
                if ($opcion == "Vi") {
                    $totalDivicion = 5;
                    $concientizacion_Vi = self::valores($datos["concientizacion_Vi"]);
                    $acompaniamiento_Vi = self::valores($datos["acompaniamiento_Vi"]);
                    $crecimiento_Vi = self::valores($datos["crecimiento_Vi"]);
                    $grupos_Vi = self::valores($datos["grupos_Vi"]);
                    $icbf_Vi = self::valores($datos["icbf_Vi"]);

                    $suma = $suma + ($concientizacion_Vi * $preventivo);
                    $suma = $suma + ($acompaniamiento_Vi * $preventivo);
                    $suma = $suma + ($crecimiento_Vi * $detectivo);
                    $suma = $suma + ($grupos_Vi * $preventivo);
                    $suma = $suma + ($icbf_Vi * $correctivo);
                }
                // Violencias

                // Enfermedades Respiratorias crónicas
                if ($opcion == "EnReCr") {
                    $totalDivicion = 3;
                    $crecimiento_EnReCr = self::valores($datos["crecimiento_EnReCr"]);
                    $educacion_EnReCr = self::valores($datos["educacion_EnReCr"]);
                    $valoracion_EnReCr = self::valores($datos["valoracion_EnReCr"]);

                    $suma = $suma + ($crecimiento_EnReCr * $detectivo);
                    $suma = $suma + ($educacion_EnReCr * $preventivo);
                    $suma = $suma + ($valoracion_EnReCr * $detectivo);
                }
                // Enfermedades Respiratorias crónicas

                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 8;
                    $crecimiento_EnZo = self::valores($datos["crecimiento_EnZo"]);
                    $potabilizacion_EnZo = self::valores($datos["potabilizacion_EnZo"]);
                    $mantenimiento_EnZo = self::valores($datos["mantenimiento_EnZo"]);
                    $fumigacion_EnZo = self::valores($datos["fumigacion_EnZo"]);
                    $vacunacion_EnZo = self::valores($datos["vacunacion_EnZo"]);
                    $inmunizacion_EnZo = self::valores($datos["inmunizacion_EnZo"]);
                    $valorizacion_EnZo = self::valores($datos["valorizacion_EnZo"]);
                    $desparatizacion_EnZo = self::valores($datos["desparatizacion_EnZo"]);

                    $suma = $suma + ($crecimiento_EnZo * $detectivo);
                    $suma = $suma + ($potabilizacion_EnZo * $preventivo);
                    $suma = $suma + ($mantenimiento_EnZo * $preventivo);
                    $suma = $suma + ($fumigacion_EnZo * $preventivo);
                    $suma = $suma + ($vacunacion_EnZo * $correctivo);
                    $suma = $suma + ($inmunizacion_EnZo * $preventivo);
                    $suma = $suma + ($valorizacion_EnZo * $detectivo);
                    $suma = $suma + ($desparatizacion_EnZo * $correctivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
                if ($opcion == "TrDeNeEnAu") {
                    $totalDivicion = 3;
                    $crecimiento_TrDeNeEnAu = self::valores($datos["crecimiento_TrDeNeEnAu"]);
                    $acceso_TrDeNeEnAu = self::valores($datos["acceso_TrDeNeEnAu"]);
                    $valoracion_TrDeNeEnAu = self::valores($datos["valoracion_TrDeNeEnAu"]);

                    $suma = $suma + ($crecimiento_TrDeNeEnAu * $detectivo);
                    $suma = $suma + ($acceso_TrDeNeEnAu * $correctivo);
                    $suma = $suma + ($valoracion_TrDeNeEnAu * $detectivo);
                }
                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes

                // Consumo de SPA
                if ($opcion == "CoSp") {
                    $totalDivicion = 5;
                    $atencion_CoSp = self::valores($datos["atencion_CoSp"]);
                    $relaciones_CoSp = self::valores($datos["relaciones_CoSp"]);
                    $grupos_CoSp = self::valores($datos["grupos_CoSp"]);
                    $educacion_CoSp = self::valores($datos["educacion_CoSp"]);
                    $valoracion_CoSp = self::valores($datos["valoracion_CoSp"]);

                    $suma = $suma + ($atencion_CoSp * $preventivo);
                    $suma = $suma + ($relaciones_CoSp * $preventivo);
                    $suma = $suma + ($grupos_CoSp * $preventivo);
                    $suma = $suma + ($educacion_CoSp * $preventivo);
                    $suma = $suma + ($valoracion_CoSp * $preventivo);
                }
                // Consumo de SPA

                // Riesgo Delgadez
                if ($opcion == "RiDel") {
                    $totalDivicion = 3;
                    $asistencia_RiDeGl = self::valores($datos["asistencia_RiDel"]);
                    $programas_RiDeGl = self::valores($datos["programas_RiDel"]);
                    $suplementacion_RiDeGl = self::valores($datos["suplementacion_RiDel"]);

                    $suma = $suma + ($asistencia_RiDel * $detectivo);
                    $suma = $suma + ($programas_RiDel * $preventivo);
                    $suma = $suma + ($suplementacion_RiDel * $preventivo);
                }
                // Riesgo Delgadez

                $indice = array_search($opcion, array_column($vector, 'boton'), false);
                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRS($media);

                $valor = $vector[$indice]["valor"];
                $valor = self::eficaciaControlRSVA(strtoupper($valor));

                $riesgo_r = $valor / $media;
                $riesgo_r = round($riesgo_r);

                $valor_r = self::valRieResSa($riesgo_r);
                $color_r = self::colorRieResSa($valor_r);
                $riesgo = \App\RiesgosSaludDe18a28::modificar(Session::get('alias'), $IDHOGAR, $opcion, $riesgo_r, $id_inte);
                $respuesta = [
                    'riesgo_r' => $riesgo_r,
                    'valor_r' => $valor_r,
                    'color_r' => $color_r,
                ];
                // $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RD", $datosRA);
                return response()->json($respuesta, 200);

            }

            if ($tipo == "DE29A59") {
                $riesgo_r = 0;
                $valor_r = "";
                $color_r = "";
                $indice = 0;
                $suma = 0;
                $totalDivicion = 1;
                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 9;
                    $alimentacion_saludable_EnIn = self::valores($datos["alimentacion_saludable_EnIn"]);
                    $asistencia_crecimiento_EnIn = self::valores($datos["asistencia_crecimiento_EnIn"]);
                    $fumigacion_EnIn = self::valores($datos["fumigacion_EnIn"]);
                    $sistema_recoleccion_EnIn = self::valores($datos["sistema_recoleccion_EnIn"]);
                    $desparacitacion_EnIn = self::valores($datos["desparacitacion_EnIn"]);
                    $inmunizacion_EnIn = self::valores($datos["inmunizacion_EnIn"]);
                    $educacion_EnIn = self::valores($datos["educacion_EnIn"]);
                    $mantenimiento_EnIn = self::valores($datos["mantenimiento_EnIn"]);
                    $citas_EnIn = self::valores($datos["citas_EnIn"]);

                    $suma = $suma + ($alimentacion_saludable_EnIn * $preventivo);
                    $suma = $suma + ($asistencia_crecimiento_EnIn * $preventivo);
                    $suma = $suma + ($fumigacion_EnIn * $preventivo);
                    $suma = $suma + ($sistema_recoleccion_EnIn * $preventivo);
                    $suma = $suma + ($desparacitacion_EnIn * $correctivo);
                    $suma = $suma + ($inmunizacion_EnIn * $preventivo);
                    $suma = $suma + ($educacion_EnIn * $preventivo);
                    $suma = $suma + ($mantenimiento_EnIn * $preventivo);
                    $suma = $suma + ($citas_EnIn * $detectivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Asociados al uso de SPA
                if ($opcion == "TrAsSPA") {
                    $totalDivicion = 2;
                    $educacion_TrAsSPA = self::valores($datos["educacion_TrAsSPA"]);
                    $acompaniamiento_TrAsSPA = self::valores($datos["acompaniamiento_TrAsSPA"]);

                    $suma = $suma + ($educacion_TrAsSPA * $preventivo);
                    $suma = $suma + ($acompaniamiento_TrAsSPA * $preventivo);
                }
                // Trastornos Asociados al uso de SPA

                // Enfermedad Cardiovascular Aterogénica
                if ($opcion == "EnCaAt") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_EnCaAt = self::valores($datos["asistencia_crecimiento_EnCaAt"]);
                    $educacion_EnCaAt = self::valores($datos["educacion_EnCaAt"]);
                    $actividad_EnCaAt = self::valores($datos["actividad_EnCaAt"]);

                    $suma = $suma + ($asistencia_crecimiento_EnCaAt * $preventivo);
                    $suma = $suma + ($educacion_EnCaAt * $preventivo);
                    $suma = $suma + ($actividad_EnCaAt * $preventivo);
                }
                // Enfermedad Cardiovascular Aterogénica

                // Cancer
                if ($opcion == "Ca") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_Ca = self::valores($datos["asistencia_crecimiento_Ca"]);
                    $educacion_Ca = self::valores($datos["educacion_Ca"]);
                    $valoracion_Ca = self::valores($datos["valoracion_Ca"]);

                    $suma = $suma + ($asistencia_crecimiento_Ca * $preventivo);
                    $suma = $suma + ($educacion_Ca * $detectivo);
                    $suma = $suma + ($valoracion_Ca * $preventivo);
                }
                // Cancer

                // Alteraciones y Transtornos Visuales
                if ($opcion == "AlTrVi") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrVi = self::valores($datos["asistencia_crecimiento_AlTrVi"]);
                    $valoracion_AlTrVi = self::valores($datos["valoracion_AlTrVi"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrVi * $preventivo);
                    $suma = $suma + ($valoracion_AlTrVi * $detectivo);
                }
                // Alteraciones y Transtornos Visuales

                // Alteraciones y Transtornos de la Audición y Comunicación
                if ($opcion == "AlTrAuCo") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrAuCo = self::valores($datos["asistencia_crecimiento_AlTrAuCo"]);
                    $valoracion_AlTrAuCo = self::valores($datos["valoracion_AlTrAuCo"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrAuCo * $preventivo);
                    $suma = $suma + ($valoracion_AlTrAuCo * $detectivo);
                }
                // Alteraciones y Transtornos de la Audición y Comunicación

                // Salud Bucal
                if ($opcion == "SaBu") {
                    $totalDivicion = 4;
                    $control_odontologia_SaBu = self::valores($datos["control_odontologia_SaBu"]);
                    $aplicacion_fluor_SaBu = self::valores($datos["aplicacion_fluor_SaBu"]);
                    $educacion_SaBu = self::valores($datos["educacion_SaBu"]);
                    $habitos_higiene_SaBu = self::valores($datos["habitos_higiene_SaBu"]);

                    $suma = $suma + ($control_odontologia_SaBu * $preventivo);
                    $suma = $suma + ($aplicacion_fluor_SaBu * $preventivo);
                    $suma = $suma + ($educacion_SaBu * $preventivo);
                    $suma = $suma + ($habitos_higiene_SaBu * $preventivo);
                }
                // Salud Bucal

                // Problemas en salud mental
                if ($opcion == "PrSaMe") {
                    $totalDivicion = 4;
                    $concientizacion_PrSaMe = self::valores($datos["concientizacion_PrSaMe"]);
                    $acompaniamiento_PrSaMe = self::valores($datos["acompaniamiento_PrSaMe"]);
                    $crecimiento_PrSaMe = self::valores($datos["crecimiento_PrSaMe"]);
                    $grupos_PrSaMe = self::valores($datos["grupos_PrSaMe"]);

                    $suma = $suma + ($concientizacion_PrSaMe * $preventivo);
                    $suma = $suma + ($acompaniamiento_PrSaMe * $preventivo);
                    $suma = $suma + ($crecimiento_PrSaMe * $preventivo);
                    $suma = $suma + ($grupos_PrSaMe * $correctivo);
                }
                // Problemas en salud mental

                // Violencias
                if ($opcion == "Vi") {
                    $totalDivicion = 5;
                    $concientizacion_Vi = self::valores($datos["concientizacion_Vi"]);
                    $acompaniamiento_Vi = self::valores($datos["acompaniamiento_Vi"]);
                    $crecimiento_Vi = self::valores($datos["crecimiento_Vi"]);
                    $grupos_Vi = self::valores($datos["grupos_Vi"]);
                    $icbf_Vi = self::valores($datos["icbf_Vi"]);

                    $suma = $suma + ($concientizacion_Vi * $preventivo);
                    $suma = $suma + ($acompaniamiento_Vi * $preventivo);
                    $suma = $suma + ($crecimiento_Vi * $detectivo);
                    $suma = $suma + ($grupos_Vi * $preventivo);
                    $suma = $suma + ($icbf_Vi * $correctivo);
                }
                // Violencias

                // Enfermedades Respiratorias crónicas
                if ($opcion == "EnReCr") {
                    $totalDivicion = 3;
                    $crecimiento_EnReCr = self::valores($datos["crecimiento_EnReCr"]);
                    $educacion_EnReCr = self::valores($datos["educacion_EnReCr"]);
                    $valoracion_EnReCr = self::valores($datos["valoracion_EnReCr"]);

                    $suma = $suma + ($crecimiento_EnReCr * $detectivo);
                    $suma = $suma + ($educacion_EnReCr * $preventivo);
                    $suma = $suma + ($valoracion_EnReCr * $detectivo);
                }
                // Enfermedades Respiratorias crónicas

                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 8;
                    $crecimiento_EnZo = self::valores($datos["crecimiento_EnZo"]);
                    $potabilizacion_EnZo = self::valores($datos["potabilizacion_EnZo"]);
                    $mantenimiento_EnZo = self::valores($datos["mantenimiento_EnZo"]);
                    $fumigacion_EnZo = self::valores($datos["fumigacion_EnZo"]);
                    $vacunacion_EnZo = self::valores($datos["vacunacion_EnZo"]);
                    $inmunizacion_EnZo = self::valores($datos["inmunizacion_EnZo"]);
                    $valorizacion_EnZo = self::valores($datos["valorizacion_EnZo"]);
                    $desparatizacion_EnZo = self::valores($datos["desparatizacion_EnZo"]);

                    $suma = $suma + ($crecimiento_EnZo * $detectivo);
                    $suma = $suma + ($potabilizacion_EnZo * $preventivo);
                    $suma = $suma + ($mantenimiento_EnZo * $preventivo);
                    $suma = $suma + ($fumigacion_EnZo * $preventivo);
                    $suma = $suma + ($vacunacion_EnZo * $correctivo);
                    $suma = $suma + ($inmunizacion_EnZo * $preventivo);
                    $suma = $suma + ($valorizacion_EnZo * $detectivo);
                    $suma = $suma + ($desparatizacion_EnZo * $correctivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
                if ($opcion == "TrDeNeEnAu") {
                    $totalDivicion = 3;
                    $crecimiento_TrDeNeEnAu = self::valores($datos["crecimiento_TrDeNeEnAu"]);
                    $acceso_TrDeNeEnAu = self::valores($datos["acceso_TrDeNeEnAu"]);
                    $valoracion_TrDeNeEnAu = self::valores($datos["valoracion_TrDeNeEnAu"]);

                    $suma = $suma + ($crecimiento_TrDeNeEnAu * $detectivo);
                    $suma = $suma + ($acceso_TrDeNeEnAu * $correctivo);
                    $suma = $suma + ($valoracion_TrDeNeEnAu * $detectivo);
                }
                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes

                // Consumo de SPA
                if ($opcion == "CoSp") {
                    $totalDivicion = 5;
                    $atencion_CoSp = self::valores($datos["atencion_CoSp"]);
                    $relaciones_CoSp = self::valores($datos["relaciones_CoSp"]);
                    $grupos_CoSp = self::valores($datos["grupos_CoSp"]);
                    $educacion_CoSp = self::valores($datos["educacion_CoSp"]);
                    $valoracion_CoSp = self::valores($datos["valoracion_CoSp"]);

                    $suma = $suma + ($atencion_CoSp * $preventivo);
                    $suma = $suma + ($relaciones_CoSp * $preventivo);
                    $suma = $suma + ($grupos_CoSp * $preventivo);
                    $suma = $suma + ($educacion_CoSp * $preventivo);
                    $suma = $suma + ($valoracion_CoSp * $preventivo);
                }
                // Consumo de SPA

                // Riesgo Delgadez
                if ($opcion == "RiDel") {
                    $totalDivicion = 3;
                    $asistencia_RiDeGl = self::valores($datos["asistencia_RiDel"]);
                    $programas_RiDeGl = self::valores($datos["programas_RiDel"]);
                    $suplementacion_RiDeGl = self::valores($datos["suplementacion_RiDel"]);

                    $suma = $suma + ($asistencia_RiDel * $detectivo);
                    $suma = $suma + ($programas_RiDel * $preventivo);
                    $suma = $suma + ($suplementacion_RiDel * $preventivo);
                }
                // Riesgo Delgadez

                $indice = array_search($opcion, array_column($vector, 'boton'), false);
                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRS($media);

                $valor = $vector[$indice]["valor"];
                $valor = self::eficaciaControlRSVA(strtoupper($valor));

                $riesgo_r = $valor / $media;
                $riesgo_r = round($riesgo_r);

                $valor_r = self::valRieResSa($riesgo_r);
                $color_r = self::colorRieResSa($valor_r);
                $riesgo = \App\RiesgosSaludDe29a59::modificar(Session::get('alias'), $IDHOGAR, $opcion, $riesgo_r, $id_inte);
                $respuesta = [
                    'riesgo_r' => $riesgo_r,
                    'valor_r' => $valor_r,
                    'color_r' => $color_r,
                ];
                // $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RD", $datosRA);
                return response()->json($respuesta, 200);

            }

            if ($tipo == "DE60") {
                $riesgo_r = 0;
                $valor_r = "";
                $color_r = "";
                $indice = 0;
                $suma = 0;
                $totalDivicion = 1;
                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 9;
                    $alimentacion_saludable_EnIn = self::valores($datos["alimentacion_saludable_EnIn"]);
                    $asistencia_crecimiento_EnIn = self::valores($datos["asistencia_crecimiento_EnIn"]);
                    $fumigacion_EnIn = self::valores($datos["fumigacion_EnIn"]);
                    $sistema_recoleccion_EnIn = self::valores($datos["sistema_recoleccion_EnIn"]);
                    $desparacitacion_EnIn = self::valores($datos["desparacitacion_EnIn"]);
                    $inmunizacion_EnIn = self::valores($datos["inmunizacion_EnIn"]);
                    $educacion_EnIn = self::valores($datos["educacion_EnIn"]);
                    $mantenimiento_EnIn = self::valores($datos["mantenimiento_EnIn"]);
                    $citas_EnIn = self::valores($datos["citas_EnIn"]);

                    $suma = $suma + ($alimentacion_saludable_EnIn * $preventivo);
                    $suma = $suma + ($asistencia_crecimiento_EnIn * $preventivo);
                    $suma = $suma + ($fumigacion_EnIn * $preventivo);
                    $suma = $suma + ($sistema_recoleccion_EnIn * $preventivo);
                    $suma = $suma + ($desparacitacion_EnIn * $correctivo);
                    $suma = $suma + ($inmunizacion_EnIn * $preventivo);
                    $suma = $suma + ($educacion_EnIn * $preventivo);
                    $suma = $suma + ($mantenimiento_EnIn * $preventivo);
                    $suma = $suma + ($citas_EnIn * $detectivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Asociados al uso de SPA
                if ($opcion == "TrAsSPA") {
                    $totalDivicion = 2;
                    $educacion_TrAsSPA = self::valores($datos["educacion_TrAsSPA"]);
                    $acompaniamiento_TrAsSPA = self::valores($datos["acompaniamiento_TrAsSPA"]);

                    $suma = $suma + ($educacion_TrAsSPA * $preventivo);
                    $suma = $suma + ($acompaniamiento_TrAsSPA * $preventivo);
                }
                // Trastornos Asociados al uso de SPA

                // Enfermedad Cardiovascular Aterogénica
                if ($opcion == "EnCaAt") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_EnCaAt = self::valores($datos["asistencia_crecimiento_EnCaAt"]);
                    $educacion_EnCaAt = self::valores($datos["educacion_EnCaAt"]);
                    $actividad_EnCaAt = self::valores($datos["actividad_EnCaAt"]);

                    $suma = $suma + ($asistencia_crecimiento_EnCaAt * $preventivo);
                    $suma = $suma + ($educacion_EnCaAt * $preventivo);
                    $suma = $suma + ($actividad_EnCaAt * $preventivo);
                }
                // Enfermedad Cardiovascular Aterogénica

                // Cancer
                if ($opcion == "Ca") {
                    $totalDivicion = 3;
                    $asistencia_crecimiento_Ca = self::valores($datos["asistencia_crecimiento_Ca"]);
                    $educacion_Ca = self::valores($datos["educacion_Ca"]);
                    $valoracion_Ca = self::valores($datos["valoracion_Ca"]);

                    $suma = $suma + ($asistencia_crecimiento_Ca * $preventivo);
                    $suma = $suma + ($educacion_Ca * $detectivo);
                    $suma = $suma + ($valoracion_Ca * $preventivo);
                }
                // Cancer

                // Alteraciones y Transtornos Visuales
                if ($opcion == "AlTrVi") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrVi = self::valores($datos["asistencia_crecimiento_AlTrVi"]);
                    $valoracion_AlTrVi = self::valores($datos["valoracion_AlTrVi"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrVi * $preventivo);
                    $suma = $suma + ($valoracion_AlTrVi * $detectivo);
                }
                // Alteraciones y Transtornos Visuales

                // Alteraciones y Transtornos de la Audición y Comunicación
                if ($opcion == "AlTrAuCo") {
                    $totalDivicion = 2;
                    $asistencia_crecimiento_AlTrAuCo = self::valores($datos["asistencia_crecimiento_AlTrAuCo"]);
                    $valoracion_AlTrAuCo = self::valores($datos["valoracion_AlTrAuCo"]);

                    $suma = $suma + ($asistencia_crecimiento_AlTrAuCo * $preventivo);
                    $suma = $suma + ($valoracion_AlTrAuCo * $detectivo);
                }
                // Alteraciones y Transtornos de la Audición y Comunicación

                // Salud Bucal
                if ($opcion == "SaBu") {
                    $totalDivicion = 4;
                    $control_odontologia_SaBu = self::valores($datos["control_odontologia_SaBu"]);
                    $aplicacion_fluor_SaBu = self::valores($datos["aplicacion_fluor_SaBu"]);
                    $educacion_SaBu = self::valores($datos["educacion_SaBu"]);
                    $habitos_higiene_SaBu = self::valores($datos["habitos_higiene_SaBu"]);

                    $suma = $suma + ($control_odontologia_SaBu * $preventivo);
                    $suma = $suma + ($aplicacion_fluor_SaBu * $preventivo);
                    $suma = $suma + ($educacion_SaBu * $preventivo);
                    $suma = $suma + ($habitos_higiene_SaBu * $preventivo);
                }
                // Salud Bucal

                // Problemas en salud mental
                if ($opcion == "PrSaMe") {
                    $totalDivicion = 4;
                    $concientizacion_PrSaMe = self::valores($datos["concientizacion_PrSaMe"]);
                    $acompaniamiento_PrSaMe = self::valores($datos["acompaniamiento_PrSaMe"]);
                    $crecimiento_PrSaMe = self::valores($datos["crecimiento_PrSaMe"]);
                    $grupos_PrSaMe = self::valores($datos["grupos_PrSaMe"]);

                    $suma = $suma + ($concientizacion_PrSaMe * $preventivo);
                    $suma = $suma + ($acompaniamiento_PrSaMe * $preventivo);
                    $suma = $suma + ($crecimiento_PrSaMe * $preventivo);
                    $suma = $suma + ($grupos_PrSaMe * $correctivo);
                }
                // Problemas en salud mental

                // Violencias
                if ($opcion == "Vi") {
                    $totalDivicion = 5;
                    $concientizacion_Vi = self::valores($datos["concientizacion_Vi"]);
                    $acompaniamiento_Vi = self::valores($datos["acompaniamiento_Vi"]);
                    $crecimiento_Vi = self::valores($datos["crecimiento_Vi"]);
                    $grupos_Vi = self::valores($datos["grupos_Vi"]);
                    $icbf_Vi = self::valores($datos["icbf_Vi"]);

                    $suma = $suma + ($concientizacion_Vi * $preventivo);
                    $suma = $suma + ($acompaniamiento_Vi * $preventivo);
                    $suma = $suma + ($crecimiento_Vi * $detectivo);
                    $suma = $suma + ($grupos_Vi * $preventivo);
                    $suma = $suma + ($icbf_Vi * $correctivo);
                }
                // Violencias

                // Enfermedades Respiratorias crónicas
                if ($opcion == "EnReCr") {
                    $totalDivicion = 3;
                    $crecimiento_EnReCr = self::valores($datos["crecimiento_EnReCr"]);
                    $educacion_EnReCr = self::valores($datos["educacion_EnReCr"]);
                    $valoracion_EnReCr = self::valores($datos["valoracion_EnReCr"]);

                    $suma = $suma + ($crecimiento_EnReCr * $detectivo);
                    $suma = $suma + ($educacion_EnReCr * $preventivo);
                    $suma = $suma + ($valoracion_EnReCr * $detectivo);
                }
                // Enfermedades Respiratorias crónicas

                // Enfermedades Infeccisosas
                if ($opcion == "EnIn") {
                    $totalDivicion = 8;
                    $crecimiento_EnZo = self::valores($datos["crecimiento_EnZo"]);
                    $potabilizacion_EnZo = self::valores($datos["potabilizacion_EnZo"]);
                    $mantenimiento_EnZo = self::valores($datos["mantenimiento_EnZo"]);
                    $fumigacion_EnZo = self::valores($datos["fumigacion_EnZo"]);
                    $vacunacion_EnZo = self::valores($datos["vacunacion_EnZo"]);
                    $inmunizacion_EnZo = self::valores($datos["inmunizacion_EnZo"]);
                    $valorizacion_EnZo = self::valores($datos["valorizacion_EnZo"]);
                    $desparatizacion_EnZo = self::valores($datos["desparatizacion_EnZo"]);

                    $suma = $suma + ($crecimiento_EnZo * $detectivo);
                    $suma = $suma + ($potabilizacion_EnZo * $preventivo);
                    $suma = $suma + ($mantenimiento_EnZo * $preventivo);
                    $suma = $suma + ($fumigacion_EnZo * $preventivo);
                    $suma = $suma + ($vacunacion_EnZo * $correctivo);
                    $suma = $suma + ($inmunizacion_EnZo * $preventivo);
                    $suma = $suma + ($valorizacion_EnZo * $detectivo);
                    $suma = $suma + ($desparatizacion_EnZo * $correctivo);
                }
                // Enfermedades Infeccisosas

                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
                if ($opcion == "TrDeNeEnAu") {
                    $totalDivicion = 3;
                    $crecimiento_TrDeNeEnAu = self::valores($datos["crecimiento_TrDeNeEnAu"]);
                    $acceso_TrDeNeEnAu = self::valores($datos["acceso_TrDeNeEnAu"]);
                    $valoracion_TrDeNeEnAu = self::valores($datos["valoracion_TrDeNeEnAu"]);

                    $suma = $suma + ($crecimiento_TrDeNeEnAu * $detectivo);
                    $suma = $suma + ($acceso_TrDeNeEnAu * $correctivo);
                    $suma = $suma + ($valoracion_TrDeNeEnAu * $detectivo);
                }
                // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes

                // Consumo de SPA
                if ($opcion == "CoSp") {
                    $totalDivicion = 5;
                    $atencion_CoSp = self::valores($datos["atencion_CoSp"]);
                    $relaciones_CoSp = self::valores($datos["relaciones_CoSp"]);
                    $grupos_CoSp = self::valores($datos["grupos_CoSp"]);
                    $educacion_CoSp = self::valores($datos["educacion_CoSp"]);
                    $valoracion_CoSp = self::valores($datos["valoracion_CoSp"]);

                    $suma = $suma + ($atencion_CoSp * $preventivo);
                    $suma = $suma + ($relaciones_CoSp * $preventivo);
                    $suma = $suma + ($grupos_CoSp * $preventivo);
                    $suma = $suma + ($educacion_CoSp * $preventivo);
                    $suma = $suma + ($valoracion_CoSp * $preventivo);
                }
                // Consumo de SPA

                $indice = array_search($opcion, array_column($vector, 'boton'), false);
                $media = $suma / $totalDivicion;
                $media = self::eficaciaControlRS($media);

                $valor = $vector[$indice]["valor"];
                $valor = self::eficaciaControlRSVA(strtoupper($valor));

                $riesgo_r = $valor / $media;
                $riesgo_r = round($riesgo_r);

                $valor_r = self::valRieResSa($riesgo_r);
                $color_r = self::colorRieResSa($valor_r);
                $riesgo = \App\RiesgosSaludDe60::modificar(Session::get('alias'), $IDHOGAR, $opcion, $riesgo_r, $id_inte);
                $respuesta = [
                    'riesgo_r' => $riesgo_r,
                    'valor_r' => $valor_r,
                    'color_r' => $color_r,
                ];
                // $valores_riesgo = \App\ValoresRiesgosAmbientales::modificar(Session::get('alias'), $IDHOGAR, "RD", $datosRA);
                return response()->json($respuesta, 200);

            }

        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function eficaciaControlRS($valor)
    {
        $eficacia = "";
        $valoracion = 0;
        if ($valor >= 0 && $valor < 1) {
            $eficacia = "INEXISTENTE";
        } else {
            if ($valor >= 1 && $valor < 4) {
                $eficacia = "BAJO";
            } else {
                if ($valor >= 4 && $valor <= 8) {
                    $eficacia = "MEDIO";
                } else {
                    $eficacia = "ALTO";
                }
            }
        }

        switch ($eficacia) {
            case "INEXISTENTE":
                $valoracion = 1;
                break;
            case "BAJO":
                $valoracion = 2;
                break;
            case "MEDIO":
                $valoracion = 3;
                break;
            case "ALTO":
                $valoracion = 4;
                break;
        }
        return $valoracion;
    }

    public function eficaciaControlRSVA($eficacia)
    {
        $valoracion = 0;
        switch ($eficacia) {
            case "INEXISTENTE":
                $valoracion = 1;
                break;
            case "BAJO":
                $valoracion = 2;
                break;
            case "MODERADO":
                $valoracion = 3;
                break;
            case "ALTO":
                $valoracion = 4;
                break;
        }
        return $valoracion;
    }

    public function valRieResSa($valor)
    {
        $eficacia = "";
        if ($valor == 1) {
            $eficacia = "Inexistente";
        } else {
            if ($valor == 2) {
                $eficacia = "Bajo";
            } else {
                if ($valor == 3) {
                    $eficacia = "Moderado";
                } else {
                    $eficacia = "Alto";
                }
            }
        }
        return $eficacia;
    }

    public function colorRieResSa($valor)
    {
        $color = "";
        if ($valor == "Bajo" || $valor == "Inexistente") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Moderado") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }

    public function riesgosSocioeconomicos($id_hogar)
    {
        $respuhogar = \App\Hogar::buscar(Session::get('alias'), $id_hogar);
        $respuvivi = \App\Vivienda::buscar(Session::get('alias'), $id_hogar);
        $respuestrati = \App\Estratificacion::buscar(Session::get('alias'), $id_hogar);

        // Via de acceso
        $via_de_acceso = 0;
        switch ($respuhogar->vias_acceso) {
            case "0":
                $via_de_acceso = 0;
                break;
            case "1":
                $via_de_acceso = 50;
                break;
            case "2":
                $via_de_acceso = 5;
                break;
            case "3":
                $via_de_acceso = 5;
                break;
        }
        // Via de acceso

        // Fachada de la casa
        $fachada_de_la_casa = 0;
        switch ($respuvivi->fachada) {
            case "NA":
                $fachada_de_la_casa = 0;
                break;
            case "1":
                $fachada_de_la_casa = 0;
                break;
            case "2":
                $fachada_de_la_casa = 10;
                break;
            case "3":
                $fachada_de_la_casa = 30;
                break;
            case "4":
                $fachada_de_la_casa = 60;
                break;
            case "5":
                $fachada_de_la_casa = 70;
                break;

        }
        // Fachada de la casa

        // Tipo de viviendas
        $tipo_vivienda = 0;
        switch ($respuvivi->tipo_vivienda) {
            case "1":
                $tipo_vivienda = 0;
                break;
            case "2":
                $tipo_vivienda = 58;
                break;
            case "3":
                $tipo_vivienda = 30;
                break;
            case "4":
                $tipo_vivienda = 25;
                break;
            case "5":
                $tipo_vivienda = 15;
                break;
            case "6":
                $tipo_vivienda = 5;
                break;
            case "7":
                $tipo_vivienda = 0;
                break;

        }
        // Tipo de viviendas

        // Material predominante de las paredes
        $material_predominante_paredes = 0;
        switch ($respuvivi->tipo_estructura) {
            case "1":
                $material_predominante_paredes = 0;
                break;
            case "2":
                $material_predominante_paredes = 40;
                break;
            case "3":
                $material_predominante_paredes = 30;
                break;
            case "4":
                $material_predominante_paredes = 5;
                break;
            case "5":
                $material_predominante_paredes = 0;
                break;
        }
        // Material predominante de las paredes

        // Tipo de cubierta
        $tipo_cubierta = 0;
        switch ($respuvivi->tipo_cubierta) {
            case "1":
                $tipo_cubierta = 0;
                break;
            case "2":
                $tipo_cubierta = 0;
                break;
            case "3":
                $tipo_cubierta = 10;
                break;
            case "4":
                $tipo_cubierta = 20;
                break;
            case "5":
                $tipo_cubierta = 30;
                break;
            case "6":
                $tipo_cubierta = 5;
                break;
            case "7":
                $tipo_cubierta = 55;
                break;
            case "8":
                $tipo_cubierta = 5;
                break;
            case "9":
                $tipo_cubierta = 0;
                break;                
        }
        // Tipo de cubierta

        // Material predominante del Piso
        $material_predominante_piso = 0;
        switch ($respuvivi->material_predominante) {
            case "NA":
                $material_predominante_piso = 0;
                break;            
            case "1":
                $material_predominante_piso = 55;
                break;
            case "2":
                $material_predominante_piso = 30;
                break;
            case "3":
                $material_predominante_piso = 10;
                break;
            case "4":
                $material_predominante_piso = 5;
                break;
            case "5":
                $material_predominante_piso = 0;
                break;
            case "6":
                $material_predominante_piso = 0;
                break;
            case "7":
                $material_predominante_piso = 0;
                break;               
        }        
        // Material predominante del Piso

        // Cuantos baños de uso exclusivo tiene ?
        $cuantos_baños = 0;
        switch ($respuvivi->cuantos_baños) {
            case "NA":
                $cuantos_baños = 0;
                break;            
            case "1":
                $cuantos_baños = 0;
                break;
            case "2":
                $cuantos_baños = 10;
                break;
            case "3":
                $cuantos_baños = 20;
                break;
            case "4":
                $cuantos_baños = 65;
                break;         
        }        
        // Cuantos baños de uso exclusivo tiene ?

        // Dispone de servicio sanitario para las  excretas
        $excretas = 0;
        switch ($respuvivi->excretas) {
            case "NA":
                $excretas = 0;
                break;            
            case "1":
                $excretas = 5;
                break;
            case "3":
                $excretas = 50;
                break;
            case "4":
                $excretas = 0;
                break;
            case "5":
                $excretas = 5;
                break;
            case "6":
                $excretas = 0;
                break;
            case "7":
                $excretas = 0;
                break;                                                        
        }
        // Dispone de servicio sanitario para las  excretas

        // Estado de conservacion de los baños
        $estado_conservacion_baños = 0;
        switch ($respuvivi->estado_conservacion_baños) {
            case "NA":
                $estado_conservacion_baños = 0;
                break;            
            case "1":
                $estado_conservacion_baños = 5;
                break;
            case "2":
                $estado_conservacion_baños = 10;
                break;                
            case "3":
                $estado_conservacion_baños = 30;
                break;
            case "4":
                $estado_conservacion_baños = 65;
                break;                                                      
        }        
        // Estado de conservacion de los baños

        // Acabados  externos de los muros o paredes
        $acabados_externos = 0;
        switch ($respuvivi->acabados_externos) {
            case "NA":
                $acabados_externos = 0;
                break;            
            case "1":
                $acabados_externos = 5;
                break;
            case "2":
                $acabados_externos = 10;
                break;                
            case "3":
                $acabados_externos = 30;
                break;
            case "4":
                $acabados_externos = 60;
                break;
            case "5":
                $acabados_externos = 75;
                break;                                                                      
        }        
        // Acabados  externos de los muros o paredes

        // Estado de Conservacion de las estructuras de la Vivienda
        $estado_conservacion_estructuras = 0;
        switch ($respuvivi->estado_conservacion_estructuras) {
            case "NA":
                $estado_conservacion_estructuras = 0;
                break;            
            case "1":
                $estado_conservacion_estructuras = 5;
                break;
            case "2":
                $estado_conservacion_estructuras = 10;
                break;                
            case "3":
                $estado_conservacion_estructuras = 30;
                break;
            case "4":
                $estado_conservacion_estructuras = 55;
                break;                                                                    
        }
        // Estado de Conservacion de las estructuras de la Vivienda

        // Mobiliario de la cocina
        $mobiliario_cocina = 0;
        switch ($respuvivi->mobiliario_cocina) {
            case "NA":
                $mobiliario_cocina = 0;
                break;            
            case "1":
                $mobiliario_cocina = 5;
                break;
            case "2":
                $mobiliario_cocina = 10;
                break;                
            case "3":
                $mobiliario_cocina = 30;
                break;
            case "4":
                $mobiliario_cocina = 70;
                break;                                                                    
        }
        // Mobiliario de la cocina

        // Acceso a Servicios publicos
        $energia_electrica = 0;
        if($energia_electrica == "SI") {
            $energia_electrica = 15;
        }

        $gas_natural = 0;
        if($gas_natural == "SI") {
            $gas_natural = 15;
        }
        
        $acueducto = 0;
        if($acueducto == "SI") {
            $acueducto = 15;
        }
        
        $alcantarillado = 0;
        if($alcantarillado == "SI") {
            $alcantarillado = 15;
        }
        
        $aseo = 0;
        if($aseo == "SI") {
            $aseo = 10;
        }
        
        $telefono_fijo = 0;
        if($telefono_fijo == "SI") {
            $telefono_fijo = 5;
        }
        
        $internet_subsidiado = 0;
        if($internet_subsidiado == "SI") {
            $internet_subsidiado = 0;
        }
        
        $internet_privado = 0;
        if($internet_privado == "SI") {
            $internet_privado = 20;
        }        
        // Acceso a Servicios publicos

        // Tenencia de la Vivienda
        $tenencia_vivienda = 0;
        switch ($respuhogar->tenencia_vivienda) {
            case "PROPIETARIO":
                $tenencia_vivienda = 35;
                break;            
            case "ARRENDADO":
                $tenencia_vivienda = 25;
                break;
            case "FAMILIAR":
                $tenencia_vivienda = 70;
                break;                
            case "CUIDADOR":
                $tenencia_vivienda = 5;
                break;                                                                                 
        }        
        // Tenencia de la Vivienda

        // ¿ Estado de los andenes  y bordillo de la vivienda?
        $andenes = 0;
        switch ($respuvivi->andenes) {
            case "NA":
                $andenes = 0;
                break;            
            case "1":
                $andenes = 5;
                break;
            case "2":
                $andenes = 42;
                break;                
            case "3":
                $andenes = 20;
                break;                                                                 
        }
        // ¿ Estado de los andenes  y bordillo de la vivienda?

        // Estratificación del la vivienda 
        $sumaEstratificacion = 0;

        $sumaEstratificacion = $via_de_acceso + $fachada_de_la_casa + $tipo_vivienda + $material_predominante_paredes + $tipo_cubierta;
        $sumaEstratificacion = $sumaEstratificacion + $material_predominante_piso + $cuantos_baños + $excretas + $estado_conservacion_baños;
        $sumaEstratificacion = $sumaEstratificacion + $acabados_externos + $estado_conservacion_estructuras + $mobiliario_cocina + $energia_electrica;
        $sumaEstratificacion = $sumaEstratificacion + $gas_natural + $acueducto + $alcantarillado + $aseo + $telefono_fijo ;
        $sumaEstratificacion = $sumaEstratificacion + $internet_subsidiado + $internet_privado + $tenencia_vivienda + $andenes;

        $datos = [
            'id_hogar' => $id_hogar,
            'via_de_acceso' => $via_de_acceso,
            'fachada_de_la_casa' => $fachada_de_la_casa,
            'tipo_vivienda' => $tipo_vivienda,
            'material_predominante_paredes' => $material_predominante_paredes,
            'tipo_cubierta' => $tipo_cubierta,
            'material_predominante_piso' => $material_predominante_piso,
            'cuantos_baños' => $cuantos_baños,
            'excretas' => $excretas,
            'estado_conservacion_baños' => $estado_conservacion_baños,
            'acabados_externos' => $acabados_externos,
            'estado_conservacion_estructuras' => $estado_conservacion_estructuras,
            'mobiliario_cocina' => $mobiliario_cocina,
            'energia_electrica' => $energia_electrica,
            'gas_natural' => $gas_natural,
            'acueducto' => $acueducto,
            'alcantarillado' => $alcantarillado,
            'aseo' => $aseo,
            'telefono_fijo' => $telefono_fijo,
            'internet_subsidiado' => $internet_subsidiado,
            'internet_privado' => $internet_privado,
            'tenencia_vivienda' => $tenencia_vivienda,
            'andenes' => $andenes,
            'total' => $sumaEstratificacion,
            'estado'=> 'Activo' 
        ];        
        $guardar = \App\RiesgoSocioeconomicoVivienda::guardar($datos, Session::get('alias'));
        // Estratificación del la vivienda

        // ESTRATIFICACION
        
        foreach ($respuestrati as $item) {
            $data = [];
            $cuenta_internet = 0;
            $tiene_pc_escritorio = 0;
            $tiene_pc_portatil = 0;
            $cuantos_celulares = 0;
            $tiene_equipo_sonido = 0;
            $cuantos_tv_color = 0;
            $cuantos_vehiculos = 0;
            $nivel_instruccion = 0;
            $afiliacion_salud_privada = 0;
            $ingresos_zona_rural = 0;
            $ingresos_ciudad = 0;            
            // Cuenta ese Hogar con Internet privado?
            if($item->cuenta_internet == "SI"){
                $cuenta_internet = 25;
            }
            // Cuenta ese Hogar con Internet privado?
            
            // Tiene computador de Escritorío ?            
            if($item->tiene_pc_escritorio == "SI"){
                $tiene_pc_escritorio = 10;
            }
            // Tiene computador de Escritorío ?

            // Tiene Computador Portatil ?
            if($item->tiene_pc_portatil == "SI"){
                $tiene_pc_portatil = 15;
            }
            // Tiene Computador Portatil ?

            // Cuantos celular en uso hay en el Hogar?
            switch ($item->cuantos_celulares) {
                case "1":
                    $cuantos_celulares = 10;
                    break;            
                case "2":
                    $cuantos_celulares = 10;
                    break;
                case "3":
                    $cuantos_celulares = 20;
                    break;                
                case "4":
                    $cuantos_celulares = 30;
                    break;
                case "5":
                    $cuantos_celulares = 50;
                    break;                                                                                    
            }            
            // Cuantos celular en uso hay en el Hogar?

            // Tiene Equipo de sonido
            if($item->tiene_equipo_sonido == "SI"){
                $tiene_equipo_sonido = 15;
            }
            // Tiene Equipo de sonido

            // Cuantos Tv  a Color 
            switch ($item->cuantos_tv_color) {
                case "1":
                    $cuantos_tv_color = 0;
                    break;            
                case "2":
                    $cuantos_tv_color = 15;
                    break;
                case "3":
                    $cuantos_tv_color = 20;
                    break;                
                case "4":
                    $cuantos_tv_color = 45;
                    break;                                                                                    
            }
            // Cuantos Tv  a Color 

            // Cuando Vehiculos de Uso exclusivo tiene el Hogar
            switch ($item->cuantos_vehiculos) {
                case "1":
                    $cuantos_vehiculos = 0;
                    break;            
                case "2":
                    $cuantos_vehiculos = 25;
                    break;
                case "3":
                    $cuantos_vehiculos = 35;
                    break;                
                case "4":
                    $cuantos_vehiculos = 70;
                    break;                                                                                    
            }
            // Cuando Vehiculos de Uso exclusivo tiene el Hogar

            // Cual es el nivel de Instrucción del jefe del Hogar?
            switch ($item->nivel_instruccion) {
                case "12":
                    $nivel_instruccion = 0;
                    break;            
                case "1":
                    $nivel_instruccion = 5;
                    break;
                case "2":
                    $nivel_instruccion = 10;
                    break;                
                case "4":
                    $nivel_instruccion = 10;
                    break;
                case "5":
                    $nivel_instruccion = 15;
                    break;
                case "6":
                    $nivel_instruccion = 20;
                    break;
                case "8":
                    $nivel_instruccion = 40;
                    break;
                case "11":
                    $nivel_instruccion = 60;
                    break;                                                         
                                                                                                                            
            }
            // Cual es el nivel de Instrucción del jefe del Hogar?

            // Alguien en el Hogar posee afiliación de salud Privada o contribituva, prepagada ?
            if($item->afiliacion_salud_privada == "SI"){
                $afiliacion_salud_privada = 20;
            }
            // Alguien en el Hogar posee afiliación de salud Privada o contribituva, prepagada ?

            // ¿ Ingresos  mensuales por Hogar zona rural? 
            switch ($item->ingresos_zona_rural) {
                case "1":
                    $ingresos_zona_rural = 0;
                    break;            
                case "2":
                    $ingresos_zona_rural = 10;
                    break;
                case "3":
                    $ingresos_zona_rural = 20;
                    break;                
                case "4":
                    $ingresos_zona_rural = 30;
                    break;
                case "5":
                    $ingresos_zona_rural = 50;
                    break;
                case "6":
                    $ingresos_zona_rural = 60;
                    break;
                case "7":
                    $ingresos_zona_rural = 90;
                    break;                                                                                                                            
            }
            // ¿ Ingresos  mensuales por Hogar zona rural? 

            // ¿ Ingresos  mensuales por Hogar en Ciudad? 
            switch ($item->ingresos_ciudad) {
                case "1":
                    $ingresos_ciudad = 10;
                    break;            
                case "2":
                    $ingresos_ciudad = 20;
                    break;
                case "3":
                    $ingresos_ciudad = 30;
                    break;                
                case "4":
                    $ingresos_ciudad = 40;
                    break;
                case "5":
                    $ingresos_ciudad = 50;
                    break;
                case "6":
                    $ingresos_ciudad = 60;
                    break;
                case "7":
                    $ingresos_ciudad = 90;
                    break;                                                                                                                            
            }
            // ¿ Ingresos  mensuales por Hogar en Ciudad? 

            $total = 0;
            $total = $cuenta_internet + $tiene_pc_escritorio + $tiene_pc_portatil + $cuantos_celulares;
            $total = $total + $tiene_equipo_sonido + $cuantos_tv_color + $cuantos_vehiculos;
            $total = $total + $nivel_instruccion + $afiliacion_salud_privada + $ingresos_zona_rural + $ingresos_ciudad;
            $data = [
                'cuenta_internet' => $cuenta_internet,
                'tiene_pc_escritorio' => $tiene_pc_escritorio,
                'tiene_pc_portatil' => $tiene_pc_portatil,
                'cuantos_celulares' => $cuantos_celulares,
                'tiene_equipo_sonido' => $tiene_equipo_sonido,
                'cuantos_tv_color' => $cuantos_tv_color,
                'cuantos_vehiculos' => $cuantos_vehiculos,
                'nivel_instruccion' => $nivel_instruccion,
                'afiliacion_salud_privada' => $afiliacion_salud_privada,
                'ingresos_zona_rural' => $ingresos_zona_rural,
                'ingresos_ciudad' => $ingresos_ciudad,
                'id_hogar' => $id_hogar,
                'id_jefe' => $item->id_jefe,
                'estado' => 'Activo',
                'total' => $total
            ];
            $guardar = \App\RiesgoSocioeconomicoHogar::guardar($data, Session::get('alias'));      
        }
        
        // ESTRATIFICACION
        
        return true;
    }
}
