<template>
    <div class="modal fade" id="newCustomerModal" style="z-index: 2147483647;" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="container p-3 text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="h5 uppercase" id="">Create New Customer</h5>

                    <div class="modal-body">
                        <div class="form-group row">
                            <!--<label for="" class="col-sm-3 col-form-label"></label>-->
                            <div class="col-sm-12">
                                <input type="text" v-model="customer.last_name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!--<label for="" class="col-sm-3 col-form-label">Subject</label>-->
                            <div class="col-sm-12">
                                <input type="text" class="form-control" v-model="customer.first_name" placeholder="First Name">
                            </div>
                        </div><div class="form-group row">
                            <!--<label for="" class="col-sm-3 col-form-label">Subject</label>-->
                            <div class="col-sm-12">
                                <input type="text" class="form-control" v-model="customer.phone" placeholder="Phone Number">
                            </div>
                        </div><div class="form-group row">
                            <!--<label for="" class="col-sm-3 col-form-label">Subject</label>-->
                            <div class="col-sm-12">
                                <input type="email" class="form-control" v-model="customer.email" placeholder="Email">
                            </div>
                        </div><div class="form-group row">
                            <!--<label for="" class="col-sm-3 col-form-label">Subject</label>-->
                            <div class="col-sm-12">
                                <input type="text" class="form-control" v-model="customer.address" placeholder="Address">
                            </div>
                        </div><div class="form-group row">
                            <!--<label for="" class="col-sm-3 col-form-label">Subject</label>-->
                            <div class="col-sm-12">
                                <input type="text" class="form-control" v-model="customer.website" placeholder="Website">
                            </div>
                        </div>
                        <!--<div class="form-group shadow-textarea">-->
                            <!--<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Compose Message"></textarea>-->
                        <!--</div>-->
                        <div class="justify-content-around text-center pt-2">
                            <a style="cursor:pointer;" @click="createCustomer()">  <i class="fa fa-plus" style="font-size:48px; color:#00C259;"></i></a>
                            <h5 class="h5 text-green">Create &amp; Select Customer</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from "vuex";
    export default {
        data () {
            return {
                subject: "Invoice for Sale",
                customer: {
                    first_name: "",
                    last_name: "",
                    email: "",
                    website: "",
                    address: "",
                }
            }
        },
        computed: {
            // customer () {
            //     return this.$parent.customer || { email: "" }
            // }
        },
        methods: {
            ...mapGetters(["storedCustomers"]),
            sendInvoiceToCustomer () {
                if (this.customer.email !== "") {

                }

                this.$modal.close('#invoiceSender');
            },
            createCustomer() {
                // evt.preventDefault();
                axios.post('/client/customer/add', this.customer).then( res => {
                    this.$modal.close('#newCustomerModal');
                    // this.$parent.customer = res.data.data;
                    this.$store.commit('customer', res.data.data);
                    this.$store.getters.storedCustomers.push(res.data.data);
                    swal('Success', res.data.message, 'success');
                    this.customer = {};
                }).catch(err => {
                    swal('Error', 'There was an error adding staff', 'error');
                });
            },
        }
    }
</script>
