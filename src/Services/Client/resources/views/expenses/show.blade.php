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
                <div class="col-md-8">
                    <div class="bg-white px-3 py-4" id="topp">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="h5">Monthly sales</h5>
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
                <div class="col-md-4">
                    <div class="bg-white p-3" id="topp">
                        {{-- <h4 class="sale-h4">Most Expenses Transaction</h4> --}}
                        <div class="dropdown show text-orange">
                            <a class="text-orange dropdown-toggle bg-white" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Most Recent Expenses
                            </a>
                            <div class="dropdown-menu text-green" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#" class="text-green">Highest Expenses</a>
                                <a class="dropdown-item" href="#" class="text-green">Lowest Expenses</a>
                            </div>
                        </div>
                        <div class="all-scroll">
                            <table class="table table-striped table-hover">
                                <thead class="sale-head">
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Mode</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@forelse($highExpenses as $expense)
                                    <tr>
                                        <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">{{$expense->class_type}}</a></td>
                                        <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal" >{{$expense->amount}}</a></td>
                                        <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">{{$expense->payment_mode}}</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            No expense Available
                                        </td>
                                    </tr>
                                @endforelse--}}
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center p-1">
                            <a href="" class="view-more">View More Analytics</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of sales chart --}}
        </div>
    </section>

    <section id="sale-table">
        <div class="container mt-4">

            <div class="bg-white p-4">
                <div class="row py-3">
                    <div class="col-md-3">
                        <a href="{{ route('client.expenses.add') }}" class="btn btn-addsale px-3"  data-step="3" data-intro="Want your transaction? Here is it."  data-position='left' >Add Expenses</a>
                    </div>

                    {{-- <div class="col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text vat-input append-border px-5 py-2" id="basic-addon2">Search</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 float-right">
                        <div class="dropdown show float-right">
                                <a class="btn btn-filter" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Filter <i class="fa fa-filter"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#" class="text-green">By Quantity</a>
                                    <a class="dropdown-item" href="#" class="text-green">By Amount</a>
                                </div>
                        </div>
                    </div> --}}
                </div>

                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="expenseTable">
                        <thead class="p-3">
                        <tr class="tab">
                            <th scope="col">Date</th>
                            <th scope="col">Transaction details</th>
                            <th scope="col">Amount (&#8358;)</th>
                            <th scope="col">Category</th>
                            <th scope="col">Payment Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse(Auth::user()->expenses as $expense)
                            <tr>
                                <td>{{$expense->date}}</td>
                                <td>{{$expense->details}}</td>
                                <td>{{number_format($expense->amount, 2)}}</td>
                                <td>{{$expense->class_type}}</td>
                                <td> {{ $expense->hasPaid ? 'Paid' : 'Not Paid' }}</td>
                            </tr>
                        @empty
                            <tr id="noExpense">
                                <td colspan="5">
                                    You have no expense. <br> Use the add expense button to add new expenses.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <hr class="mt-0">
                <div class="text-center pb-3">
                    <a href="/view-expenses" class="view-more">View More</a>
                </div>
            </div>

        </div>
    </section>
    <div class="modal left fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="nav flex-sm-column flex-row">
                        <div class="product-details">
                            <h5>Product Name</h5>
                            <p>Wallpaper</p>

                            <h5>Description</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, aliquid cumque asperiores, eius totam m ex itaque.</p>

                            <h5>Amount Sold</h5>
                            <p>&#8358; 50,000</p>

                            <h5>Customer</h5>
                            <p>Mercy Ikpe</p>

                            <h5>Accountant Review</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda et dolore, necessitatibus sit .</p>


                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('other__js')
    <script>
        window.expenses = @json($expenses)
    </script>
@endsection
