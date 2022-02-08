(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[43],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");
/* harmony import */ var _Servicios_informes__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../Servicios/informes */ "./resources/js/Servicios/informes.js");
/* harmony import */ var vue_apexcharts__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-apexcharts */ "./node_modules/vue-apexcharts/dist/vue-apexcharts.js");
/* harmony import */ var vue_apexcharts__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue_apexcharts__WEBPACK_IMPORTED_MODULE_5__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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






_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]);
/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    this.calcular();
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      combo: "",
      poblacionMigrante: 0,
      migrantesRegulados: 0,
      migrantesNoRegulados: 0,
      datos: {
        migrantes0: 0,
        migrantes115: 0,
        migrantes611: 0,
        migrantes1217: 0,
        migrantes1828: 0,
        migrantes2959: 0,
        migrantes60: 0
      },
      ocupaciones: {
        id: 0,
        descripcion: "",
        cont: 0
      },
      poblacion: {
        migrantes: 0,
        nomigrantes: 0
      },
      series: [],
      series_barra: [],
      series_ocupaciones: []
    };
  },
  methods: {
    calcular: function calcular() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                data = {
                  _token: _this.csrf
                };
                _context.next = 3;
                return _Servicios_informes__WEBPACK_IMPORTED_MODULE_4__["inicialesMigrantes"](data).then(function (respuesta) {
                  _this.poblacionMigrante = respuesta.data.total_migrantes * 100 / respuesta.data.total_poblacion;
                  _this.migrantesRegulados = respuesta.data.total_regulado;
                  _this.migrantesNoRegulados = respuesta.data.total_no_regulado;
                  _this.datos = respuesta.data.edades;
                  _this.ocupaciones = respuesta.data.ocupaciones; //GRAFICA DE PIE

                  //GRAFICA DE PIE
                  _this.series.push({
                    migrantes: "Regulados",
                    cantidad: _this.migrantesRegulados
                  });

                  _this.series.push({
                    migrantes: "No regulados",
                    cantidad: _this.migrantesNoRegulados
                  }); //GRAFICA DE BARS


                  //GRAFICA DE BARS
                  _this.series_barra.push({
                    edad: "0+",
                    migrantes: _this.datos.migrantes0
                  });

                  _this.series_barra.push({
                    edad: "1-5",
                    migrantes: _this.datos.migrantes115
                  });

                  _this.series_barra.push({
                    edad: "6-11",
                    migrantes: _this.datos.migrantes611
                  });

                  _this.series_barra.push({
                    edad: "12-17",
                    migrantes: _this.datos.migrantes1217
                  });

                  _this.series_barra.push({
                    edad: "18-28",
                    migrantes: _this.datos.migrantes1828
                  });

                  _this.series_barra.push({
                    edad: "29-59",
                    migrantes: _this.datos.migrantes2959
                  });

                  _this.series_barra.push({
                    edad: "60+",
                    migrantes: _this.datos.migrantes60
                  });

                  for (var i = 0; i < _this.ocupaciones.length; i++) {
                    _this.series_ocupaciones.push({
                      ocupacion: _this.ocupaciones[i]["descripcion"],
                      migrantes: _this.ocupaciones[i]["cont"]
                    });
                  }

                  console.log(_this.series_ocupaciones);

                  _this.grafica_de_pie();

                  _this.grafica_barra();

                  _this.grafica_de_pie_ocupaciones();
                })["catch"](function (err) {
                  console.log(err);
                });

              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    grafica_de_pie: function grafica_de_pie() {
      // Themes begin
      _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end

      var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartdiv", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieChart3D"]);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["Legend"]();
      chart.data = this.series;
      var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieSeries3D"]());
      series.dataFields.value = "cantidad";
      series.dataFields.category = "migrantes";
    },
    grafica_barra: function grafica_barra() {
      // Themes begin
      _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end
      // Create chart instance

      var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartbarra", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYChart3D"]); // Add data

      chart.data = this.series_barra; // Create axes

      var categoryAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["CategoryAxis"]());
      categoryAxis.dataFields.category = "edad";
      categoryAxis.renderer.labels.template.rotation = 270;
      categoryAxis.renderer.labels.template.hideOversized = false;
      categoryAxis.renderer.minGridDistance = 20;
      categoryAxis.renderer.labels.template.horizontalCenter = "right";
      categoryAxis.renderer.labels.template.verticalCenter = "middle";
      categoryAxis.tooltip.label.rotation = 270;
      categoryAxis.tooltip.label.horizontalCenter = "right";
      categoryAxis.tooltip.label.verticalCenter = "middle";
      var valueAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ValueAxis"]());
      valueAxis.title.text = "Migrantes";
      valueAxis.title.fontWeight = "bold"; // Create series

      var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries3D"]());
      series.dataFields.valueY = "migrantes";
      series.dataFields.categoryX = "edad";
      series.name = "Migrantes";
      series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
      series.columns.template.fillOpacity = 0.8;
      var columnTemplate = series.columns.template;
      columnTemplate.strokeWidth = 2;
      columnTemplate.strokeOpacity = 1;
      columnTemplate.stroke = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["color"]("#FFFFFF");
      columnTemplate.adapter.add("fill", function (fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });
      columnTemplate.adapter.add("stroke", function (stroke, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });
      chart.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYCursor"]();
      chart.cursor.lineX.strokeOpacity = 0;
      chart.cursor.lineY.strokeOpacity = 0;
    },
    grafica_de_pie_ocupaciones: function grafica_de_pie_ocupaciones() {
      // Themes begin
      _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end

      var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartocupaciones", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieChart3D"]);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["Legend"]();
      chart.data = this.series_ocupaciones;
      var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieSeries3D"]());
      series.dataFields.value = "migrantes";
      series.dataFields.category = "ocupacion";
    },
    filtrar: function filtrar() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                data = {
                  _token: _this2.csrf,
                  _tipo: _this2.combo
                }; //alert(this.combo);

                if (!(_this2.combo == "")) {
                  _context2.next = 6;
                  break;
                }

                _context2.next = 4;
                return IndicadoresService.spa(data).then(function (respuesta) {
                  _this2.poblacion = respuesta.data["poblacion"];

                  _this2.grafica_barras(); //console.log(this.serie);

                })["catch"](function (err) {
                  console.log(err);
                });

              case 4:
                _context2.next = 8;
                break;

              case 6:
                _context2.next = 8;
                return IndicadoresService.filtrospa(data).then(function (respuesta) {
                  _this2.poblacion = respuesta.data["poblacion"];

                  _this2.grafica_barras(); //console.log(this.serie);

                })["catch"](function (err) {
                  console.log(err);
                });

              case 8:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25& ***!
  \*************************************************************************************************************************************************************************************************************************/
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
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-lg-6 text-center" },
                [
                  _c("h5", [_vm._v("Población migrante")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: _vm.poblacionMigrante,
                        size: 250,
                        angle: -90,
                        gap: 10,
                        legend: true,
                        legendValue: 180,
                        thickness: 8,
                        emptyThickness: "5%",
                        dash: "60 0.9",
                        color: "#068204",
                        noData: false,
                        loading: false,
                        fontColor: "white",
                        half: false,
                        "line-mode": "out 2"
                      }
                    },
                    [
                      _c(
                        "p",
                        {
                          staticStyle: {
                            "font-size": "45px",
                            "font-weight": "bold"
                          },
                          attrs: { slot: "legend-caption" },
                          slot: "legend-caption"
                        },
                        [
                          _vm._v(
                            "\n                  " +
                              _vm._s(Math.round(_vm.poblacionMigrante)) +
                              "%\n                "
                          )
                        ]
                      )
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6 text-center" }, [
                _c("h5", [_vm._v("Estado migratorio")]),
                _vm._v(" "),
                _c("div", {
                  staticStyle: { width: "100%", height: "250px" },
                  attrs: { id: "chartdiv" }
                }),
                _vm._v(" "),
                _c("b", [
                  _vm._v(
                    "\n                El\n                " +
                      _vm._s(
                        Math.round(
                          (_vm.migrantesNoRegulados * 100) /
                            (_vm.migrantesNoRegulados + _vm.migrantesRegulados)
                        )
                      ) +
                      "% de la poblacion migrante no se encuentran registrados como\n                migrantes."
                  )
                ])
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _vm._m(1),
        _vm._v(" "),
        _vm._m(2)
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-body" }, [
        _c("h3", [_vm._v("INFORME POBLACION MIGRANTE")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-12 text-center" }, [
            _c("h4", [_vm._v("Población migrante por grupo de edad")]),
            _vm._v(" "),
            _c("div", {
              staticStyle: { width: "100%", height: "400px" },
              attrs: { id: "chartbarra" }
            })
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-12 text-center" }, [
            _c("h4", [_vm._v("Principales ocupaciones de los migrantes")]),
            _vm._v(" "),
            _c("div", {
              staticStyle: { width: "100%", height: "400px" },
              attrs: { id: "chartocupaciones" }
            })
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Servicios/informes.js":
/*!********************************************!*\
  !*** ./resources/js/Servicios/informes.js ***!
  \********************************************/
/*! exports provided: inicialesMigrantes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inicialesMigrantes", function() { return inicialesMigrantes; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function inicialesMigrantes($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/informes/migrantes', $data);
}

/***/ }),

/***/ "./resources/js/Vistas/Informes/poblacionMigrante.vue":
/*!************************************************************!*\
  !*** ./resources/js/Vistas/Informes/poblacionMigrante.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./poblacionMigrante.vue?vue&type=template&id=505b7c25& */ "./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25&");
/* harmony import */ var _poblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./poblacionMigrante.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _poblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__["render"],
  _poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Informes/poblacionMigrante.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./poblacionMigrante.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./poblacionMigrante.vue?vue&type=template&id=505b7c25& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);