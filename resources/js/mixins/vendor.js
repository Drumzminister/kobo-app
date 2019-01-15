export const vendorApp = {
    data:{
        tableRows:[],
        vendors: [],
        search: '',
        vendorCount: ''
    },
    created() {
            axios.get('/client/vendor/all-vendors').then(res => {
                this.vendors = res.data;
                this.vendorCount = res.data.length;
            });
        this.addNewRow();
    },
    methods: {
        saveVendor() {
            let data = {
                items: this.tableRows,
            };
                axios.post('/client/vendor/add', data).then(res => {
                swal('Success', res.data.message, 'success');
                    console.log(data.items);
                }).catch(error => {
                swal('Error', error.data.error, 'error');
            });
        },

        searchVendor() {
             axios.get(`/client/vendor/search?param=${this.search}`).then(res => {
                let result = this.vendors = res.data;
             });
        },
        addNewRow() {
            this.tableRows.push(
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
