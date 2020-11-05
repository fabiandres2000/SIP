(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/caracterizacion_servicios */ "./resources/js/Servicios/caracterizacion_servicios.js");
/* harmony import */ var _Servicios_barrios_servicios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../Servicios/barrios_servicios */ "./resources/js/Servicios/barrios_servicios.js");
/* harmony import */ var _Servicios_colegios_servicios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../Servicios/colegios_servicios */ "./resources/js/Servicios/colegios_servicios.js");
/* harmony import */ var _Servicios_ocupaciones_servicios__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../Servicios/ocupaciones_servicios */ "./resources/js/Servicios/ocupaciones_servicios.js");
/* harmony import */ var _Servicios_actividad_servicios__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../Servicios/actividad_servicios */ "./resources/js/Servicios/actividad_servicios.js");
/* harmony import */ var vuejs_datepicker__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js");
/* harmony import */ var vuejs_datepicker_dist_locale__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vuejs-datepicker/dist/locale */ "./node_modules/vuejs-datepicker/dist/locale/index.js");
/* harmony import */ var vuejs_datepicker_dist_locale__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(vuejs_datepicker_dist_locale__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! vuelidate/lib/validators */ "./node_modules/vuelidate/lib/validators/index.js");
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }








var isPhoneNumber = vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["helpers"].regex("numeric", /^3[0-9]{9}$/);
var alpha = vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["helpers"].regex("alpha", /^[a-zA-Z]*$/);
var alphaNumAndDotValidator = vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["helpers"].regex("alphaNumAndDot", /^[a-z\d.]*$/i);

var entero = function entero(value) {
  return /^[0-9]*$/.test(value);
};


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Datepicker: vuejs_datepicker__WEBPACK_IMPORTED_MODULE_6__["default"]
  },
  mounted: function mounted() {
    this.IDHOGAR = this.$route.params.IDHOGAR;
    this.nuevo(this.IDHOGAR);
  },
  filters: {
    moneda: function moneda(val) {
      var number = +val.replace(/[^\d.]/g, "");
      return isNaN(number) ? 0 : number;
    },
    moment: function (_moment) {
      function moment(_x) {
        return _moment.apply(this, arguments);
      }

      moment.toString = function () {
        return _moment.toString();
      };

      return moment;
    }(function (date) {
      return moment(date).format("YYYY-MM-DD");
    })
  },
  data: function data() {
    return {
      hoy: "",
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
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
      opciones1: [{
        value: 1,
        texto: "Ninguno"
      }, {
        value: 2,
        texto: "1 Celular"
      }, {
        value: 3,
        texto: "2 Celulares"
      }, {
        value: 4,
        texto: "Tiene 3 Celulares"
      }, {
        value: 5,
        texto: "Tiene 4 o mas Celulares"
      }],
      opciones2: [{
        value: 1,
        texto: "No Tiene"
      }, {
        value: 2,
        texto: "1 Tv"
      }, {
        value: 3,
        texto: "2 Tv"
      }, {
        value: 4,
        texto: "3 o mas tv"
      }],
      opciones3: [{
        value: 1,
        texto: "No tene Vehiculos"
      }, {
        value: 2,
        texto: "1 Vehiculo"
      }, {
        value: 3,
        texto: "2 Vehiculos"
      }, {
        value: 4,
        texto: "3 o mas Vehiculos"
      }],
      opciones4: [{
        value: 1,
        texto: "Sin estudios"
      }, {
        value: 2,
        texto: "Primaria incompleta"
      }, {
        value: 3,
        texto: "Prmaria Completa"
      }, {
        value: 4,
        texto: "Secundaria Incompleta"
      }, {
        value: 5,
        texto: "Secundaria completa"
      }, {
        value: 6,
        texto: "Educación superior incompleta"
      }, {
        value: 7,
        texto: "Educación superior completa"
      }, {
        value: 8,
        texto: "Posgrado"
      }],
      opciones5: [{
        value: 1,
        texto: "Entre $0  y $500.000 pesos"
      }, {
        value: 2,
        texto: "Entre $500.001 Y $1.100.000 pesos"
      }, {
        value: 3,
        texto: "Entre $1.100.001 a $2.069.000"
      }, {
        value: 4,
        texto: "Entre $2.070.000 y $3.269.000"
      }, {
        value: 5,
        texto: "Entre $3.270.000 y $4.780.000"
      }, {
        value: 6,
        texto: "Entre $4,780.001 y $5.150.000"
      }, {
        value: 7,
        texto: "Más de $5.150.000"
      }, {
        value: 8,
        texto: "No aplica"
      }],
      opciones6: [{
        value: 1,
        texto: "Entre $ 0 y $ 980.000"
      }, {
        value: 2,
        texto: "Entre $981.000  y $ 1.890.000"
      }, {
        value: 3,
        texto: "Entre $1.890,001  y $3.305.000"
      }, {
        value: 4,
        texto: "Entre $ 3.305.001  y  $ 5.050.000"
      }, {
        value: 5,
        texto: "Entre $ 5.050.001 y  $ 7.650.000"
      }, {
        value: 6,
        texto: "Entre $ 7.650.001 y $ 10.170.000"
      }, {
        value: 7,
        texto: "Mas de $ 10.170.001"
      }, {
        value: 8,
        texto: "No aplica"
      }],
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
      lenguaje: vuejs_datepicker_dist_locale__WEBPACK_IMPORTED_MODULE_7__["es"],
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
      tipo_vivienda: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      tipo_estructura: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      numero_cuartos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"],
        numeric: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["numeric"]
      },
      personas_por_cuartos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"],
        numeric: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["numeric"]
      },
      material_predominante: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      tipo_cubierta: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      // actividad_economica: { required },
      evento_afecta_vivienda: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      familias_accion: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      promedio_ingresos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      promedio_gastos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      fuente_agua: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      energia_electrica: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      gas_natural: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      acueducto: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      alcantarillado: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      telefono_fijo: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      aseo: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      internet_subsidiado: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      internet_privado: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      donde_almacena_agua: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      ubicacion_tanque: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      tipo_tratamiento_agua: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      destino_final_basura: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      porquerizas: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      plagas: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      industrias: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      malos_olores: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      rellenos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      contaminacion_a: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      contaminacion_v: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      rio: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      otro_cerca: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      aereopuertos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      avenidas_transitadas: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      lotes_abandonados: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      servicio_sanitario: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      donde_sanitario: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      excretas: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      cocina: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      dormitorio_a: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      sala: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      dormitorio_n: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      sanitario: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      lavadero: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      iluminacion_adecuada: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      techo_adecuado: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      ventilacion_adecuada: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      pisos_adecuado: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      paredes_adecuadas: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      gasolina: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      plaguicidas: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      detergentes: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      plaguicidas_insectos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      envases_vacios: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      elementos_protecion: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      metodos_coccion: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      lugares_preparan_alimentos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      lugares_almacenan_alimentos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      lava_frutas: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      tipo_explotacion: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      flora_afectados: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      fauna_afectados: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      suelo_afectados: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      aire_afectados: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      agua_afectados: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      residuos_solidos_genera: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      aguas_servidas_genera: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      desechos_cocina_genera: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      heces_animales_genera: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      quimicos_genera: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      otros_genera: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      tipo_combustible: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      mantenimiento_red: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      zona_alto_riesgo: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      almacenamiento_residuos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      fuente_contaminacion: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      aguas_negras: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      zonas_verdes: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      desplazamientos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      rotacion_cultivo: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      emplea_fertilizantes: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      suministro_energia_ilegal: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      quema_cultivo: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      mantenimiento_preventivo: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      veces_inundaciones: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      fachada: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      cuantos_baños: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      estado_conservacion_baños: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      acabados_externos: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      estado_conservacion_estructuras: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      mobiliario_cocina: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      },
      andenes: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_8__["required"]
      }
    }
  },
  computed: {
    calEdad: function calEdad() {
      var nacimiento = moment(this.CA1.fecha_nac);
      var hoy = moment();
      var edad = 0;

      if (nacimiento < hoy) {
        edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
      } // console.info(hoy);


      return edad;
    },
    calEdad2: function calEdad2() {
      var nacimiento = moment(this.caracData.fecha_nacimiento);
      var hoy = moment();
      var edad = 0;

      if (nacimiento < hoy) {
        edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
      }

      this.caracData.edad = edad;
      return edad;
    },
    wrongNumber: function wrongNumber() {
      return this.isNumeric(this.number) === false;
    },
    inputDisabled: function inputDisabled() {
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
    inputDisabled2: function inputDisabled2() {
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
    soloNum: function soloNum() {// alert(this.Men1A.peso_nacer);
      // return this.Men1A.peso_nacer.replace( /[^\d]/g, '' ).trim();
    },
    calHoy: function calHoy() {
      var hoy = moment();
      return hoy;
    },
    spinGIden: function spinGIden() {
      if (this.valGIden) {
        return {};
      } else {
        return ["kt-spinner", "kt-spinner--right", "kt-spinner--sm", "kt-spinner--light"];
      }
    },
    spinGVivi: function spinGVivi() {
      if (this.valGVivi) {
        return {};
      } else {
        return ["kt-spinner", "kt-spinner--right", "kt-spinner--sm", "kt-spinner--light"];
      }
    },
    spinGCart: function spinGCart() {
      if (this.valGCart) {
        return {};
      } else {
        return ["kt-spinner", "kt-spinner--right", "kt-spinner--sm", "kt-spinner--light"];
      }
    },
    spinGAdole: function spinGAdole() {
      if (this.valGAdole) {
        return {};
      } else {
        return ["kt-spinner", "kt-spinner--right", "kt-spinner--sm", "kt-spinner--light"];
      }
    },
    spinGAdul: function spinGAdul() {
      if (this.valGAdul) {
        return {};
      } else {
        return ["kt-spinner", "kt-spinner--right", "kt-spinner--sm", "kt-spinner--light"];
      }
    },
    spinGMig: function spinGMig() {
      if (this.valGMig) {
        return {};
      } else {
        return ["kt-spinner", "kt-spinner--right", "kt-spinner--sm", "kt-spinner--light"];
      }
    },
    spinGActu: function spinGActu() {
      if (this.valGActu) {
        return {};
      } else {
        return ["kt-spinner", "kt-spinner--right", "kt-spinner--sm", "kt-spinner--light"];
      }
    }
  },
  methods: {
    nuevo: function () {
      var _nuevo = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(id_hogar) {
        var _this = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                parametros = {
                  _token: this.csrf,
                  id_hogar: id_hogar
                };
                _context.prev = 1;
                _context.next = 4;
                return _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_1__["editarCaracterizacion"](parametros).then(function (respuesta) {
                  _this.dpto_options = respuesta.data.arrayDpto;
                  _this.muni_options = respuesta.data.arrayMuni;
                  _this.corregi_options = respuesta.data.arrayCorregi;
                  _this.vereda_options = respuesta.data.arrayVeredas;
                  _this.parentesco_options = respuesta.data.arrayParentesco;
                  _this.estado_options = respuesta.data.arrayEstado;
                  _this.escolaridad_options = respuesta.data.arrayEscolaridad;
                  _this.ocupacion_options = respuesta.data.arrayOcupacion;
                  _this.etnia_options = respuesta.data.arrayEtnia;
                  _this.admini_options = respuesta.data.arrayAdmini;
                  _this.clasifi_options = respuesta.data.arrayCLasifi;
                  _this.grados_option = respuesta.data.arrayGrados;
                  _this.morbilidadNacer_options = respuesta.data.arrayMorbilidadNacer;
                  _this.morbilidad_options = respuesta.data.arrayMorbilidad;
                  _this.metodos_options = respuesta.data.arrayMetodos;
                  _this.motivos_options = respuesta.data.arrayMotivos;
                  _this.grupos_options = respuesta.data.arrayGrupos;
                  _this.enfcro_options = respuesta.data.arrayEnfCro;
                  _this.enfinf_options = respuesta.data.arrayEnfInf;
                  _this.religion_options = respuesta.data.arrayReligion;
                  _this.CODIGOGENE = respuesta.data.codigo;
                  _this.hogar.id = respuesta.data.hogar.id;
                  _this.hogar.id_dpto = respuesta.data.hogar.id_dpto;
                  _this.hogar.id_mun = respuesta.data.hogar.id_mun;

                  _this.cambiarCombo("muni");

                  _this.hogar.id_corre = "" + respuesta.data.hogar.id_corre;

                  if (_this.hogar.id_corre !== 0) {
                    _this.cambiarCombo("corregi");
                  }

                  _this.hogar.id_vereda = respuesta.data.hogar.id_vereda;
                  _this.hogar.id_barrio = respuesta.data.hogar.id_barrio; // this.hogar.id_zona = respuesta.data.hogar.id_zona;
                  // this.hogar.tenencia_vivienda =
                  //   respuesta.data.hogar.tenencia_vivienda;
                  // this.hogar.numero_hogares = respuesta.data.hogar.numero_hogares;
                  // this.hogar.poblacion_especial =
                  //   respuesta.data.hogar.poblacion_especial;
                  // this.hogar.vias_acceso = respuesta.data.hogar.vias_acceso;
                  // this.hogar.servicios_publicos =
                  //   respuesta.data.hogar.servicios_publicos;
                  // this.hogar.direccion = respuesta.data.hogar.direccion;

                  console.log(_this.hogar);
                });

              case 4:
                _context.next = 15;
                break;

              case 6:
                _context.prev = 6;
                _context.t0 = _context["catch"](1);
                _context.t1 = _context.t0.response.status;
                _context.next = _context.t1 === 422 ? 11 : 13;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context.abrupt("break", 15);

              case 15:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[1, 6]]);
      }));

      function nuevo(_x2) {
        return _nuevo.apply(this, arguments);
      }

      return nuevo;
    }(),
    volver: function volver() {
      this.$router.push("/gestion");
    },
    habilitar_zonas: function habilitar_zonas() {
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
    allLetter: function allLetter(valor) {
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
    validarNumHog: function validarNumHog() {
      if (this.hogar.numero_hogares <= 0) {
        this.hogar.numero_hogares = "";
      }
    },
    cambiarCombo: function () {
      var _cambiarCombo = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(caja) {
        var _this2 = this;

        var parametros, _parametros;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                if (caja === "dpto") {
                  this.hogar.id_mun = "";
                  this.hogar.id_corre = "";
                  this.hogar.id_vereda = "";
                  this.hogar.id_barrio = "";
                }

                if (!(caja === "muni")) {
                  _context2.next = 34;
                  break;
                }

                this.hogar.id_corre = "";
                this.hogar.id_vereda = "";
                this.hogar.id_barrio = "";
                parametros = {
                  _token: this.csrf,
                  id: this.hogar.id_mun,
                  opcion: "MUN"
                };
                _context2.prev = 6;
                _context2.next = 9;
                return _Servicios_barrios_servicios__WEBPACK_IMPORTED_MODULE_2__["comboBarrios"](parametros).then(function (respuesta) {
                  _this2.barrio_options = respuesta.data.arrayBarrios;
                });

              case 9:
                _context2.next = 20;
                break;

              case 11:
                _context2.prev = 11;
                _context2.t0 = _context2["catch"](6);
                _context2.t1 = _context2.t0.response.status;
                _context2.next = _context2.t1 === 422 ? 16 : 18;
                break;

              case 16:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 20);

              case 18:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 20);

              case 20:
                _context2.prev = 20;
                _context2.next = 23;
                return _Servicios_colegios_servicios__WEBPACK_IMPORTED_MODULE_3__["combo"](parametros).then(function (respuesta) {
                  _this2.colegio_options = respuesta.data.arrayColegios;
                });

              case 23:
                _context2.next = 34;
                break;

              case 25:
                _context2.prev = 25;
                _context2.t2 = _context2["catch"](20);
                _context2.t3 = _context2.t2.response.status;
                _context2.next = _context2.t3 === 422 ? 30 : 32;
                break;

              case 30:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 34);

              case 32:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 34);

              case 34:
                if (!(caja === "corregi")) {
                  _context2.next = 67;
                  break;
                }

                this.hogar.id_vereda = "";
                this.hogar.id_barrio = "";

                if (!(this.hogar.id_corre !== "0")) {
                  _context2.next = 67;
                  break;
                }

                _parametros = {
                  _token: this.csrf,
                  id: this.hogar.id_corre,
                  opcion: "CORRE"
                };
                _context2.prev = 39;
                _context2.next = 42;
                return _Servicios_barrios_servicios__WEBPACK_IMPORTED_MODULE_2__["comboBarrios"](_parametros).then(function (respuesta) {
                  _this2.barrio_options = respuesta.data.arrayBarrios;
                });

              case 42:
                _context2.next = 53;
                break;

              case 44:
                _context2.prev = 44;
                _context2.t4 = _context2["catch"](39);
                _context2.t5 = _context2.t4.response.status;
                _context2.next = _context2.t5 === 422 ? 49 : 51;
                break;

              case 49:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 53);

              case 51:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 53);

              case 53:
                _context2.prev = 53;
                _context2.next = 56;
                return _Servicios_colegios_servicios__WEBPACK_IMPORTED_MODULE_3__["combo"](_parametros).then(function (respuesta) {
                  _this2.colegio_options = respuesta.data.arrayColegios;
                });

              case 56:
                _context2.next = 67;
                break;

              case 58:
                _context2.prev = 58;
                _context2.t6 = _context2["catch"](53);
                _context2.t7 = _context2.t6.response.status;
                _context2.next = _context2.t7 === 422 ? 63 : 65;
                break;

              case 63:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 67);

              case 65:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 67);

              case 67:
                if (caja === "etnia") {
                  this.CA1.clasificacion = "0";
                }

              case 68:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this, [[6, 11], [20, 25], [39, 44], [53, 58]]);
      }));

      function cambiarCombo(_x3) {
        return _cambiarCombo.apply(this, arguments);
      }

      return cambiarCombo;
    }()
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n.color-datepicker {\n  background: #f2f2f2;\n  border: 1px solid #ddd;\n  padding: 0em 1em 1em;\n  margin-bottom: 2em;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Editar.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=template&id=8bf6b44a&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=template&id=8bf6b44a& ***!
  \*********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row" }, [
    _c("div", { staticClass: "col-12" }, [
      _c(
        "div",
        {
          staticClass: "kt-portlet kt-portlet--height-fluid kt-portlet--mobile",
          staticStyle: { "margin-top": "-4%" }
        },
        [
          _c(
            "div",
            {
              staticClass:
                "kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm"
            },
            [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "kt-portlet__head-toolbar" }, [
                _c(
                  "a",
                  {
                    staticClass: "btn btn-danger kt-margin-r-10",
                    attrs: { href: "#" },
                    on: {
                      click: function($event) {
                        $event.preventDefault()
                        return _vm.volver($event)
                      }
                    }
                  },
                  [
                    _c("i", { staticClass: "la la-arrow-left" }),
                    _vm._v(" "),
                    _c("span", { staticClass: "kt-hidden-mobile" }, [
                      _vm._v("Volver")
                    ])
                  ]
                ),
                _vm._v(" "),
                _c("div", { staticClass: "btn-group" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-brand",
                      class: _vm.spinGActu,
                      attrs: { type: "button", disabled: !_vm.valGActu },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.Actualizar($event)
                        }
                      }
                    },
                    [
                      _c("i", { staticClass: "la la-refresh" }),
                      _vm._v(" "),
                      _c("span", { staticClass: "kt-hidden-mobile" }, [
                        _vm._v("Actualizar")
                      ])
                    ]
                  )
                ])
              ])
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "kt-portlet__body" }, [
            _c(
              "ul",
              {
                staticClass:
                  "nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success",
                attrs: { role: "tablist" }
              },
              [
                _c("li", { staticClass: "nav-item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link active",
                      attrs: {
                        "data-toggle": "tab",
                        href: "#tabIdentificacion",
                        role: "tab"
                      },
                      on: {
                        click: function($event) {
                          return _vm.cambiarTab2("tabIdentificacion")
                        }
                      }
                    },
                    [_vm._v("Identificación")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "nav-item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link",
                      attrs: {
                        "data-toggle": "tab",
                        href: "#tabVivienda",
                        role: "tab"
                      },
                      on: {
                        click: function($event) {
                          return _vm.cambiarTab2("tabVivienda")
                        }
                      }
                    },
                    [_vm._v("Viviendas")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "nav-item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link",
                      attrs: {
                        "data-toggle": "tab",
                        href: "#cartxciclo",
                        role: "tab"
                      },
                      on: {
                        click: function($event) {
                          return _vm.cambiarTab2("cartxciclo")
                        }
                      }
                    },
                    [_vm._v("Cart. X ciclo")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "nav-item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link",
                      attrs: {
                        "data-toggle": "tab",
                        href: "#adolescente",
                        role: "tab"
                      },
                      on: {
                        click: function($event) {
                          return _vm.cambiarTab2("adolescente")
                        }
                      }
                    },
                    [_vm._v("Adolecentes/Jovenes")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "nav-item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link",
                      attrs: {
                        "data-toggle": "tab",
                        href: "#adultomayor",
                        role: "tab"
                      },
                      on: {
                        click: function($event) {
                          return _vm.cambiarTab2("adultomayor")
                        }
                      }
                    },
                    [_vm._v("Adulto mayor")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "nav-item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link",
                      attrs: {
                        "data-toggle": "tab",
                        href: "#migrante",
                        role: "tab"
                      },
                      on: {
                        click: function($event) {
                          return _vm.cambiarTab2("migrante")
                        }
                      }
                    },
                    [_vm._v("Migrante")]
                  )
                ])
              ]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "tab-content" }, [
              _c(
                "div",
                {
                  staticClass: "tab-pane active",
                  attrs: { id: "tabIdentificacion", role: "tabpanel" }
                },
                [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-12 kt-align-right" }, [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-brand",
                          class: _vm.spinGIden,
                          attrs: { type: "button", disabled: !_vm.valGIden },
                          on: {
                            click: function($event) {
                              return _vm.cambiarTab1(
                                "tabVivienda",
                                "tabIdentificacion"
                              )
                            }
                          }
                        },
                        [
                          _c("i", { staticClass: "la la-arrow-right" }),
                          _vm._v(" "),
                          _c("span", { staticClass: "kt-hidden-mobile" }, [
                            _vm._v("Siguiente")
                          ])
                        ]
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _vm._m(1),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Departamento (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "id_dpto",
                            class:
                              _vm.hogar.id_dpto == ""
                                ? "is-invalid"
                                : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.cambiarCombo("dpto")
                              }
                            },
                            model: {
                              value: _vm.hogar.id_dpto,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.hogar,
                                  "id_dpto",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "hogar.id_dpto"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.dpto_options, function(item) {
                              return _c(
                                "option",
                                {
                                  key: item.value,
                                  domProps: { value: item.value }
                                },
                                [_vm._v(_vm._s(item.texto))]
                              )
                            })
                          ],
                          2
                        ),
                        _vm._v(" "),
                        _vm.hogar.id_dpto != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Departamento Valido")
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "invalid-feedback" }, [
                          _vm.hogar.id_dpto == ""
                            ? _c("span", [
                                _vm._v("El departamento es obligatorio")
                              ])
                            : _vm._e()
                        ])
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Municipio (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "id_mun",
                            class:
                              _vm.hogar.id_mun == ""
                                ? "is-invalid"
                                : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.cambiarCombo("muni")
                              }
                            },
                            model: {
                              value: _vm.hogar.id_mun,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.hogar,
                                  "id_mun",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "hogar.id_mun"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(
                              _vm.muni_options[_vm.hogar.id_dpto],
                              function(item) {
                                return _c(
                                  "option",
                                  {
                                    key: item.value,
                                    domProps: { value: item.value }
                                  },
                                  [_vm._v(_vm._s(item.texto))]
                                )
                              }
                            )
                          ],
                          2
                        ),
                        _vm._v(" "),
                        _vm.hogar.id_mun != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Municipio Valido")
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "invalid-feedback" }, [
                          _vm.hogar.id_mun == ""
                            ? _c("span", [
                                _vm._v("El municipio es obligatorio")
                              ])
                            : _vm._e()
                        ])
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Corregimiento:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.hogar.id_corre == ""
                                ? "is-invalid"
                                : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.cambiarCombo("corregi")
                              }
                            },
                            model: {
                              value: _vm.hogar.id_corre,
                              callback: function($$v) {
                                _vm.$set(_vm.hogar, "id_corre", $$v)
                              },
                              expression: "hogar.id_corre"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "0" } }, [
                              _vm._v("No Aplica")
                            ]),
                            _vm._v(" "),
                            _vm._l(
                              _vm.corregi_options[_vm.hogar.id_mun],
                              function(item) {
                                return _c(
                                  "option",
                                  {
                                    key: item.value,
                                    domProps: { value: item.value }
                                  },
                                  [_vm._v(_vm._s(item.texto))]
                                )
                              }
                            )
                          ],
                          2
                        ),
                        _vm._v(" "),
                        _vm.hogar.id_corre != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Corregimiento Valido")
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "invalid-feedback" }, [
                          _vm.hogar.id_corre == ""
                            ? _c("span", [
                                _vm._v("El corregimiento es obligatorio")
                              ])
                            : _vm._e()
                        ])
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Vereda:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.hogar.id_vereda == ""
                                ? "is-invalid"
                                : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.cambiarCombo("vereda")
                              }
                            },
                            model: {
                              value: _vm.hogar.id_vereda,
                              callback: function($$v) {
                                _vm.$set(_vm.hogar, "id_vereda", $$v)
                              },
                              expression: "hogar.id_vereda"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "0" } }, [
                              _vm._v("No Aplica")
                            ]),
                            _vm._v(" "),
                            _vm._l(
                              _vm.vereda_options[_vm.hogar.id_corre],
                              function(item) {
                                return _c(
                                  "option",
                                  {
                                    key: item.value,
                                    domProps: { value: item.value }
                                  },
                                  [_vm._v(_vm._s(item.texto))]
                                )
                              }
                            )
                          ],
                          2
                        ),
                        _vm._v(" "),
                        _vm.hogar.id_vereda != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Vereda Valida")
                            ])
                          : _vm._e()
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Barrio:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.hogar.id_barrio == ""
                                ? "is-invalid"
                                : "is-valid",
                            model: {
                              value: _vm.hogar.id_barrio,
                              callback: function($$v) {
                                _vm.$set(_vm.hogar, "id_barrio", $$v)
                              },
                              expression: "hogar.id_barrio"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "0" } }, [
                              _vm._v("No Aplica")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.barrio_options, function(item) {
                              return _c(
                                "option",
                                {
                                  key: item.value,
                                  domProps: { value: item.value }
                                },
                                [_vm._v(_vm._s(item.texto))]
                              )
                            })
                          ],
                          2
                        ),
                        _vm._v(" "),
                        _vm.hogar.id_barrio != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Barrio Valido")
                            ])
                          : _vm._e()
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Zona:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.hogar.id_zona == ""
                                ? "is-invalid"
                                : "is-valid",
                            on: { change: _vm.habilitar_zonas },
                            model: {
                              value: _vm.hogar.id_zona,
                              callback: function($$v) {
                                _vm.$set(_vm.hogar, "id_zona", $$v)
                              },
                              expression: "hogar.id_zona"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "0" } }, [
                              _vm._v("No Aplica")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "1" } }, [
                              _vm._v("Urbano")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "2" } }, [
                              _vm._v("Rural centro poblado")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "3" } }, [
                              _vm._v("Rural disperso")
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _vm.hogar.id_zona != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Zona Valida")
                            ])
                          : _vm._e()
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Tenencia de Vivienda (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "tenencia_vivienda",
                            class:
                              _vm.hogar.tenencia_vivienda == ""
                                ? "is-invalid"
                                : "is-valid",
                            model: {
                              value: _vm.hogar.tenencia_vivienda,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.hogar,
                                  "tenencia_vivienda",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "hogar.tenencia_vivienda"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "PROPIETARIO" } }, [
                              _vm._v("PROPIETARIO(A)")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "ARRENDADO" } }, [
                              _vm._v("ARRENDADO(A)")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "FAMILIAR" } }, [
                              _vm._v("FAMILIAR")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "CUIDADOR" } }, [
                              _vm._v("CUIDADOR(A)")
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _vm.hogar.tenencia_vivienda != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Tenencia de Vivienda Valida")
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "invalid-feedback" }, [
                          _vm.hogar.tenencia_vivienda == ""
                            ? _c("span", [
                                _vm._v("La tenencia de vivienda es obligatoria")
                              ])
                            : _vm._e()
                        ])
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("label", [_vm._v("Numero de Hogares (*):")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.hogar.numero_hogares,
                            expression: "hogar.numero_hogares"
                          }
                        ],
                        ref: "numero_hogares",
                        staticClass: "form-control text-capitalize",
                        class:
                          _vm.allLetter(_vm.hogar.numero_hogares) == false
                            ? "is-invalid"
                            : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Numero de Hogares"
                        },
                        domProps: { value: _vm.hogar.numero_hogares },
                        on: {
                          change: _vm.validarNumHog,
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.hogar,
                              "numero_hogares",
                              $event.target.value
                            )
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm.allLetter(_vm.hogar.numero_hogares) == true
                        ? _c("div", { staticClass: "valid-feedback" }, [
                            _vm._v("Numero de Hogares Valido")
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _c("div", { staticClass: "invalid-feedback" }, [
                        _vm.allLetter(_vm.hogar.numero_hogares) == false
                          ? _c("span", [
                              _vm._v("El numero de hogares debe ser numerico")
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.hogar.numero_hogares == ""
                          ? _c("span", [
                              _vm._v("El numero de hogares es obligatorio")
                            ])
                          : _vm._e()
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Población Especial (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "poblacion_especial",
                            class:
                              _vm.hogar.poblacion_especial == ""
                                ? "is-invalid"
                                : "is-valid",
                            model: {
                              value: _vm.hogar.poblacion_especial,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.hogar,
                                  "poblacion_especial",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "hogar.poblacion_especial"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "0" } }, [
                              _vm._v("NO APLICA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "1" } }, [
                              _vm._v("DESPLAZADO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "3" } }, [
                              _vm._v("VICTIMA DEL CONFLICTO ARMADO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "4" } }, [
                              _vm._v("MADRE COMUNITARIA")
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _vm.hogar.poblacion_especial == ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Población Especial Valida")
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "invalid-feedback" }, [
                          _vm.hogar.poblacion_especial == ""
                            ? _c("span", [
                                _vm._v("La población especial es obligatoria")
                              ])
                            : _vm._e()
                        ])
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [
                          _vm._v("¿La comunidad presenta vías de acceso? (*):")
                        ]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "vias_acceso",
                            class:
                              _vm.hogar.vias_acceso == ""
                                ? "is-invalid"
                                : "is-valid",
                            model: {
                              value: _vm.hogar.vias_acceso,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.hogar,
                                  "vias_acceso",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "hogar.vias_acceso"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "0" } }, [
                              _vm._v("No Aplica")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "1" } }, [
                              _vm._v("Pavimentadas")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "2" } }, [
                              _vm._v("Placa huella")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "3" } }, [
                              _vm._v("Sin pavimentar")
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _vm.hogar.vias_acceso != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v("Presenta vias de acceso Valida")
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "invalid-feedback" }, [
                          _vm.hogar.vias_acceso == ""
                            ? _c("span", [
                                _vm._v(
                                  "La comunidad presenta vías de acceso es obligatoria"
                                )
                              ])
                            : _vm._e()
                        ])
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-5" },
                      [
                        _c("label", [
                          _vm._v(
                            "¿Presenta acceso fácil a los servicios públicos? (*):"
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "servicios_publicos",
                            class:
                              _vm.hogar.servicios_publicos == ""
                                ? "is-invalid"
                                : "is-valid",
                            model: {
                              value: _vm.hogar.servicios_publicos,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.hogar,
                                  "servicios_publicos",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "hogar.servicios_publicos"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "1" } }, [
                              _vm._v("Permanente")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "2" } }, [
                              _vm._v("Ocacional")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "3" } }, [
                              _vm._v("Periódico")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "4" } }, [
                              _vm._v("No hay acceso a servicios públicos")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "5" } }, [
                              _vm._v("No")
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _vm.hogar.servicios_publicos != ""
                          ? _c("div", { staticClass: "valid-feedback" }, [
                              _vm._v(
                                "Presenta acceso fácil a los servicios públicos Valido"
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "invalid-feedback" }, [
                          _vm.hogar.servicios_publicos == ""
                            ? _c("span", [
                                _vm._v(
                                  "Presenta acceso fácil a los servicios públicos es obligatorio"
                                )
                              ])
                            : _vm._e()
                        ])
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-12" }, [
                      _c("label", [_vm._v("Dirección (*):")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.hogar.direccion,
                            expression: "hogar.direccion",
                            modifiers: { trim: true }
                          }
                        ],
                        ref: "direccion",
                        staticClass: "form-control text-capitalize",
                        class:
                          _vm.hogar.direccion == "" ? "is-invalid" : "is-valid",
                        attrs: { type: "text", placeholder: "Dirección" },
                        domProps: { value: _vm.hogar.direccion },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.hogar,
                              "direccion",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm.hogar.direccion != ""
                        ? _c("div", { staticClass: "valid-feedback" }, [
                            _vm._v("La Dirección es Valida")
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _c("div", { staticClass: "invalid-feedback" }, [
                        _vm.hogar.direccion == ""
                          ? _c("span", [_vm._v("La dirección es obligatoria")])
                          : _vm._e()
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _vm._m(2)
                ]
              )
            ])
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-portlet__head-label" }, [
      _c("h3", { staticClass: "kt-portlet__head-title" }, [
        _c("span", { staticClass: "kt-widget20__number kt-font-danger" }, [
          _vm._v("CARACTERIZACIÓN")
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [
      _c(
        "span",
        {
          staticClass: "kt-font-boldest",
          staticStyle: { "font-size": "18px" }
        },
        [_vm._v("A.Ficha Del Hogar")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [
      _c(
        "span",
        {
          staticClass: "kt-font-boldest",
          staticStyle: { "font-size": "15px" }
        },
        [_vm._v("Jefe del Hogar")]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Servicios/actividad_servicios.js":
/*!*******************************************************!*\
  !*** ./resources/js/Servicios/actividad_servicios.js ***!
  \*******************************************************/
/*! exports provided: listar, guardar, eliminar */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listar", function() { return listar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardar", function() { return guardar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminar", function() { return eliminar; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/actividad', $data);
}
function guardar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/actividad/guardar', $data);
}
function eliminar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/actividad/eliminar', $data);
}

/***/ }),

/***/ "./resources/js/Servicios/barrios_servicios.js":
/*!*****************************************************!*\
  !*** ./resources/js/Servicios/barrios_servicios.js ***!
  \*****************************************************/
/*! exports provided: listarBarrios, guardarBarrios, eliminarBarrios, comboBarrios */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarBarrios", function() { return listarBarrios; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardarBarrios", function() { return guardarBarrios; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminarBarrios", function() { return eliminarBarrios; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "comboBarrios", function() { return comboBarrios; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarBarrios($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios', $data);
}
function guardarBarrios($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios/guardar', $data);
}
function eliminarBarrios($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios/eliminar', $data);
}
function comboBarrios($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios/combo', $data);
}

/***/ }),

/***/ "./resources/js/Servicios/colegios_servicios.js":
/*!******************************************************!*\
  !*** ./resources/js/Servicios/colegios_servicios.js ***!
  \******************************************************/
/*! exports provided: listar, guardar, eliminar, combo */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listar", function() { return listar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardar", function() { return guardar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminar", function() { return eliminar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "combo", function() { return combo; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/colegios', $data);
}
function guardar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/colegios/guardar', $data);
}
function eliminar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/colegios/eliminar', $data);
}
function combo($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/colegios/combo', $data);
}

/***/ }),

/***/ "./resources/js/Servicios/ocupaciones_servicios.js":
/*!*********************************************************!*\
  !*** ./resources/js/Servicios/ocupaciones_servicios.js ***!
  \*********************************************************/
/*! exports provided: listarOcupaciones, guardarOcupaciones, eliminarOcupaciones */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarOcupaciones", function() { return listarOcupaciones; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardarOcupaciones", function() { return guardarOcupaciones; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminarOcupaciones", function() { return eliminarOcupaciones; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarOcupaciones($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/ocupaciones', $data);
}
function guardarOcupaciones($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/ocupaciones/guardar', $data);
}
function eliminarOcupaciones($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/ocupaciones/eliminar', $data);
}

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/Editar.vue":
/*!********************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/Editar.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Editar_vue_vue_type_template_id_8bf6b44a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Editar.vue?vue&type=template&id=8bf6b44a& */ "./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=template&id=8bf6b44a&");
/* harmony import */ var _Editar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Editar.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Editar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Editar.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Editar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Editar_vue_vue_type_template_id_8bf6b44a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Editar_vue_vue_type_template_id_8bf6b44a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Caracterizacion/Editar.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Editar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Editar.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=template&id=8bf6b44a&":
/*!***************************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=template&id=8bf6b44a& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_template_id_8bf6b44a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Editar.vue?vue&type=template&id=8bf6b44a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Editar.vue?vue&type=template&id=8bf6b44a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_template_id_8bf6b44a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Editar_vue_vue_type_template_id_8bf6b44a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);