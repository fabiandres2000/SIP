<!DOCTYPE html>
<html lang="en">
<head>
    <title>Riesgo Salud</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <style>
        @page { margin: 10px; }
        body { margin: 10px; }

        @font-face {
            font-family: 'Poppins', sans-serif;
            src: url('{{ public_path('fonts/Poppins/Poppins-Medium.tff') }}');
        }
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #646c9a;
            text-align: left;
            background-color: #fff;
        }

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
        h3, h2, h1, h4, h5, p {
            margin: 4px !important;
        }

        footer {
            position: fixed; 
            bottom: -25px; 
            left: 0px; 
            right: 0px;
            height: 50px; 
            font-size: 10px;
            /** Extra personal styles **/
            color: black;
            text-align: right;
            line-height: 35px;
            font-style: italic;
        }

        .kt-badge--warning {
            color: rgb(0, 0, 0);
            background: #ffb822;
        }

        .kt-badge--success {
            color: #fff;
            background: #28a745;
        }

        .kt-badge--danger {
            color: #fff;
            background: #dc3545;
        }

    </style>
</head>
<body>
    <footer>
        {{$ente}} - Fecha de reporte: <?php echo date("d/m/Y H:i:s");?> 
    </footer>
    <main>
        <h3 style="color: #5578eb; margin: 2px">Riesgo ({{$riesgo}})</h3>  
        <div>
            <img src="{{$filtro}}" alt="grafico 1" style="width: 135%;height: auto;max-width: 135%;">
        </div>
        <hr>
        <div style="text-align: center">
            <h3>Numero de personas por nivel de riesgo</h3>
            <img src="{{$grafico2}}" alt="grafico 1" style="width: 80%;height: auto;max-width: 80%;">
        </div>
        <br>
        <div style="text-align: center">
            <h3>Porcentaje de personas por nivel de riesgo</h3>
            <img src="{{$grafico1}}" alt="grafico 1" style="width: 80%;height: auto;max-width: 80%;">
        </div>
        <div style="page-break-after:always;"></div>
        <div>
            <h3>Poblacion Caracterizada</h3>
            <h4 style="color: #5578eb; margin: 2px">Riesgo ({{$riesgo}})</h4>  
            <br>  
            <table class="table" style="width: 100%; font-size: 11px">
                <thead>
                    <tr>
                        <th>
                            Nombre
                        </th>            
                        <th>
                           Corregimiento
                        </th>
                        <th>
                            Barrio
                        </th>
                        <th>
                            Direccion
                        </th>
                        <th style="text-align: center">
                            Riesgo Inherente
                        </th>
                        <th style="text-align: center">
                            Riesgo Residual
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>
                            {{$item["nombre"]}}
                        </td>
                        <td>
                            {{$item["corregimiento"]}}
                        </td>
                        <td>
                            {{$item["barrio"]}}
                        </td>
                        <td>
                            {{$item["direccion"]}}
                        </td>
                        <td style="text-align: center">
                          <p class=' {{$item["cInherente"]}} '>{{$item["Inherente"]}} - {{$item["vInherente"]}}</p>  
                        </td>
                        <td style="text-align: center">
                           <p class=' {{$item["cResidual"]}} '>{{$item["Residual"]}} - {{$item["vResidual"]}}</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>    
        </div>   
    </main> 
</body>
</html>