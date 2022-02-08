<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    //
    public static function mujeres_embarazadas($alias)
    {
        $consulta = DB::select("SELECT SUM(cont) as total FROM (SELECT COUNT(*) as cont FROM " . $alias . ".integrantes WHERE embarazo_multiple = 'SI' AND estado='Activo'
        UNION
        SELECT COUNT(*) as cont FROM " . $alias . ".caracterizacion where embarazo_multiple = 'SI' AND estado='Activo') as cons;");

        //dd($consulta[0]->total);die;
        return $consulta[0]->total;
    }

    public static function adolescentes_embarazadas($alias)
    {
        $consulta = DB::select("SELECT
        SUM(cont) as total
        FROM
            (SELECT
                COUNT(*) AS cont
            FROM
                " . $alias . ".caracterizacion
            WHERE
                estado = 'Activo'
                    AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 11 AND 17
                    AND embarazo = 'SI' UNION SELECT
                COUNT(*) AS cont
            FROM
                " . $alias . ".integrantes
            WHERE
                estado = 'Activo'
                    AND TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 11 AND 17
                    AND embarazo = 'SI') AS cons;");

        //dd($consulta[0]->total);die;
        return $consulta[0]->total;
    }

    public static function adolescentes_desescolarizadas($alias)
    {

        $consulta = DB::select("SELECT
        SUM(cont) as total
    FROM
        (SELECT
            COUNT(*) AS cont
        FROM
            " . $alias . ".caracterizacion
        WHERE
            estado = 'Activo'
                AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 11 AND 17
                AND embarazo = 'SI'
                AND (nivel_escolaridad = 1 OR nivel_escolaridad = 4 OR nivel_escolaridad = 12 OR nivel_escolaridad = 13)

    UNION
    SELECT
            COUNT(*) AS cont
        FROM
        " . $alias . ".integrantes
        WHERE
            estado = 'Activo'
                AND TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 11 AND 17
                AND embarazo = 'SI'
                AND (escolaridad = 1 OR escolaridad  = 4 OR escolaridad  = 12 OR escolaridad  = 13)
                ) AS cons;");

        //dd($consulta[0]->total);die;
        return $consulta[0]->total;
    }

    public static function total_integrantes($alias)
    {
        $consulta = DB::table($alias . ".integrantes")
            ->where("estado", "Activo")
            ->count();

        return $consulta;

    }

    public static function total_jefes($alias)
    {
        $consulta = DB::table($alias . ".caracterizacion")
            ->where("estado", "Activo")
            ->count();

        return $consulta;

    }

    public static function adolescentes_lactantes($alias)
    {
        $consulta = DB::table($alias . ".men1a")
            ->where("estado", "Activo")
            ->where(function ($query) use ($alias) {
                $query->where('lactancia', "Exclusiva")
                    ->orWhere('lactancia', "Mixta");
            })->count();

        return $consulta;

    }

    public static function embarazos_vih($alias)
    {
        $consulta = DB::table($alias . ".parpost")
            ->where("estado", "Activo")
            ->where("vih", "SIP")->count();

        return $consulta;
    }

    public static function adolescentes_violencia($alias)
    {
        $consulta = DB::table($alias . ".integrantes")
            ->join($alias . ".factores", "factores.id_hogar", "integrantes.id_hogar")
            ->where("integrantes.estado", "Activo")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 11 AND 17")
            ->where(function ($query) use ($alias) {
                $query->where('factores.violencia_fisica', "SI")
                    ->orWhere('factores.violencia_psico', "SI")
                    ->orWhere('factores.violencia_economica', "SI")
                    ->orWhere('factores.abuso_sexual', "SI");
            })->count();

        return $consulta;
    }

    public static function ninos_violencia($alias)
    {
        $consulta = DB::table($alias . ".integrantes")
            ->join($alias . ".factores", "factores.id_hogar", "integrantes.id_hogar")
            ->where("integrantes.estado", "Activo")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) < 11")
            ->where(function ($query) use ($alias) {
                $query->where('factores.violencia_fisica', "SI")
                    ->orWhere('factores.violencia_psico', "SI")
                    ->orWhere('factores.violencia_economica', "SI")
                    ->orWhere('factores.abuso_sexual', "SI");
            })->count();

        return $consulta;
    }

    public static function poblacion_sin_eps($alias)
    {
        $consulta = DB::select("SELECT SUM(cont) as total FROM (SELECT COUNT(*) as cont FROM " . $alias . ".integrantes WHERE afi_entidad = 'NINGUNA' AND estado='Activo'
        UNION
        SELECT COUNT(*) as cont FROM " . $alias . ".caracterizacion where afiliacion_entidad = 'NINGUNA' AND estado='Activo') as cons;");

        //dd($consulta[0]->total);die;
        return $consulta[0]->total;
    }

    public static function atencion_prenatal($alias)
    {
        $nro_prenatal = DB::table($alias . ".parpost")->where("control_prenatal", "SI")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_prenatal;
    }

    public static function atencion_prenatal_jefe($alias)
    {
        $nro_prenatal = DB::table($alias . ".parpost")->where("control_prenatal", "SI")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "parpost.id_integrante")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $nro_prenatal;
    }

    public static function total_gestantes($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function total_gestantes_jefes($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "parpost.id_integrante")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function sin_atencion_prenatal($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")->where("control_prenatal", "NO")
            ->where("estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function grupo_510($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->where("control_prenatal", "NO")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function grupo_1117($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->where("control_prenatal", "NO")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function grupo_1828($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28")
            ->where("control_prenatal", "NO")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function grupo_2959($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59")
            ->where("control_prenatal", "NO")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function gestantes_grupo_510($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function gestantes_grupo_1117($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function gestantes_grupo_1828($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    public static function gestantes_grupo_2959($alias)
    {
        $nro_gestantes = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59")
            ->where("integrantes.estado", "Activo")->count();
        return $nro_gestantes;
    }

    ///////////////////CONSUMIDORES DE DROGAS//////////////////////////////

    public static function total_consumidores_integrantes_masculinos_6_11($alias)
    {
        $total_consumidores = DB::table($alias . ".de6a11")
            ->join($alias . ".integrantes", "integrantes.id", "de6a11.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where("sustanciaspsico", "<>", "NO")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_6_11($alias)
    {
        $total_consumidores = DB::table($alias . ".de6a11")
            ->join($alias . ".integrantes", "integrantes.id", "de6a11.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where("sustanciaspsico", "<>", "NO")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_masculinos_12_17_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".de12a17")
            ->join($alias . ".integrantes", "integrantes.id", "de12a17.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_masculinos_12_17_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".de12a17")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de12a17.id_integrante")
            ->where("caracterizacion.sexo", "MASCULINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_12_17_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".de12a17")
            ->join($alias . ".integrantes", "integrantes.id", "de12a17.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_12_17_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".de12a17")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de12a17.id_integrante")
            ->where("caracterizacion.sexo", "FEMENINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    ///////////////////SPA DE 18-28//////////////////////////////

    public static function total_consumidores_integrantes_masculinos_18_28_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".de18a28")
            ->join($alias . ".integrantes", "integrantes.id", "de18a28.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_masculinos_18_28_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".de18a28")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de18a28.id_integrante")
            ->where("caracterizacion.sexo", "MASCULINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_18_28_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".de18a28")
            ->join($alias . ".integrantes", "integrantes.id", "de18a28.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_18_28_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".de18a28")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de18a28.id_integrante")
            ->where("caracterizacion.sexo", "FEMENINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    ///////////////////SPA DE 29-59//////////////////////////////

    public static function total_consumidores_integrantes_masculinos_29_59_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".de29a59")
            ->join($alias . ".integrantes", "integrantes.id", "de29a59.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_masculinos_29_59_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".de29a59")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de29a59.id_integrante")
            ->where("caracterizacion.sexo", "MASCULINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_29_59_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".de29a59")
            ->join($alias . ".integrantes", "integrantes.id", "de29a59.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_29_59_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".de29a59")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de29a59.id_integrante")
            ->where("caracterizacion.sexo", "FEMENINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('spa', "SI");
            })
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    ///////////////////MAYORES DE 60//////////////////////////////

    public static function total_consumidores_integrantes_masculinos_60_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".de60")
            ->join($alias . ".integrantes", "integrantes.id", "de60.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('cigarrillo', "SI")
                    ->orWhere('glicemia', "SI");
            })
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_masculinos_60_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".de60")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de60.id_integrante")
            ->where("caracterizacion.sexo", "MASCULINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('cigarrillo', "SI")
                    ->orWhere('glicemia', "SI");
            })
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_60_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".de60")
            ->join($alias . ".integrantes", "integrantes.id", "de60.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('cigarrillo', "SI")
                    ->orWhere('glicemia', "SI");
            })
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_60_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".de60")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de60.id_integrante")
            ->where("caracterizacion.sexo", "FEMENINO")
            ->where(function ($query) use ($alias) {
                $query->where('alcohol', "SI")
                    ->orWhere('cigarrillo', "SI")
                    ->orWhere('glicemia', "SI");
            })
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function gestantes_consumidores($alias)
    {
        return 0;
    }

    ////////////////////////GRAFICA DE BARRAS//////////////////////////

    public static function total_consumidores_integrantes_masculinos_6_11_t($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de6a11")
            ->join($alias . ".integrantes", "integrantes.id", "de6a11.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where("sustanciaspsico", "<>", $bus)
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_6_11_t($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de6a11")
            ->join($alias . ".integrantes", "integrantes.id", "de6a11.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where("sustanciaspsico", "<>", $bus)
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_masculinos_12_17($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de12a17")
            ->join($alias . ".integrantes", "integrantes.id", "de12a17.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where($bus, "SI")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_jefe_masculinos_12_17($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de12a17")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de12a17.id_integrante")
            ->where("caracterizacion.sexo", "MASCULINO")
            ->where($bus, "SI")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_12_17($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de12a17")
            ->join($alias . ".integrantes", "integrantes.id", "de12a17.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where($bus, "SI")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_jefe_femeninos_12_17($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de12a17")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de12a17.id_integrante")
            ->where("caracterizacion.sexo", "FEMENINO")
            ->where($bus, "SI")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    ///////////////////SPA DE 18-28//////////////////////////////

    public static function total_consumidores_integrantes_masculinos_18_28($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de18a28")
            ->join($alias . ".integrantes", "integrantes.id", "de18a28.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where($bus, "SI")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_jefe_masculinos_18_28($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de18a28")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de18a28.id_integrante")
            ->where("caracterizacion.sexo", "MASCULINO")
            ->where($bus, "SI")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_18_28($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de18a28")
            ->join($alias . ".integrantes", "integrantes.id", "de18a28.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where($bus, "SI")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_jefe_femeninos_18_28($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de18a28")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de18a28.id_integrante")
            ->where("caracterizacion.sexo", "FEMENINO")
            ->where($bus, "SI")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    ///////////////////SPA DE 29-59//////////////////////////////

    public static function total_consumidores_integrantes_masculinos_29_59($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de29a59")
            ->join($alias . ".integrantes", "integrantes.id", "de29a59.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where($bus, "SI")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_jefe_masculinos_29_59($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de29a59")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de29a59.id_integrante")
            ->where("caracterizacion.sexo", "MASCULINO")
            ->where($bus, "SI")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_29_59($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de29a59")
            ->join($alias . ".integrantes", "integrantes.id", "de29a59.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where($bus, "SI")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_jefe_femeninos_29_59($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de29a59")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de29a59.id_integrante")
            ->where("caracterizacion.sexo", "FEMENINO")
            ->where($bus, "SI")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    ///////////////////MAYORES DE 60//////////////////////////////

    public static function total_consumidores_integrantes_masculinos_60($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de60")
            ->join($alias . ".integrantes", "integrantes.id", "de60.id_integrante")
            ->where("integrantes.sexo", "MASCULINO")
            ->where($bus, "SI")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_jefe_masculinos_60($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de60")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de60.id_integrante")
            ->where("caracterizacion.sexo", "MASCULINO")
            ->where($bus, "SI")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_integrantes_femeninos_60($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de60")
            ->join($alias . ".integrantes", "integrantes.id", "de60.id_integrante")
            ->where("integrantes.sexo", "FEMENINO")
            ->where($bus, "SI")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_consumidores_jefe_femeninos_60($alias, $bus)
    {
        $total_consumidores = DB::table($alias . ".de60")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "de60.id_integrante")
            ->where("caracterizacion.sexo", "FEMENINO")
            ->where($bus, "SI")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")->count();
        return $total_consumidores;
    }

    public static function total_gestantes_spa_jefe($alias)
    {
        $total_consumidores = DB::table($alias . ".parpost")
            ->join($alias . ".caracterizacion", "caracterizacion.id", "parpost.id_integrante")
            ->where("opci", "JEFE")
            ->where("caracterizacion.estado", "Activo")
            ->where(function ($query) use ($alias) {
                $query->where('bebidas', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('consumo', "SI");
            })->count();
        return $total_consumidores;
    }

    public static function total_gestantes_spa_integrantes($alias)
    {
        $total_consumidores = DB::table($alias . ".parpost")
            ->join($alias . ".integrantes", "integrantes.id", "parpost.id_integrante")
            ->where("opci", "INTE")
            ->where("integrantes.estado", "Activo")
            ->where(function ($query) use ($alias) {
                $query->where('bebidas', "SI")
                    ->orWhere('fuma', "SI")
                    ->orWhere('consumo', "SI");
            })->count();
        return $total_consumidores;
    }

}
