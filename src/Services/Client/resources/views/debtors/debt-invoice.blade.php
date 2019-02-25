<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="container p-5">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="row pt-3 px-3">
                                <div class="col-md-2">
                                    <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-green h5">Mary Ikpe</h5>
                                    <h6 class="text-primary h6">Invoice NO:KB &#x2d; 1234</h6>
                                </div>
                                <div class="col-md-4">
                                    <div class="dates input-group input-group-lg">
                                        <input type="text"  class="form-control" id="datepicker" value="{{Date('m/d/Y')}}" name="event_date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar icon" id="datepicker" name="event_date" ></i></span>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                                    <form action="" method="post">
                                        <div class="form row pt-3 px-3">
                                            <div class="col-md-3">
                                                <div class="p-2" id="topp">
                                                    <h5 class="h5">Total Amount</h5>
                                                    <h4 class="text-orange">&#8358;18,000</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="p-2" id="topp">
                                                    <h5 class="h5">Amount Paid</h5>
                                                    <h4 class="text-orange">&#8358;18,000.45</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="p-2" id="topp">
                                                    <h5 class="h5 "> Balance</h5>
                                                    <h4 class="text-orange">&#8358;18,000.53</h4>
                                                </div>
                                            </div>

                                            <div class="col-md-3 float">                                            
                                                <p class="text-muted float-right">
                                                    Invoice period <br>
                                                     144 day
                                                </p>
                                            
                                            </div>
                                        </div>

                                    </form>
                                
                       
                        <div class="modal-body">
                        <section id="sale-table">
                                <div class="container">                                               
                                    <div class="long-scroll">
                                        <div class="table-responsive table-responsive-sm" id="topp">
                                            <table class="table table-striped table-hover table-condensed" id="dataTable">
                                                <thead class="p-3">
                                                    <tr class="tab">
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">Sales Price (&#8358;)</th>
                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                        
                                                    <tr>
                                                        <td >Cosmetic</td>
                                                        <td>
                                                        Lorem ipsum dolor si
                                                        </td> 
                                                        <td> 23</td>
                                                        <td> 43,000</td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td>Furniture </td>
                                                        <td>
                                                                Lorem ipsum dolor si
                                                                </td> 
                                                                <td> 23</td>
                                                                <td> 43,000</td>
                                                                
                                                        </tr>
                        
                                                    <tr>
                                                        <td >Utensils </td>
                                                        <td>
                                                                Lorem ipsum dolor si
                                                                </td> 
                                                                <td> 23</td>
                                                                <td> 43,000</td>
                                    
                                                    </tr>
                        
                                                    <tr>
                                                        <td >Leather </td>
                                                        <td>
                                                                Lorem ipsum dolor si
                                                                </td> 
                                                                <td> 23</td>
                                                                <td> 43,000</td>
                                                                  
                                                    </tr>
                                                    <tr>
                                                        <td >Cosmetic</td>
                                                        <td>
                                                                Lorem ipsum dolor si
                                                                </td> 
                                                                <td> 23</td>
                                                                <td> 43,000</td>
                                                                          
                                                    </tr>                                                    <tr>
                                                    <tr>
                                                            <td >furniture </td>
                                                            <td>
                                                                    Lorem ipsum dolor si
                                                                    </td> 
                                                                    <td> 23</td>
                                                                    <td> 43,000</td>
                                                                                                                                       
                                                   </tr>
                                                   <tr>
                                                            <td >Beverages </td>
                                                            <td>
                                                                    Lorem ipsum dolor si
                                                                    </td> 
                                                                    <td> 23</td>
                                                                    <td> 43,000</td>
                                                                              
                                                   </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 

                                    {{-- payment mode --}}
                                    <div class="payment py-3">
                                        <h6 class="h6 text-dark">Payment Mode</h6>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6 class="h6 text-muted">GTB</h6>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="h6 text-green">&#8358; 500,000</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-4">
                                                            <h6 class="h6 text-muted">Cash</h6>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6 class="h6 text-green">&#8358; 500,000</h6>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <h6 class="h6 text-muted">Total Discount</h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <h6 class="h6 ">&#8358; 400,000</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-6 ">
                                                                <h6 class="h6 text-muted">Total Discount</h6>
                                                        </div>
                                                        <div class="col-md-6">
                                                                <h6 class="h6 ">&#8358; 400,000</h6>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>                                    
                        </div>

                        <div class="modal-footer text-center">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                      </div>
            </div>
        </div>
    </div>
