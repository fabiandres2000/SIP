import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        apiURL: 'http://127.0.0.1:8000/',
        serverPath: 'http://127.0.0.1:8000/',
        // apiURL: 'http://35.196.193.180/SIP/public/',
        // serverPath: 'http://35.196.193.180/SIP/public/',
        // apiURL: 'http://192.168.1.15/SIP/public/',
        // serverPath: 'http://192.168.1.15/SIP/public/',                
    },
    mutations: {},
    actions: {}
});



