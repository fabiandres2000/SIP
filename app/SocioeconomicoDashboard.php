<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class SocioeconomicoDashboard extends Model
{
    public static function tasaAnalfabetismo($alias, $tipo, $id)
    {
        $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select("*")
        ->count();

        $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->select("*")
        ->count();

        if($tipo == "todos"){
            $jefesAnalfabetas =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','JEFE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->select("integrantes.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','INTE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->get();
        }else{
            $jefesAnalfabetas =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->where('hogar.id_'.$tipo, $id)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','JEFE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->where('hogar.id_'.$tipo, $id)
            ->select("integrantes.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','INTE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->get();
        }

        $masculinosAnalfabetas = array();
        $femeninosAnalfabetas = array();
        foreach ($jefesAnalfabetas as &$item) {
            if($item->sexo == "MASCULINO"){
                array_push($masculinosAnalfabetas, $item);
            }else{
                array_push($femeninosAnalfabetas, $item);
            } 
        }

        foreach ($integrantesAnalfabetas as &$item) {
            if($item->sexo == "MASCULINO"){
                array_push($masculinosAnalfabetas, $item);
            }else{
                array_push($femeninosAnalfabetas, $item);
            } 
        }

        $analfabetas12_17 = [0,0];
        $analfabetas18_28 = [0,0];
        $analfabetas29_59 = [0,0];
        $analfabetas60 = [0,0];

        foreach ($masculinosAnalfabetas as &$item) {
            if ($item->edad >=15 && $item->edad <=17) {
                $analfabetas12_17[0] = $analfabetas12_17[0] + 1;
            }

            if ($item->edad >=18 && $item->edad <=28) {
                $analfabetas18_28[0] = $analfabetas18_28[0] + 1;
            }

            if ($item->edad >=29 && $item->edad <=59) {
                $analfabetas29_59[0] = $analfabetas29_59[0] + 1;
            }

            if ($item->edad >=60) {
                $analfabetas60[0] = $analfabetas60[0] + 1;
            }
        }

        foreach ($femeninosAnalfabetas as &$item) {
            if ($item->edad >=15 && $item->edad <=17) {
                $analfabetas12_17[1] = $analfabetas12_17[1] + 1;
            }

            if ($item->edad >=18 && $item->edad <=28) {
                $analfabetas18_28[1] = $analfabetas18_28[1] + 1;
            }

            if ($item->edad >=29 && $item->edad <=59) {
                $analfabetas29_59[1] = $analfabetas29_59[1] + 1;
            }

            if ($item->edad >=60) {
                $analfabetas60[1] = $analfabetas60[1] + 1;
            }
        }

        if(count($jefesAnalfabetas) + count($integrantesAnalfabetas) > 0){
            $porcentajeAnalfabetasM = (count($masculinosAnalfabetas) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas))) * 100;
            $porcentajeAnalfabetasF = (count($femeninosAnalfabetas) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas))) * 100;
        }else{
            $porcentajeAnalfabetasM = 0;
            $porcentajeAnalfabetasF = 0;
        }

        $info = [
            'jefesAnalfabetas' => $jefesAnalfabetas,
            'integrantesAnalfabetas' => $integrantesAnalfabetas,  
            'totalAnalfabetas' => (count($jefesAnalfabetas) + count($integrantesAnalfabetas)), 
            'totalPersonas' => ($jefes+$integrantes),
            'porcentajeAnalfabetas' => ((count($jefesAnalfabetas) + count($integrantesAnalfabetas)) / ($jefes+$integrantes)) * 100,
            'masculinosAnalfabetas' => $masculinosAnalfabetas,
            'femeninosAnalfabetas' => $femeninosAnalfabetas,
            'totalFemeninosAnalfabetas' => count($femeninosAnalfabetas),
            'totalMasculinosAnalfabetas' => count($masculinosAnalfabetas),
            'porcentajeAnalfabetasM' => $porcentajeAnalfabetasM,
            'porcentajeAnalfabetasF' => $porcentajeAnalfabetasF,
            'analfabetas12_17' => $analfabetas12_17,
            'analfabetas18_28' => $analfabetas18_28,
            'analfabetas29_59' => $analfabetas29_59,
            'analfabetas60' => $analfabetas60
        ];

        return $info;
    }

    public static function tasaAnalfabetismoNinios($alias, $tipo, $id)
    {
        $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select("*")
        ->count();

        $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->select("*")
        ->count();

        if($tipo == "todos"){
            $jefesAnalfabetas =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','JEFE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) <= 15')
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->select("integrantes.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','INTE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) <= 15')
            ->get();
        }else{
            $jefesAnalfabetas =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->where('hogar.id_'.$tipo, $id)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','JEFE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) <= 15')
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->where('hogar.id_'.$tipo, $id)
            ->select("integrantes.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','INTE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) <= 15')
            ->get();
        }

        $masculinosAnalfabetas = array();
        $femeninosAnalfabetas = array();
        foreach ($jefesAnalfabetas as &$item) {
            if($item->sexo == "MASCULINO"){
                array_push($masculinosAnalfabetas, $item);
            }else{
                array_push($femeninosAnalfabetas, $item);
            } 
        }

        foreach ($integrantesAnalfabetas as &$item) {
            if($item->sexo == "MASCULINO"){
                array_push($masculinosAnalfabetas, $item);
            }else{
                array_push($femeninosAnalfabetas, $item);
            } 
        }

        $analfabetas1_5 = [0,0];
        $analfabetas6_11 = [0,0];
        $analfabetas12_15 = [0,0];

        foreach ($masculinosAnalfabetas as &$item) {
            if ($item->edad >=1 && $item->edad <=5) {
                $analfabetas1_5[0] = $analfabetas1_5[0] + 1;
            }

            if ($item->edad >=6 && $item->edad <=11) {
                $analfabetas6_11[0] = $analfabetas6_11[0] + 1;
            }

            if ($item->edad >=12 && $item->edad <=15) {
                $analfabetas12_15[0] = $analfabetas12_15[0] + 1;
            }
        }

        foreach ($femeninosAnalfabetas as &$item) {
            if ($item->edad >=1 && $item->edad <=5) {
                $analfabetas1_5[1] = $analfabetas1_5[1] + 1;
            }

            if ($item->edad >=6 && $item->edad <=11) {
                $analfabetas6_11[1] = $analfabetas6_11[1] + 1;
            }

            if ($item->edad >=12 && $item->edad <=15) {
                $analfabetas12_15[1] = $analfabetas12_15[1] + 1;
            }
        }

        if(count($jefesAnalfabetas) + count($integrantesAnalfabetas) > 0){
            $porcentajeAnalfabetasM = (count($masculinosAnalfabetas) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas))) * 100;
            $porcentajeAnalfabetasF = (count($femeninosAnalfabetas) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas))) * 100;
        }else{
            $porcentajeAnalfabetasM = 0;
            $porcentajeAnalfabetasF = 0;
        }

        $info = [
            'jefesAnalfabetas' => $jefesAnalfabetas,
            'integrantesAnalfabetas' => $integrantesAnalfabetas,  
            'totalAnalfabetas' => (count($jefesAnalfabetas) + count($integrantesAnalfabetas)), 
            'totalPersonas' => ($jefes+$integrantes),
            'porcentajeAnalfabetas' => ((count($jefesAnalfabetas) + count($integrantesAnalfabetas)) / ($jefes+$integrantes)) * 100,
            'masculinosAnalfabetas' => $masculinosAnalfabetas,
            'femeninosAnalfabetas' => $femeninosAnalfabetas,
            'totalFemeninosAnalfabetas' => count($femeninosAnalfabetas),
            'totalMasculinosAnalfabetas' => count($masculinosAnalfabetas),
            'porcentajeAnalfabetasM' => $porcentajeAnalfabetasM,
            'porcentajeAnalfabetasF' => $porcentajeAnalfabetasF,
            'analfabetas1_5' => $analfabetas1_5,
            'analfabetas6_11' => $analfabetas6_11,
            'analfabetas12_15' => $analfabetas12_15
        ];

        return $info;
    }

    public static function tasaDesempleo($alias, $tipo, $id){
        if($tipo == "todos"){

            // personas en busca de empleo
            $jefesD =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.ocupacion', 9990)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng", "hogar.id_zona")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->get();

            $integrantesD =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.ocupacion', 9990)
            ->select("integrantes.*", "hogar.lat", "hogar.lng", "hogar.id_zona")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->get();
            // personas en busca de empleo
            
            $personasBuscaEmpleo  = array();

            foreach ($jefesD as &$item) {
                array_push($personasBuscaEmpleo, $item);
            }

            foreach ($integrantesD as &$item) {
               array_push($personasBuscaEmpleo, $item);
            }

            //  población económicamente activa
            $IFT =  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.estado', 'Activo')
            ->where(function ($query) {
                $query->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
                    ->orWhere('integrantes.ocupacion', 9990);
            })
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->count();
            
            $JFT =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->where('caracterizacion.estado', 'Activo')
            ->where(function ($query) {
                $query->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
                    ->orWhere('caracterizacion.ocupacion', 9990);
            })
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->count();

            $FT = $IFT + $JFT;
            $TD = (count($personasBuscaEmpleo) / $FT) * 100;
            //  población económicamente activa

            // por edad y sexo
            $femeninoTD = 0;
            $masculinoTD = 0;
            foreach ($personasBuscaEmpleo as &$item) {
                if($item->sexo == "MASCULINO"){
                    $masculinoTD += 1;
                }else{
                    $femeninoTD += 1;
                }
            }

            $d15_17 = 0;
            $d18_28 = 0;
            $d29_59 = 0;
            $d60 = 0;

            foreach ($personasBuscaEmpleo as &$item) {
                if ($item->edad >=15 && $item->edad <=17) {
                    $d15_17 = $d15_17 + 1;
                }

                if ($item->edad >=18 && $item->edad <=28) {
                    $d18_28 = $d18_28 + 1;
                }

                if ($item->edad >=29 && $item->edad <=59) {
                    $d29_59 = $d29_59 + 1;
                }

                if ($item->edad >=60) {
                    $d60 = $d60 + 1;
                }
            }

            $porEdad = [
                'd15_17' => $d15_17,
                'd18_28' => $d18_28,
                'd29_59' => $d29_59,
                'd60' => $d60,
            ];
            // por edad y sexo

            // por corregimiento
            $porCorregimeintoD =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.ocupacion', 9990)
            ->select("hogar.id_corre")
            ->selectRaw("COUNT(integrantes.id) as numero_personas")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->groupBy("hogar.id_corre")
            ->orderBy("numero_personas","DESC")
            ->get();

            $porCorregimeintoD2 =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.ocupacion', 9990)
            ->select("hogar.id_corre")
            ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->groupBy("hogar.id_corre")
            ->orderBy("numero_personas","DESC")
            ->get();

            $porCorregimeinto = array();
            foreach ($porCorregimeintoD as &$item) {
                $encontrado = false;
                foreach ($porCorregimeintoD2 as &$item2) {
                    if($item->id_corre == $item2->id_corre){
                        $item2->numero_personas += $item->numero_personas;
                        $encontrado = true;
                        $itemEncontrado = $item2;
                    }
                }

                if(!$encontrado){
                    array_push($porCorregimeinto, $item);
                }else{
                    array_push($porCorregimeinto, $itemEncontrado);
                }
            }

            foreach ($porCorregimeinto as &$item) {
                $personasTrabajarCorregimiento = DB::connection('mysql')->table($alias.'.caracterizacion')
                ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
                ->where('hogar.id_corre', $item->id_corre)
                ->where('caracterizacion.estado', 'Activo')
                ->where(function ($query) {
                    $query->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
                        ->orWhere('caracterizacion.ocupacion', 9990);
                })
                ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
                ->count();
    
                $personasTrabajarCorregimiento += DB::connection('mysql')->table($alias.'.integrantes')
                ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
                ->where('hogar.id_corre', $item->id_corre)
                ->where('integrantes.estado', 'Activo')
                ->where(function ($query) {
                    $query->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
                        ->orWhere('integrantes.ocupacion', 9990);
                })
                ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
                ->count();
    
                $item->personas_edad_trabajo = $personasTrabajarCorregimiento;
    
                $item->tasa_odesempleo = ($item->numero_personas / $item->personas_edad_trabajo ) * 100;
            }
            // por corregimiento

            $porcenfemeninoTD = 0;
            $porcenmasculinoTD = 0;
            if(count($personasBuscaEmpleo) > 0){
                $porcenfemeninoTD = ($femeninoTD/count($personasBuscaEmpleo))*100;
                $porcenmasculinoTD = ($masculinoTD/count($personasBuscaEmpleo))*100;
            }

            $info = [
                'TD' => $TD, 
                'D' => count($personasBuscaEmpleo),
                'FT' => $FT,
                'listaD' => $personasBuscaEmpleo,
                'femeninoTD' => $femeninoTD,
                'masculinoTD' => $masculinoTD,
                'porcenfemeninoTD' => $porcenfemeninoTD,
                'porcenmasculinoTD' => $porcenmasculinoTD,
                'porCorregimeinto' => $porCorregimeinto,
                'porEdad' => $porEdad
            ];
    
            return $info;
        }else{
            // personas en busca de empleo
            $jefesD =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.ocupacion', 9990)
            ->where('hogar.id_'.$tipo, $id)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng", "hogar.id_zona")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->get();

            $integrantesD =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.ocupacion', 9990)
            ->where('hogar.id_'.$tipo, $id)
            ->select("integrantes.*", "hogar.lat", "hogar.lng", "hogar.id_zona")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->get();
            // personas en busca de empleo
            
            $personasBuscaEmpleo  = array();

            foreach ($jefesD as &$item) {
                array_push($personasBuscaEmpleo, $item);
            }

            foreach ($integrantesD as &$item) {
            array_push($personasBuscaEmpleo, $item);
            }

            //  población económicamente activa
            $IFT =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->where('integrantes.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->count();
            
            $JFT =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where('caracterizacion.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->count();

            $FT = $IFT + $JFT;

            if($FT > 0){
                $TD = (count($personasBuscaEmpleo) / $FT) * 100;
            }else{
                $TD = 0;
            }
            
            //  población económicamente activa

            // por edad y sexo
            $femeninoTD = 0;
            $masculinoTD = 0;
            foreach ($personasBuscaEmpleo as &$item) {
                if($item->sexo == "MASCULINO"){
                    $masculinoTD += 1;
                }else{
                    $femeninoTD += 1;
                }
            }

            $d15_17 = 0;
            $d18_28 = 0;
            $d29_59 = 0;
            $d60 = 0;

            foreach ($personasBuscaEmpleo as &$item) {
                if ($item->edad >=15 && $item->edad <=17) {
                    $d15_17 = $d15_17 + 1;
                }

                if ($item->edad >=18 && $item->edad <=28) {
                    $d18_28 = $d18_28 + 1;
                }

                if ($item->edad >=29 && $item->edad <=59) {
                    $d29_59 = $d29_59 + 1;
                }

                if ($item->edad >=60) {
                    $d60 = $d60 + 1;
                }
            }

            $porEdad = [
                'd15_17' => $d15_17,
                'd18_28' => $d18_28,
                'd29_59' => $d29_59,
                'd60' => $d60,
            ];
            // por edad y sexo

            $porcenfemeninoTD = 0;
            $porcenmasculinoTD = 0;
            if(count($personasBuscaEmpleo) > 0){
                $porcenfemeninoTD = ($femeninoTD/count($personasBuscaEmpleo))*100;
                $porcenmasculinoTD = ($masculinoTD/count($personasBuscaEmpleo))*100;
            }

            $info = [
                'TD' => $TD, 
                'D' => count($personasBuscaEmpleo),
                'FT' => $FT,
                'listaD' => $personasBuscaEmpleo,
                'femeninoTD' => $femeninoTD,
                'masculinoTD' => $masculinoTD,
                'porcenfemeninoTD' => $porcenfemeninoTD,
                'porcenmasculinoTD' => $porcenmasculinoTD,
                'porEdad' => $porEdad
            ];

            return $info;
        }
    }

    public static function tasaOcupacion($alias){
        // integrantes ocupados  por corregimiento
        $porCorregimeintoTOI =  DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('integrantes.estado', 'Activo')
        ->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
        ->select("hogar.id_corre")
        ->selectRaw("COUNT(integrantes.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->orderBy("numero_personas","DESC")
        ->get();
        // integrantes ocupados  por corregimiento
        // jefes de hogar ocupados  por corregimiento
        $porCorregimeintoTOJH =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('caracterizacion.estado', 'Activo')
        ->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
        ->select("hogar.id_corre")
        ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->orderBy("numero_personas","DESC")
        ->get();
        // jefes de hogar ocupados  por corregimiento

        // personas en edad de trabajar
        $jefesEdadTrabajar  =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
        ->where('caracterizacion.estado', 'Activo')
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->count();

        $integrantesEdadTrabajar  =  DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
        ->where('integrantes.estado', 'Activo')
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->count();
        // personas en edad de trabajar

        $personasEdadTrabajar = $jefesEdadTrabajar  +  $integrantesEdadTrabajar;

        
        $porCorregimeinto = array();
        foreach ($porCorregimeintoTOI as &$item) {
            $encontrado = false;
            foreach ($porCorregimeintoTOJH as &$item2) {
                if($item->id_corre == $item2->id_corre){
                    $item2->numero_personas += $item->numero_personas;
                    $encontrado = true;
                    $itemEncontrado = $item2;
                }
            }

            if(!$encontrado){
                array_push($porCorregimeinto, $item);
            }else{
                array_push($porCorregimeinto, $itemEncontrado);
            }
        }

        foreach ($porCorregimeinto as &$item) {
            $personasTrabajarCorregimiento = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where('hogar.id_corre', $item->id_corre)
            ->where('caracterizacion.estado', 'Activo')
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->count();

            $personasTrabajarCorregimiento += DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->where('hogar.id_corre', $item->id_corre)
            ->where('integrantes.estado', 'Activo')
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->count();

            $item->personas_edad_trabajo = $personasTrabajarCorregimiento;

            $item->tasa_ocupacion = ($item->numero_personas / $item->personas_edad_trabajo ) * 100;
        }


        //personas ocupadas general
        $personasOcupadas = 0;
        foreach ($porCorregimeinto as &$item) {
            $personasOcupadas += $item->numero_personas;   
        }
        //personas ocupadas general

        // personas con empleo formal
        $personasEmpleoFormal =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->where('caracterizacion.tipo_empleo', '2')
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->count();

        $personasEmpleoFormal +=  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->where('integrantes.tipo_empleo', '2')
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->count();
        // personas con empleo formal

        // personas con empleo informal
        $personasEmpleoInformal =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->where('caracterizacion.tipo_empleo', '3')
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->count();

        $personasEmpleoInformal +=  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->where('integrantes.tipo_empleo', '3')
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->count();
        // personas con empleo informal

        // personas con empleo independiente
        $personasEmpleoIndependiente =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->where('caracterizacion.tipo_empleo', '4')
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->count();

        $personasEmpleoIndependiente +=  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->where('integrantes.tipo_empleo', '4')
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->count();
        // personas con empleo independiente

         // personas con empleo independiente
         $personasNA =  DB::connection('mysql')->table($alias.'.caracterizacion')
         ->where('caracterizacion.estado', 'Activo')
         ->where('caracterizacion.tipo_empleo', 'NA')
         ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
         ->count();
 
         $personasNA +=  DB::connection('mysql')->table($alias.'.integrantes')
         ->where('integrantes.estado', 'Activo')
         ->where('integrantes.tipo_empleo', 'NA')
         ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
         ->count();
         // personas con empleo independiente

          // personas con empleo independiente
          $personasSinEmpleo =  DB::connection('mysql')->table($alias.'.caracterizacion')
          ->where('caracterizacion.estado', 'Activo')
          ->where('caracterizacion.tipo_empleo', '1')
          ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
          ->count();
  
          $personasSinEmpleo +=  DB::connection('mysql')->table($alias.'.integrantes')
          ->where('integrantes.estado', 'Activo')
          ->where('integrantes.tipo_empleo', '1')
          ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
          ->count();
          // personas con empleo independiente

        $info = [
            'personasOcupadas' => $personasOcupadas, 
            'porCorregimeinto' => $porCorregimeinto, 
            'personasEdadTrabajar' => $personasEdadTrabajar, 
            'tasaOcupacion' => ($personasOcupadas / $personasEdadTrabajar) * 100,
            'personasEmpleoFormal' => $personasEmpleoFormal,
            'porEmpleoFormal' => ($personasEmpleoFormal / $personasEdadTrabajar) * 100,
            'personasEmpleoInformal' => $personasEmpleoInformal,
            'porEmpleoInformal' => ($personasEmpleoInformal / $personasEdadTrabajar) * 100,
            'personasEmpleoIndependiente' => $personasEmpleoIndependiente,
            'porEmpleoIndependiente' => ($personasEmpleoIndependiente / $personasEdadTrabajar) * 100,
            'personasNA' => $personasNA,
            'personasSinEmpleo' => $personasSinEmpleo,
        ];

        return $info;
    }

    public static function poblacionEconomicamenteActiva($alias){
        $PEAJH = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('caracterizacion.estado', 'Activo')
        ->where(function ($query) {
            $query->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
                ->orWhere('caracterizacion.ocupacion', 9990);
        })
        ->select('hogar.id_corre')
        ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->get();

        $PEAI = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('integrantes.estado', 'Activo')
        ->where(function ($query) {
            $query->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
                ->orWhere('integrantes.ocupacion', 9990);
        })
        ->select('hogar.id_corre')
        ->selectRaw("COUNT(integrantes.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->get();

        $porCorregimeinto = array();
        foreach ($PEAI as &$item) {
            $encontrado = false;
            foreach ($PEAJH as &$item2) {
                if($item->id_corre == $item2->id_corre){
                    $item2->numero_personas += $item->numero_personas;
                    $encontrado = true;
                    $itemEncontrado = $item2;
                }
            }

            if(!$encontrado){
                array_push($porCorregimeinto, $item);
            }else{
                array_push($porCorregimeinto, $itemEncontrado);
            }
        }

        $PAE = 0;
        foreach ($porCorregimeinto as &$item) {
            $PAE += $item->numero_personas;
        }

        $info = [
            'porCorregimeinto' => $porCorregimeinto,
            'PAE' => $PAE,
        ];

        return $info;
    }

    public static function personasEdadTrabajar($alias){

        $poblacion = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select('caracterizacion.*')
        ->count();

        $poblacion += DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->select('integrantes.*')
        ->count();


        $PETJH = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('caracterizacion.estado', 'Activo')
        ->select('hogar.id_corre')
        ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->get();

        $PETI = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('integrantes.estado', 'Activo')
        ->select('hogar.id_corre')
        ->selectRaw("COUNT(integrantes.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->get();

        $porCorregimeinto = array();
        foreach ($PETI as &$item) {
            $encontrado = false;
            foreach ($PETJH as &$item2) {
                if($item->id_corre == $item2->id_corre){
                    $item2->numero_personas += $item->numero_personas;
                    $encontrado = true;
                    $itemEncontrado = $item2;
                }
            }

            if(!$encontrado){
                array_push($porCorregimeinto, $item);
            }else{
                array_push($porCorregimeinto, $itemEncontrado);
            }
        }

        $PET = 0;
        foreach ($porCorregimeinto as &$item) {
            $PET += $item->numero_personas;
        }

        $info = [
            'porCorregimeinto' => $porCorregimeinto,
            'PET' => $PET,
            'porcenPET' => ($PET / $poblacion) * 100,
            'poblacion' => $poblacion,
        ];

        return $info;
    }
}
