(window.webpackJsonp=window.webpackJsonp||[]).push([[46],{316:function(e,t,o){"use strict";o.d(t,"c",(function(){return r})),o.d(t,"b",(function(){return s})),o.d(t,"d",(function(){return n})),o.d(t,"a",(function(){return i}));var a=o(19);function r(e){return Object(a.a)().post("/indicadores/calcular",e)}function s(e){return Object(a.a)().post("/indicadores/gestantes",e)}function n(e){return Object(a.a)().post("/indicadores/spa",e)}function i(e){return Object(a.a)().post("/indicadores/filtrospa",e)}},670:function(e,t,o){"use strict";o.r(t);var a=o(12),r=o.n(a),s=o(100),n=o(84),i=o(141),l=o(316);o(114);function c(e,t,o,a,r,s,n){try{var i=e[s](n),l=i.value}catch(e){return void o(e)}i.done?t(l):Promise.resolve(l).then(a,r)}function d(e){return function(){var t=this,o=arguments;return new Promise((function(a,r){var s=e.apply(t,o);function n(e){c(s,a,r,n,i,"next",e)}function i(e){c(s,a,r,n,i,"throw",e)}n(void 0)}))}}s.d(i.a);var u={mounted:function(){this.calcular()},data:function(){return{csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),combo:"",datos:{total_consumidores:0,porcentaje_consumidores:0,adolescentes_consumidores:0,ninos_consumidores:0,gestantes_consumidores:0,grupo_611_hombres:0,grupo_611_mujeres:0,grupo_1217_hombres:0,grupo_1217_mujeres:0,grupo_1828_hombres:0,grupo_1828_mujeres:0,grupo_2959_hombres:0,grupo_2959_mujeres:0,grupo_60m_hombres:0,grupo_60m_mujeres:0},poblacion:{grupo_611_hombrest:0,grupo_611_mujerest:0,grupo_1217_hombrest:0,grupo_1217_mujerest:0,grupo_1828_hombrest:0,grupo_1828_mujerest:0,grupo_2959_hombrest:0,grupo_2959_mujerest:0,grupo_60m_hombrest:0,grupo_60m_mujerest:0},serie:[]}},methods:{calcular:function(){var e=this;return d(r.a.mark((function t(){var o;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return o={_token:e.csrf},t.next=3,l.d(o).then((function(t){e.datos=t.data.cantidades,console.log(e.datos),e.poblacion=t.data.poblacion,e.serie=[{age:"60+",male:Number(e.datos.grupo_611_hombres),female:Number(e.datos.grupo_611_mujeres)},{age:"29-59",male:Number(e.datos.grupo_2959_hombres),female:Number(e.datos.grupo_2959_mujeres)},{age:"18-28",male:Number(e.datos.grupo_1828_hombres),female:Number(e.datos.grupo_1828_mujeres)},{age:"12-17",male:Number(e.datos.grupo_1217_hombres),female:Number(e.datos.grupo_1217_mujeres)},{age:"6-11",male:Number(e.datos.grupo_611_hombres),female:Number(e.datos.grupo_611_mujeres)}],e.grafica_stacked(),e.grafica_barras()})).catch((function(e){console.log(e)}));case 3:case"end":return t.stop()}}),t)})))()},grafica_stacked:function(){s.d(i.a);var e=s.c("grafica1",n.i);e.data=this.serie,e.numberFormatter.numberFormat="#.#s";var t=e.yAxes.push(new n.a);t.dataFields.category="age",t.renderer.grid.template.location=0,t.renderer.inversed=!0;var o=e.xAxes.push(new n.h);o.extraMin=.1,o.extraMax=.1,o.renderer.minGridDistance=40,o.renderer.ticks.template.length=5,o.renderer.ticks.template.disabled=!1,o.renderer.ticks.template.strokeOpacity=.4,o.renderer.labels.template.adapter.add("text",(function(e){return"Male"==e||"Female"==e?e:e+"%"}));var a=e.series.push(new n.b);a.dataFields.valueX="male",a.dataFields.categoryY="age",a.clustered=!1;var r=a.bullets.push(new n.d);r.label.text="{valueX}%",r.label.hideOversized=!1,r.label.truncate=!1,r.label.horizontalCenter="right",r.label.dx=-10;var l=e.series.push(new n.b);l.dataFields.valueX="female",l.dataFields.categoryY="age",l.clustered=!1;var c=l.bullets.push(new n.d);c.label.text="{valueX}%",c.label.hideOversized=!1,c.label.truncate=!1,c.label.horizontalCenter="left",c.label.dx=10;var d=o.axisRanges.create();d.value=-10,d.endValue=0,d.label.text="Hombres",d.label.fill=e.colors.list[0],d.label.dy=20,d.label.fontWeight="600",d.grid.strokeOpacity=1,d.grid.stroke=a.stroke;var u=o.axisRanges.create();u.value=0,u.endValue=10,u.label.text="Mujeres",u.label.fill=e.colors.list[1],u.label.dy=20,u.label.fontWeight="600",u.grid.strokeOpacity=1,u.grid.stroke=l.stroke},grafica_barras:function(){s.d(i.a);var e=s.c("chartdiv",n.i);e.paddingBottom=50,e.cursor=new n.k,e.scrollbarX=new s.a,e.colors.step=2,e.legend=new n.e,e.legend.position="top",e.legend.paddingBottom=20,e.legend.labels.template.maxWidth=95;var t=e.xAxes.push(new n.a);function o(t,o){var r=e.series.push(new n.b);r.dataFields.valueY=t,r.dataFields.categoryX="category",r.name=o,r.events.on("hidden",a),r.events.on("shown",a);var i=r.bullets.push(new n.d);return i.interactionsEnabled=!1,i.dy=30,i.label.text="{valueY}",i.label.fill=s.b("#ffffff"),r}function a(){e.series.getIndex(0),t.renderer.cellStartLocation,t.renderer.cellEndLocation}t.dataFields.category="category",t.renderer.cellStartLocation=.1,t.renderer.cellEndLocation=.9,t.renderer.grid.template.location=0,e.yAxes.push(new n.h).min=0,e.data=[{category:"6-11",first:this.poblacion.grupo_611_hombrest,second:this.poblacion.grupo_611_mujerest},{category:"12-17",first:this.poblacion.grupo_1217_hombrest,second:this.poblacion.grupo_1217_mujerest},{category:"18-28",first:this.poblacion.grupo_1828_hombrest,second:this.poblacion.grupo_1828_mujerest},{category:"29-59",first:this.poblacion.grupo_2959_hombrest,second:this.poblacion.grupo_2959_mujerest},{category:"60+",first:this.poblacion.grupo_60m_hombrest,second:this.poblacion.grupo_60m_mujerest}],o("first","Hombres"),o("second","Mujeres")},filtrar:function(){var e=this;return d(r.a.mark((function t(){var o;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(o={_token:e.csrf,_tipo:e.combo},""!=e.combo){t.next=6;break}return t.next=4,l.d(o).then((function(t){e.poblacion=t.data.poblacion,e.grafica_barras()})).catch((function(e){console.log(e)}));case 4:t.next=8;break;case 6:return t.next=8,l.a(o).then((function(t){e.poblacion=t.data.poblacion,e.grafica_barras()})).catch((function(e){console.log(e)}));case 8:case"end":return t.stop()}}),t)})))()}}},p=o(32),_=Object(p.a)(u,(function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticStyle:{"margin-top":"-4%"}},[o("div",{staticClass:"row"},[o("div",{staticClass:"col-lg-12"},[e._m(0),e._v(" "),o("div",{staticClass:"card"},[o("div",{staticClass:"card-body"},[o("div",{staticClass:"row"},[o("div",{staticClass:"col-lg-3 text-center"},[o("h5",[e._v("Número consumidores")]),e._v(" "),o("vue-ellipse-progress",{attrs:{progress:e.datos.porcentaje_consumidores,size:120,angle:-90,gap:10,legend:!0,legendValue:180,thickness:5,emptyThickness:"5%",dash:"60 0.9",color:"#068204",noData:!1,loading:!1,fontColor:"white",half:!1,"line-mode":"out 2"}},[o("p",{staticStyle:{"font-size":"14px","font-weight":"bold"},attrs:{slot:"legend-caption"},slot:"legend-caption"},[e._v(e._s(e.datos.total_consumidores))])])],1),e._v(" "),o("div",{staticClass:"col-lg-3 text-center"},[o("h5",[e._v("Adolescentes consumidores")]),e._v(" "),o("vue-ellipse-progress",{attrs:{progress:Math.round(e.datos.adolescentes_consumidores),size:120,angle:-90,gap:10,legend:!0,thickness:5,emptyThickness:"5%",dash:"60 0.9",color:"#db2be3",noData:!1,loading:!1,fontColor:"white",half:!1,"line-mode":"out 2"}},[o("p",{staticStyle:{"font-size":"14px","font-weight":"bold"},attrs:{slot:"legend-caption"},slot:"legend-caption"},[e._v(e._s(Math.round(e.datos.adolescentes_consumidores)))])])],1),e._v(" "),o("div",{staticClass:"col-lg-3 text-center"},[o("h5",[e._v("Niños consumidores")]),e._v(" "),o("vue-ellipse-progress",{attrs:{progress:Math.round(e.datos.ninos_consumidores),size:120,angle:-90,gap:10,legend:!0,thickness:5,emptyThickness:"5%",dash:"60 0.9",color:"#0511ca",noData:!1,loading:!1,fontColor:"white",half:!1,"line-mode":"out 2"}},[o("p",{staticStyle:{"font-size":"14px","font-weight":"bold"},attrs:{slot:"legend-caption"},slot:"legend-caption"},[e._v(e._s(Math.round(e.datos.ninos_consumidores)))])])],1),e._v(" "),o("div",{staticClass:"col-lg-3 text-center"},[o("h5",[e._v("Gestantes consumidores")]),e._v(" "),o("vue-ellipse-progress",{attrs:{progress:Math.round(e.datos.gestantes_consumidores),size:120,angle:-90,gap:10,legend:!0,thickness:5,emptyThickness:"5%",dash:"60 0.9",color:"#891481",noData:!1,loading:!1,fontColor:"white",half:!1,"line-mode":"out 2"}},[o("p",{staticStyle:{"font-size":"14px","font-weight":"bold"},attrs:{slot:"legend-caption"},slot:"legend-caption"},[e._v(e._s(Math.round(e.datos.gestantes_consumidores)))])])],1)])])]),e._v(" "),o("div",{staticClass:"card"},[o("div",{staticClass:"card-body"},[o("br"),e._v(" "),o("div",{staticClass:"row justify-center"},[e._m(1),e._v(" "),o("div",{staticClass:"col-lg-8 text-center"},[o("h4",[e._v("Población que consume SPA")]),e._v(" "),o("br"),e._v(" "),o("div",{staticClass:"row offset-2"},[o("div",{staticClass:"col-lg-8"},[o("select",{directives:[{name:"model",rawName:"v-model",value:e.combo,expression:"combo"}],staticClass:"form-control",on:{change:[function(t){var o=Array.prototype.filter.call(t.target.options,(function(e){return e.selected})).map((function(e){return"_value"in e?e._value:e.value}));e.combo=t.target.multiple?o:o[0]},e.filtrar]}},[o("option",{attrs:{value:""}},[e._v("Todos")]),e._v(" "),o("option",{attrs:{value:"spa"}},[e._v("SPA")]),e._v(" "),o("option",{attrs:{value:"fuma"}},[e._v("Tabaco")]),e._v(" "),o("option",{attrs:{value:"alcohol"}},[e._v("Alcohol")])])])]),e._v(" "),o("div",{staticStyle:{width:"100%",height:"380px"},attrs:{id:"chartdiv"}})])])])])])])])}),[function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"card"},[t("div",{staticClass:"card-body"},[t("h3",[this._v("Consumo de SPA (Sustancias Psicoactivas)")])])])},function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"col-lg-4 text-center"},[t("h4",[this._v("Población que consume SPA por grupo de edades")]),this._v(" "),t("br"),this._v(" "),t("div",{staticStyle:{width:"100%",height:"400px"},attrs:{id:"grafica1"}})])}],!1,null,null,null);t.default=_.exports}}]);