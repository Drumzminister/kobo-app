<div class="modal fade" id="loanDetailsModal" tabindex="-1" role="dialog" aria-labelledby="loanDetailsModalLabel" aria-hidden="true">
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
                    <button class="btn btn-started" v-if="(currentLoan.amount - currentLoan.amount_paid) + (currentLoan.interest * currentLoan.amount / 100) !== 0 " data-toggle="modal" data-target="#pay-loan">Pay Loan</button>
                    <button class="btn btn-success" v-if="(currentLoan.amount - currentLoan.amount_paid) + (currentLoan.interest * currentLoan.amount / 100) === 0 " >Payment Completed</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>

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
                                    <input type="number" step="0.01" v-model="paymentAmount" name="amount" class="form-control" id="" placeholder="10,000.00" required>
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