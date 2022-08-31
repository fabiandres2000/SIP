<!DOCTYPE html>
<html lang="en">
<head>
    <title>Informe de Pedidos por Empleados</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <style>
        
        table {
            width: 100%;
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
<body>
    <div class="row">
        <div class="col-sm-12">
            <h4>Listado de Barrios</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-sm-12">
            <table class="table" style="width: 100%; font-size: 12px;">
                <thead>
                    <tr>
                        <th style="width: 10%; text-align: left;">
                            No
                        </th>
                        <th style="width: 25%; text-align: left;">
                            Barrio
                        </th>
                        <th style="width: 20%; text-align: left;">
                            Departamento
                        </th>
                        <th style="width: 20%; text-align: left;">
                            Municipio
                        </th>
                        <th style="width: 25%; text-align: left;">
                            Corregimiento
                        </th>
                    </tr>
    
                </thead>
                <tbody>
                    @foreach ($barrios as $viv)
                        <tr>
                            <td style="text-align: left;font-weight: bold;vertical-align: middle;">
                                {{ $loop->iteration }}
                            </td>
                            <td
                                style="text-align: left;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                {{ $viv->BARRI }}
                            </td>
                            <td
                                style="text-align: left;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                {{ $viv->DEPARTAMENTO }}
                            </td>
                            <td
                                style="text-align: left;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                {{ $viv->MUNICIPIO }}
                            </td>
                            <td
                                style="text-align: left;font-weight: normal;vertical-align: middle;text-transform: capitalize;">
                                {{ $viv->CORREGI }}
                            </td>
                        </tr>
                    @endforeach
    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>