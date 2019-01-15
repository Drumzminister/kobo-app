import SaleItem from "../classes/SaleItem";
import {mapGetters, mapMutations, mapState} from "vuex";

export const addSale = {
    data() {
        return {
            sale_customer_id: "",
            saleItems: [],
            deliveryCost: 0
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
        ...mapGetters(['customerId', 'taxId', 'saleDate']),
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
        ...mapGetters(['getCurrentURI']),
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
                paymentMethods: this.selectedAccounts,
                tax_id: this.taxId,
                sale_date: this.saleDate,
                customer_id: this.customerId,
                total_amount: 0,
                discount: 0,
                sale_id: this.sale.id,
                invoice_number: this.sale.invoice_number,
                delivery_cost: this.deliveryCost
            };

            window.axios.post(this.getCurrentURI(), data)
                .then((response) =>  {
                    if (response.data.status === "success") {
                        swal("Sale created successfully!");
                    }
                })
                .catch();
        }
    }
};