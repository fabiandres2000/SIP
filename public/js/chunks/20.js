(window.webpackJsonp=window.webpackJsonp||[]).push([[20],{149:function(t,e,a){"use strict";a.d(e,"a",(function(){return i})),a.d(e,"d",(function(){return n})),a.d(e,"e",(function(){return r})),a.d(e,"b",(function(){return s})),a.d(e,"c",(function(){return l}));var o=a(0);function i(t){return Object(o.a)().post("/vivienda/iniciales",t)}function n(t){return Object(o.a)().post("/vivienda/listar",t)}function r(t){return Object(o.a)().post("/vivienda/listarpdf",t)}function s(t){return Object(o.a)().post("/jefehogar/listar",t)}function l(t){return Object(o.a)().post("/jefehogar/listarpdf",t)}},336:function(t,e,a){var o=a(501);"string"==typeof o&&(o=[[t.i,o,""]]);var i={hmr:!0,transform:void 0,insertInto:void 0};a(12)(o,i);o.locals&&(t.exports=o.locals)},500:function(t,e,a){"use strict";a(336)},501:function(t,e,a){(t.exports=a(11)(!1)).push([t.i,"\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n.color-datepicker {\n  background: #f2f2f2;\n  border: 1px solid #ddd;\n  padding: 0em 1em 1em;\n  margin-bottom: 2em;\n}\n.modal-sm {\n  max-width: 60%;\n}\n",""])},650:function(t,e,a){"use strict";a.r(e);var o=a(1),i=a.n(o),n=a(149),r=a(97);function s(t,e,a,o,i,n,r){try{var s=t[n](r),l=s.value}catch(t){return void a(t)}s.done?e(l):Promise.resolve(l).then(o,i)}function l(t){return function(){var e=this,a=arguments;return new Promise((function(o,i){var n=t.apply(e,a);function r(t){s(n,o,i,r,l,"next",t)}function l(t){s(n,o,i,r,l,"throw",t)}r(void 0)}))}}var c,v={mounted:function(){this.iniciales()},data:function(){return{hoy:"",csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),paises_options:[],dpto_options:[],muni_options:{},corregi_options:{},barrio_options:{},vereda_options:{},id_dpto:"",id_mun:"",id_corre:"",id_vereda:"",id_zona:"",id_barrio:"",tenencia_vivienda:"",tipo_vivienda:"",poblacion_especial:"",material_predominante:"",promedio_ingresos:"",energia_electrica:"",gas_natural:"",acueducto:"",alcantarillado:"",aseo:"",servicio_sanitario:"",aguas_negras:"",tipo_combustible:""}},methods:{volver:function(){},buscar:function(){this.$router.push({name:"ConsultaVivienda",params:{id_dpto:this.id_dpto,id_mun:this.id_mun,id_corre:this.id_corre,id_vereda:this.id_vereda,id_zona:this.id_zona,id_barrio:this.id_barrio,tenencia_vivienda:this.tenencia_vivienda,tipo_vivienda:this.tipo_vivienda,poblacion_especial:this.poblacion_especial,material_predominante:this.material_predominante,promedio_ingresos:this.promedio_ingresos,energia_electrica:this.energia_electrica,gas_natural:this.gas_natural,acueducto:this.acueducto,alcantarillado:this.alcantarillado,aseo:this.aseo,servicio_sanitario:this.servicio_sanitario,aguas_negras:this.aguas_negras,tipo_combustible:this.tipo_combustible}})},iniciales:function(){var t=this;return l(i.a.mark((function e(){var a;return i.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return a={_token:t.csrf},e.prev=1,e.next=4,n.a(a).then((function(e){t.dpto_options=e.data.arrayDpto,t.muni_options=e.data.arrayMuni,t.corregi_options=e.data.arrayCorregi,t.vereda_options=e.data.arrayVeredas}));case 4:e.next=8;break;case 6:e.prev=6,e.t0=e.catch(1);case 8:case"end":return e.stop()}}),e,null,[[1,6]])})))()},cambiarCombo:(c=l(i.a.mark((function t(e){var a,o,n=this;return i.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if("dpto"===e&&(this.id_mun="",this.id_corre="",this.id_vereda="",this.id_barrio=""),"muni"!==e){t.next=20;break}return this.id_corre="",this.id_vereda="",this.id_barrio="",a={_token:this.csrf,id:this.id_mun,opcion:"MUN"},t.prev=6,t.next=9,r.a(a).then((function(t){n.barrio_options=t.data.arrayBarrios}));case 9:t.next=20;break;case 11:t.prev=11,t.t0=t.catch(6),t.t1=t.t0.response.status,t.next=422===t.t1?16:18;break;case 16:case 18:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",20);case 20:if("corregi"!==e){t.next=42;break}if(this.id_vereda="",this.id_barrio="","0"===this.id_corre||""===this.id_corre){t.next=41;break}return o={_token:this.csrf,id:this.id_corre,opcion:"CORRE"},t.prev=25,t.next=28,r.a(o).then((function(t){n.barrio_options=t.data.arrayBarrios}));case 28:t.next=39;break;case 30:t.prev=30,t.t2=t.catch(25),t.t3=t.t2.response.status,t.next=422===t.t3?35:37;break;case 35:case 37:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",39);case 39:t.next=42;break;case 41:"0"===this.id_corre?(this.cambiarCombo("muni"),this.id_corre="0"):this.cambiarCombo("muni");case 42:case"end":return t.stop()}}),t,this,[[6,11],[25,30]])}))),function(t){return c.apply(this,arguments)})}},_=(a(500),a(2)),u=Object(_.a)(v,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"row"},[a("div",{staticClass:"col-12"},[a("div",{staticClass:"kt-portlet kt-portlet--height-fluid kt-portlet--mobile",staticStyle:{"margin-top":"-4%"}},[a("div",{staticClass:"\n          kt-portlet__head\n          kt-portlet__head--lg\n          kt-portlet__head--noborder\n          kt-portlet__head--break-sm\n        "},[t._m(0),t._v(" "),a("div",{staticClass:"kt-portlet__head-toolbar"},[a("div",{staticClass:"btn-group"},[a("button",{staticClass:"btn btn-brand",attrs:{type:"button"},on:{click:function(e){return e.preventDefault(),t.buscar.apply(null,arguments)}}},[a("i",{staticClass:"la la-search"}),t._v(" "),a("span",{staticClass:"kt-hidden-mobile"},[t._v("Buscar")])])])])]),t._v(" "),a("div",{staticClass:"kt-portlet__body"},[t._m(1),t._v(" "),a("div",{staticClass:"form-group row"},[a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Departamento:")]),t._v(" "),a("b-form-select",{ref:"id_dpto",on:{change:function(e){return t.cambiarCombo("dpto")}},model:{value:t.id_dpto,callback:function(e){t.id_dpto="string"==typeof e?e.trim():e},expression:"id_dpto"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),t._l(t.dpto_options,(function(e){return a("option",{key:e.value,domProps:{value:e.value}},[t._v("\n                "+t._s(e.texto)+"\n              ")])}))],2)],1),t._v(" "),a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Municipio:")]),t._v(" "),a("b-form-select",{ref:"id_mun",on:{change:function(e){return t.cambiarCombo("muni")}},model:{value:t.id_mun,callback:function(e){t.id_mun="string"==typeof e?e.trim():e},expression:"id_mun"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),t._l(t.muni_options[t.id_dpto],(function(e){return a("option",{key:e.value,domProps:{value:e.value}},[t._v("\n                "+t._s(e.texto)+"\n              ")])}))],2)],1),t._v(" "),a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Corregimiento:")]),t._v(" "),a("b-form-select",{on:{change:function(e){return t.cambiarCombo("corregi")}},model:{value:t.id_corre,callback:function(e){t.id_corre=e},expression:"id_corre"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"0"}},[t._v("No Aplica")]),t._v(" "),t._l(t.corregi_options[t.id_mun],(function(e){return a("option",{key:e.value,domProps:{value:e.value}},[t._v("\n                "+t._s(e.texto)+"\n              ")])}))],2)],1)]),t._v(" "),a("div",{staticClass:"form-group row"},[a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Vereda:")]),t._v(" "),a("b-form-select",{on:{change:function(e){return t.cambiarCombo("vereda")}},model:{value:t.id_vereda,callback:function(e){t.id_vereda=e},expression:"id_vereda"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"0"}},[t._v("No Aplica")]),t._v(" "),t._l(t.vereda_options[t.id_corre],(function(e){return a("option",{key:e.value,domProps:{value:e.value}},[t._v("\n                "+t._s(e.texto)+"\n              ")])}))],2)],1),t._v(" "),a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Barrio:")]),t._v(" "),a("b-form-select",{model:{value:t.id_barrio,callback:function(e){t.id_barrio=e},expression:"id_barrio"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"0"}},[t._v("No Aplica")]),t._v(" "),t._l(t.barrio_options,(function(e){return a("option",{key:e.value,domProps:{value:e.value}},[t._v("\n                "+t._s(e.texto)+"\n              ")])}))],2)],1),t._v(" "),a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Zona:")]),t._v(" "),a("b-form-select",{model:{value:t.id_zona,callback:function(e){t.id_zona=e},expression:"id_zona"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"0"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"1"}},[t._v("Urbano")]),t._v(" "),a("option",{attrs:{value:"2"}},[t._v("Rural centro poblado")]),t._v(" "),a("option",{attrs:{value:"3"}},[t._v("Rural disperso")])])],1)]),t._v(" "),t._m(2),t._v(" "),a("div",{staticClass:"form-group row"},[a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Tenencia de Vivienda:")]),t._v(" "),a("b-form-select",{ref:"tenencia_vivienda",model:{value:t.tenencia_vivienda,callback:function(e){t.tenencia_vivienda="string"==typeof e?e.trim():e},expression:"tenencia_vivienda"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"PROPIETARIO"}},[t._v("PROPIETARIO(A)")]),t._v(" "),a("option",{attrs:{value:"ARRENDADO"}},[t._v("ARRENDADO(A)")]),t._v(" "),a("option",{attrs:{value:"FAMILIAR"}},[t._v("FAMILIAR")]),t._v(" "),a("option",{attrs:{value:"CUIDADOR"}},[t._v("CUIDADOR(A)")])])],1),t._v(" "),a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Tipo de Vivienda:")]),t._v(" "),a("b-form-select",{model:{value:t.tipo_vivienda,callback:function(e){t.tipo_vivienda="string"==typeof e?e.trim():e},expression:"tipo_vivienda"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"1"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"2"}},[t._v("Casa")]),t._v(" "),a("option",{attrs:{value:"3"}},[t._v("Apartamento")]),t._v(" "),a("option",{attrs:{value:"4"}},[t._v("Finca")]),t._v(" "),a("option",{attrs:{value:"5"}},[t._v("Vivienda Indigena")]),t._v(" "),a("option",{attrs:{value:"6"}},[t._v("Improvisada - Lote")])])],1),t._v(" "),a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Materia Predominante Piso:")]),t._v(" "),a("b-form-select",{model:{value:t.material_predominante,callback:function(e){t.material_predominante="string"==typeof e?e.trim():e},expression:"material_predominante"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"1"}},[t._v("Marmol ó Madera Pulida")]),t._v(" "),a("option",{attrs:{value:"2"}},[t._v("Cerámica ó Tablón")]),t._v(" "),a("option",{attrs:{value:"3"}},[t._v("Cemento")]),t._v(" "),a("option",{attrs:{value:"4"}},[t._v("Madera")]),t._v(" "),a("option",{attrs:{value:"5"}},[t._v("Tierra")]),t._v(" "),a("option",{attrs:{value:"6"}},[t._v("Bolsa ó Vinilo")]),t._v(" "),a("option",{attrs:{value:"6"}},[t._v("Otros")])])],1)]),t._v(" "),a("div",{staticClass:"form-group row"},[a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Población Especial:")]),t._v(" "),a("b-form-select",{ref:"poblacion_especial",model:{value:t.poblacion_especial,callback:function(e){t.poblacion_especial="string"==typeof e?e.trim():e},expression:"poblacion_especial"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"0"}},[t._v("NO APLICA")]),t._v(" "),a("option",{attrs:{value:"1"}},[t._v("DESPLAZADO")]),t._v(" "),a("option",{attrs:{value:"3"}},[t._v("VICTIMA DEL CONFLICTO ARMADO")]),t._v(" "),a("option",{attrs:{value:"4"}},[t._v("MADRE COMUNITARIA")])])],1),t._v(" "),a("div",{staticClass:"col-lg-4"},[a("label",[t._v("Promedio de Ingresos Mensuales:")]),t._v(" "),a("b-form-select",{model:{value:t.promedio_ingresos,callback:function(e){t.promedio_ingresos="string"==typeof e?e.trim():e},expression:"promedio_ingresos"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"1"}},[t._v("\n                Menos de un salario minimo legal vigente\n              ")]),t._v(" "),a("option",{attrs:{value:"2"}},[t._v("Un salario minimo legal vigente")]),t._v(" "),a("option",{attrs:{value:"3"}},[t._v("Entre 1 y 3 salarios mínimos")]),t._v(" "),a("option",{attrs:{value:"4"}},[t._v("Entre 3 y 5 salarios mínimos")]),t._v(" "),a("option",{attrs:{value:"5"}},[t._v("Más de 5 salarios mínimos")])])],1)]),t._v(" "),t._m(3),t._v(" "),a("div",{staticClass:"form-group row"},[a("div",{staticClass:"col-lg-3"},[a("label",[t._v("Energia Electrica:")]),t._v(" "),a("b-form-select",{model:{value:t.energia_electrica,callback:function(e){t.energia_electrica="string"==typeof e?e.trim():e},expression:"energia_electrica"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"SI"}},[t._v("SI")]),t._v(" "),a("option",{attrs:{value:"NO"}},[t._v("NO")])])],1),t._v(" "),a("div",{staticClass:"col-lg-3"},[a("label",[t._v("Gas Natural:")]),t._v(" "),a("b-form-select",{model:{value:t.gas_natural,callback:function(e){t.gas_natural="string"==typeof e?e.trim():e},expression:"gas_natural"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"SI"}},[t._v("SI")]),t._v(" "),a("option",{attrs:{value:"PI"}},[t._v("SI PIPETA DE GAS")]),t._v(" "),a("option",{attrs:{value:"NO"}},[t._v("NO")])])],1),t._v(" "),a("div",{staticClass:"col-lg-3"},[a("label",[t._v("Acueducto:")]),t._v(" "),a("b-form-select",{model:{value:t.acueducto,callback:function(e){t.acueducto="string"==typeof e?e.trim():e},expression:"acueducto"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"SI"}},[t._v("SI")]),t._v(" "),a("option",{attrs:{value:"NO"}},[t._v("NO")])])],1),t._v(" "),a("div",{staticClass:"col-lg-3"},[a("label",[t._v("Alcantarillado:")]),t._v(" "),a("b-form-select",{model:{value:t.alcantarillado,callback:function(e){t.alcantarillado="string"==typeof e?e.trim():e},expression:"alcantarillado"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"SI"}},[t._v("SI")]),t._v(" "),a("option",{attrs:{value:"NO"}},[t._v("NO")])])],1)]),t._v(" "),a("div",{staticClass:"form-group row"},[a("div",{staticClass:"col-lg-3"},[a("label",[t._v("Aseo:")]),t._v(" "),a("b-form-select",{model:{value:t.aseo,callback:function(e){t.aseo="string"==typeof e?e.trim():e},expression:"aseo"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"SI"}},[t._v("SI")]),t._v(" "),a("option",{attrs:{value:"NO"}},[t._v("NO")])])],1),t._v(" "),a("div",{staticClass:"col-lg-4"},[a("label",[t._v("El Servicio Sanitario Es:")]),t._v(" "),a("b-form-select",{model:{value:t.servicio_sanitario,callback:function(e){t.servicio_sanitario="string"==typeof e?e.trim():e},expression:"servicio_sanitario"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"1"}},[t._v("De Uso Exclusivo de las Personas de la Familia")]),t._v(" "),a("option",{attrs:{value:"2"}},[t._v("Compartida con Personas de Otras Familias")]),t._v(" "),a("option",{attrs:{value:"3"}},[t._v("Sin servicio sanitario")])])],1),t._v(" "),a("div",{staticClass:"col-lg-5"},[a("label",[t._v("¿Se presenta en tu barrio problemáticas de aguas negras?:")]),t._v(" "),a("b-form-select",{model:{value:t.aguas_negras,callback:function(e){t.aguas_negras="string"==typeof e?e.trim():e},expression:"aguas_negras"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"FRECUENTE"}},[t._v("FRECUENTE")]),t._v(" "),a("option",{attrs:{value:"NUNCA"}},[t._v("NUNCA")]),t._v(" "),a("option",{attrs:{value:"OCASIONAL"}},[t._v("OCASIONAL")])])],1)]),t._v(" "),t._m(4),t._v(" "),a("div",{staticClass:"form-group row"},[a("div",{staticClass:"col-lg-6"},[a("label",[t._v("¿Cuál es el tipo de combustible utilizado en su casa para cocinar?:")]),t._v(" "),a("b-form-select",{model:{value:t.tipo_combustible,callback:function(e){t.tipo_combustible="string"==typeof e?e.trim():e},expression:"tipo_combustible"}},[a("option",{attrs:{value:"",selected:""}},[t._v("Seleccione")]),t._v(" "),a("option",{attrs:{value:"NA"}},[t._v("No Aplica")]),t._v(" "),a("option",{attrs:{value:"1"}},[t._v("Luz eléctrica")]),t._v(" "),a("option",{attrs:{value:"2"}},[t._v("Gasolina")]),t._v(" "),a("option",{attrs:{value:"3"}},[t._v("Leña")]),t._v(" "),a("option",{attrs:{value:"4"}},[t._v("Carbón")]),t._v(" "),a("option",{attrs:{value:"5"}},[t._v("Gas natural")])])],1)])])])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"kt-portlet__head-label"},[e("h3",{staticClass:"kt-portlet__head-title"},[e("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("CONSULTA DE VIVIENDAS")])])])},function(){var t=this.$createElement,e=this._self._c||t;return e("p",[e("span",{staticClass:"kt-font-boldest",staticStyle:{"font-size":"18px"}},[this._v("Ubicación")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("p",[e("span",{staticClass:"kt-font-boldest",staticStyle:{"font-size":"18px"}},[this._v("Vivienda")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("p",[e("span",{staticClass:"kt-font-boldest",staticStyle:{"font-size":"18px"}},[this._v("Acceso a servicios públicos")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("p",[e("span",{staticClass:"kt-font-boldest",staticStyle:{"font-size":"18px"}},[this._v("Otros")])])}],!1,null,null,null);e.default=u.exports},97:function(t,e,a){"use strict";a.d(e,"e",(function(){return i})),a.d(e,"d",(function(){return n})),a.d(e,"b",(function(){return r})),a.d(e,"a",(function(){return s})),a.d(e,"c",(function(){return l}));var o=a(0);function i(t){return Object(o.a)().post("/barrios",t)}function n(t){return Object(o.a)().post("/barrios/guardar",t)}function r(t){return Object(o.a)().post("/barrios/eliminar",t)}function s(t){return Object(o.a)().post("/barrios/combo",t)}function l(t){return Object(o.a)().post("/barrios/exportar",t,{responseType:"blob"})}}}]);