@extends("client::layouts.app")

@section("content")
<section id="top">
    <div class="container py-3">
        <div class="row">
                <h2><a href="/client/inventory" class="text-dark"> Purchase</a></h2>
                @include('client::accountant-button')
        </div>
    </div>
</section>

<section>
    <div class="container mt-3">
        <div class="bg-white p-4">
                <form action="" method="post">
                        <div class="form row ">
                            <div class="col-md-4">
                                <div class="p-3 bg-white text-muted" id="topp">
                                    <h5 class="h5">Total Purchase</h5>
                                    <h2 class="">&#8358;18,000,000</h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-grey text-dark" id="topp">
                                    <h5 class="h5">Total Payments</h5>
                                    <h2 class="">&#8358;18,000,000</h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-green text-white" id="topp">
                                    <h5 class="h5 ">Total Debts </h5>
                                    <h2 class="">&#8358;18,000,000</h4>
                                </div>
                            </div>
                        </div>
                </form>
        
        </div>
    </div>
</section>

<section id="sale-table">
        <div class="container mt-4">                       
            <div class="bg-white p-4"> 
                <div class="row pb-2">
                    <div class="col-md-10 col-6">
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Search</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div id="" class="mt-2 float-right" onclick="">
                            <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>         
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive table-responsive-sm">
                        <table class="table table-striped table-hover" id="dataTable">
                                <thead class="p-3">
                                  <tr class="tab">
                                    <th scope="col">Date</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">QTY Bought</th>
                                    <th scope="col">Sales Price (&#8358;)</th>
                                    <th scope="col">Vendors</th>
                                    <th scope="col"></th>               
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                      <td >
                                          21/08/2020
                                      </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                    </td>
                                    <td>
                                        23
                                    </td>
                                    <td>
                                        43,000
                                    </td>
                                    <td>
                                        Mercy Ikpe
                                    </td>
                                    <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                </tr>
        
                                    <tr>
                                       <td >21/08/2020 </td>
                                       <td>
                                            <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                        </td> 
                                      <td> 23</td>
                                      <td> 43,000</td>
                                      <td> Mercy Ikpe</td>
                                      <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>
        
                                    <tr>
                                        <td >21/08/2020 </td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                        </td>
                                        <td> 23</td>
                                        <td> 43,000</td>
                                        <td> Mercy Ikpe</td>
                                        <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                            </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                            </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                            </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                            </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                            </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                            </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModalCenter">invoice 1234</a>
                                            </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-trash" style="font-size:24px"></i></td>
                                    </tr>

                                    
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
        

           {{-- invoice modal --}}

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                            <div class="container p-3">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
    
                                <div class="row px-5 pt-3">
                                    <div class="col-md-2">
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                    </div>
                                    <div class="col-md-10">
                                        <h5 class="text-green h5">Mary Ikpe</h5>
                                        <h6 class="text-primary h6">Invoice NO:KB &#x2d; 1234</h6>
    
                                        <form action="" method="post">
                                            <div class="form row pt-3 px-3">
                                                <div class="col-md-4">
                                                    <div class="p-2" id="topp">
                                                        <h5 class="h5">Total Amount</h5>
                                                        <h4 class="text-orange">&#8358;18,000</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="p-2" id="topp">
                                                        <h5 class="h5">Amount Paid</h5>
                                                        <h4 class="text-orange">&#8358;18,000.45</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="p-2" id="topp">
                                                        <h5 class="h5 "> Balance</h5>
                                                        <h4 class="text-orange">&#8358;18,000.53</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                           
                                <div class="modal-body">
                            <section id="sale-table">
                                    <div class="container">                                               
                                        <div class="long-scroll">
                                            <div class="table-responsive table-responsive-sm" id="topp">
                                                <table class="table table-striped table-hover table-condensed" id="dataTable">
                                                    <thead class="p-3">
                                                        <tr class="tab">
                                                        <th scope="col">Payment Date</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">QTY</th>
                                                        <th scope="col">Sales Price (&#8358;)</th>
                                                        <th scope="col">Balance</th>
                            
                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                            
                                                        <tr>
                                                            <td >21/08/2020 </td>
                                                            <td>
                                                            Lorem ipsum dolor si
                                                            </td> 
                                                            <td> 23</td>
                                                            <td> 43,000</td>
                                                            <td>123,0000</td>
                                                            
                                                        </tr>
    
                                                        <tr>
                                                            <td>21/08/2020 </td>
                                                            <td>
                                                                    Lorem ipsum dolor si
                                                                    </td> 
                                                                    <td> 23</td>
                                                                    <td> 43,000</td>
                                                                    <td>123,0000</td>
                                                                    
                                                            </tr>
                            
                                                        <tr>
                                                            <td >21/08/2020 </td>
                                                            <td>
                                                                    Lorem ipsum dolor si
                                                                    </td> 
                                                                    <td> 23</td>
                                                                    <td> 43,000</td>
                                                                    <td>123,0000</td>        
                                                        </tr>
                            
                                                        <tr>
                                                            <td >21/08/2020 </td>
                                                            <td>
                                                                    Lorem ipsum dolor si
                                                                    </td> 
                                                                    <td> 23</td>
                                                                    <td> 43,000</td>
                                                                    <td>123,0000</td>        
                                                        </tr>
                                                        <tr>
                                                            <td >21/08/2020 </td>
                                                            <td>
                                                                    Lorem ipsum dolor si
                                                                    </td> 
                                                                    <td> 23</td>
                                                                    <td> 43,000</td>
                                                                    <td>123,0000</td>
              
                                                        </tr>                                                    <tr>
                                                        <tr>
                                                                <td >21/08/2020 </td>
                                                                <td>
                                                                        Lorem ipsum dolor si
                                                                        </td> 
                                                                        <td> 23</td>
                                                                        <td> 43,000</td>
                                                                        <td>123,0000</td>
                                                                        
                                                       </tr>
                                                       <tr>
                                                                <td >21/08/2020 </td>
                                                                <td>
                                                                        Lorem ipsum dolor si
                                                                        </td> 
                                                                        <td> 23</td>
                                                                        <td> 43,000</td>
                                                                        <td>123,0000</td>            
                                                       </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                   
                                    </div>
                                </section>                                    
                            </div>
    
                            <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                          </div>
                </div>
            </div>
        </div>
    
          {{-- end of invoice modal --}}
    

@endsection
