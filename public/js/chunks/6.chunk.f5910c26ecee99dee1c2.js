(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[6],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../Servicios/caracterizacion_servicios */ "./resources/js/Servicios/caracterizacion_servicios.js");
/* harmony import */ var vuejs_datepicker__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js");
/* harmony import */ var vuejs_datepicker_dist_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vuejs-datepicker/dist/locale */ "./node_modules/vuejs-datepicker/dist/locale/index.js");
/* harmony import */ var vuejs_datepicker_dist_locale__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vuejs_datepicker_dist_locale__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vuelidate/lib/validators */ "./node_modules/vuelidate/lib/validators/index.js");
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





var isPhoneNumber = vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__["helpers"].regex("numeric", /^3[0-9]{9}$/);
var alpha = vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__["helpers"].regex("alpha", /^[a-zA-Z]*$/);
var alphaNumAndDotValidator = vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__["helpers"].regex("alphaNumAndDot", /^[a-z\d.]*$/i);

var entero = function entero(value) {
  return /^[0-9]*$/.test(value);
};


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Datepicker: vuejs_datepicker__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  mounted: function mounted() {},
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      dpto_options: [],
      muni_options: {},
      fecha_ultima: "",
      corregi_options: {},
      barrio_options: {},
      parentesco_options: {},
      estado_options: {},
      escolaridad_options: {},
      ocupacion_options: {},
      etnia_options: {},
      admini_options: {},
      clasifi_options: {},
      caracData: {
        id: 0,
        dpto: "",
        muni: "",
        corregimiento: "",
        barrio: "",
        tenencia_vivienda: "",
        numero_hogares: "",
        poblacion_especial: "",
        tipo_id: "",
        identificacion: "",
        sexo: "",
        parentesco: "",
        pnom: "",
        snom: "",
        pape: "",
        sape: "",
        direccion: "",
        telefono: "",
        puntaje_sisben: "",
        ips: "",
        salario: ""
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
        afi_entidad: "0",
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
        clasificacion: "0"
      },
      viviendaData: {
        id: 0,
        tipo_vivienda: "",
        tipo_estructura: "",
        otro_tipo_estructura: "",
        numero_cuartos: "",
        personas_por_cuartos: "",
        material_predominante: "",
        tipo_cubierta: "",
        otro_tipo_cubierta: "",
        actividad_economica: "",
        cual_actividad_economica: "",
        evento_afecta_vivienda: "",
        familias_accion: "",
        promedio_ingresos: "",
        promedio_gastos: "",
        servicios_basicos: "",
        fuente_agua: "",
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
        servicio_sanitario: "",
        donde_sanitario: "",
        excretas: "",
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
        lava_frutas: ""
      },
      animalesData: [],
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
      format: "yyyy-MM-dd",
      lenguaje: vuejs_datepicker_dist_locale__WEBPACK_IMPORTED_MODULE_2__["es"],
      claseAyuda: "form-control",
      datos: []
    };
  },
  methods: {}
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.color-datepicker {\n  background: #f2f2f2;\n  border: 1px solid #ddd;\n  padding: 0em 1em 1em;\n  margin-bottom: 2em;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./ayu.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=template&id=5e77636d&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=template&id=5e77636d& ***!
  \******************************************************************************************************************************************************************************************************************/
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
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [
      _c(
        "div",
        {
          staticClass: "kt-content kt-grid__item kt-grid__item--fluid",
          attrs: { id: "kt_content" }
        },
        [
          _c("div", { staticClass: "kt-portlet" }, [
            _c(
              "div",
              { staticClass: "kt-portlet__body kt-portlet__body--fit" },
              [
                _c(
                  "div",
                  {
                    staticClass: "kt-grid kt-wizard-v1 kt-wizard-v1--white",
                    attrs: {
                      id: "kt_wizard_v1",
                      "data-ktwizard-state": "step-first"
                    }
                  },
                  [
                    _c("div", { staticClass: "kt-grid__item" }, [
                      _c("div", { staticClass: "kt-wizard-v1__nav" }, [
                        _c("div", { staticClass: "kt-wizard-v1__nav-items" }, [
                          _c(
                            "a",
                            {
                              staticClass: "kt-wizard-v1__nav-item",
                              attrs: {
                                href: "#",
                                "data-ktwizard-type": "step",
                                "data-ktwizard-state": "current"
                              }
                            },
                            [
                              _c(
                                "div",
                                { staticClass: "kt-wizard-v1__nav-body" },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "kt-wizard-v1__nav-icon" },
                                    [
                                      _c("i", {
                                        staticClass: "flaticon-bus-stop"
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "kt-wizard-v1__nav-label" },
                                    [_vm._v("1) Zonas")]
                                  )
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "a",
                            {
                              staticClass: "kt-wizard-v1__nav-item",
                              attrs: { href: "#", "data-ktwizard-type": "step" }
                            },
                            [
                              _c(
                                "div",
                                { staticClass: "kt-wizard-v1__nav-body" },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "kt-wizard-v1__nav-icon" },
                                    [_c("i", { staticClass: "flaticon-list" })]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "kt-wizard-v1__nav-label" },
                                    [_vm._v("2) Población")]
                                  )
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "a",
                            {
                              staticClass: "kt-wizard-v1__nav-item",
                              attrs: { href: "#", "data-ktwizard-type": "step" }
                            },
                            [
                              _c(
                                "div",
                                { staticClass: "kt-wizard-v1__nav-body" },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "kt-wizard-v1__nav-icon" },
                                    [
                                      _c("i", {
                                        staticClass: "flaticon-responsive"
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "kt-wizard-v1__nav-label" },
                                    [_vm._v("3) Salud")]
                                  )
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "a",
                            {
                              staticClass: "kt-wizard-v1__nav-item",
                              attrs: { href: "#", "data-ktwizard-type": "step" }
                            },
                            [
                              _c(
                                "div",
                                { staticClass: "kt-wizard-v1__nav-body" },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "kt-wizard-v1__nav-icon" },
                                    [_c("i", { staticClass: "flaticon-truck" })]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "kt-wizard-v1__nav-label" },
                                    [_vm._v("4) Ambiental")]
                                  )
                                ]
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass:
                            "kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper"
                        },
                        [
                          _c(
                            "form",
                            {
                              staticClass: "kt-form",
                              attrs: { id: "kt_form" }
                            },
                            [
                              _c(
                                "div",
                                {
                                  staticClass: "kt-wizard-v1__content",
                                  attrs: {
                                    "data-ktwizard-type": "step-content",
                                    "data-ktwizard-state": "current"
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass: "kt-heading kt-heading--md"
                                    },
                                    [_vm._v("Zonas")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "kt-form__section kt-form__section--first"
                                    },
                                    [
                                      _c(
                                        "div",
                                        { staticClass: "kt-wizard-v1__form" },
                                        [
                                          _c("div", { staticClass: "row" }, [
                                            _c(
                                              "div",
                                              { staticClass: "col-xl-6" },
                                              [
                                                _c(
                                                  "div",
                                                  { staticClass: "form-group" },
                                                  [
                                                    _c("label", [
                                                      _vm._v("Postcode")
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("input", {
                                                      staticClass:
                                                        "form-control",
                                                      attrs: {
                                                        type: "text",
                                                        name: "postcode",
                                                        placeholder: "Postcode",
                                                        value: "3000"
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "form-text text-muted"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Please enter your Postcode."
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "col-xl-6" },
                                              [
                                                _c(
                                                  "div",
                                                  { staticClass: "form-group" },
                                                  [
                                                    _c("label", [
                                                      _vm._v("City")
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("input", {
                                                      staticClass:
                                                        "form-control",
                                                      attrs: {
                                                        type: "text",
                                                        name: "city",
                                                        placeholder: "City",
                                                        value: "Melbourne"
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "form-text text-muted"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Please enter your City."
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          ])
                                        ]
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "kt-wizard-v1__content",
                                  attrs: {
                                    "data-ktwizard-type": "step-content"
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass: "kt-heading kt-heading--md"
                                    },
                                    [_vm._v("Población")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "kt-form__section kt-form__section--first"
                                    },
                                    [
                                      _c(
                                        "div",
                                        { staticClass: "kt-wizard-v1__form" },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass:
                                                "kt-wizard-v1__form-label"
                                            },
                                            [_vm._v("Package Dimensions")]
                                          ),
                                          _vm._v(" "),
                                          _c("div", { staticClass: "row" }, [
                                            _c(
                                              "div",
                                              { staticClass: "col-xl-4" },
                                              [
                                                _c(
                                                  "div",
                                                  { staticClass: "form-group" },
                                                  [
                                                    _c("label", [
                                                      _vm._v(
                                                        "Package Width in CM"
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("input", {
                                                      staticClass:
                                                        "form-control",
                                                      attrs: {
                                                        type: "text",
                                                        name: "width",
                                                        placeholder:
                                                          "Package Width",
                                                        value: "110"
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "form-text text-muted"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Please enter your Package Width in CM."
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "col-xl-4" },
                                              [
                                                _c(
                                                  "div",
                                                  { staticClass: "form-group" },
                                                  [
                                                    _c("label", [
                                                      _vm._v(
                                                        "Package Height in CM"
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("input", {
                                                      staticClass:
                                                        "form-control",
                                                      attrs: {
                                                        type: "text",
                                                        name: "height",
                                                        placeholder:
                                                          "Package Length",
                                                        value: "90"
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "form-text text-muted"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Please enter your Package Height in CM."
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "col-xl-4" },
                                              [
                                                _c(
                                                  "div",
                                                  { staticClass: "form-group" },
                                                  [
                                                    _c("label", [
                                                      _vm._v(
                                                        "Package Length in CM"
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("input", {
                                                      staticClass:
                                                        "form-control",
                                                      attrs: {
                                                        type: "text",
                                                        name: "length",
                                                        placeholder:
                                                          "Package Length",
                                                        value: "150"
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "form-text text-muted"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Please enter your Package Length in CM."
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          ])
                                        ]
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "kt-wizard-v1__content",
                                  attrs: {
                                    "data-ktwizard-type": "step-content"
                                  }
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass: "kt-heading kt-heading--md"
                                    },
                                    [_vm._v("Salud")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "kt-form__section kt-form__section--first"
                                    },
                                    [
                                      _c(
                                        "div",
                                        { staticClass: "kt-wizard-v1__form" },
                                        [
                                          _c(
                                            "div",
                                            { staticClass: "form-group" },
                                            [
                                              _c("label", [
                                                _vm._v("Delivery Type")
                                              ]),
                                              _vm._v(" "),
                                              _c(
                                                "select",
                                                {
                                                  staticClass: "form-control",
                                                  attrs: { name: "delivery" }
                                                },
                                                [
                                                  _c(
                                                    "option",
                                                    { attrs: { value: "" } },
                                                    [
                                                      _vm._v(
                                                        "Select a Service Type Option"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: {
                                                        value: "overnight",
                                                        selected: ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Overnight Delivery (within 48 hours)"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: {
                                                        value: "express"
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Express Delivery (within 5 working days)"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: { value: "basic" }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Basic Delivery (within 5 - 10 working days)"
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            { staticClass: "form-group" },
                                            [
                                              _c("label", [
                                                _vm._v("Packaging Type")
                                              ]),
                                              _vm._v(" "),
                                              _c(
                                                "select",
                                                {
                                                  staticClass: "form-control",
                                                  attrs: { name: "packaging" }
                                                },
                                                [
                                                  _c(
                                                    "option",
                                                    { attrs: { value: "" } },
                                                    [
                                                      _vm._v(
                                                        "Select a Packaging Type Option"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: {
                                                        value: "regular",
                                                        selected: ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Regular Packaging"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: {
                                                        value: "oversized"
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Oversized Packaging"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: {
                                                        value: "fragile"
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Fragile Packaging"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: { value: "frozen" }
                                                    },
                                                    [_vm._v("Frozen Packaging")]
                                                  )
                                                ]
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            { staticClass: "form-group" },
                                            [
                                              _c("label", [
                                                _vm._v(
                                                  "Preferred Delivery Window"
                                                )
                                              ]),
                                              _vm._v(" "),
                                              _c(
                                                "select",
                                                {
                                                  staticClass: "form-control",
                                                  attrs: {
                                                    name: "preferreddelivery"
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "option",
                                                    { attrs: { value: "" } },
                                                    [
                                                      _vm._v(
                                                        "Select a Preferred Delivery Option"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: {
                                                        value: "morning",
                                                        selected: ""
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Morning Delivery (8:00AM - 11:00AM)"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: {
                                                        value: "afternoon"
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Afternoon Delivery (11:00AM - 3:00PM)"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "option",
                                                    {
                                                      attrs: {
                                                        value: "evening"
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Evening Delivery (3:00PM - 7:00PM)"
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    ]
                                  )
                                ]
                              )
                            ]
                          )
                        ]
                      )
                    ])
                  ]
                )
              ]
            )
          ])
        ]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Servicios/caracterizacion_servicios.js":
/*!*************************************************************!*\
  !*** ./resources/js/Servicios/caracterizacion_servicios.js ***!
  \*************************************************************/
/*! exports provided: listarCaracterizacion, nuevaCaracterizacion, guardar, validar, eliminarCaracterizacion, exportarCaracterizacion, exportarCaracterizacion2, validarJefe, actualizar */
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

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/ayu.vue":
/*!*****************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/ayu.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ayu_vue_vue_type_template_id_5e77636d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ayu.vue?vue&type=template&id=5e77636d& */ "./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=template&id=5e77636d&");
/* harmony import */ var _ayu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ayu.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ayu_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ayu.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ayu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ayu_vue_vue_type_template_id_5e77636d___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ayu_vue_vue_type_template_id_5e77636d___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Caracterizacion/ayu.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ayu.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css&":
/*!**************************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css& ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./ayu.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=template&id=5e77636d&":
/*!************************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=template&id=5e77636d& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_template_id_5e77636d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ayu.vue?vue&type=template&id=5e77636d& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=template&id=5e77636d&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_template_id_5e77636d___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ayu_vue_vue_type_template_id_5e77636d___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);