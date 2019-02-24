@extends('layouts.app')
<style>
    label {display: block; padding: 5px; position: relative; padding-left: 10px;}
    label input {display: none;}
    label span {border: 1px solid #ccc; width: 17px; height: 17px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
    input:checked + span {background: #ccf; border-color: #ccf;}
    
    input {
        /* border: none; */
        background: transparent;
    }
</style>    
@section('content')

{{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2>Debtors</h2>
                @include('client::accountant-button')
            </div>
        </div>
    </section>
{{-- end of heading section --}}

{{-- sales chart --}}
    <section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="bg-white px-3 py-2" id="topp">
                        @if($debtors->count() > 0)
                            <mini-chart-component :options="{ mode: 'day', page: 'debts', dateRangeStart: '{{ $startDate }}', dateColumn: 'created_at', xColumn: 'created_at', yColumn: 'amount', label: '# of Debt'}"
                                                  :month="{{ $monthDebtors }}"
                                                  :data="{{ $debtors }}"
                                                  :year="{{ $yearDebtors }}"
                                                  :week="{{ $weekDebtors }}"
                                                  :day="{{ $dayDebtors }}">
                            </mini-chart-component>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="h5">No Debt Record</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white p-3" id="topp">
                        {{-- <h4 class="sale-h4">Most Expenses Transaction</h4> --}}
                        @if($debtors->count() > 0)
                        <div class="dropdown show text-orange">
                                <span class="text-orange bg-white" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Most Recent Debtors                                    
                                </span>
                                {{--<div class="dropdown-menu text-green" aria-labelledby="dropdownMenuLink">--}}
                                    {{--<a class="dropdown-item" href="#" class="text-orange">Highest Debtors</a>--}}
                                    {{--<a class="dropdown-item" href="#" class="text-orange">Fastest Paying Debtors</a>--}}
                                {{--</div>--}}
                        </div>
                        <div class="all-scroll">
                                <table class="table table-striped table-hover" id="table">
                                        <thead class="sale-head">
                                          <tr>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Amount</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($debtors->chunk(5)->first() as $tdebtor)
                                          <tr>
                                            <td>{{ $tdebtor->customer->name }}</td>
                                            <td>{{ number_format($tdebtor->amount) }}</td>
                                          </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                        </div>
                        @else
                            <h5 class="text-center">
                                Your most recent Debs will appear here!
                            </h5>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="sale-table">
        <div class="container mt-3">
                
            <div class="bg-white p-4">
                    <div class="row pb-2">
                            <div class="col-md-6 col-12">
                            <h4 class= "h4">Debtors List </h4>
                            </div>
        
                            <div class="col-md-6 col-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text vat-input append-border px-5" id="basic-addon2">Search</span>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                
                <div class="table-responsive table-responsive-sm">
                        <table class="table table-striped table-hover" id="dataTable">
                                <thead class="p-3">
                                  <tr class="tab">
                                    <th scope="col">Sales Date</th>
                                    <th scope="col">Customer</th>                                    
                                    <th scope="col">Total Invoices Owed (&#8358;)</th>
                                    <th scope="col">Total Payment (&#8358;)</th>
                                    <th scope="col">Amount Receivables</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($debtors as $debtor)
                                  <tr>
                                        <td>{{ $debtor->created_at }}</td>
                                        <td><a href="#">{{ $debtor->customer->name }}</a> </td>
                                        <td>{{ $debtor->sale ? number_format($debtor->sale->total_amount) : 0 }}</td>
                                        <td>{{ $debtor->sale ? number_format($debtor->sale->transactions->pluck('amount')->sum()) : 0 }}</td>
                                        <td>{{ $debtor->sale ? number_format($debtor->sale->balance) : 0}}</td>
                                  </tr>
                                @endforeach
                                </tbody>
                        </table>
                </div>
                    <hr class="mt-0">
                    <div class="text-center pb-3">
                        <a href="/client/debtors/all" class="view-more">View More</a> 
                    </div>
            </div> 
           
        </div>
    </section>
    
@endsection
