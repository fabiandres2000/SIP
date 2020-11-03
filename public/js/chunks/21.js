(window.webpackJsonp=window.webpackJsonp||[]).push([[21],{206:function(t,a,i){"use strict";var e=i(98);i.n(e).a},207:function(t,a,i){(t.exports=i(28)(!1)).push([t.i,"\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n",""])},218:function(t,a,i){"use strict";i.r(a);var e=i(3),r=i.n(e),n=i(1);function s(t,a,i,e,r,n,s){try{var o=t[n](s),c=o.value}catch(t){return void i(t)}o.done?a(c):Promise.resolve(c).then(e,r)}function o(t){return function(){var a=this,i=arguments;return new Promise((function(e,r){var n=t.apply(a,i);function o(t){s(n,e,r,o,c,"next",t)}function c(t){s(n,e,r,o,c,"throw",t)}o(void 0)}))}}var c,l,u,d,v={mounted:function(){this.consultar(1)},name:"barri",data:function(){return{errores:[],bandera:!1,entrarPorError:!1,txtbusqueda:"",religion:[],religionData:{descripcion:"",observacion:"",id:0},csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},offset:4,valG:!0}},computed:{religionError:function(){if(""==this.religionData.descripcion.trim())return"El campo es obligatorio"},religionClases:function(){return[{"is-invalid":this.religionError,"is-valid":!this.religionError}]},esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var a=t+2*this.offset;a>=this.paginacion.ultima_pagina&&(a=this.paginacion.ultima_pagina);for(var i=[];t<=a;)i.push(t),t++;return i},spinG:function(){return this.valG?{}:["kt-spinner","kt-spinner--right","kt-spinner--sm","kt-spinner--light"]}},methods:{consultar:(d=o(r.a.mark((function t(a){var i,e=this;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return i={txtbusqueda:this.txtbusqueda.trim(),_token:this.csrf,page:a},t.prev=1,t.next=4,(r=i,Object(n.a)().post("/religion",r)).then((function(t){e.religion=t.data.religion.data,e.paginacion=t.data.paginacion}));case 4:t.next=15;break;case 6:t.prev=6,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=422===t.t1?11:13;break;case 11:case 13:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",15);case 15:case"end":return t.stop()}var r}),t,this,[[1,6]])}))),function(t){return d.apply(this,arguments)}),abrirModal:function(){this.religionData.descripcion="",this.religionData.observacion="",this.religionData.id=0,this.errores=[],this.entrarPorError=!1,this.$refs.modalReligion.show()},cerrarModal:function(){this.$refs.modalReligion.hide()},guardar:(u=o(r.a.mark((function t(){var a,i=this;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(this.checkForm()){t.next=4;break}this.entrarPorError=!1,t.next=23;break;case 4:return this.errores=[],a={_token:this.csrf,descripcion:this.religionData.descripcion,observacion:this.religionData.observacion,id:this.religionData.id},this.valG=!1,t.prev=7,t.next=10,(e=a,Object(n.a)().post("/religion/guardar",e)).then((function(t){i.consultar(1),i.religionData.descripcion="",i.religionData.observacion="",i.religionData.id=0,i.cerrarModal(),i.$swal("Guardar...!","Datos Guardados Exitosamente!","success"),i.valG=!0})).catch((function(t){i.errorDevuelto=t.response.data.errors,i.entrarPorError=!0}));case 10:t.next=23;break;case 12:t.prev=12,t.t0=t.catch(7),t.t1=t.t0.response.status,t.next=419===t.t1?17:422===t.t1?19:21;break;case 17:case 19:case 21:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",23);case 23:case"end":return t.stop()}var e}),t,this,[[7,12]])}))),function(){return u.apply(this,arguments)}),checkForm:function(t){return this.errores=[],this.religionData.descripcion||this.errores.push("La descripción es obligatoria."),!this.errores.length},cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.consultar(t)},eliminar:(l=o(r.a.mark((function t(a){var i,e,s=this;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:i="",e="","Activo"==a.estado?(i="¿Desea anular la religión "+a.descripcion+"?",e="Religión "+a.descripcion+" anulado de manera exitosa"):(i="¿Desea activar la religión "+a.descripcion+"?",e="Religión "+a.descripcion+" activado de manera exitosa"),this.$swal({title:i,text:"",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Aceptar",cancelButtonText:"Cancelar"}).then((function(t){if(t.value){var i={_token:s.csrf,id:a.id,estado:a.estado};try{(r=i,Object(n.a)().post("/religion/eliminar",r)).then((function(t){s.consultar(1),s.$swal({position:"top-end",icon:"success",title:e,showConfirmButton:!1,timer:2e3})})).catch((function(t){s.$swal("Error...!","Ocurrio un error!","error")}))}catch(t){switch(t.response.status){case 422:default:s.$swal("Error...!","Ocurrio un error!","error")}}}var r}));case 4:case"end":return t.stop()}}),t,this)}))),function(t){return l.apply(this,arguments)}),editar:(c=o(r.a.mark((function t(a){return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:this.religionData.descripcion=a.descripcion,this.religionData.observacion=a.observacion,this.religionData.id=a.id,this.$refs.modalReligion.show();case 4:case"end":return t.stop()}}),t,this)}))),function(t){return c.apply(this,arguments)})}},p=(i(206),i(4)),g=Object(p.a)(v,(function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",[i("div",{staticClass:"kt-portlet",staticStyle:{"margin-top":"-4%"}},[t._m(0),t._v(" "),i("div",{staticClass:"kt-portlet__body"},[i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-section__content"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-6 col-lg-6"},[i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-section__content"},[i("a",{staticClass:"btn btn-outline-primary btn-icon",attrs:{href:"javascript:;","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Nueva Religión"},on:{click:t.abrirModal}},[i("i",{staticClass:"la la-file-text-o"})]),t._v(" \n                ")])])]),t._v(" "),i("div",{staticClass:"col-md-6 col-lg-6"},[i("form",{staticClass:"kt-form"},[i("div",{staticClass:"form-group"},[i("div",{staticClass:"input-group"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.txtbusqueda,expression:"txtbusqueda"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Busqueda"},domProps:{value:t.txtbusqueda},on:{input:function(a){a.target.composing||(t.txtbusqueda=a.target.value)}}}),t._v(" "),i("div",{staticClass:"input-group-append"},[i("button",{staticClass:"btn btn-primary btn-icon",attrs:{type:"button"},on:{click:function(a){return t.consultar(1)}}},[i("i",{staticClass:"fa fa-search"})])])])])])])]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-12"},[i("div",{staticClass:"table-responsive"},[i("table",{staticClass:"table table-sm table-hover"},[t._m(1),t._v(" "),i("tbody",t._l(t.religion,(function(a,e){return i("tr",{key:e},[i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v(t._s(e+1))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.descripcion))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.observacion))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center"}},[i("span",{staticClass:"kt-badge kt-badge--inline",class:"Activo"==a.estado?"kt-badge--success":"kt-badge--danger"},[t._v(t._s(a.estado))])]),t._v(" "),i("td",{staticStyle:{"text-align":"center","vertical-align":"middle"}},[i("button",{staticClass:"btn btn-outline-info btn-icon btn-sm",attrs:{type:"button",title:"Editar"},on:{click:function(i){return t.editar(a)}}},[i("i",{staticClass:"fa fa-edit"})]),t._v(" "),i("button",{staticClass:"btn btn-icon btn-sm",class:"Activo"==a.estado?"btn-outline-danger":"btn-outline-success",attrs:{type:"button",title:"Activo"==a.estado?"Anular":"Activar"},on:{click:function(i){return t.eliminar(a)}}},[i("i",{staticClass:"fa",class:"Activo"==a.estado?"fa-trash":"fa-check"})])])])})),0)]),t._v(" "),i("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-pagination kt-pagination--danger"},[i("ul",{staticClass:"kt-pagination__links"},[t.paginacion.pagina_actual>1?i("li",{staticClass:"kt-pagination__link--first"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(1)}}},[i("i",{staticClass:"fa fa-angle-double-left kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual>1?i("li",{staticClass:"kt-pagination__link--next"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual-1)}}},[i("i",{staticClass:"fa fa-angle-left kt-font-danger"})])]):t._e(),t._v(" "),t._l(t.numeroDePaginas,(function(a,e){return i("li",{key:e,class:[a==t.esActivo?"kt-pagination__link--active":""]},[i("a",{attrs:{href:"javascript:;"},on:{click:function(i){return i.preventDefault(),t.cambiarPaginas(a)}}},[t._v(t._s(a))])])})),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?i("li",{staticClass:"kt-pagination__link--prev"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual+1)}}},[i("i",{staticClass:"fa fa-angle-right kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?i("li",{staticClass:"kt-pagination__link--last"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.ultima_pagina)}}},[i("i",{staticClass:"fa fa-angle-double-right kt-font-danger"})])]):t._e()],2)])])])])])])])]),t._v(" "),i("b-modal",{ref:"modalReligion",attrs:{"hide-footer":"",title:"Gestion de Religiones",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[i("div",{staticClass:"d-block"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-lg-12"},[i("transition",{attrs:{duration:1e3,name:"fade"}},[t.entrarPorError?i("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[i("div",{staticClass:"alert-icon"},[i("i",{staticClass:"flaticon-warning"})]),t._v(" "),i("div",{staticClass:"alert-text"},[t._v("\n                  Por favor, corrija el(los) siguiente(s) error(es):\n                  "),i("hr"),t._v(" "),i("ul",t._l(t.errorDevuelto,(function(a,e){return i("li",{key:e},[t._v(t._s(a))])})),0)]),t._v(" "),i("div",{staticClass:"alert-close"},[i("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[i("span",{attrs:{"aria-hidden":"true"}},[i("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-lg-12"},[i("transition",{attrs:{duration:1e3,name:"fade"}},[t.errores.length?i("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[i("div",{staticClass:"alert-icon"},[i("i",{staticClass:"flaticon-warning"})]),t._v(" "),i("div",{staticClass:"alert-text"},[t._v("\n                  Por favor, corrija el(los) siguiente(s) error(es):\n                  "),i("hr"),t._v(" "),i("ul",t._l(t.errores,(function(a,e){return i("li",{key:e},[t._v(t._s(a))])})),0)]),t._v(" "),i("div",{staticClass:"alert-close"},[i("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[i("span",{attrs:{"aria-hidden":"true"}},[i("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),i("form",[i("div",{staticClass:"form-group row"},[i("div",{staticClass:"col-lg-6"},[i("label",[t._v("Religión:")]),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.religionData.descripcion,expression:"religionData.descripcion"}],staticClass:"form-control text-capitalize",class:t.religionClases,attrs:{type:"text",placeholder:"Descripción"},domProps:{value:t.religionData.descripcion},on:{input:function(a){a.target.composing||t.$set(t.religionData,"descripcion",a.target.value)}}}),t._v(" "),t.religionError?i("div",{staticClass:"invalid-feedback"},[t._v(t._s(t.religionError))]):t._e()]),t._v(" "),i("div",{staticClass:"col-lg-6"},[i("label",[t._v("Observación:")]),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.religionData.observacion,expression:"religionData.observacion"}],staticClass:"form-control text-capitalize",attrs:{type:"text",placeholder:"Observación"},domProps:{value:t.religionData.observacion},on:{input:function(a){a.target.composing||t.$set(t.religionData,"observacion",a.target.value)}}})])]),t._v(" "),i("hr"),t._v(" "),i("div",{staticClass:"text-right"},[i("button",{staticClass:"btn btn-success",class:t.spinG,attrs:{type:"button",disabled:!t.valG},on:{click:t.guardar}},[i("i",{staticClass:"fa fa-edit"}),t._v(" Guardar\n            ")]),t._v(" "),i("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[i("i",{staticClass:"fa fa-window-close"}),t._v(" Cancelar\n            ")])])])])])],1)])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"kt-portlet__head"},[a("div",{staticClass:"kt-portlet__head-label"},[a("h3",{staticClass:"kt-portlet__head-title"},[a("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("GESTIÓN DE RELIGIONES")])])])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("thead",{},[i("tr",{staticClass:"kt-bg-fill-brand"},[i("th",[t._v("No.")]),t._v(" "),i("th",[t._v("Religión")]),t._v(" "),i("th",[t._v("Observación")]),t._v(" "),i("td",{staticClass:"text-center"},[t._v("Estado")]),t._v(" "),i("td",{staticClass:"text-center"},[t._v("Opciones")])])])}],!1,null,null,null);a.default=g.exports},98:function(t,a,i){var e=i(207);"string"==typeof e&&(e=[[t.i,e,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0};i(29)(e,r);e.locals&&(t.exports=e.locals)}}]);