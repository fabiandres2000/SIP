<template lang="">
    <div>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Analfabetismo (Mayores de 15 años)" active>
                    <AnalfabetismoDesempleo></AnalfabetismoDesempleo>
                </b-tab>
                <b-tab title="Analfabetismo (menores de 15 años)">
                    <Analfabetismo2></Analfabetismo2>
                </b-tab>
                <b-tab title="Desempleo">
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

export default {
    components: {
        AnalfabetismoDesempleo,
        Analfabetismo2
    },  
}
</script>
<style>
    #__BVID__120__BV_tab_controls_ {
        margin: 0px 0px -10px 0 !important;
    }
</style>