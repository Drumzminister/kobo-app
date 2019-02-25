@extends("layouts.app")

@section("content")
<section id="top">
    <div class="container py-3">
        <div class="row">
                <h3><a href="/client/debtors" class="text-dark">Debtors</a></h3>
               @include('client::accountant-button')
        </div>
    </div>
</section>

<section>
    <div class="container px-4 py-3">
        <form action="" method="post">
                <div class="form row py-3">
                    <div class="col-md-3">
                        <div class="p-2 bg-white" id="topp">
                            <h5 class="h5">Total Debtors Amount</h5>
                            <h4 class="text-orange">&#8358;{{ number_format($totalInvoice) }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-2 bg-white" id="topp">
                            <h5 class="h5">Total Amount Paid</h5>
                            <h4 class="text-orange">&#8358;{{ number_format($totalPaid) }}</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-2 bg-white" id="topp">
                            <h5 class="h5 ">Total Amount Owed</h5>
                            <h4 class="text-orange">&#8358; {{ number_format($debtTotal) }}</h4>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>

<section id="sale-table">
        <div class="container mt-4">
            <div class="bg-white p-4">
                <div class="row py-2">
                    <div class="col-md-10 col-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text vat-input append-border px-5" id="basic-addon2">Search</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div id="" class="float-right" onclick="">
                            <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>         
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
