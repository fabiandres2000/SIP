(window.webpackJsonp=window.webpackJsonp||[]).push([[53],{703:function(e,a,t){"use strict";t.r(a);var n=t(4),r=t.n(n),s=t(19),i=t(16),o=t(34),c=t(18);t(117);var d=t(183),l=t(593),u=t.n(l),p=(t(594),t(596)),m=t.n(p),g=t(597),f=t.n(g);function _(e,a,t,n,r,s,i){try{var o=e[s](i),c=o.value}catch(e){return void t(e)}o.done?a(c):Promise.resolve(c).then(n,r)}function v(e){return function(){var a=this,t=arguments;return new Promise((function(n,r){var s=e.apply(a,t);function i(e){_(s,n,r,i,o,"next",e)}function o(e){_(s,n,r,i,o,"throw",e)}i(void 0)}))}}s.d(o.a);var b,h,x={components:{VueHtml2pdf:d.a,VueEasyPieChart:u.a,Progress:m.a,VueCircle:f.a},mounted:function(){this.calcular()},data:function(){return{csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),combo:"",j:0,mivariable:0,totalMigrantes:0,poblacionMigrante:0,migrantesRegulados:0,migrantesNoRegulados:0,imagenPie:[],imagenBarra:[],imagenPieOcupaciones:[],imagenPiePaises:[],imagenSexo:[],enfermedades:[],afiliaciones:[],datos:{migrantes0:0,migrantes115:0,migrantes611:0,migrantes1217:0,migrantes1828:0,migrantes2959:0,migrantes60:0},sexo:{m_0:0,m_15:0,m_611:0,m_1217:0,m_1828:0,m_2959:0,m_60:0,f_0:0,f_15:0,f_611:0,f_1217:0,f_1828:0,f_2959:0,f_60:0},ocupaciones:{id:0,descripcion:"",cont:0},poblacion:{migrantes:0,nomigrantes:0},primerOcupacion:{nombre:"",cant:0},segundaOcupacion:{nombre:"",cant:0},terceraOcupacion:{nombre:"",cant:0},cuartaOcupacion:{nombre:"",cant:0},quintaOcupacion:{nombre:"",cant:0},poblacionEdadUno:{edad:"",cant:0},poblacionEdadDos:{edad:"",cant:0},poblacionEdadTres:{edad:"",cant:0},poblacionEdadCuatro:{edad:"",cant:0},primeraEnfermedad:{nombre:"",cant:0},segundaEnfermedad:{nombre:"",cant:0},terceraEnfermedad:{nombre:"",cant:0},cuartaEnfermedad:{nombre:"",cant:0},quintaEnfermedad:{nombre:"",cant:0},series:[],series_grupo:[],series_barra_orden:[],series_ocupaciones:[],series_enfermedades:[],series_paises:[],serie_sexo:[],textoEnfermedades:"",fill:{gradient:["#078914","#078914","#078914"]}}},methods:{progress:function(e,a,t){},progress_end:function(e){},pdfgen:function(e){var a=t(325);if(null==a.vfs){var n=t(359);a.vfs=n.pdfMake.vfs}var r={content:"<img src='"+e+"'>"};a.createPdf(r).download("optionalName.pdf")},extraerimagen:(h=v(r.a.mark((function e(a){var t=this;return r.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:this.$refs.html2Pdf.generatePdf(),a.exporting.getImage("png").then((function(e){t.img=e}));case 2:case"end":return e.stop()}}),e,this)}))),function(e){return h.apply(this,arguments)}),calcular:function(){var e=this;return v(r.a.mark((function a(){var t;return r.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return t={_token:e.csrf},a.next=3,(n=t,Object(c.a)().post("/informes/migrantes",n)).then((function(a){e.poblacionMigrante=100*a.data.total_migrantes/a.data.total_poblacion,e.totalMigrantes=a.data.total_migrantes,e.migrantesRegulados=a.data.total_regulado,e.migrantesNoRegulados=a.data.total_no_regulado,e.datos=a.data.edades,e.ocupaciones=a.data.ocupaciones,e.$refs.gc.updateProgress(e.poblacionMigrante),e.$refs.gcpdf.updateProgress(e.poblacionMigrante),e.series_paises=a.data.paises,e.sexo=a.data.sexo,e.enfermedades=a.data.enfermedades,e.afiliaciones=a.data.afiliaciones,e.series.push({migrantes:"Regulados",cantidad:e.migrantesRegulados}),e.series.push({migrantes:"No regulados",cantidad:e.migrantesNoRegulados}),e.series_grupo.push({edad:"0+",migrantes:e.datos.migrantes0}),e.series_grupo.push({edad:"1-5",migrantes:e.datos.migrantes115}),e.series_grupo.push({edad:"6-11",migrantes:e.datos.migrantes611}),e.series_grupo.push({edad:"12-17",migrantes:e.datos.migrantes1217}),e.series_grupo.push({edad:"18-28",migrantes:e.datos.migrantes1828}),e.series_grupo.push({edad:"29-59",migrantes:e.datos.migrantes2959}),e.series_grupo.push({edad:"60+",migrantes:e.datos.migrantes60}),e.series_barra_orden.push({edad:"0+",migrantes:e.datos.migrantes0}),e.series_barra_orden.push({edad:"1-5",migrantes:e.datos.migrantes115}),e.series_barra_orden.push({edad:"6-11",migrantes:e.datos.migrantes611}),e.series_barra_orden.push({edad:"12-17",migrantes:e.datos.migrantes1217}),e.series_barra_orden.push({edad:"18-28",migrantes:e.datos.migrantes1828}),e.series_barra_orden.push({edad:"29-59",migrantes:e.datos.migrantes2959}),e.series_barra_orden.push({edad:"60+",migrantes:e.datos.migrantes60}),e.series_barra_orden.sort((function(e,a){return e.migrantes>a.migrantes?1:e.migrantes<a.migrantes?-1:0})),e.poblacionEdadUno.edad=e.series_barra_orden[6].edad,e.poblacionEdadUno.cant=e.series_barra_orden[6].migrantes,e.poblacionEdadDos.edad=e.series_barra_orden[5].edad,e.poblacionEdadDos.cant=e.series_barra_orden[5].migrantes,e.poblacionEdadTres.edad=e.series_barra_orden[4].edad,e.poblacionEdadTres.cant=e.series_barra_orden[4].migrantes,e.poblacionEdadCuatro.edad=e.series_barra_orden[3].edad,e.poblacionEdadCuatro.cant=e.series_barra_orden[3].migrantes;for(var t=0;t<e.ocupaciones.length;t++)e.series_ocupaciones.push({ocupacion:e.ocupaciones[t].descripcion,migrantes:e.ocupaciones[t].cont});for(e.series_ocupaciones.sort((function(e,a){return e.migrantes>a.migrantes?1:e.migrantes<a.migrantes?-1:0})),e.j=0;e.j<e.enfermedades.length;e.j++)e.series_enfermedades.push({enfermedad:e.enfermedades[e.j].enfe,migrantes:e.enfermedades[e.j].total});e.enfermedades.length>0&&(e.primeraEnfermedad.nombre=e.enfermedades[0].enfe,e.primeraEnfermedad.cant=e.enfermedades[0].total),e.enfermedades.length>1&&(e.segundaEnfermedad.nombre=e.enfermedades[1].enfe,e.segundaEnfermedad.cant=e.enfermedades[1].total),e.enfermedades.length>2&&(e.terceraEnfermedad.nombre=e.enfermedades[2].enfe,e.terceraEnfermedad.cant=e.enfermedades[2].total),e.enfermedades.length>3&&(e.cuartaEnfermedad.nombre=e.enfermedades[3].enfe,e.cuartaEnfermedad.cant=e.enfermedades[3].total),e.enfermedades.length>4&&(e.quintaEnfermedad.nombre=e.enfermedades[4].enfe,e.quintaEnfermedad.cant=e.enfermedades[4].total),e.primerOcupacion.nombre=e.series_ocupaciones[4].ocupacion,e.primerOcupacion.cant=e.series_ocupaciones[4].migrantes,e.segundaOcupacion.nombre=e.series_ocupaciones[3].ocupacion,e.segundaOcupacion.cant=e.series_ocupaciones[3].migrantes,e.terceraOcupacion.nombre=e.series_ocupaciones[2].ocupacion,e.terceraOcupacion.cant=e.series_ocupaciones[2].migrantes,e.cuartaOcupacion.nombre=e.series_ocupaciones[1].ocupacion,e.cuartaOcupacion.cant=e.series_ocupaciones[1].migrantes,e.quintaOcupacion.nombre=e.series_ocupaciones[0].ocupacion,e.quintaOcupacion.cant=e.series_ocupaciones[0].migrantes,e.serie_sexo=[{age:"60+",male:Number(e.sexo.m_60),female:Number(e.sexo.f_60)},{age:"29-59",male:Number(e.sexo.m_2959),female:Number(e.sexo.f_2959)},{age:"18-28",male:Number(e.sexo.m_1828),female:Number(e.sexo.f_1828)},{age:"12-17",male:Number(e.sexo.m_1217),female:Number(e.sexo.f_1217)},{age:"6-11",male:Number(e.sexo.m_611),female:Number(e.sexo.f_611)},{age:"1-5",male:Number(e.sexo.m_15),female:Number(e.sexo.f_15)},{age:"0+",male:Number(e.sexo.m_0),female:Number(e.sexo.f_0)}],e.grafica_de_pie(),e.grafica_barra(),e.grafica_de_pie_ocupaciones(),e.grafica_de_pie_paises(),e.grafica_stacked(),e.grafica_barra_enfermedades()})).catch((function(e){console.log(e)}));case 3:case"end":return a.stop()}var n}),a)})))()},grafica_de_pie:function(){var e=this;return v(r.a.mark((function a(){var t,n;return r.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return s.d(o.a),(t=s.c("chartdiv",i.f)).hiddenState.properties.opacity=0,t.legend=new i.e,t.data=e.series,(n=t.series.push(new i.g)).dataFields.value="cantidad",n.dataFields.category="migrantes",a.next=10,t.exporting.getImage("png").then((function(a){e.imagenPie=a}));case 10:case"end":return a.stop()}}),a)})))()},grafica_barra:function(){var e=this;return v(r.a.mark((function a(){var t,n,c,d;return r.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return s.d(o.a),(t=s.c("chartbarra",i.i)).padding(40,40,40,40),(n=t.yAxes.push(new i.a)).renderer.grid.template.location=0,n.dataFields.category="ocupacion",n.renderer.minGridDistance=1,n.renderer.inversed=!0,n.renderer.grid.template.disabled=!0,t.xAxes.push(new i.h).min=0,(c=t.series.push(new i.b)).dataFields.categoryY="ocupacion",c.dataFields.valueX="migrantes",c.tooltipText="{valueX.value}",c.columns.template.strokeOpacity=0,c.columns.template.column.cornerRadiusBottomRight=5,c.columns.template.column.cornerRadiusTopRight=5,(d=c.bullets.push(new i.d)).label.horizontalCenter="left",d.label.dx=10,d.label.text="{values.valueX.workingValue.formatNumber('#')}",d.locationX=1,c.columns.template.adapter.add("fill",(function(e,a){return t.colors.getIndex(a.dataItem.index)})),n.sortBySeries=c,t.data=e.series_ocupaciones,a.next=28,t.exporting.getImage("png").then((function(a){e.imagenBarra=a}));case 28:case"end":return a.stop()}}),a)})))()},grafica_de_pie_ocupaciones:function(){var e=this;return v(r.a.mark((function a(){var t,n;return r.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return s.d(o.a),(t=s.c("chartocupaciones",i.f)).hiddenState.properties.opacity=0,t.legend=new i.e,t.data=e.series_grupo,(n=t.series.push(new i.g)).dataFields.value="migrantes",n.dataFields.category="edad",a.next=10,t.exporting.getImage("png").then((function(a){e.imagenPieOcupaciones=a}));case 10:case"end":return a.stop()}}),a)})))()},grafica_de_pie_paises:function(){var e=this;return v(r.a.mark((function a(){var t,n;return r.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return s.d(o.a),(t=s.c("chartdivpaises",i.f)).hiddenState.properties.opacity=0,t.legend=new i.e,t.data=e.series_paises,(n=t.series.push(new i.g)).dataFields.value="total",n.dataFields.category="nombre",a.next=10,t.exporting.getImage("png").then((function(a){e.imagenPiePaises=a}));case 10:case"end":return a.stop()}}),a)})))()},grafica_stacked:function(){var e=this;return v(r.a.mark((function a(){var t,n,c,d,l,u,p,m,g;return r.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:s.d(o.a),(t=s.c("chartdivsexo",i.i)).data=e.serie_sexo,t.numberFormatter.numberFormat="#.#s",(n=t.yAxes.push(new i.a)).dataFields.category="age",n.renderer.grid.template.location=0,n.renderer.inversed=!0,(c=t.xAxes.push(new i.h)).extraMin=.1,c.extraMax=.1,c.renderer.minGridDistance=40,c.renderer.ticks.template.length=5,c.renderer.ticks.template.disabled=!1,c.renderer.ticks.template.strokeOpacity=.4,c.renderer.labels.template.adapter.add("text",(function(e){return"Male"==e||"Female"==e?e:e+""})),(d=t.series.push(new i.b)).dataFields.valueX="male",d.dataFields.categoryY="age",d.clustered=!1,(l=d.bullets.push(new i.d)).label.text="{valueX}",l.label.hideOversized=!1,l.label.truncate=!1,l.label.horizontalCenter="right",l.label.dx=-10,(u=t.series.push(new i.b)).dataFields.valueX="female",u.dataFields.categoryY="age",u.clustered=!1,(p=u.bullets.push(new i.d)).label.text="{valueX}",p.label.hideOversized=!1,p.label.truncate=!1,p.label.horizontalCenter="left",p.label.dx=10,(m=c.axisRanges.create()).value=-10,m.endValue=0,m.label.text="Masculino",m.label.fill=t.colors.list[0],m.label.dy=20,m.label.fontWeight="600",m.grid.strokeOpacity=1,m.grid.stroke=d.stroke,(g=c.axisRanges.create()).value=1,g.endValue=0,g.label.text="Femenino",g.label.fill=t.colors.list[1],g.label.dy=20,g.label.fontWeight="600",g.grid.strokeOpacity=1,g.grid.stroke=u.stroke,t.exporting.getImage("png").then((function(a){e.imagenSexo=a}));case 55:case"end":return a.stop()}}),a)})))()},generarPDF:(b=v(r.a.mark((function e(){return r.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:this.$refs.html2Pdf.generatePdf();case 1:case"end":return e.stop()}}),e,this)}))),function(){return b.apply(this,arguments)}),grafica_barra_enfermedades:function(){var e=this;return v(r.a.mark((function a(){var t,n,c,d;return r.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return s.d(o.a),(t=s.c("chartbarraenfermedades",i.i)).padding(40,40,40,40),(n=t.yAxes.push(new i.a)).renderer.grid.template.location=0,n.dataFields.category="enfermedad",n.renderer.minGridDistance=1,n.renderer.inversed=!0,n.renderer.grid.template.disabled=!0,t.xAxes.push(new i.h).min=0,(c=t.series.push(new i.b)).dataFields.categoryY="enfermedad",c.dataFields.valueX="migrantes",c.tooltipText="{valueX.value}",c.columns.template.strokeOpacity=0,c.columns.template.column.cornerRadiusBottomRight=5,c.columns.template.column.cornerRadiusTopRight=5,(d=c.bullets.push(new i.d)).label.horizontalCenter="left",d.label.dx=10,d.label.text="{values.valueX.workingValue.formatNumber('#')}",d.locationX=1,c.columns.template.adapter.add("fill",(function(e,a){return t.colors.getIndex(a.dataItem.index)})),n.sortBySeries=c,t.data=e.series_enfermedades,a.next=28,t.exporting.getImage("png").then((function(a){e.imagenBarra=a}));case 28:case"end":return a.stop()}}),a)})))()},filtrar:function(){var e=this;return v(r.a.mark((function a(){var t;return r.a.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:if(t={_token:e.csrf,_tipo:e.combo},""!=e.combo){a.next=6;break}return a.next=4,IndicadoresService.spa(t).then((function(a){e.poblacion=a.data.poblacion,e.grafica_barras()})).catch((function(e){console.log(e)}));case 4:a.next=8;break;case 6:return a.next=8,IndicadoresService.filtrospa(t).then((function(a){e.poblacion=a.data.poblacion,e.grafica_barras()})).catch((function(e){console.log(e)}));case 8:case"end":return a.stop()}}),a)})))()}}},w=t(26),y=Object(w.a)(x,(function(){var e=this,a=e.$createElement,t=e._self._c||a;return t("div",{staticStyle:{"margin-top":"-4%"}},[t("div",{staticClass:"row"},[t("div",{staticClass:"col-lg-12"},[t("div",{staticClass:"card"},[t("div",{staticClass:"card-body"},[t("div",{staticClass:"row"},[e._m(0),e._v(" "),t("div",{staticClass:"col-sm-2 text-right"},[t("button",{staticClass:"btn btn-danger",attrs:{type:"button"},on:{click:e.generarPDF}},[t("i",{staticClass:"la la-pdf"}),e._v(" "),t("span",{staticClass:"kt-hidden-mobile"},[e._v("Generar PDF")])])])])])]),e._v(" "),t("div",{staticClass:"card"},[t("div",{staticClass:"card-body"},[t("div",{staticClass:"row"},[t("div",{ref:"printMe",staticClass:"col-lg-6 text-center"},[t("h5",[e._v("Población migrante")]),e._v(" "),t("vue-circle",{ref:"gc",attrs:{progress:e.mivariable,size:250,reverse:!1,"line-cap":"round",fill:e.fill,"empty-fill":"rgba(0, 0, 0, .1)","animation-start-value":0,"start-angle":-190,"insert-mode":"append",thickness:7,"show-percent":!1},on:{"vue-circle-progress":e.progress,"vue-circle-end":e.progress_end}},[t("p",{staticStyle:{"font-size":"30px","font-weight":"bold"}},[e._v("\n                  "+e._s(Math.round(e.poblacionMigrante))+"%\n                ")])])],1),e._v(" "),t("div",{staticClass:"col-lg-6 text-center"},[t("h5",[e._v("Estado migratorio")]),e._v(" "),t("div",{staticStyle:{width:"100%",height:"250px"},attrs:{id:"chartdiv"}}),e._v(" "),t("b",[e._v("\n                El\n                "+e._s(Math.round(100*e.migrantesNoRegulados/(e.migrantesNoRegulados+e.migrantesRegulados)))+"% de la poblacion migrante no se encuentran registrados como\n                migrantes.")])])])])]),e._v(" "),t("div",{staticClass:"card"},[t("div",{staticClass:"card-body"},[t("div",{staticClass:"row"},[t("div",{staticClass:"col-lg-12 text-center"},[t("h4",[e._v("Principales ocupaciones de los migrantes")]),e._v(" "),t("div",{staticStyle:{width:"100%",height:"400px"},attrs:{id:"chartbarra"}}),e._v("\n              En relación a la ocupación migrante en el municipio, el\n              "+e._s(Math.round(100*e.primerOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.primerOcupacion.nombre?"están":"son")+" "+e._s(e.primerOcupacion.nombre)+", el\n              "+e._s(Math.round(100*e.segundaOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.segundaOcupacion.nombre?"están":"son")+" "+e._s(e.segundaOcupacion.nombre)+", el\n              "+e._s(Math.round(100*e.terceraOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.terceraOcupacion.nombre?"están":"son")+" "+e._s(e.terceraOcupacion.nombre)+", el\n              "+e._s(Math.round(100*e.cuartaOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.cuartaOcupacion.nombre?"están":"son")+" "+e._s(e.cuartaOcupacion.nombre)+", el\n              "+e._s(Math.round(100*e.quintaOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.quintaOcupacion.nombre?"están":"son")+" "+e._s(e.quintaOcupacion.nombre)+".\n            ")])])])]),e._v(" "),t("div",{staticClass:"card"},[t("div",{staticClass:"card-body"},[t("div",{staticClass:"row"},[t("div",{staticClass:"col-lg-6 text-center"},[t("h5",[e._v("\n                Población migrante por grupo de edad\n              ")]),e._v(" "),t("div",{staticStyle:{width:"100%",height:"400px"},attrs:{id:"chartocupaciones"}}),e._v("\n              Del 100% de la población migrante ("+e._s(e.totalMigrantes)+"), la\n              mayoría "+e._s(e.poblacionEdadUno.cant)+" tienen entre\n              "+e._s(e.poblacionEdadUno.edad)+" años de edad, seguido de\n              "+e._s(e.poblacionEdadDos.cant)+" entre 18-28 años,\n              "+e._s(e.poblacionEdadTres.cant)+" entre\n              "+e._s(e.poblacionEdadTres.edad)+" y\n              "+e._s(e.poblacionEdadCuatro.cant)+" entre\n              "+e._s(e.poblacionEdadCuatro.edad)+".\n            ")]),e._v(" "),t("div",{staticClass:"col-lg-6 text-center"},[t("h5",[e._v("Migrantes por sexo")]),e._v(" "),t("div",{staticStyle:{width:"100%",height:"400px"},attrs:{id:"chartdivsexo"}}),e._v("\n              \n                El\n                "+e._s(Math.round(100*e.migrantesNoRegulados/(e.migrantesNoRegulados+e.migrantesRegulados)))+"% de la poblacion migrante no se encuentran registrados como\n                migrantes.\n            ")])])])]),e._v(" "),t("div",{staticClass:"card"},[t("div",{staticClass:"card-body"},[t("div",{staticClass:"row"},[t("div",{ref:"printMe",staticClass:"col-lg-12 text-center"},[t("h5",[e._v("Principales paises")]),e._v(" "),t("div",{staticStyle:{width:"100%",height:"500px"},attrs:{id:"chartdivpaises"}})])])])]),e._v(" "),t("div",{staticClass:"card"},[t("div",{staticClass:"card-body text-center"},[t("h4",[e._v("Situación de salud de migrantes")]),e._v(" "),t("div",{staticClass:"row"},[t("div",{staticClass:"col-lg-12 text-center"},[t("h4",[e._v("Principales enfermedades")]),e._v(" "),t("div",{staticStyle:{width:"100%",height:"400px"},attrs:{id:"chartbarraenfermedades"}}),e._v(" "),e.enfermedades.length>0?t("div",[e._v("\n                Las principales enfermedades reportadas en la población migrante son:  \n                "),e._l(e.enfermedades,(function(a){return t("span",{key:a.id,attrs:{value:a.id}},[e._v("\n                  "+e._s(a.enfe)+", \n                ")])}))],2):t("div",[e._v("\n                 No hay datos para las enfermedades.\n              ")])]),e._v(" "),t("div",{staticClass:"col-lg-6 text-center"},[t("h4",[e._v("Acesso a servicio de salud")]),e._v(" "),t("h5",[e._v("Migrantes afiliados")]),e._v(" "),t("h1",[e._v(e._s(e.afiliaciones.afiliados))]),e._v(" "),t("h5",[e._v("Migrantes no afiliados")]),e._v(" "),t("h1",[e._v(e._s(e.afiliaciones.no_afiliados))])]),e._v(" "),e._m(1)])])])])]),e._v(" "),t("VueHtml2pdf",{ref:"html2Pdf",attrs:{"show-layout":!1,"float-layout":!0,"enable-download":!0,"preview-modal":!0,"paginate-elements-by-height":1400,filename:"myPDF","pdf-quality":2,"manual-pagination":!1,"pdf-format":"a4","pdf-orientation":"portrait","pdf-content-width":"100%",margin:[0,100,0,100]}},[t("section",{attrs:{slot:"pdf-content"},slot:"pdf-content"},[t("section",{staticClass:"pdf-item"},[t("div",{staticClass:"row",staticStyle:{"margin-top":"30px"}},[t("div",{staticClass:"col-sm-12 text-center"},[t("h3",[e._v("INFORME POBLACIÓN MIGRANTE")])])]),e._v(" "),t("table",{staticStyle:{width:"100%"}},[t("tr",[t("td",{staticClass:"text-center",staticStyle:{"font-size":"14px",width:"50%","font-weight":"600"}},[e._v("\n              Población migrante\n            ")]),e._v(" "),t("td",{staticClass:"text-center",staticStyle:{"font-size":"14px",width:"50%","font-weight":"600"}},[e._v("\n              Estado migratorio\n            ")])]),e._v(" "),t("tr",[t("td",{staticClass:"text-center",staticStyle:{"font-size":"11px"}},[t("br"),e._v(" "),t("vue-circle",{ref:"gcpdf",attrs:{progress:e.mivariable,size:180,reverse:!1,"line-cap":"round",fill:e.fill,"empty-fill":"rgba(0, 0, 0, .1)","animation-start-value":0,"start-angle":-190,"insert-mode":"append",thickness:10,"show-percent":!1},on:{"vue-circle-progress":e.progress,"vue-circle-end":e.progress_end}},[t("p",{staticStyle:{"font-size":"35px","font-weight":"bold"}},[e._v("\n                  "+e._s(Math.round(e.poblacionMigrante))+"%\n                ")])])],1),e._v(" "),t("td",{staticClass:"text-center",staticStyle:{"font-size":"11px"}},[t("img",{staticStyle:{width:"100%","font-size":"11px"},attrs:{src:e.imagenPie}})])]),e._v(" "),t("tr",[t("td",{staticClass:"text-center",staticStyle:{"font-size":"11px"},attrs:{colspan:"2"}},[e._v("\n              El\n              "+e._s(Math.round(100*e.migrantesNoRegulados/(e.migrantesNoRegulados+e.migrantesRegulados)))+"% de la poblacion migrante no se encuentran registrados como\n              migrantes\n            ")])])]),e._v(" "),t("br"),e._v(" "),t("table",{staticStyle:{width:"100%"}},[t("tr",[t("td",{staticClass:"text-center",staticStyle:{"font-size":"11px"},attrs:{colspan:"2"}},[t("h5",[e._v("Principales ocupaciones de los migrantes")])])]),e._v(" "),t("tr",[t("td",{staticClass:"text-center",staticStyle:{"font-size":"11px"},attrs:{colspan:"2"}},[t("img",{staticStyle:{width:"100%","font-size":"11px"},attrs:{src:e.imagenBarra}}),e._v(" "),t("span",{staticStyle:{"padding-left":"10px","padding-right":"10px"}},[e._v(" En relación a la ocupación migrante en el municipio, el\n              "+e._s(Math.round(100*e.primerOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.primerOcupacion.nombre?"están":"son")+" "+e._s(e.primerOcupacion.nombre)+", el\n              "+e._s(Math.round(100*e.segundaOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.segundaOcupacion.nombre?"están":"son")+" "+e._s(e.segundaOcupacion.nombre)+", el\n              "+e._s(Math.round(100*e.terceraOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.terceraOcupacion.nombre?"están":"son")+" "+e._s(e.terceraOcupacion.nombre)+", el\n              "+e._s(Math.round(100*e.cuartaOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.cuartaOcupacion.nombre?"están":"son")+" "+e._s(e.cuartaOcupacion.nombre)+", el\n              "+e._s(Math.round(100*e.quintaOcupacion.cant/e.totalMigrantes))+"%\n              "+e._s("Sin empleo"==e.quintaOcupacion.nombre?"están":"son")+" "+e._s(e.quintaOcupacion.nombre)+".")])])])]),e._v(" "),t("br"),e._v(" "),t("table",{staticStyle:{width:"100%"}},[t("tr",[t("td",{staticClass:"text-center",staticStyle:{"font-size":"11px"},attrs:{colspan:"2"}},[t("h5",[e._v("Población migrante por grupo de edad")])])]),e._v(" "),t("tr",[t("td",{staticClass:"text-center",staticStyle:{"font-size":"11px"},attrs:{colspan:"2"}},[t("img",{staticStyle:{width:"100%","font-size":"11px"},attrs:{src:e.imagenPieOcupaciones}}),e._v(" "),t("span",{staticStyle:{"padding-left":"10px","padding-right":"10px"}},[e._v("Del 100% de la población migrante ("+e._s(e.totalMigrantes)+"), la\n              mayoría "+e._s(e.poblacionEdadUno.cant)+" tienen entre\n              "+e._s(e.poblacionEdadUno.edad)+" años de edad, seguido de\n              "+e._s(e.poblacionEdadDos.cant)+" entre 18-28 años,\n              "+e._s(e.poblacionEdadTres.cant)+" entre\n              "+e._s(e.poblacionEdadTres.edad)+" y\n              "+e._s(e.poblacionEdadCuatro.cant)+" entre\n              "+e._s(e.poblacionEdadCuatro.edad)+".")])])])])]),e._v(" "),t("div",{staticClass:"html2pdf__page-break"}),e._v(" "),t("section",{attrs:{slot:"pdf-content"},slot:"pdf-content"})])])],1)}),[function(){var e=this.$createElement,a=this._self._c||e;return a("div",{staticClass:"col-sm-10"},[a("h3",[this._v("INFORME POBLACIÓN MIGRANTE")])])},function(){var e=this.$createElement,a=this._self._c||e;return a("div",{staticClass:"col-lg-6 text-center"},[a("h4",[this._v("Situación nutricional")])])}],!1,null,null,null);a.default=y.exports}}]);