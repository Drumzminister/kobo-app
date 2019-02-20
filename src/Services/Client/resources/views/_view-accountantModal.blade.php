<div class="col-md-4 col-6">
    <div class="loa bg-orange text-white p-2">
        <h4 class="h4" data-toggle="modal" data-target="#reviewAccountant">Review Accountant</h4>
    </div>
</div>

{{-- view accountant modal --}}

<div class="modal fade" id="reviewAccountant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-5">
      <div class="modal-header " style="border-bottom: none;">
        <h5 class="modal-title text-muted" id="reviewAccountantTitle">Review and Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="subject" class="text-muted">Subject</label>
                <input type="text" class="form-control" id="" placeholder="">
            </div>

            <div class="form-group">
                <label for="comment" class="text-muted">Comment</label>
                <textarea class="form-control" id="" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="subject" class="text-muted">Other note</label>
                <input type="text" class="form-control" id="" placeholder="">
            </div>

            <div class="text-center">
                <h5 class="text-muted">Rate Accountant</h5>
            </div>
        </form>
      </div>
      <div class="modal-foot text-center mt-2">
        <button type="button" class="btn view-more" data-dismiss="modal">Send</button>
      </div>
    </div>
  </div>
</div>
