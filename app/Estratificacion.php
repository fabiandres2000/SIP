<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Estratificacion extends Model
{
    protected $table = 'estratificacion';
    protected $fillable = [
        'id_hogar', 'id_jefe', 'cuenta_internet', 'tiene_pc_escritorio',
        'tiene_pc_portatil', 'cuantos_celulares', 'tiene_equipo_sonido',
        'cuantos_tv_color', 'cuantos_vehiculos', 'nivel_instruccion',
        'afiliacion_salud_privada', 'ingresos_zona_rural', 'ingresos_ciudad',
        'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        $jefe = \App\Caracterizacion::buscar($data['id_jefe'], $alias);
        return DB::connection('mysql')->table($alias . '.estratificacion')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'id_jefe' => $jefe->id,
            'cuenta_internet' => $data['cuenta_internet'],
            'tiene_pc_escritorio' => $data['tiene_pc_escritorio'],
            'tiene_pc_portatil' => $data['tiene_pc_portatil'],
            'cuantos_celulares' => $data['cuantos_celulares'],
            'tiene_equipo_sonido' => $data['tiene_equipo_sonido'],
            'cuantos_tv_color' => $data['cuantos_tv_color'],
            'cuantos_vehiculos' => $data['cuantos_vehiculos'],
            'nivel_instruccion' => $data['nivel_instruccion'],
            'afiliacion_salud_privada' => $data['afiliacion_salud_privada'],
            'ingresos_zona_rural' => $data['ingresos_zona_rural'],
            'ingresos_ciudad' => $data['ingresos_ciudad'],
            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
    }
}
