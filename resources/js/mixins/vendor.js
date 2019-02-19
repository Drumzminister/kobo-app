import {toast} from "../helpers/alert";
export const vendorApp = {
    data: {
        vendorTableRows: [],
        vendors: window.vendors,
        search: '',
        vendorFormErrors: [],
        fileUrls: '',
        isLoading: false,
    },
    created() {
        this.vendors = this.user_vendors;
        this.addNewRow();
    },

    methods: {
        uploadImage(event, index) {
            this.vendorTableRows[index].vendorImageIsLoading = true;
            this.vendorTableRows[index].vendorImageNotLoading = false;
            toast('Image uploading', 'info')
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append('file', file);
            axios.post('/client/vendor/uploadVendorImage', formData).then(res => {
                toast('Image has been successfully uploaded', 'success');
                this.vendorTableRows[index].vendorImageIsLoading = false;
                this.vendorTableRows[index].vendorImageIsLoaded = true;
                this.vendorTableRows[index].image = res.data.data;
           }).catch(error => {
                this.vendorTableRows[index].vendorImageIsLoading = false;
                this.vendorTableRows[index].vendorImageNotUpLoaded = false
                toast('Error uploading image, try again', 'error')
                this.vendorTableRows[index].vendorImageNotUpLoaded = true
            });
        },
        resetVendorImage(index) {
            document.querySelector("#image-"+index).value = ""
            this.vendorTableRows[index].vendorImageNotUpLoaded = false
            this.vendorTableRows[index].vendorImageIsLoaded = false;
        },
        saveVendor() {
            for (let key in this.vendorTableRows) {
                if(this.vendorTableRows[key].vendorImageIsLoading)
                    return toast('image still uploading', 'info')
            }
            this.isLoading = true;
            let data = {
                items: this.vendorTableRows,
            };
            axios.post('/client/vendor/add', data).then(res => {
                this.vendorTableRows = [],
                    this.addNewRow();
                toast(res.data.message, 'success');
                this.isLoading = false;
                this.vendorFormErrors = "";
            })
                .catch(error => {
                    this.vendorFormErrors = error.response.data.errors;
                    this.isLoading = false;
                });
        },
        searchVendor() {
             axios.get(`/client/vendor/search?param=${this.search}`).then(res => {
                 this.vendors = res.data;
             });
        },
        addNewRow() {
            this.vendorTableRows.push(
                {
                    name: '',
                    address: '',
                    phone: '',
                    email: '',
                    website: '',
                    image: this.fileUrls,
                    vendorImageIsLoading: false,
                    vendorImageIsLoaded: false,
                    vendorImageNotUpLoaded: false
                },
            );
        },
        deleteVendorRow(row) {
            this.vendorTableRows.splice(this.vendorTableRows.findIndex(item => item === row ), 1);
        },
        activateVendor(id) {
            axios.post(`/client/vendor/${id}/activate`).then(res => {
                swal({type: 'success', title: 'Success', text: res.data.message, timer: 3000, showConfirmButton: false});
            });
        }
    }
};
