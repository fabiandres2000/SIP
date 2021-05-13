<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class RiesgosAmbientales extends Model
{
    protected $table = 'riesgos_ambientales';
    protected $fillable = [
        'id_hogar', 'riesgos_derrumbes', 'riesgos_inundacion', 'riesgos_insalubridad', 'riesgos_atmosferico',
        'riesgos_recurso_suelo', 'riesgos_quema', 'riesgos_auditivo', 'riesgos_recurso_hidrico', 'riesgos_acceso_agua',
        'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {

        return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->updateOrInsert([
            'id_hogar' => $data['id_hogar'],
        ], [
            'riesgos_derrumbes' => $data['riesgos_derrumbes'],
            'riesgos_inundacion' => $data['riesgos_inundacion'],
            'riesgos_insalubridad' => $data['riesgos_insalubridad'],
            'riesgos_atmosferico' => $data['riesgos_atmosferico'],
            'riesgos_recurso_suelo' => $data['riesgos_recurso_suelo'],
            'riesgos_quema' => $data['riesgos_quema'],
            'riesgos_auditivo' => $data['riesgos_auditivo'],
            'riesgos_recurso_hidrico' => $data['riesgos_recurso_hidrico'],

            'riesgos_acceso_agua' => $data['riesgos_acceso_agua'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.riesgos_ambientales')
            ->where('riesgos_ambientales.id_hogar', $id_hogar)
            ->where('riesgos_ambientales.estado', 'Activo')
            ->first();
    }
}
