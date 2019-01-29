@extends('accountant::layouts.app-acct')


@section('content')
<section id="top">
        <div class="container py-3">
           <h3 class="h3">Manage clients</h3>
        </div>
    </section>

    <section>
        <div class="container my-3">
            <div class="client-info bg-white p-3 loa" id="topp">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                    </div>
                    <div class="col-md-8">
                        <p class="text-muted">Name of Client</p>
                        <h5 class="h5 text-muted">Mary Ikpe</h5>
                    </div>
                </div>
            </div>

            <div class="row py-3">
                <div class="col-md-8">
                    <div class="bg-white scroll" id="topp">
                        <div class="client-message bg-green p-3 text-white">
                            <h5 class="h5">Message (Recommendations)</h5>
                        </div>
                        <div class="row p-3">
                            <div class="col-md-3">
                                <p class="text-muted">12/09/2018</p>
                                <p class="text-muted">12/09/2018</p>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, architecto?</p>                                
                                <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, architecto?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white loa" id="topp">
                        <div class="client-record bg-orange text-white p-3">
                            <h5 class="h5">Number of Unprocessed Records</h5>
                        </div>
                        <div class="row p-3">
                            <div class="col-md-8 text-center py-2">
                                <p class="text-muted ">These are some <br>records that need  to be <br> attended to</p>
                                <a href="" class="show-all"> Show All</a>
                            </div>
                            <div class="col-md-4 py-auto">
                                <h1 class="h1">15</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tabbable full-width-tabs bg-white">
                    <ul class="nav nav-tabs text-center " id="navigation">
                        <li class="active selected"><a href="#tab-one" data-toggle="tab" class="btn-select">Transaction</a></li>
                        <li><a href="#tab-two" data-toggle="tab" class="btn-select">Journal</a></li>
                    </ul>
                    {{-- transaction bar --}}
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-one">
                            {{-- search bar --}}
                                <form method="" action="" >
                                    <div class="form-group my-3 mx-auto" style="width:500px">
                                        <div class="row">
                                            <div class="col-md-5">
                                                    <i class="fa fa-arrows" style="font-size:20px; color:#FF8800;"></i>
                                            <span class="h6">Classify Transactions</span>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control text-muted search-radius " id="topp" placeholder="&#xF002; Search for transactions, category and date" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-hover" id="dataTable">
                                    <thead class="p-3">
                                        <tr class="tab">
                                        <th scope="col" >
                                        Trans. ID
                                        </th>
                                        <th scope="col">
                                        Date
                                        </th>
                                        <th scope="col">
                                                Details
                                                </th>
                                        <th scope="col">
                                            Amount (&#8358;)
                                        </th>                                                
                                        <th scope="col">
                                        Debit
                                    </th>
                                        <th scope="col">
                                            Credit
                                        </th>
                                        <th scope="col">
                                            Note
                                        </th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td> KB&#x2d;A001E</td>
                                        <td> 12/12/2019</td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, neque.</td>
                                        <td>  23  </td>
                                        <td> 2,000</td>
                                        <td> 43,000   </td>
                                        <td> Mercy Ikpe </td>
                                        </tr>
            
                                        <tr>
                                            <td>  KB-A001E</td>
                                            <td> 12/12/09</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, aut!</td>
                                            <td> 23</td>
                                            <td> 2,000</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                        </tr>
            
                                        <tr>
                                        <td>  KB-A001E</td>
                                            <td> 12/12/2091 </td>
                                            <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis, a.</td>
                                            <td> 23</td>
                                            <td> 2,000</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                        </tr>
            
                                        <tr>
                                        <td>  KB-A001E</td>
                                                <td> 12/12/2019 </td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, neque?</td>
                                                <td> 23</td>
                                                <td> 2,000</td>
                                                <td> 43,000</td>
                                                <td> Mercy Ikpe</td>
                                        </tr>
            
                                                    
                                            
                                        <tr class="d-none">
                                            
                                                <td> <input type="text" placeholder=""></td>
                                                <td>
                                                    <div class="dates">
                                                        <input type="text" class="form-control" id="usr1" name="event_date" placeholder="DD-MM-YYYY" autocomplete="off" >
                                                    </div>
                                                <td><textarea class="form-control"></textarea></td>
                                                <td> <input type="number" placeholder=""> </td>
                                                <td><input type="number" placeholder=""></td>
                                                <td><input type="number" placeholder=""></td>
                                                <td><input type="text" placeholder=""></td>
                                            <td> IG</td>
            
                                            </tr>                         
                                    </tbody>
                                </table>           
                            </div>
                        </div>
                        {{-- end of transaction --}}

                        {{-- journal section --}}
                        <div class="tab-pane" id="tab-two">
                            {{-- search bar --}}
                            <form method="" action="" >
                                    <div class="form-group my-3 mx-auto" style="width:400px">
                                        <input type="text" class="form-control text-muted search-radius " id="topp" placeholder="&#xF002; Search for transactions, category and date" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                </form>

                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-striped table-hover" id="dataTable">
                                    <thead class="p-3">
                                      <tr class="tab">
                                        <th scope="col">
                                        Date
                                        </th>
                                        <th scope="col">
                                                Details
                                                </th>
                                        <th scope="col">
                                            Amount (&#8358;)
                                        </th>                                                
                                        <th scope="col">
                                        Debit
                                    </th>
                                        <th scope="col">
                                            Credit
                                        </th>
                                        <th scope="col">
                                            Note
                                        </th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>  12/12/2019</td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, neque.</td>
                                        <td>  23  </td>
                                        <td> 2,000</td>
                                        <td> 43,000   </td>
                                        <td> Mercy Ikpe </td>
                                      </tr>
            
                                        <tr>
                                           <td> 12/12/09</td>
                                           <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, aut!</td>
                                          <td> 23</td>
                                            <td> 2,000</td>
                                          <td> 43,000</td>
                                          <td> Mercy Ikpe</td>
                                        </tr>
            
                                        <tr>
                                            <td> 12/12/2091 </td>
                                            <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis, a.</td>
                                            <td> 23</td>
                                            <td> 2,000</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                        </tr>
            
                                        <tr>
                                                <td> 12/12/2019 </td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, neque?</td>
                                                <td> 23</td>
                                                <td> 2,000</td>
                                                <td> 43,000</td>
                                                <td> Mercy Ikpe</td>
                                        </tr>
            
                                                    
                                            
                                        <tr class="d-none">
                                            
                                              <td> <input type="text" placeholder=""></td>
                                              <td><textarea class="form-control"></textarea></td>
                                              <td> <input type="number" placeholder=""> </td>
                                              <td><input type="number" placeholder=""></td>
                                              <td><input type="number" placeholder=""></td>
                                              <td><input type="text" placeholder=""></td>
                                            <td> IG</td>
            
                                            </tr>                         
                                    </tbody>
                                </table>
                                            
                            </div>
                      </div>  
                    </div> 
            </div>
        </div>
    </section>
    

@endsection