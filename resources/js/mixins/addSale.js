import SaleItem from "../classes/SaleItem";
import {mapGetters, mapMutations, mapState} from "vuex";

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
        this.setCompanyInventories(this.inventories);
    },
    computed: {
        selectedAccounts () {
            return this.$store.state.paymentModule.selectedAccounts;
        },
        ...mapGetters(['availableInventories', 'getInventory']),
        // availableInventories () {
        //     let that = this;
        //     return this.inventories.filter(inventory => !that.saleItems.map(item => item.inventory_id).includes(inventory.id));
        // }

    },
    methods: {
        ...mapMutations(['setCompanyInventories', 'selectInventory']),
        fillSaleItemWithInventory (item) {
            if (item.inventory_id !== "" && item.inventory_id !== null && typeof item.inventory_id !== 'undefined') {
                let inventory = this.$store.getters.getInventory(item.inventory_id);
                item.sales_price = inventory.sales_price;
                item.inventory = inventory;
                this.selectInventory(inventory);
            }
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