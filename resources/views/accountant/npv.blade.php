@extends('layouts.app-acct')

@section('content')
<section id="top">
    <div class="container py-3">
        <div class="row ">
            <h2> <a href="/npv" class="text-dark">Net Present Value (NPV) Calculator</a></h2>            
        </div>
    </div>
</section>

<section>
    <div class="container my-4 bg-white">
        <div class="npv-header bg-green text-white text-center py-3">
            <h3 class="h3">Net Present Value (NPV) Calculator </h3>
            <p>Fill in the details and calculate you NPV</p>
        </div>

        <div class="npv p-5">
            <div class="npv-table">
                <div class="row px-5">
                    <div class="col-md-4">
                            <label for=""><h5>Inflation rate</h5></label>
                            <div class="input-group input-group-lg mb-3">
                                    <input type="text" class="form-control" aria-label="">
                                    <div class="input-group-append input-group-lg">
                                      <span class="input-group-text vat-input">%</span>
                                    </div>
                            </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        
                            <label for=""><h5>Nominal rate</h5></label>
                            <div class="input-group input-group-lg mb-3">
                                    <input type="text" class="form-control" aria-label="">
                                    <div class="input-group-append">
                                      <span class="input-group-text vat-input">%</span>
                                    </div>
                            </div>
                    </div>
                </div>

                <div class="row px-5">
                        <div class="col-md-4">
                                <label for=""><h5>Initial Cash Outlay</h5></label>
                                <div class="input-group input-group-lg mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text vat-input">&#8358;</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="">
                                </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            
                                <label for=""><h5>Real rate</h5></label>
                                <div class="input-group input-group-lg mb-3">
                                        <input type="text" class="form-control" aria-label="">
                                        <div class="input-group-append">
                                          <span class="input-group-text vat-input">%</span>
                                        </div>
                                </div>
                        </div>
                    </div>

                    <div class="table-responsive table-responsive-sm">
                            <table class="table table-striped table-hover" id="dataTable">
                                <thead class="p-3">
                                  <tr class="tab">
                                    <th scope="col">Period</th>
                                    <th scope="col">Inflows</th>
                                    <th scope="col">Outflows</th>
                                    <th scope="col">Net Cashflows(&#8358;)</th>
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
            </div>

        </div>
    </div>
</section>
@endsection