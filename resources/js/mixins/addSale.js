import SaleItem from "../classes/SaleItem";

export const addSale = {
    data() {
        return {
            sale_customer_id: "",
            saleTax: "",
            saleDate: "",
            saleItems: [],
        }
    },
    created: function() {
        this.addSaleItemForm();
    },
    computed: {
        selectedAccounts () {
            return this.$store.state.paymentModule.selectedAccounts;
        },
        availableInventories () {
            let that = this;
            return this.inventories.filter(inventory => !that.saleItems.map(item => item.inventory_id).includes(inventory.id));
        }
    },
    methods: {
        fillSaleItemWithInventory (item) {
            if (item.inventory_id !== "" && item.inventory_id !== null && typeof item.inventory_id !== 'undefined') {
                let inventory = this.getInventory(item.inventory_id);
                item.sales_price = inventory.sales_price;
                item.inventory = inventory;
            }
        },
        getInventory (inventoryId) {
            return this.inventories.filter(inventory => inventory.id === inventoryId)[0];
        },
        addNewSaleItemRow: function () {
            this.addSaleItemForm();
        },
        deleteSaleItemRow (index) {
            this.saleItems.splice(index, 1);
        },
        addSaleItemForm: function () {
            let item = new SaleItem();
            this.saleItems.push(item);
        }
    }
};