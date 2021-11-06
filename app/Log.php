<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;
use Session;

class Log extends Model
{
    protected $table = 'log';
    protected $fillable = [
        'id_usuario', 'accion', 'fecha', 'hora', 'id_compania', 'estado', 'ip', 'modulo',
    ];

    public static function guardar($accion, $alias, $modulo = '')
    {
        return DB::connection('mysql')->table($alias . '.log')->insert([
            'id_usuario' => Auth::user()->id,
            'accion' => $accion,
            'id_compania' => 1,
            'estado' => 'Activo',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'ip' => Session::get('ip', '0.0.0.0'),
            'modulo' => $modulo,
        ]);
    }
}
