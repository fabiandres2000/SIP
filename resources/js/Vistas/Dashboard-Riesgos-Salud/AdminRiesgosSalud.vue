<template lang="">
    <div>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Población" active>
                    <PoblacionDashboard></PoblacionDashboard>
                </b-tab>
                <b-tab title="Hogares">
                    <HogaresDashboard></HogaresDashboard>
                </b-tab>
                <b-tab title="Enfermedades">
                    <enfermedadesDashboard></enfermedadesDashboard>
                </b-tab>
                <b-tab title="SPA">
                    <SpaDashboard></SpaDashboard>
                </b-tab>
                <b-tab title="Embarazo">
                    <EmbarazoDashboard></EmbarazoDashboard>
                </b-tab>
                </b-tab>
            </b-tabs>
        </b-card>
    </div>
</template>
<script>

import PoblacionDashboard from "./PoblacionDashboard.vue"
import HogaresDashboard from "./HogaresDashboard.vue"
import enfermedadesDashboard from "./enfermedadesDashboard.vue"
import SpaDashboard from "./SpaDashboard.vue"
import EmbarazoDashboard from "./EmbarazoDashboard.vue"

export default {
    components: {
        PoblacionDashboard,
        HogaresDashboard,
        enfermedadesDashboard,
        SpaDashboard,
        EmbarazoDashboard
    },  
}
</script>
<style>
    #__BVID__120__BV_tab_controls_ {
        margin: 0px 0px -10px 0 !important;
    }
</style>