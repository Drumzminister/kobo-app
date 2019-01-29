@extends('accountant::layouts.app-acct')


@section('content')
<section id="top">
    <div class="container py-3">
            <h3 class="h3">Toolkits</h3>
        
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
                        <button  class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>         
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-3">
            <div class="bg-white py-4 px-5">
                <h4 class="h4">Toolkit</h4>
                <p class="text-muted">These are some tools that help as an accountant <br>
                become better and faster
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-white loa p-3">
                            <h5 class="h5">Analytical Tools</h5>
                            <div class="row pt-2">
                                <div class="col-md-5">
                                    <img src="{{asset('img/toolkit1.png')}}" alt="services-img" srcset="" class="img-fluid">
                                </div>
                                <div class="col-md-7">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <a href="" class="btn btn-addsale">Get the tool</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white loa p-3">
                            <h5 class="h5">Analytical Tools</h5>
                            <div class="row pt-2">
                                <div class="col-md-5">
                                    <img src="{{asset('img/toolkit2.png')}}" alt="services-img" srcset="" class="img-fluid">
                                </div>
                                <div class="col-md-7">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <a href="" class="btn btn-addsale">Get the tool</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="bg-white loa p-3">
                            <h5 class="h5">Analytical Tools</h5>
                            <div class="row pt-2">
                                <div class="col-md-5">
                                    <img src="{{asset('img/toolkit1.png')}}" alt="services-img" srcset="" class="img-fluid">
                                </div>
                                <div class="col-md-7">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <a href="" class="btn btn-addsale">Get the tool</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white loa p-3">
                            <h5 class="h5">Analytical Tools</h5>
                            <div class="row pt-2">
                                <div class="col-md-5">
                                    <img src="{{asset('img/toolkit2.png')}}" alt="services-img" srcset="" class="img-fluid">
                                </div>
                                <div class="col-md-7">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <a href="" class="btn btn-addsale">Get the tool</a>
                                </div>
                            </div>
                        </div>
                    </div>
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