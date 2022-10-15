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
                            <button @click="exportToPDFV()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            
        </div>
        
        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Mercado Laboral"
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

import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
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
        this.vivienda();
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
        async vivienda() {
            this.isLoading = true;
            await DashboardServiceSocioeconomico.vivienda(this.tipo, this.id_combo).then(respuesta => {
                this.inb = respuesta.data.inb;
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
                this.vivienda();
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

            this.vivienda();
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
        async exportToPDFV(){ 
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
        }
    }
}
</script>
<style>

.nav-pills, .nav-tabs {
    margin: 0 0 -10px 0 !important;
}

</style>