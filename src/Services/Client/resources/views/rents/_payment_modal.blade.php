<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Payment Mode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <payment-method-selection class="col-12" :banks="{{ $banks }}"></payment-method-selection>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-payment" @click="payRent" v-if="selectedAccounts.length > 0">Pay</button>
                <button class="btn btn-sm px-3 btn-info" style="cursor: not-allowed;" v-if="selectedAccounts.length < 1" disabled>Pay</button>
            </div>
        </div>
    </div>
</div>
