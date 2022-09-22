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
                            <button @click="exportToPDFRSP()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" ref="filtro">
                <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                    <h4>Seleccione un grupo de edad: </h4>
                    <br/>
                    <select class="form-control" @change="poblacionRS()" v-model="tipoComboGrupoEdad">
                        <option value = "riesgos_salud_men1">Menores de 1 Año</option>
                        <option value = "riesgos_salud_de1a5">1 a 5 Años</option>
                        <option value = "riesgos_salud_de6a11">6 a 11 Años</option>
                        <option value = "riesgos_salud_de12a17">12 a 17 Años</option>
                        <option value = "riesgos_salud_de18a28">18 a 28 Años</option>
                        <option value = "riesgos_salud_de29a59">29 a 59 Años</option>
                        <option value = "riesgos_salud_de60">Mayores de 60 Años</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row" v-if="tipoComboGrupoEdad == 'riesgos_salud_men1' ||  tipoComboGrupoEdad == 'riesgos_salud_de1a5'">
                <div class="col-lg-4 text-center">
                    <h4>Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes</h4>
                    <br>
                    <div id="div_td_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <h4>Riesgo De Muerte Por Desnutrición </h4>
                    <br>
                    <br>
                    <div id="div_md_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <h4>Riesgo Sobrepeso </h4>
                    <br>
                    <br>
                    <div id="div_s_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Enfermedades Infeccisosas </h4>
                    <div id="div_ei_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Cancer </h4>
                    <div id="div_c_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Enfermedades Zoonoticas  </h4>  
                    <div id="div_ez_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Consumo De SPA </h4>
                    <div id="div_cs_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Riesgo Desnutrición Global </h4>
                    <div id="div_dg_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Riesgo De Talla Baja </h4>  
                    <div id="div_tb_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Trastornos Asociados Al Uso De SPA</h4>
                    <div id="div_tas_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Enfermedad Cardiovascular Aterogénica </h4>
                    <div id="div_eca_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Alteraciones Y Transtornos Visuales </h4>  
                    <div id="div_atv_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Alteraciones Y Transtornos De La Audición Y Comunicación</h4>
                    <div id="div_tac_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Salud Bucal </h4>
                    <div id="div_sb_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Problemas En Salud Mental </h4>  
                    <div id="div_psm_t1" style="width: 100%; height: 250px"></div>
                </div>

                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Violencias</h4>
                    <div id="div_v_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Enfermedades Respiratorias Crónicas</h4>
                    <div id="div_erc_t1" style="width: 100%; height: 250px"></div>
                </div>
                <div class="col-lg-4 text-center">
                    <br>
                    <br>
                    <h4>Riesgo Desnutrición Aguda  </h4>  
                    <div id="div_rda_t1" style="width: 100%; height: 250px"></div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            
        </div>
        
        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Riesgos de Salud"
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
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
        this.poblacionRS();
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
            tipoComboGrupoEdad: "riesgos_salud_men1",
            poblacion: [],
            graf_td: null,
            graf_md: null,
            graf_s: null,
            graf_ei: null,
            graf_c: null,
            graf_ez: null,
            graf_cs: null,
            graf_dg: null,
            graf_tb: null,
            graf_tas: null,
            graf_eca: null,
            graf_atv: null,
            graf_tac: null,
            graf_sb: null,
            graf_psm: null,
            graf_v: null,
            graf_erc: null,
            graf_rda: null
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
                this.poblacionRS();
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

            this.poblacionRS();
        },
        async poblacionRS(){
            this.isLoading = true;
            await DashboardServiceRS.poblacion(this.tipo, this.id_combo, this.tipoComboGrupoEdad).then(respuesta => {
                this.poblacion = respuesta.data["poblacion"]; 
                if(this.tipoComboGrupoEdad == "riesgos_salud_men1" || this.tipoComboGrupoEdad == "riesgos_salud_de1a5" ){
                    this.grafico_trastornos_degenetarivos(this.poblacion.riesgosCantidad.transtornos_degenartivos, "t1");
                    this.grafico_muerte_desnutricion(this.poblacion.riesgosCantidad.riesgo_muerte, "t1");
                    this.grafico_sobrepeso(this.poblacion.riesgosCantidad.riesgo_sobrepeso, "t1");
                    this.grafico_enfermedades_infecciosas(this.poblacion.riesgosCantidad.enfermedades_infecciosas, "t1");
                    this.grafico_cancer(this.poblacion.riesgosCantidad.cancer, "t1");
                    this.grafico_enfermedades_zoonaticas(this.poblacion.riesgosCantidad.enfermedades_zoonoticas, "t1");
                    this.grafico_consumo_spa(this.poblacion.riesgosCantidad.consumo_spa, "t1");
                    this.grafico_desnutricion_global(this.poblacion.riesgosCantidad.riesgos_desnutricion_global, "t1");
                    this.grafico_talla_baja(this.poblacion.riesgosCantidad.riesgo_talla_baja, "t1");
                    this.grafico_trastorno_consumo_spa(this.poblacion.riesgosCantidad.transtornos_asociados_spa, "t1");
                    this.grafico_enfermedad_cardiovascular(this.poblacion.riesgosCantidad.enfermedad_cardiovascular, "t1");
                    this.grafico_trastornos_visuales(this.poblacion.riesgosCantidad.alteraciones_transtornos_visuales, "t1");
                    this.grafico_trastorno_audicion(this.poblacion.riesgosCantidad.alteraciones_transtornos_audicion, "t1");
                    this.grafico_salud_bucal(this.poblacion.riesgosCantidad.salud_bucal, "t1");
                    this.grafico_salud_mental(this.poblacion.riesgosCantidad.problemas_salud_mental, "t1");
                    this.grafico_violencias(this.poblacion.riesgosCantidad.violencias, "t1");
                    this.grafico_respiratoria_cronica(this.poblacion.riesgosCantidad.enfermedades_respiratorias, "t1");
                    this.grafico_desnutricion_aguda(this.poblacion.riesgosCantidad.riesgos_desnutricion_aguda, "t1");
                }
                this.isLoading = false;
            })
            .catch(err => {
                console.log(err);
            });
        },
        async exportToPDFRSP(){ 
            this.isLoading = true;

            // convertir a imagen todos los graficos
            const options = {
                type: 'dataURL',
                useCORS: true,
            }
           
            // convertir a imagen todos los graficos

            const parametros = {
                _token: this.csrf,
            };
            try {
                await DashboardServiceSocioeconomico.exportarMercadoLaboral(parametros).then(respuesta => {
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
            this.$refs.modalpdf.hide();
        },
        async grafico_trastornos_degenetarivos(data, id) {
            if(this.graf_td != null){
                this.graf_td.dispose();
            }
            var chart = am4core.create("div_td_"+id, am4charts.PieChart3D);
            this.graf_td = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_muerte_desnutricion(data, id) {
            if(this.graf_md != null){
                this.graf_md.dispose();
            }
            var chart = am4core.create("div_md_"+id, am4charts.PieChart3D);
            this.graf_md = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_sobrepeso(data, id) {
            if(this.graf_s != null){
                this.graf_s.dispose();
            }
            var chart = am4core.create("div_s_"+id, am4charts.PieChart3D);
            this.graf_s = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_enfermedades_infecciosas(data, id) {
            if(this.graf_ei != null){
                this.graf_ei.dispose();
            }
            var chart = am4core.create("div_ei_"+id, am4charts.PieChart3D);
            this.graf_ei = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_cancer(data, id) {
            if(this.graf_c != null){
                this.graf_c.dispose();
            }
            var chart = am4core.create("div_c_"+id, am4charts.PieChart3D);
            this.graf_c = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_enfermedades_zoonaticas(data, id) {
            if(this.graf_ez != null){
                this.graf_ez.dispose();
            }
            var chart = am4core.create("div_ez_"+id, am4charts.PieChart3D);
            this.graf_ez = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_consumo_spa(data, id) {
            if(this.graf_cs != null){
                this.graf_cs.dispose();
            }
            var chart = am4core.create("div_cs_"+id, am4charts.PieChart3D);
            this.graf_cs = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_desnutricion_global(data, id) {
            if(this.graf_dg != null){
                this.graf_dg.dispose();
            }
            var chart = am4core.create("div_dg_"+id, am4charts.PieChart3D);
            this.graf_dg = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_talla_baja(data, id) {
            if(this.graf_tb != null){
                this.graf_tb.dispose();
            }
            var chart = am4core.create("div_tb_"+id, am4charts.PieChart3D);
            this.graf_tb = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_trastorno_consumo_spa(data, id) {
            if(this.graf_tas != null){
                this.graf_tas.dispose();
            }
            var chart = am4core.create("div_tas_"+id, am4charts.PieChart3D);
            this.graf_tas = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_enfermedad_cardiovascular(data, id) {
            if(this.graf_eca != null){
                this.graf_eca.dispose();
            }
            var chart = am4core.create("div_eca_"+id, am4charts.PieChart3D);
            this.graf_eca = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_trastornos_visuales(data, id) {
            if(this.graf_atv != null){
                this.graf_atv.dispose();
            }
            var chart = am4core.create("div_atv_"+id, am4charts.PieChart3D);
            this.graf_atv = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_trastorno_audicion(data, id) {
            if(this.graf_tac != null){
                this.graf_tac.dispose();
            }
            var chart = am4core.create("div_tac_"+id, am4charts.PieChart3D);
            this.graf_tac = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_salud_bucal(data, id) {
            if(this.graf_sb != null){
                this.graf_sb.dispose();
            }
            var chart = am4core.create("div_sb_"+id, am4charts.PieChart3D);
            this.graf_sb = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_salud_mental(data, id) {
            if(this.graf_psm != null){
                this.graf_psm.dispose();
            }
            var chart = am4core.create("div_psm_"+id, am4charts.PieChart3D);
            this.graf_psm = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_violencias(data, id) {
            if(this.graf_v != null){
                this.graf_v.dispose();
            }
            var chart = am4core.create("div_v_"+id, am4charts.PieChart3D);
            this.graf_v = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_respiratoria_cronica(data, id) {
            if(this.graf_erc != null){
                this.graf_erc.dispose();
            }
            var chart = am4core.create("div_erc_"+id, am4charts.PieChart3D);
            this.graf_erc = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafico_desnutricion_aguda(data, id) {
            if(this.graf_rda != null){
                this.graf_rda.dispose();
            }
            var chart = am4core.create("div_rda_"+id, am4charts.PieChart3D);
            this.graf_rda = chart;
            chart.data = [
                {
                    category: "Inexistente",
                    first: data.Inexistente,
                },
                {
                    category: "Bajo",
                    first: data.Bajo,
                },
                {
                    category: "Moderado",
                    first: data.Moderado,
                },
                {
                    category: "Alto",
                    first: data.Alto,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";

            series.slices.template.events.on("hit", function(ev){
                console.log(ev.target.dataItem)
            });
        }
    }
}
</script>
<style>
    
</style>