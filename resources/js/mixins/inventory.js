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
        this.addInventoryRow();
    },
    methods: {
        createInventory(evt) {
            evt.preventDefault();
            axios.post('/client/inventory/add', this.inventoryForm).then(res => {
                swal('Success', res.data.message, "success");
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
        deleteInventoryButton(index) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((index) => {
                if (index) {
                    axios.post(`/client/inventory/${index}/delete`).then(res => {
                        swal('Success', res.data.message, 'success');
                        this.purchase.splice(index, 1);
                    });
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
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
        }
    }
};
