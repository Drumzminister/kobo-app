export const saleModule = {
    state: {
        sale: {}
    },
    getters: {
        saleId(state) {
            return state.sale.id;
        },
        saleInvoice(state) {
            return state.sale.invoice_number;
        }
    },
    mutations: {
        setSale(state, sale) {
            state.sale = sale;
        }
    }
};