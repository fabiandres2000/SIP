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
        <h4>Listado de integrantes</h4>
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
                        Identificación
                    </th>
                    <th style="width: 12%; text-align: left;">
                        Departamento
                    </th>
                    <th style="width: 17%; text-align: left;">
                        Municipio
                    </th>
                    <th style="width: 12%; text-align: left;">
                        Jefe Hogar
                    </th>
                    <th style="width: 12%; text-align: left;">
                        Edad
                    </th>
                    <th style="text-align: left;">
                        Ocupación
                    </th>
                    <th style="text-align: left;">
                        Tipo
                    </th>
                </tr>

            </thead>
            <tbody>
                @foreach($jefes as $viv)
                <tr>
                    <td style="text-align: center;">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center;">
                        {{$viv->identificacion}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->DPTO}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->MUNI}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->pnom}} {{$viv->snom}} {{$viv->pape}} {{$viv->sape}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->edad}}
                    </td>
                    <td style="text-align: left;">
                        {{$viv->textoOcupacion}}
                    </td>
                    
                    <td style="text-align: left;">
                        {{$viv->tipo}}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

</html>