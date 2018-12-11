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
                        <a href="/add-rent" class="btn btn-addsale px-3">Add Expenses</a>            
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
                                       <td> Mercy Ikpe</td>
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
                                       <td> Mercy Ikpe</td>
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
                                       <td> Mercy Ikpe</td>
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
                                       <td> Mercy Ikpe</td>
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
                                       <td> Mercy Ikpe</td>
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
                                       <td> Mercy Ikpe</td>
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
                                       <td> Mercy Ikpe</td>
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



@endsection