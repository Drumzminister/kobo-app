<template>

    <section id="info">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="">
                            <span class="input-group-text customer-input" id="basic-addon3">INV - #23531331</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text customer-input" id="basic-addon3">Customer</span>
                        </div>
                        <select v-model="customer_id" class="customer form-control">
                            <option value="">Select Customer ...</option>
                            <option v-for="customer in customers" :value="customer.id">
                                {{ customer.first_name + ' ' + customer.last_name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select v-model="tax_id" class="form-control form-control-lg form-control tax vat-input" name="tax" id="basic-addon3">
                            <option value="">Select ...</option>
                            <option v-for="tax in taxes" :value="tax.id" >{{ tax.name }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="dates input-group mb-3 input-group-lg">
                        <input v-model="sale_date" type="date"  class="form-control sales_date" name="event_date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar icon" name="event_date" ></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    import { mapMutations } from 'vuex';
    export default {
        props: ['customers', 'taxes'],
        data() {
            return {
                customer_id: "",
                tax_id: "",
                sale_date: ""
            }
        },
        watch: {
            ...mapMutations({customer_id: 'customerId', tax_id: 'taxId', sale_date: 'saleDate'})
        },
        mounted() {
        }
    }
</script>
