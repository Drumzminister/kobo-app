
<section id="info">
<div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text customer-input" id="basic-addon3">Customer Name</span>
                    </div> 

                    <select class="customer" class="customer" class="form-control">
                        @if(count($customers) > 0)
                            @foreach($customers as $key => $customer)
                                <option selected="Pick customer Name" value="{{$customer->id}}">
                                    {{$customer->fullname}}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

                    
                
            <div class="col-md-3">
                <div class="form-group">
                        <select class="form-control form-control-lg form-control vat-input" name="tax" id="basic-addon3">
                        <option value="5" >Value Added Tax (VAT) 5%</option>
                        <option value="10">PAT (10%)</option>
                        <option value="">Cashh</option>
                    </select>
                </div> 
            </div>
            
            <div class="col-md-3">
                    <div class="dates input-group mb-3 input-group-lg">
                        <input type="text"  class="form-control" id="datepicker" value="{{Date('m/d/Y')}}" name="event_date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar icon" id="datepicker" name="event_date" ></i></span>
                        </div> 
                    </div>
                </div>       
        </div>
</div>
</section>
<!-- This Calls ajax and displays all customers -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.customer').select2();
});
</script>