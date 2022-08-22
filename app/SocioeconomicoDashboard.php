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
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->select("*")
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->select("*")
            ->get();

            $analfabetasMasculinos =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->select("*")
            ->get();

        }

        $info = [
            'jefesAnalfabetas' => $jefesAnalfabetas,
            'integrantesAnalfabetas' => $integrantesAnalfabetas,  
            'totalAnalfabetas' => (count($jefesAnalfabetas) + count($integrantesAnalfabetas)), 
            'totalPersonas' => ($jefes+$integrantes),
            'porcentajeAnalfabetas' => ($jefes+$integrantes) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas)),
        ];

        return $info;
    }
}
