(window.webpackJsonp=window.webpackJsonp||[]).push([[14],{121:function(t,a,i){"use strict";var s=i(77);i.n(s).a},122:function(t,a,i){(t.exports=i(28)(!1)).push([t.i,"\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n",""])},223:function(t,a,i){"use strict";i.r(a);var s=i(3),e=i.n(s),n=i(1);function r(t,a,i,s,e,n,r){try{var c=t[n](r),o=c.value}catch(t){return void i(t)}c.done?a(o):Promise.resolve(o).then(s,e)}function c(t){return function(){var a=this,i=arguments;return new Promise((function(s,e){var n=t.apply(a,i);function c(t){r(n,s,e,c,o,"next",t)}function o(t){r(n,s,e,c,o,"throw",t)}c(void 0)}))}}var o,l,d,u,v,p,f={mounted:function(){this.consultar(1)},name:"barri",data:function(){return{errores:[],bandera:!1,entrarPorError:!1,txtbusqueda:"",etnias:[],etniasData:{descripcion:"",observacion:"",id:0},csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},offset:4,LabelEtnia:"",datos:[],clasificacion:"",idEtnia:0,valG:!0}},computed:{etniaError:function(){if(""==this.etniasData.descripcion.trim())return"El campo es obligatorio"},etniaClases:function(){return[{"is-invalid":this.etniaError,"is-valid":!this.etniaError}]},esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var a=t+2*this.offset;a>=this.paginacion.ultima_pagina&&(a=this.paginacion.ultima_pagina);for(var i=[];t<=a;)i.push(t),t++;return i},spinG:function(){return this.valG?{}:["kt-spinner","kt-spinner--right","kt-spinner--sm","kt-spinner--light"]}},methods:{consultar:(p=c(e.a.mark((function t(a){var i,s=this;return e.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return i={txtbusqueda:this.txtbusqueda.trim(),_token:this.csrf,page:a},t.prev=1,t.next=4,(e=i,Object(n.a)().post("/etnias",e)).then((function(t){s.etnias=t.data.etnias.data,s.paginacion=t.data.paginacion}));case 4:t.next=15;break;case 6:t.prev=6,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=422===t.t1?11:13;break;case 11:case 13:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",15);case 15:case"end":return t.stop()}var e}),t,this,[[1,6]])}))),function(t){return p.apply(this,arguments)}),abrirModal:function(){this.etniasData.descripcion="",this.etniasData.observacion="",this.etniasData.id=0,this.errores=[],this.entrarPorError=!1,this.$refs.modalEtnias.show()},cerrarModal:function(){this.$refs.modalEtnias.hide()},guardarEtnia:(v=c(e.a.mark((function t(){var a,i=this;return e.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(this.checkForm()){t.next=4;break}this.entrarPorError=!1,t.next=23;break;case 4:return this.errores=[],a={_token:this.csrf,descripcion:this.etniasData.descripcion,observacion:this.etniasData.observacion,id:this.etniasData.id},this.valG=!1,t.prev=7,t.next=10,(s=a,Object(n.a)().post("/etnias/guardar",s)).then((function(t){i.consultar(1),i.etniasData.descripcion="",i.etniasData.observacion="",i.etniasData.id=0,i.cerrarModal(),i.$swal("Guardar...!","Datos Guardados Exitosamente!","success"),i.valG=!0})).catch((function(t){i.errorDevuelto=t.response.data.errors,i.entrarPorError=!0}));case 10:t.next=23;break;case 12:t.prev=12,t.t0=t.catch(7),t.t1=t.t0.response.status,t.next=419===t.t1?17:422===t.t1?19:21;break;case 17:case 19:case 21:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",23);case 23:case"end":return t.stop()}var s}),t,this,[[7,12]])}))),function(){return v.apply(this,arguments)}),checkForm:function(t){return this.errores=[],this.etniasData.descripcion||this.errores.push("La descripción es obligatoria."),!this.errores.length},cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.consultar(t)},eliminar:(u=c(e.a.mark((function t(a){var i,s,r=this;return e.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:i="",s="","Activo"==a.estado?(i="¿Desea anular la etnia "+a.descripcion+"?",s="Etnia "+a.descripcion+" anulada de manera exitosa"):(i="¿Desea activar la etnia "+a.descripcion+"?",s="Etnia "+a.descripcion+" activada de manera exitosa"),this.$swal({title:i,text:"",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Aceptar",cancelButtonText:"Cancelar"}).then((function(t){if(t.value){var i={_token:r.csrf,id:a.id,estado:a.estado};try{(e=i,Object(n.a)().post("/etnias/eliminar",e)).then((function(t){r.consultar(1),r.$swal({position:"top-end",icon:"success",title:s,showConfirmButton:!1,timer:2e3})})).catch((function(t){r.$swal("Error...!","Ocurrio un error!","error")}))}catch(t){switch(t.response.status){case 422:default:r.$swal("Error...!","Ocurrio un error!","error")}}}var e}));case 4:case"end":return t.stop()}}),t,this)}))),function(t){return u.apply(this,arguments)}),abrirModalClasi:function(t){this.LabelEtnia=t.descripcion,this.idEtnia=t.id,this.consultarClasificacion(),this.$refs.modalClasificacion.show()},cerrarModalClasi:function(){this.idEtnia=0,this.$refs.modalClasificacion.hide()},agregar:function(){""!=this.clasificacion?(this.datos.push({id:0,clasificacion:this.clasificacion,estado:"Activo"}),this.clasificacion=""):this.$swal("Error...!","Por favor digite una clasificación!","error")},eliminarItem:function(t,a){var i="";i="Activo"==a?"Inactivo":"Activo",this.datos[t].estado=i},guardarClasificacion:(d=c(e.a.mark((function t(){var a,i=this;return e.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(this.checkForm2()){t.next=4;break}this.entrarPorError=!1,t.next=23;break;case 4:return this.errores=[],a={_token:this.csrf,clasificacion:this.datos,id_etnia:this.idEtnia},this.valG=!1,t.prev=7,t.next=10,(s=a,Object(n.a)().post("/etnias/guardarClasificacion",s)).then((function(t){i.consultar(1),i.datos=[],i.clasificacion="",i.bandera=!1,i.cerrarModalClasi(),i.$swal("Guardar...!","Datos Guardados Exitosamente!","success"),i.valG=!0})).catch((function(t){i.errorDevuelto=t.response.data.errors,i.entrarPorError=!0}));case 10:t.next=23;break;case 12:t.prev=12,t.t0=t.catch(7),t.t1=t.t0.response.status,t.next=419===t.t1?17:422===t.t1?19:21;break;case 17:case 19:case 21:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",23);case 23:case"end":return t.stop()}var s}),t,this,[[7,12]])}))),function(){return d.apply(this,arguments)}),checkForm2:function(t){return this.errores=[],this.datos.length<=0&&this.errores.push("Agregue por lo menos una clasificación"),!this.errores.length},consultarClasificacion:(l=c(e.a.mark((function t(){var a,i=this;return e.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return a={id_etnia:this.idEtnia,_token:this.csrf},t.prev=1,t.next=4,(s=a,Object(n.a)().post("/etnias/listarClasificacion",s)).then((function(t){i.datos=t.data.clasificacion}));case 4:t.next=15;break;case 6:t.prev=6,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=422===t.t1?11:13;break;case 11:case 13:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",15);case 15:case"end":return t.stop()}var s}),t,this,[[1,6]])}))),function(){return l.apply(this,arguments)}),editar:(o=c(e.a.mark((function t(a){return e.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:this.etniasData.descripcion=a.descripcion,this.etniasData.observacion=a.observacion,this.etniasData.id=a.id,this.$refs.modalEtnias.show();case 4:case"end":return t.stop()}}),t,this)}))),function(t){return o.apply(this,arguments)})}},h=(i(121),i(4)),g=Object(h.a)(f,(function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",[i("div",{staticClass:"kt-portlet",staticStyle:{"margin-top":"-4%"}},[t._m(0),t._v(" "),i("div",{staticClass:"kt-portlet__body"},[i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-section__content"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-6 col-lg-6"},[i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-section__content"},[i("a",{staticClass:"btn btn-outline-primary btn-icon",attrs:{href:"javascript:;","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Nueva Etnia"},on:{click:t.abrirModal}},[i("i",{staticClass:"la la-file-text-o"})]),t._v(" \n                ")])])]),t._v(" "),i("div",{staticClass:"col-md-6 col-lg-6"},[i("form",{staticClass:"kt-form"},[i("div",{staticClass:"form-group"},[i("div",{staticClass:"input-group"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.txtbusqueda,expression:"txtbusqueda"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Busqueda"},domProps:{value:t.txtbusqueda},on:{input:function(a){a.target.composing||(t.txtbusqueda=a.target.value)}}}),t._v(" "),i("div",{staticClass:"input-group-append"},[i("button",{staticClass:"btn btn-primary btn-icon",attrs:{type:"button"},on:{click:function(a){return t.consultar(1)}}},[i("i",{staticClass:"fa fa-search"})])])])])])])]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-12"},[i("div",{staticClass:"table-responsive"},[i("table",{staticClass:"table table-sm table-hover"},[t._m(1),t._v(" "),i("tbody",t._l(t.etnias,(function(a,s){return i("tr",{key:s},[i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v(t._s(s+1))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.descripcion))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.observacion))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center"}},[i("span",{staticClass:"kt-badge kt-badge--inline",class:"Activo"==a.estado?"kt-badge--success":"kt-badge--danger"},[t._v(t._s(a.estado))])]),t._v(" "),i("td",{staticStyle:{"text-align":"center","vertical-align":"middle"}},[i("button",{staticClass:"btn btn-outline-success btn-icon btn-sm",attrs:{type:"button",title:"Agregar Clasificación"},on:{click:function(i){return t.abrirModalClasi(a)}}},[i("i",{staticClass:"fa fa-list"})]),t._v(" "),i("button",{staticClass:"btn btn-outline-info btn-icon btn-sm",attrs:{type:"button",title:"Editar"},on:{click:function(i){return t.editar(a)}}},[i("i",{staticClass:"fa fa-edit"})]),t._v(" "),i("button",{staticClass:"btn btn-icon btn-sm",class:"Activo"==a.estado?"btn-outline-danger":"btn-outline-success",attrs:{type:"button",title:"Activo"==a.estado?"Anular":"Activar"},on:{click:function(i){return t.eliminar(a)}}},[i("i",{staticClass:"fa",class:"Activo"==a.estado?"fa-trash":"fa-check"})])])])})),0)]),t._v(" "),i("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-pagination kt-pagination--danger"},[i("ul",{staticClass:"kt-pagination__links"},[t.paginacion.pagina_actual>1?i("li",{staticClass:"kt-pagination__link--first"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(1)}}},[i("i",{staticClass:"fa fa-angle-double-left kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual>1?i("li",{staticClass:"kt-pagination__link--next"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual-1)}}},[i("i",{staticClass:"fa fa-angle-left kt-font-danger"})])]):t._e(),t._v(" "),t._l(t.numeroDePaginas,(function(a,s){return i("li",{key:s,class:[a==t.esActivo?"kt-pagination__link--active":""]},[i("a",{attrs:{href:"javascript:;"},on:{click:function(i){return i.preventDefault(),t.cambiarPaginas(a)}}},[t._v(t._s(a))])])})),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?i("li",{staticClass:"kt-pagination__link--prev"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual+1)}}},[i("i",{staticClass:"fa fa-angle-right kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?i("li",{staticClass:"kt-pagination__link--last"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.ultima_pagina)}}},[i("i",{staticClass:"fa fa-angle-double-right kt-font-danger"})])]):t._e()],2)])])])])])])])]),t._v(" "),i("b-modal",{ref:"modalEtnias",attrs:{"hide-footer":"",title:"Gestion de Etnias",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[i("div",{staticClass:"d-block"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-lg-12"},[i("transition",{attrs:{duration:1e3,name:"fade"}},[t.entrarPorError?i("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[i("div",{staticClass:"alert-icon"},[i("i",{staticClass:"flaticon-warning"})]),t._v(" "),i("div",{staticClass:"alert-text"},[t._v("\n                  Por favor, corrija el(los) siguiente(s) error(es):\n                  "),i("hr"),t._v(" "),i("ul",t._l(t.errorDevuelto,(function(a,s){return i("li",{key:s},[t._v(t._s(a))])})),0)]),t._v(" "),i("div",{staticClass:"alert-close"},[i("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[i("span",{attrs:{"aria-hidden":"true"}},[i("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-lg-12"},[i("transition",{attrs:{duration:1e3,name:"fade"}},[t.errores.length?i("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[i("div",{staticClass:"alert-icon"},[i("i",{staticClass:"flaticon-warning"})]),t._v(" "),i("div",{staticClass:"alert-text"},[t._v("\n                  Por favor, corrija el(los) siguiente(s) error(es):\n                  "),i("hr"),t._v(" "),i("ul",t._l(t.errores,(function(a,s){return i("li",{key:s},[t._v(t._s(a))])})),0)]),t._v(" "),i("div",{staticClass:"alert-close"},[i("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[i("span",{attrs:{"aria-hidden":"true"}},[i("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),i("form",[i("div",{staticClass:"form-group row"},[i("div",{staticClass:"col-lg-4"},[i("label",[t._v("Etnia:")]),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.etniasData.descripcion,expression:"etniasData.descripcion"}],staticClass:"form-control text-capitalize",class:t.etniaClases,attrs:{type:"text",placeholder:"Descripción"},domProps:{value:t.etniasData.descripcion},on:{input:function(a){a.target.composing||t.$set(t.etniasData,"descripcion",a.target.value)}}}),t._v(" "),t.etniaError?i("div",{staticClass:"invalid-feedback"},[t._v(t._s(t.etniaError))]):t._e()]),t._v(" "),i("div",{staticClass:"col-lg-8"},[i("label",[t._v("Observación:")]),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.etniasData.observacion,expression:"etniasData.observacion"}],staticClass:"form-control text-capitalize",attrs:{type:"text",placeholder:"Observación"},domProps:{value:t.etniasData.observacion},on:{input:function(a){a.target.composing||t.$set(t.etniasData,"observacion",a.target.value)}}})])]),t._v(" "),i("hr"),t._v(" "),i("div",{staticClass:"text-right"},[i("button",{staticClass:"btn btn-success",class:t.spinG,attrs:{type:"button",disabled:!t.valG},on:{click:t.guardarEtnia}},[i("i",{staticClass:"fa fa-edit"}),t._v(" Guardar\n            ")]),t._v(" "),i("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[i("i",{staticClass:"fa fa-window-close"}),t._v(" Cancelar\n            ")])])])])]),t._v(" "),i("b-modal",{ref:"modalClasificacion",attrs:{"hide-footer":"",title:"Gestion de Clasificación de Etnias",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[i("div",{staticClass:"d-block"},[i("form",[i("div",{staticClass:"form-group row"},[i("div",{staticClass:"col-lg-12"},[i("label",{staticClass:"bold",staticStyle:{"font-size":"18px"}},[t._v("Etnia: "+t._s(t.LabelEtnia))])])]),t._v(" "),i("div",{staticClass:"form-group row"},[i("div",{staticClass:"col-lg-11"},[i("label",[t._v("Clasificación:")]),t._v(" "),i("input",{directives:[{name:"model",rawName:"v-model",value:t.clasificacion,expression:"clasificacion"}],staticClass:"form-control text-capitalize",attrs:{type:"text",placeholder:"Clasificación"},domProps:{value:t.clasificacion},on:{input:function(a){a.target.composing||(t.clasificacion=a.target.value)}}})]),t._v(" "),i("div",{staticClass:"col-lg-1"},[i("label",[t._v("   ")]),t._v(" "),i("a",{staticClass:"btn btn-outline-info btn-icon",attrs:{href:"javascript:;","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Agregar Clasificación"},on:{click:function(a){return a.preventDefault(),t.agregar(a)}}},[i("i",{staticClass:"fa fa-plus"})]),t._v(" \n            ")])]),t._v(" "),i("div",{staticClass:"form-group row"},[i("div",{staticClass:"col-md-12"},[i("div",{staticClass:"table-responsive"},[i("table",{staticClass:"table table-sm table-hover"},[i("thead",{},[i("tr",{staticClass:"kt-bg-fill-brand"},[i("th",[t._v("No.")]),t._v(" "),i("th",[t._v("Clasificación")]),t._v(" "),i("th",[t._v("Estado")]),t._v(" "),i("td",{staticClass:"text-center"},[t._v("Opciones")])])]),t._v(" "),i("tbody",t._l(t.datos,(function(a,s){return i("tr",{key:s},[i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v(t._s(s+1))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[i("span",{staticClass:"text-capitalize"},[t._v(t._s(a.clasificacion))])]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center"}},[i("span",{staticClass:"kt-badge kt-badge--inline",class:"Activo"==a.estado?"kt-badge--success":"kt-badge--danger"},[t._v(t._s(a.estado))])]),t._v(" "),i("td",{staticStyle:{"text-align":"center","vertical-align":"middle"}},[i("button",{staticClass:"btn btn-icon btn-sm",class:"Activo"==a.estado?"btn-outline-danger":"btn-outline-success",attrs:{type:"button",title:"Activo"==a.estado?"Anular":"Activar"},on:{click:function(i){return t.eliminarItem(s,a.estado)}}},[i("i",{staticClass:"fa",class:"Activo"==a.estado?"fa-trash":"fa-check"})])])])})),0)])])])]),t._v(" "),i("hr"),t._v(" "),i("div",{staticClass:"text-right"},[i("button",{staticClass:"btn btn-success",class:t.spinG,attrs:{type:"button",disabled:!t.valG},on:{click:t.guardarClasificacion}},[i("i",{staticClass:"fa fa-edit"}),t._v(" Guardar\n            ")]),t._v(" "),i("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModalClasi}},[i("i",{staticClass:"fa fa-window-close"}),t._v(" Cancelar\n            ")])])])])])],1)])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"kt-portlet__head"},[a("div",{staticClass:"kt-portlet__head-label"},[a("h3",{staticClass:"kt-portlet__head-title"},[a("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("GESTIÓN DE ETNIAS")])])])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("thead",{},[i("tr",{staticClass:"kt-bg-fill-brand"},[i("th",[t._v("No.")]),t._v(" "),i("th",[t._v("Etnia")]),t._v(" "),i("th",[t._v("Observación")]),t._v(" "),i("td",{staticClass:"text-center"},[t._v("Estado")]),t._v(" "),i("td",{staticClass:"text-center"},[t._v("Opciones")])])])}],!1,null,null,null);a.default=g.exports},77:function(t,a,i){var s=i(122);"string"==typeof s&&(s=[[t.i,s,""]]);var e={hmr:!0,transform:void 0,insertInto:void 0};i(29)(s,e);s.locals&&(t.exports=s.locals)}}]);