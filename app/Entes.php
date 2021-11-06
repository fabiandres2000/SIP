<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Entes extends Model
{
    protected $table = 'entes';
    protected $fillable = [
        'nombre', 'estado', 'alias', 'sigla', 'poblacion', 'viviendas',
    ];

    public static function listar($busqueda)
    {
        if (!empty($busqueda)) {
            $respuesta = \App\Entes::where(function ($query) use ($busqueda) {
                $query->where('nombre', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('alias', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('sigla', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('estado', 'LIKE', '%' . $busqueda . '%');
            })
                ->orderBy('id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = \App\Entes::orderBy('id', 'DESC')
                ->paginate(10);
        }

        return $respuesta;
    }

    public static function guardar($data)
    {
        return \App\Entes::updateOrCreate([
            'id' => $data['id'],
        ], [
            'nombre' => $data['nombre'],
            'alias' => $data['alias'],
            'sigla' => $data['sigla'],
            'poblacion' => $data['poblacion'],
            'viviendas' => $data['viviendas'],
            'estado' => $data['estado'],
        ]);
    }

    public static function editarestado($estado, $id)
    {
        return Entes::where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarEnte($id)
    {
        return Entes::findOrFail($id);
    }

    public static function todos()
    {
        return Entes::where('estado', 'Activo')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public static function mostrar()
    {
        $respuesta = \App\User::join('usuarios_permisos', 'usuarios_permisos.id_usuario', 'users.id')
            ->join("entes", "usuarios_permisos.id_ente", "entes.id")
            ->where('usuarios_permisos.id_usuario', Auth::user()->id)
            ->where('usuarios_permisos.estado', 'Activo')
            ->where('entes.id', '!=', Auth::user()->permisos->where('actual', 1)->first()->ente->id)
            ->select("entes.*")
            ->get();
        return $respuesta;
    }

    public function usuario_ente()
    {
        return $this->hasOne(\App\UserPermisos::class, 'id_ente');
    }
}
