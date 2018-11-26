@extends('layouts.app')
<style>
    input[type=text] {
    background: transparent;
    border-radius: 4px;
}
</style>

@section('content')
{{-- heading section --}}
    @include('sales._heading')
{{-- end of heading section --}}

{{-- VAT section --}}
    @include('sales._vat')
{{-- End VAT section --}}

{{-- add sales table --}}
    @include('sales._sales-table')
{{-- end of sales table --}}

{{-- Invoice Modal --}}
      @include('sales._modal')
{{--End of modal --}}


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
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                                    </div>
                                                    <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="100,000">                        
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <h5 class="h5 uppercase">Total Delivery Amount</h5>
                                                <div class="input-group mb-3 input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                                    </div>
                                                    <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="100,000">                        
                                                </div>
                            
                                            </div>
                                        </div>
                                                                                
                                        <div class="row pt-2">
                                            <div class="col">
                                            <h5 class="h5 uppercase">Total Amount</h5>
                                            </div>
                                            <div class="col input-group input-group-lg">
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
                    <div class="row p-3">
                        <div class="col">                           
                            <a href="" class="btn btn-lg btn-login" data-toggle="modal" data-target="#exampleModalCenter">Send Invoice</a>
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


      
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="container p-3">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="h5 uppercase" id="">Send</h5>

                <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">To</label>
                                <div class="col-sm-9">
                                <input type="email" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Subject</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group shadow-textarea">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Compose Message"></textarea>
                            </div>
                            <div class="justify-content-around text-center pt-2">
                                    <a href="">  <i class="fa fa-telegram " style="font-size:48px; color:#00C259;"></i></a>
                            <h5 class="h5 text-green">Save &amp; Send</h5>
                            </div>
                        </form>               
            </div>
            
          </div>
        </div>
      </div>
    
@endsection