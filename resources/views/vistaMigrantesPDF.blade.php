<html>

<head>
    <style>
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

</head>
<div class="row">
    <div class="col-sm-12">
        <h2>Listado de migrantes</h2>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h4>Grupo de edades: {{$grupo}}</h4>
    </div>
</div>
<br>
<div class="row">
    <div class=" col-sm-12">
        <table class="table" style="width: 100%; font-size: 12px;">
            <thead style="background-color:beige">
                <tr>
                    <th style="width: 7%; text-align: center;">
                        No
                    </th>
                    <th style="width: 17%; text-align: center;">
                        Nombres completos
                    </th>
                    <th style="width: 7%; text-align: left;">
                        Identificacion
                    </th>
                    <th style="width: 10%; text-align: left;">
                        Localización
                    </th>
                    <th style="width: 5%; text-align: left;">
                        Edad
                    </th>
                    <th style="width: 5%; text-align: left;">
                        Genero
                    </th>
                    <th style="width: 10%; text-align: left;">
                        Pais
                    </th>
                    <th style="width: 10%;text-align: left;">
                        Eps
                    </th>
                    <th style="width: 10%;text-align: left;">
                        Ocupación
                    </th>
                </tr>

            </thead>
            <tbody>
                @foreach($integrantes as $viv)
                <tr>
                    <td style="text-align: center;">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->nombres}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->identificacion}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->localizacion}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->edad}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->genero}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->pais}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->eps}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->ocupacion}}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

</html>