@extends("client::layouts.app")

@section("content")
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <div class="row p-1">
                    <h2><a href="/client/vendor" class="text-dark"> Vendors</a></h2>
                    <span class="accountant ml-auto ">
                <a href="/client/vendor/add" class="btn btn-started">
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
                                <h4 class="h4 text-white">Total Number of Vendors</h4>
                            </div>
                            <div class="col-md-4">
                                <h1 class="h1 text-orange">@{{ vendors.length }}</h1>
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
                                    <input v-model="search" @keyup.prevent="searchVendor" type="text"class="form-control search" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <a href="#"> <span  class="input-group-text vat-input append-border px-5"  id="basic-addon2">Search</a></span>
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
                            <th scope="col" id="delete"></th>
                          </tr>
                        </thead>
                        <tbody class="vendor" v-for="vendor in vendors">
                          <tr>
                                <td>@{{ vendor.name }} </td>
                                <td>@{{ vendor.address }}</td>
                                <td> @{{ vendor.phone }} </td>
                                <td> @{{ vendor.email }}</td>
                                <td>@{{ vendor.website }}</td>
                                <td><label class="switch">
                                        <input  @click="activateVendor(vendor.id)" type="checkbox" v-bind:checked="vendor.isActive">
                                        <span class="slider round"></span>
                                      </label>

                                </td>
                          </tr>
                        </tbody>
                        <tr v-if="vendors.length === 0">
                            <td colspan="7" style="text-align: center">No search result found</td>
                        </tr>
                    </table>
             </div>
             <div class="text-center mt-2">
                    <a href="/client/vendor/list" class="view-more">View More</a>
                </div>
            </div> 
        </div>
    </section>
@endsection
@section('other_js')
    <script>
        window.vendors = @json($vendors)
    </script>
@endsection

