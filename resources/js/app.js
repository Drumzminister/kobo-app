/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert2');
window.moment = require('moment');

import {vendorApp} from "./mixins/vendors";
import {rentApp} from "./mixins/rent";
import {loanApp} from "./mixins/loan";
import {inventoryApp} from "./mixins/inventory";
import {staffApp} from "./mixins/staff";
import {customerApp} from "./mixins/customer";
import {salesListView} from "./mixins/salesListView";
import {loadingView} from "./mixins/loadingView";
import {appModal} from "./mixins/appModals";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

window.app = new Vue({
    el: '#app',
    mixins: [
        vendorApp,
        rentApp,
        loanApp,
        inventoryApp,
        staffApp,
        customerApp,
        salesListView,
        loadingView,
        appModal
    ],
    filters: {
        numberFormat (value) {
            let number = Number(value);
            if (isNaN(number)) {return value;}
            const formatter = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            return formatter.format(number);
        }
    },
    data: {},
    methods: {}
});
