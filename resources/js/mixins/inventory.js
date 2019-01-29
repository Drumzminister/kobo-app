
export const inventoryApp = {
    data: {
        inventoryForm: {
            name: '',
            description: '',
            costPrice: '',
            salePrice: '',
            quantity: '',
            vendor_id: '',
            category: '',
            paymentMode: '',
            attachment: ''
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
        highest_purchase: window.highest_purchase,
        highest_quantity: window.highest_quantity,
        purchase: {},
        all_purchases: window.all_purchases,
        vendors: window.vendors,
        inventoryTableRow: [],
        totalCostPrice: [],
    },

    mounted () {
        this.top_purchase = this.highest_quantity;
        this.purchase = this.all_purchases;
        this.vendors = window.vendors;
        this.addInventoryRow();
    },
    methods: {
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
        createInventory(evt) {
            evt.preventDefault();
            axios.post('/client/inventory/add', this.inventoryForm).then(res => {
                swal({type: 'success', title: 'Success', text: res.data.message, timer: 3000, showConfirmButton: false,}).then(() =>{location.reload(true)});
                this.inventoryForm = '';
            }).catch(err => {
                swal("Oops", "An error occurred when creating this account", "error");
            });
        },
        highestPurchase() {
            if (this.top_purchase === highest_quantity) {
                this.top_purchase = highest_purchase;
            } else {
                this.top_purchase = highest_quantity;
            }
        },
        trimIdToInvoice(value) {
            return value.slice(0, 5);
        },
        deleteInventory(inventoryId) {
                axios.post(`/client/inventory/${inventoryId}/delete`).then(res => {
                    console.log(res.data.message);
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: res.data.message,
                        timer: 3000,
                        showConfirmButton: false,
                    }).then(() =>{
                        location.reload(true);
                    });
                }).catch(error => {

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
            $("#row-" + row).remove();
            // reevaluate total after deletion
            this.calculateTotalInventoryCost();
        },
        calculateTotalInventoryCost() {
            let total = 0;
            let cost_price = document.querySelectorAll(".cost_price");
            cost_price.forEach(input => {
                total += Number(input.value);
            });
            return this.totalCostPrice = total;
        },
    }
};
