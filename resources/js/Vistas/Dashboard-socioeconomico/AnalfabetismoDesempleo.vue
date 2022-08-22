<template lang="">
    <div>
         <div ref="document">
            <div class="row">
                <div class="col-lg-12" style="padding: 10px 10px 0px 20px;">
                    <h2>{{ente}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-center">
                    <br >
                    <h4>Tasa de Analfabetismo</h4>
                    <circle-progress
                        stroke-bg-color = "#e3e2e1"
                        :r="80" 
                        :stroke-width="12"  
                        :stroke-color="colorspinnner" 
                        :percentage="Math.floor(datos['porcentajeAnalfabetas'] * 10) / 10"> 
                    </circle-progress>
                    <br>
                    <h4>{{datos["totalAnalfabetas"]}} / {{datos["totalPersonas"]}}</h4> 
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
import CircleProgress from 'vue-pithy-progress/lib/circle-progress.umd.min.js';
import Loading from "vue-loading-overlay";
import * as BarriosService from "../../Servicios/barrios_servicios.js";
import * as CorregimientoService from "../../Servicios/corregimientos_servicios.js";
import * as VeredasService from "../../Servicios/veredas_servicios.js";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.estadisticas();
    },
    props: [],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            center: { lat: 0, lng: 0 },
            latitud: 0.0,
            longitud: 0.0,
            ente: "",
            tipo: "todos",
            id: 1,
            datos: [],
            colorspinnner: "#ffff",
            analfabetasHombres: [],
            analfabetasMujeres: []
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
                this.center.lat = this.latitud;
                this.center.lng = this.longitud;
            })
            .catch(err => {
                console.log(err);
            });
        },
        async estadisticas() {
            await DashboardServiceSocioeconomico.listarEstadisticaPersonas(this.tipo, this.id).then(respuesta => {
                this.datos = respuesta.data["analfabetismo"]; 
                this.calcularColoreSpinner(this.datos); 
            })
            .catch(err => {
                console.log(err);
            });
        },
        calcularColoreSpinner(datos){
            if (datos["porcentajeAnalfabetas"] < 20) {
                this.colorspinnner = "#1abf03";
            } else if (datos["porcentajeAnalfabetas"] >= 20  && datos["porcentajeAnalfabetas"] < 60) {
                this.colorspinnner = "#f2ce1a";
            } else {
                this.colorspinnner = "#f2451a";
            }
        }
    }
}
</script>
<style>
.redondo {
    border-radius: 0px 0px 25px 25px;
}

.redondo-2 {
    border-radius: 25px 25px 0px 0px;
}

.deabjohaciaarriba {
    writing-mode: vertical-rl;
    text-orientation: use-glyph-orientation;
    transform: rotate(0.5turn);
}

.borderbottomright {
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}  

.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5) !important;
  }
.modal-title {
    color: #f8f9fa !important;
}
.close {
    display: none;
}
.color-datepicker {
    background: #f2f2f2;
    border: 1px solid #ddd;
    padding: 0em 1em 1em;
    margin-bottom: 2em;
}
</style>