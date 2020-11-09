<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password', 'rol', 'usuario', 'estado', 'identificacion', 'celular', 'direccion', 'id_compania',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function login($usua, $pass)
    {
        $usuario = User::where(function ($query) use ($usua) {
            $query->where('email', $usua)
                ->orWhere('usuario', $usua);
        })
            ->where('estado', 'Activo')
            ->first();
        if ($usuario && \Hash::check($pass, $usuario->password)) {
            auth()->loginUsingId($usuario->id);
            return $usuario;
        }
        return false;
    }
    public static function listar($busqueda)
    {
        if (!empty($busqueda)) {
            $respuesta = User::where(function ($query) use ($busqueda) {
                $query->where('nombre', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('email', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('rol', 'LIKE', '%' . $busqueda . '%');
            })
                ->orderBy('id', 'DESC')
                ->paginate(2);
        } else {
            $respuesta = User::orderBy('id', 'DESC')
                ->paginate(2);
        }

        return $respuesta;
    }
    public static function guardar($data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'estado' => 'Activo',
            'identificacion' => $data['identificacion'],
            'rol' => $data['rol'],
            'celular' => $data['celular'],
            'usuario' => $data['usuario'],
            'direccion' => $data['direccion'],
            'id_compania' => 1,
        ]);
    }
    public static function editarestado($estado, $id)
    {
        return User::where('id', $id)->update([
            'estado' => $estado,
        ]);
    }
    public static function modificar($data, $id)
    {
        $respuesta = User::where(['id' => $id])->update([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'identificacion' => $data['identificacion'],
            'rol' => $data['rol'],
            'celular' => $data['celular'],
            'usuario' => $data['usuario'],
            'direccion' => $data['direccion'],
        ]);
        return $respuesta;
    }
    public static function buscarUsuario($id)
    {
        return User::findOrFail($id);
    }

    public static function consultarEnte($id_user)
    {
        return User::join('entes', 'users.id_entidad', 'entes.id')
            ->where('users.id', $id_user)
            ->select('entes.alias', 'entes.id', 'entes.sigla', 'entes.poblacion','entes.viviendas')
            ->first();
    }
}
