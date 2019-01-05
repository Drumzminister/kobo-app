@extends("layouts.app-acct")

@section("content")
<section id="top">
    <div class="container py-3">
        <h3 class="h3">Sales</h3>
    
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
                            <th scope="col">Invoice</th>
                            <th scope="col">QTY sold</th>
                            <th scope="col">Sales Price (&#8358;)</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Channel</th>

                
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td >
                                  21/08/2020
                              </td>
                            <td>
                                <a href="">invoice 1234</a>
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
                            <td>
                                IG
                            </td>
                          </tr>

                            <tr>
                               <td >21/08/2020 </td>
                               <td>
                                    <a href="">invoice 1234</a>
                                </td> 
                              <td> 23</td>
                              <td> 43,000</td>
                              <td> Mercy Ikpe</td>
                              <td> IG</td>
                            </tr>

                            <tr>
                                <td >21/08/2020 </td>
                                <td>
                                    <a href="">invoice 1234</a>
                                </td>
                                <td> 23</td>
                                <td> 43,000</td>
                                <td> Mercy Ikpe</td>
                                <td> IG</td>
                            </tr>

                            <tr>
                                    <td >21/08/2020 </td>
                                    <td>
                                        <a href="">invoice 1234</a>
                                    </td>
                                    <td> 23</td>
                                    <td> 43,000</td>
                                    <td> Mercy Ikpe</td>
                                    <td> IG</td>
                                </tr>

                                <tr>
                                        <td >21/08/2020 </td>
                                        <td>
                                            <a href="">invoice 1234</a>
                                        </td>
                                        <td> 23</td>
                                        <td> 43,000</td>
                                        <td> Mercy Ikpe</td>
                                        <td> IG</td>
                                    </tr>
                                    <tr>
                                            <td >21/08/2020 </td>
                                            <td>
                                                <a href="">invoice 1234</a>
                                            </td>
                                            <td> 23</td>
                                            <td> 43,000</td>
                                            <td> Mercy Ikpe</td>
                                            <td> IG</td>
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