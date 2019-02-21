@extends('client::layouts.app')
@section('other_styles')
<style>
    .modal-center{
        max-width: 400px;
    }
    .modal-header{
        border-bottom: none!important;
        padding: 0.5rem 1rem!important;
    }
    .modal-body{
        padding-top: 0;
        
    }
    .circle{
        border-radius: 50%;
        width: 50px;
        height: 50px;
        background: #00C259;
    }
</style>
@endsection
@section('content')
<section>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-white">
                    <article class="p-3">
                        <div class="img text-center">
                            <img src="{{ $accountant->picture }}" class="img-fluid img-circle" alt="accountant-image" srcset="">
                        </div>
                        <div class="profile-name row py-2 ">
                             <div class="col">
                                <h5 class="text-muted text-capitalize">{{ $accountant->first_name }}, {{ $accountant->last_name }} </h5>
                                <p class="text-muted">Joined: {{ $accountant->created_at->toFormattedDateString() }}</p>                        
                            </div>
                            <div class="col">
                                <p class="small text-muted float-right">
                                    {{ $accountant->kobo_id }}
                                </p>
                            </div>
                        </div>
                        <p class="text-muted text-capitalize"><i class="fa fa-map-marker-alt"></i>  {{ $accountant->state }}, {{ $accountant->country }}</p>
                        
                        {{-- rating --}}
                        <div class="rating ">
                            <h4>{{ $accountant->rating() }}</h4>
                            <span>rating</span>
                        </div>
                    </article>
                    <hr>
                    
                    {{-- clients and review --}}
                    <div class="row p-3">
                        <div class="col">
                            <div class="loa bg-white text-center p-3 ">
                                <h5>{{ $accountant->clients->count() }} Clients</h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="loa text-center text-white bg-green p-3">
                                <h5>{{ $accountant->reviews->count() }} reviews</h5>
                            </div>
                        </div>
                    </div>                    
                    <hr>

                    {{-- qualifications --}}
                    <div class="row px-3 py-2 ">
                        <div class="col-md-6 col-6">
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
                        <div class="col-md-6 col-6">
                            <ul class="list-unstyled">
                                <li class="level">
                                    {{ $accountant->level }}
                                </li>
                                <li class="experience">
                                    {{ $accountant->years_of_experience }} years
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

                    @include('client::_view-accountantModal')
                    
                    <div class="col-md-2 col-0"></div>
                    <div class="col-md-6 col-6">
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
                                <button class="btn btn-sm btn-started">View</button>
                            </td>
                            </tr>
                            <tr>
                            <td scope="text-muted">Profit and Loss review for January</td>
                            <td>
                                <button class="btn btn-sm btn-started">View</button>
                            </td>
                            
                            </tr>
                            <tr>
                            <td scope="text-muted">Bank Statement reconcilation</td>
                            <td>
                                <button class="btn btn-sm btn-started">View</button>
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

    <div id="owl-demo">
          
  {{-- <div class="item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, id?</div>
  <div class="item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, eaque.</div>
  <div class="item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, voluptatum.</div>
  <div class="item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, voluptatum.</div>
  <div class="item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, voluptatum.</div>
  <div class="item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, voluptatum.</div> --}}

 
</div>
</section>




@endsection