export const paymentMethodSelectionModule = {
    state: {
        companyAccounts: [],
        selectedAccounts: [],
        totalPaid: 0,
        invalidPaymentsSum: true
    },
    getters: {
        availableAccounts: state => {
            return state.companyAccounts.filter(account => !state.selectedAccounts.map(account => account.id).includes(account.id));
        },
        selectedAccounts: state => {
            return state.selectedAccounts;
        },
        invalidPaymentsSum: state => {
            return state.invalidPaymentsSum;
        },
        totalPaid: state => {
            return state.totalPaid;
        }
    },
    mutations: {
        resetDefaults (state) {
            state.companyAccounts = [];
            state.selectedAccounts = [];
            state.totalPaid = 0;
            state.invalidPaymentsSum = true;
        },
        selectAccount(state, account) {
            state.selectedAccounts.push(account);
        },
        invalidPaymentsSum(state, sum) {
            state.invalidPaymentsSum = sum;
        },
        totalPaid(state, total) {
            state.totalPaid = total;
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