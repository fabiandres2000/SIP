import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        apiURL: 'http://127.0.0.1:8000/',
        serverPath: 'http://127.0.0.1:8000/',
        // apiURL: 'http://lecsidesarrollos.com.co/SIP/public/',
        // serverPath: 'http://lecsidesarrollos.com.co/SIP/public/',
        // apiURL: 'http://192.168.1.10/SIP/public/',
        // serverPath: 'http://192.168.1.10/SIP/public/',
        // apiURL: 'http://192.168.1.150/SIP/public/',
        // serverPath: 'http://192.168.1.150/SIP/public/',                        
    },
    mutations: {},
    actions: {}
});



