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
            tokenSeparators: [',', ' ']
        }
    },
    components: {
        Select2: Select2
    },
    methods: {
        Checkit() {
          console.log('she')
        },
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
            console.log(this.productForm.tag)
            this.productForm.attachment = this.productForm.attachment['data'];
            axios.post('/client/product/add-product', this.productForm).then(res => {
                this.productForm = '',
                toast('Product image successfully uploaded', 'success');
                console.log(res)
            })
        }
    }

};
