<template>
  <div>
    <div class="kt-portlet" style="margin-top: -4%;">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            <span class="kt-widget20__number kt-font-danger">GESTIÓN DE ETNIAS</span>
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
                      title="Nueva Etnia"
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
                        <th>Etnia</th>
                        <th>Observación</th>
                        <td class="text-center">Estado</td>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in etnias" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.descripcion}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.observacion}}</td>
                        <td style="font-weight: normal;vertical-align: middle;text-align: center;">
                          <span
                            class="kt-badge kt-badge--inline"
                            :class="item.estado=='Activo'?'kt-badge--success':'kt-badge--danger'"
                          >{{item.estado}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            type="button"
                            class="btn btn-outline-success btn-icon btn-sm"
                            title="Agregar Clasificación"
                            @click="abrirModalClasi(item)"
                          >
                            <i class="fa fa-list"></i>
                          </button>
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
                            :class="(item.estado=='Activo'?'btn-outline-danger':'btn-outline-success')"
                            type="button"
                            :title="(item.estado=='Activo')?'Anular':'Activar'"
                            @click="eliminar(item)"
                          >
                            <i class="fa" :class="(item.estado=='Activo')?'fa-trash':'fa-check'"></i>
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
        ref="modalEtnias"
        hide-footer
        title="Gestion de Etnias"
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
                <label>Etnia:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Descripción"
                  v-model="etniasData.descripcion"
                  :class="etniaClases"
                />
                <div class="invalid-feedback" v-if="etniaError">{{ etniaError }}</div>
              </div>
              <div class="col-lg-8">
                <label>Observación:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Observación"
                  v-model="etniasData.observacion"
                />
              </div>
            </div>
            <hr />
            <div class="text-right">
              <button type="button" class="btn btn-success" @click="guardarEtnia">
                <i class="fa fa-edit"></i> Guardar
              </button>
              <button type="button" class="btn btn-warning" @click="cerrarModal">
                <i class="fa fa-window-close"></i> Cancelar
              </button>
            </div>
          </form>
        </div>
      </b-modal>

      <b-modal
        ref="modalClasificacion"
        hide-footer
        title="Gestion de Clasificación de Etnias"
        size="xl"
        centered
        header-bg-variant="danger"
        header-text-variant="light"
        :no-close-on-backdrop="true"
      >
        <div class="d-block">
          <form>
            <div class="form-group row">
              <div class="col-lg-12">
                <label class="bold" style="font-size: 18px;">Etnia: {{LabelEtnia}}</label>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-11">
                <label>Clasificación:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Clasificación"
                  v-model="clasificacion"
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
                  title="Agregar Clasificación"
                  @click.prevent="agregar"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Clasificación</th>
                        <th>Estado</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in datos" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.clasificacion}}</span>
                        </td>
                        <td style="font-weight: normal;vertical-align: middle;text-align: center;">
                          <span
                            class="kt-badge kt-badge--inline"
                            :class="item.estado=='Activo'?'kt-badge--success':'kt-badge--danger'"
                          >{{item.estado}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm"
                            :class="(item.estado=='Activo'?'btn-outline-danger':'btn-outline-success')"
                            type="button"
                            :title="(item.estado=='Activo')?'Anular':'Activar'"
                            @click="eliminarItem(index,item.estado)"
                          >
                            <i class="fa" :class="(item.estado=='Activo')?'fa-trash':'fa-check'"></i>
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
              <button type="button" class="btn btn-success" @click="guardarClasificacion">
                <i class="fa fa-edit"></i> Guardar
              </button>
              <button type="button" class="btn btn-warning" @click="cerrarModalClasi">
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
  import * as etniasServicios from "../../Servicios/etnias_servicios";
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
        etnias: [],
        etniasData: {
          descripcion: "",
          observacion: "",
          id: 0
        },
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
        paginacion: {
          total: 0,
          pagina_actual: 0,
          por_pagina: 0,
          ultima_pagina: 0,
          desde: 0,
          hasta: 0
        },
        offset: 4,
        LabelEtnia: "",
        datos: [],
        clasificacion: "",
        idEtnia: 0
      };
    },
    computed: {
      // CLASES Y ERRORES DE CAMPO IDENTIFICACION
      etniaError() {
        var valor = this.etniasData.descripcion.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
      },
      etniaClases() {
        return [
          {
            "is-invalid": this.etniaError,
            "is-valid": !this.etniaError
          }
        ];
      },
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
          txtbusqueda: this.txtbusqueda.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await etniasServicios.listarEtnias(parametros).then(respuesta => {
            this.etnias = respuesta.data.etnias.data;
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
        this.etniasData.descripcion = "";
        this.etniasData.observacion = "";
        this.etniasData.id = 0;
        this.errores = [];
        this.entrarPorError = false;        
        this.$refs.modalEtnias.show();
      },
      cerrarModal() {
        this.$refs.modalEtnias.hide();
      },
      guardarEtnia: async function() {
        if (!this.checkForm()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            descripcion: this.etniasData.descripcion,
            observacion: this.etniasData.observacion,
            id: this.etniasData.id
          };
          try {
            await etniasServicios
              .guardarEtnias(parametros)
              .then(respuesta => {
                this.consultar(1);
                this.etniasData.descripcion = "";
                this.etniasData.observacion = "";
                this.etniasData.id = 0;
                this.cerrarModal();
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
        if (!this.etniasData.descripcion) {
          this.errores.push("La descripción es obligatoria.");
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
        if (usu.estado == "Activo") {
          title = "¿Desea anular la etnia " + usu.descripcion + "?";
          titulo = "Etnia " + usu.descripcion + " anulada de manera exitosa";
        } else {
          title = "¿Desea activar la etnia " + usu.descripcion + "?";
          titulo = "Etnia " + usu.descripcion + " activada de manera exitosa";
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
              estado: usu.estado
            };

            try {
              etniasServicios
                .eliminarEtnias(parametros)
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
      abrirModalClasi(etn) {
        this.LabelEtnia = etn.descripcion;
        this.idEtnia = etn.id;
        this.consultarClasificacion();
        this.$refs.modalClasificacion.show();
      },
      cerrarModalClasi() {
        this.idEtnia = 0;
        this.$refs.modalClasificacion.hide();
      },
      agregar: function() {
        if (this.clasificacion == "") {
          this.$swal("Error...!", "Por favor digite una clasificación!", "error");
          return;
        }
        this.datos.push({
          id: 0,
          clasificacion: this.clasificacion,
          estado: "Activo"
        });
        this.clasificacion = "";
      },
      eliminarItem: function(index, estado) {
        var esta = "";
        if (estado == "Activo") {
          esta = "Inactivo";
        } else {
          esta = "Activo";
        }
        this.datos[index].estado = esta;
        // this.datos.splice(index, 1);
      },
      guardarClasificacion: async function() {
        if (!this.checkForm2()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            clasificacion: this.datos,
            id_etnia: this.idEtnia
          };
          try {
            await etniasServicios
              .guardarClasificacion(parametros)
              .then(respuesta => {
                this.consultar(1);
                this.datos = [];
                this.clasificacion = "";
                this.bandera = false;
                this.cerrarModalClasi();
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
        if (this.datos.length <= 0) {
          this.errores.push("Agregue por lo menos una clasificación");
        }

        if (!this.errores.length) {
          return true;
        } else {
          return false;
        }
        e.preventDefault();
      },
      consultarClasificacion: async function() {
        const parametros = {
          id_etnia: this.idEtnia,
          _token: this.csrf
        };
        try {
          await etniasServicios
            .listarClasificacion(parametros)
            .then(respuesta => {
              this.datos = respuesta.data.clasificacion;
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
      editar: async function(item) {
        this.etniasData.descripcion = item.descripcion;
        this.etniasData.observacion = item.observacion;
        this.etniasData.id = item.id;
        this.$refs.modalEtnias.show();
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