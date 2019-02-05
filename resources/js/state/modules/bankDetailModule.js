export const bankDetailModule = {
    state: {
        banks: []
    },
    getters: {
        storedBankDetails(state) {
            return state.banks;
        },
        getStoredBank: (state) => (bank_id) => {
            return state.banks.filter(({ id }) => id === bank_id)[0];
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