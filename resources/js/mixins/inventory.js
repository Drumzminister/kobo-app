import PaymentMethodSelection from "../components/banks/PaymentMethodSelection";
import HighestPurchases from "../components/inventory/HighestPurchases";
import {toast} from "../helpers/alert";
export const inventoryApp = {
    data: {
        inventoryForm: {
            inventoryItem:[],
            vendor_id: '',
            delivered_date: '',
            attachment: '',
            tax_id: '',
            tax_amount: 0,
            discount: '',
            delivery_cost: '',
            total_cost_price: '',
            total_sales_price: '',
            total_quantity: '',
            amount_paid: 0,
            banks: ''
        },
        inventoryItem: {
            delivered_date: '',
            name: '',
            quantity: '',
            sales_price: '',
            balance: '',
            invoice: '',
            vendor: ''
        },
        top_purchase: {},
        highest_purchase: '',
        highest_quantity: '',
        purchase: {},
        all_purchases: '',
        vendors: window.vendors,
        inventoryTableRow: [],
        totalCostPrice: [],
        selectedInventory: '',
        banks: window.banks,
        taxes: window.taxes,
        InventoryFormSubmitted: false,
    },
    computed : {
        selectedAccounts () {
            return this.$store.getters.selectedAccounts;
        },
        inventoryTax() {
            if (this.inventoryForm.tax_id) {
                let tax =  Number(this.inventoryForm.tax_id.percentage) / 100 * Number(this.totalCostPrice);
                return parseFloat(tax).toFixed(2);
            }
            return 0;
        },
        getActualAmountPaidThroughBank() {
            let total = 0;
            this.selectedAccounts.forEach(bank => {
                total += Number(bank.amount);
                this.inventoryForm.amount_paid = total;
            })
        },
    },
    components: {
      PaymentMethodSelection,
        HighestPurchases: HighestPurchases
    },
    mounted () {
        this.fetchHighestPurchases();
        this.fetchHighestQuantity();
        this.fetchAllPurchases();
        this.top_purchase = this.highest_quantity;
        this.purchase = this.all_purchases;
        this.vendors = window.vendors;
        if (this.taxes)
            this.inventoryForm.tax_id = this.taxes[2];
        this.addInventoryRow();
    },
    methods: {
        fetchAllPurchases() {
            this.all_purchases =  window.all_purchases
        },
        fetchHighestQuantity() {
            this.highest_quantity = window.highest_quantity;
        },
        fetchHighestPurchases() {
            this.highest_purchase = window.highest_purchase
        },
        getPurchaseSalesPriceInventoryItem(_purchase) {
            let inventoryItemSum = 0;
            _purchase['inventory_item'].map(purchase => {
                inventoryItemSum += Number(purchase.purchase_price)
            });
            return inventoryItemSum;
        },
        getPurchaseQuantityInventoryItem(_purchase) {
            let inventoryQuantitySum = 0;
            _purchase['inventory_item'].map(purchase => {
                inventoryQuantitySum += Number(purchase.quantity)
            });
            return inventoryQuantitySum;
        },

        createInventory() {
            this.InventoryFormSubmitted = true;
            this.totalCostPrice = this.inventoryForm.total_price;
            this.inventoryForm.banks = this.selectedAccounts;
            this.inventoryForm.inventoryItem = this.inventoryTableRow;
            this.inventoryForm.total_cost_price = this.calculateTotalCost();
            this.inventoryForm.total_quantity = this.calculateTotalQuantity();
            this.inventoryForm.total_sales_price = this.calculateTotalSalesPrice();
            this.inventoryForm.tax_amount = this.inventoryTax;
            this.$validator.validate().then(valid => {
                if(valid) {
                    axios.post('/client/inventory/add', this.inventoryForm).then(res => {
                        swal({
                            type: 'success',
                            title: 'Success',
                            text: res.data.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }).catch(err => {
                        // swal("Oops", "An error occurred when creating this account", "error");
                    });
                }else {
                    this.errors.items.forEach(error => {
                        toast(error.msg, 'error')
                    })
                }
            });
        },
        getTotalCostPrice() {
            return document.querySelector("totalCostPrice").value;
        },
        highestPurchase() {
            if (this.top_purchase === highest_quantity) {
                this.top_purchase = highest_purchase;
            } else {
                this.top_purchase = highest_quantity;
            }
        },
        deleteInventory(inventory) {
            console.log(inventory)
            swal({
                title: 'Are you sure',
                text: 'Are you sure you want to delete',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, Am sure',
            }).then((result) => {
                if(result.value){
                    axios.post(`/client/inventory/${inventory['id']}/delete`).then(response => {
                       toast(`Invoice number  ${inventory['invoice_number']}  has been reversed`)
                            let index = this.all_purchases.indexOf(inventory);
                            this.all_purchases.splice(index, 1);
                            this.highest_purchase = window.highest_purchase;
                            this.highest_quantity = window.highest_quantity;
                    });
                }
            });
        },
        addInventoryRow() {
            this.inventoryTableRow.push({
                name: '',
                description: '',
                quantity: '',
                cost_price: '',
                sales_price: '',
            });
        },
        deleteInventoryRow(row) {
            this.inventoryTableRow.splice(this.inventoryTableRow.findIndex(item => item === row ), 1);
            // reevaluate total after deletion
            this.calculateTotalCost();
        },
        calculateTotalCost() {
            let total = 0;
            let cost_price = document.querySelectorAll(".cost_price");
            cost_price.forEach(input => {
                total += Number(input.value);
            });
            return this.totalCostPrice = total;
        },
        calculateTotalSalesPrice() {
            let total = 0;
            let sales_price = document.querySelectorAll(".sales_price");
            sales_price.forEach(input => {
                total += Number(input.value);
            });
            return total;
        },
        calculateTotalQuantity() {
            let total = 0;
            let total_quantity = document.querySelectorAll(".quantity");
            total_quantity.forEach(input => {
              total += Number(input.value);
          });
            return total;
        },
        getSelectedInventory(inventory) {
            this.selectedInventory = inventory;
        },
    }
};
