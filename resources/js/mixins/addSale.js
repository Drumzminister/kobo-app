import SaleItem from "../classes/SaleItem";
import {mapGetters, mapMutations, mapState} from "vuex";
import {toast} from "../helpers/alert";

export const addSale = {
    data() {
        return {
            sale_customer_id: "",
            saleItems: [],
            deliveryCost: 0,
            saleDiscount: 0
        }
    },
    created: function() {
        this.addSaleItemForm();
        this.setCompanyInventories(this.inventories);
        this.setSale(this.sale);
        this.setSaleItems(this.sale);
    },
    computed: {
        saleIsNotValid () {
            return this.customer === null || typeof this.customer === "undefined" || this.saleDate === "" || this.taxId === "";
        },
        selectedAccounts () {
            return this.$store.state.paymentModule.selectedAccounts;
        },
        ...mapGetters(['taxId', 'saleDate', "customer"]),
        ...mapGetters(['availableInventories', 'getInventory']),
        totalSalesAmount () {
            let sum = 0;
            this.saleItems.forEach(function(item) {
                sum += item.totalPrice();
            });
            return sum - parseInt(this.saleDiscount || 0);
        }
    },
    methods: {
        ...mapMutations(['setCompanyInventories', 'selectInventory', 'setSale']),
        ...mapGetters(['getCurrentURI']),
        fillSaleItemWithInventory (item) {
            if (item.inventory_id !== "" && item.inventory_id !== null && typeof item.inventory_id !== 'undefined') {
                let inventory = this.$store.getters.getInventory(item.inventory_id);
                item.sales_price = inventory.sales_price;
                item.inventory = inventory;
                this.selectInventory(inventory);
                item.debounceItemSaving();
            }
        },
        addNewSaleItemRow: function () {
            this.addSaleItemForm();
        },
        deleteSaleItemRow (index) {
            let item = this.saleItems[index];
            let self = this;
            if(!item.isNotValid) {
                item.deleteItemOnDatabase()
                    .then(({ data }) => {
                        if (data.status === "success") {
                            self.saleItems.splice(index, 1);
                        }
                    })
                    .catch((err) => console.log(err));
            } else {
                self.saleItems.splice(index, 1);
            }
        },
        addSaleItemForm: function () {
            let item = new SaleItem(this.sale.id);
            let pos = this.saleItems.push(item) - 1;
            this.createWatcherForSaleItem(this.saleItems[pos]);
        },
        createWatcherForSaleItem (item) {
            this.$watch(() => item.inventory_id, this.saleItemDataChanged);
            this.$watch(() => item.sale_channel_id, this.saleItemDataChanged);
            this.$watch(() => item.description, this.saleItemDataChanged);
            this.$watch(() => item.quantity, this.saleItemDataChanged);
        },
        saleItemDataChanged (item) {
            // ToDo: Implement this Watcher
        },
        saveSale () {
            if (this.saleIsNotValid) {
                toast('Please make sure customer', 'error', 'center');
            }
        },
        createSale: function () {
            let data = {
                tax_id: this.taxId,
                sale_id: this.sale.id,
                sale_date: this.saleDate,
                discount: this.saleDiscount,
                customer_id: this.customer.id,
                delivery_cost: this.deliveryCost,
                total_amount: this.totalSalesAmount,
                paymentMethods: this.selectedAccounts,
                invoice_number: this.sale.invoice_number
            };

            window.axios.post(this.getCurrentURI(), data)
                .then((response) =>  {
                    if (response.data.status === "success") {
                        swal("Sale created successfully!");
                    }
                })
                .catch();
        },
        previewInvoice () {
            if(!this.customer) {
                toast('You must select a customer to preview Invoice', 'error', 'center');
                return;
            }
            this.openModal("#previewInvoiceModal");
        },
        openSendingModal () {
            if(!this.customer) {
                toast('You must select a customer to send', 'error', 'center');
                return;
            }
            this.openModal("#invoiceSender");
        },
        setSaleItems (sale) {
            if (sale.sale_items) {
                for (let key in sale.sale_items) {
                    let item = sale.sale_items[key];
                    let inventory = this.$store.getters.getInventory(item.inventory_id);
                    let saleItem = new SaleItem(this.sale.id, inventory);
                    saleItem.inventory_id = item.inventory_id;
                    saleItem.id = item.id;
                    saleItem.sale_channel_id = item.sale_channel_id;
                    saleItem.quantity = parseInt(item.quantity);
                    saleItem.sales_price = item.sales_price;
                    saleItem.description = item.description;
                    saleItem.created_at = item.created_at;
                    saleItem.saved = true;
                    let pos = this.saleItems.push(saleItem) - 1;
                    this.createWatcherForSaleItem(this.saleItems[pos]);
                }
            }
        }
    }
};