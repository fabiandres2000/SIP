(window.webpackJsonp=window.webpackJsonp||[]).push([[8],{162:function(t,a,i){"use strict";var e=i(87);i.n(e).a},163:function(t,a,i){(t.exports=i(28)(!1)).push([t.i,"\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n",""])},233:function(t,a,i){"use strict";i.r(a);var e=i(3),s=i.n(e),n=i(30),r=i(131),o=i.n(r),l=i(161),c=i.n(l);function d(t,a,i,e,s,n,r){try{var o=t[n](r),l=o.value}catch(t){return void i(t)}o.done?a(l):Promise.resolve(l).then(e,s)}function v(t){return function(){var a=this,i=arguments;return new Promise((function(e,s){var n=t.apply(a,i);function r(t){d(n,e,s,r,o,"next",t)}function o(t){d(n,e,s,r,o,"throw",t)}r(void 0)}))}}var p,u,f,_,g,m={mounted:function(){this.consultar(1)},data:function(){return{caracterizacion:[],caracterizacion2:[],caracterizacion3:[],integrantes:[],txtbusqueda:"",bandera:!1,csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),datos:[],paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},offset:4}},computed:{esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var a=t+2*this.offset;a>=this.paginacion.ultima_pagina&&(a=this.paginacion.ultima_pagina);for(var i=[];t<=a;)i.push(t),t++;return i}},methods:{cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.consultar(t)},consultar:(g=v(s.a.mark((function t(a){var i,e=this;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return i={txtbusqueda:this.txtbusqueda.trim(),_token:this.csrf,page:a},t.prev=1,t.next=4,n.f(i).then((function(t){e.caracterizacion=t.data.caracterizacion.data,e.paginacion=t.data.paginacion}));case 4:t.next=15;break;case 6:t.prev=6,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=422===t.t1?11:13;break;case 11:case 13:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",15);case 15:case"end":return t.stop()}}),t,this,[[1,6]])}))),function(t){return g.apply(this,arguments)}),eliminar:(_=v(s.a.mark((function t(a){var i,e,r=this;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:i="",e="","Activo"==a.ESTADO?(i="¿Desea anular el usuario "+a.USUARIO+"?",e="Usuario "+a.USUARIO+" anulado de manera exitosa"):(i="¿Desea activar el usuario "+a.USUARIO+"?",e="Usuario "+a.USUARIO+" activado de manera exitosa"),this.$swal({title:i,text:"",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Aceptar",cancelButtonText:"Cancelar"}).then((function(t){if(t.value){var i={_token:r.csrf,id:a.id,estado:a.ESTADO};try{n.b(i).then((function(t){r.consultar(1),r.$swal({position:"top-end",icon:"success",title:e,showConfirmButton:!1,timer:2e3})})).catch((function(t){r.$swal("Error...!","Ocurrio un error!","error")}))}catch(t){switch(t.response.status){case 422:default:r.$swal("Error...!","Ocurrio un error!","error")}}}}));case 4:case"end":return t.stop()}}),t,this)}))),function(t){return _.apply(this,arguments)}),ExportarTodo:(f=v(s.a.mark((function t(){var a,i;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:a=new c.a({orientation:"portrait"}),i=document.createElement("canvas"),o()(this.$refs.content,{canvas:i}).then((function(t){var i=t.toDataURL("image/jpeg");a.addImage(i,"JPEG",5,20),a.save("Listado de Usuarios.pdf")})),this.$swal({position:"top-end",icon:"success",title:"Datos exportados a pdf de manera exitosa",showConfirmButton:!1,timer:2e3});case 4:case"end":return t.stop()}}),t,this)}))),function(){return f.apply(this,arguments)}),DescargarPdf:function(t){var a=new Blob([t.data],{type:"application/pdf"}),i=window.URL.createObjectURL(a);if(window.navigator&&window.navigator.msSaveOrOpenBlob)window.navigator.msSaveOrOpenBlob(a);else{var e=document.createElement("a");e.href=i,e.download="Caracterizacion.pdf",e.click(),e.remove(),setTimeout((function(){URL.revokeObjectURL(i)}),100)}},cerrarModal:function(){this.$refs.modalExportar.hide(),this.$refs.modalExportar2.hide()},abrirModal:(u=v(s.a.mark((function t(){var a,i=this;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:a={_token:this.csrf},t.prev=1,n.c(a).then((function(t){i.caracterizacion2=t.data.caracterizacion,i.$refs.modalExportar.show()})).catch((function(t){i.$swal("Error...!","Ocurrio un error!","error")})),t.next=14;break;case 5:t.prev=5,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=422===t.t1?10:12;break;case 10:case 12:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",14);case 14:case"end":return t.stop()}}),t,this,[[1,5]])}))),function(){return u.apply(this,arguments)}),abrirModal2:(p=v(s.a.mark((function t(a){var i,e=this;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:i={_token:this.csrf,id:a.id},t.prev=1,n.d(i).then((function(t){console.log(t.data.integrantes),e.caracterizacion3=t.data.caracterizacion,e.integrantes=t.data.integrantes,e.$refs.modalExportar2.show()})).catch((function(t){e.$swal("Error...!","Ocurrio un error!","error")})),t.next=14;break;case 5:t.prev=5,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=422===t.t1?10:12;break;case 10:case 12:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",14);case 14:case"end":return t.stop()}}),t,this,[[1,5]])}))),function(t){return p.apply(this,arguments)})}},h=(i(162),i(4)),b=Object(h.a)(m,(function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",[i("div",{staticClass:"kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile",staticStyle:{"margin-top":"-4%"}},[t._m(0),t._v(" "),i("div",{staticClass:"kt-portlet__body"},[i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-section__content"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-6 col-lg-6"},[i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-section__content"},[i("router-link",{staticClass:"btn btn-outline-primary btn-icon",attrs:{to:"/ingreso",title:"Nueva Caracterización"}},[i("i",{staticClass:"la la-file-text-o"})]),t._v(" \n                  "),i("a",{staticClass:"btn btn-outline-warning btn-icon",attrs:{href:"javascript:;",title:"Exportar a Pdf"},on:{click:t.abrirModal}},[i("i",{staticClass:"la la-file-pdf-o"})])],1)])]),t._v(" "),i("div",{staticClass:"col-md-6 col-lg-6"},[i("form",{staticClass:"kt-form"},[i("div",{staticClass:"form-group"},[i("div",{staticClass:"input-group"},[i("input",{directives:[{name:"model",rawName:"v-model",value:t.txtbusqueda,expression:"txtbusqueda"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Busqueda"},domProps:{value:t.txtbusqueda},on:{input:function(a){a.target.composing||(t.txtbusqueda=a.target.value)}}}),t._v(" "),i("div",{staticClass:"input-group-append"},[i("button",{staticClass:"btn btn-primary btn-icon",attrs:{type:"button"},on:{click:function(a){return t.consultar(1)}}},[i("i",{staticClass:"fa fa-search"})])])])])])])]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-12"},[i("div",{staticClass:"table-responsive"},[i("table",{staticClass:"table table-sm table-hover"},[t._m(1),t._v(" "),i("tbody",t._l(t.caracterizacion,(function(a,e){return i("tr",{key:e},[i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v(t._s(e+1))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.DPTO.toUpperCase()))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.MUNI.toUpperCase()))]),t._v(" "),null!==a.CORREGIMIENTO?i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.CORREGIMIENTO.toUpperCase()))]):i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}}),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.IDENTIFICACION.toUpperCase()))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.USUARIO.toUpperCase()))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center"}},[i("span",{staticClass:"kt-badge kt-badge--inline",class:"Activo"==a.ESTADO?"kt-badge--success":"kt-badge--danger"},[t._v(t._s(a.ESTADO.toUpperCase()))])]),t._v(" "),i("td",{staticStyle:{"text-align":"center","vertical-align":"middle"}},[i("button",{staticClass:"btn btn-outline-success btn-icon btn-sm",attrs:{type:"button",title:"Imprimir"},on:{click:function(i){return t.abrirModal2(a)}}},[i("i",{staticClass:"fa fa-file-pdf"})]),t._v(" "),t._m(2,!0),t._v(" "),i("button",{staticClass:"btn btn-icon btn-sm",class:"Activo"==a.ESTADO?"btn-outline-danger":"btn-outline-success",attrs:{type:"button",title:"Activo"==a.ESTADO?"Anular":"Activar"},on:{click:function(i){return t.eliminar(a)}}},[i("i",{staticClass:"fa",class:"Activo"==a.ESTADO?"fa-trash":"fa-check"})])])])})),0)]),t._v(" "),i("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-pagination kt-pagination--danger"},[i("ul",{staticClass:"kt-pagination__links"},[t.paginacion.pagina_actual>1?i("li",{staticClass:"kt-pagination__link--first"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(1)}}},[i("i",{staticClass:"fa fa-angle-double-left kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual>1?i("li",{staticClass:"kt-pagination__link--next"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual-1)}}},[i("i",{staticClass:"fa fa-angle-left kt-font-danger"})])]):t._e(),t._v(" "),t._l(t.numeroDePaginas,(function(a,e){return i("li",{key:e,class:[a==t.esActivo?"kt-pagination__link--active":""]},[i("a",{attrs:{href:"javascript:;"},on:{click:function(i){return i.preventDefault(),t.cambiarPaginas(a)}}},[t._v(t._s(a))])])})),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?i("li",{staticClass:"kt-pagination__link--prev"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual+1)}}},[i("i",{staticClass:"fa fa-angle-right kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?i("li",{staticClass:"kt-pagination__link--last"},[i("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.ultima_pagina)}}},[i("i",{staticClass:"fa fa-angle-double-right kt-font-danger"})])]):t._e()],2)])])])])])])])]),t._v(" "),i("b-modal",{ref:"modalExportar",attrs:{"hide-footer":"",title:"Listado de Usuarios Caracterizados",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[i("div",{staticClass:"d-block"},[i("div",{ref:"content"},[i("div",{staticClass:"kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"},[i("div",{staticClass:"kt-portlet__body"},[i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-section__content"},[i("div",{staticClass:"row justify-content-center"},[i("div",{staticClass:"col-xl-12"},[i("center",[i("span",{staticClass:"kt-font-boldest",staticStyle:{"font-size":"22px"}},[t._v("SISTEMA INTEGRADO POBLACIONAL")])])],1)]),t._v(" "),i("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),i("div",{staticClass:"row justify-content-center"},[i("div",{staticClass:"col-xl-12"},[i("div",{staticClass:"table-responsive"},[i("p",[i("span",{staticClass:"kt-font-boldest",staticStyle:{"font-size":"18px"}},[t._v("Listado de usuarios caracterizados")])]),t._v(" "),i("table",{staticClass:"table table-sm table-hover"},[i("thead",{},[i("tr",{staticClass:"kt-bg-fill-brand"},[i("th",[t._v("No.")]),t._v(" "),i("th",[t._v("Departamento")]),t._v(" "),i("th",[t._v("Municipio")]),t._v(" "),i("th",[t._v("Corregimiento")]),t._v(" "),i("th",[t._v("Identificación")]),t._v(" "),i("th",[t._v("Usuario")])])]),t._v(" "),i("tbody",t._l(t.caracterizacion2,(function(a,e){return i("tr",{key:e},[i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v(t._s(e+1))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.DPTO.toUpperCase()))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.MUNI.toUpperCase()))]),t._v(" "),null!==a.CORREGIMIENTO?i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.CORREGIMIENTO.toUpperCase()))]):i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}}),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.IDENTIFICACION.toUpperCase()))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.USUARIO.toUpperCase()))])])})),0)]),t._v(" "),i("div",{staticClass:"kt-separator kt-separator--border-dashed"})])])])])])])])]),t._v(" "),i("hr"),t._v(" "),i("div",{staticClass:"text-right"},[i("button",{staticClass:"btn btn-success",attrs:{type:"button"},on:{click:t.ExportarTodo}},[i("i",{staticClass:"la la-file-pdf-o"}),t._v(" Imprimir\n          ")]),t._v(" "),i("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[i("i",{staticClass:"fa fa-window-close"}),t._v(" Cerrar\n          ")])])])]),t._v(" "),i("b-modal",{ref:"modalExportar2",attrs:{"hide-footer":"",title:"Detalle de Usuario Caracterizado",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[i("div",{staticClass:"d-block"},[i("div",{ref:"content"},[i("div",{staticClass:"kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"},[i("div",{staticClass:"kt-portlet__body"},[i("div",{staticClass:"kt-section"},[i("div",{staticClass:"kt-section__content"},[i("div",{staticClass:"row justify-content-center"},[i("div",{staticClass:"col-xl-12"},[i("center")],1)]),t._v(" "),i("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),i("div",{staticClass:"row justify-content-center"},[i("div",{staticClass:"col-xl-12"},[i("p",[i("span",{staticClass:"kt-font-boldest",staticStyle:{"font-size":"18px"}},[t._v("Cabeza de Hogar")])])])]),t._v(" "),t._l(t.caracterizacion3,(function(a,e){return i("div",{key:e,staticStyle:{"font-size":"15px"}},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-3"},[i("label",{staticClass:"kt-font-bold"},[t._v("Identificación:")])]),t._v(" "),i("div",{staticClass:"col-md-6"},[i("label",[t._v(t._s(a.IDENTIFICACION))])])]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-3"},[i("label",{staticClass:"kt-font-bold"},[t._v("Nombre:")])]),t._v(" "),i("div",{staticClass:"col-md-6"},[i("label",[t._v(t._s(a.USUARIO))])])]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-3"},[i("label",{staticClass:"kt-font-bold"},[t._v("Departamento:")])]),t._v(" "),i("div",{staticClass:"col-md-6"},[i("label",[t._v(t._s(a.DPTO))])])]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-3"},[i("label",{staticClass:"kt-font-bold"},[t._v("Municipio:")])]),t._v(" "),i("div",{staticClass:"col-md-6"},[i("label",[t._v(t._s(a.MUNI))])])]),t._v(" "),i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-3"},[i("label",{staticClass:"kt-font-bold"},[t._v("Dirección:")])]),t._v(" "),i("div",{staticClass:"col-md-6"},[i("label",[t._v(t._s(a.DIRECCION))])])])])})),t._v(" "),i("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),i("div",{staticClass:"row justify-content-center"},[i("div",{staticClass:"col-xl-12"},[i("div",{staticClass:"table-responsive"},[i("p",[i("span",{staticClass:"kt-font-boldest",staticStyle:{"font-size":"18px"}},[t._v("Integrantes del Hogar")])]),t._v(" "),i("table",{staticClass:"table table-sm table-hover"},[i("thead",{},[i("tr",{staticClass:"kt-bg-fill-brand"},[i("th",[t._v("No.")]),t._v(" "),i("th",[t._v("Identificación")]),t._v(" "),i("th",[t._v("Integrante")]),t._v(" "),i("th",[t._v("Sexo")]),t._v(" "),i("th",[t._v("Edad")]),t._v(" "),i("th",[t._v("Parentesco")])])]),t._v(" "),i("tbody",t._l(t.integrantes,(function(a,e){return i("tr",{key:e},[i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v(t._s(e+1))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.documento)+": "+t._s(a.tipo_id.toUpperCase()))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.identificacion.toUpperCase()))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.sexo.toUpperCase()))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.edad))]),t._v(" "),i("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.PARENT))])])})),0)]),t._v(" "),i("div",{staticClass:"kt-separator kt-separator--border-dashed"})])])])],2)])])])]),t._v(" "),i("hr"),t._v(" "),i("div",{staticClass:"text-right"},[i("button",{staticClass:"btn btn-success",attrs:{type:"button"},on:{click:t.ExportarTodo}},[i("i",{staticClass:"la la-file-pdf-o"}),t._v(" Imprimir\n          ")]),t._v(" "),i("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[i("i",{staticClass:"fa fa-window-close"}),t._v(" Cerrar\n          ")])])])])],1)])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"kt-portlet__head"},[a("div",{staticClass:"kt-portlet__head-label"},[a("h3",{staticClass:"kt-portlet__head-title"},[a("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("GESTIÓN DE CARACTERIZACIÓN")])])])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("thead",{},[i("tr",{staticClass:"kt-bg-fill-brand"},[i("th",[t._v("No.")]),t._v(" "),i("th",[t._v("Departamento")]),t._v(" "),i("th",[t._v("Municipio")]),t._v(" "),i("th",[t._v("Corregimiento")]),t._v(" "),i("th",[t._v("Identificación")]),t._v(" "),i("th",[t._v("Usuario")]),t._v(" "),i("td",{staticClass:"text-center"},[t._v("Estado")]),t._v(" "),i("td",{staticClass:"text-center"},[t._v("Opciones")])])])},function(){var t=this.$createElement,a=this._self._c||t;return a("button",{staticClass:"btn btn-outline-info btn-icon btn-sm",attrs:{type:"button",title:"Editar"}},[a("i",{staticClass:"fa fa-edit"})])}],!1,null,null,null);a.default=b.exports},87:function(t,a,i){var e=i(163);"string"==typeof e&&(e=[[t.i,e,""]]);var s={hmr:!0,transform:void 0,insertInto:void 0};i(29)(e,s);e.locals&&(t.exports=e.locals)}}]);