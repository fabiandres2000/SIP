// window.Vue = require('vue');
import VueSweetalert2 from 'vue-sweetalert2';
import Axios from 'axios';
import * as usuarioServicios from "./Servicios/usuarios_servicios";
//BUSCAR ESTO
// Vue.component('login', require('./LoginComponent.vue').default);
new Vue({
      el: "#app_login",
      data: {
            usuarioData: {
                  email: "",
                  password: ""
            },
            hayErrores: false,
            errores: {},
            csrf: document
                  .querySelector('meta[name="csrf-token"]')
                  .getAttribute("content")
      },
      methods: {
            IniciarSesion: async function () {
                  this.hayErrores = false;
                  if (!this.validarCampos()) {
                        this.$swal("Error...!", "Por favor complete los campos!", "error");
                        return;
                  }
                  // let formData = new FormData();
                  // formData.append("email", this.usuarioData.email);
                  // formData.append("password", this.usuarioData.password);
                  // formData.append("_token", this.csrf);
                  const parametros = {
                        email: this.usuarioData.email.trim(),
                        password: this.usuarioData.password.trim(),
                        _token: this.csrf
                  };
                  try {
                        const resp = await usuarioServicios
                              .loginUsuario(parametros)
                              .then(respuesta => {
                                    if (respuesta.data.OPC) {
                                          window.location = "/";
                                          // window.location = "/SIP/public/";
                                    } else {
                                          this.$swal("Error...!", respuesta.data.MENSAJE, "error");
                                          // this.hayErrores = true;
                                          // this.mensajeError = "Usuario ó Contraseña incorrecta";
                                    }
                                    console.info(respuesta.data);
                              });
                  } catch (error) {
                        switch (error.response.status) {
                              case 422:
                                    this.errores = error.response.data.errors;
                                    break;
                              default:
                                    break;
                        }
                        // alert("hubo error");
                  }
            },
            validarCampos() {
                  if (
                        this.usuarioData.email.trim() == "" ||
                        this.usuarioData.password.trim() == ""
                  ) {
                        return false;
                  }
                  return true;
            }
      }
});