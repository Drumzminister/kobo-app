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

        totalSalesAmount () {
            let sum = 0;
            this.saleItems.forEach(function(item) {
                sum += item.totalPrice();
            });
        }
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
        },
        createSale: function () {
            let data = {
                items: this.saleItems,
                sale_date: "",
                paymentMethods: this.selectedAccounts,
                tax_id: "",
                customer_id: "",
                sale_channel_id: "",
                invoice_number: "",
                total_amount: 0,
                delivery_cost: 0,
                discount: 0
            };
            let url = '/sale/debitis-nihil-aut-gmbh/add';

            window.axios.post(url, data)
                .then((response) =>  {
                    if (response.data.status === "success") {
                        swal("Sale created successfully!");
                    }
                })
                .catch();
        }
    }
};