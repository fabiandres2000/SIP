
<template>
  <div>
    <div>
      <h3>Densidad de la población</h3>
    </div>
    <br />
    <div class="col-sm-12" v-if="points.length">
      <vue-google-heatmap
        :points="points"
        style="width: 100%;"
        :height="350"
        map-type="roadmap"
        :initial-zoom="12"
        :lat="latitud"
        :lng="longitud"
      />
    </div>

    <!--<GmapMap
      :center="center"
      :zoom="12"
      :options="{
   zoomControl: true,
   mapTypeControl: false,
   scaleControl: false,
   streetViewControl: false,
   rotateControl: false,
   fullscreenControl: true,
   disableDefaultUi: false
 }"
      style="width:100%;  height: 300px;"
    />-->
  </div>
</template>

<script>
import * as DashboardService from "../../Servicios/dashboard";

export default {
  name: "GoogleMap",
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      center: { lat: 0, lng: 0 },
      latitud: 0.0,
      longitud: 0.0,
      points: []
    };
  },
  mounted() {},
  created() {
    this.coordenadas();
  },
  beforeMount() {},
  methods: {
    async coordenadas() {
      let data = {
        _token: this.csrf
      };

      await DashboardService.coordenadas(data)
        .then(respuesta => {
          //console.log(respuesta.data["latitud"]);
          this.latitud = Number(respuesta.data["latitud"]);
          this.longitud = Number(respuesta.data["longitud"]);
          this.center.lat = this.latitud;
          this.center.lng = this.longitud;

         this.points.push({ lat: 10.46314, lng: -73.25322 },
        { lat: 10.46414, lng: -73.25322 },
        { lat: 10.46514, lng: -73.25322 },
        { lat: 10.46614, lng: -73.25322 },
        { lat: 10.46714, lng: -73.25322 },

        { lat: 10.43314, lng: -73.25322 },
        { lat: 10.43414, lng: -73.25322 },
        { lat: 10.43514, lng: -73.25322 },
        { lat: 10.43614, lng: -73.25322 },
        { lat: 10.43714, lng: -73.25322 },

        { lat: 10.42314, lng: -73.25322 },
        { lat: 10.42314, lng: -73.25322 },
        { lat: 10.42314, lng: -73.25322 },
        { lat: 10.42314, lng: -73.25322 },
        { lat: 10.42314, lng: -73.25322 },
        { lat: 10.42314, lng: -73.25322 },
        { lat: 10.41314, lng: -73.25322 },
        { lat: 10.41314, lng: -73.25322 },
        { lat: 10.41314, lng: -73.25322 },
        { lat: 10.41314, lng: -73.25322 },
        { lat: 10.41314, lng: -73.25322 },
        { lat: 10.46314, lng: -73.25322 },
        { lat: 10.46314, lng: -73.25322 },
        { lat: 10.46314, lng: -73.25322 });

        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>