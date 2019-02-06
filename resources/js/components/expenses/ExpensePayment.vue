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
            <button class="btn btn-sm btn-payment" @click="handlePayment" v-if="selectedAccounts.length > 0 && !isPayingExpense">Pay</button>
            <button class="btn btn-sm px-3 btn-info" style="cursor: not-allowed;" v-if="selectedAccounts.length < 1" disabled>Pay</button>
            <button class="btn btn-sm btn-payment" disabled v-if="isPayingExpense">Paying... <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ExpensePayment",
        props: ['expense', 'banks', 'row', 'options'],
        data () {
            return {
                isPayingExpense: false,
            }
        },
        computed: {
            spreadAmount () {
                if (this.expense.amount)
                    return this.expense.amount - this.expense.amount_paid;
                return 0;
            },
            selectedAccounts () {
                return this.$store.getters.selectedAccounts;
            },
        },
        methods: {
            handlePayment (evt) {
                if (this.options){
                    if (this.options.payOnly) {
                        this.payExpense();
                    }
                } else {
                    this.payAndSave(evt);
                }
            },
            payAndSave(evt) {
                evt.preventDefault();
                let sum = 0;
                this.selectedAccounts.forEach((account) => {
                    if ( !isNaN(Number(account.amount)) ) {
                        sum += Number(account.amount);
                    }
                });
                let expenseAmount = Number(this.expense.amount);
                let details = this.expense.description;
                let date = document.querySelector("#expense_date").value;
                let payBtn = this.row.querySelector('.payBtn');
                let paidBtn = this.row.querySelector('.paid');
                if (sum > expenseAmount) {
                    swal({
                        timer: 3000,
                        toast: true,
                        type: 'error',
                        position: 'top-end',
                        showConfirmButton: false,
                        text: `Cannot pay more than:${expenseAmount - this.expense.amount_paid}`,
                    });
                    return;
                }
                if ( sum <  expenseAmount) {
                    swal({
                        timer: 3000,
                        toast: true,
                        type: 'warning',
                        position: 'top-end',
                        showConfirmButton: false,
                        text: `You are making an incomplete payment for this expense amount left is:${expenseAmount - sum}`,
                    });
                }
                let formData = new FormData();
                formData.append('date', date);
                formData.append('details', details);
                formData.append('amount', expenseAmount.toString());
                formData.append('amount_paid', sum.toString());
                formData.append('paymentMethods', JSON.stringify(this.selectedAccounts));
                this.isPayingExpense = true;
                axios
                    .post('/client/expenses/add', formData)
                    .then(res => {
                        swal({
                            timer: 2500,
                            toast: true,
                            type: 'success',
                            position: 'top-end',
                            showConfirmButton: false,
                            title: `Payment Made successfully`,
                        });
                        this.isPayingExpense = false;
                        this.row.querySelector('.expenseAmount').readOnly = true;
                        payBtn.style.display = "none";
                        paidBtn.style.display = "block";
                        this.$parent.closeModal('#paymentModal');
                    })
                    .catch(err => {
                        swal({
                            timer: 3000,
                            toast: true,
                            type: 'error',
                            position: 'top-end',
                            showConfirmButton: false,
                            title: `Unable to complete payment: ${err.response.data.message}`,
                        });
                        this.isPayingExpense = false;
                    })
                ;
            },
            payExpense () {
                let sum = 0;
                this.selectedAccounts.forEach((account) => {
                    if ( !isNaN(Number(account.amount)) ) {
                        sum += Number(account.amount);
                    }
                });
                if (sum > this.spreadAmount) {
                    swal({
                        timer: 3000,
                        toast: true,
                        type: 'error',
                        position: 'top-end',
                        showConfirmButton: false,
                        text: `Cannot pay more than:${expenseAmount - this.expense.amount_paid}`,
                    });
                    return;
                }
                if ( sum <  this.spreadAmount) {
                    swal({
                        timer: 3000,
                        toast: true,
                        type: 'warning',
                        position: 'top-end',
                        showConfirmButton: false,
                        text: `You are making an incomplete payment for this expense amount left is:${this.spreadAmount - sum}`,
                    });
                }
                this.isPayingExpense = true;
                let formData = new FormData();
                formData.append('details', this.expense.details);
                formData.append('amount', this.expense.amount.toString());
                formData.append('amount_paid', Number(this.expense.amount_paid) + Number(sum));
                formData.append('paymentMethods', JSON.stringify(this.selectedAccounts));
                axios
                    .post(`/client/expenses/${this.expense.id}/pay`, formData)
                    .then(res => {
                        swal({
                            timer: 3000,
                            toast: true,
                            type: 'success',
                            position: 'top-end',
                            showConfirmButton: false,
                            text: `Payment Made Successfully`,
                        });
                        // this.expense = res.data;
                        this.isPayingExpense = false;
                        this.$parent.closeModal('#paymentModal');
                        location.reload();
                    })
                    .catch(err => {
                        this.isPayingExpense = false;
                        swal({
                            timer: 3000,
                            toast: true,
                            type: 'error',
                            position: 'top-end',
                            showConfirmButton: false,
                            text: `${err.response.data.message}`,
                        });
                    })
                ;
            }
        }
    }
</script>

<style scoped>

</style>
