<!-- Modal -->
<div class="modal fade" id="make-transfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content py-3 px-4">

      <div class="modal-body">
          <h3 class="h3">Make a Transfer</h3>
          <form>
            <div class="form-group">
              <label for="paying-bank">Paying Bank</label>
              <input type="text" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
              <label for="amount">Amount</label>
              <input type="number" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
              <label for="receiving-bank">Receiving Bank</label>
              <input type="text" class="form-control" id="" placeholder="">
            </div>
            
            <div class="form-row">
                <div class="col-md-4 col-4">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" placeholder="">
                </div>
                <div class="col-md-8 col-8">
                   <label for="Comment">Comment</label>
                    <textarea class="form-control" id="" rows="3"></textarea>
                </div>
            </div>

          </form>

      </div>
      <div class="modal-foot text-center">
        <button type="button" class="btn btn-save" data-dismiss="modal">Send</button>
  
      </div>
    </div>
  </div>
</div>