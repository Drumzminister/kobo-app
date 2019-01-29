@extends('accountant::layouts.app-acct')

@section('content')
<section id="top">
    <div class="container py-2">
        <div class="row py-1">
                <h2><a href="/profile" class="text-dark"> Profile</a></h2>
                <span class="accountant ml-auto ">
            <a href="/edit-profile" class="btn btn-started">
                Edit Profile
            </a>                
            </span>
        </div>
    </div>
</section>

<section>
    <div class="container my-4">
        <div class="bg-white p-5">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active text-muted" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Resources Taken</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Clients</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Payments</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                   
                    <div class="card-deck mt-3">
                        <div class="card loa">
                            <img class="card-img-top img-fluid" src="{{asset('img/resource.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="h5 card-title">Getting Feedback to Clients</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                </div>
                                <div class="text-center py-3">
                                    <a href="" class="text-orange"><strong>Details</strong></a>
                                </div>
                            </div>
                        </div>
        
                        <div class="card loa">
                            <img class="card-img-top img-fluid" src="{{asset('img/resource.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="h5 card-title">Getting Feedback to Clients</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <div class="text-center py-3">
                                    <a href="" class="text-orange"><strong>Details</strong></a>
                                </div>
                            </div>
                        </div>
        
        
                        <div class="card loa">
                            <img class="card-img-top img-fluid" src="{{asset('img/resource.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="h5 card-title">Getting Feedback to Clients</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                </div>
                                <div class="text-center py-3">
                                    <a href="" class="text-orange"><strong>Details</strong></a>
                                </div>
                            </div>                   
                        </div>
                    </div>
                    <div class="card-deck mt-4">
                        <div class="card loa">
                            <img class="card-img-top img-fluid" src="{{asset('img/resource.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="h5 card-title">Getting Feedback to Clients</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                </div>
                                <div class="text-center py-3">
                                    <a href="" class="text-orange"><strong>Details</strong></a>
                                </div>
                            </div>
                        </div>
        
                        <div class="card loa">
                            <img class="card-img-top img-fluid" src="{{asset('img/resource.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="h5 card-title">Getting Feedback to Clients</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                <div class="text-center py-3">
                                    <a href="" class="text-orange"><strong>Details</strong></a>
                                </div>
                            </div>
                        </div>
        
        
                        <div class="card loa">
                            <img class="card-img-top img-fluid" src="{{asset('img/resource.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="h5 card-title">Getting Feedback to Clients</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                </div>
                                <div class="text-center py-3">
                                    <a href="" class="text-orange"><strong>Details</strong></a>
                                </div>
                            </div>                   
                        </div>
                    </div>
                    <div class="text-center mt-3 p-3">
                        <a href="" class="view-more">View More</a> 
                </div>
                </div>

                {{-- clients --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="table-responsive table-responsive-sm">
                        <table class="table table-stripe table-hover text-grey" id="table">
                            <thead class="">
                              <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <th scope="col"><label><input type="checkbox" value=""></label></th>                           
                                <th scope="col">Client</th>
                                <th scope="col">Prefix</th>
                                <th scope="col">IDNumber</th>
                                <th scope="col">Subscription Plan</th
                                <th></th>
                                </tr>
                            </thead>
    
                            <tbody>
                              <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <td><label><input type="checkbox" value=""></label></td>                              
                                <td >
                                      <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                      <span class="text-green pl-3"> Lagos Insurance</span>
                                    </td>
                                <td>
                                    KB12
                                </td>
                                <td>
                                    HN-01234
                                </td>
                                <td>
                                    PRO
                                </td>   
                                <td class="flex" > 
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </td>                                    
                              </tr>
    
                              <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <td><label><input type="checkbox" value=""></label></td>                                
                                <td >
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                          <span class="text-green pl-3"> Lagos Insurance</span>
                                      </td>
                                  <td>
                                      KB12
                                  </td>
                                  <td>
                                      HN-01234
                                  </td>
                                  <td>
                                      Basic
                                  </td>   
                                  <td class="flex" > 
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </td>                                    
                                </tr>
      
                                <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                    <td><label><input type="checkbox" value=""></label></td>                                    
                                    <td >
                                            <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class=" rounded-circle img-fluid service-img">
                                            <span class="text-green pl-3"> Lagos Insurance</span>
                                        </td>
                                      <td>
                                          KB12
                                      </td>
                                      <td>
                                          HN-01234
                                      </td>
                                      <td>
                                          PRO
                                      </td>   
                                      <td class="flex" > 
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </td>                                    
                                    </tr>
    
                                    <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                        <td><label><input type="checkbox" value=""></label></td>                                        
                                        <td >
                                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                                <span class="text-green pl-3"> Lagos Insurance</span>
                                            </td>
                                          <td>
                                              KB12
                                          </td>
                                          <td>
                                              HN-01234
                                          </td>
                                          <td>
                                              PRO
                                          </td> 
                                          <td class="flex" > 
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>                                      
                                        </tr>                                                                                
                            </tbody>
                        </table>  
                        <div class="text-center mt-3 p-3">
                            <a href="" class="view-more">View More</a> 
                        </div>
                  
                    </div>
                </div>

                {{-- payment --}}
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="table-responsive table-responsive-sm">
                        <table class="table table-stripe table-hover text-grey" id="table">
                            <thead class="">
                              <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <th scope="col"><label><input type="checkbox" value=""></label></th>                           
                                <th scope="col">Client</th>
                                <th scope="col">Amount (NGN)</th>
                                <th scope="col">Payment Mode</th>
                                <th scope="col">Receivable Period</th></th
                                <th></th>
                                </tr>
                            </thead>
    
                            <tbody>
                              <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <td><label><input type="checkbox" value=""></label></td>                              
                                <td >
                                      <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                      <span class="text-green pl-3"> Lagos Insurance</span>
                                    </td>
                                <td> 230,000.00 </td>
                                <td> Cash </td>
                                <td> 3 </td>   
                                <td class="flex" > 
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </td>                                    
                              </tr>
    
                              <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <td><label><input type="checkbox" value=""></label></td>                              
                                <td >
                                      <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                      <span class="text-green pl-3"> Lagos Insurance</span>
                                    </td>
                                <td> 230,000.00 </td>
                                <td> Cash </td>
                                <td> 3 </td>   
                                <td class="flex" > 
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </td>                                    
                              </tr>  

                              <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <td><label><input type="checkbox" value=""></label></td>                              
                                <td >
                                      <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                      <span class="text-green pl-3"> Lagos Insurance</span>
                                    </td>
                                <td> 230,000.00 </td>
                                <td> Cash </td>
                                <td> 3 </td>   
                                <td class="flex" > 
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </td>                                    
                              </tr>
    
                                <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <td><label><input type="checkbox" value=""></label></td>                              
                                <td >
                                      <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                      <span class="text-green pl-3"> Lagos Insurance</span>
                                    </td>
                                <td> 230,000.00 </td>
                                <td> Cash </td>
                                <td> 3 </td>   
                                <td class="flex" > 
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </td>                                    
                              </tr>
                                                                                                              
                            </tbody>
                        </table>  
                        <div class="text-center mt-3 p-3">
                            <a href="" class="view-more">View More</a> 
                        </div>                 
                    </div>
                </div>
              </div>
        </div>
    </div>
</section>

@endsection