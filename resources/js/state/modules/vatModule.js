export const vatModule = {
    state: {
        taxId: "",
        saleDate: "",
        customer: null,
        selectedTax: null,
        storedCustomers: null
    },
    getters: {
        taxId(state) {
            return state.taxId;
        },
        customer(state) {
            return state.customer;
        },
        storedCustomers(state) {
            return state.storedCustomers;
        },
        selectedTax(state) {
            return state.selectedTax;
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
        storedCustomers(state, customers) {
            state.storedCustomers = customers;
        },
        selectedTax(state, tax) {
            state.selectedTax = tax;
        },
        saleDate(state, value) {
            state.saleDate = value;
        }
    }
};