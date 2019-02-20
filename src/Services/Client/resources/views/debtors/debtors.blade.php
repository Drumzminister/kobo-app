@extends('layouts.app')
<style>
    label {display: block; padding: 5px; position: relative; padding-left: 10px;}
    label input {display: none;}
    label span {border: 1px solid #ccc; width: 17px; height: 17px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
    input:checked + span {background: #ccf; border-color: #ccf;}
    
    input {
        /* border: none; */
        background: transparent;
    }
</style>    
@section('content')

{{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2>Debtors</h2>
                @include('client::accountant-button')
            </div>
        </div>
    </section>
{{-- end of heading section --}}

{{-- sales chart --}}
    <section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="bg-white px-3 py-2" id="topp"> 
                            <div class="dropdown show ">
                                    <a class="btn btn-filter dropdown-toggle" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Switch Graph                                    
                                    </a>                                   
                                    <div class="dropdown-menu text-green" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#" class="text-orange">Debt Profile</a>
                                        <a class="dropdown-item" href="#" class="text-orange">Collection Profile</a>
                                    </div>
                            </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="h6">Debtors Overview</h6>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>D</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>W</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>M</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>Y</span></label>
                                    </div>
                                          
                            </div>
                            <div class="col-md-6 row">
                                    <div class="form-group col">
                                        <select id="inputState" class="form-control btn-loginn">
                                            <option selected>Start Date</option>
                                            <option>January</option>
                                            <option>Feburary</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>                                            
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <select id="inputState" class="form-control btn-loginn">
                                            <option selected class>End Date</option>
                                            <option>January</option>
                                            <option>Feburary</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>                                
                                        </select>
                                    </div>
                            </div>
                        </div>
                            <canvas id="canvasSale" height="90"></canvas>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white p-3" id="topp">
                        {{-- <h4 class="sale-h4">Most Expenses Transaction</h4> --}}
                        <div class="dropdown show text-orange">
                                <a class="text-orange dropdown-toggle bg-white" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Most Recent Debtors                                    
                                </a>                                   
                                <div class="dropdown-menu text-green" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#" class="text-orange">Highest Debtors</a>
                                    <a class="dropdown-item" href="#" class="text-orange">Fastest Paying Debtors</a>
                                </div>
                        </div>
                        <div class="all-scroll">
                                <table class="table table-striped table-hover" id="table">
                                        <thead class="sale-head">
                                          <tr>
                                            <th scope="col">Company Name</th>
                                            <th scope="col">Amount</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Broomstick Ltd</td>
                                            <td>12,000</td>
                                          </tr>
                                          <tr>
                                                <td>Broomstick Ltd</td>
                                                <td>12,000</td>
                                            <tr>
                                            <tr>
                                                <td>Broomstick Ltd</td>
                                                <td>12,000</td>
                                            </tr>
                                            <tr>
                                                <td>Broomstick Ltd</td>
                                                <td>12,000</td>
                                            </tr>
                                            <tr>
                                                <td>Broomstick Ltd</td>
                                                <td>12,000</td>
                                            </tr>
                                        </tbody>
                                </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
{{-- end of sales chart --}}
        </div>
    </section>

    <section id="sale-table">
        <div class="container mt-3">
                
            <div class="bg-white p-4">
                    <div class="row pb-2">
                            <div class="col-md-6 col-12">
                            <h4 class= "h4">Debtors List </h4>
                            </div>
        
                            <div class="col-md-6 col-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text vat-input append-border px-5" id="basic-addon2">Search</span>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                
                <div class="table-responsive table-responsive-sm">
                        <table class="table table-striped table-hover" id="dataTable">
                                <thead class="p-3">
                                  <tr class="tab">
                                    <th scope="col">Sales Date</th>
                                    <th scope="col">Customer</th>                                    
                                    <th scope="col">Total Invoices Owed (&#8358;)</th>
                                    <th scope="col">Total Payment (&#8358;)</th>
                                    <th scope="col">Amount Receivables</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($debtors as $debtor)
                                  <tr>
                                        <td>21/08/2020</td>
                                        <td><a href="#">{{ $debtor->customer->name }}</a> </td>
                                        <td>23,000</td>
                                        <td> 43,000</td>
                                        <td>50,000</td>
                                  </tr>
                                @endforeach
                                </tbody>
                        </table>
                </div>
                    <hr class="mt-0">
                    <div class="text-center pb-3">
                        <a href="/client/debtors/all" class="view-more">View More</a> 
                    </div>
            </div> 
           
        </div>
    </section>
    
@endsection
