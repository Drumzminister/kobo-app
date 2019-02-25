<div class="modal fade" id="receivePay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center" id="">D091</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="col-md-4">
                    <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
              </div>
              <div class="col-md-8">
                      <h6 class="text-green h6">Mary Ikpe</h6>
                      <h6 class="text-muted h6">Invoice NO: KB-13245</h6>
                      <p class="text-muted small">
                        25th June,2019 <br>
                        Invoice raised by Vivian
                      </p>

              </div>
            </div>
          </div>
          <div class="col">
            <input type="date" placeholder="8th August 2019">
          </div>
        </div>

        <div class="px-5 py-3">
          <table class="table">
              <tbody class="text-muted font-weight-bold">
                <tr>
                  <td>Invoice Amount</td>
                  <td>100,000.00</td>
                </tr>
                <tr>
                  <td>Payment</td>
                  <td>90,000.00</td>
                </tr>

                <tr class="text-orange">
                  <td>Balance</td>
                  <td>10,000.00</td>
                </tr>
              </tbody>
          </table>
        </div>  

        {{-- payment-component should be here --}}
        <form action="" method="get">
          <div class="form-row px-5">
              <div class="col">
                <label for="amount" class="text-muted" >Enter Amount</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text vat-input" id="basic-addon1">N</span>
                  </div>
                  <input type="text" class="form-control" placeholder="1,0000.00" aria-label="amount" aria-describedby="basic-addon1">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="Bank" class="text-muted">Select Receiving Bank</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option selected>GTB 1</option>
                    <option>GTB 2</option>
                    <option>Access bank</option>
                  </select>
                </div>
              </div>
          </div>

          <div class="justify-content-around text-center pt-2">
                      <a href="">  <i class="fa fa-telegram" aria-hidden="true" style="font-size:48px; color:#00C259;"></i></a>
              <h5 class="h5 text-green">Receive &amp; Send</h5>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>