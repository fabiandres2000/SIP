(window.webpackJsonp=window.webpackJsonp||[]).push([[58],{127:function(t,a,n){"use strict";n.d(a,"e",(function(){return i})),n.d(a,"c",(function(){return r})),n.d(a,"i",(function(){return s})),n.d(a,"d",(function(){return o})),n.d(a,"f",(function(){return c})),n.d(a,"b",(function(){return l})),n.d(a,"g",(function(){return u})),n.d(a,"h",(function(){return f})),n.d(a,"j",(function(){return d})),n.d(a,"a",(function(){return p}));var e=n(0);function i(t){return Object(e.a)().post("/reportes/gestantes",t)}function r(t){return Object(e.a)().post("/reportes/exportarGestantes",t)}function s(t){return Object(e.a)().post("/reportes/nutricional",t)}function o(t){return Object(e.a)().post("/reportes/exportarNutricional",t)}function c(t){return Object(e.a)().post("/reportes/cronicas",t)}function l(t){return Object(e.a)().post("/reportes/cronicaspdf",t)}function u(t){return Object(e.a)().post("/reportes/migrantes",t)}function f(t){return Object(e.a)().post("/reportes/migrantespdf",t)}function d(t,a){return Object(e.a)().get("/reportes/personas-discapacitadas?tipo="+t+"&id="+a)}function p(t,a){return Object(e.a)().get("/reportes/adulto-mayor?tipo="+t+"&id="+a)}},737:function(t,a,n){"use strict";n.r(a);var e=n(1),i=n.n(e),r=n(127),s=n(10);function o(t,a,n,e,i,r,s){try{var o=t[r](s),c=o.value}catch(t){return void n(t)}o.done?a(c):Promise.resolve(c).then(e,i)}function c(t){return function(){var a=this,n=arguments;return new Promise((function(e,i){var r=t.apply(a,n);function s(t){o(r,e,i,s,c,"next",t)}function c(t){o(r,e,i,s,c,"throw",t)}s(void 0)}))}}var l,u={mounted:function(){this.consultar(1)},name:"gestan",data:function(){return{nutricional:[],paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},ruta:"",offset:4,csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),rango:"Todos",valPdf:!0,porceMujeres:0,total_mujeres:0}},computed:{esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var a=t+2*this.offset;a>=this.paginacion.ultima_pagina&&(a=this.paginacion.ultima_pagina);for(var n=[];t<=a;)n.push(t),t++;return n},spinPdf:function(){return this.valPdf?{}:["kt-spinner","kt-spinner--right","kt-spinner--sm","kt-spinner--light"]}},methods:{consultar:(l=c(i.a.mark((function t(a){var n,e=this;return i.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return this.nutricional=[],n={rango:this.rango,_token:this.csrf,page:a,tipo:"paginate"},t.prev=2,t.next=5,r.i(n).then((function(t){e.nutricional=t.data.nutricional.data,e.paginacion=t.data.paginacion,e.total_mujeres=t.data.total_mujeres,e.porceMujeres=100*e.paginacion.total/e.total_mujeres}));case 5:t.next=16;break;case 7:t.prev=7,t.t0=t.catch(2),t.t1=t.t0.response.status,t.next=422===t.t1?12:14;break;case 12:case 14:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",16);case 16:case"end":return t.stop()}}),t,this,[[2,7]])}))),function(t){return l.apply(this,arguments)}),filtrar:function(){this.consultar(1)},cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.consultar(t)},generarPDF:function(){var t=this;return c(i.a.mark((function a(){var n;return i.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return t.valPdf=!1,n={rango:t.rango,_token:t.csrf,page:1,tipo:"Todos"},a.prev=2,a.next=5,r.d(n).then((function(a){t.valPdf=!0,t.ruta=s.a.state.apiURL+a.data.nombre,t.$refs.modalpdf.show()}));case 5:a.next=9;break;case 7:a.prev=7,a.t0=a.catch(2);case 9:case"end":return a.stop()}}),a,null,[[2,7]])})))()},cerrarModal:function(){this.$refs.modalpdf.hide()}}},f=n(3),d=Object(f.a)(u,(function(){var t=this,a=t.$createElement,n=t._self._c||a;return n("div",[n("div",{staticClass:"kt-portlet",staticStyle:{"margin-top":"-4%"}},[n("div",{staticClass:"kt-portlet__head"},[t._m(0),t._v(" "),n("div",{staticClass:"kt-portlet__head-toolbar"},[n("div",{staticClass:"kt-section"},[n("div",{staticClass:"kt-section__content"},[n("br"),t._v(" "),n("button",{staticClass:" btn btn-brand",attrs:{type:"button","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Filtrar"},on:{click:t.filtrar}},[n("i",{staticClass:"fa fa-search"}),t._v("Filtrar\n                        ")]),t._v(" "),n("button",{staticClass:" btn btn-danger",class:t.spinPdf,attrs:{type:"button","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Exportar Pdf",disabled:!t.valPdf},on:{click:function(a){return t.generarPDF()}}},[n("i",{staticClass:"fa fa-file-pdf"}),t._v("Exportar a Pdf\n                        ")])])])])]),t._v(" "),n("div",{staticClass:"kt-portlet__body"},[n("div",{staticClass:"kt-section"},[n("div",{staticClass:"kt-section__content"},[n("div",{staticClass:"row"},[n("div",{staticClass:"col-md-2 col-lg-2"},[n("div",{staticClass:"form-group"},[n("label",[t._v("Grupo de edades:")]),t._v(" "),n("b-form-select",{model:{value:t.rango,callback:function(a){t.rango=a},expression:"rango"}},[n("option",{attrs:{value:"Todos"}},[t._v("Todos")]),t._v(" "),n("option",{attrs:{value:"0-"}},[t._v("Menores de 1 año")]),t._v(" "),n("option",{attrs:{value:"r1-5"}},[t._v("De 1 a 5 años")]),t._v(" "),n("option",{attrs:{value:"r6-11"}},[t._v("De 6 a 11 años")]),t._v(" "),n("option",{attrs:{value:"r12-17"}},[t._v("De 12 a 17 años")]),t._v(" "),n("option",{attrs:{value:"r18-28"}},[t._v("De 18 a 28 años")]),t._v(" "),n("option",{attrs:{value:"r29-59"}},[t._v("De 29 a 59 años")]),t._v(" "),n("option",{attrs:{value:"r60+"}},[t._v("Mayores de 60 años")])])],1)])]),t._v(" "),n("div",{staticClass:"row"},[n("div",{staticClass:"col-md-12"},[n("table",{staticClass:"table table-sm table-hover",attrs:{id:"tablaDatos"}},[t._m(1),t._v(" "),t.nutricional.length>0?n("tbody",t._l(t.nutricional,(function(a,e){return n("tr",{key:e},[n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v("\n                                            "+t._s(e+1)+"\n                                        ")]),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                            "+t._s(a.identificacion)+"\n                                        ")]),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                            "+t._s(a.nombres)+"\n                                        ")]),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                            "+t._s(a.sexo)+"\n                                        ")]),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center","text-transform":"capitalize"}},[t._v("\n                                            "+t._s(a.edad)+"\n                                        ")]),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}}),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                            "+t._s(a.localizacion)+"\n                                        ")]),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                            "+t._s(a.textoColegio)+"\n                                        ")]),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._l(a.enfer_infec,(function(a){return n("p",[t._v("- "+t._s(a.enfermedad))])})),t._v(" "),t._l(a.enfer_cro,(function(a){return n("p",[t._v("- "+t._s(a.enfermedad))])}))],2),t._v(" "),n("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                            "+t._s(a.textoEps)+"\n                                        ")])])})),0):n("tbody",[t._m(2)])]),t._v(" "),n("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),n("div",{staticClass:"kt-section"},[n("div",{staticClass:"kt-pagination kt-pagination--danger"},[n("ul",{staticClass:"kt-pagination__links"},[t.paginacion.pagina_actual>1?n("li",{staticClass:"kt-pagination__link--first"},[n("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(1)}}},[n("i",{staticClass:"fa fa-angle-double-left kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual>1?n("li",{staticClass:"kt-pagination__link--next"},[n("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual-1)}}},[n("i",{staticClass:"fa fa-angle-left kt-font-danger"})])]):t._e(),t._v(" "),t._l(t.numeroDePaginas,(function(a,e){return n("li",{key:e,class:[a==t.esActivo?"kt-pagination__link--active":""]},[n("a",{attrs:{href:"javascript:;"},on:{click:function(n){return n.preventDefault(),t.cambiarPaginas(a)}}},[t._v(t._s(a))])])})),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?n("li",{staticClass:"kt-pagination__link--prev"},[n("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual+1)}}},[n("i",{staticClass:"fa fa-angle-right kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?n("li",{staticClass:"kt-pagination__link--last"},[n("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.ultima_pagina)}}},[n("i",{staticClass:"fa fa-angle-double-right kt-font-danger"})])]):t._e()],2)])])])])])])]),t._v(" "),n("b-modal",{ref:"modalpdf",attrs:{"hide-footer":"",title:"Reporte Nutricional",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[n("embed",{attrs:{id:"divPdf",src:t.ruta,type:"application/pdf",width:"100%",height:"650px"}}),t._v(" "),n("hr"),t._v(" "),n("div",{staticClass:"text-right"},[n("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[n("i",{staticClass:"fa fa-window-close"}),t._v(" Cancelar\n                ")])])])],1)])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"kt-portlet__head-label"},[a("h3",{staticClass:"kt-portlet__head-title"},[a("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("REPORTE NUTRICIONAL")])])])},function(){var t=this,a=t.$createElement,n=t._self._c||a;return n("thead",{},[n("tr",{staticStyle:{background:"#1D4A7E",color:"#fff"}},[n("th",{staticClass:"text-left"},[t._v("No.")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n                                            Identificación\n                                        ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n                                            Nombre\n                                        ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n                                            Genero\n                                        ")]),t._v(" "),n("th",{staticClass:"text-center"},[t._v("\n                                            Edad\n                                        ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n                                            Desnutrición\n                                        ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n                                            Localización\n                                        ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n                                            Inst. Educativo\n                                        ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n                                            Enfermedades\n                                        ")]),t._v(" "),n("th",{staticClass:"text-left;",staticStyle:{width:"170px"}},[t._v("\n                                            Eps\n                                        ")])])])},function(){var t=this.$createElement,a=this._self._c||t;return a("tr",[a("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center","text-transform":"capitalize","font-size":"20px"},attrs:{colspan:"10"}},[this._v("\n                                            No existen datos\n                                        ")])])}],!1,null,null,null);a.default=d.exports}}]);