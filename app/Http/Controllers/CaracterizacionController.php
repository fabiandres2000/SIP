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
                        $gua = \App\Log::guardar("Guardar la pestaña identificación con id_hogar  = " . $hogarrespuesta, Session::get('alias'));
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

                        $respuesta = [
                            'OPC' => 'SI',
                            'vivienda' => $vivienda,
                            'animales' => $animales,
                            'estratificacion' => $estratificacion,
                            'actividad_viviendas' => $actividad_viviendas,
                        ];

                        $gua = \App\Log::guardar("Guardar la pestaña viviendas con id_hogar  = " . $IDHOGAR, Session::get('alias'));
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
                    $respuesta = [
                        'OPC' => 'SI',
                        'De10A59' => $De10A59,
                        'Men1A' => $Men1A,
                        'De1A5' => $De1A5,
                        'De6A11' => $De6A11,
                        'ParPost' => $ParPost,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña cart.X.ciclo con id_hogar  = " . $IDHOGAR, Session::get('alias'));
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

                    //TABLA DE 12 A 17
                    $De12A17 = \App\De12a17::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 12 A 17

                    //TABLA DE 18 A 28
                    $De18A28 = \App\De18a28::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 18 A 28

                    //TABLA DE 29 A 59
                    $De29A59 = \App\De29a59::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 29 A 59

                    $respuesta = [
                        'OPC' => 'SI',
                        'De12A17' => $De12A17,
                        'De18A28' => $De18A28,
                        'De29A59' => $De29A59,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Adolescentes/Jovenes con id_hogar  = " . $IDHOGAR, Session::get('alias'));
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
                    //TABLA DE 60
                    $De60 = \App\De60::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 60

                    //TABLA ENCRO
                    $EnCro = \App\Encro::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA ENCRO

                    //TABLA ENINF
                    $EnInf = \App\Eninf::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA ENINF
                    $respuesta = [
                        'OPC' => 'SI',
                        'De60' => $De60,
                        'EnCro' => $EnCro,
                        'EnInf' => $EnInf,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Adulto mayor con id_hogar  = " . $IDHOGAR, Session::get('alias'));
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
                    $gua = \App\Log::guardar("Guardar la pestaña Migrante con id_hogar  = " . $IDHOGAR, Session::get('alias'));
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
                        $gua = \App\Log::guardar("Guardar la pestaña identificación con id_hogar  = " . $id_hogar, Session::get('alias'));
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
                    $resultado = self::calcular($IDHOGAR);
                    $riesgos_ambientales = \App\RiesgosAmbientales::buscar(Session::get('alias'), $IDHOGAR);
                    if ($riesgos_ambientales) {
                        $riesgos_ambientales->va_riesgos_derrumbes = self::valorizacion($riesgos_ambientales->riesgos_derrumbes);
                        $riesgos_ambientales->color_riesgos_derrumbes = self::color($riesgos_ambientales->va_riesgos_derrumbes);

                        $riesgos_ambientales->va_riesgos_inundacion = self::valorizacion($riesgos_ambientales->riesgos_inundacion);
                        $riesgos_ambientales->color_riesgos_inundacion = self::color($riesgos_ambientales->va_riesgos_inundacion);

                        $riesgos_ambientales->va_riesgos_insalubridad = self::valorizacion($riesgos_ambientales->riesgos_insalubridad);
                        $riesgos_ambientales->color_riesgos_insalubridad = self::color($riesgos_ambientales->va_riesgos_insalubridad);

                        $riesgos_ambientales->va_riesgos_atmosferico = self::valorizacion($riesgos_ambientales->riesgos_atmosferico);
                        $riesgos_ambientales->color_riesgos_atmosferico = self::color($riesgos_ambientales->va_riesgos_atmosferico);
                        
                        $riesgos_ambientales->va_riesgos_recurso_suelo = self::valorizacion($riesgos_ambientales->riesgos_recurso_suelo);
                        $riesgos_ambientales->color_riesgos_recurso_suelo = self::color($riesgos_ambientales->va_riesgos_recurso_suelo);

                        $riesgos_ambientales->va_riesgos_quema = self::valorizacion($riesgos_ambientales->riesgos_quema);
                        $riesgos_ambientales->color_riesgos_quema = self::color($riesgos_ambientales->va_riesgos_quema);

                        $riesgos_ambientales->va_riesgos_auditivo = self::valorizacion($riesgos_ambientales->riesgos_auditivo);
                        $riesgos_ambientales->color_riesgos_auditivo = self::color($riesgos_ambientales->va_riesgos_auditivo);

                        $riesgos_ambientales->va_riesgos_recurso_hidrico = self::valorizacion($riesgos_ambientales->riesgos_recurso_hidrico);
                        $riesgos_ambientales->color_riesgos_recurso_hidrico = self::color($riesgos_ambientales->va_riesgos_recurso_hidrico);

                        $riesgos_ambientales->va_riesgos_acceso_agua = self::valorizacion($riesgos_ambientales->riesgos_acceso_agua);
                        $riesgos_ambientales->color_riesgos_acceso_agua = self::color($riesgos_ambientales->va_riesgos_acceso_agua);                        
                    }
                    // dd($riesgos_ambientales)->die;
                    //CALCULAR RIESGOS//
                    $respuesta = [
                        'OPC' => 'SI',
                        'vivienda' => $vivienda,
                        'animales' => $animales,
                        'estratificacion' => $estratificacion,
                        'actividad_viviendas' => $actividad_viviendas,
                        'riesgos_ambientales' => $riesgos_ambientales,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña viviendas con id_hogar  = " . $IDHOGAR, Session::get('alias'));

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
                    $respuesta = [
                        'OPC' => 'SI',
                        'De10A59' => $De10A59,
                        'Men1A' => $Men1A,
                        'De1A5' => $De1A5,
                        'De6A11' => $De6A11,
                        'ParPost' => $ParPost,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña cart.X.ciclo con id_hogar  = " . $IDHOGAR, Session::get('alias'));
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
                    //TABLA DE 12 A 17
                    $De12A17 = \App\De12a17::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 12 A 17

                    //TABLA DE 18 A 28
                    $De18A28 = \App\De18a28::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 18 A 28

                    //TABLA DE 29 A 59
                    $De29A59 = \App\De29a59::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 29 A 59
                    $respuesta = [
                        'OPC' => 'SI',
                        'De12A17' => $De12A17,
                        'De18A28' => $De18A28,
                        'De29A59' => $De29A59,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Adolescentes/Jovenes con id_hogar  = " . $IDHOGAR, Session::get('alias'));
                    return response()->json($respuesta, 200);
                }
                if (request()->get("opc") == "GUADULT") {
                    $dataDe60 = request()->get("De60");
                    $dataEnCro = request()->get("EnCro");
                    $dataEnInf = request()->get("EnInf");
                    $IDHOGAR = request()->get("IDHOGAR");

                    // dd($dataDe60);die;
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
                    //TABLA DE 60
                    $De60 = \App\De60::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA DE 60

                    //TABLA ENCRO
                    $EnCro = \App\Encro::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA ENCRO

                    //TABLA ENINF
                    $EnInf = \App\Eninf::buscar(Session::get('alias'), $IDHOGAR);
                    //TABLA ENINF
                    $respuesta = [
                        'OPC' => 'SI',
                        'De60' => $De60,
                        'EnCro' => $EnCro,
                        'EnInf' => $EnInf,
                    ];
                    $gua = \App\Log::guardar("Guardar la pestaña Adulto mayor con id_hogar  = " . $IDHOGAR, Session::get('alias'));
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
                    $gua = \App\Log::guardar("Guardar la pestaña Migrante con id_hogar  = " . $IDHOGAR, Session::get('alias'));

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

        if ($respuvivi->fuente_agua == "2") {
            $rP1 = 1;
            $impacto = 3;
        } else {
            if ($respuvivi->fuente_agua == "6") {
                $rP1 = 0.6;
                $impacto = 2;
            } else {
                $rP1 = 0;
                $impacto = 1;
            }
        }

        if ($rP1 < 0.8) {
            $rP1 = 1;
        } else {
            if ($rP1 >= 0.8 && $rP1 < 1) {
                $rP1 = 2;
            } else {
                $rP1 = 3;
            }
        }
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

        // dd($rTAas)->die;
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

                $gua = \App\Log::guardar("Eliminar la caracterizacion con id_hogar  = " . $id_hogar, Session::get('alias'));
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

    public function valorizacion($valor)
    {
        $valorizacion = "";
        if ($valor < 3) {
            $valorizacion = "Bajo";
        } else if ($valor >= 3 && $valor < 7) {
            $valorizacion = "Medio";
        } else {
            $valorizacion = "Alto";
        }
        return $valorizacion;
    }

    public function color($valor){
        $color = "";
        if($valor=="Bajo"){
            $color = "kt-badge--success";
        }else{
            if($valor=="Medio"){
                $color = "kt-badge--warning";
            }else{
                $color = "kt-badge--danger";
            }
        }
        return $color;       
    }
}
