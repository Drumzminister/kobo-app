@extends("layouts.app-acct")

@section("content")
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <div class="row p-1">
                    <h2><a href="/vendors" class="text-dark"> Vendors</a></h2>
                    <span class="accountant ml-auto ">
                <a href="/add-vendors" class="btn btn-started">
                    Add Vendor
                </a>                
                </span>
            </div>
        </div>
    </section>
{{-- end of heading section --}}

<section id="sale-table">
        <div class="container mt-4">             
            <div class="bg-white p-4">
                <div class="row p-3">
                    <div class="col-md-3 p-3 bg-green">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="h4 text-white">Total Number of customers</h4>
                            </div>
                            <div class="col-md-4">
                                <h1 class="h1 text-orange">32</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>     
                    <div class="row py-3">
                            <div class="col-md-6 col-12">
                            <h4 class= "h4">Vendors List </h4>
                            </div>
        
                            <div class="col-md-6 col-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Search</span>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Vendor's Name</th>
                            <th scope="col">Address</th>                                    
                            <th scope="col">Phone No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                                <td >Amaka Ekpono</td>                                       
                                <td>8A lagos state  </td>                                   
                                <td> 08082023909</td>
                                <td> syfon@gmail.com</td>
                                <td>koboaccountant.com</td>
                                <td><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                      </label>
                                </td>
                          </tr>

                            <tr>
                                    <td >Amaka Ekpono</td>                                       
                                    <td>8A lagos state  </td>                                   
                                    <td> 08082023909</td>
                                    <td> syfon@gmail.com</td>
                                    <td>koboaccountant.com</td>
                                    <td>
                                        <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                        </label>
                                    </td>
                            </tr>
                            <tr>
                                    <td >Amaka Ekpono</td>                                       
                                    <td>8A lagos state  </td>                                   
                                    <td> 08082023909</td>
                                    <td> syfon@gmail.com</td>
                                    <td>koboaccountant.com</td>
                                    <td>
                                            <label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                            </label>                           
                                    </td>                            
                            </tr>
                            <tr>
                                    <td >Amaka Ekpono</td>                                       
                                    <td>8A lagos state  </td>                                   
                                    <td> 08082023909</td>
                                    <td> syfon@gmail.com</td>
                                    <td>koboaccountant.com</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>                            
                            </tr>
                            <tr>
                                    <td >Amaka Ekpono</td>                                       
                                    <td>8A lagos state  </td>                                   
                                    <td> 08082023909</td>
                                    <td> syfon@gmail.com</td>
                                    <td>koboaccountant.com</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                            
                        </tbody>
                </table>
             </div>
             <div class="text-center mt-2">
                    <a href="/view-vendors" class="view-more">View More</a> 
                </div>
            </div> 
           
        </div>
    </section>

  
@endsection