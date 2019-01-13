import Vue from "vue";
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        companyAccounts: [],
        selectedAccounts: [],
    },
    getters: {
        availableAccounts: state => {
            return state.companyAccounts.filter(account => !state.selectedAccounts.map(account => account.id).includes(account.id));
        }
    },
    mutations: {
        selectAccount(state, accountId) {
            state.selectedAccounts.push(accountId);
        },
        removeAccount(state, account) {
            let pos = state.selectedAccounts
                .map(account => account.id)
                .indexOf(account.id);

            state.selectedAccounts.splice(pos, 1);
        },
        setCompanyAccounts(state, accounts) {
            state.companyAccounts = accounts;
        }
    }
});