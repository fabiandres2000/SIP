window.Vue = require('vue');
// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap';
import App from './App.vue';
import router from './router';
import store from './store.js';
import BootstrapVue from 'bootstrap-vue';
import VueSweetalert2 from 'vue-sweetalert2';
import Vuelidate from 'vuelidate';


// import FlashMessage from '@smartweb/vue-flash-message';
Vue.use(BootstrapVue);
Vue.use(VueSweetalert2);
Vue.use(Vuelidate);

// Vue.filter('moneda', {
//     // model -> view
//     // formats the value when updating the input element.
//     read: function (val) {
//         return '$' + val.toFixed(2)
//     },
//     // view -> model
//     // formats the value when updating the data.
//     write: function (val, oldVal) {
//         var number = +val.replace(/[^\d.]/g, '')
//         return isNaN(number) ? 0 : number
//     }
// });
// Vue.use(Datepicker);
// Vue.use(FlashMessage);
const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
