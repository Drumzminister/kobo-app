@extends('layouts.app')
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
                <h2 class="h2"><a href="/inventory" class="text-dark"> Purchase Order</a> </h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
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
       


   {{-- payment section --}}
<section>
    <div class="container">
        <div class="bg-white">
            <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Inventory Item</th>
                            <th scope="col">Description</th>
                            <th scope="col">QTY Bought</th>
                            <th scope="col">Cost Price (&#8358;)</th>
                            <th scope="col">Sales Price (&#8358;)</th>
                            <th scope="col"></th>

                
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td >shoes</td>
                                <td>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, distinctio.
                                    </td> 
                                <td> 23</td>
                                <td> 43,000</td>
                                <td> 43,000</td>
                                <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                            </tr>

                            <tr>
                               <td >shoes</td>
                               <td>
                                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, distinctio.
                                </td> 
                              <td> 23</td>
                              <td> 43,000</td>
                              <td> 43,000</td>
                              <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                            </tr>

                            <tr>
                                <td >shoes</td>
                                <td>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, distinctio.
                                    </td> 
                                <td> 23</td>
                                <td> 43,000</td>
                                <td> 43,000</td>
                                <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                            </tr>
                            <tr>
                                <td >shoes</td>
                                <td>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, distinctio.
                                    </td> 
                                <td> 23</td>
                                <td> 43,000</td>
                                <td> 43,000</td>
                                <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <span class="float-right" onclick="addRow()">Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i>
                    </span>
            </div>

        <div class="row p-2 mt-2 ">
                <div class="col-md-6">
                    <div class="bg-grey py-4 px-3" id="topp">
                        <div class="row" >
                            <div class="col-md-5">
                                <h5 class="h5 uppercase">Payment Mode</h5>
                                <div class="dropdown show mt-3">
                                        <a class="btn btn-lg btn-payment dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Bank (GTB)
                                        </a>
                                    
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">GTB 1</a>
                                        <a class="dropdown-item" href="#">GTB 2</a>
                                        <a class="dropdown-item" href="#">Skye Bank</a>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-5">
                                <h5 class="h5 uppercase">Amount</h5>
                                <div class="show input-group input-group-lg mt-3">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="" placeholder="500,000">
                                </div>                                
                            </div>

                            <div class="col-md-2"></div>
                        </div>
                        
                        
                        <div class="row">
                                <div class="col-md-5">
                                    <div class="dropdown show mt-3">
                                            <a class="btn btn-lg btn-payment dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Cash
                                            </a>
                                        
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">ATM</a>
                                            <a class="dropdown-item" href="#">GTB 2</a>
                                            <a class="dropdown-item" href="#">Skye Bank</a>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="show input-group input-group-lg mt-3">
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="750,000">
                                    </div>                                   
                                </div>
                                <div class="col-md-2 mt-4 "> 
                                        <span class=""><i class="fa fa-plus-square" style="font-size:32px;color:#00C259;"></i>
                                        </span>
                                </div>    
                        </div>
                    </div>
                </div>
            {{-- end of current payment --}}

            {{-- total sum section --}}
                <div class="col-md-6">
                        <div class="bg-grey py-4 px-3" id="topp">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="h5 uppercase">Total Discount</h5>
                                        <div class="input-group mb-3 input-group-lg">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                            </div> --}}
                                            <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="NGN 100,000">                        
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h5 class="h5 uppercase">Total Delivery Amount</h5>
                                        <div class="input-group mb-3 input-group-lg">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                            </div> --}}
                                            <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="NGN 100,000">                        
                                        </div>
                    
                                    </div>
                                </div>
                                                                        
                                <div class="row pt-2">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4 col-12">
                                    <h5 class="h5 uppercase">Total Amount</h5>
                                    </div>
                                    <div class="col input-group input-group-lg">
                                        {{-- <div class="input-group-prepend cus">
                                            <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                        </div>  --}}
                                        <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="NGN 1,275,000">                        
                                    </div>            
                                </div>
                            </div>
                </div>
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
                        <a href="" class="btn btn-lg btn-started">Save</a>
                    </span>
                </div>
            </div>
        </div> 
    </div>

</section>

@endsection