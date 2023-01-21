<template>
    <div>
        <div class="kt-portlet" style="margin-top: -4%;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <span class="kt-widget20__number kt-font-danger"
                            >REPORTE ADULTO MAYOR</span
                        >
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <div class="row">
                            <div class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 10px;">
                                <h4>Aplicar filtro por:</h4>
                                <br/>
                                <select class="form-control" @change="cambiaraTodos()" v-model="tipoCombo">
                                    <option value = "todos">Seleccione...</option>
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
                                    <option value = "">Seleccione...</option>
                                    <option v-for="item in barrios" :value="item.value">{{item.texto}}</option>
                                </select>
                            </div>
                            <div v-if="tipoCombo == 'corregimiento' || tipoCombo == 'barrio2'" class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                                <h4>Seleccione un Corregimiento</h4>
                                <br/>
                                <select class="form-control" @change="filtrar('corregimiento')" v-model="comboCorregimiento">
                                    <option value = "">Seleccione...</option>
                                    <option v-for="item in corregimientos" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </div>
                                <div v-if="tipoCombo == 'barrio2'" class="col-sm-3 col-lg-3 text-left" style="padding: 10px 10px 10px 20px;">
                                <h4>Seleccione un Barrio</h4>
                                <br/>
                                <select class="form-control" @change="filtrar('barrio2')" v-model="comboBarrio2">
                                    <option value = "">Seleccione...</option>
                                    <option v-for="item in barriosCorregimiento" :value="item.value">{{item.texto}}</option>
                                </select>
                            </div>
                            <div v-if="tipoCombo == 'vereda'" class="col-sm-4 col-lg-4 text-left" style="padding: 10px 10px 10px 20px;">
                                <h4>Seleccione una Vereda</h4>
                                <br/>
                                <select class="form-control" @change="filtrar('vereda')" v-model="comboVereda">
                                    <option value = "">Seleccione...</option>
                                    <option v-for="item in veredas" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </div>
                            <div v-if="tipoCombo == 'corregimiento'" class="col-sm-1 col-lg-1 text-left" style="padding: 10px 10px 10px 20px;"></div>
                            <div v-if="tipoCombo != 'todos' && tipoCombo != 'barrio2'" class="col-sm-2 col-lg-2 text-left" style="padding: 10px 10px 10px 20px;"></div>
                            <div ref="boton1" class="col-sm-3 col-lg-3 text-right" style="padding: 60px 10px 10px 20px;">
                                <button  @click="exportToPDF()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table
                                    class="table table-sm table-hover"
                                    id="tablaDatos"
                                >
                                    <thead class>
                                        <tr class="kt-bg-fill-brand">
                                            <th class="text-left">No.</th>
                                            <th class="text-left">
                                                Identificación
                                            </th>
                                            <th class="text-left">
                                                Nombre
                                            </th>
                                            <th>
                                                Edad
                                            </th>
                                            <th class="text-left">
                                                Ubicación
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="adulto_mayor_array.length > 0">
                                        <tr
                                            v-for="(item, index) in adulto_mayor_array"
                                            :key="index"
                                        >
                                            <td
                                                style="font-weight: normal;vertical-align: middle;"
                                            >
                                                {{ index + 1 }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.identificacion }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.pnom }} {{ item.snom }} {{ item.pape }} {{ item.sape }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.edad }} Años
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.localizacion }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td
                                                colspan="11"
                                                style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;font-size: 20px;"
                                            >
                                                No existen datos
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <b-modal
                ref="modalpdf"
                hide-footer
                title="Reporte de Población Discapacitada"
                size="xl"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
            >
                <embed
                    id="divPdf"
                    :src="ruta"
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
    </div>
</template>
<script>
"use strict";
import * as reporteServicios from "../../Servicios/reportes";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";
import 'vue-pithy-progress/lib/circle-progress.css';
import $ from "jquery";
import DataTable from "datatables.net";
import store from "../../store";

export default {
    mounted() {
        this.listarBarrios();
        this.listarCorregimientos();
        this.listarVeredas();
        this.adulto_mayor();
    },
    name: "gestan",
    data() {
        return {
            adulto_mayor_array: [], 
            ruta: "",
            comboBarrio: "",
            barrios: [],
            barriosCorregimiento: [],
            comboBarrio2: "",
            comboCorregimiento: "",
            corregimientos: [],
            comboVereda: "",
            veredas: [],
            tipoCombo: "todos",
        };
    },
    computed: {
       
    },
    methods: {
        async adulto_mayor() {    
            try {
                await reporteServicios.adulto_mayor("todos", null).then(respuesta => {
                    this.adulto_mayor_array = respuesta.data.adulto_mayor;
                });
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
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboCorregimiento = "";
                this.comboBarrio2 = "";
                this.adulto_mayor();
            }
        },
        async filtrar(tipo){
            var id ;
            if(tipo == "barrio"){
                tipo = "barrio";
                this.comboCorregimiento = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                id = this.comboBarrio;
            }
            if(tipo == "corregimiento"){
                tipo = "corre";
                this.comboBarrio = "";
                this.comboVereda = "";
                this.comboBarrio2 = "";
                id = this.comboCorregimiento;
                this.listarBarriosCorregimiento();
            }
            if(tipo == "vereda"){
                tipo = "vereda"
                this.comboCorregimiento = "";
                this.comboBarrio = "";
                this.comboBarrio2 = "";
                id = this.comboVereda;
            }
            if(tipo == "barrio2"){
                tipo = "barrio";
                this.comboVereda = "";
                this.comboBarrio = "";
                id = this.comboBarrio2;

                if(this.comboBarrio2 == ""){
                    tipo = "corre";
                    id = this.comboCorregimiento;
                }
            }
            
            if(this.comboVereda == "" && this.comboBarrio == "" && this.comboCorregimiento == "" && this.comboBarrio2 == ""){
                tipo = "Todos";
            }

            await reporteServicios.adulto_mayor(tipo, id).then(respuesta => {
                this.adulto_mayor_array = respuesta.data.adulto_mayor;   
            })
            .catch(err => {
                console.log(err);
            });
        },

        cerrarModal() {
            this.$refs.modalpdf.hide();
        },        
    }
};
</script>
