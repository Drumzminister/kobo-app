/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert2');
window.moment = require('moment');
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
import {productApp} from "./mixins/product";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)));

import VeeValidate from 'vee-validate';

import { ServerTable, ClientTable, Event } from 'vue-tables-2';
const koboTheme = require('./themes/koboTheme');
Vue.use(ClientTable, {}, false, koboTheme, 'default');
Vue.use(VeeValidate);
import {store} from "./state/store";
import Select2 from "v-select2-component";
import Currency from './plugins/Currency';
import ModalHelper from './plugins/ModalHelper';
Vue.use(Currency);
Vue.use(ModalHelper);

Vue.filter('numberFormat', function (value) {
    let number = Number(value);
    if (isNaN(number)) { return value; }
    const formatter = new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    return formatter.format(number);
})

Vue.prototype.$eventHub = new Vue(); // A Global event bus

window.app = new Vue({
    el: '#app',
    store,
    components: {Select2},
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
        expenseApp,
        productApp,
    ],
    // components: {PaymentMethodSelection: PaymentMethodSelection},
    filters: {
        dateTime(value) {
            if (!value) return '';
            return moment(value).format('l'); // here u modify data
        },
    },
    data: {},
    methods: {
    },
    mounted () {
    }
});
