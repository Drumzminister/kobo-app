
@extends("layouts.app-acct")

@section("content")
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2><a href="/vendors" class="text-dark"> Vendors</a></h2>
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
                                <td><input class="name" type="text" class="form-control"></td>                                       
                                <td><input class="address" type="text" class="form-control"></td>                                   
                                <td><input class="number" type="number" class="form-control"></td>
                                <td><input class="email" type="text" class="form-control"></td>
                                <td><input class="website" type="text" class="form-control"></td>
                                <td></td>
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