@extends('layouts.app')

@section('content')
<section>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-white">
                    <article class="p-3">
                        <div class="img text-center">
                            <img src="{{asset('img/person.png')}}" class="img-fluid img-circle" alt="accountant-image" srcset="">
                        </div>
                        <div class="profile-name row pt-2 pb-2 ">
                             <div class="col">
      l                          <h5 class="text-muted">Idong Okon </h5>
                                <p class="text-muted">Joined: 20/12/2017</p>                        
                            </div>
                            <div class="col">
                                <p class="small text-muted float-right">
                                    A123553
                                </p>
                            </div>
                        </div>
                        <p class="text-muted"><i class="fa fa-map-marker-alt"></i>  Lagos, Nigeria</p>
                        
                        {{-- rating --}}
                        <div class="rating ">
                            <h4>4.82</h4>
                            <span>rating</span>
                        </div>
                    </article>
                    <hr>
                    
                    {{-- clients and review --}}
                    <div class="row p-3">
                        <div class="col">
                            <div class="loa bg-white text-center p-3 ">
                                <h5>37 Clients</h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="loa text-center text-white bg-green p-3">
                                <h5>120 reviews</h5>
                            </div>
                        </div>
                    </div>                    
                    <hr>

                    {{-- qualifications --}}
                    <div class="row px-3 py-2 ">
                        <div class="col-md-6">
                            <ul class="list-unstyled text-muted">
                                <li class="level">
                                <i class="fa fa-level-up-alt"></i>    Level
                                </li>
                                <li class="experience">
                                <i class="fa fa-calendar-alt"></i>    Experience
                                </li>
                                <li class="training">
                                <i class="fa fa-graduation-cap"></i>  Training
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 ">
                            <ul class="list-unstyled">
                                <li class="level">
                                    kB4
                                </li>
                                <li class="experience">
                                    10 years
                                </li>
                                <li class="training">
                                    10 modules
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="loa bg-orange text-white p-2">
                            <h4 class="h4">Review Accountant</h4>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="loa bg-white text-muted p-2 text-center">
                            <h4><i class="fa fa-comments"></i>    Chat with Accountant</h4>
                        </div>
                    </div>
                </div>  

                <div class="bg-white my-4">
                    <table class="table  table-hover p-3">
                        <thead>
                            <tr>
                            <th scope="col"><strong>Task Completed</strong></th>
                            <th scope="col">  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td scope="text-muted">October Sales Budget</td>
                            <td>
                                <btn class="btn btn-sm btn-started">View</btn>
                            </td>
                            </tr>
                            <tr>
                            <td scope="text-muted">Profit and Loss review for January</td>
                            <td>
                                <btn class="btn btn-sm btn-started">View</btn>
                            </td>
                            
                            </tr>
                            <tr>
                            <td scope="text-muted">Bank Statement reconcilation</td>
                            <td>
                                <btn class="btn btn-sm btn-started">View</btn>
                            </td>
                            
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="bg-white my-4 all-scroll">
                    <table class="table  table-hover p-3">
                        <thead>
                            <tr>
                            <th scope="col"><strong>Other activities</strong></th>
                            <th scope="col">  </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td scope="text-muted">12/12/2019</td>
                            <td>
                                Training-Completed Cashflow module 4
                            </td>
                            </tr>
                            <tr>
                            <td scope="text-muted">18/10/2019</td>
                            <td>
                                Review-Commented on sale
                            </td>
                            </tr>
                            <tr>
                            <td scope="text-muted">10/02/2019</td>
                            <td>
                                Training-Completed Cashflow module 4
                            </td>
                            </tr>
                            <tr>
                            <td scope="text-muted">18/10/2019</td>
                            <td>
                                Review-Ammortize expense on 2nd September
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection