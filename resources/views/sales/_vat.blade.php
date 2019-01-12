
<section id="info">
    <div class="container mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text customer-input" id="basic-addon3">Customer Name</span>
                        </div>
                        <select v-model="sale_customer_id" class="customer form-control">
                            <option value="">Select Customer ...</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">
                                {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select v-model="saleTax" class="form-control form-control-lg form-control tax vat-input" name="tax" id="basic-addon3">
                            @foreach($vats as $vat)
                                <option value="{{ $vat->id }}" >{{ $vat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="dates input-group mb-3 input-group-lg">
                        <input v-model="saleDate" type="date"  class="form-control sales_date" name="event_date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar icon" name="event_date" ></i></span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
