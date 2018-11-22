
<section id="info">
    <div class="container mt-3">
        <form action="">
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text customer-input" id="basic-addon3">Customer Name</span>
                        </div>
                        <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="">                        
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
                            <input type="text"  class="form-control" id="usr1" name="event_date"  autocomplete="off" value="">
                        </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="js/moment.js"></script>
<script>
var date = new Date();
var month = date.getMonth()+1;
var date = date.getDate()+"-"+month+"-"+date.getFullYear();
var current = document.getElementById('usr1').value = date;
</script>