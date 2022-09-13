<template lang="">
    <div>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Población" active>
                    <PoblacionDashboard></PoblacionDashboard>
                </b-tab>
                <b-tab title="Analfabetismo (Mayores de 15 años)">
                    <AnalfabetismoDesempleo></AnalfabetismoDesempleo>
                </b-tab>
                <b-tab title="Analfabetismo (menores de 15 años)">
                    <Analfabetismo2></Analfabetismo2>
                </b-tab>
                <b-tab title="Mercado Laboral ">
                    <MercadoLaboralDashboard></MercadoLaboralDashboard>
                </b-tab>
                <b-tab title="Desempleo">
                    <DesempleoDashboard></DesempleoDashboard>
                </b-tab>
                <b-tab title="Viviendas">
                </b-tab>
                <b-tab title="Hogares">
                </b-tab>
            </b-tabs>
        </b-card>
    </div>
</template>
<script>

import AnalfabetismoDesempleo from "./AnalfabetismoDesempleo.vue";
import Analfabetismo2 from "./Analfabtismo2.vue";
import DesempleoDashboard from "./DesempleoDashboard.vue";
import MercadoLaboralDashboard from "./MercadoLaboralDashboard.vue";
import PoblacionDashboard from "./PoblacionDashboard.vue";

export default {
    components: {
        AnalfabetismoDesempleo,
        Analfabetismo2,
        DesempleoDashboard,
        MercadoLaboralDashboard,
        PoblacionDashboard
    },  
}
</script>
<style>
    #__BVID__120__BV_tab_controls_ {
        margin: 0px 0px -10px 0 !important;
    }
</style>