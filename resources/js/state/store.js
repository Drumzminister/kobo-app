import Vue from "vue";
import Vuex from  'vuex';
import {paymentMethodSelectionModule} from './modules/paymentMethodSelection';
import {inventoryModule} from './modules/inventoryModule';
import {vatModule} from './modules/vatModule';
import {saleModule} from './modules/saleModule';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        currentUri: require('jquery')(document)[0].baseURI,
    },
    getters: {
        getCurrentURI: state => {
            return state.currentUri;
        }
    },
    modules: {
        paymentModule: paymentMethodSelectionModule,
        inventoryModule: inventoryModule,
        vatModule: vatModule,
        saleModule: saleModule
    }
});
