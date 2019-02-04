<template>
    <div class="modal fade" id="addBankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container p-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <br/>
                    <div class="modal-body">
                        <p class="f-18 mb-4">Add Bank Details</p>
                        <form>
                            <div class="form-group">
                                <label for="bankName">Bank Name</label>
                                <select name="bank_name" class="form-control"  id="bankName">
                                    <option value="Bank">Bank</option>
                                    <option value="">Bank Name</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="accountName">Account Name</label>
                                <input type="text" name="account_name" class="form-control" id="accountName" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="accountNumber">Account Number</label>
                                <input type="number"  name="account_number" class="form-control" id="accountNumber" placeholder="">
                                <small class="text-danger">Account number should contain 10 characters.</small>
                            </div>
                            <div class="form-group">
                                <label for="balance">Balance (&#8358;)</label>
                                <input type="number" :min="1" step="0.01" name="account_balance" class="form-control" id="balance" placeholder="">
                                <!--<small class="text-danger" v-if="showBalError">Account balance should be greater than &#8358;0 .</small>-->
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" @click="saveBankDetail" class="btn btn-green px-5">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        mounted () {
        },
        methods: {
            saveBankDetails () {

            }
        }
    }
</script>
