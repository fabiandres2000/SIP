<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class EnfermedadesJefes extends Model
{
    protected $table = 'enfermedades_jefes';
    protected $fillable = [
        'id_jefe',
        'id_hogar',
        'id_enfermedad',
        'tipo',
        'tiempo',
        'tratamiento',
        'estado',
        'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.enfermedades_jefes')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_jefe' => $data['id_jefe'],
            'id_hogar' => $data['id_hogar'],
            'id_enfermedad' => $data['id_enfermedad'],
            'tipo' => $data['tipo'],
            'tiempo' => $data['tiempo'],
            'tratamiento' => $data['tratamiento'],
            'estado' => $data['estado'],
            'id_compania' => 1,
        ]);
    }

    public static function buscar($alias, $id_jefe)
    {
        $enfC = DB::connection('mysql')->table($alias . '.enfermedades_jefes')
            ->join($alias . '.enfermedadescro', 'enfermedadescro.id', 'enfermedades_jefes.id_enfermedad')
            ->where('enfermedades_jefes.id_jefe', $id_jefe)
            ->where('enfermedades_jefes.tipo', 'Cronica')
            ->where('enfermedades_jefes.estado', 'Activo')
            ->select("enfermedades_jefes.*", "enfermedadescro.descripcion AS textoEnfermedad");

        $enfI = DB::connection('mysql')->table($alias . '.enfermedades_jefes')
            ->join($alias . '.enfermedadesinf', 'enfermedadesinf.id', 'enfermedades_jefes.id_enfermedad')
            ->where('enfermedades_jefes.id_jefe', $id_jefe)
            ->where('enfermedades_jefes.tipo', 'Infecciosa')
            ->where('enfermedades_jefes.estado', 'Activo')
            ->select("enfermedades_jefes.*", "enfermedadesinf.descripcion AS textoEnfermedad");
        return $enfC->unionAll($enfI)->get();

    }
}
