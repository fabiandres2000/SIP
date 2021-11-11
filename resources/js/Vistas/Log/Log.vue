<template>
    <div>
        <div class="kt-portlet" style="margin-top: -4%;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <span class="kt-widget20__number kt-font-danger"
                            >BITACORA DEL SISTEMA</span
                        >
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <div class="row">
                            <div class="col-lg-2">
                                <label>Usuarios:</label>
                                <b-form-select
                                    v-model.trim="datos.usuarios"
                                    :class="
                                        datos.usuarios == '0'
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                >
                                    <option value="0" selected
                                        >Seleccione</option
                                    >
                                    <option
                                        v-for="item in usuarios"
                                        :value="item.id"
                                        :key="item.id"
                                        >{{ item.nombre }}</option
                                    >
                                </b-form-select>
                            </div>
                            <div class="col-lg-2">
                                <label>Modulos:</label>
                                <b-form-select
                                    v-model.trim="datos.modulos"
                                    :class="
                                        datos.modulos == '0'
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                >
                                    <option value="0" selected
                                        >Seleccione</option
                                    >
                                    <option id="INICIO SESION">INICIO</option>
                                    <option id="PARAMETROS ACTIVIDADES"
                                        >ACTIVIDADES</option
                                    >
                                    <option id="PARAMETROS BARRIOS"
                                        >BARRIOS</option
                                    >
                                    <option id="PARAMETROS ESCOLARIDAD"
                                        >ESCOLARIDAD</option
                                    >
                                    <option
                                        id="PARAMETROS ENFERMEDADES_INFECCIOSAS"
                                        >ENFERMEDADES INFECCIOSAS</option
                                    >
                                    <option
                                        id="PARAMETROS ENFERMEDADES_CRONICAS"
                                        >ENFERMEDADES CRONICAS</option
                                    >
                                    <option id="PARAMETROS CORREGIMIENTOS"
                                        >CORREGIMIENTOS</option
                                    >
                                    <option id="PARAMETROS COLEGIOS"
                                        >COLEGIOS</option
                                    >
                                    <option id="ESTABLECIMIENTOS"
                                        >ESTABLECIMIENTOS</option
                                    >
                                    <option id="PARAMETROS ESTADO_CIVIL"
                                        >ESTADO CIVIL</option
                                    >
                                    <option id="PARAMETROS ETNIAS"
                                        >ETNIAS</option
                                    >
                                    <option id="PARAMETROS GRUPOS"
                                        >GRUPOS</option
                                    >
                                    <option id="PARAMETROS METODOS"
                                        >METODOS</option
                                    >
                                    <option id="PARAMETROS MORBILIDAD_GESTACION"
                                        >MORBILIDAD GESTACION</option
                                    >
                                    <option id="PARAMETROS MORBILIDAD_NACER"
                                        >MORBILIDAD AL NACER</option
                                    >
                                    <option id="PARAMETROS MOTIVOS"
                                        >MOTIVOS</option
                                    >
                                    <option id="PARAMETROS OCUPACIONES"
                                        >OCUPACIONES</option
                                    >
                                    <option id="PARAMETROS PARENTESCOS"
                                        >PARENTESCOS</option
                                    >
                                    <option id="PARAMETROS RELIGION"
                                        >RELIGION</option
                                    >
                                    <option id="PARAMETROS VEREDAS"
                                        >VEREDAS</option
                                    >
                                    <option id="PARAMETROS USUARIOS"
                                        >USUARIOS</option
                                    >
                                    <option id="SOPORTE ENTES"
                                        >SOPORTE ENTES</option
                                    >
                                    <option id="UNIDADES">UNIDADES</option>
                                    <option id="CERRAR SESION">CERRAR</option>
                                </b-form-select>
                            </div>
                            <div class="col-lg-2">
                                <label>Fecha:</label>
                                <input
                                    id="date"
                                    type="date"
                                    placeholder="Fecha"
                                    v-model="datos.fecha"
                                    :class="
                                        datos.fecha == '0' ? '' : 'is-valid'
                                    "
                                    class="form-control text-capitalize"
                                    :max="hoy | moment"
                                />
                            </div>
                            <div class="col-lg-2">
                                <br />
                                <label
                                    >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label
                                >
                                <a
                                    href="javascript:;"
                                    class="btn btn-outline-success btn-icon"
                                    data-skin="dark"
                                    data-toggle="kt-tooltip"
                                    data-placement="top"
                                    title="Buscar"
                                    @click.prevent="buscar(1)"
                                >
                                    <i class="fa fa-search"></i> </a
                                >&nbsp;
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead class>
                                            <tr class="kt-bg-fill-brand">
                                                <th>No.</th>
                                                <th>Acción</th>
                                                <th>Fecha</th>
                                                <th class="text-center">IP</th>
                                                <th>Modulo</th>
                                                <th class="text-left">
                                                    Usuario
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, index) in logs"
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
                                                    {{ item.accion }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;"
                                                >
                                                    {{ item.fecha }} -
                                                    {{ item.hora }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: center;"
                                                >
                                                    {{ item.ip }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;"
                                                >
                                                    {{ item.modulo }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;"
                                                >
                                                    {{ item.nombre }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div
                                        class="kt-separator kt-separator--border-dashed"
                                    ></div>
                                    <!--begin: Section-->
                                    <div class="kt-section">
                                        <!--begin: Pagination-->
                                        <div
                                            class="kt-pagination kt-pagination--danger"
                                        >
                                            <ul class="kt-pagination__links">
                                                <li
                                                    class="kt-pagination__link--first"
                                                    v-if="
                                                        paginacion.pagina_actual >
                                                            1
                                                    "
                                                >
                                                    <a
                                                        href="javascript:;"
                                                        @click.prevent="
                                                            cambiarPaginas(1)
                                                        "
                                                    >
                                                        <i
                                                            class="fa fa-angle-double-left kt-font-danger"
                                                        ></i>
                                                    </a>
                                                </li>
                                                <li
                                                    class="kt-pagination__link--next"
                                                    v-if="
                                                        paginacion.pagina_actual >
                                                            1
                                                    "
                                                >
                                                    <a
                                                        href="javascript:;"
                                                        @click.prevent="
                                                            cambiarPaginas(
                                                                paginacion.pagina_actual -
                                                                    1
                                                            )
                                                        "
                                                    >
                                                        <i
                                                            class="fa fa-angle-left kt-font-danger"
                                                        ></i>
                                                    </a>
                                                </li>
                                                <li
                                                    :class="[
                                                        pagina == esActivo
                                                            ? 'kt-pagination__link--active'
                                                            : ''
                                                    ]"
                                                    v-for="(pagina,
                                                    index) in numeroDePaginas"
                                                    :key="index"
                                                >
                                                    <a
                                                        href="javascript:;"
                                                        @click.prevent="
                                                            cambiarPaginas(
                                                                pagina
                                                            )
                                                        "
                                                        >{{ pagina }}</a
                                                    >
                                                </li>
                                                <li
                                                    class="kt-pagination__link--prev"
                                                    v-if="
                                                        paginacion.pagina_actual <
                                                            paginacion.ultima_pagina
                                                    "
                                                >
                                                    <a
                                                        href="javascript:;"
                                                        @click.prevent="
                                                            cambiarPaginas(
                                                                paginacion.pagina_actual +
                                                                    1
                                                            )
                                                        "
                                                    >
                                                        <i
                                                            class="fa fa-angle-right kt-font-danger"
                                                        ></i>
                                                    </a>
                                                </li>
                                                <li
                                                    class="kt-pagination__link--last"
                                                    v-if="
                                                        paginacion.pagina_actual <
                                                            paginacion.ultima_pagina
                                                    "
                                                >
                                                    <a
                                                        href="javascript:;"
                                                        @click.prevent="
                                                            cambiarPaginas(
                                                                paginacion.ultima_pagina
                                                            )
                                                        "
                                                    >
                                                        <i
                                                            class="fa fa-angle-double-right kt-font-danger"
                                                        ></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--end: Pagination-->
                                    </div>
                                    <!--end: Section-->
                                </div>
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
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
export default {
    mounted() {
        this.consultar(1);
        this.hoy = moment();
    },
    filters: {
        moment: function(date) {
            return moment(date).format("YYYY-MM-DD");
        }
    },
    name: "entes",
    data() {
        return {
            errores: [],
            usuarios: [],
            logs: [],
            errorDevuelto: [],
            entrarPorError: false,
            logData: {
                id: 0,
                id_usuario: 0,
                accion: "",
                fecha: "",
                hora: "",
                estado: "Activo",
                ip: "",
                modulo: ""
            },
            datos: {
                usuarios: "0",
                fecha: "0",
                modulos: "0"
            },
            hoy: "",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            headerTextVariant: "light",
            mostrar: true,
            paginacion: {
                total: 0,
                pagina_actual: 0,
                por_pagina: 0,
                ultima_pagina: 0,
                desde: 0,
                hasta: 0
            },
            offset: 4,
            valG: true,
            actual: 0
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
        }
    },
    methods: {
        consultar: async function(pagina) {
            const parametros = {
                _token: this.csrf,
                page: pagina
            };
            try {
                await usuarioServicios
                    .usuariosLog(parametros)
                    .then(respuesta => {
                        this.usuarios = respuesta.data.usuarios;
                        this.logs = respuesta.data.logs.data;
                        this.paginacion = respuesta.data.paginacion;
                    });
            } catch (error) {
                switch (error.response.status) {
                    case 419:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        cambiarPaginas: function(pagina) {
            this.paginacion.pagina_actual = pagina;
            this.buscar(pagina);
        },
        buscar: async function(pagina) {
            const parametros = {
                _token: this.csrf,
                id_usuario: this.datos.usuarios,
                modulos: this.datos.modulos,
                fecha: this.datos.fecha,
                page: pagina
            };
            try {
                await usuarioServicios
                    .usuariosLogBuscar(parametros)
                    .then(respuesta => {
                        this.logs = respuesta.data.logs.data;
                        this.paginacion = respuesta.data.paginacion;
                    });
            } catch (error) {
                switch (error.response.status) {
                    case 419:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        }
    }
};
</script>
