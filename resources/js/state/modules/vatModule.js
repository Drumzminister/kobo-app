export const vatModule = {
    state: {
        taxId: "",
        saleDate: "",
        customer: null,
    },
    getters: {
        taxId(state) {
            return state.taxId;
        },
        customer(state) {
            return state.customer;
        },
        saleDate(state) {
            return state.saleDate;
        }
    },
    mutations: {
        taxId(state, value) {
            state.taxId = value;
        },
        customer(state, customer) {
            state.customer = customer;
        },
        saleDate(state, value) {
            state.saleDate = value;
        }
    }
};