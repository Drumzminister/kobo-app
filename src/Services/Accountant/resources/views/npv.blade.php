@extends('accountant::layouts.app-acct')


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
                                    <th scope="col">Inflows(&#8358;)</th>
                                    <th scope="col">Outflows(&#8358;)</th>
                                    <th scope="col">Net Cashflows(&#8358;)</th>
                                    <th scope="col">Cummulative (&#8358;)</th>        
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td >Year 1</td>
                                        <td>33,000,000</td> 
                                        <td> 23,000,000</td>
                                        <td> 43,000,000</td>
                                        <td> 43,000,000</td>
                                    </tr>                        
                                            <tr>
                                                    <td >Year 1</td>
                                                    <td>33,000,000</td> 
                                                    <td> 23,000,000</td>
                                                    <td> 43,000,000</td>
                                                    <td> 43,000,000</td>
                                            </tr>
        
                                            <tr>
                                                    <td >Year 1</td>
                                                    <td>33,000,000</td> 
                                                    <td> 23,000,000</td>
                                                    <td> 43,000,000</td>
                                                    <td> 43,000,000</td>
                                                </tr>
                                                <tr>
                                                        <td >Year 1</td>
                                                        <td>33,000,000</td> 
                                                        <td> 23,000,000</td>
                                                        <td> 43,000,000</td>
                                                        <td> 43,000,000</td>
                                                    </tr>
                                    
                                </tbody>
                            </table>
                            <span class="float-right" >Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i>
                            </span>

                            <div class="text-center mt-5 py-2">
                                    <a href="" class="btn btn-login" data-toggle="modal" data-target="#exampleModalCenter">Calculate</a> 
                                </div>
                        </div>    
            </div>

        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-heade">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center p-5">
              <h3 class="h3">Net Present value</h3>
                <h1 class="h1 text-green">&#8358;58,000,000</h1>
                <p>Present Value of future cash flows is positive. 
                        Therefore Project is viable.</p>
            
                <a href="" class="btn btn-started pt-3" data-toggle="modal" data-target="#copy">Copy value</a>                     
            </div>
            
          </div>
        </div>
      </div>

      <div class="modal fade" id="copy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-heade">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center p-5">
                  <h3 class="h3">Net Present value</h3>
                    <h1 class="h1 text-green">&#8358;58,000,000</h1>
                    <p class="text-muted">Value copied</p>
                
                    <a href="" class="btn btn-started pt-3" >Done</a>                     
                </div>
                
              </div>
            </div>
          </div>
      
@endsection