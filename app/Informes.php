<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Informes extends Model
{

    public static function poblacionTotal($alias)
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
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,
        caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
        corregimientos.descripcion,hogar.direccion) as localizacion")
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
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,
            integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
            corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad");

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function poblacionMigrante($alias)
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function reguladoMigrante($alias)
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
            ->where("migra.registrado", "SI")
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
            ->where("migra.registrado", "SI")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function noReguladoMigrante($alias)
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
            ->where("migra.registrado", "NO")
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
            ->where("migra.registrado", "NO")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes0($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes115($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes611($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes1217($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes1828($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes2959($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes60($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function ocupacionesMigrantes($alias)
    {
        $query = "SELECT id,descripcion,SUM(cont) as cont FROM (SELECT o.id,o.descripcion,COUNT(*) as cont FROM " . $alias . ".integrantes i INNER JOIN " . $alias . ".ocupaciones o ON i.ocupacion = o.id WHERE migrante = 'SI' AND i.estado='Activo' AND o.id <> 9993 GROUP BY i.ocupacion
        UNION
        SELECT o.id,o.descripcion,COUNT(*) as cont FROM " . $alias . ".caracterizacion c INNER JOIN " . $alias . ".ocupaciones o ON o.id = c.ocupacion where migrante = 'SI' AND c.estado='Activo' AND o.id <> 9993 GROUP BY c.ocupacion
        ) as cons GROUP BY cons.id ORDER BY COUNT(*) desc";

        DB::select("CREATE OR REPLACE VIEW " . $alias . ".ocupacionesmigrantes AS (" . $query . ")");

        $consulta = DB::table($alias . ".ocupacionesmigrantes")
            ->orderBy("cont", "desc")
            ->limit(5)
            ->get();

        return $consulta;
    }

    public static function principalespaises($alias)
    {

        $consulta = DB::select("select nombre,sum(total) as total from ((select paises.nombre,count(*) as total from " . $alias . ".caracterizacion
        inner join " . $alias . ".migra on migra.id_integrante = caracterizacion.id
        inner join " . $alias . ".paises on migra.pais = paises.id
        where caracterizacion.migrante = 'SI' and migra.opci = 'JEFE'
        group by paises.id)
        union
        (select paises.nombre, count(*) as total from " . $alias . ".integrantes
        inner join " . $alias . ".migra on migra.id_integrante = integrantes.id
        inner join " . $alias . ".paises on migra.pais = paises.id
        where integrantes.migrante = 'SI' and migra.opci = 'INTE'
        group by paises.id)) as cons group by nombre order by total desc");
        return $consulta;

    }

    public static function migrantessexo($alias, $sexo, $edad1, $edad2)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where("caracterizacion.migrante", "SI")
            ->where('caracterizacion.estado', 'Activo')
            ->where("sexo", $sexo)
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN " . $edad1 . " AND " . $edad2)
            ->select("caracterizacion.id")
            ->count();

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->where("integrantes.migrante", "SI")
            ->where('integrantes.estado', 'Activo')
            ->where("sexo", $sexo)
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN " . $edad1 . " AND " . $edad2)
            ->select("integrantes.id")
            ->count();

        return $consulta + $consultai;
    }

    public static function enfermedadesMigrantes($alias)
    {
        $consulta = DB::select("SELECT *,SUM(cont) as total FROM (
            SELECT e.id,e.tipo,IF(ec.descripcion IS NULL,ei.descripcion,ec.descripcion) as enfe,COUNT(*) as cont FROM " . $alias . ".integrantes i
            INNER JOIN " . $alias . ".enfermedades_integrantes e ON i.id = e.id_inte
            LEFT JOIN " . $alias . ".enfermedadescro ec ON ec.id = e.id_enfermedad AND e.tipo = 'Cronica'
            LEFT JOIN " . $alias . ".enfermedadesinf ei ON ei.id = e.id_enfermedad AND e.tipo = 'Infecciosa'
            WHERE migrante = 'SI' AND i.estado='Activo'
            GROUP BY e.id
            UNION
            SELECT e.id,e.tipo,IF(ec.descripcion IS NULL,ei.descripcion,ec.descripcion) as enfe,COUNT(*) as cont FROM " . $alias . ".caracterizacion c
            INNER JOIN " . $alias . ".enfermedades_jefes e ON e.id_jefe = c.id
            LEFT JOIN " . $alias . ".enfermedadescro ec ON ec.id = e.id_enfermedad AND e.tipo = 'Cronica'
            LEFT JOIN " . $alias . ".enfermedadesinf ei ON ei.id = e.id_enfermedad AND e.tipo = 'Infecciosa'
            where migrante = 'SI' AND c.estado='Activo'
            GROUP BY e.id
            ) as cons GROUP BY cons.enfe ORDER BY SUM(cont) desc LIMIT 5");

        return $consulta;
    }

    //////////////////////EMBARAZOS AFILIADOS//////////////////////////////
    public static function migrantesafiliacion($alias, $tipo)
    {
        if($tipo == "NINGUNA"){
            $nro_gestantes = DB::table($alias.".integrantes")
            ->select("integrantes.estado")
            ->where("integrantes.estado","Activo")
            ->where("integrantes.afi_entidad",$tipo)
            ->where("integrantes.migrante","SI")
            ->count();
    
            $nro_gestantes1 = DB::table($alias.".caracterizacion")
            ->select("caracterizacion.estado")
            ->where("caracterizacion.afiliacion_entidad",$tipo)
            ->where("caracterizacion.estado","Activo")
            ->where("caracterizacion.migrante","SI")
            ->count();
        }else{
            $nro_gestantes = DB::table($alias.".parpost")
            ->join($alias.".integrantes","integrantes.id","parpost.id_integrante")
            ->select("integrantes.estado")
            ->where("integrantes.estado","Activo")
            ->where("integrantes.afi_entidad","<>","NINGUNA")
            ->where("integrantes.migrante","SI")
            ->count();
    
            $nro_gestantes1 = DB::table($alias.".caracterizacion")
            ->select("caracterizacion.estado")
            ->where("caracterizacion.estado","Activo")
            ->where("caracterizacion.migrante","SI")
            ->where("caracterizacion.afiliacion_entidad","<>","NINGUNA")
            ->count();
        }
        
        $nro_gestantes = $nro_gestantes+$nro_gestantes1;
        
        return $nro_gestantes;
    }

    // informes de salud 
    public static function no_asegurado_menor_5($alias){
        $de0a1_rural = DB::table($alias.".men1a")
        ->join($alias.".integrantes", "integrantes.id", "men1a.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->whereIn("hogar.id_zona",  [2,3])
        ->get();

        $de0a1_urbano = DB::table($alias.".men1a")
        ->join($alias.".integrantes", "integrantes.id", "men1a.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->where("hogar.id_zona", 1)
        ->get();

        $de1a5_rural = DB::table($alias.".de1a5")
        ->join($alias.".integrantes", "integrantes.id", "de1a5.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->whereIn("hogar.id_zona",  [2,3])
        ->get();

        $de1a5_urbano = DB::table($alias.".de1a5")
        ->join($alias.".integrantes", "integrantes.id", "de1a5.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->where("hogar.id_zona", 1)
        ->get();

        $cantidad_personas = count($de0a1_rural) + count($de0a1_urbano) + count($de1a5_rural) + count($de1a5_urbano);

        $no_asegurado_urbano = array();
        $no_asegurado_rural = array();

        foreach ($de0a1_urbano as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_urbano, $key);
            }
        }
        
        foreach ($de1a5_urbano as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_urbano, $key);
            }
        }

        foreach ($de0a1_rural as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_rural, $key);
            }
        }
        
        foreach ($de1a5_rural as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_rural, $key);
            }
        }

        return  $respuesta = [
            "rural" => count($no_asegurado_rural),
            "urbano" => count($no_asegurado_urbano),
            "cantidad_personas" => $cantidad_personas
        ];

    }

    public static function no_asegurado_mayor_60($alias){
        $de60_rural = DB::table($alias.".de60")
        ->join($alias.".integrantes", "integrantes.id", "de60.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->whereIn("hogar.id_zona",  [2,3])
        ->get();

        $de60_urbano = DB::table($alias.".de60")
        ->join($alias.".integrantes", "integrantes.id", "de60.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->where("hogar.id_zona", 1)
        ->get();

        $cantidad_personas = count($de60_rural) + count($de60_urbano);

        $no_asegurado_urbano = array();
        $no_asegurado_rural = array();

        foreach ($de60_rural as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_urbano, $key);
            }
        }
        
        foreach ($de60_urbano as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_urbano, $key);
            }
        }

        return  $respuesta = [
            "rural" => count($no_asegurado_rural),
            "urbano" => count($no_asegurado_urbano),
            "cantidad_personas" => $cantidad_personas
        ];

    }

    public static function pobreza($alias){
        
        $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
        ->join($alias.'.vivienda', 'hogar.id','vivienda.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->select("hogar.*", "vivienda.*")
        ->get();

        // vivienda inadecuda
        foreach ($viviendas as &$item) {
            // urbano
            if($item->id_zona == 1){
                if($item->tipo_estructura == 5 || $item->tipo_cubierta == 2 || $item->material_predominante == 5){
                    $item->vivienda_inadecuada = "SI";
                }else{
                    $item->vivienda_inadecuada = "NO";
                }
            }else{
                //rural
                if($item->id_zona == 2 || $item->id_zona == 3){
                    if(($item->tipo_estructura == 5 || $item->tipo_estructura == 4) && $item->material_predominante == 5){
                        $item->vivienda_inadecuada = "SI";
                    }else{
                        $item->vivienda_inadecuada = "NO";
                    }
                }
            }
        }
        // vivienda inadecuda

        // Viviendas con hacinamiento crítico
        foreach ($viviendas as &$item) {
            $numero_personas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.id_hogar', $item->id_hogar)
            ->where('integrantes.estado', 'Activo')
            ->count();

            $numero_personas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->where('caracterizacion.id_hogar', $item->id_hogar)
            ->where('caracterizacion.estado', 'Activo')
            ->count();

            $hc = $numero_personas / $item->numero_cuartos;

            if($hc > 3){
                $item->hacinamiento_critico = "SI";
            }else{
                $item->hacinamiento_critico = "NO";
            }
        }
        // Viviendas con hacinamiento crítico

        // Viviendas con servicios inadecuados
        foreach ($viviendas as &$item) {
            // urbano
            if($item->id_zona == 1){
                if($item->servicio_sanitario == 3 || ($item->fuente_agua != 1 && $item->fuente_agua != 7)){
                    $item->servicios_inadecuados = "SI";
                }else{
                    $item->servicios_inadecuados = "NO";
                }
            }else{
                //rural
                if($item->id_zona == 2 || $item->id_zona == 3){
                    if($item->servicio_sanitario == 3 || $item->fuente_agua == 2 || $item->fuente_agua == 3|| $item->fuente_agua == 4|| $item->fuente_agua == 5){
                        $item->servicios_inadecuados = "SI";
                    }else{
                        $item->servicios_inadecuados = "NO";
                    }
                }
            }
        }
        // Viviendas con servicios inadecuados

        // Viviendas con alta dependencia económica
        foreach ($viviendas as &$item) {
            $numero_personas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.id_hogar', $item->id_hogar)
            ->where('integrantes.estado', 'Activo')
            ->count();

            $numero_personas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->where('caracterizacion.id_hogar', $item->id_hogar)
            ->where('caracterizacion.estado', 'Activo')
            ->count();

            $numero_personas_ocupadas=  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.id_hogar', $item->id_hogar)
            ->whereIn('integrantes.tipo_empleo', [2,3,4])
            ->where('integrantes.estado', 'Activo')
            ->count();

            $numero_personas_ocupadas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->where('caracterizacion.id_hogar', $item->id_hogar)
            ->whereIn('caracterizacion.tipo_empleo', [2,3,4])
            ->where('caracterizacion.estado', 'Activo')
            ->count();

            $de = $numero_personas / $numero_personas_ocupadas;

            if($de >= 3){
                $item->dependencia_economica = "SI";
            }else{
                $item->dependencia_economica = "NO";
            }
        }
        // Viviendas con alta dependencia económica

        //Viviendas con niños en edad escolar que no asisten a la escuela
        foreach ($viviendas as &$item) {
            $ninios =  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.id_hogar', $item->id_hogar)
            ->where('integrantes.estado', 'Activo')
            ->select('integrantes.*')
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->get();

            $ninios_no_asisten = 0;
            
            foreach ($ninios as &$item2) {
                if($item2->edad > 6  && $item2->edad < 12){
                    if($item2->escolaridad == 4 || $item2->escolaridad == 13 || $item2->escolaridad == 1 || $item2->escolaridad == 12 ){
                        $ninios_no_asisten += 1;
                    }
                }
            }

            if($ninios_no_asisten > 0){
                $item->ninios_descolarizados = "SI";
            }else{
                $item->ninios_descolarizados = "NO";
            }
        }
        //Viviendas con niños en edad escolar que no asisten a la escuela

        foreach ($viviendas as &$item) {
            if($item->ninios_descolarizados == "SI" || $item->dependencia_economica == "SI" || $item->servicios_inadecuados == "SI" || $item->hacinamiento_critico == "SI" || $item->vivienda_inadecuada == "SI"){
                $item->inb = "SI";
            }else{
                $item->inb = "NO";
            }
        }
        

        $viviendas_inb = array();
        $viviendas_inb_urbano = array();
        $viviendas_inb_rural = array();

        foreach ($viviendas as &$item) {
            if($item->inb == "SI"){
              array_push($viviendas_inb, $item->id_hogar);
              if($item->id_zona == 1){
                array_push($viviendas_inb_urbano, $item->id_hogar);
              }else{
                array_push($viviendas_inb_rural, $item->id_hogar);
              }
            }
        }

        // total
        $integrantes_pobres =  DB::connection('mysql')->table($alias.'.integrantes')
        ->whereIn('integrantes.id_hogar', $viviendas_inb)
        ->where('integrantes.estado', 'Activo')
        ->count();

        $jefes_pobres =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->whereIn('caracterizacion.id_hogar', $viviendas_inb)
        ->where('caracterizacion.estado', 'Activo')
        ->count();
        // total

        // rural 
        $integrantes_pobres_rural =  DB::connection('mysql')->table($alias.'.integrantes')
        ->whereIn('integrantes.id_hogar', $viviendas_inb_rural)
        ->where('integrantes.estado', 'Activo')
        ->count();

        $jefes_pobres_rural =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->whereIn('caracterizacion.id_hogar', $viviendas_inb_rural)
        ->where('caracterizacion.estado', 'Activo')
        ->count();
        // rural 

        // urbano 
        $integrantes_pobres_urbano =  DB::connection('mysql')->table($alias.'.integrantes')
        ->whereIn('integrantes.id_hogar', $viviendas_inb_urbano)
        ->where('integrantes.estado', 'Activo')
        ->count();

        $jefes_pobres_urbano =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->whereIn('caracterizacion.id_hogar', $viviendas_inb_urbano)
        ->where('caracterizacion.estado', 'Activo')
        ->count();
        // urbano 

        $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->count();

        $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->count();

        $poblacion_pobreza = $integrantes_pobres + $jefes_pobres;
        $poblacion_pobreza_rural = $integrantes_pobres_rural + $jefes_pobres_rural;
        $poblacion_pobreza_urbano = $integrantes_pobres_urbano + $jefes_pobres_urbano;
        $poblacion = $jefes + $integrantes;

        return  $respuesta = [
            "poblacion" => $poblacion,
            "poblacion_pobreza" => $poblacion_pobreza,
            "porcentaje_poblacion_pobreza" => ($poblacion_pobreza / $poblacion) * 100,
            "poblacion_pobreza_rural" => $poblacion_pobreza_rural,
            "porcentaje_poblacion_pobreza_rural" => ($poblacion_pobreza_rural / $poblacion_pobreza) * 100,
            "poblacion_pobreza_urbano" => $poblacion_pobreza_urbano,
            "porcentaje_poblacion_pobreza_urbano" => ($poblacion_pobreza_urbano / $poblacion_pobreza) * 100,
        ];

    }
    
}
