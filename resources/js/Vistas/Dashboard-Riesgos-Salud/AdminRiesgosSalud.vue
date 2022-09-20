<template lang="">
    <div>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Población" active>
                    <PoblacionDashboard></PoblacionDashboard>
                </b-tab>
                <b-tab title="Hogares">
                </b-tab>
                <b-tab title="Viviendas">
                </b-tab>
                <b-tab title="SPA">
                </b-tab>
                <b-tab title="Embarazo">
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

import PoblacionDashboard from "./PoblacionDashboard.vue"

export default {
    components: {
        PoblacionDashboard
    },  
}
</script>
<style>
    #__BVID__120__BV_tab_controls_ {
        margin: 0px 0px -10px 0 !important;
    }
</style>