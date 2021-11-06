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
        <h4>Listado de viviendas</h4>
    </div>
</div>
<br>
<br>
<br>
<br>
<div class="row">
    <div class=" col-sm-12">
        <table class="table" style="width: 100%; font-size: 12px;">
            <thead style="background-color:beige">
                <tr>
                    <th style="width: 7%; text-align: center;">
                        No
                    </th>
                    <th style="width: 7%; text-align: center;">
                        Id
                    </th>
                    <th style="width: 12%; text-align: left;">
                        Departamento
                    </th>
                    <th style="width: 17%; text-align: left;">
                        Municipio
                    </th>
                    <th style="width: 12%; text-align: left;">
                        Corregimiento
                    </th>
                    <th style="width: 12%; text-align: left;">
                        Vereda
                    </th>
                    <th style="text-align: left;">
                        Jefe de hogar
                    </th>
                </tr>

            </thead>
            <tbody>
                @foreach($viviendas as $viv)
                <tr>
                    <td style="text-align: center;">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->id}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->dpto}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->muni}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->corre}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->vereda}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->pnom}} {{$viv->snom}} {{$viv->pape}} {{$viv->sape}}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

</html>