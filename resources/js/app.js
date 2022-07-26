require('./bootstrap');
// window.Vue = require('vue');
window.Vue = require('vue').default;
import Vue from 'vue';
window.Fire  = new Vue();
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

import VueRouter from 'vue-router';
import { routes } from './routes/routes'

import VueToastr from "vue-toastr";
Vue.use(VueToastr, {
    defaultTimeout: 3000,
    defaultPosition: "toast-top-right",
    defaultClassNames: ["animated", "zoomInUp"]
})

// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
window.swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.toast = Toast;

const router = new VueRouter({
    routes,
    // mode: 'history',
})

import moment from 'moment';

Vue.filter("date", function (created) {
    return moment(created).format('MMMM Do YYYY, h:mm:ss a'); // July 6th 2022, 9:58:56 am
});

import{ Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

require('./component')

// import Role from  './components/role';

const app  = new Vue({
    el: '#top',
    router
    // components: { Role }
});
