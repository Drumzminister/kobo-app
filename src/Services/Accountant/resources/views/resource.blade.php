@extends('accountant::layouts.app-acct')


@section("content")
<section id="top">
    <div class="container py-3">
        <h3 class="h3">Resource and Training Modules</h3>
    
        <div class="row">
            <div class="col-md-10 col-6">
                <div class="input-group mt-2">
                    <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text vat-input append-border px-5" id="basic-addon2">Search</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div id="" class="mt-2 float-right" onclick="">
                    <button  class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>         
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container my-3">
        <div class="bg-white py-4 px-5">
            <div class="row">
                <div class="col-md-7">
                    <h5 class="h5">Resources</h5>
                    <p class="text-muted">20 Resources Found</p>

                </div>
                <div class="col-md-4"> 
                    <a href="" class="btn btn-addsale">All</a>
                    <a href="" class="btn btn-loginn">Ongoing</a>
                    <a href="" class="btn btn-loginn">Finished</a>
                </div>
                    <div class="col-md-1">
                    {{-- <a href="" class="mt-5"><i class="fa fa-plus-circle" style="font-size:48px;color:#00C259;"></i></a> --}}
                    <span class=" rounded-circlee float-right p-2 ">
                        <a href="" class=""><i class="fa fa-plus fa-2x p-1" style="font-size:; color:#00C259;"></i></a>
                    </span>
                </div>
            </div>

            {{-- card --}}
            <div class="card-deck">
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
            <div class="py-2">
                <a class="text-muted float-right" href="/"><strong>See All</strong></a>
            </div>

            {{-- training modules --}}
            <div class="container my-5">
                <div class="row ">
                    <div class="col-md-7">
                        <h5 class="h5">Training Module</h5>
                        <p class="text-muted">20 Resources Found</p>

                    </div>
                    <div class="col-md-4"> 
                            <a href="" class="btn btn-addsale">All</a>
                            <a href="" class="btn btn-loginn">Ongoing</a>
                            <a href="" class="btn btn-loginn">Finished</a>
                        </div>
                            <div class="col-md-1">
                            {{-- <a href="" class="mt-5"><i class="fa fa-plus-circle" style="font-size:48px;color:#00C259;"></i></a> --}}
                            <span class=" rounded-circlee float-right p-2 ">
                                <a href="" class=""><i class="fa fa-plus fa-2x p-1" style="font-size:; color:#00C259;"></i></a>
                            </span>
                        </div>
                    </div>
                {{-- </div> --}}
        
                    {{-- card --}}
                <div class="card-deck">
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
                <div class="pt-2">
                    <a class="text-muted float-right" href="/"><strong>See All</strong></a>
                </div>
            </div>    
        </div>
    </div>
</section>

    

@endsection