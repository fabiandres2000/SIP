<template>
  <!--Begin::Section-->
  <div class="row">
    <div class="col-12">
      <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile" style="margin-top: -4%;">
        <div
          class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm"
        >
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              <span class="kt-widget20__number kt-font-danger">CARACTERIZACIÓN</span>
            </h3>
          </div>
          <div class="kt-portlet__head-toolbar">
            <a href="#" class="btn btn-danger kt-margin-r-10" @click.prevent="volver">
              <i class="la la-arrow-left"></i>
              <span class="kt-hidden-mobile">Volver</span>
            </a>
            <div class="btn-group">
              <button
                type="button"
                class="btn btn-brand"
                @click.prevent="Actualizar"
                :disabled="!valGActu"
                :class="spinGActu"
              >
                <i class="la la-refresh"></i>
                <span class="kt-hidden-mobile">Actualizar</span>
              </button>
            </div>
          </div>
        </div>
        <div class="kt-portlet__body">
          <ul
            class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success"
            role="tablist"
          >
            <li class="nav-item">
              <a
                class="nav-link active"
                data-toggle="tab"
                href="#tabIdentificacion"
                role="tab"
                @click="cambiarTab2('tabIdentificacion')"
              >Identificación</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#tabVivienda"
                role="tab"
                @click="cambiarTab2('tabVivienda')"
              >Viviendas</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#cartxciclo"
                role="tab"
                @click="cambiarTab2('cartxciclo')"
              >Cart. X ciclo</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#adolescente"
                role="tab"
                @click="cambiarTab2('adolescente')"
              >Adolecentes/Jovenes</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#adultomayor"
                role="tab"
                @click="cambiarTab2('adultomayor')"
              >Adulto mayor</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#migrante"
                role="tab"
                @click="cambiarTab2('migrante')"
              >Migrante</a>
            </li>
          </ul>
          <div class="tab-content">
            <!-- Identificación -->
            <div class="tab-pane active" id="tabIdentificacion" role="tabpanel">
              <div class="row">
                <div class="col-12 kt-align-right">
                  <button
                    type="button"
                    class="btn btn-brand"
                    @click="cambiarTab1('tabVivienda','tabIdentificacion')"
                    :disabled="!valGIden"
                    :class="spinGIden"
                  >
                    <i class="la la-arrow-right"></i>
                    <span class="kt-hidden-mobile">Siguiente</span>
                  </button>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 18px;">A.Ficha Del Hogar</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Departamento (*):</label>
                  <b-form-select
                    v-model.trim="hogar.id_dpto"
                    :class="hogar.id_dpto==''?'is-invalid':'is-valid'"
                    @change="cambiarCombo('dpto')"
                    ref="id_dpto"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in dpto_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_dpto!=''">Departamento Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.id_dpto==''">El departamento es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Municipio (*):</label>
                  <b-form-select
                    v-model.trim="hogar.id_mun"
                    :class="hogar.id_mun==''?'is-invalid':'is-valid'"
                    @change="cambiarCombo('muni')"
                    ref="id_mun"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in muni_options[hogar.id_dpto]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_mun!=''">Municipio Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.id_mun==''">El municipio es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Corregimiento:</label>
                  <b-form-select
                    v-model="hogar.id_corre"
                    @change="cambiarCombo('corregi')"
                    :class="hogar.id_corre==''?'is-invalid':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option
                      v-for="item in corregi_options[hogar.id_mun]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_corre!=''">Corregimiento Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.id_corre==''">El corregimiento es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Vereda:</label>
                  <b-form-select
                    v-model="hogar.id_vereda"
                    :class="hogar.id_vereda==''?'is-invalid':'is-valid'"
                    @change="cambiarCombo('vereda')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option
                      v-for="item in vereda_options[hogar.id_corre]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_vereda!=''">Vereda Valida</div>
                </div>
                <div class="col-lg-4">
                  <label>Barrio:</label>
                  <b-form-select
                    v-model="hogar.id_barrio"
                    :class="hogar.id_barrio==''?'is-invalid':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option
                      v-for="item in barrio_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_barrio!=''">Barrio Valido</div>
                </div>
                <div class="col-lg-4">
                  <label>Zona:</label>
                  <b-form-select
                    v-model="hogar.id_zona"
                    :class="hogar.id_zona==''?'is-invalid':'is-valid'"
                    @change="habilitar_zonas"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option value="1">Urbano</option>
                    <option value="2">Rural centro poblado</option>
                    <option value="3">Rural disperso</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_zona!=''">Zona Valida</div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Tenencia de Vivienda (*):</label>
                  <b-form-select
                    v-model.trim="hogar.tenencia_vivienda"
                    :class="hogar.tenencia_vivienda==''?'is-invalid':'is-valid'"
                    ref="tenencia_vivienda"
                  >
                    <option value selected>Seleccione</option>
                    <option value="PROPIETARIO">PROPIETARIO(A)</option>
                    <option value="ARRENDADO">ARRENDADO(A)</option>
                    <option value="FAMILIAR">FAMILIAR</option>
                    <option value="CUIDADOR">CUIDADOR(A)</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                    v-if="hogar.tenencia_vivienda!=''"
                  >Tenencia de Vivienda Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.tenencia_vivienda==''">La tenencia de vivienda es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Numero de Hogares (*):</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Numero de Hogares"
                    v-model="hogar.numero_hogares"
                    :class="allLetter(hogar.numero_hogares)==false?'is-invalid':'is-valid'"
                    @change="validarNumHog"
                    ref="numero_hogares"
                  />
                  <div
                    class="valid-feedback"
                    v-if="allLetter(hogar.numero_hogares)==true"
                  >Numero de Hogares Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="allLetter(hogar.numero_hogares)==false"
                    >El numero de hogares debe ser numerico</span>
                    <span v-if="hogar.numero_hogares==''">El numero de hogares es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Población Especial (*):</label>
                  <b-form-select
                    v-model.trim="hogar.poblacion_especial"
                    :class="hogar.poblacion_especial==''?'is-invalid':'is-valid'"
                    ref="poblacion_especial"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">NO APLICA</option>
                    <option value="1">DESPLAZADO</option>
                    <option value="3">VICTIMA DEL CONFLICTO ARMADO</option>
                    <option value="4">MADRE COMUNITARIA</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                    v-if="hogar.poblacion_especial==''"
                  >Población Especial Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.poblacion_especial==''">La población especial es obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>¿La comunidad presenta vías de acceso? (*):</label>
                  <b-form-select
                    v-model.trim="hogar.vias_acceso"
                    :class="hogar.vias_acceso==''?'is-invalid':'is-valid'"
                    ref="vias_acceso"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option value="1">Pavimentadas</option>
                    <option value="2">Placa huella</option>
                    <option value="3">Sin pavimentar</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                    v-if="hogar.vias_acceso!=''"
                  >Presenta vias de acceso Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="hogar.vias_acceso==''"
                    >La comunidad presenta vías de acceso es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-5">
                  <label>¿Presenta acceso fácil a los servicios públicos? (*):</label>
                  <b-form-select
                    v-model.trim="hogar.servicios_publicos"
                    :class="hogar.servicios_publicos==''?'is-invalid':'is-valid'"
                    ref="servicios_publicos"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">Permanente</option>
                    <option value="2">Ocacional</option>
                    <option value="3">Periódico</option>
                    <option value="4">No hay acceso a servicios públicos</option>
                    <option value="5">No</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                    v-if="hogar.servicios_publicos!=''"
                  >Presenta acceso fácil a los servicios públicos Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="hogar.servicios_publicos==''"
                    >Presenta acceso fácil a los servicios públicos es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Dirección (*):</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Dirección"
                    v-model.trim="hogar.direccion"
                    :class="hogar.direccion==''?'is-invalid':'is-valid'"
                    ref="direccion"
                  />
                  <div class="valid-feedback" v-if="hogar.direccion!=''">La Dirección es Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.direccion==''">La dirección es obligatoria</span>
                  </div>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 15px;">Jefe del Hogar</span>
              </p>
            </div>
            <!-- Identificación -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End::Section-->
</template>
<script>
  "use strict";

  import * as caracterizacionServicios from "../../Servicios/caracterizacion_servicios";
  import * as barriosServicios from "../../Servicios/barrios_servicios";
  import * as colegiosServicios from "../../Servicios/colegios_servicios";
  import * as ocupacionesServicios from "../../Servicios/ocupaciones_servicios";
  import * as actividadesServicios from "../../Servicios/actividad_servicios";
  import Datepicker from "vuejs-datepicker";
  import { en, es } from "vuejs-datepicker/dist/locale";

  const isPhoneNumber = helpers.regex("numeric", /^3[0-9]{9}$/);
  const alpha = helpers.regex("alpha", /^[a-zA-Z]*$/);
  const alphaNumAndDotValidator = helpers.regex("alphaNumAndDot", /^[a-z\d.]*$/i);
  const entero = value => {
    return /^[0-9]*$/.test(value);
  };

  import {
    required,
    numeric,
    helpers,
    minLength,
    maxLength,
    decimal,
    alphaNum
  } from "vuelidate/lib/validators";
  export default {
    components: {
      Datepicker
    },
    mounted() {
      this.IDHOGAR = this.$route.params.IDHOGAR;
      this.nuevo(this.IDHOGAR);
    },
    filters: {
      moneda(val) {
        var number = +val.replace(/[^\d.]/g, "");
        return isNaN(number) ? 0 : number;
      },
      moment: function(date) {
        return moment(date).format("YYYY-MM-DD");
      }
    },
    data() {
      return {
        hoy: "",
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
        dpto_options: [],
        muni_options: {},
        corregi_options: {},
        barrio_options: {},
        parentesco_options: {},
        estado_options: {},
        escolaridad_options: {},
        ocupacion_options: {},
        etnia_options: {},
        admini_options: {},
        clasifi_options: {},
        vereda_options: {},
        grados_option: {},
        morbilidadNacer_options: {},
        morbilidad_options: {},
        metodos_options: {},
        motivos_options: {},
        grupos_options: {},
        enfcro_options: {},
        enfinf_options: {},
        religion_options: {},
        colegio_options: {},
        opciones1: [
          { value: 1, texto: "Ninguno" },
          { value: 2, texto: "1 Celular" },
          { value: 3, texto: "2 Celulares" },
          { value: 4, texto: "Tiene 3 Celulares" },
          { value: 5, texto: "Tiene 4 o mas Celulares" }
        ],
        opciones2: [
          { value: 1, texto: "No Tiene" },
          { value: 2, texto: "1 Tv" },
          { value: 3, texto: "2 Tv" },
          { value: 4, texto: "3 o mas tv" }
        ],
        opciones3: [
          { value: 1, texto: "No tene Vehiculos" },
          { value: 2, texto: "1 Vehiculo" },
          { value: 3, texto: "2 Vehiculos" },
          { value: 4, texto: "3 o mas Vehiculos" }
        ],
        opciones4: [
          { value: 1, texto: "Sin estudios" },
          { value: 2, texto: "Primaria incompleta" },
          { value: 3, texto: "Prmaria Completa" },
          { value: 4, texto: "Secundaria Incompleta" },
          { value: 5, texto: "Secundaria completa" },
          { value: 6, texto: "Educación superior incompleta" },
          { value: 7, texto: "Educación superior completa" },
          { value: 8, texto: "Posgrado" }
        ],
        opciones5: [
          { value: 1, texto: "Entre $0  y $500.000 pesos" },
          { value: 2, texto: "Entre $500.001 Y $1.100.000 pesos" },
          { value: 3, texto: "Entre $1.100.001 a $2.069.000" },
          { value: 4, texto: "Entre $2.070.000 y $3.269.000" },
          { value: 5, texto: "Entre $3.270.000 y $4.780.000" },
          { value: 6, texto: "Entre $4,780.001 y $5.150.000" },
          { value: 7, texto: "Más de $5.150.000" },
          { value: 8, texto: "No aplica" }
        ],
        opciones6: [
          { value: 1, texto: "Entre $ 0 y $ 980.000" },
          { value: 2, texto: "Entre $981.000  y $ 1.890.000" },
          { value: 3, texto: "Entre $1.890,001  y $3.305.000" },
          { value: 4, texto: "Entre $ 3.305.001  y  $ 5.050.000" },
          { value: 5, texto: "Entre $ 5.050.001 y  $ 7.650.000" },
          { value: 6, texto: "Entre $ 7.650.001 y $ 10.170.000" },
          { value: 7, texto: "Mas de $ 10.170.001" },
          { value: 8, texto: "No aplica" }
        ],
        hogar: {
          id: 0,
          id_dpto: "",
          id_mun: "",
          id_corre: "",
          id_vereda: "",
          id_barrio: "",
          id_zona: "",
          tenencia_vivienda: "",
          numero_hogares: "",
          poblacion_especial: "",
          vias_acceso: "",
          servicios_publicos: "",
          direccion: ""
        },
        caracData: {
          id: 0,
          id_hogar: 0,
          telefono: "",
          puntaje_sisben: "",
          afiliacion_entidad: "",
          otra_eps: "",
          tipo_id: "",
          identificacion: "",
          sexo: "",
          parentesco: "",
          pnom: "",
          snom: "",
          pape: "",
          sape: "",
          salario: "",
          id_compania: "",
          estado: "",
          estado_civil: "",
          fecha_nacimiento: "",
          tipo_afiliacion: "",
          embarazo: "",
          embarazo_multiple: "",
          discapacidad: "",
          nivel_escolaridad: "",
          ocupacion: "",
          colegio: "",
          grado: "",
          etnia: "",
          clasificacion: "",
          entiende: "",
          pyp: "",
          migrante: "",
          edad: "",
          orientacion: "",
          identidad_genero: "",
          perdida_peso: "",
          programa_icbf: ""
        },
        CA1: {
          id: 0,
          tipo_id: "0",
          identificacion: "",
          sexo: "0",
          parentesco: "0",
          pnom: "",
          snom: "",
          pape: "",
          sape: "",
          estado_civil: "0",
          fecha_nac: "",
          edad: 0,
          puntaje_sisben: "",
          afi_entidad: "0",
          otra_eps: "",
          tipo_afiliacion: "0",
          embarazo: "0",
          embarazo_multiple: "0",
          discapacidad: "0",
          escolaridad: "0",
          ocupacion: "0",
          colegio: "",
          grado: "0",
          entiende: "0",
          migrante: "0",
          pyp: "0",
          etnia: "0",
          clasificacion: "0",
          id_hogar: 0,
          jefe: "0",
          orientacion: "0",
          identidad_genero: "0",
          telefono: "",
          perdida_peso: "0",
          programa_icbf: "0",
          excepciones: "0",
          meses: 0,
          dias: 0
        },
        viviendaData: {
          id: 0,
          id_hogar: 0,
          tipo_vivienda: "",
          tipo_estructura: "",
          otro_tipo_estructura: "",
          numero_cuartos: "",
          personas_por_cuartos: "0",
          material_predominante: "",
          tipo_cubierta: "",
          otro_tipo_cubierta: "",
          actividad_economica: "",
          cual_actividad_economica: "",
          evento_afecta_vivienda: "",
          familias_accion: "",
          promedio_ingresos: "",
          promedio_gastos: "",
          fuente_agua: "",
          energia_electrica: "",
          gas_natural: "",
          acueducto: "",
          alcantarillado: "",
          telefono_fijo: "",
          aseo: "",
          internet_subsidiado: "",
          internet_privado: "",
          cual_fuente: "",
          donde_almacena_agua: "",
          otro_almacena_agua: "",
          ubicacion_tanque: "",
          tipo_tratamiento_agua: "",
          destino_final_basura: "",
          otro_destino_final_basura: "",
          porquerizas: "",
          plagas: "",
          industrias: "",
          malos_olores: "",
          rellenos: "",
          contaminacion_a: "",
          contaminacion_v: "",
          rio: "",
          otro_cerca: "",
          cual_cerca: "",
          aereopuertos: "",
          avenidas_transitadas: "",
          lotes_abandonados: "",
          servicio_sanitario: "",
          donde_sanitario: "",
          excretas: "",
          otro_depositan_excretas: "",
          cocina: "",
          dormitorio_a: "",
          sala: "",
          dormitorio_n: "",
          sanitario: "",
          lavadero: "",
          iluminacion_adecuada: "",
          techo_adecuado: "",
          ventilacion_adecuada: "",
          pisos_adecuado: "",
          paredes_adecuadas: "",
          gasolina: "",
          plaguicidas: "",
          detergentes: "",
          plaguicidas_insectos: "",
          envases_vacios: "",
          otro_envases_vacios: "",
          elementos_protecion: "",
          otro_elementos_protecion: "",
          metodos_coccion: "",
          otro_metodos_coccion: "",
          lugares_preparan_alimentos: "",
          lugares_almacenan_alimentos: "",
          otro_lugares_almacenan_alimentos: "",
          lava_frutas: "",
          tipo_explotacion: "",
          otro_tipo_explotacion: "",
          flora_afectados: "",
          fauna_afectados: "",
          suelo_afectados: "",
          aire_afectados: "",
          agua_afectados: "",
          residuos_solidos_genera: "",
          aguas_servidas_genera: "",
          desechos_cocina_genera: "",
          heces_animales_genera: "",
          quimicos_genera: "",
          otros_genera: "",
          cual_genera: "",
          tipo_combustible: "",
          mantenimiento_red: "",
          zona_alto_riesgo: "",
          almacenamiento_residuos: "",
          fuente_contaminacion: "",
          aguas_negras: "",
          zonas_verdes: "",
          desplazamientos: "",
          rotacion_cultivo: "",
          emplea_fertilizantes: "",
          suministro_energia_ilegal: "",
          quema_cultivo: "",
          mantenimiento_preventivo: "",
          veces_inundaciones: "",
          fachada: "",
          cuantos_baños: "",
          estado_conservacion_baños: "",
          acabados_externos: "",
          estado_conservacion_estructuras: "",
          mobiliario_cocina: "",
          andenes: ""
        },
        estratificacionData: {
          cuenta_internet: "",
          tiene_pc_escritorio: "",
          tiene_pc_portatil: "",
          cuantos_celulares: "",
          tiene_equipo_sonido: "",
          cuantos_tv_color: "",
          cuantos_vehiculos: "",
          nivel_instruccion: "",
          afiliacion_salud_privada: "",
          ingresos_zona_rural: "",
          ingresos_ciudad: "",
          id_jefe: "0"
        },
        animalesData: [],
        estratificacion: [],
        animal: "",
        nombreAnimal: "",
        cuantosAnimal: "",
        vacunadoAnimal: "0",
        mOTE: false,
        mOTC: false,
        mOAE: false,
        mOFA: false,
        mODA: false,
        mOFB: false,
        mOOC: false,
        mOEV: false,
        mOEP: false,
        mOMC: false,
        mOAA: false,
        mODH: false,
        mOES: false,
        mOOG: false,
        mOEPS1: false,
        mOEPS2: false,
        mOCOL1: false,
        mOCOL2: false,
        format: "yyyy-MM-dd",
        lenguaje: es,
        claseAyuda: "form-control",
        datos: [],
        datosJefe: [],
        Men1A: [],
        De1A5: [],
        De6A11: [],
        De10A59: [],
        ParPost: [],
        De12A17: [],
        De18A28: [],
        De29A59: [],
        De60: [],
        EnCro: [],
        EnInf: [],
        Migra: [],
        vectorJefes: [],
        vectorIntegrante: [],
        vectorAyuda: [],
        factores: [],
        GIDEN: false,
        GVIVI: false,
        GCARXCI: false,
        GADOLE: false,
        GADULT: false,
        GMIGRA: false,
        IDHOGAR: 0,
        ocupacionesVector: [],
        txtbusqueda: "",
        ocupacionAuxiliar: "",
        ocupacionAuxiliar2: "",
        opcionOcupaciones: "",
        txtbusquedaAct: "",
        actividadesVector: [],
        actividadesAuxiliar: "",
        SAPU: false,
        CODIGOGENE: "",
        valGIden: true,
        valGVivi: true,
        valGCart: true,
        valGAdole: true,
        valGAdul: true,
        valGMig: true,
        valGActu: true
      };
    },
    validations: {
      viviendaData: {
        tipo_vivienda: { required },
        tipo_estructura: { required },
        numero_cuartos: { required, numeric },
        personas_por_cuartos: { required, numeric },
        material_predominante: { required },
        tipo_cubierta: { required },
        // actividad_economica: { required },
        evento_afecta_vivienda: { required },
        familias_accion: { required },
        promedio_ingresos: { required },
        promedio_gastos: { required },
        fuente_agua: { required },
        energia_electrica: { required },
        gas_natural: { required },
        acueducto: { required },
        alcantarillado: { required },
        telefono_fijo: { required },
        aseo: { required },
        internet_subsidiado: { required },
        internet_privado: { required },
        donde_almacena_agua: { required },
        ubicacion_tanque: { required },
        tipo_tratamiento_agua: { required },
        destino_final_basura: { required },
        porquerizas: { required },
        plagas: { required },
        industrias: { required },
        malos_olores: { required },
        rellenos: { required },
        contaminacion_a: { required },
        contaminacion_v: { required },
        rio: { required },
        otro_cerca: { required },
        aereopuertos: { required },
        avenidas_transitadas: { required },
        lotes_abandonados: { required },
        servicio_sanitario: { required },
        donde_sanitario: { required },
        excretas: { required },
        cocina: { required },
        dormitorio_a: { required },
        sala: { required },
        dormitorio_n: { required },
        sanitario: { required },
        lavadero: { required },
        iluminacion_adecuada: { required },
        techo_adecuado: { required },
        ventilacion_adecuada: { required },
        pisos_adecuado: { required },
        paredes_adecuadas: { required },
        gasolina: { required },
        plaguicidas: { required },
        detergentes: { required },
        plaguicidas_insectos: { required },
        envases_vacios: { required },
        elementos_protecion: { required },
        metodos_coccion: { required },
        lugares_preparan_alimentos: { required },
        lugares_almacenan_alimentos: { required },
        lava_frutas: { required },
        tipo_explotacion: { required },
        flora_afectados: { required },
        fauna_afectados: { required },
        suelo_afectados: { required },
        aire_afectados: { required },
        agua_afectados: { required },
        residuos_solidos_genera: { required },
        aguas_servidas_genera: { required },
        desechos_cocina_genera: { required },
        heces_animales_genera: { required },
        quimicos_genera: { required },
        otros_genera: { required },
        tipo_combustible: { required },
        mantenimiento_red: { required },
        zona_alto_riesgo: { required },
        almacenamiento_residuos: { required },
        fuente_contaminacion: { required },
        aguas_negras: { required },
        zonas_verdes: { required },
        desplazamientos: { required },
        rotacion_cultivo: { required },
        emplea_fertilizantes: { required },
        suministro_energia_ilegal: { required },
        quema_cultivo: { required },
        mantenimiento_preventivo: { required },
        veces_inundaciones: { required },

        fachada: { required },
        cuantos_baños: { required },
        estado_conservacion_baños: { required },
        acabados_externos: { required },
        estado_conservacion_estructuras: { required },
        mobiliario_cocina: { required },
        andenes: { required }
      }
    },
    computed: {
      calEdad() {
        let nacimiento = moment(this.CA1.fecha_nac);
        let hoy = moment();
        let edad = 0;
        if (nacimiento < hoy) {
          edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
        }
        // console.info(hoy);
        return edad;
      },
      calEdad2() {
        let nacimiento = moment(this.caracData.fecha_nacimiento);
        let hoy = moment();
        let edad = 0;
        if (nacimiento < hoy) {
          edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
        }
        this.caracData.edad = edad;
        return edad;
      },
      wrongNumber: function() {
        return this.isNumeric(this.number) === false;
      },
      inputDisabled() {
        if (this.CA1.sexo === "MASCULINO") {
          this.CA1.embarazo = "NOAPLICA";
          this.CA1.embarazo_multiple = "NOAPLICA";
        } else {
          // this.CA1.embarazo = "0";
          // this.CA1.embarazo_multiple = "0";
          if (this.CA1.embarazo === "NO") {
            this.CA1.embarazo_multiple = "NO";
          } else {
            // this.caracData.embarazo = "0";
            this.CA1.embarazo_multiple = "0";
          }
        }
        return this.CA1.sexo === "MASCULINO";
      },
      inputDisabled2() {
        if (this.caracData.sexo === "MASCULINO") {
          this.caracData.embarazo = "NOAPLICA";
          this.caracData.embarazo_multiple = "NOAPLICA";
        } else {
          // this.caracData.embarazo = "";
          // this.caracData.embarazo_multiple = "";
          if (this.caracData.embarazo === "NO") {
            this.caracData.embarazo_multiple = "NO";
          } else {
            // this.caracData.embarazo = "0";
            this.caracData.embarazo_multiple = "";
          }
        }
        return this.caracData.sexo === "MASCULINO";
      },
      soloNum() {
        // alert(this.Men1A.peso_nacer);
        // return this.Men1A.peso_nacer.replace( /[^\d]/g, '' ).trim();
      },
      calHoy() {
        let hoy = moment();
        return hoy;
      },
      spinGIden() {
        if (this.valGIden) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGVivi() {
        if (this.valGVivi) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGCart() {
        if (this.valGCart) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGAdole() {
        if (this.valGAdole) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGAdul() {
        if (this.valGAdul) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGMig() {
        if (this.valGMig) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGActu() {
        if (this.valGActu) {
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
      nuevo: async function(id_hogar) {
        const parametros = {
          _token: this.csrf,
          id_hogar: id_hogar
        };
        try {
          await caracterizacionServicios
            .editarCaracterizacion(parametros)
            .then(respuesta => {
              this.dpto_options = respuesta.data.arrayDpto;
              this.muni_options = respuesta.data.arrayMuni;
              this.corregi_options = respuesta.data.arrayCorregi;
              this.vereda_options = respuesta.data.arrayVeredas;
              this.parentesco_options = respuesta.data.arrayParentesco;
              this.estado_options = respuesta.data.arrayEstado;
              this.escolaridad_options = respuesta.data.arrayEscolaridad;
              this.ocupacion_options = respuesta.data.arrayOcupacion;
              this.etnia_options = respuesta.data.arrayEtnia;
              this.admini_options = respuesta.data.arrayAdmini;
              this.clasifi_options = respuesta.data.arrayCLasifi;
              this.grados_option = respuesta.data.arrayGrados;
              this.morbilidadNacer_options = respuesta.data.arrayMorbilidadNacer;
              this.morbilidad_options = respuesta.data.arrayMorbilidad;
              this.metodos_options = respuesta.data.arrayMetodos;
              this.motivos_options = respuesta.data.arrayMotivos;
              this.grupos_options = respuesta.data.arrayGrupos;
              this.enfcro_options = respuesta.data.arrayEnfCro;
              this.enfinf_options = respuesta.data.arrayEnfInf;
              this.religion_options = respuesta.data.arrayReligion;
              this.CODIGOGENE = respuesta.data.codigo;

              this.hogar.id = respuesta.data.hogar.id;
              this.hogar.id_dpto = respuesta.data.hogar.id_dpto;
              this.hogar.id_mun = respuesta.data.hogar.id_mun;
              this.cambiarCombo("muni");
              this.hogar.id_corre = "" + respuesta.data.hogar.id_corre;
              if (this.hogar.id_corre !== 0) {
                this.cambiarCombo("corregi");
              }
              this.hogar.id_vereda = respuesta.data.hogar.id_vereda;
              this.hogar.id_barrio = respuesta.data.hogar.id_barrio;
              // this.hogar.id_zona = respuesta.data.hogar.id_zona;
              // this.hogar.tenencia_vivienda =
              //   respuesta.data.hogar.tenencia_vivienda;
              // this.hogar.numero_hogares = respuesta.data.hogar.numero_hogares;
              // this.hogar.poblacion_especial =
              //   respuesta.data.hogar.poblacion_especial;
              // this.hogar.vias_acceso = respuesta.data.hogar.vias_acceso;
              // this.hogar.servicios_publicos =
              //   respuesta.data.hogar.servicios_publicos;
              // this.hogar.direccion = respuesta.data.hogar.direccion;

              console.log(this.hogar);
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
      volver() {
        this.$router.push("/gestion");
      },
      habilitar_zonas() {
        if (this.hogar.id_zona === "") {
          this.estratificacionData.ingresos_zona_rural = "";
          this.estratificacionData.ingresos_ciudad = "";
        }
        if (this.hogar.id_zona === "0") {
          this.estratificacionData.ingresos_zona_rural = 8;
          this.estratificacionData.ingresos_ciudad = 8;
        }
        if (this.hogar.id_zona === "1") {
          this.estratificacionData.ingresos_zona_rural = 8;
          this.estratificacionData.ingresos_ciudad = "";
        }
        if (this.hogar.id_zona === "2" || this.hogar.id_zona === "3") {
          this.estratificacionData.ingresos_zona_rural = "";
          this.estratificacionData.ingresos_ciudad = 8;
        }
      },
      allLetter(valor) {
        var letters = /^([0-9])*$/;
        if (valor === "") {
          return false;
        } else {
          if (valor.match(letters)) {
            // console.log("no hay letras");
            return true;
          } else {
            // console.log("hay letras");
            return false;
          }
        }
      },
      validarNumHog() {
        if (this.hogar.numero_hogares <= 0) {
          this.hogar.numero_hogares = "";
        }
      },
      cambiarCombo: async function(caja) {
        if (caja === "dpto") {
          this.hogar.id_mun = "";
          this.hogar.id_corre = "";
          this.hogar.id_vereda = "";
          this.hogar.id_barrio = "";
        }
        if (caja === "muni") {
          this.hogar.id_corre = "";
          this.hogar.id_vereda = "";
          this.hogar.id_barrio = "";
          const parametros = {
            _token: this.csrf,
            id: this.hogar.id_mun,
            opcion: "MUN"
          };
          try {
            await barriosServicios.comboBarrios(parametros).then(respuesta => {
              this.barrio_options = respuesta.data.arrayBarrios;
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
          try {
            await colegiosServicios.combo(parametros).then(respuesta => {
              this.colegio_options = respuesta.data.arrayColegios;
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
        if (caja === "corregi") {
          this.hogar.id_vereda = "";
          this.hogar.id_barrio = "";

          if (this.hogar.id_corre !== "0") {
            const parametros = {
              _token: this.csrf,
              id: this.hogar.id_corre,
              opcion: "CORRE"
            };
            try {
              await barriosServicios.comboBarrios(parametros).then(respuesta => {
                this.barrio_options = respuesta.data.arrayBarrios;
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

            try {
              await colegiosServicios.combo(parametros).then(respuesta => {
                this.colegio_options = respuesta.data.arrayColegios;
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
        }
        if (caja === "etnia") {
          this.CA1.clasificacion = "0";
        }
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
  .color-datepicker {
    background: #f2f2f2;
    border: 1px solid #ddd;
    padding: 0em 1em 1em;
    margin-bottom: 2em;
  }
</style>
