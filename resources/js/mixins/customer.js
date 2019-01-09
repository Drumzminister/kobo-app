export const customerApp = {
    data:{
        customerForm: {
            first_name: '',
            last_name: '',
            phone: '',
            role: '',
            address: '',
            website: ''
        }
    },
    methods:{
        createCustomer(evt) {
            evt.preventDefault();
            axios.post('client/customer/add', this.customerForm).then( res => {
                console.log(this.customerForm);
                swal('Success', res.data.message, 'success');
                this.customerForm = '';
            }).catch(err => {
                swal('Error', 'There was an error adding staff', 'error');
            });
        }
    }
}
