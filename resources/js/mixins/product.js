import {toast} from "../helpers/alert"
export const productApp = {
    data: {
        productForm: {
            name: '',
            attachment: '',
            tag: '',
            description: '',
            low_quantity: '',
        },
    },

    methods: {
        productImageUpload(event) {
            let file = event.target.files[0];
            let formData = new FormData;
            formData.append('file', file);
            axios.post('/client/product/add-product-image', formData).then(res => {
                console.log(res.data.data);
                this.productForm.attachment = res.data.data;
                toast('Product image successfully uploaded', 'success')
            }).catch(error => {
                toast('error', 'Error saving image, try again mbok')
            });
        },
        createProduct() {
            this.productForm.attachment = this.productForm.attachment['data'];
            axios.post('/client/product/add-product', this.productForm).then(res => {
                console.log(res)
            })
        }
    }

};
