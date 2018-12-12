@extends("layouts.app-acct")

@section("content")
<section id="top">
    <div class="container py-3">
        <div class="row ">
            <h2><a href="/loans" class="text-dark">Loans</a></h2>
            <span class="accountant ml-auto btn btn-accountant">
            <a href="" class="btn-accountant">
                <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
            </a>                
            </span>
        </div>
    </div>
</section>
    
<section>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-10 col-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Search</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div id="" class=" float-right" onclick="">
                    <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>         
                </div>
            </div>
        </div>
    </div>
</section>

<section id="sale-table">
        <div class="container">
                        
                    <div class="bg-white p-4"> 
                
                <div class="table-responsive table-responsive-sm">
                        <table class="table table-striped table-hover" id="dataTable">
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
                                  <tr>
                                        <td> Microfinance Bank</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                        <td >237,000 </td>
                                        <td ><a href="" class="completed" data-toggle="modal" data-target="#exampleModalCenter">Completed</a></td>
                                        <td> 10 years </td>      
                                  </tr>
        
                                  <tr>
                                        <td> Microfinance Bank</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                        <td>230,000 </td>
                                        <td ><a href="" class="running" data-toggle="modal" data-target="#exampleModalCenter">Running</a> </td>
                                        <td> 10 years </td>      
                                  </tr>
        
                                  <tr>
                                        <td> Microfinance Bank</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                        <td >135,000 </td>
                                        <td ><a href="" class="completed" data-toggle="modal" data-target="#exampleModalCenter">Completed</a> </td>
                                        <td> 10 years </td>      
                                  </tr>
        
                                  <tr>
                                        <td> Microfinance Bank</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                        <td>230,000 </td>
                                        <td ><a href="" class="running" data-toggle="modal" data-target="#exampleModalCenter">Running</a> </td>
                                        <td> 10 years </td>      
                                  </tr>
        
                                  <tr>
                                        <td> Microfinance Bank</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                        <td >135,000 </td>
                                        <td ><a href="" class="completed" data-toggle="modal" data-target="#exampleModalCenter">Completed</a> </td>
                                        <td> 10 years </td>      
                                  </tr>
                                  <tr>
                                        <td> Microfinance Bank</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                        <td >173,000 </td>
                                        <td ><a href="" class="running" data-toggle="modal" data-target="#exampleModalCenter">Running </a></td>
                                        <td> 10 years </td>      
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