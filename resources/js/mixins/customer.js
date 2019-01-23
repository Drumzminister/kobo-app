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
        searchNotFound: false,
    },

    created() {
        axios.get('/client/customer/all-customers')
            .then(res => {
                this.customers = res.data.all_customers.data;
            });
    },
    methods:{
        createCustomer(evt) {
            evt.preventDefault();
            axios.post('/client/customer/add', this.customerForm).then( res => {
                swal('Success', res.data.message, 'success');
                this.customerForm = '';
            }).catch(err => {
                swal('Error', 'There was an error adding staff', 'error');
            });
        },
        searchCustomer() {
           axios.get(`/client/customer/search?param=${this.customerSearch}`).then(res => {
                   this.customers = '';
                   let result = this.customers = res.data;
           });
        },
    },
}
