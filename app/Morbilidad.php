<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Morbilidad extends Model
{
    protected $table = 'morbilidad';
    protected $fillable = [
        'descripcion',
        'observacion',
        'estado',
        'id_compania',
    ];
    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.morbilidad')->where(function ($query) use ($busqueda) {
                $query->where('descripcion', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('observacion', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('estado', 'LIKE', '%' . $busqueda . '%');
            })
                ->orderBy('id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.morbilidad')->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.morbilidad')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'descripcion' => $data['descripcion'],
            'observacion' => $data['observacion'],
            'estado' => 'Activo',
            'id_compania' => 1,
        ]);
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.morbilidad')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscar($alias)
    {
        return DB::connection('mysql')->table($alias . '.morbilidad')->orderBy('descripcion', 'asc')
            ->where('estado', 'Activo')
            ->get();
    }
}
