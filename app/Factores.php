<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Factores extends Model
{
    protected $table = 'factores';
    protected $fillable = [
        'id_jefe', 'id_hogar', 'dialogos', 'sancion', 'castigo_verbal', 'castigo_fisico', 'alcohol',
        'tabaco', 'sustancias_psico', 'apuestas', 'violencia_fisica', 'violencia_psico', 'violencia_economica',
        'abuso_sexual', 'actividad_fisica', 'consumo_frutas', 'religiosos', 'sociales', 'culturales', 'recreativos',
        'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID JEFE
        $jefe = \App\Caracterizacion::buscar($data['identificacion'], $alias);
        // BUSCAR ID JEFE
        $data['id_jefe'] = $jefe->id;
        // BUSCAR ID INTEGRANTE

        return DB::connection('mysql')->table($alias . '.factores')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'id_jefe' => $data['id_jefe'],
            'dialogos' => $data['dialogos'],
            'sancion' => $data['sancion'],
            'castigo_verbal' => $data['castigo_verbal'],
            'castigo_fisico' => $data['castigo_fisico'],
            'alcohol' => $data['alcohol'],
            'tabaco' => $data['tabaco'],
            'sustancias_psico' => $data['sustancias_psico'],
            'apuestas' => $data['apuestas'],
            'violencia_fisica' => $data['violencia_fisica'],
            'violencia_psico' => $data['violencia_psico'],
            'violencia_economica' => $data['violencia_economica'],
            'id_compania' => 1,
            'estado' => 'Activo',
            'abuso_sexual' => $data['abuso_sexual'],
            'actividad_fisica' => $data['actividad_fisica'],
            'consumo_frutas' => $data['consumo_frutas'],
            'religiosos' => $data['religiosos'],
            'sociales' => $data['sociales'],
            'culturales' => $data['culturales'],
            'recreativos' => $data['recreativos']
        ]);        
    }
}
