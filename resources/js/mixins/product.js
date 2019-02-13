import {toast} from "../helpers/alert";
import Select2 from "v-select2-component";
export const productApp = {
    data: {
        productForm: {
            name: '',
            attachment: '',
            tag: '',
            description: '',
            low_quantity: '',
        },
        ProductSelectSettings: {
            multiple: true,
            tags: true,
            placeholder: 'Select varieties',
            tokenSeparators: [',', '']
        }
    },
    components: {
        Select2: Select2
    },
    methods: {
        productImageUpload(event) {
            let file = event.target.files[0];
            let formData = new FormData;
            formData.append('file', file);
            axios.post('/client/product/add-product-image', formData).then(res => {
                this.productForm.attachment = res.data.data;
                toast('Product image successfully uploaded', 'success')
            }).catch(error => {
                toast('error', 'Error saving image, try again mbok')
            });
        },
        createProduct() {
            this.productForm.attachment = this.productForm.attachment;
            this.$validator.validate().then(valid => {
                if (valid) {
                        axios.post('/client/product/add-product', this.productForm).then(res => {
                            this.productForm = '',
                                toast('Product successfully uploaded', 'success');
                        })
                }
            });
        }
    }

};
