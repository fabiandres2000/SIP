(window.webpackJsonp=window.webpackJsonp||[]).push([[15],{200:function(t,a,s){"use strict";var i=s(95);s.n(i).a},201:function(t,a,s){(t.exports=s(28)(!1)).push([t.i,"\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n",""])},215:function(t,a,s){"use strict";s.r(a);var i=s(3),r=s.n(i),e=s(1);function n(t,a,s,i,r,e,n){try{var o=t[e](n),c=o.value}catch(t){return void s(t)}o.done?a(c):Promise.resolve(c).then(i,r)}function o(t){return function(){var a=this,s=arguments;return new Promise((function(i,r){var e=t.apply(a,s);function o(t){n(e,i,r,o,c,"next",t)}function c(t){n(e,i,r,o,c,"throw",t)}o(void 0)}))}}var c,l,u,d,p={mounted:function(){this.consultar(1)},name:"barri",data:function(){return{errores:[],bandera:!1,entrarPorError:!1,txtbusqueda:"",grupos:[],gruposData:{descripcion:"",observacion:"",id:0},csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},offset:4,valG:!0}},computed:{gruposError:function(){if(""==this.gruposData.descripcion.trim())return"El campo es obligatorio"},gruposClases:function(){return[{"is-invalid":this.gruposError,"is-valid":!this.gruposError}]},esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var a=t+2*this.offset;a>=this.paginacion.ultima_pagina&&(a=this.paginacion.ultima_pagina);for(var s=[];t<=a;)s.push(t),t++;return s},spinG:function(){return this.valG?{}:["kt-spinner","kt-spinner--right","kt-spinner--sm","kt-spinner--light"]}},methods:{consultar:(d=o(r.a.mark((function t(a){var s,i=this;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return s={txtbusqueda:this.txtbusqueda.trim(),_token:this.csrf,page:a},t.prev=1,t.next=4,(r=s,Object(e.a)().post("/grupos",r)).then((function(t){i.grupos=t.data.grupos_ayudas.data,i.paginacion=t.data.paginacion}));case 4:t.next=15;break;case 6:t.prev=6,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=422===t.t1?11:13;break;case 11:case 13:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",15);case 15:case"end":return t.stop()}var r}),t,this,[[1,6]])}))),function(t){return d.apply(this,arguments)}),abrirModal:function(){this.gruposData.descripcion="",this.gruposData.observacion="",this.gruposData.id=0,this.errores=[],this.entrarPorError=!1,this.$refs.modalGrupo.show()},cerrarModal:function(){this.$refs.modalGrupo.hide()},guardar:(u=o(r.a.mark((function t(){var a,s=this;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(this.checkForm()){t.next=4;break}this.entrarPorError=!1,t.next=23;break;case 4:return this.errores=[],a={_token:this.csrf,descripcion:this.gruposData.descripcion,observacion:this.gruposData.observacion,id:this.gruposData.id},this.valG=!1,t.prev=7,t.next=10,(i=a,Object(e.a)().post("/grupos/guardar",i)).then((function(t){s.consultar(1),s.gruposData.descripcion="",s.gruposData.observacion="",s.gruposData.id=0,s.cerrarModal(),s.$swal("Guardar...!","Datos Guardados Exitosamente!","success"),s.valG=!0})).catch((function(t){s.errorDevuelto=t.response.data.errors,s.entrarPorError=!0}));case 10:t.next=23;break;case 12:t.prev=12,t.t0=t.catch(7),t.t1=t.t0.response.status,t.next=419===t.t1?17:422===t.t1?19:21;break;case 17:case 19:case 21:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",23);case 23:case"end":return t.stop()}var i}),t,this,[[7,12]])}))),function(){return u.apply(this,arguments)}),checkForm:function(t){return this.errores=[],this.gruposData.descripcion||this.errores.push("La descripción es obligatoria."),!this.errores.length},cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.consultar(t)},eliminar:(l=o(r.a.mark((function t(a){var s,i,n=this;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:s="",i="","Activo"==a.estado?(s="¿Desea anular el grupo de ayuda "+a.descripcion+"?",i="Grupo de ayuda "+a.descripcion+" anulado de manera exitosa"):(s="¿Desea activar el grupo de ayuda "+a.descripcion+"?",i="Grupo de ayuda "+a.descripcion+" activado de manera exitosa"),this.$swal({title:s,text:"",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Aceptar",cancelButtonText:"Cancelar"}).then((function(t){if(t.value){var s={_token:n.csrf,id:a.id,estado:a.estado};try{(r=s,Object(e.a)().post("/grupos/eliminar",r)).then((function(t){n.consultar(1),n.$swal({position:"top-end",icon:"success",title:i,showConfirmButton:!1,timer:2e3})})).catch((function(t){n.$swal("Error...!","Ocurrio un error!","error")}))}catch(t){switch(t.response.status){case 422:default:n.$swal("Error...!","Ocurrio un error!","error")}}}var r}));case 4:case"end":return t.stop()}}),t,this)}))),function(t){return l.apply(this,arguments)}),editar:(c=o(r.a.mark((function t(a){return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:this.gruposData.descripcion=a.descripcion,this.gruposData.observacion=a.observacion,this.gruposData.id=a.id,this.$refs.modalGrupo.show();case 4:case"end":return t.stop()}}),t,this)}))),function(t){return c.apply(this,arguments)})}},v=(s(200),s(4)),g=Object(v.a)(p,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",[s("div",{staticClass:"kt-portlet",staticStyle:{"margin-top":"-4%"}},[t._m(0),t._v(" "),s("div",{staticClass:"kt-portlet__body"},[s("div",{staticClass:"kt-section"},[s("div",{staticClass:"kt-section__content"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-6 col-lg-6"},[s("div",{staticClass:"kt-section"},[s("div",{staticClass:"kt-section__content"},[s("a",{staticClass:"btn btn-outline-primary btn-icon",attrs:{href:"javascript:;","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Nuevo Grupo de Ayuda"},on:{click:t.abrirModal}},[s("i",{staticClass:"la la-file-text-o"})]),t._v(" \n                ")])])]),t._v(" "),s("div",{staticClass:"col-md-6 col-lg-6"},[s("form",{staticClass:"kt-form"},[s("div",{staticClass:"form-group"},[s("div",{staticClass:"input-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.txtbusqueda,expression:"txtbusqueda"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Busqueda"},domProps:{value:t.txtbusqueda},on:{input:function(a){a.target.composing||(t.txtbusqueda=a.target.value)}}}),t._v(" "),s("div",{staticClass:"input-group-append"},[s("button",{staticClass:"btn btn-primary btn-icon",attrs:{type:"button"},on:{click:function(a){return t.consultar(1)}}},[s("i",{staticClass:"fa fa-search"})])])])])])])]),t._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-12"},[s("div",{staticClass:"table-responsive"},[s("table",{staticClass:"table table-sm table-hover"},[t._m(1),t._v(" "),s("tbody",t._l(t.grupos,(function(a,i){return s("tr",{key:i},[s("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v(t._s(i+1))]),t._v(" "),s("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.descripcion))]),t._v(" "),s("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.observacion))]),t._v(" "),s("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center"}},[s("span",{staticClass:"kt-badge kt-badge--inline",class:"Activo"==a.estado?"kt-badge--success":"kt-badge--danger"},[t._v(t._s(a.estado))])]),t._v(" "),s("td",{staticStyle:{"text-align":"center","vertical-align":"middle"}},[s("button",{staticClass:"btn btn-outline-info btn-icon btn-sm",attrs:{type:"button",title:"Editar"},on:{click:function(s){return t.editar(a)}}},[s("i",{staticClass:"fa fa-edit"})]),t._v(" "),s("button",{staticClass:"btn btn-icon btn-sm",class:"Activo"==a.estado?"btn-outline-danger":"btn-outline-success",attrs:{type:"button",title:"Activo"==a.estado?"Anular":"Activar"},on:{click:function(s){return t.eliminar(a)}}},[s("i",{staticClass:"fa",class:"Activo"==a.estado?"fa-trash":"fa-check"})])])])})),0)]),t._v(" "),s("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),s("div",{staticClass:"kt-section"},[s("div",{staticClass:"kt-pagination kt-pagination--danger"},[s("ul",{staticClass:"kt-pagination__links"},[t.paginacion.pagina_actual>1?s("li",{staticClass:"kt-pagination__link--first"},[s("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(1)}}},[s("i",{staticClass:"fa fa-angle-double-left kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual>1?s("li",{staticClass:"kt-pagination__link--next"},[s("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual-1)}}},[s("i",{staticClass:"fa fa-angle-left kt-font-danger"})])]):t._e(),t._v(" "),t._l(t.numeroDePaginas,(function(a,i){return s("li",{key:i,class:[a==t.esActivo?"kt-pagination__link--active":""]},[s("a",{attrs:{href:"javascript:;"},on:{click:function(s){return s.preventDefault(),t.cambiarPaginas(a)}}},[t._v(t._s(a))])])})),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?s("li",{staticClass:"kt-pagination__link--prev"},[s("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual+1)}}},[s("i",{staticClass:"fa fa-angle-right kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?s("li",{staticClass:"kt-pagination__link--last"},[s("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.ultima_pagina)}}},[s("i",{staticClass:"fa fa-angle-double-right kt-font-danger"})])]):t._e()],2)])])])])])])])]),t._v(" "),s("b-modal",{ref:"modalGrupo",attrs:{"hide-footer":"",title:"Gestion de Grupos de Ayudas",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[s("div",{staticClass:"d-block"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-lg-12"},[s("transition",{attrs:{duration:1e3,name:"fade"}},[t.entrarPorError?s("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[s("div",{staticClass:"alert-icon"},[s("i",{staticClass:"flaticon-warning"})]),t._v(" "),s("div",{staticClass:"alert-text"},[t._v("\n                  Por favor, corrija el(los) siguiente(s) error(es):\n                  "),s("hr"),t._v(" "),s("ul",t._l(t.errorDevuelto,(function(a,i){return s("li",{key:i},[t._v(t._s(a))])})),0)]),t._v(" "),s("div",{staticClass:"alert-close"},[s("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[s("span",{attrs:{"aria-hidden":"true"}},[s("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"col-lg-12"},[s("transition",{attrs:{duration:1e3,name:"fade"}},[t.errores.length?s("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[s("div",{staticClass:"alert-icon"},[s("i",{staticClass:"flaticon-warning"})]),t._v(" "),s("div",{staticClass:"alert-text"},[t._v("\n                  Por favor, corrija el(los) siguiente(s) error(es):\n                  "),s("hr"),t._v(" "),s("ul",t._l(t.errores,(function(a,i){return s("li",{key:i},[t._v(t._s(a))])})),0)]),t._v(" "),s("div",{staticClass:"alert-close"},[s("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[s("span",{attrs:{"aria-hidden":"true"}},[s("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),s("form",[s("div",{staticClass:"form-group row"},[s("div",{staticClass:"col-lg-6"},[s("label",[t._v("Grupo de Ayuda:")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.gruposData.descripcion,expression:"gruposData.descripcion"}],staticClass:"form-control text-capitalize",class:t.gruposClases,attrs:{type:"text",placeholder:"Descripción"},domProps:{value:t.gruposData.descripcion},on:{input:function(a){a.target.composing||t.$set(t.gruposData,"descripcion",a.target.value)}}}),t._v(" "),t.gruposError?s("div",{staticClass:"invalid-feedback"},[t._v(t._s(t.gruposError))]):t._e()]),t._v(" "),s("div",{staticClass:"col-lg-6"},[s("label",[t._v("Observación:")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.gruposData.observacion,expression:"gruposData.observacion"}],staticClass:"form-control text-capitalize",attrs:{type:"text",placeholder:"Observación"},domProps:{value:t.gruposData.observacion},on:{input:function(a){a.target.composing||t.$set(t.gruposData,"observacion",a.target.value)}}})])]),t._v(" "),s("hr"),t._v(" "),s("div",{staticClass:"text-right"},[s("button",{staticClass:"btn btn-success",class:t.spinG,attrs:{type:"button",disabled:!t.valG},on:{click:t.guardar}},[s("i",{staticClass:"fa fa-edit"}),t._v(" Guardar\n            ")]),t._v(" "),s("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[s("i",{staticClass:"fa fa-window-close"}),t._v(" Cancelar\n            ")])])])])])],1)])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"kt-portlet__head"},[a("div",{staticClass:"kt-portlet__head-label"},[a("h3",{staticClass:"kt-portlet__head-title"},[a("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("GESTIÓN DE GRUPOS DE AYUDAS")])])])])},function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("thead",{},[s("tr",{staticClass:"kt-bg-fill-brand"},[s("th",[t._v("No.")]),t._v(" "),s("th",[t._v("Grupo de Ayuda")]),t._v(" "),s("th",[t._v("Observación")]),t._v(" "),s("td",{staticClass:"text-center"},[t._v("Estado")]),t._v(" "),s("td",{staticClass:"text-center"},[t._v("Opciones")])])])}],!1,null,null,null);a.default=g.exports},95:function(t,a,s){var i=s(201);"string"==typeof i&&(i=[[t.i,i,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0};s(29)(i,r);i.locals&&(t.exports=i.locals)}}]);