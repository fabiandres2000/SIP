<template>
    <div style="margin-top: -4%" id="divPadre">
        <div class="row" id="divHijo">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4>INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL</h4>
                            </div>
                            <div class="col-sm-3 text-right">
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    v-on:click="generarPDF"
                                >
                                    <i class="la la-pdf"></i>
                                    <span class="kt-hidden-mobile">Generar PDF</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="text-align: left;">
                        <h4 style="color: #fd397a ">Caracterización</h4>
                        <div class="row" style="padding: 10px">
                            <div v-if="poblacion_array != null" class="col-lg-12" style="padding-bottom: 10px;">
                                <strong>1. Población por ciclo de vida</strong>
                                <p> De acuerdo con la información recolectada, la poblacion caracterizada se compone de la siguiente manera por ciclo de vida:</p>
                            </div>
                            <div v-if="poblacion_array != null" class="col-lg-5">
                                <ul>
                                    <li class="li_li"><strong>Menores de un año: </strong> {{poblacion_array.edades.personas0_1[0]+poblacion_array.edades.personas0_1[1]}} Personas</li>
                                    <li class="li_li"><strong>De 1 a 5 Años: </strong> {{poblacion_array.edades.personas1_5[0]+poblacion_array.edades.personas1_5[1]}} Personas</li>
                                    <li class="li_li"><strong>De 6 a 11 Años: </strong> {{poblacion_array.edades.personas6_11[0]+poblacion_array.edades.personas6_11[1]}} Personas</li>
                                    <li class="li_li"><strong>De 12 a 17 Años: </strong> {{poblacion_array.edades.personas12_17[0]+poblacion_array.edades.personas12_17[1]}} Personas</li>
                                    <li class="li_li"><strong>De 18 a 28 Años: </strong> {{poblacion_array.edades.personas18_28[0]+poblacion_array.edades.personas18_28[1]}} Personas</li>
                                    <li class="li_li"><strong>De 29 a 59 Años: </strong> {{poblacion_array.edades.personas29_59[0]+poblacion_array.edades.personas29_59[1]}} Personas</li>
                                    <li class="li_li"><strong>Mayores de 60 Años </strong> {{poblacion_array.edades.personas60[0]+poblacion_array.edades.personas60[1]}} Personas</li>
                                </ul>
                            </div>
                            <div class="col-lg-7 text-center" style="padding-top: 30px">
                                <div id="chartdiv_edades_torta" style="width: 100%; height: 200px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-12">
                                <strong>2. Población menor de 5 años no asegurada</strong> 
                                <p v-if="poblacion_no_asegurada != null">
                                    Dentro de este grupo de edad se tiene una cantidad de <strong>{{ poblacion_no_asegurada.no_asegurado_menor_5.cantidad_personas }} personas</strong>, de las cuales <strong>{{ poblacion_no_asegurada.no_asegurado_menor_5.rural + poblacion_no_asegurada.no_asegurado_menor_5.urbano }} personas</strong>, se encuentran en la situación de población menor de 5 años no asegurada, de lo cual se puede obtener que <strong>{{ poblacion_no_asegurada.no_asegurado_menor_5.rural }} personas</strong> se encuentran en zona rural, y <strong>{{ poblacion_no_asegurada.no_asegurado_menor_5.urbano }} personas</strong>  en zona urbana.
                                </p>
                                <div id="chartdiv_no_asegurado_1" style="width: 100%; height: 270px"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-12">
                                <strong>3. Población adulto mayor no asegurada </strong> 
                                <p v-if="poblacion_no_asegurada != null">
                                    Dentro de este grupo de edad se tiene una cantidad de <strong>{{ poblacion_no_asegurada.no_asegurado_mayor_60.cantidad_personas }} personas</strong>, de las cuales <strong>{{ poblacion_no_asegurada.no_asegurado_mayor_60.rural + poblacion_no_asegurada.no_asegurado_mayor_60.urbano }} personas</strong>, se encuentran en la situación de población adulto mayor no asegurada, de lo cual se puede obtener que <strong>{{ poblacion_no_asegurada.no_asegurado_mayor_60.rural }} personas</strong> se encuentran en zona rural, y <strong>{{ poblacion_no_asegurada.no_asegurado_mayor_60.urbano }} personas</strong>  en zona urbana.
                                </p>
                                <div id="chartdiv_no_asegurado_2" style="width: 100%; height: 270px"></div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h4 style="color: #fd397a ">Determinante social de la salud</h4>
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-12">
                                <strong>1. Población en pobreza </strong>
                                <p v-if="determinante_salud_array != null">De acuerdo a la informacion recolectada, se tiene que <strong>{{ determinante_salud_array.pobreza.poblacion_pobreza }} personas</strong> se encuentran en situación de pobreza, esto representa un <strong>{{ determinante_salud_array.pobreza.porcentaje_poblacion_pobreza.toFixed(2) }}%</strong> de la población total.</p>
                                <ul v-if="determinante_salud_array != null">
                                    <li>
                                        Población en pobreza (Rural): <strong>{{ determinante_salud_array.pobreza.poblacion_pobreza_rural }}</strong>
                                    </li>
                                    <li>
                                        Población en pobreza (Urbano): <strong>{{ determinante_salud_array.pobreza.poblacion_pobreza_urbano }}</strong>
                                    </li>
                                </ul>
                                <br>
                                <div id="chartdiv_poblacion_pobreza" style="width: 100%; height: 270px"></div>
                            </div>
                            <div class="col-lg-12">
                                <strong>2. Población por nivel de escolaridad </strong>
                                <p v-if="determinante_salud_array != null">Con una población total de <strong>{{ determinante_salud_array.pobreza.poblacion }} personas</strong> se tiene que: </p>
                                <br>
                                <table class="table_data" v-if="determinante_salud_array != null" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Nivel de escolaridad</th>
                                            <th>Cantidad de personas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in determinante_salud_array.escolaridad" :key="index">
                                            <td>{{ item.escolaridad_nombre }}</td>
                                            <td>{{ item.numero_personas }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div id="chartdiv_escolaridad" style="width: 100%; height: 300px"></div>
                            </div>    
                        </div>
                        <br>
                        <br>
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-12">
                                <strong>3. Desempleo y tipos de empleo  </strong>
                                <p v-if="determinante_salud_array != null">La tasa de desempleo del total municipal es de <strong>{{ determinante_salud_array.desempleo.TD.toFixed(2) }} %</strong>, lo cual quiere decir que <strong>{{ determinante_salud_array.desempleo.D }} personas </strong>  de <strong>{{ determinante_salud_array.desempleo.FT }} personas </strong> que componen la (fuerza laboral), estan en busca de empleo. </p>
                                <br>
                                <ul v-if="determinante_salud_array != null">
                                    <li>Personas de genero masculino desempleados: <strong>{{ determinante_salud_array.desempleo.masculinoTD }}</strong></li>
                                    <li>Personas de genero femenino desempleados: <strong>{{ determinante_salud_array.desempleo.femeninoTD }}</strong></li>
                                </ul>
                                <br>
                                <p>Tasa de desempleo por sexo:</p>
                                <div id="chartdiv_desempleo" style="width: 100%; height: 270px"></div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row" style="padding: 10px">
                            <strong>4. Acceso a acueducto y alcantarillado</strong>
                            <p v-if="determinante_salud_array != null">Se tiene que <strong>{{ determinante_salud_array.alcantarillado_agua.viendasSinAguaPotable }} Viviendas </strong> se encuentran sin el servicio de agua potable y <strong>{{ determinante_salud_array.alcantarillado_agua.viendasSinalcantarillado }} Viviendas </strong> sin el servicio de alcantarillado, lo que corresponde a un <strong>{{ determinante_salud_array.alcantarillado_agua.porcentajeviendasSinAguaPotable.toFixed(2) }}% </strong> y <strong>{{ determinante_salud_array.alcantarillado_agua.porcentajeviendasSinalcantarillado.toFixed(2) }}% </strong> respectivamente del total de viviendas caracterizadas <strong>({{ determinante_salud_array.alcantarillado_agua.totalViviendas }})</strong> .</p>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>Viviendas sin Acceso a Acueducto</h5>
                                <h6>(Por zona)</h6>
                                <div id="chartdiv_acueducto" style="width: 100%; height: 220px"></div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5>Viviendas sin Acceso a Alcantarillado</h5>
                                <h6>(Por zona)</h6>
                                <div id="chartdiv_alantarillado" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <h4 style="color: #fd397a ">Condiciones de salud</h4>
                        <br>
                        <div class="row" style="padding: 10px">
                            <strong>1. Población con enfermedades crónicas</strong>
                            <p v-if="condiciones_salud_array != null">Se tiene que el <strong>{{ condiciones_salud_array.enfermedades_cronicas.porcentaje_personas_con_enfermedades.toFixed(2) }}%</strong> de la población padece al menos una enfermedad cronica, esto quiere decir que <strong>{{ condiciones_salud_array.enfermedades_cronicas.personas_con_enfermedades }} Personas</strong> de <strong>{{ condiciones_salud_array.enfermedades_cronicas.numero_personas }}</strong> padecen enfermedades cronicas, las cuales estan divididas de la siguiente manera: </p>
                            <br>
                            <div class="col-lg-12 text-center">
                                <h5>Personas con enfermedades cronicas</h5>
                                <h6>(Por tipo de enfermedad)</h6>
                                <div id="chartdiv_cronica" style="width: 100%; height: 220px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </template>
<script>
    "use strict";
    import VueHtml2pdf from "vue-html2pdf";
    import VueEasyPieChart from "vue-easy-pie-chart";
    import "vue-easy-pie-chart/dist/vue-easy-pie-chart.css";
    import Progress from "easy-circular-progress";
    import VueCircle from "vue2-circle-progress";
    import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
    import * as informes from "../../Servicios/informes";

    import * as am4core from "@amcharts/amcharts4/core";
    import * as am4charts from "@amcharts/amcharts4/charts";
    import am4themes_animated from "@amcharts/amcharts4/themes/animated";
    am4core.useTheme(am4themes_animated);

    export default {
        components: {
            VueHtml2pdf,
            VueEasyPieChart,
            Progress,
            VueCircle,
        },
        mounted() {
            this.caracterizacion();
            this.poblacion_no_asegurada_f();
            this.determinante_salud();
            this.condiciones_salud();
        },
        data() {
            return {
                poblacion_array: null,
                chart_torta_edades: null,
                chart_no_asegurado_1: null,
                chart_no_asegurado_2: null,
                isLoading: false,
                poblacion_no_asegurada: null,
                determinante_salud_array: null,
                chart_poblacion_pobreza: null,
                chart_escolaridad: null,
                chart_desempleo: null,
                chart_acueducto: null,
                chart_alcantarillado: null,
                condiciones_salud_array: null,
                chart_cronica: null
            }
        },
        methods: {
            async caracterizacion() {
                await DashboardServiceSocioeconomico.poblacion("todos", 1).then(respuesta => {
                    this.poblacion_array = respuesta.data["poblacion"]; 
                    this.grafica_torta_edades(this.poblacion_array.edades);
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_torta_edades(array) {
                if(this.chart_torta_edades != null){
                    this.chart_torta_edades.dispose();
                }
                var chart = am4core.create("chartdiv_edades_torta", am4charts.PieChart3D);
                this.chart_torta_edades = chart;
                chart.data = [
                    {
                        category: "-1 Años",
                        first: array.personas0_1[0] + array.personas0_1[1],
                    },
                    {
                        category: "1-5 Años",
                        first: array.personas1_5[0] + array.personas1_5[1],
                    }, 
                    {
                        category: "6-11 Años",
                        first: array.personas6_11[0] + array.personas6_11[1],
                    },
                    {
                        category: "12-17 Años",
                        first: array.personas12_17[0] + array.personas12_17[1],
                    },
                    {
                        category: "18-28 Años",
                        first: array.personas18_28[0] + array.personas18_28[1],
                    }, 
                    {
                        category: "29-59 Años",
                        first: array.personas29_59[0] + array.personas29_59[1],
                    },
                    {
                        category: "+60 Años",
                        first: array.personas60[0] + array.personas60[1],
                    },
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async poblacion_no_asegurada_f() {
                await informes.poblacion_no_asegurada().then(respuesta => {
                    this.poblacion_no_asegurada = respuesta.data; 
                    this.grafica_torta_no_asegurada_1(respuesta.data.no_asegurado_menor_5);
                    this.grafica_torta_no_asegurada_2(respuesta.data.no_asegurado_mayor_60);
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_torta_no_asegurada_1(array) {
                if(this.chart_no_asegurado_1 != null){
                    this.chart_no_asegurado_1.dispose();
                }

                var chart = am4core.create("chartdiv_no_asegurado_1", am4charts.PieChart3D);
                this.chart_no_asegurado_1 = chart;

                chart.data = [
                    {
                        category: "Zona Urbana",
                        first: array.urbano,
                    },
                    {
                        category: "Zona Rural",
                        first: array.rural,
                    }, 
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_torta_no_asegurada_2(array) {
                if(this.chart_no_asegurado_2 != null){
                    this.chart_no_asegurado_2.dispose();
                }

                var chart = am4core.create("chartdiv_no_asegurado_2", am4charts.PieChart3D);
                this.chart_no_asegurado_2 = chart;

                chart.data = [
                    {
                        category: "Zona Urbana",
                        first: array.urbano,
                    },
                    {
                        category: "Zona Rural",
                        first: array.rural,
                    }, 
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async determinante_salud() {
                await informes.determinante_salud().then(respuesta => {
                    this.determinante_salud_array = respuesta.data; 
                    this.grafica_poblacion_pobreza(this.determinante_salud_array.pobreza);
                    this.grafica_torta_escolaridad(this.determinante_salud_array.escolaridad);
                    this.grafica_torta_desempleo_sexo(this.determinante_salud_array.desempleo);
                    this.grafica_viviendas_sin_acueducto(this.determinante_salud_array.alcantarillado_agua.viendasSAP);
                    this.grafica_viviendas_sin_alcantarillado(this.determinante_salud_array.alcantarillado_agua.viendasSA)
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_poblacion_pobreza(array){
                if(this.chart_poblacion_pobreza != null){
                    this.chart_poblacion_pobreza.dispose();
                }

                var chart = am4core.create("chartdiv_poblacion_pobreza", am4charts.PieChart3D);
                this.chart_poblacion_pobreza = chart;

                chart.data = [
                    {
                        category: "Zona Urbana",
                        first: array.poblacion_pobreza_urbano,
                    },
                    {
                        category: "Zona Rural",
                        first: array.poblacion_pobreza_rural,
                    }, 
                ];
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_torta_escolaridad(array) {
                if(this.chart_escolaridad != null){
                    this.chart_escolaridad.dispose();
                }
                var chart = am4core.create("chartdiv_escolaridad", am4charts.PieChart3D);
                this.chart_escolaridad = chart;
                chart.data = [];

                array.forEach(element => {
                    chart.data.push({
                        category: element.escolaridad_nombre,
                        first: element.numero_personas,
                    })
                });
                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_torta_desempleo_sexo(array) {
                if(this.chart_desempleo != null){
                    this.chart_desempleo.dispose();
                }
                var chart = am4core.create("chartdiv_desempleo", am4charts.PieChart3D);
                this.chart_desempleo = chart;

                chart.data = [
                    {
                        category: "Femenino",
                        first: array.femeninoTD,
                    },
                    {
                        category: "Masculino",
                        first: array.masculinoTD,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_viviendas_sin_acueducto(array) {

                var zona_rural = 0;
                var zona_urbana = 0;

                array.forEach(element => {
                    if(element.id_zona == 1){
                        zona_urbana += 1;
                    }else{
                        zona_rural += 1;
                    }
                });

                if(this.chart_acueducto != null){
                    this.chart_acueducto.dispose();
                }
                var chart = am4core.create("chartdiv_acueducto", am4charts.PieChart3D);
                this.chart_acueducto = chart;

                chart.data = [
                    {
                        category: "Zona Rural",
                        first: zona_rural,
                    },
                    {
                        category: "Zona Urbana",
                        first: zona_urbana,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async grafica_viviendas_sin_alcantarillado(array) {

                var zona_rural = 0;
                var zona_urbana = 0;

                array.forEach(element => {
                    if(element.id_zona == 1){
                        zona_urbana += 1;
                    }else{
                        zona_rural += 1;
                    }
                });

                if(this.chart_alcantarillado != null){
                    this.chart_alcantarillado.dispose();
                }
                var chart = am4core.create("chartdiv_alantarillado", am4charts.PieChart3D);
                this.chart_alcantarillado = chart;

                chart.data = [
                    {
                        category: "Zona Rural",
                        first: zona_rural,
                    },
                    {
                        category: "Zona Urbana",
                        first: zona_urbana,
                    }, 
                ];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            async condiciones_salud() {
                await informes.condiciones_salud().then(respuesta => {
                    this.condiciones_salud_array = respuesta.data; 
                    this.grafica_enfermedades_cronicas(this.condiciones_salud_array.enfermedades_cronicas.por_enfermedad);
                })
                .catch(err => {
                    console.log(err);
                });
            },
            async grafica_enfermedades_cronicas(array) {
                if(this.chart_cronica != null){
                    this.chart_cronica.dispose();
                }
                var chart = am4core.create("chartdiv_cronica", am4charts.PieChart3D);
                this.chart_cronica = chart;

                chart.data = [];

                array.forEach(element => {
                    chart.data.push({
                        category: element.enfermedad,
                        first: element.cantidad,
                    })
                });

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "first";
                series.dataFields.category = "category";
            },
            generarPDF(){}
        },
    };
</script>
<style>
    .li_li {
        padding-top: 7px;
        padding-bottom: 7px;
    }

    p{
        line-height: 200%;
    }

    #divPadre {
        text-align:center;
    }
    #divHijo {
        width:21cm;
        margin:0px auto;
    }

.table_data {
    width: 100%;
    font-size: 13px;
    border-collapse: collapse;
}

.table_data thead {
    padding: 0.3em;
    color: #fff;
    background: #5578eb;
}

.table_data thead tr th, .table_data tbody tr td {
    text-align: left;
    vertical-align: top;
    padding: 0.3em;
    caption-side: bottom;
}


.table_data tbody tr:nth-child(odd) {
    background-color: #fff;
}

.table_data tbody tr:nth-child(even) {
    background-color: #f1f1f1;
}
</style>