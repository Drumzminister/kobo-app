<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select Payment Mode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <payment-method-selection class="col-12" :banks="banks"></payment-method-selection>
        </div>
        <div class="modal-footer">
            <button class="btn btn-sm btn-payment" disabled v-if="isRequesting">Paying... <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
            <button class="btn btn-sm btn-payment" @click="payRent" v-if="selectedAccounts.length > 0 && !isRequesting">Pay</button>
            <button class="btn btn-sm px-3 btn-info" style="cursor: not-allowed;" v-if="selectedAccounts.length < 1" disabled>Pay</button>
        </div>
    </div>
</template>

<script>
    import {toast} from "../../helpers/alert";

    export default {
        name: "RentPayment",
        data () {
            return {
                isRequesting: false,
            }
        },
        props: ['rent', 'banks'],
        computed: {
            spreadAmount () {
                if (this.rent.amount)
                    return this.rent.amount - this.rent.amount_paid;
                return 0;
            },
            selectedAccounts () {
                return this.$store.getters.selectedAccounts;
            },
        },
        methods: {
            payRent () {
                let sum = 0;
                this.selectedAccounts.forEach((account) => {
                    if ( !isNaN(Number(account.amount)) ) {
                        sum += Number(account.amount);
                    }
                });
                if (Number(this.spreadAmount) === 0) {
                    toast('payment has already ben made for this period', 'warning');
                    return;
                }
                if (sum > Number(this.spreadAmount)) {
                    swal("Error", `Total amount payable should be not be more than ${this.spreadAmount}`, "error");
                    return;
                }
                let formData = new FormData();
                formData.append('amount', sum.toString());
                formData.append('paymentMethods', JSON.stringify(this.selectedAccounts));
                this.isRequesting = true;
                axios.post(`/client/rent/${this.rent.id}/pay`, formData).then(response => {
                    this.isRequesting = false;
                    this.$parent.closeModal('#paymentModal');
                    toast(`${response.data.message}`, 'success');
                }).catch(err => {
                    this.isRequesting = false;
                    this.$parent.closeModal('#paymentModal');
                    toast(`${err.response.data.message}`, 'error');
                });
            }
        }
    }
</script>

<style scoped>

</style>
