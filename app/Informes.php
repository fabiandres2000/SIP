<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Informes extends Model
{

    public static function poblacionTotal($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
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

    public static function poblacionMigrante($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
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


    public static function reguladoMigrante($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
        ->where("migra.registrado","SI")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
        ->where("migra.registrado","SI")
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

    public static function noReguladoMigrante($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
        ->where("migra.registrado","NO")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
        ->where("migra.registrado","NO")
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

    public static function migrantes0($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
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

    public static function migrantes115($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
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

    public static function migrantes611($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
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

    public static function migrantes1217($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
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

    public static function migrantes1828($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
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

    public static function migrantes2959($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")
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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
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

    public static function migrantes60($alias){
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("caracterizacion.migrante","SI")
        ->where("migra.opci","JEFE")

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
        ->join($alias.".vivienda","hogar.id","vivienda.id_hogar")
        ->join($alias.".dptos","dptos.codigo","hogar.id_dpto")
        ->leftJoin($alias.".barrios","barrios.id","hogar.id_barrio")
        ->join($alias.'.muni', function($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias.".corregimientos","corregimientos.id","hogar.id_corre")
        ->leftJoin($alias.".veredas","veredas.id","hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
        ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
        ->where("integrantes.migrante","SI")
        ->where("migra.opci","INTE")
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

    public static function ocupacionesMigrantes($alias){
        $query = "SELECT * FROM (SELECT o.id,o.descripcion,COUNT(*) as cont FROM ".$alias.".integrantes i INNER JOIN ".$alias.".ocupaciones o ON i.ocupacion = o.id WHERE migrante = 'SI' AND i.estado='Activo' GROUP BY i.ocupacion
        UNION 
        SELECT o.id,o.descripcion,COUNT(*) as cont FROM ".$alias.".caracterizacion c INNER JOIN ".$alias.".ocupaciones o ON o.id = c.ocupacion where migrante = 'SI' AND c.estado='Activo' GROUP BY c.ocupacion
        ) as cons GROUP BY cons.id ORDER BY COUNT(*) desc";

        DB::select("CREATE OR REPLACE VIEW ".$alias . ".ocupacionesmigrantes AS (".$query.")");

        $consulta = DB::table($alias . ".ocupacionesmigrantes")
                    ->orderBy("cont","desc")
                    ->limit(5)
                    ->get();

        return $consulta;
    }

    

    
}
