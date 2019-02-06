export const bankDetailModule = {
    state: {
        banks: []
    },
    getters: {
        storedBankDetails(state) {
            return state.banks;
        }
    },
    mutations: {
        setBanks(state, banks) {
            state.banks = banks;
        },
        addStoredBankDetail (state, bank) {
            state.banks.push(bank);
        }
    }
};