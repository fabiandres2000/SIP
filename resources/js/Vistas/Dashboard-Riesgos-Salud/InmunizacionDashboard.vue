<template>
    <div>
        <loading
            :active.sync="isLoading"
            :can-cancel="true"
            loader="dots"
            :height=128
            :width=128
            color="#007bff"
            :is-full-page="true"
        />
        <div ref="document">
            <div class="row">
                <div class="col-lg-12" style="padding: 10px 10px 0px 20px;">
                    <h2>{{ente}}</h2>
                </div>
            </div>
            <div class="row" ref="filtro">
                <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Aplicar filtro por:</h4>
                    <br/>
                    <select class="form-control" @change="cambiaraTodos()" v-model="tipoCombo">
                        <option value = "todos">Todos</option>
                        <option value = "barrio">Barrio - Cabecera Municipal</option>
                        <option value = "barrio2">Barrio - Corregimiento</option>
                        <option value = "corregimiento">Corregimiento</option>
                        <option value = "vereda">Vereda</option>
                    </select>
                </div>
                <div v-if="tipoCombo == 'todos'" class="col-sm-6 col-lg-6 text-left" style="padding: 10px 10px 10px 20px;"></div>
                <div v-if="tipoCombo == 'barrio'" class="col-sm-4 col-lg-4 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un Barrio</h4>
                    <br/>
                    <select class="form-control" @change="filtrar('barrio')" v-model="comboBarrio">
                        <option value = "">Todos</option>
                        <option v-for="item in barrios" :value="item.value">{{item.texto}}</option>
                    </select>
                </div>
                <div v-if="tipoCombo == 'corregimiento' || tipoCombo == 'barrio2'" class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un Corregimiento</h4>
                    <br/>
                    <select class="form-control" @change="filtrar('corregimiento')" v-model="comboCorregimiento">
                        <option value = "">Todos</option>
                        <option v-for="item in corregimientos" :value="item.id">{{item.descripcion}}</option>
                    </select>
                </div>
                    <div v-if="tipoCombo == 'barrio2'" class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un Barrio</h4>
                    <br/>
                    <select class="form-control" @change="filtrar('barrio2')" v-model="comboBarrio2">
                        <option value = "">Todos</option>
                        <option v-for="item in barriosCorregimiento" :value="item.value">{{item.texto}}</option>
                    </select>
                </div>
                <div v-if="tipoCombo == 'vereda'" class="col-sm-4 col-lg-4 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione una Vereda</h4>
                    <br/>
                    <select class="form-control" @change="filtrar('vereda')" v-model="comboVereda">
                        <option value = "">Todas</option>
                        <option v-for="item in veredas" :value="item.id">{{item.descripcion}}</option>
                    </select>
                </div>
                <div v-if="tipoCombo == 'corregimiento'" class="col-sm-1 col-lg-1 text-left" style="padding: 10px 10px 10px 20px;"></div>
                <div v-if="tipoCombo != 'todos' && tipoCombo != 'barrio2'" class="col-sm-2 col-lg-2 text-left" style="padding: 10px 10px 10px 20px;"></div>
                <div class="col-lg-3">
                    <div class="row" style="padding-top: 14%">
                        <div ref="boton1" class="col-lg-12 text-right" style="padding: 10px 10px 10px 20px;">
                            <button @click="exportToPDFINM()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" ref="filtro2">
                <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un grupo de edad: </h4>
                    <br/>
                    <select class="form-control" @change="inmunizacion()" v-model="tipoComboGrupoEdad">
                        <option value = "men1a">Menores de 1 Año</option>
                        <option value = "de1a5">1 a 5 Años</option>
                        <option value = "general">General</option>
                    </select>
                </div>
            </div> 
        </div>
        <hr>
        <div v-if="tipoComboGrupoEdad == 'men1a'">
            <div class="row" ref="fila_1_men_1">
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños menores de 1 años <br> sin vacuna BGC</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.sin_bcg_porcentaje < 20 ? '#1abf03': inmunizacion_data.sin_bcg_porcentaje >= 20  && inmunizacion_data.sin_bcg_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.sin_bcg_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.sin_bcg_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.sin_bcg_array, 'Niños menores de 1 años sin vacuna BGC', 1)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños menores de 1 años <br> sin vacuna de polio</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.sin_polio_porcentaje < 20 ? '#1abf03': inmunizacion_data.sin_polio_porcentaje >= 20  && inmunizacion_data.sin_polio_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.sin_polio_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.sin_polio_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.sin_polio_array, 'Niños menores de 1 años sin vacuna de Polio', 2)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños menores de 1 años <br> con esquema completo de pentavalente</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_completo_pentavalente_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_completo_pentavalente_porcentaje >= 20  && inmunizacion_data.esquema_completo_pentavalente_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_completo_pentavalente_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_completo_pentavalente_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.esquema_completo_pentavalente_array, 'Niños menores de 1 años con esquema completo de pentavalente', 3)">Ver Detalles</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 text-center"  ref="fila_2_men_1">
                    <br>
                    <h4>Niños menores de 1 años <br> con esquema incompleto de pentavalente</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_icompleto_pentavalente_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_icompleto_pentavalente_porcentaje >= 20  && inmunizacion_data.esquema_icompleto_pentavalente_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_icompleto_pentavalente_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_icompleto_pentavalente_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.esquema_icompleto_pentavalente_array, 'Niños menores de 1 años con esquema incompleto de pentavalente', 4)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center"  ref="fila_3_men_1">
                    <br>
                    <h4>Niños menores de 1 años <br> con esquema completo de polio</h4>
                    <br>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="inmunizacion_data.esquema_completo_polio_porcentaje < 20 ? '#1abf03': inmunizacion_data.esquema_completo_polio_porcentaje >= 20  && inmunizacion_data.esquema_completo_polio_porcentaje < 60 ? '#f2ce1a' : '#f2451a'"
                        :percentage="Math.floor(inmunizacion_data.esquema_completo_polio_porcentaje* 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{inmunizacion_data.esquema_completo_polio_numero}} / {{inmunizacion_data.numero_personas}}</h4> 
                    <a href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.esquema_completo_polio_array, 'Niños menores de 1 años con esquema completo de polio', 5)">Ver Detalles</a>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <h4>Niños en riesgos de desnutrición con esquema de vacunación incompleto</h4>
                    <div id="chartdiv_desnutricion_incompleto" style="width: 100%; height: 250px"></div>
                    <a href="#" @click="ver_detalle_inmunizacion(inmunizacion_data.desnutricion_carnet_desac_array, 'Niños menores de 1 años en riesgos de desnutrición con esquema de vacunación incompleto', 6)">Ver Detalles</a>
                </div>
            </div>
        </div>
        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Riesgos de Salud - Inmunizacion"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <embed
                id="divPdf"
                :src="rutaPdf"
                type="application/pdf"
                width="100%"
                height="650px"
            />
            <hr />
            <div class="text-right">
                <button
                    type="button"
                    class="btn btn-warning"
                    @click="cerrarModal"
                >
                    <i class="fa fa-window-close"></i> Cancelar
                </button>
            </div>
        </b-modal>

        <b-modal
            ref="detalle_inmunizacion"
            hide-footer
            :title="titulo_detalle"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <table style="width: 100%;" class="table_data" id="tabla_riesgos">
                <thead>
                    <tr>
                        <th>Identificacionn</th>
                        <th>Nombre</th>
                        <th>Corregimiento</th> 
                        <th>Barrio</th>
                        <th>Direccion</th>
                        <th v-if="tipo_detalle_men_1 != 6">BCG</th>
                        <th v-if="tipo_detalle_men_1 != 6">Carnet</th>
                        <th v-if="tipo_detalle_men_1 != 6">Pentavalente</th>
                        <th v-if="tipo_detalle_men_1 != 6">Polio</th>
                        <th v-if="tipo_detalle_men_1 == 6">Desnutrición Aguda</th>
                        <th v-if="tipo_detalle_men_1 == 6">Desnutrición Global</th>
                        <th v-if="tipo_detalle_men_1 == 6">Carnet Desactualizado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data_detalle" v-if="tipo_detalle_men_1 != 6">
                        <td>{{item.nombre}}</td>
                        <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                        <td><span>{{item.des_corr}}</span></td>
                        <td><span>{{item.des_barrio}}</span></td>
                        <td><span>{{item.des_direc}}</span></td>
                        <td><span>{{item.bcg}}</span></td>
                        <td><span>{{item.carnet}}</span></td>
                        <td><span>{{item.pentavalente}}</span></td>
                        <td><span>{{item.polio}}</span></td>
                    </tr>
                    <tr v-for="item in data_detalle" v-if="tipo_detalle_men_1 == 6">
                        <td>{{item.nombre}}</td>
                        <td>{{item.tipo_id}}: {{item.identificacion}}</td>
                        <td><span>{{item.des_corr}}</span></td>
                        <td><span>{{item.des_barrio}}</span></td>
                        <td><span>{{item.des_direc}}</span></td>
                        <td><span>{{item.riesgos_desnutricion_aguda_R == 0 || item.riesgos_desnutricion_aguda_R == 1 ? 'BAJO' : item.riesgos_desnutricion_aguda_R == 2 || item.riesgos_desnutricion_aguda_R == 3 ? 'MODERADO': 'ALTO'}}</span></td>
                        <td><span>{{item.riesgos_desnutricion_global_R == 0 || item.riesgos_desnutricion_global_R == 1 ? 'BAJO' : item.riesgos_desnutricion_global_R == 2 || item.riesgos_desnutricion_global_R == 3 ? 'MODERADO': 'ALTO'}}</span></td>
                        <td><span>Desactualizado</span></td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <div class="text-right">
                <button
                    type="button"
                    class="btn btn-warning"
                    @click="cerrarModal"
                >
                    <i class="fa fa-window-close"></i> Cancelar
                </button>
            </div>
        </b-modal>
    </div>
</template>
<script>

import * as DashboardServiceRS from "../../Servicios/dashboard_riesgos_salud";
import CircleProgress from 'vue-pithy-progress/lib/circle-progress.umd.min.js';
import Loading from "vue-loading-overlay";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";
import $ from "jquery";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";

am4core.useTheme(am4themes_animated);
import store from "../../store";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.inmunizacion();
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
    },
    props: [],
    data() {
        return {
            inb: null,
            finalizado: false,
            isLoading: false,
            rutaPdf: "",
            latitud: 0,
            longitud: 0,
            comboBarrio: "",
            barrios: [],
            barriosCorregimiento: [],
            comboBarrio2: "",
            comboCorregimiento: "",
            corregimientos: [],
            comboVereda: "",
            veredas: [],
            tipoCombo: "todos",
            tipo: "todos",
            id_combo: 1,
            ente: "",
            inmunizacion_data: [],
            tipoComboGrupoEdad: "men1a",
            chart_1_men_1: null,
            data_detalle: [],
            titulo_detalle: "", 
            tipo_detalle_men_1: 0
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
        async inmunizacion() {
            this.isLoading = true;
            await DashboardServiceRS.inmunizacion(this.tipo, this.id_combo, this.tipoComboGrupoEdad).then(respuesta => {
                this.inmunizacion_data = respuesta.data.inmunizacion_data;
                this.grafica_torta_desnutricion_incompleto();
                this.isLoading = false;
            })
            .catch(err => {
                console.log(err);
            });
        },
        async listarBarrios(){
            const parametros = {
                _token: this.csrf,
                id: null,
                opcion: "MUN"
            };
            
            await BarriosService.comboBarrios(parametros).then(respuesta => {
                this.barrios = respuesta.data.arrayBarrios;
            });
            
        },
        async listarBarriosCorregimiento(){
            const parametros = {
                _token: this.csrf,
                id: this.comboCorregimiento,
                opcion: "CORRE"
            };
            
            await BarriosService.comboBarrios(parametros).then(respuesta => {
                this.barriosCorregimiento = respuesta.data.arrayBarrios;
            });
            
        },
        async listarCorregimientos(){
            const parametros = {
                _token: this.csrf,
            };
            
            await CorregimientoService.comboCorregimientos(parametros).then(respuesta => {
                this.corregimientos = respuesta.data.corregimientos;
            });
            
        },
        async listarVeredas(){
            const parametros = {
                _token: this.csrf,
            };
            
            await VeredasService.comboVeredas(parametros).then(respuesta => {
                this.veredas = respuesta.data.veredas;
            });
            
        },
        cambiaraTodos() {
            if(this.tipoCombo == "todos"){
                this.tipo = this.tipoCombo;
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboCorregimiento = "";
                this.comboBarrio2 = "";
                this.inmunizacion();
            }
        },
        async filtrar(tipo_p){
            if(tipo_p == "barrio"){
                this.tipo = "barrio";
                this.comboCorregimiento = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboBarrio;
            }
            if(tipo_p == "corregimiento"){
                this.tipo = "corre";
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboCorregimiento;
                this.listarBarriosCorregimiento();
            }
            if(tipo_p == "vereda"){
                this.tipo = "vereda"
                this.comboCorregimiento = "";
                this.comboBarrio = "";
                this.comboBarrio2 = "";
                this.id_combo = this.comboVereda;
            }
            if(tipo_p == "barrio2"){
                this.tipo = "barrio";
                this.comboVereda = "";
                this.comboBarrio = "";
                this.id_combo = this.comboBarrio2;

                if(this.comboBarrio2 == ""){
                    this.tipo = "corre";
                    this.id_combo = this.comboCorregimiento;
                }
            }
            
            if(this.comboVereda == "" && this.comboBarrio == "" && this.comboCorregimiento == "" && this.comboBarrio2 == ""){
                this.tipo = "Todos";
            }

            this.inmunizacion();
        },
        crearDataTable() {
            $("#tabla_tasa_ocupacion").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_tasa_ocupacion').DataTable({
                    "lengthChange": false,
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
        async exportToPDFINM(){ 
            this.isLoading = true;

            const options = {
                type: 'dataURL',
                useCORS: true,
            }

            let filtro = await this.$html2canvas(this.$refs.filtro, options);
            let filtro2 = await this.$html2canvas(this.$refs.filtro2, options);

            let graficos;
            let data;

            if(this.tipoComboGrupoEdad == "men1a"){
                graficos = {
                    fila1: await this.$html2canvas(this.$refs.fila_1_men_1, options),
                    fila2: await this.$html2canvas(this.$refs.fila_2_men_1, options),
                    fila3: await this.$html2canvas(this.$refs.fila_3_men_1, options),
                    fila4: await this.chart_1_men_1.exporting.getImage("png")
                }

                data = {
                    sin_bcg_array : this.inmunizacion_data.sin_bcg_array,
                    sin_polio_array : this.inmunizacion_data.sin_polio_array,
                    esquema_completo_polio_array : this.inmunizacion_data.esquema_completo_polio_array,
                    desnutricion_carnet_desac_array : this.inmunizacion_data.desnutricion_carnet_desac_array,
                    esquema_completo_pentavalente_array : this.inmunizacion_data.esquema_completo_pentavalente_array,
                    esquema_icompleto_pentavalente_array : this.inmunizacion_data.esquema_icompleto_pentavalente_array,
                }
            }

            const parametros = {
                _token: this.csrf,
                filtro: filtro,
                filtro2: filtro2,
                graficos: graficos,
                data: data,
                tipo: this.tipoComboGrupoEdad
            };

            try {
                await DashboardServiceRS.exportToPDFINM(parametros).then(respuesta => {
                    this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.$refs.modalpdf.show();
                });
            } catch (error) { 
                this.$swal("Error...!", "Ocurrio un error!", "error");    
                this.isLoading = false;
            }
        },
        cerrarModal() {
            this.$refs.detalle_inmunizacion.hide();
            this.$refs.modalpdf.hide();
        },
        async grafica_torta_desnutricion_incompleto() {
            if(this.chart_1_men_1 != null){
                this.chart_1_men_1.dispose();
            }
            var chart = am4core.create("chartdiv_desnutricion_incompleto", am4charts.PieChart3D);
            this.chart_1_men_1 = chart;
            chart.data = [
                {
                    category: "Desn. Aguda",
                    first: this.inmunizacion_data.desnutricion_aguda_carnet_desac_numero,
                },
                {
                    category: "Desn. Global",
                    first: this.inmunizacion_data.desnutricion_global_carnet_desac_numero,
                }, 
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        ver_detalle_inmunizacion(array, titulo, tipo){
            this.titulo_detalle = titulo;
            this.data_detalle = array;
            this.tipo_detalle_men_1 = tipo;
            this.$refs.detalle_inmunizacion.show();
        }
    }
}
</script>
<style>

.nav-pills, .nav-tabs {
    margin: 0 0 -10px 0 !important;
}

.progress-content {
    position: absolute;
    top: 38%;
    font-size: 20px;
    font-weight: bold;
}

</style>