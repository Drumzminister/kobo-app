import SaleItem from "../classes/SaleItem";
import { mapGetters, mapMutations, mapState } from "vuex";
import { toast, confirmSomethingWithAlert } from "../helpers/alert";
import API from "../classes/API";

export const updateSale = {
    data() {
        return {
            sale_customer_id: "",
            saleItems: [],
            deliveryCost: this.sale.delivery_cost || null,
            saleDiscount: this.sale.discount || null,
            savingSale: false,
            saleSaved: false,
        }
    },
    created: function() {
        this.setCompanyInventories(this.inventories);
        this.setSale(this.sale);
        this.setSaleItems(this.sale);
    },
    computed: {
        ...mapGetters(['taxId', 'saleDate', "customer", "selectedTax"]),
        ...mapGetters(['availableInventories', 'getInventory', 'totalPaid']),
        invalidPaymentsSum () {
            return parseInt(this.totalPaid) > parseInt(this.spreadAmount);
        },
        spreadAmount () {
            return this.computedSalesAmount;
        },
        saleIsNotValid () {
            return this.customer === null || typeof this.customer === "undefined" || this.saleDate === "" || this.invalidPaymentsSum;
        },
        taxAmount () {
            return (parseInt(this.selectedTax ? this.selectedTax.percentage : 0) / 100) * this.totalSalesAmount;
        },
        selectedAccounts () {
            return this.$store.state.paymentModule.selectedAccounts;
        },
        totalSalesAmount () {
            let sum = 0;
            this.saleItems.forEach(function(item) {
                sum += item.totalPrice();
            });

            return sum;
        },
        balanceLeft () {
            return this.computedSalesAmount - this.totalPaid;
        },
        computedSalesAmount () {
            let sum = this.totalSalesAmount;

            sum -= parseInt(this.saleDiscount || 0);
            sum += parseInt(this.deliveryCost || 0);
            sum += parseInt(this.taxAmount);

            return sum;
        }
    },
    methods: {
        ...mapMutations(['setCompanyInventories', 'selectInventory', 'setSale']),
        ...mapGetters(['getCurrentURI']),
        addNewSaleItemRow: function () {
            this.addSaleItemForm();
        },
        reverseSaleItemRow (index) {
            let item = this.saleItems[index];

            let newItem = this.addSaleItemForm();
            newItem.inventory = item.inventory;
            newItem.inventory_id = item.inventory_id;
            newItem.sales_price = -1 * item.sales_price;
            newItem.type = 'reversed';
            newItem.quantity = item.quantity;
            newItem.description = item.description;
            newItem.sale_channel_id = item.sale_channel_id;
            newItem.reversedItem = item;
            // -----------------------------
            newItem.reversedItem = item;
            item.reversedItem = newItem;
            //------------------------------

            // newItem.saveItem(); // This will Save the reversal Immediately
        },
        addSaleItemForm: function () {
            let item = new SaleItem(this.sale.id);
            let pos = this.saleItems.push(item) - 1;
            this.createWatcherForSaleItem(this.saleItems[pos]);
            return item;
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
        saveSale ()  {
            if (this.balanceLeft === 0) {
                this.sendSaleCreationRequest();
            } else {
                let meaning = this.balanceLeft < 0 ? `You will be owning this customer NGN ${this.$currency.format(-1 * this.balanceLeft)}`
                                                    : `This Customer will be owning you NGN ${this.$currency.format(this.balanceLeft)}`;

                confirmSomethingWithAlert(`${ meaning }, once saved, you cannot revert!`).then((result) => {
                    if (result.value) {
                        if (this.saveAllItems()) {
                            this.sendSaleCreationRequest();
                        }
                    }
                });
            }
        },
        saveAllItems () {
            this.saleItems.forEach((item) => item.saveItem());
            // Return Promise at this spot
            return true;
        },
        sendSaleCreationRequest () {
            this.savingSale = true;
            this.createSale();
        },
        getChannelName (channelId) {
            return this.channels.filter(({ id }) => id === channelId)[0].name;
        },
        createSale: function () {
            let api = new API({ baseUri: 'https://kobo.test/client'});
            api.createEntity({ name: 'sale'});
            let data = {
                tax_id: this.taxId,
                sale_id: this.sale.id,
                sale_date: this.saleDate,
                discount: this.saleDiscount,
                customer_id: this.customer.id,
                delivery_cost: this.deliveryCost,
                total_amount: this.totalSalesAmount,
                paymentMethods: this.selectedAccounts,
                invoice_number: this.sale.invoice_number,
                updateType: "reversal"
            };

            api.endpoints.sale.create(data)
                .then( ({ data }) => {
                    if (data.status === "success") {
                        this.savingSale = false;
                        this.saleSaved = true;
                        toast('Sale record updated successfully!', 'success', 'center');
                        setTimeout(function () {
                            window.location.href = "/client/sales";
                        }, 1000);
                    } else {
                        this.savingSale = false;
                        this.saleSaved = false;

                        toast(data.message, 'error', 'center');
                    }
                });
        },
        previewInvoice () {
            this.openModal("#previewInvoiceModal");
        },
        validateSalesData () {
        },
        openSendingModal () {
            if(!this.customer) {
                toast('You must select a customer to send', 'error', 'center');
                return;
            }
            this.openModal("#invoiceSender");
        },
        setSaleItems (sale) {
            if (sale.saleItems) {
                for (let key in sale.saleItems) {
                    let saleItem = this.createNewSaleItemFromSaleItem(sale.saleItems[key]);
                    if (saleItem.reversedItem) {
                        saleItem.reversedItem = this.createNewSaleItemFromSaleItem(saleItem.reversedItem);
                    }
                    let pos = this.saleItems.push(saleItem) - 1;
                    this.createWatcherForSaleItem(this.saleItems[pos]);
                }
            }
        },
        createNewSaleItemFromSaleItem (item) {
            let inventory = this.$store.getters.getInventory(item.inventory_id);
            let saleItem = new SaleItem(this.sale.id, inventory);
            saleItem.inventory_id = item.inventory_id;
            saleItem.id = item.id;
            saleItem.sale_channel_id = item.sale_channel_id;
            saleItem.quantity = parseInt(item.quantity);
            saleItem.sales_price = item.sales_price;
            saleItem.description = item.description;
            saleItem.created_at = item.created_at;
            saleItem.reversedItem = item.reversedItem;
            saleItem.saved = true;
            saleItem.type = item.type;

            return saleItem;
        }
    }
};