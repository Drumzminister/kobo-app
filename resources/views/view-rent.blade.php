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
           
                <div class="row">
                        <div class="col-md-10 col-6">
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Search</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div id="" class="mt-2 float-right" onclick="">
                                <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>         
                            </div>
                        </div>
                </div>
        
    </div>
</section>

<section id="sale-table">
        <div class="container">
                        
            <div class="bg-white p-4"> 
                
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
            </div> 
           
        </div>
    </section>

    <section id="pagination">
            <div class="container py-3">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                    </div>
                    <div class="col-md-5">
                        <span>Go to page:</span>
        
                    </div>
                </div>
            </div>
        </section>
        



@endsection