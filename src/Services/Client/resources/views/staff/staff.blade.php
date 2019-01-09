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
            <h2>Staffs</h2>
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
        <div class="container mt-2">
                        
            <div class="bg-white px-4 my-3" id="topp"> 
                
                <div class="table-responsive table-responsive-sm">
                        <table class="table table-hover" id="dataTable">
                                <thead class="p-3">
                                  <tr class="ta">
                                    <th scope="col">Staff</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Date Of Employment</th>
                                    <th scope="col">Date of Leaving</th>              
                                    <th scope="col"></th>              
                                  
                                </tr>
                                </thead>
        
                                <tbody>
                                  <tr>
                                    
                                        <td> <a href="" class="left-modal" data-toggle="modal" data-target="#exampleModal" >
                                            <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                            <span class="pl-3"> James James</span>
                                            </a>
                                        </td>
                                        <td>Director</td>
                                        <td >237,000 </td>
                                        <td >23/09/2019</td>
                                        <td>23/10/2020 </td>  
                                        <td class="flex" > 
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>      

                                  </tr>
        
                                  <tr>
                                    <td> <a href="" class="left-modal" data-toggle="modal" data-target="#exampleModal" >
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                        <span class="pl-3"> James James</span>
                                        </a>
                                    </td>    
                                    <td>Director</td>
                                    <td >237,000 </td>
                                    <td >23/09/2019</td>
                                    <td>23/10/2020 </td>  
                                    <td class="flex" > 
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>     
                                  </tr>
        
                                  <tr>
                                    <td> <a href="" class="left-modal" data-toggle="modal" data-target="#exampleModal" >
                                            <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                            <span class="pl-3"> James James</span>
                                            </a>
                                    </td>     
                                    <td>Director</td>
                                    <td >237,000 </td>
                                    <td >23/09/2019</td>
                                    <td>23/10/2020 </td>  
                                    <td class="flex" > 
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>    
                                  </tr>
        
                                  <tr>
                                        <td> <a href="" class="left-modal" data-toggle="modal" data-target="#exampleModal" >
                                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                                <span class="pl-3"> James James</span>
                                                </a>
                                            </td>
                                    <td>Director</td>
                                    <td >237,000 </td>
                                    <td >23/09/2019</td>
                                    <td>23/10/2020 </td>  
                                    <td class="flex" > 
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>  
                                  </tr>
        
                                  <tr>
                                        <td> <a href="" class="left-modal" data-toggle="modal" data-target="#exampleModal" >
                                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                                <span class="pl-3"> James James</span>
                                                </a>
                                            </td>
                                    <td>Director</td>
                                    <td >237,000 </td>
                                    <td >23/09/2019</td>
                                    <td>23/10/2020 </td>  
                                    <td class="flex" > 
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>  
                                  </tr>
                                  <tr>
                                        <td> <a href="" class="left-modal" data-toggle="modal" data-target="#exampleModal" >
                                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                                <span class="pl-3"> James James</span>
                                                </a>
                                            </td>
                                    <td>Director</td>
                                    <td >237,000 </td>
                                    <td >23/09/2019</td>
                                    <td>23/10/2020 </td>  
                                    <td class="flex" > 
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </td>  
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
                            <img src="{{asset('img/person.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid">
                            <h5 class="h5">James James
                            </h5>
                            <p class="text-muted">CEO</p>
                        <div class="icon">
                                <span><i class="fa fa-facebook-square" style="font-size: 32px; color:#0077B5;"></i></span>
                                <span><i class="fa fa-facebook-square" style="font-size: 32px; color:#0077B5;"></i></span>                            
                            <span><i class="fa fa-facebook-square" style="font-size: 32px; color:#0077B5;"></i></span>
                        </div>
                    <p class="text-muted py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima quia ex officiis soluta excepturi assumenda distinctio deleniti omnis quaerat dolorem.</p>    
                    </div>

                    <p>Experience: <span class="text-muted"> 2years</span></p>
                    <p>Date of Employment: <span class="text-muted"> 30/05/2019</span></p>
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
