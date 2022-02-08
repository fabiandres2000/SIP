<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class ReportesController extends Controller
{
    public function gestantes()
    {
        if (Auth::check()) {
            $rango = request()->get('rango');
            $tipo = request()->get('tipo');
            $gestantes = \App\Reportes::gestantes($rango, $tipo, Session::get('alias'));
            $total_mujeres = \App\Reportes::poblacionTotalMujeres(Session::get('alias'));
            if ($gestantes) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $gestantes->total(),
                        'pagina_actual' => $gestantes->currentPage(),
                        'por_pagina' => $gestantes->perPage(),
                        'ultima_pagina' => $gestantes->lastPage(),
                        'desde' => $gestantes->firstItem(),
                        'hasta' => $gestantes->lastItem(),
                    ],
                    'gestantes' => $gestantes,
                    'total_mujeres' => $total_mujeres,
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

    public function exportarGestantes()
    {
        if (Auth::check()) {
            $rango = request()->get('rango');
            $tipo = request()->get('tipo');
            $gestantes = \App\Reportes::gestantes($rango, $tipo, Session::get('alias'));
            $total_mujeres = \App\Reportes::poblacionTotalMujeres(Session::get('alias'));

            $grupo = "Todos";
            if ($rango == "0-") {
                $grupo = "Menores de 1 año";
            } else if ($rango == "r1-5") {
                $grupo = "De 1 a 5 años";
            } else if ($rango == "r6-11") {
                $grupo = "De 6 a 11 años";
            } else if ($rango == "r12-17") {
                $grupo = "De 12 a 17 años";
            } else if ($rango == "r18-28") {
                $grupo = "De 18 a 28 años";
            } else if ($rango == "r29-59") {
                $grupo = "De 29 a 59 años";
            } else if ($rango == "r60+") {
                $grupo = "Mayores de 60 años";
            }
            $nombre = 'gestantes' . '.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Reportes/Gestantes/gestantes', ['gestantes' => $gestantes, 'total_mujeres' => $total_mujeres, 'grupo' => $grupo])
                ->setPaper('a4', 'landscape')
                ->save($nombre);
            $respuesta = [
                'nombre' => $nombre,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function nutricional()
    {
        if (Auth::check()) {
            $rango = request()->get('rango');
            $tipo = request()->get('tipo');
            $nutricional = \App\Reportes::nutricional($rango, $tipo, Session::get('alias'));
            $total_mujeres = \App\Reportes::poblacionTotalMujeres(Session::get('alias'));
            if ($nutricional) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $nutricional->total(),
                        'pagina_actual' => $nutricional->currentPage(),
                        'por_pagina' => $nutricional->perPage(),
                        'ultima_pagina' => $nutricional->lastPage(),
                        'desde' => $nutricional->firstItem(),
                        'hasta' => $nutricional->lastItem(),
                    ],
                    'nutricional' => $nutricional,
                    'total_mujeres' => $total_mujeres,
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

    public function exportarNutricional()
    {
        if (Auth::check()) {
            $rango = request()->get('rango');
            $tipo = request()->get('tipo');
            $nutricional = \App\Reportes::nutricional($rango, $tipo, Session::get('alias'));
            $total_mujeres = \App\Reportes::poblacionTotalMujeres(Session::get('alias'));

            $grupo = "Todos";
            if ($rango == "0-") {
                $grupo = "Menores de 1 año";
            } else if ($rango == "r1-5") {
                $grupo = "De 1 a 5 años";
            } else if ($rango == "r6-11") {
                $grupo = "De 6 a 11 años";
            } else if ($rango == "r12-17") {
                $grupo = "De 12 a 17 años";
            } else if ($rango == "r18-28") {
                $grupo = "De 18 a 28 años";
            } else if ($rango == "r29-59") {
                $grupo = "De 29 a 59 años";
            } else if ($rango == "r60+") {
                $grupo = "Mayores de 60 años";
            }
            $nombre = 'gestantes' . '.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Reportes/Nutricional/nutricional', ['nutricional' => $nutricional, 'total_mujeres' => $total_mujeres, 'grupo' => $grupo])
                ->setPaper('a4', 'landscape')
                ->save($nombre);
            $respuesta = [
                'nombre' => $nombre,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function listarcronicas()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $enfermedades = \App\EnfermedadesCro::todas(Session::get('alias'));
            $integrantes = \App\Reportes::listarcronicas(Session::get('alias'), $datos, $datos["tipo"]);
            $respuesta = [
                'paginacion' => [
                    'total' => $integrantes->total(),
                    'pagina_actual' => $integrantes->currentPage(),
                    'por_pagina' => $integrantes->perPage(),
                    'ultima_pagina' => $integrantes->lastPage(),
                    'desde' => $integrantes->firstItem(),
                    'hasta' => $integrantes->lastItem(),
                ],
                'integrantes' => $integrantes,
                'enfermedades' => $enfermedades,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function listarcronicaspdf()
    {
        if (Auth::check()) {
            $datos = request()->all();
            //dd($datos);die;
            $enfermedad = "Todas";
            $enf = \App\Reportes::enfermedadcronica(Session::get('alias'), $datos["datos"]["enfermedad"]);
            if ($enf) {
                $enfermedad = $enf->descripcion;
            }
            $grupo = "Todos";
            if ($datos["datos"]["rangoEdad"] == "0-") {
                $grupo = "Menores de 1";
            } else if ($datos["datos"]["rangoEdad"] == "r1-5") {
                $grupo = "De 1 a 5 años";
            } else if ($datos["datos"]["rangoEdad"] == "r6-11") {
                $grupo = "De 6 a 11 años";
            } else if ($datos["datos"]["rangoEdad"] == "r12-17") {
                $grupo = "De 12 a 17 años";
            } else if ($datos["datos"]["rangoEdad"] == "r18-28") {
                $grupo = "De 18 a 28 años";
            } else if ($datos["datos"]["rangoEdad"] == "r29-59") {
                $grupo = "De 29 a 59";
            } else if ($datos["datos"]["rangoEdad"] == "r60+") {
                $grupo = "Mayores de 60";
            }
            $integrantes = \App\Reportes::listarcronicas(Session::get('alias'), $datos, $datos["tipo"]);
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('vistaCronicasPDF', ['integrantes' => $integrantes, 'grupo' => $grupo,
                'enfermedad' => $enfermedad])
                ->setPaper('letter', 'landscape')
                ->save('archivocronicas.pdf');

                $nombre = 'archivocronicas' . '.pdf';
                $respuesta = [
                    'nombre' => $nombre,
                ];
                return response()->json($respuesta, 200);
        }
    }

    public function listarmigrantes()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $integrantes = \App\Reportes::listarmigrantes(Session::get('alias'), $datos, $datos["tipo"]);
            $respuesta = [
                'paginacion' => [
                    'total' => $integrantes->total(),
                    'pagina_actual' => $integrantes->currentPage(),
                    'por_pagina' => $integrantes->perPage(),
                    'ultima_pagina' => $integrantes->lastPage(),
                    'desde' => $integrantes->firstItem(),
                    'hasta' => $integrantes->lastItem(),
                ],
                'integrantes' => $integrantes,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function listarmigrantespdf()
    {
        if (Auth::check()) {
            $datos = request()->all();
            //dd($datos);die;
            $grupo = "Todos";
            if ($datos["datos"]["rangoEdad"] == "0-") {
                $grupo = "Menores de 1";
            } else if ($datos["datos"]["rangoEdad"] == "r1-5") {
                $grupo = "De 1 a 5 años";
            } else if ($datos["datos"]["rangoEdad"] == "r6-11") {
                $grupo = "De 6 a 11 años";
            } else if ($datos["datos"]["rangoEdad"] == "r12-17") {
                $grupo = "De 12 a 17 años";
            } else if ($datos["datos"]["rangoEdad"] == "r18-28") {
                $grupo = "De 18 a 28 años";
            } else if ($datos["datos"]["rangoEdad"] == "r29-59") {
                $grupo = "De 29 a 59";
            } else if ($datos["datos"]["rangoEdad"] == "r60+") {
                $grupo = "Mayores de 60";
            }
            $nombre = 'archivomigrantes' . '.pdf';
            $integrantes = \App\Reportes::listarmigrantes(Session::get('alias'), $datos, $datos["tipo"]);
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('vistaMigrantesPDF', [
                'integrantes' => $integrantes,
                'grupo' => $grupo,
            ])
                ->setPaper('letter', 'landscape')
                ->save('archivomigrantes.pdf');

                $respuesta = [
                    'nombre' => $nombre,
                ];
                return response()->json($respuesta, 200);
        }
    }
}
