<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De29a59 extends Model
{
    protected $table = 'de29a59';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'peso', 'talla', 'imc', 'pcintura', 'pb',
        'visuales', 'auditivos', 'conducta', 'enfermedades_cronicas', 'dientes_sanos', 'consultaodon',
        'nocepillado', 'maltrato', 'alcohol', 'fuma', 'spa', 'desparacitado',
        'empleo', 'examen_prostata', 'citologia', 'examen_mama',
        'religion', 'queesvih', 'queescancerutero', 'queespapiloma', 'estado', 'id_compania', 'opci',
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

        return DB::connection('mysql')->table($alias . '.de29a59')->updateOrInsert([
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
            'pcintura' => $data['pcintura'],
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
            'examen_prostata' => $data['examen_prostata'],
            'citologia' => $data['citologia'],
            'examen_mama' => $data['examen_mama'],
            'religion' => $data['religion'],
            'queesvih' => $data['queesvih'],
            'queescancerutero' => $data['queescancerutero'],
            'queespapiloma' => $data['queespapiloma'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.de29a59')
            ->where('de29a59.id_hogar', $id_hogar)
            ->where('de29a59.estado', 'Activo')
            ->select("de29a59.*")
            ->selectRaw("CASE "
                . " WHEN de29a59.snom IS NULL THEN '' "
                . " WHEN de29a59.snom = '' THEN '' "
                . " ELSE de29a59.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN de29a59.sape IS NULL THEN '' "
                . " WHEN de29a59.sape = '' THEN '' "
                . " ELSE de29a59.sape "
                . " END sape"
                . " ")            
            ->get();
    }
}
