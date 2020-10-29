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

        // BUSCAR ID INTEGRANTE

        return DB::connection('mysql')->table($alias . '.de12a17')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_integrante' => $integrante->id,
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $integrante->identificacion,
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'sexo' => $data['sexo'],
            'edad' => $data['edad'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'pb' => $data['pb'],
            'visuales' => $data['visuales'],
            'auditivos' => $data['auditivos'],
            'conducta' => $data['conducta'],
            'enfermedades_cronicas' => $data['enfermedades_cronicas'],
            'dientes_sanos' => $data['dientes_sanos'],
            'consultaodon' => $data['consultaodon'],
            'nocepillado' => $data['nocepillado'],
            'maltrato' => $data['maltrato'],
            'alcohol' => $data['alcohol'],
            'fuma' => $data['fuma'],
            'spa' => $data['spa'],
            'desparacitado' => $data['desparacitado'],
            'empleo' => $data['empleo'],
            'religion' => $data['religion'],
            'queesvih' => $data['queesvih'],
            'queescancerutero' => $data['queescancerutero'],
            'queespapiloma' => $data['queespapiloma'],
            'queescancerseno' => $data['queescancerseno'],
            'padre' => $data['padre'],
            'madre' => $data['madre'],
            'hermanos' => $data['hermanos'],
            'conyuge' => $data['conyuge'],
            'estado' => 'Activo',
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);       
    }
}
