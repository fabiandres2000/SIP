(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[20],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/salud.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Informes/salud.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_html2pdf__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-html2pdf */ "./node_modules/vue-html2pdf/dist/vue-html2pdf.esm.js");
/* harmony import */ var vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-easy-pie-chart */ "./node_modules/vue-easy-pie-chart/dist/vue-easy-pie-chart.common.js");
/* harmony import */ var vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-easy-pie-chart/dist/vue-easy-pie-chart.css */ "./node_modules/vue-easy-pie-chart/dist/vue-easy-pie-chart.css");
/* harmony import */ var vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var easy_circular_progress__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! easy-circular-progress */ "./node_modules/easy-circular-progress/dist/easy-circular-progress.umd.min.js");
/* harmony import */ var easy_circular_progress__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(easy_circular_progress__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var vue2_circle_progress__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue2-circle-progress */ "./node_modules/vue2-circle-progress/dist/vue-circle-progress.js");
/* harmony import */ var vue2_circle_progress__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue2_circle_progress__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _Servicios_dashboard_socioeconomico_servicios__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../Servicios/dashboard_socioeconomico_servicios */ "./resources/js/Servicios/dashboard_socioeconomico_servicios.js");
/* harmony import */ var _Servicios_informes__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../Servicios/informes */ "./resources/js/Servicios/informes.js");
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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











_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_10__["default"]);
/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    VueHtml2pdf: vue_html2pdf__WEBPACK_IMPORTED_MODULE_1__["default"],
    VueEasyPieChart: vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_2___default.a,
    Progress: easy_circular_progress__WEBPACK_IMPORTED_MODULE_4___default.a,
    VueCircle: vue2_circle_progress__WEBPACK_IMPORTED_MODULE_5___default.a
  },
  mounted: function mounted() {
    this.caracterizacion();
    this.poblacion_no_asegurada_f();
  },
  data: function data() {
    return {
      poblacion_array: null,
      chart_torta_edades: null,
      chart_no_asegurado_1: null,
      chart_no_asegurado_2: null,
      isLoading: false,
      poblacion_no_asegurada: null
    };
  },
  methods: {
    caracterizacion: function caracterizacion() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _Servicios_dashboard_socioeconomico_servicios__WEBPACK_IMPORTED_MODULE_6__["poblacion"]("todos", 1).then(function (respuesta) {
                  _this.poblacion_array = respuesta.data["poblacion"];

                  _this.grafica_torta_edades(_this.poblacion_array.edades);
                })["catch"](function (err) {
                  console.log(err);
                });

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    grafica_torta_edades: function grafica_torta_edades(array) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                if (_this2.chart_torta_edades != null) {
                  _this2.chart_torta_edades.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_edades_torta", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this2.chart_torta_edades = chart;
                chart.data = [{
                  category: "-1 Años",
                  first: array.personas0_1[0] + array.personas0_1[1]
                }, {
                  category: "1-5 Años",
                  first: array.personas1_5[0] + array.personas1_5[1]
                }, {
                  category: "6-11 Años",
                  first: array.personas6_11[0] + array.personas6_11[1]
                }, {
                  category: "12-17 Años",
                  first: array.personas12_17[0] + array.personas12_17[1]
                }, {
                  category: "18-28 Años",
                  first: array.personas18_28[0] + array.personas18_28[1]
                }, {
                  category: "29-59 Años",
                  first: array.personas29_59[0] + array.personas29_59[1]
                }, {
                  category: "+60 Años",
                  first: array.personas60[0] + array.personas60[1]
                }];
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 7:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    poblacion_no_asegurada_f: function poblacion_no_asegurada_f() {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                _context3.next = 2;
                return _Servicios_informes__WEBPACK_IMPORTED_MODULE_7__["poblacion_no_asegurada"]().then(function (respuesta) {
                  _this3.poblacion_no_asegurada = respuesta.data;

                  _this3.grafica_torta_no_asegurada_1(respuesta.data.no_asegurado_menor_5);

                  _this3.grafica_torta_no_asegurada_2(respuesta.data.no_asegurado_mayor_60);
                })["catch"](function (err) {
                  console.log(err);
                });

              case 2:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    },
    grafica_torta_no_asegurada_1: function grafica_torta_no_asegurada_1(array) {
      var _this4 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                if (_this4.chart_no_asegurado_1 != null) {
                  _this4.chart_no_asegurado_1.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_no_asegurado_1", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this4.chart_no_asegurado_1 = chart;
                chart.data = [{
                  category: "Zona Urbana",
                  first: array.urbano
                }, {
                  category: "Zona Rural",
                  first: array.rural
                }];
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 7:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4);
      }))();
    },
    grafica_torta_no_asegurada_2: function grafica_torta_no_asegurada_2(array) {
      var _this5 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
          while (1) {
            switch (_context5.prev = _context5.next) {
              case 0:
                if (_this5.chart_no_asegurado_2 != null) {
                  _this5.chart_no_asegurado_2.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_no_asegurado_2", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this5.chart_no_asegurado_2 = chart;
                chart.data = [{
                  category: "Zona Urbana",
                  first: array.urbano
                }, {
                  category: "Zona Rural",
                  first: array.rural
                }];
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 7:
              case "end":
                return _context5.stop();
            }
          }
        }, _callee5);
      }))();
    },
    generarPDF: function generarPDF() {}
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.li_li {\n    padding-top: 7px;\n    padding-bottom: 7px;\n}\np{\n    line-height: 200%;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./salud.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/salud.vue?vue&type=template&id=26b797d0&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Informes/salud.vue?vue&type=template&id=26b797d0& ***!
  \*************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticStyle: { "margin-top": "-4%" } }, [
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-lg-12" }, [
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "row" }, [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-2 text-right" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-danger",
                    attrs: { type: "button" },
                    on: { click: _vm.generarPDF }
                  },
                  [
                    _c("i", { staticClass: "la la-pdf" }),
                    _vm._v(" "),
                    _c("span", { staticClass: "kt-hidden-mobile" }, [
                      _vm._v("Generar PDF")
                    ])
                  ]
                )
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("h4", [_vm._v("Caracterización")]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "row", staticStyle: { padding: "10px" } },
              [
                _vm._m(1),
                _vm._v(" "),
                _vm.poblacion_array != null
                  ? _c("div", { staticClass: "col-lg-3" }, [
                      _c("ul", [
                        _c("li", { staticClass: "li_li" }, [
                          _c("strong", [_vm._v("Menores de un año: ")]),
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm.poblacion_array.edades.personas0_1[0] +
                                  _vm.poblacion_array.edades.personas0_1[1]
                              ) +
                              " Personas"
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", { staticClass: "li_li" }, [
                          _c("strong", [_vm._v("De 1 a 5 Años: ")]),
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm.poblacion_array.edades.personas1_5[0] +
                                  _vm.poblacion_array.edades.personas1_5[1]
                              ) +
                              " Personas"
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", { staticClass: "li_li" }, [
                          _c("strong", [_vm._v("De 6 a 11 Años: ")]),
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm.poblacion_array.edades.personas6_11[0] +
                                  _vm.poblacion_array.edades.personas6_11[1]
                              ) +
                              " Personas"
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", { staticClass: "li_li" }, [
                          _c("strong", [_vm._v("De 12 a 17 Años: ")]),
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm.poblacion_array.edades.personas12_17[0] +
                                  _vm.poblacion_array.edades.personas12_17[1]
                              ) +
                              " Personas"
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", { staticClass: "li_li" }, [
                          _c("strong", [_vm._v("De 18 a 28 Años: ")]),
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm.poblacion_array.edades.personas18_28[0] +
                                  _vm.poblacion_array.edades.personas18_28[1]
                              ) +
                              " Personas"
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", { staticClass: "li_li" }, [
                          _c("strong", [_vm._v("De 29 a 59 Años: ")]),
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm.poblacion_array.edades.personas29_59[0] +
                                  _vm.poblacion_array.edades.personas29_59[1]
                              ) +
                              " Personas"
                          )
                        ]),
                        _vm._v(" "),
                        _c("li", { staticClass: "li_li" }, [
                          _c("strong", [_vm._v("Mayores de 60 Años ")]),
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm.poblacion_array.edades.personas60[0] +
                                  _vm.poblacion_array.edades.personas60[1]
                              ) +
                              " Personas"
                          )
                        ])
                      ])
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _vm._m(2)
              ]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-lg-5" }, [
                _c("strong", [
                  _vm._v("2. Población menor de 5 años no asegurada")
                ]),
                _vm._v(" "),
                _vm.poblacion_no_asegurada != null
                  ? _c("p", [
                      _vm._v(
                        "\n                                dentro de este grupo de edad se tiene una cantidad de "
                      ),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm.poblacion_no_asegurada.no_asegurado_menor_5
                              .cantidad_personas
                          ) + " personas"
                        )
                      ]),
                      _vm._v(", de las cuales "),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm.poblacion_no_asegurada.no_asegurado_menor_5
                              .rural +
                              _vm.poblacion_no_asegurada.no_asegurado_menor_5
                                .urbano
                          ) + " personas"
                        )
                      ]),
                      _vm._v(
                        ", se encuentran en la situación de población menor de 5 años no asegurada, de lo cual se puede obtener que "
                      ),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm.poblacion_no_asegurada.no_asegurado_menor_5
                              .rural
                          ) + " personas"
                        )
                      ]),
                      _vm._v(" se encuentran en zona rural, y "),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm.poblacion_no_asegurada.no_asegurado_menor_5
                              .urbano
                          ) + " personas"
                        )
                      ]),
                      _vm._v("  en zona urbana.\n                            ")
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _c("div", {
                  staticStyle: { width: "100%", height: "270px" },
                  attrs: { id: "chartdiv_no_asegurado_1" }
                })
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-2" }),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-5" }, [
                _c("strong", [
                  _vm._v("3. Población adulto mayor no asegurada ")
                ]),
                _vm._v(" "),
                _vm.poblacion_no_asegurada != null
                  ? _c("p", [
                      _vm._v(
                        "\n                                dentro de este grupo de edad se tiene una cantidad de "
                      ),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm.poblacion_no_asegurada.no_asegurado_mayor_60
                              .cantidad_personas
                          ) + " personas"
                        )
                      ]),
                      _vm._v(", de las cuales "),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm.poblacion_no_asegurada.no_asegurado_mayor_60
                              .rural +
                              _vm.poblacion_no_asegurada.no_asegurado_mayor_60
                                .urbano
                          ) + " personas"
                        )
                      ]),
                      _vm._v(
                        ", se encuentran en la situación de población menor de 5 años no asegurada, de lo cual se puede obtener que "
                      ),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm.poblacion_no_asegurada.no_asegurado_mayor_60
                              .rural
                          ) + " personas"
                        )
                      ]),
                      _vm._v(" se encuentran en zona rural, y "),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm.poblacion_no_asegurada.no_asegurado_mayor_60
                              .urbano
                          ) + " personas"
                        )
                      ]),
                      _vm._v("  en zona urbana.\n                            ")
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _c("div", {
                  staticStyle: { width: "100%", height: "270px" },
                  attrs: { id: "chartdiv_no_asegurado_2" }
                })
              ])
            ])
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-sm-10" }, [
      _c("h3", [_vm._v("INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "col-lg-12", staticStyle: { "padding-bottom": "10px" } },
      [
        _c("strong", [
          _vm._v(
            "1. De acuerdo con la información recolectada, la poblacion caracterizada se compone de la siguiente manera por ciclo de vida: "
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-9 text-center" }, [
      _c("div", {
        staticStyle: { width: "100%", height: "270px" },
        attrs: { id: "chartdiv_edades_torta" }
      })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Servicios/dashboard_socioeconomico_servicios.js":
/*!**********************************************************************!*\
  !*** ./resources/js/Servicios/dashboard_socioeconomico_servicios.js ***!
  \**********************************************************************/
/*! exports provided: listarEstadisticaPersonas, listarEstadisticaNinios, desempleo, mercadoLaboral, exportarAnalfabetas, exportarMercadoLaboral, exportarDesempleo, poblacion, exportarPoblacion, vivienda, exportarVivienda, hogares, exportarHogar, exportarAnalfabetasExel, exportarDesempleadosExcel */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarEstadisticaPersonas", function() { return listarEstadisticaPersonas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarEstadisticaNinios", function() { return listarEstadisticaNinios; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "desempleo", function() { return desempleo; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "mercadoLaboral", function() { return mercadoLaboral; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarAnalfabetas", function() { return exportarAnalfabetas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarMercadoLaboral", function() { return exportarMercadoLaboral; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarDesempleo", function() { return exportarDesempleo; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "poblacion", function() { return poblacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarPoblacion", function() { return exportarPoblacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "vivienda", function() { return vivienda; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarVivienda", function() { return exportarVivienda; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hogares", function() { return hogares; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarHogar", function() { return exportarHogar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarAnalfabetasExel", function() { return exportarAnalfabetasExel; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarDesempleadosExcel", function() { return exportarDesempleadosExcel; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarEstadisticaPersonas($tipo, $id) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/socioeconomico/por-persona?tipo=' + $tipo + '&id=' + $id + '&consulta=1');
}
function listarEstadisticaNinios($tipo, $id) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/socioeconomico/por-persona?tipo=' + $tipo + '&id=' + $id + '&consulta=2');
}
function desempleo($tipo, $id) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/socioeconomico/desempleo?tipo=' + $tipo + '&id=' + $id);
}
function mercadoLaboral() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/socioeconomico/mercado-laboral');
}
function exportarAnalfabetas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/socioeconomico/exportar-analfabetas', $data);
}
function exportarMercadoLaboral($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/socioeconomico/exportar-mc', $data);
}
function exportarDesempleo($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/socioeconomico/exportar-desempleo', $data);
}
function poblacion($tipo, $id) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/socioeconomico/poblacion?tipo=' + $tipo + '&id=' + $id);
}
function exportarPoblacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/socioeconomico/exportar-poblacion', $data);
}
function vivienda($tipo, $id) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/socioeconomico/vivienda?tipo=' + $tipo + '&id=' + $id);
}
function exportarVivienda($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/socioeconomico/exportar-vivienda', $data);
}
function hogares($tipo, $id) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/socioeconomico/hogares?tipo=' + $tipo + '&id=' + $id);
}
function exportarHogar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/socioeconomico/exportar-hogar', $data);
}
function exportarAnalfabetasExel($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/socioeconomico/exportar-analfabetas-excel', $data);
}
function exportarDesempleadosExcel($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/socioeconomico/exportar-desempleados-excel', $data);
}

/***/ }),

/***/ "./resources/js/Servicios/informes.js":
/*!********************************************!*\
  !*** ./resources/js/Servicios/informes.js ***!
  \********************************************/
/*! exports provided: inicialesMigrantes, poblacion_no_asegurada */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inicialesMigrantes", function() { return inicialesMigrantes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "poblacion_no_asegurada", function() { return poblacion_no_asegurada; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function inicialesMigrantes($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/informes/migrantes', $data);
}
function poblacion_no_asegurada() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/informes/poblacion-no-asegurada');
}

/***/ }),

/***/ "./resources/js/Vistas/Informes/salud.vue":
/*!************************************************!*\
  !*** ./resources/js/Vistas/Informes/salud.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _salud_vue_vue_type_template_id_26b797d0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./salud.vue?vue&type=template&id=26b797d0& */ "./resources/js/Vistas/Informes/salud.vue?vue&type=template&id=26b797d0&");
/* harmony import */ var _salud_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./salud.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Informes/salud.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _salud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./salud.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _salud_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _salud_vue_vue_type_template_id_26b797d0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _salud_vue_vue_type_template_id_26b797d0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Informes/salud.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Informes/salud.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/Vistas/Informes/salud.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./salud.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/salud.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************!*\
  !*** ./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./salud.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/salud.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/Informes/salud.vue?vue&type=template&id=26b797d0&":
/*!*******************************************************************************!*\
  !*** ./resources/js/Vistas/Informes/salud.vue?vue&type=template&id=26b797d0& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_template_id_26b797d0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./salud.vue?vue&type=template&id=26b797d0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/salud.vue?vue&type=template&id=26b797d0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_template_id_26b797d0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_salud_vue_vue_type_template_id_26b797d0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);