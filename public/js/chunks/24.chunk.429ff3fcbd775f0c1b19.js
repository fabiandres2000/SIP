(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[24],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/ayu.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
!(function webpackMissingModule() { var e = new Error("Cannot find module '../Servicios/caracterizacion_servicios'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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


/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    // $("html").css("MozTransform", "scale(.98)");
    // var zoom = 1.5;
    // var docViewer = getBrowser().mCurrentBrowser.markupDocumentViewer;
    // docViewer.fullZoom = zoom;
    var offcanvas = new KTOffcanvas("kt_user_profile_aside", {
      overlay: true,
      baseClass: "kt-app__aside",
      closeBy: "kt_user_profile_aside_close",
      toggleBy: "kt_subheader_mobile_toggle"
    });
    this.nuevo();
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
    };
  },
  methods: {
    nuevo: function () {
      var _nuevo = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var loading, config, ctx, myDoughnut;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                // demo loading
                loading = new KTDialog({
                  type: "loader",
                  placement: "top center",
                  message: "Cargando ..."
                });
                loading.show();
                setTimeout(function () {
                  loading.hide();
                }, 3000); //POBLACION ENTREVISTADA

                if (this.$refs.graficaPobEnt) {
                  _context.next = 5;
                  break;
                }

                return _context.abrupt("return");

              case 5:
                config = {
                  type: "doughnut",
                  data: {
                    datasets: [{
                      data: [35, 30],
                      backgroundColor: ["#34bfa3", "#fd3995", "#5d78ff"]
                    }],
                    labels: ["Población Total", "Población Entrevistada"]
                  },
                  options: {
                    cutoutPercentage: 75,
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                      display: false,
                      position: "bottom"
                    },
                    title: {
                      display: false,
                      text: "Technology"
                    },
                    animation: {
                      animateScale: true,
                      animateRotate: true
                    },
                    tooltips: {
                      enabled: false,
                      intersect: false,
                      mode: "nearest",
                      bodySpacing: 5,
                      yPadding: 10,
                      xPadding: 10,
                      caretPadding: 0,
                      displayColors: false,
                      backgroundColor: "#5d78ff",
                      titleFontColor: "#ffffff",
                      cornerRadius: 4,
                      footerSpacing: 0,
                      titleSpacing: 0
                    }
                  }
                };
                ctx = this.$refs.graficaPobEnt;
                myDoughnut = new Chart(ctx, config); //POBLACION ENTREVISTADA
                //VIVIENDAS VISITADAS

                if (this.$refs.graficaVivVi) {
                  _context.next = 10;
                  break;
                }

                return _context.abrupt("return");

              case 10:
                config = {
                  type: "doughnut",
                  data: {
                    datasets: [{
                      data: [300, 20],
                      backgroundColor: ["#34bfa3", "#fd3995", "#5d78ff"]
                    }],
                    labels: ["Viviendas Totales", "Viviendas Visitadas"]
                  },
                  options: {
                    cutoutPercentage: 75,
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                      display: false,
                      position: "top"
                    },
                    title: {
                      display: false,
                      text: "Technology"
                    },
                    animation: {
                      animateScale: true,
                      animateRotate: true
                    },
                    tooltips: {
                      enabled: false,
                      intersect: false,
                      mode: "nearest",
                      bodySpacing: 5,
                      yPadding: 10,
                      xPadding: 10,
                      caretPadding: 0,
                      displayColors: false,
                      backgroundColor: "#5d78ff",
                      titleFontColor: "#ffffff",
                      cornerRadius: 4,
                      footerSpacing: 0,
                      titleSpacing: 0
                    }
                  }
                };
                ctx = this.$refs.graficaVivVi;
                myDoughnut = new Chart(ctx, config); //VIVIENDAS VISITADAS
                //IDENTIFICACION DE RIESGO SALUD

                if (this.$refs.graficaIdeRieSal) {
                  _context.next = 15;
                  break;
                }

                return _context.abrupt("return");

              case 15:
                config = {
                  type: "doughnut",
                  data: {
                    datasets: [{
                      data: [100, 35],
                      backgroundColor: ["#34bfa3", "#fd3995", "#5d78ff"]
                    }],
                    labels: ["Población Total", "Porcentaje de Salud"]
                  },
                  options: {
                    cutoutPercentage: 75,
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                      display: false,
                      position: "top"
                    },
                    title: {
                      display: false,
                      text: "Technology"
                    },
                    animation: {
                      animateScale: true,
                      animateRotate: true
                    },
                    tooltips: {
                      enabled: false,
                      intersect: false,
                      mode: "nearest",
                      bodySpacing: 5,
                      yPadding: 10,
                      xPadding: 10,
                      caretPadding: 0,
                      displayColors: false,
                      backgroundColor: "#5d78ff",
                      titleFontColor: "#ffffff",
                      cornerRadius: 4,
                      footerSpacing: 0,
                      titleSpacing: 0
                    }
                  }
                };
                ctx = this.$refs.graficaIdeRieSal;
                myDoughnut = new Chart(ctx, config); //IDENTIFICACION DE RIESGO SALUD
                //IDENTIFICACION DE RIESGO SALUD

                if (this.$refs.graficaIdeRieAmb) {
                  _context.next = 20;
                  break;
                }

                return _context.abrupt("return");

              case 20:
                config = {
                  type: "doughnut",
                  data: {
                    datasets: [{
                      data: [100, 32],
                      backgroundColor: ["#34bfa3", "#fd3995", "#5d78ff"]
                    }],
                    labels: ["Población Total", "Porcentaje Ambiental"]
                  },
                  options: {
                    cutoutPercentage: 75,
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                      display: false,
                      position: "top"
                    },
                    title: {
                      display: false,
                      text: "Technology"
                    },
                    animation: {
                      animateScale: true,
                      animateRotate: true
                    },
                    tooltips: {
                      enabled: false,
                      intersect: false,
                      mode: "nearest",
                      bodySpacing: 5,
                      yPadding: 10,
                      xPadding: 10,
                      caretPadding: 0,
                      displayColors: false,
                      backgroundColor: "#5d78ff",
                      titleFontColor: "#ffffff",
                      cornerRadius: 4,
                      footerSpacing: 0,
                      titleSpacing: 0
                    }
                  }
                };
                ctx = this.$refs.graficaIdeRieAmb;
                myDoughnut = new Chart(ctx, config); //IDENTIFICACION DE RIESGO SALUD

              case 23:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function nuevo() {
        return _nuevo.apply(this, arguments);
      }

      return nuevo;
    }()
  }
});

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
  return _c("div", [
    _c("div", { staticStyle: { "margin-top": "-4%" } }, [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "tab-content" }, [
        _c(
          "div",
          {
            staticClass: "tab-pane active",
            attrs: { id: "tabZonas", role: "tabpanel" }
          },
          [
            _c("div", {
              staticClass:
                "kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
            }),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "kt-content kt-grid__item kt-grid__item--fluid",
                attrs: { id: "kt_content" }
              },
              [
                _c(
                  "div",
                  {
                    staticClass:
                      "kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app"
                  },
                  [
                    _vm._m(1),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "kt-grid__item kt-app__toggle kt-app__aside",
                        attrs: { id: "kt_user_profile_aside" }
                      },
                      [
                        _c(
                          "div",
                          {
                            staticClass: "kt-portlet kt-portlet--height-fluid-"
                          },
                          [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "kt-portlet__body kt-portlet__body--fit-y"
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "kt-widget kt-widget--user-profile-1"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "kt-widget__body" },
                                      [
                                        _c("br"),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          { staticClass: "kt-widget__items" },
                                          [
                                            _c(
                                              "a",
                                              {
                                                staticClass: "kt-widget__item",
                                                attrs: { href: "javascript:;" }
                                              },
                                              [
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "kt-widget__section"
                                                  },
                                                  [
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__icon"
                                                      },
                                                      [
                                                        _c(
                                                          "svg",
                                                          {
                                                            staticClass:
                                                              "kt-svg-icon",
                                                            attrs: {
                                                              xmlns:
                                                                "http://www.w3.org/2000/svg",
                                                              "xmlns:xlink":
                                                                "http://www.w3.org/1999/xlink",
                                                              width: "24px",
                                                              height: "24px",
                                                              viewBox:
                                                                "0 0 24 24",
                                                              version: "1.1"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "g",
                                                              {
                                                                attrs: {
                                                                  stroke:
                                                                    "none",
                                                                  "stroke-width":
                                                                    "1",
                                                                  fill: "none",
                                                                  "fill-rule":
                                                                    "evenodd"
                                                                }
                                                              },
                                                              [
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id: "bound",
                                                                    x: "0",
                                                                    y: "0",
                                                                    width: "24",
                                                                    height: "24"
                                                                  }
                                                                }),
                                                                _vm._v(" "),
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id:
                                                                      "Rectangle",
                                                                    fill:
                                                                      "#000000",
                                                                    x: "4",
                                                                    y: "4",
                                                                    width: "16",
                                                                    height:
                                                                      "16",
                                                                    rx: "2"
                                                                  }
                                                                })
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__desc"
                                                      },
                                                      [_vm._v("Zona 1")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "a",
                                              {
                                                staticClass: "kt-widget__item",
                                                attrs: { href: "javascript:;" }
                                              },
                                              [
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "kt-widget__section"
                                                  },
                                                  [
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__icon"
                                                      },
                                                      [
                                                        _c(
                                                          "svg",
                                                          {
                                                            staticClass:
                                                              "kt-svg-icon",
                                                            attrs: {
                                                              xmlns:
                                                                "http://www.w3.org/2000/svg",
                                                              "xmlns:xlink":
                                                                "http://www.w3.org/1999/xlink",
                                                              width: "24px",
                                                              height: "24px",
                                                              viewBox:
                                                                "0 0 24 24",
                                                              version: "1.1"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "g",
                                                              {
                                                                attrs: {
                                                                  stroke:
                                                                    "none",
                                                                  "stroke-width":
                                                                    "1",
                                                                  fill: "none",
                                                                  "fill-rule":
                                                                    "evenodd"
                                                                }
                                                              },
                                                              [
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id: "bound",
                                                                    x: "0",
                                                                    y: "0",
                                                                    width: "24",
                                                                    height: "24"
                                                                  }
                                                                }),
                                                                _vm._v(" "),
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id:
                                                                      "Rectangle",
                                                                    fill:
                                                                      "#000000",
                                                                    x: "4",
                                                                    y: "4",
                                                                    width: "16",
                                                                    height:
                                                                      "16",
                                                                    rx: "2"
                                                                  }
                                                                })
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__desc"
                                                      },
                                                      [_vm._v("Zona 2")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "a",
                                              {
                                                staticClass: "kt-widget__item",
                                                attrs: { href: "javascript:;" }
                                              },
                                              [
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "kt-widget__section"
                                                  },
                                                  [
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__icon"
                                                      },
                                                      [
                                                        _c(
                                                          "svg",
                                                          {
                                                            staticClass:
                                                              "kt-svg-icon",
                                                            attrs: {
                                                              xmlns:
                                                                "http://www.w3.org/2000/svg",
                                                              "xmlns:xlink":
                                                                "http://www.w3.org/1999/xlink",
                                                              width: "24px",
                                                              height: "24px",
                                                              viewBox:
                                                                "0 0 24 24",
                                                              version: "1.1"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "g",
                                                              {
                                                                attrs: {
                                                                  stroke:
                                                                    "none",
                                                                  "stroke-width":
                                                                    "1",
                                                                  fill: "none",
                                                                  "fill-rule":
                                                                    "evenodd"
                                                                }
                                                              },
                                                              [
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id: "bound",
                                                                    x: "0",
                                                                    y: "0",
                                                                    width: "24",
                                                                    height: "24"
                                                                  }
                                                                }),
                                                                _vm._v(" "),
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id:
                                                                      "Rectangle",
                                                                    fill:
                                                                      "#000000",
                                                                    x: "4",
                                                                    y: "4",
                                                                    width: "16",
                                                                    height:
                                                                      "16",
                                                                    rx: "2"
                                                                  }
                                                                })
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__desc"
                                                      },
                                                      [_vm._v("Zona 3")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "a",
                                              {
                                                staticClass: "kt-widget__item",
                                                attrs: { href: "javascript:;" }
                                              },
                                              [
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "kt-widget__section"
                                                  },
                                                  [
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__icon"
                                                      },
                                                      [
                                                        _c(
                                                          "svg",
                                                          {
                                                            staticClass:
                                                              "kt-svg-icon",
                                                            attrs: {
                                                              xmlns:
                                                                "http://www.w3.org/2000/svg",
                                                              "xmlns:xlink":
                                                                "http://www.w3.org/1999/xlink",
                                                              width: "24px",
                                                              height: "24px",
                                                              viewBox:
                                                                "0 0 24 24",
                                                              version: "1.1"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "g",
                                                              {
                                                                attrs: {
                                                                  stroke:
                                                                    "none",
                                                                  "stroke-width":
                                                                    "1",
                                                                  fill: "none",
                                                                  "fill-rule":
                                                                    "evenodd"
                                                                }
                                                              },
                                                              [
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id: "bound",
                                                                    x: "0",
                                                                    y: "0",
                                                                    width: "24",
                                                                    height: "24"
                                                                  }
                                                                }),
                                                                _vm._v(" "),
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id:
                                                                      "Rectangle",
                                                                    fill:
                                                                      "#000000",
                                                                    x: "4",
                                                                    y: "4",
                                                                    width: "16",
                                                                    height:
                                                                      "16",
                                                                    rx: "2"
                                                                  }
                                                                })
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__desc"
                                                      },
                                                      [_vm._v("Zona 4")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c("hr"),
                                            _vm._v(" "),
                                            _c(
                                              "a",
                                              {
                                                staticClass: "kt-widget__item",
                                                attrs: { href: "javascript:;" }
                                              },
                                              [
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "kt-widget__section"
                                                  },
                                                  [
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__icon"
                                                      },
                                                      [
                                                        _c(
                                                          "svg",
                                                          {
                                                            staticClass:
                                                              "kt-svg-icon",
                                                            attrs: {
                                                              xmlns:
                                                                "http://www.w3.org/2000/svg",
                                                              "xmlns:xlink":
                                                                "http://www.w3.org/1999/xlink",
                                                              width: "24px",
                                                              height: "24px",
                                                              viewBox:
                                                                "0 0 24 24",
                                                              version: "1.1"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "g",
                                                              {
                                                                attrs: {
                                                                  stroke:
                                                                    "none",
                                                                  "stroke-width":
                                                                    "1",
                                                                  fill: "none",
                                                                  "fill-rule":
                                                                    "evenodd"
                                                                }
                                                              },
                                                              [
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id: "bound",
                                                                    x: "0",
                                                                    y: "0",
                                                                    width: "24",
                                                                    height: "24"
                                                                  }
                                                                }),
                                                                _vm._v(" "),
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id:
                                                                      "Rectangle",
                                                                    fill:
                                                                      "#000000",
                                                                    x: "4",
                                                                    y: "4",
                                                                    width: "16",
                                                                    height:
                                                                      "16",
                                                                    rx: "2"
                                                                  }
                                                                })
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__desc"
                                                      },
                                                      [_vm._v("Kit Entregados")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c("hr"),
                                            _vm._v(" "),
                                            _c(
                                              "a",
                                              {
                                                staticClass: "kt-widget__item",
                                                attrs: { href: "javascript:;" }
                                              },
                                              [
                                                _c(
                                                  "span",
                                                  {
                                                    staticClass:
                                                      "kt-widget__section"
                                                  },
                                                  [
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__icon"
                                                      },
                                                      [
                                                        _c(
                                                          "svg",
                                                          {
                                                            staticClass:
                                                              "kt-svg-icon",
                                                            attrs: {
                                                              xmlns:
                                                                "http://www.w3.org/2000/svg",
                                                              "xmlns:xlink":
                                                                "http://www.w3.org/1999/xlink",
                                                              width: "24px",
                                                              height: "24px",
                                                              viewBox:
                                                                "0 0 24 24",
                                                              version: "1.1"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "g",
                                                              {
                                                                attrs: {
                                                                  stroke:
                                                                    "none",
                                                                  "stroke-width":
                                                                    "1",
                                                                  fill: "none",
                                                                  "fill-rule":
                                                                    "evenodd"
                                                                }
                                                              },
                                                              [
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id: "bound",
                                                                    x: "0",
                                                                    y: "0",
                                                                    width: "24",
                                                                    height: "24"
                                                                  }
                                                                }),
                                                                _vm._v(" "),
                                                                _c("rect", {
                                                                  attrs: {
                                                                    id:
                                                                      "Rectangle",
                                                                    fill:
                                                                      "#000000",
                                                                    x: "4",
                                                                    y: "4",
                                                                    width: "16",
                                                                    height:
                                                                      "16",
                                                                    rx: "2"
                                                                  }
                                                                })
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "kt-widget__desc"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Vias de Accesos"
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
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "kt-grid__item kt-grid__item--fluid kt-app__content"
                      },
                      [
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-md-3" }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "kt-portlet kt-portlet--height-fluid"
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "kt-widget14",
                                    staticStyle: { cursor: "pointer" }
                                  },
                                  [
                                    _vm._m(2),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "kt-widget14__content" },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "kt-widget14__chart text-center"
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "kt-widget14__stat kt-font-danger font-weight-bold text-center",
                                                staticStyle: {
                                                  "font-size": "10px"
                                                }
                                              },
                                              [_vm._v("45%")]
                                            ),
                                            _vm._v(" "),
                                            _c("canvas", {
                                              ref: "graficaPobEnt",
                                              staticStyle: {
                                                height: "60px",
                                                width: "100px"
                                              }
                                            })
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(3)
                                  ]
                                )
                              ]
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-3" }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "kt-portlet kt-portlet--height-fluid"
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "kt-widget14",
                                    staticStyle: { cursor: "pointer" }
                                  },
                                  [
                                    _vm._m(4),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "kt-widget14__content" },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "kt-widget14__chart text-center"
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "kt-widget14__stat kt-font-danger font-weight-bold text-center",
                                                staticStyle: {
                                                  "font-size": "10px"
                                                }
                                              },
                                              [_vm._v("15%")]
                                            ),
                                            _vm._v(" "),
                                            _c("canvas", {
                                              ref: "graficaVivVi",
                                              staticStyle: {
                                                height: "60px",
                                                width: "100px"
                                              }
                                            })
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(5)
                                  ]
                                )
                              ]
                            )
                          ]),
                          _vm._v(" "),
                          _vm._m(6),
                          _vm._v(" "),
                          _vm._m(7)
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-md-3" }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "kt-portlet kt-portlet--height-fluid"
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "kt-widget14",
                                    staticStyle: { cursor: "pointer" }
                                  },
                                  [
                                    _vm._m(8),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "kt-widget14__content" },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "kt-widget14__chart text-center"
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "kt-widget14__stat kt-font-danger font-weight-bold text-center",
                                                staticStyle: {
                                                  "font-size": "10px"
                                                }
                                              },
                                              [_vm._v("45%")]
                                            ),
                                            _vm._v(" "),
                                            _c("canvas", {
                                              ref: "graficaIdeRieSal",
                                              staticStyle: {
                                                height: "80px",
                                                width: "120px"
                                              }
                                            })
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(9)
                                  ]
                                )
                              ]
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-3" }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "kt-portlet kt-portlet--height-fluid"
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "kt-widget14",
                                    staticStyle: { cursor: "pointer" }
                                  },
                                  [
                                    _vm._m(10),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "kt-widget14__content" },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "kt-widget14__chart text-center"
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "kt-widget14__stat kt-font-danger font-weight-bold text-center",
                                                staticStyle: {
                                                  "font-size": "10px"
                                                }
                                              },
                                              [_vm._v("18%")]
                                            ),
                                            _vm._v(" "),
                                            _c("canvas", {
                                              ref: "graficaIdeRieAmb",
                                              staticStyle: {
                                                height: "80px",
                                                width: "120px"
                                              }
                                            })
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(11)
                                  ]
                                )
                              ]
                            )
                          ]),
                          _vm._v(" "),
                          _vm._m(12),
                          _vm._v(" "),
                          _vm._m(13)
                        ]),
                        _vm._v(" "),
                        _vm._m(14)
                      ]
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
          {
            staticClass: "tab-pane",
            attrs: { id: "tabPoblacion", role: "tabpanel" }
          },
          [
            _vm._v(
              "It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            )
          ]
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "kt-portlet kt-portlet--height-fluid",
        staticStyle: { height: "90px" }
      },
      [
        _c("div", { staticClass: "kt-portlet__body" }, [
          _c(
            "ul",
            {
              staticClass: "nav nav-pills nav-fill",
              attrs: { role: "tablist" }
            },
            [
              _c("li", { staticClass: "nav-item" }, [
                _c(
                  "a",
                  {
                    staticClass: "nav-link active font-weight-bold",
                    staticStyle: { "font-size": "18px" },
                    attrs: { "data-toggle": "tab", href: "#tabZonas" }
                  },
                  [
                    _c("i", { staticClass: "la la-comment" }),
                    _vm._v(" Zonas\n            ")
                  ]
                )
              ]),
              _vm._v(" "),
              _c("li", { staticClass: "nav-item" }, [
                _c(
                  "a",
                  {
                    staticClass: "nav-link font-weight-bold",
                    staticStyle: { "font-size": "18px" },
                    attrs: { "data-toggle": "tab", href: "#tabPoblacion" }
                  },
                  [
                    _c("i", { staticClass: "la la-users" }),
                    _vm._v(" Población\n            ")
                  ]
                )
              ]),
              _vm._v(" "),
              _c("li", { staticClass: "nav-item" }, [
                _c(
                  "a",
                  {
                    staticClass: "nav-link font-weight-bold",
                    staticStyle: { "font-size": "18px" },
                    attrs: { "data-toggle": "tab", href: "#tabSalud" }
                  },
                  [
                    _c("i", { staticClass: "la la-user-plus" }),
                    _vm._v(" Salud\n            ")
                  ]
                )
              ]),
              _vm._v(" "),
              _c("li", { staticClass: "nav-item" }, [
                _c(
                  "a",
                  {
                    staticClass: "nav-link font-weight-bold",
                    staticStyle: { "font-size": "18px" },
                    attrs: { "data-toggle": "tab", href: "#tabAmbiental" }
                  },
                  [
                    _c("i", { staticClass: "la la-outdent" }),
                    _vm._v(" Ambiental\n            ")
                  ]
                )
              ])
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "kt-app__aside-close",
        attrs: { id: "kt_user_profile_aside_close" }
      },
      [_c("i", { staticClass: "la la-close" })]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-widget14__header" }, [
      _c(
        "h3",
        {
          staticClass: "kt-widget14__title text-center font-weight-bold",
          staticStyle: { "font-size": "10px" }
        },
        [_vm._v("Población Entrevistada")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-widget14__info" }, [
      _c(
        "h3",
        {
          staticClass:
            "kt-widget14__legend kt-font-danger font-weight-bold text-center",
          staticStyle: { "font-size": "12px" }
        },
        [_vm._v("705 Personas")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-widget14__header" }, [
      _c(
        "h3",
        {
          staticClass: "kt-widget14__title text-center font-weight-bold",
          staticStyle: { "font-size": "10px" }
        },
        [_vm._v("Viviendas Visitadas")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-widget14__info" }, [
      _c(
        "h3",
        {
          staticClass:
            "kt-widget14__legend kt-font-danger font-weight-bold text-center",
          staticStyle: { "font-size": "12px" }
        },
        [_vm._v("200 Viviendas")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "kt-portlet kt-portlet--height-fluid" }, [
        _c(
          "div",
          { staticClass: "kt-widget14", staticStyle: { cursor: "pointer" } },
          [
            _c("div", { staticClass: "kt-widget14__header" }, [
              _c(
                "h3",
                {
                  staticClass:
                    "kt-widget14__title text-center font-weight-bold",
                  staticStyle: { "font-size": "10px" }
                },
                [_vm._v("Hogares Visitados")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-widget14__content" }, [
              _c("div", { staticClass: "kt-widget14__chart text-center" }, [
                _c(
                  "div",
                  {
                    staticClass: "kt-font-danger font-weight-bold text-center"
                  },
                  [
                    _c("img", {
                      staticStyle: {
                        height: "60px",
                        width: "100px",
                        float: "right"
                      },
                      attrs: { src: "" }
                    })
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-widget14__info" }, [
              _c(
                "h3",
                {
                  staticClass:
                    "kt-widget14__legend kt-font-danger font-weight-bold text-center",
                  staticStyle: { "font-size": "12px" }
                },
                [_vm._v("200 Hogares")]
              )
            ])
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "kt-portlet kt-portlet--height-fluid" }, [
        _c(
          "div",
          { staticClass: "kt-widget14", staticStyle: { cursor: "pointer" } },
          [
            _c("div", { staticClass: "kt-widget14__header" }, [
              _c(
                "h3",
                {
                  staticClass:
                    "kt-widget14__title text-center font-weight-bold",
                  staticStyle: { "font-size": "10px" }
                },
                [_vm._v("Riesgos Materializados")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-widget14__content" }, [
              _c("div", { staticClass: "kt-widget14__chart text-center" }, [
                _c(
                  "div",
                  {
                    staticClass: "kt-font-danger font-weight-bold text-center"
                  },
                  [
                    _c("img", {
                      staticStyle: {
                        height: "60px",
                        width: "100px",
                        float: "right"
                      },
                      attrs: { src: "" }
                    })
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-widget14__info" }, [
              _c("h3", {
                staticClass:
                  "kt-widget14__legend kt-font-danger font-weight-bold text-center",
                staticStyle: { "font-size": "12px" }
              })
            ])
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-widget14__header" }, [
      _c(
        "h3",
        {
          staticClass: "kt-widget14__title text-center font-weight-bold",
          staticStyle: { "font-size": "12px" }
        },
        [_vm._v("Identificación de Riesgo")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-widget14__info" }, [
      _c(
        "h3",
        {
          staticClass:
            "kt-widget14__legend kt-font-danger font-weight-bold text-center",
          staticStyle: { "font-size": "14px" }
        },
        [_vm._v("% Salud")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-widget14__header" }, [
      _c(
        "h3",
        {
          staticClass: "kt-widget14__title text-center font-weight-bold",
          staticStyle: { "font-size": "12px" }
        },
        [_vm._v("Identificación de Riesgo")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-widget14__info" }, [
      _c(
        "h3",
        {
          staticClass:
            "kt-widget14__legend kt-font-danger font-weight-bold text-center",
          staticStyle: { "font-size": "14px" }
        },
        [_vm._v("% Ambiental")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "kt-portlet kt-portlet--height-fluid" }, [
        _c(
          "div",
          { staticClass: "kt-widget14", staticStyle: { cursor: "pointer" } },
          [
            _c("div", { staticClass: "kt-widget14__header" }, [
              _c(
                "h3",
                {
                  staticClass:
                    "kt-widget14__title text-center font-weight-bold",
                  staticStyle: { "font-size": "12px" }
                },
                [_vm._v("Nivel Socioeconomico")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-widget14__content" }, [
              _c("div", { staticClass: "kt-widget14__chart text-center" }, [
                _c(
                  "div",
                  {
                    staticClass: "kt-font-danger font-weight-bold text-center"
                  },
                  [
                    _c("img", {
                      staticStyle: {
                        height: "80px",
                        width: "120px",
                        float: "right"
                      },
                      attrs: { src: "" }
                    })
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-widget14__info" }, [
              _c("h3", {
                staticClass:
                  "kt-widget14__legend kt-font-danger font-weight-bold text-center",
                staticStyle: { "font-size": "14px" }
              })
            ])
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "kt-portlet kt-portlet--height-fluid" }, [
        _c(
          "div",
          { staticClass: "kt-widget14", staticStyle: { cursor: "pointer" } },
          [
            _c("div", { staticClass: "kt-widget14__header" }, [
              _c(
                "h3",
                {
                  staticClass:
                    "kt-widget14__title text-center font-weight-bold",
                  staticStyle: { "font-size": "12px" }
                },
                [_vm._v("Georeferenciación")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-widget14__content" }, [
              _c("div", { staticClass: "kt-widget14__chart text-center" }, [
                _c(
                  "div",
                  {
                    staticClass: "kt-font-danger font-weight-bold text-center"
                  },
                  [
                    _c("img", {
                      staticStyle: {
                        height: "80px",
                        width: "120px",
                        float: "right"
                      },
                      attrs: { src: "" }
                    })
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-widget14__info" }, [
              _c("h3", {
                staticClass:
                  "kt-widget14__legend kt-font-danger font-weight-bold text-center",
                staticStyle: { "font-size": "14px" }
              })
            ])
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-3" }, [
        _c("div", { staticClass: "kt-portlet kt-portlet--height-fluid" }, [
          _c(
            "div",
            { staticClass: "kt-widget14", staticStyle: { cursor: "pointer" } },
            [
              _c("div", { staticClass: "kt-widget14__header" }, [
                _c(
                  "h3",
                  {
                    staticClass:
                      "kt-widget14__title text-center font-weight-bold",
                    staticStyle: { "font-size": "12px" }
                  },
                  [_vm._v("Población Migrante")]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "kt-widget14__content" }, [
                _c("div", { staticClass: "kt-widget14__chart text-center" }, [
                  _c(
                    "div",
                    {
                      staticClass: "kt-font-danger font-weight-bold text-center"
                    },
                    [
                      _c("img", {
                        staticStyle: {
                          height: "80px",
                          width: "120px",
                          float: "right"
                        }
                      })
                    ]
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "kt-widget14__info" }, [
                _c("h3", {
                  staticClass:
                    "kt-widget14__legend kt-font-danger font-weight-bold text-center",
                  staticStyle: { "font-size": "14px" }
                })
              ])
            ]
          )
        ])
      ])
    ])
  }
]
render._withStripped = true



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
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
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