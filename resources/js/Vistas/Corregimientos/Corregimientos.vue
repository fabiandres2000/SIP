<template>
  <div>
    <div class="kt-portlet" style="margin-top: -4%;">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            <span class="kt-widget20__number kt-font-danger">GESTIÓN DE CORREGIMIENTOS</span>
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
                      class="btn btn-outline-primary btn-icon"
                      data-skin="dark"
                      data-toggle="kt-tooltip"
                      data-placement="top"
                      title="Nuevo Corregimiento"
                      @click="abrirModal"
                    >
                      <i class="la la-file-text-o"></i>
                    </a>&nbsp;
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
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
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Corregimiento</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <td class="text-center">Estado</td>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in corregimientos" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.CORREGIMIENTO}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.DPTO}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.MUNI}}</td>
                        <td style="font-weight: normal;vertical-align: middle;text-align: center;">
                          <span
                            class="kt-badge kt-badge--inline"
                            :class="item.ESTADO=='Activo'?'kt-badge--success':'kt-badge--danger'"
                          >{{item.ESTADO}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            type="button"
                            class="btn btn-outline-info btn-icon btn-sm"
                            title="Editar"
                            @click="editar(item)"
                          >
                            <i class="fa fa-edit"></i>
                          </button>
                          <button
                            class="btn btn-icon btn-sm"
                            :class="(item.ESTADO=='Activo'?'btn-outline-danger':'btn-outline-success')"
                            type="button"
                            :title="(item.ESTADO=='Activo')?'Anular':'Activar'"
                            @click="eliminar(item)"
                          >
                            <i class="fa" :class="(item.ESTADO=='Activo')?'fa-trash':'fa-check'"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                  <!--begin: Section-->
                  <div class="kt-section">
                    <!--begin: Pagination-->
                    <div class="kt-pagination kt-pagination--danger">
                      <ul class="kt-pagination__links">
                        <li class="kt-pagination__link--first" v-if="paginacion.pagina_actual>1">
                          <a href="javascript:;" @click.prevent="cambiarPaginas(1)">
                            <i class="fa fa-angle-double-left kt-font-danger"></i>
                          </a>
                        </li>
                        <li class="kt-pagination__link--next" v-if="paginacion.pagina_actual>1">
                          <a
                            href="javascript:;"
                            @click.prevent="cambiarPaginas(paginacion.pagina_actual-1)"
                          >
                            <i class="fa fa-angle-left kt-font-danger"></i>
                          </a>
                        </li>
                        <li
                          :class="[pagina==esActivo ? 'kt-pagination__link--active': '']"
                          v-for="(pagina,index) in numeroDePaginas"
                          :key="index"
                        >
                          <a href="javascript:;" @click.prevent="cambiarPaginas(pagina)">{{pagina}}</a>
                        </li>
                        <li
                          class="kt-pagination__link--prev"
                          v-if="paginacion.pagina_actual<paginacion.ultima_pagina"
                        >
                          <a
                            href="javascript:;"
                            @click.prevent="cambiarPaginas(paginacion.pagina_actual+1)"
                          >
                            <i class="fa fa-angle-right kt-font-danger"></i>
                          </a>
                        </li>
                        <li
                          class="kt-pagination__link--last"
                          v-if="paginacion.pagina_actual<paginacion.ultima_pagina"
                        >
                          <a
                            href="javascript:;"
                            @click.prevent="cambiarPaginas(paginacion.ultima_pagina)"
                          >
                            <i class="fa fa-angle-double-right kt-font-danger"></i>
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

      <!--begin::Modal-->
      <b-modal
        ref="modalCorregimiento"
        hide-footer
        title="Gestion de Corregimientos"
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
                <div class="alert alert-warning fade show" role="alert" v-if="entrarPorError">
                  <div class="alert-icon">
                    <i class="flaticon-warning"></i>
                  </div>
                  <div class="alert-text">
                    Por favor, corrija el(los) siguiente(s) error(es):
                    <hr />
                    <ul>
                      <li v-for="(error,index) in errorDevuelto" :key="index">{{ error }}</li>
                    </ul>
                  </div>
                  <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                <div class="alert alert-warning fade show" role="alert" v-if="errores.length">
                  <div class="alert-icon">
                    <i class="flaticon-warning"></i>
                  </div>
                  <div class="alert-text">
                    Por favor, corrija el(los) siguiente(s) error(es):
                    <hr />
                    <ul>
                      <li v-for="(error,index) in errores" :key="index">{{ error }}</li>
                    </ul>
                  </div>
                  <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                <b-form-select v-model="corregimientosData.dpto">
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in dpto_options"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Municipio:</label>
                <b-form-select v-model="corregimientosData.muni">
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in muni_options[corregimientosData.dpto]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-11">
                <label>Corregimiento:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Barrio"
                  v-model="corregimientosData.corregimiento"
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
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
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
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in datos" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.dptoTexto}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.muniTexto}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.corregimiento}}</td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItem(index)"
                          >
                            <i class="fa fa-trash"></i>
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
                @click="guardarCorregimiento"
                v-if="banderaBoton"
                :disabled="!valG"
                :class="spinG"                
              >
                <i class="fa fa-edit"></i> Guardar
              </button>
              <button type="button" class="btn btn-success" 
                @click="editarCorregimiento" 
                :disabled="!valG"
                :class="spinG"
                v-else
              >
                <i class="fa fa-edit"></i> Guardar
              </button>
              <button type="button" class="btn btn-warning" @click="cerrarModal">
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
  import * as corregimientosServicios from "../../Servicios/corregimientos_servicios";
  export default {
    mounted() {
      this.consultar(1);
    },
    name: "corregi",
    data() {
      return {
        errores: [],
        bandera: false,
        entrarPorError: false,
        txtbusqueda: "",
        corregimientos: [],
        corregimientosData: {
          dpto: "",
          muni: "",
          corregimiento: "",
          id: 0
        },
        dpto_options: [],
        muni_options: {},
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
        valG: true
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
          return ['kt-spinner', 'kt-spinner--right', 'kt-spinner--sm', 'kt-spinner--light'];
        }
      },      
    },
    methods: {
      consultar: async function(pagina) {
        const parametros = {
          txtbusqueda: this.txtbusqueda.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await corregimientosServicios
            .listarCorregimientos(parametros)
            .then(respuesta => {
              this.corregimientos = respuesta.data.corregimientos.data;
              this.dpto_options = respuesta.data.arrayDpto;
              this.muni_options = respuesta.data.arrayMuni;
              this.paginacion = respuesta.data.paginacion;
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
        this.datos = [];
        this.corregimientosData.dpto = "";
        this.corregimientosData.muni = "";
        this.corregimientosData.corregimiento = "";
        this.bandera = false;
        this.banderaBoton = true;
        this.errores = [];
        this.entrarPorError = false;        
        this.$refs.modalCorregimiento.show();
      },
      cerrarModal() {
        this.$refs.modalCorregimiento.hide();
      },
      agregar: function() {
        if (this.corregimientosData.dpto == "") {
          this.$swal(
            "Error...!",
            "Por favor seleccione un departamento!",
            "error"
          );
          return;
        }
        if (this.corregimientosData.muni == "") {
          this.$swal("Error...!", "Por favor seleccione un municipio!", "error");
          return;
        }
        if (this.corregimientosData.corregimiento == "") {
          this.$swal("Error...!", "Por favor digite un corregimiento!", "error");
          return;
        }
        this.datos.push({
          dpto: this.corregimientosData.dpto,
          dptoTexto: this.showText(
            this.corregimientosData.dpto,
            this.dpto_options
          ),          
          muni: this.corregimientosData.muni,
          muniTexto: this.showText(
            this.corregimientosData.muni,
            this.muni_options[this.corregimientosData.dpto]
          ),          
          corregimiento: this.corregimientosData.corregimiento,
          id: 0
        });
        this.corregimientosData.corregimiento = "";
      },
      eliminarItem: function(index) {
        this.datos.splice(index, 1);
      },
      guardarCorregimiento: async function() {
        if (!this.checkForm()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            corregimientos: this.datos,
            opcion: "GUARDAR"
          };
          this.valG = false;
          try {
            await corregimientosServicios
              .guardarCorregimientos(parametros)
              .then(respuesta => {
                this.consultar(1);
                this.datos = [];
                this.corregimientosData.dpto = "";
                this.corregimientosData.muni = "";
                this.corregimientosData.corregimiento = "";
                this.corregimientosData.id = 0;
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
      },
      checkForm(e) {
        this.errores = [];
        if (this.datos.length <= 0) {
          this.errores.push("Agregue por lo menos un corregimiento");
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
          title = "¿Desea anular el corregimiento " + usu.CORREGIMIENTO + "?";
          titulo =
            "Corregimiento " + usu.CORREGIMIENTO + " anulado de manera exitosa";
        } else {
          title = "¿Desea activar el corregimiento " + usu.CORREGIMIENTO + "?";
          titulo =
            "Corregimiento " + usu.CORREGIMIENTO + " activado de manera exitosa";
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
              corregimientosServicios
                .eliminarCorregimientos(parametros)
                .then(respuesta => {
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
                  this.$swal("Error...!", "Ocurrio un error!", "error");
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
          }
        });
      },
      editarCorregimiento: async function() {
        if (!this.checkForm2()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            corregimientos: this.corregimientosData,
            opcion: "EDITAR"
          };
          this.valG = false;
          try {
            await corregimientosServicios
              .guardarCorregimientos(parametros)
              .then(respuesta => {
                this.consultar(1);
                this.datos = [];
                this.corregimientosData.dpto = "";
                this.corregimientosData.muni = "";
                this.corregimientosData.corregimiento = "";
                this.corregimientosData.id = 0;
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
      },
      checkForm2(e) {
        this.errores = [];
        if (this.corregimientosData.dpto == "") {
          this.errores.push("Por favor seleccione el departamento.");
        }
        if (this.corregimientosData.muni == "") {
          this.errores.push("Por favor seleccione el municipio");
        }
        if (this.corregimientosData.corregimiento == "") {
          this.errores.push("Por favor digite el corregimiento.");
        }
        if (!this.errores.length) {
          return true;
        } else {
          return false;
        }
        e.preventDefault();
      },
      editar: function(item) {
        // this.barriosData = { ...item };
        this.entrarPorError = false;
        this.errores = [];
        this.corregimientosData.dpto = item.dpto;
        this.corregimientosData.muni = item.muni;
        this.corregimientosData.corregimiento = item.CORREGIMIENTO;
        this.corregimientosData.id = item.id;
        this.banderaBoton = false;
        this.$refs.modalCorregimiento.show();
      },
      showText: function(val, vectorAux) {
        for (var i = 0; i < vectorAux.length; i++) {
          if (vectorAux[i].value === val) {
            return vectorAux[i].texto;
          }
        }
        return "";
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