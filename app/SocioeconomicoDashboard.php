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

}
