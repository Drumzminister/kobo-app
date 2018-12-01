@extends('layouts.app-acct')

@section('content')
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <h2>Chats</h2>
        </div>
    </section>
{{-- end of heading section --}}

<section>
    <div class="container my-4">
        <div class="row py-3">
            <div class="col-md-7">
                <h3 class="h3">Chat History</h3>
            </div>
            <div class="col-md-5">
                <a href="" class="btn btn-started">All</a>
                <a href="" class="btn btn-login">Ongoing</a>
                <a href="" class="btn btn-login">Finished</a>
            </div>
        </div>

    {{-- notification section --}}
        <div class="bg-white  py-3 px-3 " id="topp">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4">
                            <span class=" rounded-circlee p-3 loa">
                                <a href="" class=""><i class="fa fa-comments-o fa-2x p-1" style="font-size:; color:rgba(255, 136, 0, 0.852);"></i></a>
                            </span>               
                        </div>
                        <div class="col-md-8">
                            <h6 class="h6 text-muted">Overall Chat</h6>
                            <div class="row">
                            <h4 class="h4 text-muted">2896</h4><span class="small text-muted pt-2 pl-2 curve-month">this month</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4">
                            <span class=" rounded-circlee p-3 loa">
                                <a href="" class=""><i class="fa fa-envelope-o fa-2x p-1" style="font-size:; color:#00C259;"></i></a>
                            </span>
                
                        </div>
                        <div class="col-md-8">
                            <h6 class="h6 text-muted">Sent Messages</h6>
                            <div class="row">
                            <h4 class="h3 text-muted">2896</h4><span class="small text-muted pt-2 pl-2 curve-month">this month</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4">
                            <span class=" rounded-circlee p-3 loa">
                                <a href="" class=""><i class="fa fa-envelope-open-o fa-2x p-1" style="font-size:; color:#00C259;"></i></a>
                            </span>
                
                        </div>
                        <div class="col-md-8">
                            <h6 class="h6 text-muted">Received Messages</h6>
                            <div class="row">
                            <h4 class="h3 text-muted">2896</h4><span class="small text-muted pt-2 pl-2 curve-month">this month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of notification --}}
        <div class="bg-white  my-3 py-3 px-3 " id="topp">
                <div class="table-responsive table-responsive-sm">
                        <table class="table table-hover">
                           
                            <tbody>
                              <tr>
                                  <td><label><input type="checkbox" value=""></label></td>
                                    <td>
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                    </td>
                                    <td class="text-green small">
                                        Lagos Insurance
                                    </td>
                                    <td class="small">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                    
                              </tr>
    
                              <tr>
                                    <td><label><input type="checkbox" value=""></label></td>
                                    <td >
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                    </td>
                                    <td class="text-green small">
                                        Lagos Insurance
                                    </td>
                    
                                    <td class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. A neque odio incidunt iure consequatur saepe ipsam natus quibusdam tempora quo!</td>
                                    
                              </tr>
    
                            <tr>
                                    <td><label><input type="checkbox" value=""></label></td>
                                    <td >
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                    </td>
                                    <td class="text-green small">
                                        Lagos Insurance
                                    </td>
                    
                                <td class="small">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto </td> 
                            </tr>

                            <tr>
                                    <td><label><input type="checkbox" value=""></label></td>
                                    <td >
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                    </td>
                                    <td class="text-green small">
                                        Lagos Insurance
                                    </td >
                    
                                    <td class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. A neque odio incidunt iure consequatur saepe ipsam natus quibusdam tempora quo!</td>                                    
                              </tr>                            
                            </tbody>
                        </table>
                    </div>
        </div>
        {{-- message dispaly section --}}       
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