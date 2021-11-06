<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ValoresRiesgosSaludDE1A5 extends Model
{
    protected $table = 'valores_riesgos_salud_de1a5';
    protected $fillable = [
        'id_hogar',

        'alimentacion_saludable_EnIn',
        'asistencia_crecimiento_EnIn',
        'fumigacion_EnIn',
        'sistema_recoleccion_EnIn',
        'desparacitacion_EnIn',
        'inmunizacion_EnIn',
        'educacion_EnIn',
        'mantenimiento_EnIn',
        'citas_EnIn',

        'educacion_TrAsSPA',
        'acompaniamiento_TrAsSPA',

        'asistencia_crecimiento_EnCaAt',
        'educacion_EnCaAt',
        'actividad_EnCaAt',

        'asistencia_crecimiento_Ca',
        'educacion_Ca',
        'valoracion_Ca',

        'asistencia_crecimiento_AlTrVi',
        'valoracion_AlTrVi',

        'asistencia_crecimiento_AlTrAuCo',
        'valoracion_AlTrAuCo',

        'control_odontologia_SaBu',
        'aplicacion_fluor_SaBu',
        'educacion_SaBu',
        'habitos_higiene_SaBu',

        'concientizacion_PrSaMe',
        'acompaniamiento_PrSaMe',
        'crecimiento_PrSaMe',
        'grupos_PrSaMe',

        'acompaniamiento_Vi',
        'grupos_Vi',
        'concientizacion_Vi',
        'crecimiento_Vi',
        'icbf_Vi',

        'crecimiento_EnReCr',
        'educacion_EnReCr',
        'valoracion_EnReCr',

        'crecimiento_EnZo',
        'potabilizacion_EnZo',
        'mantenimiento_EnZo',
        'fumigacion_EnZo',
        'vacunacion_EnZo',
        'inmunizacion_EnZo',
        'valorizacion_EnZo',
        'desparatizacion_EnZo',

        'crecimiento_TrDeNeEnAu',
        'acceso_TrDeNeEnAu',
        'valoracion_TrDeNeEnAu',

        'atencion_CoSp',
        'relaciones_CoSp',
        'grupos_CoSp',
        'educacion_CoSp',
        'valoracion_CoSp',

        'asistencia_RiDeAg',
        'programas_RiDeAg',
        'suplementacion_RiDeAg',

        'asistencia_RiDeGl',
        'programas_RiDeGl',
        'suplementacion_RiDeGl',

        'asistencia_RiTaBa',
        'programas_RiTaBa',
        'suplementacion_RiTaBa',

        'asistencia_RiSo',
        'actividad_RiSo',

        'estado',
        'id_compania',
    ];

    public static function guardarInicial($id_hogar, $alias)
    {

        return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->updateOrInsert([
            'id_hogar' => $id_hogar,
        ], [

            'alimentacion_saludable_EnIn' => '',
            'asistencia_crecimiento_EnIn' => '',
            'fumigacion_EnIn' => '',
            'sistema_recoleccion_EnIn' => '',
            'desparacitacion_EnIn' => '',
            'inmunizacion_EnIn' => '',
            'educacion_EnIn' => '',
            'mantenimiento_EnIn' => '',
            'citas_EnIn' => '',

            'educacion_TrAsSPA' => '',
            'acompaniamiento_TrAsSPA' => '',

            'asistencia_crecimiento_EnCaAt' => '',
            'educacion_EnCaAt' => '',
            'actividad_EnCaAt' => '',

            'asistencia_crecimiento_Ca' => '',
            'educacion_Ca' => '',
            'valoracion_Ca' => '',

            'asistencia_crecimiento_AlTrVi' => '',
            'valoracion_AlTrVi' => '',

            'asistencia_crecimiento_AlTrAuCo' => '',
            'valoracion_AlTrAuCo' => '',

            'control_odontologia_SaBu' => '',
            'aplicacion_fluor_SaBu' => '',
            'educacion_SaBu' => '',
            'habitos_higiene_SaBu' => '',

            'concientizacion_PrSaMe' => '',
            'acompaniamiento_PrSaMe' => '',
            'crecimiento_PrSaMe' => '',
            'grupos_PrSaMe' => '',

            'acompaniamiento_Vi' => '',
            'grupos_Vi' => '',
            'concientizacion_Vi' => '',
            'crecimiento_Vi' => '',
            'icbf_Vi' => '',

            'crecimiento_EnReCr' => '',
            'educacion_EnReCr' => '',
            'valoracion_EnReCr' => '',

            'crecimiento_EnZo' => '',
            'potabilizacion_EnZo' => '',
            'mantenimiento_EnZo' => '',
            'fumigacion_EnZo' => '',
            'vacunacion_EnZo' => '',
            'inmunizacion_EnZo' => '',
            'valorizacion_EnZo' => '',
            'desparatizacion_EnZo' => '',

            'crecimiento_TrDeNeEnAu' => '',
            'acceso_TrDeNeEnAu' => '',
            'valoracion_TrDeNeEnAu' => '',

            'atencion_CoSp' => '',
            'relaciones_CoSp' => '',
            'grupos_CoSp' => '',
            'educacion_CoSp' => '',
            'valoracion_CoSp' => '',

            'asistencia_RiDeAg' => '',
            'programas_RiDeAg' => '',
            'suplementacion_RiDeAg' => '',

            'asistencia_RiDeGl' => '',
            'programas_RiDeGl' => '',
            'suplementacion_RiDeGl' => '',

            'asistencia_RiTaBa' => '',
            'programas_RiTaBa' => '',
            'suplementacion_RiTaBa' => '',

            'asistencia_RiSo' => '',
            'actividad_RiSo' => '',

            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
    }

    public static function modificar($alias, $id_hogar, $opcion, $data)
    {
        if ($opcion == "EnIn") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'alimentacion_saludable_EnIn' => $data["alimentacion_saludable_EnIn"],
                'asistencia_crecimiento_EnIn' => $data["asistencia_crecimiento_EnIn"],
                'fumigacion_EnIn' => $data["fumigacion_EnIn"],
                'sistema_recoleccion_EnIn' => $data["sistema_recoleccion_EnIn"],
                'desparacitacion_EnIn' => $data["desparacitacion_EnIn"],
                'inmunizacion_EnIn' => $data["inmunizacion_EnIn"],
                'educacion_EnIn' => $data["educacion_EnIn"],
                'mantenimiento_EnIn' => $data["mantenimiento_EnIn"],
                'citas_EnIn' => $data["citas_EnIn"],
            ]);
        }

        if ($opcion == "TrAsSPA") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'educacion_TrAsSPA' => $data["educacion_TrAsSPA"],
                'acompaniamiento_TrAsSPA' => $data["acompaniamiento_TrAsSPA"],
            ]);
        }

        if ($opcion == "EnCaAt") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'asistencia_crecimiento_EnCaAt' => $data["asistencia_crecimiento_EnCaAt"],
                'educacion_EnCaAt' => $data["educacion_EnCaAt"],
                'actividad_EnCaAt' => $data["actividad_EnCaAt"],
            ]);
        }

        if ($opcion == "Ca") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'asistencia_crecimiento_Ca' => $data["asistencia_crecimiento_Ca"],
                'educacion_Ca' => $data["educacion_Ca"],
                'valoracion_Ca' => $data["valoracion_Ca"],
            ]);
        }

        if ($opcion == "AlTrVi") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'asistencia_crecimiento_AlTrVi' => $data["asistencia_crecimiento_AlTrVi"],
                'valoracion_AlTrVi' => $data["valoracion_AlTrVi"],
            ]);
        }

        if ($opcion == "AlTrAuCo") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'asistencia_crecimiento_AlTrAuCo' => $data["asistencia_crecimiento_AlTrAuCo"],
                'valoracion_AlTrAuCo' => $data["valoracion_AlTrAuCo"],
            ]);
        }

        if ($opcion == "SaBu") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'control_odontologia_SaBu' => $data["control_odontologia_SaBu"],
                'aplicacion_fluor_SaBu' => $data["aplicacion_fluor_SaBu"],
                'educacion_SaBu' => $data["educacion_SaBu"],
                'habitos_higiene_SaBu' => $data["habitos_higiene_SaBu"],
            ]);
        }

        if ($opcion == "PrSaMe") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'concientizacion_PrSaMe' => $data["concientizacion_PrSaMe"],
                'acompaniamiento_PrSaMe' => $data["acompaniamiento_PrSaMe"],
                'crecimiento_PrSaMe' => $data["crecimiento_PrSaMe"],
                'grupos_PrSaMe' => $data["grupos_PrSaMe"],
            ]);
        }

        if ($opcion == "Vi") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'acompaniamiento_Vi' => $data["acompaniamiento_Vi"],
                'grupos_Vi' => $data["grupos_Vi"],
                'concientizacion_Vi' => $data["concientizacion_Vi"],
                'crecimiento_Vi' => $data["crecimiento_Vi"],
                'icbf_Vi' => $data["icbf_Vi"],
            ]);
        }

        if ($opcion == "EnReCr") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'crecimiento_EnReCr' => $data["crecimiento_EnReCr"],
                'educacion_EnReCr' => $data["educacion_EnReCr"],
                'valoracion_EnReCr' => $data["valoracion_EnReCr"],
            ]);
        }

        if ($opcion == "EnZo") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'crecimiento_EnZo' => $data["crecimiento_EnZo"],
                'potabilizacion_EnZo' => $data["potabilizacion_EnZo"],
                'mantenimiento_EnZo' => $data["mantenimiento_EnZo"],
                'fumigacion_EnZo' => $data["fumigacion_EnZo"],
                'vacunacion_EnZo' => $data["vacunacion_EnZo"],
                'inmunizacion_EnZo' => $data["inmunizacion_EnZo"],
                'valorizacion_EnZo' => $data["valorizacion_EnZo"],
                'desparatizacion_EnZo' => $data["desparatizacion_EnZo"],
            ]);
        }

        if ($opcion == "TrDeNeEnAu") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'crecimiento_TrDeNeEnAu' => $data["crecimiento_TrDeNeEnAu"],
                'acceso_TrDeNeEnAu' => $data["acceso_TrDeNeEnAu"],
                'valoracion_TrDeNeEnAu' => $data["valoracion_TrDeNeEnAu"],
            ]);
        }

        if ($opcion == "CoSp") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'atencion_CoSp' => $data["atencion_CoSp"],
                'relaciones_CoSp' => $data["relaciones_CoSp"],
                'grupos_CoSp' => $data["grupos_CoSp"],
                'educacion_CoSp' => $data["educacion_CoSp"],
                'valoracion_CoSp' => $data["valoracion_CoSp"],
            ]);
        }

        if ($opcion == "RiDeAg") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'asistencia_RiDeAg' => $data["asistencia_RiDeAg"],
                'programas_RiDeAg' => $data["programas_RiDeAg"],
                'suplementacion_RiDeAg' => $data["suplementacion_RiDeAg"],
            ]);
        }

        if ($opcion == "RiDeGl") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'asistencia_RiDeGl' => $data["asistencia_RiDeGl"],
                'programas_RiDeGl' => $data["programas_RiDeGl"],
                'suplementacion_RiDeGl' => $data["suplementacion_RiDeGl"],
            ]);
        }

        if ($opcion == "RiTaBa") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'asistencia_RiTaBa' => $data["asistencia_RiTaBa"],
                'programas_RiTaBa' => $data["programas_RiTaBa"],
                'suplementacion_RiTaBa' => $data["suplementacion_RiTaBa"],
            ]);
        }

        if ($opcion == "RiSo") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')->where('id_hogar', $id_hogar)->update([
                'asistencia_RiSo' => $data["asistencia_RiSo"],
                'actividad_RiSo' => $data["actividad_RiSo"],
            ]);
        }
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de1a5')
            ->where('valores_riesgos_salud_de1a5.id_hogar', $id_hogar)
            ->where('valores_riesgos_salud_de1a5.estado', 'Activo')
            ->first();
    }
}
