@extends('client::layouts.app')
<style>
    input[type=text] {
    background: transparent;
    border-radius: 4px;
}
</style>

@section('content')
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2 class="h2"><a href="/client/inventory" class="text-dark"> Purchase Order</a> </h2>
                @include('client::accountant-button')
            </div>
        </div>
</section>
{{-- end of heading section --}}

{{-- inventory section --}}      
<section id="info">
        <div class="container mt-3">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3 input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text customer-input" id="basic-addon3">Vendor Name</span>
                            </div> 
        
                            <select class="customer" v-model="inventoryForm.vendor_id" name="customer" class="form-control" >
                                    <option selected="Pick customer Name" style="width:200" v-for="vendor in vendors" value="vendor.id">
                                        @{{ vendor.name }}
                                    </option>
                            </select>
                        </div>
                    </div>
                        
                    <div class="col-md-3">
                        <div class="form-group">
                                <select v-model="inventoryForm.tax" class="form-control form-control-lg form-control vat-input" name="tax" id="basic-addon3">
                                <option>Tax ...</option>
                                <option v-for="tax in taxes" :value="tax.id">
                                    @{{ tax.name }}
                                </option>
                            </select>
                        </div> 
                    </div>
                    
                    <div class="col-md-3">
                            <div class="dates input-group mb-3 input-group-lg">
                                <input type="date" v-model="inventoryForm.date" class="form-control" id="datepicker" name="event_date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar icon" id="datepicker" name="event_date" ></i></span>
                                </div> 
                            </div>
                        </div>       
                </div>
            </form>
        </div>
        </section>
       


   {{-- payment section --}}
<section>
    <div class="container">
        <div class="bg-white">
            <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab text-center">
                            <th scope="col">Inventory Item</th>
                            <th scope="col">Description</th>
                            <th scope="col">QTY (40)</th>
                            <th scope="col">Cost Price (&#8358;)</th>
                            <th scope="col">Sales Price (&#8358;)</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(content, index) in inventoryTableRow" :id="'row-' + index">
                                <td><input v-model="content.name" type="text" class="form-control "></td>
                                <td><input v-model="content.description" id="" type="text" class="form-control "></td>
                                <td><input v-model="content.quantity" type="number" class="form-control "></td>
                                <td><input v-model="content.cost_price" @keyup="calculateTotalInventoryCost()" id="" type="number" class="form-control cost_price"></td>
                                <td><input v-model="content.sales_price"  id="" type="number" class="form-control "></td>
                                <td style="cursor: pointer"><i class="fa fa-trash-o" @click="deleteInventoryRow(index)" style="font-size:24px"></i></td>
                            </tr>
                        </tbody>
                    </table>
                    <span class="float-right" @click="addInventoryRow()" style="cursor: pointer">Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i>
                    </span>
            </div>

        <div class="row p-2 mt-2 ">
                <div class="col-md-6">
                    <payment-method-selection :banks="banks"></payment-method-selection>
                </div>
            {{-- end of current payment --}}

            {{-- total sum section --}}
                    {{--Payment Section--}}
                    <div class="col-md-6 ">
                        <div class="bg-grey py-3 px-4" id="topp">
                            <div class="row">
                                <div class="col">
                                    <h5 class="h6 mt-2 uppercase text-muted">Total Discount</h5>
                                </div>
                                <div class="col input-group mb-2 input-group-lg">
                                    <input type="number" min="1"  class="form-control discount" id="basic-url" aria-describedby="basic-addon3" placeholder="0.00">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h5 class="h6 mt-2 uppercase text-muted">Total Delivery Amount</h5>
                                </div>
                                <div class="col input-group mb-2 input-group-lg">
                                    <input type="number" v-model="inventoryForm.delivery_cost" min="1" class="form-control " id="" aria-describedby="basic-addon3" placeholder="0.00">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h5 class="h6 mt-2 uppercase text-muted">TAX Amount</h5>
                                </div>
                                <div class="col input-group input-group-lg">
                                    <input type="text" v-model="inventoryForm.tax" :disabled="true"  class="form-control" aria-describedby="basic-addon3" placeholder="0.00">
                                </div>
                            </div>
                            <hr>
                            <div class="row px-5 mt-0">
                                <div class="col-md-5">
                                    <h5 class="h5 mt-2 uppercase text-muted">Total Amount</h5>
                                </div>
                                <div class="col input-group input-group-lg">
                                    <input type="text" v-model="calculateTotalInventoryCost()" :disabled="true" class="form-control" aria-describedby="basic-addon3" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>

            {{--End of payment section--}}
                {{-- end of total sum section --}}
            </div>  
            {{-- end of entire payment section --}}

            {{-- payment buttons --}}
            <div class="row p-3">
                <div class="col">                           
                    <a href="" class="btn btn-lg btn-login" data-toggle="modal" data-target="">Send Order</a>
                </div>
                <div class="col">
                    <span class="float-right">
                        <a href="" @click="createInventory"class="btn btn-lg btn-started">Save</a>
                    </span>
                </div>
            </div>
        </div> 
    </div>

</section>

@endsection

@section('other_js')
    <script>
        window.vendors = @json($vendors);
        window.banks = @json($banks);
        window.taxes = @json($taxes);
    </script>
@endsection
