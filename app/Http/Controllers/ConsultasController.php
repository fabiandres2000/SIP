<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class ConsultasController extends Controller
{
    public function viviendas(){
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

            $arrayEstado = [];
            $consestado = \App\EstadoCivil::buscar(Session::get('alias'));
            foreach ($consestado as $item) {
                $arrayEstado[] = [
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

            $arrayEscolaridad = [];
            $consescolaridad = \App\Escolaridad::buscar(Session::get('alias'));
            foreach ($consescolaridad as $item) {
                $arrayEscolaridad[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayVeredas' => $arrayVeredas,
                "arrayEstados" => $arrayEstado,
                "arrayAdmini" => $arrayAdmini,
                'arrayEscolaridad' => $arrayEscolaridad,
            ];
            return response()->json($respuesta, 200);
        }else{

        }
    }

    public function viviendaslistar(){
        if (Auth::check()) {
            $datos = request()->all();
            $viviendas = \App\Vivienda::listar(Session::get('alias'),$datos,"paginacion");

            foreach($viviendas as $viv){
                $viv->animales = \App\Animal::buscar(Session::get('alias'),$viv->id_hogar);
                $viv->actividad = \App\ActividadVivienda::buscar(Session::get('alias'),$viv->id_hogar);
                $viv->estratificacion =  \App\Estratificacion::buscar(Session::get('alias'),$viv->id_hogar);
                $viv->jefes = \App\Caracterizacion::buscarJefes(Session::get('alias'),$viv->id_hogar);
                $viv->integrantes = \App\Integrante::buscarIntegrantes(Session::get('alias'),$viv->id_hogar);
            }
            
            $respuesta = [
                'paginacion' => [
                    'total' => $viviendas->total(),
                    'pagina_actual' => $viviendas->currentPage(),
                    'por_pagina' => $viviendas->perPage(),
                    'ultima_pagina' => $viviendas->lastPage(),
                    'desde' => $viviendas->firstItem(),
                    'hasta' => $viviendas->lastItem(),
                ],
                'viviendas' => $viviendas,
                'data' => $datos
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function viviendaslistarpdf(){
        if (Auth::check()) {
            $datos = request()->all();
            //dd($datos);die;
            $viviendas = \App\Vivienda::listar(Session::get('alias'),$datos,"todos");
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('vista-pdf', ['viviendas' => $viviendas])
            ->setPaper('letter', 'portrait')
            ->save('archivo.pdf');

            return null;
        }
    }

    public function jefelistar(){
        if (Auth::check()) {
            $datos = request()->all();
            $jefes = \App\Caracterizacion::listarj(Session::get('alias'),$datos,"paginacion");

            foreach($jefes as $viv){
                    $viv->integrantes = \App\Integrante::buscarIntegrantes(Session::get('alias'),$viv->id_hogar);
            }

            foreach($jefes as $viv){
                $viv->jefes = \App\Caracterizacion::buscarJefes(Session::get('alias'),$viv->id_hogar);
            }

            $respuesta = [
                'paginacion' => [
                    'total' => $jefes->total(),
                    'pagina_actual' => $jefes->currentPage(),
                    'por_pagina' => $jefes->perPage(),
                    'ultima_pagina' => $jefes->lastPage(),
                    'desde' => $jefes->firstItem(),
                    'hasta' => $jefes->lastItem(),
                ],
                'jefes' => $jefes,
            ];
            return response()->json($respuesta, 200);

        }    
    }

    public function jefeslistarpdf(){
        if (Auth::check()) {
            $datos = request()->all();
            //dd($datos);die;
            $jefes = \App\Caracterizacion::listarj(Session::get('alias'),$datos,"todos");
            $nombre = 'informejefes'.time().'.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('vista-pdfjefe', ['jefes' => $jefes])
            ->setPaper('letter', 'portrait')
            ->save($nombre);
            $respuesta = [
                'nombre' => $nombre,
            ];
            return response()->json($respuesta, 200);
        }
    }
}
