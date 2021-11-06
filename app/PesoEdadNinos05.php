<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class PesoEdadNinos05 extends Model
{
    protected $table = 'peso_edad_ninos05';
    protected $fillable = [
        'meses', 'SD3neg', 'SD2neg', 'SD1neg',
        'SD0', 'SD1', 'SD2', 'SD3',
    ];
    public static function buscar($alias, $meses)
    {
        return DB::connection('mysql')->table($alias . '.peso_edad_ninos05')
            ->whereRaw("meses = $meses")
            ->orderBy('id', 'asc')
            ->first();
    }
}
