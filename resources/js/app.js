/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert2');
window.moment = require('moment');

import daterangepicker from 'daterangepicker';

import {rentApp} from "./mixins/rent";
import {loanApp} from "./mixins/loan";
import {inventoryApp} from "./mixins/inventory";
import {staffApp} from "./mixins/staff";
import {vendorApp} from "./mixins/vendor";
import {customerApp} from "./mixins/customer";
import {salesListView} from "./mixins/salesListView";
import {loadingView} from "./mixins/loadingView";
import {appModal} from "./mixins/appModals";
import {expenseApp} from "./mixins/expenses";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)));

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

import { ServerTable, ClientTable, Event } from 'vue-tables-2';
const koboTheme = require('./themes/koboTheme');
Vue.use(ClientTable, {}, false, koboTheme, 'default');

import {store} from "./state/store";

window.app = new Vue({
    el: '#app',
    store,
    mixins: [
        vendorApp,
        rentApp,
        loanApp,
        inventoryApp,
        staffApp,
        customerApp,
        salesListView,
        loadingView,
        appModal,
        expenseApp
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
