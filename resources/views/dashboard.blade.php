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
                <div class="col-md-4 col-4">
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

                <div class="col-md-8 col-8">
                    <div class="bg-white px-4 py-1">
                        <h5 class= "h5">PERFORMANCE</h5>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <div id="test-circle"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">PROFITABILITY</h6>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisit, possimus?</p>
                                    </div>
                            </div>
                            <div class="col-md-4 col-4">
                                <div id="test-circle2"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">PROFITABILITY</h6>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing eus?</p>
                                    </div>
                            </div>
                            <div class="col-md-4 col-4">
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
                    @if($transactions->count() > 0)
                        <mini-chart-component :options="{ mode: 'day', page: 'transactions', dateRangeStart: '{{ $startDate }}', dateColumn: 'created_at', xColumn: 'created_at', yColumn: 'amount', label: '# of Transaction'}"
                                              :month="{{ $monthTransactions }}"
                                              :data="{{ $transactions }}"
                                              :year="{{ $yearTransactions }}"
                                              :week="{{ $weekTransactions }}"
                                              :day="{{ $dayTransactions }}">
                        </mini-chart-component>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="h5">No Transaction Record</h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- end of transaction --}}

            {{-- report --}}
            <div class="col-md-5 ">
                <stat-component></stat-component>
            </div>
            {{-- end of report --}}
        </div>
    </div>
</section>
{{-- end of transaction section --}}

{{-- services section --}}
<section id="services">
    <div class="container bg-white mt-3 text-center py-4 pl-5 ">
        <div class="row col-12 text-center px-5 d-flex justify-content-center">
            <div class="col-md-4 text-center col-4 ">
                <div class="circle loa text-center p-5">
                    <a href="/client/sales" class="service-link">
                        <img src="{{asset('img/sales.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">SALES</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-4">
                <div class="circle loa text-center p-5">
                    <a href="/client/inventory" class="service-link">
                        <img src="{{asset('img/inventory.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">INVENTORY</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-4">
                <div class="circle loa text-center p-5">
                    <a href="/client/expenses" class="service-link">
                        <img src="{{asset('img/expenses.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">EXPENSES</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>
            </div>
        </div>

        <div class="row py-3 px-5">
                <div class="col-md-4 text-center col-4">
                    <div class="circle loa text-center p-5">
                        <a href="/client/loans" class="service-link">
                            <img src="{{asset('img/loans.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                            <h5 class="h5 pt-1">LOANS</h5>
                            <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-4">
                    <div class="circle loa text-center p-5">
                        <a href="/client/rent" class="service-link">
                            <img src="{{asset('img/rent.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                            <h5 class="h5 pt-1">RENT</h5>
                            <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-4">
                    <div class="circle loa text-center p-5">
                        <a href="/client/bank" class="service-link">
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
