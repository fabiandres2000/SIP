<template>
  <div>
    <div class="kt-portlet" style="margin-top: -4%;">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            <span class="kt-widget20__number kt-font-danger">GESTIÓN DE USUARIOS</span>
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
                      title="Nuevo Usuario"
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
                          @click.prevent="consultar(1)"
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
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <td class="text-center">Estado</td>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in usuarios" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;"
                        >{{item.identificacion}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >{{item.nombre}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;"
                        >{{item.usuario}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;"
                        >{{(item.email==''?'-':item.email)}}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;"
                        >{{(item.celular==''?'-':item.celular)}}</td>
                        <td style="font-weight: normal;vertical-align: middle;text-align: center;">
                          <span
                            class="kt-badge kt-badge--inline"
                            :class="item.estado=='Activo'?'kt-badge--success':'kt-badge--danger'"
                          >{{item.estado}}</span>
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
                  <!-- <div class="row">
                  <div class="col-md-12">
                    <pre>
                    {{ $data }}
                    </pre>
                  </div>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--begin::Modal-->
      <b-modal
        ref="modalUsuario"
        hide-footer
        title="Gestion de Usuarios"
        size="lg"
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
              <div class="col-lg-3">
                <label>Identificación:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Identificación"
                  v-model="usuariosData.identificacion"
                  :class="identiClases"
                />
                <div class="invalid-feedback" v-if="identiError">{{ identiError }}</div>
              </div>
              <div class="col-lg-4">
                <label>Nombre:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Nombre"
                  v-model="usuariosData.nombre"
                  style="text-transform:capitalize;"
                  :class="nameClases"
                />
                <div class="invalid-feedback" v-if="nameError">{{ nameError }}</div>
              </div>
              <div class="col-lg-5">
                <label>Email:</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="Email"
                  v-model="usuariosData.email"
                  :class="emailClases"
                />
                <div class="invalid-feedback" v-if="emailError">{{ emailError }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Rol:</label>
                <b-form-select v-model="usuariosData.rol" :class="rolClases">
                  <option value selected>Seleccione</option>
                  <option v-for="item in roles" :value="item.value" :key="item.value">{{item.texto}}</option>
                </b-form-select>
                <div class="invalid-feedback" v-if="rolError">{{ rolError }}</div>
              </div>
              <div class="col-lg-4">
                <label>Celular:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Celular"
                  v-model="usuariosData.celular"
                  :class="celClases"
                />
                <div class="invalid-feedback" v-if="celError">{{ celError }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Dirección:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Dirección"
                  v-model="usuariosData.direccion"
                  :class="dirClases"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Usuario:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Usuario"
                  v-model="usuariosData.usuario"
                  :class="usuClases"
                />
                <div class="invalid-feedback" v-if="usuError">{{ usuError }}</div>
              </div>
              <div class="col-lg-4">
                <label>Contraseña:</label>
                <input
                  type="password"
                  class="form-control"
                  placeholder="Contraseña"
                  v-model="usuariosData.password"
                  :class="pasClases"
                />
                <div class="invalid-feedback" v-if="pasError">{{ pasError }}</div>
              </div>
              <div class="col-lg-4">
                <label>Repita Contraseña:</label>
                <input
                  type="password"
                  class="form-control"
                  placeholder="Repita Contraseña"
                  v-model="usuariosData.confPassword"
                  :class="conClases"
                />
                <div class="invalid-feedback" v-if="conError">{{ conError }}</div>
              </div>
            </div>
            <hr />
            <div class="text-right">
              <button type="button" class="btn btn-success" @click="guardarUsuario">
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
        ref="modalUsuarioEditar"
        hide-footer
        title="Gestion de Usuarios"
        size="lg"
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
              <div class="col-lg-3">
                <label>Identificación:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Identificación"
                  v-model="editarUsuariosData.identificacion"
                  :class="identiClases2"
                />
                <div class="invalid-feedback" v-if="identiError2">{{ identiError2 }}</div>
              </div>
              <div class="col-lg-4">
                <label>Nombre:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Nombre"
                  v-model="editarUsuariosData.nombre"
                  style="text-transform:capitalize;"
                  :class="nameClases2"
                />
                <div class="invalid-feedback" v-if="nameError2">{{ nameError2 }}</div>
              </div>
              <div class="col-lg-5">
                <label>Email:</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="Email"
                  v-model="editarUsuariosData.email"
                  :class="emailClases2"
                />
                <div class="invalid-feedback" v-if="emailError2">{{ emailError2 }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Rol:</label>
                <b-form-select class v-model="editarUsuariosData.rol" :class="rolClases2">
                  <option value selected>Seleccione</option>
                  <option v-for="item in roles" :value="item.value" :key="item.value">{{item.texto}}</option>
                </b-form-select>
                <div class="invalid-feedback" v-if="rolError2">{{ rolError2 }}</div>
              </div>
              <div class="col-lg-4">
                <label>Celular:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Celular"
                  v-model="editarUsuariosData.celular"
                  :class="celClases2"
                />
                <div class="invalid-feedback" v-if="celError2">{{ celError2 }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Dirección:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Dirección"
                  v-model="editarUsuariosData.direccion"
                  :class="dirClases2"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Usuario:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Usuario"
                  v-model="editarUsuariosData.usuario"
                  :class="usuClases2"
                />
                <div class="invalid-feedback" v-if="usuError2">{{ usuError2 }}</div>
              </div>
            </div>
            <hr />
            <div class="text-right">
              <button type="button" class="btn btn-success" @click="editarUsuario">
                <i class="fa fa-edit"></i> Guardar
              </button>
              <button type="button" class="btn btn-warning" @click="cerrarModal2">
                <i class="fa fa-window-close"></i> Cancelar
              </button>
            </div>
          </form>
        </div>
      </b-modal>
      <!--end::Modal-->
    </div>
  </div>
</template>

<script>
  "use strict";
  import * as usuarioServicios from "../../Servicios/usuarios_servicios";
  export default {
    mounted() {
      this.consultar(1);
    },
    name: "usuari",
    data() {
      return {
        errores: [],
        usuarios: [],
        errorDevuelto: [],
        entrarPorError: false,
        txtbusqueda: "",
        opciones: ["Administrador", "Promotor", "Usuario"],
        roles: [
          {
            texto: "Administrador",
            value: "Administrador"
          },
          {
            texto: "Coordinador",
            value: "Coordinador"
          },
          {
            texto: "Promotor",
            value: "Promotor"
          },
          {
            texto: "Usuario",
            value: "Usuario"
          }
        ],
        usuariosData: {
          identificacion: "",
          nombre: "",
          email: "",
          password: "",
          confPassword: "",
          rol: "",
          usuario: "",
          estado: "",
          celular: "",
          direccion: "",
          id_compania: 0
        },
        editarUsuariosData: {
          identificacion: "",
          nombre: "",
          email: "",
          password: "",
          confPassword: "",
          rol: "",
          usuario: "",
          estado: "",
          celular: "",
          direccion: "",
          id_compania: 0,
          id: 0
        },
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
        offset: 4
      };
    },
    computed: {
      // CLASES Y ERRORES DE CAMPO IDENTIFICACION
      identiError() {
        var valor = this.usuariosData.identificacion.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (valor.length < 6) {
          return "Por favor escriba una identificación mayor a 6 caracteres";
        }
      },
      identiClases() {
        return [
          {
            "is-invalid": this.identiError,
            "is-valid": !this.identiError
          }
        ];
      },
      identiError2() {
        var valor = this.editarUsuariosData.identificacion.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (valor.length < 6) {
          return "Por favor escriba una identificación mayor a 6 caracteres";
        }
      },
      identiClases2() {
        return [
          {
            "is-invalid": this.identiError2,
            "is-valid": !this.identiError2
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO IDENTIFICACION
      // CLASES Y ERRORES DE CAMPO NOMBRE
      nameError() {
        var valor = this.usuariosData.nombre.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (valor.length < 5) {
          return "Por favor escribe un nombre mayor a 5 caracteres";
        }
      },
      nameClases() {
        return [
          {
            "is-invalid": this.nameError,
            "is-valid": !this.nameError
          }
        ];
      },
      nameError2() {
        var valor = this.editarUsuariosData.nombre.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (valor.length < 5) {
          return "Por favor escribe un nombre mayor a 5 caracteres";
        }
      },
      nameClases2() {
        return [
          {
            "is-invalid": this.nameError2,
            "is-valid": !this.nameError2
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO NOMBRE
      // CLASES Y ERRORES DE CAMPO EMAIL
      emailError() {
        var valor = this.usuariosData.email.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (!this.validEmail(valor)) {
          return "El correo electrónico debe ser válido.";
        }
      },
      emailClases() {
        return [
          {
            "is-invalid": this.emailError,
            "is-valid": !this.emailError
          }
        ];
      },
      emailError2() {
        var valor = this.editarUsuariosData.email.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (!this.validEmail(valor)) {
          return "El correo electrónico debe ser válido.";
        }
      },
      emailClases2() {
        return [
          {
            "is-invalid": this.emailError2,
            "is-valid": !this.emailError2
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO EMAIL
      // CLASES Y ERRORES DE CAMPO ROL
      rolError() {
        var valor = this.usuariosData.rol;
        if (valor == "") {
          return "El campo es obligatorio";
        }
        // return false;
      },
      rolClases() {
        return [
          {
            "is-invalid": this.rolError,
            "is-valid": !this.rolError
          }
        ];
      },
      rolError2() {
        var valor = this.editarUsuariosData.rol;
        if (valor == "") {
          return "El campo es obligatorio";
        }
        // return false;
      },
      rolClases2() {
        return [
          {
            "is-invalid": this.rolError2,
            "is-valid": !this.rolError2
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO ROL
      // CLASES Y ERRORES DE CAMPO CELULAR
      celError() {
        var valor = this.usuariosData.celular;
        if (valor == "") {
          return "El campo es obligatorio";
        }
        // return false;
      },
      celClases() {
        return [
          {
            "is-invalid": this.celError,
            "is-valid": !this.celError
          }
        ];
      },
      celError2() {
        var valor = this.editarUsuariosData.celular;
        if (valor == "") {
          return "El campo es obligatorio";
        }
        // return false;
      },
      celClases2() {
        return [
          {
            "is-invalid": this.celError2,
            "is-valid": !this.celError2
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO CELULAR
      // CLASES Y ERRORES DE CAMPO DIRECCION
      dirError() {
        var valor = this.usuariosData.direccion;
        if (valor == "") {
          return true;
        }
        // return false;
      },
      dirClases() {
        return [
          {
            "": this.dirError,
            "is-valid": !this.dirError
          }
        ];
      },
      dirError2() {
        var valor = this.editarUsuariosData.direccion;
        if (valor == "") {
          return true;
        }
        // return false;
      },
      dirClases2() {
        return [
          {
            "": this.dirError2,
            "is-valid": !this.dirError2
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO DIRECCION
      // CLASES Y ERRORES DE CAMPO USUARIO
      usuError() {
        var valor = this.usuariosData.usuario.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (valor.length < 5) {
          return "Por favor escriba un usuario mayor a 5 caracteres";
        }
      },
      usuClases() {
        return [
          {
            "is-invalid": this.usuError,
            "is-valid": !this.usuError
          }
        ];
      },
      usuError2() {
        var valor = this.editarUsuariosData.usuario.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (valor.length < 5) {
          return "Por favor escriba un usuario mayor a 5 caracteres";
        }
      },
      usuClases2() {
        return [
          {
            "is-invalid": this.usuError2,
            "is-valid": !this.usuError2
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO USUARIO
      // CLASES Y ERRORES DE CAMPO PASSWORD
      pasError() {
        var valor = this.usuariosData.password.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (valor.length < 5) {
          return "Por favor escriba una Contraseña mayor a 5 caracteres";
        }
      },
      pasClases() {
        return [
          {
            "is-invalid": this.pasError,
            "is-valid": !this.pasError
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO PASSWORD
      // CLASES Y ERRORES DE CAMPO CONFPASSWORD
      conError() {
        var valor = this.usuariosData.confPassword.trim();
        if (valor == "") {
          return "El campo es obligatorio";
        }
        if (valor != this.usuariosData.password) {
          return "Las contraseñas no coinciden";
        }
      },
      conClases() {
        return [
          {
            "is-invalid": this.conError,
            "is-valid": !this.conError
          }
        ];
      },
      // CLASES Y ERRORES DE CAMPO CONFPASSWORD
      filtrarUsuarios() {
        return this.usuarios.filter(
          item =>
            item.nombre.toLowerCase().includes(this.txtbusqueda.toLowerCase()) +
            item.rol.toLowerCase().includes(this.txtbusqueda.toLowerCase()) +
            item.email.toLowerCase().includes(this.txtbusqueda.toLowerCase()) +
            item.usuario.toLowerCase().includes(this.txtbusqueda.toLowerCase()) +
            item.identificacion
              .toLowerCase()
              .includes(this.txtbusqueda.toLowerCase())
        );
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
          await usuarioServicios.listarUsuarios(parametros).then(respuesta => {
            this.usuarios = respuesta.data.usuarios.data;
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
      abrirModal() {
        this.errores = [];
        this.entrarPorError = false;        
        this.$refs.modalUsuario.show();
      },
      cerrarModal() {
        this.usuariosData.identificacion = "";
        this.usuariosData.nombre = "";
        this.usuariosData.email = "";
        this.usuariosData.rol = "";
        this.usuariosData.celular = "";
        this.usuariosData.direccion = "";
        this.usuariosData.usuario = "";
        this.usuariosData.password = "";
        this.usuariosData.confPassword = "";
        this.$refs.modalUsuario.hide();
      },
      cerrarModal2() {
        this.$refs.modalUsuarioEditar.hide();
      },
      guardarUsuario: async function() {
        if (!this.checkForm()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            identificacion: this.usuariosData.identificacion,
            nombre: this.usuariosData.nombre,
            email: this.usuariosData.email,
            rol: this.usuariosData.rol,
            celular: this.usuariosData.celular,
            direccion: this.usuariosData.direccion,
            usuario: this.usuariosData.usuario,
            password: this.usuariosData.password,
            confPassword: this.usuariosData.confPassword
          };
          try {
            await usuarioServicios
              .guardarUsuarios(parametros)
              .then(respuesta => {
                this.usuarios.unshift(respuesta.data.usuarios);
                this.cerrarModal();
                this.usuariosData.identificacion = "";
                this.usuariosData.nombre = "";
                this.usuariosData.email = "";
                this.usuariosData.rol = "";
                this.usuariosData.celular = "";
                this.usuariosData.direccion = "";
                this.usuariosData.usuario = "";
                this.usuariosData.password = "";
                this.usuariosData.confPassword = "";
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
        if (!this.usuariosData.identificacion) {
          this.errores.push("La identificación es obligatoria.");
        }
        if (this.usuariosData.identificacion.length < 6) {
          this.errores.push(
            "Por favor escriba una identificación mayor a 6 caracteres"
          );
        }
        if (!this.usuariosData.nombre) {
          this.errores.push("El nombre es obligatorio.");
        }
        if (this.usuariosData.nombre.length < 5) {
          this.errores.push("Por favor escriba un nombre mayor a 5 caracteres");
        }
        if (!this.usuariosData.email) {
          this.errores.push("El correo electrónico es obligatorio.");
        } else if (!this.validEmail(this.usuariosData.email)) {
          this.errores.push("El correo electrónico debe ser válido.");
        }
        if (!this.usuariosData.rol) {
          this.errores.push("El rol es obligatorio.");
        }
        if (!this.usuariosData.celular) {
          this.errores.push("El celular es obligatorio.");
        }
        if (this.mostrar) {
          if (!this.usuariosData.usuario) {
            this.errores.push("El usuario es obligatorio.");
          }
          if (this.usuariosData.usuario.length < 5) {
            this.errores.push(
              "Por favor escriba un usuario mayor a 5 caracteres."
            );
          }
          if (!this.usuariosData.password) {
            this.errores.push("La contraseña es obligatoria.");
          }
          if (!this.usuariosData.confPassword) {
            this.errores.push("Confirmar la contraseña es obligatorio.");
          }
          if (this.usuariosData.password != this.usuariosData.confPassword) {
            this.errores.push("Las contraseñas no coinciden.");
          }
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
        if (!this.editarUsuariosData.identificacion) {
          this.errores.push("La identificación es obligatoria.");
        }
        if (this.editarUsuariosData.identificacion.length < 6) {
          this.errores.push(
            "Por favor escriba una identificación mayor a 6 caracteres"
          );
        }
        if (!this.editarUsuariosData.nombre) {
          this.errores.push("El nombre es obligatorio.");
        }
        if (this.editarUsuariosData.nombre.length < 5) {
          this.errores.push("Por favor escriba un nombre mayor a 5 caracteres");
        }
        if (!this.editarUsuariosData.email) {
          this.errores.push("El correo electrónico es obligatorio.");
        } else if (!this.validEmail(this.editarUsuariosData.email)) {
          this.errores.push("El correo electrónico debe ser válido.");
        }
        if (!this.editarUsuariosData.rol) {
          this.errores.push("El rol es obligatorio.");
        }
        if (!this.editarUsuariosData.celular) {
          this.errores.push("El celular es obligatorio.");
        }
        if (!this.editarUsuariosData.usuario) {
          this.errores.push("El usuario es obligatorio.");
        }
        if (this.editarUsuariosData.usuario.length < 5) {
          this.errores.push("Por favor escriba un usuario mayor a 5 caracteres.");
        }
        if (!this.errores.length) {
          return true;
        } else {
          return false;
        }
        e.preventDefault();
      },
      validEmail: function(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      },
      eliminar: async function(usu) {
        var title = "";
        var titulo = "";
        if (usu.estado == "Activo") {
          title = "¿Desea anular el usuario " + usu.nombre + "?";
          titulo = "Usuario " + usu.nombre + " anulado de manera exitosa";
        } else {
          title = "¿Desea activar el usuario " + usu.nombre + "?";
          titulo = "Usuario " + usu.nombre + " activado de manera exitosa";
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
              usuarioServicios
                .eliminarUsuarios(parametros)
                .then(respuesta => {
                  this.consultar();
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
      editar: function(usu) {
        this.mostrar = false;
        this.editarUsuariosData = { ...usu };
        this.$refs.modalUsuarioEditar.show();
      },
      editarUsuario: async function() {
        if (!this.checkForm2()) {
          this.entrarPorError = false;
        } else {
          this.errores = [];
          const parametros = {
            _token: this.csrf,
            identificacion: this.editarUsuariosData.identificacion,
            nombre: this.editarUsuariosData.nombre,
            email: this.editarUsuariosData.email,
            rol: this.editarUsuariosData.rol,
            celular: this.editarUsuariosData.celular,
            direccion: this.editarUsuariosData.direccion,
            id: this.editarUsuariosData.id,
            usuario: this.editarUsuariosData.usuario
          };
          try {
            await usuarioServicios
              .editarUsuarios(parametros)
              .then(respuesta => {
                // console.log("id="+respuesta.data.usuarios.id);
                this.usuarios.map(usua => {
                  if (usua.id == respuesta.data.usuarios.id) {
                    for (let key in respuesta.data.usuarios) {
                      usua[key] = respuesta.data.usuarios[key];
                    }
                  }
                });
                this.editarUsuariosData.identificacion = "";
                this.editarUsuariosData.nombre = "";
                this.editarUsuariosData.email = "";
                this.editarUsuariosData.rol = "";
                this.editarUsuariosData.celular = "";
                this.editarUsuariosData.direccion = "";
                this.editarUsuariosData.usuario = "";
                this.cerrarModal2();
                this.$swal({
                  position: "top-end",
                  icon: "success",
                  title: "Datos Guardados Exitosamente!",
                  showConfirmButton: false,
                  timer: 2000
                });
              })
              .catch(error => {
                this.errorDevuelto = error.response.data.errors;
                this.entrarPorError = true;
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
      },
      cambiarPaginas: function(pagina) {
        this.paginacion.pagina_actual = pagina;
        this.consultar(pagina);
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