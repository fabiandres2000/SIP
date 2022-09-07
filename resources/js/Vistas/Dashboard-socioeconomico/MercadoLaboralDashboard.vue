<template>
    <div>
        <div class="row" v-if="finalizado == true">
            <div class="col-lg-4 text-center">
                <br>
                <h3>Tasa de Ocupación</h3>
                <h5>(General)</h5>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="100" 
                    :stroke-width="15"  
                    :stroke-color="tasaOcupacion.tasaOcupacion < 20 ? '#f2451a': tasaOcupacion.tasaOcupacion >= 20  && tasaOcupacion.tasaOcupacion < 60 ? '#f2ce1a' : '#1abf03'"  
                    :percentage="Math.floor(tasaOcupacion.tasaOcupacion * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{tasaOcupacion.personasOcupadas}} / {{tasaOcupacion.personasEdadTrabajar}}</h4> 
            </div>
            <div class="col-lg-4 text-center">
                <br>
                <h3>Mayor Tasa de Ocupación</h3>
                <h5>({{tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].localizacion==""?'CASCO URBANO':tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].localizacion}})</h5>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="100" 
                    :stroke-width="15"  
                    :stroke-color="tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].tasa_ocupacion < 20 ? '#f2451a': tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].tasa_ocupacion >= 20  && tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].tasa_ocupacion < 60 ? '#f2ce1a' : '#1abf03'"  
                    :percentage="Math.floor(tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].tasa_ocupacion * 10) / 10"> 
                </circle-progress>
                <br>
                <h5>{{tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].numero_personas}} / {{tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].personas_edad_trabajo}}</h5> 
            </div>
            <div class="col-lg-4 text-center">
                <br>
                <h3>Menor Tasa de Ocupación</h3>
                <h4>({{tasaOcupacionPorCorregimiento[0].localizacion==""?'CASCO URBANO':tasaOcupacionPorCorregimiento[0].localizacion}})</h4>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="100" 
                    :stroke-width="15"  
                    :stroke-color="tasaOcupacionPorCorregimiento[0].tasa_ocupacion < 20 ? '#f2451a': tasaOcupacionPorCorregimiento[0].tasa_ocupacion >= 20  && tasaOcupacionPorCorregimiento[0].tasa_ocupacion < 60 ? '#f2ce1a' : '#1abf03'"  
                    :percentage="Math.floor(tasaOcupacionPorCorregimiento[0].tasa_ocupacion * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{tasaOcupacionPorCorregimiento[0].numero_personas}} / {{tasaOcupacionPorCorregimiento[0].personas_edad_trabajo}}</h4> 
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-5 text-center">
                <h3>Tasa de Ocupación</h3>
                <h4>(Por Tipo de Empleo)</h4>
            </div>
            <div class="col-lg-5">
                <h3>Tasa de Ocupación por Corregimiento</h3>
            </div>
            <div class="col-lg-2">
                <vue-excel-xlsx
                    :data="tasaOcupacionPorCorregimiento"
                    :columns="columns"
                    file-name="tasas-ocupacion"
                    :file-type="'xlsx'"
                    :sheet-name="'sheetname'"
                    style = "background-color: green; color: white; border: 0px; padding: 5px; border-radius: 10px; width: 100%;"
                    >
                    Exportar a excel <i class="fa fa-table" aria-hidden="true"></i>
                </vue-excel-xlsx>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 text-center">
                <div id="chartdiv_ocupacion_pie" style="width: 100%; height: 300px"></div>
            </div>
            <div class="col-lg-7" style="overflow: scroll;">
                <table id="tabla_tasa_ocupacion" class="table_data" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 250px">Corregimiento</th>
                            <th># Personas Ocupadas</th>
                            <th># Personas ET</th>
                            <th>Tasa Ocupación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in tasaOcupacionPorCorregimiento">
                            <td>{{ index+1 }}</td>
                            <td>{{item.localizacion==""?'CASCO URBANO':item.localizacion}}</td>
                            <td>{{item.numero_personas}}</td>
                            <td>{{item.personas_edad_trabajo}}</td>
                            <td>{{Math.floor(item.tasa_ocupacion * 10) / 10}} %</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6 text-center">
                <br>
                <h3>Porcentaje de Población</h3>
                <h3>Por Tipo de Empleo</h3>
            </div>  
        </div>
        <div class="row">
            <div class="col-lg-6 text-center">
                <div id="chartdiv_ocupacion_pie_2" style="width: 100%; height: 300px"></div>
            </div>
            <div class="col-lg-6">
                <br>
                <br>
                <br>
                <table class="table_data" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Tipo de empleo</th>
                            <th># Personas Ocupadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Empleo Formal</td>
                            <td>{{tasaOcupacion.personasEmpleoFormal}}</td>
                        </tr>
                        <tr>
                            <td>Empleo Informal</td>
                            <td>{{tasaOcupacion.personasEmpleoInformal}}</td>
                        </tr>
                        <tr>
                            <td>Independiente</td>
                            <td>{{tasaOcupacion.personasEmpleoIndependiente}}</td>
                        </tr>   
                        <tr>
                            <td>Sin Empleo</td>
                            <td>{{tasaOcupacion.personasSinEmpleo}}</td>
                        </tr>
                        <tr>
                            <td>NA</td>
                            <td>{{tasaOcupacion.personasNA}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div> 
    </div>
</template>
<script>

import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
import CircleProgress from 'vue-pithy-progress/lib/circle-progress.umd.min.js';
import Loading from "vue-loading-overlay";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";
import $ from "jquery";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
am4core.useTheme(am4themes_animated);

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.mercadoLaboral();
    },
    props: [],
    data() {
        return {
            tasaOcupacion: [],
            tasaOcupacionPorCorregimiento: [],
            columns: [
                {
                    label: "CORREGIMIENTO",
                    field: "localizacion",
                },
                {
                    label: "PERSONAS OCUPADAS",
                    field: "numero_personas",
                },
                {
                    label: "PERSONAS EN EDAD DE TRABAJO",
                    field: "personas_edad_trabajo",
                },
                {
                    label: "TASA DE OCUPACION %",
                    field: "tasa_ocupacion",
                },
            ],
            finalizado: false
        }
    },
    methods: {
        async iniciar() {
            const parametros = {
                _token: this.csrf
            };
            try {
                await usuarioServicios
                    .iniciar(parametros)
                    .then(respuesta => {
                        this.ente = respuesta.data.ente;    
                    })
                    .catch(error => {});
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        async coordenadas() {
            let data = {
                _token: this.csrf
            };

            await DashboardService.coordenadas(data)
            .then(respuesta => {
                this.latitud = Number(respuesta.data["latitud"]);
                this.longitud = Number(respuesta.data["longitud"]);
            })
            .catch(err => {
                console.log(err);
            });
        },
        async mercadoLaboral() {
            await DashboardServiceSocioeconomico.mercadoLaboral()
            .then(respuesta => {
                this.tasaOcupacion = respuesta.data.tasaOcupacion;
                this.ordenarTasaOcupacion(this.tasaOcupacion.porCorregimeinto);
                this.crearDataTable();
                this.grafica_torta(this.tasaOcupacion);
                this.grafica_torta2(this.tasaOcupacion);
                this.finalizado = true;
            })
            .catch(err => {
                console.log(err);
            });
        },
        ordenarTasaOcupacion(array) {
            this.tasaOcupacionPorCorregimiento =  array.sort(function(a, b){
                return a.tasa_ocupacion - b.tasa_ocupacion;
            });
        },
        crearDataTable() {
            $("#tabla_tasa_ocupacion").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_tasa_ocupacion').DataTable({
                    "lengthChange": false,
                    "bFilter": false,
                    "ordering": false,
                    pageLength : 5,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            }, 500);
        },
        async grafica_torta(array) {
            var chart = am4core.create("chartdiv_ocupacion_pie", am4charts.PieChart);
            chart.data = [
                {
                    category: "Emp. Formal",
                    first: array.personasEmpleoFormal,
                },
                {
                    category: "Emp. Informal",
                    first: array.personasEmpleoInformal,
                },
                {
                    category: "Independiente",
                    first: array.personasEmpleoIndependiente,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafica_torta2(array) {
            var chart = am4core.create("chartdiv_ocupacion_pie_2", am4charts.PieChart);
            chart.data = [
                {
                    category: "Emp. Formal",
                    first: array.personasEmpleoFormal,
                },
                {
                    category: "Emp. Informal",
                    first: array.personasEmpleoInformal,
                },
                {
                    category: "Independiente",
                    first: array.personasEmpleoIndependiente,
                },
                {
                    category: "NA",
                    first: array.personasNA,
                },
                {
                    category: "Sin Empleo",
                    first: array.personasSinEmpleo,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        }
    }
}
</script>
<style>
    
</style>