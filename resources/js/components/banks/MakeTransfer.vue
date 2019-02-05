<template>
    <div class="modal fade" id="makeTransferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container p-3">
                    <button type="button" class="close" @click="closeMakeTransferModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br>
                    <div class="modal-body">
                    <p class="f-18 mb-4">Make a Transfer</p>
                    <form>
                        <div class="form-group">
                            <label for="payingBank">Paying Bank</label>
                            <select v-model="payingBankId" name="payer" id="payingBank" class="form-control custom-select" required>
                                <option value="">Paying Bank ...</option>
                                <option v-for="bank in storedBankDetails" :value="bank.id">{{ bank.account_name }}</option>
                            </select>
                            <small class="text-danger" v-if="payingBankId === '' && transferring" >You must select a paying bank!</small>
                        </div>
                        <div class="form-group">
                            <label for="amountSend">Amount  (&#8358;)</label>
                            <input type="number" v-model="amount" min="0" step="0.01" class="form-control" id="amountSend" placeholder="" required>
                            <small class="text-danger" v-if="(amount <= 0 || amount === null)  && transferring" >Amount is not valid</small>
                            <!--<small v-if="transferAmountError" class="text-danger">Amount entered is greater than minimum  amount</small>-->
                        </div>
                        <div class="form-group">
                            <label for="receivingBank">Receiving Bank</label>
                            <select v-model="receivingBankId" name="payer" id="receivingBank" class="form-control custom-select" required>
                                <option value="">Receiving Bank ...</option>
                                <option v-for="receivingBank in storedBankDetails" :value="receivingBank.id">{{ receivingBank.account_name }}</option>
                            </select>
                            <small class="text-danger" v-if="receivingBankId === '' && transferring" >You must select a receiving bank!</small>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="dateSent">Date</label>
                                    <input v-model="transfer_date" type="date" class="form-control" name="date" id="dateSent" placeholder="" required>
                                    <small class="text-danger" v-if="transfer_date === '' && transferring" >Please Choose a date!</small>
                                </div>
                                <div class="col">
                                    <label for="transactionComments">Comments(Optional) </label>
                                    <textarea v-model="comment" class="form-control" id="transactionComments" name="comment" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="button" class="btn btn-green px-5" @click="startTransfer()">Send</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
        </div>
    </div>

</template>

<script>
    import { mapMutations, mapGetters } from "vuex";
    import { toast, confirmSomethingWithAlert } from "../../helpers/alert";

    export default {
        data () {
            return {
                receivingBankId: "",
                payingBankId: "",
                transfer_date: "",
                comment: "",
                amount: null,
                transferring: false
            }
        },
        computed: {
            ...mapGetters(['storedBankDetails']),
            transferNotValid () {
                return this.payingBankId === "" || this.transfer_date === "" ||
                        this.amount <= 0 || this.amount === 0 || this.receivingBankId === "";
            },
            payingBankDoesNotHaveSufficientFund () {
                return this.storedBankDetails.filter(({ id }) => id === this.payingBankId)[0].account_balance < parseFloat(this.amount);
            },
        },
        methods: {
            closeMakeTransferModal () {
                this.$modal.close("#makeTransferModal");
            },
            startTransfer () {
                this.transferring = true;

                if (this.transferNotValid) {
                    this.showValidationErrors();

                    return null;
                }

                if (this.payingBankDoesNotHaveSufficientFund) {
                    toast('Insufficient balance in the receiving bank', 'error');
                }
                let receivingBank = this.getStoredBank(this.receivingBankId);
                let payingBank = this.getStoredBank(this.payingBankId);

                confirmSomethingWithAlert(`You are about to make transfer from ${payingBank.account_name} balance to ${receivingBank.account_name} balance!`)
                    .then(({ value }) => {
                        if (value) {
                            receivingBank.receive(payingBank.transfer(this.amount));
                        }
                    });

                this.transfering = false;
            },
            showValidationErrors() {
                if (this.receivingBankId === this.payingBankId) {
                    toast('Receiving bank and Paying bank cannot be the same', 'error');

                    return null;
                }
            },
            getStoredBank (bank_id) {
                return this.storedBankDetails.filter(({ id }) => id === bank_id)[0];
            }
        }
    }
</script>