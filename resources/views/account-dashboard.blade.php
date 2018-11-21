@extends('layouts.app-acct')

@section('content')
<section class="bg-white pb-5">
<section id="top">
    <div class="container pt-3 pb-3">
        <h2>
            Dashboard
        </h2>
    </div>
</section>
<section id="performance">
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-7 heigh " >
                <div class="bg-white py-4 px-4 loa" id="topp">
                    <h3 class="h3">Overall Performance</h3>
                    <div class="row">
                        <div class="col-md-4 ">
                            <span class="rating-number" >3.0</span>
                            <div class="rate" data-rate-value=6 style="font-size:34px;">                           
                            </div>
                            <h6 class="h6">Highly Recommended</h6>
                        </div>
                    
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div id="test-circle"></div>
                                    <div class= "text-center">
                                        <h6 class="h6 ">Performance</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="test-circle2"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">Performance</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="test-circle3"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">Performance</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 heigh" >
                <div class="bg-white p-3 scroll" id="topp">
                    <h3 class="h3">HISTORY</h3>
                    <div class="table-responsive table-responsive-sm">
                            <table class="table table-striped table-hover text-grey rate-table" id="dataTable">
                                <thead class="">
                                  <tr class="">
                                    <th scope="col">Client</th>
                                    <th scope="col">Transaction</th>
                                    <th scope="col">Amount (&#8358;)</th>
                                    <th scope="col">Date</th
                                 </tr>
                                </thead>

                                <tbody>
                                  <tr>
                                      <td >
                                          <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="img-fluid service-img">
                                      </td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing 
                                    </td>
                                    <td>
                                        23,000
                                    </td>
                                    <td>
                                        21/08/2020
                                    </td>                                   
                                  </tr>
        
                                  <tr>
                                    <td >
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="img-fluid service-img">
                                        
                                    </td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur ptate.
                                    </td>
                                    <td>
                                        23,000
                                    </td>
                                    <td>
                                        21/08/2020
                                    </td>                                   
                                </tr>
        
                                    <tr>
                                        <td >
                                          <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="img-fluid service-img">
                                        </td>
                                        <td>
                                            Lorem ipsum dolor sit amet, consectetur adptate.
                                        </td>
                                        <td>
                                            23,000
                                        </td>
                                        <td>
                                            21/08/2020
                                        </td>                                   
                                    </tr>
                                    <tr>
                                            <td >
                                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="img-fluid service-img">
                                            </td>
                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adptate.
                                            </td>
                                            <td>
                                                23,000
                                            </td>
                                            <td>
                                                21/08/2020
                                            </td>                                   
                                        </tr>
                                    <tr class="d-none">
                                            <td >
                                                 <img src=" " alt="client logo" srcset="" class="img-fluid service-img">
                                                </td>
                                            <td> <textarea class="form-control"></textarea></td>
                                            
                                            <td> <input type="number" placeholder=""> </td>

                                        <td>
                                            <div class="dates">
                                                <input type="text" class="form-control" id="usr1" name="event_date" placeholder="DD-MM-YYYY" autocomplete="off" >
                                            </div>
                                        </td>
                                          
                                        </tr>                                  
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="menu">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-white p-3 loa" id="topp">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="h5 ">Manage Clients</h5>
                            <p class="p-12 text-muted">
                                Take records, reports, Statictics of the clients and easily access their 
                                records.
                            </p>
                            <span class="show"><a href="/clients" class="show-more uppercase">Show More</a></span>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4"> 
                <div class="bg-white p-3 loa" id="topp">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="h5 ">Payments Received</h5>
                            <p class="p-12 text-muted">
                                    View the transaction details, the amount received and the deliverables.
                            </p>
                            <span class="show"><a href="" class="show-more uppercase">Show More</a></span>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>        
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white p-3 loa" id="topp">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="h5 ">Payments Receivables</h5>
                            <p class="p-12 text-muted">
                                    Take records, reports, Statictics of the clients and easily access their 
                                    records.
                            </p>
                            <span class="show"><a href="" class="show-more uppercase">Show More</a></span>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>        
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="bg-white p-3 loa" id="topp">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="h5">Budgeting</h5>
                            <p class="p-12 text-muted">
                                Take records, reports, Statictics of the clients and easily access their 
                                records.
                            </p>
                            <span class="show"><a href="" class="show-more uppercase">Show More</a></span>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white p-3 loa" id="topp">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="h5">Toolkits</h5>
                            <p class="p-12 text-muted">
                                View the transaction details, the amount received and the deliverables.
                            </p>
                            <span class="show"><a href="" class="show-more uppercase">Show More</a></span>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>        
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white p-3 loa" id="topp">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="h6">Resources & Training Modules</h5>
                            <p class="p-12 text-muted">
                                    Take records, reports, Statictics of the clients and easily access their 
                                    records.
                            </p>
                            <span class="show"><a href="" class="show-more uppercase">Show More</a></span>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>        
                </div>    
            </div>    
        </div>
    </div>
</section>
</section>
@endsection