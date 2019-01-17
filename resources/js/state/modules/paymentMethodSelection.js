export const paymentMethodSelectionModule = {
    state: {
        companyAccounts: [],
        selectedAccounts: [],
    },
    getters: {
        availableAccounts: state => {
            return state.companyAccounts.filter(account => !state.selectedAccounts.map(account => account.id).includes(account.id));
        },
        selectedAccounts: state => {
            return state.selectedAccounts;
        }
    },
    mutations: {
        selectAccount(state, account) {
            state.selectedAccounts.push(account);
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
};