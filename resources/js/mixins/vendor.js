export const vendorApp = {
    data:{
        vendorTableRows:[],
        vendors: [],
        search: '',
        vendorCount: '',
    },
    created() {
            axios.get('/client/vendor/all-vendors').then(res => {
                this.vendors = res.data;
                this.vendorCount = res.data.length;
            });
        this.addNewRow();
    },
    methods: {
        CheckForm() {
            this.errors = [];

        },
        saveVendor() {
            let data = {
                items: this.vendorTableRows,
            };
            axios.post('/client/vendor/add', data)
            .then(res => {
                this.vendorTableRows = [],
                this.addNewRow();
                swal('Vendor added!',res.data.message,'success');
            })
            .catch(error => {
                swal({
                    type: 'error',
                    title: error.response.data.message,
                    timer: 1500
                });
            });
        },

        searchVendor() {
             axios.get(`/client/vendor/search?param=${this.search}`).then(res => {this.vendors = res.data;});
        },
        addNewRow() {
            this.vendorTableRows.push(
                {
                    name: '',
                    address: '',
                    phone: '',
                    email: '',
                    website: '',
                }
            );
        },
        deleteVendorRow(row) {
            $("#row-" + row).remove();
        },

        activateVendor(id) {
            axios.post(`/client/vendor/${id}/activate`).then(res => {
                swal("Success", res.data.message, "success");
                console.log(res.data);
            });
        }
    }
};
