@extends("client::layouts.app")

@section("content")
{{-- heading section --}}
<section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2><a href="/client/vendor" class="text-dark"> Vendors</a></h2>
               @include('client::accountant-button')

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
                              <th scope="col">Image</th>
                              <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody id="vendor">
                            <tr v-for="(content, index) in vendorTableRows" :id="'row-' + index">
                                <td><input name="name" v-validate="'required'" v-model="content.name" @keyup="" id="name" type="text" class="form-control name">
                                    <span class="text-danger"></span>
                                </td>
                                <td><input v-model="content.address" id="address" type="text" class="form-control address"></td>
                                <td><input name="phone" v-validate="'digits:11'" v-model="content.phone" id="phone" type="text" class="form-control number">
                                </td>
                                <td><input name="email" v-validate="'required|email'"  v-model="content.email" id="email" type="text" class="form-control email">
                                </td>
                                <td><input   v-model="content.website" id="website" type="text" class="form-control website">
                                </td>
                                <td><input type="file" @change="uploadImage($event, index)" class="form-control image" id="image">
                                </td>
                                <td id="delete" @click='deleteVendorRow(index)'><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                            </tr>
                            <ul>
                                <li class="text-danger" v-for="error in errors.all()">@{{ error }}</li>
                                <li class="text-danger" v-if="vendorFormErrors" v-for="error in vendorFormErrors">@{{ error[0] }}</li>
                            </ul>
                        </tbody>
                </table>
                <span class="float-right" @click="addNewRow" >Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259; cursor: pointer;"></i>
                </span> 
             </div>

             <div class="text-center pb-3">
                 <a v-if="! isLoading" @click="saveVendor" class="btn btn-started" v-bind:class="{ active: isLoading }">Save &amp; Continue</a>
                 <a v-else="isLoading" class="btn btn-started">
                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                     Loading...
                 </a>
                </div>
            </div> 
           
        </div>
    </section>
@endsection
