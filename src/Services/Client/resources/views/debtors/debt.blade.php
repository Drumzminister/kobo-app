@extends("layouts.app")

@section("content")
{{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h3><a href="/client/debtors" class="text-dark">Debtors</a></h2>
                @include('client::accountant-button')
            </div>
        </div>
    </section>
{{-- end of heading section --}}


<section id="sale-table">
        <div class="container mt-4">
                        
            <div class="bg-white p-4">
                    <div class="row py-4">
                            <div class="col-md-1">
                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                            </div>
                            <div class="col-md-10">
                                <h5 class="text-green h5">Mary Ikpe</h5>

                                <form action="" method="post">
                                    <div class="form row pt-3">
                                        <div class="col-md-4">
                                            <div class="p-2" id="topp">
                                                <h5 class="h5">Amount Owed</h5>
                                                <h4 class="text-orange">&#8358;18,000</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-2" id="topp">
                                                <h5 class="h5">Amount Payable</h5>
                                                <h4 class="text-orange">&#8358;18,000.45</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div> 
                    <div class="row py-3">
                            <div class="col-md-6 col-12">
                            <h4 class= "h4">Debtors Debt </h4>
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
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class=>
                                <td >21/08/2020 </td>                                       
                                <td>
                                    <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                </td>                                   
                                <td> 23,000</td>
                                <td> 43,000</td>
                                <td>50,000</td>
                                 <td class="" >
                                    <div class="dropdown">
                                        <button class="btn bg-transparent p-0 " type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-0"  style="max-width:11px; font-size: 16px" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item text-success" href="/" data-toggle="modal" data-target="#receivePay"><i class="fa fa-money">  Receive pay</i></a>
                                            <a class="dropdown-item text-muted" href="/"><i class="fa fa-edit"></i> Edit </a>
                                            
                                        </div>
                                    </div>
                                </td>

                          </tr>

                            <tr>
                                    <td >21/08/2020 </td>                                       
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                    </td>                                  
                                    <td> 23,000</td>
                                    <td> 43,000</td>
                                    <td>50,000</td>   
                                    <td class="" >
                                    <div class="dropdown">
                                        <button class="btn bg-transparent p-0 " type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-0"  style="max-width:11px; font-size: 16px" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item text-success" href="/" data-toggle="modal" data-target="#receivePay"><i class="fa fa-money">  Receive pay</i></a>
                                            <a class="dropdown-item text-muted" href="/"><i class="fa fa-edit"></i> Edit </a>
                                            
                                        </div>
                                    </div>
                                </td>                                 
                              </tr>

                            <tr>
                                    <td >21/08/2020 </td>                                       
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                    </td>                                     
                                    <td> 23,000</td>
                                    <td> 43,000</td>
                                    <td>50,000</td>
                                    <td class="" >
                                    <div class="dropdown">
                                        <button class="btn bg-transparent p-0 " type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-0"  style="max-width:11px; font-size: 16px" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item text-success" href="/" data-toggle="modal" data-target="#receivePay"><i class="fa fa-money">  Receive pay</i></a>
                                            <a class="dropdown-item text-muted" href="/"><i class="fa fa-edit"></i> Edit </a>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                    <td >21/08/2020 </td>                                       
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                    </td>                                   
                                    <td> 23,000</td>
                                    <td> 43,000</td>
                                    <td>50,000</td>
                                    <td class="" >
                                    <div class="dropdown">
                                        <button class="btn bg-transparent p-0 " type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-0"  style="max-width:11px; font-size: 16px" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item text-success" href="/" data-toggle="modal" data-target="#receivePay"><i class="fa fa-money">  Receive pay</i></a>
                                            <a class="dropdown-item text-muted" href="/"><i class="fa fa-edit"></i> Edit  </a>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                    <td >21/08/2020 </td>                                       
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                    </td>                                   
                                    <td> 23,000</td>
                                    <td> 43,000</td>
                                    <td>50,000</td>
                                    <td class="" >
                                    <div class="dropdown">
                                        <button class="btn bg-transparent p-0 " type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-0"  style="max-width:11px; font-size: 16px" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item text-success" href="/" data-toggle="modal" data-target="#receivePay"><i class="fa fa-money">  Receive pay</i></a>
                                            <a class="dropdown-item text-muted" href="/"><i class="fa fa-edit"></i> Edit </a>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                </table>
             </div>
            </div> 
           
        </div>
    </section>

    {{-- invoice modal --}}

    @include('client::debtors.debt-invoice')
      {{-- end of invoice modal --}}

    @include('client::debtors.receivePay-invoice')



    

@endsection