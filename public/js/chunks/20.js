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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    this.determinante_salud();
    this.condiciones_salud();
  },
  data: function data() {
    return {
      poblacion_array: null,
      chart_torta_edades: null,
      chart_no_asegurado_1: null,
      chart_no_asegurado_2: null,
      isLoading: false,
      poblacion_no_asegurada: null,
      determinante_salud_array: null,
      chart_poblacion_pobreza: null,
      chart_escolaridad: null,
      chart_desempleo: null,
      chart_acueducto: null,
      chart_alcantarillado: null,
      condiciones_salud_array: null,
      chart_cronica: null
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
    determinante_salud: function determinante_salud() {
      var _this6 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee6() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee6$(_context6) {
          while (1) {
            switch (_context6.prev = _context6.next) {
              case 0:
                _context6.next = 2;
                return _Servicios_informes__WEBPACK_IMPORTED_MODULE_7__["determinante_salud"]().then(function (respuesta) {
                  _this6.determinante_salud_array = respuesta.data;

                  _this6.grafica_poblacion_pobreza(_this6.determinante_salud_array.pobreza);

                  _this6.grafica_torta_escolaridad(_this6.determinante_salud_array.escolaridad);

                  _this6.grafica_torta_desempleo_sexo(_this6.determinante_salud_array.desempleo);

                  _this6.grafica_viviendas_sin_acueducto(_this6.determinante_salud_array.alcantarillado_agua.viendasSAP);

                  _this6.grafica_viviendas_sin_alcantarillado(_this6.determinante_salud_array.alcantarillado_agua.viendasSA);
                })["catch"](function (err) {
                  console.log(err);
                });

              case 2:
              case "end":
                return _context6.stop();
            }
          }
        }, _callee6);
      }))();
    },
    grafica_poblacion_pobreza: function grafica_poblacion_pobreza(array) {
      var _this7 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee7() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee7$(_context7) {
          while (1) {
            switch (_context7.prev = _context7.next) {
              case 0:
                if (_this7.chart_poblacion_pobreza != null) {
                  _this7.chart_poblacion_pobreza.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_poblacion_pobreza", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this7.chart_poblacion_pobreza = chart;
                chart.data = [{
                  category: "Zona Urbana",
                  first: array.poblacion_pobreza_urbano
                }, {
                  category: "Zona Rural",
                  first: array.poblacion_pobreza_rural
                }];
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 7:
              case "end":
                return _context7.stop();
            }
          }
        }, _callee7);
      }))();
    },
    grafica_torta_escolaridad: function grafica_torta_escolaridad(array) {
      var _this8 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee8() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee8$(_context8) {
          while (1) {
            switch (_context8.prev = _context8.next) {
              case 0:
                if (_this8.chart_escolaridad != null) {
                  _this8.chart_escolaridad.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_escolaridad", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this8.chart_escolaridad = chart;
                chart.data = [];
                array.forEach(function (element) {
                  chart.data.push({
                    category: element.escolaridad_nombre,
                    first: element.numero_personas
                  });
                });
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 8:
              case "end":
                return _context8.stop();
            }
          }
        }, _callee8);
      }))();
    },
    grafica_torta_desempleo_sexo: function grafica_torta_desempleo_sexo(array) {
      var _this9 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee9() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee9$(_context9) {
          while (1) {
            switch (_context9.prev = _context9.next) {
              case 0:
                if (_this9.chart_desempleo != null) {
                  _this9.chart_desempleo.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_desempleo", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this9.chart_desempleo = chart;
                chart.data = [{
                  category: "Femenino",
                  first: array.femeninoTD
                }, {
                  category: "Masculino",
                  first: array.masculinoTD
                }];
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 7:
              case "end":
                return _context9.stop();
            }
          }
        }, _callee9);
      }))();
    },
    grafica_viviendas_sin_acueducto: function grafica_viviendas_sin_acueducto(array) {
      var _this10 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee10() {
        var zona_rural, zona_urbana, chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee10$(_context10) {
          while (1) {
            switch (_context10.prev = _context10.next) {
              case 0:
                zona_rural = 0;
                zona_urbana = 0;
                array.forEach(function (element) {
                  if (element.id_zona == 1) {
                    zona_urbana += 1;
                  } else {
                    zona_rural += 1;
                  }
                });

                if (_this10.chart_acueducto != null) {
                  _this10.chart_acueducto.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_acueducto", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this10.chart_acueducto = chart;
                chart.data = [{
                  category: "Zona Rural",
                  first: zona_rural
                }, {
                  category: "Zona Urbana",
                  first: zona_urbana
                }];
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 10:
              case "end":
                return _context10.stop();
            }
          }
        }, _callee10);
      }))();
    },
    grafica_viviendas_sin_alcantarillado: function grafica_viviendas_sin_alcantarillado(array) {
      var _this11 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee11() {
        var zona_rural, zona_urbana, chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee11$(_context11) {
          while (1) {
            switch (_context11.prev = _context11.next) {
              case 0:
                zona_rural = 0;
                zona_urbana = 0;
                array.forEach(function (element) {
                  if (element.id_zona == 1) {
                    zona_urbana += 1;
                  } else {
                    zona_rural += 1;
                  }
                });

                if (_this11.chart_alcantarillado != null) {
                  _this11.chart_alcantarillado.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_alantarillado", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this11.chart_alcantarillado = chart;
                chart.data = [{
                  category: "Zona Rural",
                  first: zona_rural
                }, {
                  category: "Zona Urbana",
                  first: zona_urbana
                }];
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 10:
              case "end":
                return _context11.stop();
            }
          }
        }, _callee11);
      }))();
    },
    condiciones_salud: function condiciones_salud() {
      var _this12 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee12() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee12$(_context12) {
          while (1) {
            switch (_context12.prev = _context12.next) {
              case 0:
                _context12.next = 2;
                return _Servicios_informes__WEBPACK_IMPORTED_MODULE_7__["condiciones_salud"]().then(function (respuesta) {
                  _this12.condiciones_salud_array = respuesta.data;

                  _this12.grafica_enfermedades_cronicas(_this12.condiciones_salud_array.enfermedades_cronicas.por_enfermedad);
                })["catch"](function (err) {
                  console.log(err);
                });

              case 2:
              case "end":
                return _context12.stop();
            }
          }
        }, _callee12);
      }))();
    },
    grafica_enfermedades_cronicas: function grafica_enfermedades_cronicas(array) {
      var _this13 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee13() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee13$(_context13) {
          while (1) {
            switch (_context13.prev = _context13.next) {
              case 0:
                if (_this13.chart_cronica != null) {
                  _this13.chart_cronica.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_8__["create"]("chartdiv_cronica", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieChart3D"]);
                _this13.chart_cronica = chart;
                chart.data = [];
                array.forEach(function (element) {
                  chart.data.push({
                    category: element.enfermedad,
                    first: element.cantidad
                  });
                });
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_9__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 8:
              case "end":
                return _context13.stop();
            }
          }
        }, _callee13);
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
exports.push([module.i, "\n.li_li {\n        padding-top: 7px;\n        padding-bottom: 7px;\n}\np{\n        line-height: 200%;\n}\n#divPadre {\n        text-align:center;\n}\n#divHijo {\n        width:21cm;\n        margin:0px auto;\n}\n.table_data {\n    width: 100%;\n    font-size: 13px;\n    border-collapse: collapse;\n}\n.table_data thead {\n    padding: 0.3em;\n    color: #fff;\n    background: #5578eb;\n}\n.table_data thead tr th, .table_data tbody tr td {\n    text-align: left;\n    vertical-align: top;\n    padding: 0.3em;\n    caption-side: bottom;\n}\n.table_data tbody tr:nth-child(odd) {\n    background-color: #fff;\n}\n.table_data tbody tr:nth-child(even) {\n    background-color: #f1f1f1;\n}\n", ""]);

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
  return _c(
    "div",
    { staticStyle: { "margin-top": "-4%" }, attrs: { id: "divPadre" } },
    [
      _c("div", { staticClass: "row", attrs: { id: "divHijo" } }, [
        _c("div", { staticClass: "col-lg-12" }, [
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "row" }, [
                _vm._m(0),
                _vm._v(" "),
                _c("div", { staticClass: "col-sm-3 text-right" }, [
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
            _c(
              "div",
              {
                staticClass: "card-body",
                staticStyle: { "text-align": "left" }
              },
              [
                _c("h4", { staticStyle: { color: "#fd397a" } }, [
                  _vm._v("Caracterización")
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "row", staticStyle: { padding: "10px" } },
                  [
                    _vm.poblacion_array != null
                      ? _c(
                          "div",
                          {
                            staticClass: "col-lg-12",
                            staticStyle: { "padding-bottom": "10px" }
                          },
                          [
                            _c("strong", [
                              _vm._v("1. Población por ciclo de vida")
                            ]),
                            _vm._v(" "),
                            _c("p", [
                              _vm._v(
                                " De acuerdo con la información recolectada, la poblacion caracterizada se compone de la siguiente manera por ciclo de vida:"
                              )
                            ])
                          ]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.poblacion_array != null
                      ? _c("div", { staticClass: "col-lg-5" }, [
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
                                    _vm.poblacion_array.edades
                                      .personas12_17[0] +
                                      _vm.poblacion_array.edades
                                        .personas12_17[1]
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
                                    _vm.poblacion_array.edades
                                      .personas18_28[0] +
                                      _vm.poblacion_array.edades
                                        .personas18_28[1]
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
                                    _vm.poblacion_array.edades
                                      .personas29_59[0] +
                                      _vm.poblacion_array.edades
                                        .personas29_59[1]
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
                    _vm._m(1)
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "row", staticStyle: { padding: "10px" } },
                  [
                    _c("div", { staticClass: "col-lg-12" }, [
                      _c("strong", [
                        _vm._v("2. Población menor de 5 años no asegurada")
                      ]),
                      _vm._v(" "),
                      _vm.poblacion_no_asegurada != null
                        ? _c("p", [
                            _vm._v(
                              "\n                                Dentro de este grupo de edad se tiene una cantidad de "
                            ),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_no_asegurada
                                    .no_asegurado_menor_5.cantidad_personas
                                ) + " personas"
                              )
                            ]),
                            _vm._v(", de las cuales "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_no_asegurada
                                    .no_asegurado_menor_5.rural +
                                    _vm.poblacion_no_asegurada
                                      .no_asegurado_menor_5.urbano
                                ) + " personas"
                              )
                            ]),
                            _vm._v(
                              ", se encuentran en la situación de población menor de 5 años no asegurada, de lo cual se puede obtener que "
                            ),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_no_asegurada
                                    .no_asegurado_menor_5.rural
                                ) + " personas"
                              )
                            ]),
                            _vm._v(" se encuentran en zona rural, y "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_no_asegurada
                                    .no_asegurado_menor_5.urbano
                                ) + " personas"
                              )
                            ]),
                            _vm._v(
                              "  en zona urbana.\n                            "
                            )
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _c("div", {
                        staticStyle: { width: "100%", height: "270px" },
                        attrs: { id: "chartdiv_no_asegurado_1" }
                      })
                    ])
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "row", staticStyle: { padding: "10px" } },
                  [
                    _c("div", { staticClass: "col-lg-12" }, [
                      _c("strong", [
                        _vm._v("3. Población adulto mayor no asegurada ")
                      ]),
                      _vm._v(" "),
                      _vm.poblacion_no_asegurada != null
                        ? _c("p", [
                            _vm._v(
                              "\n                                Dentro de este grupo de edad se tiene una cantidad de "
                            ),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_no_asegurada
                                    .no_asegurado_mayor_60.cantidad_personas
                                ) + " personas"
                              )
                            ]),
                            _vm._v(", de las cuales "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_no_asegurada
                                    .no_asegurado_mayor_60.rural +
                                    _vm.poblacion_no_asegurada
                                      .no_asegurado_mayor_60.urbano
                                ) + " personas"
                              )
                            ]),
                            _vm._v(
                              ", se encuentran en la situación de población menor de 5 años no asegurada, de lo cual se puede obtener que "
                            ),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_no_asegurada
                                    .no_asegurado_mayor_60.rural
                                ) + " personas"
                              )
                            ]),
                            _vm._v(" se encuentran en zona rural, y "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_no_asegurada
                                    .no_asegurado_mayor_60.urbano
                                ) + " personas"
                              )
                            ]),
                            _vm._v(
                              "  en zona urbana.\n                            "
                            )
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _c("div", {
                        staticStyle: { width: "100%", height: "270px" },
                        attrs: { id: "chartdiv_no_asegurado_2" }
                      })
                    ])
                  ]
                ),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("h4", { staticStyle: { color: "#fd397a" } }, [
                  _vm._v("Determinante social de la salud")
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "row", staticStyle: { padding: "10px" } },
                  [
                    _c("div", { staticClass: "col-lg-12" }, [
                      _c("strong", [_vm._v("1. Población en pobreza ")]),
                      _vm._v(" "),
                      _vm.determinante_salud_array != null
                        ? _c("p", [
                            _vm._v(
                              "De acuerdo a la informacion recolectada, se tiene que "
                            ),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.determinante_salud_array.pobreza
                                    .poblacion_pobreza
                                ) + " personas"
                              )
                            ]),
                            _vm._v(
                              " se encuentran en situación de pobreza, esto representa un "
                            ),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.determinante_salud_array.pobreza.porcentaje_poblacion_pobreza.toFixed(
                                    2
                                  )
                                ) + "%"
                              )
                            ]),
                            _vm._v(" de la población total.")
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.determinante_salud_array != null
                        ? _c("ul", [
                            _c("li", [
                              _vm._v(
                                "\n                                    Población en pobreza (Rural): "
                              ),
                              _c("strong", [
                                _vm._v(
                                  _vm._s(
                                    _vm.determinante_salud_array.pobreza
                                      .poblacion_pobreza_rural
                                  )
                                )
                              ])
                            ]),
                            _vm._v(" "),
                            _c("li", [
                              _vm._v(
                                "\n                                    Población en pobreza (Urbano): "
                              ),
                              _c("strong", [
                                _vm._v(
                                  _vm._s(
                                    _vm.determinante_salud_array.pobreza
                                      .poblacion_pobreza_urbano
                                  )
                                )
                              ])
                            ])
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("div", {
                        staticStyle: { width: "100%", height: "270px" },
                        attrs: { id: "chartdiv_poblacion_pobreza" }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-12" }, [
                      _c("strong", [
                        _vm._v("2. Población por nivel de escolaridad ")
                      ]),
                      _vm._v(" "),
                      _vm.determinante_salud_array != null
                        ? _c("p", [
                            _vm._v("Con una población total de "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.determinante_salud_array.pobreza.poblacion
                                ) + " personas"
                              )
                            ]),
                            _vm._v(" se tiene que: ")
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _vm.determinante_salud_array != null
                        ? _c(
                            "table",
                            {
                              staticClass: "table_data",
                              staticStyle: { width: "100%" }
                            },
                            [
                              _vm._m(2),
                              _vm._v(" "),
                              _c(
                                "tbody",
                                _vm._l(
                                  _vm.determinante_salud_array.escolaridad,
                                  function(item, index) {
                                    return _c("tr", { key: index }, [
                                      _c("td", [
                                        _vm._v(_vm._s(item.escolaridad_nombre))
                                      ]),
                                      _vm._v(" "),
                                      _c("td", [
                                        _vm._v(_vm._s(item.numero_personas))
                                      ])
                                    ])
                                  }
                                ),
                                0
                              )
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("div", {
                        staticStyle: { width: "100%", height: "300px" },
                        attrs: { id: "chartdiv_escolaridad" }
                      })
                    ])
                  ]
                ),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "row", staticStyle: { padding: "10px" } },
                  [
                    _c("div", { staticClass: "col-lg-12" }, [
                      _c("strong", [
                        _vm._v("3. Desempleo y tipos de empleo  ")
                      ]),
                      _vm._v(" "),
                      _vm.determinante_salud_array != null
                        ? _c("p", [
                            _vm._v(
                              "La tasa de desempleo del total municipal es de "
                            ),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.determinante_salud_array.desempleo.TD.toFixed(
                                    2
                                  )
                                ) + " %"
                              )
                            ]),
                            _vm._v(", lo cual quiere decir que "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.determinante_salud_array.desempleo.D
                                ) + " personas "
                              )
                            ]),
                            _vm._v("  de "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.determinante_salud_array.desempleo.FT
                                ) + " personas "
                              )
                            ]),
                            _vm._v(
                              " que componen la (fuerza laboral), estan en busca de empleo. "
                            )
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _vm.determinante_salud_array != null
                        ? _c("ul", [
                            _c("li", [
                              _vm._v(
                                "Personas de genero masculino desempleados: "
                              ),
                              _c("strong", [
                                _vm._v(
                                  _vm._s(
                                    _vm.determinante_salud_array.desempleo
                                      .masculinoTD
                                  )
                                )
                              ])
                            ]),
                            _vm._v(" "),
                            _c("li", [
                              _vm._v(
                                "Personas de genero femenino desempleados: "
                              ),
                              _c("strong", [
                                _vm._v(
                                  _vm._s(
                                    _vm.determinante_salud_array.desempleo
                                      .femeninoTD
                                  )
                                )
                              ])
                            ])
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("p", [_vm._v("Tasa de desempleo por sexo:")]),
                      _vm._v(" "),
                      _c("div", {
                        staticStyle: { width: "100%", height: "270px" },
                        attrs: { id: "chartdiv_desempleo" }
                      })
                    ])
                  ]
                ),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "row", staticStyle: { padding: "10px" } },
                  [
                    _c("strong", [
                      _vm._v("4. Acceso a acueducto y alcantarillado")
                    ]),
                    _vm._v(" "),
                    _vm.determinante_salud_array != null
                      ? _c("p", [
                          _vm._v("Se tiene que "),
                          _c("strong", [
                            _vm._v(
                              _vm._s(
                                _vm.determinante_salud_array.alcantarillado_agua
                                  .viendasSinAguaPotable
                              ) + " Viviendas "
                            )
                          ]),
                          _vm._v(
                            " se encuentran sin el servicio de agua potable y "
                          ),
                          _c("strong", [
                            _vm._v(
                              _vm._s(
                                _vm.determinante_salud_array.alcantarillado_agua
                                  .viendasSinalcantarillado
                              ) + " Viviendas "
                            )
                          ]),
                          _vm._v(
                            " sin el servicio de alcantarillado, lo que corresponde a un "
                          ),
                          _c("strong", [
                            _vm._v(
                              _vm._s(
                                _vm.determinante_salud_array.alcantarillado_agua.porcentajeviendasSinAguaPotable.toFixed(
                                  2
                                )
                              ) + "% "
                            )
                          ]),
                          _vm._v(" y "),
                          _c("strong", [
                            _vm._v(
                              _vm._s(
                                _vm.determinante_salud_array.alcantarillado_agua.porcentajeviendasSinalcantarillado.toFixed(
                                  2
                                )
                              ) + "% "
                            )
                          ]),
                          _vm._v(
                            " respectivamente del total de viviendas caracterizadas (" +
                              _vm._s(
                                _vm.determinante_salud_array.alcantarillado_agua
                                  .totalViviendas
                              ) +
                              ")."
                          )
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    _vm._m(3),
                    _vm._v(" "),
                    _vm._m(4)
                  ]
                ),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("h4", { staticStyle: { color: "#fd397a" } }, [
                  _vm._v("Condiciones de salud")
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "row", staticStyle: { padding: "10px" } },
                  [
                    _c("strong", [
                      _vm._v("1. Población con enfermedades crónicas")
                    ]),
                    _vm._v(" "),
                    _vm.condiciones_salud_array != null
                      ? _c("p", [
                          _vm._v("Se tiene que el "),
                          _c("strong", [
                            _vm._v(
                              _vm._s(
                                _vm.condiciones_salud_array.enfermedades_cronicas.porcentaje_personas_con_enfermedades.toFixed(
                                  2
                                )
                              ) + "%"
                            )
                          ]),
                          _vm._v(
                            " de la población padece al menos una enfermedad cronica, esto quiere decir que "
                          ),
                          _c("strong", [
                            _vm._v(
                              _vm._s(
                                _vm.condiciones_salud_array
                                  .enfermedades_cronicas
                                  .personas_con_enfermedades
                              ) + " Personas"
                            )
                          ]),
                          _vm._v(" de "),
                          _c("strong", [
                            _vm._v(
                              _vm._s(
                                _vm.condiciones_salud_array
                                  .enfermedades_cronicas.numero_personas
                              )
                            )
                          ]),
                          _vm._v(
                            " padecen enfermedades cronicas, las cuales estan divididad de la siguiente manera: "
                          )
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    _vm._m(5)
                  ]
                )
              ]
            )
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-sm-9" }, [
      _c("h4", [_vm._v("INFORME GENERAL SITUACIÓN EN SALUD POBLACIONAL")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "col-lg-7 text-center",
        staticStyle: { "padding-top": "30px" }
      },
      [
        _c("div", {
          staticStyle: { width: "100%", height: "200px" },
          attrs: { id: "chartdiv_edades_torta" }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Nivel de escolaridad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Cantidad de personas")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-12 text-center" }, [
      _c("h5", [_vm._v("Viviendas sin Acceso a Acueducto")]),
      _vm._v(" "),
      _c("h6", [_vm._v("(Por zona)")]),
      _vm._v(" "),
      _c("div", {
        staticStyle: { width: "100%", height: "220px" },
        attrs: { id: "chartdiv_acueducto" }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-12 text-center" }, [
      _c("h5", [_vm._v("Viviendas sin Acceso a Alcantarillado")]),
      _vm._v(" "),
      _c("h6", [_vm._v("(Por zona)")]),
      _vm._v(" "),
      _c("div", {
        staticStyle: { width: "100%", height: "220px" },
        attrs: { id: "chartdiv_alantarillado" }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-12 text-center" }, [
      _c("h5", [_vm._v("Personas con enfermedades cronicas")]),
      _vm._v(" "),
      _c("h6", [_vm._v("(Por tipo de enfermedad)")]),
      _vm._v(" "),
      _c("div", {
        staticStyle: { width: "100%", height: "220px" },
        attrs: { id: "chartdiv_cronica" }
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
/*! exports provided: inicialesMigrantes, poblacion_no_asegurada, determinante_salud, condiciones_salud */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inicialesMigrantes", function() { return inicialesMigrantes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "poblacion_no_asegurada", function() { return poblacion_no_asegurada; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "determinante_salud", function() { return determinante_salud; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "condiciones_salud", function() { return condiciones_salud; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function inicialesMigrantes($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/informes/migrantes', $data);
}
function poblacion_no_asegurada() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/informes/poblacion-no-asegurada');
}
function determinante_salud() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/informes/determinante-salud');
}
function condiciones_salud() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/informes/condiciones-salud');
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