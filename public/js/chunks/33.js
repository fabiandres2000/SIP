(window.webpackJsonp=window.webpackJsonp||[]).push([[33],{340:function(t,a,e){var s=e(509);"string"==typeof s&&(s=[[t.i,s,""]]);var i={hmr:!0,transform:void 0,insertInto:void 0};e(12)(s,i);s.locals&&(t.exports=s.locals)},508:function(t,a,e){"use strict";e(340)},509:function(t,a,e){(t.exports=e(11)(!1)).push([t.i,"\n.modal-backdrop {\n    background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n    color: #f8f9fa !important;\n}\n.close {\n    display: none;\n}\n",""])},654:function(t,a,e){"use strict";e.r(a);var s=e(1),i=e.n(s),n=e(16);function r(t,a){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);a&&(s=s.filter((function(a){return Object.getOwnPropertyDescriptor(t,a).enumerable}))),e.push.apply(e,s)}return e}function o(t,a,e){return a in t?Object.defineProperty(t,a,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[a]=e,t}function l(t,a,e,s,i,n,r){try{var o=t[n](r),l=o.value}catch(t){return void e(t)}o.done?a(l):Promise.resolve(l).then(s,i)}function c(t){return function(){var a=this,e=arguments;return new Promise((function(s,i){var n=t.apply(a,e);function r(t){l(n,s,i,r,o,"next",t)}function o(t){l(n,s,i,r,o,"throw",t)}r(void 0)}))}}var u,d,v,p,g={mounted:function(){this.consultar(1)},name:"entes",data:function(){return{errores:[],entes:[],errorDevuelto:[],entrarPorError:!1,txtbusqueda:"",dpto_options:[],muni_options:{},entesData:{id:0,nombre:"",alias:"",sigla:"",poblacion:"",viviendas:"",estado:"Activo",id_dpto:"",id_mun:"",lat:"",lng:""},csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),headerTextVariant:"light",mostrar:!0,paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},offset:4,valG:!0,actual:0}},computed:{esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var a=t+2*this.offset;a>=this.paginacion.ultima_pagina&&(a=this.paginacion.ultima_pagina);for(var e=[];t<=a;)e.push(t),t++;return e},spinG:function(){return this.valG?{}:["kt-spinner","kt-spinner--right","kt-spinner--sm","kt-spinner--light"]}},methods:{formato:function(t){"poblacion"==t&&(this.entesData.poblacion=this.entesData.poblacion.replace(/[^.\d]/g,"").trim(),"NaN"==this.entesData.poblacion&&(this.entesData.poblacion=""),"0"==this.entesData.poblacion&&(this.entesData.poblacion="")),"viviendas"==t&&(this.entesData.viviendas=this.entesData.viviendas.replace(/[^.\d]/g,"").trim(),"NaN"==this.entesData.viviendas&&(this.entesData.viviendas=""),"0"==this.entesData.viviendas&&(this.entesData.viviendas="")),"alias"==t&&(this.entesData.alias=this.entesData.alias.replace(/\s+/g,"").trim().toLowerCase()),"sigla"==t&&(this.entesData.sigla=this.entesData.sigla.replace(/\s+/g,"").trim().toUpperCase())},guardar:(p=c(i.a.mark((function t(){var a,e,s=this;return i.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(this.checkForm()){t.next=5;break}this.entrarPorError=!1,console.log("clo"),t.next=23;break;case 5:return this.errores=[],a="",a=0==this.entesData.id?"GUARDAR":"MODIFICAR",e={_token:this.csrf,entes:this.entesData,opcion:a},t.prev=9,t.next=12,n.b(e).then((function(t){0==s.entesData.id?s.entes.unshift(t.data.entes):s.consultar(1),s.cerrarModal(),s.limpiar(),s.$swal("Guardar...!","Datos Guardados Exitosamente!","success")})).catch((function(t){s.errorDevuelto=t.response.data.errors,s.entrarPorError=!0}));case 12:t.next=23;break;case 14:t.prev=14,t.t0=t.catch(9),t.t1=t.t0.response.status,t.next=422===t.t1?19:21;break;case 19:case 21:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",23);case 23:case"end":return t.stop()}}),t,this,[[9,14]])}))),function(){return p.apply(this,arguments)}),consultar:(v=c(i.a.mark((function t(a){var e,s,r=this;return i.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e=new Date,this.actual=e.getFullYear(),s={txtbusqueda:this.txtbusqueda.trim(),_token:this.csrf,page:a},t.prev=3,t.next=6,n.c(s).then((function(t){r.entes=t.data.entes.data,r.paginacion=t.data.paginacion,r.dpto_options=t.data.arrayDpto,r.muni_options=t.data.arrayMuni}));case 6:t.next=19;break;case 8:t.prev=8,t.t0=t.catch(3),t.t1=t.t0.response.status,t.next=419===t.t1?13:422===t.t1?15:17;break;case 13:case 15:case 17:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",19);case 19:case"end":return t.stop()}}),t,this,[[3,8]])}))),function(t){return v.apply(this,arguments)}),abrirModal:function(){this.errores=[],this.entrarPorError=!1,this.$refs.modalEntes.show()},cerrarModal:function(){this.limpiar(),this.$refs.modalEntes.hide()},checkForm:function(t){return this.errores=[],this.entesData.id_dpto||this.errores.push("EL departamento es obligatorio."),this.entesData.id_mun||this.errores.push("EL municipio es obligatorio."),this.entesData.nombre||this.errores.push("EL nombre es obligatorio."),this.entesData.alias||this.errores.push("El alias es obligatorio."),this.entesData.sigla||this.errores.push("La sigla es obligatoria."),this.entesData.poblacion||this.errores.push("La población es obligatoria."),this.entesData.viviendas||this.errores.push("El numero de viviendas es obligatoria."),this.entesData.lat||this.errores.push("La latitud es obligatoria."),this.entesData.lng||this.errores.push("La longitud es obligatoria."),!this.errores.length},eliminar:(d=c(i.a.mark((function t(a){var e,s,r=this;return i.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:e="",s="","Activo"==a.estado?(e="¿Desea anular el ente "+a.nombre+"?",s="Ente "+a.nombre+" anulado de manera exitosa"):(e="¿Desea activar el ente "+a.nombre+"?",s="Ente "+a.nombre+" activado de manera exitosa"),this.$swal({title:e,text:"",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Aceptar",cancelButtonText:"Cancelar"}).then((function(t){if(t.value){var e={_token:r.csrf,id:a.id,estado:a.estado};try{n.a(e).then((function(t){r.consultar(1),r.$swal({position:"top-end",icon:"success",title:s,showConfirmButton:!1,timer:2e3})})).catch((function(t){r.$swal("Error...!","Ocurrio un error!","error")}))}catch(t){switch(t.response.status){case 422:default:r.$swal("Error...!","Ocurrio un error!","error")}}}}));case 4:case"end":return t.stop()}}),t,this)}))),function(t){return d.apply(this,arguments)}),editar:function(t){this.entesData=function(t){for(var a=1;a<arguments.length;a++){var e=null!=arguments[a]?arguments[a]:{};a%2?r(Object(e),!0).forEach((function(a){o(t,a,e[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):r(Object(e)).forEach((function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(e,a))}))}return t}({},t),this.$refs.modalEntes.show()},cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.consultar(t)},limpiar:function(){this.entesData.id=0,this.entesData.id_dpto="",this.entesData.id_mun="",this.entesData.nombre="",this.entesData.alias="",this.entesData.sigla="",this.entesData.poblacion="",this.entesData.viviendas="",this.entesData.lat="",this.entesData.lng="",this.entrarPorError=!1,this.errores=[]},cambiarCombo:(u=c(i.a.mark((function t(a){return i.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:"dpto"===a&&(this.entesData.id_mun="");case 1:case"end":return t.stop()}}),t,this)}))),function(t){return u.apply(this,arguments)})}},f=(e(508),e(2)),m=Object(f.a)(g,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("div",{staticClass:"kt-portlet",staticStyle:{"margin-top":"-4%"}},[t._m(0),t._v(" "),e("div",{staticClass:"kt-portlet__body"},[e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-section__content"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6 col-lg-6"},[e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-section__content"},[e("a",{staticClass:"btn btn-outline-primary btn-icon",attrs:{href:"javascript:;","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Nuevo Usuario"},on:{click:t.abrirModal}},[e("i",{staticClass:"la la-file-text-o"})]),t._v(" \n                                ")])])]),t._v(" "),e("div",{staticClass:"col-md-6 col-lg-6"},[e("form",{staticClass:"kt-form"},[e("div",{staticClass:"form-group"},[e("div",{staticClass:"input-group"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.txtbusqueda,expression:"txtbusqueda"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Busqueda"},domProps:{value:t.txtbusqueda},on:{input:function(a){a.target.composing||(t.txtbusqueda=a.target.value)}}}),t._v(" "),e("div",{staticClass:"input-group-append"},[e("button",{staticClass:"btn btn-primary btn-icon",attrs:{type:"button"},on:{click:function(a){return a.preventDefault(),t.consultar(1)}}},[e("i",{staticClass:"fa fa-search"})])])])])])])]),t._v(" "),e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-12"},[e("div",{staticClass:"table-responsive"},[e("table",{staticClass:"table table-sm table-hover"},[t._m(1),t._v(" "),e("tbody",t._l(t.entes,(function(a,s){return e("tr",{key:s},[e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v("\n                                                "+t._s(s+1)+"\n                                            ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                "+t._s(a.nombre)+"\n                                            ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left"}},[t._v("\n                                                "+t._s(a.alias)+"\n                                            ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left"}},[t._v("\n                                                "+t._s(a.sigla)+"\n                                            ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"right"}},[t._v("\n                                                "+t._s(a.poblacion)+"\n                                            ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"right"}},[t._v("\n                                                "+t._s(a.viviendas)+"\n                                            ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center"}},[e("span",{staticClass:"kt-badge kt-badge--inline text-align: center;",class:"Activo"==a.estado?"kt-badge--success":"kt-badge--danger"},[t._v(t._s(a.estado))])]),t._v(" "),e("td",{staticStyle:{"text-align":"center","vertical-align":"middle"}},[e("button",{staticClass:"btn btn-outline-info btn-icon btn-sm",attrs:{type:"button",title:"Editar"},on:{click:function(e){return t.editar(a)}}},[e("i",{staticClass:"fa fa-edit"})]),t._v(" "),e("button",{staticClass:"btn btn-icon btn-sm",class:"Activo"==a.estado?"btn-outline-danger":"btn-outline-success",attrs:{type:"button",title:"Activo"==a.estado?"Anular":"Activar"},on:{click:function(e){return t.eliminar(a)}}},[e("i",{staticClass:"fa",class:"Activo"==a.estado?"fa-trash":"fa-check"})])])])})),0)]),t._v(" "),e("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-pagination kt-pagination--danger"},[e("ul",{staticClass:"kt-pagination__links"},[t.paginacion.pagina_actual>1?e("li",{staticClass:"kt-pagination__link--first"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(1)}}},[e("i",{staticClass:"fa fa-angle-double-left kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual>1?e("li",{staticClass:"kt-pagination__link--next"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual-1)}}},[e("i",{staticClass:"fa fa-angle-left kt-font-danger"})])]):t._e(),t._v(" "),t._l(t.numeroDePaginas,(function(a,s){return e("li",{key:s,class:[a==t.esActivo?"kt-pagination__link--active":""]},[e("a",{attrs:{href:"javascript:;"},on:{click:function(e){return e.preventDefault(),t.cambiarPaginas(a)}}},[t._v(t._s(a))])])})),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?e("li",{staticClass:"kt-pagination__link--prev"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual+1)}}},[e("i",{staticClass:"fa fa-angle-right kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?e("li",{staticClass:"kt-pagination__link--last"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.ultima_pagina)}}},[e("i",{staticClass:"fa fa-angle-double-right kt-font-danger"})])]):t._e()],2)])])])])])])])]),t._v(" "),e("b-modal",{ref:"modalEntes",attrs:{"hide-footer":"",title:"Gestión de Entes",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[e("div",{staticClass:"d-block"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-lg-12"},[e("transition",{attrs:{duration:1e3,name:"fade"}},[t.entrarPorError?e("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[e("div",{staticClass:"alert-icon"},[e("i",{staticClass:"flaticon-warning"})]),t._v(" "),e("div",{staticClass:"alert-text"},[t._v("\n                                    Por favor, corrija el(los) siguiente(s)\n                                    error(es):\n                                    "),e("hr"),t._v(" "),e("ul",t._l(t.errorDevuelto,(function(a,s){return e("li",{key:s},[t._v("\n                                            "+t._s(a)+"\n                                        ")])})),0)]),t._v(" "),e("div",{staticClass:"alert-close"},[e("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[e("span",{attrs:{"aria-hidden":"true"}},[e("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),e("div",{staticClass:"row"},[e("div",{staticClass:"col-lg-12"},[e("transition",{attrs:{duration:1e3,name:"fade"}},[t.errores.length?e("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[e("div",{staticClass:"alert-icon"},[e("i",{staticClass:"flaticon-warning"})]),t._v(" "),e("div",{staticClass:"alert-text"},[t._v("\n                                    Por favor, corrija el(los) siguiente(s)\n                                    error(es):\n                                    "),e("hr"),t._v(" "),e("ul",t._l(t.errores,(function(a,s){return e("li",{key:s},[t._v("\n                                            "+t._s(a)+"\n                                        ")])})),0)]),t._v(" "),e("div",{staticClass:"alert-close"},[e("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[e("span",{attrs:{"aria-hidden":"true"}},[e("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),e("form",[e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Departamento:")]),t._v(" "),e("div",{staticClass:"col-lg-4"},[e("b-form-select",{ref:"id_dpto",class:""==t.entesData.id_dpto?"is-invalid":"is-valid",on:{change:function(a){return t.cambiarCombo("dpto")}},model:{value:t.entesData.id_dpto,callback:function(a){t.$set(t.entesData,"id_dpto","string"==typeof a?a.trim():a)},expression:"entesData.id_dpto"}},[e("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),t._l(t.dpto_options,(function(a){return e("option",{key:a.value,domProps:{value:a.value}},[t._v(t._s(a.texto))])}))],2)],1),t._v(" "),e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Municipio:")]),t._v(" "),e("div",{staticClass:"col-lg-4"},[e("b-form-select",{ref:"id_mun",class:""==t.entesData.id_mun?"is-invalid":"is-valid",model:{value:t.entesData.id_mun,callback:function(a){t.$set(t.entesData,"id_mun","string"==typeof a?a.trim():a)},expression:"entesData.id_mun"}},[e("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),t._l(t.muni_options[t.entesData.id_dpto],(function(a){return e("option",{key:a.value,domProps:{value:a.value}},[t._v(t._s(a.texto))])}))],2)],1)]),t._v(" "),e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Nombre:")]),t._v(" "),e("div",{staticClass:"col-lg-6"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.entesData.nombre,expression:"entesData.nombre"}],staticClass:"form-control text-capitalize",class:""==t.entesData.nombre?"is-invalid":"is-valid",attrs:{type:"text",placeholder:"Nombre"},domProps:{value:t.entesData.nombre},on:{input:function(a){a.target.composing||t.$set(t.entesData,"nombre",a.target.value)}}})]),t._v(" "),e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Alias:")]),t._v(" "),e("div",{staticClass:"col-lg-4"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.entesData.alias,expression:"entesData.alias"}],staticClass:"form-control",class:""==t.entesData.alias?"is-invalid":"is-valid",attrs:{type:"text",placeholder:"Alias"},domProps:{value:t.entesData.alias},on:{change:function(a){return t.formato("alias")},input:function(a){a.target.composing||t.$set(t.entesData,"alias",a.target.value)}}})])]),t._v(" "),e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Sigla:")]),t._v(" "),e("div",{staticClass:"col-lg-3"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.entesData.sigla,expression:"entesData.sigla"}],staticClass:"form-control text-capitalize",class:""==t.entesData.sigla?"is-invalid":"is-valid",attrs:{type:"text",placeholder:"Sigla"},domProps:{value:t.entesData.sigla},on:{change:function(a){return t.formato("sigla")},input:function(a){a.target.composing||t.$set(t.entesData,"sigla",a.target.value)}}})]),t._v(" "),e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Población:")]),t._v(" "),e("div",{staticClass:"col-lg-3"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.entesData.poblacion,expression:"entesData.poblacion"}],staticClass:"form-control text-capitalize",class:""==t.entesData.poblacion?"is-invalid":"is-valid",attrs:{type:"text",placeholder:"Población"},domProps:{value:t.entesData.poblacion},on:{change:function(a){return t.formato("poblacion")},input:function(a){a.target.composing||t.$set(t.entesData,"poblacion",a.target.value)}}})]),t._v(" "),e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Viviendas:")]),t._v(" "),e("div",{staticClass:"col-lg-3"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.entesData.viviendas,expression:"entesData.viviendas"}],staticClass:"form-control text-capitalize",class:""==t.entesData.viviendas?"is-invalid":"is-valid",attrs:{type:"text",placeholder:"Viviendas"},domProps:{value:t.entesData.viviendas},on:{change:function(a){return t.formato("viviendas")},input:function(a){a.target.composing||t.$set(t.entesData,"viviendas",a.target.value)}}})])]),t._v(" "),e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Latitud:")]),t._v(" "),e("div",{staticClass:"col-lg-3"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.entesData.lat,expression:"entesData.lat"}],staticClass:"form-control text-capitalize",class:""==t.entesData.lat?"is-invalid":"is-valid",attrs:{type:"text",placeholder:"Latitud"},domProps:{value:t.entesData.lat},on:{input:function(a){a.target.composing||t.$set(t.entesData,"lat",a.target.value)}}})]),t._v(" "),e("label",{staticClass:"col-lg-1 col-form-label"},[t._v("Longitud:")]),t._v(" "),e("div",{staticClass:"col-lg-3"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.entesData.lng,expression:"entesData.lng"}],staticClass:"form-control text-capitalize",class:""==t.entesData.lng?"is-invalid":"is-valid",attrs:{type:"text",placeholder:"Longitud"},domProps:{value:t.entesData.lng},on:{input:function(a){a.target.composing||t.$set(t.entesData,"lng",a.target.value)}}})])]),t._v(" "),e("hr"),t._v(" "),e("div",{staticClass:"text-right"},[e("button",{staticClass:"btn btn-success",class:t.spinG,attrs:{type:"button",disabled:!t.valG},on:{click:t.guardar}},[e("i",{staticClass:"fa fa-edit"}),t._v(" Guardar\n                        ")]),t._v(" "),e("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[e("i",{staticClass:"fa fa-window-close"}),t._v(" Cancelar\n                        ")])])])])])],1)])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"kt-portlet__head"},[a("div",{staticClass:"kt-portlet__head-label"},[a("h3",{staticClass:"kt-portlet__head-title"},[a("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("GESTIÓN DE ENTES")])])])])},function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("thead",{},[e("tr",{staticClass:"kt-bg-fill-brand"},[e("th",[t._v("No.")]),t._v(" "),e("th",[t._v("Nombre")]),t._v(" "),e("th",[t._v("Alias")]),t._v(" "),e("th",[t._v("Sigla")]),t._v(" "),e("th",{staticClass:"text-right"},[t._v("\n                                                Población\n                                            ")]),t._v(" "),e("th",{staticClass:"text-right"},[t._v("\n                                                Viviendas\n                                            ")]),t._v(" "),e("td",{staticClass:"text-center"},[t._v("\n                                                Estado\n                                            ")]),t._v(" "),e("td",{staticClass:"text-center"},[t._v("\n                                                Opciones\n                                            ")])])])}],!1,null,null,null);a.default=m.exports}}]);