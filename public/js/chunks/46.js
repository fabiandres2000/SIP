(window.webpackJsonp=window.webpackJsonp||[]).push([[46],{355:function(t,a,e){"use strict";e.d(a,"d",(function(){return i})),e.d(a,"b",(function(){return r})),e.d(a,"h",(function(){return s})),e.d(a,"c",(function(){return o})),e.d(a,"e",(function(){return c})),e.d(a,"a",(function(){return l})),e.d(a,"f",(function(){return d})),e.d(a,"g",(function(){return v}));var n=e(18);function i(t){return Object(n.a)().post("/reportes/gestantes",t)}function r(t){return Object(n.a)().post("/reportes/exportarGestantes",t)}function s(t){return Object(n.a)().post("/reportes/nutricional",t)}function o(t){return Object(n.a)().post("/reportes/exportarNutricional",t)}function c(t){return Object(n.a)().post("/reportes/cronicas",t)}function l(t){return Object(n.a)().post("/reportes/cronicaspdf",t)}function d(t){return Object(n.a)().post("/reportes/migrantes",t)}function v(t){return Object(n.a)().post("/reportes/migrantespdf",t)}},732:function(t,a,e){"use strict";e.r(a);var n=e(4),i=e.n(n),r=e(355),s=e(32);function o(t,a,e,n,i,r,s){try{var o=t[r](s),c=o.value}catch(t){return void e(t)}o.done?a(c):Promise.resolve(c).then(n,i)}function c(t){return function(){var a=this,e=arguments;return new Promise((function(n,i){var r=t.apply(a,e);function s(t){o(r,n,i,s,c,"next",t)}function c(t){o(r,n,i,s,c,"throw",t)}s(void 0)}))}}var l={mounted:function(){this.iniciales(1)},data:function(){return{csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),ruta:"",datos:{rangoEdad:"Todos",enfermedad:"Todas"},enfermedades:{id:0,descripcion:""},integrantes:{id:0,nombres:"",identificacion:"",localizacion:"",edad:"",genero:"",enfermedad:"",tiempo:"",atendido:"",eps:"",ocupacion:""},paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},offset:4,fila:{}}},methods:{iniciales:function(t){var a=this;return c(i.a.mark((function e(){var n;return i.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return n={_token:a.csrf,datos:a.datos,page:t,tipo:"paginate"},e.prev=1,e.next=4,r.e(n).then((function(t){a.integrantes=t.data.integrantes.data,a.enfermedades=t.data.enfermedades,a.paginacion=t.data.paginacion}));case 4:e.next=8;break;case 6:e.prev=6,e.t0=e.catch(1);case 8:case"end":return e.stop()}}),e,null,[[1,6]])})))()},Buscar:function(){},cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.iniciales(t)},filtrar:function(){this.iniciales(1)},generarPDF:function(){var t=this;return c(i.a.mark((function a(){var e;return i.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return t.iniciales(1),e={_token:t.csrf,datos:t.datos,tipo:"Todos"},a.prev=2,a.next=5,r.a(e).then((function(a){t.ruta=s.a.state.apiURL+a.data.nombre,t.$refs.modalpdf.show()}));case 5:a.next=9;break;case 7:a.prev=7,a.t0=a.catch(2);case 9:case"end":return a.stop()}}),a,null,[[2,7]])})))()},cerrarModal:function(){this.$refs.modalpdf.hide()}},computed:{esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var a=t+2*this.offset;a>=this.paginacion.ultima_pagina&&(a=this.paginacion.ultima_pagina);for(var e=[];t<=a;)e.push(t),t++;return e}}},d=e(26),v=Object(d.a)(l,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"row"},[e("div",{staticClass:"col-12"},[e("div",{staticClass:"kt-portlet kt-portlet--height-fluid kt-portlet--mobile",staticStyle:{"margin-top":"-4%"}},[e("div",{staticClass:"kt-portlet__head"},[t._m(0),t._v(" "),e("div",{staticClass:"kt-portlet__head-toolbar"},[e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-section__content"},[e("br"),t._v(" "),e("button",{staticClass:"btn btn-brand",attrs:{type:"button","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Filtrar"},on:{click:t.filtrar}},[e("i",{staticClass:"fa fa-search"}),t._v("Filtrar\n                            ")]),t._v(" "),e("button",{staticClass:"btn btn-danger",attrs:{type:"button","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Exportar Pdf"},on:{click:t.generarPDF}},[e("i",{staticClass:"fa fa-file-pdf"}),t._v("Exportar a Pdf\n                            ")])])])])]),t._v(" "),e("div",{staticClass:"kt-portlet__body"},[e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-section__content"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-3 col-lg-3"},[e("div",{staticClass:"form-group"},[e("label",[t._v("Grupo de edades:")]),t._v(" "),e("b-form-select",{model:{value:t.datos.rangoEdad,callback:function(a){t.$set(t.datos,"rangoEdad",a)},expression:"datos.rangoEdad"}},[e("option",{attrs:{value:"Todos"}},[t._v("Todos")]),t._v(" "),e("option",{attrs:{value:"0-"}},[t._v("Menores de 1")]),t._v(" "),e("option",{attrs:{value:"r1-5"}},[t._v("De 1 a 5 años")]),t._v(" "),e("option",{attrs:{value:"r6-11"}},[t._v("De 6 a 11 años")]),t._v(" "),e("option",{attrs:{value:"r12-17"}},[t._v("De 12 a 17 años")]),t._v(" "),e("option",{attrs:{value:"r18-28"}},[t._v("De 18 a 28 años")]),t._v(" "),e("option",{attrs:{value:"r29-59"}},[t._v("De 29 a 59")]),t._v(" "),e("option",{attrs:{value:"r60+"}},[t._v("Mayores de 60")])])],1)]),t._v(" "),e("div",{staticClass:"col-md-3 col-lg-3"},[e("div",{staticClass:"form-group"},[e("label",[t._v("Enfermedades:")]),t._v(" "),e("b-form-select",{model:{value:t.datos.enfermedad,callback:function(a){t.$set(t.datos,"enfermedad",a)},expression:"datos.enfermedad"}},[e("option",{attrs:{value:"Todas"}},[t._v("Todas")]),t._v(" "),t._l(t.enfermedades,(function(a,n){return e("option",{key:n,domProps:{value:a.id}},[t._v(t._s(a.descripcion))])}))],2)],1)])]),t._v(" "),e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-12"},[e("div",{staticClass:"table-responsive"},[e("table",{staticClass:"table table-sm table-hover"},[t._m(1),t._v(" "),e("tbody",t._l(t.integrantes,(function(a,n){return e("tr",{key:n},[e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v("\n                                                    "+t._s(n+1)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.nombres)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.identificacion)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.localizacion)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.edad)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.genero)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.enfermedad)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(1==a.tiempo?"Menos de 6 Meses":2==a.tiempo?"Menos de 1 Años":3==a.tiempo?"Menos de 5 Años":"Mas de 5 Años")+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.atendido)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.eps)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(a.ocupacion)+"\n                                                ")])])})),0)]),t._v(" "),e("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-pagination kt-pagination--danger"},[e("ul",{staticClass:"kt-pagination__links"},[t.paginacion.pagina_actual>1?e("li",{staticClass:"kt-pagination__link--first"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(1)}}},[e("i",{staticClass:"fa fa-angle-double-left kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual>1?e("li",{staticClass:"kt-pagination__link--next"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual-1)}}},[e("i",{staticClass:"fa fa-angle-left kt-font-danger"})])]):t._e(),t._v(" "),t._l(t.numeroDePaginas,(function(a,n){return e("li",{key:n,class:[a==t.esActivo?"kt-pagination__link--active":""]},[e("a",{attrs:{href:"javascript:;"},on:{click:function(e){return e.preventDefault(),t.cambiarPaginas(a)}}},[t._v(t._s(a))])])})),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?e("li",{staticClass:"kt-pagination__link--prev"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual+1)}}},[e("i",{staticClass:"fa fa-angle-right kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?e("li",{staticClass:"kt-pagination__link--last"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.ultima_pagina)}}},[e("i",{staticClass:"fa fa-angle-double-right kt-font-danger"})])]):t._e()],2)]),t._v(" "),e("br"),t._v(" "),e("br")])])])])])])])])]),t._v(" "),e("b-modal",{ref:"modalpdf",attrs:{"hide-footer":"",title:"Enfermedades crónicas",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[e("embed",{attrs:{id:"divPdf",src:t.ruta,type:"application/pdf",width:"100%",height:"650px"}}),t._v(" "),e("div",{staticClass:"text-right"},[e("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[e("i",{staticClass:"fa fa-window-close"}),t._v(" Cancelar\n            ")])])])],1)}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"kt-portlet__head-label"},[a("h3",{staticClass:"kt-portlet__head-title"},[a("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("REPORTE ENFERMEDADES CRONICAS")])])])},function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("thead",{},[e("tr",{staticClass:"kt-bg-fill-brand"},[e("th",[t._v("No.")]),t._v(" "),e("th",[t._v("Nombres completos")]),t._v(" "),e("th",[t._v("Identificacion")]),t._v(" "),e("th",[t._v("Localización")]),t._v(" "),e("th",[t._v("Edad")]),t._v(" "),e("th",[t._v("Genero")]),t._v(" "),e("th",[t._v("Enfermedad")]),t._v(" "),e("th",[t._v("Tiempo")]),t._v(" "),e("th",[t._v("Atendido")]),t._v(" "),e("th",[t._v("Eps")]),t._v(" "),e("th",[t._v("Ocupación")]),t._v(" "),e("td",{staticClass:"text-center"})])])}],!1,null,null,null);a.default=v.exports}}]);