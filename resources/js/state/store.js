import Vue from "vue";
import Vuex from  'vuex';
import {paymentMethodSelectionModule} from './modules/paymentMethodSelection';
import {inventoryModule} from './modules/inventoryModule';

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        paymentModule: paymentMethodSelectionModule,
        inventoryModule: inventoryModule
    }
});
