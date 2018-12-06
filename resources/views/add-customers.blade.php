
@extends("layouts.app-acct")

@section("content")
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2><a href="/customers" class="text-dark"> Customers</a></h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>              
                </span>
            </div>
        </div>
    </section>
{{-- end of heading section --}}

<section id="sale-table">
        <div class="container mt-4">             
            <div class="bg-white p-4">
                
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Customer Name</th>
                            <th scope="col">Address</th>                                    
                            <th scope="col">Phone No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                                <td >Amaka Ekpono</td>                                       
                                <td>8A lagos state  </td>                                   
                                <td> 08082023909</td>
                                <td> syfon@gmail.com</td>
                                <td>koboaccountant.com</td>
                          </tr>

                            <tr>
                                    <td >Amaka Ekpono</td>                                       
                                    <td>8A lagos state  </td>                                   
                                    <td> 08082023909</td>
                                    <td> syfon@gmail.com</td>
                                    <td>koboaccountant.com</td>
                            <tr>
                                    <td >Amaka Ekpono</td>                                       
                                    <td>8A lagos state  </td>                                   
                                    <td> 08082023909</td>
                                    <td> syfon@gmail.com</td>
                                    <td>koboaccountant.com</td>
                            <tr>
                                    <td >Amaka Ekpono</td>                                       
                                    <td>8A lagos state  </td>                                   
                                    <td> 08082023909</td>
                                    <td> syfon@gmail.com</td>
                                    <td>koboaccountant.com</td>
                            <tr>
                                    <td >Amaka Ekpono</td>                                       
                                    <td>8A lagos state  </td>                                   
                                    <td> 08082023909</td>
                                    <td> syfon@gmail.com</td>
                                    <td>koboaccountant.com</td>
                                </tr>
                            
                        </tbody>
                </table>
                <span class="float-right" >Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i>
                </span> 
             </div>
             <div class="text-center pb-3">
                    <a href="" class="btn btn-started">Save &amp; Continue</a> 
                </div>
            </div> 
           
        </div>
    </section>

  
@endsection