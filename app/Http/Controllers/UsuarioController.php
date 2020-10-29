<?php

namespace App\Http\Controllers;

use Auth;
use Session;

class UsuarioController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $opc = false;
        $mensaje = "";
        $resultado = \App\User::login(request()->get('email'), request()->get('password'));
        if ($resultado) {
            $alias = \App\User::consultarEnte($resultado->id);
            Session::put('alias', $alias->alias);
            Session::put('idusuario', $alias->alias);
            Session::put('sigla', $alias->sigla);
            $opc = true;
            $mensaje = "Usuario logueado";
            $respuesta = [
                'OPC' => $opc,
                'MENSAJE' => $mensaje,
            ];
            return response()->json($respuesta, 200);
        } else {
            $opc = false;
            $mensaje = "Usuario ó Contraseña Incorrecta";
            $respuesta = [
                'OPC' => $opc,
                'MENSAJE' => $mensaje,
            ];
            return response()->json($respuesta, 200);
        }
    }
    public function administracion()
    {
        if (Auth::check()) {
            return view('Administracion');
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $usuarios = \App\User::listar($busqueda);
            // dd($usuarios->lastPage());die;
            if ($usuarios) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $usuarios->total(),
                        'pagina_actual' => $usuarios->currentPage(),
                        'por_pagina' => $usuarios->perPage(),
                        'ultima_pagina' => $usuarios->lastPage(),
                        'desde' => $usuarios->firstItem(),
                        'hasta' => $usuarios->lastItem(),
                    ],
                    'usuarios' => $usuarios,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 500);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }

    }
    public function guardar()
    {
        if (Auth::check()) {
            $data = request()->all();
            request()->validate([
                'identificacion' => 'required|unique:users,identificacion',
                'nombre' => 'required',
                'email' => 'required|email|unique:users,email',
                'rol' => 'required',
                'celular' => 'required',
                'usuario' => 'required|unique:users,usuario',
                'password' => 'required|min:5',
                'confPassword' => 'required|min:5',
            ], [
                'identificacion.required' => 'La identificación es obligatorio',
                'identificacion.unique' => 'La identificación ya se encuentra registrada',
                'nombre.required' => 'El Nombre es obligatorio',
                'email.required' => 'El email es obligatorio',
                'email.unique' => 'El email ya se encuentra registrado',
                'email.email' => 'El email debe ser valido',
                'rol.required' => 'El rol es obligatorio',
                'celular.required' => 'El celular es obligatorio',
                'usuario.required' => 'El usuario es obligatorio',
                'usuario.unique' => 'El usuario ya se encuentra registrado',
                'password.required' => 'La contraseña es obligatoria',
                'password.min' => 'La contraseña debe tener minimo 5 caracteres',
                'confPassword.required' => 'Confirmar la contraseña es obligatorio',
                'confPassword.min' => 'La contraseña debe tener minimo 5 caracteres',
            ]);
            $usuarios = \App\User::guardar($data);
            if ($usuarios) {
                $respuesta = [
                    'OPC' => 'SI',
                    'usuarios' => $usuarios,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Usuario No Guardado...",
                ];
                return response()->json($respuesta, 500);

            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function eliminar()
    {
        if (Auth::check()) {
            $mensaje = "";
            $id = request()->get('id');
            $estado = request()->get('estado');
            if ($estado == "Activo") {
                $estado = "Inactivo";
            } else {
                $estado = "Activo";
            }
            $respuesta = \App\User::editarestado($estado, $id);
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function modificar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $id = $data['id'];
            $usuario = \App\User::buscarUsuario($id);
            request()->validate([
                'identificacion' => 'required|unique:users,identificacion,' . $usuario->id,
                'nombre' => 'required',
                'email' => 'required|email|unique:users,email,' . $usuario->id,
                'rol' => 'required',
                'celular' => 'required',
                'usuario' => 'required|unique:users,usuario,' . $usuario->id,
            ], [
                'identificacion.required' => 'La identificación es obligatorio',
                'identificacion.unique' => 'La identificación ya se encuentra registrada',
                'nombre.required' => 'El Nombre es obligatorio',
                'email.required' => 'El email es obligatorio',
                'email.unique' => 'El email ya se encuentra registrado',
                'email.email' => 'El email debe ser valido',
                'rol.required' => 'El rol es obligatorio',
                'celular.required' => 'El celular es obligatorio',
                'usuario.required' => 'El usuario es obligatorio',
                'usuario.unique' => 'El usuario ya se encuentra registrado',
            ]);
            $resp = \App\User::modificar($data, $id);
            if ($resp) {
                $usuarios = \App\User::buscarUsuario($id);
                $respuesta = [
                    'OPC' => 'SI',
                    'usuarios' => $usuarios,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Usuario No Guardado...",
                ];
                return response()->json($respuesta, 500);

            }
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        $respuesta = [
            'OPC' => "SI",
        ];
        return response()->json($respuesta, 200);
        // return redirect('/')->with('success', 'Sesion Finalizada');
    }
    public function iniciar()
    {
        $respuesta = [
            'OPC' => "SI",
            'nombreUsuario' => Auth::user()->nombre,
            'rolUsuario' => Auth::user()->rol,
        ];
        return response()->json($respuesta, 200);
        // return redirect('/')->with('success', 'Sesion Finalizada');
    }
}
