<!DOCTYPE html>
<html lang="en">
<head>
    <title>Analfabetas</title>
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
            color: #212529;
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
    </style>
</head>
<body>
    <footer>
        {{$ente}} - Fecha de reporte: <?php echo date("d/m/Y H:i:s");?> 
    </footer>
    <main>
        @if ($tipo == 1)
            <h2 style="color: #5578eb; margin: 2px">Analfabetismo (Mayores de 15 años)</h2>  
        @else
            <h2 style="color: #5578eb; margin: 2px">Analfabetismo (Menores de 15 años)</h2>
        @endif
        <div style="padding: 10px">
            <img src="{{$filtro}}" alt="grafico 1" style="width: 120%;height: auto;max-width: 120%;">
        </div>
        <hr>
        <div style="padding: 10px;">
            <img src="{{$grafico1}}" alt="grafico 1" style="width: 100%;height: auto;max-width: 100%;">
        </div>
        <div style="text-align: center">
            <h3>Población analfabeta por grupo de edades</h3>
            <br>
            <img src="{{$torta}}" alt="grafico 1" style="height: 260px"><br>
            <img src="{{$hm}}" alt="grafico 1" style="width: 450px">
        </div>
        <div style="page-break-after:always;"></div>
        <div style="padding: 10px">
            <h1>Listado de personas analfabetas</h1>
            <br>
            <table class="table" style="width: 100%; font-size: 13px">
                <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Sexo
                    </th>
                    <th>
                        Edad
                    </th>
                    <th>
                        Localizacion
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($datos["jefesAnalfabetas"] as $item)
                    <tr>
                        <td>
                            {{$item["tipo_id"]}} - {{$item["identificacion"]}}
                        </td>
                        <td>
                            {{$item["pnom"]}} {{$item["snom"]}} {{$item["pape"]}} {{$item["sape"]}}
                        </td>
                        <td>
                            {{$item["sexo"]}}
                        </td>
                        <td>
                            {{$item["edad"]}} Años
                        </td>
                        <td>
                            {{$item["localizacion"]}}
                        </td>
                    </tr>
                @endforeach
                @foreach($datos["integrantesAnalfabetas"] as $item)
                    <tr>
                        <td>
                            {{$item["tipo_id"]}} - {{$item["identificacion"]}}
                        </td>
                        <td>
                            {{$item["pnom"]}} {{$item["snom"]}} {{$item["pape"]}} {{$item["sape"]}}
                        </td>
                        <td>
                            {{$item["sexo"]}}
                        </td>
                        <td>
                            {{$item["edad"]}} Años
                        </td>
                        <td>
                            {{$item["localizacion"]}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>    
</body>
</html>