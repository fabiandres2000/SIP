<template>
    <div>
        <div class="kt-portlet" style="margin-top: -4%;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <span class="kt-widget20__number kt-font-danger"
                            >GESTIÓN DE BARRIOS</span
                        >
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="kt-section">
                                    <div class="kt-section__content">
                                        <a
                                            href="javascript:;"
                                            class="btn btn-outline-primary "
                                            data-skin="dark"
                                            data-toggle="kt-tooltip"
                                            data-placement="top"
                                            title="Nuevo Barrio"
                                            @click="abrirModal"
                                        >
                                            <i class="la la-file-text-o"></i>
                                            Nuevo Barrio</a
                                        >&nbsp;
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-lg-6">
                                <form class="kt-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Busqueda"
                                                v-model="txtbusqueda"
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-icon"
                                                    @click="consultar(1)"
                                                >
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table
                                        class="table table-sm table-hover"
                                        id="tablaDatos"
                                    >
                                        <thead class>
                                            <tr class="kt-bg-fill-brand">
                                                <th class="text-white">No.</th>
                                                <th class="text-white">
                                                    Barrio
                                                </th>
                                                <th class="text-white">
                                                    Departamento
                                                </th>
                                                <th class="text-white">
                                                    Municipio
                                                </th>
                                                <th class="text-white">
                                                    Corregimiento
                                                </th>
                                                <td
                                                    class="text-center text-white"
                                                >
                                                    Estado
                                                </td>
                                                <td
                                                    class="text-center text-white"
                                                >
                                                    Opciones
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, index) in barrios"
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
                                                    {{ item.BARRI }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                                >
                                                    {{ item.DEPARTAMENTO }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                                >
                                                    {{ item.MUNICIPIO }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                                >
                                                    {{ item.CORREGI }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: center;"
                                                >
                                                    <span
                                                        class="kt-badge kt-badge--inline"
                                                        :class="
                                                            item.ESTADO ==
                                                            'Activo'
                                                                ? 'kt-badge--success'
                                                                : 'kt-badge--danger'
                                                        "
                                                        >{{ item.ESTADO }}</span
                                                    >
                                                </td>
                                                <td
                                                    style="text-align:center;vertical-align: middle;text-align: center;"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-outline-info btn-icon btn-sm"
                                                        title="Editar"
                                                        @click="editar(item)"
                                                    >
                                                        <i
                                                            class="fa fa-edit"
                                                        ></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-icon btn-sm"
                                                        :class="
                                                            item.ESTADO ==
                                                            'Activo'
                                                                ? 'btn-outline-danger'
                                                                : 'btn-outline-success'
                                                        "
                                                        type="button"
                                                        :title="
                                                            item.ESTADO ==
                                                            'Activo'
                                                                ? 'Anular'
                                                                : 'Activar'
                                                        "
                                                        @click="eliminar(item)"
                                                    >
                                                        <i
                                                            class="fa"
                                                            :class="
                                                                item.ESTADO ==
                                                                'Activo'
                                                                    ? 'fa-trash'
                                                                    : 'fa-check'
                                                            "
                                                        ></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div
                                        class="kt-separator kt-separator--border-dashed"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Modal-->
            <b-modal
                ref="modalBarrio"
                hide-footer
                title="Gestion de Barrios"
                size="xl"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
            >
                <div class="d-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <transition :duration="1000" name="fade">
                                <div
                                    class="alert alert-warning fade show"
                                    role="alert"
                                    v-if="entrarPorError"
                                >
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text">
                                        Por favor, corrija el(los) siguiente(s)
                                        error(es):
                                        <hr />
                                        <ul>
                                            <li
                                                v-for="(error,
                                                index) in errorDevuelto"
                                                :key="index"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="alert-close">
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">
                                                <i class="la la-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <transition :duration="1000" name="fade">
                                <div
                                    class="alert alert-warning fade show"
                                    role="alert"
                                    v-if="errores.length"
                                >
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text">
                                        Por favor, corrija el(los) siguiente(s)
                                        error(es):
                                        <hr />
                                        <ul>
                                            <li
                                                v-for="(error,
                                                index) in errores"
                                                :key="index"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="alert-close">
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">
                                                <i class="la la-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <form>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Departamento:</label>
                                <b-form-select v-model="barriosData.dpto">
                                    <option value selected>Seleccione</option>
                                    <option
                                        v-for="item in dpto_options"
                                        :value="item.value"
                                        :key="item.value"
                                        >{{ item.texto }}</option
                                    >
                                </b-form-select>
                            </div>
                            <div class="col-lg-4">
                                <label>Municipio:</label>
                                <b-form-select
                                    v-model="barriosData.muni"
                                    @change="cambio"
                                >
                                    <option value selected>Seleccione</option>
                                    <option
                                        v-for="item in muni_options[
                                            barriosData.dpto
                                        ]"
                                        :value="item.value"
                                        :key="item.value"
                                        >{{ item.texto }}</option
                                    >
                                </b-form-select>
                            </div>
                            <div class="col-lg-4" v-if="bandera">
                                <label>Corregimiento:</label>
                                <b-form-select
                                    v-model="barriosData.corregimiento"
                                >
                                    <option value="0" selected
                                        >Seleccione</option
                                    >
                                    <option
                                        v-for="item in corregi_options[
                                            barriosData.muni
                                        ]"
                                        :value="item.value"
                                        :key="item.value"
                                        >{{ item.texto }}</option
                                    >
                                </b-form-select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-11">
                                <label>Barrio:</label>
                                <input
                                    type="text"
                                    class="form-control text-capitalize"
                                    placeholder="Barrio"
                                    v-model="barriosData.barrio"
                                />
                            </div>
                            <div class="col-lg-1">
                                <label>&nbsp;&nbsp;&nbsp;</label>
                                <a
                                    href="javascript:;"
                                    class="btn btn-outline-info btn-icon"
                                    data-skin="dark"
                                    data-toggle="kt-tooltip"
                                    data-placement="top"
                                    title="Agregar Barrio"
                                    @click.prevent="agregar"
                                    v-if="banderaBoton"
                                >
                                    <i class="fa fa-plus"></i> </a
                                >&nbsp;
                            </div>
                        </div>
                        <div class="form-group row" v-if="banderaBoton">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead class>
                                            <tr class="kt-bg-fill-brand">
                                                <th>No.</th>
                                                <th>Departamento</th>
                                                <th>Municipio</th>
                                                <th>Corregimiento</th>
                                                <th>Barrio</th>
                                                <td class="text-center">
                                                    Opciones
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, index) in datos"
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
                                                    <span
                                                        class="text-capitalize"
                                                        >{{
                                                            item.dptoTexto
                                                        }}</span
                                                    >
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                                >
                                                    <span
                                                        class="text-capitalize"
                                                        >{{
                                                            item.muniTexto
                                                        }}</span
                                                    >
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                                >
                                                    <span
                                                        class="text-capitalize"
                                                        >{{
                                                            item.corregimientoTexto
                                                        }}</span
                                                    >
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                                >
                                                    {{ item.barrio }}
                                                </td>
                                                <td
                                                    style="text-align:center;vertical-align: middle;text-align: center;"
                                                >
                                                    <button
                                                        class="btn btn-icon btn-sm btn-outline-danger"
                                                        type="button"
                                                        title="Eliminar"
                                                        @click="
                                                            eliminarItem(index)
                                                        "
                                                    >
                                                        <i
                                                            class="fa fa-trash"
                                                        ></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="text-right">
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="guardarBarrio"
                                :disabled="!valG"
                                :class="spinG"
                                v-if="banderaBoton"
                            >
                                <i class="fa fa-edit"></i> Guardar
                            </button>
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="editarBarrio"
                                v-else
                            >
                                <i class="fa fa-edit"></i> Guardar
                            </button>
                            <button
                                type="button"
                                class="btn btn-warning"
                                @click="cerrarModal"
                            >
                                <i class="fa fa-window-close"></i> Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </b-modal>
        </div>
    </div>
</template>
<script>
"use strict";
import * as barriosServicios from "../../Servicios/barrios_servicios";
import datatable from "datatables.net-bs4";
require("datatables.net-buttons/js/dataTables.buttons");
require("datatables.net-buttons/js/buttons.html5");
import print from "datatables.net-buttons/js/buttons.print";
import jszip from "jszip/dist/jszip";
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip;
export default {
    mounted() {
        this.consultar(1);
    },
    name: "barri",
    data() {
        return {
            errores: [],
            bandera: false,
            entrarPorError: false,
            txtbusqueda: "",
            barrios: [],
            barriosData: {
                dpto: "",
                muni: "",
                corregimiento: "0",
                barrio: "",
                id: 0
            },
            dpto_options: [],
            muni_options: {},
            corregi_options: {},
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            datos: [],
            paginacion: {
                total: 0,
                pagina_actual: 0,
                por_pagina: 0,
                ultima_pagina: 0,
                desde: 0,
                hasta: 0
            },
            offset: 4,
            banderaBoton: true,
            valG: true,
            tabladatos: null
        };
    },
    computed: {
        esActivo: function() {
            return this.paginacion.pagina_actual;
        },
        numeroDePaginas: function() {
            if (!this.paginacion.hasta) {
                return [];
            }
            var desde = this.paginacion.pagina_actual - this.offset; // TODO offset
            if (desde < 1) {
                desde = 1;
            }
            var aux = this.offset * 2;
            var hasta = desde + aux;
            if (hasta >= this.paginacion.ultima_pagina) {
                hasta = this.paginacion.ultima_pagina;
            }
            var paginasArray = [];
            while (desde <= hasta) {
                paginasArray.push(desde);
                desde++;
            }
            return paginasArray;
        },
        spinG() {
            if (this.valG) {
                return {};
            } else {
                return [
                    "kt-spinner",
                    "kt-spinner--right",
                    "kt-spinner--sm",
                    "kt-spinner--light"
                ];
            }
        }
    },
    methods: {
        consultar: async function(pagina) {
            this.barrios = [];
            const parametros = {
                txtbusqueda: this.txtbusqueda.trim(),
                _token: this.csrf,
                page: pagina
            };
            try {
                await barriosServicios
                    .listarBarrios(parametros)
                    .then(respuesta => {
                        this.barrios = respuesta.data.barrios;
                        this.dpto_options = respuesta.data.arrayDpto;
                        this.muni_options = respuesta.data.arrayMuni;
                        this.corregi_options = respuesta.data.arrayCorregi;
                        // this.paginacion = respuesta.data.paginacion;
                        this.tabla();
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
        abrirModal() {
            this.errores = [];
            this.entrarPorError = false;
            this.datos = [];
            this.barriosData.barrio = "";
            this.barriosData.dpto = "";
            this.barriosData.muni = "";
            this.barriosData.corregimiento = "0";
            this.barriosData.id = 0;
            this.bandera = false;
            this.banderaBoton = true;
            this.$refs.modalBarrio.show();
        },
        cerrarModal() {
            this.$refs.modalBarrio.hide();
        },
        cambio() {
            this.bandera = false;
            this.corregimiento = "0";
            for (let key in this.corregi_options[this.barriosData.muni]) {
                this.bandera = true;
            }
        },
        agregar: function() {
            if (this.barriosData.dpto == "") {
                this.$swal(
                    "Error...!",
                    "Por favor seleccione un departamento!",
                    "error"
                );
                return;
            }
            if (this.barriosData.muni == "") {
                this.$swal(
                    "Error...!",
                    "Por favor seleccione un municipio!",
                    "error"
                );
                return;
            }
            if (this.barriosData.barrio == "") {
                this.$swal("Error...!", "Por favor digite un barrio!", "error");
                return;
            }
            if (this.barriosData.corregimiento !== "0") {
                this.datos.push({
                    dpto: this.barriosData.dpto,
                    dptoTexto: this.showText(
                        this.barriosData.dpto,
                        this.dpto_options
                    ),
                    muni: this.barriosData.muni,
                    muniTexto: this.showText(
                        this.barriosData.muni,
                        this.muni_options[this.barriosData.dpto]
                    ),
                    corregimiento: this.barriosData.corregimiento,
                    corregimientoTexto: this.showText(
                        this.barriosData.corregimiento,
                        this.corregi_options[this.barriosData.muni]
                    ),
                    barrio: this.barriosData.barrio,
                    id: 0
                });
            } else {
                this.datos.push({
                    dpto: this.barriosData.dpto,
                    dptoTexto: this.showText(
                        this.barriosData.dpto,
                        this.dpto_options
                    ),
                    muni: this.barriosData.muni,
                    muniTexto: this.showText(
                        this.barriosData.muni,
                        this.muni_options[this.barriosData.dpto]
                    ),
                    corregimiento: 0,
                    corregimientoTexto: "",
                    barrio: this.barriosData.barrio,
                    id: 0
                });
            }
            this.barriosData.barrio = "";
        },
        eliminarItem: function(index) {
            this.datos.splice(index, 1);
        },
        guardarBarrio: async function() {
            if (!this.checkForm()) {
                this.entrarPorError = false;
            } else {
                this.errores = [];
                const parametros = {
                    _token: this.csrf,
                    barrios: this.datos,
                    opcion: "GUARDAR"
                };
                this.valG = false;
                try {
                    await barriosServicios
                        .guardarBarrios(parametros)
                        .then(respuesta => {
                            this.tabladatos.fnClearTable();
                            this.tabladatos.fnDestroy();
                            this.consultar(1);
                            this.barriosData.barrio = "";
                            this.barriosData.dpto = "";
                            this.barriosData.muni = "";
                            this.barriosData.corregimiento = "0";
                            this.barriosData.id = 0;
                            this.bandera = false;
                            this.cerrarModal();
                            this.valG = true;
                            this.$swal(
                                "Guardar...!",
                                "Datos Guardados Exitosamente!",
                                "success"
                            );
                        })
                        .catch(error => {
                            this.errorDevuelto = error.response.data.errors;
                            this.entrarPorError = true;
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 419:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
        },
        editarBarrio: async function() {
            if (!this.checkForm2()) {
                this.entrarPorError = false;
            } else {
                this.errores = [];
                const parametros = {
                    _token: this.csrf,
                    barrios: this.barriosData,
                    opcion: "EDITAR"
                };
                this.valG = false;
                try {
                    await barriosServicios
                        .guardarBarrios(parametros)
                        .then(respuesta => {
                            this.tabladatos.fnClearTable();
                            this.tabladatos.fnDestroy();
                            this.consultar(1);
                            this.datos = [];
                            this.barriosData.barrio = "";
                            this.barriosData.dpto = "";
                            this.barriosData.muni = "";
                            this.barriosData.corregimiento = "0";
                            this.barriosData.id = 0;
                            this.bandera = false;
                            this.cerrarModal();
                            this.$swal(
                                "Guardar...!",
                                "Datos Guardados Exitosamente!",
                                "success"
                            );
                            this.valG = true;
                        })
                        .catch(error => {
                            this.errorDevuelto = error.response.data.errors;
                            this.entrarPorError = true;
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 419:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
        },
        checkForm(e) {
            this.errores = [];
            if (this.datos.length <= 0) {
                this.errores.push("Agregue por lo menos un barrio");
            }

            if (!this.errores.length) {
                return true;
            } else {
                return false;
            }
            e.preventDefault();
        },
        checkForm2(e) {
            this.errores = [];
            if (this.barriosData.dpto == "") {
                this.errores.push("Por favor seleccione el departamento.");
            }
            if (this.barriosData.muni == "") {
                this.errores.push("Por favor seleccione el municipio");
            }
            if (this.barriosData.barrio == "") {
                this.errores.push("Por favor digite el barrio.");
            }
            if (!this.errores.length) {
                return true;
            } else {
                return false;
            }
            e.preventDefault();
        },
        cambiarPaginas: function(pagina) {
            this.paginacion.pagina_actual = pagina;
            this.consultar(pagina);
        },
        eliminar: async function(usu) {
            var title = "";
            var titulo = "";
            if (usu.ESTADO == "Activo") {
                title = "¿Desea anular el barrio " + usu.BARRI + "?";
                titulo = "Barrio " + usu.BARRI + " anulado de manera exitosa";
            } else {
                title = "¿Desea activar el barrio " + usu.BARRIO + "?";
                titulo = "Barrio " + usu.BARRIO + " activado de manera exitosa";
            }
            this.$swal({
                title: title,
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar"
            }).then(result => {
                if (result.value) {
                    const parametros = {
                        _token: this.csrf,
                        id: usu.id,
                        estado: usu.ESTADO
                    };

                    try {
                        barriosServicios
                            .eliminarBarrios(parametros)
                            .then(respuesta => {
                                this.tabladatos.fnClearTable();
                                this.tabladatos.fnDestroy();
                                this.consultar(1);
                                this.$swal({
                                    position: "top-end",
                                    icon: "success",
                                    title: titulo,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            })
                            .catch(error => {
                                this.$swal(
                                    "Error...!",
                                    "Ocurrio un error!",
                                    "error"
                                );
                            });
                    } catch (error) {
                        switch (error.response.status) {
                            case 422:
                                this.$swal(
                                    "Error...!",
                                    "Ocurrio un error!",
                                    "error"
                                );
                                break;
                            default:
                                this.$swal(
                                    "Error...!",
                                    "Ocurrio un error!",
                                    "error"
                                );
                                break;
                        }
                    }
                }
            });
        },
        editar: function(item) {
            // this.barriosData = { ...item };
            this.entrarPorError = false;
            this.errores = [];
            this.barriosData.dpto = item.dpto;
            this.barriosData.muni = item.muni;
            this.barriosData.corregimiento = item.corregimiento;
            this.bandera = false;
            if (this.barriosData.corregimiento != null) {
                this.bandera = true;
            } else {
                this.bandera = false;
            }
            this.barriosData.barrio = item.BARRI;
            this.barriosData.id = item.id;
            this.banderaBoton = false;
            this.$refs.modalBarrio.show();
        },
        showText: function(val, vectorAux) {
            for (var i = 0; i < vectorAux.length; i++) {
                if (vectorAux[i].value === val) {
                    return vectorAux[i].texto;
                }
            }
            return "";
        },
        tabla() {
            this.$nextTick(() => {
                $.fn.DataTable = datatable;
                this.tabladatos = $("#tablaDatos").DataTable({
                    // bFilter: false,
                    orderCellsTop: true,
                    language: {
                        processing: "Procesando...",
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        emptyTable: "Ningún dato disponible en esta tabla",
                        infoEmpty:
                            "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered:
                            "(filtrado de un total de _MAX_ registros)",
                        search: "Buscar:",
                        infoThousands: ",",
                        loadingRecords: "Cargando...",
                        paginate: {
                            first: "Primero",
                            last: "Último",
                            next: "Siguiente",
                            previous: "Anterior"
                        },
                        aria: {
                            sortAscending:
                                ": Activar para ordenar la columna de manera ascendente",
                            sortDescending:
                                ": Activar para ordenar la columna de manera descendente"
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Visibilidad",
                            collection: "Colección",
                            colvisRestore: "Restaurar visibilidad",
                            copyKeys:
                                "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                            copySuccess: {
                                "1": "Copiada 1 fila al portapapeles",
                                _: "Copiadas %d fila al portapapeles"
                            },
                            copyTitle: "Copiar al portapapeles",
                            csv: "CSV",
                            excel: "Excel",
                            pageLength: {
                                "-1": "Mostrar todas las filas",
                                _: "Mostrar %d filas"
                            },
                            pdf: "PDF",
                            print: "Imprimir"
                        },
                        autoFill: {
                            cancel: "Cancelar",
                            fill: "Rellene todas las celdas con <i>%d<\/i>",
                            fillHorizontal: "Rellenar celdas horizontalmente",
                            fillVertical: "Rellenar celdas verticalmentemente"
                        },
                        decimal: ",",
                        searchBuilder: {
                            add: "Añadir condición",
                            button: {
                                "0": "Constructor de búsqueda",
                                _: "Constructor de búsqueda (%d)"
                            },
                            clearAll: "Borrar todo",
                            condition: "Condición",
                            conditions: {
                                date: {
                                    after: "Despues",
                                    before: "Antes",
                                    between: "Entre",
                                    empty: "Vacío",
                                    equals: "Igual a",
                                    notBetween: "No entre",
                                    notEmpty: "No Vacio",
                                    not: "Diferente de"
                                },
                                number: {
                                    between: "Entre",
                                    empty: "Vacio",
                                    equals: "Igual a",
                                    gt: "Mayor a",
                                    gte: "Mayor o igual a",
                                    lt: "Menor que",
                                    lte: "Menor o igual que",
                                    notBetween: "No entre",
                                    notEmpty: "No vacío",
                                    not: "Diferente de"
                                },
                                string: {
                                    contains: "Contiene",
                                    empty: "Vacío",
                                    endsWith: "Termina en",
                                    equals: "Igual a",
                                    notEmpty: "No Vacio",
                                    startsWith: "Empieza con",
                                    not: "Diferente de"
                                },
                                array: {
                                    not: "Diferente de",
                                    equals: "Igual",
                                    empty: "Vacío",
                                    contains: "Contiene",
                                    notEmpty: "No Vacío",
                                    without: "Sin"
                                }
                            },
                            data: "Data",
                            deleteTitle: "Eliminar regla de filtrado",
                            leftTitle: "Criterios anulados",
                            logicAnd: "Y",
                            logicOr: "O",
                            rightTitle: "Criterios de sangría",
                            title: {
                                "0": "Constructor de búsqueda",
                                _: "Constructor de búsqueda (%d)"
                            },
                            value: "Valor"
                        },
                        searchPanes: {
                            clearMessage: "Borrar todo",
                            collapse: {
                                "0": "Paneles de búsqueda",
                                _: "Paneles de búsqueda (%d)"
                            },
                            count: "{total}",
                            countFiltered: "{shown} ({total})",
                            emptyPanes: "Sin paneles de búsqueda",
                            loadMessage: "Cargando paneles de búsqueda",
                            title: "Filtros Activos - %d"
                        },
                        select: {
                            cells: {
                                "1": "1 celda seleccionada",
                                _: "%d celdas seleccionadas"
                            },
                            columns: {
                                "1": "1 columna seleccionada",
                                _: "%d columnas seleccionadas"
                            },
                            rows: {
                                "1": "1 fila seleccionada",
                                _: "%d filas seleccionadas"
                            }
                        },
                        thousands: ".",
                        datetime: {
                            previous: "Anterior",
                            next: "Proximo",
                            hours: "Horas",
                            minutes: "Minutos",
                            seconds: "Segundos",
                            unknown: "-",
                            amPm: ["AM", "PM"],
                            months: {
                                "0": "Enero",
                                "1": "Febrero",
                                "10": "Noviembre",
                                "11": "Diciembre",
                                "2": "Marzo",
                                "3": "Abril",
                                "4": "Mayo",
                                "5": "Junio",
                                "6": "Julio",
                                "7": "Agosto",
                                "8": "Septiembre",
                                "9": "Octubre"
                            },
                            weekdays: [
                                "Dom",
                                "Lun",
                                "Mar",
                                "Mie",
                                "Jue",
                                "Vie",
                                "Sab"
                            ]
                        },
                        editor: {
                            close: "Cerrar",
                            create: {
                                button: "Nuevo",
                                title: "Crear Nuevo Registro",
                                submit: "Crear"
                            },
                            edit: {
                                button: "Editar",
                                title: "Editar Registro",
                                submit: "Actualizar"
                            },
                            remove: {
                                button: "Eliminar",
                                title: "Eliminar Registro",
                                submit: "Eliminar",
                                confirm: {
                                    _:
                                        "¿Está seguro que desea eliminar %d filas?",
                                    "1":
                                        "¿Está seguro que desea eliminar 1 fila?"
                                }
                            },
                            error: {
                                system:
                                    'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\\/a&gt;).<\/a>'
                            },
                            multi: {
                                title: "Múltiples Valores",
                                info:
                                    "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                                restore: "Deshacer Cambios",
                                noMulti:
                                    "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                            }
                        },
                        info: "Mostrando _START_ a _END_ de _TOTAL_ registros"
                    },
                    dom:
                        "B<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: {
                        dom: {
                            buttons: {
                                className: "btn"
                            }
                        },
                        buttons: [
                            {
                                extend: "copyHtml5",
                                text: "<i class='fa fa-file-alt'></i>",
                                titleAttr: "Copiar",
                                className:
                                    "btn btn-outline-brand btn-icon btn-lg",
                                messageTop: "Listado de Barrios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },
                            {
                                extend: "excelHtml5",
                                text: "<i class='fa fa-file-excel'></i>",
                                titleAttr: "Exportar a Excel",
                                className:
                                    "btn btn-outline-success btn-icon btn-lg",
                                excelStyles: {
                                    template: "header_blue"
                                },
                                messageTop: "Listado de Barrios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },
                            {
                                extend: "pdfHtml5",
                                text: "<i class='fa fa-file-pdf'></i>",
                                titleAttr: "Exportar a PDF",
                                className:
                                    "btn btn-outline-danger btn-icon btn-lg",
                                messageTop: "Listado de Barrios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                },
                                customize: function(doc) {
                                    doc.styles.title = {
                                        color: "red",
                                        fontSize: "20",
                                        alignment: "center"
                                    };
                                    doc.styles["td:nth-child(2)"] = {
                                        width: "100px",
                                        "max-width": "100px"
                                    };
                                    doc.styles.tableHeader = {
                                        fillColor: "#DF0101",
                                        color: "white"
                                    };
                                }
                            },
                            {
                                extend: "csvHtml5",
                                text: "<i class='fa fa-file-csv'></i>",
                                titleAttr: "Exportar a csv",
                                className:
                                    "btn btn-outline-info btn-icon btn-lg",
                                messageTop: "Listado de Barrios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },
                            {
                                extend: "print",
                                text: "<i class='fa fa-print'></i>",
                                titleAttr: "Imprimir Archivo",
                                className:
                                    "btn btn-outline-dark btn-icon btn-lg",
                                messageTop: "Listado de Barrios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            }
                        ]
                    }
                });
                $(".dataTables_filter input").attr(
                    "placeholder",
                    "Busqueda..."
                );
                $(".dataTables_filter label").addClass("form-control");
                $(".dataTables_filter label").css("outline", "none");
                $(".dataTables_filter label").css("border", "0");
                $(".dataTables_filter label").css("padding-bottom", "35px");
            });
        }
    }
};
</script>
<style>
.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5) !important;
}
.modal-title {
    color: #f8f9fa !important;
}
.close {
    display: none;
}
</style>
