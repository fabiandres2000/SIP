(window.webpackJsonp=window.webpackJsonp||[]).push([[55],{646:function(t,e,a){"use strict";a.r(e);var o=a(0),s=a.n(o),i=a(4),n=a(167),r=a.n(n),l=(a(170),a(171)),c=a.n(l),d=a(153),u=a.n(d),p=a(172),v=a.n(p);function m(t,e,a,o,s,i,n){try{var r=t[i](n),l=r.value}catch(t){return void a(t)}r.done?e(l):Promise.resolve(l).then(o,s)}function _(t){return function(){var e=this,a=arguments;return new Promise((function(o,s){var i=t.apply(e,a);function n(t){m(i,o,s,n,r,"next",t)}function r(t){m(i,o,s,n,r,"throw",t)}n(void 0)}))}}a(139),a(169),u.a.vfs=v.a.pdfMake.vfs,window.JSZip=c.a;var f,b,g={mounted:function(){this.consultar(1),this.hoy=moment()},filters:{moment:function(t){function e(e){return t.apply(this,arguments)}return e.toString=function(){return t.toString()},e}((function(t){return moment(t).format("YYYY-MM-DD")}))},name:"entes",data:function(){return{errores:[],usuarios:[],logs:[],errorDevuelto:[],entrarPorError:!1,logData:{id:0,id_usuario:0,accion:"",fecha:"",hora:"",estado:"Activo",ip:"",modulo:""},datos:{usuarios:"0",fecha:"0",modulos:"0"},hoy:"",csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),headerTextVariant:"light",mostrar:!0,paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},offset:4,valG:!0,actual:0,tabladatos:null}},computed:{esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var e=t+2*this.offset;e>=this.paginacion.ultima_pagina&&(e=this.paginacion.ultima_pagina);for(var a=[];t<=e;)a.push(t),t++;return a}},methods:{iniciarTabla:function(){this.tabla()},consultar:(b=_(s.a.mark((function t(e){var a,o=this;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return a={_token:this.csrf,page:e},t.prev=1,t.next=4,i.o(a).then((function(t){o.usuarios=t.data.usuarios,o.logs=t.data.logs,o.iniciarTabla()}));case 4:t.next=17;break;case 6:t.prev=6,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=419===t.t1?11:422===t.t1?13:15;break;case 11:case 13:case 15:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",17);case 17:case"end":return t.stop()}}),t,this,[[1,6]])}))),function(t){return b.apply(this,arguments)}),cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.buscar(t)},buscar:(f=_(s.a.mark((function t(e){var a,o=this;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return this.logs=[],a={_token:this.csrf,id_usuario:this.datos.usuarios,modulos:this.datos.modulos,fecha:this.datos.fecha,page:e},t.prev=2,t.next=5,i.p(a).then((function(t){$.fn.DataTable=r.a,o.tabladatos.fnClearTable(),o.tabladatos.fnDestroy(),o.logs=t.data.logs,o.iniciarTabla()}));case 5:t.next=18;break;case 7:t.prev=7,t.t0=t.catch(2),t.t1=t.t0.response.status,t.next=419===t.t1?12:422===t.t1?14:16;break;case 12:case 14:case 16:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",18);case 18:case"end":return t.stop()}}),t,this,[[2,7]])}))),function(t){return f.apply(this,arguments)}),tabla:function(){var t=this;this.$nextTick((function(){$.fn.DataTable=r.a,t.tabladatos=$("#tablaDatos").DataTable({orderCellsTop:!0,language:{processing:"Procesando...",lengthMenu:"Mostrar _MENU_ registros",zeroRecords:"No se encontraron resultados",emptyTable:"Ningún dato disponible en esta tabla",infoEmpty:"Mostrando registros del 0 al 0 de un total de 0 registros",infoFiltered:"(filtrado de un total de _MAX_ registros)",search:"Buscar:",infoThousands:",",loadingRecords:"Cargando...",paginate:{first:"Primero",last:"Último",next:"Siguiente",previous:"Anterior"},aria:{sortAscending:": Activar para ordenar la columna de manera ascendente",sortDescending:": Activar para ordenar la columna de manera descendente"},buttons:{copy:"Copiar",colvis:"Visibilidad",collection:"Colección",colvisRestore:"Restaurar visibilidad",copyKeys:"Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",copySuccess:{1:"Copiada 1 fila al portapapeles",_:"Copiadas %d fila al portapapeles"},copyTitle:"Copiar al portapapeles",csv:"CSV",excel:"Excel",pageLength:{"-1":"Mostrar todas las filas",_:"Mostrar %d filas"},pdf:"PDF",print:"Imprimir"},autoFill:{cancel:"Cancelar",fill:"Rellene todas las celdas con <i>%d</i>",fillHorizontal:"Rellenar celdas horizontalmente",fillVertical:"Rellenar celdas verticalmentemente"},decimal:",",searchBuilder:{add:"Añadir condición",button:{0:"Constructor de búsqueda",_:"Constructor de búsqueda (%d)"},clearAll:"Borrar todo",condition:"Condición",conditions:{date:{after:"Despues",before:"Antes",between:"Entre",empty:"Vacío",equals:"Igual a",notBetween:"No entre",notEmpty:"No Vacio",not:"Diferente de"},number:{between:"Entre",empty:"Vacio",equals:"Igual a",gt:"Mayor a",gte:"Mayor o igual a",lt:"Menor que",lte:"Menor o igual que",notBetween:"No entre",notEmpty:"No vacío",not:"Diferente de"},string:{contains:"Contiene",empty:"Vacío",endsWith:"Termina en",equals:"Igual a",notEmpty:"No Vacio",startsWith:"Empieza con",not:"Diferente de"},array:{not:"Diferente de",equals:"Igual",empty:"Vacío",contains:"Contiene",notEmpty:"No Vacío",without:"Sin"}},data:"Data",deleteTitle:"Eliminar regla de filtrado",leftTitle:"Criterios anulados",logicAnd:"Y",logicOr:"O",rightTitle:"Criterios de sangría",title:{0:"Constructor de búsqueda",_:"Constructor de búsqueda (%d)"},value:"Valor"},searchPanes:{clearMessage:"Borrar todo",collapse:{0:"Paneles de búsqueda",_:"Paneles de búsqueda (%d)"},count:"{total}",countFiltered:"{shown} ({total})",emptyPanes:"Sin paneles de búsqueda",loadMessage:"Cargando paneles de búsqueda",title:"Filtros Activos - %d"},select:{cells:{1:"1 celda seleccionada",_:"%d celdas seleccionadas"},columns:{1:"1 columna seleccionada",_:"%d columnas seleccionadas"},rows:{1:"1 fila seleccionada",_:"%d filas seleccionadas"}},thousands:".",datetime:{previous:"Anterior",next:"Proximo",hours:"Horas",minutes:"Minutos",seconds:"Segundos",unknown:"-",amPm:["AM","PM"],months:{0:"Enero",1:"Febrero",10:"Noviembre",11:"Diciembre",2:"Marzo",3:"Abril",4:"Mayo",5:"Junio",6:"Julio",7:"Agosto",8:"Septiembre",9:"Octubre"},weekdays:["Dom","Lun","Mar","Mie","Jue","Vie","Sab"]},editor:{close:"Cerrar",create:{button:"Nuevo",title:"Crear Nuevo Registro",submit:"Crear"},edit:{button:"Editar",title:"Editar Registro",submit:"Actualizar"},remove:{button:"Eliminar",title:"Eliminar Registro",submit:"Eliminar",confirm:{_:"¿Está seguro que desea eliminar %d filas?",1:"¿Está seguro que desea eliminar 1 fila?"}},error:{system:'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\/a&gt;).</a>'},multi:{title:"Múltiples Valores",info:"Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",restore:"Deshacer Cambios",noMulti:"Este registro puede ser editado individualmente, pero no como parte de un grupo."}},info:"Mostrando _START_ a _END_ de _TOTAL_ registros"},dom:"B<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",buttons:{dom:{buttons:{className:"btn"}},buttons:[{extend:"copyHtml5",text:"<i class='fa fa-file-alt'></i>",titleAttr:"Copiar",className:"btn btn-outline-brand btn-icon btn-lg",messageTop:"Listado de Logs",title:"Sistema Integrado Poblacional",exportOptions:{columns:[0,1,2,3,4,5]}},{extend:"excelHtml5",text:"<i class='fa fa-file-excel'></i>",titleAttr:"Exportar a Excel",className:"btn btn-outline-success btn-icon btn-lg",excelStyles:{template:"header_blue"},messageTop:"Listado de Logs",title:"Sistema Integrado Poblacional",exportOptions:{columns:[0,1,2,3,4,5]}},{extend:"pdfHtml5",text:"<i class='fa fa-file-pdf'></i>",titleAttr:"Exportar a PDF",className:"btn btn-outline-danger btn-icon btn-lg",messageTop:"Listado de Logs",title:"Sistema Integrado Poblacional",exportOptions:{columns:[0,1,2,3,4,5]},customize:function(t){t.styles.title={color:"red",fontSize:"20",alignment:"center"},t.styles["td:nth-child(2)"]={width:"100px","max-width":"100px"},t.styles.tableHeader={fillColor:"#DF0101",color:"white"}}},{extend:"csvHtml5",text:"<i class='fa fa-file-csv'></i>",titleAttr:"Exportar a csv",className:"btn btn-outline-info btn-icon btn-lg",messageTop:"Listado de Logs",title:"Sistema Integrado Poblacional",exportOptions:{columns:[0,1,2,3,4,5]}},{extend:"print",text:"<i class='fa fa-print'></i>",titleAttr:"Imprimir Archivo",className:"btn btn-outline-dark btn-icon btn-lg",messageTop:"Listado de Logs",title:"Sistema Integrado Poblacional",exportOptions:{columns:[0,1,2,3,4,5]}}]}}),$(".dataTables_filter input").attr("placeholder","Busqueda..."),$(".dataTables_filter label").addClass("form-control"),$(".dataTables_filter label").css("outline","none"),$(".dataTables_filter label").css("border","0"),$(".dataTables_filter label").css("padding-bottom","35px")}))}}},h=a(2),E=Object(h.a)(g,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("div",{staticClass:"kt-portlet",staticStyle:{"margin-top":"-4%"}},[t._m(0),t._v(" "),a("div",{staticClass:"kt-portlet__body"},[a("div",{staticClass:"kt-section"},[a("div",{staticClass:"kt-section__content"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-2"},[a("label",[t._v("Usuarios:")]),t._v(" "),a("b-form-select",{class:"0"==t.datos.usuarios?"is-invalid":"is-valid",model:{value:t.datos.usuarios,callback:function(e){t.$set(t.datos,"usuarios","string"==typeof e?e.trim():e)},expression:"datos.usuarios"}},[a("option",{attrs:{value:"0",selected:""}},[t._v("Seleccione")]),t._v(" "),t._l(t.usuarios,(function(e){return a("option",{key:e.id,domProps:{value:e.id}},[t._v(t._s(e.nombre))])}))],2)],1),t._v(" "),a("div",{staticClass:"col-lg-2"},[a("label",[t._v("Modulos:")]),t._v(" "),a("b-form-select",{class:"0"==t.datos.modulos?"is-invalid":"is-valid",model:{value:t.datos.modulos,callback:function(e){t.$set(t.datos,"modulos","string"==typeof e?e.trim():e)},expression:"datos.modulos"}},[a("option",{attrs:{value:"0",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{id:"INICIO SESION"}},[t._v("INICIO")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS ACTIVIDADES"}},[t._v("ACTIVIDADES")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS BARRIOS"}},[t._v("BARRIOS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS ESCOLARIDAD"}},[t._v("ESCOLARIDAD")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS ENFERMEDADES_INFECCIOSAS"}},[t._v("ENFERMEDADES INFECCIOSAS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS ENFERMEDADES_CRONICAS"}},[t._v("ENFERMEDADES CRONICAS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS CORREGIMIENTOS"}},[t._v("CORREGIMIENTOS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS COLEGIOS"}},[t._v("COLEGIOS")]),t._v(" "),a("option",{attrs:{id:"ESTABLECIMIENTOS"}},[t._v("ESTABLECIMIENTOS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS ESTADO_CIVIL"}},[t._v("ESTADO CIVIL")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS ETNIAS"}},[t._v("ETNIAS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS GRUPOS"}},[t._v("GRUPOS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS METODOS"}},[t._v("METODOS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS MORBILIDAD_GESTACION"}},[t._v("MORBILIDAD GESTACION")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS MORBILIDAD_NACER"}},[t._v("MORBILIDAD AL NACER")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS MOTIVOS"}},[t._v("MOTIVOS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS OCUPACIONES"}},[t._v("OCUPACIONES")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS PARENTESCOS"}},[t._v("PARENTESCOS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS RELIGION"}},[t._v("RELIGION")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS VEREDAS"}},[t._v("VEREDAS")]),t._v(" "),a("option",{attrs:{id:"PARAMETROS USUARIOS"}},[t._v("USUARIOS")]),t._v(" "),a("option",{attrs:{id:"SOPORTE ENTES"}},[t._v("SOPORTE ENTES")]),t._v(" "),a("option",{attrs:{id:"UNIDADES"}},[t._v("UNIDADES")]),t._v(" "),a("option",{attrs:{id:"CERRAR SESION"}},[t._v("CERRAR")])])],1),t._v(" "),a("div",{staticClass:"col-lg-2"},[a("label",[t._v("Fecha:")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.datos.fecha,expression:"datos.fecha"}],staticClass:"form-control text-capitalize",class:"0"==t.datos.fecha?"":"is-valid",attrs:{id:"date",type:"date",placeholder:"Fecha",max:t._f("moment")(t.hoy)},domProps:{value:t.datos.fecha},on:{input:function(e){e.target.composing||t.$set(t.datos,"fecha",e.target.value)}}})]),t._v(" "),a("div",{staticClass:"col-lg-2"},[a("br"),t._v(" "),a("label",[t._v("      ")]),t._v(" "),a("a",{staticClass:"btn btn-outline-success btn-icon",attrs:{href:"javascript:;","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Buscar"},on:{click:function(e){return e.preventDefault(),t.buscar(1)}}},[a("i",{staticClass:"fa fa-search"})]),t._v(" \n                        ")])]),t._v(" "),a("br"),t._v(" "),a("div",{staticClass:"row"},[a("div",{staticClass:"col-md-12"},[a("div",{staticClass:"table-responsive"},[a("table",{staticClass:"table table-sm table-hover",attrs:{id:"tablaDatos"}},[t._m(1),t._v(" "),a("tbody",t._l(t.logs,(function(e,o){return a("tr",{key:o},[a("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v("\n                                                "+t._s(o+1)+"\n                                            ")]),t._v(" "),a("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                "+t._s(e.accion)+"\n                                            ")]),t._v(" "),a("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left"}},[t._v("\n                                                "+t._s(e.fecha)+" -\n                                                "+t._s(e.hora)+"\n                                            ")]),t._v(" "),a("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center"}},[t._v("\n                                                "+t._s(e.ip)+"\n                                            ")]),t._v(" "),a("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left"}},[t._v("\n                                                "+t._s(e.modulo)+"\n                                            ")]),t._v(" "),a("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left"}},[t._v("\n                                                "+t._s(e.nombre)+"\n                                            ")])])})),0)]),t._v(" "),a("div",{staticClass:"kt-separator kt-separator--border-dashed"})])])])])])])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"kt-portlet__head"},[e("div",{staticClass:"kt-portlet__head-label"},[e("h3",{staticClass:"kt-portlet__head-title"},[e("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("BITACORA DEL SISTEMA")])])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("thead",{},[a("tr",{staticClass:"kt-bg-fill-brand"},[a("th",{staticClass:"text-white"},[t._v("No.")]),t._v(" "),a("th",{staticClass:"text-white"},[t._v("\n                                                Acción\n                                            ")]),t._v(" "),a("th",{staticClass:"text-white"},[t._v("\n                                                Fecha\n                                            ")]),t._v(" "),a("th",{staticClass:"text-center text-white"},[t._v("\n                                                IP\n                                            ")]),t._v(" "),a("th",{staticClass:"text-white"},[t._v("\n                                                Modulo\n                                            ")]),t._v(" "),a("th",{staticClass:"text-left text-white"},[t._v("\n                                                Usuario\n                                            ")])])])}],!1,null,null,null);e.default=E.exports}}]);