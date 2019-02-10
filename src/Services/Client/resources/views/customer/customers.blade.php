@extends("client::layouts.app")

@section("content")
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <div class="row p-1">
                    <h2><a href="/client/customer" class="text-dark"> Customers</a></h2>
                    <span class="accountant ml-auto ">
                <a href="/client/customer/add" class="btn btn-started">
                    Add Customers
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
                                <h1 class="h1 text-orange"></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>     
                    <div class="row p-3">
                            <div class="col-md-6 col-12">
                                <h4 class= "h4">Customers List </h4>
                            </div>

                            <div class="input-group mt-2">
                                <input type="text" v-model="search" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                   <a href="#"> <span @click.prevent="searchCustomer" class="input-group-text vat-input append-border px-5" id="basic-addon2">Search</span></a>
                                </div>
                            </div>
                    </div>
                
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Customer Name</th>
                            <th scope="col">Address</th>                                    
                            <th scope="col">Phone No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr v-for="customer in customers">
                                <td >@{{ customer.first_name }} @{{ customer.last_name }}</td>
                                <td>@{{ customer.address }}</td>
                                <td>@{{ customer.phone }}</td>
                                <td>@{{ customer.email }}</td>
                                <td>@{{ customer.website }}no-light </td>

                              <td v-show="searchNotFound">No Data found</td>
                                <td class="flex" >
                                    <div class="dropdown">
                                        <button class="btn bg-transparent p-0" type="button" id="dropdownMenuButton1">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-0"  style="max-width:30px; font-size: 30px" aria-labelledby="dropdownMenuButton1">
                                            <a class="dropdown-item text-primary"><i class="fa fa-edit"></i></a>
                                            <a @click.prevent="deleteCustomer(customer.id)" class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                          </tr>
                        </tbody>
                </table>
             </div>
             <div class="text-center mt-2">
                    <a href="/client/customer/list" class="view-more">View More</a>
                </div>
            </div> 
           
        </div>
    </section>

@endsection
@section('other_js')
<script>
window.customers = @json($customers)
</script>
@endsection
