import {toast} from "../helpers/alert";
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
        customers: window.customers,
        customerSearch: '',
        customerFormSubmitted: false,
        searchNotFound: false,
    },
    mounted() {
    },
    methods: {
        createCustomer() {
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
                this.errors.items.forEach(message => {
                    toast(`${message.msg}`, `error`);
                });
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
