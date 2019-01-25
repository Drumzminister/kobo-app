<template>
    <div class="modal fade" id="invoiceSender" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="container p-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="h5 uppercase" id="">Send</h5>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">To</label>
                            <div class="col-sm-9">
                                <input :disabled="true" type="email" v-model="customer.email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Subject</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" v-model="subject" placeholder="">
                            </div>
                        </div>
                        <div class="form-group shadow-textarea">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Compose Message"></textarea>
                        </div>
                        <div class="justify-content-around text-center pt-2">
                            <a style="cursor:pointer;" @click="sendInvoiceToCustomer()">  <i class="fa fa-paper-plane" style="font-size:48px; color:#00C259;"></i></a>
                            <h5 class="h5 text-green">Save &amp; Send</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                subject: "Invoice for Sale"
            }
        },
        computed: {
            customer () {
                return this.$parent.customer || { email: "" }
            }
        },
        methods: {
            sendInvoiceToCustomer () {
                if (this.customer.email !== "") {

                }

                this.$modal.close('#invoiceSender');
            }
        }
    }
</script>
