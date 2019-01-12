@extends('layouts.app')

@section('content')

{{-- modal section --}}
{{-- first modal --}}

{{--Commented this out since it's not needed for now--}}
{{--<div class="modal hide fade m-auto" id="myModal" tabindex="-1" role="dialog">--}}
    {{--<div class=" modal-dialog modal-dialog-centered" role="document">--}}
      {{--<div class="container p-5 modal-content">--}}
            {{--<div class="modal-body text-center">--}}
                {{--<h5 class="modal-h5">Welcome Ekpono &#x1f642; !!!</h5>--}}
                {{--<h5 class="h5 pt-3">SETUP AN OPENING ACCOUNT</h5>--}}
                {{--<p class="modal-account">Setup your account by providing some details about your Debtors, Creditors, Value of existing assets and Rent. This will help the accountant to easily start taking records of you company.</p>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-started mr-auto"> <a href="/assets" target="_blank">Get Started</a> </button>--}}
                {{--<button type="button" class="btn btn-login pr-4 pl-4" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Skip</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{-- second modal --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="container p-5 modal-content">
                        <div class="modal-body text-center">
                            <h5 class="modal-h5">Hi Ekpono &#x1f642; !!!</h5>
                            <p class="modal-account pt-3">You can continue without providing the details but your records might not be detailed. Do you wish to continue ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-started mr-auto" id="first_time_login" name="first_time_login" value=1 data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-login pr-4 pl-4"><a href="/dashboard" target="_blank"> Continue</a></button>
                        </div>
                </div>
        </div>
</div>

{{-- end of modal --}}

{{-- heading section --}}
    <!-- <section id="top">
        <div class="container py-3">
            <div class="row account">
                <h2>Dashboard</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>
                </span>
            </div>
        </div>
    </section> -->
    @component('includes.dashboard-header-2')
      @slot('dashboardTitle')
        Dashboard
      @endslot
    @endcomponent

{{-- end of heading section --}}

{{-- history and performance section --}}
<section>
    <div class="container">
            <div class="row mt-3 ">
                <div class="col-md-4 ">
                    <div class="bg-white py-2">
                        <div class="rounded-circlee ml-5 mt-3"></div>
                        <ul class="history">
                            <h5 class="h5 pl-5 pt-4">HISTORY</h5>
                            <li class="history-list">
                                <a href="" class="history-link " >Recent Transaction</a>
                            </li>
                            <li class="history-list">
                                <a href="" class="history-link">Update Transaction</a>
                            </li>
                            <li class="history-list">
                                <a href="" class="history-link">Last seen</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8 ">
                    <div class="bg-white px-4 py-1">
                        <h5 class= "h5">PERFORMANCE</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div id="test-circle"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">PROFITABILITY</h6>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisit, possimus?</p>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div id="test-circle2"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">PROFITABILITY</h6>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing eus?</p>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div id="test-circle3"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">PROFITABILITY</h6>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, s?</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
{{-- end of history and performance --}}

{{-- transaction section --}}
<section id="transaction">
    <div class="container pt-5">
        <div class="row">
            {{-- transaction --}}
            <div class="col-md-7 ">
                <div class="bg-white p-4" >
                    <h5 class="h5 text-green">TRANSACTION</h5>
                    {{-- transaction chart --}}

                    <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>D</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>W</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>M</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>Y</span></label>
                                    </div>

                            </div>
                    </div>

                    <div>
                            <canvas id="canvas" height="100"></canvas>
                    </div>
                </div>
            </div>
            {{-- end of transaction --}}

            {{-- report --}}
            <div class="col-md-5 ">
                <div class="bg-white p-3">
                    <h5 class="h5 pt-2 text-green">STAT (<span>&#8358;</span>)</h5>
                    <p>Lorem, ipsum dolor sit amet consectet</p>

                    {{-- report date --}}
                    <form action="" method="post">
                        <div class="form-row pt-2">
                          <div class="dates form-group col-md-6">
                                <label for="date" class="date">Start Date</label>
                                {{-- <div class="dates input-group mb-3 input-group-lg"> --}}
                                    <input type="text" class="form-control" id="usr1" name="event_date" placeholder="DD-MM-YYYY" autocomplete="off" >
                                {{-- </div>                           --}}
                            </div>
                            <div class="dates form-group col-md-6">
                                <label for="date" class="date">End Date</label>
                                <input type="text" class="form-control" id="usr1" name="event_date" placeholder="DD-MM-YYYY" autocomplete="off" >
                            </div>
                        </div>
                    {{-- end of report date --}}

                        <div class="row pt-2 px-2">
                            <div class="col-md-4" id="topp">
                                <h5 class="h6 col-net">Total Sales</h5>
                                <span class="col-net">NGN</span>
                                <h5 class="text-muted">18,000</h5>
                            </div>
                            <div class="col-md-4" id="topp">
                                <h5 class="h6 col-net">Total Expenses</h5>
                                <span class="text-warning">NGN</span>
                                <h5 class="text-muted">18,000.45</h5>
                            </div>
                            <div class="col-md-4" id="topp">
                                <h5 class="h6 col-net"> Total Profit</h5>
                                <span class="text-green">NGN</span>
                                <h5 class="text-muted">18,000.53</h5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- end of report --}}
        </div>
    </div>
</section>
{{-- end of transaction section --}}

{{-- services section --}}
<section id="services">
    <div class="container pl-5 bg-white mt-3">
        <div class="row py-4 px-5">
            <div class="col-md-4 text-center">
                <div class="circle loa text-center p-5">
                    <a href="/sales" class="service-link">
                        <img src="{{asset('img/sales.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">SALES</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="circle loa text-center p-5">
                    <a href="/inventory" class="service-link">
                        <img src="{{asset('img/inventory.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">INVENTORY</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="circle loa text-center p-5">
                    <a href="/expenses" class="service-link">
                        <img src="{{asset('img/expenses.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">EXPENSES</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>
            </div>
        </div>

        <div class="row py-3 px-5">
                <div class="col-md-4 text-center">
                    <div class="circle loa text-center p-5">
                        <a href="/loans" class="service-link">
                            <img src="{{asset('img/loans.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                            <h5 class="h5 pt-1">LOANS</h5>
                            <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="circle loa text-center p-5">
                        <a href="/rent" class="service-link">
                            <img src="{{asset('img/rent.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                            <h5 class="h5 pt-1">RENT</h5>
                            <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="circle loa text-center p-5">
                        <a href="/banking" class="service-link">
                            <img src="{{asset('img/banking.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                            <h5 class="h5 pt-1">BANKING</h5>
                            <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                        </a>
                    </div>
                </div>
            </div>
    </div>
</section>
{{-- end of services section --}}

<!-- <button type="submit" class="btn btn-started mr-auto" value=1 name="first_time_login" id="first_time_login" >Cancel</button> -->


@endsection
@section('other_js')
    {{--<script>
        jQuery(document).ready(function() {
            jQuery('#first_time_login').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('updateFirstTimeLogin') }}",
                    method: 'post',
                    data: {
                        update_first_time_visit: jQuery('#first_time_login').val(),
                    },
                    success: function(result) {

                    }});
            });
        });
    </script>--}}
@endsection
