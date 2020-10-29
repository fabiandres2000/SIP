<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    protected $table = 'codigos';
    protected $fillable = [
        'num', 'alias', 'id_compania', 'estado',
    ];

    public static function guardar($alias, $sigla)
    {

        $count = DB::connection('mysql')->table($alias . '.codigos')
            ->count();
        if ($count <= 0) {
            $num = 1;
        } else {
            $resp = DB::connection('mysql')->table($alias . '.codigos')
                ->orderBy('id', 'desc')->first();
            $num = $resp->num + 1;
        }
        $ali = substr($sigla, 0, 4);
        $respuesta = DB::connection('mysql')->table($alias . '.codigos')->updateOrInsert([
            'id' => 0,
        ], [
            'num' => $num,
            'alias' => $ali,
            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
        return $ali . $num;
    }
}
