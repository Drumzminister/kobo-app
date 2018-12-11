@extends('layouts.app')
<style>
    label {display: block; padding: 5px; position: relative; padding-left: 10px;}
    label input {display: none;}
    label span {border: 1px solid #ccc; width: 17px; height: 17px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
    input:checked + span {background: #ccf; border-color: #ccf;}

    input {
        border: none;
        background: transparent;
    }

    .modal.left .modal-dialog {
        position: fixed;
        margin: auto;
        width: 400px;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal.left .modal-content {
        height: 100%;
        overflow-y: auto;
    }

    .modal.left .modal-body {
        padding: 30px;
    }

    .modal.left.fade .modal-dialog {
        left: -320px;
        transition: opacity 0.5s linear, left 0.5s ease-out;
    }

    .modal.left.fade.show .modal-dialog {
        left: 0;
    }
    .box button{
        background-color: #00C259;
        color: #ffffff;
        width: 40px;
        border: none;
        -webkit-border-radius: 0px 3px 3px 0px;
        -moz-border-radius: 0px 3px 3px 0px;
        border-radius: 0px 3px 3px 0px;
    }
    .box {
        position: fixed;
        top: 88px;
        left: 300px;
        width: 300px;
        padding: 10px 10px;
        background-color: white;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }
    .box li {
        cursor: pointer;
        background-color: #fafafa;
    }
    .box li:hover {
        cursor: pointer;
        background-color: #dedede;
    }
</style>
        
@section('content')
<section id="loan">
    {{-- heading section --}}
    <section id="top">
        <div class="container py-3">
            <div class="row ">
                <h2>Loans</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
            </div>
        </div>
    </section>
    {{-- end of heading section --}}

    {{-- sales chart --}}
    <section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="bg-white px-3 py-4" id="topp">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="h5">Loan Overview</h5>
                            </div>
                            <div class="col-md-3">
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
                            <div class="col-md-6 row">
                                <div class="form-group col">
                                        <select id="inputState" class="form-control btn-loginn">
                                            <option selected>Start Date</option>
                                            <option>January</option>
                                            <option>Feburary</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                        </select>
                                </div>
                                <div class="form-group col">
                                    <select id="inputState" class="form-control btn-loginn">
                                        <option selected class>End Date</option>
                                        <option>January</option>
                                        <option>Feburary</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <canvas id="canvasSale" height="100"></canvas>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="bg-white p-4" id="topp">
                        <div class="row">
                            <div class="col">
                                <h6 class="h6">Total Current Loan
                                    <span class="h6 text-muted">Running</span>
                                </h6>
                            </div>
                            <div class="col">
                                <div class="h5 text-green">NGN <br>
                                    <span class="h5 text-green">@{{amtRunning | numberFormat}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 px-2 py-3" id="topp">
                            <div class="col-md-6">
                                <div class="h5 text-green">NGN <br>
                                    <span class="h5 text-green">@{{amtPaid | numberFormat}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-orange p-2 text-white">
                                    Amount Paid
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 p-3" id="topp">
                            <div class="col-md-6">
                                <div class="h5 text-green">NGN <br>
                                    <span class="h5 text-green">@{{amtOwing | numberFormat }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-blue p-2 text-white">
                                        Amount Owing
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="/" class="view-more">View More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end of sales chart --}}

    <section id="loan-table">
        <div class="container mt-4">
            <div class="row py-3">
                <div class="col">
                    <a href="" class="btn btn-addSale left-modal" data-toggle="modal" data-target="#addLoanModal">Add Loan</a>
                </div>
                {{--<div class="col">
                    <div class="float-right">
                        <button  class="btn btn-started" data-toggle="modal" data-target="#pay-loan">Pay Loan</button>
                    </div>
                </div>--}}
            </div>
            <div class="bg-white mt">
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" v-if="loans.length > 0" id="dataTable">
                        <thead class="p-3">
                            <tr class="tab">
                                <th scope="col">Source</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Amount (&#8358;)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Period</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="loan in loans" style="cursor: pointer;" @click="displayLoanDetails(loan, $event)">
                                <td>@{{loan.source_name}}</td>
                                <td>@{{loan.description}}</td>
                                <td >@{{loan.amount | numberFormat}}</td>
                                <td><a :class="loan.status">@{{loan.status}}</a></td>
                                <td> @{{loan.term}} @{{loan.period}}s </td>
                            </tr>
                        </tbody>
                    </table>
                    <p v-if="loans.length === 0" class="alert alert-info">
                        You have no running loan.
                    </p>
                </div>
                <hr class="mt-0">
                <div class="text-center mb-5 pb-3">
                    <a href="/view-loans" class="view-more">View More</a>
                </div>
            </div>
        </div>
    </section>

    {{--Add loan modal --}}
    <div class="modal left fade" id="addLoanModal" tabindex="-1" role="dialog" aria-labelledby="addLoanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="nav flex-sm-column flex-row">
                        <div class="product-details">
                            <form class="loan-form">
                                <h5 class="h5 uppercase">New Loan</h5>
                                <div class="form-group">
                                  <label class="px-0" for="exampleFormControlInput1">Source</label>
                                  <input type="text" v-model="searchSource" @keyup="searchForSource" class="form-control" id="" placeholder="E.g Microfinance Banks">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" v-model="description" rows="3" placeholder="Briefly Describe the purpose of loan"></textarea>
                                </div>
                                <h5 class="h5 pt-1">Additional</h5>
                                <div class="form-group">
                                    <label class="px-0"  for="exampleFormControlInput1">Interest Rate(%)</label>
                                    <input type="number" v-model="interest" class="form-control" id="" placeholder="10">
                                </div>
                                <div class="form-group">
                                    <label class="px-0" for="exampleFormControlInput1">Loan Amount</label>
                                    <input type="number" v-model="amount" class="form-control" id="" placeholder="200,000">
                                </div>
                                <div class="form-group d-flex row">
                                    <div class="col-6">
                                        <label class="px-0"  for="loanPeriod">Loan Period</label>
                                        <select name="period" class="form-control" style="background-color: #00C259; color: #ffffff;" v-model="period" id="loanPeriod">
                                            <option value="week">Weekly</option>
                                            <option value="month">Monthly</option>
                                            <option value="year">Yearly</option>
                                        </select>
                                    </div>
                                    <div class="ml-auto col-6">
                                        <label class="px-0" for="exampleFormControlInput1">Loan Duration</label>
                                        <input type="number" v-model="term" class="form-control" id="" placeholder="10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="px-0" for="">Number of Payments per @{{period}}</label>
                                    <select v-model="paymentPerYear" class="form-control">
                                        <option v-for="interval in paymentIntervals" :value="interval">@{{ interval }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="px-0" for="">Start date of Loan</label>
                                    <div class="date ">
                                        <div class="dates input-group input-group-lg pb-3">
                                            <input type="date" class="form-control date-picker" v-model="loanDate" id="loanDate" value="" name="event_date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar icon"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>               
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="button" id="cancelLoanModal" class="btn btn-secondary py-2 px-4" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col">
                            <button type="button" @click="saveLoan" class="btn btn-started pull-right ">Add</button>
                        </div>
                    </div>
                    <div class="box" v-if="showSourcesForm">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control rounded-0" v-model="newSource">
                            <button @click="addSource" style="cursor: pointer" class="fa fa-plus p-2"></button>
                        </div>
                        <ul class="p-0 mb-0">
                            <li class="d-block p-1 mb-2" v-for="source in sources" @click="selectSource(source.id, $event)">@{{source.name}}</li>
                            <p v-if="noSourceFound">There's no existing loan source with this name. <br>Create a new loan source using the input field above.</p>
                            <p v-if="sourceSearching">Searching for loan sources...</p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--view loan details modal --}}

    <div class="modal fade" id="viewSourceModal" tabindex="-1" role="dialog" aria-labelledby="viewSourceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="container p-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="px-3 pt-3">
                        {{--<div class="col-md-1">
                            <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                        </div>--}}
                        <div class="col-md-11">
                            <h5 class="text-green h5">@{{currentLoan.source_name}}</h5>
                            <div class="form row pt-3">
                                <div class="col-md-3">
                                    <div class="px-2 py-1" id="topp">
                                        <h6 class="h6">Loan Amount</h6>
                                        <h5 class="text-orange">&#8358;@{{currentLoan.amount | numberFormat}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="px-2 py-1" id="topp">
                                        <h6 class="h6">Loan Period</h6>
                                        <h5 class="text-orange">@{{ currentLoan.term }} @{{ currentLoan.period }}(s)</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="px-2 py-1" id="topp">
                                        <h6 class="h6 "> Amount Paid</h6>
                                        <h5 class="text-orange">&#8358;@{{currentLoan.amount_paid | numberFormat}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class=" py-1" id="topp">
                                        <h6 class="h6 ">Amount Remaining</h6>
                                        <h5 class="text-orange">&#8358;@{{(currentLoan.amount - currentLoan.amount_paid) + (currentLoan.interest * currentLoan.amount / 100)  | numberFormat}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <section id="loan-table" v-if="!loadingLoanDetails && currentLoanPayments.length > 0 ">
                            <div class="container">
                                <div class="long-scroll">
                                    <div class="table-responsive table-responsive-sm" id="topp">
                                        <table class="table table-striped table-hover table-condensed" id="dataTable">
                                            <thead class="p-3">
                                                <tr class="tab">
                                                <th scope="col">Payment Date</th>
                                                <th scope="col">Schedule Payment</th>
                                                <th scope="col">Principal Paid (&#8358;)</th>
                                                <th scope="col">Interest Paid (&#8358;)</th>
                                                <th scope="col">Balance</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="payment in currentLoanPayments">
                                                    <td >@{{ payment.created_at }} </td>
                                                    <td>@{{ payment.schedule_payment }}</td>
                                                    <td>@{{ payment.amount | numberFormat }}</td>
                                                    <td>@{{ payment.amount * currentLoan.interest / 100 | numberFormat }}</td>
                                                    <td>@{{ payment.balance | numberFormat }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <p class="alert alert-info" v-if="!loadingLoanDetails && currentLoanPayments.length === 0">
                            No payments has been made for this loan. <br>Click the payments button to payoff this loan.
                        </p>
                        <h5 class="d-flex justify-content-center mt-3" v-if="loadingLoanDetails">
                            Loading details ...
                        </h5>
                    </div>

                <div class="modal-footer text-center justify-content-between">
                        <button class="btn btn-started" data-toggle="modal" data-target="#pay-loan">Pay Loan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
            </div>
        </div>
    </div>

  {{-- end of view lender modal --}}

    {{-- Pay loan modal --}}
    <div class="modal fade" id="pay-loan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="container p-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="h5 uppercase" id="">Pay @{{currentLoan.source_name}}</h5>

            <div class="modal-body">
                    <form action="" method="post" @submit="payLoan($event)">
                        <div class="form-group row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Amount">Enter Amount</label>
                                    <input type="number" v-model="paymentAmount" name="amount" class="form-control" id="" placeholder="10,000.00" required>
                                    <small v-if="paymentValidationError" class="text-danger">@{{ paymentValidationMessage }}</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="payment mode">Select Payment Mode</label>
                                    <select class="form-control" id="" name="payment_method" required>
                                        <option value="cash" selected>Cash</option>
                                        <option value="bank">Bank Transfer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-around text-center">
                            <button type="submit" class="btn btn-started">Pay</button>
                        </div>
                    </form>               
        </div>
        
      </div>
    </div>
  </div>
</div>
</section>
<script src="/js/loan.js"></script>
@endsection