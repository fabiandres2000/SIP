<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De12a17 extends Model
{
    protected $table = 'de12a17';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'peso', 'talla', 'imc', 'pb',
        'visuales', 'auditivos', 'conducta', 'enfermedades_cronicas', 'dientes_sanos', 'consultaodon',
        'nocepillado', 'maltrato', 'alcohol', 'fuma', 'spa', 'desparacitado',
        'empleo', 'religion', 'queesvih', 'queescancerutero', 'queespapiloma',
        'queescancerseno', 'padre', 'madre', 'hermanos', 'conyuge', 'estado', 'id_compania', 'opci',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        if ($data['opci'] == "JEFE") {
            // BUSCAR ID JEFE
            $integrante = \App\Caracterizacion::buscar($data['identificacion'], $alias);
            // BUSCAR ID JEFE
        } else {
            // BUSCAR ID INTEGRANTE
            $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
            // BUSCAR ID INTEGRANTE
        }
        $data['id_integrante'] = $integrante->id;
        $data['estado'] = 'Activo';
        $data['id_compania'] = 1;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.de12a17')->create($data);
    }
}
