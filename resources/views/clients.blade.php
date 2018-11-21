@extends('layouts.app-acct')

@section('content')
<section id="top">
    <div class="container py-4">
        <div class="row">
            <div class="col">
                <h3 class="h3">Clients</h3>
            </div>
            <div class="col">
                <div class="pull-right">
                    <a href="" class="btn btn-login">Actions</a>
                    <a href="" class="btn btn-started">Create Clients</a>
                </div>
            </div>
        </div>
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Filter<i class="fa fa-filter px-2"></i></span>
            </div>
        </div>
    </div>
</section>

{{-- table section --}}
<section id="table">
    <div class="container bg-white mt-5">
            <div class="table-responsive table-responsive-sm">
                    <table class="table table-stripe table-hover text-grey" id="dataTable">
                        <thead class="">
                          <tr class="">
                            <th scope="col">Client</th>
                            <th scope="col">Prefix</th>
                            <th scope="col">IDNumber</th>
                            <th scope="col">Staff Number</th
                         </tr>
                        </thead>

                        <tbody>
                          <tr>
                              <td >
                                  <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="img-fluid service-img">
                                    Lagos Insurance
                                </td>
                            <td>
                                KB12
                            </td>
                            <td>
                                HN-01234
                            </td>
                            <td>
                                40
                            </td>                                   
                          </tr>

                          <tr>
                                <td >
                                    <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="img-fluid service-img">
                                      Lagos Insurance
                                  </td>
                              <td>
                                  KB12
                              </td>
                              <td>
                                  HN-01234
                              </td>
                              <td>
                                  40
                              </td>                                   
                            </tr>
  
                            <tr>
                                    <td >
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="img-fluid service-img">
                                          Lagos Insurance
                                      </td>
                                  <td>
                                      KB12
                                  </td>
                                  <td>
                                      HN-01234
                                  </td>
                                  <td>
                                      40
                                  </td>                                   
                                </tr>

                                <tr>
                                        <td >
                                            <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="img-fluid service-img">
                                              Lagos Insurance
                                          </td>
                                      <td>
                                          KB12
                                      </td>
                                      <td>
                                          HN-01234
                                      </td>
                                      <td>
                                          40
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
</section>

@endsection