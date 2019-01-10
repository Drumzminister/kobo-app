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
        search: '',
    },

    created() {
        axios.get('/client/customer/allCustomers')
            .then(res => {
                this.customers = res.data.all_customers.data;
                console.log(this.customers);
            });
    },
    methods:{
        createCustomer(evt) {
            evt.preventDefault();
            axios.post('/client/customer/add', this.customerForm).then( res => {
                console.log(this.customerForm);
                swal('Success', res.data.message, 'success');
                this.customerForm = '';
            }).catch(err => {
                swal('Error', 'There was an error adding staff', 'error');
            });
        },
        searchCustomer() {
           axios.get(`client/customer/${this.search}`).then(res => {
               this.customers = res.data.message;
           });
        }
    },
}
