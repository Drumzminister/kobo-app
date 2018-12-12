@extends("layouts.app-acct")

@section("content")
<section id="top">
    <div class="container py-3">
        <div class="row">
                <h2><a href="/rent" class="text-dark"> Rent</a></h2>
                <span class="accountant ml-auto btn btn-accountant">
                    <a href="" class="btn-accountant">
                        <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                    </a>              
                </span>
        </div>
    </div>
</section>

<section>
    <div class="container mt-3">
        <div class="bg-white p-4">
                <form action="" method="post">
                        <div class="form row py-3">
                            <div class="col-md-4">
                                <div class="p-3 bg-white text-muted" id="topp">
                                    <h5 class="h5">Total Purchase</h5>
                                    <h2 class="">&#8358;18,000,000</h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-grey text-dark" id="topp">
                                    <h5 class="h5">Total Payments</h5>
                                    <h2 class="">&#8358;18,000,000</h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-green text-white" id="topp">
                                    <h5 class="h5 ">Total Debts</h5>
                                    <h2 class="">&#8358;18,000,000</h2>
                                </div>
                            </div>
                        </div>
                </form>
        
            <div class="row py-3">
                    <div class="col-md-3">
                        <a href="/add-rent" class="btn btn-addsale px-3" data-toggle="modal" data-target="#exampleModalCenter">Add Rent</a>            
                    </div>

                    {{-- <div class="col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Search</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 float-right">
                        <div class="dropdown show float-right">
                                <a class="btn btn-filter" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Filter <i class="fa fa-filter"></i>                                    
                                </a>                                   
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#" class="text-green">By Quantity</a>
                                    <a class="dropdown-item" href="#" class="text-green">By Amount</a>
                                </div>
                        </div>
                    </div> --}}
                </div>
        
    </div>
</section>

<section id="sale-table">
        <div class="container">
                        
            <div class="bg-white px-4"> 
                
                <div class="table-responsive table-responsive-sm">
                        <table class="table table-striped table-hover" id="dataTable">
                                <thead class="p-3">
                                  <tr class="tab">
                                    <th scope="col">Rental period</th>
                                    <th scope="col">Rental Properties</th>
                                    <th scope="col">Amount (&#8358;)</th>
                                    <th scope="col">Rent Used (&#8358;)</th>
                                    <th scope="col">Balance(&#8358;)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Edit/Pay</th>
        
                        
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                        <td >2 - 4 months <br>
                                            <small>Jan - Apr</small>
                                        </td>
                                        <td>
                                            Furniture at Lekki
                                         </td> 
                                       <td> 23,000,000</td>
                                       <td> 43,000</td>
                                       <td> 43,000</td>
                                       <td> 
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                          </div>
                                       </td>
                                       <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-money" style="font-size:24px"></i></td>  
                                </tr>
        
                                <tr>
                                        <td >2 - 4 months <br>
                                            <small>Jan - Apr</small>
                                        </td>
                                        <td>
                                            Furniture at Lekki
                                         </td> 
                                       <td> 23,000,000</td>
                                       <td> 43,000</td>
                                       <td> 43,000</td>
                                       <td> 
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                          </div>
                                       </td>
                                       <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-money" style="font-size:24px"></i></td>  
                                </tr>

                                    <tr>
                                        <td >2 - 4 months <br>
                                            <small>Jan - Apr</small>
                                        </td>
                                        <td>
                                            Furniture at Lekki
                                         </td> 
                                       <td> 23,000,000</td>
                                       <td> 43,000</td>
                                       <td> 43,000</td>
                                       <td> 
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                                          </div>
                                       </td>
                                       <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-money" style="font-size:24px"></i></td>  
                                </tr>
                                <tr>
                                        <td >2 - 4 months <br>
                                            <small>Jan - Apr</small>
                                        </td>
                                        <td>
                                            Furniture at Lekki
                                         </td> 
                                       <td> 23,000,000</td>
                                       <td> 43,000</td>
                                       <td> 43,000</td>
                                       <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                          </div>
                                       </td>
                                       <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-money" style="font-size:24px"></i></td>  
                                </tr>
                                <tr>
                                        <td >2 - 4 months <br>
                                            <small>Jan - Apr</small>
                                        </td>
                                        <td>
                                            Furniture at Lekki
                                         </td> 
                                       <td> 23,000,000</td>
                                       <td> 43,000</td>
                                       <td> 43,000</td>
                                       <td> 
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                          </div>
                                       </td>
                                       <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-money" style="font-size:24px"></i></td>  
                                </tr>
                                <tr>
                                        <td >2 - 4 months <br>
                                            <small>Jan - Apr</small>
                                        </td>
                                        <td>
                                            Furniture at Lekki
                                         </td> 
                                       <td> 23,000,000</td>
                                       <td> 43,000</td>
                                       <td> 43,000</td>
                                       <td> 
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                          </div>
                                       </td>
                                       <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-money" style="font-size:24px"></i></td>  
                                </tr>
                                <tr>
                                        <td >2 - 4 months <br>
                                            <small>Jan - Apr</small>
                                        </td>
                                        <td>
                                            Furniture at Lekki
                                         </td> 
                                       <td> 23,000,000</td>
                                       <td> 43,000</td>
                                       <td> 43,000</td>
                                       <td> 
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                          </div>
                                       </td>
                                       <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-money" style="font-size:24px"></i></td>  
                                </tr>
                                </tbody>
                            </table>
                   
                </div>
                <div class="text-center pb-3">
                        <a href="/view-rent" class="view-more">View More</a> 
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
          <h5 class="h5 uppercase" id="">Add Rent</h5>

            <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="form-group row col">
                                    <label for=""><h5>Rental Period</h5></label>
                                    <label for=""><small>Add the amount of the rent will last</small></label>                            
                                    
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="" class="form-control" placeholder="Start Date">
                                        </div>
                                        <div class="col">
                                            <input type="" class="form-control" placeholder="End Date">
                                        </div>
                                    </div>
                            </div>
                        
                        
                        
                            <div class="form-group col">
                                <label for=""><h5>Rental Fee</h5></label>
                                <label for=""><small>Add the amount of the rent</small></label>                            
                                <input type="" class="form-control" id="" placeholder="NGN 5,0000,000">
                              </div>
                        </div>

                        <div class="form-group shadow-textarea">
                                <label for=""><h5>Rental Properties</h5></label><br>4
                                <label for=""><small>Add details of rental property</small></label>                           
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Compose Message"></textarea>
                        </div>
                        <div class="form-group row">
                                <div class="form-group col">
                                        <label for=""><h5>Other Rental Cost</h5></label>
                                        <label for=""><small>Add other rental cost </small></label>                            
                                        <input type="" class="form-control" id="" placeholder="">                                    </div>
                            
                            
                            
                                <div class="form-group col">
                                    <label for=""><h5>Comments</h5></label>
                                    <label for=""><small>Amount of Used Rent</small></label>                            
                                    <input type="" class="form-control" id="" placeholder="">
                                  </div>
                            </div>
                        <div class="justify-content-around text-center pt-2">
                                <a href="">  <i class="fa fa-telegram " style="font-size:48px; color:#00C259;"></i></a>
                        <h5 class="h5 text-green">Add Rent</h5>
                        </div>
                    </form>               
        </div>
        
      </div>
    </div>
  </div>

@endsection