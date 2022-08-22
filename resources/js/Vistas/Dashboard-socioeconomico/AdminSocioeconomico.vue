<template lang="">
    <div>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Analfabetismo y Desempleo" active>
                    <AnalfabetismoDesempleo></AnalfabetismoDesempleo>
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

export default {
    components: {
        AnalfabetismoDesempleo,
    },  
}
</script>
<style>
    #__BVID__120__BV_tab_controls_ {
        margin: 0px 0px -10px 0 !important;
    }
</style>