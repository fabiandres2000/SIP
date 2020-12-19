<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De60 extends Model
{
    protected $table = 'de60';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'grupo_ayudas', 'peso', 'talla', 'imc', 'pa', 'glicemia',
        'cigarrillo', 'alcohol', 'actividad_fisica', 'sintomatico', 'examen_seno', 'citologia',
        'colposcopia', 'examen_prostata', 'biposia_prostata', 'agudeza_visual', 'subsidio', 'enfermedades_cronicas',
        'enfermedades_infecciosas', 'estado', 'id_compania', 'opci','empleo'
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

        return DB::connection('mysql')->table($alias . '.de60')->updateOrInsert([
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
            'grupo_ayudas' => $data['grupo_ayudas'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'pa' => $data['pa'],
            'glicemia' => $data['glicemia'],
            'cigarrillo' => $data['cigarrillo'],
            'alcohol' => $data['alcohol'],
            'actividad_fisica' => $data['actividad_fisica'],
            'sintomatico' => $data['sintomatico'],
            'examen_seno' => $data['examen_seno'],
            'citologia' => $data['citologia'],
            'colposcopia' => $data['colposcopia'],
            'examen_prostata' => $data['examen_prostata'],
            'biposia_prostata' => $data['biposia_prostata'],
            'agudeza_visual' => $data['agudeza_visual'],
            'subsidio' => $data['subsidio'],
            'enfermedades_cronicas' => $data['enfermedades_cronicas'],
            'enfermedades_infecciosas' => $data['enfermedades_infecciosas'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
            'empleo' => $data['empleo'],
        ]);        
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.de60')
            ->where('de60.id_hogar', $id_hogar)
            ->where('de60.estado', 'Activo')
            ->select("de60.*")
            ->selectRaw("CASE "
                . " WHEN de60.snom IS NULL THEN '' "
                . " WHEN de60.snom = '' THEN '' "
                . " ELSE de60.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN de60.sape IS NULL THEN '' "
                . " WHEN de60.sape = '' THEN '' "
                . " ELSE de60.sape "
                . " END sape"
                . " ")            
            ->get();
    }
    
    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de60')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }    
}
