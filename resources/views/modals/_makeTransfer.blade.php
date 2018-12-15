<div class="modal fade" id="makeTransferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p class="f-18 mb-4">Make a Transfer</p>
        <form>
          <div class="form-group">
            <label for="payingBank">Paying Bank</label>
            <input type="text" class="form-control" id="payingBank" placeholder="">
          </div>
          <div class="form-group">
            <label for="amountSend">Amount  (&#8358;)</label>
            <input type="text" class="form-control" id="amountSend" placeholder="">
          </div>
          <div class="form-group">
            <label for="receivingBank">Receiveing Bank</label>
            <input type="text" class="form-control" id="receivingBank" placeholder="">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="dateSent">Date</label>
                <input type="date" class="form-control" id="dateSent" placeholder="">
              </div>
              <div class="col">
                <label for="transactionComments">Comments </label>
                <textarea class="form-control" id="transactionComments" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group d-flex justify-content-center">
            <button type="button" class="btn btn-green px-5">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
