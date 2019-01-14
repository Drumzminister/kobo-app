export const inventoryModule = {
    state: {
        companyInventories: [],
        selectedInventories: [],
    },
    getters: {
        availableInventories: state => {
            return state.companyInventories.filter(inventory => !state.selectedInventories.map(inventory => inventory.id).includes(inventory.id));
        }
    },
    mutations: {
        selectInventory(state, inventory) {
            state.selectedAccounts.push(account);
        },
        removeInventory(state, inventory) {
            let pos = state.selectedInventories
                .map(inventory => inventory.id)
                .indexOf(inventory.id);

            state.selectedInventories.splice(pos, 1);
        },
        setCompanyInventories(state, inventories) {
            state.companyInventories = inventories;
        }
    }
};