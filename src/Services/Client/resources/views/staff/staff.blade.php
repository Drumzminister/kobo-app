@extends("client::layouts.app")
<style>
    label {display: block; padding: 5px; position: relative; padding-left: 10px;}
    label input {display: none;}
    label span {border: 1px solid #ccc; width: 17px; height: 17px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
    input:checked + span {background: #ccf; border-color: #ccf;}
    
    input {
        border: none;
        background: transparent;
    }
    
    .modal.left .modal-dialog {
        position: fixed;
        margin: auto;
        width: 400px;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }
    
    .modal.left .modal-content {
        height: 100%;
        overflow-y: auto;
    }
    
    .modal.left .modal-body {
        padding: 30px;
    }
    
    .modal.left.fade .modal-dialog {
        right: -320px;
        transition: opacity 0.5s linear, left 0.5s ease-out;
    }
    
    .modal.left.fade.show .modal-dialog {
        right: 0;
    }

    .modal.in .modal-dialog {
    position:fixed;
    bottom:0px;
    right:0px;
    margin:0px;
}
    </style>

@section("content")
<section id="top">
    <div class="container py-3">
        <div class="row ">
            <h2><a href="/client/staff"> Staff</a></h2>
            <span class="accountant ml-auto ">
                <a href="/client/staff/single-staff" class="btn btn-started">
                    Add Staff
                </a>                
                </span>
        </div>
    </div>
</section>
    
<section>
    <div class="container py-3">
        <div class="col-md-3 p-3 bg-green mb-4">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="h4 text-white">Total Number of Staff</h4>
                </div>
                <div class="col-md-4">
                    <h1 class="h1 text-orange">{{$count_staff}}</h1>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section id="sale-table">
        <div class="container mt-2">
                        
            <div class="bg-white px-4 my-3" id="topp"> 
            
                <div class="row py-3">
                    <div class="col-md-9 col-6">
                        <div class="input-group ">
                            <input type="text" v-model="staffSearchInput" @keyup.prevent="searchStaff" class="form-control" placeholder="&#xF002;" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append" @click.prevent.enter="searchStaff">
                                <a href="#"> <span class="input-group-text vat-input append-border px-5 " id="basic-addon2">Search</span></a>
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-md-2 col-6">--}}
                        {{--<div id="" class="mt-2 float-right" onclick="">--}}
                            {{--<button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                
                <div class="table-responsive table-responsive-sm">
                        <table class="table table-hover" id="dataTable">
                                <thead class="p-3">
                                  <tr class="ta">
                                    <th scope="col">Staff</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col" @click.prevent="staffStatusFilter" style="cursor: ns-resize">Status</th>
                                    <th scope="col"></th>
                                  
                                </tr>
                                </thead>
        
                                <tbody>
                                  <tr v-for="(worker, index) in staff" :key="index">
                                        <td> <a href="" class="left-modal" data-toggle="modal" data-target="#exampleModal" @click.prevent="staffModal(worker)">
                                            <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                            <span class="pl-3"> @{{ worker.first_name }} @{{ worker.last_name }}</span>
                                            </a>
                                        </td>
                                        <td >@{{ worker.role }} </td>
                                        <td >@{{ worker.phone }}</td>

                                        <td v-if="worker.isActive">
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                      <td v-else="worker.isActive">
                                          <span class="badge badge-danger">Inactive</span>
                                      </td>

                                      <td class="flex" >
                                          <div class="dropdown">
                                              <button class="btn bg-transparent p-0" type="button" id="dropdownMenuButton1">
                                                  <i class="fa fa-ellipsis-v"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right p-0"  style="max-width:30px; font-size: 20px" aria-labelledby="dropdownMenuButton1">
                                                  <a class="dropdown-item text-primary" href="client/staff/payment"><i class="fa fa-money">Salary</i></a>
                                                  <a class="dropdown-item text-primary" href="/client/staff/edit"><i class="fa fa-edit"></i>Edit</a>
                                                  <a @click.prevent="deactivateStaff(worker)" class="dropdown-item text-danger" href="#">Deactivate<i class="fa fa-trash"></i></a>
                                              </div>
                                          </div>
                                        </td>
                                  </tr>
                                  <tr v-if="staff.length === 0">
                                      <td colspan="7" style="text-align: center">No search result found</td>
                                  </tr>
                                </tbody>
                            </table>
                </div>
            </div>           
        </div>
    </section>

 {{-- modal --}}
 <div class="modal left fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="nav flex-sm-column flex-row">
                    <div class="product-details text-center">
                            <img :src="StaffInformation.avatar" alt="Staff Logo" srcset="" class="rounded-circle img-fluid">
                            <h5 class="h5">@{{ StaffInformation.name }}
                            </h5>
                            <p class="text-muted">@{{ StaffInformation.role }}</p>

                    <p class="text-muted py-2">@{{ StaffInformation.comment }}</p>
                    </div>

                    <p>Experience: <span class="text-muted"> @{{ StaffInformation.experience }} year(s)</span></p>
                    <p>Date of Employment: <span class="text-muted"> @{{ StaffInformation.dateOfEmployment }} </span></p>
                    <p>Salary: <span class="text-muted"> N@{{ StaffInformation.salary | numberFormat }} </span></p>
                    <p>Rating: <span class="text-muted"> </span></p>

                </div>
                <div class="modal-footer mt-5">
                    <div class="col">
                    </div>
                    <div class="col">
                            <button type="button" class="btn btn-secondary py-2 px-4 float-right" data-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-started pull-right ">Add</button> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('other_js')
<script>
    window.all_staff = @json($all_staff);
    window.count = @json($count_staff);
</script>
@endsection
