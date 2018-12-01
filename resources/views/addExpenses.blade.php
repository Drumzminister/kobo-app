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
                <h2 class="h2">Expenses</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
            </div>
        </div>
</section>
{{-- end of heading section --}}

{{-- add expenses table --}}
<section id="sale-table">
        <div class="container mt-4">
                
            <div class="bg-white py-3 px-5">
                <div class="date float-right">
                    <div class="dates input-group input-group-lg pb-3">
                            <input type="text"  class="form-control" id="datepicker" value="{{Date('m/d/Y')}}" name="event_date">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar icon" id="datepicker" name="event_date" ></i></span>
                            </div> 
                    </div>
                </div>
                    <div id="table" class="table-editableWTF">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col" class="tool" data-tip="Add all your inventory here." tabindex="1">
                            Staff
                            </th>
                            <th scope="col" class="tool" data-tip="Provide description of item" tabindex="1">
                                    Description
                                    </th>
                            <th scope="col" class="tool" data-tip="Provide description of item" tabindex="1">
                                    Category
                            </th>
        
                            <th scope="col"class="tool" data-tip="Add price per head of product" tabindex="1">
                                    Amount (&#8358;)
                            </th>
                               
                
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                <td class="pt-3-half" contenteditable="true">30</td>
                                <td class="pt-3-half" contenteditable="true">Deepends</td>
                                
                                <td class="pt-3-half" contenteditable="true">Madrid</td>
                                
                            </tr>
                            <tr>
                                    <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                    <td class="pt-3-half" contenteditable="true">30</td>
                                    <td class="pt-3-half" contenteditable="true">Deepends</td>
                                    <td class="pt-3-half" contenteditable="true">invoice</td>
                                    

                                </tr><tr>
                                        <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                        <td class="pt-3-half" contenteditable="true">30</td>
                                        <td class="pt-3-half" contenteditable="true">Deepends</td>
                                        <td class="pt-3-half" contenteditable="true">invoice</td>
                                        

                                    </tr>
                                    <tr>
                                            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                            <td class="pt-3-half" contenteditable="true">30</td>
                                            <td class="pt-3-half" contenteditable="true">Deepends</td>
                                            <td class="pt-3-half" contenteditable="true">invoice</td>
                                        </tr>

                                        <tr>
                                                <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                                <td class="pt-3-half" contenteditable="true">30</td>
                                                <td class="pt-3-half" contenteditable="true">Deepends</td>
                                                <td class="pt-3-half" contenteditable="true">invoice</td>
                                                
                                        </tr>
                     
                 
                                    </tbody>
                            
                    </table>
                    <span class="float-right" onclick="addRow()">Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i>
                    </span>            
                </div>

                    {{-- payment section --}}

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

{{-- end of inventory table --}}


    
@endsection