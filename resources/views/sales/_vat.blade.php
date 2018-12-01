
<section id="info">
<div class="container mt-3">
    <form action="">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text customer-input" id="basic-addon3">Customer Name</span>
                    </div> 

                    <select class="customer" name="customer" class="form-control" onClick="this.form.submit">
                            <option selected="Pick customer Name" style="width:200">
                             Select Name
                            </option>
                    </select>
                </div>
            </div>

                    
                
            <div class="col-md-3">
                <div class="form-group">
                        <select class="form-control form-control-lg form-control vat-input" name="tax" id="basic-addon3">
                        <option value="5">Value Added Tax (VAT) 5%</option>
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
    </form>
</div>
</section>
<!-- This Calls ajax and displays all customers -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
// $(function() {
//     var date = new Date();
//     var currentMonth = date.getMonth();
//     var currentDate = date.getDate();
//     var currentYear = date.getFullYear();
//     $('#datepicker').datepicker({
//     maxDate: new Date(currentYear, currentMonth, currentDate),

//     });
// });
</script>