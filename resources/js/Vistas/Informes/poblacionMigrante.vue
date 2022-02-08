<template>
  <div style="margin-top: -4%">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h3>INFORME POBLACION MIGRANTE</h3>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 text-center">
                <h5>Población migrante</h5>
                <vue-ellipse-progress
                  :progress="poblacionMigrante"
                  :size="250"
                  :angle="-90"
                  :gap="10"
                  :legend="true"
                  :legendValue="180"
                  :thickness="8"
                  emptyThickness="5%"
                  dash="60 0.9"
                  color="#068204"
                  :noData="false"
                  :loading="false"
                  fontColor="white"
                  :half="false"
                  line-mode="out 2"
                >
                  <p
                    slot="legend-caption"
                    style="font-size: 45px; font-weight: bold"
                  >
                    {{ Math.round(poblacionMigrante) }}%
                  </p>
                </vue-ellipse-progress>
              </div>
              <div class="col-lg-6 text-center">
                <h5>Estado migratorio</h5>
                <div id="chartdiv" style="width: 100%; height: 250px"></div>
                <b>
                  El
                  {{
                    Math.round(
                      (migrantesNoRegulados * 100) /
                        (migrantesNoRegulados + migrantesRegulados)
                    )
                  }}% de la poblacion migrante no se encuentran registrados como
                  migrantes.</b
                >
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h4>Población migrante por grupo de edad</h4>
                <div id="chartbarra" style="width: 100%; height: 400px"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h4>Principales ocupaciones de los migrantes</h4>
                <div id="chartocupaciones" style="width: 100%; height: 400px"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
"use strict";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import * as informes from "../../Servicios/informes";
import VueApexCharts from "vue-apexcharts";
am4core.useTheme(am4themes_animated);
export default {
  mounted() {
    this.calcular();
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      combo: "",
      poblacionMigrante: 0,
      migrantesRegulados: 0,
      migrantesNoRegulados: 0,
      datos: {
        migrantes0: 0,
        migrantes115: 0,
        migrantes611: 0,
        migrantes1217: 0,
        migrantes1828: 0,
        migrantes2959: 0,
        migrantes60: 0,
      },
      ocupaciones:{
        id: 0,
        descripcion: "",
        cont: 0
      },
      poblacion: {
        migrantes: 0,
        nomigrantes: 0,
      },
      series: [],
      series_barra: [],
      series_ocupaciones: []
    };
  },
  methods: {
    async calcular() {
      let data = {
        _token: this.csrf,
      };
      await informes
        .inicialesMigrantes(data)
        .then((respuesta) => {
          this.poblacionMigrante =
            (respuesta.data.total_migrantes * 100) /
            respuesta.data.total_poblacion;
          this.migrantesRegulados = respuesta.data.total_regulado;
          this.migrantesNoRegulados = respuesta.data.total_no_regulado;
          this.datos = respuesta.data.edades;
          this.ocupaciones = respuesta.data.ocupaciones

          //GRAFICA DE PIE
          this.series.push({
            migrantes: "Regulados",
            cantidad: this.migrantesRegulados,
          });
          this.series.push({
            migrantes: "No regulados",
            cantidad: this.migrantesNoRegulados,
          });

          //GRAFICA DE BARS
          this.series_barra.push({
            edad: "0+",
            migrantes: this.datos.migrantes0
          });
          this.series_barra.push({
            edad: "1-5",
            migrantes: this.datos.migrantes115
          });
          this.series_barra.push({
            edad: "6-11",
            migrantes: this.datos.migrantes611
          });
          this.series_barra.push({
            edad: "12-17",
            migrantes: this.datos.migrantes1217
          });
          this.series_barra.push({
            edad: "18-28",
            migrantes: this.datos.migrantes1828
          });
          this.series_barra.push({
            edad: "29-59",
            migrantes: this.datos.migrantes2959
          });
          this.series_barra.push({
            edad: "60+",
            migrantes: this.datos.migrantes60
          });

          for(var i = 0; i< this.ocupaciones.length; i++){
             this.series_ocupaciones.push({
               ocupacion: this.ocupaciones[i]["descripcion"],
               migrantes: this.ocupaciones[i]["cont"]
             }); 
          }

          console.log(this.series_ocupaciones);

          this.grafica_de_pie();
          this.grafica_barra();
          this.grafica_de_pie_ocupaciones();
        })
        .catch((err) => {
          console.log(err);
        });
    },
    grafica_de_pie() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      var chart = am4core.create("chartdiv", am4charts.PieChart3D);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new am4charts.Legend();

      chart.data = this.series;

      var series = chart.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "cantidad";
      series.dataFields.category = "migrantes";
    },
    grafica_barra() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      // Create chart instance
      var chart = am4core.create("chartbarra", am4charts.XYChart3D);

      // Add data
      chart.data = this.series_barra;

      // Create axes
      let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.dataFields.category = "edad";
      categoryAxis.renderer.labels.template.rotation = 270;
      categoryAxis.renderer.labels.template.hideOversized = false;
      categoryAxis.renderer.minGridDistance = 20;
      categoryAxis.renderer.labels.template.horizontalCenter = "right";
      categoryAxis.renderer.labels.template.verticalCenter = "middle";
      categoryAxis.tooltip.label.rotation = 270;
      categoryAxis.tooltip.label.horizontalCenter = "right";
      categoryAxis.tooltip.label.verticalCenter = "middle";

      let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
      valueAxis.title.text = "Migrantes";
      valueAxis.title.fontWeight = "bold";

      // Create series
      var series = chart.series.push(new am4charts.ColumnSeries3D());
      series.dataFields.valueY = "migrantes";
      series.dataFields.categoryX = "edad";
      series.name = "Migrantes";
      series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
      series.columns.template.fillOpacity = 0.8;

      var columnTemplate = series.columns.template;
      columnTemplate.strokeWidth = 2;
      columnTemplate.strokeOpacity = 1;
      columnTemplate.stroke = am4core.color("#FFFFFF");

      columnTemplate.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });

      columnTemplate.adapter.add("stroke", function(stroke, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });

      chart.cursor = new am4charts.XYCursor();
      chart.cursor.lineX.strokeOpacity = 0;
      chart.cursor.lineY.strokeOpacity = 0;
    },
    grafica_de_pie_ocupaciones() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      var chart = am4core.create("chartocupaciones", am4charts.PieChart3D);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new am4charts.Legend();

      chart.data = this.series_ocupaciones;

      var series = chart.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "migrantes";
      series.dataFields.category = "ocupacion";
    },

    async filtrar() {
      let data = {
        _token: this.csrf,
        _tipo: this.combo,
      };
      //alert(this.combo);
      if (this.combo == "") {
        await IndicadoresService.spa(data)
          .then((respuesta) => {
            this.poblacion = respuesta.data["poblacion"];
            this.grafica_barras();
            //console.log(this.serie);
          })
          .catch((err) => {
            console.log(err);
          });
      } else {
        await IndicadoresService.filtrospa(data)
          .then((respuesta) => {
            this.poblacion = respuesta.data["poblacion"];
            this.grafica_barras();
            //console.log(this.serie);
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
  },
};
</script>