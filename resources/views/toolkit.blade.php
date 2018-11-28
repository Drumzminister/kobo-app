@extends("layouts.app-acct")

@section('content')
<section id="top">
        <div class="container py-3">
            {{-- <div class="row"> --}}
                <div class="col">
                    <h3 class="h3">Toolkits</h3>
                {{-- </div> --}}
                
            </div>
            <div class="input-group my-3">
                <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Filter<i class="fa fa-filter px-2"></i></span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-3">
            <div class="bg-white p-3">
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

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
    </section>
    

@endsection