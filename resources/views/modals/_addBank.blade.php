<div class="modal fade" id="addBankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p class="f-18 mb-4">Add Bank Details</p>
        <form @submit="addBank($event)">
          <div class="form-group">
              <label for="bankName">Bank Name</label>
              <select name="bank_name" class="form-control"  id="bankName">
                <option value="Bank">Bank</option>
                  {{--@foreach($banks as $bank)--}}
                      {{--<option value="{{$bank->name}}">{{$bank->name}}</option>--}}
                  {{--@endforeach--}}
              </select>
          </div>
          <div class="form-group">
            <label for="accountName">Account Name</label>
            <input type="text" name="account_name" class="form-control" id="accountName" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="accountNumber">Account Number</label>
            <input type="number" v-model="accNum"  name="account_number" class="form-control" id="accountNumber" placeholder="">
              <small class="text-danger" v-if="showAccNumError">Account number should contain 10 characters.</small>
          </div>
          <div class="form-group">
            <label for="balance">Balance (&#8358;)</label>
            <input type="number" step="0.01" v-model="balance" name="account_balance" class="form-control" id="balance" placeholder="">
              <small class="text-danger" v-if="showBalError">Account balance should be greater than &#8358;0 .</small>
          </div>
          <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-green px-5">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

