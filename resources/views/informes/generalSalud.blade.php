<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <style>
        @page { margin: 20px; }
        body { margin: 20px; }

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
    </style>
</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <h4>INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL</h4>
        </div>
    </div>
    <h4 style="color: #fd397a ">Caracterización</h4>
    <div class="row" style="padding: 10px">
        <div class="col-lg-12" style="padding-bottom: 10px;">
            <strong>1. Población por ciclo de vida</strong>
            <p> De acuerdo con la información recolectada, la poblacion caracterizada se compone de la siguiente manera por ciclo de vida:</p>
        </div>
        <div>
            <div style="float: left; text-align: left; width: 300px !important;">
                <ul>
                    <li class="li_li"><strong>Menores de un año: </strong> {{$poblacion_array["edades"]["personas0_1"][0]+$poblacion_array["edades"]["personas0_1"][1]}} Personas</li>
                    <li class="li_li"><strong>De 1 a 5 Años: </strong> {{$poblacion_array["edades"]["personas1_5"][0]+$poblacion_array["edades"]["personas1_5"][1]}} Personas</li>
                    <li class="li_li"><strong>De 6 a 11 Años: </strong> {{$poblacion_array["edades"]["personas6_11"][0]+$poblacion_array["edades"]["personas6_11"][1]}} Personas</li>
                    <li class="li_li"><strong>De 12 a 17 Años: </strong> {{$poblacion_array["edades"]["personas12_17"][0]+$poblacion_array["edades"]["personas12_17"][1]}} Personas</li>
                    <li class="li_li"><strong>De 18 a 28 Años: </strong> {{$poblacion_array["edades"]["personas18_28"][0]+$poblacion_array["edades"]["personas18_28"][1]}} Personas</li>
                    <li class="li_li"><strong>De 29 a 59 Años: </strong> {{$poblacion_array["edades"]["personas29_59"][0]+$poblacion_array["edades"]["personas29_59"][1]}} Personas</li>
                    <li class="li_li"><strong>Mayores de 60 Años </strong> {{$poblacion_array["edades"]["personas60"][0]+$poblacion_array["edades"]["personas60"][1]}} Personas</li>
                </ul>
            </div>
            <div style="float: left; text-align: center; width: 430px !important;">
                <img src="{{$chart_torta_edades}}" style="width: 100%;height: auto;max-width: 100%;">
            </div>
        </div>
    </div>
    <div style="padding-top: 50px !important">
        <div style="padding-top: 50px !important">
            <strong>2. Población menor de 5 años no asegurada</strong> 
            <p>
                Dentro de este grupo de edad se tiene una cantidad de <strong>{{ $poblacion_no_asegurada["no_asegurado_menor_5"]["cantidad_personas"] }} personas</strong>, de las cuales <strong>{{ $poblacion_no_asegurada["no_asegurado_menor_5"]["rural"] + $poblacion_no_asegurada["no_asegurado_menor_5"]["urbano"] }} personas</strong>, se encuentran en la situación de población menor de 5 años no asegurada, de lo cual se puede obtener que <strong>{{ $poblacion_no_asegurada["no_asegurado_menor_5"]["rural"] }} personas</strong> se encuentran en zona rural, y <strong>{{ $poblacion_no_asegurada["no_asegurado_menor_5"]["urbano"] }} personas</strong>  en zona urbana.
            </p>
            <div style="text-align: center; width: 100%">
                <img src="{{$chart_no_asegurado_1}}" style="width: 70%;height: auto;">
            </div> 
        </div>
    </div>
    <div style="padding: 10px">
        <div >
            <strong>3. Población adulto mayor no asegurada </strong> 
            <p>
                Dentro de este grupo de edad se tiene una cantidad de <strong>{{ $poblacion_no_asegurada["no_asegurado_mayor_60"]["cantidad_personas"] }} personas</strong>, de las cuales <strong>{{ $poblacion_no_asegurada["no_asegurado_mayor_60"]["rural"] + $poblacion_no_asegurada["no_asegurado_mayor_60"]["urbano"] }} personas</strong>, se encuentran en la situación de población adulto mayor no asegurada, de lo cual se puede obtener que <strong>{{ $poblacion_no_asegurada["no_asegurado_mayor_60"]["rural"] }} personas</strong> se encuentran en zona rural, y <strong>{{ $poblacion_no_asegurada["no_asegurado_mayor_60"]["urbano"] }} personas</strong>  en zona urbana.
            </p>
            <div style="text-align: center; width: 100%">
                <img src="{{$chart_no_asegurado_2}}" style="width: 70%;height: auto;">
            </div>
        </div>
    </div>
    <br>
    <br>
</body>
</html>