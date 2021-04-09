<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class AntecedentesIntegrantes extends Model
{
    protected $table = 'antecedentes_integrantes';
    protected $fillable = [
        'id_inte',
        'id_hogar',
        'id_antecedente',
        'estado',
        'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.antecedentes_integrantes')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_inte' => $data['id_inte'],
            'id_hogar' => $data['id_hogar'],
            'id_antecedente' => $data['id_antecedente'],
            'estado' => $data['estado'],
            'id_compania' => 1,
        ]);
    }

    public static function buscar($alias, $id_inte)
    {
        $ant = DB::connection('mysql')->table($alias . '.antecedentes_integrantes')
            ->join($alias . '.antecedentes', 'antecedentes.id', 'antecedentes_integrantes.id_antecedente')
            ->where('antecedentes_integrantes.id_inte', $id_inte)
            ->where('antecedentes_integrantes.estado', 'Activo')
            ->select("antecedentes_integrantes.*", "antecedentes.descripcion AS textoAntecedente");

        return $ant->get();

    }
}
