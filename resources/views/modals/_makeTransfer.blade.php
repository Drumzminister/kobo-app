<div class="modal fade" id="makeTransferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p class="f-18 mb-4">Make a Transfer</p>
        <form @submit="makeTransfer($event)">
          <div class="form-group">
            <label for="payingBank">Paying Bank</label>
            <select name="payer" id="payingBank" v-model="selectedPayingBank" class="form-control custom-select" required>
              <option v-for="payingBank in payingBanks" :value="payingBank">@{{ payingBank.bank_name }}</option>
            </select>
          </div>
          <div class="form-group">
            <label for="amountSend">Amount  (&#8358;)</label>
            <input type="number" v-model="transferAmount" :max="selectedPayingBank.account_balance" min="0" step="0.01" class="form-control" id="amountSend" placeholder="" required>
            <small v-if="transferAmountError" class="text-danger">Amount entered is greater than minimum withdrawable amount</small>
          </div>
          <div class="form-group">
            <label for="receivingBank">Receiving Bank</label>
            <select name="receiver" v-model="selectedReceivingBank" class="form-control custom-select" id="receivingBank" required>
              <option v-for="receivingBank in receivingBanks" :value="receivingBank">@{{ receivingBank.bank_name }}</option>
            </select>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="dateSent">Date</label>
                <input type="date" class="form-control" name="date" id="dateSent" placeholder="" required>
              </div>
              <div class="col">
                <label for="transactionComments">Comments </label>
                <textarea class="form-control" v-model="comment" id="transactionComments" name="comment" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-green px-5">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
