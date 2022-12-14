<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    public static function gestantes($rango, $tipo, $alias)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'caracterizacion.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'caracterizacion.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'caracterizacion.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'caracterizacion.nivel_escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'caracterizacion.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'caracterizacion.clasificacion')

            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.sexo', 'FEMENINO')
            ->where('caracterizacion.embarazo', 'SI')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "caracterizacion.embarazo_multiple"
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion");

        if ($rango == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0");
        } else if ($rango == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5");
        } else if ($rango == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11");
        } else if ($rango == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17");
        } else if ($rango == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28");
        } else if ($rango == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59");
        } else if ($rango == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120");
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'integrantes.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'integrantes.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'integrantes.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'integrantes.escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'integrantes.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'integrantes.clasificacion')

            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.sexo', 'FEMENINO')
            ->where('integrantes.embarazo', 'SI')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "integrantes.embarazo_multiple"
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion");

        if ($rango == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0");
        } else if ($rango == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5");
        } else if ($rango == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11");
        } else if ($rango == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17");
        } else if ($rango == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28");
        } else if ($rango == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59");
        } else if ($rango == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120");
        }

        $consulta->union($consultai);

        if ($tipo == "Todos") {
            return $consulta->get();
        } else {
            return $consulta->paginate(10);
        }
    }

    public static function poblacionTotalMujeres($alias)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')

            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.sexo', 'FEMENINO')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "caracterizacion.sexo AS genero",
                "ocupaciones.descripcion as ocupacion"
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad");

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.sexo', 'FEMENINO')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "integrantes.sexo AS genero",
                "ocupaciones.descripcion as ocupacion"
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad");

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function nutricional($rango, $tipo, $alias)
    {

        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'caracterizacion.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'caracterizacion.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'caracterizacion.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'caracterizacion.nivel_escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'caracterizacion.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'caracterizacion.clasificacion')

            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "caracterizacion.sexo",
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("CONCAT_WS('','jefe') as tipo")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion");

        if ($rango == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0");
        } else if ($rango == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5");
        } else if ($rango == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11");
        } else if ($rango == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17");
        } else if ($rango == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28");
        } else if ($rango == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59");
        } else if ($rango == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120");
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'integrantes.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'integrantes.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'integrantes.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'integrantes.escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'integrantes.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'integrantes.clasificacion')

            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "integrantes.sexo",
            )         
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("CONCAT_WS('','inte') as tipo")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion");

        if ($rango == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0");
        } else if ($rango == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5");
        } else if ($rango == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11");
        } else if ($rango == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17");
        } else if ($rango == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28");
        } else if ($rango == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59");
        } else if ($rango == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120");
        }

        $consulta->union($consultai);
        // dd($consulta->get());die;
        if ($tipo == "Todos") {
            $c =  $consulta->get();
        } else {
            $c =  $consulta->paginate(10);
        }

        //enfermedades infecciosas
        foreach ($c as &$item) {
            if($item->tipo == "inte"){
                $item->enfer_infec =  DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->join($alias . '.enfermedadesinf', 'enfermedadesinf.id', 'enfermedades_integrantes.id_enfermedad')
                ->where('enfermedades_integrantes.id_inte', $item->id)
                ->where('enfermedades_integrantes.tipo', 'Infecciosa')
                ->select(
                    "enfermedades_integrantes.tiempo AS tiempo",
                    "enfermedades_integrantes.tratamiento AS atendido",
                    "enfermedadesinf.descripcion AS enfermedad",
                )->get();
            }else{
                $item->enfer_infec =  DB::connection('mysql')->table($alias . '.enfermedades_jefes')
                ->join($alias . '.enfermedadesinf', 'enfermedadesinf.id', 'enfermedades_jefes.id_enfermedad')
                ->where('enfermedades_jefes.id_jefe', $item->id)
                ->where('enfermedades_jefes.tipo', 'Infecciosa')
                ->select(
                    "enfermedades_jefes.tiempo AS tiempo",
                    "enfermedades_jefes.tratamiento AS atendido",
                    "enfermedadesinf.descripcion AS enfermedad",
                )->get();
            }
        }

        //enfermedades cronicas
        foreach ($c as &$item) {
            if($item->tipo == "inte"){
                $item->enfer_cro =  DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->join($alias . '.enfermedadescro', 'enfermedadescro.id', 'enfermedades_integrantes.id_enfermedad')
                ->where('enfermedades_integrantes.id_inte', $item->id)
                ->where('enfermedades_integrantes.tipo', 'Cronica')
                ->select(
                    "enfermedades_integrantes.tiempo AS tiempo",
                    "enfermedades_integrantes.tratamiento AS atendido",
                    "enfermedadescro.descripcion AS enfermedad",
                )->get();
            }else{
                $item->enfer_cro =  DB::connection('mysql')->table($alias . '.enfermedades_jefes')
                ->join($alias . '.enfermedadescro', 'enfermedadescro.id', 'enfermedades_jefes.id_enfermedad')
                ->where('enfermedades_jefes.id_jefe', $item->id)
                ->where('enfermedades_jefes.tipo', 'Cronica')
                ->select(
                    "enfermedades_jefes.tiempo AS tiempo",
                    "enfermedades_jefes.tratamiento AS atendido",
                    "enfermedadescro.descripcion AS enfermedad",
                )->get();
            }
        }
        
        return $c;
    }

    public static function listarcronicas($alias, $data, $tipo)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftJoin($alias . ".enfermedades_jefes", "enfermedades_jefes.id_jefe", "caracterizacion.id")
            ->leftJoin($alias . ".enfermedadescro", "enfermedades_jefes.id_enfermedad", "enfermedadescro.id")
            ->where("enfermedades_jefes.tipo", "Cronica")
            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "caracterizacion.sexo AS genero",
                "enfermedades_jefes.tiempo AS tiempo",
                "enfermedades_jefes.tratamiento AS atendido",
                "enfermedadescro.descripcion AS enfermedad",
                "ocupaciones.descripcion as ocupacion",
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,
        caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
        corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120");
        }

        if ($data["datos"]["enfermedad"] != "Todas") {
            $consulta->where("enfermedades_jefes.id_enfermedad", $data["datos"]["enfermedad"]);
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftJoin($alias . ".enfermedades_integrantes", "enfermedades_integrantes.id_inte", "integrantes.id")
            ->leftJoin($alias . ".enfermedadescro", "enfermedades_integrantes.id_enfermedad", "enfermedadescro.id")
            ->where("enfermedades_integrantes.tipo", "Cronica")
            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "integrantes.sexo AS genero",
                "enfermedades_integrantes.tiempo AS tiempo",
                "enfermedades_integrantes.tratamiento AS atendido",
                "enfermedadescro.descripcion AS enfermedad",
                "ocupaciones.descripcion as ocupacion",
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,
            integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
            corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120");
        }

        if ($data["datos"]["enfermedad"] != "Todas") {
            $consultai->where("enfermedades_integrantes.id_enfermedad", $data["datos"]["enfermedad"]);
        }

        $consulta->union($consultai);

        if ($tipo == "Todos") {
            return $consulta->get();
        } else {
            return $consulta->paginate(10);
        }
    }

    public static function listarmigrantes($alias, $data, $tipo)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
            ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
            ->where("caracterizacion.migrante", "SI")
            ->where("migra.opci", "JEFE")
            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "caracterizacion.sexo AS genero",
                "ocupaciones.descripcion as ocupacion",
                "paises.nombre as pais"
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,
        caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
        corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120");
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
            ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
            ->where("integrantes.migrante", "SI")
            ->where("migra.opci", "INTE")
            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "integrantes.sexo AS genero",
                "ocupaciones.descripcion as ocupacion",
                "paises.nombre as pais"
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,
            integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
            corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120");
        }

        $consulta->union($consultai);

        if ($tipo == "Todos") {
            return $consulta->get();
        } else {
            return $consulta->paginate(10);
        }
    }

    public static function enfermedadcronica($alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.enfermedadescro')
            ->orderBy('descripcion', 'asc')
            ->where('estado', 'Activo')
            ->where("id", $id)
            ->first();
    }

}
