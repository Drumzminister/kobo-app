import Vue from "vue";
import Vuex from  'vuex';
import {paymentMethodSelectionModule} from './modules/paymentMethodSelection';

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        paymentModule: paymentMethodSelectionModule
    }
});
