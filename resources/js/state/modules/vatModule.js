export const vatModule = {
    state: {
        taxId: "",
        saleDate: "",
        customerId: "",
    },
    getters: {
        taxId(state) {
            return state.taxId;
        },
        customerId(state) {
            return state.customerId;
        },
        saleDate(state) {
            return state.saleDate;
        },
    },
    mutations: {
        taxId(state, value) {
            state.taxId = value;
        },
        customerId(state, value) {
            state.customerId = value;
        },
        saleDate(state, value) {
            state.saleDate = value;
        },
    }
};