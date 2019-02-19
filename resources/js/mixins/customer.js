import {toast} from "../helpers/alert";
import {appModal} from "./appModals";
export const customerApp = {
    data:{
        customerForm: {
            first_name: '',
            last_name: '',
            phone: '',
            address: '',
            email: '',
            website: '',
            image: '',
        },
        customers: window.customers,
        customerSearch: '',
        customerFormSubmitted: false,
        editingCustomer: {},
        imageUploaded: false,
        imageIsLoading: false,
    },
    methods: {
        createCustomer() {
            if(this.imageIsLoading) {
                return toast('Please wait your image is still loading', 'info')
            }
            this.$validator.validate().then(valid => {
                if (valid) {
                    axios.post('/client/customer/add', this.customerForm).then(res => {
                        swal({type: 'success', title: 'Success', text: res.data.message, timer: 3000, showConfirmButton: false}).then(() => {
                            location.reload(true);
                        })
                    }).catch(error => {
                        let errors = error.response.data['errors'];
                        for (let err in errors){
                            errors[err].forEach(message => {
                                toast(message, 'error')
                            })
                        }
                    });
                }
            })
        },
        updateCustomer() {
            axios.post(`/client/customer/update/${this.editingCustomer.id}`, this.editingCustomer).then(res => {
                toast('Customer updated successfully', 'success');
                this.closeModal('#editCustomerModal')
                location.reload(true)
            })
        },
        editCustomer(evt, customer) {
            this.editingCustomer = {...customer};
            this.openModel('#editCustomerModal');
        },
        closeCustomerModal(id){
          this.closeModal(id);
        },
        openModel(id) {
           $(id).modal('toggle');
        },
        closeModal(id) {
            $(id).modal('hide');
        },
        searchCustomer() {
           axios.get(`/client/customer/search?param=${this.customerSearch}`).then(res => {
                   this.customers = '';
                   let result = this.customers = res.data;
           });
        },
        getAndProcessCustomerImage (event) {
            let file = event.target.files[0];
            let acceptedExtensions = /\.(jpe?g|png|gif)$/;
            if (! acceptedExtensions.exec(file.name)){
                return toast('Select a valid image', 'error')
            }
            if (file.size > 40000000){
                return toast('Image size is above 5MB', 'error')
            }
            this.imageIsLoading = true
            toast('Your image is uploading', 'info')
            let formData = new FormData();
            formData.append('file', file);
            axios.post('/client/customer/uploadImage', formData).then(res => {
                toast('Image uploaded', 'success')
                this.imageIsLoading = false;
                this.imageUploaded = true;
                let data = res.data.data;
                let result = `https://s3.us-east-2.amazonaws.com/koboapp/${data}`;
                this.customerForm.image = result;
            }).catch(error => {
                toast('Error uploading image', 'error')
            });
        },
        imageReset() {
            this.imageLoading = false,
            document.getElementById("staffPhoto").value = "";
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
