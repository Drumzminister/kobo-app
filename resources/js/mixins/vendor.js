export const vendorApp = {
    data:{
        vendorForm: [{
            name: '',
            address: '',
            phone: '',
            email: '',
            website: '',
            isActive: ''
        }],
        tableRows:[{}],
        vendors: [],
        search: '',
    },
    created() {
            axios.get('/client/vendor/all-vendors').then(res => {
                this.vendors = res.data;
            })
    },
    methods: {
        saveVendor() {
            let name = $('#name').val();
            let address = $('#address').val();
            let phone = $('#phone').val();
            let email = $('#email').val();
            let website = $('#website').val();

            let formData = new FormData;
            formData.append('name', name);
            formData.append('address', address);
            formData.append('phone', phone);
            formData.append('email', email);
            formData.append('website', website);

            axios.post('/client/vendor/add', formData).then(res => {
                console.log(res.data);
                swal('Success', res.data.message, 'success');
            });
        },

        searchVendor() {
             axios.get(`/client/vendor/search?param=${this.search}`).then(res => {
                this.vendors = '';
                let result = this.vendors = res.data;
                console.log(result);
             });
        },
        addNewRow() {
            this.tableRows.push({});
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
