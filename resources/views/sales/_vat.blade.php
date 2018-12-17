
<section id="info">
<div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text customer customer-input" id="basic-addon3">Customer Name</span>
                    </div> 

                    <select class="customer_id form-control">

                        <option selected="Pick customer Name">
                            Ekpono Ambrose
                        </option>
                        <option>Joseph</option>
                            
                    </select>
                </div>
            </div>

                    
                
            <div class="col-md-3">
                <div class="form-group">
                        <select class="form-control form-control-lg form-control tax_id vat-input" name="tax" id="basic-addon3">
                        <option value="VAT" >Value Added Tax (VAT) 5%</option>
                        <option value="PAT">PAT (10%)</option>
                        <option value="Cash ">Cashh</option>
                    </select>
                </div> 
            </div>
            
            <div class="col-md-3">
                    <div class="dates sales_date input-group mb-3 input-group-lg">
                        <input type="date" id="datepicker" class="form-control date sales_date" value="{{Date('m/d/Y')}}" name="event_date">
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