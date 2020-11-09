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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    this.hoy = moment();
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

                  if (_this.hogar.id_corre !== "0") {
                    _this.cambiarCombo("corregi");
                  }

                  _this.hogar.id_vereda = "" + respuesta.data.hogar.id_vereda;
                  _this.hogar.id_barrio = "" + respuesta.data.hogar.id_barrio;
                  _this.hogar.id_zona = respuesta.data.hogar.id_zona;
                  _this.hogar.tenencia_vivienda = respuesta.data.hogar.tenencia_vivienda;
                  _this.hogar.numero_hogares = "" + respuesta.data.hogar.numero_hogares;
                  _this.hogar.poblacion_especial = respuesta.data.hogar.poblacion_especial;
                  _this.hogar.vias_acceso = respuesta.data.hogar.vias_acceso;
                  _this.hogar.servicios_publicos = respuesta.data.hogar.servicios_publicos; // GESTION DE LAS VARIABLES DEL HOGAR

                  _this.hogar.direccion = respuesta.data.hogar.direccion;
                  _this.datosJefe = respuesta.data.jefes;
                  _this.datos = respuesta.data.integrantes;
                  _this.factores = respuesta.data.factores;
                  console.log(_this.datosJefe);

                  var _loop = function _loop(i) {
                    var indice = _this.datosJefe.findIndex(function (identi) {
                      return identi.identificacion === _this.datosJefe[i].identificacion;
                    });

                    _this.vectorJefes.push({
                      index: indice,
                      identificacion: _this.datosJefe[i].identificacion
                    });
                  };

                  for (var i = 0; i < _this.datosJefe.length; i++) {
                    _loop(i);
                  }

                  for (var _i = 0; _i < _this.vectorJefes.length; _i++) {
                    console.log("index: " + _this.vectorJefes[_i].index + " -> identificacion: " + _this.vectorJefes[_i].identificacion);
                  } // GESTION DE LAS VARIABLES DEL HOGAR

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
    }(),
    formato: function formato(caja) {
      if (caja == "id1") {
        if (this.caracData.tipo_id == "CC") {
          this.caracData.identificacion = this.caracData.identificacion.replace(/[.*+\-?^${}()|[\]\\]/g, "");
          var val = (this.caracData.identificacion / 1).toFixed(0).replace(".", ",");
          this.caracData.identificacion = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

          if (this.caracData.identificacion == "NaN") {
            this.caracData.identificacion = "";
          }

          if (this.caracData.identificacion == "0") {
            this.caracData.identificacion = "";
          }
        }
      }

      if (caja == "salario") {
        this.caracData.salario = this.caracData.salario.replace(/[.*+\-?^${}()|[\]\\]/g, "");

        var _val = (this.caracData.salario / 1).toFixed(0).replace(".", ",");

        this.caracData.salario = _val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        if (this.caracData.salario == "NaN") {
          this.caracData.salario = "";
        }

        if (this.caracData.salario == "0") {
          this.caracData.salario = "";
        }
      }

      if (caja == "tipoid") {
        this.caracData.identificacion = "";

        if (this.caracData.tipo_id != "CC") {
          if (this.caracData.tipo_id === "ASI" || this.caracData.tipo_id === "MSI") {
            this.caracData.identificacion = this.CODIGOGENE + Math.floor(Math.random() * 100 + 1);
          } else {
            this.caracData.identificacion = this.caracData.identificacion.replace(/[.*+\-?^${}()|[\]\\]/g, "");
          }
        } else {
          if (this.caracData.tipo_id == "CC") {
            this.caracData.identificacion = this.caracData.identificacion.replace(/[.*+\-?^${}()|[\]\\]/g, "");

            var _val2 = (this.caracData.identificacion / 1).toFixed(0).replace(".", ",");

            this.caracData.identificacion = _val2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            if (this.caracData.identificacion == "NaN") {
              this.caracData.identificacion = "";
            }

            if (this.caracData.identificacion == "0") {
              this.caracData.identificacion = "";
            }
          }
        }
      }

      if (caja == "id2") {
        if (this.CA1.tipo_id == "CC") {
          this.CA1.identificacion = this.CA1.identificacion.replace(/[.*+\-?^${}()|[\]\\]/g, "");

          var _val3 = (this.CA1.identificacion / 1).toFixed(0).replace(".", ",");

          this.CA1.identificacion = _val3.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

          if (this.CA1.identificacion == "NaN") {
            this.CA1.identificacion = "";
          }

          if (this.CA1.identificacion == "0") {
            this.CA1.identificacion = "";
          }
        }
      }

      if (caja == "tipoid2") {
        this.CA1.identificacion = "";

        if (this.CA1.tipo_id != "CC") {
          if (this.CA1.tipo_id === "ASI" || this.CA1.tipo_id === "MSI") {
            this.CA1.identificacion = this.CODIGOGENE + Math.floor(Math.random() * 100 + 1);
          } else {
            this.CA1.identificacion = this.CA1.identificacion.replace(/[.*+\-?^${}()|[\]\\]/g, "");
          }
        } else {
          if (this.CA1.tipo_id == "CC") {
            this.CA1.identificacion = this.CA1.identificacion.replace(/[.*+\-?^${}()|[\]\\]/g, "");

            var _val4 = (this.CA1.identificacion / 1).toFixed(0).replace(".", ",");

            this.CA1.identificacion = _val4.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            if (this.CA1.identificacion == "NaN") {
              this.CA1.identificacion = "";
            }

            if (this.CA1.identificacion == "0") {
              this.CA1.identificacion = "";
            }
          }
        }
      }

      if (caja == "telefono1") {
        this.caracData.telefono = this.caracData.telefono.replace(/[^.\d]/g, "").trim();

        if (this.caracData.telefono == "NaN") {
          this.caracData.telefono = "";
        }

        if (this.caracData.telefono == "0") {
          this.caracData.telefono = "";
        }
      }

      if (caja == "telefono2") {
        this.CA1.telefono = this.CA1.telefono.replace(/[^.\d]/g, "").trim();

        if (this.CA1.telefono == "NaN") {
          this.CA1.telefono = "";
        }

        if (this.CA1.telefono == "0") {
          this.CA1.telefono = "";
        }
      }

      if (caja == "puntaje") {}

      if (caja == "puntaje1") {}
    },
    mostrarOtro: function mostrarOtro(tipo) {
      if (tipo === "TE") {
        if (this.viviendaData.tipo_estructura === "5") {
          this.mOTE = true;
        } else {
          this.mOTE = false;
        }

        this.viviendaData.otro_tipo_estructura = "";
      }

      if (tipo === "TC") {
        if (this.viviendaData.tipo_cubierta === "9") {
          this.mOTC = true;
        } else {
          this.mOTC = false;
        }

        this.viviendaData.otro_tipo_cubierta = "";
      }

      if (tipo === "AE") {
        if (this.viviendaData.actividad_economica === "CUAL") {
          this.mOAE = true;
        } else {
          this.mOAE = false;
        }

        this.viviendaData.cual_actividad_economica = "";
      }

      if (tipo === "FA") {
        if (this.viviendaData.fuente_agua === "9") {
          this.mOFA = true;
        } else {
          this.mOFA = false;
        }

        this.viviendaData.cual_fuente = "";
      }

      if (tipo === "DA") {
        if (this.viviendaData.donde_almacena_agua === "5") {
          this.mODA = true;
        } else {
          this.mODA = false;
        }

        this.viviendaData.otro_almacena_agua = "";
      }

      if (tipo === "FB") {
        if (this.viviendaData.destino_final_basura === "5") {
          this.mOFB = true;
        } else {
          this.mOFB = false;
        }

        this.viviendaData.otro_destino_final_basura = "";
      }

      if (tipo === "OC") {
        if (this.viviendaData.otro_cerca === "SI") {
          this.mOOC = true;
        } else {
          this.mOOC = false;
        }

        this.viviendaData.cual_cerca = "";
      }

      if (tipo === "EV") {
        if (this.viviendaData.envases_vacios === "7") {
          this.mOEV = true;
        } else {
          this.mOEV = false;
        }

        this.viviendaData.otro_envases_vacios = "";
      }

      if (tipo === "EP") {
        if (this.viviendaData.elementos_protecion === "5") {
          this.mOEP = true;
        } else {
          this.mOEP = false;
        }

        this.viviendaData.otro_elementos_protecion = "";
      }

      if (tipo === "MC") {
        if (this.viviendaData.metodos_coccion === "6") {
          this.mOMC = true;
        } else {
          this.mOMC = false;
        }

        this.viviendaData.otro_metodos_coccion = "";
      }

      if (tipo === "AA") {
        if (this.viviendaData.lugares_almacenan_alimentos === "6") {
          this.mOAA = true;
        } else {
          this.mOAA = false;
        }

        this.viviendaData.otro_lugares_almacenan_alimentos = "";
      }

      if (tipo === "DH") {
        if (this.viviendaData.excretas === "7") {
          this.mODH = true;
        } else {
          this.mODH = false;
        }

        this.viviendaData.otro_depositan_excretas = "";
      }

      if (tipo === "ES") {
        if (this.viviendaData.tipo_explotacion === "5") {
          this.mOES = true;
        } else {
          this.mOES = false;
        }

        this.viviendaData.otro_tipo_explotacion = "";
      }

      if (tipo === "OG") {
        if (this.viviendaData.otros_genera === "SI") {
          this.mOOG = true;
        } else {
          this.mOOG = false;
        }

        this.viviendaData.cual_genera = "";
      }

      if (tipo === "OEPS1") {
        if (this.caracData.afiliacion_entidad === "OTRA") {
          this.mOEPS1 = true;
        } else {
          this.mOEPS1 = false;
        }

        this.caracData.otra_eps = "";
      }

      if (tipo === "OEPS2") {
        if (this.CA1.afi_entidad === "OTRA") {
          this.mOEPS2 = true;
        } else {
          this.mOEPS2 = false;
        }

        this.CA1.otra_eps = "";
      }

      if (tipo === "mOCOL1") {
        if (this.caracData.nivel_escolaridad === 3 || this.caracData.nivel_escolaridad === 14 || this.caracData.nivel_escolaridad === 15) {
          this.mOCOL1 = true;
        } else {
          this.mOCOL1 = false;
        }

        this.caracData.colegio = "";
        this.caracData.grado = "";
      }

      if (tipo === "mOCOL2") {
        if (this.CA1.escolaridad === 3 || this.CA1.escolaridad === 14 || this.CA1.escolaridad === 15) {
          this.mOCOL2 = true;
        } else {
          this.mOCOL2 = false;
        }

        this.CA1.colegio = "";
        this.CA1.grado = "0";
      }
    },
    // OPCIONES DE LAS OCUPACIONES
    abrirModalOcupaciones: function abrirModalOcupaciones(opcion) {
      this.opcionOcupaciones = opcion;
      this.txtbusqueda = "";
      this.consultarOcupaciones(1);
      this.$refs.modalOcupaciones.show();
    },
    cerrarModal: function cerrarModal() {
      this.$refs.modalOcupaciones.hide();
      this.$refs.modalActividad.hide();
    },
    consultarOcupaciones: function consultarOcupaciones(pagina) {
      var _this3 = this;

      return _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                parametros = {
                  txtbusqueda: _this3.txtbusqueda.trim(),
                  _token: _this3.csrf,
                  page: pagina
                };
                _context3.prev = 1;
                _context3.next = 4;
                return _Servicios_ocupaciones_servicios__WEBPACK_IMPORTED_MODULE_4__["listarOcupaciones"](parametros).then(function (respuesta) {
                  _this3.ocupacionesVector = respuesta.data.ocupaciones.data;
                  _this3.paginacionVector = respuesta.data.paginacion;
                });

              case 4:
                _context3.next = 15;
                break;

              case 6:
                _context3.prev = 6;
                _context3.t0 = _context3["catch"](1);
                _context3.t1 = _context3.t0.response.status;
                _context3.next = _context3.t1 === 422 ? 11 : 13;
                break;

              case 11:
                _this3.$swal("Error...!", "Ocurrio un error!", "error");

                return _context3.abrupt("break", 15);

              case 13:
                _this3.$swal("Error...!", "Ocurrio un error!", "error");

                return _context3.abrupt("break", 15);

              case 15:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, null, [[1, 6]]);
      }))();
    },
    seleccionarOcupaciones: function seleccionarOcupaciones(item) {
      if (this.opcionOcupaciones === "jefe") {
        this.caracData.ocupacion = item.id;
        this.ocupacionAuxiliar = item.descripcion;
      } else {
        this.CA1.ocupacion = item.id;
        this.ocupacionAuxiliar2 = item.descripcion;
      }

      this.$refs.modalOcupaciones.hide();
    },
    // OPCIONES DE LAS OCUPACIONES
    //OPCIONES DEL JEFE DE HOGAR
    agregarJefe: function () {
      var _agregarJefe = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        var _this4 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                if (!(this.checkForm() === true)) {
                  _context4.next = 12;
                  break;
                }

                // VALIDAR SI EL JEFE DE HOGAR SE ENCUENTRA AGREGADO
                this.caracData.identificacion = this.caracData.identificacion.replace(/[.*+\-?^${}()|[\]\\]/g, "");
                parametros = {
                  _token: this.csrf,
                  identificacion: this.caracData.identificacion
                };
                _context4.prev = 3;
                _context4.next = 6;
                return _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_1__["validarJefe"](parametros).then(function (respuesta) {
                  if (respuesta.data.OPC == "EXISTE") {
                    var val = (respuesta.data.identificacion / 1).toFixed(0).replace(".", ",");
                    var iden = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                    _this4.$swal("Validar...!", "El Documento <b>" + iden + "</b> Se Encuentra Registrado", "warning");

                    return false;
                  } else {
                    // VERIFICAR SI ESTA EN LA TABLA
                    var resultado = _this4.datosJefe.filter(function (identi) {
                      return identi.identificacion.includes(_this4.caracData.identificacion);
                    }); // VERIFICAR SI ESTA EN LA TABLA


                    if (resultado.length) {
                      _this4.$swal("Validar...!", "El Documento <b>" + _this4.caracData.identificacion + "</b> Se Encuentra Agregado", "warning");

                      return false;
                    } else {
                      var nacimiento = moment(_this4.caracData.fecha_nacimiento);
                      var hoy = moment();
                      var edad = 0;

                      if (nacimiento < hoy) {
                        edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
                      }

                      if (edad < 14) {
                        _this4.$swal("Validar...!", "El Valor de la edad introducido no es aceptable, debe ser mayor ó igual a 14 años", "warning");

                        return false;
                      }

                      var textoEps = "";

                      if (_this4.caracData.afiliacion_entidad === "OTRA") {
                        textoEps = "OTRA";
                      } else {
                        if (_this4.caracData.afiliacion_entidad === "NINGUNA") {
                          textoEps = "NINGUNA";
                        } else {
                          textoEps = _this4.showText(_this4.caracData.afiliacion_entidad, _this4.admini_options);
                        }
                      }

                      _this4.datosJefe.push({
                        id: 0,
                        id_hogar: 0,
                        telefono: _this4.caracData.telefono,
                        puntaje_sisben: _this4.caracData.puntaje_sisben,
                        afiliacion_entidad: _this4.caracData.afiliacion_entidad,
                        textoEps: textoEps,
                        otra_eps: _this4.caracData.otra_eps,
                        tipo_id: _this4.caracData.tipo_id,
                        identificacion: _this4.caracData.identificacion,
                        sexo: _this4.caracData.sexo,
                        parentesco: _this4.caracData.parentesco,
                        textoParentesco: _this4.showText(_this4.caracData.parentesco, _this4.parentesco_options),
                        pnom: _this4.caracData.pnom,
                        snom: _this4.caracData.snom,
                        pape: _this4.caracData.pape,
                        sape: _this4.caracData.sape,
                        salario: _this4.caracData.salario,
                        estado_civil: _this4.caracData.estado_civil,
                        textoEstado: _this4.showText(_this4.caracData.estado_civil, _this4.estado_options),
                        fecha_nacimiento: _this4.caracData.fecha_nacimiento,
                        tipo_afiliacion: _this4.caracData.tipo_afiliacion,
                        embarazo: _this4.caracData.embarazo,
                        embarazo_multiple: _this4.caracData.embarazo_multiple,
                        discapacidad: _this4.caracData.discapacidad,
                        nivel_escolaridad: _this4.caracData.nivel_escolaridad,
                        ocupacion: _this4.caracData.ocupacion,
                        textoOcupacion: _this4.showText(_this4.caracData.ocupacion, _this4.ocupacion_options),
                        colegio: _this4.caracData.colegio,
                        textoColegio: _this4.showText(_this4.caracData.colegio, _this4.colegio_options),
                        grado: _this4.caracData.grado,
                        entiende: _this4.caracData.entiende,
                        migrante: _this4.caracData.migrante,
                        pyp: _this4.caracData.pyp,
                        etnia: _this4.caracData.etnia,
                        textoEtnia: _this4.showText(_this4.caracData.etnia, _this4.etnia_options),
                        clasificacion: _this4.caracData.clasificacion,
                        edad: _this4.caracData.edad,
                        orientacion: _this4.caracData.orientacion,
                        identidad_genero: _this4.caracData.identidad_genero,
                        perdida_peso: _this4.caracData.perdida_peso,
                        programa_icbf: _this4.caracData.programa_icbf,
                        identi_auxi: ""
                      });

                      if (_this4.caracData.tipo_afiliacion === "CONTRIBUTIVO" || _this4.caracData.tipo_afiliacion === "ESPECIAL") {
                        _this4.SAPU = true;
                        _this4.estratificacionData.afiliacion_salud_privada = "SI";
                      }

                      _this4.ocupacionAuxiliar = "";
                      _this4.mOCOL1 = false;

                      var indice = _this4.datosJefe.findIndex(function (identi) {
                        return identi.identificacion === _this4.caracData.identificacion;
                      });

                      _this4.vectorJefes.push({
                        index: indice,
                        identificacion: _this4.caracData.identificacion
                      });

                      console.log(vectorJefes); // AGREGAR FACTORES
                      // this.AFactores(this.caracData, edad);
                      // AGREGAR FACTORES

                      _this4.caracData.id = "JEFE"; // AGREGAR DE 10 A 59 AÑOS

                      if (edad >= 10 && edad <= 59) {} // this.Ade10a59Anio(this.caracData, edad);
                      // AGREGAR DE 10 A 59 AÑOS
                      // AGREGAR PARTO POSTPARTO
                      // alert(this.CA1.embarazo_multiple);


                      if (_this4.caracData.embarazo === "SI") {} // this.AParPost(this.caracData, edad);
                      // AGREGAR PARTO POSTPARTO
                      // AGREGAR DE 12 A 17 AÑOS


                      if (edad >= 12 && edad <= 17) {} // this.Ade12a17Anio(this.caracData, edad);
                      // AGREGAR DE 12 A 17 AÑOS
                      // AGREGAR DE 18 A 28 AÑOS


                      if (edad >= 18 && edad <= 28) {} // this.Ade18a28Anio(this.caracData, edad);
                      // AGREGAR DE 18 A 28 AÑOS
                      // AGREGAR DE 29 A 59 AÑOS


                      if (edad >= 29 && edad <= 59) {} // this.Ade29a59Anio(this.caracData, edad);
                      // AGREGAR DE 29 A 59 AÑOS
                      // AGREGAR DE 60 ó MAS AÑOS


                      if (edad >= 60) {} // this.Ade60Anio(this.caracData, edad);
                      // AGREGAR DE 60 ó MAS AÑOS
                      // AGREGAR MIGRANTES


                      if (_this4.caracData.migrante === "SI") {} // this.AMigra(this.caracData, edad);
                      // AGREGAR MIGRANTES


                      _this4.limpiar2();
                    }
                  }
                })["catch"](function (error) {
                  _this4.errorDevuelto = error.response.data.errors;
                  _this4.entrarPorError = true;
                });

              case 6:
                _context4.next = 12;
                break;

              case 8:
                _context4.prev = 8;
                _context4.t0 = _context4["catch"](3);
                this.errorDevuelto = _context4.t0.response.data.errors;
                this.entrarPorError = true;

              case 12:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4, this, [[3, 8]]);
      }));

      function agregarJefe() {
        return _agregarJefe.apply(this, arguments);
      }

      return agregarJefe;
    }(),
    checkForm: function checkForm(e) {
      var bande = true;

      if (this.caracData.tipo_id === "") {
        this.$refs.tipo_id.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione un tipo de identificación!", "error");
        return;
      }

      if (this.caracData.identificacion === "") {
        this.$refs.identificacion.focus();
        bande = false;
        this.$swal("Error...!", "Por favor digite una identificación!", "error");
        return;
      }

      if (this.caracData.sexo === "") {
        this.$refs.sexo.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione el sexo!", "error");
        return;
      }

      if (this.caracData.orientacion === "") {
        bande = false;
        this.$swal("Error...!", "Por favor seleccione la orientación sexual!", "error");
        return;
      }

      if (this.caracData.identidad_genero === "") {
        bande = false;
        this.$swal("Error...!", "Por favor seleccione la identidad de genero!", "error");
        return;
      }

      if (this.caracData.parentesco === "") {
        this.$refs.parentesco.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione el parentesco!", "error");
        return;
      }

      if (this.caracData.pnom === "") {
        this.$refs.pnom.focus();
        bande = false;
        this.$swal("Error...!", "Por favor digite el primer nombre!", "error");
        return;
      }

      if (this.caracData.pape === "") {
        this.$refs.pape.focus();
        bande = false;
        this.$swal("Error...!", "Por favor digite el primer apellido!", "error");
        return;
      }

      if (this.caracData.estado_civil === "") {
        this.$refs.estado_civil.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione el estado civil!", "error");
        return;
      }

      if (this.caracData.fecha_nacimiento === "") {
        this.$refs.fecha_nacimiento.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione la fecha de nacimiento!", "error");
        return;
      }

      if (this.caracData.afiliacion_entidad === "") {
        this.$refs.afiliacion_entidad.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione la eps!", "error");
        return;
      }

      if (this.caracData.ocupacion === "") {
        this.$refs.ocupacion.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione la ocupación!", "error");
        return;
      }

      if (this.caracData.etnia === "") {
        this.$refs.etnia.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione la etnia!", "error");
        return;
      }

      if (this.caracData.clasificacion === "") {
        this.$refs.clasificacion.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione la clasificacion de la etnia!", "error");
        return;
      }

      if (this.caracData.salario === "") {
        this.$refs.salario.focus();
        bande = false;
        this.$swal("Error...!", "Por favor digite el salario!", "error");
        return;
      }

      if (this.caracData.perdida_peso === "") {
        this.$refs.perdida_peso.focus();
        bande = false;
        this.$swal("Error...!", "Por favor seleccione la perdida de peso en los ultimos 3 meses!", "error");
        return;
      }

      if (this.caracData.programa_icbf === "") {
        bande = false;
        this.$swal("Error...!", "Por favor seleccione si Pertenece a algún programa del ICBF!", "error");
        return;
      }

      return bande;
      e.preventDefault();
    },
    showText: function showText(val, vectorAux) {
      for (var i = 0; i < vectorAux.length; i++) {
        if (vectorAux[i].value === val) {
          return vectorAux[i].texto;
        }
      }

      return "";
    },
    eliminarItemJefe: function eliminarItemJefe(index, item) {
      this.datosJefe.splice(index, 1);
      this.vectorJefes.splice(index, 1);
      var identificacion = item.identificacion;
      this.factores = this.factores.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.Men1A = this.Men1A.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.De1A5 = this.De1A5.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.De6A11 = this.De6A11.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.De10A59 = this.De10A59.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.ParPost = this.ParPost.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.De12A17 = this.De12A17.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.De18A28 = this.De18A28.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.De29A59 = this.De29A59.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.De60 = this.De60.filter(function (men) {
        return men.identificacion != identificacion;
      });
      this.Migra = this.Migra.filter(function (men) {
        return men.identificacion != identificacion;
      });
    },
    limpiar2: function limpiar2() {
      this.caracData.tipo_id = "";
      this.caracData.identificacion = "";
      this.caracData.sexo = "";
      this.caracData.parentesco = "";
      this.caracData.pnom = "";
      this.caracData.snom = "";
      this.caracData.pape = "";
      this.caracData.sape = "";
      this.caracData.estado_civil = "";
      this.caracData.fecha_nacimiento = "";
      this.caracData.salario = "";
      this.caracData.telefono = "";
      this.caracData.edad = 0;
      this.caracData.afiliacion_entidad = "";
      this.caracData.otra_eps = "";
      this.caracData.tipo_afiliacion = "";
      this.caracData.embarazo = "";
      this.caracData.embarazo_multiple = "";
      this.caracData.discapacidad = "";
      this.caracData.nivel_escolaridad = "";
      this.caracData.ocupacion = "";
      this.caracData.colegio = "";
      this.caracData.grado = "";
      this.caracData.entiende = "";
      this.caracData.migrante = "";
      this.caracData.pyp = "";
      this.caracData.etnia = "";
      this.caracData.clasificacion = "";
      this.caracData.puntaje_sisben = "";
      this.caracData.orientacion = "";
      this.caracData.identidad_genero = "";
      this.caracData.perdida_peso = "";
      this.caracData.programa_icbf = "";
    },
    updateJefe: function updateJefe(item, valor, opcion, index) {
      if (opcion === "tipo_id") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var id = this.vectorJefes[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var indice = this.factores.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.factores[indice].tipo_id = valor;
          this.factores.splice(indice, 1, this.factores[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De10A59[indice].tipo_id = valor;
          this.De10A59.splice(indice, 1, this.De10A59[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.ParPost[indice].tipo_id = valor;
          this.ParPost.splice(indice, 1, this.ParPost[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De12A17[indice].tipo_id = valor;
          this.De12A17.splice(indice, 1, this.De12A17[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De18A28[indice].tipo_id = valor;
          this.De18A28.splice(indice, 1, this.De18A28[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De29A59[indice].tipo_id = valor;
          this.De29A59.splice(indice, 1, this.De29A59[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De60.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De60[indice].tipo_id = valor;
          this.De60.splice(indice, 1, this.De60[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.Migra.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.Migra[indice].tipo_id = valor;
          this.Migra.splice(indice, 1, this.Migra[indice]);
        }
      }

      if (opcion === "sexo") {
        if (item.sexo === "") {
          item.embarazo = "";
          item.embarazo_multiple = "";
        }

        if (item.sexo === "MASCULINO") {
          item.embarazo = "NOAPLICA";
          item.embarazo_multiple = "NOAPLICA";
        }

        if (item.sexo === "FEMENINO") {
          item.embarazo = "";
          item.embarazo_multiple = "";
        } //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
        //VIENE DE LA TABLA


        var _id = this.vectorJefes[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice = this.factores.findIndex(function (identi) {
          return identi.identificacion === _id;
        });

        if (_indice >= 0) {
          this.factores[_indice].sexo = valor;
          this.factores.splice(_indice, 1, this.factores[_indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id;
        });

        if (_indice >= 0) {
          this.De10A59[_indice].sexo = valor;
          this.De10A59.splice(_indice, 1, this.De10A59[_indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id;
        });

        if (_indice >= 0) {
          this.ParPost[_indice].sexo = valor;
          this.ParPost.splice(_indice, 1, this.ParPost[_indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id;
        });

        if (_indice >= 0) {
          this.De12A17[_indice].sexo = valor;
          this.De12A17.splice(_indice, 1, this.De12A17[_indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id;
        });

        if (_indice >= 0) {
          this.De18A28[_indice].sexo = valor;
          this.De18A28.splice(_indice, 1, this.De18A28[_indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id;
        });

        if (_indice >= 0) {
          this.De29A59[_indice].sexo = valor;
          this.De29A59.splice(_indice, 1, this.De29A59[_indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id;
        });

        if (_indice >= 0) {
          this.De60[_indice].sexo = valor;
          this.De60.splice(_indice, 1, this.De60[_indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id;
        });

        if (_indice >= 0) {
          this.Migra[_indice].sexo = valor;
          this.Migra.splice(_indice, 1, this.Migra[_indice]);
        }
      }

      if (opcion === "embarazo") {
        if (item.embarazo === "") {
          item.embarazo_multiple = "";
        }

        if (item.embarazo === "SI") {
          item.embarazo_multiple = "";
        }

        if (item.embarazo === "NO") {
          item.embarazo_multiple = "NO";
        }
      }

      if (opcion === "afiliacion_entidad") {
        if (item.afiliacion_entidad === "NINGUNA") {
          item.tipo_afiliacion = "0";
        } else {
          if (item.afiliacion_entidad === "OTRA") {
            item.otra_eps = "";
          } else {
            item.tipo_afiliacion = "";
          }
        }
      }

      if (opcion === "nivel_escolaridad") {
        item.colegio = "";
        item.grado = "";
      }
    },
    changeupdateJefe: function changeupdateJefe(item, event, opcion, index) {
      if (opcion == "identificacion") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var id = this.vectorJefes[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var indice = this.factores.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.factores[indice].identificacion = item.identificacion;
          this.factores.splice(indice, 1, this.factores[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[indice].identificacion = item.identificacion;
          this.De10A59.splice(indice, 1, this.De10A59[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[indice].identificacion = item.identificacion;
          this.ParPost.splice(indice, 1, this.ParPost[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[indice].identificacion = item.identificacion;
          this.De12A17.splice(indice, 1, this.De12A17[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[indice].identificacion = item.identificacion;
          this.De18A28.splice(indice, 1, this.De18A28[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[indice].identificacion = item.identificacion;
          this.De29A59.splice(indice, 1, this.De29A59[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De60.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[indice].identificacion = item.identificacion;
          this.De60.splice(indice, 1, this.De60[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.Migra.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[indice].identificacion = item.identificacion;
          this.Migra.splice(indice, 1, this.Migra[indice]);
        } //CAMBIAR LA IDENTIFICACION DEL VECTOR JEFE POR LA NUEVA IDENTIFICACION
        //DIGITADA EN LA TABLA


        this.vectorJefes[index].identificacion = item.identificacion; // Vue.set(this.vectorJefes, 1, this.vectorJefes[index]);

        this.vectorJefes.splice(index, 1, this.vectorJefes[index]);
      }

      if (opcion == "pnom") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var _id2 = this.vectorJefes[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice2 = this.factores.findIndex(function (identi) {
          return identi.identificacion === _id2;
        });

        if (_indice2 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.factores[_indice2].pnom = item.pnom;
          this.factores.splice(_indice2, 1, this.factores[_indice2]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice2 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id2;
        });

        if (_indice2 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[_indice2].pnom = item.pnom;
          this.De10A59.splice(_indice2, 1, this.De10A59[_indice2]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice2 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id2;
        });

        if (_indice2 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[_indice2].pnom = item.pnom;
          this.ParPost.splice(_indice2, 1, this.ParPost[_indice2]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice2 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id2;
        });

        if (_indice2 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[_indice2].pnom = item.pnom;
          this.De12A17.splice(_indice2, 1, this.De12A17[_indice2]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice2 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id2;
        });

        if (_indice2 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[_indice2].pnom = item.pnom;
          this.De18A28.splice(_indice2, 1, this.De18A28[_indice2]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice2 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id2;
        });

        if (_indice2 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[_indice2].pnom = item.pnom;
          this.De29A59.splice(_indice2, 1, this.De29A59[_indice2]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice2 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id2;
        });

        if (_indice2 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[_indice2].pnom = item.pnom;
          this.De60.splice(_indice2, 1, this.De60[_indice2]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice2 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id2;
        });

        if (_indice2 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[_indice2].pnom = item.pnom;
          this.Migra.splice(_indice2, 1, this.Migra[_indice2]);
        }
      }

      if (opcion == "snom") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var _id3 = this.vectorJefes[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice3 = this.factores.findIndex(function (identi) {
          return identi.identificacion === _id3;
        });

        if (_indice3 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.factores[_indice3].snom = item.snom;
          this.factores.splice(_indice3, 1, this.factores[_indice3]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice3 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id3;
        });

        if (_indice3 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[_indice3].snom = item.snom;
          this.De10A59.splice(_indice3, 1, this.De10A59[_indice3]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice3 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id3;
        });

        if (_indice3 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[_indice3].snom = item.snom;
          this.ParPost.splice(_indice3, 1, this.ParPost[_indice3]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice3 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id3;
        });

        if (_indice3 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[_indice3].snom = item.snom;
          this.De12A17.splice(_indice3, 1, this.De12A17[_indice3]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice3 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id3;
        });

        if (_indice3 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[_indice3].snom = item.snom;
          this.De18A28.splice(_indice3, 1, this.De18A28[_indice3]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice3 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id3;
        });

        if (_indice3 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[_indice3].snom = item.snom;
          this.De29A59.splice(_indice3, 1, this.De29A59[_indice3]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice3 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id3;
        });

        if (_indice3 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[_indice3].snom = item.snom;
          this.De60.splice(_indice3, 1, this.De60[_indice3]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice3 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id3;
        });

        if (_indice3 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[_indice3].snom = item.snom;
          this.Migra.splice(_indice3, 1, this.Migra[_indice3]);
        }
      }

      if (opcion == "pape") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var _id4 = this.vectorJefes[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice4 = this.factores.findIndex(function (identi) {
          return identi.identificacion === _id4;
        });

        if (_indice4 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.factores[_indice4].pape = item.pape;
          this.factores.splice(_indice4, 1, this.factores[_indice4]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice4 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id4;
        });

        if (_indice4 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[_indice4].pape = item.pape;
          this.De10A59.splice(_indice4, 1, this.De10A59[_indice4]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice4 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id4;
        });

        if (_indice4 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[_indice4].pape = item.pape;
          this.ParPost.splice(_indice4, 1, this.ParPost[_indice4]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice4 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id4;
        });

        if (_indice4 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[_indice4].pape = item.pape;
          this.De12A17.splice(_indice4, 1, this.De12A17[_indice4]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice4 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id4;
        });

        if (_indice4 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[_indice4].pape = item.pape;
          this.De18A28.splice(_indice4, 1, this.De18A28[_indice4]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice4 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id4;
        });

        if (_indice4 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[_indice4].pape = item.pape;
          this.De29A59.splice(_indice4, 1, this.De29A59[_indice4]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice4 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id4;
        });

        if (_indice4 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[_indice4].pape = item.pape;
          this.De60.splice(_indice4, 1, this.De60[_indice4]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice4 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id4;
        });

        if (_indice4 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[_indice4].pape = item.pape;
          this.Migra.splice(_indice4, 1, this.Migra[_indice4]);
        }
      }

      if (opcion == "sape") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var _id5 = this.vectorJefes[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice5 = this.factores.findIndex(function (identi) {
          return identi.identificacion === _id5;
        });

        if (_indice5 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.factores[_indice5].sape = item.sape;
          this.factores.splice(_indice5, 1, this.factores[_indice5]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice5 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id5;
        });

        if (_indice5 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[_indice5].sape = item.sape;
          this.De10A59.splice(_indice5, 1, this.De10A59[_indice5]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice5 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id5;
        });

        if (_indice5 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[_indice5].sape = item.sape;
          this.ParPost.splice(_indice5, 1, this.ParPost[_indice5]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice5 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id5;
        });

        if (_indice5 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[_indice5].sape = item.sape;
          this.De12A17.splice(_indice5, 1, this.De12A17[_indice5]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice5 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id5;
        });

        if (_indice5 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[_indice5].sape = item.sape;
          this.De18A28.splice(_indice5, 1, this.De18A28[_indice5]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice5 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id5;
        });

        if (_indice5 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[_indice5].sape = item.sape;
          this.De29A59.splice(_indice5, 1, this.De29A59[_indice5]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice5 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id5;
        });

        if (_indice5 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[_indice5].sape = item.sape;
          this.De60.splice(_indice5, 1, this.De60[_indice5]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice5 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id5;
        });

        if (_indice5 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[_indice5].sape = item.sape;
          this.Migra.splice(_indice5, 1, this.Migra[_indice5]);
        }
      }

      if (opcion == "salario") {
        item.salario = event.target.value.replace(/[.*+\-?^${}()|[\]\\]/g, "");
        var val = (item.salario / 1).toFixed(0).replace(".", ",");
        item.salario = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        if (item.salario == "NaN") {
          item.salario = "";
        }

        if (item.salario == "0") {
          item.salario = "";
        }
      }
    },
    //OPCIONES DEL JEFE DE HOGAR
    //OPCIONES DE LOS INTEGRANTES
    calculaEdad: function calculaEdad() {
      var a = moment();
      var b = moment(this.CA1.fecha_nac);
      var years = a.diff(b, "year");
      b.add(years, "years");
      var months = a.diff(b, "months");
      b.add(months, "months");
      var days = a.diff(b, "days");

      if (years == 0) {
        if (months <= 1) {
          if (days <= 1) {
            this.CA1.meses = months + " MES";
            this.CA1.dias = days + " DIA";
          } else {
            this.CA1.meses = months + " MES";
            this.CA1.dias = days + " DIAS";
          }
        } else {
          if (days <= 1) {
            this.CA1.meses = months + " MESES";
            this.CA1.dias = days + " DIA";
          } else {
            this.CA1.meses = months + " MESES";
            this.CA1.dias = days + " DIAS";
          }
        }
      }
    },
    updateIntegrante: function updateIntegrante(item, valor, opcion, index) {
      if (opcion === "tipo_id") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var id = this.vectorIntegrante[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var indice = this.Men1A.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.Men1A[indice].tipo_id = valor;
          this.Men1A.splice(indice, 1, this.Men1A[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De1A5.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De1A5[indice].tipo_id = valor;
          this.De1A5.splice(indice, 1, this.De1A5[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De6A11.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De6A11[indice].tipo_id = valor;
          this.De6A11.splice(indice, 1, this.De6A11[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De10A59[indice].tipo_id = valor;
          this.De10A59.splice(indice, 1, this.De10A59[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.ParPost[indice].tipo_id = valor;
          this.ParPost.splice(indice, 1, this.ParPost[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De12A17[indice].tipo_id = valor;
          this.De12A17.splice(indice, 1, this.De12A17[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De18A28[indice].tipo_id = valor;
          this.De18A28.splice(indice, 1, this.De18A28[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De29A59[indice].tipo_id = valor;
          this.De29A59.splice(indice, 1, this.De29A59[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De60.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De60[indice].tipo_id = valor;
          this.De60.splice(indice, 1, this.De60[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.Migra.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.Migra[indice].tipo_id = valor;
          this.Migra.splice(indice, 1, this.Migra[indice]);
        }
      }

      if (opcion === "sexo") {
        if (item.sexo === "0") {
          item.embarazo = "0";
          item.embarazo_multiple = "0";
        }

        if (item.sexo === "MASCULINO") {
          item.embarazo = "NOAPLICA";
          item.embarazo_multiple = "NOAPLICA";
        }

        if (item.sexo === "FEMENINO") {
          item.embarazo = "0";
          item.embarazo_multiple = "0";
        } //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
        //VIENE DE LA TABLA


        var _id6 = this.vectorIntegrante[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice6 = this.Men1A.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.Men1A[_indice6].sexo = valor;
          this.Men1A.splice(_indice6, 1, this.Men1A[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.De1A5.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.De1A5[_indice6].sexo = valor;
          this.De1A5.splice(_indice6, 1, this.De1A5[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.De6A11.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.De6A11[_indice6].sexo = valor;
          this.De6A11.splice(_indice6, 1, this.De6A11[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.De10A59[_indice6].sexo = valor;
          this.De10A59.splice(_indice6, 1, this.De10A59[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.ParPost[_indice6].sexo = valor;
          this.ParPost.splice(_indice6, 1, this.ParPost[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.De12A17[_indice6].sexo = valor;
          this.De12A17.splice(_indice6, 1, this.De12A17[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.De18A28[_indice6].sexo = valor;
          this.De18A28.splice(_indice6, 1, this.De18A28[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.De29A59[_indice6].sexo = valor;
          this.De29A59.splice(_indice6, 1, this.De29A59[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.De60[_indice6].sexo = valor;
          this.De60.splice(_indice6, 1, this.De60[_indice6]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice6 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id6;
        });

        if (_indice6 >= 0) {
          this.Migra[_indice6].sexo = valor;
          this.Migra.splice(_indice6, 1, this.Migra[_indice6]);
        }
      }

      if (opcion === "embarazo") {
        if (item.embarazo === "0") {
          item.embarazo_multiple = "0";
        }

        if (item.embarazo === "SI") {
          item.embarazo_multiple = "0";
        }

        if (item.embarazo === "NO") {
          item.embarazo_multiple = "NO";
        }
      }

      if (opcion === "afi_entidad") {
        if (item.afi_entidad === "NINGUNA") {
          item.tipo_afiliacion = "0";
        } else {
          if (item.afi_entidad === "OTRA") {
            item.otra_eps = "";
          } else {
            item.tipo_afiliacion = "0";
          }
        }
      }

      if (opcion === "escolaridad") {
        item.colegio = "";
        item.grado = "0";
      }
    },
    changeupdateIntegrante: function changeupdateIntegrante(item, event, opcion, index) {
      if (opcion == "identificacion") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var id = this.vectorIntegrante[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var indice = this.Men1A.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.Men1A[indice].identificacion = item.identificacion;
          this.Men1A.splice(indice, 1, this.Men1A[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De1A5.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De1A5[indice].identificacion = item.identificacion;
          this.De1A5.splice(indice, 1, this.De1A5[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De6A11.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          this.De6A11[indice].identificacion = item.identificacion;
          this.De6A11.splice(indice, 1, this.De6A11[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[indice].identificacion = item.identificacion;
          this.De10A59.splice(indice, 1, this.De10A59[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[indice].identificacion = item.identificacion;
          this.ParPost.splice(indice, 1, this.ParPost[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[indice].identificacion = item.identificacion;
          this.De12A17.splice(indice, 1, this.De12A17[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[indice].identificacion = item.identificacion;
          this.De18A28.splice(indice, 1, this.De18A28[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[indice].identificacion = item.identificacion;
          this.De29A59.splice(indice, 1, this.De29A59[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.De60.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[indice].identificacion = item.identificacion;
          this.De60.splice(indice, 1, this.De60[indice]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        indice = this.Migra.findIndex(function (identi) {
          return identi.identificacion === id;
        });

        if (indice >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[indice].identificacion = item.identificacion;
          this.Migra.splice(indice, 1, this.Migra[indice]);
        } //CAMBIAR LA IDENTIFICACION DEL VECTOR JEFE POR LA NUEVA IDENTIFICACION
        //DIGITADA EN LA TABLA


        this.vectorIntegrante[index].identificacion = item.identificacion; // Vue.set(this.vectorJefes, 1, this.vectorJefes[index]);

        this.vectorIntegrante.splice(index, 1, this.vectorIntegrante[index]);
      }

      if (opcion == "pnom") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var _id7 = this.vectorIntegrante[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice7 = this.Men1A.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          this.Men1A[_indice7].pnom = item.pnom;
          this.Men1A.splice(_indice7, 1, this.Men1A[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.De1A5.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          this.De1A5[_indice7].pnom = item.pnom;
          this.De1A5.splice(_indice7, 1, this.De1A5[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.De6A11.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          this.De6A11[_indice7].pnom = item.pnom;
          this.De6A11.splice(_indice7, 1, this.De6A11[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[_indice7].pnom = item.pnom;
          this.De10A59.splice(_indice7, 1, this.De10A59[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[_indice7].pnom = item.pnom;
          this.ParPost.splice(_indice7, 1, this.ParPost[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[_indice7].pnom = item.pnom;
          this.De12A17.splice(_indice7, 1, this.De12A17[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[_indice7].pnom = item.pnom;
          this.De18A28.splice(_indice7, 1, this.De18A28[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[_indice7].pnom = item.pnom;
          this.De29A59.splice(_indice7, 1, this.De29A59[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[_indice7].pnom = item.pnom;
          this.De60.splice(_indice7, 1, this.De60[_indice7]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice7 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id7;
        });

        if (_indice7 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[_indice7].pnom = item.pnom;
          this.Migra.splice(_indice7, 1, this.Migra[_indice7]);
        }
      }

      if (opcion == "snom") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var _id8 = this.vectorIntegrante[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice8 = this.Men1A.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          this.Men1A[_indice8].snom = item.snom;
          this.Men1A.splice(_indice8, 1, this.Men1A[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.De1A5.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          this.De1A5[_indice8].snom = item.snom;
          this.De1A5.splice(_indice8, 1, this.De1A5[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.De6A11.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          this.De6A11[_indice8].snom = item.snom;
          this.De6A11.splice(_indice8, 1, this.De6A11[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[_indice8].snom = item.snom;
          this.De10A59.splice(_indice8, 1, this.De10A59[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[_indice8].snom = item.snom;
          this.ParPost.splice(_indice8, 1, this.ParPost[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[_indice8].snom = item.snom;
          this.De12A17.splice(_indice8, 1, this.De12A17[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[_indice8].snom = item.snom;
          this.De18A28.splice(_indice8, 1, this.De18A28[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[_indice8].snom = item.snom;
          this.De29A59.splice(_indice8, 1, this.De29A59[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[_indice8].snom = item.snom;
          this.De60.splice(_indice8, 1, this.De60[_indice8]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice8 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id8;
        });

        if (_indice8 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[_indice8].snom = item.snom;
          this.Migra.splice(_indice8, 1, this.Migra[_indice8]);
        }
      }

      if (opcion == "pape") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var _id9 = this.vectorIntegrante[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice9 = this.Men1A.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          this.Men1A[_indice9].pape = item.pape;
          this.Men1A.splice(_indice9, 1, this.Men1A[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.De1A5.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          this.De1A5[_indice9].pape = item.pape;
          this.De1A5.splice(_indice9, 1, this.De1A5[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.De6A11.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          this.De6A11[_indice9].pape = item.pape;
          this.De6A11.splice(_indice9, 1, this.De6A11[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[_indice9].pape = item.pape;
          this.De10A59.splice(_indice9, 1, this.De10A59[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[_indice9].pape = item.pape;
          this.ParPost.splice(_indice9, 1, this.ParPost[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[_indice9].pape = item.pape;
          this.De12A17.splice(_indice9, 1, this.De12A17[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[_indice9].pape = item.pape;
          this.De18A28.splice(_indice9, 1, this.De18A28[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[_indice9].pape = item.pape;
          this.De29A59.splice(_indice9, 1, this.De29A59[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[_indice9].pape = item.pape;
          this.De60.splice(_indice9, 1, this.De60[_indice9]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice9 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id9;
        });

        if (_indice9 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[_indice9].pape = item.pape;
          this.Migra.splice(_indice9, 1, this.Migra[_indice9]);
        }
      }

      if (opcion == "sape") {
        //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
        //VIENE DE LA TABLA
        var _id10 = this.vectorIntegrante[index].identificacion; //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY

        var _indice10 = this.Men1A.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          this.Men1A[_indice10].sape = item.sape;
          this.Men1A.splice(_indice10, 1, this.Men1A[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.De1A5.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          this.De1A5[_indice10].sape = item.sape;
          this.De1A5.splice(_indice10, 1, this.De1A5[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.De6A11.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          this.De6A11[_indice10].sape = item.sape;
          this.De6A11.splice(_indice10, 1, this.De6A11[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.De10A59.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De10A59[_indice10].sape = item.sape;
          this.De10A59.splice(_indice10, 1, this.De10A59[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.ParPost.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.ParPost[_indice10].sape = item.sape;
          this.ParPost.splice(_indice10, 1, this.ParPost[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.De12A17.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De12A17[_indice10].sape = item.sape;
          this.De12A17.splice(_indice10, 1, this.De12A17[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.De18A28.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De18A28[_indice10].sape = item.sape;
          this.De18A28.splice(_indice10, 1, this.De18A28[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.De29A59.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De29A59[_indice10].sape = item.sape;
          this.De29A59.splice(_indice10, 1, this.De29A59[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.De60.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.De60[_indice10].sape = item.sape;
          this.De60.splice(_indice10, 1, this.De60[_indice10]);
        } //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY


        _indice10 = this.Migra.findIndex(function (identi) {
          return identi.identificacion === _id10;
        });

        if (_indice10 >= 0) {
          //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
          this.Migra[_indice10].sape = item.sape;
          this.Migra.splice(_indice10, 1, this.Migra[_indice10]);
        }
      }
    },
    //OPCIONES DE LOS INTEGRANTES
    //OPCIONES DE LOS CICLOS DE VIDA
    Ade10a59Anio: function Ade10a59Anio(vector, edad) {
      var opcion = "";

      if (vector.id === "JEFE") {
        opcion = "JEFE";
      } else {
        opcion = "INTE";
      }

      if (vector.sexo === "MASCULINO") {
        this.De10A59.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          primera_mes: "NA",
          flujo_vaginal: "NA",
          flujo_uretral: "",
          relaciones_sexuales: "",
          compa_sexuales: "",
          usa_condon: "",
          abortos_seis: "NA",
          embarazo_adolecentes: "NA",
          metodo: "",
          tiempo_metodo: "",
          controles: "",
          motivo: "",
          citologia: "NA",
          colposcopia: "NA",
          examen_seno: "NA",
          violencia: "",
          tdit: "NA",
          tripleviral: "NA",
          nacidos_vivos: "NA",
          abortos: "NA",
          examen_prostata: "",
          biposia_prostata: "",
          opci: opcion
        });
      } else {
        this.De10A59.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          primera_mes: "",
          flujo_vaginal: "",
          flujo_uretral: "",
          relaciones_sexuales: "",
          compa_sexuales: "",
          usa_condon: "",
          abortos_seis: "",
          embarazo_adolecentes: "",
          metodo: "",
          tiempo_metodo: "",
          controles: "",
          motivo: "",
          citologia: "",
          colposcopia: "",
          examen_seno: "",
          violencia: "",
          tdit: "",
          tripleviral: "",
          nacidos_vivos: "",
          abortos: "",
          examen_prostata: "NA",
          biposia_prostata: "NA",
          opci: opcion
        });
      }
    },
    changeupdateDe10A59: function changeupdateDe10A59(item, event, opcion) {},
    updateDe10A59: function updateDe10A59(item, valor, opcion) {
      if (opcion === "flujo_vaginal") {
        item.flujo_vaginal = valor;
      }

      if (opcion === "flujo_uretral") {
        item.flujo_uretral = valor;
      }

      if (opcion === "relaciones_sexuales") {
        item.relaciones_sexuales = valor;
      }

      if (opcion === "usa_condon") {
        item.usa_condon = valor;
      }

      if (opcion === "abortos_seis") {
        item.abortos_seis = valor;
      }

      if (opcion === "embarazo_adolecentes") {
        item.embarazo_adolecentes = valor;
      }

      if (opcion === "metodo") {
        item.metodo = valor;
      }

      if (opcion === "motivo") {
        item.motivo = valor;
      }

      if (opcion === "controles") {
        item.controles = valor;
      }

      if (opcion === "citologia") {
        item.citologia = valor;
      }

      if (opcion === "colposcopia") {
        item.colposcopia = valor;
      }

      if (opcion === "examen_seno") {
        item.examen_seno = valor;
      }

      if (opcion === "violencia") {
        item.violencia = valor;
      }

      if (opcion === "tdit") {
        item.tdit = valor;
      }

      if (opcion === "tripleviral") {
        item.tripleviral = valor;
      }

      if (opcion === "abortos") {
        item.abortos = valor;
      }

      if (opcion === "examen_prostata") {
        item.examen_prostata = valor;
      }

      if (opcion === "biposia_prostata") {
        item.biposia_prostata = valor;
      }

      if (opcion === "tiempo_metodo") {
        item.tiempo_metodo = valor;
      }

      if (opcion === "primera_mes") {
        if (item.sexo === "MASCULINO") {
          item.primera_mes = "NA";
        } else {
          item.primera_mes = valor;
        }
      }

      if (opcion === "compa_sexuales") {
        if (item.sexo === "MASCULINO") {
          item.compa_sexuales = "NA";
        } else {
          item.compa_sexuales = valor;
        }
      }

      if (opcion === "nacidos_vivos") {
        if (item.sexo === "MASCULINO") {
          item.nacidos_vivos = "NA";
        } else {
          item.nacidos_vivos = valor;
        }
      }
    } //OPCIONES DE LOS CICLOS DE VIDA

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
                  _vm._m(2),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Tipo de Documento (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "tipo_id",
                            class:
                              _vm.caracData.tipo_id == "" ? "" : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.formato("tipoid")
                              }
                            },
                            model: {
                              value: _vm.caracData.tipo_id,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.caracData,
                                  "tipo_id",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "caracData.tipo_id"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "CC" } }, [
                              _vm._v("CEDULA DE CIUDADANIA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "PA" } }, [
                              _vm._v("PASAPORTE")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "RC" } }, [
                              _vm._v("REGISTRO CIVIL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "TI" } }, [
                              _vm._v("TARJETA DE IDENTIDAD")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "ASI" } }, [
                              _vm._v("ADULTO SIN IDENTIFICACIÓN")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "MSI" } }, [
                              _vm._v("MENOR SIN IDENTIFICACIÓN")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "CE" } }, [
                              _vm._v("CEDULA DE EXTRANJERIA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("label", [_vm._v("Documento (*):")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.caracData.identificacion,
                            expression: "caracData.identificacion",
                            modifiers: { trim: true }
                          }
                        ],
                        ref: "identificacion",
                        staticClass: "form-control text-capitalize",
                        class:
                          _vm.caracData.identificacion == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Documento" },
                        domProps: { value: _vm.caracData.identificacion },
                        on: {
                          change: function($event) {
                            return _vm.formato("id1")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "identificacion",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Parentesco (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "parentesco",
                            class:
                              _vm.caracData.parentesco == "" ? "" : "is-valid",
                            model: {
                              value: _vm.caracData.parentesco,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.caracData,
                                  "parentesco",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "caracData.parentesco"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.parentesco_options, function(item) {
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
                        )
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
                        _c("label", [_vm._v("Sexo (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "sexo",
                            class: _vm.caracData.sexo == "" ? "" : "is-valid",
                            model: {
                              value: _vm.caracData.sexo,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.caracData,
                                  "sexo",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "caracData.sexo"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "MASCULINO" } }, [
                              _vm._v("MASCULINO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "FEMENINO" } }, [
                              _vm._v("FEMENINO")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Orientación Sexual (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "sexo",
                            class:
                              _vm.caracData.orientacion == "" ? "" : "is-valid",
                            model: {
                              value: _vm.caracData.orientacion,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.caracData,
                                  "orientacion",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "caracData.orientacion"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "HETEROSEXUAL" } }, [
                              _vm._v("HETEROSEXUAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "HOMOSEXUAL" } }, [
                              _vm._v("HOMOSEXUAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "BISEXUAL" } }, [
                              _vm._v("BISEXUAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NODECLARA" } }, [
                              _vm._v("NO DECLARA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Identidad de Genero (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.identidad_genero == ""
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.caracData.identidad_genero,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.caracData,
                                  "identidad_genero",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "caracData.identidad_genero"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "HETEROSEXUAL" } }, [
                              _vm._v("CISGENERO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "HOMOSEXUAL" } }, [
                              _vm._v("TRANSGENERO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "BISEXUAL" } }, [
                              _vm._v("TRANSEXUAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NODECLARA" } }, [
                              _vm._v("TERCER GENERO Ó NO BINARIOS")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Primer Nombre (*):")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.caracData.pnom,
                            expression: "caracData.pnom",
                            modifiers: { trim: true }
                          }
                        ],
                        ref: "pnom",
                        staticClass: "form-control text-capitalize",
                        class: _vm.caracData.pnom == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Primer Nombre" },
                        domProps: { value: _vm.caracData.pnom },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "pnom",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Segundo Nombre:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.caracData.snom,
                            expression: "caracData.snom",
                            modifiers: { trim: true }
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.caracData.snom == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Segundo Nombre" },
                        domProps: { value: _vm.caracData.snom },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "snom",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Primer Apellido (*):")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.caracData.pape,
                            expression: "caracData.pape",
                            modifiers: { trim: true }
                          }
                        ],
                        ref: "pape",
                        staticClass: "form-control text-capitalize",
                        class: _vm.caracData.pape == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Primer Apellido" },
                        domProps: { value: _vm.caracData.pape },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "pape",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Segundo Apellido:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.caracData.sape,
                            expression: "caracData.sape",
                            modifiers: { trim: true }
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.caracData.sape == "" ? "" : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Segundo Apellido"
                        },
                        domProps: { value: _vm.caracData.sape },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "sape",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Telefono:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.caracData.telefono,
                            expression: "caracData.telefono",
                            modifiers: { trim: true }
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.caracData.telefono == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Telefono" },
                        domProps: { value: _vm.caracData.telefono },
                        on: {
                          change: function($event) {
                            return _vm.formato("telefono1")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "telefono",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Estado Civil (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "estado_civil",
                            class:
                              _vm.caracData.estado_civil == ""
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.caracData.estado_civil,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "estado_civil", $$v)
                              },
                              expression: "caracData.estado_civil"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.estado_options, function(item) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("label", [_vm._v("Fecha de Nacimiento (*):")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.caracData.fecha_nacimiento,
                            expression: "caracData.fecha_nacimiento"
                          }
                        ],
                        ref: "fecha_nacimiento",
                        staticClass: "form-control text-capitalize",
                        class:
                          _vm.caracData.fecha_nacimiento == ""
                            ? ""
                            : "is-valid",
                        attrs: {
                          id: "date",
                          type: "date",
                          placeholder: "Fecha de Nacimiento",
                          max: _vm._f("moment")(_vm.hoy)
                        },
                        domProps: { value: _vm.caracData.fecha_nacimiento },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "fecha_nacimiento",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-2" }, [
                      _c("label", [_vm._v("Edad:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.calEdad2,
                            expression: "calEdad2"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.caracData.edad == "" ? "" : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Edad",
                          readonly: ""
                        },
                        domProps: { value: _vm.calEdad2 },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.calEdad2 = $event.target.value
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-2" }, [
                      _c("label", [_vm._v("Puntaje Sisben:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.caracData.puntaje_sisben,
                            expression: "caracData.puntaje_sisben",
                            modifiers: { trim: true }
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class:
                          _vm.caracData.puntaje_sisben == "" ? "" : "is-valid",
                        attrs: { type: "text" },
                        domProps: { value: _vm.caracData.puntaje_sisben },
                        on: {
                          change: function($event) {
                            return _vm.formato("puntaje1")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "puntaje_sisben",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-7" },
                      [
                        _c("label", [_vm._v("Eps (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "afiliacion_entidad",
                            class:
                              _vm.caracData.afiliacion_entidad == ""
                                ? ""
                                : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.mostrarOtro("OEPS1")
                              }
                            },
                            model: {
                              value: _vm.caracData.afiliacion_entidad,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.caracData,
                                  "afiliacion_entidad",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "caracData.afiliacion_entidad"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NINGUNA" } }, [
                              _vm._v("NINGUNA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "OTRA" } }, [
                              _vm._v("OTRA")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.admini_options, function(item) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Tipo Afiliación:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.tipo_afiliacion == ""
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.caracData.tipo_afiliacion,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "tipo_afiliacion", $$v)
                              },
                              expression: "caracData.tipo_afiliacion"
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
                            _c("option", { attrs: { value: "SUBSIDIADO" } }, [
                              _vm._v("SUBSIDIADO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "CONTRIBUTIVO" } }, [
                              _vm._v("CONTRIBUTIVO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "ESPECIAL" } }, [
                              _vm._v("ESPECIAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "PPNA" } }, [
                              _vm._v("POBLACIÓN POBRE NO ASEGURADA")
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.mOEPS1,
                            expression: "mOEPS1"
                          }
                        ],
                        staticClass: "col-lg-12"
                      },
                      [
                        _c("label", [_vm._v("Cual:")]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model.trim",
                              value: _vm.caracData.otra_eps,
                              expression: "caracData.otra_eps",
                              modifiers: { trim: true }
                            }
                          ],
                          staticClass: "form-control text-capitalize",
                          class: _vm.caracData.otra_eps == "" ? "" : "is-valid",
                          attrs: { type: "text", placeholder: "Cual" },
                          domProps: { value: _vm.caracData.otra_eps },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.caracData,
                                "otra_eps",
                                $event.target.value.trim()
                              )
                            },
                            blur: function($event) {
                              return _vm.$forceUpdate()
                            }
                          }
                        })
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Embarazo:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.embarazo == "" ? "" : "is-valid",
                            model: {
                              value: _vm.caracData.embarazo,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "embarazo", $$v)
                              },
                              expression: "caracData.embarazo"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "SI",
                                  disabled: _vm.inputDisabled2
                                }
                              },
                              [_vm._v("SI")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "NO",
                                  disabled: _vm.inputDisabled2
                                }
                              },
                              [_vm._v("NO")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NOAPLICA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Embarazo Multiple:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.embarazo_multiple == ""
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.caracData.embarazo_multiple,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.caracData,
                                  "embarazo_multiple",
                                  $$v
                                )
                              },
                              expression: "caracData.embarazo_multiple"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "SI",
                                  disabled: _vm.inputDisabled2
                                }
                              },
                              [_vm._v("SI")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "NO",
                                  disabled: _vm.inputDisabled2
                                }
                              },
                              [_vm._v("NO")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NOAPLICA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Discapacidad:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.discapacidad == ""
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.caracData.discapacidad,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "discapacidad", $$v)
                              },
                              expression: "caracData.discapacidad"
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
                              _vm._v("FISICA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "2" } }, [
                              _vm._v("COGNITIVA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "3" } }, [
                              _vm._v("SENSORIAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "4" } }, [
                              _vm._v("PSÍQUICA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "5" } }, [
                              _vm._v("NINGUNA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Nivel Educativo:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.nivel_escolaridad == ""
                                ? ""
                                : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.mostrarOtro("mOCOL1")
                              }
                            },
                            model: {
                              value: _vm.caracData.nivel_escolaridad,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.caracData,
                                  "nivel_escolaridad",
                                  $$v
                                )
                              },
                              expression: "caracData.nivel_escolaridad"
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
                            _vm._l(_vm.escolaridad_options, function(item) {
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
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.mOCOL1,
                            expression: "mOCOL1"
                          }
                        ],
                        staticClass: "col-lg-6"
                      },
                      [
                        _c("label", [_vm._v("Colegio:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            staticClass: "form-control kt-select2 selectBus",
                            class:
                              _vm.caracData.colegio == "" ? "" : "is-valid",
                            staticStyle: { width: "100%" },
                            model: {
                              value: _vm.caracData.colegio,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "colegio", $$v)
                              },
                              expression: "caracData.colegio"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.colegio_options, function(item) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.mOCOL1,
                            expression: "mOCOL1"
                          }
                        ],
                        staticClass: "col-lg-3"
                      },
                      [
                        _c("label", [_vm._v("Grado:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.caracData.grado == "" ? "" : "is-valid",
                            model: {
                              value: _vm.caracData.grado,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "grado", $$v)
                              },
                              expression: "caracData.grado"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Ninguno" } }, [
                              _vm._v("Ninguno")
                            ]),
                            _vm._v(" "),
                            _vm._l(
                              _vm.grados_option[
                                _vm.caracData.nivel_escolaridad
                              ],
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
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-12" }, [
                      _c("label", [_vm._v("Ocupación (*):")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.ocupacionAuxiliar,
                            expression: "ocupacionAuxiliar"
                          }
                        ],
                        ref: "ocupacion",
                        staticClass: "form-control text-capitalize",
                        class: _vm.ocupacionAuxiliar == "" ? "" : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Ocupaciones",
                          readonly: true
                        },
                        domProps: { value: _vm.ocupacionAuxiliar },
                        on: {
                          click: function($event) {
                            return _vm.abrirModalOcupaciones("jefe")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.ocupacionAuxiliar = $event.target.value
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Etnia (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "etnia",
                            class: _vm.caracData.etnia == "" ? "" : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.cambiarCombo("etnia")
                              }
                            },
                            model: {
                              value: _vm.caracData.etnia,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "etnia", $$v)
                              },
                              expression: "caracData.etnia"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.etnia_options, function(item) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Clasificación de la Etnia (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "clasificacion",
                            class:
                              _vm.caracData.clasificacion == ""
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.caracData.clasificacion,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "clasificacion", $$v)
                              },
                              expression: "caracData.clasificacion"
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
                              _vm.clasifi_options[_vm.caracData.etnia],
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [
                          _vm._v("Perdida de peso en los ultimos 3 meses:")
                        ]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.perdida_peso == ""
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.caracData.perdida_peso,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "perdida_peso", $$v)
                              },
                              expression: "caracData.perdida_peso"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SI" } }, [
                              _vm._v("SI")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NO" } }, [
                              _vm._v("NO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "ND" } }, [
                              _vm._v("NO DECLARA")
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Entiende Español:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.entiende == "" ? "" : "is-valid",
                            model: {
                              value: _vm.caracData.entiende,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "entiende", $$v)
                              },
                              expression: "caracData.entiende"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SI" } }, [
                              _vm._v("SI")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NO" } }, [
                              _vm._v("NO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("PYP:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.caracData.pyp == "" ? "" : "is-valid",
                            model: {
                              value: _vm.caracData.pyp,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "pyp", $$v)
                              },
                              expression: "caracData.pyp"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Crecimiento" } }, [
                              _vm._v("Crecimiento y Desarrollo")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Joven" } }, [
                              _vm._v("Joven")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Adulto" } }, [
                              _vm._v("Adulto Mayor")
                            ]),
                            _vm._v(" "),
                            _c(
                              "option",
                              { attrs: { value: "Planificacion" } },
                              [_vm._v("Planificación Familiar")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Control" } }, [
                              _vm._v("Control Prenatal")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Alimentacion" } }, [
                              _vm._v("Alimentación Escolar")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Ninguno" } }, [
                              _vm._v("Ninguno")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-2" },
                      [
                        _c("label", [_vm._v("Migrante:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.migrante == "" ? "" : "is-valid",
                            model: {
                              value: _vm.caracData.migrante,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "migrante", $$v)
                              },
                              expression: "caracData.migrante"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SI" } }, [
                              _vm._v("SI")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NO" } }, [
                              _vm._v("NO")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Salario (*):")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.caracData.salario,
                            expression: "caracData.salario",
                            modifiers: { trim: true }
                          }
                        ],
                        ref: "salario",
                        staticClass: "form-control text-capitalize",
                        class: _vm.caracData.salario == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Salario" },
                        domProps: { value: _vm.caracData.salario },
                        on: {
                          change: function($event) {
                            return _vm.formato("salario")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.caracData,
                              "salario",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [
                          _vm._v("Pertenece a algún programa del ICBF:")
                        ]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.caracData.programa_icbf == ""
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.caracData.programa_icbf,
                              callback: function($$v) {
                                _vm.$set(_vm.caracData, "programa_icbf", $$v)
                              },
                              expression: "caracData.programa_icbf"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SI" } }, [
                              _vm._v("SI")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NO" } }, [
                              _vm._v("NO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-1" }, [
                      _c("br"),
                      _vm._v(" "),
                      _c("label", [_vm._v("      ")]),
                      _vm._v(" "),
                      _c(
                        "a",
                        {
                          staticClass: "btn btn-outline-info btn-icon",
                          attrs: {
                            href: "javascript:;",
                            "data-skin": "dark",
                            "data-toggle": "kt-tooltip",
                            "data-placement": "top",
                            title: "Agregar"
                          },
                          on: {
                            click: function($event) {
                              $event.preventDefault()
                              return _vm.agregarJefe($event)
                            }
                          }
                        },
                        [_c("i", { staticClass: "fa fa-plus" })]
                      ),
                      _vm._v(" \n              ")
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  }),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-12" }, [
                      _c("div", { staticClass: "table-responsive" }, [
                        _c(
                          "table",
                          { staticClass: "table table-sm table-hover" },
                          [
                            _vm._m(3),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.datosJefe, function(item, index) {
                                return _c("tr", { key: index }, [
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle"
                                      }
                                    },
                                    [_vm._v(_vm._s(index + 1))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.tipo_id == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "250px" },
                                          on: {
                                            input: function(tipo_id) {
                                              return _vm.updateJefe(
                                                item,
                                                tipo_id,
                                                "tipo_id",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.tipo_id,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "tipo_id",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.tipo_id"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CC" } },
                                            [_vm._v("CEDULA DE CIUDADANIA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PA" } },
                                            [_vm._v("PASAPORTE")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "RC" } },
                                            [_vm._v("REGISTRO CIVIL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TI" } },
                                            [_vm._v("TARJETA DE IDENTIDAD")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ASI" } },
                                            [
                                              _vm._v(
                                                "ADULTO SIN IDENTIFICACIÓN"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MSI" } },
                                            [_vm._v("MENOR SIN IDENTIFICACIÓN")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CE" } },
                                            [_vm._v("CEDULA DE EXTRANJERIA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.identificacion,
                                            expression: "item.identificacion",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.identificacion == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Documento"
                                        },
                                        domProps: {
                                          value: item.identificacion
                                        },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "identificacion",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "identificacion",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.pnom,
                                            expression: "item.pnom",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.pnom == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Primer Nombre"
                                        },
                                        domProps: { value: item.pnom },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "pnom",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "pnom",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.snom,
                                            expression: "item.snom",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.snom == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Segundo Nombre"
                                        },
                                        domProps: { value: item.snom },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "snom",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "snom",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.pape,
                                            expression: "item.pape",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.pape == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Primer Apellido"
                                        },
                                        domProps: { value: item.pape },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "pape",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "pape",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.sape,
                                            expression: "item.sape",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.sape == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Segundo Apellido"
                                        },
                                        domProps: { value: item.sape },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "sape",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "sape",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.sexo == "" ? "" : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(sexo) {
                                              return _vm.updateJefe(
                                                item,
                                                sexo,
                                                "sexo",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.sexo,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "sexo",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.sexo"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MASCULINO" } },
                                            [_vm._v("MASCULINO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "FEMENINO" } },
                                            [_vm._v("FEMENINO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.orientacion == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(orientacion) {
                                              return _vm.updateJefe(
                                                item,
                                                orientacion,
                                                "orientacion",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.orientacion,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "orientacion",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.orientacion"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "HETEROSEXUAL" }
                                            },
                                            [_vm._v("HETEROSEXUAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HOMOSEXUAL" } },
                                            [_vm._v("HOMOSEXUAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BISEXUAL" } },
                                            [_vm._v("BISEXUAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NODECLARA" } },
                                            [_vm._v("NO DECLARA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.identidad_genero == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(identidad_genero) {
                                              return _vm.updateJefe(
                                                item,
                                                identidad_genero,
                                                "identidad_genero",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.identidad_genero,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "identidad_genero",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.identidad_genero"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "HETEROSEXUAL" }
                                            },
                                            [_vm._v("CISGENERO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HOMOSEXUAL" } },
                                            [_vm._v("TRANSGENERO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BISEXUAL" } },
                                            [_vm._v("TRANSEXUAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NODECLARA" } },
                                            [
                                              _vm._v(
                                                "TERCER GENERO Ó NO BINARIOS"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.parentesco == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(parentesco) {
                                              return _vm.updateJefe(
                                                item,
                                                parentesco,
                                                "parentesco",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.parentesco,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "parentesco",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.parentesco"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.parentesco_options,
                                            function(item) {
                                              return _c(
                                                "option",
                                                {
                                                  key: item.value,
                                                  domProps: {
                                                    value: item.value
                                                  }
                                                },
                                                [_vm._v(_vm._s(item.texto))]
                                              )
                                            }
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.telefono,
                                            expression: "item.telefono",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.telefono == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Telefono"
                                        },
                                        domProps: { value: item.telefono },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "telefono",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "telefono",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.estado_civil == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(estado_civil) {
                                              return _vm.updateJefe(
                                                item,
                                                estado_civil,
                                                "estado_civil",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.estado_civil,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "estado_civil",
                                                $$v
                                              )
                                            },
                                            expression: "item.estado_civil"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(_vm.estado_options, function(
                                            item
                                          ) {
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
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.fecha_nacimiento,
                                            expression: "item.fecha_nacimiento"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.fecha_nacimiento == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          id: "date",
                                          type: "date",
                                          placeholder: "Fecha de Nacimiento",
                                          max: _vm._f("moment")(_vm.hoy),
                                          readonly: ""
                                        },
                                        domProps: {
                                          value: item.fecha_nacimiento
                                        },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "fecha_nacimiento",
                                                $event.target.value
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "fecha_nacimiento",
                                                index
                                              )
                                            }
                                          ]
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.edad,
                                            expression: "item.edad"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.edad == "" ? "" : "is-valid",
                                        staticStyle: { width: "100px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Edad",
                                          readonly: ""
                                        },
                                        domProps: { value: item.edad },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              item,
                                              "edad",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.puntaje_sisben,
                                            expression: "item.puntaje_sisben",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.puntaje_sisben == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "150px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Puntaje Sisben"
                                        },
                                        domProps: {
                                          value: item.puntaje_sisben
                                        },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "puntaje_sisben",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "puntaje_sisben",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.textoEps,
                                            expression: "item.textoEps"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.textoEps == "" ? "" : "is-valid",
                                        staticStyle: { width: "400px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Eps",
                                          readonly: ""
                                        },
                                        domProps: { value: item.textoEps },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              item,
                                              "textoEps",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.otra_eps,
                                            expression: "item.otra_eps",
                                            modifiers: { trim: true }
                                          },
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value:
                                              item.afiliacion_entidad == "OTRA",
                                            expression:
                                              "item.afiliacion_entidad=='OTRA'"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.otra_eps == "" ? "" : "is-valid",
                                        staticStyle: { width: "400px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Cual"
                                        },
                                        domProps: { value: item.otra_eps },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              item,
                                              "otra_eps",
                                              $event.target.value.trim()
                                            )
                                          },
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.tipo_afiliacion == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(tipo_afiliacion) {
                                              return _vm.updateJefe(
                                                item,
                                                tipo_afiliacion,
                                                "tipo_afiliacion",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.tipo_afiliacion,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "tipo_afiliacion",
                                                $$v
                                              )
                                            },
                                            expression: "item.tipo_afiliacion"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "",
                                                selected: "",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad != ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad !=
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "SUBSIDIADO",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("SUBSIDIADO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "CONTRIBUTIVO",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("CONTRIBUTIVO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "ESPECIAL",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("ESPECIAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "PPNA",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "POBLACIÓN POBRE NO ASEGURADA"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "BENEFICIARIO",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("BENEFICIARIO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.embarazo == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(embarazo) {
                                              return _vm.updateJefe(
                                                item,
                                                embarazo,
                                                "embarazo",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.embarazo,
                                            callback: function($$v) {
                                              _vm.$set(item, "embarazo", $$v)
                                            },
                                            expression: "item.embarazo"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "",
                                                selected: "",
                                                disabled:
                                                  item.sexo == "MASCULINO" ||
                                                  item.sexo == "FEMENINO"
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "SI",
                                                disabled:
                                                  item.sexo == "" ||
                                                  item.sexo == "MASCULINO"
                                              }
                                            },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "NO",
                                                disabled:
                                                  item.sexo == "" ||
                                                  item.sexo == "MASCULINO"
                                              }
                                            },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NOAPLICA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.embarazo_multiple == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(embarazo_multiple) {
                                              return _vm.updateJefe(
                                                item,
                                                embarazo_multiple,
                                                "embarazo_multiple",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.embarazo_multiple,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "embarazo_multiple",
                                                $$v
                                              )
                                            },
                                            expression: "item.embarazo_multiple"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "",
                                                selected: "",
                                                disabled:
                                                  item.sexo == "MASCULINO" ||
                                                  item.sexo == "FEMENINO"
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "SI",
                                                disabled:
                                                  item.sexo == "" ||
                                                  item.sexo == "MASCULINO" ||
                                                  item.embarazo == "NO"
                                              }
                                            },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "NO",
                                                disabled:
                                                  item.sexo == "" ||
                                                  item.sexo == "MASCULINO"
                                              }
                                            },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "NOAPLICA",
                                                disabled: item.embarazo == "NO"
                                              }
                                            },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.discapacidad == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(discapacidad) {
                                              return _vm.updateJefe(
                                                item,
                                                discapacidad,
                                                "discapacidad",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.discapacidad,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "discapacidad",
                                                $$v
                                              )
                                            },
                                            expression: "item.discapacidad"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "1" } },
                                            [_vm._v("FISICA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "2" } },
                                            [_vm._v("COGNITIVA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "3" } },
                                            [_vm._v("SENSORIAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "4" } },
                                            [_vm._v("PSÍQUICA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "5" } },
                                            [_vm._v("NINGUNA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.nivel_escolaridad == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(nivel_escolaridad) {
                                              return _vm.updateJefe(
                                                item,
                                                nivel_escolaridad,
                                                "nivel_escolaridad",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.nivel_escolaridad,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "nivel_escolaridad",
                                                $$v
                                              )
                                            },
                                            expression: "item.nivel_escolaridad"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "0" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.escolaridad_options,
                                            function(item) {
                                              return _c(
                                                "option",
                                                {
                                                  key: item.value,
                                                  domProps: {
                                                    value: item.value
                                                  }
                                                },
                                                [_vm._v(_vm._s(item.texto))]
                                              )
                                            }
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.textoOcupacion,
                                            expression: "item.textoOcupacion"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.textoOcupacion == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "400px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Ocupación",
                                          readonly: ""
                                        },
                                        domProps: {
                                          value: item.textoOcupacion
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              item,
                                              "textoOcupacion",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.textoColegio,
                                            expression: "item.textoColegio"
                                          },
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value:
                                              item.nivel_escolaridad == 3 ||
                                              item.nivel_escolaridad == 14 ||
                                              item.nivel_escolaridad == 15,
                                            expression:
                                              "item.nivel_escolaridad==3 || item.nivel_escolaridad==14 || item.nivel_escolaridad==15"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.textoColegio == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "300px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Colegio",
                                          readonly: ""
                                        },
                                        domProps: { value: item.textoColegio },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "textoColegio",
                                                $event.target.value
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "colegio",
                                                index
                                              )
                                            }
                                          ]
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          directives: [
                                            {
                                              name: "show",
                                              rawName: "v-show",
                                              value:
                                                item.nivel_escolaridad == 3 ||
                                                item.nivel_escolaridad == 14 ||
                                                item.nivel_escolaridad == 15,
                                              expression:
                                                "item.nivel_escolaridad==3 || item.nivel_escolaridad==14 || item.nivel_escolaridad==15"
                                            }
                                          ],
                                          class:
                                            item.grado == "" ? "" : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(grado) {
                                              return _vm.updateJefe(
                                                item,
                                                grado,
                                                "grado",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.grado,
                                            callback: function($$v) {
                                              _vm.$set(item, "grado", $$v)
                                            },
                                            expression: "item.grado"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Ninguno" } },
                                            [_vm._v("Ninguno")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.grados_option[
                                              item.nivel_escolaridad
                                            ],
                                            function(item) {
                                              return _c(
                                                "option",
                                                {
                                                  key: item.value,
                                                  domProps: {
                                                    value: item.value
                                                  }
                                                },
                                                [_vm._v(_vm._s(item.texto))]
                                              )
                                            }
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.etnia == "" ? "" : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(etnia) {
                                              return _vm.updateJefe(
                                                item,
                                                etnia,
                                                "etnia",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.etnia,
                                            callback: function($$v) {
                                              _vm.$set(item, "etnia", $$v)
                                            },
                                            expression: "item.etnia"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(_vm.etnia_options, function(
                                            item
                                          ) {
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
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.clasificacion == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(clasificacion) {
                                              return _vm.updateJefe(
                                                item,
                                                clasificacion,
                                                "clasificacion",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.clasificacion,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "clasificacion",
                                                $$v
                                              )
                                            },
                                            expression: "item.clasificacion"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.clasifi_options[item.etnia],
                                            function(item) {
                                              return _c(
                                                "option",
                                                {
                                                  key: item.value,
                                                  domProps: {
                                                    value: item.value
                                                  }
                                                },
                                                [_vm._v(_vm._s(item.texto))]
                                              )
                                            }
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.perdida_peso == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(perdida_peso) {
                                              return _vm.updateJefe(
                                                item,
                                                perdida_peso,
                                                "perdida_peso",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.perdida_peso,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "perdida_peso",
                                                $$v
                                              )
                                            },
                                            expression: "item.perdida_peso"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ND" } },
                                            [_vm._v("NO DECLARA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.entiende == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(entiende) {
                                              return _vm.updateJefe(
                                                item,
                                                entiende,
                                                "entiende",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.entiende,
                                            callback: function($$v) {
                                              _vm.$set(item, "entiende", $$v)
                                            },
                                            expression: "item.entiende"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.pyp == "" ? "" : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(pyp) {
                                              return _vm.updateJefe(
                                                item,
                                                pyp,
                                                "pyp",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.pyp,
                                            callback: function($$v) {
                                              _vm.$set(item, "pyp", $$v)
                                            },
                                            expression: "item.pyp"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Crecimiento" } },
                                            [_vm._v("Crecimiento y Desarrollo")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Joven" } },
                                            [_vm._v("Joven")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Adulto" } },
                                            [_vm._v("Adulto Mayor")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "Planificacion" }
                                            },
                                            [_vm._v("Planificación Familiar")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Control" } },
                                            [_vm._v("Control Prenatal")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "Alimentacion" }
                                            },
                                            [_vm._v("Alimentación Escolar")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Ninguno" } },
                                            [_vm._v("Ninguno")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.migrante == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(migrante) {
                                              return _vm.updateJefe(
                                                item,
                                                migrante,
                                                "migrante",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.migrante,
                                            callback: function($$v) {
                                              _vm.$set(item, "migrante", $$v)
                                            },
                                            expression: "item.migrante"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.salario,
                                            expression: "item.salario",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.salario == "" ? "" : "is-valid",
                                        staticStyle: { width: "150px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Salario"
                                        },
                                        domProps: { value: item.salario },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "salario",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateJefe(
                                                item,
                                                $event,
                                                "salario",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.programa_icbf == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(programa_icbf) {
                                              return _vm.updateJefe(
                                                item,
                                                programa_icbf,
                                                "programa_icbf",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.programa_icbf,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "programa_icbf",
                                                $$v
                                              )
                                            },
                                            expression: "item.programa_icbf"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "text-align": "center",
                                        "vertical-align": "middle"
                                      }
                                    },
                                    [
                                      _c(
                                        "button",
                                        {
                                          staticClass:
                                            "btn btn-icon btn-sm btn-outline-danger",
                                          attrs: {
                                            type: "button",
                                            title: "Eliminar"
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.eliminarItemJefe(
                                                index,
                                                item
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "fa fa-trash"
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                ])
                              }),
                              0
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", {
                          staticClass:
                            "kt-separator kt-separator--border-dashed"
                        })
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  }),
                  _vm._v(" "),
                  _vm._m(4),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Tipo de Documento:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.tipo_id == "0" ? "" : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.formato("tipoid2")
                              }
                            },
                            model: {
                              value: _vm.CA1.tipo_id,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "tipo_id", $$v)
                              },
                              expression: "CA1.tipo_id"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "CC" } }, [
                              _vm._v("CEDULA DE CIUDADANIA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "PA" } }, [
                              _vm._v("PASAPORTE")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "RC" } }, [
                              _vm._v("REGISTRO CIVIL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "TI" } }, [
                              _vm._v("TARJETA DE IDENTIDAD")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "ASI" } }, [
                              _vm._v("ADULTO SIN IDENTIFICACIÓN")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "MSI" } }, [
                              _vm._v("MENOR SIN IDENTIFICACIÓN")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "CE" } }, [
                              _vm._v("CEDULA DE EXTRANJERIA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("label", [_vm._v("Documento:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.CA1.identificacion,
                            expression: "CA1.identificacion"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.identificacion == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Documento" },
                        domProps: { value: _vm.CA1.identificacion },
                        on: {
                          change: function($event) {
                            return _vm.formato("id2")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.CA1,
                              "identificacion",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Parentesco:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.parentesco == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.parentesco,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "parentesco", $$v)
                              },
                              expression: "CA1.parentesco"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.parentesco_options, function(item) {
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
                        )
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
                        _c("label", [_vm._v("Sexo:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.sexo == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.sexo,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "sexo", $$v)
                              },
                              expression: "CA1.sexo"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "MASCULINO" } }, [
                              _vm._v("MASCULINO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "FEMENINO" } }, [
                              _vm._v("FEMENINO")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Orientación Sexual (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            ref: "sexo",
                            class: _vm.CA1.orientacion == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.orientacion,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.CA1,
                                  "orientacion",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "CA1.orientacion"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "HETEROSEXUAL" } }, [
                              _vm._v("HETEROSEXUAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "HOMOSEXUAL" } }, [
                              _vm._v("HOMOSEXUAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "BISEXUAL" } }, [
                              _vm._v("BISEXUAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NODECLARA" } }, [
                              _vm._v("NO DECLARA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Identidad de Genero (*):")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.CA1.identidad_genero == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.identidad_genero,
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.CA1,
                                  "identidad_genero",
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "CA1.identidad_genero"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "HETEROSEXUAL" } }, [
                              _vm._v("CISGENERO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "HOMOSEXUAL" } }, [
                              _vm._v("TRANSGENERO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "BISEXUAL" } }, [
                              _vm._v("TRANSEXUAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NODECLARA" } }, [
                              _vm._v("TERCER GENERO Ó NO BINARIOS")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Primer Nombre:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.CA1.pnom,
                            expression: "CA1.pnom"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.pnom == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Primer Nombre" },
                        domProps: { value: _vm.CA1.pnom },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.CA1, "pnom", $event.target.value)
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Segundo Nombre:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.CA1.snom,
                            expression: "CA1.snom"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.snom == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Segundo Nombre" },
                        domProps: { value: _vm.CA1.snom },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.CA1, "snom", $event.target.value)
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Primer Apellido:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.CA1.pape,
                            expression: "CA1.pape"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.pape == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Primer Apellido" },
                        domProps: { value: _vm.CA1.pape },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.CA1, "pape", $event.target.value)
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Segundo Apellido:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.CA1.sape,
                            expression: "CA1.sape"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.sape == "" ? "" : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Segundo Apellido"
                        },
                        domProps: { value: _vm.CA1.sape },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.CA1, "sape", $event.target.value)
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Telefono:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.CA1.telefono,
                            expression: "CA1.telefono",
                            modifiers: { trim: true }
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.telefono == "" ? "" : "is-valid",
                        attrs: { type: "text", placeholder: "Telefono" },
                        domProps: { value: _vm.CA1.telefono },
                        on: {
                          change: function($event) {
                            return _vm.formato("telefono2")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.CA1,
                              "telefono",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Estado Civil:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.CA1.estado_civil == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.estado_civil,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "estado_civil", $$v)
                              },
                              expression: "CA1.estado_civil"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.estado_options, function(item) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Puntaje Sisben:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model.trim",
                            value: _vm.CA1.puntaje_sisben,
                            expression: "CA1.puntaje_sisben",
                            modifiers: { trim: true }
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.puntaje_sisben == "" ? "" : "is-valid",
                        attrs: { type: "text" },
                        domProps: { value: _vm.CA1.puntaje_sisben },
                        on: {
                          change: function($event) {
                            return _vm.formato("puntaje")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.CA1,
                              "puntaje_sisben",
                              $event.target.value.trim()
                            )
                          },
                          blur: function($event) {
                            return _vm.$forceUpdate()
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-3" }, [
                      _c("label", [_vm._v("Fecha de Nacimiento:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.CA1.fecha_nac,
                            expression: "CA1.fecha_nac"
                          }
                        ],
                        ref: "fecha_nacimiento",
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.fecha_nac == "" ? "" : "is-valid",
                        attrs: {
                          id: "date",
                          type: "date",
                          placeholder: "Fecha de Nacimiento",
                          max: _vm._f("moment")(_vm.hoy)
                        },
                        domProps: { value: _vm.CA1.fecha_nac },
                        on: {
                          change: _vm.calculaEdad,
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.CA1, "fecha_nac", $event.target.value)
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-2" }, [
                      _c("label", [_vm._v("Edad:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.calEdad,
                            expression: "calEdad"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.edad == "" ? "" : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Edad",
                          readonly: ""
                        },
                        domProps: { value: _vm.calEdad },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.calEdad = $event.target.value
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-2" }, [
                      _c("label", [_vm._v("Meses:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.CA1.meses,
                            expression: "CA1.meses"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.meses == "" ? "" : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Edad",
                          readonly: ""
                        },
                        domProps: { value: _vm.CA1.meses },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.CA1, "meses", $event.target.value)
                          }
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-2" }, [
                      _c("label", [_vm._v("Dias:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.CA1.dias,
                            expression: "CA1.dias"
                          }
                        ],
                        staticClass: "form-control text-capitalize",
                        class: _vm.CA1.dias == "" ? "" : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Edad",
                          readonly: ""
                        },
                        domProps: { value: _vm.CA1.dias },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.CA1, "dias", $event.target.value)
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-8" },
                      [
                        _c("label", [_vm._v("EPS:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.afi_entidad == "0" ? "" : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.mostrarOtro("OEPS2")
                              }
                            },
                            model: {
                              value: _vm.CA1.afi_entidad,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "afi_entidad", $$v)
                              },
                              expression: "CA1.afi_entidad"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NINGUNA" } }, [
                              _vm._v("NINGUNA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "OTRA" } }, [
                              _vm._v("OTRA")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.admini_options, function(item) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-2" },
                      [
                        _c("label", [_vm._v("Tipo Afiliación:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.CA1.tipo_afiliacion == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.tipo_afiliacion,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "tipo_afiliacion", $$v)
                              },
                              expression: "CA1.tipo_afiliacion"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("No Aplica")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SUBSIDIADO" } }, [
                              _vm._v("SUBSIDIADO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "CONTRIBUTIVO" } }, [
                              _vm._v("CONTRIBUTIVO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "ESPECIAL" } }, [
                              _vm._v("ESPECIAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "PPNA" } }, [
                              _vm._v("POBLACIÓN POBRE NO ASEGURADA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "BENEFICIARIO" } }, [
                              _vm._v("BENEFICIARIO")
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.mOEPS2,
                            expression: "mOEPS2"
                          }
                        ],
                        staticClass: "col-lg-12"
                      },
                      [
                        _c("label", [_vm._v("Cual:")]),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model.trim",
                              value: _vm.CA1.otra_eps,
                              expression: "CA1.otra_eps",
                              modifiers: { trim: true }
                            }
                          ],
                          staticClass: "form-control text-capitalize",
                          class: _vm.CA1.otra_eps == "" ? "" : "is-valid",
                          attrs: { type: "text", placeholder: "Cual" },
                          domProps: { value: _vm.CA1.otra_eps },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.CA1,
                                "otra_eps",
                                $event.target.value.trim()
                              )
                            },
                            blur: function($event) {
                              return _vm.$forceUpdate()
                            }
                          }
                        })
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Embarazo:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.embarazo == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.embarazo,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "embarazo", $$v)
                              },
                              expression: "CA1.embarazo"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "SI",
                                  disabled: _vm.inputDisabled
                                }
                              },
                              [_vm._v("SI")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "NO",
                                  disabled: _vm.inputDisabled
                                }
                              },
                              [_vm._v("NO")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NOAPLICA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Embarazo Multiple:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.CA1.embarazo_multiple == "0"
                                ? ""
                                : "is-valid",
                            model: {
                              value: _vm.CA1.embarazo_multiple,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "embarazo_multiple", $$v)
                              },
                              expression: "CA1.embarazo_multiple"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "SI",
                                  disabled: _vm.inputDisabled
                                }
                              },
                              [_vm._v("SI")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "NO",
                                  disabled: _vm.inputDisabled
                                }
                              },
                              [_vm._v("NO")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NOAPLICA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Discapacidad:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.CA1.discapacidad == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.discapacidad,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "discapacidad", $$v)
                              },
                              expression: "CA1.discapacidad"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "1" } }, [
                              _vm._v("FISICA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "2" } }, [
                              _vm._v("COGNITIVA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "3" } }, [
                              _vm._v("SENSORIAL")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "4" } }, [
                              _vm._v("PSÍQUICA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "5" } }, [
                              _vm._v("NINGUNA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Nivel Educativo:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.escolaridad == "0" ? "" : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.mostrarOtro("mOCOL2")
                              }
                            },
                            model: {
                              value: _vm.CA1.escolaridad,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "escolaridad", $$v)
                              },
                              expression: "CA1.escolaridad"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("No Aplica")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.escolaridad_options, function(item) {
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
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.mOCOL2,
                            expression: "mOCOL2"
                          }
                        ],
                        staticClass: "col-lg-6"
                      },
                      [
                        _c("label", [_vm._v("Colegio:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.colegio == "" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.colegio,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "colegio", $$v)
                              },
                              expression: "CA1.colegio"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.colegio_options, function(item) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.mOCOL2,
                            expression: "mOCOL2"
                          }
                        ],
                        staticClass: "col-lg-3"
                      },
                      [
                        _c("label", [_vm._v("Grado:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.grado == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.grado,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "grado", $$v)
                              },
                              expression: "CA1.grado"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("No Aplica")
                            ]),
                            _vm._v(" "),
                            _vm._l(
                              _vm.grados_option[_vm.CA1.escolaridad],
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
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-lg-12" }, [
                      _c("label", [_vm._v("Ocupación:")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.ocupacionAuxiliar2,
                            expression: "ocupacionAuxiliar2"
                          }
                        ],
                        ref: "ocupacion",
                        staticClass: "form-control text-capitalize",
                        class: _vm.ocupacionAuxiliar2 == "" ? "" : "is-valid",
                        attrs: {
                          type: "text",
                          placeholder: "Ocupaciones",
                          readonly: true
                        },
                        domProps: { value: _vm.ocupacionAuxiliar2 },
                        on: {
                          click: function($event) {
                            return _vm.abrirModalOcupaciones("inte")
                          },
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.ocupacionAuxiliar2 = $event.target.value
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Etnia:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.etnia == "0" ? "" : "is-valid",
                            on: {
                              change: function($event) {
                                return _vm.cambiarCombo("etnia")
                              }
                            },
                            model: {
                              value: _vm.CA1.etnia,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "etnia", $$v)
                              },
                              expression: "CA1.etnia"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.etnia_options, function(item) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [_vm._v("Clasificación de la Etnia:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.CA1.clasificacion == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.clasificacion,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "clasificacion", $$v)
                              },
                              expression: "CA1.clasificacion"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.clasifi_options[_vm.CA1.etnia], function(
                              item
                            ) {
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
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4" },
                      [
                        _c("label", [
                          _vm._v("Perdida de peso en los ultimos 3 meses:")
                        ]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.CA1.perdida_peso == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.perdida_peso,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "perdida_peso", $$v)
                              },
                              expression: "CA1.perdida_peso"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SI" } }, [
                              _vm._v("SI")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NO" } }, [
                              _vm._v("NO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "ND" } }, [
                              _vm._v("NO DECLARA")
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Entiende Español:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.entiende == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.entiende,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "entiende", $$v)
                              },
                              expression: "CA1.entiende"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SI" } }, [
                              _vm._v("SI")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NO" } }, [
                              _vm._v("NO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("PYP:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.pyp == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.pyp,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "pyp", $$v)
                              },
                              expression: "CA1.pyp"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Crecimiento" } }, [
                              _vm._v("Crecimiento y Desarrollo")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Joven" } }, [
                              _vm._v("Joven")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Adulto" } }, [
                              _vm._v("Adulto Mayor")
                            ]),
                            _vm._v(" "),
                            _c(
                              "option",
                              { attrs: { value: "Planificacion" } },
                              [_vm._v("Planificación Familiar")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Control" } }, [
                              _vm._v("Control Prenatal")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Alimentacion" } }, [
                              _vm._v("Alimentación Escolar")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "Ninguno" } }, [
                              _vm._v("Ninguno")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [_vm._v("Migrante:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.migrante == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.migrante,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "migrante", $$v)
                              },
                              expression: "CA1.migrante"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SI" } }, [
                              _vm._v("SI")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NO" } }, [
                              _vm._v("NO")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3" },
                      [
                        _c("label", [
                          _vm._v("Pertenece a algún programa del ICBF:")
                        ]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class:
                              _vm.CA1.programa_icbf == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.programa_icbf,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "programa_icbf", $$v)
                              },
                              expression: "CA1.programa_icbf"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "SI" } }, [
                              _vm._v("SI")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NO" } }, [
                              _vm._v("NO")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-12" },
                      [
                        _c("label", [_vm._v("Jefe del hogar:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.jefe == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.jefe,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "jefe", $$v)
                              },
                              expression: "CA1.jefe"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.datosJefe, function(item) {
                              return _c(
                                "option",
                                {
                                  key: item.value,
                                  domProps: { value: item.identificacion }
                                },
                                [
                                  _vm._v(
                                    _vm._s(item.pnom.toUpperCase()) +
                                      " " +
                                      _vm._s(item.snom.toUpperCase()) +
                                      " " +
                                      _vm._s(item.pape.toUpperCase()) +
                                      " " +
                                      _vm._s(item.sape.toUpperCase())
                                  )
                                ]
                              )
                            })
                          ],
                          2
                        )
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
                        _c("label", [_vm._v("Excepciones:")]),
                        _vm._v(" "),
                        _c(
                          "b-form-select",
                          {
                            class: _vm.CA1.excepciones == "0" ? "" : "is-valid",
                            model: {
                              value: _vm.CA1.excepciones,
                              callback: function($$v) {
                                _vm.$set(_vm.CA1, "excepciones", $$v)
                              },
                              expression: "CA1.excepciones"
                            }
                          },
                          [
                            _c(
                              "option",
                              { attrs: { value: "0", selected: "" } },
                              [_vm._v("Seleccione")]
                            ),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "1" } }, [
                              _vm._v("Vida sexual prematura")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "2" } }, [
                              _vm._v("Consumo de tabaco")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "3" } }, [
                              _vm._v("Consumo de SPA")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "4" } }, [
                              _vm._v("Consumo de alcohol")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "NA" } }, [
                              _vm._v("NO APLICA")
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-1" }, [
                      _c("br"),
                      _vm._v(" "),
                      _c("label", [_vm._v("      ")]),
                      _vm._v(" "),
                      _c(
                        "a",
                        {
                          staticClass: "btn btn-outline-info btn-icon",
                          attrs: {
                            href: "javascript:;",
                            "data-skin": "dark",
                            "data-toggle": "kt-tooltip",
                            "data-placement": "top",
                            title: "Agregar"
                          },
                          on: {
                            click: function($event) {
                              $event.preventDefault()
                              return _vm.agregar($event)
                            }
                          }
                        },
                        [_c("i", { staticClass: "fa fa-plus" })]
                      ),
                      _vm._v(" \n              ")
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  }),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-12" }, [
                      _c("div", { staticClass: "table-responsive" }, [
                        _c(
                          "table",
                          { staticClass: "table table-sm table-hover" },
                          [
                            _vm._m(5),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.datos, function(item, index) {
                                return _c("tr", { key: index }, [
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle"
                                      }
                                    },
                                    [_vm._v(_vm._s(index + 1))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.tipo_id == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "250px" },
                                          on: {
                                            input: function(tipo_id) {
                                              return _vm.updateIntegrante(
                                                item,
                                                tipo_id,
                                                "tipo_id",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.tipo_id,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "tipo_id",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.tipo_id"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CC" } },
                                            [_vm._v("CEDULA DE CIUDADANIA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "PA" } },
                                            [_vm._v("PASAPORTE")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "RC" } },
                                            [_vm._v("REGISTRO CIVIL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "TI" } },
                                            [_vm._v("TARJETA DE IDENTIDAD")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ASI" } },
                                            [
                                              _vm._v(
                                                "ADULTO SIN IDENTIFICACIÓN"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MSI" } },
                                            [_vm._v("MENOR SIN IDENTIFICACIÓN")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "CE" } },
                                            [_vm._v("CEDULA DE EXTRANJERIA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.identificacion,
                                            expression: "item.identificacion",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.identificacion == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Documento"
                                        },
                                        domProps: {
                                          value: item.identificacion
                                        },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "identificacion",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "identificacion",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.pnom,
                                            expression: "item.pnom",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.pnom == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Primer Nombre"
                                        },
                                        domProps: { value: item.pnom },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "pnom",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "pnom",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.snom,
                                            expression: "item.snom",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.snom == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Segundo Nombre"
                                        },
                                        domProps: { value: item.snom },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "snom",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "snom",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.pape,
                                            expression: "item.pape",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.pape == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Primer Apellido"
                                        },
                                        domProps: { value: item.pape },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "pape",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "pape",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.sape,
                                            expression: "item.sape",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.sape == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Segundo Apellido"
                                        },
                                        domProps: { value: item.sape },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "sape",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "sape",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.sexo == "0" ? "" : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(sexo) {
                                              return _vm.updateIntegrante(
                                                item,
                                                sexo,
                                                "sexo",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.sexo,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "sexo",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.sexo"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "MASCULINO" } },
                                            [_vm._v("MASCULINO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "FEMENINO" } },
                                            [_vm._v("FEMENINO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.orientacion == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(orientacion) {
                                              return _vm.updateIntegrante(
                                                item,
                                                orientacion,
                                                "orientacion",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.orientacion,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "orientacion",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.orientacion"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "HETEROSEXUAL" }
                                            },
                                            [_vm._v("HETEROSEXUAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HOMOSEXUAL" } },
                                            [_vm._v("HOMOSEXUAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BISEXUAL" } },
                                            [_vm._v("BISEXUAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NODECLARA" } },
                                            [_vm._v("NO DECLARA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.identidad_genero == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(identidad_genero) {
                                              return _vm.updateIntegrante(
                                                item,
                                                identidad_genero,
                                                "identidad_genero",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.identidad_genero,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "identidad_genero",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.identidad_genero"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "HETEROSEXUAL" }
                                            },
                                            [_vm._v("CISGENERO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "HOMOSEXUAL" } },
                                            [_vm._v("TRANSGENERO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "BISEXUAL" } },
                                            [_vm._v("TRANSEXUAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NODECLARA" } },
                                            [
                                              _vm._v(
                                                "TERCER GENERO Ó NO BINARIOS"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.parentesco == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(parentesco) {
                                              return _vm.updateIntegrante(
                                                item,
                                                parentesco,
                                                "parentesco",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.parentesco,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "parentesco",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.parentesco"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.parentesco_options,
                                            function(item) {
                                              return _c(
                                                "option",
                                                {
                                                  key: item.value,
                                                  domProps: {
                                                    value: item.value
                                                  }
                                                },
                                                [_vm._v(_vm._s(item.texto))]
                                              )
                                            }
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.telefono,
                                            expression: "item.telefono",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.telefono == "" ? "" : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Telefono"
                                        },
                                        domProps: { value: item.telefono },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "telefono",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "telefono",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.estado_civil == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(estado_civil) {
                                              return _vm.updateIntegrante(
                                                item,
                                                estado_civil,
                                                "estado_civil",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.estado_civil,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "estado_civil",
                                                $$v
                                              )
                                            },
                                            expression: "item.estado_civil"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(_vm.estado_options, function(
                                            item
                                          ) {
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
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.fecha_nac,
                                            expression: "item.fecha_nac"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.fecha_nac == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "200px" },
                                        attrs: {
                                          id: "date",
                                          type: "date",
                                          placeholder: "Fecha de Nacimiento",
                                          max: _vm._f("moment")(_vm.hoy),
                                          readonly: ""
                                        },
                                        domProps: { value: item.fecha_nac },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "fecha_nac",
                                                $event.target.value
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "fecha_nac",
                                                index
                                              )
                                            }
                                          ]
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.edad,
                                            expression: "item.edad"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.edad == "" ? "" : "is-valid",
                                        staticStyle: { width: "100px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Edad",
                                          readonly: ""
                                        },
                                        domProps: { value: item.edad },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              item,
                                              "edad",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.puntaje_sisben,
                                            expression: "item.puntaje_sisben",
                                            modifiers: { trim: true }
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.puntaje_sisben == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "150px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Puntaje Sisben"
                                        },
                                        domProps: {
                                          value: item.puntaje_sisben
                                        },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "puntaje_sisben",
                                                $event.target.value.trim()
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "puntaje_sisben",
                                                index
                                              )
                                            }
                                          ],
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.textoEps,
                                            expression: "item.textoEps"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.textoEps == "" ? "" : "is-valid",
                                        staticStyle: { width: "400px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Ocupación",
                                          readonly: ""
                                        },
                                        domProps: { value: item.textoEps },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              item,
                                              "textoEps",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model.trim",
                                            value: item.otra_eps,
                                            expression: "item.otra_eps",
                                            modifiers: { trim: true }
                                          },
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value: item.afi_entidad == "OTRA",
                                            expression:
                                              "item.afi_entidad=='OTRA'"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.otra_eps == "" ? "" : "is-valid",
                                        staticStyle: { width: "400px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Cual"
                                        },
                                        domProps: { value: item.otra_eps },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              item,
                                              "otra_eps",
                                              $event.target.value.trim()
                                            )
                                          },
                                          blur: function($event) {
                                            return _vm.$forceUpdate()
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.tipo_afiliacion == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(tipo_afiliacion) {
                                              return _vm.updateIntegrante(
                                                item,
                                                tipo_afiliacion,
                                                "tipo_afiliacion",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.tipo_afiliacion,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "tipo_afiliacion",
                                                $$v
                                              )
                                            },
                                            expression: "item.tipo_afiliacion"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: "",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad != ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "NA",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad !=
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "SUBSIDIADO",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("SUBSIDIADO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "CONTRIBUTIVO",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("CONTRIBUTIVO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "ESPECIAL",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("ESPECIAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "PPNA",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "POBLACIÓN POBRE NO ASEGURADA"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "BENEFICIARIO",
                                                disabled:
                                                  item.afiliacion_entidad ==
                                                    "" ||
                                                  item.afiliacion_entidad ==
                                                    "NINGUNA"
                                              }
                                            },
                                            [_vm._v("BENEFICIARIO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.embarazo == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(embarazo) {
                                              return _vm.updateIntegrante(
                                                item,
                                                embarazo,
                                                "embarazo",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.embarazo,
                                            callback: function($$v) {
                                              _vm.$set(item, "embarazo", $$v)
                                            },
                                            expression: "item.embarazo"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: "",
                                                disabled:
                                                  item.sexo == "MASCULINO" ||
                                                  item.sexo == "FEMENINO"
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "SI",
                                                disabled:
                                                  item.sexo == "" ||
                                                  item.sexo == "MASCULINO"
                                              }
                                            },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "NO",
                                                disabled:
                                                  item.sexo == "" ||
                                                  item.sexo == "MASCULINO"
                                              }
                                            },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NOAPLICA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.embarazo_multiple == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(embarazo_multiple) {
                                              return _vm.updateIntegrante(
                                                item,
                                                embarazo_multiple,
                                                "embarazo_multiple",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.embarazo_multiple,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "embarazo_multiple",
                                                $$v
                                              )
                                            },
                                            expression: "item.embarazo_multiple"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: "",
                                                disabled:
                                                  item.sexo == "MASCULINO" ||
                                                  item.sexo == "FEMENINO"
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "SI",
                                                disabled:
                                                  item.sexo == "" ||
                                                  item.sexo == "MASCULINO" ||
                                                  item.embarazo == "NO"
                                              }
                                            },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "NO",
                                                disabled:
                                                  item.sexo == "" ||
                                                  item.sexo == "MASCULINO"
                                              }
                                            },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "NOAPLICA",
                                                disabled: item.embarazo == "NO"
                                              }
                                            },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.discapacidad == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(discapacidad) {
                                              return _vm.updateIntegrante(
                                                item,
                                                discapacidad,
                                                "discapacidad",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.discapacidad,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "discapacidad",
                                                $$v
                                              )
                                            },
                                            expression: "item.discapacidad"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "1" } },
                                            [_vm._v("FISICA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "2" } },
                                            [_vm._v("COGNITIVA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "3" } },
                                            [_vm._v("SENSORIAL")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "4" } },
                                            [_vm._v("PSÍQUICA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "5" } },
                                            [_vm._v("NINGUNA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.escolaridad == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(escolaridad) {
                                              return _vm.updateIntegrante(
                                                item,
                                                escolaridad,
                                                "escolaridad",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.escolaridad,
                                            callback: function($$v) {
                                              _vm.$set(item, "escolaridad", $$v)
                                            },
                                            expression: "item.escolaridad"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.escolaridad_options,
                                            function(item) {
                                              return _c(
                                                "option",
                                                {
                                                  key: item.value,
                                                  domProps: {
                                                    value: item.value
                                                  }
                                                },
                                                [_vm._v(_vm._s(item.texto))]
                                              )
                                            }
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.textoOcupacion,
                                            expression: "item.textoOcupacion"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.textoOcupacion == ""
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "400px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Ocupación",
                                          readonly: ""
                                        },
                                        domProps: {
                                          value: item.textoOcupacion
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              item,
                                              "textoOcupacion",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: item.textoColegio,
                                            expression: "item.textoColegio"
                                          },
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value:
                                              item.escolaridad == 3 ||
                                              item.escolaridad == 14 ||
                                              item.escolaridad == 15,
                                            expression:
                                              "item.escolaridad==3 || item.escolaridad==14 || item.escolaridad==15"
                                          }
                                        ],
                                        staticClass:
                                          "form-control text-capitalize",
                                        class:
                                          item.textoColegio == "0"
                                            ? ""
                                            : "is-valid",
                                        staticStyle: { width: "300px" },
                                        attrs: {
                                          type: "text",
                                          placeholder: "Colegio",
                                          readonly: ""
                                        },
                                        domProps: { value: item.textoColegio },
                                        on: {
                                          input: [
                                            function($event) {
                                              if ($event.target.composing) {
                                                return
                                              }
                                              _vm.$set(
                                                item,
                                                "textoColegio",
                                                $event.target.value
                                              )
                                            },
                                            function($event) {
                                              return _vm.changeupdateIntegrante(
                                                item,
                                                $event,
                                                "colegio",
                                                index
                                              )
                                            }
                                          ]
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          directives: [
                                            {
                                              name: "show",
                                              rawName: "v-show",
                                              value:
                                                item.escolaridad == 3 ||
                                                item.escolaridad == 14 ||
                                                item.escolaridad == 15,
                                              expression:
                                                "item.escolaridad==3 || item.escolaridad==14 || item.escolaridad==15"
                                            }
                                          ],
                                          class:
                                            item.grado == "0" ? "" : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(grado) {
                                              return _vm.updateIntegrante(
                                                item,
                                                grado,
                                                "grado",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.grado,
                                            callback: function($$v) {
                                              _vm.$set(item, "grado", $$v)
                                            },
                                            expression: "item.grado"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Ninguno" } },
                                            [_vm._v("Ninguno")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.grados_option[item.escolaridad],
                                            function(item) {
                                              return _c(
                                                "option",
                                                {
                                                  key: item.value,
                                                  domProps: {
                                                    value: item.value
                                                  }
                                                },
                                                [_vm._v(_vm._s(item.texto))]
                                              )
                                            }
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.etnia == "0" ? "" : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(etnia) {
                                              return _vm.updateIntegrante(
                                                item,
                                                etnia,
                                                "etnia",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.etnia,
                                            callback: function($$v) {
                                              _vm.$set(item, "etnia", $$v)
                                            },
                                            expression: "item.etnia"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(_vm.etnia_options, function(
                                            item
                                          ) {
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
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.clasificacion == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(clasificacion) {
                                              return _vm.updateIntegrante(
                                                item,
                                                clasificacion,
                                                "clasificacion",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.clasificacion,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "clasificacion",
                                                $$v
                                              )
                                            },
                                            expression: "item.clasificacion"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.clasifi_options[item.etnia],
                                            function(item) {
                                              return _c(
                                                "option",
                                                {
                                                  key: item.value,
                                                  domProps: {
                                                    value: item.value
                                                  }
                                                },
                                                [_vm._v(_vm._s(item.texto))]
                                              )
                                            }
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.perdida_peso == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(perdida_peso) {
                                              return _vm.updateIntegrante(
                                                item,
                                                perdida_peso,
                                                "perdida_peso",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.perdida_peso,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "perdida_peso",
                                                $$v
                                              )
                                            },
                                            expression: "item.perdida_peso"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "ND" } },
                                            [_vm._v("NO DECLARA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.entiende == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(entiende) {
                                              return _vm.updateIntegrante(
                                                item,
                                                entiende,
                                                "entiende",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.entiende,
                                            callback: function($$v) {
                                              _vm.$set(item, "entiende", $$v)
                                            },
                                            expression: "item.entiende"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.pyp == "0" ? "" : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(pyp) {
                                              return _vm.updateIntegrante(
                                                item,
                                                pyp,
                                                "pyp",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.pyp,
                                            callback: function($$v) {
                                              _vm.$set(item, "pyp", $$v)
                                            },
                                            expression: "item.pyp"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Crecimiento" } },
                                            [_vm._v("Crecimiento y Desarrollo")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Joven" } },
                                            [_vm._v("Joven")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Adulto" } },
                                            [_vm._v("Adulto Mayor")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "Planificacion" }
                                            },
                                            [_vm._v("Planificación Familiar")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Control" } },
                                            [_vm._v("Control Prenatal")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "Alimentacion" }
                                            },
                                            [_vm._v("Alimentación Escolar")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Ninguno" } },
                                            [_vm._v("Ninguno")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.migrante == "0"
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(migrante) {
                                              return _vm.updateIntegrante(
                                                item,
                                                migrante,
                                                "migrante",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.migrante,
                                            callback: function($$v) {
                                              _vm.$set(item, "migrante", $$v)
                                            },
                                            expression: "item.migrante"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.programa_icbf == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(programa_icbf) {
                                              return _vm.updateIntegrante(
                                                item,
                                                programa_icbf,
                                                "programa_icbf",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.programa_icbf,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "programa_icbf",
                                                $$v
                                              )
                                            },
                                            expression: "item.programa_icbf"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.jefe == "0" ? "" : "is-valid",
                                          staticStyle: { width: "400px" },
                                          on: {
                                            input: function(jefe) {
                                              return _vm.updateIntegrante(
                                                item,
                                                jefe,
                                                "jefe",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.jefe,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "jefe",
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression: "item.jefe"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _vm._l(_vm.datosJefe, function(item) {
                                            return _c(
                                              "option",
                                              {
                                                key: item.value,
                                                domProps: {
                                                  value: item.identificacion
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  _vm._s(
                                                    item.pnom.toUpperCase()
                                                  ) +
                                                    " " +
                                                    _vm._s(
                                                      item.snom.toUpperCase()
                                                    ) +
                                                    " " +
                                                    _vm._s(
                                                      item.pape.toUpperCase()
                                                    ) +
                                                    " " +
                                                    _vm._s(
                                                      item.sape.toUpperCase()
                                                    )
                                                )
                                              ]
                                            )
                                          })
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.excepciones == ""
                                              ? ""
                                              : "is-valid",
                                          staticStyle: { width: "200px" },
                                          on: {
                                            input: function(excepciones) {
                                              return _vm.updateIntegrante(
                                                item,
                                                excepciones,
                                                "excepciones",
                                                index
                                              )
                                            }
                                          },
                                          model: {
                                            value: item.excepciones,
                                            callback: function($$v) {
                                              _vm.$set(item, "excepciones", $$v)
                                            },
                                            expression: "item.excepciones"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: {
                                                value: "0",
                                                selected: ""
                                              }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "1" } },
                                            [_vm._v("Vida sexual prematura")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "2" } },
                                            [_vm._v("Consumo de tabaco")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "3" } },
                                            [_vm._v("Consumo de SPA")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "4" } },
                                            [_vm._v("Consumo de alcohol")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("NO APLICA")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "text-align": "center",
                                        "vertical-align": "middle"
                                      }
                                    },
                                    [
                                      _c(
                                        "button",
                                        {
                                          staticClass:
                                            "btn btn-icon btn-sm btn-outline-danger",
                                          attrs: {
                                            type: "button",
                                            title: "Eliminar"
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.eliminarItem(
                                                index,
                                                item
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "fa fa-trash"
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                ])
                              }),
                              0
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", {
                          staticClass:
                            "kt-separator kt-separator--border-dashed"
                        })
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("br"),
                  _vm._v(" "),
                  _c("br"),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  }),
                  _vm._v(" "),
                  _vm._m(6),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-12" }, [
                      _c("div", { staticClass: "table-responsive" }, [
                        _c(
                          "table",
                          { staticClass: "table table-sm table-hover" },
                          [
                            _vm._m(7),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.factores, function(item, index) {
                                return _c("tr", { key: index }, [
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        staticClass:
                                          "form-control text-capitalize is-valid",
                                        staticStyle: {
                                          width: "100px",
                                          "background-color": "white"
                                        },
                                        attrs: { type: "text", readonly: "" },
                                        domProps: { value: index + 1 }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        staticClass:
                                          "form-control text-capitalize is-valid",
                                        staticStyle: {
                                          width: "200px",
                                          "background-color": "white"
                                        },
                                        attrs: { type: "text", readonly: "" },
                                        domProps: {
                                          value:
                                            item.tipo_id +
                                            " : " +
                                            item.identificacion
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        staticClass:
                                          "form-control text-capitalize is-valid",
                                        staticStyle: {
                                          width: "300px",
                                          "background-color": "white"
                                        },
                                        attrs: { type: "text", readonly: "" },
                                        domProps: {
                                          value:
                                            item.pnom +
                                            " " +
                                            item.snom +
                                            " " +
                                            item.pape +
                                            " " +
                                            item.sape
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        staticClass:
                                          "form-control text-capitalize is-valid",
                                        staticStyle: {
                                          width: "150px",
                                          "background-color": "white"
                                        },
                                        attrs: { type: "text", readonly: "" },
                                        domProps: { value: item.sexo }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c("input", {
                                        staticClass:
                                          "form-control text-capitalize is-valid",
                                        staticStyle: {
                                          width: "100px",
                                          "background-color": "white"
                                        },
                                        attrs: { type: "text", readonly: "" },
                                        domProps: { value: item.edad }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.dialogos == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.dialogos,
                                            callback: function($$v) {
                                              _vm.$set(item, "dialogos", $$v)
                                            },
                                            expression: "item.dialogos"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.sancion == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.sancion,
                                            callback: function($$v) {
                                              _vm.$set(item, "sancion", $$v)
                                            },
                                            expression: "item.sancion"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.castigo_verbal == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.castigo_verbal,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "castigo_verbal",
                                                $$v
                                              )
                                            },
                                            expression: "item.castigo_verbal"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.castigo_fisico == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.castigo_fisico,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "castigo_fisico",
                                                $$v
                                              )
                                            },
                                            expression: "item.castigo_fisico"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.alcohol == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.alcohol,
                                            callback: function($$v) {
                                              _vm.$set(item, "alcohol", $$v)
                                            },
                                            expression: "item.alcohol"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.tabaco == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.tabaco,
                                            callback: function($$v) {
                                              _vm.$set(item, "tabaco", $$v)
                                            },
                                            expression: "item.tabaco"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.sustancias_psico == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.sustancias_psico,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "sustancias_psico",
                                                $$v
                                              )
                                            },
                                            expression: "item.sustancias_psico"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.apuestas == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.apuestas,
                                            callback: function($$v) {
                                              _vm.$set(item, "apuestas", $$v)
                                            },
                                            expression: "item.apuestas"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.violencia_fisica == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.violencia_fisica,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "violencia_fisica",
                                                $$v
                                              )
                                            },
                                            expression: "item.violencia_fisica"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.violencia_psico == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.violencia_psico,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "violencia_psico",
                                                $$v
                                              )
                                            },
                                            expression: "item.violencia_psico"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.violencia_economica == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.violencia_economica,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "violencia_economica",
                                                $$v
                                              )
                                            },
                                            expression:
                                              "item.violencia_economica"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.abuso_sexual == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.abuso_sexual,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "abuso_sexual",
                                                $$v
                                              )
                                            },
                                            expression: "item.abuso_sexual"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.actividad_fisica == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.actividad_fisica,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "actividad_fisica",
                                                $$v
                                              )
                                            },
                                            expression: "item.actividad_fisica"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.consumo_frutas == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.consumo_frutas,
                                            callback: function($$v) {
                                              _vm.$set(
                                                item,
                                                "consumo_frutas",
                                                $$v
                                              )
                                            },
                                            expression: "item.consumo_frutas"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.religiosos == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.religiosos,
                                            callback: function($$v) {
                                              _vm.$set(item, "religiosos", $$v)
                                            },
                                            expression: "item.religiosos"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.sociales == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.sociales,
                                            callback: function($$v) {
                                              _vm.$set(item, "sociales", $$v)
                                            },
                                            expression: "item.sociales"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.culturales == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.culturales,
                                            callback: function($$v) {
                                              _vm.$set(item, "culturales", $$v)
                                            },
                                            expression: "item.culturales"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    {
                                      staticStyle: {
                                        "font-weight": "normal",
                                        "vertical-align": "middle",
                                        "text-align": "left",
                                        "text-transform": "capitalize"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-select",
                                        {
                                          class:
                                            item.recreativos == ""
                                              ? "is-invalid"
                                              : "is-valid",
                                          staticStyle: { width: "150px" },
                                          model: {
                                            value: item.recreativos,
                                            callback: function($$v) {
                                              _vm.$set(item, "recreativos", $$v)
                                            },
                                            expression: "item.recreativos"
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            {
                                              attrs: { value: "", selected: "" }
                                            },
                                            [_vm._v("Seleccione")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NA" } },
                                            [_vm._v("No Aplica")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "SI" } },
                                            [_vm._v("SI")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "NO" } },
                                            [_vm._v("NO")]
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  )
                                ])
                              }),
                              0
                            )
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", {
                        staticClass: "kt-separator kt-separator--border-dashed"
                      })
                    ])
                  ])
                ]
              )
            ])
          ]),
          _vm._v(" "),
          _c(
            "b-modal",
            {
              ref: "modalOcupaciones",
              attrs: {
                "hide-footer": "",
                title: "Ocupaciones",
                size: "xl",
                centered: "",
                "header-bg-variant": "danger",
                "header-text-variant": "light",
                "no-close-on-backdrop": true
              }
            },
            [
              _c("div", { staticClass: "d-block" }, [
                _c("form", [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-6 col-lg-6" }),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-md-6 col-lg-6" }, [
                      _c("form", { staticClass: "kt-form" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("div", { staticClass: "input-group" }, [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.txtbusqueda,
                                  expression: "txtbusqueda"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: { type: "text", placeholder: "Busqueda" },
                              domProps: { value: _vm.txtbusqueda },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.txtbusqueda = $event.target.value
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c("div", { staticClass: "input-group-append" }, [
                              _c(
                                "button",
                                {
                                  staticClass: "btn btn-primary btn-icon",
                                  attrs: { type: "button" },
                                  on: {
                                    click: function($event) {
                                      return _vm.consultarOcupaciones(1)
                                    }
                                  }
                                },
                                [_c("i", { staticClass: "fa fa-search" })]
                              )
                            ])
                          ])
                        ])
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-md-12" }, [
                      _c(
                        "div",
                        {
                          staticClass: "table-responsive",
                          staticStyle: { height: "350px" }
                        },
                        [
                          _c(
                            "table",
                            { staticClass: "table table-sm table-hover" },
                            [
                              _c("thead", {}, [
                                _c("tr", { staticClass: "kt-bg-fill-brand" }, [
                                  _c("th", [_vm._v("No.")]),
                                  _vm._v(" "),
                                  _c("th", [_vm._v("Ocupación")]),
                                  _vm._v(" "),
                                  _c("td", { staticClass: "text-center" }, [
                                    _vm._v("Opciones")
                                  ])
                                ])
                              ]),
                              _vm._v(" "),
                              _c(
                                "tbody",
                                _vm._l(_vm.ocupacionesVector, function(
                                  item,
                                  index
                                ) {
                                  return _c("tr", { key: index }, [
                                    _c(
                                      "td",
                                      {
                                        staticStyle: {
                                          "font-weight": "normal",
                                          "vertical-align": "middle"
                                        }
                                      },
                                      [_vm._v(_vm._s(index + 1))]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "td",
                                      {
                                        staticStyle: {
                                          "font-weight": "normal",
                                          "vertical-align": "middle",
                                          "text-align": "left",
                                          "text-transform": "capitalize"
                                        }
                                      },
                                      [
                                        _c(
                                          "span",
                                          { staticClass: "text-capitalize" },
                                          [_vm._v(_vm._s(item.descripcion))]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "td",
                                      {
                                        staticStyle: {
                                          "text-align": "center",
                                          "vertical-align": "middle"
                                        }
                                      },
                                      [
                                        _c(
                                          "button",
                                          {
                                            staticClass:
                                              "btn btn-icon btn-sm btn-outline-success",
                                            attrs: {
                                              type: "button",
                                              title: "Seleccionar"
                                            },
                                            on: {
                                              click: function($event) {
                                                return _vm.seleccionarOcupaciones(
                                                  item
                                                )
                                              }
                                            }
                                          },
                                          [
                                            _c(
                                              "svg",
                                              {
                                                staticClass: "kt-svg-icon",
                                                attrs: {
                                                  xmlns:
                                                    "http://www.w3.org/2000/svg",
                                                  "xmlns:xlink":
                                                    "http://www.w3.org/1999/xlink",
                                                  width: "24px",
                                                  height: "24px",
                                                  viewBox: "0 0 24 24",
                                                  version: "1.1"
                                                }
                                              },
                                              [
                                                _c(
                                                  "g",
                                                  {
                                                    attrs: {
                                                      stroke: "none",
                                                      "stroke-width": "1",
                                                      fill: "none",
                                                      "fill-rule": "evenodd"
                                                    }
                                                  },
                                                  [
                                                    _c("polygon", {
                                                      attrs: {
                                                        id: "Shape",
                                                        points:
                                                          "0 0 24 0 24 24 0 24"
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c("path", {
                                                      attrs: {
                                                        d:
                                                          "M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z",
                                                        id: "Path-94",
                                                        fill: "#000000",
                                                        "fill-rule": "nonzero",
                                                        transform:
                                                          "translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "
                                                      }
                                                    })
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ])
                                }),
                                0
                              )
                            ]
                          )
                        ]
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "text-right" }, [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-warning",
                        attrs: { type: "button" },
                        on: { click: _vm.cerrarModal }
                      },
                      [
                        _c("i", { staticClass: "fa fa-window-close" }),
                        _vm._v(" Cerrar\n              ")
                      ]
                    )
                  ])
                ])
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "b-modal",
            {
              ref: "modalActividad",
              attrs: {
                "hide-footer": "",
                title: "Actividades Economicas",
                size: "xl",
                centered: "",
                "header-bg-variant": "danger",
                "header-text-variant": "light",
                "no-close-on-backdrop": true
              }
            },
            [
              _c("div", { staticClass: "d-block" }, [
                _c("form", [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-6 col-lg-6" }, [
                      _c("form", { staticClass: "kt-form" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("div", { staticClass: "input-group" }, [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.txtbusquedaAct,
                                  expression: "txtbusquedaAct"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: { type: "text", placeholder: "Busqueda" },
                              domProps: { value: _vm.txtbusquedaAct },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.txtbusquedaAct = $event.target.value
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c("div", { staticClass: "input-group-append" }, [
                              _c(
                                "button",
                                {
                                  staticClass: "btn btn-primary btn-icon",
                                  attrs: { type: "button" },
                                  on: {
                                    click: function($event) {
                                      return _vm.consultarActividades(1)
                                    }
                                  }
                                },
                                [_c("i", { staticClass: "fa fa-search" })]
                              )
                            ])
                          ])
                        ])
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-group row" }, [
                    _c("div", { staticClass: "col-md-12" }, [
                      _c(
                        "div",
                        {
                          staticClass: "table-responsive",
                          staticStyle: { height: "350px" }
                        },
                        [
                          _c(
                            "table",
                            { staticClass: "table table-sm table-hover" },
                            [
                              _c("thead", {}, [
                                _c("tr", { staticClass: "kt-bg-fill-brand" }, [
                                  _c("th", [_vm._v("No.")]),
                                  _vm._v(" "),
                                  _c("th", [_vm._v("Actividad Economica")]),
                                  _vm._v(" "),
                                  _c("td", { staticClass: "text-center" }, [
                                    _vm._v("Opciones")
                                  ])
                                ])
                              ]),
                              _vm._v(" "),
                              _c(
                                "tbody",
                                _vm._l(_vm.actividadesVector, function(
                                  item,
                                  index
                                ) {
                                  return _c("tr", { key: index }, [
                                    _c(
                                      "td",
                                      {
                                        staticStyle: {
                                          "font-weight": "normal",
                                          "vertical-align": "middle"
                                        }
                                      },
                                      [_vm._v(_vm._s(index + 1))]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "td",
                                      {
                                        staticStyle: {
                                          "font-weight": "normal",
                                          "vertical-align": "middle",
                                          "text-align": "left",
                                          "text-transform": "capitalize"
                                        }
                                      },
                                      [
                                        _c(
                                          "span",
                                          { staticClass: "text-capitalize" },
                                          [_vm._v(_vm._s(item.descripcion))]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "td",
                                      {
                                        staticStyle: {
                                          "text-align": "center",
                                          "vertical-align": "middle"
                                        }
                                      },
                                      [
                                        _c(
                                          "button",
                                          {
                                            staticClass:
                                              "btn btn-icon btn-sm btn-outline-success",
                                            attrs: {
                                              type: "button",
                                              title: "Seleccionar"
                                            },
                                            on: {
                                              click: function($event) {
                                                return _vm.seleccionarActividades(
                                                  item
                                                )
                                              }
                                            }
                                          },
                                          [
                                            _c(
                                              "svg",
                                              {
                                                staticClass: "kt-svg-icon",
                                                attrs: {
                                                  xmlns:
                                                    "http://www.w3.org/2000/svg",
                                                  "xmlns:xlink":
                                                    "http://www.w3.org/1999/xlink",
                                                  width: "24px",
                                                  height: "24px",
                                                  viewBox: "0 0 24 24",
                                                  version: "1.1"
                                                }
                                              },
                                              [
                                                _c(
                                                  "g",
                                                  {
                                                    attrs: {
                                                      stroke: "none",
                                                      "stroke-width": "1",
                                                      fill: "none",
                                                      "fill-rule": "evenodd"
                                                    }
                                                  },
                                                  [
                                                    _c("polygon", {
                                                      attrs: {
                                                        id: "Shape",
                                                        points:
                                                          "0 0 24 0 24 24 0 24"
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c("path", {
                                                      attrs: {
                                                        d:
                                                          "M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z",
                                                        id: "Path-94",
                                                        fill: "#000000",
                                                        "fill-rule": "nonzero",
                                                        transform:
                                                          "translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "
                                                      }
                                                    })
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ])
                                }),
                                0
                              )
                            ]
                          )
                        ]
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "text-right" }, [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-warning",
                        attrs: { type: "button" },
                        on: { click: _vm.cerrarModal }
                      },
                      [
                        _c("i", { staticClass: "fa fa-window-close" }),
                        _vm._v(" Cerrar\n              ")
                      ]
                    )
                  ])
                ])
              ])
            ]
          )
        ],
        1
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
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", {}, [
      _c("tr", { staticClass: "kt-bg-fill-brand" }, [
        _c("th", [_vm._v("No.")]),
        _vm._v(" "),
        _c("th", [_vm._v("Tipo de Documento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Documento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Primer Nombre")]),
        _vm._v(" "),
        _c("th", [_vm._v("Segundo Nombre")]),
        _vm._v(" "),
        _c("th", [_vm._v("Primer Apellido")]),
        _vm._v(" "),
        _c("th", [_vm._v("Segundo Apellido")]),
        _vm._v(" "),
        _c("th", [_vm._v("Sexo")]),
        _vm._v(" "),
        _c("th", [_vm._v("Orientación Sexual")]),
        _vm._v(" "),
        _c("th", [_vm._v("Identidad de Genero")]),
        _vm._v(" "),
        _c("th", [_vm._v("Parentesco")]),
        _vm._v(" "),
        _c("th", [_vm._v("Telefono")]),
        _vm._v(" "),
        _c("th", [_vm._v("Estado Civil")]),
        _vm._v(" "),
        _c("th", [_vm._v("Nacimiento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Edad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Puntaje Sisben")]),
        _vm._v(" "),
        _c("th", [_vm._v("Eps")]),
        _vm._v(" "),
        _c("th", [_vm._v("Cual Eps")]),
        _vm._v(" "),
        _c("th", [_vm._v("Tipo Afiliación")]),
        _vm._v(" "),
        _c("th", [_vm._v("Embarazo")]),
        _vm._v(" "),
        _c("th", [_vm._v("Embarazo Multiple")]),
        _vm._v(" "),
        _c("th", [_vm._v("Discapacidad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Nivel de Escolaridad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Ocupación")]),
        _vm._v(" "),
        _c("th", [_vm._v("Colegio")]),
        _vm._v(" "),
        _c("th", [_vm._v("Grado")]),
        _vm._v(" "),
        _c("th", [_vm._v("Etnia")]),
        _vm._v(" "),
        _c("th", [_vm._v("Clasificación de la Etnia")]),
        _vm._v(" "),
        _c("th", [_vm._v("Perdida de Peso")]),
        _vm._v(" "),
        _c("th", [_vm._v("Entiende Español")]),
        _vm._v(" "),
        _c("th", [_vm._v("PYP")]),
        _vm._v(" "),
        _c("th", [_vm._v("Migrante")]),
        _vm._v(" "),
        _c("th", [_vm._v("Salario")]),
        _vm._v(" "),
        _c("th", [_vm._v("Programa ICBF")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Opciones")])
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
        [_vm._v("B.Integrantes de la familia")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", {}, [
      _c("tr", { staticClass: "kt-bg-fill-brand" }, [
        _c("th", [_vm._v("No.")]),
        _vm._v(" "),
        _c("th", [_vm._v("Tipo de Documento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Documento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Primer Nombre")]),
        _vm._v(" "),
        _c("th", [_vm._v("Segundo Nombre")]),
        _vm._v(" "),
        _c("th", [_vm._v("Primer Apellido")]),
        _vm._v(" "),
        _c("th", [_vm._v("Segundo Apellido")]),
        _vm._v(" "),
        _c("th", [_vm._v("Sexo")]),
        _vm._v(" "),
        _c("th", [_vm._v("Orientación Sexual")]),
        _vm._v(" "),
        _c("th", [_vm._v("Identidad de Genero")]),
        _vm._v(" "),
        _c("th", [_vm._v("Parentesco")]),
        _vm._v(" "),
        _c("th", [_vm._v("Telefono")]),
        _vm._v(" "),
        _c("th", [_vm._v("Estado Civil")]),
        _vm._v(" "),
        _c("th", [_vm._v("Nacimiento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Edad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Puntaje Sisben")]),
        _vm._v(" "),
        _c("th", [_vm._v("Eps")]),
        _vm._v(" "),
        _c("th", [_vm._v("Cual Eps")]),
        _vm._v(" "),
        _c("th", [_vm._v("Tipo Afiliación")]),
        _vm._v(" "),
        _c("th", [_vm._v("Embarazo")]),
        _vm._v(" "),
        _c("th", [_vm._v("Embarazo Multiple")]),
        _vm._v(" "),
        _c("th", [_vm._v("Discapacidad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Nivel de Escolaridad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Ocupación")]),
        _vm._v(" "),
        _c("th", [_vm._v("Colegio")]),
        _vm._v(" "),
        _c("th", [_vm._v("Grado")]),
        _vm._v(" "),
        _c("th", [_vm._v("Etnia")]),
        _vm._v(" "),
        _c("th", [_vm._v("Clasificación de la Etnia")]),
        _vm._v(" "),
        _c("th", [_vm._v("Perdida de Peso")]),
        _vm._v(" "),
        _c("th", [_vm._v("Entiende Español")]),
        _vm._v(" "),
        _c("th", [_vm._v("PYP")]),
        _vm._v(" "),
        _c("th", [_vm._v("Migrante")]),
        _vm._v(" "),
        _c("th", [_vm._v("Programa ICBF")]),
        _vm._v(" "),
        _c("th", [_vm._v("Jefe de Hogar")]),
        _vm._v(" "),
        _c("th", [_vm._v("Excepciones")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_vm._v("Opciones")])
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
          staticStyle: { "font-size": "14px" }
        },
        [_vm._v("FACTORES DE RIESGO Y PROTECTORES DE LA FAMILIA")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", {
          staticClass: "kt-bg-fill-success",
          staticStyle: {
            "font-weight": "normal",
            "vertical-align": "middle",
            "text-align": "center",
            "text-transform": "capitalize"
          },
          attrs: { colspan: "5" }
        }),
        _vm._v(" "),
        _c(
          "th",
          {
            staticClass: "kt-bg-fill-danger",
            staticStyle: {
              "font-weight": "normal",
              "vertical-align": "middle",
              "text-align": "center",
              "text-transform": "capitalize"
            },
            attrs: { colspan: "4" }
          },
          [_vm._v("Como Corrige Usted a Sus Hijos")]
        ),
        _vm._v(" "),
        _c(
          "th",
          {
            staticClass: "kt-bg-fill-warning",
            staticStyle: {
              "font-weight": "normal",
              "vertical-align": "middle",
              "text-align": "center",
              "text-transform": "capitalize"
            },
            attrs: { colspan: "4" }
          },
          [_vm._v("Adicciones")]
        ),
        _vm._v(" "),
        _c(
          "th",
          {
            staticClass: "kt-bg-fill-brand",
            staticStyle: {
              "font-weight": "normal",
              "vertical-align": "middle",
              "text-align": "center",
              "text-transform": "capitalize"
            },
            attrs: { colspan: "4" }
          },
          [_vm._v("Violencia Intrafamiliar")]
        ),
        _vm._v(" "),
        _c(
          "th",
          {
            staticClass: "kt-bg-fill-dark",
            staticStyle: {
              "font-weight": "normal",
              "vertical-align": "middle",
              "text-align": "center",
              "text-transform": "capitalize"
            },
            attrs: { colspan: "2" }
          },
          [_vm._v("Estilos de Vida Saludables")]
        ),
        _vm._v(" "),
        _c(
          "th",
          {
            staticClass: "kt-bg-fill-danger",
            staticStyle: {
              "font-weight": "normal",
              "vertical-align": "middle",
              "text-align": "center",
              "text-transform": "capitalize"
            },
            attrs: { colspan: "4" }
          },
          [_vm._v("Partiicipa en Grupos Organizados")]
        )
      ]),
      _vm._v(" "),
      _c("tr", { staticClass: "kt-bg-fill-warning" }, [
        _c("td", { staticClass: "kt-bg-fill-success" }, [_vm._v("No.")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-success" }, [_vm._v("Documento")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-success" }, [_vm._v("Nombre")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-success" }, [_vm._v("Sexo")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-success" }, [_vm._v("Edad")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-danger" }, [_vm._v("Dialogos")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-danger" }, [
          _vm._v("Sanción ó Supresión")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-danger" }, [
          _vm._v("Castigo Verbal")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-danger" }, [
          _vm._v("Castigo Fisico")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-warning" }, [_vm._v("Alcohol")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-warning" }, [_vm._v("Tabaco")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-warning" }, [
          _vm._v("Sustancias Psicoactivas")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-warning" }, [_vm._v("Apuestas")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-brand" }, [
          _vm._v("Violencia Fisica")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-brand" }, [
          _vm._v("Violencia Psicologica")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-brand" }, [
          _vm._v("Violencia Economica")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-brand" }, [_vm._v("Abuso Sexual")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-dark" }, [
          _vm._v("Actividad Fisica")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-dark" }, [
          _vm._v("Consumo de Frutas y Verduras")
        ]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-danger" }, [_vm._v("Religiosos")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-danger" }, [_vm._v("Sociales")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-danger" }, [_vm._v("Culturales")]),
        _vm._v(" "),
        _c("td", { staticClass: "kt-bg-fill-danger" }, [_vm._v("Recreativos")])
      ])
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

/***/ "./resources/js/Servicios/caracterizacion_servicios.js":
/*!*************************************************************!*\
  !*** ./resources/js/Servicios/caracterizacion_servicios.js ***!
  \*************************************************************/
/*! exports provided: listarCaracterizacion, nuevaCaracterizacion, guardar, validar, eliminarCaracterizacion, exportarCaracterizacion, exportarCaracterizacion2, validarJefe, actualizar, editarCaracterizacion */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarCaracterizacion", function() { return listarCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "nuevaCaracterizacion", function() { return nuevaCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardar", function() { return guardar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "validar", function() { return validar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminarCaracterizacion", function() { return eliminarCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarCaracterizacion", function() { return exportarCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarCaracterizacion2", function() { return exportarCaracterizacion2; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "validarJefe", function() { return validarJefe; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "actualizar", function() { return actualizar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "editarCaracterizacion", function() { return editarCaracterizacion; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion', $data);
}
function nuevaCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/nuevo', $data);
}
function guardar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/guardar', $data);
}
function validar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/validar', $data);
}
function eliminarCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/eliminar', $data);
}
function exportarCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/exportar', $data);
}
function exportarCaracterizacion2($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/exportar2', $data);
}
function validarJefe($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/validarJefe', $data);
}
function actualizar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/actualizar', $data);
}
function editarCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/editar', $data);
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