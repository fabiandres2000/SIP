<html>

<head>
    <meta charset="utf-8" />
    <title>
        Reporte Nutricional
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        /* tr:nth-child(even) {
            background-color: #f2f2f2;
        } */
        table {
            width: 100%;
            /*border: 1px solid #000;*/
            font-size: 20px;
            border-collapse: collapse;
        }

        thead {
            padding: 0.3em;
            color: #fff;
            background: #5578eb;
        }

        th,
        td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            padding: 0.3em;
            caption-side: bottom;
            /* border-bottom: 1px solid #999;
            border-right: 1px solid #000; */
        }

        th.last,
        td.last {
            border-right: 0;
        }

        th:lastchild,
        td:lastchild {
            border-right: 0;
        }

        tbody tr:nth-child(odd) {
            background-color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f1f1f1;
        }

    </style>
</head>

<div class="row">
    <div class="col-sm-12">
        <h4>Reporte de Gestantes</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h5><b>Grupo de edades:</b> {{ $grupo }}</h5>
    </div>
</div>
@php
// $porceMujeres = (count($gestantes) * 100) / $total_mujeres;
@endphp
{{-- <div class="row">
    <div class="col-sm-12">
        <h5>Tabla de mujeres gestantes: {{ count($gestantes) }} - {{ round($porceMujeres, 2) }}% población en edad
            fertil</h5>
    </div>
</div> --}}
<div class="row">
    <div class=" col-sm-12">
        <table class="table" style="width: 100%; font-size: 12px;">
            <thead>
                <tr>
                    <th style="width: 3%; text-align: center;">
                        No
                    </th>
                    <th style="width: 10%; text-align: left;">
                        Identificación
                    </th>
                    <th style="width: 15%; text-align: left;">
                        Nombre
                    </th>
                    <th style="width: 3%; text-align: center;">
                        Sexo
                    </th>
                    <th style="width: 3%; text-align: center;">
                        Edad
                    </th>                    
                    <th style="width: 25%; text-align: left;">
                        Localización
                    </th>
                    <th style="width: 3%; text-align: center;">
                        Inst. Educativo
                    </th>
                    <th style="width: 10%; text-align: left;">
                        Enfermedad
                    </th>
                    <th style="width: 15%; text-align: center;">
                        Eps
                    </th>
                </tr>

            </thead>
            <tbody>
                @foreach ($nutricional as $viv)
                    <tr>
                        <td style="text-align: center;font-weight: bold;vertical-align: middle;">
                            {{ $loop->iteration }}
                        </td>
                        <td
                            style="text-align: left;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                            {{ strtolower($viv->identificacion) }}
                        </td>
                        <td
                            style="text-align: left;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                            {{ strtolower($viv->nombres) }}
                        </td>
                        <td
                            style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                            {{ strtolower($viv->sexo) }}
                        </td>       
                        <td
                            style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                            {{ strtolower($viv->edad) }}
                        </td>                                         
                        <td
                            style="text-align: left;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                            {{ strtolower($viv->localizacion) }}
                        </td>
                        <td
                            style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                            {{ strtolower($viv->textoColegio) }}
                        </td>
                        <td
                            style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">

                        </td>
                        <td
                            style="text-align: center;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                            {{ strtolower($viv->textoEps) }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

</html>
