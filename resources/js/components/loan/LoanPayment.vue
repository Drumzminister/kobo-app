<template>
    <div>
        <payment-method-selection  :banks="banks"></payment-method-selection>
        <div class="d-flex justify-content-end col-12 mt-3">
            <button class="btn btn-sm btn-payment" v-if="isRequestingLoan">Paying...<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
            <button class="btn btn-sm btn-payment" @click="payLoan" v-if="selectedAccounts.length > 0 && !isRequestingLoan">Pay</button>
            <button class="btn btn-sm px-3 btn-info" style="cursor: not-allowed;" v-if="selectedAccounts.length < 1" disabled>Pay</button>
        </div>
    </div>
</template>

<script>
    import {toast} from "../../helpers/alert";

    export default {
        name: "LoanPayment",
        data () {
            return {
                isRequestingLoan: false,
            }
        },
        props: ['loan', 'banks', 'payments'],

        computed: {
            spreadAmount () {
                if (this.loan.amount) {
                    //suggest loan payment
                    return this.getSuggestedPaymentAmount()
                }
                return 0;
            },
            selectedAccounts () {
                return this.$store.getters.selectedAccounts;
            },
        },
        methods: {
            getSuggestedPaymentAmount () {
                let total = ( this.loan.amount * (1 + this.loan.interest/100) ) - this.loan.amount_paid;
                let today = window.moment([]);
                let endDate = window.moment([]).add(this.loan.term, this.loan.period);
                let remainingDuration = endDate.diff(today, this.loan.period);
                return total/remainingDuration;
            },
            payLoan (evt) {
                evt.preventDefault();
                let sum = 0;
                this.selectedAccounts.forEach((account) => {
                    if ( !isNaN(Number(account.amount)) ) {
                        sum += Number(account.amount);
                    }
                });

                if (sum > (Number(this.loan.amount - this.loan.amount_paid) + Number(this.loan.interest * this.loan.amount / 100)) ) {
                    swal("Error", `Total amount payable should be less than ${(this.loan.amount - this.loan.amount_paid) + (this.loan.interest * this.loan.amount / 100)}`, "error");
                    return;
                }
                let formData = new FormData();
                formData.append('amount', sum.toString());
                formData.append('paymentMethods', JSON.stringify(this.selectedAccounts));
                this.isRequestingLoan = true;
                axios.post(`/client/loan/${this.loan.id}/pay`, formData).then(response => {
                    this.isRequestingLoan = false;
                    this.loan.amount_paid = Number(this.loan.amount_paid) + Number(sum);
                    this.payments.push(response.data.payment);
                    // this.spreadAmount = this.getSuggestedPaymentAmount();
                    toast(`Payment made successfully`, 'success');
                    this.$parent.showSelectPaymentMode = !this.$parent.showSelectPaymentMode
                }).catch(err => {
                    this.isRequestingLoan = false;
                    toast(`${err.response.data.message}`, 'error');
                });
            }
        }
    }
</script>

<style scoped>

</style>
