@extends("layouts.app-acct")

@section("content")
<section id="top">
    <div class="container py-3">
        <h3 class="h3">Sales</h3>
    </div>
</section>

<section>
        <div class="container my-3">
            <div class="client-info bg-white p-3 loa" id="topp">
                <h6 class="h6">Total Expenses Amount</h6>
                <h2 class="h2">&#8358; 1,275,000</h2>
            </div>
        </div>
</section>

<section>
    <div class="container">    
        <div class="row">
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
    </div>
</section>

<section id="sale-table">
        <div class="container mt-4">
                        
                    <div class="bg-white p-4"> 
                
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Date</th>
                            <th scope="col">Transaction details</th>
                            <th scope="col">Amount(&#8358;)</th>
                            <th scope="col">Category</th>
                            <th scope="col">Payment Mode</th>

                
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td >21/08/2020 </td>
                            <td>Lorem ipsum, dolor sit amet consectetur adipisicin. </td> 
                           <td> 43,000</td>
                           <td>Transportation</td>
                           <td> Skye Bank</td>
                          </tr>

                            <tr>
                                <td >21/08/2020 </td>
                                <td>Lorem ipsum, dolor sit amet consectetur adipisicin. </td> 
                               <td> 40,000</td>
                               <td>Transportation</td>
                               <td> Access Bank</td>
    
                            </tr>

                            <tr>
                                <td >21/08/2020 </td>
                            <td>Lorem ipsum, dolor sit amet consectetur adipisicin. </td> 
                           <td> 43,000</td>
                           <td>Transportation</td>
                           <td> Skye Bank</td>

                            </tr>

                            <tr>
                                    <td >21/08/2020 </td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicin. </td> 
                                   <td> 43,000</td>
                                   <td>Transportation</td>
                                   <td> Skye Bank</td>
                                </tr>

                                <tr>
                                        <td >21/08/2020 </td>
                                        <td>Lorem ipsum, dolor sit amet consectetur adipisicin. </td> 
                                       <td> 43,000</td>
                                       <td>Transportation</td>
                                       <td> Skye Bank</td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>Lorem ipsum, dolor sit amet consectetur adipisicin. </td> 
                                           <td> 43,000</td>
                                           <td>Transportation</td>
                                           <td> Skye Bank</td>
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
        


@endsection