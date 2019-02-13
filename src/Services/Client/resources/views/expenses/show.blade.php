@extends('client::layouts.app')

@section('content')

    {{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2>Expenses</h2>
                @include('client::accountant-button')
            </div>
        </div>
    </section>
    {{-- end of heading section --}}

    {{-- expense chart --}}
    <section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-7">
                    <div class="bg-white px-3 py-4" id="topp">
                        @if($expenses->count() > 0)
                            <mini-chart-component :options="{ mode: 'year', page: 'expenses', dateRangeStart: '{{ $startDate }}', dateColumn: 'date', xColumn: 'date', yColumn: 'amount', label: '# of Expenses'}"
                                                  :month="{{ $monthExpenses }}"
                                                  :data="{{ $expenses }}"
                                                  :year="{{ $yearExpenses }}"
                                                  :week="{{ $weekExpenses }}"
                                                  :day="{{ $dayExpenses }}">
                            </mini-chart-component>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="h5">No Loan Taken</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="bg-white p-3" id="topp">
                        {{-- <h4 class="sale-h4">Most Expenses Transaction</h4> --}}
                        <div class="dropdown show text-orange">
                            <a class="text-orange dropdown-toggle bg-white" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Most Recent Expenses
                            </a>
                            <div class="dropdown-menu text-green" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" @click="sortLatest(1)" class="text-green">Highest Expenses</a>
                                <a class="dropdown-item" @click="sortLatest(0)" class="text-green">Lowest Expenses</a>
                            </div>
                        </div>
                        <div class="all-scroll">
                            <table class="table table-striped table-hover">
                                <thead class="sale-head">
                                <tr>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="expense in latest" @click="showExpenseDetails(expense)" style="cursor: pointer;">
                                        <td>@{{ expense.details | truncate }}</td>
                                        <td>@{{ expense.amount }}</td>
                                        <td>@{{ expense.has_finished_payment? 'Paid': 'Owing' }}</td>
                                    </tr>
                                    <tr v-if="latest.length === 0">
                                        <td colspan="3">
                                            No expense Available
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sale-table">
        <div class="container mt-4">

            <div class="bg-white p-4">
                <div class="row py-3" v-if="expenses.length > 0">
                    <div class="col-md-3">
                        <a href="{{ route('client.expenses.add') }}" class="btn btn-addsale px-3"  data-step="3" data-intro="Want your transaction? Here is it."  data-position='left' >Add Expenses</a>
                    </div>
                </div>

                <div class="table-responsive table-responsive-sm" v-if="expenses.length > 0">
                    <table class="table table-striped table-hover" id="expenseTable">
                        <thead class="p-3">
                        <tr class="tab">
                            <th scope="col">Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount (&#8358;)</th>
                            <th scope="col">Category</th>
                            <th scope="col">Payment Status</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr v-for="expense in expenses">
                                <td>@{{ expense.date }}</td>
                                <td>@{{ expense.details }}</td>
                                <td>@{{ expense.amount, 2 }}</td>
                                <td>@{{ expense.classification }}</td>
                                <td v-if="expense.has_finished_payment">Paid</td>
                                <td v-else>@{{ expense.amount_paid > 0 ? 'Incomplete' : 'Not paid' }}<button class="btn mr-4 pull-right btn-sm btn-primary" @click=payUnpaidExpenses(expense.id)>Pay</button></td>

                            </tr>
                            <tr v-if="expenses.length === 0" id="noExpense">
                                <td colspan="5">
                                    You have no expense. <br> Use the add expense button to add new expenses.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
                    <p class="alert alert-info">
                        You have made no expense. Add an expense using the add expense button.
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('client.expenses.add') }}" class="btn btn-addsale px-3"  data-step="3" data-intro="Want your transaction? Here is it."  data-position='left' >Add Expenses</a>
                    </div>
                </div>
                <hr class="mt-0">
                <div class="text-center pb-3" v-if="expenses.length > 10">
                    <a href="/view-expenses" class="view-more" >View More</a>
                </div>
            </div>
        </div>
    </section>
    <div class="modal left fade" id="expenseDetailsModal" tabindex="-1" role="dialog" aria-labelledby="expenseDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="nav flex-sm-column flex-row">
                        <div class="product-details">
                            <h5>Expense Description</h5>
                            <p class="ml-3">@{{ currentExpense.details }}</p>

                            <h5>Cost</h5>
                            <p class="ml-3">&#8358; @{{ currentExpense.amount }}</p>

                            <h5>Amount Paid</h5>
                            <p class="ml-3">&#8358; @{{ currentExpense.amount_paid }}</p>

                            <h5>Payment Status</h5>
                            <p class="ml-3">@{{ currentExpense.has_finished_payment? 'Paid': 'Owing' }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <expense-payment :expense="currentExpense" :row="currentExpenseRow" :options="{payOnly: true}" :banks="{{$banks}}"></expense-payment>
        </div>
    </div>
@endsection
@section('other_js')
    <script>
        window.latest = @json($latest);
        window.expenses = @json($expenses);
    </script>
@endsection
