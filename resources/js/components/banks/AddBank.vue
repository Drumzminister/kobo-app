<template>
    <div class="modal fade" id="addBankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container p-3">
                    <button type="button" class="close" @click="closeAddBankModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <br/>
                    <div class="modal-body">
                        <p class="f-18 mb-4">Add Bank Details</p>
                        <form @submit.prevent="saveBankDetails()">
                            <div class="form-group">
                                <label for="bankName">Bank Name</label>
                                <select v-model="newBank.bank_name" name="bank_name" class="form-control"  id="bankName">
                                    <option value="">Select Bank ...</option>
                                    <option v-for="bank in banks" :value="bank.name">{{ bank.name }}</option>
                                </select>
                                <small class="text-danger" v-if="newBank.bank_name === '' && saving" >You must select a bank name</small>
                            </div>
                            <div class="form-group">
                                <label for="accountName">Account Name</label>
                                <input type="text" v-model="newBank.account_name" name="account_name" class="form-control" id="accountName" placeholder="" required>
                                <small class="text-danger" v-if="newBank.account_name === '' && saving" >You must input an account name</small>
                            </div>
                            <div class="form-group">
                                <label for="accountNumber">Account Number</label>
                                <input type="text" v-model="newBank.account_number" name="account_number" class="form-control" id="accountNumber" placeholder="">
                                <small class="text-danger" v-if="newBank.account_number === '' && saving" >You must input account number</small>
                            </div>
                            <div class="form-group">
                                <label for="balance">Balance (&#8358;)</label>
                                <input type="number" v-model="newBank.account_balance" :min="1" step="0.01" name="account_balance" class="form-control" id="balance" placeholder="">
                                <!--<small class="text-danger" v-if="newBank.account_balance === '' && saving" >You must select a bank name</small>                            </div>-->
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" @click="saveBankDetails()" class="btn btn-green px-5">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import Bank from "../../classes/Bank";
    export default {
        props: ['banks'],
        data () {
            return {
                newBank: new Bank(),
                saving: false
            }
        },
        methods: {
            saveBankDetails () {
                this.saving = true;
                if (this.newBank.isNotValid) {
                    return;
                }
            },
            closeAddBankModal () {
                this.newBank.reset();
                this.$modal.close("#addBankModal")
            }
        }
    }
</script>
