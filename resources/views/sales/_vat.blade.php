
<section id="info">
<div class="container mt-3">
    <form action="">
        <div class="row">
            <div class="col-md-5">
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text customer-input" id="basic-addon3">Customer Name</span>
                    </div>
                    
                    @if(count($customers) > 0)
                    <select class="customer" name="customer" class="form-control" onClick="this.form.submit">
                        @foreach($customers as $key => $customer)
                            <option value="{{$customer}}">
                                {{ $customer }} 
                            </option>
                        @endforeach
                    </select>
                    @endif
                </form> 
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                        <select class="form-control form-control-lg form-control vat-input" id="basic-addon3">
                        <option>Value Added Tax (VAT) 5%</option>
                      <option>PAT (10%)</option>
                      <option>Cashh</option>
                    </select>
                </div> 
            </div>
            
            <div class="col-md-3">
                    <div class="dates input-group mb-3 input-group-lg">
                        <input type="date"  class="form-control" id="usr1" name="event_date"  autocomplete="off" value="">
                    </div>
            </div>
        </div>
    </form>
</div>
</section>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script> 
$('.customer').select2({
    placeholder: 'Select an item',
    ajax: {
      url: 'getCustomers',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (customer) {
                return {
                    text: customer.first_name,
                    text: customer.last_name,
                    id: customer.id

                }
            })
        };
      },
      cache: true
    }
  });
</script>
<script>
var date = new Date();
var month = date.getMonth()+1;
var date = date.getDate()+"-"+month+"-"+date.getFullYear();
var current = document.getElementById('usr1').value = date;
</script>