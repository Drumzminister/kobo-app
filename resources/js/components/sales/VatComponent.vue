<template>

    <section id="info">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-2 pr-0 customer-invoice">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="w-100 h-100 d-flex justify-content-center" >
                            <span class="input-group-text customer-input h-100 text-center w-100 pl-4" id="basic-addon3">INV - #{{ saleInvoice || '###' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-0">
                    <div class="input-group mb-3 input-group-lg customer-select2">
                        <div class="input-group-prepend">
                            <span class="input-group-text customer-input" id="basic-addon3">Customer</span>
                        </div>
                        <Select2 :settings="customerSelectSettings" v-model="customer_id" :options="sS.map((customer) => { return {id: customer.id, text: customer.first_name + ' ' + customer.last_name } })"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select :disabled="updateMode" v-model="tax_id" class="form-control form-control-lg form-control tax vat-input" name="tax">
                            <option value="">Select Tax ...</option>
                            <option v-for="tax in taxes" :value="tax.id" >{{ tax.name }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="dates input-group mb-3 input-group-lg">
                        <input v-model="sale_date" type="date" :disabled="updateMode" class="form-control sales_date" name="event_date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar icon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import { mapMutations, mapGetters } from 'vuex';
    import Select2 from "v-select2-component";
    export default {
        props: ['customers', 'taxes', 'sale'],
        components: { Select2 },
        data() {
            return {
                tax_id: "",
                sale_date: null,
                customer_id: "",
                customerSelectSettings: {
                    placeholder: 'Customers',
                    disabled: this.updateMode,
                    language: {
                        noResults: function () {
                            return `<a href="#" onclick="$('#newCustomerModal').modal({ backdrop: 'static',keyboard: false })"><span class="fa fa-plus"></span> Add Customer</button>`;
                        }
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    }
                }
            }
        },
        computed: {
            ...mapGetters(['saleInvoice']),
            updateMode () {
                return this.sale.type === 'published';
            },
            sS () {
                return this.$store.getters.storedCustomers;
            }
        },
        watch: {
            ...mapMutations({ sale_date: 'saleDate' }),
            customer_id: function(val) {
                this.customer(this.customers.filter((customer) => val === customer.id)[0]);
            },
            tax_id: function(val) {
                this.selectedTax(this.taxes.filter((tax) => val === tax.id)[0]);
                this.taxId(val);
            }
        },
        methods : {
            ...mapMutations(['customer', 'selectedTax', "taxId", "storedCustomers"]),
            createNewCustomer () {
                console.log("New Customer");
            }
        },
        mounted () {
            this.sale_date = this.updateMode ? moment(this.sale.created_at).format('YYYY-MM-DD') : moment().format('YYYY-MM-DD');
            this.customer_id = this.sale.customer ? this.sale.customer.id : "";
            this.tax_id = this.sale.tax ? this.sale.tax.id : "";
        },
        created () {
            this.storedCustomers(this.customers);
        }
    }
</script>
