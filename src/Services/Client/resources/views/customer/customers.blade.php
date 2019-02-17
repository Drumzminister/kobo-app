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

                                <td class="flex" >
                                    <div class="dropdown">
                                        <button class="btn bg-transparent p-0" type="button" id="dropdownMenuButton1">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-0"  style="max-width:10px; font-size: 16px" aria-labelledby="dropdownMenuButton1">
                                            <a @click="editCustomer($event, customer)" class="dropdown-item text-primary" style="cursor: pointer"><i class="fa fa-edit"> Edit</i></a>
                                            <a @click.prevent="deleteCustomer(customer.id)" class="dropdown-item text-danger" href="#"><i class="fa fa-trash"> Delete</i></a>
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

    {{--Update Modal--}}
<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="container p-3">
                <button type="button" class="close" @click="closeCustomerModal('editCustomerModal')">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="h5 uppercase" id="">Edit Customer - @{{ editingCustomer.first_name }} @{{ editingCustomer.last_name }}<em></em></h5>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name" class="d-block"><h5>First Name</h5></label>
                        <input type="text" step="0.01" class="form-control" v-model="editingCustomer.first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="d-block"><h5>Name</h5></label>
                        <input type="text" step="0.01" class="form-control" v-model="editingCustomer.last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="d-block"><h5>Address</h5></label>
                        <input type="text" class="form-control" v-model="editingCustomer.address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="d-block"><h5>Phone</h5></label>
                        <input type="text" class="form-control" v-model="editingCustomer.phone" required>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="d-block"><h5>Email</h5></label>
                        <input type="text" class="form-control" v-model="editingCustomer.email" required>
                    </div>
                    <div class="form-group">
                        <label for="website" class="d-block"><h5>Website</h5></label>
                        <input type="text" class="form-control" v-model="editingCustomer.website">
                    </div>
                    <div @click="updateCustomer" class="justify-content-around text-center pt-2">
                                <span style="cursor: pointer" class="submit">
                                    <i class="fa fa-telegram " style="font-size:48px; color:#00C259;"></i>
                                </span>
                        <h5 @click="updateCustomer" class="h5 text-green">Update Customer</h5>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('other_js')
    <script>
            window.customers = @json($customers)
    </script>
    @include('client::customer._update_customer_model')
@endsection
