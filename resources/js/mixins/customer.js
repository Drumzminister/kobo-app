export const customerApp = {
    data:{
        customerForm: {
            first_name: '',
            last_name: '',
            phone: '',
            address: '',
            email: '',
            website: ''
        },
        customers: [],
        customerSearch: '',
        customerFormSubmitted: false,
        searchNotFound: false,
    },

    // created() {
    //     axios.get('/client/customer/all-customers')
    //         .then(res => {
    //             this.customers = res.data.all_customers.data;
    //         });
    // },
    methods: {
        createCustomer(e) {
            e.preventDefault();
            this.customerFormSubmitted = true;
            this.$validator.validate().then(valid => {
                if (valid) {
                    axios.post('/client/customer/add', this.customerForm).then(res => {
                        swal({type: 'success', title: 'Success', text: res.data.message, timer: 3000, showConfirmButton: false}).then(() => {
                            location.reload(true);
                        })
                    }).catch(err => {
                        swal('Error', 'There was an error adding staff', 'error');
                    });
                }
            });
        },
        searchCustomer() {
           axios.get(`/client/customer/search?param=${this.customerSearch}`).then(res => {
                   this.customers = '';
                   let result = this.customers = res.data;
           });
        },
        getAndProcessCustomerImage () {

        },
        deleteCustomer(customerId) {
            axios.post(`/client/customer/delete/${customerId}`).then(res => {
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
                swal('error', error.response.data, 'error')
            })
        }
    },
}
