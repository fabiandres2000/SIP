<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'gestantes' . '.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Reportes/Gestantes/gestantes', [
                'gestantes' => $gestantes, 
                'total_mujeres' => $total_mujeres, 
                'grupo' => $grupo,
                'ente'  => $ente,
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);
            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
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

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'nutricional' . '.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Reportes/Nutricional/nutricional', [
                'nutricional' => $nutricional, 
                'total_mujeres' => $total_mujeres, 
                'grupo' => $grupo,
                'ente'  => $ente,
            ])->setPaper('a3', 'landscape')
            ->save($ente.'/'.$nombre);
            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function listarcronicas()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $integrantes = \App\Reportes::listarcronicas(Session::get('alias'), $datos);
            $respuesta = [
                'integrantes' => $integrantes,
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

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $integrantes = \App\Reportes::listarcronicas(Session::get('alias'), $datos, $datos["tipo"]);
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('vistaCronicasPDF', [
                'integrantes' => $integrantes, 
                'grupo' => $grupo,
                'enfermedad' => $enfermedad,
                'ente'  => $ente,
            ])->setPaper('letter', 'landscape')
            ->save($ente.'/archivocronicas.pdf');

            $nombre = 'archivocronicas' . '.pdf';
            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
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

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'archivomigrantes.pdf';
            $integrantes = \App\Reportes::listarmigrantes(Session::get('alias'), $datos, $datos["tipo"]);
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('vistaMigrantesPDF', [
                'integrantes' => $integrantes,
                'grupo' => $grupo,
                'ente'  => $ente,
            ])->setPaper('letter', 'landscape')
            ->save($ente.'/archivomigrantes.pdf');

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function personas_discapacitadas()
    {
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');

            $discapacitados = \App\Reportes::discapacitados($tipo, $id, Session::get('alias'));
        
            $respuesta = [
                'discapacitados' => $discapacitados,
            ];

            return response()->json($respuesta, 200);
           
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }

    }

    public function exportaDiscapacitadosExcel() {
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 18,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FF2FA021',
                ],
                'endColor' => [
                    'argb' => 'FF2FA021',
                ],
            ],
        ];

        $styleArray2 = [
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FF2FA021',
                ],
                'endColor' => [
                    'argb' => 'FF2FA021',
                ],
            ],
        ];
        
        if (Auth::check()) {
            
            $datos = request()->get('datos');
            $titulo = request()->get('titulo');
           

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
            $nombre = $titulo.".xlsx";

            $spreadsheet = new Spreadsheet();
               
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Lista');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            
            $sheet->setCellValue('A1', $ente);
            $sheet->setCellValue('A2', $titulo);
            $sheet->setCellValue('A3', 'Listado de Personas Discapacitadas');

            $sheet->mergeCells('A1:F1');
            $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleArray);
            $sheet->mergeCells('A2:F2');
            $spreadsheet->getActiveSheet()->getStyle('A2:F2')->applyFromArray($styleArray);
            $sheet->mergeCells('A3:F3');
            $spreadsheet->getActiveSheet()->getStyle('A3:F3')->applyFromArray($styleArray);

            $sheet->setCellValue('A4', 'Identificación');
            $sheet->setCellValue('B4', 'Nombre');
            $sheet->setCellValue('C4', 'Edad');
            $sheet->setCellValue('D4', 'Discapacidad');
            $sheet->setCellValue('E4', 'Sexo');
            $sheet->setCellValue('F4', 'localización');
    

            $spreadsheet->getActiveSheet()->getStyle('A4:F4')->applyFromArray($styleArray2);

            $row = 5;
            foreach ($datos as $item) {
                $sheet->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                ->setCellValue("B{$row}", $item["pnom"]." ".$item["snom"]." ".$item["pape"]." ".$item["sape"])
                ->setCellValue("C{$row}", $item["edad"]." Años")
                ->setCellValue("D{$row}", $item["discapacidad"])
                ->setCellValue("E{$row}", $item["sexo"])
                ->setCellValue("F{$row}", $item["localizacion"]);

                ++$row;
            }
            
            $writer = new Xlsx($spreadsheet);
            $writer->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function adulto_mayor()
    {
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');

            $adulto_mayor = \App\Reportes::adulto_mayor($tipo, $id, Session::get('alias'));
        
            $respuesta = [
                'adulto_mayor' => $adulto_mayor,
            ];

            return response()->json($respuesta, 200);
           
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }

    }

    public function exportaAdultoMayorExcel() {
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 18,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FF2FA021',
                ],
                'endColor' => [
                    'argb' => 'FF2FA021',
                ],
            ],
        ];

        $styleArray2 = [
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FF2FA021',
                ],
                'endColor' => [
                    'argb' => 'FF2FA021',
                ],
            ],
        ];
        
        if (Auth::check()) {
            
            $datos = request()->get('datos');
            $titulo = request()->get('titulo');
           

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
            $nombre = $titulo.".xlsx";

            $spreadsheet = new Spreadsheet();
               
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Lista');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            
            $sheet->setCellValue('A1', $ente);
            $sheet->setCellValue('A2', $titulo);
            $sheet->setCellValue('A3', 'Listado de Adultos Mayores');

            $sheet->mergeCells('A1:E1');
            $spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);
            $sheet->mergeCells('A2:E2');
            $spreadsheet->getActiveSheet()->getStyle('A2:E2')->applyFromArray($styleArray);
            $sheet->mergeCells('A3:E3');
            $spreadsheet->getActiveSheet()->getStyle('A3:E3')->applyFromArray($styleArray);

            $sheet->setCellValue('A4', 'Identificación');
            $sheet->setCellValue('B4', 'Nombre');
            $sheet->setCellValue('C4', 'Edad');
            $sheet->setCellValue('D4', 'Sexo');
            $sheet->setCellValue('E4', 'localización');
    

            $spreadsheet->getActiveSheet()->getStyle('A4:E4')->applyFromArray($styleArray2);

            $row = 5;
            foreach ($datos as $item) {
                $sheet->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                ->setCellValue("B{$row}", $item["pnom"]." ".$item["snom"]." ".$item["pape"]." ".$item["sape"])
                ->setCellValue("C{$row}", $item["edad"]." Años")
                ->setCellValue("D{$row}", $item["sexo"])
                ->setCellValue("E{$row}", $item["localizacion"]);

                ++$row;
            }
            
            $writer = new Xlsx($spreadsheet);
            $writer->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function listarinfecciosas()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $integrantes = \App\Reportes::listarinfecciosas(Session::get('alias'), $datos);
            $respuesta = [
                'integrantes' => $integrantes,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function descolarizados()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $integrantes = \App\Reportes::descolarizados(Session::get('alias'), $datos);
            $respuesta = [
                'integrantes' => $integrantes,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function bajo_nivel_socioeconomico()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $integrantes = \App\Reportes::nivel_socioeconomico(Session::get('alias'), $datos);
            $respuesta = [
                'integrantes' => $integrantes,
            ];
            return response()->json($respuesta, 200);
        }
    }
}
