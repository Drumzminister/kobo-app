@extends('client::layouts.app')
@section('other_styles')
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
@endsection

@section('content')
    <section id="loan">
        {{-- heading section --}}
        <section id="top">
            <div class="container py-3">
                <div class="row ">
                    <h2>Loans</h2>
                  @include('client::accountant-button')
                </div>
            </div>
        </section>
        {{-- end of heading section --}}
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
                                        <span class="h5 text-green">@{{loanAmtRunning | numberFormat}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 px-2 py-3" id="topp">
                                <div class="col-md-6">
                                    <div class="h5 text-green">NGN <br>
                                        <span class="h5 text-green">@{{loanAmtPaid | numberFormat}}</span>
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
                                        <span class="h5 text-green">@{{loanAmtOwing | numberFormat }}</span>
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

        <section id="loan-table">
            <div class="container mt-4">
                <div class="row py-3">
                    <div class="col">
                        <button  class="btn btn-addsale left-modal" @click="openModal('#addLoanModal')" >Add Loan</button>
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
                        <a href="/loans/all" class="view-more">View More</a>
                    </div>
                </div>
            </div>
        </section>

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
                                        <input type="text" v-model="searchSource" @keyup="debouncedSearch" class="form-control" id="" placeholder="E.g Microfinance Banks">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" v-model="loanDescription" rows="3" placeholder="Briefly Describe the purpose of loan"></textarea>
                                    </div>
                                    <h5 class="h5 pt-1">Additional</h5>
                                    <div class="form-group">
                                        <label class="px-0"  for="exampleFormControlInput1">Interest Rate(%)</label>
                                        <input type="number" step="0.01" v-model="loanInterest" class="form-control" id="" placeholder="10">
                                    </div>
                                    <div class="form-group">
                                        <label class="px-0" for="exampleFormControlInput1">Loan Amount</label>
                                        <input type="number" step="0.01" v-model="loanAmount" class="form-control" id="" placeholder="200,000">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12" for="exampleFormControlInput1">Loan Duration</label>
                                        <div class="d-flex">
                                            <div class="col-6">
                                                <input type="number"  v-model="loanTerm" class="form-control" id="" placeholder="10">
                                            </div>
                                            <div class="ml-auto col-6">
                                                <select name="period" class="form-control" style="background-color: #00C259; color: #ffffff;" v-model="loanPeriod" id="loanPeriod">
                                                    <option value="week">Weeks</option>
                                                    <option value="month">Months</option>
                                                    <option value="year">Years</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="px-0" for="interval">Payment Interval</label>
                                        <div class="btn-group dropright">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" @click="toggleShowIntervalSelector()">
                                                @{{ loanPaymentInterval }}
                                            </button>
                                            <ul class="dropdown-menu"  style="display: block; overflow: auto; max-height: 320px;" v-if="showIntervalSelector">
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer">Weekly</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer">Bi-weekly</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer">Monthly</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer">Bi-Monthly</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer">Quaterly</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer">Anually</li>
                                                <li class="dropdown-divider" v-if="!showMoreIntervals"></li>
                                                <li class="dropdown-item" @click="toggleShowMoreIntervals($event)" v-if="!showMoreIntervals" style="cursor: pointer;">Show More >></li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer" v-if="showMoreIntervals">4 Months</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer" v-if="showMoreIntervals">5 Months</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer" v-if="showMoreIntervals">6 Months</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer" v-if="showMoreIntervals">7 Months</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer" v-if="showMoreIntervals">8 Months</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer" v-if="showMoreIntervals">9 Months</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer" v-if="showMoreIntervals">10 Months</li>
                                                <li class="dropdown-item" @click="selectLoanPaymentInterval($event)" style="cursor: pointer" v-if="showMoreIntervals">11 Months</li>
                                                <li class="dropdown-divider" v-if="showMoreIntervals"></li>
                                                <li class="dropdown-item" @click="toggleShowMoreIntervals($event)" v-if="showMoreIntervals" style="cursor: pointer;">Show Less <<</li>
                                            </ul>
                                        </div>
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
                                    <div class="form-group">
                                        <label class="px-0" for="account">Receiving Account</label>
                                        <select name="receivingAccount" class="form-control" v-model="accountReceivingLoan" id="account">
                                            <option v-for="bank in banks" :value="bank" >@{{ bank.account_name }}</option>

                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="button" id="cancelLoanModal" class="btn btn-secondary py-2 px-4" @click="closeLoanModal()" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-8">
                                <button type="button" v-if="isRequestingLoan" class="btn btn-started pull-right ">Loading...<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
                                <button type="button" v-else @click="saveLoan" class="btn btn-started pull-right ">Add</button>
                            </div>
                        </div>
                        <div class="box" v-if="showSourcesForm">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control rounded-0 loader" v-model="newSource">
                                <button v-if="isRequestingLoan"  style="cursor: default"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
                                <button  v-else @click="addSource" style="cursor: pointer" class="fa fa-plus p-2"></button>

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


        @include('client::loans._loans_details')
    </section>
@endsection
@section('other_js')
    <script>
        window.loans = @json($loans);
        window.loanSources = @json($loanSources);
        window.loanAmtPaid = @json($runningLoanPaid);
        window.loanAmtOwing = @json($runningLoanOwing);
        window.loanAmtRunning = @json($runningLoanCount);
        window.banks = @json($banks);
        window.addLoanUrl = "{{ route('client.loan.add') }}";
    </script>
@endsection
