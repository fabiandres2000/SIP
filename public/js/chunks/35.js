(window.webpackJsonp=window.webpackJsonp||[]).push([[35],{203:function(e,t,a){"use strict";a.d(t,"c",(function(){return r})),a.d(t,"b",(function(){return n})),a.d(t,"d",(function(){return o})),a.d(t,"a",(function(){return i}));var s=a(0);function r(e){return Object(s.a)().post("/indicadores/calcular",e)}function n(e){return Object(s.a)().post("/indicadores/gestantes",e)}function o(e){return Object(s.a)().post("/indicadores/spa",e)}function i(e){return Object(s.a)().post("/indicadores/filtrospa",e)}},378:function(e,t,a){var s=a(579);"string"==typeof s&&(s=[[e.i,s,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0};a(37)(s,r);s.locals&&(e.exports=s.locals)},578:function(e,t,a){"use strict";a(378)},579:function(e,t,a){(e.exports=a(36)(!1)).push([e.i,"\n.redondo {\n  border-radius: 25px;\n}\n.deabjohaciaarriba {\n  writing-mode: vertical-rl;\n  text-orientation: use-glyph-orientation;\n  transform: rotate(0.5turn);\n}\n.borderbottomright {\n  border-top-left-radius: 20px;\n  border-bottom-left-radius: 20px;\n  border-bottom-right-radius: 20px;\n}\n",""])},726:function(e,t,a){"use strict";a.r(t);var s=a(1),r=a.n(s),n=a(109),o=a(108),i=a(110),d=a(203);a(13);function l(e,t,a,s,r,n,o){try{var i=e[n](o),d=i.value}catch(e){return void a(e)}i.done?t(d):Promise.resolve(d).then(s,r)}n.d(i.a);var c={mounted:function(){this.calcular()},data:function(){return{csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),datos:{nro_mujeres_embarazadas:0,porcentaje_embarazadas:0,nro_adolescentes_embarazadas:0,nro_adolescentes_desescolarizadas:0,nro_adolescentes_lactantes:0,embarazos_vih:0,porcentaje_atencion_prenatal:0,razon_gestantes_sin_atencion_prental:0,nro_gestantes:0,grupo_510:0,grupo_1117:0,grupo_1828:0,grupo_2959:0,gestantes_grupo_510:0,gestantes_grupo_1117:0,gestantes_grupo_1828:0,gestantes_grupo_2959:0},series:[],series_barra:[]}},methods:{calcular:function(){var e,t=this;return(e=r.a.mark((function e(){var a;return r.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return a={_token:t.csrf},e.next=3,d.b(a).then((function(e){t.datos=e.data.cantidades,t.series.push({edad:"6-11",gestantes:t.datos.grupo_510}),t.series.push({edad:"12-17",gestantes:t.datos.grupo_1117}),t.series.push({edad:"18-28",gestantes:t.datos.grupo_1828}),t.series.push({edad:"29-59",gestantes:t.datos.grupo_2959}),t.series_barra.push({edad:"6-11",gestantes:t.datos.gestantes_grupo_510}),t.series_barra.push({edad:"12-17",gestantes:t.datos.gestantes_grupo_1117}),t.series_barra.push({edad:"18-28",gestantes:t.datos.gestantes_grupo_1828}),t.series_barra.push({edad:"29-59",gestantes:t.datos.gestantes_grupo_2959}),t.grafica_de_pie(),t.grafica_barra()})).catch((function(e){console.log(e)}));case 3:case"end":return e.stop()}}),e)})),function(){var t=this,a=arguments;return new Promise((function(s,r){var n=e.apply(t,a);function o(e){l(n,s,r,o,i,"next",e)}function i(e){l(n,s,r,o,i,"throw",e)}o(void 0)}))})()},grafica_de_pie:function(){n.d(i.a);var e=n.c("chartdiv",o.f);e.hiddenState.properties.opacity=0,e.legend=new o.e,e.data=this.series;var t=e.series.push(new o.g);t.dataFields.value="gestantes",t.dataFields.category="edad"},grafica_barra:function(){n.d(i.a);var e=n.c("chartbarra",o.j);e.data=this.series_barra;var t=e.xAxes.push(new o.a);t.dataFields.category="edad",t.renderer.labels.template.rotation=270,t.renderer.labels.template.hideOversized=!1,t.renderer.minGridDistance=20,t.renderer.labels.template.horizontalCenter="right",t.renderer.labels.template.verticalCenter="middle",t.tooltip.label.rotation=270,t.tooltip.label.horizontalCenter="right",t.tooltip.label.verticalCenter="middle";var a=e.yAxes.push(new o.h);a.title.text="Gestantes",a.title.fontWeight="bold";var s=e.series.push(new o.c);s.dataFields.valueY="gestantes",s.dataFields.categoryX="edad",s.name="Gestantes",s.tooltipText="{categoryX}: [bold]{valueY}[/]",s.columns.template.fillOpacity=.8;var r=s.columns.template;r.strokeWidth=2,r.strokeOpacity=1,r.stroke=n.b("#FFFFFF"),r.adapter.add("fill",(function(t,a){return e.colors.getIndex(a.dataItem.index)})),r.adapter.add("stroke",(function(t,a){return e.colors.getIndex(a.dataItem.index)})),e.cursor=new o.k,e.cursor.lineX.strokeOpacity=0,e.cursor.lineY.strokeOpacity=0}}},p=(a(578),a(3)),u=Object(p.a)(c,(function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticStyle:{"margin-top":"-4%"}},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-12"},[e._m(0),e._v(" "),a("div",{staticClass:"card"},[a("div",{staticClass:"card-body"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-3 text-center"},[a("h5",[e._v("Número gestanes")]),e._v(" "),a("vue-ellipse-progress",{attrs:{progress:e.datos.porcentaje_embarazadas,size:120,angle:-90,gap:10,legend:!0,legendValue:180,thickness:5,emptyThickness:"5%",dash:"60 0.9",color:"#068204",noData:!1,loading:!1,fontColor:"white",half:!1,"line-mode":"out 2"}},[a("p",{staticStyle:{"font-size":"14px","font-weight":"bold"},attrs:{slot:"legend-caption"},slot:"legend-caption"},[e._v(e._s(e.datos.nro_gestantes))])])],1),e._v(" "),a("div",{staticClass:"col-lg-3 text-center"},[a("h5",[e._v("Adolescentes gestantes")]),e._v(" "),a("vue-ellipse-progress",{attrs:{progress:Math.round(e.datos.nro_adolescentes_embarazadas),size:120,angle:-90,gap:10,legend:!0,thickness:5,emptyThickness:"5%",dash:"60 0.9",color:"#db2be3",noData:!1,loading:!1,fontColor:"white",half:!1,"line-mode":"out 2"}},[a("p",{staticStyle:{"font-size":"14px","font-weight":"bold"},attrs:{slot:"legend-caption"},slot:"legend-caption"},[e._v(e._s(Math.round(e.datos.nro_adolescentes_embarazadas)))])])],1),e._v(" "),a("div",{staticClass:"col-lg-3 text-center"},[a("h5",[e._v("Atención prenatal")]),e._v(" "),a("vue-ellipse-progress",{attrs:{progress:Math.round(e.datos.porcentaje_atencion_prenatal),size:120,angle:-90,gap:10,legend:!0,thickness:5,emptyThickness:"5%",dash:"60 0.9",color:"#0511ca",noData:!1,loading:!1,fontColor:"white",half:!1,"line-mode":"out 2"}},[a("p",{staticStyle:{"font-size":"14px","font-weight":"bold"},attrs:{slot:"legend-caption"},slot:"legend-caption"},[e._v(e._s(Math.round(e.datos.porcentaje_atencion_prenatal))+"%")])])],1),e._v(" "),a("div",{staticClass:"col-lg-3 text-center"},[a("h5",[e._v("Sin atención prenatal")]),e._v(" "),a("vue-ellipse-progress",{attrs:{progress:Math.round(100-e.datos.porcentaje_atencion_prenatal),size:120,angle:-90,gap:10,legend:!0,thickness:5,emptyThickness:"5%",dash:"60 0.9",color:"#891481",noData:!1,loading:!1,fontColor:"white",half:!1,"line-mode":"out 2"}},[a("p",{staticStyle:{"font-size":"14px","font-weight":"bold"},attrs:{slot:"legend-caption"},slot:"legend-caption"},[e._v(e._s(Math.round(100-e.datos.porcentaje_atencion_prenatal))+"%")])])],1)])])]),e._v(" "),e._m(1)])])])}),[function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"card"},[t("div",{staticClass:"card-body"},[t("h3",[this._v("Gestantes")])])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"card"},[a("div",{staticClass:"card-body"},[a("br"),e._v(" "),a("div",{staticClass:"row justify-center"},[a("div",{staticClass:"col-lg-6 text-center"},[a("h4",[e._v("Números de gestantes")]),e._v(" "),a("br"),e._v(" "),a("div",{staticStyle:{width:"100%",height:"400px"},attrs:{id:"chartbarra"}})]),e._v(" "),a("div",{staticClass:"col-lg-6 text-center"},[a("h4",[e._v("Porcentaje de gestantes sin atención prenatal")]),e._v(" "),a("br"),e._v(" "),a("div",{staticStyle:{width:"100%",height:"400px"},attrs:{id:"chartdiv"}})])])])])}],!1,null,null,null);t.default=u.exports}}]);