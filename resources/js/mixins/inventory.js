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
        }
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
        // quantity(sortKey) {
        //         this.reverse = (this.sortKey == sortKey) ? ! this.reverse : false;
        //         this.sortKey = sortKey;
        // },
        quantity() {
            console.log('changed');
        },
        amount() {
            console.log('amount clicked');
        }
    }
}
