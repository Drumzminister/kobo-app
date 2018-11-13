@extends('layouts.app')
<style>
     input[type=text] {
    background:transparent;
    border-radius: 4px;
}


</style>
@section('content')
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2 class="h2">Sales</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
            </div>
        </div>
</section>
{{-- end of heading section --}}

<section id="info">
    <div class="container mt-5">
        <form action="">
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text customer-input" id="basic-addon3">Customer Name</span>
                        </div>
                        <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="Mary Okon">                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group mb-3 input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text vat-input" id="basic-addon3">Value Added Tax (VAT)</span>
                        </div>
                        <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="10%">                            
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input-group mb-3 input-group-lg">
                        {{-- <input placeholder="08/08/2018" class="form-control " type="date" >  --}}
                        <input type="text" class="form-control " id="" format="dd/MM/yyyy" placeholder="08/08/2018">

                        <div class="input-group-prepend">
                            <span class="input-group-text date-input" id="basic-addon3"><i class="fa fa-calendar"></i></span>
                        </div>                                
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>



{{-- add sales table --}}
<section id="sale-table">
        <div class="container mt-4">
                
            <div class="bg-white">
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Date</th>
                            <th scope="col">Inventory Items</th>
                            <th scope="col">QTY sold</th>
                            <th scope="col">Sales Price (&#8358;)</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Channel</th>
                
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td > 21/08/2020     </td>
                            <td>  Car   </td>
                            <td>  23  </td>
                            <td> 43,000   </td>
                            <td> Mercy Ikpe </td>
                            <td>  IG </td>
                          </tr>

                            <tr>
                               <td >21/08/2020 </td>
                               <td> Car </td>
                              <td> 23</td>
                              <td> 43,000</td>
                              <td> Mercy Ikpe</td>
                              <td> IG</td>
                            </tr>

                            <tr>
                                <td >21/08/2020 </td>
                                <td> Car </td>
                                <td> 23</td>
                                <td> 43,000</td>
                                <td> Mercy Ikpe</td>
                                <td> IG</td>
                            </tr>

                            <tr>
                                    <td >21/08/2020 </td>
                                    <td> Car </td>
                                    <td> 23</td>
                                    <td> 43,000</td>
                                    <td> Mercy Ikpe</td>
                                    <td> IG</td>
                            </tr>

                            <tr>
                                    <td >21/08/2020 </td>
                                    <td> Car </td>
                                    <td> 23</td>
                                    <td> 43,000</td>
                                    <td> Mercy Ikpe</td>
                                    <td> IG</td>
                                </tr>
                                <tr>
                                        <td >21/08/2020 </td>
                                        <td> Car </td>
                                        <td> 23</td>
                                        <td> 43,000</td>
                                        <td> Mercy Ikpe</td>
                                        <td> IG</td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td> Car </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td> IG</td>
                                        </tr>
                                        <tr>
                                                <td >21/08/2020 </td>
                                                <td> Car </td>
                                                <td> 23</td>
                                                <td> 43,000</td>
                                                <td> Mercy Ikpe</td>
                                                <td> IG</td>
                                            </tr>
                                        
                                
                            <tr class="d-none">
                                <td><input type="date" placeholder=""> </td>
                                  <td> <input type="text" placeholder=""></td>
                                  <td> <input type="number" placeholder=""> </td>
                                  <td><input type="number" placeholder=""></td>
                                  <td><input type="text" placeholder=""></td>
                                <td> IG</td>

                                </tr>                         
                        </tbody>
                    </table>
                    <span id="addNew" value="Add Row" onclick="addRow('dataTable')" class="float-right"  >Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i>
                    </span>            
                </div>

                    {{-- payment section --}}

                    <div class="row p-3 mt-2 ">
                        <div class="col-md-6">
                            <div class="bg-grey pt-5 pb-5 px-3" id="topp">
                                <div class="row">
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
                                        <div class="dropdown show mt-3">
                                                <a class="btn btn-lg btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  500,000
                                                </a>
                                              
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <a class="dropdown-item" href="#">200,000</a>
                                                  <a class="dropdown-item" href="#">100,000</a>
                                                  <a class="dropdown-item" href="#">50,000</a>
                                                </div>
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
                                            <div class="dropdown show mt-3">
                                                    <a class="btn btn-lg btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      750,000
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                      <a class="dropdown-item" href="#">500,000</a>
                                                      <a class="dropdown-item" href="#">200,000</a>
                                                      <a class="dropdown-item" href="#">50,000</a>
                                                    </div>
                                            </div>                                   
                                        </div>
                                        <div class="col-md-2"> </div>    
                                </div>
                            </div>
                        </div>
                    {{-- end of current payment --}}

                    {{-- total sum section --}}
                        <div class="col-md-6">
                                <div class="bg-grey pt-5 pb-3 px-3" id="topp">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="h5 uppercase">Payment Mode</h5>
                                                <div class="input-group mb-3 input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                                    </div>
                                                    <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="100,000">                        
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <h5 class="h5 uppercase">Amount</h5>
                                                <div class="input-group mb-3 input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                                    </div>
                                                    <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="100,000">                        
                                                </div>
                            
                                            </div>
                                        </div>
                                                                                
                                        <div class="row pt-4">
                                            <div class="col">
                                            <h5 class="h5 uppercase">Total Amount</h5>
                                            </div>
                                            <div class="col input-group mb-3 input-group-lg">
                                                <div class="input-group-prepend cus">
                                                    <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                                </div>
                                                <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="1,275,000">                        
                                            </div>            
                                        </div>
                                    </div>
                        </div>
                        {{-- end of total sum section --}}                    
                    </div>  
                    {{-- end of entire payment section --}}

                    {{-- payment buttons --}}
                    <div class="row p-5">
                        <div class="col">                           
                            <a href="" class="btn btn-lg btn-login">Send Invoice</a>
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